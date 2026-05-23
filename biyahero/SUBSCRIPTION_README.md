# Subscription and Monetization Module

## Overview

The Subscription and Monetization Module is designed to manage user access, simulate revenue generation, and enhance overall user engagement for the Biyahero commuting guide system.

## Features

### 1. Free Trial Access
- **Basic Plan**: 7 days of unrestricted access
- **Premium Plan**: 30 days of unrestricted access
- **Automatic Activation**: Applied to all newly registered users
- **Full Feature Access**: Users can explore all system features during trial period

### 2. Subscription Payment
- **Cost**: ₱59 (Basic) / ₱129 (Premium)
- **Type**: One-time payment after trial
- **Access Restoration**: Full access restored immediately after payment
- **Payment Simulation**: Educational/demo payment flow

### 3. Access Restriction
- **Trial Expiration**: Core functionalities restricted after trial period
- **Payment Gateway**: Modal prompts for payment when access expires
- **Status Tracking**: Real-time subscription status monitoring

### 4. Advertisement Integration
- **Pop-up Ads**: Displayed periodically to simulate revenue generation
- **Ad Types**:
  - Earning opportunities
  - Promotional content
  - Informational content
- **Frequency**: Shows every 3 page views for non-paid users
- **Auto-close**: Ads automatically close after 5 seconds

## File Structure

```
biyahero/
├── js/
│   └── subscription.js          # Core subscription management logic
├── css/
│   └── subscription.css         # Styles for modals and UI components
├── login/
│   └── login.html               # Registration/login integration
└── index.html                   # Main app with subscription checks
```

## Implementation Details

### SubscriptionManager Object

The `SubscriptionManager` object in `js/subscription.js` handles all subscription-related operations:

#### Key Methods

- `initSubscription(email)` - Initializes subscription for new users
- `getSubscription(email)` - Retrieves user subscription data
- `hasAccess(email)` - Checks if user has active access
- `getStatus(email)` - Returns subscription status (trial, active, expired)
- `getTrialDaysRemaining(email)` - Returns days left in trial
- `processPayment(email)` - Processes lifetime payment
- `showPaymentModal()` - Displays payment modal
- `showAdvertisement()` - Displays pop-up advertisement
- `updateStatusIndicator(email)` - Updates UI status badge

### Data Storage

All subscription data is stored in `localStorage` with the following structure:

```javascript
{
  email: "user@example.com",
  registrationDate: "2025-01-15T00:00:00.000Z",
  trialEndDate: "2025-02-15T00:00:00.000Z",
  hasPaid: false,
  paymentDate: null,
  subscriptionStatus: "trial",
  adCount: 0
}
```

### Integration Points

#### 1. Registration Flow (`login/login.html`)
- When a new user registers, `SubscriptionManager.initSubscription(email)` is called
- Sets trial end date to 30 days from registration
- Stores current user email in localStorage

#### 2. Login Flow (`login/login.html`)
- Sets current user email in localStorage on successful login
- Enables subscription status checking

#### 3. Main Application (`index.html`)
- On page load, checks subscription status
- Updates navbar with status indicator
- Shows payment modal if access has expired
- Displays logout button for logged-in users
- Shows advertisements periodically

## User Experience

### New User Flow
1. User registers for account
2. Automatic 30-day free trial activation
3. Full access to all features
4. Status badge shows "Trial: X days left"

### Trial Expiration Flow
1. Trial period ends after 30 days
2. Access to core features is restricted
3. Payment modal appears on page load
4. User can pay ₱59 to restore access
5. Status badge changes to "Trial Expired"

### Paid User Flow
1. User completes payment
2. Full access immediately restored
3. Status badge shows "Premium Access"
4. No advertisements displayed
5. No further payment required

## UI Components

### Status Badge
Located in the navbar, displays current subscription status:
- **Green (Active)**: "✓ Premium Access" - Paid user
- **Gold (Trial)**: "⏰ Trial: X days left" - Free trial user
- **Red (Expired)**: "🔒 Trial Expired" - Trial ended, payment required

### Payment Modal
- Appears when trial expires
- Shows payment amount (₱59)
- Lists included features
- Simulates payment processing
- Displays success confirmation

### Advertisement Modal
- Pop-up with promotional content
- Auto-closes after 5 seconds
- Manual close button available
- Only shown to non-paid users

## Customization

### Adjust Trial Period
Edit trial duration constants in `js/subscription.js`:
```javascript
TRIAL_DAYS_BASIC: 7,   // Basic plan trial duration
TRIAL_DAYS_PREMIUM: 30, // Premium plan trial duration
```

### Adjust Payment Amount
Edit `PAYMENT_AMOUNT` in `js/subscription.js`:
```javascript
PAYMENT_AMOUNT: 59, // Change to desired amount
```

### Adjust Advertisement Frequency
Edit the ad count check in `showAdvertisement()`:
```javascript
if (sub.adCount % 3 === 0) { // Change 3 to desired frequency
    this.showAdModal();
}
```

## Testing

### Test Free Trial
1. Register a new account
2. Verify status badge shows trial days remaining
3. Check localStorage for subscription data

### Test Payment Flow
1. Modify trial end date in localStorage to past date
2. Refresh page
3. Payment modal should appear
4. Complete payment simulation
5. Verify status changes to "Premium Access"

### Test Advertisements
1. Ensure user has not paid
2. Navigate between pages 3+ times
3. Advertisement modal should appear
4. Verify auto-close after 5 seconds

## Security Notes

- This is a client-side implementation using localStorage
- Not suitable for production environments requiring real payment processing
- Payment simulation is for educational/demonstration purposes only
- In production, integrate with actual payment gateway (e.g., Stripe, PayPal)
- Implement server-side validation for production use

## Browser Compatibility

- Modern browsers with localStorage support
- ES6+ JavaScript features
- CSS3 animations and transitions

## Future Enhancements

- Integration with real payment gateway
- Server-side subscription validation
- Subscription tiers (Basic, Premium, Enterprise)
- Recurring subscription options
- Analytics dashboard for subscription metrics
- Email notifications for trial expiration
- Discount codes and promotions

## Support

For issues or questions about the subscription module, please refer to the main Biyahero project documentation.
