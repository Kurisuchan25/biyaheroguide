/**
 * Subscription and Monetization Module
 * Manages user access, trial periods, payments, and advertisements
 */

const SubscriptionManager = {
    TRIAL_DAYS: 30,
    PAYMENT_AMOUNT: 59,
    
    // Initialize subscription for a new user
    initSubscription: function(email) {
        const userData = {
            email: email,
            registrationDate: new Date().toISOString(),
            trialEndDate: new Date(Date.now() + this.TRIAL_DAYS * 24 * 60 * 60 * 1000).toISOString(),
            hasPaid: false,
            paymentDate: null,
            subscriptionStatus: 'trial', // trial, expired, active
            adCount: 0
        };
        localStorage.setItem('biyahero_subscription_' + email, JSON.stringify(userData));
        return userData;
    },
    
    // Get user subscription data
    getSubscription: function(email) {
        const data = localStorage.getItem('biyahero_subscription_' + email);
        if (!data) return null;
        return JSON.parse(data);
    },
    
    // Check if user has active access
    hasAccess: function(email) {
        const sub = this.getSubscription(email);
        if (!sub) return false;
        
        const now = new Date();
        const trialEnd = new Date(sub.trialEndDate);
        
        // If user has paid, they have access
        if (sub.hasPaid) return true;
        
        // If still in trial period, they have access
        if (now < trialEnd) return true;
        
        // Trial expired and not paid
        return false;
    },
    
    // Get subscription status
    getStatus: function(email) {
        const sub = this.getSubscription(email);
        if (!sub) return 'none';
        
        const now = new Date();
        const trialEnd = new Date(sub.trialEndDate);
        
        if (sub.hasPaid) return 'active';
        if (now < trialEnd) return 'trial';
        return 'expired';
    },
    
    // Get days remaining in trial
    getTrialDaysRemaining: function(email) {
        const sub = this.getSubscription(email);
        if (!sub || sub.hasPaid) return 0;
        
        const now = new Date();
        const trialEnd = new Date(sub.trialEndDate);
        const diffTime = trialEnd - now;
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        return Math.max(0, diffDays);
    },
    
    // Process payment
    processPayment: function(email) {
        const sub = this.getSubscription(email);
        if (!sub) return false;
        
        sub.hasPaid = true;
        sub.paymentDate = new Date().toISOString();
        sub.subscriptionStatus = 'active';
        
        localStorage.setItem('biyahero_subscription_' + email, JSON.stringify(sub));
        return true;
    },
    
    // Show payment modal if access is restricted
    checkAccessAndShowPayment: function(email) {
        if (!this.hasAccess(email)) {
            const status = this.getStatus(email);
            if (status === 'expired') {
                this.showPaymentModal();
                return false;
            }
        }
        return true;
    },
    
    // Show payment modal
    showPaymentModal: function() {
        const modal = document.createElement('div');
        modal.className = 'payment-overlay';
        modal.innerHTML = `
            <div class="payment-modal">
                <div class="payment-header">
                    <h2>🔒 Trial Period Expired</h2>
                    <button class="close-modal" onclick="SubscriptionManager.closePaymentModal()">&times;</button>
                </div>
                <div class="payment-body">
                    <div class="trial-expired-icon">⏰</div>
                    <p>Your 1-month free trial has ended. Continue accessing all features with a one-time payment.</p>
                    <div class="payment-price">
                        <span class="price-amount">₱59</span>
                        <span class="price-label">One-time payment</span>
                    </div>
                    <ul class="payment-features">
                        <li>✓ Full access to all routes and features</li>
                        <li>✓ Fare calculator</li>
                        <li>✓ Commute planner</li>
                        <li>✓ No recurring charges</li>
                    </ul>
                    <button class="pay-btn" onclick="SubscriptionManager.simulatePayment()">Pay ₱59</button>
                    <p class="payment-note">This is a simulation for educational purposes</p>
                </div>
            </div>
        `;
        document.body.appendChild(modal);
        document.body.style.overflow = 'hidden';
    },
    
    // Close payment modal
    closePaymentModal: function() {
        const modal = document.querySelector('.payment-overlay');
        if (modal) {
            modal.remove();
            document.body.style.overflow = '';
        }
    },
    
    // Simulate payment process
    simulatePayment: function() {
        const email = localStorage.getItem('biyahero_current_user');
        if (!email) {
            alert('Please login first');
            return;
        }
        
        const btn = document.querySelector('.pay-btn');
        btn.innerHTML = '<span class="spinner"></span> Processing...';
        btn.disabled = true;
        
        setTimeout(() => {
            this.processPayment(email);
            this.closePaymentModal();
            this.showPaymentSuccess();
            // Refresh page to update access
            setTimeout(() => location.reload(), 2000);
        }, 1500);
    },
    
    // Show payment success
    showPaymentSuccess: function() {
        const modal = document.createElement('div');
        modal.className = 'payment-overlay success-overlay';
        modal.innerHTML = `
            <div class="payment-modal success-modal">
                <div class="success-icon">✓</div>
                <h2>Payment Successful!</h2>
                <p>You now have full access to all Biyahero features. Thank you for your support!</p>
                <button class="continue-btn" onclick="SubscriptionManager.closePaymentModal()">Continue</button>
            </div>
        `;
        document.body.appendChild(modal);
    },
    
    // Advertisement system
    showAdvertisement: function() {
        const sub = this.getSubscription(localStorage.getItem('biyahero_current_user'));
        if (!sub) return;
        
        // Don't show ads if user has paid
        if (sub.hasPaid) return;
        
        // Increment ad count
        sub.adCount++;
        localStorage.setItem('biyahero_subscription_' + sub.email, JSON.stringify(sub));
        
        // Show ad every 3 page views
        if (sub.adCount % 3 === 0) {
            this.showAdModal();
        }
    },
    
    // Show advertisement modal
    showAdModal: function() {
        const ads = [
            {
                title: "Earn Extra Income!",
                content: "Discover flexible earning opportunities with delivery services. Work on your own schedule.",
                type: "earning"
            },
            {
                title: "Commute Smart, Save More",
                content: "Download our partner app for exclusive discounts on transportation.",
                type: "promo"
            },
            {
                title: "SJDM Community Update",
                content: "New routes added! Check out the updated terminal schedules for faster commutes.",
                type: "info"
            }
        ];
        
        const ad = ads[Math.floor(Math.random() * ads.length)];
        
        const modal = document.createElement('div');
        modal.className = 'ad-overlay';
        modal.innerHTML = `
            <div class="ad-modal">
                <div class="ad-header">
                    <span class="ad-badge">${ad.type.toUpperCase()}</span>
                    <button class="close-ad" onclick="SubscriptionManager.closeAdModal()">&times;</button>
                </div>
                <div class="ad-body">
                    <h3>${ad.title}</h3>
                    <p>${ad.content}</p>
                    <div class="ad-footer">
                        <span class="ad-timer">Closing in 5s...</span>
                        <button class="ad-close-btn" onclick="SubscriptionManager.closeAdModal()">Close Ad</button>
                    </div>
                </div>
            </div>
        `;
        document.body.appendChild(modal);
        
        // Auto-close after 5 seconds
        let countdown = 5;
        const timer = setInterval(() => {
            countdown--;
            const timerEl = modal.querySelector('.ad-timer');
            if (timerEl) timerEl.textContent = `Closing in ${countdown}s...`;
            
            if (countdown <= 0) {
                clearInterval(timer);
                this.closeAdModal();
            }
        }, 1000);
    },
    
    // Close ad modal
    closeAdModal: function() {
        const modal = document.querySelector('.ad-overlay');
        if (modal) {
            modal.remove();
        }
    },
    
    // Update subscription status indicator in UI
    updateStatusIndicator: function(email) {
        const status = this.getStatus(email);
        const indicator = document.querySelector('.subscription-status');
        
        if (!indicator) return;
        
        const daysRemaining = this.getTrialDaysRemaining(email);
        
        if (status === 'active') {
            indicator.innerHTML = '<span class="status-badge active">✓ Premium Access</span>';
        } else if (status === 'trial') {
            indicator.innerHTML = `<span class="status-badge trial">⏰ Trial: ${daysRemaining} days left</span>`;
        } else {
            indicator.innerHTML = '<span class="status-badge expired">🔒 Trial Expired</span>';
        }
    }
};

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    const currentUser = localStorage.getItem('biyahero_current_user');
    if (currentUser) {
        SubscriptionManager.updateStatusIndicator(currentUser);
        
        // Show ads periodically
        setTimeout(() => {
            SubscriptionManager.showAdvertisement();
        }, 3000);
    }
});
