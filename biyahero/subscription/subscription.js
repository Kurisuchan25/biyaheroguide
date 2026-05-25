/**
 * ============================================================
 * BIYAHERO — Subscription Manager v2
 * Complete SaaS Subscription Flow + Fare Calculator Integration
 * ============================================================
 *
 * FLOW LOGIC:
 *   1. First-time user → show subscription modal (Free Trial + Paid Plans)
 *   2. After Free Trial → hasUsedFreeTrial = true (permanent, survives refresh/logout)
 *   3. Expired trial / expired sub → redirect to subscription.php (no second trial)
 *   4. Active sub → fare calculator runs normally
 */

const SubscriptionManager = (function () {

    // ─────────────────────────────────────────────
    // CONSTANTS
    // ─────────────────────────────────────────────

    const STORAGE_KEY_PREFIX = 'biyahero_subscription_v2';
    const TOAST_STACK = [];

    // ─── Per-user storage key ───────────────────────
    // Call SubscriptionManager.setUser(userId) right after
    // the user logs in so every user gets their own state.
    let _userId = null;

    function _storageKey() {
        // If a userId was supplied (e.g. email or DB id), scope the key to that user.
        // Falls back to the legacy key so existing anonymous sessions keep working.
        return _userId
            ? `${STORAGE_KEY_PREFIX}_${_userId}`
            : STORAGE_KEY_PREFIX;
    }

    /**
     * Call this once after you know who is logged in.
     * e.g.  SubscriptionManager.setUser(currentUser.id || currentUser.email)
     *
     * This reloads state from the correct per-user bucket so a new
     * registrant starts fresh (no free trial used) even if someone
     * else already used one on the same browser.
     */
    function setUser(userId) {
        if (!userId) return;
        // Normalise: lowercase, strip spaces so "Juan@Email.com" === "juan@email.com"
        _userId = String(userId).toLowerCase().trim();
        _load();          // reload from the user-specific key
        _refreshUI();
    }
    const SUBSCRIPTION_PAGE = (() => {
        // Auto-detect: if we're already on subscription.php, stay; otherwise go to subscription/subscription.php
        const path = window.location.pathname;
        if (path.includes('subscription.php')) return window.location.href;
        return 'subscription/subscription.php';
    })();

    const PLANS = {
        free_trial: {
            id: 'free_trial',
            name: 'Free Trial',
            icon: '🎁',
            badge: 'TRIAL',
            price: 0,
            monthlyPrice: 0,
            yearlyPrice: 0,
            durationDays: 7,
            calcLimit: 10,
            features: [
                { label: 'Basic route calculations', ok: true },
                { label: '10 fare calculations', ok: true },
                { label: 'Advanced commute planner', ok: false },
                { label: 'Real-time traffic updates', ok: false },
                { label: 'Offline access', ok: false },
                { label: 'Priority support', ok: false }
            ]
        },
        basic: {
            id: 'basic',
            name: 'Basic',
            icon: '🚎',
            badge: 'BASIC',
            price: 99,
            monthlyPrice: 99,
            yearlyPrice: 950,
            durationDays: 30,
            calcLimit: 100,
            features: [
                { label: '100 fare calculations/mo', ok: true },
                { label: 'Advanced route search', ok: true },
                { label: 'Commute planner', ok: true },
                { label: 'Real-time traffic updates', ok: false },
                { label: 'Offline access', ok: false },
                { label: 'Priority support', ok: false }
            ]
        },
        premium: {
            id: 'premium',
            name: 'Premium',
            icon: '⚡',
            badge: 'PREMIUM',
            price: 129,
            monthlyPrice: 129,
            yearlyPrice: 1230,
            durationDays: 30,
            calcLimit: -1, // unlimited
            features: [
                { label: 'Unlimited calculations', ok: true },
                { label: 'Advanced route search', ok: true },
                { label: 'Commute planner', ok: true },
                { label: 'Real-time traffic updates', ok: true },
                { label: 'Offline access', ok: true },
                { label: 'Priority support', ok: true }
            ]
        }
    };

    // ─────────────────────────────────────────────
    // STATE
    // ─────────────────────────────────────────────

    const DEFAULT_STATE = {
        hasUsedFreeTrial: false,
        plan: 'none',       // none | free_trial | basic | premium
        status: 'none',       // none | trial | active | expired | cancelled
        billingPeriod: 'monthly',
        startDate: null,
        endDate: null,
        calculationsUsed: 0,
        totalCalculations: 0,
        billingHistory: [],
        createdAt: null,
        lastUpdated: null
    };

    let _state = { ...DEFAULT_STATE };

    // ─────────────────────────────────────────────
    // PERSISTENCE
    // ─────────────────────────────────────────────

    function _load() {
        try {
            const raw = localStorage.getItem(_storageKey());
            if (raw) {
                _state = { ...DEFAULT_STATE, ...JSON.parse(raw) };
            } else {
                _state = { ...DEFAULT_STATE, createdAt: _now(), lastUpdated: _now() };
                _save();
            }
        } catch (e) {
            console.warn('[Subscription] Load error:', e);
            _state = { ...DEFAULT_STATE };
        }
        _checkExpiration();
    }

    function _save() {
        _state.lastUpdated = _now();
        localStorage.setItem(_storageKey(), JSON.stringify(_state));
    }

    function _patch(updates) {
        _state = { ..._state, ...updates };
        _save();
        _refreshUI();
    }

    // ─────────────────────────────────────────────
    // HELPERS
    // ─────────────────────────────────────────────

    function _now() { return new Date().toISOString(); }

    function _addDays(days) {
        const d = new Date();
        d.setDate(d.getDate() + days);
        return d.toISOString();
    }

    function _daysLeft(isoDate) {
        if (!isoDate) return 0;
        const diff = new Date(isoDate) - new Date();
        return Math.max(0, Math.ceil(diff / 86400000));
    }

    function _formatDate(iso) {
        if (!iso) return '—';
        return new Date(iso).toLocaleDateString('en-PH', { month: 'short', day: 'numeric', year: 'numeric' });
    }

    function _genId() {
        return 'bh-' + Date.now().toString(36) + Math.random().toString(36).slice(2, 6);
    }

    // ─────────────────────────────────────────────
    // EXPIRATION CHECK
    // ─────────────────────────────────────────────

    function _checkExpiration() {
        if (!_state.endDate) return;
        if (_state.status !== 'trial' && _state.status !== 'active') return;

        const expired = new Date() > new Date(_state.endDate);
        if (expired) {
            _patch({ status: 'expired', plan: _state.hasUsedFreeTrial ? _state.plan : 'none' });
            _toast('Ang iyong subscription ay nag-expire na. Mag-renew para magpatuloy.', 'warning');
        }
    }

    // ─────────────────────────────────────────────
    // ACCESS CHECK — THE CORE GATE
    // ─────────────────────────────────────────────

    /**
     * Returns true if user can currently use the calculator.
     */
    function hasAccess() {
        _checkExpiration();
        return _state.status === 'trial' || _state.status === 'active';
    }

    /**
     * Main entry point called when user clicks "Calculate Fare".
     *
     * Scenario A: Has access → run calc
     * Scenario B: No access + never tried free trial → show subscription modal
     * Scenario C: No access + already used free trial → redirect to subscription page
     *
     * @param {Function} calcFn - The actual fare calculation callback
     */
    function handleCalculateClick(calcFn) {
        _checkExpiration();

        if (hasAccess()) {
            // ✅ Active plan – just run
            if (typeof calcFn === 'function') calcFn();
            return;
        }

        if (!_state.hasUsedFreeTrial) {
            // 🆓 First-timer → show modal (has free trial option)
            _showSubscriptionModal({ showFreeTrial: true, onSuccess: calcFn });
            return;
        }

        // 🔒 Used free trial before → go straight to subscription page (no modal, no second trial)
        _toast('I-renew o i-upgrade ang iyong plano para magpatuloy.', 'info');
        setTimeout(() => {
            window.location.href = SUBSCRIPTION_PAGE;
        }, 1200);
    }

    // ─────────────────────────────────────────────
    // FREE TRIAL
    // ─────────────────────────────────────────────

    function startFreeTrial(onSuccess) {
        if (_state.hasUsedFreeTrial) {
            _toast('Nagamit mo na ang iyong free trial.', 'error');
            return false;
        }

        _patch({
            hasUsedFreeTrial: true,
            plan: 'free_trial',
            status: 'trial',
            startDate: _now(),
            endDate: _addDays(7),
            calculationsUsed: 0,
        });

        _closeModal('subModal');
        _toast('🎉 Free Trial nagsimula na! May 7 araw kang ma-enjoy ang lahat ng features.', 'success');

        if (typeof onSuccess === 'function') setTimeout(onSuccess, 300);
        return true;
    }

    // ─────────────────────────────────────────────
    // SUBSCRIBE / RENEW / UPGRADE / CANCEL
    // ─────────────────────────────────────────────

    function subscribeToPlan(planId, billingPeriod, onSuccess) {
        const plan = PLANS[planId];
        if (!plan || planId === 'free_trial') return false;

        const days = billingPeriod === 'yearly' ? 365 : 30;
        const amount = billingPeriod === 'yearly' ? plan.yearlyPrice : plan.monthlyPrice;

        const entry = {
            id: _genId(),
            plan: plan.name,
            amount: amount,
            period: billingPeriod,
            date: _now(),
            status: 'paid'
        };

        _patch({
            plan: planId,
            status: 'active',
            billingPeriod: billingPeriod,
            startDate: _now(),
            endDate: _addDays(days),
            calculationsUsed: 0,
            billingHistory: [entry, ..._state.billingHistory]
        });

        _closeModal('subModal');
        _closeModal('upgradeModal');
        _toast(`✅ Subscribed sa ${plan.name} Plan! Enjoy ang lahat ng features.`, 'success');

        if (typeof onSuccess === 'function') setTimeout(onSuccess, 300);
        return true;
    }

    function renewSubscription() {
        if (_state.status !== 'expired' && _state.status !== 'cancelled') {
            _toast('Walang expired na subscription para i-renew.', 'warning');
            return false;
        }
        return subscribeToPlan(_state.plan !== 'free_trial' ? _state.plan : 'basic', _state.billingPeriod);
    }

    function cancelSubscription(reason) {
        if (_state.status !== 'active') {
            _toast('Walang aktibong subscription para i-cancel.', 'warning');
            return false;
        }
        _patch({ status: 'cancelled' });
        _toast('Subscription cancelled. Maaari mo pa itong gamitin hanggang sa katapusan ng billing period.', 'info');
        _closeModal('cancelModal');
        _refreshUI();
        return true;
    }

    function upgradePlan(newPlanId, billingPeriod) {
        return subscribeToPlan(newPlanId, billingPeriod || _state.billingPeriod);
    }

    // ─────────────────────────────────────────────
    // TOAST NOTIFICATIONS
    // ─────────────────────────────────────────────

    function _toast(message, type = 'info') {
        let container = document.getElementById('toastContainer');
        if (!container) {
            container = document.createElement('div');
            container.id = 'toastContainer';
            container.style.cssText = `
                position:fixed; bottom:24px; right:24px; z-index:99999;
                display:flex; flex-direction:column; gap:10px;
                pointer-events:none; max-width:360px;
            `;
            document.body.appendChild(container);
        }

        const icons = { success: '✅', error: '❌', warning: '⚠️', info: 'ℹ️' };
        const colors = {
            success: '#1B4332',
            error: '#c0392b',
            warning: '#D4A500',
            info: '#29A9E1'
        };

        const toast = document.createElement('div');
        toast.style.cssText = `
            background:#fff; color:#181818;
            border-left:4px solid ${colors[type]};
            border-radius:12px;
            box-shadow:0 8px 32px rgba(0,0,0,0.15);
            padding:14px 18px;
            font-family:'DM Sans',sans-serif;
            font-size:13.5px; font-weight:500;
            display:flex; align-items:flex-start; gap:10px;
            pointer-events:all;
            transform:translateX(120%); opacity:0;
            transition:all 0.35s cubic-bezier(0.16,1,0.3,1);
            cursor:pointer;
        `;
        toast.innerHTML = `<span style="font-size:16px;flex-shrink:0">${icons[type]}</span><span>${message}</span>`;
        container.appendChild(toast);

        requestAnimationFrame(() => {
            toast.style.transform = 'translateX(0)';
            toast.style.opacity = '1';
        });

        const dismiss = () => {
            toast.style.transform = 'translateX(120%)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 400);
        };
        toast.addEventListener('click', dismiss);
        setTimeout(dismiss, 5000);
    }

    // ─────────────────────────────────────────────
    // MODAL HELPERS
    // ─────────────────────────────────────────────

    function _closeModal(id) {
        const el = document.getElementById(id);
        if (!el) return;
        el.classList.remove('active');
        document.body.style.overflow = '';
    }

    function _openModal(id) {
        const el = document.getElementById(id);
        if (!el) return;
        el.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    // ─────────────────────────────────────────────
    // SUBSCRIPTION MODAL (first-time / upgrade)
    // ─────────────────────────────────────────────

    function _showSubscriptionModal({ showFreeTrial = false, onSuccess = null } = {}) {
        // Remove existing modal if any
        const existing = document.getElementById('subModal');
        if (existing) existing.remove();

        const plans = showFreeTrial
            ? [PLANS.free_trial, PLANS.basic, PLANS.premium]
            : [PLANS.basic, PLANS.premium];

        const trialNote = showFreeTrial
            ? `<div class="sub-modal-trial-badge">🎁 Eligible ka sa 7-araw na FREE TRIAL!</div>`
            : `<div class="sub-modal-trial-badge expired">🔒 Free Trial ay nagamit na — piliin ang isang paid plan</div>`;

        const planCards = plans.map((p, i) => {
            const isPopular = p.id === 'premium';
            const isTrial = p.id === 'free_trial';
            return `
            <div class="sub-plan-card ${isPopular ? 'popular' : ''} ${isTrial ? 'trial-card' : ''}"
                 data-plan="${p.id}">
                ${isPopular ? '<div class="sub-popular-ribbon">MOST POPULAR</div>' : ''}
                <div class="sub-plan-icon">${p.icon}</div>
                <div class="sub-plan-name">${p.name}</div>
                <div class="sub-plan-price">
                    ${isTrial
                    ? '<span class="price-big">FREE</span><span class="price-period"> · 7 days</span>'
                    : `<span class="price-big">₱${p.monthlyPrice}</span><span class="price-period">/mo</span>`
                }
                </div>
                <ul class="sub-plan-features">
                    ${p.features.map(f => `
                        <li class="${f.ok ? '' : 'dim'}">
                            <span>${f.ok ? '✓' : '✗'}</span> ${f.label}
                        </li>
                    `).join('')}
                </ul>
                <button class="sub-plan-btn ${isTrial ? 'btn-trial' : isPopular ? 'btn-premium' : 'btn-basic'}"
                        onclick="SubscriptionManager._handleModalSelect('${p.id}')">
                    ${isTrial ? 'Start Free Trial' : 'Subscribe Now'}
                </button>
            </div>
            `;
        }).join('');

        const modal = document.createElement('div');
        modal.id = 'subModal';
        modal.className = 'sub-modal-overlay';
        modal.innerHTML = `
            <div class="sub-modal-box">
                <button class="sub-modal-close" onclick="SubscriptionManager._closeModal('subModal')">✕</button>
                <div class="sub-modal-header">
                    <div class="sub-modal-logo">🚌 Biyahero</div>
                    <h2 class="sub-modal-title">Piliin ang iyong Plano</h2>
                    <p class="sub-modal-sub">I-unlock ang lahat ng features ng Biyahero Fare Calculator</p>
                    ${trialNote}
                </div>
                <div class="sub-billing-toggle">
                    <span>Monthly</span>
                    <label class="toggle-switch">
                        <input type="checkbox" id="billingToggle" onchange="SubscriptionManager._toggleBilling(this.checked)">
                        <span class="toggle-track"><span class="toggle-thumb"></span></span>
                    </label>
                    <span>Yearly <em class="save-badge">Save 20%</em></span>
                </div>
                <div class="sub-plans-grid" id="subPlansGrid">
                    ${planCards}
                </div>
                <p class="sub-modal-footer">
                    🔒 Secure payment · Cancel anytime · Philippine-made
                </p>
            </div>
        `;
        document.body.appendChild(modal);
        requestAnimationFrame(() => modal.classList.add('active'));

        // Store callback
        modal._onSuccess = onSuccess;
        modal._showFreeTrial = showFreeTrial;

        // Close on backdrop
        modal.addEventListener('click', e => { if (e.target === modal) _closeModal('subModal'); });
    }

    // Called from button in modal
    function _handleModalSelect(planId) {
        const modal = document.getElementById('subModal');
        const onSuccess = modal ? modal._onSuccess : null;
        const billing = document.getElementById('billingToggle')?.checked ? 'yearly' : 'monthly';

        if (planId === 'free_trial') {
            startFreeTrial(onSuccess);
        } else {
            // In production: open payment flow. Here we simulate immediately.
            _showPaymentConfirm(planId, billing, onSuccess);
        }
    }

    function _showPaymentConfirm(planId, billing, onSuccess) {
        const plan = PLANS[planId];
        const amount = billing === 'yearly' ? plan.yearlyPrice : plan.monthlyPrice;

        // Simple confirm for demo – replace with real payment gateway
        const ok = confirm(
            `Mag-subscribe sa ${plan.name} Plan?\n\n` +
            `₱${amount} / ${billing}\n\n` +
            `(Demo mode: click OK to simulate payment)`
        );
        if (ok) {
            subscribeToPlan(planId, billing, onSuccess);
        }
    }

    function _toggleBilling(isYearly) {
        // Update price display in modal
        const cards = document.querySelectorAll('.sub-plan-card[data-plan]');
        cards.forEach(card => {
            const planId = card.dataset.plan;
            if (planId === 'free_trial') return;
            const plan = PLANS[planId];
            const price = isYearly ? plan.yearlyPrice : plan.monthlyPrice;
            const period = isYearly ? '/yr' : '/mo';
            const priceEl = card.querySelector('.sub-plan-price');
            if (priceEl) {
                priceEl.innerHTML = `<span class="price-big">₱${price}</span><span class="price-period">${period}</span>`;
            }
        });
    }

    // ─────────────────────────────────────────────
    // UPGRADE MODAL (from subscription page)
    // ─────────────────────────────────────────────

    function openUpgradeModal() {
        _showSubscriptionModal({
            showFreeTrial: !_state.hasUsedFreeTrial,
            onSuccess: null
        });
    }

    // ─────────────────────────────────────────────
    // CANCEL MODAL
    // ─────────────────────────────────────────────

    function openCancelModal() {
        let modal = document.getElementById('cancelModal');
        if (!modal) return;
        _openModal('cancelModal');
    }

    function confirmCancel() {
        const reason = document.getElementById('cancelReason')?.value || '';
        cancelSubscription(reason);
    }

    // ─────────────────────────────────────────────
    // NAV STATUS INDICATOR
    // ─────────────────────────────────────────────

    /**
     * Updates the nav pill/badge (if present in index.php).
     * Looks for #subStatusBadge.
     */
    function updateStatusIndicator(userId) {
        const badge = document.getElementById('subStatusBadge');
        if (!badge) return;

        const statusMap = {
            trial: { label: '🎁 Trial', cls: 'badge-trial' },
            active: { label: '✅ Active', cls: 'badge-active' },
            expired: { label: '⚠️ Expired', cls: 'badge-expired' },
            cancelled: { label: '⚪ Cancelled', cls: 'badge-cancelled' },
            none: { label: '🔒 Free', cls: 'badge-free' }
        };

        const info = statusMap[_state.status] || statusMap.none;
        badge.textContent = info.label;
        badge.className = 'sub-status-badge ' + info.cls;
    }

    // ─────────────────────────────────────────────
    // SUBSCRIPTION PAGE UI REFRESH
    // ─────────────────────────────────────────────

    function _refreshUI() {
        _updatePlanCard();
        _updateUsage();
        _updateBillingHistory();
        _updateActionButtons();
        updateStatusIndicator(null);
        // Keep nav upgrade button label in sync (for subscription.php page)
        _syncNavUpgradeBtn();
    }

    function _syncNavUpgradeBtn() {
        const upgradeBtn = document.getElementById('navUpgradeBtn');
        if (!upgradeBtn) return;
        const active = _state.status === 'active';
        const trial = _state.status === 'trial';
        const expired = _state.status === 'expired';
        const cancelled = _state.status === 'cancelled';
        if (active) {
            upgradeBtn.innerHTML = '<span class="upgrade-icon">✅</span><span class="upgrade-text">Manage Plan</span>';
        } else if (trial) {
            upgradeBtn.innerHTML = '<span class="upgrade-icon">🎁</span><span class="upgrade-text">Upgrade</span>';
        } else if (expired || cancelled) {
            upgradeBtn.innerHTML = '<span class="upgrade-icon">🔄</span><span class="upgrade-text">Renew</span>';
        } else {
            upgradeBtn.innerHTML = '<span class="upgrade-icon">⚡</span><span class="upgrade-text">Upgrade</span>';
        }
    }

    function _updatePlanCard() {
        const plan = PLANS[_state.plan] || null;
        const daysLeft = _daysLeft(_state.endDate);

        _setText('ui-plan-name', plan ? plan.name : 'None');
        _setText('ui-plan-status', _state.status.charAt(0).toUpperCase() + _state.status.slice(1));
        _setText('ui-plan-days', _state.status === 'active' || _state.status === 'trial' ? `${daysLeft} days left` : '—');
        _setText('ui-plan-start', _formatDate(_state.startDate));
        _setText('ui-plan-end', _formatDate(_state.endDate));
        _setText('ui-plan-billing', _state.billingPeriod === 'yearly' ? 'Yearly' : 'Monthly');
        _setText('ui-plan-calc-used', _state.calculationsUsed);
        _setText('ui-plan-calc-max', _state.plan && PLANS[_state.plan]?.calcLimit === -1 ? '∞' : (PLANS[_state.plan]?.calcLimit ?? '—'));

        // Status badge colour
        const statusEl = document.getElementById('ui-plan-status');
        if (statusEl) {
            statusEl.className = 'plan-status-pill';
            statusEl.classList.add('ps-' + _state.status);
        }

        // Feature list for current plan
        const featureList = document.getElementById('ui-feature-list');
        if (featureList && plan) {
            featureList.innerHTML = plan.features.map(f => `
                <li class="feat-row ${f.ok ? '' : 'feat-locked'}">
                    <span class="feat-icon">${f.ok ? '✓' : '✗'}</span>
                    <span>${f.label}</span>
                </li>
            `).join('');
        }

        // Days remaining bar
        const bar = document.getElementById('ui-days-bar');
        if (bar && _state.endDate && _state.startDate) {
            const total = (new Date(_state.endDate) - new Date(_state.startDate)) / 86400000;
            const left = daysLeft;
            const pct = total > 0 ? Math.min(100, (left / total) * 100) : 0;
            bar.style.width = pct + '%';
            bar.className = 'days-bar-fill' + (pct < 20 ? ' bar-danger' : pct < 50 ? ' bar-warn' : '');
        }
    }

    function _updateUsage() {
        const used = _state.calculationsUsed;
        const limit = PLANS[_state.plan]?.calcLimit ?? 10;
        const pct = limit === -1 ? 0 : Math.min(100, (used / limit) * 100);

        const bar = document.getElementById('ui-usage-bar');
        if (bar) {
            bar.style.width = pct + '%';
            bar.className = 'usage-bar-fill' + (pct >= 90 ? ' bar-danger' : pct >= 70 ? ' bar-warn' : '');
        }

        _setText('ui-usage-used', used);
        _setText('ui-usage-limit', limit === -1 ? '∞' : limit);
        _setText('ui-usage-pct', limit === -1 ? '∞' : Math.round(pct) + '%');

        const total = document.getElementById('ui-total-calcs');
        if (total) total.textContent = _state.totalCalculations;
    }

    function _updateBillingHistory() {
        const table = document.getElementById('ui-billing-table');
        if (!table) return;

        if (!_state.billingHistory.length) {
            table.innerHTML = `
                <div class="billing-empty">
                    <div style="font-size:36px">📄</div>
                    <p>Walang payment history pa</p>
                    <small>Lalabas dito ang iyong mga bayad</small>
                </div>`;
            return;
        }

        table.innerHTML = `
            <table class="billing-tbl">
                <thead>
                    <tr>
                        <th>Date</th><th>Plan</th><th>Period</th><th>Amount</th><th>Status</th><th></th>
                    </tr>
                </thead>
                <tbody>
                    ${_state.billingHistory.map(h => `
                        <tr>
                            <td>${_formatDate(h.date)}</td>
                            <td>${h.plan}</td>
                            <td class="capitalize">${h.period}</td>
                            <td>₱${h.amount.toLocaleString()}</td>
                            <td><span class="badge-paid">${h.status}</span></td>
                            <td><button class="btn-invoice" onclick="SubscriptionManager.downloadInvoice('${h.id}')">Invoice</button></td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>`;
    }

    function _updateActionButtons() {
        const upgradeBtn = document.getElementById('ui-btn-upgrade');
        const renewBtn = document.getElementById('ui-btn-renew');
        const cancelBtn = document.getElementById('ui-btn-cancel');

        const active = _state.status === 'active';
        const trial = _state.status === 'trial';
        const expired = _state.status === 'expired';
        const cancelled = _state.status === 'cancelled';
        const none = _state.status === 'none';

        if (upgradeBtn) upgradeBtn.style.display = (trial || active || none) ? 'inline-flex' : 'none';
        if (renewBtn) renewBtn.style.display = (expired || cancelled) ? 'inline-flex' : 'none';
        if (cancelBtn) cancelBtn.style.display = active ? 'inline-flex' : 'none';

        // Upgrade label
        if (upgradeBtn) {
            upgradeBtn.textContent = none ? '🚀 Subscribe' : '⚡ Upgrade Plan';
        }
    }

    function _setText(id, val) {
        const el = document.getElementById(id);
        if (el) el.textContent = val ?? '—';
    }

    // ─────────────────────────────────────────────
    // DOWNLOAD INVOICE (demo)
    // ─────────────────────────────────────────────

    function downloadInvoice(id) {
        const entry = _state.billingHistory.find(h => h.id === id);
        if (!entry) return;

        const text = [
            '==============================',
            '   BIYAHERO — INVOICE',
            '==============================',
            `ID:     ${entry.id}`,
            `Date:   ${_formatDate(entry.date)}`,
            `Plan:   ${entry.plan} (${entry.period})`,
            `Amount: ₱${entry.amount.toLocaleString()}`,
            `Status: ${entry.status.toUpperCase()}`,
            '==============================',
            'Salamat sa iyong subscription!'
        ].join('\n');

        const blob = new Blob([text], { type: 'text/plain' });
        const a = document.createElement('a');
        a.href = URL.createObjectURL(blob);
        a.download = `biyahero-invoice-${entry.id}.txt`;
        a.click();
        _toast('Invoice downloaded!', 'success');
    }

    // ─────────────────────────────────────────────
    // FARE CALCULATOR INTEGRATION
    // ─────────────────────────────────────────────

    /**
     * Call this once on DOMContentLoaded in index.php.
     * Wraps the existing #calcBtn with subscription gate logic.
     */
    function patchFareCalculator(calcFn) {
        const btn = document.getElementById('calcBtn');
        if (!btn) return;

        // Replace the click handler
        const newBtn = btn.cloneNode(true);
        btn.parentNode.replaceChild(newBtn, btn);

        newBtn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            handleCalculateClick(calcFn);
        }, true);
    }

    /**
     * Track a successful calculation.
     */
    function trackCalculation() {
        _patch({
            calculationsUsed: _state.calculationsUsed + 1,
            totalCalculations: _state.totalCalculations + 1
        });

        // Warn if approaching limit
        const plan = PLANS[_state.plan];
        if (plan && plan.calcLimit !== -1) {
            const remaining = plan.calcLimit - _state.calculationsUsed;
            if (remaining <= 2 && remaining > 0) {
                _toast(`⚠️ ${remaining} na lang ang natitira mong calculations ngayong buwan!`, 'warning');
            } else if (remaining <= 0) {
                _toast('Naubos na ang iyong calculations. Mag-upgrade para sa unlimited!', 'error');
            }
        }
    }

    // ─────────────────────────────────────────────
    // SHOW PAYMENT MODAL (legacy alias)
    // ─────────────────────────────────────────────

    function showPaymentModal() {
        _showSubscriptionModal({ showFreeTrial: !_state.hasUsedFreeTrial });
    }

    // ─────────────────────────────────────────────
    // INIT
    // ─────────────────────────────────────────────

    function _init() {
        // ── Auto-detect logged-in user BEFORE loading state ──
        // This ensures the correct per-user localStorage key is used
        // from the very first _load(), so a new registrant always
        // starts fresh (hasUsedFreeTrial: false) even on a shared browser.
        try {
            const raw = localStorage.getItem('biyahero_current_user');
            const user = raw ? JSON.parse(raw) : null;
            if (user) {
                const uid = user.email || user.id || user.username;
                if (uid) _userId = String(uid).toLowerCase().trim();
            }
        } catch (e) { /* ignore */ }

        _load();
        _refreshUI();

        // Escape closes all modals
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                _closeModal('subModal');
                _closeModal('cancelModal');
                _closeModal('upgradeModal');
            }
        });
    }

    // If DOM already loaded (script at bottom of body), run immediately.
    // Otherwise wait for DOMContentLoaded (script in <head>).
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', _init);
    } else {
        _init();
    }

    // ─────────────────────────────────────────────
    // PUBLIC API
    // ─────────────────────────────────────────────

    return {
        // Core gate
        hasAccess,
        handleCalculateClick,

        // User scoping — call this after login
        setUser,

        // Subscription actions
        startFreeTrial,
        subscribeToPlan,
        renewSubscription,
        cancelSubscription,
        upgradePlan,
        openUpgradeModal,
        openCancelModal,
        confirmCancel,

        // Usage
        trackCalculation,

        // UI helpers
        updateStatusIndicator,
        showPaymentModal,
        downloadInvoice,

        // Fare calculator
        patchFareCalculator,

        // Internal (called from modal HTML)
        _handleModalSelect,
        _toggleBilling,
        _closeModal,

        // State accessor
        getState: () => ({ ..._state }),
        getStorageKey: () => _storageKey(),

        // Toast (public for external use)
        toast: _toast,

        // Dev / demo helpers
        _resetState() {
            localStorage.removeItem(_storageKey());
            _load();
            _refreshUI();
            _toast('State reset!', 'info');
        }
    };

})();

if (typeof module !== 'undefined' && module.exports) {
    module.exports = SubscriptionManager;
}