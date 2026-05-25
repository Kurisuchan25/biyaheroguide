<?php
session_start();

$current_user  = $_SESSION['biyahero_user'] ?? null;
$user_name     = $current_user['name']  ?? 'Juan Dela Cruz';
$user_email    = $current_user['email'] ?? 'juan@email.com';
$user_initial  = strtoupper(substr($user_name, 0, 1));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription — Biyahero</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,700;0,9..144,900;1,9..144,300&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="subscription.css">
    <style>
        /* Additional page-specific layout helpers */
        .section-head {
            display:flex; align-items:center; justify-content:space-between;
            margin-bottom:24px;
        }
        .section-title {
            font-family:'Fraunces',serif;
            font-size:clamp(26px,4vw,38px);
            color:var(--green);
        }
        .sub-page-tag {
            font-size:11px; font-weight:700;
            letter-spacing:0.1em; text-transform:uppercase;
            color:var(--gold);
        }
    </style>
</head>
<body>

<!-- ─── NAV ─── -->
<nav class="sub-nav">
    <div class="sub-nav-inner">
        <a href="../index.php" class="sub-logo">
            <span class="sub-logo-bus">🚌</span>
            <span class="sub-logo-text">Biyahero<span class="sub-logo-dot">.</span></span>
        </a>
        <div class="sub-nav-right">
            <span id="subStatusBadge" class="sub-status-badge badge-free">🔒 Free</span>
            <a href="../index.php" class="sub-back-link">← Bumalik sa App</a>
            <div class="sub-nav-sep"></div>
            <div class="sub-user-chip">
                <div class="sub-avatar"><?php echo htmlspecialchars($user_initial); ?></div>
                <div class="sub-user-meta">
                    <span class="sub-user-name" id="navUserName"><?php echo htmlspecialchars($user_name); ?></span>
                    <span class="sub-user-email" id="navUserEmail"><?php echo htmlspecialchars($user_email); ?></span>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- ─── ALERT BANNER (dynamically shown by JS) ─── -->
<div id="subAlertBanner" class="sub-alert-banner">
    <span id="subAlertMsg">⚠️ Ang iyong subscription ay nag-expire na.</span>
    <button class="sub-alert-cta" onclick="SubscriptionManager.openUpgradeModal()">Mag-subscribe Ngayon</button>
</div>

<!-- ─── HERO ─── -->
<header class="sub-hero">
    <div class="sub-container">
        <div class="sub-hero-inner">
            <div class="sub-hero-text">
                <p class="sub-hero-eyebrow">My Account</p>
                <h1 class="sub-hero-title">Subscription <em>at Billing</em></h1>
                <p class="sub-hero-sub">Pamahalaan ang iyong plano, bayad, at mga kagustuhan ng Biyahero.</p>
            </div>
            <button class="sub-upgrade-pill" onclick="SubscriptionManager.openUpgradeModal()">
                ⚡ I-upgrade ang Plano
            </button>
        </div>
    </div>
</header>

<!-- ─── MAIN ─── -->
<main class="sub-main">
<div class="sub-container">

    <!-- ROW 1: Plan Info + Action Buttons -->
    <div class="sub-row two-col">

        <!-- Current Plan Card -->
        <div class="bcard plan-card-main">
            <p class="bcard-label"><span class="bcard-label-dot"></span>Current Plan</p>
            <div class="plan-big-icon" id="ui-plan-icon">🚶</div>
            <div class="plan-name-big" id="ui-plan-name">None</div>
            <span class="plan-status-pill ps-none" id="ui-plan-status">None</span>

            <!-- Days remaining -->
            <div class="days-progress-wrap">
                <div class="days-progress-label">
                    <span>Time Remaining</span>
                    <span id="ui-plan-days">—</span>
                </div>
                <div class="days-bar-track">
                    <div class="days-bar-fill" id="ui-days-bar" style="width:0%"></div>
                </div>
            </div>

            <!-- Meta grid -->
            <div class="plan-meta-grid">
                <div class="plan-meta-item">
                    <div class="plan-meta-label">Start Date</div>
                    <div class="plan-meta-value" id="ui-plan-start">—</div>
                </div>
                <div class="plan-meta-item">
                    <div class="plan-meta-label">End Date</div>
                    <div class="plan-meta-value" id="ui-plan-end">—</div>
                </div>
                <div class="plan-meta-item">
                    <div class="plan-meta-label">Billing</div>
                    <div class="plan-meta-value" id="ui-plan-billing">—</div>
                </div>
                <div class="plan-meta-item">
                    <div class="plan-meta-label">Calculations</div>
                    <div class="plan-meta-value">
                        <span id="ui-plan-calc-used">0</span>/<span id="ui-plan-calc-max">—</span>
                    </div>
                </div>
            </div>

            <!-- Features -->
            <ul class="feature-list" id="ui-feature-list">
                <li class="feat-row feat-locked">
                    <span class="feat-icon">—</span> Loading...
                </li>
            </ul>
        </div>

        <!-- Actions Card -->
        <div class="bcard">
            <p class="bcard-label"><span class="bcard-label-dot"></span>Manage Subscription</p>

            <div class="btn-row">
                <!-- Upgrade (shown when no active sub or on trial) -->
                <button class="btn-gold" id="ui-btn-upgrade"
                        onclick="SubscriptionManager.openUpgradeModal()"
                        style="display:none">
                    🚀 Upgrade / Subscribe
                </button>

                <!-- Renew (shown when expired or cancelled) -->
                <button class="btn-primary" id="ui-btn-renew"
                        onclick="_doRenew()"
                        style="display:none">
                    🔄 Renew Subscription
                </button>

                <!-- View Calculator -->
                <a href="../index.php#fare-calculator" class="btn-outline">
                    🧮 Gamitin ang Calculator
                </a>

                <!-- Cancel (shown when active) -->
                <button class="btn-danger" id="ui-btn-cancel"
                        onclick="SubscriptionManager.openCancelModal()"
                        style="display:none">
                    ✕ Cancel Subscription
                </button>
            </div>

            <!-- Locked features promo (when no access) -->
            <div id="ui-locked-promo" style="margin-top:20px;display:none">
                <div style="background:linear-gradient(135deg,var(--green),var(--green-mid));
                            border-radius:14px;padding:20px;color:#fff;text-align:center">
                    <div style="font-size:28px;margin-bottom:8px">🔒</div>
                    <div style="font-family:'Fraunces',serif;font-size:17px;font-weight:700;margin-bottom:6px">
                        I-unlock ang Premium Features
                    </div>
                    <p style="font-size:13px;color:rgba(255,255,255,0.7);margin-bottom:14px">
                        Unlimited fare calculations, real-time updates, at marami pa.
                    </p>
                    <button onclick="SubscriptionManager.openUpgradeModal()"
                            style="background:var(--gold);color:var(--green);border:none;border-radius:100px;
                                   padding:10px 22px;font-weight:800;font-size:13px;cursor:pointer;
                                   font-family:'DM Sans',sans-serif">
                        ⚡ Mag-subscribe Ngayon
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ROW 2: Usage Stats -->
    <div class="sub-row one-col">
        <div class="bcard">
            <p class="bcard-label"><span class="bcard-label-dot"></span>Usage This Month</p>
            <div class="usage-numbers">
                <div class="usage-num-item">
                    <div class="usage-num-value" id="ui-usage-used">0</div>
                    <div class="usage-num-label">Used</div>
                </div>
                <div class="usage-num-item">
                    <div class="usage-num-value" id="ui-usage-limit">—</div>
                    <div class="usage-num-label">Limit</div>
                </div>
                <div class="usage-num-item">
                    <div class="usage-num-value" id="ui-usage-pct">0%</div>
                    <div class="usage-num-label">Used %</div>
                </div>
                <div class="usage-num-item">
                    <div class="usage-num-value" id="ui-total-calcs">0</div>
                    <div class="usage-num-label">All-time</div>
                </div>
            </div>
            <div class="usage-bar-track">
                <div class="usage-bar-fill" id="ui-usage-bar" style="width:0%"></div>
            </div>
            <p class="usage-bar-note" id="ui-usage-note" style="margin-top:8px">
                Calculating your usage...
            </p>
        </div>
    </div>

    <!-- ROW 3: Billing History -->
    <div class="sub-row one-col">
        <div class="bcard">
            <div class="section-head">
                <p class="bcard-label" style="margin-bottom:0">
                    <span class="bcard-label-dot"></span>Payment History
                </p>
                <small style="color:var(--muted);font-size:12px">
                    Pinakabagong 10 na transaksyon
                </small>
            </div>
            <div id="ui-billing-table">
                <div class="billing-empty">
                    <div style="font-size:36px">📄</div>
                    <p>Walang payment history pa</p>
                    <small>Lalabas dito ang iyong mga bayad pagkatapos mag-subscribe</small>
                </div>
            </div>
        </div>
    </div>

    <!-- ROW 4: Dev Tools (remove in production) -->
    <div class="sub-row one-col" id="devTools"
         style="border:2px dashed rgba(27,67,50,0.2);border-radius:16px;padding:20px;display:none">
        <p style="font-size:11px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:var(--muted);margin-bottom:12px">
            🛠 Dev Tools (Remove in Production)
        </p>
        <div style="display:flex;gap:10px;flex-wrap:wrap">
            <button onclick="SubscriptionManager._resetState()" class="btn-outline" style="font-size:12px;padding:8px 16px">
                🗑 Reset State
            </button>
            <button onclick="_devSimulate('basic','monthly')" class="btn-outline" style="font-size:12px;padding:8px 16px">
                ✅ Simulate Basic Sub
            </button>
            <button onclick="_devSimulate('premium','yearly')" class="btn-outline" style="font-size:12px;padding:8px 16px">
                ⚡ Simulate Premium Sub
            </button>
            <button onclick="_devTrial()" class="btn-outline" style="font-size:12px;padding:8px 16px">
                🎁 Simulate Free Trial
            </button>
            <button onclick="_devExpire()" class="btn-outline" style="font-size:12px;padding:8px 16px">
                ⏰ Simulate Expiry
            </button>
        </div>
        <div id="devStateOutput" style="margin-top:12px;font-size:11.5px;font-family:monospace;
             background:#1B4332;color:#52B788;padding:14px;border-radius:10px;
             white-space:pre-wrap;max-height:140px;overflow-y:auto"></div>
    </div>

</div><!-- /sub-container -->
</main>

<!-- ─── CANCEL MODAL ─── -->
<div class="cancel-modal-overlay" id="cancelModal">
    <div class="cancel-modal-box">
        <div class="cancel-modal-icon">😔</div>
        <h3 class="cancel-modal-title">Cancel Subscription?</h3>
        <p class="cancel-modal-sub">
            Malungkot kaming makita kang umalis. Maaari mo pa itong gamitin hanggang sa katapusan ng iyong billing period.
        </p>
        <textarea id="cancelReason" class="cancel-reason"
            placeholder="Sabihin mo sa amin kung bakit... (optional)"></textarea>
        <div class="cancel-modal-btns">
            <button class="btn-outline"
                    onclick="SubscriptionManager._closeModal('cancelModal')">
                Huwag na
            </button>
            <button class="btn-danger"
                    onclick="SubscriptionManager.confirmCancel()">
                I-cancel nga
            </button>
        </div>
    </div>
</div>

<!-- ─── SCRIPTS ─── -->
<script src="subscription.js"></script>
<script>
    // ─── Page init ───
    document.addEventListener('DOMContentLoaded', function () {
        // ── Scope subscription state to the logged-in user ──
        (function () {
            try {
                var raw = localStorage.getItem('biyahero_current_user');
                var currentUser = raw ? JSON.parse(raw) : null;
                if (currentUser && typeof SubscriptionManager !== 'undefined') {
                    var userId = currentUser.email || currentUser.id || currentUser.username;
                    if (userId) SubscriptionManager.setUser(userId);
                }
            } catch (e) {}
        })();

        _updateAlertBanner();
        _updateLockedPromo();
        _updateDevState();
    });

    // ─── Alert banner logic ───
    function _updateAlertBanner() {
        const state   = SubscriptionManager.getState();
        const banner  = document.getElementById('subAlertBanner');
        const msgEl   = document.getElementById('subAlertMsg');
        if (!banner) return;

        banner.className = 'sub-alert-banner';

        if (state.status === 'expired') {
            banner.classList.add('alert-expired');
            msgEl.textContent = '⚠️ Ang iyong subscription ay nag-expire na. Mag-renew para magpatuloy.';
        } else if (state.status === 'cancelled') {
            banner.classList.add('alert-cancelled');
            msgEl.textContent = '⚪ Na-cancel mo ang iyong subscription.';
        } else if (state.status === 'trial') {
            const days = Math.ceil((new Date(state.endDate) - new Date()) / 86400000);
            if (days <= 3) {
                banner.classList.add('alert-trial-ending');
                msgEl.textContent = `🎁 ${days} araw na lang ang natitira sa iyong Free Trial! Mag-upgrade bago pa maubos.`;
            }
        }
    }

    // ─── Show locked promo when no access ───
    function _updateLockedPromo() {
        const promoEl = document.getElementById('ui-locked-promo');
        if (!promoEl) return;
        promoEl.style.display = SubscriptionManager.hasAccess() ? 'none' : 'block';
    }

    // ─── Renew wrapper (confirm dialog) ───
    function _doRenew() {
        const state = SubscriptionManager.getState();
        const planName = state.plan !== 'none' && state.plan !== 'free_trial'
            ? state.plan.charAt(0).toUpperCase() + state.plan.slice(1)
            : 'Basic';
        const ok = confirm(`Mag-renew ng ${planName} Plan?\n\n(Demo: Click OK para i-simulate ang payment)`);
        if (ok) SubscriptionManager.renewSubscription();
    }

    // ─── Dev helpers (remove in production) ───
    const _devKey = 'biyahero_dev';
    if (localStorage.getItem(_devKey) === '1' || new URLSearchParams(location.search).has('dev')) {
        localStorage.setItem(_devKey, '1');
        document.getElementById('devTools').style.display = 'block';
    }

    function _devSimulate(plan, period) {
        SubscriptionManager.subscribeToPlan(plan, period);
        _updateAlertBanner();
        _updateLockedPromo();
        _updateDevState();
    }

    function _devTrial() {
        // Reset trial flag first for demo
        const state = SubscriptionManager.getState();
        if (state.hasUsedFreeTrial) {
            SubscriptionManager._resetState();
        }
        SubscriptionManager.startFreeTrial();
        _updateAlertBanner();
        _updateLockedPromo();
        _updateDevState();
    }

    function _devExpire() {
        // Get the key currently in use (may be user-scoped)
        const key = SubscriptionManager.getStorageKey ? SubscriptionManager.getStorageKey() : 'biyahero_subscription_v2';
        const raw = localStorage.getItem(key);
        if (raw) {
            const s = JSON.parse(raw);
            s.status  = 'expired';
            s.endDate = new Date(Date.now() - 86400000).toISOString();
            localStorage.setItem(key, JSON.stringify(s));
            location.reload();
        }
    }

    function _updateDevState() {
        const el = document.getElementById('devStateOutput');
        if (!el) return;
        el.textContent = JSON.stringify(SubscriptionManager.getState(), null, 2);
    }
</script>
</body>
</html>