<!DOCTYPE html>
<html lang="fil">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biyahero | Mag-login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.9.14/dist/dotlottie-wc.js" type="module"></script>
  <link rel="stylesheet" href="../css/subscription.css">
  <script src="../js/api.js?v=2"></script>
  <script src="../js/subscription.js?v=2"></script>
  <style>
    :root {
      --green:      #1B4332;
      --green-mid:  #2D6A4F;
      --green-lt:   #52B788;
      --green-glow: rgba(82,183,136,0.3);
      --gold:       #F4C430;
      --rose:       #FF6B6B;
      --bg:         #EEF1F5;
      --card:       #FFFFFF;
      --text:       #1C1E21;
      --muted:      #65676B;
      --border:     #DDE0E4;
      --input-bg:   #F7F8FA;
      --ease:       cubic-bezier(0.4,0,0.2,1);
      --spring:     cubic-bezier(0.34,1.56,0.64,1);
    }
    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
    html { height:100%; }
    body { font-family:'Inter',sans-serif; background:var(--bg); color:var(--text); min-height:100vh; display:flex; flex-direction:column; }
    h1,h2,h3 { font-family:'Nunito',sans-serif; }

    .page-wrap { flex:1; display:flex; align-items:stretch; min-height:100vh; }

    /* LEFT HERO */
    .hero-side {
      flex:1;
      background: linear-gradient(155deg, rgba(10,46,30,0.88) 0%, rgba(27,67,50,0.85) 35%, rgba(45,106,79,0.82) 70%, rgba(26,92,63,0.88) 100%), url('../commuter.jpg') center/cover no-repeat fixed;
      position:relative; overflow:hidden; display:flex; flex-direction:column;
      padding:44px 52px 36px; min-height:100vh;
    }
    /* Subtle dot grid */
    .hero-side::before {
      content:''; position:absolute; inset:0;
      background-image: radial-gradient(circle, rgba(255,255,255,0.06) 1px, transparent 1px);
      background-size:32px 32px;
      pointer-events:none;
    }
    /* Bottom gradient fade */
    .hero-side::after {
      content:''; position:absolute; bottom:0; left:0; right:0; height:200px;
      background:linear-gradient(to top, rgba(10,46,30,0.7) 0%, transparent 100%);
      pointer-events:none; z-index:1;
    }

    .orb { position:absolute; border-radius:50%; filter:blur(80px); pointer-events:none; }
    .orb-1 { width:600px; height:600px; background:radial-gradient(circle,rgba(82,183,136,0.18) 0%,transparent 65%); top:-150px; left:-150px; animation:float1 18s ease-in-out infinite; }
    .orb-2 { width:400px; height:400px; background:radial-gradient(circle,rgba(244,196,48,0.08) 0%,transparent 70%); bottom:-80px; right:-80px; animation:float2 22s ease-in-out infinite; }
    .orb-3 { width:300px; height:300px; background:radial-gradient(circle,rgba(82,183,136,0.12) 0%,transparent 70%); top:45%; left:35%; animation:float3 15s ease-in-out infinite; }
    @keyframes float1 { 0%,100%{transform:translate(0,0)} 50%{transform:translate(40px,-30px)} }
    @keyframes float2 { 0%,100%{transform:translate(0,0)} 50%{transform:translate(-30px,-35px)} }
    @keyframes float3 { 0%,100%{transform:translate(0,0) scale(1)} 50%{transform:translate(-20px,25px) scale(1.1)} }

    .hero-logo {
      position:relative; z-index:3;
      font-family:'Nunito',sans-serif; font-size:28px; font-weight:900;
      color:#fff; text-decoration:none;
      display:inline-flex; align-items:center; gap:4px;
      letter-spacing:-0.03em;
      animation:fadeUp 0.6s var(--ease) both;
    }
    .hero-logo .accent { color:var(--gold); }
    .hero-logo-badge {
      font-family:'Inter',sans-serif; font-size:9px; font-weight:700;
      letter-spacing:0.1em; text-transform:uppercase;
      color:rgba(255,255,255,0.35); border:1px solid rgba(255,255,255,0.12);
      padding:2px 8px; border-radius:20px; margin-left:10px; position:relative; top:-2px;
    }

    .hero-main {
      flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center;
      position:relative; z-index:2;
      animation:fadeUp 0.7s var(--ease) 0.1s both;
      text-align:center;
      padding:10px 0;
    }

    /* Copy sits ABOVE the animation */
    .hero-copy {
      margin-bottom: 0;
      position:relative; z-index:3;
    }

    .live-badge {
      display:inline-flex; align-items:center; gap:7px;
      background:rgba(82,183,136,0.1); border:1px solid rgba(82,183,136,0.22);
      color:#74d9a8; padding:5px 14px; border-radius:100px;
      font-size:10.5px; font-weight:700; letter-spacing:0.09em; text-transform:uppercase;
      margin-bottom:20px;
    }
    .live-dot {
      width:6px; height:6px; border-radius:50%; background:#52B788;
      animation:pulse 2s infinite;
    }
    @keyframes pulse { 0%{box-shadow:0 0 0 0 rgba(82,183,136,0.6)} 70%{box-shadow:0 0 0 7px rgba(82,183,136,0)} 100%{box-shadow:0 0 0 0 rgba(82,183,136,0)} }

    .hero-tagline {
      font-family:'Nunito',sans-serif; font-size:2.9rem; font-weight:900;
      color:#fff; line-height:1.08; letter-spacing:-0.03em; margin-bottom:14px;
    }
    .hero-tagline .hi { color:var(--gold); font-style:italic; }
    .hero-desc { color:rgba(255,255,255,0.55); font-size:14.5px; line-height:1.8; max-width:380px; margin:0 auto; }

    /* === LOTTIE — full-bleed centrepiece === */
    .lottie-stage {
      position:relative;
      width:100%;
      display:flex;
      justify-content:center;
      align-items:center;
      margin-top:-20px; /* pull up slightly to overlap copy area */
      z-index:2;
    }
    /* Soft glow halo behind the animation */
    .lottie-stage::before {
      content:'';
      position:absolute;
      width:420px; height:280px;
      background:radial-gradient(ellipse, rgba(82,183,136,0.22) 0%, transparent 70%);
      border-radius:50%;
      filter:blur(30px);
      pointer-events:none;
      z-index:0;
    }
    .lottie-stage dotlottie-wc {
      position:relative; z-index:1;
      filter: drop-shadow(0 20px 60px rgba(0,0,0,0.35));
    }

    /* Floating info pills anchored to the bottom corners of the lottie */
    .lottie-pills {
      position:absolute;
      bottom: 24px;
      left:0; right:0;
      display:flex;
      justify-content:space-between;
      align-items:flex-end;
      padding:0 16px;
      z-index:3;
      pointer-events:none;
    }
    .info-pill {
      background:rgba(255,255,255,0.07);
      backdrop-filter:blur(14px); -webkit-backdrop-filter:blur(14px);
      border:1px solid rgba(255,255,255,0.1);
      border-radius:14px;
      padding:12px 16px;
      color:#fff;
      animation:cardFloat var(--dur,6s) ease-in-out infinite;
      animation-delay:var(--delay,0s);
    }
    @keyframes cardFloat { 0%,100%{transform:translateY(0px)} 50%{transform:translateY(-8px)} }
    .pill-label { font-size:9.5px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:rgba(255,255,255,0.4); margin-bottom:7px; }
    .pill-value { font-size:13px; font-weight:700; }
    .pill-sub { font-size:11px; color:rgba(255,255,255,0.5); margin-top:2px; }

    .pill-route { --dur:7s; --delay:0s; }
    .route-stack { display:flex; flex-direction:column; gap:4px; }
    .route-item { display:flex; align-items:center; gap:8px; font-size:12.5px; font-weight:600; }
    .rdot { width:8px; height:8px; border-radius:50%; flex-shrink:0; }
    .rdot.g { background:#52B788; box-shadow:0 0 6px rgba(82,183,136,0.9); }
    .rdot.y { background:var(--gold); box-shadow:0 0 6px rgba(244,196,48,0.9); }
    .rline { width:1.5px; height:14px; background:rgba(255,255,255,0.18); margin:2px 0 2px 3.5px; }

    .pill-stat { --dur:8.5s; --delay:1.2s; text-align:right; }
    .pill-stat .big { font-size:2rem; font-weight:900; font-family:'Nunito',sans-serif; color:var(--gold); line-height:1; }
    .pill-stat .unit { font-size:11px; color:rgba(255,255,255,0.45); font-weight:600; }

    /* Floating UI cards (kept for compatibility, but hidden) */
    .ui-cards { display:none; }
    .ui-card {
      position:absolute;
      background:rgba(255,255,255,0.08);
      backdrop-filter:blur(12px); -webkit-backdrop-filter:blur(12px);
      border:1px solid rgba(255,255,255,0.12); border-radius:20px;
      padding:18px 22px; color:#fff;
    }
    .card-route { top:0; left:0; width:260px; }
    .card-label { font-size:10px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:rgba(255,255,255,0.45); margin-bottom:12px; }
    .route-from,.route-to { display:flex; align-items:center; gap:10px; font-size:13.5px; font-weight:600; }
    .route-dot { width:10px; height:10px; border-radius:50%; flex-shrink:0; }
    .route-dot.green { background:#52B788; box-shadow:0 0 8px rgba(82,183,136,0.8); }
    .route-dot.gold  { background:var(--gold); box-shadow:0 0 8px rgba(244,196,48,0.8); }
    .route-line { width:2px; height:22px; background:rgba(255,255,255,0.2); margin:5px 0 5px 4px; }
    .route-badge {
      margin-top:14px; background:rgba(82,183,136,0.2); border:1px solid rgba(82,183,136,0.35);
      border-radius:8px; padding:8px 12px;
      display:flex; align-items:center; justify-content:space-between;
      font-size:12px; font-weight:700;
    }
    .route-badge .fare { color:var(--gold); font-size:14px; }

    .card-weather { top:30px; right:30px; width:180px; --dur:8s; --delay:1.5s; }
    .weather-icon { font-size:2.4rem; margin-bottom:8px; }
    .weather-temp { font-size:2rem; font-weight:900; font-family:'Nunito',sans-serif; }
    .weather-sub  { font-size:12px; color:rgba(255,255,255,0.55); margin-top:3px; }

    .card-features { bottom:0; left:40px; width:280px; --dur:9s; --delay:0.8s; }
    .feat-pill {
      display:inline-flex; align-items:center; gap:6px;
      background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.1);
      border-radius:100px; padding:5px 11px;
      font-size:12px; font-weight:600; margin:3px 4px 3px 0;
    }

    .lottie-row { display:none; }

    .hero-footer {
      position:relative; z-index:3;
      font-size:11.5px; color:rgba(255,255,255,0.25);
      text-align:center;
      animation:fadeUp 0.7s var(--ease) 0.2s both;
    }

    /* RIGHT FORM */
    .form-side {
      width:580px; flex-shrink:0;
      background: linear-gradient(160deg, #f8faf8 0%, #ffffff 50%, #f4fdf9 100%);
      display:flex; flex-direction:column; align-items:stretch; justify-content:center;
      padding:52px 44px;
      box-shadow:-12px 0 60px rgba(0,0,0,0.08), -1px 0 0 rgba(82,183,136,0.08);
      position:relative; z-index:5;
    }
    .form-side::before {
      content:''; position:absolute; top:0; left:0; right:0; height:3px;
      background:linear-gradient(90deg, var(--green) 0%, var(--green-lt) 60%, transparent 100%);
      opacity:0.4;
    }

    .form-header { margin-bottom:26px; animation:fadeUp 0.6s var(--ease) 0.15s both; }
    .form-header h2 { font-size:1.65rem; font-weight:900; letter-spacing:-0.02em; color:var(--text); margin-bottom:5px; }
    .form-header p  { font-size:13px; color:var(--muted); line-height:1.65; }

    .back-link { display:inline-flex; align-items:center; gap:6px; color:var(--muted); text-decoration:none; font-size:13px; font-weight:600; margin-bottom:16px; transition:color 0.2s; }
    .back-link:hover { color:var(--green); }
    .back-link svg { width:16px; height:16px; }

    .tab-toggle {
      display:flex; background:#EAEDEE; border-radius:13px;
      padding:4px; margin-bottom:26px; gap:3px; position:relative;
      animation:fadeUp 0.6s var(--ease) 0.2s both;
    }
    .tab-btn {
      flex:1; padding:10px; border-radius:10px; border:none;
      font-family:'Inter',sans-serif; font-size:13.5px; font-weight:700;
      cursor:pointer; color:var(--muted); background:transparent;
      transition:color 0.25s var(--ease); position:relative; z-index:1;
    }
    .tab-btn.active { color:var(--green); }
    .tab-slider {
      position:absolute; top:5px; bottom:5px; border-radius:10px;
      background:#fff; box-shadow:0 2px 10px rgba(0,0,0,0.1);
      transition:left 0.3s var(--spring), width 0.3s var(--spring); z-index:0;
    }

    .auth-panel { display:none; animation:panelIn 0.35s var(--ease) both; }
    .auth-panel.active { display:block; }
    @keyframes panelIn { from{opacity:0;transform:translateX(12px)} to{opacity:1;transform:translateX(0)} }

    .field { margin-bottom:14px; }
    .field-label { display:block; font-size:11px; font-weight:700; color:var(--muted); text-transform:uppercase; letter-spacing:0.09em; margin-bottom:7px; }
    .field-inner { position:relative; }
    .field-inner input {
      width:100%; padding:13px 42px 13px 16px;
      border:1.5px solid var(--border); border-radius:10px;
      font-family:'Inter',sans-serif; font-size:14.5px; color:var(--text);
      background:var(--input-bg); outline:none;
      transition:border-color 0.22s var(--ease), background 0.22s, box-shadow 0.22s;
    }
    .field-inner input:focus { border-color:var(--green-lt); background:#fff; box-shadow:0 0 0 3px var(--green-glow); }
    .field-inner input.is-error { border-color:var(--rose); background:#fff9f9; }
    .field-inner input.is-valid { border-color:#52B788; }

    .field-icon { position:absolute; right:14px; top:50%; transform:translateY(-50%); pointer-events:none; display:flex; align-items:center; opacity:0; transition:opacity 0.2s; }
    .field-icon.visible { opacity:1; }
    .field-icon svg { width:16px; height:16px; }

    .eye-btn { position:absolute; right:14px; top:50%; transform:translateY(-50%); background:none; border:none; cursor:pointer; color:var(--muted); display:flex; align-items:center; padding:4px; transition:color 0.2s; }
    .eye-btn:hover { color:var(--green); }
    .eye-btn svg { width:17px; height:17px; }

    .inline-err { font-size:12px; color:var(--rose); margin-top:5px; display:flex; align-items:center; gap:5px; max-height:0; overflow:hidden; opacity:0; transition:max-height 0.3s, opacity 0.3s; }
    .inline-err.show { max-height:30px; opacity:1; }
    .inline-err svg { flex-shrink:0; width:12px; height:12px; }

    .field-row { display:grid; grid-template-columns:1fr 1fr; gap:12px; }

    .strength-wrap { margin-top:7px; }
    .strength-track { height:3px; border-radius:3px; background:#E5E7EB; overflow:hidden; }
    .strength-fill  { height:100%; width:0; border-radius:3px; transition:width 0.4s, background 0.4s; }
    .strength-text  { font-size:11px; color:var(--muted); margin-top:5px; transition:color 0.3s; }

    .forgot-link { display:block; text-align:right; font-size:12.5px; color:var(--green-mid); font-weight:600; text-decoration:none; margin-top:-6px; margin-bottom:20px; transition:color 0.2s; }
    .forgot-link:hover { color:var(--green); }

    .submit-btn {
      width:100%; padding:15px;
      background:linear-gradient(135deg,var(--green) 0%,var(--green-mid) 100%);
      color:#fff; border:none; border-radius:10px;
      font-family:'Inter',sans-serif; font-size:15px; font-weight:700;
      cursor:pointer; display:flex; align-items:center; justify-content:center; gap:9px;
      position:relative; overflow:hidden;
      transition:transform 0.2s var(--spring), box-shadow 0.2s var(--ease), opacity 0.2s;
      box-shadow:0 4px 18px rgba(27,67,50,0.28);
    }
    .submit-btn:hover:not(:disabled) { transform:translateY(-2px); box-shadow:0 10px 30px rgba(27,67,50,0.38); }
    .submit-btn:active:not(:disabled) { transform:translateY(0); }
    .submit-btn:disabled { opacity:0.7; cursor:not-allowed; }
    .btn-text { display:flex; align-items:center; gap:8px; }
    .btn-loader { display:none; width:19px; height:19px; border:2.5px solid rgba(255,255,255,0.3); border-top-color:#fff; border-radius:50%; animation:spin 0.7s linear infinite; }
    .submit-btn.loading .btn-text { display:none; }
    .submit-btn.loading .btn-loader { display:block; }
    @keyframes spin { to{transform:rotate(360deg)} }

    .ripple { position:absolute; border-radius:50%; background:rgba(255,255,255,0.18); transform:scale(0); animation:rippleAnim 0.6s linear; pointer-events:none; }
    @keyframes rippleAnim { to{transform:scale(4);opacity:0} }

    .divider { display:flex; align-items:center; gap:12px; margin:18px 0; color:var(--muted); font-size:12.5px; font-weight:500; }
    .divider::before,.divider::after { content:''; flex:1; height:1px; background:var(--border); }

    .social-row { display:flex; gap:10px; }
    .social-btn {
      flex:1; padding:12px; border:1.5px solid var(--border); border-radius:10px;
      background:#fff; font-family:'Inter',sans-serif; font-size:13.5px; font-weight:600;
      cursor:pointer; color:var(--text);
      display:flex; align-items:center; justify-content:center; gap:8px;
      transition:border-color 0.2s, background 0.2s, transform 0.2s var(--spring), box-shadow 0.2s;
    }
    .social-btn:hover { border-color:var(--green-lt); background:#f4fdf8; transform:translateY(-2px); box-shadow:0 4px 16px rgba(27,67,50,0.1); }
    .social-btn svg { width:18px; height:18px; flex-shrink:0; }

    .create-btn {
      width:100%; padding:15px; background:transparent;
      color:var(--green-mid); border:1.5px solid var(--green-lt); border-radius:10px;
      font-family:'Inter',sans-serif; font-size:14px; font-weight:700;
      cursor:pointer; display:flex; align-items:center; justify-content:center;
      margin-top:18px;
      transition:background 0.2s, border-color 0.2s, color 0.2s, transform 0.2s var(--spring);
    }
    .create-btn:hover { background:#f0fdf7; border-color:var(--green-mid); color:var(--green); transform:translateY(-1px); }

    .terms-note { font-size:12px; color:var(--muted); text-align:center; margin-top:16px; line-height:1.7; }
    .terms-note a { color:var(--green-mid); font-weight:600; text-decoration:none; }
    .terms-note a:hover { color:var(--green); }

    .form-footer-links { margin-top:28px; padding-top:20px; border-top:1px solid var(--border); display:flex; flex-wrap:wrap; gap:6px 10px; justify-content:center; }
    .form-footer-links a { font-size:12px; color:var(--muted); text-decoration:none; transition:color 0.2s; }
    .form-footer-links a:hover { color:var(--text); text-decoration:underline; }
    .form-footer-links .sep { color:var(--border); font-size:12px; }
    .form-copyright { text-align:center; font-size:12px; color:var(--muted); margin-top:14px; }

    /* MODAL */
    .v-overlay { position:fixed; inset:0; background:rgba(0,0,0,0.5); backdrop-filter:blur(6px); -webkit-backdrop-filter:blur(6px); z-index:900; display:flex; align-items:center; justify-content:center; padding:24px; opacity:0; pointer-events:none; transition:opacity 0.3s var(--ease); }
    .v-overlay.open { opacity:1; pointer-events:all; }
    .v-modal { background:#fff; border-radius:22px; padding:42px 38px; max-width:420px; width:100%; box-shadow:0 32px 80px rgba(0,0,0,0.22); transform:translateY(24px) scale(0.97); transition:transform 0.35s var(--spring); position:relative; overflow:hidden; }
    .v-overlay.open .v-modal { transform:translateY(0) scale(1); }
    .v-modal-strip { position:absolute; top:0; left:0; right:0; height:4px; }
    .v-modal-strip.error-strip   { background:linear-gradient(90deg,var(--rose) 0%,#ff9a9a 100%); }
    .v-modal-strip.success-strip { background:linear-gradient(90deg,var(--green-lt) 0%,var(--green-mid) 100%); }
    .v-modal-strip.info-strip    { background:linear-gradient(90deg,var(--gold) 0%,#29A9E1 100%); }
    .v-icon-wrap { width:62px; height:62px; border-radius:18px; margin-bottom:20px; display:flex; align-items:center; justify-content:center; font-size:2rem; animation:iconBounce 0.5s var(--spring) 0.1s both; }
    @keyframes iconBounce { from{transform:scale(0.5);opacity:0} to{transform:scale(1);opacity:1} }
    .v-icon-wrap.error   { background:rgba(255,107,107,0.1); }
    .v-icon-wrap.success { background:rgba(82,183,136,0.12); }
    .v-icon-wrap.info    { background:rgba(244,196,48,0.12); }
    .v-modal h3 { font-size:1.35rem; margin-bottom:10px; letter-spacing:-0.01em; }
    .v-modal p  { font-size:14px; color:var(--muted); line-height:1.75; margin-bottom:26px; }
    .v-error-list { background:#FFF5F5; border:1.5px solid rgba(255,107,107,0.2); border-radius:12px; padding:14px 16px; margin-bottom:22px; display:none; }
    .v-error-list.show { display:block; }
    .v-error-list ul { list-style:none; display:flex; flex-direction:column; gap:7px; }
    .v-error-list li { display:flex; align-items:flex-start; gap:8px; font-size:13px; color:#c62828; font-weight:500; }
    .v-error-list li::before { content:''; width:6px; height:6px; border-radius:50%; background:var(--rose); flex-shrink:0; margin-top:5px; }
    .v-modal-actions { display:flex; gap:10px; }
    .v-btn-primary { flex:1; padding:13px 20px; background:linear-gradient(135deg,var(--green) 0%,var(--green-mid) 100%); color:#fff; border:none; border-radius:10px; font-family:'Inter',sans-serif; font-size:14px; font-weight:700; cursor:pointer; transition:transform 0.2s var(--spring), box-shadow 0.2s; box-shadow:0 4px 14px rgba(27,67,50,0.25); }
    .v-btn-primary:hover { transform:translateY(-2px); box-shadow:0 8px 22px rgba(27,67,50,0.35); }
    .v-btn-secondary { padding:13px 20px; background:transparent; color:var(--muted); border:1.5px solid var(--border); border-radius:10px; font-family:'Inter',sans-serif; font-size:14px; font-weight:700; cursor:pointer; transition:border-color 0.2s, color 0.2s; }
    .v-btn-secondary:hover { border-color:#bbb; color:var(--text); }
    .v-field { margin-bottom:6px; }
    .v-field input { width:100%; padding:13px 16px; border:1.5px solid var(--border); border-radius:10px; font-family:'Inter',sans-serif; font-size:14.5px; color:var(--text); background:var(--input-bg); outline:none; transition:border-color 0.22s, box-shadow 0.22s; }
    .v-field input:focus { border-color:var(--green-lt); background:#fff; box-shadow:0 0 0 3px var(--green-glow); }
    .v-field input.is-error { border-color:var(--rose); }
    .v-success-msg { display:none; background:rgba(82,183,136,0.08); border:1.5px solid rgba(82,183,136,0.28); border-radius:10px; padding:12px 14px; color:#1b5e20; font-size:13.5px; font-weight:600; align-items:center; gap:10px; margin-bottom:18px; }
    .v-success-msg.show { display:flex; }
    .v-close { position:absolute; top:16px; right:16px; width:32px; height:32px; border-radius:50%; background:rgba(0,0,0,0.06); border:none; cursor:pointer; display:flex; align-items:center; justify-content:center; color:var(--muted); font-size:14px; transition:background 0.2s, color 0.2s; }
    .v-close:hover { background:rgba(0,0,0,0.12); color:var(--text); }

    @keyframes fadeUp { from{opacity:0;transform:translateY(20px)} to{opacity:1;transform:translateY(0)} }

    @media(max-width:960px) {
      .hero-side { display:none; }
      .form-side { width:100%; padding:40px 20px; box-shadow:none; background:var(--bg); align-items:center; }
      .form-inner { width:100%; max-width:420px; background:#fff; border-radius:20px; padding:36px 28px; box-shadow:0 4px 24px rgba(0,0,0,0.08); }
    }
    @media(min-width:961px) { .form-inner { width:100%; } }
  </style>
</head>
<body>

<div class="page-wrap">

  <!-- LEFT HERO -->
  <div class="hero-side">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <a href="guestpage.php" class="hero-logo">
      Biya<span class="accent">hero</span>
      <span class="hero-logo-badge">Beta</span>
    </a>

    <div class="hero-main">
      <div class="hero-copy">
        <div class="">
          
        </div>
        <h1 class="hero-tagline">I-explore ang<br><span class="hi">biyahe mo.</span></h1>
        <p class="hero-desc">Ang iyong gabay sa commuting sa San Jose del Monte, Bulacan. Routes, fares, at schedules — lahat nandito, libre!</p>
      </div>

      <!-- LOTTIE as centrepiece -->
      <div class="lottie-stage">
        <dotlottie-wc src="https://lottie.host/edcb1828-d098-493d-85af-893c34904b2c/GLOHsnxOaZ.lottie" style="width:480px;height:380px" autoplay loop></dotlottie-wc>

        <!-- Info pills floating at the bottom of the animation -->
        <div class="lottie-pills">
          <div class="info-pill pill-route">
            <div class="pill-label">Sample Route</div>
            <div class="route-stack">
              <div class="route-item"><span class="rdot g"></span>SJDM Poblacion</div>
              <div class="rline"></div>
              <div class="route-item"><span class="rdot y"></span>SM Fairview</div>
            </div>
          </div>
          <div class="info-pill pill-stat">
            <div class="pill-label">Pinakamababang Pamasahe</div>
            <div class="big">₱13</div>
            <div class="unit">starting fare</div>
          </div>
        </div>
      </div>
    </div>

    <div class="hero-footer">Biyahero · San Jose del Monte, Bulacan · Libre · Para sa lahat · Community-made 🇵🇭</div>
  </div>

  <!-- RIGHT FORM -->
  <div class="form-side">
    <div class="form-inner">

      <a href="guestpage.php" class="back-link">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        Bumalik
      </a>

      <div class="form-header">
        <h2>Mag-login sa Biyahero</h2>
        <p>I-access ang lahat ng routes, fares, at commute tools.</p>
      </div>

      <div class="tab-toggle">
        <div class="tab-slider" id="tabSlider"></div>
        <button class="tab-btn active" id="loginTab" onclick="switchTab('login')">Mag-login</button>
        <button class="tab-btn" id="registerTab" onclick="switchTab('register')">Mag-sign up</button>
      </div>

      <!-- LOGIN PANEL -->
      <div class="auth-panel active" id="loginPanel">
        <div class="field">
          <label class="field-label">Email Address</label>
          <div class="field-inner">
            <input type="email" id="loginEmail" placeholder="ikaw@email.com" autocomplete="email" oninput="liveValidate('loginEmail','email')">
            <span class="field-icon" id="loginEmailIcon">
              <svg viewBox="0 0 24 24" fill="none" stroke="#52B788" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            </span>
          </div>
          <div class="inline-err" id="loginEmailErr">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            Pakiusap maglagay ng wastong email.
          </div>
        </div>
        <div class="field">
          <label class="field-label">Password</label>
          <div class="field-inner">
            <input type="password" id="loginPass" placeholder="Ang iyong password" autocomplete="current-password" oninput="liveValidate('loginPass','required')">
            <button class="eye-btn" onclick="toggleEye('loginPass',this)" type="button" aria-label="Toggle password">
              <svg id="eyeIcon_loginPass" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
          </div>
          <div class="inline-err" id="loginPassErr">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            Pakiusap maglagay ng password.
          </div>
        </div>
        <a href="#" class="forgot-link" onclick="openForgot(event)">Nakalimutan ang password?</a>
        <button class="submit-btn" id="loginBtn" onclick="doLogin(event)">
          <span class="btn-text">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
            Mag-login
          </span>
          <div class="btn-loader"></div>
        </button>
        <div class="divider">o mag-login gamit</div>
        <div class="social-row">
          <button class="social-btn" onclick="doSocialLogin('Google')">
            <svg viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
            Google
          </button>
          <button class="social-btn" onclick="doSocialLogin('Facebook')">
            <svg viewBox="0 0 24 24"><path fill="#1877F2" d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047v-2.66c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/></svg>
            Facebook
          </button>
        </div>
        <button class="create-btn" onclick="switchTab('register')">Gumawa ng Bagong Account</button>
      </div>

      <!-- REGISTER PANEL -->
      <div class="auth-panel" id="registerPanel">
        <div class="field-row">
          <div class="field">
            <label class="field-label">Pangalan</label>
            <div class="field-inner">
              <input type="text" id="regFirst" placeholder="Juan" autocomplete="given-name" oninput="liveValidate('regFirst','required')">
              <span class="field-icon" id="regFirstIcon"><svg viewBox="0 0 24 24" fill="none" stroke="#52B788" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
            </div>
            <div class="inline-err" id="regFirstErr"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>Lagay ang iyong pangalan.</div>
          </div>
          <div class="field">
            <label class="field-label">Apelyido</label>
            <div class="field-inner">
              <input type="text" id="regLast" placeholder="Dela Cruz" autocomplete="family-name" oninput="liveValidate('regLast','required')">
              <span class="field-icon" id="regLastIcon"><svg viewBox="0 0 24 24" fill="none" stroke="#52B788" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
            </div>
            <div class="inline-err" id="regLastErr"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>Lagay ang iyong apelyido.</div>
          </div>
        </div>
        <div class="field">
          <label class="field-label">Email Address</label>
          <div class="field-inner">
            <input type="email" id="regEmail" placeholder="ikaw@email.com" autocomplete="email" oninput="liveValidate('regEmail','email')">
            <span class="field-icon" id="regEmailIcon"><svg viewBox="0 0 24 24" fill="none" stroke="#52B788" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
          </div>
          <div class="inline-err" id="regEmailErr"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>Pakiusap maglagay ng wastong email.</div>
        </div>
        <div class="field">
          <label class="field-label">Password</label>
          <div class="field-inner">
            <input type="password" id="regPass" placeholder="Minimum 8 characters" autocomplete="new-password" oninput="checkStrength(this.value); liveValidate('regPass','password')">
            <button class="eye-btn" onclick="toggleEye('regPass',this)" type="button"><svg id="eyeIcon_regPass" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></button>
          </div>
          <div class="strength-wrap"><div class="strength-track"><div class="strength-fill" id="strengthFill"></div></div><div class="strength-text" id="strengthLabel"></div></div>
          <div class="inline-err" id="regPassErr"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>Password ay dapat 8+ characters.</div>
        </div>
        <div class="field">
          <label class="field-label">Kumpirmahin ang Password</label>
          <div class="field-inner">
            <input type="password" id="regPass2" placeholder="Ulitin ang password" autocomplete="new-password" oninput="liveValidate('regPass2','match')">
            <button class="eye-btn" onclick="toggleEye('regPass2',this)" type="button"><svg id="eyeIcon_regPass2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></button>
          </div>
          <div class="inline-err" id="regPass2Err"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>Hindi magkapareho ang mga password.</div>
        </div>
        <button class="submit-btn" id="regBtn" onclick="doRegister(event)" style="margin-top:6px;">
          <span class="btn-text">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
            Gumawa ng Account
          </span>
          <div class="btn-loader"></div>
        </button>
        <p class="terms-note">
          Sa pag-sign up, sumasang-ayon ka sa aming <a href="#">Terms of Use</a> at <a href="#">Privacy Policy</a>.<br>
          May account na? <a href="#" onclick="switchTab('login');return false;">Mag-login →</a>
        </p>
      </div>

      <div class="form-footer-links">
        <a href="#">Mag-sign Up</a><span class="sep">·</span>
        <a href="#">Mag-login</a><span class="sep">·</span>
        <a href="#">Privacy Policy</a><span class="sep">·</span>
        <a href="#">Terms</a><span class="sep">·</span>
        <a href="#">Contact Us</a>
      </div>
      <div class="form-copyright">Biyahero © 2025 · Community-made 🇵🇭</div>

    </div>
  </div>

</div>

<!-- MODAL -->
<div class="v-overlay" id="vOverlay" onclick="closeModalOutside(event)">
  <div class="v-modal" id="vModal">
    <div class="v-modal-strip" id="vStrip"></div>
    <button class="v-close" onclick="closeModal()" aria-label="Close">✕</button>
    <div class="v-icon-wrap" id="vIconWrap"><span id="vIcon"></span></div>
    <h3 id="vTitle"></h3>
    <p id="vBody"></p>
    <div class="v-error-list" id="vErrorList"><ul id="vErrorListUl"></ul></div>
    <div id="vForgotSection" style="display:none;">
      <div class="v-field" style="margin-bottom:16px;"><input type="email" id="forgotEmail" placeholder="ikaw@email.com"></div>
      <div class="v-success-msg" id="forgotSuccess"><span>✅</span><span>Na-send na ang reset link! Tingnan ang iyong email.</span></div>
    </div>
    <div class="v-modal-actions" id="vActions"></div>
  </div>
</div>

<script>
function getUsers()    { try { return JSON.parse(localStorage.getItem('biyahero_users') || '[]'); } catch { return []; } }
function saveUsers(u)  { localStorage.setItem('biyahero_users', JSON.stringify(u)); }
function setSession(u) { localStorage.setItem('biyahero_session', JSON.stringify(u)); }
function getSession()  { try { return JSON.parse(localStorage.getItem('biyahero_session')); } catch { return null; } }

if (getSession()) { const dest = new URLSearchParams(location.search).get('redirect') || '../index.php'; location.href = dest; }

function switchTab(tab) {
  const slider = document.getElementById('tabSlider');
  const lt = document.getElementById('loginTab'), rt = document.getElementById('registerTab');
  document.getElementById('loginPanel').classList.toggle('active', tab === 'login');
  document.getElementById('registerPanel').classList.toggle('active', tab === 'register');
  lt.classList.toggle('active', tab === 'login');
  rt.classList.toggle('active', tab === 'register');
  const ab = tab === 'login' ? lt : rt;
  slider.style.left = ab.offsetLeft + 'px'; slider.style.width = ab.offsetWidth + 'px';
}
window.addEventListener('load', () => {
  const lt = document.getElementById('loginTab'), sl = document.getElementById('tabSlider');
  sl.style.left = lt.offsetLeft + 'px'; sl.style.width = lt.offsetWidth + 'px';
});

function liveValidate(id, type) {
  const input = document.getElementById(id), errEl = document.getElementById(id+'Err'), iconEl = document.getElementById(id+'Icon');
  const val = input.value.trim(); let valid = true;
  if (type==='email')    valid = val.length>0 && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val);
  if (type==='required') valid = val.length>0;
  if (type==='password') valid = val.length>=8;
  if (type==='match')    valid = val===document.getElementById('regPass').value;
  if (val.length===0) { input.classList.remove('is-error','is-valid'); if(errEl)errEl.classList.remove('show'); if(iconEl)iconEl.classList.remove('visible'); return; }
  input.classList.toggle('is-error',!valid); input.classList.toggle('is-valid',valid);
  if(errEl)errEl.classList.toggle('show',!valid); if(iconEl)iconEl.classList.toggle('visible',valid);
}

function toggleEye(inputId, btn) {
  const input = document.getElementById(inputId), icon = document.getElementById('eyeIcon_'+inputId);
  if (input.type==='password') { input.type='text'; icon.innerHTML='<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>'; }
  else { input.type='password'; icon.innerHTML='<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>'; }
}

function checkStrength(val) {
  const fill=document.getElementById('strengthFill'), label=document.getElementById('strengthLabel');
  if(!val){fill.style.width='0';label.textContent='';return;}
  let score=0;
  if(val.length>=8)score++;if(val.length>=12)score++;if(/[A-Z]/.test(val))score++;if(/[0-9]/.test(val))score++;if(/[^A-Za-z0-9]/.test(val))score++;
  const levels=[{w:'18%',c:'#e53935',t:'Mahina'},{w:'38%',c:'#ff7043',t:'Medyo Mahina'},{w:'60%',c:'#ffa726',t:'Katamtaman'},{w:'80%',c:'#66bb6a',t:'Malakas'},{w:'100%',c:'#2e7d32',t:'Napakalakas 💪'}];
  const lvl=levels[Math.min(score-1,4)]||levels[0];
  fill.style.width=lvl.w;fill.style.background=lvl.c;label.textContent=lvl.t;label.style.color=lvl.c;
}

function addRipple(btn, e) {
  const rect=btn.getBoundingClientRect(), size=Math.max(rect.width,rect.height);
  const r=document.createElement('span'); r.className='ripple';
  r.style.cssText=`width:${size}px;height:${size}px;left:${e.clientX-rect.left-size/2}px;top:${e.clientY-rect.top-size/2}px`;
  btn.appendChild(r); r.addEventListener('animationend',()=>r.remove());
}

function openModal({type,icon,title,body,errors,actions,showForgot}) {
  const ov=document.getElementById('vOverlay'), strip=document.getElementById('vStrip');
  const iconW=document.getElementById('vIconWrap'), iconEl=document.getElementById('vIcon');
  const titleEl=document.getElementById('vTitle'), bodyEl=document.getElementById('vBody');
  const errList=document.getElementById('vErrorList'), errUl=document.getElementById('vErrorListUl');
  const actEl=document.getElementById('vActions'), frgSec=document.getElementById('vForgotSection');
  const frgOk=document.getElementById('forgotSuccess');
  strip.className='v-modal-strip '+(type==='error'?'error-strip':type==='success'?'success-strip':'info-strip');
  iconW.className='v-icon-wrap '+type; iconEl.textContent=icon;
  titleEl.textContent=title; bodyEl.textContent=body||''; bodyEl.style.display=body?'block':'none';
  errUl.innerHTML='';
  if(errors&&errors.length){errors.forEach(e=>{const li=document.createElement('li');li.textContent=e;errUl.appendChild(li);});errList.classList.add('show');}
  else errList.classList.remove('show');
  frgSec.style.display=showForgot?'block':'none';
  if(showForgot){frgOk.classList.remove('show');document.getElementById('forgotEmail').value='';}
  actEl.innerHTML='';
  if(actions) actions.forEach(a=>{const btn=document.createElement('button');btn.className=a.primary?'v-btn-primary':'v-btn-secondary';btn.textContent=a.label;btn.onclick=a.fn;actEl.appendChild(btn);});
  ov.classList.add('open');
}
function closeModal() { document.getElementById('vOverlay').classList.remove('open'); }
function closeModalOutside(e) { if(e.target===document.getElementById('vOverlay'))closeModal(); }
function setLoading(btnId,on) { const btn=document.getElementById(btnId); btn.classList.toggle('loading',on); btn.disabled=on; }

async function doLogin(e) {
  if(e)addRipple(e.currentTarget,e);
  const email=document.getElementById('loginEmail').value.trim(), pass=document.getElementById('loginPass').value, errs=[];
  if(!email||!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email))errs.push('Pakiusap maglagay ng wastong email address.');
  if(!pass)errs.push('Pakiusap maglagay ng iyong password.');
  if(errs.length){openModal({type:'error',icon:'⚠️',title:'Hindi Makapag-login',body:'Mangyaring ayusin ang mga sumusunod:',errors:errs,actions:[{label:'Subukan Muli',primary:true,fn:closeModal}]});return;}
  setLoading('loginBtn',true);
  
  try {
    const result = await ApiClient.login(email, pass);
    setLoading('loginBtn',false);
    
    if(result.success) {
      const firstName = result.data.firstName || 'User';
      setSession({email:result.data.email,first:firstName,last:result.data.lastName});
      localStorage.setItem('biyahero_user_email', result.data.email);
      openModal({type:'success',icon:'🎉',title:'Maligayang Pagbabalik!',body:`Kamusta, ${firstName}! Ikaw ay matagumpay na naka-login. Papunta ka na sa Biyahero Guide…`,actions:[{label:'Tuloy na!',primary:true,fn:()=>{closeModal();setTimeout(()=>{location.href=new URLSearchParams(location.search).get('redirect')||'../index.php';},300);}}]});
    } else {
      openModal({type:'error',icon:'🔐',title:'Mali ang Credentials',body:result.message || 'Hindi namin makilala ang email o password na iyong inilagay. Subukan muli o mag-sign up.',actions:[{label:'Subukan Muli',primary:true,fn:closeModal},{label:'Mag-sign up',primary:false,fn:()=>{closeModal();switchTab('register');}}]});
    }
  } catch(error) {
    setLoading('loginBtn',false);
    openModal({type:'error',icon:'⚠️',title:'Error sa Login',body:'Nagkaroon ng error sa pag-connect sa server. Pakisubukan muli.',actions:[{label:'Subukan Muli',primary:true,fn:closeModal}]});
  }
}

async function doRegister(e) {
  if(e)addRipple(e.currentTarget,e);
  const first=document.getElementById('regFirst').value.trim(), last=document.getElementById('regLast').value.trim();
  const email=document.getElementById('regEmail').value.trim(), pass=document.getElementById('regPass').value, pass2=document.getElementById('regPass2').value, errs=[];
  if(!first)errs.push('Pakiusap maglagay ng iyong pangalan.');
  if(!last)errs.push('Pakiusap maglagay ng iyong apelyido.');
  if(!email||!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email))errs.push('Pakiusap maglagay ng wastong email address.');
  if(!pass||pass.length<8)errs.push('Ang password ay dapat may 8 o higit pang characters.');
  if(pass!==pass2)errs.push('Hindi magkapareho ang mga password. Subukan muli.');
  if(errs.length){openModal({type:'error',icon:'📋',title:'Hindi Makapag-sign up',body:'Mangyaring ayusin ang mga sumusunod bago magpatuloy:',errors:errs,actions:[{label:'Ayusin',primary:true,fn:closeModal}]});return;}
  setLoading('regBtn',true);
  
  try {
    const result = await ApiClient.register(email, pass, first, last);
    setLoading('regBtn',false);
    
    if(result.success) {
      setSession({email:result.data.email,first:result.data.firstName,last:result.data.lastName});
      localStorage.setItem('biyahero_user_email', result.data.email);
      openModal({type:'success',icon:'🎊',title:'Maligayang Pagdating, '+first+'!',body:'Ang iyong account ay matagumpay na nagawa. Ikaw ay nire-redirect sa Biyahero Guide ngayon…',actions:[{label:'Simulan Na!',primary:true,fn:()=>{closeModal();setTimeout(()=>{location.href=new URLSearchParams(location.search).get('redirect')||'../index.php';},300);}}]});
    } else {
      openModal({type:'error',icon:'📧',title:'Hindi Makapag-sign up',body:result.message || 'Nagkaroon ng error sa pagrehistro. Subukan muli.',actions:[{label:'Subukan Muli',primary:true,fn:closeModal},{label:'Mag-login',primary:false,fn:()=>{closeModal();switchTab('login');}}]});
    }
  } catch(error) {
    setLoading('regBtn',false);
    openModal({type:'error',icon:'⚠️',title:'Error sa Registration',body:'Nagkaroon ng error sa pag-connect sa server. Pakisubukan muli.',actions:[{label:'Subukan Muli',primary:true,fn:closeModal}]});
  }
}

function openForgot(e) {
  e.preventDefault();
  openModal({type:'info',icon:'🔑',title:'I-reset ang Password',body:'Ilagay ang iyong email address at magpapadala kami ng link para ma-reset ang iyong password.',showForgot:true,actions:[{label:'Magpadala ng Reset Link',primary:true,fn:doForgot},{label:'Bumalik',primary:false,fn:closeModal}]});
}
function doForgot() {
  const emailInput=document.getElementById('forgotEmail'), email=emailInput.value.trim();
  if(!email||!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)){emailInput.classList.add('is-error');emailInput.focus();return;}
  emailInput.classList.remove('is-error');
  const forgotBtn=document.querySelector('#vActions .v-btn-primary');
  if(forgotBtn){forgotBtn.textContent='Nagpapadala…';forgotBtn.disabled=true;}
  setTimeout(()=>{
    document.getElementById('forgotSuccess').classList.add('show');
    document.getElementById('vForgotSection').querySelector('input').style.display='none';
    const actEl=document.getElementById('vActions'); actEl.innerHTML='';
    const okBtn=document.createElement('button'); okBtn.className='v-btn-primary'; okBtn.textContent='Salamat!'; okBtn.style.flex='1'; okBtn.onclick=closeModal; actEl.appendChild(okBtn);
  },1000);
}

function doSocialLogin(provider) {
  openModal({type:'info',icon:provider==='Google'?'🔵':'📘',title:provider+' Login (Demo)',body:`Ito ay demo mode. Sa production, ire-redirect ka sa ${provider}'s OAuth page.`,actions:[{label:'Sige, Tuloy',primary:true,fn:()=>{closeModal();setSession({email:`demo@${provider.toLowerCase()}.com`,first:'Demo',last:'User'});location.href=new URLSearchParams(location.search).get('redirect')||'../index.php';}},{label:'Kanselahin',primary:false,fn:closeModal}]});
}

document.addEventListener('keydown',e=>{
  if(e.key!=='Enter')return;
  if(document.getElementById('vOverlay').classList.contains('open'))return;
  if(document.getElementById('loginPanel').classList.contains('active'))doLogin(null);
  else doRegister(null);
});
document.addEventListener('keydown',e=>{if(e.key==='Escape')closeModal();});
</script>
</body>
</html>
