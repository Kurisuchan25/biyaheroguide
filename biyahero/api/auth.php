<?php

/**

 * Authentication API

 * Handles user registration and login

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



$action = $_GET['action'] ?? '';



// Register new user

if ($action === 'register' && getRequestMethod() === 'POST') {

    $input = getJsonInput();

    

    $email = cleanInput($input['email'] ?? '');

    $password = $input['password'] ?? '';

    $firstName = cleanInput($input['firstName'] ?? '');

    $lastName = cleanInput($input['lastName'] ?? '');

    

    // Validation

    if (empty($email) || empty($password) || empty($firstName) || empty($lastName)) {

        sendErrorResponse('All fields are required');

    }

    

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        sendErrorResponse('Invalid email format');

    }

    

    if (strlen($password) < 8) {

        sendErrorResponse('Password must be at least 8 characters');

    }

    

    try {

        // Check if email already exists

        $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");

        $stmt->execute([$email]);

        

        if ($stmt->fetch()) {

            sendErrorResponse('Email already registered');

        }

        

        // Hash password

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        

        // Insert user

        $stmt = $db->prepare("INSERT INTO users (email, password, first_name, last_name) VALUES (?, ?, ?, ?)");

        $stmt->execute([$email, $hashedPassword, $firstName, $lastName]);

        

        $userId = $db->lastInsertId();

        

        // Create subscription record

        $stmt = $db->prepare("INSERT INTO subscriptions (user_id, plan, subscription_status) VALUES (?, 'free', 'new')");

        $stmt->execute([$userId]);

        

        // Generate session token

        $sessionToken = bin2hex(random_bytes(32));

        $expiresAt = date('Y-m-d H:i:s', strtotime('+30 days'));

        

        $stmt = $db->prepare("INSERT INTO user_sessions (user_id, session_token, expires_at) VALUES (?, ?, ?)");

        $stmt->execute([$userId, $sessionToken, $expiresAt]);

        

        sendSuccessResponse([

            'userId' => $userId,

            'email' => $email,

            'firstName' => $firstName,

            'lastName' => $lastName,

            'sessionToken' => $sessionToken

        ], 'Registration successful');

        

    } catch (PDOException $e) {

        sendErrorResponse('Registration failed: ' . $e->getMessage(), 500);

    }

}



// Login user

if ($action === 'login' && getRequestMethod() === 'POST') {

    $input = getJsonInput();

    

    $email = cleanInput($input['email'] ?? '');

    $password = $input['password'] ?? '';

    

    // Validation

    if (empty($email) || empty($password)) {

        sendErrorResponse('Email and password are required');

    }

    

    try {

        // Get user

        $stmt = $db->prepare("SELECT id, email, password, first_name, last_name FROM users WHERE email = ?");

        $stmt->execute([$email]);

        $user = $stmt->fetch();

        

        if (!$user || !password_verify($password, $user['password'])) {

            sendErrorResponse('Invalid email or password');

        }

        

        // Generate session token

        $sessionToken = bin2hex(random_bytes(32));

        $expiresAt = date('Y-m-d H:i:s', strtotime('+30 days'));

        

        $stmt = $db->prepare("INSERT INTO user_sessions (user_id, session_token, expires_at) VALUES (?, ?, ?)");

        $stmt->execute([$user['id'], $sessionToken, $expiresAt]);

        

        sendSuccessResponse([

            'userId' => $user['id'],

            'email' => $user['email'],

            'firstName' => $user['first_name'],

            'lastName' => $user['last_name'],

            'sessionToken' => $sessionToken

        ], 'Login successful');

        

    } catch (PDOException $e) {

        sendErrorResponse('Login failed: ' . $e->getMessage(), 500);

    }

}



// Verify session token

if ($action === 'verify' && getRequestMethod() === 'POST') {

    $input = getJsonInput();

    $sessionToken = $input['sessionToken'] ?? '';

    

    if (empty($sessionToken)) {

        sendErrorResponse('Session token is required');

    }

    

    try {

        $stmt = $db->prepare("

            SELECT u.id, u.email, u.first_name, u.last_name 

            FROM users u

            INNER JOIN user_sessions s ON u.id = s.user_id

            WHERE s.session_token = ? AND s.expires_at > NOW()

        ");

        $stmt->execute([$sessionToken]);

        $user = $stmt->fetch();

        

        if (!$user) {

            sendErrorResponse('Invalid or expired session');

        }

        

        sendSuccessResponse([

            'userId' => $user['id'],

            'email' => $user['email'],

            'firstName' => $user['first_name'],

            'lastName' => $user['last_name']

        ], 'Session valid');

        

    } catch (PDOException $e) {

        sendErrorResponse('Session verification failed: ' . $e->getMessage(), 500);

    }

}



// Logout

if ($action === 'logout' && getRequestMethod() === 'POST') {

    $input = getJsonInput();

    $sessionToken = $input['sessionToken'] ?? '';

    

    try {

        $stmt = $db->prepare("DELETE FROM user_sessions WHERE session_token = ?");

        $stmt->execute([$sessionToken]);

        

        sendSuccessResponse([], 'Logged out successfully');

        

    } catch (PDOException $e) {

        sendErrorResponse('Logout failed: ' . $e->getMessage(), 500);

    }

}



sendErrorResponse('Invalid action', 404);

?>

