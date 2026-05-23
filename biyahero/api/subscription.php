<?php
/**
 * Subscription Management API
 * Handles subscription plans, trials, and payments
 */

require_once 'config.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

$database = new Database();
$db = $database->getConnection();

// Verify session and get user ID
function verifySessionAndGetUserId($db) {
    $headers = getallheaders();
    $sessionToken = $headers['Authorization'] ?? $headers['authorization'] ?? '';
    
    if (empty($sessionToken)) {
        return null;
    }
    
    // Remove "Bearer " prefix if present
    $sessionToken = str_replace('Bearer ', '', $sessionToken);
    
    try {
        $stmt = $db->prepare("
            SELECT user_id 
            FROM user_sessions 
            WHERE session_token = ? AND expires_at > NOW()
        ");
        $stmt->execute([$sessionToken]);
        $session = $stmt->fetch();
        
        return $session ? $session['user_id'] : null;
    } catch (PDOException $e) {
        return null;
    }
}

$action = $_GET['action'] ?? '';

// Get subscription status
if ($action === 'status' && getRequestMethod() === 'GET') {
    $userId = verifySessionAndGetUserId($db);
    
    if (!$userId) {
        sendErrorResponse('Unauthorized', 401);
    }
    
    try {
        $stmt = $db->prepare("
            SELECT s.*, u.email 
            FROM subscriptions s
            INNER JOIN users u ON s.user_id = u.id
            WHERE s.user_id = ?
        ");
        $stmt->execute([$userId]);
        $subscription = $stmt->fetch();
        
        if (!$subscription) {
            // Create subscription if it doesn't exist
            $stmt = $db->prepare("INSERT INTO subscriptions (user_id, plan, subscription_status) VALUES (?, 'free', 'new')");
            $stmt->execute([$userId]);
            
            $stmt = $db->prepare("SELECT * FROM subscriptions WHERE user_id = ?");
            $stmt->execute([$userId]);
            $subscription = $stmt->fetch();
        }
        
        // Calculate trial days remaining
        $trialDaysRemaining = 0;
        if ($subscription['trial_end_date']) {
            $trialEnd = new DateTime($subscription['trial_end_date']);
            $now = new DateTime();
            $interval = $now->diff($trialEnd);
            $trialDaysRemaining = max(0, $interval->days);
            if ($trialEnd < $now) {
                $trialDaysRemaining = 0;
            }
        }
        
        // Determine status
        $status = 'new';
        if ($subscription['subscription_status'] === 'active') {
            $status = 'active';
        } elseif ($subscription['trial_activated'] && $trialDaysRemaining > 0) {
            $status = 'trial';
        } elseif ($subscription['trial_activated'] && $trialDaysRemaining === 0) {
            $status = 'expired';
        }
        
        sendSuccessResponse([
            'plan' => $subscription['plan'],
            'status' => $status,
            'trialActivated' => (bool)$subscription['trial_activated'],
            'trialStartDate' => $subscription['trial_start_date'],
            'trialEndDate' => $subscription['trial_end_date'],
            'trialDaysRemaining' => $trialDaysRemaining,
            'hasPaid' => (bool)$subscription['has_paid'],
            'paymentDate' => $subscription['payment_date'],
            'paymentAmount' => $subscription['payment_amount'],
            'adCount' => $subscription['ad_count'],
            'fareCalcCount' => $subscription['fare_calc_count']
        ], 'Subscription status retrieved');
        
    } catch (PDOException $e) {
        sendErrorResponse('Failed to get subscription: ' . $e->getMessage(), 500);
    }
}

// Activate trial
if ($action === 'activate_trial' && getRequestMethod() === 'POST') {
    $userId = verifySessionAndGetUserId($db);
    
    if (!$userId) {
        sendErrorResponse('Unauthorized', 401);
    }
    
    $input = getJsonInput();
    $plan = cleanInput($input['plan'] ?? 'premium');
    
    if (!in_array($plan, ['basic', 'premium'])) {
        sendErrorResponse('Invalid plan type');
    }
    
    try {
        // Check if trial already activated
        $stmt = $db->prepare("SELECT trial_activated FROM subscriptions WHERE user_id = ?");
        $stmt->execute([$userId]);
        $subscription = $stmt->fetch();
        
        if ($subscription && $subscription['trial_activated']) {
            sendErrorResponse('Trial already activated');
        }
        
        // Set trial duration
        $trialDays = $plan === 'basic' ? 7 : 30;
        $trialStartDate = date('Y-m-d H:i:s');
        $trialEndDate = date('Y-m-d H:i:s', strtotime("+$trialDays days"));
        
        // Update subscription
        $stmt = $db->prepare("
            UPDATE subscriptions 
            SET plan = ?, 
                subscription_status = 'trial',
                trial_activated = TRUE,
                trial_start_date = ?,
                trial_end_date = ?
            WHERE user_id = ?
        ");
        $stmt->execute([$plan, $trialStartDate, $trialEndDate, $userId]);
        
        sendSuccessResponse([
            'plan' => $plan,
            'trialDays' => $trialDays,
            'trialStartDate' => $trialStartDate,
            'trialEndDate' => $trialEndDate
        ], 'Trial activated successfully');
        
    } catch (PDOException $e) {
        sendErrorResponse('Failed to activate trial: ' . $e->getMessage(), 500);
    }
}

// Process payment
if ($action === 'payment' && getRequestMethod() === 'POST') {
    $userId = verifySessionAndGetUserId($db);
    
    if (!$userId) {
        sendErrorResponse('Unauthorized', 401);
    }
    
    $input = getJsonInput();
    $plan = cleanInput($input['plan'] ?? 'basic');
    $amount = floatval($input['amount'] ?? 59.00);
    
    if (!in_array($plan, ['basic', 'premium'])) {
        sendErrorResponse('Invalid plan type');
    }
    
    try {
        $paymentDate = date('Y-m-d H:i:s');
        
        // Update subscription
        $stmt = $db->prepare("
            UPDATE subscriptions 
            SET plan = ?, 
                subscription_status = 'active',
                has_paid = TRUE,
                payment_date = ?,
                payment_amount = ?
            WHERE user_id = ?
        ");
        $stmt->execute([$plan, $paymentDate, $amount, $userId]);
        
        sendSuccessResponse([
            'plan' => $plan,
            'paymentAmount' => $amount,
            'paymentDate' => $paymentDate
        ], 'Payment processed successfully');
        
    } catch (PDOException $e) {
        sendErrorResponse('Payment failed: ' . $e->getMessage(), 500);
    }
}

// Increment fare calculation count
if ($action === 'increment_fare_calc' && getRequestMethod() === 'POST') {
    $userId = verifySessionAndGetUserId($db);
    
    if (!$userId) {
        sendErrorResponse('Unauthorized', 401);
    }
    
    try {
        $stmt = $db->prepare("
            UPDATE subscriptions 
            SET fare_calc_count = fare_calc_count + 1
            WHERE user_id = ?
        ");
        $stmt->execute([$userId]);
        
        sendSuccessResponse([], 'Fare calculation count updated');
        
    } catch (PDOException $e) {
        sendErrorResponse('Failed to update count: ' . $e->getMessage(), 500);
    }
}

// Increment ad count
if ($action === 'increment_ad_count' && getRequestMethod() === 'POST') {
    $userId = verifySessionAndGetUserId($db);
    
    if (!$userId) {
        sendErrorResponse('Unauthorized', 401);
    }
    
    try {
        $stmt = $db->prepare("
            UPDATE subscriptions 
            SET ad_count = ad_count + 1
            WHERE user_id = ?
        ");
        $stmt->execute([$userId]);
        
        sendSuccessResponse([], 'Ad count updated');
        
    } catch (PDOException $e) {
        sendErrorResponse('Failed to update count: ' . $e->getMessage(), 500);
    }
}

// Get fare routes
if ($action === 'fare_routes' && getRequestMethod() === 'GET') {
    try {
        $stmt = $db->prepare("SELECT * FROM fare_routes ORDER BY origin, destination, mode");
        $stmt->execute();
        $routes = $stmt->fetchAll();
        
        // Group routes by origin and destination
        $groupedRoutes = [];
        foreach ($routes as $route) {
            $key = $route['origin'] . '|' . $route['destination'];
            if (!isset($groupedRoutes[$key])) {
                $groupedRoutes[$key] = [
                    'origin' => $route['origin'],
                    'destination' => $route['destination'],
                    'modes' => []
                ];
            }
            $groupedRoutes[$key]['modes'][$route['mode']] = [
                'base_fare' => $route['base_fare'],
                'fare_range_low' => $route['fare_range_low'],
                'fare_range_high' => $route['fare_range_high'],
                'travel_time' => $route['travel_time'],
                'steps' => $route['steps']
            ];
        }
        
        sendSuccessResponse(array_values($groupedRoutes), 'Fare routes retrieved');
        
    } catch (PDOException $e) {
        sendErrorResponse('Failed to get fare routes: ' . $e->getMessage(), 500);
    }
}

sendErrorResponse('Invalid action', 404);
?>
