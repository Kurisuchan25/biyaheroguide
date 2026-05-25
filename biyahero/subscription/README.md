# Biyahero Subscription System

A modern, SaaS-style subscription management system with glassmorphism UI, comprehensive state management, and backend-ready architecture.

## 📁 Folder Structure

```
biyahero/
├── subscription/
│   ├── subscription.html          # Subscription management page
│   ├── subscription.css           # Modern glassmorphism styles
│   ├── subscription.js            # Core subscription logic
│   └── README.md                  # This documentation
├── index.php                      # Main app (with navbar integration)
├── css/
│   └── subscription.css           # Existing subscription styles
└── js/
    └── subscription.js            # Existing subscription logic
```

## 🎯 Features

### User Experience
- **Free Trial System**: One-time 7-day free trial for new users
- **Plan Tiers**: Free, Basic (₱99/mo), Premium (₱129/mo)
- **Usage Limits**: Free users limited to 10 calculations/month
- **Smart Upselling**: Upgrade prompts only when needed
- **No Repeated Prompts**: Subscribed users never see upgrade modals

### UI/UX
- **Glassmorphism Design**: Modern dark theme with blur effects
- **Responsive**: Works on desktop, tablet, and mobile
- **Smooth Animations**: Professional transitions and hover effects
- **ChatGPT-style Flow**: Clean upgrade experience similar to modern SaaS

### Management
- **Subscription Dashboard**: Full management page
- **Billing History**: Track all payments
- **Payment Methods**: Add/manage payment options
- **Plan Changes**: Upgrade, downgrade, cancel anytime
- **Usage Analytics**: Track calculations and activity

## 🚀 Quick Start

### 1. Include the Script

Add to your main HTML file:

```html
<script src="subscription/subscription.js"></script>
```

### 2. Initialize the System

The system auto-initializes on page load. To manually initialize:

```javascript
SubscriptionManager.initializeState();
```

### 3. Track Usage

Wrap your calculation functions with usage tracking:

```javascript
function performCalculation() {
    // Check if user can make calculation
    if (!SubscriptionManager.canMakeCalculation()) {
        SubscriptionManager.openUpgradeModal();
        return false;
    }
    
    // Perform your calculation
    const result = calculateRoute();
    
    // Track the usage
    SubscriptionManager.trackCalculation();
    
    return result;
}
```

### 4. Display Plan Badge

Add to your navbar:

```html
<div class="plan-badge-nav" id="navPlanBadge">
    <span class="badge-icon-nav">🚶</span>
    <span class="badge-text-nav">FREE</span>
</div>
```

### 5. Add Upgrade Button

Add to your navbar:

```html
<button class="nav-upgrade-btn" id="navUpgradeBtn" onclick="SubscriptionManager.openUpgradeModal()">
    <span class="upgrade-icon">⚡</span>
    <span class="upgrade-text">Upgrade</span>
</button>
```

## 📊 State Management

### State Structure

```javascript
{
    // User Info
    userId: null,
    userEmail: null,
    userName: null,
    
    // Subscription Status
    hasUsedFreeTrial: false,
    isSubscribed: false,
    subscriptionStatus: 'none', // none, active, expired, cancelled
    currentPlan: 'free', // free, basic, premium
    billingPeriod: 'monthly', // monthly, yearly
    
    // Trial Info
    trialStartDate: null,
    trialEndDate: null,
    trialDaysLeft: 7,
    
    // Subscription Info
    subscriptionStartDate: null,
    subscriptionEndDate: null,
    
    // Usage Limits
    calculationsUsed: 0,
    calculationsLimit: 10,
    totalCalculations: 0,
    
    // Payment
    paymentMethods: [],
    billingHistory: [],
    
    // Timestamps
    lastUpdated: null,
    createdAt: null
}
```

### State Persistence

State is automatically saved to localStorage with key: `biyahero_subscription_state`

```javascript
// Get current state
const state = SubscriptionManager.getState();

// Update state
SubscriptionManager.updateState({
    currentPlan: 'basic',
    isSubscribed: true
});

// State auto-saves to localStorage
```

## 🎨 Plan Configurations

### Free Plan
- **Price**: ₱0
- **Calculations**: 10/month
- **Features**: Basic routes, fare estimates
- **Trial**: 7-day free trial

### Basic Plan
- **Price**: ₱99/month (₱950/year - 20% savings)
- **Calculations**: 100/month
- **Features**: Advanced search, fare calculator, commute planner

### Premium Plan
- **Price**: ₱129/month (₱1,230/year - 20% savings)
- **Calculations**: Unlimited
- **Features**: All features + real-time updates + priority support

## 🔧 API Reference

### Subscription Management

```javascript
// Start free trial (one-time only)
SubscriptionManager.startFreeTrial();

// Subscribe to plan
SubscriptionManager.subscribeToPlan('basic', 'monthly');
SubscriptionManager.subscribeToPlan('premium', 'yearly');

// Cancel subscription
SubscriptionManager.cancelSubscription();

// Renew subscription
SubscriptionManager.renewSubscription();

// Upgrade plan
SubscriptionManager.upgradePlan('premium');
```

### Usage Tracking

```javascript
// Track a calculation
SubscriptionManager.trackCalculation();

// Check if user can make calculation
if (SubscriptionManager.canMakeCalculation()) {
    // Allow calculation
}

// Get usage percentage
const percentage = SubscriptionManager.getUsagePercentage();
```

### Modal Controls

```javascript
// Open upgrade modal
SubscriptionManager.openUpgradeModal();

// Close upgrade modal
SubscriptionManager.closeUpgradeModal();

// Open cancel modal
SubscriptionManager.openCancelModal();

// Open payment method modal
SubscriptionManager.openPaymentMethodModal();
```

### Plan Selection

```javascript
// Set billing period
SubscriptionManager.setBillingPeriod('yearly');

// Select plan
SubscriptionManager.selectPlan('basic');

// Simulate payment (for demo)
SubscriptionManager.simulatePayment();
```

### Payment Methods

```javascript
// Add payment method
SubscriptionManager.addPaymentMethod();

// Remove payment method
SubscriptionManager.removePaymentMethod(methodId);
```

### Billing

```javascript
// Download invoice
SubscriptionManager.downloadInvoice(entryId);
```

## 🔌 Backend Integration

### API Endpoints (Ready for Implementation)

```javascript
// Fetch subscription from API
await SubscriptionManager.fetchSubscriptionFromAPI(userId);

// Sync subscription to API
await SubscriptionManager.syncSubscriptionToAPI();

// Verify subscription with auth token
await SubscriptionManager.verifySubscription(authToken);
```

### Database Schema (Recommended)

```sql
CREATE TABLE subscriptions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    plan_id VARCHAR(50) NOT NULL,
    status ENUM('active', 'expired', 'cancelled', 'trial') NOT NULL,
    billing_period ENUM('monthly', 'yearly') NOT NULL,
    start_date DATETIME NOT NULL,
    end_date DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE billing_history (
    id INT PRIMARY KEY AUTO_INCREMENT,
    subscription_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'paid', 'failed') NOT NULL,
    payment_method VARCHAR(50),
    transaction_id VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (subscription_id) REFERENCES subscriptions(id)
);

CREATE TABLE usage_tracking (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    calculation_type VARCHAR(50),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
```

### Payment Gateway Integration

#### GCash Integration
```php
// Example PHP endpoint for GCash
<?php
// gcash_payment.php
require_once 'gcash-sdk.php';

$gcash = new GCashSDK();
$payment = $gcash->createPayment([
    'amount' => 99.00,
    'description' => 'Biyahero Basic Plan',
    'callback_url' => 'https://yourdomain.com/payment/callback'
]);

echo json_encode($payment);
?>
```

#### Stripe Integration
```javascript
// Example Stripe integration
const stripe = Stripe('your-public-key');

async function processPayment(planId, billingPeriod) {
    const response = await fetch('/api/create-checkout-session', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ planId, billingPeriod })
    });
    
    const session = await response.json();
    await stripe.redirectToCheckout({ sessionId: session.id });
}
```

#### PayPal Integration
```javascript
// Example PayPal integration
paypal.Buttons({
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '99.00'
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            SubscriptionManager.subscribeToPlan('basic', 'monthly');
        });
    }
}).render('#paypal-button-container');
```

## 🎯 User Flow Examples

### New User Flow
1. User signs up
2. System automatically starts 7-day free trial
3. User gets full access to all features
4. After 7 days, trial expires
5. Upgrade modal appears on next calculation
6. User subscribes to Basic or Premium plan
7. Upgrade prompts disappear permanently

### Free User Flow
1. User has 10 calculations/month
2. System tracks each calculation
3. At 70% usage (7 calculations), show warning
4. At 100% usage (10 calculations), show upgrade modal
5. User must upgrade to continue

### Subscribed User Flow
1. User subscribes to plan
2. No usage limits (or higher limits)
3. No upgrade prompts ever appear
4. Plan badge shows in navbar
5. Can manage subscription via dashboard
6. Can cancel anytime (access until period ends)

### Expired Subscription Flow
1. Subscription expires
2. User reverts to free limits
3. "Renew Subscription" button appears
4. User can renew with one click
5. Previous payment methods saved

## 🎨 Customization

### Change Colors

Edit `subscription.css` variables:

```css
:root {
    --primary: #6366f1;        /* Main brand color */
    --primary-dark: #4f46e5;   /* Darker shade */
    --secondary: #10b981;      /* Success/accent */
    --danger: #ef4444;         /* Error/cancel */
    --bg-primary: #0f172a;     /* Main background */
    --bg-secondary: #1e293b;   /* Card background */
}
```

### Modify Plans

Edit `subscription.js` PLANS object:

```javascript
const PLANS = {
    free: {
        name: 'Free',
        price: 0,
        calculationsLimit: 10,
        features: [...]
    },
    custom: {
        name: 'Custom',
        price: 199,
        calculationsLimit: 500,
        features: [...]
    }
};
```

### Change Usage Limits

```javascript
// In subscription.js
const DEFAULT_STATE = {
    calculationsLimit: 20, // Change from 10 to 20
    // ...
};
```

## 🧪 Testing

### Test Free Trial
```javascript
// Reset state to test free trial
localStorage.removeItem('biyahero_subscription_state');
SubscriptionManager.initializeState();
SubscriptionManager.startFreeTrial();
```

### Test Subscription
```javascript
// Simulate subscription
SubscriptionManager.subscribeToPlan('basic', 'monthly');
```

### Test Usage Limits
```javascript
// Track multiple calculations
for (let i = 0; i < 15; i++) {
    SubscriptionManager.trackCalculation();
}
// Upgrade modal should appear after 10th calculation
```

## 📱 Mobile Responsiveness

The system is fully responsive with breakpoints at:
- **Desktop**: > 768px (full features)
- **Tablet**: 481px - 768px (adjusted layout)
- **Mobile**: ≤ 480px (simplified UI, hidden badges)

## 🔒 Security Considerations

### Client-Side Limitations
- Current implementation uses localStorage (client-side)
- For production, always validate on server-side
- Never trust client-side state for payment decisions

### Recommended Security
1. **Server-Side Validation**: Always verify subscription status on backend
2. **Secure API**: Use HTTPS for all API calls
3. **Authentication**: Require valid auth tokens for subscription checks
4. **Rate Limiting**: Prevent abuse of free trial
5. **Payment Security**: Use PCI-compliant payment processors

## 🚀 Deployment

### Production Checklist
- [ ] Replace localStorage with database
- [ ] Implement server-side subscription validation
- [ ] Set up payment gateway (GCash/Stripe/PayPal)
- [ ] Add webhook handlers for payment callbacks
- [ ] Implement proper authentication
- [ ] Add analytics tracking
- [ ] Set up error monitoring
- [ ] Configure email notifications
- [ ] Test payment flows end-to-end
- [ ] Set up backup and recovery

## 📞 Support

For issues or questions:
1. Check this documentation
2. Review code comments in subscription.js
3. Test with the provided examples
4. Check browser console for errors

## 📄 License

This subscription system is part of Biyahero project.

## 🔄 Version History

- **v1.0.0** (2026-05-24): Initial release
  - Free trial system
  - Three plan tiers
  - Usage tracking
  - Modern glassmorphism UI
  - Backend-ready architecture
