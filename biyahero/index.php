<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biyahero | SJDM Commuting Guide</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,700;0,9..144,900;1,9..144,300;1,9..144,700&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css">
    <link rel="stylesheet" href="subscription/subscription.css">
    <script src="js/api.js"></script>
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.9.14/dist/dotlottie-wc.js" type="module"></script>
    <style>
        :root {
            --green:     #1B4332;
            --green-mid: #2D6A4F;
            --green-lt:  #52B788;
            --gold:      #F4C430;
            --sky:       #29A9E1;
            --rose:      #FF6B6B;
            --bg:        #F7F3EC;
            --card:      #FDFAF5;
            --text:      #181818;
            --muted:     #6B6560;
            --border:    rgba(27,67,50,0.1);
            --shadow:    0 6px 32px rgba(27,67,50,0.08);
            --shadow-lg: 0 20px 60px rgba(27,67,50,0.14);
            --r:         all 0.28s cubic-bezier(0.4,0,0.2,1);
        }

        *,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
        html{scroll-behavior:smooth;}
        body{font-family:'DM Sans',sans-serif;background:var(--bg);color:var(--text);line-height:1.6;overflow-x:hidden;}
        h1,h2,h3{font-family:'Fraunces',serif;font-weight:700;}
        .container{max-width:1180px;margin:0 auto;padding:0 24px;}
        ::-webkit-scrollbar{width:5px;}
            ::-webkit-scrollbar-thumb{background:var(--green);border-radius:3px;}

            /* ═══ TICKER ═══ */
            .ticker{background:var(--green);color:rgba(255,255,255,0.85);font-size:12.5px;font-weight:500;overflow:hidden;white-space:nowrap;padding:8px 0;position:fixed;top:0;width:100%;z-index:1001;}
            .ticker-inner{display:inline-flex;gap:0;animation:scroll-ticker 50s linear infinite;}
            .ticker-sep{color:var(--gold);margin:0 20px;opacity:0.7;}
            @keyframes scroll-ticker{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}

            /* ═══ NAVBAR — Mega Menu (Enhanced) ═══ */
            .nav{
                background:rgba(18,58,38,0.85);
                backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);
                position:fixed;top:33px;width:100%;z-index:1000;
                transition:background 0.4s ease,box-shadow 0.4s ease;
                border-bottom:1px solid rgba(255,255,255,0.08);
            }
            .nav.scrolled{
                background:rgba(13,45,28,0.96);
                box-shadow:0 8px 40px rgba(0,0,0,0.28);
            }
            .nav>.container{display:flex;align-items:center;justify-content:space-between;height:64px;gap:16px;}

            /* Logo */
            .logo{font-family:'Fraunces',serif;font-size:23px;color:#fff;text-decoration:none;display:flex;align-items:center;gap:3px;font-weight:900;flex-shrink:0;transition:opacity 0.2s;}
            .logo:hover{opacity:0.85;}
            .logo-accent{color:var(--gold);}
            .logo-tagline{font-family:'DM Sans',sans-serif;font-size:10.5px;font-weight:500;color:rgba(255,255,255,0.38);margin-left:10px;letter-spacing:0.04em;white-space:nowrap;}

            /* Top-level nav list */
            .nav-links{display:flex;gap:2px;list-style:none;align-items:center;height:64px;margin:0;padding:0;}
            .nav-links>li{position:relative;display:flex;align-items:center;}
            .nav-links>li>a,.nav-trigger{
                color:rgba(255,255,255,0.72);
                text-decoration:none;font-size:13px;font-weight:600;
                padding:8px 14px;border-radius:12px;
                display:flex;align-items:center;gap:6px;
                cursor:pointer;border:none;background:transparent;
                font-family:'DM Sans',sans-serif;white-space:nowrap;
                transition:color 0.22s,background 0.22s,transform 0.18s;
            }
            .nav-links>li>a:hover,.nav-trigger:hover{color:#fff;background:rgba(255,255,255,0.1);transform:translateY(-1px);}
            .nav-links>li.open>a,.nav-links>li.open>.nav-trigger{color:#fff;background:rgba(255,255,255,0.12);}
            .nav-links>li>a.active{color:var(--gold);}

            /* Animated chevron */
            .nav-chevron{
                display:inline-block;font-size:10px;opacity:0.55;
                transition:transform 0.3s cubic-bezier(0.34,1.56,0.64,1),opacity 0.2s;
            }
            .nav-links>li.open .nav-chevron{transform:rotate(180deg);opacity:1;}

            /* Pill-style special links */
            .nav-kumita-link{
                background:rgba(244,196,48,0.13)!important;
                color:var(--gold)!important;
                border:1px solid rgba(244,196,48,0.22)!important;
                border-radius:100px!important;
                padding:8px 16px!important;
            }
            .nav-kumita-link:hover{background:rgba(244,196,48,0.24)!important;color:#fff!important;border-color:rgba(244,196,48,0.4)!important;}
            .nav-cta-link{
                background:rgba(255,107,107,0.15)!important;
                color:#ffbdbd!important;
                border:1px solid rgba(255,107,107,0.22)!important;
                border-radius:100px!important;
                padding:8px 16px!important;
            }
            .nav-cta-link:hover{background:rgba(255,107,107,0.28)!important;color:#fff!important;}

            /* ── Mega dropdown panel — smooth open/close ── */
            .mega-drop,.simple-drop{
                visibility:hidden;
                opacity:0;
                pointer-events:none;
                transform:translateX(-50%) translateY(-10px) scale(0.97);
                transition:
                    opacity 0.28s cubic-bezier(0.16,1,0.3,1),
                    transform 0.28s cubic-bezier(0.16,1,0.3,1),
                    visibility 0s linear 0.28s;
            }
            .mega-drop{
                position:absolute;top:calc(100% + 10px);left:50%;
                background:rgba(12,40,26,0.96);
                backdrop-filter:blur(24px);-webkit-backdrop-filter:blur(24px);
                border:1px solid rgba(255,255,255,0.1);
                border-radius:22px;
                box-shadow:0 32px 80px rgba(0,0,0,0.4),0 0 0 1px rgba(255,255,255,0.04) inset;
                min-width:580px;padding:0;overflow:hidden;z-index:999;
            }
            .simple-drop{
                position:absolute;top:calc(100% + 10px);left:0;
                background:rgba(12,40,26,0.96);
                backdrop-filter:blur(24px);-webkit-backdrop-filter:blur(24px);
                border:1px solid rgba(255,255,255,0.1);
                border-radius:18px;
                box-shadow:0 24px 60px rgba(0,0,0,0.35),0 0 0 1px rgba(255,255,255,0.04) inset;
                min-width:230px;padding:10px;z-index:999;
                transform:translateY(-10px) scale(0.97);
            }
            .nav-links>li.open .mega-drop,
            .nav-links>li.open .simple-drop{
                visibility:visible;opacity:1;pointer-events:auto;
                transform:translateX(-50%) translateY(0) scale(1);
                transition:
                    opacity 0.28s cubic-bezier(0.16,1,0.3,1),
                    transform 0.28s cubic-bezier(0.16,1,0.3,1),
                    visibility 0s linear 0s;
            }
            .nav-links>li.open .simple-drop{
                transform:translateY(0) scale(1);
            }

            /* Connector bridge so mouse can travel to dropdown */
            .mega-drop::before,.simple-drop::before{
                content:'';position:absolute;top:-12px;left:0;right:0;height:12px;
            }

            /* Mega header strip */
            .mega-header{
                background:rgba(255,255,255,0.03);
                border-bottom:1px solid rgba(255,255,255,0.07);
                padding:16px 22px 13px;
                display:flex;align-items:center;justify-content:space-between;
            }
            .mega-header-title{font-family:'Fraunces',serif;font-size:13px;color:rgba(255,255,255,0.45);font-weight:700;letter-spacing:0.06em;text-transform:uppercase;}
            .mega-header-sub{font-size:11.5px;color:rgba(255,255,255,0.3);}

            /* Mega items grid — staggered entrance */
            .mega-grid{display:grid;padding:16px;gap:4px;}
            .mega-grid.cols-2{grid-template-columns:1fr 1fr;}
            .mega-grid.cols-3{grid-template-columns:1fr 1fr 1fr;}
            .mega-item{
                display:flex;align-items:flex-start;gap:13px;padding:13px 14px;
                border-radius:14px;text-decoration:none;
                transition:background 0.2s,transform 0.2s;
            }
            .mega-item:hover{background:rgba(255,255,255,0.07);transform:translateY(-1px);}
            .mega-item:active{transform:scale(0.98);}
            .mega-icon{
                width:38px;height:38px;border-radius:12px;
                display:flex;align-items:center;justify-content:center;
                font-size:1.15rem;flex-shrink:0;margin-top:1px;
                transition:transform 0.2s;
            }
            .mega-item:hover .mega-icon{transform:scale(1.08);}
            .mega-icon.g{background:rgba(82,183,136,0.16);}
            .mega-icon.y{background:rgba(244,196,48,0.14);}
            .mega-icon.b{background:rgba(41,169,225,0.14);}
            .mega-icon.r{background:rgba(255,107,107,0.14);}
            .mega-icon.p{background:rgba(180,130,255,0.14);}
            .mega-item-text strong{display:block;font-size:13px;font-weight:700;color:#fff;margin-bottom:3px;transition:color 0.2s;}
            .mega-item:hover .mega-item-text strong{color:var(--gold);}
            .mega-item-text span{font-size:11.5px;color:rgba(255,255,255,0.42);line-height:1.45;}
            .mega-footer{
                border-top:1px solid rgba(255,255,255,0.07);
                padding:12px 22px;
                display:flex;align-items:center;justify-content:space-between;
                background:rgba(255,255,255,0.02);
            }
            .mega-footer-note{font-size:11.5px;color:rgba(255,255,255,0.3);}
            .mega-footer-link{font-size:12px;font-weight:700;color:var(--gold);text-decoration:none;transition:color 0.2s,gap 0.2s;display:flex;align-items:center;gap:4px;}
            .mega-footer-link:hover{color:#fff;}

            /* Simple dropdown items */
            .simple-drop a{
                display:flex;align-items:center;gap:10px;
                color:rgba(255,255,255,0.75);text-decoration:none;
                font-size:13px;font-weight:600;padding:10px 14px;border-radius:11px;
                transition:background 0.18s,color 0.18s,transform 0.18s;
            }
            .simple-drop a:hover{background:rgba(255,255,255,0.08);color:#fff;transform:translateX(3px);}
            .simple-drop-div{height:1px;background:rgba(255,255,255,0.07);margin:6px 0;}

            /* ── My Profile dropdown ── */
            .profile-btn{
                display:flex;align-items:center;gap:8px;
                color:rgba(255,255,255,0.82);
                background:rgba(255,255,255,0.07);
                border:1px solid rgba(255,255,255,0.12);
                border-radius:100px;
                padding:7px 14px 7px 8px;
                font-family:'DM Sans',sans-serif;font-size:13px;font-weight:600;
                cursor:pointer;transition:all 0.22s;white-space:nowrap;
            }
            .profile-btn:hover{background:rgba(255,255,255,0.14);border-color:rgba(255,255,255,0.22);color:#fff;}
            .profile-avatar{
                width:28px;height:28px;border-radius:50%;
                background:linear-gradient(135deg,var(--green-lt),var(--gold));
                display:flex;align-items:center;justify-content:center;
                font-size:13px;font-weight:700;color:#fff;flex-shrink:0;
            }
            .profile-chevron{font-size:10px;opacity:0.55;transition:transform 0.3s cubic-bezier(0.34,1.56,0.64,1),opacity 0.2s;margin-left:2px;}
            .profile-li.open .profile-chevron{transform:rotate(180deg);opacity:1;}
            .profile-drop{
                position:absolute;top:calc(100% + 10px);right:0;
                background:rgba(12,40,26,0.97);
                backdrop-filter:blur(24px);-webkit-backdrop-filter:blur(24px);
                border:1px solid rgba(255,255,255,0.1);
                border-radius:18px;
                box-shadow:0 24px 60px rgba(0,0,0,0.38),0 0 0 1px rgba(255,255,255,0.04) inset;
                min-width:210px;padding:10px;z-index:999;
                visibility:hidden;opacity:0;pointer-events:none;
                transform:translateY(-10px) scale(0.97);
                transition:opacity 0.28s cubic-bezier(0.16,1,0.3,1),transform 0.28s cubic-bezier(0.16,1,0.3,1),visibility 0s linear 0.28s;
            }
            .profile-li.open .profile-drop{
                visibility:visible;opacity:1;pointer-events:auto;
                transform:translateY(0) scale(1);
                transition:opacity 0.28s cubic-bezier(0.16,1,0.3,1),transform 0.28s cubic-bezier(0.16,1,0.3,1),visibility 0s linear 0s;
            }
            .profile-drop-header{
                padding:12px 14px 10px;
                border-bottom:1px solid rgba(255,255,255,0.07);
                margin-bottom:6px;
            }
            .profile-drop-name{font-size:13.5px;font-weight:700;color:#fff;margin-bottom:2px;}
            .profile-drop-email{font-size:11.5px;color:rgba(255,255,255,0.38);}
            .profile-drop a,.profile-drop button{
                display:flex;align-items:center;gap:10px;width:100%;
                color:rgba(255,255,255,0.75);text-decoration:none;
                font-family:'DM Sans',sans-serif;font-size:13px;font-weight:600;
                padding:10px 14px;border-radius:11px;border:none;background:transparent;cursor:pointer;text-align:left;
                transition:background 0.18s,color 0.18s,transform 0.18s;
            }
            .profile-drop a:hover,.profile-drop button:hover{background:rgba(255,255,255,0.08);color:#fff;transform:translateX(3px);}
            .profile-drop .profile-logout{color:#ff8a8a!important;}
            .profile-drop .profile-logout:hover{background:rgba(255,107,107,0.12)!important;color:#ffbdbd!important;}
            .profile-drop-div{height:1px;background:rgba(255,255,255,0.07);margin:6px 0;}

            /* Nav right actions */
            .nav-actions{display:flex;align-items:center;gap:8px;flex-shrink:0;}
            .subscription-status{display:flex;align-items:center;}
            .status-badge{display:inline-flex;align-items:center;gap:6px;padding:5px 12px;border-radius:100px;font-size:11.5px;font-weight:700;font-family:'DM Sans',sans-serif;}
            .status-badge.active{background:rgba(82,183,136,0.18);color:#74d9a8;border:1px solid rgba(82,183,136,0.3);}
            .status-badge.trial{background:rgba(244,196,48,0.18);color:var(--gold);border:1px solid rgba(244,196,48,0.3);}
            .status-badge.expired{background:rgba(255,107,107,0.18);color:#ff8a8a;border:1px solid rgba(255,107,107,0.3);}

            /* Hamburger — animates to X when open */
            .hamburger{display:none;flex-direction:column;gap:5px;cursor:pointer;background:rgba(255,255,255,0.09);border:1px solid rgba(255,255,255,0.1);padding:9px;border-radius:12px;flex-shrink:0;transition:background 0.2s;}
            .hamburger:hover{background:rgba(255,255,255,0.15);}
            .hamburger span{width:18px;height:2px;background:#fff;border-radius:2px;display:block;transition:transform 0.3s cubic-bezier(0.34,1.56,0.64,1),opacity 0.2s;}
            .hamburger.open span:nth-child(1){transform:translateY(7px) rotate(45deg);}
            .hamburger.open span:nth-child(2){opacity:0;transform:scaleX(0);}
            .hamburger.open span:nth-child(3){transform:translateY(-7px) rotate(-45deg);}

            /* Mobile drawer — slides down */
            .mobile-nav{
                display:none;flex-direction:column;gap:2px;
                background:rgba(10,34,22,0.98);
                border-top:1px solid rgba(255,255,255,0.07);
                max-height:0;overflow:hidden;
                transition:max-height 0.4s cubic-bezier(0.16,1,0.3,1);
            }
            .mobile-nav.open{display:flex;max-height:80vh;}
            .mobile-nav-section{font-size:10px;font-weight:700;color:rgba(255,255,255,0.26);text-transform:uppercase;letter-spacing:0.12em;padding:14px 18px 4px;}
            .mobile-nav a{
                color:rgba(255,255,255,0.75);text-decoration:none;font-size:13.5px;font-weight:600;
                padding:11px 18px;display:flex;align-items:center;gap:12px;
                border-radius:0;transition:background 0.18s,color 0.18s,padding 0.18s;
            }
            .mobile-nav a:hover{background:rgba(255,255,255,0.06);color:#fff;padding-left:24px;}
            .mobile-nav a .m-icon{width:32px;height:32px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0;}
            .mobile-nav a.m-kumita{color:var(--gold);}
            .mobile-nav a.m-cta{color:#ffbdbd;}
            .mobile-nav-divider{height:1px;background:rgba(255,255,255,0.05);margin:4px 18px;}

            /* ═══ HERO ═══ */
            .hero{min-height:100vh;padding-top:100px;display:flex;align-items:center;position:relative;overflow:hidden;
                background:linear-gradient(150deg,rgba(13,51,35,0.92) 0%,rgba(27,67,50,0.88) 40%,rgba(45,106,79,0.85) 100%),
                        url('commuter.jpg') center/cover no-repeat fixed;}
            .hero-mesh{position:absolute;inset:0;background-image:radial-gradient(ellipse at 20% 50%,rgba(82,183,136,0.18) 0%,transparent 50%),radial-gradient(ellipse at 80% 20%,rgba(41,169,225,0.1) 0%,transparent 50%),radial-gradient(ellipse at 60% 80%,rgba(244,196,48,0.08) 0%,transparent 50%);pointer-events:none;}
            .hero-dots{position:absolute;inset:0;background-image:radial-gradient(circle,rgba(255,255,255,0.05) 1px,transparent 1px);background-size:32px 32px;pointer-events:none;}
            .hero-content{position:relative;z-index:2;display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;}
            .hero-tag{display:inline-flex;align-items:center;gap:8px;background:rgba(82,183,136,0.2);border:1px solid rgba(82,183,136,0.35);color:#74d9a8;padding:5px 14px;border-radius:100px;font-size:12px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;margin-bottom:22px;}
            .hero-tag::before{content:'';width:6px;height:6px;border-radius:50%;background:#52B788;animation:blink 2s infinite;}
            @keyframes blink{0%,100%{opacity:1}50%{opacity:0.3}}
            .hero h1{font-size:clamp(2.8rem,5vw,4rem);color:#fff;line-height:1.1;margin-bottom:20px;}
            .hero h1 em{color:var(--gold);font-style:italic;}
            .hero-sub{color:rgba(255,255,255,0.7);font-size:1.05rem;margin-bottom:36px;max-width:480px;}
            .hero-search{background:rgba(255,255,255,0.08);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,0.15);border-radius:16px;padding:8px;display:flex;gap:8px;margin-bottom:36px;}
            .hero-search input{flex:1;background:none;border:none;outline:none;color:#fff;font-family:'DM Sans',sans-serif;font-size:14.5px;padding:10px 14px;}
            .hero-search input::placeholder{color:rgba(255,255,255,0.45);}
            .hero-search button{background:var(--gold);color:var(--green);border:none;padding:12px 22px;border-radius:10px;font-family:'DM Sans',sans-serif;font-size:14px;font-weight:700;cursor:pointer;transition:var(--r);white-space:nowrap;display:flex;align-items:center;gap:6px;}
            .hero-search button:hover{background:#ffd040;transform:translateY(-1px);}
            .hero-pills{display:flex;flex-wrap:wrap;gap:8px;}
            .hero-pill{background:rgba(255,255,255,0.07);border:1px solid rgba(255,255,255,0.12);color:rgba(255,255,255,0.75);font-size:12.5px;padding:6px 14px;border-radius:100px;cursor:pointer;transition:var(--r);}
            .hero-pill:hover{background:rgba(244,196,48,0.15);border-color:rgba(244,196,48,0.3);color:var(--gold);}
            .hero-right{display:flex;flex-direction:column;gap:14px;align-items:flex-end;justify-content:center;}
            .hero-stat-card{background:rgba(255,255,255,0.07);backdrop-filter:blur(8px);border:1px solid rgba(255,255,255,0.1);border-radius:16px;padding:20px 22px;display:flex;align-items:center;gap:16px;transition:var(--r);}
            .hero-stat-card:hover{background:rgba(255,255,255,0.11);}
            .hero-stat-icon{width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0;}
            .hero-stat-icon.g{background:rgba(82,183,136,0.25);}
            .hero-stat-icon.y{background:rgba(244,196,48,0.2);}
            .hero-stat-icon.b{background:rgba(41,169,225,0.2);}
            .hero-stat-icon.r{background:rgba(255,107,107,0.2);}
            .hero-stat-text strong{display:block;font-size:1.4rem;font-family:'Fraunces',serif;color:#fff;}
            .hero-stat-text span{font-size:12px;color:rgba(255,255,255,0.6);}

            /* ═══ SECTION BASE ═══ */
            .sec{padding:96px 0;}
            .sec-white{background:#fff;}
            .sec-dark{background:var(--green);}
            .sec-hd{text-align:center;margin-bottom:52px;}
            .sec-chip{display:inline-block;background:rgba(41,169,225,0.1);color:var(--sky);border:1px solid rgba(41,169,225,0.25);padding:4px 14px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;margin-bottom:14px;}
            .sec-dark .sec-chip{background:rgba(244,196,48,0.15);color:var(--gold);border-color:rgba(244,196,48,0.3);}
            .sec-ttl{font-size:clamp(1.9rem,4vw,2.7rem);margin-bottom:10px;position:relative;display:inline-block;}
            .sec-ttl::after{content:'';display:block;width:40px;height:3px;background:var(--sky);margin:12px auto 0;border-radius:2px;}
            .sec-dark .sec-ttl{color:#fff;}
            .sec-dark .sec-ttl::after{background:var(--gold);}
            .sec-sub{color:var(--muted);max-width:520px;margin:10px auto 0;}
            .sec-dark .sec-sub{color:rgba(255,255,255,0.6);}

            /* ═══ ROUTES ═══ */
            .routes-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(340px,1fr));gap:24px;}
            .route-card{background:var(--card);border:1.5px solid var(--border);border-radius:20px;padding:26px;box-shadow:var(--shadow);transition:var(--r);position:relative;overflow:hidden;display:flex;flex-direction:column;}
            .route-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--green),var(--sky));}
            .route-card:hover{transform:translateY(-6px);box-shadow:var(--shadow-lg);border-color:rgba(41,169,225,0.2);}
            .route-hd{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:16px;}
            .route-hd h3{font-size:1.15rem;color:var(--text);line-height:1.3;}
            .route-icons{display:flex;gap:6px;color:var(--green);}
            .route-icons i{width:18px;height:18px;}
            .step-list{display:flex;flex-direction:column;gap:10px;margin-bottom:16px;}
            .step-row{display:flex;gap:12px;position:relative;}
            .step-row::before{content:'';position:absolute;left:6px;top:16px;bottom:-8px;width:1.5px;background:linear-gradient(to bottom,var(--green-mid),rgba(27,67,50,0.08));}
            .step-row:last-child::before{display:none;}
            .step-dot{width:14px;height:14px;background:var(--green);border-radius:50%;margin-top:4px;flex-shrink:0;}
            .step-row p{font-size:13px;color:var(--muted);line-height:1.6;}
            .route-meta{display:flex;justify-content:space-around;background:var(--bg);border-radius:12px;padding:12px;margin-top:auto;}
            .meta-item{text-align:center;}
            .meta-item span{display:block;font-size:10.5px;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:0.06em;}
            .meta-item strong{font-size:13px;font-weight:700;}
            .route-tip{margin-top:12px;padding:10px 13px;background:rgba(41,169,225,0.07);border-left:3px solid var(--sky);border-radius:0 8px 8px 0;font-size:12.5px;color:var(--muted);}

            /* ═══ TRANSPORT CARDS ═══ */
            .transport-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:20px;}
            .transport-card{background:var(--card);border:1.5px solid var(--border);border-radius:18px;padding:28px 22px;text-align:center;transition:var(--r);box-shadow:var(--shadow);}
            .transport-card:hover{transform:translateY(-5px);box-shadow:var(--shadow-lg);}
            .transport-icon{width:52px;height:52px;background:linear-gradient(135deg,var(--green),var(--green-mid));border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;color:#fff;}
            .transport-icon i{width:24px;height:24px;}
            .transport-card h3{font-size:1rem;margin-bottom:8px;}
            .transport-card p{font-size:13px;color:var(--muted);}

            /* ═══ TIPS ═══ */
            .tips-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:20px;}
            .tip-card{background:var(--card);border:1.5px solid var(--border);border-radius:18px;padding:24px;box-shadow:var(--shadow);transition:var(--r);}
            .tip-card:hover{transform:translateY(-4px);box-shadow:var(--shadow-lg);}
            .tip-icon{width:44px;height:44px;background:rgba(27,67,50,0.08);border-radius:12px;display:flex;align-items:center;justify-content:center;color:var(--green);margin-bottom:14px;}
            .tip-icon i{width:20px;height:20px;}
            .tip-card h4{font-size:0.97rem;font-family:'DM Sans',sans-serif;font-weight:700;margin-bottom:7px;}
            .tip-card p{font-size:13px;color:var(--muted);}

            /* ═══ FARE CALCULATOR ═══ */
            .calc-wrap{display:grid;grid-template-columns:1fr 1fr;gap:28px;background:var(--card);border:1.5px solid var(--border);border-radius:26px;padding:44px;box-shadow:var(--shadow);}
            .calc-form{display:flex;flex-direction:column;gap:16px;}
            .field-lbl{display:block;font-size:11px;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:6px;}
            .field-sel,.field-inp{width:100%;padding:13px 16px;border:2px solid #ede8df;border-radius:12px;font-family:'DM Sans',sans-serif;font-size:14px;color:var(--text);background:var(--bg);outline:none;transition:border-color 0.2s;appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%231B4332' stroke-width='2' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 16px center;}
            .field-sel:focus,.field-inp:focus{border-color:var(--sky);}
            .swap-arrow{text-align:center;font-size:1.3rem;color:var(--green-mid);margin:-2px 0;cursor:pointer;user-select:none;}
            .pax-row{display:flex;align-items:center;border:2px solid #ede8df;border-radius:12px;overflow:hidden;width:fit-content;}
            .pax-btn{background:var(--bg);border:none;padding:11px 18px;font-size:1.1rem;cursor:pointer;color:var(--green);font-weight:700;transition:background 0.2s;}
            .pax-btn:hover{background:rgba(27,67,50,0.1);}
            .pax-val{padding:0 20px;font-size:1rem;font-weight:700;min-width:50px;text-align:center;}
            .calc-submit{padding:14px;background:var(--green);color:#fff;border:none;border-radius:12px;font-family:'DM Sans',sans-serif;font-size:14.5px;font-weight:700;cursor:pointer;transition:var(--r);}
            .calc-submit:hover{background:var(--sky);transform:translateY(-2px);}
            .calc-result{background:var(--bg);border-radius:18px;padding:28px;min-height:260px;display:flex;align-items:center;justify-content:center;}
            .calc-placeholder{text-align:center;color:var(--muted);}
            .calc-placeholder span{font-size:2.6rem;display:block;margin-bottom:12px;}
            .calc-placeholder p{font-size:13.5px;line-height:1.7;}
            .result-output{width:100%;animation:fadeUp 0.4s ease;}
            @keyframes fadeUp{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:none}}
            .result-route-lbl{font-size:0.95rem;font-weight:700;margin-bottom:18px;display:flex;align-items:center;gap:8px;flex-wrap:wrap;}
            .result-rows{display:flex;flex-direction:column;gap:9px;margin-bottom:18px;}
            .result-row{display:flex;justify-content:space-between;align-items:center;padding:12px 15px;background:#fff;border-radius:10px;font-size:13px;}
            .result-row-lbl{color:var(--muted);}
            .result-row-val{font-weight:700;}
            .result-total{background:linear-gradient(135deg,var(--green),#0d3323);border-radius:14px;padding:16px 20px;display:flex;justify-content:space-between;align-items:center;color:#fff;}
            .result-total-lbl{font-size:13px;opacity:0.8;}
            .result-total-val{font-size:1.7rem;font-family:'Fraunces',serif;color:var(--gold);}

            /* ═══ CLOCK / RUSH HOUR ═══ */
            .clock-sec{padding:80px 0;background:#fff;}
            .clock-grid{display:grid;grid-template-columns:1fr 1fr;gap:28px;background:var(--bg);border-radius:22px;padding:38px;border:1.5px solid var(--border);}
            .clock-box{text-align:center;}
            .clock-label{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;color:var(--muted);margin-bottom:10px;}
            .live-time{font-family:'Fraunces',serif;font-size:clamp(2.4rem,5vw,3.6rem);color:var(--green);letter-spacing:-0.02em;background:#fff;display:inline-block;padding:18px 32px;border-radius:16px;box-shadow:var(--shadow);border:1.5px solid var(--border);}
            .clock-date-lbl{font-size:13px;color:var(--muted);margin-top:12px;font-weight:500;}
            .rush-box{background:#fff;border-radius:16px;padding:24px;box-shadow:var(--shadow);border:1.5px solid var(--border);}
            .rush-dot{width:12px;height:12px;border-radius:50%;margin-bottom:10px;}
            .rush-dot.red{background:#e53e3e;box-shadow:0 0 0 5px rgba(229,62,62,0.15);animation:rushpulse 1.5s infinite;}
            .rush-dot.yellow{background:#d97706;box-shadow:0 0 0 5px rgba(217,119,6,0.12);}
            .rush-dot.green{background:#38a169;box-shadow:0 0 0 5px rgba(56,161,105,0.12);}
            @keyframes rushpulse{0%,100%{transform:scale(1)}50%{transform:scale(1.3)}}
            .rush-box h3{font-size:1.02rem;font-family:'DM Sans',sans-serif;font-weight:700;margin-bottom:6px;}
            .rush-box p{font-size:13px;color:var(--muted);margin-bottom:18px;}
            .rush-sched{display:flex;flex-direction:column;gap:7px;}
            .rush-row{display:flex;justify-content:space-between;align-items:center;padding:9px 13px;background:var(--bg);border-radius:9px;font-size:12.5px;}
            .rush-badge{font-weight:700;font-size:12px;}
            .rush-badge.red{color:#e53e3e;}
            .rush-badge.yellow{color:#d97706;}
            .rush-badge.green{color:#38a169;}

            /* ═══ CHECKLIST ═══ */
            .checklist-sec{padding:96px 0;}
            .checklist-grid{display:grid;grid-template-columns:1fr 320px;gap:28px;align-items:start;}
            .checklist-panel{background:#fff;border-radius:22px;padding:34px;box-shadow:var(--shadow);border:1.5px solid var(--border);}
            .progress-row{display:flex;align-items:center;gap:14px;margin-bottom:26px;}
            .progress-bar{flex:1;height:7px;background:#ede8df;border-radius:4px;overflow:hidden;}
            .progress-fill{height:100%;background:linear-gradient(90deg,var(--green),var(--sky));border-radius:4px;transition:width 0.4s ease;}
            .progress-lbl{font-size:12px;font-weight:700;color:var(--muted);white-space:nowrap;}
            .check-list{list-style:none;display:flex;flex-direction:column;gap:7px;}
            .check-item{display:flex;align-items:center;gap:12px;padding:12px 15px;background:var(--bg);border-radius:11px;cursor:pointer;transition:var(--r);border:1.5px solid transparent;}
            .check-item:hover{border-color:rgba(41,169,225,0.25);background:#f0fafe;}
            .check-item.done{opacity:0.5;}
            .check-box{width:20px;height:20px;border:2px solid #ccc;border-radius:5px;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:800;color:#fff;flex-shrink:0;transition:var(--r);}
            .check-item.done .check-box{background:var(--green);border-color:var(--green);}
            .check-emoji{font-size:1.1rem;flex-shrink:0;}
            .check-lbl{flex:1;font-size:13.5px;font-weight:500;}
            .check-item.done .check-lbl{text-decoration:line-through;}
            .check-del{background:none;border:none;color:#ccc;cursor:pointer;font-size:13px;padding:3px;border-radius:5px;transition:var(--r);}
            .check-del:hover{color:#e53e3e;background:rgba(229,62,62,0.08);}
            .check-actions{display:flex;align-items:center;gap:14px;margin-top:20px;padding-top:16px;border-top:1px solid #ede8df;}
            .check-reset{padding:9px 18px;background:none;border:2px solid #ede8df;border-radius:10px;font-family:'DM Sans',sans-serif;font-size:13px;font-weight:700;color:var(--muted);cursor:pointer;transition:var(--r);}
            .check-reset:hover{border-color:var(--green);color:var(--green);}
            .check-congrats{font-size:13px;font-weight:700;color:var(--green);}
            .checklist-add{background:#fff;border-radius:22px;padding:26px;box-shadow:var(--shadow);border:1.5px solid var(--border);}
            .checklist-add h4{font-family:'DM Sans',sans-serif;font-size:0.93rem;font-weight:700;margin-bottom:12px;}
            .add-input-row{display:flex;flex-direction:column;gap:8px;}
            .add-input-row input{width:100%;padding:11px 15px;border:2px solid #ede8df;border-radius:10px;font-family:'DM Sans',sans-serif;font-size:14px;outline:none;background:var(--bg);transition:border-color 0.2s;}
            .add-input-row input:focus{border-color:var(--sky);}
            .add-input-row button{padding:11px;background:var(--sky);color:#fff;border:none;border-radius:10px;font-family:'DM Sans',sans-serif;font-size:14px;font-weight:700;cursor:pointer;transition:var(--r);}
            .add-input-row button:hover{background:var(--green);}

            /* ═══ TRACKER ═══ */
            .tracker-sec{padding:96px 0;background:#fff;}
            .tracker-wrap{background:var(--bg);border-radius:22px;padding:38px;border:1.5px solid var(--border);}
            .tracker-top{margin-bottom:26px;}
            .tracker-top label{display:block;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:var(--muted);margin-bottom:7px;}
            .tracker-top select{padding:12px 16px;border:2px solid #ede8df;border-radius:12px;font-family:'DM Sans',sans-serif;font-size:14px;color:var(--text);background:#fff;outline:none;cursor:pointer;min-width:320px;transition:border-color 0.25s;appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%231B4332' stroke-width='2' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 16px center;}
            .tracker-top select:focus{border-color:var(--green);}
            .tracker-ph{text-align:center;color:var(--muted);padding:50px 0;}
            .tracker-ph span{font-size:2.8rem;display:block;margin-bottom:10px;}
            .tracker-timeline{position:relative;padding-left:40px;display:flex;flex-direction:column;gap:0;}
            .tracker-step{display:flex;gap:16px;position:relative;padding-bottom:24px;opacity:0.35;transition:opacity 0.3s,transform 0.3s;}
            .tracker-step.active{opacity:1;transform:translateX(5px);}
            .tracker-step.done{opacity:0.6;}
            .tracker-step::before{content:'';position:absolute;left:-23px;top:22px;width:1.5px;bottom:0;background:linear-gradient(to bottom,var(--green-mid),#ddd);}
            .tracker-step:last-child::before{display:none;}
            .t-dot{position:absolute;left:-30px;top:4px;width:18px;height:18px;border-radius:50%;border:2.5px solid #ccc;background:#fff;transition:all 0.3s;display:flex;align-items:center;justify-content:center;font-size:9px;color:transparent;}
            .tracker-step.active .t-dot{border-color:var(--green);background:var(--green);color:#fff;box-shadow:0 0 0 5px rgba(27,67,50,0.14);}
            .tracker-step.done .t-dot{border-color:var(--sky);background:var(--sky);color:#fff;}
            .t-body{background:#fff;border-radius:12px;padding:15px 18px;flex:1;border:2px solid transparent;transition:all 0.3s;}
            .tracker-step.active .t-body{border-color:var(--green);box-shadow:0 4px 16px rgba(27,67,50,0.1);}
            .t-num{font-size:10px;font-weight:800;letter-spacing:0.06em;text-transform:uppercase;color:var(--muted);margin-bottom:3px;}
            .t-text{font-size:0.93rem;font-weight:600;color:var(--text);line-height:1.5;}
            .tracker-actions{display:flex;align-items:center;justify-content:center;gap:20px;margin-top:28px;padding-top:24px;border-top:1px solid #ede8df;}
            .t-prev,.t-next{padding:11px 24px;border-radius:11px;border:2px solid #ede8df;background:#fff;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:700;color:var(--text);cursor:pointer;transition:all 0.22s;}
            .t-next{background:var(--green);border-color:var(--green);color:#fff;}
            .t-prev:hover{border-color:var(--green);color:var(--green);}
            .t-next:hover{background:var(--sky);border-color:var(--sky);}
            .t-count{font-size:12.5px;font-weight:700;color:var(--muted);}

            /* ═══ NEW: WEATHER WIDGET ═══ */
            .weather-sec{padding:80px 0;background:var(--bg);}
            .weather-grid{display:grid;grid-template-columns:1fr 1fr;gap:28px;}
            .weather-card{background:#fff;border-radius:22px;padding:32px;box-shadow:var(--shadow);border:1.5px solid var(--border);transition:var(--r);}
            .weather-card:hover{box-shadow:var(--shadow-lg);transform:translateY(-3px);}
            .weather-card-hd{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:20px;}
            .weather-loc{font-size:0.88rem;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:0.06em;}
            .weather-badge{padding:4px 10px;border-radius:100px;font-size:11px;font-weight:700;}
            .weather-badge.ok{background:rgba(56,161,105,0.12);color:#2f855a;}
            .weather-badge.warn{background:rgba(217,119,6,0.12);color:#b7791f;}
            .weather-badge.bad{background:rgba(229,62,62,0.1);color:#c53030;}
            .weather-main{display:flex;align-items:center;gap:16px;margin-bottom:20px;}
            .weather-emoji{font-size:3rem;}
            .weather-temp{font-family:'Fraunces',serif;font-size:2.8rem;color:var(--green);}
            .weather-desc{font-size:0.85rem;color:var(--muted);margin-top:2px;}
            .weather-meta{display:grid;grid-template-columns:1fr 1fr;gap:10px;}
            .weather-meta-item{background:var(--bg);border-radius:10px;padding:10px 12px;}
            .weather-meta-item span{display:block;font-size:10.5px;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:0.05em;}
            .weather-meta-item strong{font-size:14px;font-weight:700;}
            .commute-impact{background:var(--bg);border-radius:14px;padding:16px;margin-top:16px;border-left:3px solid var(--green-lt);}
            .commute-impact p{font-size:13px;color:var(--muted);line-height:1.6;}
            .commute-impact strong{color:var(--green);font-size:12px;display:block;margin-bottom:5px;text-transform:uppercase;letter-spacing:0.05em;}

            /* ═══ NEW: COMMUTE PLANNER ═══ */
            .planner-sec{padding:96px 0;}
            .planner-wrap{display:grid;grid-template-columns:360px 1fr;gap:28px;}
            .planner-form{background:#fff;border-radius:22px;padding:32px;box-shadow:var(--shadow);border:1.5px solid var(--border);display:flex;flex-direction:column;gap:14px;}
            .planner-form h3{font-size:1.2rem;margin-bottom:4px;}
            .planner-form p{font-size:13px;color:var(--muted);margin-bottom:6px;}
            .time-input{width:100%;padding:13px 16px;border:2px solid #ede8df;border-radius:12px;font-family:'DM Sans',sans-serif;font-size:14px;color:var(--text);background:var(--bg);outline:none;transition:border-color 0.2s;}
            .time-input:focus{border-color:var(--sky);}
            .plan-btn{padding:14px;background:linear-gradient(135deg,var(--green),var(--green-mid));color:#fff;border:none;border-radius:12px;font-family:'DM Sans',sans-serif;font-size:14.5px;font-weight:700;cursor:pointer;transition:var(--r);}
            .plan-btn:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(27,67,50,0.3);}
            .planner-result{background:#fff;border-radius:22px;padding:32px;box-shadow:var(--shadow);border:1.5px solid var(--border);}
            .plan-ph{display:flex;flex-direction:column;align-items:center;justify-content:center;height:100%;text-align:center;color:var(--muted);}
            .plan-ph span{font-size:3rem;display:block;margin-bottom:14px;}
            .plan-ph p{font-size:13.5px;line-height:1.7;}
            .plan-output{animation:fadeUp 0.4s ease;}
            .plan-header{margin-bottom:22px;}
            .plan-header h3{font-size:1.3rem;margin-bottom:5px;}
            .plan-header p{font-size:13px;color:var(--muted);}
            .plan-timeline{display:flex;flex-direction:column;gap:12px;}
            .plan-step{display:flex;gap:14px;align-items:flex-start;}
            .plan-step-time{min-width:56px;font-size:12.5px;font-weight:700;color:var(--green);padding-top:3px;}
            .plan-step-body{flex:1;background:var(--bg);border-radius:12px;padding:13px 16px;}
            .plan-step-body h4{font-size:0.92rem;font-family:'DM Sans',sans-serif;font-weight:700;margin-bottom:3px;}
            .plan-step-body p{font-size:12.5px;color:var(--muted);}
            .plan-chip{display:inline-block;padding:2px 9px;border-radius:100px;font-size:11px;font-weight:700;margin-left:8px;}
            .plan-chip.bus{background:rgba(41,169,225,0.12);color:var(--sky);}
            .plan-chip.jeep{background:rgba(27,67,50,0.1);color:var(--green);}
            .plan-chip.walk{background:rgba(244,196,48,0.15);color:#b7791f;}
            .plan-chip.uv{background:var(--green);color:var(--green);}
            .plan-summary{display:flex;gap:12px;margin-top:20px;flex-wrap:wrap;}
            .plan-sum-item{background:var(--bg);border-radius:10px;padding:10px 16px;flex:1;min-width:100px;text-align:center;}
            .plan-sum-item span{display:block;font-size:10.5px;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:0.05em;}
            .plan-sum-item strong{font-size:1.05rem;font-weight:700;color:var(--green);}
            .maps-btn{display:flex;align-items:center;justify-content:center;gap:9px;width:100%;margin-top:16px;padding:13px 20px;background:var(--green);color:#fff;border:none;border-radius:12px;font-family:'DM Sans',sans-serif;font-size:14.5px;font-weight:700;cursor:pointer;text-decoration:none;transition:var(--r);box-shadow:0 4px 14px rgba(27,67,50,0.3);}
            .maps-btn:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(27,67,50,0.4);background:var(--green-mid);}
            .maps-btn svg{flex-shrink:0;}

            /* ═══ NEW: TERMINAL MAP ═══ */
            .terminal-sec{padding:96px 0;background:#fff;}
            .terminal-grid{display:grid;grid-template-columns:1fr 320px;gap:24px;align-items:start;}
            .terminal-map{background:var(--bg);border-radius:20px;border:1.5px solid var(--border);overflow:hidden;position:relative;min-height:380px;}
            .terminal-map-inner{padding:28px;display:flex;flex-direction:column;gap:14px;}
            .terminal-map-title{font-size:0.9rem;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:0.06em;margin-bottom:4px;}
            .t-node{background:#fff;border-radius:12px;padding:14px 16px;box-shadow:var(--shadow);border:1.5px solid var(--border);display:flex;align-items:center;gap:12px;cursor:pointer;transition:var(--r);}
            .t-node:hover,.t-node.active{border-color:var(--sky);background:#f0fafe;}
            .t-node-dot{width:12px;height:12px;border-radius:50%;flex-shrink:0;}
            .t-node-dot.hub{background:var(--green);}
            .t-node-dot.mid{background:var(--sky);}
            .t-node-dot.sub{background:var(--gold);}
            .t-node-name{font-weight:700;font-size:14px;}
            .t-node-sub{font-size:11.5px;color:var(--muted);}
            .t-node-arrow{margin-left:auto;color:var(--muted);font-size:1.1rem;}
            .terminal-info{background:var(--bg);border-radius:20px;padding:24px;border:1.5px solid var(--border);}
            .terminal-info h3{font-size:1.1rem;margin-bottom:16px;}
            .t-info-rows{display:flex;flex-direction:column;gap:10px;}
            .t-info-row{background:#fff;border-radius:10px;padding:12px 15px;}
            .t-info-row-lbl{font-size:10.5px;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:0.05em;margin-bottom:3px;}
            .t-info-row-val{font-size:13.5px;font-weight:600;}
            .t-conn-tags{display:flex;flex-wrap:wrap;gap:6px;margin-top:12px;}
            .t-conn-tag{padding:4px 10px;background:rgba(27,67,50,0.08);color:var(--green);border-radius:100px;font-size:11.5px;font-weight:700;}

            /* ═══ COMMUNITY ═══ */
            .community-sec{padding:96px 0;background:var(--bg);}
            .community-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:20px;}
            .community-card{background:#fff;border-radius:18px;padding:26px;box-shadow:var(--shadow);border:1.5px solid var(--border);transition:var(--r);}
            .community-card:hover{transform:translateY(-4px);box-shadow:var(--shadow-lg);}
            .stars{color:var(--gold);font-size:14px;margin-bottom:12px;}
            .community-card p{font-size:13.5px;color:var(--muted);line-height:1.7;margin-bottom:18px;}
            .community-author{display:flex;align-items:center;gap:10px;}
            .author-av{width:38px;height:38px;border-radius:50%;background:rgba(27,67,50,0.1);display:flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0;}
            .author-name strong{display:block;font-size:13.5px;font-weight:700;}
            .author-name span{font-size:12px;color:var(--muted);}

            /* ═══ EMERGENCY ═══ */
            .emergency-sec{padding:96px 0;background:var(--green);}
            .emergency-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:18px;}
            .em-card{background:rgba(255,255,255,0.07);border:1px solid rgba(255,255,255,0.12);border-radius:18px;padding:24px;text-align:center;transition:var(--r);}
            .em-card:hover{background:rgba(255,255,255,0.12);}
            .em-icon{width:50px;height:50px;border-radius:14px;background:rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 14px;color:#fff;}
            .em-icon i{width:22px;height:22px;}
            .em-card h4{font-family:'DM Sans',sans-serif;font-size:0.93rem;font-weight:700;color:#fff;margin-bottom:10px;}
            .em-num{font-size:0.9rem;font-weight:700;color:rgba(255,255,255,0.75);margin-bottom:4px;}
            .em-call{display:inline-flex;align-items:center;gap:5px;margin-top:12px;background:var(--gold);color:var(--green);padding:7px 14px;border-radius:8px;font-size:12.5px;font-weight:700;text-decoration:none;transition:var(--r);}
            .em-call:hover{background:#ffd040;}

            /* ═══ FAQ CHATBOT ═══ */
            .faq-bubble{position:fixed;bottom:32px;right:32px;width:56px;height:56px;border-radius:50%;background:var(--green);color:#fff;border:none;cursor:pointer;box-shadow:0 8px 28px rgba(27,67,50,0.35);display:flex;align-items:center;justify-content:center;z-index:900;transition:var(--r);}
            .faq-bubble:hover{background:var(--sky);transform:scale(1.08);}
            .faq-bubble i{width:22px;height:22px;}
            .faq-badge{position:absolute;top:-4px;right:-4px;width:18px;height:18px;border-radius:50%;background:var(--rose);color:#fff;font-size:10px;font-weight:800;display:flex;align-items:center;justify-content:center;}
            .faq-panel{position:fixed;bottom:100px;right:32px;width:340px;background:#fff;border-radius:20px;box-shadow:0 24px 64px rgba(0,0,0,0.16);border:1.5px solid var(--border);z-index:900;display:none;flex-direction:column;overflow:hidden;}
            .faq-panel.open{display:flex;}
            .faq-head{background:var(--green);padding:18px 20px;display:flex;justify-content:space-between;align-items:center;}
            .faq-head h4{color:#fff;font-size:1rem;font-family:'DM Sans',sans-serif;font-weight:700;}
            .faq-head p{color:rgba(255,255,255,0.65);font-size:12px;margin-top:2px;}
            .faq-close{background:rgba(255,255,255,0.15);border:none;color:#fff;width:28px;height:28px;border-radius:50%;cursor:pointer;font-size:14px;display:flex;align-items:center;justify-content:center;}
            .faq-msgs{flex:1;padding:16px;overflow-y:auto;max-height:280px;display:flex;flex-direction:column;gap:10px;}
            .faq-msg{max-width:88%;padding:10px 14px;border-radius:12px;font-size:13px;line-height:1.6;}
            .faq-msg.user{background:var(--green);color:#fff;align-self:flex-end;border-radius:12px 12px 2px 12px;}
            .faq-msg.bot{background:var(--bg);color:var(--text);align-self:flex-start;border-radius:12px 12px 12px 2px;}
            .faq-quick{padding:10px 14px;display:flex;flex-wrap:wrap;gap:6px;border-top:1px solid #ede8df;}
            .faq-qbtn{background:var(--bg);border:1.5px solid var(--border);color:var(--text);padding:6px 12px;border-radius:100px;font-size:12px;font-weight:600;cursor:pointer;transition:var(--r);}
            .faq-qbtn:hover{background:rgba(27,67,50,0.08);border-color:var(--green);}
            .faq-foot{padding:12px 14px;border-top:1px solid #ede8df;display:flex;gap:8px;}
            .faq-input{flex:1;padding:10px 14px;border:2px solid #ede8df;border-radius:10px;font-family:'DM Sans',sans-serif;font-size:13.5px;outline:none;transition:border-color 0.2s;}
            .faq-input:focus{border-color:var(--sky);}
            .faq-send{background:var(--sky);color:#fff;border:none;padding:10px 16px;border-radius:10px;cursor:pointer;font-weight:700;font-size:13px;transition:var(--r);}
            .faq-send:hover{background:var(--green);}

            /* ═══ FOOTER ═══ */
            .footer{background:#0a2618;padding:72px 0 0;}
            .footer-grid{display:grid;grid-template-columns:1.4fr 1fr 1fr;gap:48px;padding-bottom:48px;}
            .footer-brand h3{font-family:'Fraunces',serif;font-size:1.6rem;color:#fff;margin-bottom:12px;}
            .footer-brand h3 span{color:var(--gold);}
            .footer-brand p{font-size:13.5px;color:rgba(255,255,255,0.55);line-height:1.8;max-width:300px;margin-bottom:20px;}
            .footer-tags{display:flex;flex-wrap:wrap;gap:8px;}
            .footer-tag{background:rgba(255,255,255,0.07);color:rgba(255,255,255,0.55);padding:4px 12px;border-radius:100px;font-size:12px;}
            .footer-col h4{font-family:'DM Sans',sans-serif;font-size:13px;font-weight:700;color:rgba(255,255,255,0.5);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:16px;}
            .footer-links-list{list-style:none;display:flex;flex-direction:column;gap:9px;}
            .footer-links-list a{color:rgba(255,255,255,0.65);text-decoration:none;font-size:13.5px;transition:color 0.2s;}
            .footer-links-list a:hover{color:#fff;}
            .social-row{display:flex;gap:10px;margin-bottom:20px;}
            .social-btn{width:38px;height:38px;border-radius:10px;background:rgba(255,255,255,0.08);display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,0.65);text-decoration:none;transition:var(--r);}
            .social-btn:hover{background:var(--green-mid);color:#fff;}
            .social-btn i{width:16px;height:16px;}
            .footer-col p{font-size:13px;color:rgba(255,255,255,0.45);line-height:1.7;}
            .footer-bottom{border-top:1px solid rgba(255,255,255,0.07);padding:20px 0;text-align:center;}
            .footer-bottom p{font-size:12px;color:rgba(255,255,255,0.35);}

            /* ═══ KUMITA SECTION ═══ */
            .kumita-sec{padding:96px 0;background:linear-gradient(150deg,#0d3323 0%,#1B4332 60%,#2D6A4F 100%);position:relative;overflow:hidden;}
            .kumita-sec::before{content:'';position:absolute;inset:0;background-image:radial-gradient(ellipse at 10% 50%,rgba(244,196,48,0.1) 0%,transparent 50%),radial-gradient(ellipse at 90% 20%,rgba(82,183,136,0.12) 0%,transparent 50%);pointer-events:none;}
            .kumita-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(310px,1fr));gap:24px;margin-bottom:48px;}
            .kumita-card{background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.12);border-radius:22px;padding:30px;transition:var(--r);position:relative;overflow:hidden;}
            .kumita-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;border-radius:3px 3px 0 0;}
            .kumita-card.gold::before{background:linear-gradient(90deg,var(--gold),#ffb700);}
            .kumita-card.sky::before{background:linear-gradient(90deg,var(--sky),#1e8fbf);}
            .kumita-card.green::before{background:linear-gradient(90deg,var(--green-lt),#3a9e6d);}
            .kumita-card:hover{background:rgba(255,255,255,0.1);transform:translateY(-5px);}
            .kumita-icon{width:52px;height:52px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:18px;}
            .kumita-icon.gold{background:rgba(244,196,48,0.2);}
            .kumita-icon.sky{background:rgba(41,169,225,0.2);}
            .kumita-icon.green{background:rgba(82,183,136,0.2);}
            .kumita-card h3{color:#fff;font-size:1.15rem;margin-bottom:8px;}
            .kumita-card p{color:rgba(255,255,255,0.65);font-size:13.5px;line-height:1.65;margin-bottom:18px;}
            .kumita-badge{display:inline-flex;align-items:center;gap:6px;background:rgba(244,196,48,0.15);border:1px solid rgba(244,196,48,0.3);color:var(--gold);padding:5px 12px;border-radius:100px;font-size:11.5px;font-weight:700;margin-bottom:18px;}
            .kumita-btn{display:inline-flex;align-items:center;gap:8px;background:var(--gold);color:var(--green);border:none;padding:11px 22px;border-radius:10px;font-family:'DM Sans',sans-serif;font-size:14px;font-weight:700;cursor:pointer;transition:var(--r);}
            .kumita-btn:hover{background:#ffd040;transform:translateY(-2px);}
            .kumita-btn.outline{background:transparent;border:1.5px solid rgba(255,255,255,0.25);color:#fff;}
            .kumita-btn.outline:hover{background:rgba(255,255,255,0.1);transform:translateY(-2px);}
            /* Referral box */
            .referral-box{background:rgba(244,196,48,0.08);border:1.5px solid rgba(244,196,48,0.25);border-radius:18px;padding:30px;display:flex;align-items:center;gap:28px;flex-wrap:wrap;}
            .referral-code-wrap{flex:1;min-width:220px;}
            .referral-code-wrap p{color:rgba(255,255,255,0.6);font-size:13px;margin-bottom:10px;}
            .referral-code{background:rgba(0,0,0,0.25);border:1.5px dashed rgba(244,196,48,0.4);border-radius:12px;padding:14px 20px;display:flex;align-items:center;justify-content:space-between;gap:12px;}
            .referral-code span{font-family:'Fraunces',serif;font-size:1.4rem;color:var(--gold);letter-spacing:0.12em;}
            .copy-btn{background:var(--gold);color:var(--green);border:none;padding:8px 16px;border-radius:8px;font-weight:700;font-size:12px;cursor:pointer;font-family:'DM Sans',sans-serif;transition:var(--r);}
            .copy-btn:hover{background:#ffd040;}
            .referral-stats{display:flex;gap:20px;flex-wrap:wrap;}
            .ref-stat{text-align:center;background:rgba(255,255,255,0.06);border-radius:12px;padding:14px 22px;}
            .ref-stat strong{display:block;font-family:'Fraunces',serif;font-size:1.6rem;color:var(--gold);}
            .ref-stat span{font-size:12px;color:rgba(255,255,255,0.55);}
            /* Gig board */
            .gig-board{display:flex;flex-direction:column;gap:12px;}
            .gig-post-form{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:8px;}
            .gig-input{flex:1;min-width:180px;background:rgba(255,255,255,0.08);border:1.5px solid rgba(255,255,255,0.15);border-radius:10px;padding:12px 16px;color:#fff;font-family:'DM Sans',sans-serif;font-size:13.5px;outline:none;transition:border-color 0.2s;}
            .gig-input::placeholder{color:rgba(255,255,255,0.35);}
            .gig-input:focus{border-color:var(--gold);}
            .gig-select{background:rgba(255,255,255,0.08);border:1.5px solid rgba(255,255,255,0.15);border-radius:10px;padding:12px 16px;color:#fff;font-family:'DM Sans',sans-serif;font-size:13.5px;outline:none;min-width:130px;}
            .gig-select option{background:#1B4332;color:#fff;}
            .gig-submit{background:var(--gold);color:var(--green);border:none;padding:12px 20px;border-radius:10px;font-family:'DM Sans',sans-serif;font-size:14px;font-weight:700;cursor:pointer;transition:var(--r);white-space:nowrap;}
            .gig-submit:hover{background:#ffd040;}
            .gig-item{background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:12px;padding:14px 18px;display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;transition:var(--r);}
            .gig-item:hover{background:rgba(255,255,255,0.09);}
            .gig-item-left{}
            .gig-title{font-weight:700;color:#fff;font-size:14px;}
            .gig-meta{font-size:12px;color:rgba(255,255,255,0.5);margin-top:3px;}
            .gig-type-tag{display:inline-block;padding:3px 10px;border-radius:100px;font-size:11px;font-weight:700;margin-right:6px;}
            .gig-type-tag.delivery{background:rgba(41,169,225,0.2);color:#7dd4f0;}
            .gig-type-tag.errand{background:rgba(82,183,136,0.2);color:#74d9a8;}
            .gig-type-tag.transport{background:rgba(244,196,48,0.2);color:var(--gold);}
            .gig-type-tag.other{background:rgba(255,255,255,0.1);color:rgba(255,255,255,0.7);}
            .gig-pay{font-family:'Fraunces',serif;font-size:1.1rem;color:var(--gold);font-weight:700;white-space:nowrap;}
            .gig-contact-btn{background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.2);color:#fff;border-radius:8px;padding:7px 14px;font-size:12px;font-weight:600;cursor:pointer;font-family:'DM Sans',sans-serif;transition:var(--r);}
            .gig-contact-btn:hover{background:var(--green-lt);color:#fff;}
            /* Driver signup */
            .driver-form{display:grid;grid-template-columns:1fr 1fr;gap:12px;}
            .driver-field{display:flex;flex-direction:column;gap:5px;}
            .driver-field.full{grid-column:1/-1;}
            .driver-field label{font-size:11px;font-weight:700;color:rgba(255,255,255,0.5);text-transform:uppercase;letter-spacing:0.07em;}
            .driver-field input,.driver-field select{background:rgba(255,255,255,0.08);border:1.5px solid rgba(255,255,255,0.15);border-radius:10px;padding:12px 14px;color:#fff;font-family:'DM Sans',sans-serif;font-size:13.5px;outline:none;transition:border-color 0.2s;}
            .driver-field input::placeholder{color:rgba(255,255,255,0.3);}
            .driver-field input:focus,.driver-field select:focus{border-color:var(--sky);}
            .driver-field select option{background:#1B4332;}
            .driver-perks{display:flex;flex-direction:column;gap:10px;margin-bottom:20px;}
            .perk-row{display:flex;align-items:flex-start;gap:12px;}
            .perk-check{width:20px;height:20px;background:rgba(82,183,136,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#74d9a8;font-size:12px;flex-shrink:0;margin-top:2px;}
            .perk-text strong{display:block;color:#fff;font-size:13.5px;}
            .perk-text span{color:rgba(255,255,255,0.5);font-size:12px;}
            /* Modal */
            .kumita-modal{display:none;position:fixed;inset:0;background:rgba(0,0,0,0.7);z-index:2000;align-items:center;justify-content:center;padding:20px;}
            .kumita-modal.open{display:flex;}
            .kumita-modal-box{background:#0d3323;border:1px solid rgba(255,255,255,0.12);border-radius:20px;padding:32px;max-width:440px;width:100%;position:relative;animation:fadeUp 0.3s ease;}
            .kumita-modal-box h3{color:#fff;margin-bottom:8px;}
            .kumita-modal-box p{color:rgba(255,255,255,0.6);font-size:13.5px;margin-bottom:20px;}
            .kumita-modal-close{position:absolute;top:16px;right:18px;background:rgba(255,255,255,0.1);border:none;color:#fff;width:30px;height:30px;border-radius:8px;cursor:pointer;font-size:16px;display:flex;align-items:center;justify-content:center;}
            .success-anim{text-align:center;padding:20px 0;}
            .success-anim .big-emoji{font-size:3rem;display:block;margin-bottom:12px;}
            .success-anim h4{color:#fff;font-size:1.2rem;margin-bottom:8px;}
            .success-anim p{color:rgba(255,255,255,0.6);font-size:13px;}
            @media(max-width:768px){
                .referral-box{flex-direction:column;}
                .driver-form{grid-template-columns:1fr;}
                .driver-field.full{grid-column:1;}
                .kumita-grid{grid-template-columns:1fr;}
            }

            /* ═══ BACK TO TOP ═══ */
            .back-top{position:fixed;bottom:100px;right:32px;width:42px;height:42px;background:var(--green);color:#fff;border:none;border-radius:12px;cursor:pointer;font-size:18px;box-shadow:var(--shadow);display:none;align-items:center;justify-content:center;z-index:800;transition:var(--r);}
            .back-top.show{display:flex;}
            .back-top:hover{background:var(--sky);transform:translateY(-2px);}

            /* ═══ ANIMATIONS ═══ */
            .fade-in{opacity:0;transform:translateY(20px);transition:opacity 0.65s ease-out,transform 0.65s ease-out;}
            .fade-in.vis{opacity:1;transform:none;}

            /* ═══ RESPONSIVE ═══ */
            @media(max-width:1024px){
                .hero-content{grid-template-columns:1fr;text-align:center;gap:40px;}
                .hero-sub{margin:0 auto 36px;}
                .hero-right{flex-direction:row;flex-wrap:wrap;}
                .hero-stat-card{flex:1;min-width:180px;}
                .hero-right dotlottie-wc{max-width:350px;max-height:350px;width:100%;height:auto;}
                .calc-wrap{grid-template-columns:1fr;}
                .planner-wrap{grid-template-columns:1fr;}
                .terminal-grid{grid-template-columns:1fr;}
                .checklist-grid{grid-template-columns:1fr;}
                .weather-grid{grid-template-columns:1fr;}
                .footer-grid{grid-template-columns:1fr 1fr;gap:36px;}
            }
            @media(max-width:900px){
                .nav-links{display:none;}
                .hamburger{display:flex;}
                .logo-tagline{display:none;}
            }
            @media(max-width:680px){
                .faq-panel{width:calc(100vw - 40px);right:20px;}
                .clock-grid{grid-template-columns:1fr;}
                .footer-grid{grid-template-columns:1fr;}
                .tracker-top select{min-width:100%;width:100%;}
                .plan-timeline{gap:8px;}
                .hero-right dotlottie-wc{max-width:280px;max-height:280px;width:100%;height:auto;}
                .hero{padding-top:100px;}
            }

        /* Navbar Subscription Styles */
        /* ── NAV SUBSCRIPTION AREA ── */
        .nav-upgrade-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--gold);
            color: var(--green);
            padding: 8px 16px;
            border-radius: 100px;
            font-size: 13px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: all 0.22s;
            box-shadow: 0 2px 10px rgba(244,196,48,0.35);
            font-family: 'DM Sans', sans-serif;
        }
        .nav-upgrade-btn:hover {
            background: #fff;
            box-shadow: 0 4px 18px rgba(244,196,48,0.5);
            transform: translateY(-1px);
        }
        .upgrade-icon { font-size: 14px; }
        .upgrade-text { font-size: 13px; }

        /* sub-status-badge inside nav (dark bg context) */
        .nav .sub-status-badge {
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
        }

        @media(max-width: 768px) {
            .nav .sub-status-badge { display: none !important; }
            .nav-upgrade-btn { padding: 7px 12px; }
            .upgrade-text { display: none; }
        }
        </style>
    </head>
    <body>

    <!-- Ticker -->
    <div class="ticker">
        <span class="ticker-inner" id="tickerInner">
            <span>🚎 Tungko → Muzon: Jeepney every 10–15 mins, fare ₱13–20</span>
            <span class="ticker-sep">•</span>
            <span>🛺 Tricycle ang pinakamainam para sa last-mile sa mga subdivisions</span>
            <span class="ticker-sep">•</span>
            <span>⚠️ Tip: Prepare barya — jeepneys at tricycles rarely have change for ₱100+</span>
            <span class="ticker-sep">•</span>
            <span>🌿 Kaypian → SJDM Bayan: Direct jeepney, ~18–28 mins, ₱13–20</span>
            <span class="ticker-sep">•</span>
            <span>🏛️ SJDM Bayan (City Hall) ang pinaka-central na transfer point sa buong SJDM</span>
            <span class="ticker-sep">•</span>
            <span>🚎 Tungko → Muzon: Jeepney every 10–15 mins, fare ₱13–20</span>
            <span class="ticker-sep">•</span>
            <span>🛺 Tricycle ang pinakamainam para sa last-mile sa mga subdivisions</span>
            <span class="ticker-sep">•</span>
            <span>⚠️ Tip: Prepare barya — jeepneys at tricycles rarely have change for ₱100+</span>
            <span class="ticker-sep">•</span>
            <span>🌿 Kaypian → SJDM Bayan: Direct jeepney, ~18–28 mins, ₱13–20</span>
            <span class="ticker-sep">•</span>
            <span>🏛️ SJDM Bayan (City Hall) ang pinaka-central na transfer point sa buong SJDM</span>
        </span>
    </div>

    <!-- Navbar — Mega Menu -->
    <nav class="nav" id="mainNav">
        <div class="container">
            <a href="#hero" class="logo">Biya<span class="logo-accent">hero</span><span class="logo-tagline">SJDM Guide</span></a>

            <ul class="nav-links" id="mainNavLinks">

                <!-- Home (plain link) -->
                <li><a href="#hero">Home</a></li>

                <!-- Commute (mega) -->
                <li>
                    <button class="nav-trigger" data-menu="commute">Commute <span class="nav-chevron">▾</span></button>
                    <div class="mega-drop" id="menu-commute">
                        <div class="mega-header">
                            <span class="mega-header-title">Commute Tools</span>
                            <span class="mega-header-sub">Plan, calculate, explore routes</span>
                        </div>
                        <div class="mega-grid cols-2">
                            <a href="#routes" class="mega-item">
                                <div class="mega-icon g">🗺️</div>
                                <div class="mega-item-text"><strong>Popular Routes</strong><span>Step-by-step directions sa lahat ng major SJDM routes</span></div>
                            </a>
                            <a href="#planner" class="mega-item">
                                <div class="mega-icon b">🗓️</div>
                                <div class="mega-item-text"><strong>Commute Planner</strong><span>I-input ang oras at destination — makakuha ng full schedule</span></div>
                            </a>
                            <a href="#calculator" class="mega-item">
                                <div class="mega-icon y">💰</div>
                                <div class="mega-item-text"><strong>Fare Calculator</strong><span>Exact fare estimate para sa jeepney, tricycle, at multicab</span></div>
                            </a>
                            <a href="#tracker" class="mega-item">
                                <div class="mega-icon p">📍</div>
                                <div class="mega-item-text"><strong>Route Tracker</strong><span>Step-by-step navigation para sa iyong commute</span></div>
                            </a>
                        </div>
                        <div class="mega-footer">
                            <span class="mega-footer-note">🚎 Jeepney · 🛺 Tricycle · 🚐 Multicab</span>
                            <a href="#routes" class="mega-footer-link">Lahat ng Routes →</a>
                        </div>
                    </div>
                </li>

                <!-- Info (mega) -->
                <li>
                    <button class="nav-trigger" data-menu="info">Info & Alerts <span class="nav-chevron">▾</span></button>
                    <div class="mega-drop" id="menu-info">
                        <div class="mega-header">
                            <span class="mega-header-title">Live Info</span>
                            <span class="mega-header-sub">Weather, rush hours, at terminals</span>
                        </div>
                        <div class="mega-grid cols-3">
                            <a href="#weather" class="mega-item">
                                <div class="mega-icon b">🌤</div>
                                <div class="mega-item-text"><strong>Weather</strong><span>Real-time alerts at commute impact</span></div>
                            </a>
                            <a href="#clock" class="mega-item">
                                <div class="mega-icon r">⏰</div>
                                <div class="mega-item-text"><strong>Rush Hour</strong><span>AM/PM peak hours at live traffic status</span></div>
                            </a>
                            <a href="#terminals" class="mega-item">
                                <div class="mega-icon g">🏢</div>
                                <div class="mega-item-text"><strong>Terminals</strong><span>Operating hours at connections ng bawat terminal</span></div>
                            </a>
                        </div>
                    </div>
                </li>

                <!-- Prep (simple dropdown) -->
                <li>
                    <button class="nav-trigger" data-menu="prep">Preparation <span class="nav-chevron">▾</span></button>
                    <div class="simple-drop" id="menu-prep">
                        <a href="#checklist">✅&nbsp; Commuter Checklist</a>
                        <a href="#tips">💡&nbsp; Safety Tips</a>
                        <div class="simple-drop-div"></div>
                        <a href="#emergency">🚨&nbsp; Emergency Contacts</a>
                    </div>
                </li>

                <!-- Kumita (special) -->
                <li><a href="#kumita" class="nav-kumita-link">💸 Kumita</a></li>

                <!-- Emergency CTA -->
                <li><a href="#emergency" class="nav-cta-link">🚨 Emergency</a></li>
            </ul>

            <div class="nav-actions">

                <!-- Subscription Status Badge — updated by SubscriptionManager.updateStatusIndicator() -->
                <a href="subscription/subscription.php"
                   id="subStatusBadge"
                   class="sub-status-badge badge-free"
                   title="Manage Subscription">🔒 Free</a>

                <!-- Upgrade / Manage button — label toggled by JS -->
                <button class="nav-upgrade-btn" id="navUpgradeBtn"
                        onclick="SubscriptionManager.openUpgradeModal()">
                    <span class="upgrade-icon">⚡</span>
                    <span class="upgrade-text">Upgrade</span>
                </button>

                <!-- My Profile Dropdown -->
                <div class="profile-li" id="profileNavItem" style="position:relative;display:flex;align-items:center;">
                    <button class="profile-btn" id="profileBtn">
                        <div class="profile-avatar">👤</div>
                        My Profile
                        <span class="profile-chevron">▾</span>
                    </button>
                    <div class="profile-drop" id="profileDrop">
                        <div class="profile-drop-header">
                            <div class="profile-drop-name" id="profileDropName">Biyahero User</div>
                            <div class="profile-drop-email" id="profileDropEmail">user@biyahero.app</div>
                        </div>
                        <a href="#account"><span>👤</span> My Account</a>
                        <a href="#settings"><span>⚙️</span> Settings</a>
                        <a href="subscription/subscription.php"><span>⚡</span> Subscription</a>
                        <div class="profile-drop-div"></div>
                        <button class="profile-logout" type="button" onclick="doLogout(); return false;"><span>🚪</span> Log Out</button>
                    </div>
                </div>

                <button class="hamburger" id="hamburgerBtn" aria-label="Menu"><span></span><span></span><span></span></button>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div class="mobile-nav" id="mobileMenu">
            <div class="mobile-nav-section">Commute</div>
            <a href="#routes"><span class="m-icon" style="background:rgba(82,183,136,0.15)">🗺️</span>Popular Routes</a>
            <a href="#planner"><span class="m-icon" style="background:rgba(41,169,225,0.15)">🗓️</span>Commute Planner</a>
            <a href="#calculator"><span class="m-icon" style="background:rgba(244,196,48,0.15)">💰</span>Fare Calculator</a>
            <a href="#tracker"><span class="m-icon" style="background:rgba(180,130,255,0.15)">📍</span>Route Tracker</a>
            <div class="mobile-nav-divider"></div>
            <div class="mobile-nav-section">Info & Alerts</div>
            <a href="#weather"><span class="m-icon" style="background:rgba(41,169,225,0.15)">🌤</span>Weather & Alerts</a>
            <a href="#clock"><span class="m-icon" style="background:rgba(255,107,107,0.15)">⏰</span>Rush Hour</a>
            <a href="#terminals"><span class="m-icon" style="background:rgba(82,183,136,0.15)">🏢</span>Terminal Guide</a>
            <div class="mobile-nav-divider"></div>
            <div class="mobile-nav-section">Preparation</div>
            <a href="#checklist"><span class="m-icon" style="background:rgba(82,183,136,0.15)">✅</span>Commuter Checklist</a>
            <a href="#tips"><span class="m-icon" style="background:rgba(244,196,48,0.15)">💡</span>Safety Tips</a>
            <div class="mobile-nav-divider"></div>
            <a href="#kumita" class="m-kumita"><span class="m-icon" style="background:rgba(244,196,48,0.15)">💸</span>Kumita — Mag-earn</a>
            <a href="#emergency" class="m-cta"><span class="m-icon" style="background:rgba(255,107,107,0.15)">🚨</span>Emergency Contacts</a>
            <div class="mobile-nav-divider"></div>
            <div class="mobile-nav-section">My Profile</div>
            <a href="#account"><span class="m-icon" style="background:rgba(82,183,136,0.15)">👤</span>My Account</a>
            <a href="#settings"><span class="m-icon" style="background:rgba(41,169,225,0.15)">⚙️</span>Settings</a>
            <a href="#" onclick="doLogout();return false;" style="color:#ff8a8a;"><span class="m-icon" style="background:rgba(255,107,107,0.15)">🚪</span>Log Out</a>
        </div>
    </nav>

    <!-- Hero -->
    <section id="hero" class="hero">
        <div class="hero-mesh"></div>
        <div class="hero-dots"></div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-left">
                   
                    <h1>Your <em>Biyahero</em><br>Commuting Guide</h1>
                    <p class="hero-sub">Lakbay nang Mas Madali, Mas Ligtas, at Mas Kampante — within San Jose Del Monte, Bulacan.</p>
                    <div class="hero-search">
                        <input type="text" id="routeSearch" placeholder="Where in SJDM? (e.g. Tungko, Kaypian, Sapang Palay…)">
                        <button id="searchBtn"><i class="fi fi-bs-search" style="font-size:15px"></i> Find Route</button>
                    </div>
                    <div class="hero-pills">
                        <span class="hero-pill" onclick="scrollTo('routes')">🗺️ Popular Routes</span>
                        <span class="hero-pill" onclick="scrollTo('planner')">🗓️ Planner</span>
                        <span class="hero-pill" onclick="scrollTo('calculator')">💰 Fare Calc</span>
                        <span class="hero-pill" onclick="scrollTo('weather')">🌤 Weather</span>
                    </div>
                </div>
                <div class="hero-right">
                    <dotlottie-wc src="https://lottie.host/104c69ad-6fe4-4dbf-926e-426ff5362ca5/EfPh5p1jDj.lottie" style="width: 500px;height: 500px" autoplay loop></dotlottie-wc>
                </div>
            </div>
        </div>
    </section>

    <!-- Routes -->
    <section id="routes" class="sec">
        <div class="container">
            <div class="sec-hd">
                
                <h2 class="sec-ttl fade-in">Popular Routes</h2>
                <p class="sec-sub fade-in">Step-by-step directions between SJDM barangays and terminals</p>
            </div>
            <div class="routes-grid" id="routesGrid"></div>
        </div>
    </section>

    <!-- NEW: Commute Planner -->
    <section id="planner" class="planner-sec sec-white">
        <div class="container">
            <div class="sec-hd">
                
                <h2 class="sec-ttl fade-in">Commute Planner</h2>
                <p class="sec-sub fade-in">Enter your departure time and destination — get a full step-by-step schedule</p>
            </div>
            <div class="planner-wrap fade-in">
                <div class="planner-form">
                    <h3>Plan My Trip</h3>
                    <p>Tell us when and where, and we'll build your commute timeline.</p>
                    <div>
                        <label class="field-lbl">Starting Point</label>
                        <select class="field-sel" id="planFrom">
                            <option value="">— Select Origin —</option>
                            <option value="tungko">Tungko</option>
                            <option value="muzon">Muzon</option>
                            <option value="sapang_palay">Sapang Palay</option>
                            <option value="grotto">Grotto</option>
                            <option value="kaypian">Kaypian</option>
                            <option value="sjdm_bayan">SJDM Bayan</option>
                            <option value="bagong_buhay">Bagong Buhay</option>
                            <option value="ciudad_real">Ciudad Real</option>
                            <option value="citrus">Citrus</option>
                            <option value="dulong_bayan">Dulong Bayan</option>
                            <option value="fatima">Fatima</option>
                            <option value="francisco_homes_guijo">Francisco Homes–Guijo</option>
                            <option value="francisco_homes_mulawin">Francisco Homes–Mulawin</option>
                            <option value="francisco_homes_narra">Francisco Homes–Narra</option>
                            <option value="francisco_homes_yakal">Francisco Homes–Yakal</option>
                            <option value="gaya_gaya">Gaya-Gaya</option>
                            <option value="graceville">Graceville</option>
                            <option value="gumaoc_east">Gumaoc East</option>
                            <option value="gumaoc_central">Gumaoc Central</option>
                            <option value="gumaoc_west">Gumaoc West</option>
                            <option value="kaybanban">Kaybanban</option>
                            <option value="kaytitinga">Kaytitinga</option>
                            <option value="maharlika">Maharlika</option>
                            <option value="minuyan">Minuyan</option>
                            <option value="muzon_east">Muzon East</option>
                            <option value="muzon_west">Muzon West</option>
                            <option value="paradise">Paradise</option>
                            <option value="poblacion">Poblacion</option>
                            <option value="santo_cristo">Santo Cristo</option>
                            <option value="santo_nino">Santo Niño</option>
                            <option value="san_isidro">San Isidro</option>
                            <option value="san_manuel">San Manuel</option>
                            <option value="san_martin">San Martin</option>
                            <option value="san_pedro">San Pedro</option>
                            <option value="san_rafael">San Rafael</option>
                            <option value="sapang_palay_proper">Sapang Palay Proper</option>
                            <option value="tungkong_mangga">Tungkong Mangga</option>
                            <option value="bagong_buhay_homes">Bagong Buhay Homes</option>
                            <option value="bellevue">Bellevue</option>
                            <option value="camella_sjdm">Camella SJDM</option>
                            <option value="carissa_homes">Carissa Homes</option>
                            <option value="colinas_verdes">Colinas Verdes</option>
                            <option value="deca_homes">Deca Homes</option>
                            <option value="garden_villas">Garden Villas</option>
                            <option value="greenfields">Greenfields</option>
                            <option value="katarungan_village">Katarungan Village</option>
                            <option value="lancaster_new_city">Lancaster New City (SJDM side)</option>
                            <option value="lessandra_sjdm">Lessandra SJDM</option>
                            <option value="metrogate_sjdm">Metrogate SJDM</option>
                            <option value="pleasant_hill">Pleasant Hill</option>
                            <option value="residencia_de_muzon">Residencia de Muzon</option>
                            <option value="san_jose_heights">San Jose Heights</option>
                            <option value="starmall_sjdm">Starmall SJDM</option>
                            <option value="sm_city_sjdm">SM City San Jose del Monte</option>
                            <option value="the_gardens_sjdm">The Gardens SJDM</option>
                            <option value="villa_antonio">Villa Antonio</option>
                            <option value="amana_waterpark">Amana Waterpark</option>
                            <option value="grotto_lourdes">Grotto of Our Lady of Lourdes</option>
                            <option value="mt_balagbag">Mt. Balagbag</option>
                            <option value="kaytitinga_falls">Kaytitinga Falls</option>
                        </select>
                    </div>
                    <div>
                        <label class="field-lbl">Destination</label>
                        <select class="field-sel" id="planTo">
                            <option value="">— Select Destination —</option>
                            <option value="tungko">Tungko Terminal</option>
                            <option value="muzon">Muzon Junction</option>
                            <option value="sapang_palay">Sapang Palay</option>
                            <option value="grotto">Grotto</option>
                            <option value="kaypian">Kaypian</option>
                            <option value="sjdm_bayan">SJDM Bayan (City Hall)</option>
                            <option value="bagong_buhay">Bagong Buhay</option>
                            <option value="ciudad_real">Ciudad Real</option>
                            <option value="citrus">Citrus</option>
                            <option value="dulong_bayan">Dulong Bayan</option>
                            <option value="fatima">Fatima</option>
                            <option value="francisco_homes_guijo">Francisco Homes–Guijo</option>
                            <option value="francisco_homes_mulawin">Francisco Homes–Mulawin</option>
                            <option value="francisco_homes_narra">Francisco Homes–Narra</option>
                            <option value="francisco_homes_yakal">Francisco Homes–Yakal</option>
                            <option value="gaya_gaya">Gaya-Gaya</option>
                            <option value="graceville">Graceville</option>
                            <option value="gumaoc_east">Gumaoc East</option>
                            <option value="gumaoc_central">Gumaoc Central</option>
                            <option value="gumaoc_west">Gumaoc West</option>
                            <option value="kaybanban">Kaybanban</option>
                            <option value="kaytitinga">Kaytitinga</option>
                            <option value="maharlika">Maharlika</option>
                            <option value="minuyan">Minuyan</option>
                            <option value="muzon_east">Muzon East</option>
                            <option value="muzon_west">Muzon West</option>
                            <option value="paradise">Paradise</option>
                            <option value="poblacion">Poblacion</option>
                            <option value="santo_cristo">Santo Cristo</option>
                            <option value="santo_nino">Santo Niño</option>
                            <option value="san_isidro">San Isidro</option>
                            <option value="san_manuel">San Manuel</option>
                            <option value="san_martin">San Martin</option>
                            <option value="san_pedro">San Pedro</option>
                            <option value="san_rafael">San Rafael</option>
                            <option value="sapang_palay_proper">Sapang Palay Proper</option>
                            <option value="tungkong_mangga">Tungkong Mangga</option>
                            <option value="bagong_buhay_homes">Bagong Buhay Homes</option>
                            <option value="bellevue">Bellevue</option>
                            <option value="camella_sjdm">Camella SJDM</option>
                            <option value="carissa_homes">Carissa Homes</option>
                            <option value="colinas_verdes">Colinas Verdes</option>
                            <option value="deca_homes">Deca Homes</option>
                            <option value="garden_villas">Garden Villas</option>
                            <option value="greenfields">Greenfields</option>
                            <option value="katarungan_village">Katarungan Village</option>
                            <option value="lancaster_new_city">Lancaster New City (SJDM side)</option>
                            <option value="lessandra_sjdm">Lessandra SJDM</option>
                            <option value="metrogate_sjdm">Metrogate SJDM</option>
                            <option value="pleasant_hill">Pleasant Hill</option>
                            <option value="residencia_de_muzon">Residencia de Muzon</option>
                            <option value="san_jose_heights">San Jose Heights</option>
                            <option value="starmall_sjdm">Starmall SJDM</option>
                            <option value="sm_city_sjdm">SM City San Jose del Monte</option>
                            <option value="the_gardens_sjdm">The Gardens SJDM</option>
                            <option value="villa_antonio">Villa Antonio</option>
                            <option value="amana_waterpark">Amana Waterpark</option>
                            <option value="grotto_lourdes">Grotto of Our Lady of Lourdes</option>
                            <option value="mt_balagbag">Mt. Balagbag</option>
                            <option value="kaytitinga_falls">Kaytitinga Falls</option>
                        </select>
                    </div>
                    <div>
                        <label class="field-lbl">Departure Time</label>
                        <input type="time" class="time-input" id="planTime" value="07:00">
                    </div>
                    <div>
                        <label class="field-lbl">Transport Preference</label>
                        <select class="field-sel" id="planMode">
                            <option value="jeepney">🚎 Jeepney — Most Common</option>
                            <option value="tricycle">🛺 Tricycle — Last Mile</option>
                            <option value="multicab">🚐 Multicab / FX — Faster</option>
                        </select>
                    </div>
                    <button class="plan-btn" id="planBtn">📋 Generate Schedule</button>
                </div>
                <div class="planner-result" id="plannerResult">
                    <div class="plan-ph">
                        <span>🗓️</span>
                        <p>Fill in your trip details on the left and click <strong>Generate Schedule</strong> to see your personalized commute timeline.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Transport Modes -->
    <section id="transport" class="sec">
        <div class="container">
            <div class="sec-hd">
                
                <h2 class="sec-ttl fade-in">Transportation Options</h2>
                <p class="sec-sub fade-in">Every way to get around within SJDM</p>
            </div>
            <div class="transport-grid">
                <div class="transport-card fade-in"><div class="transport-icon"><i class="fi fi-bs-bus"></i></div><h3>Jeepney</h3><p>The main ride within SJDM. Connects all major barangays — Tungko, Muzon, Kaypian, Sapang Palay, and more.</p></div>
                <div class="transport-card fade-in"><div class="transport-icon"><i class="fi fi-bs-truck"></i></div><h3>Multicab / FX</h3><p>Faster than jeepney for medium-distance trips within SJDM. Usually fixed routes, minimal stops.</p></div>
                <div class="transport-card fade-in"><div class="transport-icon"><i class="fi fi-bs-car"></i></div><h3>Tricycle</h3><p>Best for last-mile travel into residential barangays and subdivisions from main terminals.</p></div>
                <div class="transport-card fade-in"><div class="transport-icon"><i class="fi fi-bs-bike"></i></div><h3>Habal-habal</h3><p>Motorcycle taxis for tight alleyways and areas not reached by larger vehicles. Common in upland barangays.</p></div>
                <div class="transport-card fade-in"><div class="transport-icon"><i class="fi fi-bs-walking"></i></div><h3>Walking</h3><p>Short inter-barangay paths and market routes are walkable. Bring water and comfortable shoes.</p></div>
                <div class="transport-card fade-in"><div class="transport-icon"><i class="fi fi-bs-smartphone"></i></div><h3>Grab / TNVS</h3><p>Ride-hailing for door-to-door convenience within SJDM. Best for late-night or heavy-load trips.</p></div>
            </div>
        </div>
    </section>

    <!-- Tips -->
    <section id="tips" class="sec sec-white">
        <div class="container">
            <div class="sec-hd">
                
                <h2 class="sec-ttl fade-in">Commuter Tips</h2>
                <p class="sec-sub fade-in">Smart habits every SJDM commuter should know</p>
            </div>
            <div class="tips-grid">
                <div class="tip-card fade-in"><div class="tip-icon"><i class="fi fi-bs-clock"></i></div><h4>Leave Early</h4><p>Traffic inside SJDM — especially near Tungko junction — gets heavy on weekday mornings. Add 15–20 mins buffer.</p></div>
                <div class="tip-card fade-in"><div class="tip-icon"><i class="fi fi-bs-wallet"></i></div><h4>Prepare Small Change</h4><p>Always carry coins or small bills. Jeepney and tricycle drivers rarely have change for ₱100+ bills.</p></div>
                <div class="tip-card fade-in"><div class="tip-icon"><i class="fi fi-bs-map-pin"></i></div><h4>Know SJDM Landmarks</h4><p>Use landmarks locals know: Tungko Terminal, SJDM City Hall, Grotto, Starmall, and Muzon Junction.</p></div>
                <div class="tip-card fade-in"><div class="tip-icon"><i class="fi fi-bs-shield-check"></i></div><h4>Stay Alert</h4><p>Keep bags secure and stay aware in crowded terminals like Tungko and Muzon — especially during rush hour.</p></div>
                <div class="tip-card fade-in"><div class="tip-icon"><i class="fi fi-bs-navigation"></i></div><h4>Ask the Driver</h4><p>Jeepney and tricycle drivers know SJDM's barangays well. Don't hesitate to ask where they're passing through.</p></div>
                <div class="tip-card fade-in"><div class="tip-icon"><i class="fi fi-bs-cloud-rain"></i></div><h4>Watch for Floods</h4><p>Heavy rain floods low-lying barangay roads. Tungko creek area is prone to flooding — take alternate routes.</p></div>
                <div class="tip-card fade-in"><div class="tip-icon"><i class="fi fi-bs-battery-charging"></i></div><h4>Bring a Power Bank</h4><p>Some rides within SJDM can take longer than expected due to traffic. Keep your phone charged for navigation.</p></div>
                <div class="tip-card fade-in"><div class="tip-icon"><i class="fi fi-bs-info"></i></div><h4>Terminal First</h4><p>Head to the nearest terminal (Tungko, Muzon, Kaypian) for more frequent departures and route options.</p></div>
            </div>
        </div>
    </section>

    <!-- Fare Calculator -->
    <section id="calculator" class="sec">
        <div class="container">
            <div class="sec-hd">
                
                <h2 class="sec-ttl fade-in">Fare Calculator</h2>
                <p class="sec-sub fade-in">Estimate your commuting cost before you leave home</p>
            </div>
            <div class="calc-wrap fade-in">
                <div class="calc-form">
                    <div><label class="field-lbl" for="calcFrom">Starting Point</label>
                        <select class="field-sel" id="calcFrom">
                            <option value="">— Select Origin —</option>
                            <option value="tungko">Tungko</option>
                            <option value="muzon">Muzon</option>
                            <option value="sapang_palay">Sapang Palay</option>
                            <option value="grotto">Grotto</option>
                            <option value="kaypian">Kaypian</option>
                            <option value="sjdm_bayan">SJDM Bayan</option>
                            <option value="bagong_buhay">Bagong Buhay</option>
                            <option value="ciudad_real">Ciudad Real</option>
                            <option value="citrus">Citrus</option>
                            <option value="dulong_bayan">Dulong Bayan</option>
                            <option value="fatima">Fatima</option>
                            <option value="francisco_homes_guijo">Francisco Homes–Guijo</option>
                            <option value="francisco_homes_mulawin">Francisco Homes–Mulawin</option>
                            <option value="francisco_homes_narra">Francisco Homes–Narra</option>
                            <option value="francisco_homes_yakal">Francisco Homes–Yakal</option>
                            <option value="gaya_gaya">Gaya-Gaya</option>
                            <option value="graceville">Graceville</option>
                            <option value="gumaoc_east">Gumaoc East</option>
                            <option value="gumaoc_central">Gumaoc Central</option>
                            <option value="gumaoc_west">Gumaoc West</option>
                            <option value="kaybanban">Kaybanban</option>
                            <option value="kaytitinga">Kaytitinga</option>
                            <option value="maharlika">Maharlika</option>
                            <option value="minuyan">Minuyan</option>
                            <option value="muzon_east">Muzon East</option>
                            <option value="muzon_west">Muzon West</option>
                            <option value="paradise">Paradise</option>
                            <option value="poblacion">Poblacion</option>
                            <option value="santo_cristo">Santo Cristo</option>
                            <option value="santo_nino">Santo Niño</option>
                            <option value="san_isidro">San Isidro</option>
                            <option value="san_manuel">San Manuel</option>
                            <option value="san_martin">San Martin</option>
                            <option value="san_pedro">San Pedro</option>
                            <option value="san_rafael">San Rafael</option>
                            <option value="sapang_palay_proper">Sapang Palay Proper</option>
                            <option value="tungkong_mangga">Tungkong Mangga</option>
                            <option value="bagong_buhay_homes">Bagong Buhay Homes</option>
                            <option value="bellevue">Bellevue</option>
                            <option value="camella_sjdm">Camella SJDM</option>
                            <option value="carissa_homes">Carissa Homes</option>
                            <option value="colinas_verdes">Colinas Verdes</option>
                            <option value="deca_homes">Deca Homes</option>
                            <option value="garden_villas">Garden Villas</option>
                            <option value="greenfields">Greenfields</option>
                            <option value="katarungan_village">Katarungan Village</option>
                            <option value="lancaster_new_city">Lancaster New City (SJDM side)</option>
                            <option value="lessandra_sjdm">Lessandra SJDM</option>
                            <option value="metrogate_sjdm">Metrogate SJDM</option>
                            <option value="pleasant_hill">Pleasant Hill</option>
                            <option value="residencia_de_muzon">Residencia de Muzon</option>
                            <option value="san_jose_heights">San Jose Heights</option>
                            <option value="starmall_sjdm">Starmall SJDM</option>
                            <option value="sm_city_sjdm">SM City San Jose del Monte</option>
                            <option value="the_gardens_sjdm">The Gardens SJDM</option>
                            <option value="villa_antonio">Villa Antonio</option>
                            <option value="amana_waterpark">Amana Waterpark</option>
                            <option value="grotto_lourdes">Grotto of Our Lady of Lourdes</option>
                            <option value="mt_balagbag">Mt. Balagbag</option>
                            <option value="kaytitinga_falls">Kaytitinga Falls</option>
                        </select>
                    </div>
                    <div class="swap-arrow" id="swapBtn">⇅</div>
                    <div><label class="field-lbl" for="calcTo">Destination</label>
                        <select class="field-sel" id="calcTo">
                            <option value="">— Select Destination —</option>
                            <option value="tungko">Tungko Terminal</option>
                            <option value="muzon">Muzon Junction</option>
                            <option value="sapang_palay">Sapang Palay</option>
                            <option value="grotto">Grotto</option>
                            <option value="kaypian">Kaypian</option>
                            <option value="sjdm_bayan">SJDM Bayan (City Hall)</option>
                            <option value="bagong_buhay">Bagong Buhay</option>
                            <option value="ciudad_real">Ciudad Real</option>
                            <option value="citrus">Citrus</option>
                            <option value="dulong_bayan">Dulong Bayan</option>
                            <option value="fatima">Fatima</option>
                            <option value="francisco_homes_guijo">Francisco Homes–Guijo</option>
                            <option value="francisco_homes_mulawin">Francisco Homes–Mulawin</option>
                            <option value="francisco_homes_narra">Francisco Homes–Narra</option>
                            <option value="francisco_homes_yakal">Francisco Homes–Yakal</option>
                            <option value="gaya_gaya">Gaya-Gaya</option>
                            <option value="graceville">Graceville</option>
                            <option value="gumaoc_east">Gumaoc East</option>
                            <option value="gumaoc_central">Gumaoc Central</option>
                            <option value="gumaoc_west">Gumaoc West</option>
                            <option value="kaybanban">Kaybanban</option>
                            <option value="kaytitinga">Kaytitinga</option>
                            <option value="maharlika">Maharlika</option>
                            <option value="minuyan">Minuyan</option>
                            <option value="muzon_east">Muzon East</option>
                            <option value="muzon_west">Muzon West</option>
                            <option value="paradise">Paradise</option>
                            <option value="poblacion">Poblacion</option>
                            <option value="santo_cristo">Santo Cristo</option>
                            <option value="santo_nino">Santo Niño</option>
                            <option value="san_isidro">San Isidro</option>
                            <option value="san_manuel">San Manuel</option>
                            <option value="san_martin">San Martin</option>
                            <option value="san_pedro">San Pedro</option>
                            <option value="san_rafael">San Rafael</option>
                            <option value="sapang_palay_proper">Sapang Palay Proper</option>
                            <option value="tungkong_mangga">Tungkong Mangga</option>
                            <option value="bagong_buhay_homes">Bagong Buhay Homes</option>
                            <option value="bellevue">Bellevue</option>
                            <option value="camella_sjdm">Camella SJDM</option>
                            <option value="carissa_homes">Carissa Homes</option>
                            <option value="colinas_verdes">Colinas Verdes</option>
                            <option value="deca_homes">Deca Homes</option>
                            <option value="garden_villas">Garden Villas</option>
                            <option value="greenfields">Greenfields</option>
                            <option value="katarungan_village">Katarungan Village</option>
                            <option value="lancaster_new_city">Lancaster New City (SJDM side)</option>
                            <option value="lessandra_sjdm">Lessandra SJDM</option>
                            <option value="metrogate_sjdm">Metrogate SJDM</option>
                            <option value="pleasant_hill">Pleasant Hill</option>
                            <option value="residencia_de_muzon">Residencia de Muzon</option>
                            <option value="san_jose_heights">San Jose Heights</option>
                            <option value="starmall_sjdm">Starmall SJDM</option>
                            <option value="sm_city_sjdm">SM City San Jose del Monte</option>
                            <option value="the_gardens_sjdm">The Gardens SJDM</option>
                            <option value="villa_antonio">Villa Antonio</option>
                            <option value="amana_waterpark">Amana Waterpark</option>
                            <option value="grotto_lourdes">Grotto of Our Lady of Lourdes</option>
                            <option value="mt_balagbag">Mt. Balagbag</option>
                            <option value="kaytitinga_falls">Kaytitinga Falls</option>
                        </select></div>
                    <div><label class="field-lbl" for="calcMode">Transport Mode</label>
                        <select class="field-sel" id="calcMode">
                            <option value="jeepney">🚎 Jeepney</option>
                            <option value="tricycle">🛺 Tricycle</option>
                            <option value="multicab">🚐 Multicab / FX</option>
                        </select></div>
                    <div><label class="field-lbl">Passengers</label>
                        <div class="pax-row"><button class="pax-btn" id="paxMinus">−</button><span class="pax-val" id="paxCount">1</span><button class="pax-btn" id="paxPlus">+</button></div></div>
                    <div><label class="field-lbl">Round Trip?</label>
                        <select class="field-sel" id="calcTrip">
                            <option value="1">One-way</option>
                            <option value="2">Round Trip (×2)</option>
                        </select></div>
                    <button class="calc-submit" id="calcBtn">🧮 Calculate Fare</button>
                </div>
                <div class="calc-result" id="calcResult">
                    <div class="calc-placeholder"><span>🚌</span><p>Select origin & destination<br>to get an estimated fare breakdown.</p></div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW: Weather & Commute Impact -->
    <section id="weather" class="weather-sec">
        <div class="container">
            <div class="sec-hd">
                
                <h2 class="sec-ttl fade-in">Weather & Commute Alerts</h2>
                <p class="sec-sub fade-in">Real-time conditions and how they affect your commute today</p>
            </div>
            <div class="weather-grid fade-in">
                <div class="weather-card" id="weatherCard1">
                    <div class="weather-card-hd">
                        <div class="weather-loc">📍 SJDM, Bulacan</div>
                        <div class="weather-badge ok" id="weatherBadge1">Good to Travel</div>
                    </div>
                    <div class="weather-main">
                        <div class="weather-emoji" id="weatherEmoji">☀️</div>
                        <div><div class="weather-temp" id="weatherTemp">--°C</div><div class="weather-desc" id="weatherDesc">Loading…</div></div>
                    </div>
                    <div class="weather-meta">
                        <div class="weather-meta-item"><span>Humidity</span><strong id="weatherHumid">--%</strong></div>
                        <div class="weather-meta-item"><span>Wind</span><strong id="weatherWind">-- km/h</strong></div>
                        <div class="weather-meta-item"><span>Feels Like</span><strong id="weatherFeels">--°C</strong></div>
                        <div class="weather-meta-item"><span>Visibility</span><strong id="weatherVis">-- km</strong></div>
                    </div>
                    <div class="commute-impact" id="weatherImpact">
                        <strong>🚌 Commute Impact</strong>
                        <p id="weatherImpactText">Checking weather conditions…</p>
                    </div>
                </div>
                <div class="weather-card">
                    <div class="weather-card-hd">
                        <div class="weather-loc">🚨 Daily Alerts</div>
                        <div class="weather-badge ok">SJDM Updates</div>
                    </div>
                    <div style="display:flex;flex-direction:column;gap:10px;margin-top:8px;" id="alertList">
                        <div class="commute-impact" style="margin:0;"><strong>⏰ Rush Hour Alert</strong><p id="alertRush">Checking current traffic status…</p></div>
                        <div class="commute-impact" style="margin:0;border-left-color:var(--gold);"><strong>💡 Today's Tip</strong><p id="alertTip">Loading daily commuter tip…</p></div>
                        <div class="commute-impact" style="margin:0;border-left-color:var(--rose);"><strong>🌧️ Flood Prone Areas</strong><p>Avoid low-lying roads near Tungko creek and Sapang Palay drainage areas during heavy rain. Check PAGASA advisories.</p></div>
                        <div class="commute-impact" style="margin:0;border-left-color:var(--sky);"><strong>🔔 Route Updates</strong><p id="alertRoute">No major disruptions reported today on main SJDM routes.</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clock + Rush Hour -->
    <section id="clock" class="clock-sec">
        <div class="container">
            <div class="sec-hd">
               
                <h2 class="sec-ttl fade-in">Live Traffic Status</h2>
                <p class="sec-sub fade-in">Philippine Standard Time and rush hour tracker</p>
            </div>
            <div class="clock-grid fade-in">
                <div class="clock-box">
                    <div class="clock-label">Philippine Standard Time</div>
                    <div class="live-time" id="liveClock">--:--:--</div>
                    <div class="clock-date-lbl" id="clockDate">Loading…</div>
                </div>
                <div class="rush-box" id="rushBlock">
                    <div class="rush-dot" id="rushDot"></div>
                    <h3 id="rushTitle">Checking traffic…</h3>
                    <p id="rushDesc"></p>
                    <div class="rush-sched">
                        <div class="rush-row"><span class="rush-badge red">🔴 Rush Hour AM</span><span>6:00 – 9:00 AM</span></div>
                        <div class="rush-row"><span class="rush-badge yellow">🟡 Moderate</span><span>9:00 AM – 4:00 PM</span></div>
                        <div class="rush-row"><span class="rush-badge red">🔴 Rush Hour PM</span><span>5:00 – 8:00 PM</span></div>
                        <div class="rush-row"><span class="rush-badge green">🟢 Light Traffic</span><span>8:00 PM – 5:00 AM</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW: Terminal Guide -->
    <section id="terminals" class="terminal-sec">
        <div class="container">
            <div class="sec-hd">
                
                <h2 class="sec-ttl fade-in">Terminal Guide</h2>
                <p class="sec-sub fade-in">Key terminals and transport hubs in SJDM — tap to explore</p>
            </div>
            <div class="terminal-grid fade-in">
                <div class="terminal-map">
                    <div class="terminal-map-inner">
                        <div class="terminal-map-title">Select a Terminal</div>
                        <div class="t-node active" data-terminal="tungko"><div class="t-node-dot hub"></div><div><div class="t-node-name">Tungko Terminal</div><div class="t-node-sub">Major Hub — Buses & UV Express</div></div><span class="t-node-arrow">›</span></div>
                        <div class="t-node" data-terminal="muzon"><div class="t-node-dot hub"></div><div><div class="t-node-name">Muzon Terminal</div><div class="t-node-sub">Hub — Jeepneys & Buses</div></div><span class="t-node-arrow">›</span></div>
                        <div class="t-node" data-terminal="sapang_palay"><div class="t-node-dot mid"></div><div><div class="t-node-name">Sapang Palay</div><div class="t-node-sub">UV Express Hub</div></div><span class="t-node-arrow">›</span></div>
                        <div class="t-node" data-terminal="grotto"><div class="t-node-dot mid"></div><div><div class="t-node-name">Grotto</div><div class="t-node-sub">Landmark Stop</div></div><span class="t-node-arrow">›</span></div>
                        <div class="t-node" data-terminal="kaypian"><div class="t-node-dot sub"></div><div><div class="t-node-name">Kaypian</div><div class="t-node-sub">Jeepney Terminal</div></div><span class="t-node-arrow">›</span></div>
                        <div class="t-node" data-terminal="sjdm_bayan"><div class="t-node-dot sub"></div><div><div class="t-node-name">SJDM Bayan</div><div class="t-node-sub">Town Center Hub</div></div><span class="t-node-arrow">›</span></div>
                    </div>
                </div>
                <div class="terminal-info" id="terminalInfo">
                    <h3 id="termInfoTitle">Tungko Terminal</h3>
                    <div class="t-info-rows" id="termInfoRows"></div>
                    <div class="t-conn-tags" id="termInfoTags"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Checklist -->
    <section id="checklist" class="checklist-sec">
        <div class="container">
            <div class="sec-hd">
                
                <h2 class="sec-ttl fade-in">Commuter Checklist</h2>
                <p class="sec-sub fade-in">Make sure you have everything before you head out</p>
            </div>
            <div class="checklist-grid fade-in">
                <div class="checklist-panel">
                    <div class="progress-row">
                        <div class="progress-bar"><div class="progress-fill" id="progressFill" style="width:0%"></div></div>
                        <span class="progress-lbl" id="progressLbl">0 / 0</span>
                    </div>
                    <ul class="check-list" id="checkList"></ul>
                    <div class="check-actions">
                        <button class="check-reset" id="checkReset">↺ Reset</button>
                        <span class="check-congrats" id="checkCongrats"></span>
                    </div>
                </div>
                <div class="checklist-add">
                    <h4>➕ Add Custom Item</h4>
                    <div class="add-input-row">
                        <input type="text" id="newItemInput" placeholder="e.g. Umbrella, Water bottle…">
                        <button id="addItemBtn">Add to List</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tracker -->
    <section id="tracker" class="tracker-sec">
        <div class="container">
            <div class="sec-hd">
                
                <h2 class="sec-ttl fade-in">Route Tracker</h2>
                <p class="sec-sub fade-in">Step-by-step navigation for your commute journey</p>
            </div>
            <div class="tracker-wrap fade-in">
                <div class="tracker-top">
                    <label>Select Your Route</label>
                    <select id="trackerRoute">
                        <option value="">— Choose a route to start tracking —</option>
                    </select>
                </div>
                <div id="trackerSteps"><div class="tracker-ph"><span>🗺️</span><p>Select a route above to start tracking.</p></div></div>
                <div class="tracker-actions" id="trackerActions" style="display:none;">
                    <button class="t-prev" id="trackerPrev" disabled>← Prev</button>
                    <span class="t-count" id="trackerCounter"></span>
                    <button class="t-next" id="trackerNext">Next →</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Community -->
    <section id="community" class="community-sec">
        <div class="container">
            <div class="sec-hd">
                
                <h2 class="sec-ttl fade-in">Commuter Stories</h2>
                <p class="sec-sub fade-in">Real tips from real SJDM commuters</p>
            </div>
            <div class="community-grid">
                <div class="community-card fade-in">
                    <div class="stars">★★★★★</div>
                    <p>Lagi akong sumasakay ng 5:30 AM para maiwasan ang matinding trapik sa Commonwealth. Nakaka-save ng halos isang oras ang trick na ito!</p>
                    <div class="community-author"><div class="author-av">🧑</div><div class="author-name"><strong>Mark T.</strong><span>Daily commuter, Tungko</span></div></div>
                </div>
                <div class="community-card fade-in">
                    <div class="stars">★★★★★</div>
                    <p>UV Express sa Sapang Palay → SM North ang pinaka-convenient para sa akin. Mas mahal ng kaunti pero worth it ang oras na naitipid ko.</p>
                    <div class="community-author"><div class="author-av">👩</div><div class="author-name"><strong>Maria L.</strong><span>Office worker, Sapang Palay</span></div></div>
                </div>
                <div class="community-card fade-in">
                    <div class="stars">★★★★☆</div>
                    <p>Ang Grotto ang best na landmark para sa mga baguhan. Madaling sabihin sa driver at maraming sasakyan ang dumadaan doon papunta Manila.</p>
                    <div class="community-author"><div class="author-av">👨</div><div class="author-name"><strong>Juan R.</strong><span>Student, Grotto area</span></div></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency -->
    <section id="emergency" class="emergency-sec">
        <div class="container">
            <div class="sec-hd">
                
                <h2 class="sec-ttl fade-in">Emergency Contacts</h2>
                <p class="sec-sub fade-in">Save these numbers before you leave the house</p>
            </div>
            <div class="emergency-grid">
                <div class="em-card fade-in"><div class="em-icon"><i class="fi fi-bs-alert-triangle"></i></div><h4>CDRRMO (Disaster)</h4><div class="em-num">0932-600-0119</div><div class="em-num">0955-206-7200</div><a class="em-call" href="tel:09326000119"><i class="fi fi-bs-phone" style="font-size:12px"></i> Call</a></div>
                <div class="em-card fade-in"><div class="em-icon"><i class="fi fi-bs-shield"></i></div><h4>SJDM Police</h4><div class="em-num">0916-432-0401</div><a class="em-call" href="tel:09164320401"><i class="fi fi-bs-phone" style="font-size:12px"></i> Call</a></div>
                <div class="em-card fade-in"><div class="em-icon"><i class="fi fi-bs-flame"></i></div><h4>Fire Dept (BFP)</h4><div class="em-num">0932-373-2444</div><a class="em-call" href="tel:09323732444"><i class="fi fi-bs-phone" style="font-size:12px"></i> Call</a></div>
                <div class="em-card fade-in"><div class="em-icon"><i class="fi fi-bs-heart-pulse"></i></div><h4>Health Office</h4><div class="em-num">0956-986-9417</div><a class="em-call" href="tel:09569869417"><i class="fi fi-bs-phone" style="font-size:12px"></i> Call</a></div>
                <div class="em-card fade-in"><div class="em-icon"><i class="fi fi-bs-phone-call"></i></div><h4>National Emergency</h4><div class="em-num" style="font-size:1.5rem;color:#fff;font-family:'Fraunces',serif;">911</div><a class="em-call" href="tel:911"><i class="fi fi-bs-phone" style="font-size:12px"></i> Call 911</a></div>
            </div>
        </div>
    </section>

    <!-- Kumita (Earn Income) -->
    <section id="kumita" class="kumita-sec">
        <div class="container">
            <div class="sec-hd">
                <span class="sec-chip">💸 KUMITA</span>
                <h2 class="sec-ttl fade-in" style="color:#fff;">Kumita Gamit ang Biyahero</h2>
                <p class="sec-sub fade-in">Mag-earn habang nag-cocommute — maging driver partner, mag-post ng gig, o mag-refer ng kaibigan para sa rewards.</p>
            </div>

            <!-- 3 Main Earn Cards -->
            <div class="kumita-grid">

                <!-- Driver Partner -->
                <div class="kumita-card gold fade-in">
                    <div class="kumita-icon gold">🚗</div>
                    <div class="kumita-badge">⭐ Pinaka-Popular</div>
                    <h3>Maging Driver Partner</h3>
                    <p>I-offer ang iyong sasakyan bilang serbisyo sa loob ng SJDM. Jeepney, tricycle, o private car — kumita ka bawat biyahe. Ikaw ang boss ng iyong schedule.</p>
                    <div style="display:flex;flex-direction:column;gap:8px;margin-bottom:18px;">
                        <div style="display:flex;align-items:center;gap:8px;font-size:13px;color:rgba(255,255,255,0.7);"><span style="color:#74d9a8;">✓</span> Flexible hours — ikaw ang magde-decide</div>
                        <div style="display:flex;align-items:center;gap:8px;font-size:13px;color:rgba(255,255,255,0.7);"><span style="color:#74d9a8;">✓</span> Est. ₱500–₱1,500/araw (part-time)</div>
                        <div style="display:flex;align-items:center;gap:8px;font-size:13px;color:rgba(255,255,255,0.7);"><span style="color:#74d9a8;">✓</span> Direktang bayad — walang middleman</div>
                    </div>
                    <button class="kumita-btn" onclick="document.getElementById('driverModal').classList.add('open')">🚗 Mag-apply Ngayon</button>
                </div>

                <!-- Local Gig Board -->
                <div class="kumita-card sky fade-in">
                    <div class="kumita-icon sky">📋</div>
                    <h3>Local Gig Board</h3>
                    <p>Mag-post ng trabaho o humanap ng quick jobs sa loob ng SJDM — delivery, errand, hatid-sunduin, at iba pa. Para sa mga may extra time at gusto kumita.</p>
                    <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:18px;">
                        <span class="gig-type-tag delivery">📦 Delivery</span>
                        <span class="gig-type-tag errand">🛒 Errands</span>
                        <span class="gig-type-tag transport">🚗 Transport</span>
                        <span class="gig-type-tag other">🔧 Other</span>
                    </div>
                    <button class="kumita-btn outline" onclick="document.getElementById('gigSection').scrollIntoView({behavior:'smooth'})">📋 Tingnan ang Gig Board</button>
                </div>

                <!-- Referral Rewards -->
                <div class="kumita-card green fade-in">
                    <div class="kumita-icon green">🎁</div>
                    <h3>Referral Rewards</h3>
                    <p>Mag-invite ng kaibigan o kapitbahay sa Biyahero. Para sa bawat bagong premium subscriber na mag-sign up gamit ang iyong code, makakatanggap ka ng ₱50 credits.</p>
                    <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:18px;">
                        <span style="background:rgba(82,183,136,0.15);color:#74d9a8;border:1px solid rgba(82,183,136,0.3);padding:5px 12px;border-radius:100px;font-size:12px;font-weight:700;">₱50 per referral</span>
                        <span style="background:rgba(244,196,48,0.1);color:var(--gold);border:1px solid rgba(244,196,48,0.25);padding:5px 12px;border-radius:100px;font-size:12px;font-weight:700;">Walang limit!</span>
                    </div>
                    <button class="kumita-btn outline" onclick="document.getElementById('referralSection').scrollIntoView({behavior:'smooth'})">🎁 Makita ang Aking Code</button>
                </div>
            </div>

            <!-- Gig Board Section -->
            <div id="gigSection" class="fade-in" style="margin-bottom:48px;">
                <h3 style="color:#fff;font-size:1.3rem;margin-bottom:6px;">📋 SJDM Local Gig Board</h3>
                <p style="color:rgba(255,255,255,0.55);font-size:13.5px;margin-bottom:20px;">Mag-post ng trabaho o sagutin ang available gigs sa paligid mo.</p>
                <!-- Post Form -->
                <div class="gig-post-form">
                    <input type="text" class="gig-input" id="gigTitle" placeholder="Ano ang trabaho? (e.g. Hatid ng grocery sa Kaypian)">
                    <select class="gig-select" id="gigType">
                        <option value="delivery">📦 Delivery</option>
                        <option value="errand">🛒 Errand</option>
                        <option value="transport">🚗 Transport</option>
                        <option value="other">🔧 Other</option>
                    </select>
                    <input type="text" class="gig-input" id="gigPay" placeholder="Bayad (e.g. ₱150)" style="max-width:130px;">
                    <button class="gig-submit" onclick="postGig()">+ Post Gig</button>
                </div>
                <!-- Live Gig List -->
                <div class="gig-board" id="gigBoard"></div>
            </div>

            <!-- Referral Section -->
            <div id="referralSection" class="referral-box fade-in">
                <div class="referral-code-wrap">
                    <p>🎁 Ang iyong personal referral code — i-share sa mga kaibigan mo!</p>
                    <div class="referral-code">
                        <span id="myReferralCode">BIYAHERO-7X29</span>
                        <button class="copy-btn" onclick="copyReferral()">📋 Copy</button>
                    </div>
                    <p style="margin-top:10px;font-size:12px;">Share mo rin itong link: <span style="color:var(--gold);">biyahero.app/join?ref=7X29</span></p>
                </div>
                <div class="referral-stats">
                    <div class="ref-stat">
                        <strong id="refCount">0</strong>
                        <span>Referrals</span>
                    </div>
                    <div class="ref-stat">
                        <strong id="refEarned">₱0</strong>
                        <span>Nakita mo</span>
                    </div>
                    <div class="ref-stat">
                        <strong id="refPending">₱0</strong>
                        <span>Pending</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Driver Application Modal -->
    <div class="kumita-modal" id="driverModal">
        <div class="kumita-modal-box">
            <button class="kumita-modal-close" onclick="document.getElementById('driverModal').classList.remove('open')">✕</button>
            <div id="driverFormView">
                <h3>🚗 Driver Partner Application</h3>
                <p>I-fill out ang form at makikipag-ugnayan ang aming team sa loob ng 24 oras.</p>
                <div class="driver-form" id="driverForm">
                    <div class="driver-field">
                        <label>Pangalan</label>
                        <input type="text" id="driverName" placeholder="Juan Dela Cruz">
                    </div>
                    <div class="driver-field">
                        <label>Phone Number</label>
                        <input type="text" id="driverPhone" placeholder="09xx-xxx-xxxx">
                    </div>
                    <div class="driver-field">
                        <label>Uri ng Sasakyan</label>
                        <select id="driverVehicle">
                            <option value="">— Pumili —</option>
                            <option>Private Car</option>
                            <option>Tricycle</option>
                            <option>Jeepney</option>
                            <option>Multicab</option>
                            <option>Motorcycle (habal-habal)</option>
                        </select>
                    </div>
                    <div class="driver-field">
                        <label>Preferred Area</label>
                        <select id="driverArea">
                            <option value="">— Pumili —</option>
                            <option>Tungko Area</option>
                            <option>Muzon Area</option>
                            <option>Sapang Palay Area</option>
                            <option>Kaypian Area</option>
                            <option>Buong SJDM</option>
                        </select>
                    </div>
                    <div class="driver-field full">
                        <label>Availability</label>
                        <select id="driverAvail">
                            <option>Buong araw (Full-time)</option>
                            <option>Umaga lang (6AM–12PM)</option>
                            <option>Hapon lang (12PM–6PM)</option>
                            <option>Gabi lang (6PM–10PM)</option>
                            <option>Weekends lang</option>
                        </select>
                    </div>
                </div>
                <div class="driver-perks" style="margin-top:16px;">
                    <div class="perk-row"><div class="perk-check">✓</div><div class="perk-text"><strong>Free registration — walang bayad</strong><span>Libre ang pag-sign up, kumita ka agad</span></div></div>
                    <div class="perk-row"><div class="perk-check">✓</div><div class="perk-text"><strong>Set your own rate</strong><span>Ikaw ang magse-set ng presyo ng iyong serbisyo</span></div></div>
                </div>
                <button class="kumita-btn" style="width:100%;justify-content:center;" onclick="submitDriverApp()">Isumite ang Application ✓</button>
            </div>
            <div id="driverSuccessView" style="display:none;">
                <div class="success-anim">
                    <span class="big-emoji">🎉</span>
                    <h4>Application Received!</h4>
                    <p>Salamat! Makikipag-ugnayan kami sa iyo sa loob ng 24 oras. Samantala, ibahagi mo na ang Biyahero sa iyong mga kaibigan!</p>
                    <button class="kumita-btn" style="margin-top:16px;" onclick="document.getElementById('driverModal').classList.remove('open');document.getElementById('driverSuccessView').style.display='none';document.getElementById('driverFormView').style.display='block';">Isara</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3>Biya<span>hero</span></h3>
                    <p>Your modern guide to commuting in San Jose Del Monte, Bulacan. Travel with confidence, safety, and ease every single day.</p>
                    <div class="footer-tags">
                        <span class="footer-tag">📍 SJDM, Bulacan</span>
                        <span class="footer-tag">🕐 Updated Daily</span>
                        <span class="footer-tag">🆓 Always Free</span>
                    </div>
                    <h4>Quick Links</h4>
                    <ul class="footer-links-list">
                        <li><a href="#routes">Popular Routes</a></li>
                        <li><a href="#planner">Commute Planner</a></li>
                        <li><a href="#calculator">Fare Calculator</a></li>
                        <li><a href="#weather">Weather Alerts</a></li>
                        <li><a href="#clock">Rush Hour Status</a></li>
                        <li><a href="#terminals">Terminal Guide</a></li>
                        <li><a href="#checklist">Commuter Checklist</a></li>
                        <li><a href="#kumita">💸 Kumita (Earn)</a></li>
                        <li><a href="#emergency">Emergency Contacts</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Connect</h4>
                    <div class="social-row">
                        <a href="#" class="social-btn"><i class="fi fi-bs-facebook"></i></a>
                        <a href="#" class="social-btn"><i class="fi fi-bs-twitter"></i></a>
                        <a href="#" class="social-btn"><i class="fi fi-bs-instagram"></i></a>
                        <a href="#" class="social-btn"><i class="fi fi-bs-youtube"></i></a>
                    </div>
                    <p>Have a tip or route update? Help fellow commuters by sharing your experience with the Biyahero community.</p>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container"><p> 2026 Biyahero Commuting Guide — SJDM, Bulacan. Fare data is estimated and subject to change.</p></div>
        </div>
    </footer>

    <!-- FAQ Chatbot -->
    <button class="faq-bubble" id="faqBubble"><i class="fi fi-bs-message-circle"></i><span class="faq-badge" id="faqBadge">1</span></button>
    <div class="faq-panel" id="faqPanel">
        <div class="faq-head"><div><h4>Biyahero Assistant </h4><p>Ask me anything about commuting in SJDM!</p></div><button class="faq-close" id="faqClose">✕</button></div>
        <div class="faq-msgs" id="faqMessages"><div class="faq-msg bot"><p>Kumusta! Ask me about routes, fares, safety, or any commute question! 🚌</p></div></div>
        <div class="faq-quick" id="faqQuickBtns"></div>
        <div class="faq-foot"><input type="text" class="faq-input" id="faqInput" placeholder="Type a question…"><button class="faq-send" id="faqSend">Send</button></div>
    </div>

    <!-- Back to Top -->
    <button class="back-top" id="backToTop">↑</button>

    <script>
    /* ─── DATA ─── */
    const routes=[
        {name:'Tungko → Muzon',icons:['truck','arrow-right'],steps:['Board a jeepney at Tungko Terminal heading toward Muzon','Pass through Bagong Buhay Ave junction','Alight at Muzon Junction or Muzon Terminal'],info:{fare:'₱13–20',time:'15–25 min',distance:'~6 km'},tip:'Frequent jeepneys depart from Tungko every 10–15 mins.',mode:'jeep'},
        {name:'Muzon → Sapang Palay',icons:['truck','arrow-right'],steps:['Board jeepney at Muzon Junction heading north','Pass through SJDM Bayan / City Hall area','Alight at Sapang Palay Terminal'],info:{fare:'₱15–25',time:'20–35 min',distance:'~8 km'},tip:'Sapang Palay is the farthest northern terminal — fewer jeepneys late at night.',mode:'jeep'},
        {name:'Tungko → Kaypian',icons:['truck','arrow-right'],steps:['Board jeepney at Tungko heading toward Kaypian Road','Pass through Citrus area / San Manuel','Alight at Kaypian Terminal'],info:{fare:'₱13–20',time:'20–30 min',distance:'~7 km'},tip:'Tricycle from Kaypian can take you deeper into residential subdivisions.',mode:'jeep'},
        {name:'Grotto → SJDM Bayan',icons:['truck','arrow-right'],steps:['Board jeepney near Grotto landmark heading south','Pass through the main road toward City Hall','Alight at SJDM Bayan / City Hall area'],info:{fare:'₱13–18',time:'15–20 min',distance:'~5 km'},tip:'Grotto is a reliable landmark — easy to find and many routes pass through it.',mode:'jeep'},
        {name:'Kaypian → Sapang Palay',icons:['truck','arrow-right'],steps:['Tricycle from Kaypian to main road','Board jeepney heading north toward Sapang Palay','Alight at Sapang Palay Terminal'],info:{fare:'₱20–35',time:'25–40 min',distance:'~9 km'},tip:'May need to transfer at SJDM Bayan. Ask the driver if the route is direct.',mode:'jeep'},
        {name:'SJDM Bayan → Tungko',icons:['truck','arrow-right'],steps:['Board jeepney at SJDM Bayan (City Hall) terminal','Head southbound along the main road','Alight at Tungko Junction or Tungko Terminal'],info:{fare:'₱13–20',time:'15–25 min',distance:'~6 km'},tip:'Tungko is the main hub — frequent departures throughout the day.',mode:'jeep'},
    ];

    /* ─── TERMINAL DATA ─── */
    const terminals={
        tungko:{title:'Tungko Terminal',rows:[{l:'Type',v:'Major SJDM Hub'},{l:'Vehicles',v:'Jeepney, Tricycle, Multicab'},{l:'Est. Departure Freq.',v:'Every 10–15 mins (peak)'},{l:'Operating Hours',v:'4:00 AM – 10:00 PM'},{l:'Local Connections',v:'Muzon, Kaypian, SJDM Bayan, Grotto'}],tags:['To Muzon','To Kaypian','To SJDM Bayan','To Grotto']},
        muzon:{title:'Muzon Junction Terminal',rows:[{l:'Type',v:'Central Hub Terminal'},{l:'Vehicles',v:'Jeepney, Tricycle, Multicab'},{l:'Est. Departure Freq.',v:'Every 15–25 mins'},{l:'Operating Hours',v:'5:00 AM – 9:00 PM'},{l:'Key Connections',v:'Tungko, Sapang Palay, SJDM Bayan'}],tags:['To Tungko','To Sapang Palay','To SJDM Bayan']},
        sapang_palay:{title:'Sapang Palay Terminal',rows:[{l:'Type',v:'Northern SJDM Terminal'},{l:'Vehicles',v:'Jeepney, Tricycle'},{l:'Est. Departure Freq.',v:'Every 20–30 mins'},{l:'Operating Hours',v:'4:30 AM – 9:00 PM'},{l:'Key Connections',v:'Muzon, SJDM Bayan, Kaypian'}],tags:['To Muzon','To SJDM Bayan','To Kaypian']},
        grotto:{title:'Grotto Landmark',rows:[{l:'Type',v:'Major SJDM Landmark / Stop'},{l:'Vehicles',v:'Jeepney (pass-through)'},{l:'Notable Feature',v:'Easily identifiable for locals'},{l:'Operating Hours',v:'24/7 (jeepneys pass through)'},{l:'Key Connections',v:'SJDM Bayan, Tungko, Muzon'}],tags:['To SJDM Bayan','To Tungko','To Muzon']},
        kaypian:{title:'Kaypian Terminal',rows:[{l:'Type',v:'Eastern SJDM Jeepney Hub'},{l:'Vehicles',v:'Jeepney, Tricycle'},{l:'Est. Departure Freq.',v:'Every 15–25 mins'},{l:'Operating Hours',v:'5:00 AM – 8:30 PM'},{l:'Key Connections',v:'Tungko, SJDM Bayan, Sapang Palay'}],tags:['To Tungko','To SJDM Bayan','To Sapang Palay']},
        sjdm_bayan:{title:'SJDM Bayan (City Hall)',rows:[{l:'Type',v:'Central SJDM Transfer Point'},{l:'Vehicles',v:'Jeepney, Tricycle, Multicab'},{l:'Est. Departure Freq.',v:'Varies by route'},{l:'Operating Hours',v:'4:00 AM – 9:00 PM'},{l:'Coverage',v:'All SJDM terminals & barangays'}],tags:['To Tungko','To Muzon','To Kaypian','To Sapang Palay']},
    };

    /* ─── PLANNER DATA ─── */
    const plannerData={
        tungko_muzon:{dest:'Muzon Junction',steps:[{t:0,action:'Depart from Tungko Terminal',detail:'Board jeepney heading toward Muzon / Bagong Buhay Ave',type:'jeep'},{t:10,action:'Pass through Bagong Buhay Junction',detail:'Stay on the main road toward Muzon',type:'jeep'},{t:20,action:'Arrive at Muzon Junction',detail:'Alight at Muzon Terminal or Junction rotunda',type:'walk'}],fare:'₱13–20',total:'~15–25 min'},
        tungko_sapang_palay:{dest:'Sapang Palay',steps:[{t:0,action:'Depart Tungko Terminal',detail:'Board jeepney toward SJDM Bayan / City Hall direction',type:'jeep'},{t:20,action:'Transfer at Muzon or SJDM Bayan',detail:'Board jeepney heading north to Sapang Palay',type:'jeep'},{t:40,action:'Arrive at Sapang Palay Terminal',detail:'Alight at the Sapang Palay terminal',type:'walk'}],fare:'₱25–40',total:'~35–50 min'},
        tungko_grotto:{dest:'Grotto',steps:[{t:0,action:'Board jeepney at Tungko Terminal',detail:'Take jeepney passing Grotto landmark',type:'jeep'},{t:15,action:'Arrive at Grotto Landmark',detail:'Easy to spot — large roadside landmark',type:'walk'}],fare:'₱13–18',total:'~15–20 min'},
        tungko_kaypian:{dest:'Kaypian',steps:[{t:0,action:'Board jeepney at Tungko Terminal',detail:'Take jeepney toward Kaypian Road / Citrus area',type:'jeep'},{t:25,action:'Arrive at Kaypian Terminal',detail:'Alight at the Kaypian terminal',type:'walk'}],fare:'₱13–20',total:'~20–30 min'},
        tungko_sjdm_bayan:{dest:'SJDM Bayan (City Hall)',steps:[{t:0,action:'Board jeepney at Tungko Terminal',detail:'Take jeepney heading toward City Hall / SJDM Bayan',type:'jeep'},{t:20,action:'Arrive at SJDM Bayan',detail:'Alight near City Hall or Bayan Market',type:'walk'}],fare:'₱13–20',total:'~15–25 min'},
        muzon_tungko:{dest:'Tungko Terminal',steps:[{t:0,action:'Board jeepney at Muzon Junction',detail:'Take jeepney heading south toward Tungko',type:'jeep'},{t:20,action:'Arrive at Tungko Terminal',detail:'Alight at Tungko junction or terminal',type:'walk'}],fare:'₱13–20',total:'~15–25 min'},
        muzon_sapang_palay:{dest:'Sapang Palay',steps:[{t:0,action:'Board jeepney at Muzon Junction',detail:'Take jeepney heading north toward Sapang Palay',type:'jeep'},{t:30,action:'Arrive at Sapang Palay Terminal',detail:'End of the northern route',type:'walk'}],fare:'₱15–25',total:'~20–35 min'},
        muzon_grotto:{dest:'Grotto',steps:[{t:0,action:'Board jeepney at Muzon Junction',detail:'Take jeepney passing through the Grotto area',type:'jeep'},{t:15,action:'Arrive at Grotto Landmark',detail:'Tell the driver "Grotto" as your stop',type:'walk'}],fare:'₱13–18',total:'~12–20 min'},
        muzon_kaypian:{dest:'Kaypian',steps:[{t:0,action:'Board jeepney at Muzon toward Tungko',detail:'Head toward Tungko first',type:'jeep'},{t:20,action:'Transfer at Tungko Terminal',detail:'Board jeepney going to Kaypian',type:'jeep'},{t:45,action:'Arrive at Kaypian Terminal',detail:'Alight at Kaypian terminal',type:'walk'}],fare:'₱20–35',total:'~35–50 min'},
        muzon_sjdm_bayan:{dest:'SJDM Bayan (City Hall)',steps:[{t:0,action:'Board jeepney at Muzon Junction',detail:'Take jeepney toward SJDM Bayan / City Hall',type:'jeep'},{t:20,action:'Arrive at SJDM Bayan',detail:'Alight near City Hall or Bayan Market',type:'walk'}],fare:'₱13–20',total:'~15–25 min'},
        sapang_palay_tungko:{dest:'Tungko Terminal',steps:[{t:0,action:'Board jeepney at Sapang Palay Terminal',detail:'Head southbound toward Muzon / Tungko',type:'jeep'},{t:20,action:'Transfer at Muzon if needed',detail:'Board connecting jeepney to Tungko',type:'jeep'},{t:45,action:'Arrive at Tungko Terminal',detail:'Main terminal on the south side of SJDM',type:'walk'}],fare:'₱25–40',total:'~35–50 min'},
        sapang_palay_muzon:{dest:'Muzon Junction',steps:[{t:0,action:'Board jeepney at Sapang Palay Terminal',detail:'Head southbound, jeepney will pass Muzon',type:'jeep'},{t:30,action:'Arrive at Muzon Junction',detail:'Alight at the Muzon rotunda or terminal',type:'walk'}],fare:'₱15–25',total:'~20–35 min'},
        sapang_palay_grotto:{dest:'Grotto',steps:[{t:0,action:'Board jeepney at Sapang Palay',detail:'Head southbound toward Muzon',type:'jeep'},{t:25,action:'Alight near Grotto Landmark',detail:'Tell driver "Grotto" — it\'s a well-known stop',type:'walk'}],fare:'₱18–28',total:'~25–40 min'},
        sapang_palay_kaypian:{dest:'Kaypian',steps:[{t:0,action:'Board jeepney at Sapang Palay',detail:'Head south, transfer at SJDM Bayan or Muzon',type:'jeep'},{t:30,action:'Transfer to Kaypian-bound jeepney',detail:'Board at SJDM Bayan terminal',type:'jeep'},{t:55,action:'Arrive at Kaypian Terminal',detail:'End of Kaypian route',type:'walk'}],fare:'₱25–40',total:'~40–60 min'},
        sapang_palay_sjdm_bayan:{dest:'SJDM Bayan (City Hall)',steps:[{t:0,action:'Board jeepney at Sapang Palay Terminal',detail:'Head southbound toward City Hall area',type:'jeep'},{t:30,action:'Arrive at SJDM Bayan',detail:'Alight near City Hall or market area',type:'walk'}],fare:'₱18–28',total:'~25–40 min'},
        grotto_tungko:{dest:'Tungko Terminal',steps:[{t:0,action:'Flag down a jeepney near Grotto',detail:'Take southbound jeepney toward Tungko',type:'jeep'},{t:18,action:'Arrive at Tungko Terminal',detail:'Alight at Tungko junction',type:'walk'}],fare:'₱13–18',total:'~15–20 min'},
        grotto_muzon:{dest:'Muzon Junction',steps:[{t:0,action:'Board jeepney near Grotto',detail:'Take northbound jeepney toward Muzon',type:'jeep'},{t:15,action:'Arrive at Muzon Junction',detail:'Alight at Muzon terminal or rotunda',type:'walk'}],fare:'₱13–18',total:'~12–20 min'},
        grotto_sapang_palay:{dest:'Sapang Palay',steps:[{t:0,action:'Board jeepney near Grotto heading north',detail:'Take jeepney toward Sapang Palay',type:'jeep'},{t:35,action:'Arrive at Sapang Palay Terminal',detail:'Northern end of SJDM',type:'walk'}],fare:'₱18–28',total:'~25–40 min'},
        grotto_kaypian:{dest:'Kaypian',steps:[{t:0,action:'Board jeepney near Grotto toward Tungko',detail:'Head south first toward Tungko',type:'jeep'},{t:18,action:'Transfer at Tungko Terminal',detail:'Board Kaypian-bound jeepney',type:'jeep'},{t:45,action:'Arrive at Kaypian Terminal',detail:'Eastern SJDM terminal',type:'walk'}],fare:'₱20–35',total:'~35–50 min'},
        grotto_sjdm_bayan:{dest:'SJDM Bayan (City Hall)',steps:[{t:0,action:'Board jeepney near Grotto',detail:'Take jeepney toward City Hall area',type:'jeep'},{t:18,action:'Arrive at SJDM Bayan',detail:'Alight near City Hall or Bayan Market',type:'walk'}],fare:'₱13–18',total:'~15–20 min'},
        kaypian_tungko:{dest:'Tungko Terminal',steps:[{t:0,action:'Board jeepney at Kaypian Terminal',detail:'Take jeepney heading toward Tungko',type:'jeep'},{t:25,action:'Arrive at Tungko Terminal',detail:'Main SJDM bus & jeepney hub',type:'walk'}],fare:'₱13–20',total:'~20–30 min'},
        kaypian_muzon:{dest:'Muzon Junction',steps:[{t:0,action:'Board jeepney at Kaypian heading to Tungko',detail:'Transfer at Tungko',type:'jeep'},{t:25,action:'Transfer at Tungko Terminal',detail:'Board Muzon-bound jeepney',type:'jeep'},{t:45,action:'Arrive at Muzon Junction',detail:'Alight at Muzon rotunda',type:'walk'}],fare:'₱20–35',total:'~35–50 min'},
        kaypian_sapang_palay:{dest:'Sapang Palay',steps:[{t:0,action:'Board jeepney at Kaypian to SJDM Bayan',detail:'Head to the City Hall transfer point',type:'jeep'},{t:20,action:'Transfer at SJDM Bayan',detail:'Board northbound jeepney to Sapang Palay',type:'jeep'},{t:50,action:'Arrive at Sapang Palay Terminal',detail:'End of the northern route',type:'walk'}],fare:'₱25–40',total:'~40–60 min'},
        kaypian_grotto:{dest:'Grotto',steps:[{t:0,action:'Board jeepney at Kaypian heading toward Tungko',detail:'Tell driver you\'re stopping at Grotto',type:'jeep'},{t:30,action:'Alight at Grotto Landmark',detail:'Easy-to-spot roadside landmark',type:'walk'}],fare:'₱20–35',total:'~25–35 min'},
        kaypian_sjdm_bayan:{dest:'SJDM Bayan (City Hall)',steps:[{t:0,action:'Board jeepney at Kaypian Terminal',detail:'Take jeepney toward SJDM Bayan',type:'jeep'},{t:22,action:'Arrive at SJDM Bayan',detail:'Alight near City Hall or Bayan Market',type:'walk'}],fare:'₱13–20',total:'~18–28 min'},
        sjdm_bayan_tungko:{dest:'Tungko Terminal',steps:[{t:0,action:'Board jeepney at SJDM Bayan terminal',detail:'Take southbound jeepney toward Tungko',type:'jeep'},{t:20,action:'Arrive at Tungko Terminal',detail:'Alight at Tungko junction or terminal',type:'walk'}],fare:'₱13–20',total:'~15–25 min'},
        sjdm_bayan_muzon:{dest:'Muzon Junction',steps:[{t:0,action:'Board jeepney at SJDM Bayan',detail:'Take jeepney toward Muzon Junction',type:'jeep'},{t:22,action:'Arrive at Muzon Junction',detail:'Alight at Muzon rotunda or terminal',type:'walk'}],fare:'₱13–20',total:'~15–25 min'},
        sjdm_bayan_sapang_palay:{dest:'Sapang Palay',steps:[{t:0,action:'Board northbound jeepney at SJDM Bayan',detail:'Take jeepney toward Sapang Palay',type:'jeep'},{t:32,action:'Arrive at Sapang Palay Terminal',detail:'Northern end of SJDM',type:'walk'}],fare:'₱18–28',total:'~25–40 min'},
        sjdm_bayan_grotto:{dest:'Grotto',steps:[{t:0,action:'Board jeepney at SJDM Bayan toward Tungko',detail:'Tell driver to stop at Grotto',type:'jeep'},{t:18,action:'Arrive at Grotto Landmark',detail:'Well-known SJDM landmark',type:'walk'}],fare:'₱13–18',total:'~15–20 min'},
        sjdm_bayan_kaypian:{dest:'Kaypian',steps:[{t:0,action:'Board jeepney at SJDM Bayan toward Kaypian',detail:'Take jeepney eastbound to Kaypian Road',type:'jeep'},{t:22,action:'Arrive at Kaypian Terminal',detail:'Eastern SJDM terminal',type:'walk'}],fare:'₱13–20',total:'~18–28 min'},
    };

    /* ─── FARE DATA ─── */
    const fareMatrix={
        tungko:{
            muzon:{jeepney:{base:16,range:'₱13–20',time:'15–25 min',steps:['Tungko → Jeepney → Muzon']},tricycle:{base:40,range:'₱35–50',time:'15–20 min',steps:['Tricycle from Tungko to Muzon']},multicab:{base:20,range:'₱18–25',time:'12–20 min',steps:['Multicab from Tungko to Muzon']}},
            sapang_palay:{jeepney:{base:32,range:'₱25–40',time:'35–50 min',steps:['Tungko → Muzon → Sapang Palay (transfer)']},tricycle:{base:80,range:'₱70–95',time:'35–50 min',steps:['Tricycle — long distance, costly']},multicab:{base:40,range:'₱35–48',time:'30–45 min',steps:['Multicab → Muzon → transfer → Sapang Palay']}},
            minuyan:{jeepney:{base:35,range:'₱28–45',time:'40–55 min',steps:['Tungko → Muzon → Minuyan (transfer)']},tricycle:{base:90,range:'₱80–110',time:'40–55 min',steps:['Tricycle — long distance']},multicab:{base:45,range:'₱40–55',time:'35–50 min',steps:['Multicab with transfer']}},
            grotto:{jeepney:{base:15,range:'₱13–18',time:'15–20 min',steps:['Tungko → Jeepney passing Grotto']},tricycle:{base:35,range:'₱30–42',time:'12–18 min',steps:['Tricycle from Tungko to Grotto']},multicab:{base:18,range:'₱15–22',time:'12–18 min',steps:['Multicab Tungko to Grotto']}},
            kaypian:{jeepney:{base:16,range:'₱13–20',time:'20–30 min',steps:['Tungko → Jeepney → Kaypian']},tricycle:{base:50,range:'₱45–60',time:'18–25 min',steps:['Tricycle Tungko to Kaypian']},multicab:{base:22,range:'₱18–28',time:'18–25 min',steps:['Multicab Tungko to Kaypian']}},
            paradise:{jeepney:{base:38,range:'₱30–48',time:'45–60 min',steps:['Tungko → Muzon → Paradise (transfer)']},tricycle:{base:95,range:'₱85–115',time:'45–60 min',steps:['Tricycle — long distance']},multicab:{base:48,range:'₱42–58',time:'40–55 min',steps:['Multicab with transfer']}},
            tungkong_mangga:{jeepney:{base:18,range:'₱15–22',time:'20–30 min',steps:['Tungko → Jeepney → Tungkong Mangga']},tricycle:{base:45,range:'₱40–55',time:'18–25 min',steps:['Tricycle to Tungkong Mangga']},multicab:{base:22,range:'₱18–28',time:'15–22 min',steps:['Multicab to Tungkong Mangga']}},
            sjdm_bayan:{jeepney:{base:16,range:'₱13–20',time:'15–25 min',steps:['Tungko → Jeepney → SJDM Bayan']},tricycle:{base:45,range:'₱40–55',time:'15–22 min',steps:['Tricycle Tungko to City Hall']},multicab:{base:20,range:'₱18–25',time:'14–22 min',steps:['Multicab Tungko to SJDM Bayan']}}
        },
        muzon:{
            tungko:{jeepney:{base:16,range:'₱13–20',time:'15–25 min',steps:['Muzon → Jeepney → Tungko']},tricycle:{base:40,range:'₱35–50',time:'15–20 min',steps:['Tricycle Muzon to Tungko']},multicab:{base:20,range:'₱18–25',time:'12–20 min',steps:['Multicab Muzon to Tungko']}},
            sapang_palay:{jeepney:{base:20,range:'₱15–25',time:'20–35 min',steps:['Muzon → Jeepney → Sapang Palay']},tricycle:{base:60,range:'₱55–70',time:'20–30 min',steps:['Tricycle Muzon to Sapang Palay']},multicab:{base:25,range:'₱22–30',time:'18–28 min',steps:['Multicab Muzon to Sapang Palay']}},
            minuyan:{jeepney:{base:25,range:'₱20–32',time:'25–40 min',steps:['Muzon → Jeepney → Minuyan']},tricycle:{base:55,range:'₱50–65',time:'25–35 min',steps:['Tricycle to Minuyan']},multicab:{base:30,range:'₱25–38',time:'22–32 min',steps:['Multicab to Minuyan']}},
            grotto:{jeepney:{base:15,range:'₱13–18',time:'12–20 min',steps:['Muzon → Jeepney → Grotto']},tricycle:{base:35,range:'₱30–42',time:'10–15 min',steps:['Tricycle Muzon to Grotto']},multicab:{base:18,range:'₱15–22',time:'10–18 min',steps:['Multicab Muzon to Grotto']}},
            kaypian:{jeepney:{base:28,range:'₱20–35',time:'35–50 min',steps:['Muzon → Tungko transfer → Kaypian']},tricycle:{base:70,range:'₱60–85',time:'30–45 min',steps:['Tricycle — may need 2 rides']},multicab:{base:35,range:'₱30–42',time:'30–42 min',steps:['Multicab Muzon → transfer → Kaypian']}},
            paradise:{jeepney:{base:30,range:'₱25–38',time:'35–50 min',steps:['Muzon → Minuyan → Paradise (transfer)']},tricycle:{base:65,range:'₱58–78',time:'30–45 min',steps:['Tricycle to Paradise']},multicab:{base:35,range:'₱30–45',time:'28–40 min',steps:['Multicab with transfer']}},
            san_manuel:{jeepney:{base:22,range:'₱18–28',time:'25–40 min',steps:['Muzon → Jeepney → San Manuel']},tricycle:{base:50,range:'₱45–60',time:'20–30 min',steps:['Tricycle to San Manuel']},multicab:{base:28,range:'₱24–35',time:'18–28 min',steps:['Multicab to San Manuel']}},
            santo_cristo:{jeepney:{base:18,range:'₱15–22',time:'18–30 min',steps:['Muzon → Jeepney → Santo Cristo']},tricycle:{base:40,range:'₱35–50',time:'15–22 min',steps:['Tricycle to Santo Cristo']},multicab:{base:22,range:'₱18–28',time:'15–22 min',steps:['Multicab to Santo Cristo']}},
            sjdm_bayan:{jeepney:{base:16,range:'₱13–20',time:'15–25 min',steps:['Muzon → Jeepney → SJDM Bayan']},tricycle:{base:42,range:'₱38–50',time:'15–22 min',steps:['Tricycle Muzon to City Hall']},multicab:{base:20,range:'₱18–25',time:'13–20 min',steps:['Multicab Muzon to SJDM Bayan']}}
        },
        sapang_palay:{
            tungko:{jeepney:{base:32,range:'₱25–40',time:'35–50 min',steps:['Sapang Palay → Muzon → Tungko (transfer)']},tricycle:{base:80,range:'₱70–95',time:'35–50 min',steps:['Tricycle — long distance']},multicab:{base:40,range:'₱35–48',time:'30–45 min',steps:['Multicab → transfer → Tungko']}},
            muzon:{jeepney:{base:20,range:'₱15–25',time:'20–35 min',steps:['Sapang Palay → Jeepney → Muzon']},tricycle:{base:60,range:'₱55–70',time:'20–30 min',steps:['Tricycle to Muzon']},multicab:{base:25,range:'₱22–30',time:'18–28 min',steps:['Multicab to Muzon']}},
            minuyan:{jeepney:{base:18,range:'₱15–22',time:'18–30 min',steps:['Sapang Palay → Jeepney → Minuyan']},tricycle:{base:45,range:'₱40–55',time:'18–25 min',steps:['Tricycle to Minuyan']},multicab:{base:22,range:'₱18–28',time:'15–22 min',steps:['Multicab to Minuyan']}},
            grotto:{jeepney:{base:23,range:'₱18–28',time:'25–40 min',steps:['Sapang Palay → Jeepney → Grotto']},tricycle:{base:65,range:'₱58–75',time:'25–35 min',steps:['Tricycle to Grotto']},multicab:{base:28,range:'₱24–34',time:'22–35 min',steps:['Multicab to Grotto']}},
            kaypian:{jeepney:{base:32,range:'₱25–40',time:'40–60 min',steps:['Sapang Palay → SJDM Bayan → Kaypian (transfer)']},tricycle:{base:85,range:'₱75–100',time:'40–55 min',steps:['Tricycle — 2 rides needed']},multicab:{base:40,range:'₱35–48',time:'35–50 min',steps:['Multicab with transfer']}},
            paradise:{jeepney:{base:20,range:'₱15–25',time:'20–35 min',steps:['Sapang Palay → Jeepney → Paradise']},tricycle:{base:50,range:'₱45–60',time:'20–30 min',steps:['Tricycle to Paradise']},multicab:{base:25,range:'₱22–30',time:'18–28 min',steps:['Multicab to Paradise']}},
            san_manuel:{jeepney:{base:28,range:'₱22–35',time:'30–45 min',steps:['Sapang Palay → SJDM Bayan → San Manuel (transfer)']},tricycle:{base:70,range:'₱60–85',time:'28–40 min',steps:['Tricycle to San Manuel']},multicab:{base:35,range:'₱30–45',time:'25–38 min',steps:['Multicab with transfer']}},
            santo_nino:{jeepney:{base:15,range:'₱13–18',time:'15–25 min',steps:['Sapang Palay → Jeepney → Santo Niño']},tricycle:{base:35,range:'₱30–45',time:'12–20 min',steps:['Tricycle to Santo Niño']},multicab:{base:18,range:'₱15–22',time:'12–18 min',steps:['Multicab to Santo Niño']}},
            sjdm_bayan:{jeepney:{base:23,range:'₱18–28',time:'25–40 min',steps:['Sapang Palay → Jeepney → SJDM Bayan']},tricycle:{base:65,range:'₱58–75',time:'25–35 min',steps:['Tricycle to City Hall']},multicab:{base:28,range:'₱24–34',time:'22–35 min',steps:['Multicab to SJDM Bayan']}}
        },
        minuyan:{
            tungko:{jeepney:{base:35,range:'₱28–45',time:'40–55 min',steps:['Minuyan → Muzon → Tungko (transfer)']},tricycle:{base:90,range:'₱80–110',time:'40–55 min',steps:['Tricycle — long distance']},multicab:{base:45,range:'₱40–55',time:'35–50 min',steps:['Multicab with transfer']}},
            muzon:{jeepney:{base:25,range:'₱20–32',time:'25–40 min',steps:['Minuyan → Jeepney → Muzon']},tricycle:{base:55,range:'₱50–65',time:'25–35 min',steps:['Tricycle to Muzon']},multicab:{base:30,range:'₱25–38',time:'22–32 min',steps:['Multicab to Muzon']}},
            sapang_palay:{jeepney:{base:18,range:'₱15–22',time:'18–30 min',steps:['Minuyan → Jeepney → Sapang Palay']},tricycle:{base:45,range:'₱40–55',time:'18–25 min',steps:['Tricycle to Sapang Palay']},multicab:{base:22,range:'₱18–28',time:'15–22 min',steps:['Multicab to Sapang Palay']}},
            grotto:{jeepney:{base:30,range:'₱25–38',time:'35–50 min',steps:['Minuyan → Muzon → Grotto (transfer)']},tricycle:{base:70,range:'₱60–85',time:'30–45 min',steps:['Tricycle to Grotto']},multicab:{base:38,range:'₱32–48',time:'28–40 min',steps:['Multicab with transfer']}},
            kaypian:{jeepney:{base:35,range:'₱28–45',time:'45–60 min',steps:['Minuyan → SJDM Bayan → Kaypian (transfer)']},tricycle:{base:90,range:'₱80–110',time:'40–55 min',steps:['Tricycle — 2 rides needed']},multicab:{base:45,range:'₱38–58',time:'38–52 min',steps:['Multicab with transfer']}},
            paradise:{jeepney:{base:15,range:'₱13–18',time:'15–25 min',steps:['Minuyan → Jeepney → Paradise']},tricycle:{base:35,range:'₱30–45',time:'12–20 min',steps:['Tricycle to Paradise']},multicab:{base:18,range:'₱15–22',time:'12–18 min',steps:['Multicab to Paradise']}},
            san_manuel:{jeepney:{base:20,range:'₱15–25',time:'20–35 min',steps:['Minuyan → Jeepney → San Manuel']},tricycle:{base:45,range:'₱40–55',time:'18–28 min',steps:['Tricycle to San Manuel']},multicab:{base:25,range:'₱22–30',time:'15–22 min',steps:['Multicab to San Manuel']}},
            towerville:{jeepney:{base:22,range:'₱18–28',time:'25–40 min',steps:['Minuyan → Jeepney → Towerville']},tricycle:{base:50,range:'₱45–60',time:'20–30 min',steps:['Tricycle to Towerville']},multicab:{base:28,range:'₱24–35',time:'18–28 min',steps:['Multicab to Towerville']}}
        },
        grotto:{
            tungko:{jeepney:{base:15,range:'₱13–18',time:'15–20 min',steps:['Grotto → Jeepney → Tungko']},tricycle:{base:35,range:'₱30–42',time:'12–18 min',steps:['Tricycle to Tungko']},multicab:{base:18,range:'₱15–22',time:'12–18 min',steps:['Multicab to Tungko']}},
            muzon:{jeepney:{base:15,range:'₱13–18',time:'12–20 min',steps:['Grotto → Jeepney → Muzon']},tricycle:{base:35,range:'₱30–42',time:'10–15 min',steps:['Tricycle to Muzon']},multicab:{base:18,range:'₱15–22',time:'10–18 min',steps:['Multicab to Muzon']}},
            sapang_palay:{jeepney:{base:23,range:'₱18–28',time:'25–40 min',steps:['Grotto → Jeepney → Sapang Palay']},tricycle:{base:65,range:'₱58–75',time:'25–35 min',steps:['Tricycle to Sapang Palay']},multicab:{base:28,range:'₱24–34',time:'22–35 min',steps:['Multicab to Sapang Palay']}},
            minuyan:{jeepney:{base:30,range:'₱25–38',time:'35–50 min',steps:['Grotto → Muzon → Minuyan (transfer)']},tricycle:{base:70,range:'₱60–85',time:'30–45 min',steps:['Tricycle to Minuyan']},multicab:{base:38,range:'₱32–48',time:'28–40 min',steps:['Multicab with transfer']}},
            kaypian:{jeepney:{base:28,range:'₱20–35',time:'30–45 min',steps:['Grotto → Tungko → Kaypian (transfer)']},tricycle:{base:70,range:'₱60–85',time:'28–40 min',steps:['Tricycle — 2 rides likely']},multicab:{base:35,range:'₱30–42',time:'25–38 min',steps:['Multicab with transfer']}},
            paradise:{jeepney:{base:32,range:'₱25–40',time:'40–55 min',steps:['Grotto → Muzon → Paradise (transfer)']},tricycle:{base:75,range:'₱65–90',time:'35–50 min',steps:['Tricycle to Paradise']},multicab:{base:40,range:'₱35–50',time:'32–45 min',steps:['Multicab with transfer']}},
            san_manuel:{jeepney:{base:25,range:'₱20–32',time:'30–45 min',steps:['Grotto → SJDM Bayan → San Manuel (transfer)']},tricycle:{base:55,range:'₱48–68',time:'25–38 min',steps:['Tricycle to San Manuel']},multicab:{base:32,range:'₱28–40',time:'22–32 min',steps:['Multicab with transfer']}},
            santo_cristo:{jeepney:{base:20,range:'₱15–25',time:'25–35 min',steps:['Grotto → Muzon → Santo Cristo (transfer)']},tricycle:{base:45,range:'₱40–55',time:'18–28 min',steps:['Tricycle to Santo Cristo']},multicab:{base:25,range:'₱22–30',time:'15–22 min',steps:['Multicab with transfer']}},
            sjdm_bayan:{jeepney:{base:15,range:'₱13–18',time:'15–20 min',steps:['Grotto → Jeepney → SJDM Bayan']},tricycle:{base:38,range:'₱32–46',time:'13–18 min',steps:['Tricycle to City Hall']},multicab:{base:18,range:'₱15–22',time:'13–18 min',steps:['Multicab to SJDM Bayan']}}
        },
        kaypian:{
            tungko:{jeepney:{base:16,range:'₱13–20',time:'20–30 min',steps:['Kaypian → Jeepney → Tungko']},tricycle:{base:50,range:'₱45–60',time:'18–25 min',steps:['Tricycle to Tungko']},multicab:{base:22,range:'₱18–28',time:'18–25 min',steps:['Multicab to Tungko']}},
            muzon:{jeepney:{base:28,range:'₱20–35',time:'35–50 min',steps:['Kaypian → Tungko → Muzon (transfer)']},tricycle:{base:70,range:'₱60–85',time:'30–45 min',steps:['Tricycle — 2 rides']},multicab:{base:35,range:'₱30–42',time:'30–42 min',steps:['Multicab with transfer']}},
            sapang_palay:{jeepney:{base:32,range:'₱25–40',time:'40–60 min',steps:['Kaypian → SJDM Bayan → Sapang Palay (transfer)']},tricycle:{base:85,range:'₱75–100',time:'40–55 min',steps:['Tricycle — 2 rides needed']},multicab:{base:40,range:'₱35–48',time:'35–50 min',steps:['Multicab with transfer']}},
            minuyan:{jeepney:{base:35,range:'₱28–45',time:'45–60 min',steps:['Kaypian → SJDM Bayan → Minuyan (transfer)']},tricycle:{base:90,range:'₱80–110',time:'40–55 min',steps:['Tricycle — 2 rides needed']},multicab:{base:45,range:'₱38–58',time:'38–52 min',steps:['Multicab with transfer']}},
            grotto:{jeepney:{base:28,range:'₱20–35',time:'25–35 min',steps:['Kaypian → Tungko area → Grotto']},tricycle:{base:65,range:'₱58–75',time:'22–30 min',steps:['Tricycle to Grotto']},multicab:{base:32,range:'₱28–38',time:'20–30 min',steps:['Multicab to Grotto']}},
            paradise:{jeepney:{base:20,range:'₱15–25',time:'25–40 min',steps:['Kaypian → SJDM Bayan → Paradise (transfer)']},tricycle:{base:55,range:'₱48–68',time:'25–38 min',steps:['Tricycle to Paradise']},multicab:{base:28,range:'₱24–35',time:'22–32 min',steps:['Multicab with transfer']}},
            san_manuel:{jeepney:{base:18,range:'₱15–22',time:'20–35 min',steps:['Kaypian → Jeepney → San Manuel']},tricycle:{base:40,range:'₱35–50',time:'18–28 min',steps:['Tricycle to San Manuel']},multicab:{base:22,range:'₱18–28',time:'15–22 min',steps:['Multicab to San Manuel']}},
            sjdm_bayan:{jeepney:{base:16,range:'₱13–20',time:'18–28 min',steps:['Kaypian → Jeepney → SJDM Bayan']},tricycle:{base:45,range:'₱40–55',time:'16–24 min',steps:['Tricycle to City Hall']},multicab:{base:20,range:'₱18–25',time:'15–22 min',steps:['Multicab to SJDM Bayan']}}
        },
        paradise:{
            tungko:{jeepney:{base:38,range:'₱30–48',time:'45–60 min',steps:['Paradise → Minuyan → Tungko (transfer)']},tricycle:{base:95,range:'₱85–115',time:'45–60 min',steps:['Tricycle — long distance']},multicab:{base:48,range:'₱42–58',time:'40–55 min',steps:['Multicab with transfer']}},
            muzon:{jeepney:{base:30,range:'₱25–38',time:'35–50 min',steps:['Paradise → Minuyan → Muzon (transfer)']},tricycle:{base:65,range:'₱58–78',time:'30–45 min',steps:['Tricycle to Muzon']},multicab:{base:35,range:'₱30–45',time:'28–40 min',steps:['Multicab with transfer']}},
            sapang_palay:{jeepney:{base:20,range:'₱15–25',time:'20–35 min',steps:['Paradise → Jeepney → Sapang Palay']},tricycle:{base:50,range:'₱45–60',time:'20–30 min',steps:['Tricycle to Sapang Palay']},multicab:{base:25,range:'₱22–30',time:'18–28 min',steps:['Multicab to Sapang Palay']}},
            minuyan:{jeepney:{base:15,range:'₱13–18',time:'15–25 min',steps:['Paradise → Jeepney → Minuyan']},tricycle:{base:35,range:'₱30–45',time:'12–20 min',steps:['Tricycle to Minuyan']},multicab:{base:18,range:'₱15–22',time:'12–18 min',steps:['Multicab to Minuyan']}},
            grotto:{jeepney:{base:32,range:'₱25–40',time:'40–55 min',steps:['Paradise → Muzon → Grotto (transfer)']},tricycle:{base:75,range:'₱65–90',time:'35–50 min',steps:['Tricycle to Grotto']},multicab:{base:40,range:'₱35–50',time:'32–45 min',steps:['Multicab with transfer']}},
            kaypian:{jeepney:{base:20,range:'₱15–25',time:'25–40 min',steps:['Paradise → SJDM Bayan → Kaypian (transfer)']},tricycle:{base:55,range:'₱48–68',time:'25–38 min',steps:['Tricycle to Kaypian']},multicab:{base:28,range:'₱24–35',time:'22–32 min',steps:['Multicab with transfer']}},
            san_manuel:{jeepney:{base:18,range:'₱15–22',time:'20–35 min',steps:['Paradise → Jeepney → San Manuel']},tricycle:{base:40,range:'₱35–50',time:'18–28 min',steps:['Tricycle to San Manuel']},multicab:{base:22,range:'₱18–28',time:'15–22 min',steps:['Multicab to San Manuel']}}
        },
        san_manuel:{
            tungko:{jeepney:{base:30,range:'₱25–38',time:'35–50 min',steps:['San Manuel → Muzon → Tungko (transfer)']},tricycle:{base:70,range:'₱60–85',time:'30–45 min',steps:['Tricycle to Tungko']},multicab:{base:38,range:'₱32–48',time:'28–40 min',steps:['Multicab with transfer']}},
            muzon:{jeepney:{base:22,range:'₱18–28',time:'25–40 min',steps:['San Manuel → Jeepney → Muzon']},tricycle:{base:50,range:'₱45–60',time:'20–30 min',steps:['Tricycle to Muzon']},multicab:{base:28,range:'₱24–35',time:'18–28 min',steps:['Multicab to Muzon']}},
            sapang_palay:{jeepney:{base:28,range:'₱22–35',time:'30–45 min',steps:['San Manuel → SJDM Bayan → Sapang Palay (transfer)']},tricycle:{base:70,range:'₱60–85',time:'28–40 min',steps:['Tricycle to Sapang Palay']},multicab:{base:35,range:'₱30–45',time:'25–38 min',steps:['Multicab with transfer']}},
            minuyan:{jeepney:{base:20,range:'₱15–25',time:'20–35 min',steps:['San Manuel → Jeepney → Minuyan']},tricycle:{base:45,range:'₱40–55',time:'18–28 min',steps:['Tricycle to Minuyan']},multicab:{base:25,range:'₱22–30',time:'15–22 min',steps:['Multicab to Minuyan']}},
            grotto:{jeepney:{base:25,range:'₱20–32',time:'30–45 min',steps:['San Manuel → SJDM Bayan → Grotto (transfer)']},tricycle:{base:55,range:'₱48–68',time:'25–38 min',steps:['Tricycle to Grotto']},multicab:{base:32,range:'₱28–40',time:'22–32 min',steps:['Multicab with transfer']}},
            kaypian:{jeepney:{base:18,range:'₱15–22',time:'20–35 min',steps:['San Manuel → Jeepney → Kaypian']},tricycle:{base:40,range:'₱35–50',time:'18–28 min',steps:['Tricycle to Kaypian']},multicab:{base:22,range:'₱18–28',time:'15–22 min',steps:['Multicab to Kaypian']}},
            paradise:{jeepney:{base:18,range:'₱15–22',time:'20–35 min',steps:['San Manuel → Jeepney → Paradise']},tricycle:{base:40,range:'₱35–50',time:'18–28 min',steps:['Tricycle to Paradise']},multicab:{base:22,range:'₱18–28',time:'15–22 min',steps:['Multicab to Paradise']}},
            santo_cristo:{jeepney:{base:15,range:'₱13–18',time:'15–25 min',steps:['San Manuel → Jeepney → Santo Cristo']},tricycle:{base:35,range:'₱30–45',time:'12–20 min',steps:['Tricycle to Santo Cristo']},multicab:{base:18,range:'₱15–22',time:'12–18 min',steps:['Multicab to Santo Cristo']}},
            towerville:{jeepney:{base:18,range:'₱15–22',time:'20–35 min',steps:['San Manuel → Jeepney → Towerville']},tricycle:{base:40,range:'₱35–50',time:'18–28 min',steps:['Tricycle to Towerville']},multicab:{base:22,range:'₱18–28',time:'15–22 min',steps:['Multicab to Towerville']}}
        },
        santo_cristo:{
            muzon:{jeepney:{base:18,range:'₱15–22',time:'18–30 min',steps:['Santo Cristo → Jeepney → Muzon']},tricycle:{base:40,range:'₱35–50',time:'15–22 min',steps:['Tricycle to Muzon']},multicab:{base:22,range:'₱18–28',time:'15–22 min',steps:['Multicab to Muzon']}},
            grotto:{jeepney:{base:20,range:'₱15–25',time:'25–35 min',steps:['Santo Cristo → Muzon → Grotto (transfer)']},tricycle:{base:45,range:'₱40–55',time:'18–28 min',steps:['Tricycle to Grotto']},multicab:{base:25,range:'₱22–30',time:'15–22 min',steps:['Multicab with transfer']}},
            san_manuel:{jeepney:{base:15,range:'₱13–18',time:'15–25 min',steps:['Santo Cristo → Jeepney → San Manuel']},tricycle:{base:35,range:'₱30–45',time:'12–20 min',steps:['Tricycle to San Manuel']},multicab:{base:18,range:'₱15–22',time:'12–18 min',steps:['Multicab to San Manuel']}}
        },
        santo_nino:{
            sapang_palay:{jeepney:{base:15,range:'₱13–18',time:'15–25 min',steps:['Santo Niño → Jeepney → Sapang Palay']},tricycle:{base:35,range:'₱30–45',time:'12–20 min',steps:['Tricycle to Sapang Palay']},multicab:{base:18,range:'₱15–22',time:'12–18 min',steps:['Multicab to Sapang Palay']}}
        },
        towerville:{
            minuyan:{jeepney:{base:22,range:'₱18–28',time:'25–40 min',steps:['Towerville → Jeepney → Minuyan']},tricycle:{base:50,range:'₱45–60',time:'20–30 min',steps:['Tricycle to Minuyan']},multicab:{base:28,range:'₱24–35',time:'18–28 min',steps:['Multicab to Minuyan']}},
            sapang_palay:{jeepney:{base:25,range:'₱20–32',time:'30–45 min',steps:['Towerville → Minuyan → Sapang Palay (transfer)']},tricycle:{base:55,range:'₱48–68',time:'25–38 min',steps:['Tricycle to Sapang Palay']},multicab:{base:32,range:'₱28–40',time:'22–32 min',steps:['Multicab with transfer']}},
            san_manuel:{jeepney:{base:18,range:'₱15–22',time:'20–35 min',steps:['Towerville → Jeepney → San Manuel']},tricycle:{base:40,range:'₱35–50',time:'18–28 min',steps:['Tricycle to San Manuel']},multicab:{base:22,range:'₱18–28',time:'15–22 min',steps:['Multicab to San Manuel']}}
        },
        tungkong_mangga:{
            tungko:{jeepney:{base:18,range:'₱15–22',time:'20–30 min',steps:['Tungkong Mangga → Jeepney → Tungko']},tricycle:{base:45,range:'₱40–55',time:'18–25 min',steps:['Tricycle to Tungko']},multicab:{base:22,range:'₱18–28',time:'15–22 min',steps:['Multicab to Tungko']}}
        },
        sjdm_bayan:{
            tungko:{jeepney:{base:16,range:'₱13–20',time:'15–25 min',steps:['SJDM Bayan → Jeepney → Tungko']},tricycle:{base:45,range:'₱40–55',time:'15–22 min',steps:['Tricycle to Tungko']},multicab:{base:20,range:'₱18–25',time:'14–22 min',steps:['Multicab to Tungko']}},
            muzon:{jeepney:{base:16,range:'₱13–20',time:'15–25 min',steps:['SJDM Bayan → Jeepney → Muzon']},tricycle:{base:42,range:'₱38–50',time:'15–22 min',steps:['Tricycle to Muzon']},multicab:{base:20,range:'₱18–25',time:'13–20 min',steps:['Multicab to Muzon']}},
            sapang_palay:{jeepney:{base:23,range:'₱18–28',time:'25–40 min',steps:['SJDM Bayan → Jeepney → Sapang Palay']},tricycle:{base:65,range:'₱58–75',time:'25–35 min',steps:['Tricycle to Sapang Palay']},multicab:{base:28,range:'₱24–34',time:'22–35 min',steps:['Multicab to Sapang Palay']}},
            grotto:{jeepney:{base:15,range:'₱13–18',time:'15–20 min',steps:['SJDM Bayan → Jeepney → Grotto']},tricycle:{base:38,range:'₱32–46',time:'13–18 min',steps:['Tricycle to Grotto']},multicab:{base:18,range:'₱15–22',time:'13–18 min',steps:['Multicab to Grotto']}},
            kaypian:{jeepney:{base:16,range:'₱13–20',time:'18–28 min',steps:['SJDM Bayan → Jeepney → Kaypian']},tricycle:{base:45,range:'₱40–55',time:'16–24 min',steps:['Tricycle to Kaypian']},multicab:{base:20,range:'₱18–25',time:'15–22 min',steps:['Multicab to Kaypian']}}
        }
    };
    /* Expose fareMatrix globally so subscription.js can read it */
    window.fareData = fareMatrix;

    /* ─── RENDER ROUTES ─── */
    function renderRoutes(){
        const g=document.getElementById('routesGrid');
        
        // Location name mapping for Google Maps
        const locationNames = {
            'Tungko': 'Tungko Terminal',
            'Muzon': 'Muzon Junction',
            'Sapang Palay': 'Sapang Palay',
            'Grotto': 'Grotto',
            'Kaypian': 'Kaypian',
            'SJDM Bayan': 'SJDM Bayan City Hall'
        };
        
        routes.forEach(r=>{
            const card=document.createElement('div');
            card.className='route-card fade-in';
            const parts=r.name.split('\u2192').map(s=>s.trim());
            const originName = locationNames[parts[0]] || parts[0];
            const destName = locationNames[parts[parts.length-1]] || parts[parts.length-1];
            const mOrigin=encodeURIComponent(originName+', San Jose del Monte, Bulacan, Philippines');
            const mDest=encodeURIComponent(destName+', San Jose del Monte, Bulacan, Philippines');
            const mUrl='https://www.google.com/maps/dir/?api=1&origin='+mOrigin+'&destination='+mDest+'&travelmode=transit';
            const mapsBtn='<a href="'+mUrl+'" target="_blank" rel="noopener" class="maps-btn"><svg width="20" height="20" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24 4C15.163 4 8 11.163 8 20c0 13 16 24 16 24s16-11 16-24c0-8.837-7.163-16-16-16z" fill="#EA4335"/><circle cx="24" cy="20" r="6" fill="#fff"/></svg>Open in Google Maps</a>';
            card.innerHTML='<div class="route-hd"><h3>'+r.name+'</h3><div class="route-icons">'+r.icons.map(ic=>'<i class="fi fi-bs-'+ic+'"></i>').join('')+'</div></div><div class="step-list">'+r.steps.map(s=>'<div class="step-row"><div class="step-dot"></div><p>'+s+'</p></div>').join('')+'</div><div class="route-meta"><div class="meta-item"><span>Est. Fare</span><strong>'+r.info.fare+'</strong></div><div class="meta-item"><span>Total Time</span><strong>'+r.info.time+'</strong></div><div class="meta-item"><span>Distance</span><strong>'+r.info.distance+'</strong></div></div><div class="route-tip">&#128161; '+r.tip+'</div>'+mapsBtn;
            g.appendChild(card);
        });
        document.getElementById('trackerRoute').innerHTML='<option value="">— Choose a route to start tracking —</option>'+routes.map((r,i)=>'<option value="'+i+'">'+r.name+'</option>').join('');
    }

    /* ─── SCROLL UTIL ─── */
    function scrollTo(id){const el=document.getElementById(id);if(el)el.scrollIntoView({behavior:'smooth'});}

    /* ─── HERO PILLS ─── */
    document.querySelectorAll('.hero-pill').forEach(p=>p.addEventListener('click',()=>{
        const map={'🗺️ Popular Routes':'routes','🗓️ Planner':'planner','💰 Fare Calc':'calculator','🌤 Weather':'weather'};
        Object.entries(map).forEach(([k,v])=>{if(p.textContent.trim()===k)scrollTo(v);});
    }));

    /* ─── HERO SEARCH ─── */
    document.getElementById('searchBtn').addEventListener('click',()=>{
        const q=document.getElementById('routeSearch').value.toLowerCase();
        const keywords={cubao:'routes',monumento:'routes','sm north':'routes',mrt:'routes',fairview:'routes',fare:'calculator',weather:'weather',emergency:'emergency',checklist:'checklist',tracker:'tracker',terminal:'terminals',planner:'planner'};
        for(const[k,v] of Object.entries(keywords)){if(q.includes(k)){scrollTo(v);return;}}
        scrollTo('routes');
    });
    document.getElementById('routeSearch').addEventListener('keydown',e=>{if(e.key==='Enter')document.getElementById('searchBtn').click();});

    /* ─── CLOCK ─── */
    function updateClock(){
        const now=new Date();
        const ph=new Date(now.toLocaleString('en-US',{timeZone:'Asia/Manila'}));
        const hh=String(ph.getHours()).padStart(2,'0'),mm=String(ph.getMinutes()).padStart(2,'0'),ss=String(ph.getSeconds()).padStart(2,'0');
        document.getElementById('liveClock').textContent=`${hh}:${mm}:${ss}`;
        const days=['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
        const months=['January','February','March','April','May','June','July','August','September','October','November','December'];
        document.getElementById('clockDate').textContent=`${days[ph.getDay()]}, ${months[ph.getMonth()]} ${ph.getDate()}, ${ph.getFullYear()}`;
        const hr=ph.getHours()+ph.getMinutes()/60;
        const dot=document.getElementById('rushDot'),title=document.getElementById('rushTitle'),desc=document.getElementById('rushDesc');
        if((hr>=6&&hr<9)||(hr>=17&&hr<20)){dot.className='rush-dot red';title.textContent='🔴 Rush Hour — Heavy Traffic';desc.textContent='Expect 30–60 min delays. Leave early or wait it out.';}
        else if((hr>=9&&hr<12)||(hr>=14&&hr<17)){dot.className='rush-dot yellow';title.textContent='🟡 Moderate Traffic';desc.textContent='Manageable traffic. Good time to commute if needed.';}
        else if(hr>=20||hr<5){dot.className='rush-dot green';title.textContent='🟢 Light Traffic — Great Time to Travel';desc.textContent='Roads are clear. Fastest commute times of the day.';}
        else{dot.className='rush-dot green';title.textContent='🟢 Light Traffic';desc.textContent='Roads are clear now. Consider leaving within the hour.';}
        updateRushAlert(hr);
    }
    setInterval(updateClock,1000);updateClock();

    /* ─── WEATHER (simulated based on Philippine climate) ─── */
    function simulateWeather(){
        const now=new Date();
        const month=new Date(now.toLocaleString('en-US',{timeZone:'Asia/Manila'})).getMonth();
        const hour=new Date(now.toLocaleString('en-US',{timeZone:'Asia/Manila'})).getHours();
        const rainyMonths=[5,6,7,8,9,10];
        const isRainy=rainyMonths.includes(month);
        const tempBase=isRainy?29:33;
        const temp=tempBase+Math.round((Math.random()-0.5)*3);
        const humid=isRainy?85:65+Math.round(Math.random()*15);
        const wind=isRainy?22+Math.round(Math.random()*18):8+Math.round(Math.random()*12);
        const feels=temp+Math.round(humid/20-2);
        const vis=isRainy?4+Math.round(Math.random()*4):8+Math.round(Math.random()*4);
        const conditions=isRainy?['🌧️ Light Rain','⛈️ Thunderstorm','🌦️ Scattered Showers','🌩️ Heavy Rain']:['☀️ Sunny & Hot','🌤️ Partly Cloudy','😎 Clear Skies','☁️ Overcast'];
        const desc=conditions[Math.floor(Math.random()*conditions.length)];
        const emoji=desc.split(' ')[0];
        document.getElementById('weatherEmoji').textContent=emoji;
        document.getElementById('weatherTemp').textContent=`${temp}°C`;
        document.getElementById('weatherDesc').textContent=desc.substring(emoji.length+1);
        document.getElementById('weatherHumid').textContent=`${humid}%`;
        document.getElementById('weatherWind').textContent=`${wind} km/h`;
        document.getElementById('weatherFeels').textContent=`${feels}°C`;
        document.getElementById('weatherVis').textContent=`${vis} km`;
        const badge=document.getElementById('weatherBadge1');
        const impact=document.getElementById('weatherImpactText');
        if(isRainy&&(desc.includes('Heavy')||desc.includes('Thunder'))){badge.className='weather-badge bad';badge.textContent='Caution: Rain';impact.textContent='Heavy rain expected. Roads near Tungko creek may flood. Bring umbrella and allot extra 30–45 mins. Consider postponing if possible.';}
        else if(isRainy){badge.className='weather-badge warn';badge.textContent='Light Rain';impact.textContent='Scattered showers possible. Bring an umbrella and expect minor slowdowns on SJDM local roads.';}
        else{badge.className='weather-badge ok';badge.textContent='Good to Travel';impact.textContent='Clear conditions. Good day for commuting within SJDM. Local routes running normally.';}
    }
    simulateWeather();

    /* ─── RUSH ALERT DYNAMIC ─── */
    function updateRushAlert(hr){
        const el=document.getElementById('alertRush');
        if(!el)return;
        if((hr>=6&&hr<9)){el.textContent='⚠️ AM Rush Hour is ACTIVE now. Leave within 20 mins or wait until 9 AM for lighter traffic.';}
        else if((hr>=17&&hr<20)){el.textContent='⚠️ PM Rush Hour is ACTIVE now. If possible, delay departure until after 8 PM.';}
        else if(hr>=20||hr<5){el.textContent='✅ Light traffic period. Best time to commute. Roads are clear.';}
        else{el.textContent='🟡 Moderate traffic conditions. Acceptable commute times expected on main routes.';}
        const tips=['Tip: Board at the starting terminal for a guaranteed seat.','Tip: Tricycles are best for last-mile into subdivisions.','Tip: Screenshot route info — no WiFi needed on the go!','Tip: SJDM roads can flood near Tungko creek during rain — take alternate routes.','Tip: Keep SJDM Police number saved: 0916-432-0401','Tip: Wear light clothes — jeepney ventilation varies!'];
        document.getElementById('alertTip').textContent=tips[new Date().getDay()%tips.length];
    }

    /* ─── PLANNER ─── */
    const plannerRouteMap={
        'tungko_muzon':plannerData.tungko_muzon,'tungko_sapang_palay':plannerData.tungko_sapang_palay,'tungko_grotto':plannerData.tungko_grotto,'tungko_kaypian':plannerData.tungko_kaypian,'tungko_sjdm_bayan':plannerData.tungko_sjdm_bayan,
        'muzon_tungko':plannerData.muzon_tungko,'muzon_sapang_palay':plannerData.muzon_sapang_palay,'muzon_grotto':plannerData.muzon_grotto,'muzon_kaypian':plannerData.muzon_kaypian,'muzon_sjdm_bayan':plannerData.muzon_sjdm_bayan,
        'sapang_palay_tungko':plannerData.sapang_palay_tungko,'sapang_palay_muzon':plannerData.sapang_palay_muzon,'sapang_palay_grotto':plannerData.sapang_palay_grotto,'sapang_palay_kaypian':plannerData.sapang_palay_kaypian,'sapang_palay_sjdm_bayan':plannerData.sapang_palay_sjdm_bayan,
        'grotto_tungko':plannerData.grotto_tungko,'grotto_muzon':plannerData.grotto_muzon,'grotto_sapang_palay':plannerData.grotto_sapang_palay,'grotto_kaypian':plannerData.grotto_kaypian,'grotto_sjdm_bayan':plannerData.grotto_sjdm_bayan,
        'kaypian_tungko':plannerData.kaypian_tungko,'kaypian_muzon':plannerData.kaypian_muzon,'kaypian_sapang_palay':plannerData.kaypian_sapang_palay,'kaypian_grotto':plannerData.kaypian_grotto,'kaypian_sjdm_bayan':plannerData.kaypian_sjdm_bayan,
        'sjdm_bayan_tungko':plannerData.sjdm_bayan_tungko,'sjdm_bayan_muzon':plannerData.sjdm_bayan_muzon,'sjdm_bayan_sapang_palay':plannerData.sjdm_bayan_sapang_palay,'sjdm_bayan_grotto':plannerData.sjdm_bayan_grotto,'sjdm_bayan_kaypian':plannerData.sjdm_bayan_kaypian,
    };
    document.getElementById('planBtn').addEventListener('click',()=>{
        const from=document.getElementById('planFrom').value,to=document.getElementById('planTo').value,time=document.getElementById('planTime').value,mode=document.getElementById('planMode').value;
        if(!from||!to){alert('Please select both origin and destination.');return;}
        if(from===to){document.getElementById('plannerResult').innerHTML='<div class="plan-ph"><span>😅</span><p>Origin and destination are the same!</p></div>';return;}
        const key=`${from}_${to}`;const plan=plannerRouteMap[key];
        const depTime=time||'07:00';
        const [dh,dm]=depTime.split(':').map(Number);
        /* Build Google Maps URL */
        const fromName=document.getElementById('planFrom').options[document.getElementById('planFrom').selectedIndex].text;
        const toName=document.getElementById('planTo').options[document.getElementById('planTo').selectedIndex].text;
        const mapsOrigin=encodeURIComponent(fromName+', San Jose del Monte, Bulacan, Philippines');
        const mapsDest=encodeURIComponent(toName+', San Jose del Monte, Bulacan, Philippines');
        const mapsUrl=`https://www.google.com/maps/dir/?api=1&origin=${mapsOrigin}&destination=${mapsDest}&travelmode=transit`;
        const mapsBtnHtml=`<a href="${mapsUrl}" target="_blank" rel="noopener" class="maps-btn"><svg width="20" height="20" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24 4C15.163 4 8 11.163 8 20c0 13 16 24 16 24s16-11 16-24c0-8.837-7.163-16-16-16z" fill="#EA4335"/><circle cx="24" cy="20" r="6" fill="#fff"/></svg>Open in Google Maps</a>`;
        let html='<div class="plan-output"><div class="plan-header"><h3>Your Commute Schedule</h3><p>Departing at '+depTime+' · '+((plan&&plan.dest)||to.replace(/_/g,' '))+' · '+((mode==='tricycle')?'🛺 Tricycle':(mode==='multicab')?'🚐 Multicab':'🚎 Jeepney')+'</p></div><div class="plan-timeline">';
        if(plan&&plan.steps){
            plan.steps.forEach(s=>{
                const stepDate=new Date(2000,0,1,dh,dm+s.t);
                const sh=String(stepDate.getHours()).padStart(2,'0'),smin=String(stepDate.getMinutes()).padStart(2,'0');
                const typeChip=s.type==='bus'?'bus':s.type==='uv'?'uv':s.type==='walk'?'walk':'jeep';
                const typeLabel=s.type==='bus'?'Bus':s.type==='uv'?'UV Express':s.type==='walk'?'Walk':'Jeepney';
                html+=`<div class="plan-step"><div class="plan-step-time">${sh}:${smin}</div><div class="plan-step-body"><h4>${s.action}<span class="plan-chip ${typeChip}">${typeLabel}</span></h4><p>${s.detail}</p></div></div>`;
            });
            const arrDate=new Date(2000,0,1,dh,dm+(plan.steps[plan.steps.length-1].t)+5);
            const arrH=String(arrDate.getHours()).padStart(2,'0'),arrMin=String(arrDate.getMinutes()).padStart(2,'0');
            html+=`</div><div class="plan-summary"><div class="plan-sum-item"><span>Est. Fare</span><strong>${plan.fare}</strong></div><div class="plan-sum-item"><span>Total Time</span><strong>${plan.total}</strong></div><div class="plan-sum-item"><span>Est. Arrival</span><strong>~${arrH}:${arrMin}</strong></div></div>${mapsBtnHtml}</div>`;
        }else{
            html+=`<div class="plan-step"><div class="plan-step-time">${depTime}</div><div class="plan-step-body"><h4>Depart from ${fromName}<span class="plan-chip bus">Bus</span></h4><p>Head to your nearest terminal and board transport to ${toName}</p></div></div></div><div class="plan-summary"><div class="plan-sum-item"><span>Transport</span><strong>Ask terminal staff</strong></div><div class="plan-sum-item"><span>Tip</span><strong>Leave early!</strong></div></div>${mapsBtnHtml}</div>`;
        }
        document.getElementById('plannerResult').innerHTML=html;
    });

    document.getElementById('swapBtn').addEventListener('click', () => {
        const f = document.getElementById('calcFrom'), t = document.getElementById('calcTo');
        const tmp = f.value; f.value = t.value; t.value = tmp;
    });

    /* ─── FARE CALCULATOR — runFareCalc() ─── */
    /* Called by SubscriptionManager.patchFareCalculator() AFTER access is confirmed.
       The #calcBtn click is intercepted by the subscription gate — this function
       contains only the pure calculation logic. */
    let pax = 1;
    document.getElementById('paxPlus').addEventListener('click', () => { if (pax < 10) { pax++; document.getElementById('paxCount').textContent = pax; } });
    document.getElementById('paxMinus').addEventListener('click', () => { if (pax > 1) { pax--; document.getElementById('paxCount').textContent = pax; } });

    /* ─── SMART FARE ESTIMATOR ─── 
       Assigns every location a zone + nearest hub so we can estimate
       fare for ANY origin→destination pair, even without exact matrix data. */
    const LOCATION_ZONE = {
        // Zone 1 — Major hubs (base fare ₱13)
        tungko: 1, muzon: 1, sjdm_bayan: 1, grotto: 1,
        // Zone 2 — Near hubs (₱15–20)
        kaypian: 2, sapang_palay: 2, tungkong_mangga: 2, muzon_east: 2, muzon_west: 2,
        bagong_buhay: 2, bagong_buhay_homes: 2, starmall_sjdm: 2, sm_city_sjdm: 2,
        poblacion: 2, santo_cristo: 2, citrus: 2, dulong_bayan: 2,
        // Zone 3 — Mid-distance (₱18–28)
        paradise: 3, minuyan: 3, san_manuel: 3, santo_nino: 3, sapang_palay_proper: 3,
        fatima: 3, graceville: 3, gaya_gaya: 3, maharlika: 3, san_isidro: 3,
        san_martin: 3, san_pedro: 3, san_rafael: 3, kaybanban: 3, kaytitinga: 3,
        ciudad_real: 3, colinas_verdes: 3, camella_sjdm: 3, lessandra_sjdm: 3,
        deca_homes: 3, greenfields: 3, residencia_de_muzon: 3, villa_antonio: 3,
        francisco_homes_guijo: 3, francisco_homes_mulawin: 3,
        francisco_homes_narra: 3, francisco_homes_yakal: 3,
        // Zone 4 — Far / upland (₱25–40)
        gumaoc_east: 4, gumaoc_central: 4, gumaoc_west: 4, san_jose_heights: 4,
        katarungan_village: 4, garden_villas: 4, carissa_homes: 4, bellevue: 4,
        metrogate_sjdm: 4, pleasant_hill: 4, the_gardens_sjdm: 4, lancaster_new_city: 4,
        // Zone 5 — Remote / destinations (₱35–55)
        amana_waterpark: 5, grotto_lourdes: 5, mt_balagbag: 5, kaytitinga_falls: 5,
        // Fallback for anything unlisted
        default: 3
    };

    const NEAREST_HUB = {
        tungko: 'Tungko Terminal', muzon: 'Muzon Junction', sjdm_bayan: 'SJDM Bayan (City Hall)',
        grotto: 'Grotto', kaypian: 'Kaypian Terminal', sapang_palay: 'Sapang Palay Terminal',
        paradise: 'Muzon → Paradise', minuyan: 'Muzon → Minuyan',
        san_manuel: 'Kaypian → San Manuel', gaya_gaya: 'Sapang Palay → Gaya-Gaya',
        default: 'pinakamalapit na terminal'
    };

    function _estimateFare(from, to, mode) {
        // First check exact fareMatrix data
        if (window.fareData && window.fareData[from] && window.fareData[from][to] && window.fareData[from][to][mode]) {
            return { exact: true, ...window.fareData[from][to][mode] };
        }

        // Smart zone-based estimation
        const zoneFrom = LOCATION_ZONE[from] || LOCATION_ZONE.default;
        const zoneTo   = LOCATION_ZONE[to]   || LOCATION_ZONE.default;
        const zoneDiff = Math.abs(zoneFrom - zoneTo);

        // Base fare table per zone difference
        const baseFares = {
            jeepney:  [0, 15, 20, 28, 38, 50],
            tricycle: [0, 35, 50, 65, 85, 110],
            multicab: [0, 20, 28, 38, 50, 70]
        };
        const timeTable  = ['—', '10–20 min', '18–30 min', '28–45 min', '40–60 min', '55–80 min'];
        const idx = Math.min(Math.max(zoneDiff === 0 ? 1 : zoneDiff, 1), 5);

        const base = baseFares[mode][idx];
        const lo   = Math.round(base * 0.85 / 5) * 5;
        const hi   = Math.round(base * 1.25 / 5) * 5;

        // Build a plausible route description
        const hubFrom = NEAREST_HUB[from] || NEAREST_HUB.default;
        const toLabel = to.replace(/_/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
        const steps = zoneDiff <= 1
            ? [`Sakay ng ${mode === 'tricycle' ? 'tricycle' : 'jeepney/multicab'} papuntang ${toLabel}`]
            : [`Pumunta sa ${hubFrom}`, `Sumakay papuntang ${toLabel}`];

        return {
            exact: false,
            base,
            range: `₱${lo}–${hi}`,
            time: timeTable[idx],
            steps
        };
    }

    function runFareCalc() {
        const from = document.getElementById('calcFrom').value;
        const to   = document.getElementById('calcTo').value;
        const mode = document.getElementById('calcMode').value;
        const trip = parseInt(document.getElementById('calcTrip').value) || 1;
        const result = document.getElementById('calcResult');

        if (!from || !to) {
            result.innerHTML = '<div class="calc-placeholder"><span>⚠️</span><p>Piliin ang origin at destination.</p></div>';
            return;
        }
        if (from === to) {
            result.innerHTML = '<div class="calc-placeholder"><span>😅</span><p>Pareho ang origin at destination!</p></div>';
            return;
        }

        /* Track usage in subscription system */
        if (typeof SubscriptionManager !== 'undefined') {
            SubscriptionManager.trackCalculation();
        }

        const fareInfo  = _estimateFare(from, to, mode);
        const modeLabel = mode === 'jeepney' ? '🚎 Jeepney' : mode === 'tricycle' ? '🛺 Tricycle' : '🚐 Multicab';
        const tripLabel = trip > 1 ? 'Round Trip' : 'One-way';
        const fromLabel = document.getElementById('calcFrom').options[document.getElementById('calcFrom').selectedIndex].text;
        const toLabel   = document.getElementById('calcTo').options[document.getElementById('calcTo').selectedIndex].text;

        /* Subscription plan info for the CTA strip */
        let ctaHtml = '';
        if (typeof SubscriptionManager !== 'undefined') {
            const st = SubscriptionManager.getState();
            if (st.status === 'active' || st.status === 'trial') {
                const label = st.status === 'trial'
                    ? `🎁 Free Trial — ${Math.max(0, Math.ceil((new Date(st.endDate) - new Date()) / 86400000))} araw na natitira`
                    : `✅ ${st.plan ? (st.plan.charAt(0).toUpperCase() + st.plan.slice(1)) : 'Premium'} Plan — aktibo`;
                ctaHtml = `<div style="margin-top:14px;background:rgba(27,67,50,0.06);border-radius:12px;padding:12px 16px;display:flex;align-items:center;justify-content:space-between;gap:12px;font-size:13px;flex-wrap:wrap;">
                    <span>${label}</span>
                    <a href="subscription/subscription.php" style="color:var(--green);font-weight:700;text-decoration:none;">Pamahalaan ang Plano →</a>
                </div>`;
            }
        }

        const totalFare = fareInfo.base * pax * trip;
        const stepsHtml = fareInfo.steps && fareInfo.steps.length
            ? `<div class="result-row"><span class="result-row-lbl">Route</span><span class="result-row-val" style="font-size:12px">📍 ${fareInfo.steps.join(' → ')}</span></div>`
            : '';
        const estimateNote = !fareInfo.exact
            ? `<div style="font-size:11.5px;color:var(--muted);margin-top:8px;padding:8px 12px;background:rgba(244,196,48,0.08);border-radius:8px;border-left:3px solid var(--gold);">
                ⚠️ <em>Estimated fare — exact data para sa route na ito ay hindi pa available. Ang aktwal na bayad ay depende sa driver.</em>
               </div>`
            : '';

        const html = `<div class="result-output">
            <div class="result-route-lbl">
                <span>${modeLabel}</span>
                <span style="font-size:12px;color:var(--muted);font-weight:500;">${tripLabel}</span>
            </div>
            <div style="font-size:12px;color:var(--muted);margin-bottom:12px;">
                📍 ${fromLabel} → ${toLabel}
            </div>
            <div class="result-rows">
                <div class="result-row"><span class="result-row-lbl">Base Fare × ${pax} pax${trip > 1 ? ' × 2 (round trip)' : ''}</span><span class="result-row-val">₱${totalFare}</span></div>
                <div class="result-row"><span class="result-row-lbl">Fare Range (per person, one-way)</span><span class="result-row-val">${fareInfo.range}</span></div>
                <div class="result-row"><span class="result-row-lbl">Estimated Travel Time</span><span class="result-row-val">⏱ ${fareInfo.time}</span></div>
                ${stepsHtml}
            </div>
            <div class="result-total">
                <span class="result-total-lbl">Estimated Total</span>
                <span class="result-total-val">₱${totalFare}</span>
            </div>
            ${estimateNote}
            ${ctaHtml}
        </div>`;
        result.innerHTML = html;
    }

    /* ─── TERMINAL GUIDE ─── */
    function renderTerminal(key){
        const t=terminals[key];if(!t)return;
        document.getElementById('termInfoTitle').textContent=t.title;
        document.getElementById('termInfoRows').innerHTML=t.rows.map(r=>`<div class="t-info-row"><div class="t-info-row-lbl">${r.l}</div><div class="t-info-row-val">${r.v}</div></div>`).join('');
        document.getElementById('termInfoTags').innerHTML=t.tags.map(tag=>`<span class="t-conn-tag">${tag}</span>`).join('');
    }
    document.querySelectorAll('.t-node').forEach(n=>{
        n.addEventListener('click',()=>{
            document.querySelectorAll('.t-node').forEach(x=>x.classList.remove('active'));
            n.classList.add('active');
            renderTerminal(n.dataset.terminal);
        });
    });
    renderTerminal('tungko');

    /* ─── CHECKLIST ─── */
    const defaultItems=[{id:1,emoji:'💳',label:'Beep Card or fare money',done:false},{id:2,emoji:'📱',label:'Fully charged phone',done:false},{id:3,emoji:'🔋',label:'Power bank',done:false},{id:4,emoji:'☂️',label:'Umbrella',done:false},{id:5,emoji:'💧',label:'Water bottle',done:false},{id:6,emoji:'😷',label:'Face mask',done:false},{id:7,emoji:'🎧',label:'Earphones',done:false},{id:8,emoji:'📋',label:'ID & important documents',done:false},{id:9,emoji:'💵',label:'Emergency cash (₱200+)',done:false},{id:10,emoji:'🔑',label:'House keys',done:false}];
    function getChecklist(){try{return JSON.parse(localStorage.getItem('biyahero_check'))||defaultItems.map(i=>({...i}));}catch{return defaultItems.map(i=>({...i}));}}
    function saveChecklist(d){try{localStorage.setItem('biyahero_check',JSON.stringify(d));}catch{}}
    function renderChecklist(){
        const d=getChecklist(),list=document.getElementById('checkList'),done=d.filter(i=>i.done).length,total=d.length;
        const pct=total?Math.round(done/total*100):0;
        document.getElementById('progressFill').style.width=pct+'%';
        document.getElementById('progressLbl').textContent=`${done} / ${total}`;
        document.getElementById('checkCongrats').textContent=done===total&&total>0?'🎉 All set! Have a safe trip!':'';
        list.innerHTML='';
        d.forEach(item=>{
            const li=document.createElement('li');li.className='check-item'+(item.done?' done':'');
            li.innerHTML=`<div class="check-box">${item.done?'✓':''}</div><span class="check-emoji">${item.emoji}</span><span class="check-lbl">${item.label}</span><button class="check-del" data-id="${item.id}">✕</button>`;
            li.addEventListener('click',e=>{if(e.target.classList.contains('check-del'))return;const d2=getChecklist();const idx=d2.findIndex(x=>x.id===item.id);if(idx!==-1){d2[idx].done=!d2[idx].done;saveChecklist(d2);renderChecklist();}});
            li.querySelector('.check-del').addEventListener('click',()=>{saveChecklist(getChecklist().filter(x=>x.id!==item.id));renderChecklist();});
            list.appendChild(li);
        });
    }
    document.getElementById('checkReset').addEventListener('click',()=>{saveChecklist(defaultItems.map(i=>({...i,done:false})));renderChecklist();});
    let nextId=200;
    document.getElementById('addItemBtn').addEventListener('click',()=>{
        const inp=document.getElementById('newItemInput'),text=inp.value.trim();if(!text)return;
        const d=getChecklist();d.push({id:nextId++,emoji:'📌',label:text,done:false});
        saveChecklist(d);renderChecklist();inp.value='';
    });
    document.getElementById('newItemInput').addEventListener('keydown',e=>{if(e.key==='Enter')document.getElementById('addItemBtn').click();});
    renderChecklist();

    /* ─── TRACKER ─── */
    let trackerCurrent=0,trackerSteps=[],trackerRouteIdx=-1;
    document.getElementById('trackerRoute').addEventListener('change',function(){
        const idx=this.value;
        if(idx===''){document.getElementById('trackerSteps').innerHTML='<div class="tracker-ph"><span>🗺️</span><p>Select a route above to start tracking.</p></div>';document.getElementById('trackerActions').style.display='none';return;}
        trackerRouteIdx=parseInt(idx);trackerSteps=routes[trackerRouteIdx].steps;trackerCurrent=0;renderTracker();document.getElementById('trackerActions').style.display='flex';
    });
    function renderTracker(){
        const total=trackerSteps.length;
        const r=trackerRouteIdx>=0?routes[trackerRouteIdx]:null;
        /* Maps button */
        let mapsHtml='';
        if(r){
            const parts=r.name.split('\u2192').map(s=>s.trim());
            const mO=encodeURIComponent((parts[0]||r.name)+', San Jose del Monte, Bulacan, Philippines');
            const mD=encodeURIComponent((parts[parts.length-1]||r.name)+', San Jose del Monte, Bulacan, Philippines');
            const mU='https://www.google.com/maps/dir/?api=1&origin='+mO+'&destination='+mD+'&travelmode=transit';
            const summaryHtml='<div class="plan-summary" style="margin-top:20px"><div class="plan-sum-item"><span>Est. Fare</span><strong>'+r.info.fare+'</strong></div><div class="plan-sum-item"><span>Total Time</span><strong>'+r.info.time+'</strong></div><div class="plan-sum-item"><span>Distance</span><strong>'+r.info.distance+'</strong></div></div>';
            mapsHtml=summaryHtml+'<a href="'+mU+'" target="_blank" rel="noopener" class="maps-btn" style="margin-top:12px"><svg width="20" height="20" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24 4C15.163 4 8 11.163 8 20c0 13 16 24 16 24s16-11 16-24c0-8.837-7.163-16-16-16z" fill="#EA4335"/><circle cx="24" cy="20" r="6" fill="#fff"/></svg>Open in Google Maps</a>';
        }
        document.getElementById('trackerSteps').innerHTML='<div class="tracker-timeline">'+trackerSteps.map((s,i)=>{let cls=i===trackerCurrent?'active':i<trackerCurrent?'done':'';const dot=i<trackerCurrent?'&#10003;':i===trackerCurrent?'&#9679;':'';return'<div class="tracker-step '+cls+'"><div class="t-dot">'+dot+'</div><div class="t-body"><div class="t-num">Step '+(i+1)+' of '+total+'</div><div class="t-text">'+s+'</div></div></div>';}).join('')+'</div>'+mapsHtml;
        document.getElementById('trackerCounter').textContent='Step '+(trackerCurrent+1)+' of '+total;
        document.getElementById('trackerPrev').disabled=trackerCurrent===0;
        document.getElementById('trackerNext').textContent=trackerCurrent===total-1?'🎉 Done!':'Next →';
    }
    document.getElementById('trackerPrev').addEventListener('click',()=>{if(trackerCurrent>0){trackerCurrent--;renderTracker();}});
    document.getElementById('trackerNext').addEventListener('click',()=>{if(trackerCurrent<trackerSteps.length-1){trackerCurrent++;renderTracker();}});

    /* ─── FAQ CHATBOT ─── */
    const faqKB=[
        {kw:['tungko','terminal','bus'],ans:'🚏 Ang <strong>Tungko Terminal</strong> ang pangunahing hub ng SJDM. Dito sumasakay ng jeepney papuntang Muzon, Kaypian, Grotto, at SJDM Bayan. Buksan nang 4:00 AM hanggang 10:00 PM.'},
        {kw:['muzon','junction'],ans:'🔁 Ang <strong>Muzon Junction</strong> ay transfer point papuntang Sapang Palay (hilaga) o Tungko (timog). Madaling mahanap — may rotonda.'},
        {kw:['sapang palay','sapang','palay','north'],ans:'🌿 Ang <strong>Sapang Palay</strong> ang pinakamalayo sa hilaga ng SJDM. Jeepney mula Muzon o SJDM Bayan. Travel time: ~20–35 mins mula Muzon.'},
        {kw:['kaypian','silangan','east'],ans:'🏘️ Mula <strong>Kaypian</strong>, jeepney papuntang Tungko o SJDM Bayan. Travel time: ~20–30 mins. Tricycle mula Kaypian para sa residential areas.'},
        {kw:['grotto','landmark'],ans:'⛪ Ang <strong>Grotto</strong> ay isang kilalang landmark sa SJDM. Maraming jeepney ang dumadaan dito. Sabihin sa driver ang "Grotto" bilang babaan mo.'},
        {kw:['sjdm bayan','city hall','bayan','town center'],ans:'🏛️ Ang <strong>SJDM Bayan / City Hall</strong> ang sentro ng lungsod. Transfer point para sa lahat ng direksyon — Tungko, Muzon, Kaypian, at Sapang Palay.'},
        {kw:['fare','bayad','magkano','presyo','cost'],ans:'💰 Guide ng local fares:<br>• Jeepney (lokal): ₱13–₱25<br>• Tricycle: ₱30–₱85 depende sa distansya<br>• Multicab/FX: ₱18–₱40<br>Gamitin ang <strong>Fare Calculator</strong> para sa mas eksaktong estimate!'},
        {kw:['rush','trapik','traffic','peak'],ans:'⏰ Rush hours sa SJDM:<br>🔴 AM: 6:00 – 9:00 AM<br>🔴 PM: 5:00 – 8:00 PM<br>Subukang umalis bago mag-6 AM o pagkatapos ng 9 AM.'},
        {kw:['tricycle','trike','last mile'],ans:'🛺 Tricycle ang pinakamainam para sa huling bahagi ng byahe — papasok ng subdivisions at barangay na hindi narating ng jeepney.'},
        {kw:['weather','ulan','rain','baha','flood'],ans:'🌧️ Tingnan ang <strong>Weather Section</strong> para sa commute impact. Kapag malakas ang ulan, iwasan ang mababang lugar malapit sa Tungko creek.'},
        {kw:['planner','schedule','plan'],ans:'🗓️ Gamitin ang <strong>Commute Planner</strong> section! I-input ang origin at destination sa loob ng SJDM — makakakuha ka ng personalized timeline.'},
        {kw:['terminal','saan','where'],ans:'🏢 Tingnan ang <strong>Terminal Guide</strong> section para sa detalye ng bawat terminal sa SJDM — kasama ang operating hours at connections.'},
        {kw:['emergency','tulong','help','police','fire'],ans:'🚨 Emergency:<br>• 911 (National)<br>• SJDM Police: 0916-432-0401<br>• BFP: 0932-373-2444<br>• CDRRMO: 0932-600-0119'},
    ];
    const quickQs=['Paano pumunta sa Kaypian?','Magkano ang Tungko → Muzon?','Rush hour kelan?','Safety tips?','Fare calculator?'];
    const faqBubble=document.getElementById('faqBubble'),faqPanel=document.getElementById('faqPanel'),faqClose=document.getElementById('faqClose'),faqInput=document.getElementById('faqInput'),faqSend=document.getElementById('faqSend'),faqMessages=document.getElementById('faqMessages'),faqBadge=document.getElementById('faqBadge'),faqQuickBtns=document.getElementById('faqQuickBtns');
    faqQuickBtns.innerHTML=quickQs.map(q=>`<button class="faq-qbtn">${q}</button>`).join('');
    faqQuickBtns.querySelectorAll('.faq-qbtn').forEach(btn=>btn.addEventListener('click',()=>sendFaq(btn.textContent)));
    faqBubble.addEventListener('click',()=>{faqPanel.classList.toggle('open');if(faqPanel.classList.contains('open')){faqBadge.style.display='none';faqInput.focus();}});
    faqClose.addEventListener('click',()=>faqPanel.classList.remove('open'));
    faqSend.addEventListener('click',()=>sendFaq(faqInput.value));
    faqInput.addEventListener('keydown',e=>{if(e.key==='Enter')sendFaq(faqInput.value);});
    function sendFaq(text){
        text=text.trim();if(!text)return;faqInput.value='';
        const um=document.createElement('div');um.className='faq-msg user';um.textContent=text;faqMessages.appendChild(um);
        faqQuickBtns.remove&&faqQuickBtns.parentNode&&faqQuickBtns.remove();
        const lower=text.toLowerCase();let ans=null;
        for(const e of faqKB){if(e.kw.some(k=>lower.includes(k))){ans=e.ans;break;}}
        if(!ans)ans='🤔 Hindi ko pa alam ang sagot na yan. Subukan ang <strong>Routes</strong> o <strong>Commute Planner</strong> section para sa mas detalyadong info!';
        setTimeout(()=>{const bm=document.createElement('div');bm.className='faq-msg bot';bm.innerHTML=`<p>${ans}</p>`;faqMessages.appendChild(bm);faqMessages.scrollTop=faqMessages.scrollHeight;},500);
        faqMessages.scrollTop=faqMessages.scrollHeight;
    }


    /* ─── KUMITA: GIG BOARD ─── */
    const sampleGigs=[
        {title:'Delivery ng grocery mula SM SJDM papuntang Colinas Verdes',type:'delivery',pay:'₱120',poster:'Ana M.',time:'5 mins ago'},
        {title:'Sunduin ang bata sa Kaypian Elementary',type:'transport',pay:'₱200',poster:'Ramon L.',time:'12 mins ago'},
        {title:'Bili ng gamot sa Mercury Drug Tungko',type:'errand',pay:'₱80',poster:'Mely R.',time:'28 mins ago'},
        {title:'Hatid ng documents sa SJDM City Hall',type:'delivery',pay:'₱150',poster:'Jose T.',time:'1 hr ago'},
    ];
    let gigList=[...sampleGigs];
    function renderGigs(){
        const board=document.getElementById('gigBoard');
        if(!board)return;
        board.innerHTML=gigList.map((g,i)=>`
            <div class="gig-item">
                <div class="gig-item-left">
                    <div class="gig-title"><span class="gig-type-tag ${g.type}">${g.type==='delivery'?'📦 Delivery':g.type==='errand'?'🛒 Errand':g.type==='transport'?'🚗 Transport':'🔧 Other'}</span>${g.title}</div>
                    <div class="gig-meta">Posted by <strong style="color:rgba(255,255,255,0.7)">${g.poster}</strong> · ${g.time}</div>
                </div>
                <div style="display:flex;align-items:center;gap:12px;">
                    <div class="gig-pay">${g.pay}</div>
                    <button class="gig-contact-btn" onclick="alert('📱 Makikipag-ugnayan sa poster. (Feature coming soon!)')">Tanggapin</button>
                </div>
            </div>
        `).join('');
    }
    function postGig(){
        const title=document.getElementById('gigTitle').value.trim();
        const type=document.getElementById('gigType').value;
        const pay=document.getElementById('gigPay').value.trim()||'Negotiable';
        if(!title){alert('Ilagay ang paglalarawan ng trabaho!');return;}
        gigList.unshift({title,type,pay:pay.startsWith('₱')?pay:'₱'+pay,poster:'Ikaw',time:'Just now'});
        renderGigs();
        document.getElementById('gigTitle').value='';
        document.getElementById('gigPay').value='';
    }
    renderGigs();

    /* ─── KUMITA: REFERRAL ─── */
    function generateCode(){
        const stored=localStorage.getItem('biyahero_ref_code');
        if(stored)return stored;
        const code='BIYAHERO-'+Math.random().toString(36).toUpperCase().slice(2,6);
        localStorage.setItem('biyahero_ref_code',code);
        return code;
    }
    const refCode=generateCode();
    const refEl=document.getElementById('myReferralCode');
    if(refEl)refEl.textContent=refCode;
    function copyReferral(){
        const code=document.getElementById('myReferralCode').textContent;
        navigator.clipboard.writeText('biyahero.app/join?ref='+code.split('-')[1]).then(()=>{
            const btn=document.querySelector('.copy-btn');
            btn.textContent='✅ Copied!';
            setTimeout(()=>{btn.textContent='📋 Copy';},2000);
        }).catch(()=>{
            const btn=document.querySelector('.copy-btn');
            btn.textContent='✅ Copied!';
            setTimeout(()=>{btn.textContent='📋 Copy';},2000);
        });
    }
    /* Load referral stats from localStorage */
    function loadRefStats(){
        const refs=parseInt(localStorage.getItem('biyahero_ref_count')||'0');
        document.getElementById('refCount').textContent=refs;
        document.getElementById('refEarned').textContent='₱'+(refs*50);
        document.getElementById('refPending').textContent='₱0';
    }
    loadRefStats();

    /* ─── KUMITA: DRIVER APPLICATION ─── */
    function submitDriverApp(){
        const name=document.getElementById('driverName').value.trim();
        const phone=document.getElementById('driverPhone').value.trim();
        const vehicle=document.getElementById('driverVehicle').value;
        if(!name||!phone||!vehicle){alert('Kumpletuhin ang lahat ng fields!');return;}
        document.getElementById('driverFormView').style.display='none';
        document.getElementById('driverSuccessView').style.display='block';
        localStorage.setItem('biyahero_driver_applied','1');
    }
    /* Close modal on backdrop click */
    document.getElementById('driverModal').addEventListener('click',function(e){if(e.target===this)this.classList.remove('open');});

     /* ─── MY PROFILE DROPDOWN ─── */
    (function(){
        var profileLi = document.getElementById('profileNavItem');
        var profileBtn = document.getElementById('profileBtn');
        var profileDrop = document.getElementById('profileDrop');
        if (!profileLi || !profileBtn) return;
        var closeTimer;
        function openDrop(){ clearTimeout(closeTimer); profileLi.classList.add('open'); }
        function closeDrop(){ closeTimer = setTimeout(function(){ profileLi.classList.remove('open'); }, 150); }
        profileLi.addEventListener('mouseenter', openDrop);
        profileLi.addEventListener('mouseleave', closeDrop);
        profileBtn.addEventListener('click', function(e){
            e.stopPropagation();
            profileLi.classList.toggle('open');
        });
        document.addEventListener('click', function(e){
            if (!profileLi.contains(e.target)) profileLi.classList.remove('open');
        });
        if (profileDrop) {
            profileDrop.addEventListener('mouseenter', function(){ clearTimeout(closeTimer); });
            profileDrop.addEventListener('mouseleave', closeDrop);
        }
    })();

       /* ─── MEGA MENU — HOVER INTERACTION ─── */
    (function(){
        const navItems=document.querySelectorAll('.nav-links>li');
        let hoverTimeout;
        const HOVER_DELAY=150;
        function closeAll(){document.querySelectorAll('.nav-links>li').forEach(l=>l.classList.remove('open'));}
        function openMenu(li){closeAll();li.classList.add('open');}
        navItems.forEach(item=>{
            const trigger=item.querySelector('.nav-trigger');
            const dropdown=item.querySelector('.mega-drop, .simple-drop');

            if(trigger && dropdown){
                item.addEventListener('mouseenter',function(){
                    clearTimeout(hoverTimeout);
                    hoverTimeout=setTimeout(()=>{openMenu(item);},HOVER_DELAY);
                });
                item.addEventListener('mouseleave',function(){
                    clearTimeout(hoverTimeout);
                    hoverTimeout=setTimeout(()=>{item.classList.remove('open');},HOVER_DELAY);
                });
                dropdown.addEventListener('mouseenter',function(){clearTimeout(hoverTimeout);});
                dropdown.addEventListener('mouseleave',function(){
                    clearTimeout(hoverTimeout);
                    hoverTimeout=setTimeout(()=>{item.classList.remove('open');},HOVER_DELAY);
                });
            }
        });
        document.addEventListener('click',function(e){
            if(!e.target.closest('.nav-links>li')){closeAll();}
        });
        document.querySelectorAll('.mega-item,.simple-drop a').forEach(a=>a.addEventListener('click',closeAll));
    })();

    document.getElementById('hamburgerBtn').addEventListener('click',()=>{
        const btn=document.getElementById('hamburgerBtn');
        const menu=document.getElementById('mobileMenu');
        btn.classList.toggle('open');
        menu.classList.toggle('open');
    });
    document.querySelectorAll('.mobile-nav a').forEach(a=>a.addEventListener('click',()=>{
        document.getElementById('mobileMenu').classList.remove('open');
        document.getElementById('hamburgerBtn').classList.remove('open');
    }));

    /* ─── BACK TO TOP ─── */
    const btt=document.getElementById('backToTop');
    window.addEventListener('scroll',()=>{btt.classList.toggle('show',window.scrollY>400);document.getElementById('mainNav').classList.toggle('scrolled',window.scrollY>50);});
    btt.addEventListener('click',()=>window.scrollTo({top:0,behavior:'smooth'}));

    /* ─── NAV ACTIVE ─── */
    const secs=document.querySelectorAll('section[id]'),navAs=document.querySelectorAll('.nav-links a');
    window.addEventListener('scroll',()=>{let cur='';secs.forEach(s=>{if(window.scrollY>=s.offsetTop-120)cur=s.getAttribute('id');});navAs.forEach(a=>{a.classList.remove('active');if(a.getAttribute('href')==='#'+cur)a.classList.add('active');});});

    /* ─── FADE IN OBSERVER ─── */
    function initAnimations(){
        const obs=new IntersectionObserver(entries=>{entries.forEach(e=>{if(e.isIntersecting)e.target.classList.add('vis');});},{threshold:0.1,rootMargin:'0px 0px -40px 0px'});
        document.querySelectorAll('.fade-in').forEach(el=>obs.observe(el));
    }

    /* ─── INIT ─── */
    renderRoutes();
    initAnimations();
    lucide.createIcons();

    /* ─── LOGOUT ─── */
    async function doLogout(){
        console.log('Logout function called');
        // Clear all session/auth data from localStorage
        localStorage.removeItem('biyahero_current_user');
        localStorage.removeItem('biyahero_session');
        try {
            await ApiClient.logout();
            console.log('API logout successful, redirecting...');
        } catch (error) {
            console.error('Logout error:', error);
        }
        // Always redirect to login after logout
        window.location.href = 'landingpage/login.php';
    }
    </script>

    <!-- Subscription JS loaded LAST so DOM + inline scripts are ready -->
    <script src="subscription/subscription.js"></script>
    <script>
    /* ─── SUBSCRIPTION INTEGRATION (runs after subscription.js loads) ─── */
    (function () {
        if (typeof SubscriptionManager === 'undefined') return;

        var currentUser = null;
        try {
            var raw = localStorage.getItem('biyahero_current_user');
            currentUser = raw ? JSON.parse(raw) : null;
        } catch (e) {}

        // ── KEY FIX: scope subscription state to the logged-in user ──
        // Uses email (or id as fallback) so each registrant gets their own
        // free trial and subscription — even on a shared device/browser.
        if (currentUser) {
            var userId = currentUser.email || currentUser.id || currentUser.username;
            if (userId) SubscriptionManager.setUser(userId);
        }

        /* Update nav badge & upgrade button label */
        SubscriptionManager.updateStatusIndicator(currentUser ? JSON.stringify(currentUser) : null);

        /* Wire the #calcBtn to the full subscription gate logic.
           SubscriptionManager.handleCalculateClick() decides:
             A) Has active plan  → run immediately
             B) First-time user  → show modal (free trial + paid plans)
             C) Used free trial, expired → redirect to subscription.php */
        SubscriptionManager.patchFareCalculator(function () {
            runFareCalc();
        });
    })();
    </script>
    </body>
    </html>