/**
 * Subscription and Monetization Module
 * Manages user access, trial periods, payments, and advertisements
 * 
 * NEW: showPlanModal() — triggered by "Calculate Fare" button before showing results.
 *      Detects new vs returning users, surfaces plan cards, and gates the result.
 */

const SubscriptionManager = {
    TRIAL_DAYS_BASIC: 7,
    TRIAL_DAYS_PREMIUM: 30,
    PAYMENT_AMOUNT: 59,

    /* ───────── Core Data Helpers ───────── */

    initSubscription: function (email) {
        const userData = {
            email: email,
            registrationDate: new Date().toISOString(),
            trialEndDate: new Date(Date.now() + this.TRIAL_DAYS_PREMIUM * 24 * 60 * 60 * 1000).toISOString(),
            hasPaid: false,
            plan: 'free',          // 'free' | 'basic' | 'premium'
            paymentDate: null,
            subscriptionStatus: 'trial',
            adCount: 0,
            fareCalcCount: 0,      // track usage on free tier
            trialActivated: false  // has the user explicitly started their trial?
        };
        localStorage.setItem('biyahero_subscription_' + email, JSON.stringify(userData));
        return userData;
    },

    getSubscription: function (email) {
        const data = localStorage.getItem('biyahero_subscription_' + email);
        if (!data) return null;
        return JSON.parse(data);
    },

    saveSubscription: function (sub) {
        localStorage.setItem('biyahero_subscription_' + sub.email, JSON.stringify(sub));
    },

    hasAccess: function (email) {
        const sub = this.getSubscription(email);
        if (!sub) return false;

        // Active paid subscription
        if (sub.hasPaid && (sub.plan === 'basic' || sub.plan === 'premium')) {
            return true;
        }

        // Active trial
        if (sub.trialActivated) {
            const now = new Date();
            const trialEnd = new Date(sub.trialEndDate);
            return now < trialEnd;
        }

        return false;
    },

    getStatus: function (email) {
        const sub = this.getSubscription(email);
        if (!sub) return 'none';

        const now = new Date();
        const trialEnd = sub.trialEndDate ? new Date(sub.trialEndDate) : null;

        // Active paid subscription
        if (sub.hasPaid && (sub.plan === 'basic' || sub.plan === 'premium')) {
            return 'active';
        }

        // Active trial
        if (sub.trialActivated && trialEnd && now < trialEnd) {
            return 'trial';
        }

        // Expired trial or subscription
        if (sub.trialActivated && trialEnd && now >= trialEnd) {
            return 'expired';
        }

        // Never activated trial
        return 'new';
    },

    getTrialDaysRemaining: function (email) {
        const sub = this.getSubscription(email);
        if (!sub || sub.hasPaid) return 0;
        const now = new Date();
        const trialEnd = new Date(sub.trialEndDate);
        const diffDays = Math.ceil((trialEnd - now) / (1000 * 60 * 60 * 24));
        return Math.max(0, diffDays);
    },

    processPayment: function (email, plan) {
        const sub = this.getSubscription(email);
        if (!sub) return false;
        sub.hasPaid = true;
        sub.plan = plan || 'basic';
        sub.paymentDate = new Date().toISOString();
        sub.subscriptionStatus = 'active';
        this.saveSubscription(sub);
        return true;
    },

    activateTrial: function (email, plan = 'premium') {
        const sub = this.getSubscription(email);
        if (!sub || sub.trialActivated) return false;
        sub.trialActivated = true;
        const trialDays = plan === 'basic' ? this.TRIAL_DAYS_BASIC : this.TRIAL_DAYS_PREMIUM;
        sub.trialEndDate = new Date(Date.now() + trialDays * 24 * 60 * 60 * 1000).toISOString();
        sub.plan = plan; // Set the plan being trialed
        sub.subscriptionStatus = 'trial';
        this.saveSubscription(sub);
        return true;
    },

    /* ───────── PLAN MODAL (main new feature) ───────── */

    /**
     * Called when the user clicks "Calculate Fare".
     * @param {Function} onProceed — called when user should see the fare result
     */
    showPlanModalBeforeFare: function (onProceed) {
        const email = localStorage.getItem('biyahero_current_user');

        // If no email, create an anonymous guest entry so the flow works
        const guestEmail = email || ('guest_' + (localStorage.getItem('biyahero_guest_id') || this._createGuestId()));
        if (!email) localStorage.setItem('biyahero_current_user', guestEmail);

        let sub = this.getSubscription(guestEmail);
        if (!sub) sub = this.initSubscription(guestEmail);

        const status = this.getStatus(guestEmail);

        // Always show modal to display current plan status (even for active users)
        this._renderPlanModal(guestEmail, status, onProceed);
    },

    _createGuestId: function () {
        const id = 'guest_' + Math.random().toString(36).slice(2, 10);
        localStorage.setItem('biyahero_guest_id', id);
        return id;
    },

    _renderPlanModal: function (email, status, onProceed) {
        // Remove any existing
        const existing = document.getElementById('bh-plan-overlay');
        if (existing) existing.remove();

        const sub = this.getSubscription(email);
        const isNew = status === 'new' || status === 'none';
        const daysLeft = this.getTrialDaysRemaining(email);
        const currentPlan = sub ? sub.plan : null;

        // Helper function to generate plan card HTML
        const getPlanCard = (planType, planName, icon, price, features, isFeatured = false) => {
            const isActive = status === 'active' && currentPlan === planType;
            const isExpired = status === 'expired' && currentPlan === planType;
            const isTrial = status === 'trial';

            let badge = '';
            let buttonHtml = '';
            let noteHtml = '';
            let cardClass = `bh-plan-card bh-plan-card--${planType}`;
            let featuresHtml = '';

            // Add featured class
            if (isFeatured) cardClass += ' bh-plan-card--featured';

            // Free plan is always locked (no fare calculator access)
            if (planType === 'free') {
                cardClass += ' bh-plan-card--locked';
                badge = '<div class="bh-locked-overlay-tag">🔒 No Access</div>';
                buttonHtml = `<button class="bh-plan-btn bh-plan-btn--locked" disabled>
                    🔒 Fare Calculator Locked
                </button>`;
                noteHtml = `<div class="bh-plan-trial-note" style="color:#c53030;">Start a free trial or subscribe to calculate fares.</div>`;
            }
            // Add active highlight for paid plans
            else if (isActive) {
                cardClass += ' bh-plan-card--active';
                badge = '<div class="bh-active-badge">✅ This is your current subscription</div>';
                buttonHtml = `<button class="bh-plan-btn bh-plan-btn--active" onclick="SubscriptionManager._closePlanModal(); if(window._onProceed) window._onProceed();">
                    Continue to Calculator
                </button>`;
                noteHtml = `<div class="bh-plan-trial-note" style="color:#52B788;">Active subscription</div>`;
            } else if (isExpired) {
                badge = '<div class="bh-expired-badge">⚠️ Your subscription has expired</div>';
                buttonHtml = `<button class="bh-plan-btn bh-plan-btn--renew" onclick="SubscriptionManager._selectPaid('${email}', '${planType}', event)">
                    Renew Plan — ${price}
                </button>`;
                noteHtml = `<div class="bh-plan-trial-note" style="color:#c53030;">Renew to regain access</div>`;
            } else if (isNew && (planType === 'basic' || planType === 'premium')) {
                // New user - show trial on both Basic and Premium
                const trialDays = planType === 'basic' ? this.TRIAL_DAYS_BASIC : this.TRIAL_DAYS_PREMIUM;
                if (isFeatured) badge = '<div class="bh-featured-badge">⭐ Most Popular</div>';
                buttonHtml = `<button class="bh-plan-btn bh-plan-btn--${planType} bh-plan-btn--trial" onclick="SubscriptionManager._startTrial('${email}', event, '${planType}')">
                    Start ${trialDays}-Day Free Trial
                </button>`;
                noteHtml = `<div class="bh-plan-trial-note">No payment needed. Auto-expires after ${trialDays} days.</div>`;
            } else {
                // Subscribe now for other plans
                buttonHtml = `<button class="bh-plan-btn bh-plan-btn--${planType}" onclick="SubscriptionManager._selectPaid('${email}', '${planType}', event)">
                    Subscribe Now — ${price}
                </button>`;
            }

            // Generate features list
            featuresHtml = features.map(f => {
                const isOk = f.available;
                return `<li class="${isOk ? 'ok' : 'no'}">${isOk ? '✓' : '✗'} ${f.text}</li>`;
            }).join('');

            return `
                <div class="${cardClass}" data-plan="${planType}">
                    ${badge}
                    <div class="bh-plan-card-header">
                        <span class="bh-plan-icon">${icon}</span>
                        <div>
                            <div class="bh-plan-name">${planName}</div>
                            <div class="bh-plan-label">${planType === 'free' ? 'Free' : planType === 'basic' ? '7 days trial' : '1 month trial'}</div>
                            <div class="bh-plan-price">${price}</div>
                        </div>
                    </div>
                    <ul class="bh-plan-features">
                        ${featuresHtml}
                    </ul>
                    ${buttonHtml}
                    ${noteHtml}
                </div>
            `;
        };

        // Plan features
        const freeFeatures = [
            { text: 'Fare Calculator locked', available: false },
            { text: 'No route access', available: false },
            { text: 'No commute planner', available: false },
            { text: 'No priority results', available: false },
            { text: 'Ads shown', available: false }
        ];

        const basicFeatures = [
            { text: 'Unlimited fare calculations', available: true },
            { text: 'All routes unlocked', available: true },
            { text: 'Commute planner', available: true },
            { text: 'Priority results', available: false },
            { text: 'Still shows ads', available: false }
        ];

        const premiumFeatures = [
            { text: 'Everything in Basic', available: true },
            { text: 'No ads — ever', available: true },
            { text: 'Priority fare results', available: true },
            { text: 'Advanced analytics', available: true },
            { text: 'Offline access', available: true }
        ];

        const overlay = document.createElement('div');
        overlay.id = 'bh-plan-overlay';
        overlay.className = 'bh-plan-overlay';

        // Determine hero text based on status
        let heroTitle = 'Choose your plan to see your fare';
        let heroSubtitle = 'Select a plan to continue using the Fare Calculator.';

        if (status === 'active') {
            heroTitle = 'Your subscription is active';
            heroSubtitle = `You're currently on the ${currentPlan.charAt(0).toUpperCase() + currentPlan.slice(1)} plan. Enjoy full access!`;
        } else if (status === 'trial') {
            heroTitle = 'Your free trial is active';
            heroSubtitle = `${daysLeft} days remaining in your trial. Subscribe now to keep access after it ends.`;
        } else if (status === 'expired') {
            heroTitle = 'Your subscription has expired';
            heroSubtitle = 'Renew your plan to continue accessing all features.';
        } else if (isNew) {
            heroTitle = 'Start your free trial today';
            heroSubtitle = 'Try Basic for 7 days or Premium for 30 days — no credit card required.';
        }

        overlay.innerHTML = `
            <div class="bh-plan-modal" role="dialog" aria-modal="true" aria-labelledby="bh-plan-title">

                <!-- Header -->
                <div class="bh-plan-header">
                    <div class="bh-plan-header-left">
                        <div class="bh-plan-logo">Biya<span>hero</span></div>
                        ${status === 'trial'
                            ? `<div class="bh-trial-pill bh-trial-pill--active">⏰ ${daysLeft} Days Left in Trial</div>`
                            : status === 'active'
                            ? `<div class="bh-trial-pill bh-trial-pill--active">✅ Active Subscription</div>`
                            : isNew
                            ? `<div class="bh-trial-pill">🎉 Free Trials Available</div>`
                            : `<div class="bh-trial-pill bh-trial-pill--expired">⚠️ Subscription Expired</div>`
                        }
                    </div>
                    <button class="bh-plan-close" onclick="SubscriptionManager._closePlanModal()" aria-label="Close">&#x2715;</button>
                </div>

                <!-- Hero text -->
                <div class="bh-plan-hero">
                    <h2 id="bh-plan-title">${heroTitle}</h2>
                    <p>${heroSubtitle}</p>
                </div>

                <!-- Plan Cards -->
                <div class="bh-plans-grid">
                    ${getPlanCard('free', 'Free', '🚶', '₱0', freeFeatures)}
                    ${getPlanCard('basic', 'Basic', '🚎', '₱59', basicFeatures)}
                    ${getPlanCard('premium', 'Premium', '🚀', '₱129', premiumFeatures, true)}
                </div>

                ${isNew ? `
                <!-- Trial info for new users -->
                <div class="bh-trial-footer">
                    <p style="font-size:13px;color:#6B6560;margin-bottom:8px;">
                        <strong>Basic:</strong> 7-day trial • <strong>Premium:</strong> 30-day trial
                    </p>
                    <div class="bh-trial-bar-wrap">
                        <div class="bh-trial-bar-fill" style="width:100%"></div>
                    </div>
                    <div class="bh-trial-bar-label">No payment required. Cancel anytime.</div>
                </div>` : ''}

            </div>
        `;

        document.body.appendChild(overlay);
        document.body.style.overflow = 'hidden';

        // Store callback globally for button access
        window._onProceed = onProceed;

        // Animate in
        requestAnimationFrame(() => overlay.classList.add('bh-plan-overlay--visible'));

        // Close on backdrop click
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                SubscriptionManager._closePlanModal();
            }
        });
    },

    _closePlanModal: function () {
        const overlay = document.getElementById('bh-plan-overlay');
        if (overlay) {
            overlay.classList.remove('bh-plan-overlay--visible');
            setTimeout(() => {
                overlay.remove();
                document.body.style.overflow = '';
            }, 320);
        }
    },

    _startTrial: function (email, event, plan = 'premium') {
        if (event) event.preventDefault();
        this.activateTrial(email, plan);
        const cb = window._onProceed;
        this._closePlanModal();
        this._showTrialActivatedBanner(plan);
        if (cb) setTimeout(cb, 400);
    },

    _selectFree: function (email, event) {
        // Free tier cannot access the Fare Calculator — button is disabled.
        // This method is kept but intentionally does NOT proceed to the result.
        if (event) event.preventDefault();
    },

    _selectPaid: function (email, plan, event) {
        if (event) event.preventDefault();
        const cb = window._onProceed;

        // Show processing state on button
        const btn = event && event.target;
        if (btn) {
            btn.innerHTML = '<span class="bh-spinner"></span> Processing…';
            btn.disabled = true;
        }

        setTimeout(() => {
            this.processPayment(email, plan);
            this._closePlanModal();
            this.showPaymentSuccess(plan);
            this.updateStatusIndicator(email);
            if (cb) setTimeout(cb, 2200);
        }, 1600);
    },

    _showTrialActivatedBanner: function (plan = 'premium') {
        const trialDays = plan === 'basic' ? this.TRIAL_DAYS_BASIC : this.TRIAL_DAYS_PREMIUM;
        const planName = plan.charAt(0).toUpperCase() + plan.slice(1);
        const banner = document.createElement('div');
        banner.className = 'bh-trial-banner';
        banner.innerHTML = `
            <div class="bh-trial-banner-inner">
                <span class="bh-trial-banner-icon">🎉</span>
                <div>
                    <strong>${trialDays}-Day ${planName} Trial Activated!</strong>
                    <span>You now have full ${planName} access. Enjoy unlimited fare calculations.</span>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" aria-label="Dismiss">&#x2715;</button>
            </div>
        `;
        document.body.prepend(banner);
        setTimeout(() => banner.classList.add('bh-trial-banner--visible'), 50);
        setTimeout(() => {
            banner.classList.remove('bh-trial-banner--visible');
            setTimeout(() => banner.remove(), 400);
        }, 5000);
    },

    /* ───────── Trial Countdown Widget ───────── */

    getTrialCountdownHTML: function (email) {
        const sub = this.getSubscription(email);
        if (!sub) return '';
        
        const days = this.getTrialDaysRemaining(email);
        const totalDays = sub.plan === 'basic' ? this.TRIAL_DAYS_BASIC : this.TRIAL_DAYS_PREMIUM;
        const pct = Math.round((days / totalDays) * 100);
        const urgency = days <= 3 ? 'urgent' : days <= 5 ? 'warn' : '';
        return `
            <div class="bh-countdown ${urgency}">
                <div class="bh-countdown-label">${sub.plan.charAt(0).toUpperCase() + sub.plan.slice(1)} trial ends in <strong>${days} day${days !== 1 ? 's' : ''}</strong></div>
                <div class="bh-countdown-bar"><div class="bh-countdown-fill" style="width:${pct}%"></div></div>
            </div>
        `;
    },

    /* ───────── Legacy / Existing Methods (preserved) ───────── */

    checkAccessAndShowPayment: function (email) {
        if (!this.hasAccess(email)) {
            const status = this.getStatus(email);
            if (status === 'expired') {
                this.showPaymentModal();
                return false;
            }
        }
        return true;
    },

    showPaymentModal: function () {
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
                    <p>Your free trial has ended. Subscribe to continue accessing all features.</p>
                    <div class="payment-price">
                        <span class="price-amount">₱59</span>
                        <span class="price-label">Subscribe now</span>
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

    closePaymentModal: function () {
        const modal = document.querySelector('.payment-overlay');
        if (modal) {
            modal.remove();
            document.body.style.overflow = '';
        }
    },

    simulatePayment: function () {
        const email = localStorage.getItem('biyahero_current_user');
        if (!email) { alert('Please login first'); return; }
        const btn = document.querySelector('.pay-btn');
        btn.innerHTML = '<span class="spinner"></span> Processing...';
        btn.disabled = true;
        setTimeout(() => {
            this.processPayment(email, 'basic');
            this.closePaymentModal();
            this.showPaymentSuccess('basic');
            setTimeout(() => location.reload(), 2000);
        }, 1500);
    },

    showPaymentSuccess: function (plan) {
        const planLabel = plan === 'premium' ? 'Premium' : 'Basic';
        const existing = document.querySelector('.payment-overlay.success-overlay');
        if (existing) existing.remove();
        const modal = document.createElement('div');
        modal.className = 'payment-overlay success-overlay';
        modal.innerHTML = `
            <div class="payment-modal success-modal">
                <div class="success-icon">✓</div>
                <h2>Welcome to ${planLabel}!</h2>
                <p>You now have full access to all Biyahero features. Thank you for your support!</p>
                <button class="continue-btn" onclick="SubscriptionManager.closePaymentModal()">Continue</button>
            </div>
        `;
        document.body.appendChild(modal);
        setTimeout(() => {
            modal.remove();
            document.body.style.overflow = '';
        }, 3500);
    },

    showAdvertisement: function () {
        const email = localStorage.getItem('biyahero_current_user');
        const sub = email ? this.getSubscription(email) : null;
        if (!sub) return;
        if (sub.hasPaid && sub.plan === 'premium') return; // no ads for premium
        sub.adCount++;
        this.saveSubscription(sub);
        if (sub.adCount % 3 === 0) this.showAdModal();
    },

    showAdModal: function () {
        const ads = [
            { title: 'Earn Extra Income!', content: 'Discover flexible earning opportunities with delivery services. Work on your own schedule.', type: 'earning' },
            { title: 'Commute Smart, Save More', content: 'Download our partner app for exclusive discounts on transportation.', type: 'promo' },
            { title: 'SJDM Community Update', content: 'New routes added! Check out the updated terminal schedules for faster commutes.', type: 'info' }
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
        let countdown = 5;
        const timer = setInterval(() => {
            countdown--;
            const timerEl = modal.querySelector('.ad-timer');
            if (timerEl) timerEl.textContent = `Closing in ${countdown}s...`;
            if (countdown <= 0) { clearInterval(timer); this.closeAdModal(); }
        }, 1000);
    },

    closeAdModal: function () {
        const modal = document.querySelector('.ad-overlay');
        if (modal) modal.remove();
    },

    updateStatusIndicator: function (email) {
        const status = this.getStatus(email);
        const indicator = document.querySelector('.subscription-status');
        if (!indicator) return;
        const daysRemaining = this.getTrialDaysRemaining(email);
        if (status === 'active') {
            const sub = this.getSubscription(email);
            const plan = sub && sub.plan ? sub.plan.charAt(0).toUpperCase() + sub.plan.slice(1) : 'Premium';
            indicator.innerHTML = `<span class="status-badge active">✓ ${plan} Access</span>`;
        } else if (status === 'trial') {
            indicator.innerHTML = `<span class="status-badge trial">⏰ Trial: ${daysRemaining}d left</span>`;
        } else if (status === 'expired') {
            indicator.innerHTML = '<span class="status-badge expired">🔒 Trial Expired</span>';
        } else {
            indicator.innerHTML = '<span class="status-badge trial">✨ Free</span>';
        }
    }
};

/* ───────── Fare Calculator Integration ───────── */

/**
 * Patches the Calculate Fare button to intercept clicks and show the plan modal.
 * The actual fare calculation runs as the `onProceed` callback after the user
 * selects a plan (or chooses the free tier).
 *
 * This function is called at the bottom of the page's own DOMContentLoaded
 * handler — or call it manually after the page JS has set up the calcBtn listener.
 */
function patchFareCalculatorWithSubscription() {
    const calcBtn = document.getElementById('calcBtn');
    if (!calcBtn) return;

    // Clone the button to strip existing listeners, then re-attach with wrapper
    const newBtn = calcBtn.cloneNode(true);
    calcBtn.parentNode.replaceChild(newBtn, calcBtn);

    newBtn.addEventListener('click', function () {
        // Pull inputs before the modal opens (values won't change while modal is open)
        const from = document.getElementById('calcFrom').value;
        const to = document.getElementById('calcTo').value;

        if (!from || !to) { alert('Please select both origin and destination!'); return; }

        SubscriptionManager.showPlanModalBeforeFare(function () {
            // --- Actual fare calculation logic (mirrors original calcBtn handler) ---
            const mode = document.getElementById('calcMode').value;
            const trip = parseInt(document.getElementById('calcTrip').value);
            const pax = parseInt(document.getElementById('paxCount').textContent) || 1;

            if (from === to) {
                document.getElementById('calcResult').innerHTML =
                    '<div class="calc-placeholder"><span>😅</span><p>Origin and destination are the same.</p></div>';
                return;
            }

            // Re-use existing fareMatrix (defined in index.html)
            let data = window.fareMatrix && fareMatrix[from] && fareMatrix[from][to] && fareMatrix[from][to][mode];

            if (!data) {
                const rev = window.fareMatrix && fareMatrix[to] && fareMatrix[to][from] && fareMatrix[to][from][mode];
                if (rev) {
                    data = { base: rev.base, range: rev.range, time: rev.time, steps: [...rev.steps].reverse() };
                } else {
                    const pair = (window.fareMatrix && ((fareMatrix[from] && fareMatrix[from][to]) || (fareMatrix[to] && fareMatrix[to][from])));
                    const anyMode = pair && (pair.jeepney || pair.tricycle || pair.multicab || pair.bus || pair.uv);
                    const mult = { jeepney: 1, tricycle: 2.5, multicab: 1.4, bus: 1.8, uv: 1.6 };
                    let base, range, time, steps;
                    if (anyMode) {
                        const jeepBase = pair.jeepney ? pair.jeepney.base : anyMode.base;
                        base = Math.round(jeepBase * (mult[mode] || 1));
                        range = '₱' + Math.round(base * 0.85) + '–' + Math.round(base * 1.25);
                        time = anyMode.time || '20–35 min';
                        steps = [anyMode.steps ? anyMode.steps[0] : from + ' → ' + to];
                    } else {
                        const defaults = { jeepney: { base: 18, lo: 15, hi: 25, time: '20–35 min' }, tricycle: { base: 45, lo: 38, hi: 58, time: '18–30 min' }, multicab: { base: 22, lo: 18, hi: 28, time: '18–30 min' }, bus: { base: 32, lo: 28, hi: 40, time: '25–45 min' }, uv: { base: 28, lo: 24, hi: 35, time: '22–40 min' } };
                        const d = defaults[mode] || defaults.jeepney;
                        base = d.base; range = '₱' + d.lo + '–₱' + d.hi; time = d.time;
                        steps = [from.replace(/_/g, ' ') + ' → ' + to.replace(/_/g, ' ')];
                    }
                    data = { base, range, time, steps, estimated: true };
                }
            }

            const modeName = mode === 'bus' ? '🚌 Bus (A/C)' : mode === 'uv' ? '🚐 UV Express' : mode === 'tricycle' ? '🛺 Tricycle' : mode === 'multicab' ? '🚐 Multicab' : '🚎 Jeepney';
            const fromName = document.getElementById('calcFrom').options[document.getElementById('calcFrom').selectedIndex].text;
            const toName = document.getElementById('calcTo').options[document.getElementById('calcTo').selectedIndex].text;

            const cMapsOrigin = encodeURIComponent(fromName + ', San Jose del Monte, Bulacan, Philippines');
            const cMapsDest = encodeURIComponent(toName + ', San Jose del Monte, Bulacan, Philippines');
            const cMapsUrl = 'https://www.google.com/maps/dir/?api=1&origin=' + cMapsOrigin + '&destination=' + cMapsDest + '&travelmode=transit';
            const cMapsBtn = '<a href="' + cMapsUrl + '" target="_blank" rel="noopener" class="maps-btn" style="margin-top:16px"><svg width="20" height="20" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24 4C15.163 4 8 11.163 8 20c0 13 16 24 16 24s16-11 16-24c0-8.837-7.163-16-16-16z" fill="#EA4335"/><circle cx="24" cy="20" r="6" fill="#fff"/></svg>Open in Google Maps</a>';
            const summaryCards = '<div class="plan-summary" style="margin-top:16px"><div class="plan-sum-item"><span>Est. Fare</span><strong>' + data.range + '</strong></div><div class="plan-sum-item"><span>Total Time</span><strong>' + data.time + '</strong></div><div class="plan-sum-item"><span>Passengers</span><strong>' + pax + (trip === 2 ? ' (RT)' : '') + '</strong></div></div>';
            const estimatedNote = data.estimated ? '<div style="font-size:12px;color:var(--sky);background:rgba(41,169,225,0.08);border:1px solid rgba(41,169,225,0.2);border-radius:8px;padding:7px 12px;margin-bottom:12px;">📊 Estimated based on nearby route data — actual fare may vary slightly.</div>' : '';

            // Subscription badge appended to result
            const email = localStorage.getItem('biyahero_current_user');
            const status = email ? SubscriptionManager.getStatus(email) : 'free';
            const trialBadge = status === 'trial'
                ? '<div class="bh-result-trial-badge">⏰ ' + SubscriptionManager.getTrialDaysRemaining(email) + ' trial days remaining — <a href="#" onclick="SubscriptionManager.showPaymentModal();return false;">Upgrade now</a></div>'
                : '';

            document.getElementById('calcResult').innerHTML =
                '<div class="result-output">' +
                '<div class="result-route-lbl">' + fromName + ' <span style="color:var(--muted)">\u2192</span> ' + toName + '</div>' +
                trialBadge + estimatedNote +
                '<div class="result-rows">' +
                '<div class="result-row"><span class="result-row-lbl">Mode</span><span class="result-row-val">' + modeName + '</span></div>' +
                '<div class="result-row"><span class="result-row-lbl">Base Fare (1 person)</span><span class="result-row-val">' + data.range + '</span></div>' +
                '<div class="result-row"><span class="result-row-lbl">Passengers</span><span class="result-row-val">' + pax + '</span></div>' +
                '<div class="result-row"><span class="result-row-lbl">Trip Type</span><span class="result-row-val">' + (trip === 2 ? 'Round Trip' : 'One-way') + '</span></div>' +
                '<div class="result-row"><span class="result-row-lbl">Est. Travel Time</span><span class="result-row-val">' + data.time + '</span></div>' +
                '<div class="result-row"><span class="result-row-lbl">Route</span><span class="result-row-val" style="font-size:12px">' + data.steps.join(' \u2192 ') + '</span></div>' +
                '</div>' +
                '<div class="result-total"><span class="result-total-lbl">Estimated Total (' + pax + ' pax' + (trip === 2 ? ', round trip' : '') + ')</span><span class="result-total-val">~\u20b1' + (data.base * pax * trip).toLocaleString() + '</span></div>' +
                summaryCards + cMapsBtn + '</div>';

            // Scroll to result
            document.getElementById('calcResult').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        });
    });
}

/* ───────── Init ───────── */

document.addEventListener('DOMContentLoaded', function () {
    const currentUser = localStorage.getItem('biyahero_current_user');
    if (currentUser) {
        SubscriptionManager.updateStatusIndicator(currentUser);
        setTimeout(() => { SubscriptionManager.showAdvertisement(); }, 3000);
    }

    // Patch the fare calculator button
    patchFareCalculatorWithSubscription();
});