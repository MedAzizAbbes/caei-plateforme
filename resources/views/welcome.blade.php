<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ config('app.name', 'CAEI Plateforme') }} — Séminaires & Portail Officiel</title>
  <meta name="description" content="Consultez et inscrivez-vous aux séminaires CAEI Company Group. Formation professionnelle, gestion des participants et suivi de présence.">
  <meta name="keywords" content="CAEI, Elite Training, séminaires, formation, Afrique, Tunisie, Digital Moov, Call Center, Medical Services">

  <!-- Open Graph / Social Media Meta Tags -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:title" content="{{ config('app.name', 'CAEI Company Group') }} — Séminaires & Portail Officiel">
  <meta property="og:description" content="Le Comité Africain d'Expertise Internationale regroupe des experts et élites africains de renommée internationale pour la formation, transformation digitale et services médicaux.">
  <meta property="og:image" content="{{ asset('assets/img/logocompany.png') }}">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ config('app.name', 'CAEI Company Group') }}">
  <meta name="twitter:description" content="Le Comité Africain d'Expertise Internationale regroupe des experts et élites africains de renommée internationale.">
  <meta name="twitter:image" content="{{ asset('assets/img/logocompany.png') }}">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logoh.ico') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files (via CDNs) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" media="print" onload="this.media='all'">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/swiper@11.1.10/swiper-bundle.min.css" rel="stylesheet" media="print" onload="this.media='all'">
  <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet" media="print" onload="this.media='all'">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}?v={{ time() }}" rel="stylesheet">
  <link href="{{ asset('assets/css/welcome-modern.css') }}?v={{ time() }}" rel="stylesheet">
  
  <style>
    /* Mobile Navigation Full Screen Overlay Fix */
    @media (max-width: 1199px) {
      .mobile-nav-toggle {
        color: #ffffff !important;
        font-size: 32px !important;
        cursor: pointer !important;
        z-index: 10001 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
      }

      body.mobile-nav-active {
        overflow: hidden !important;
      }

      body.mobile-nav-active .navmenu {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        width: 100vw !important;
        height: 100vh !important;
        background: rgba(0, 7, 32, 0.96) !important;
        backdrop-filter: blur(15px) !important;
        -webkit-backdrop-filter: blur(15px) !important;
        z-index: 9999 !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        justify-content: center !important;
        padding: 80px 24px 40px 24px !important;
      }

      body.mobile-nav-active .navmenu > ul {
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 16px !important;
        width: 100% !important;
        max-width: 320px !important;
        margin: 0 auto !important;
        padding: 0 !important;
        list-style: none !important;
        background: transparent !important;
        position: static !important;
        box-shadow: none !important;
      }

      body.mobile-nav-active .navmenu a {
        color: #ffffff !important;
        font-size: 18px !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        letter-spacing: 1px !important;
        padding: 12px 24px !important;
        border-radius: 30px !important;
        transition: all 0.3s ease !important;
        width: 100% !important;
        text-align: center !important;
        display: block !important;
        text-decoration: none !important;
      }

      body.mobile-nav-active .navmenu a:hover,
      body.mobile-nav-active .navmenu a.active {
        color: #000f3c !important;
        background: linear-gradient(135deg, #ffbd45 0%, #ce9233 100%) !important;
        box-shadow: 0 8px 20px rgba(255, 189, 69, 0.4) !important;
      }

      body.mobile-nav-active .mobile-nav-toggle {
        position: fixed !important;
        top: 20px !important;
        right: 20px !important;
        color: #ffbd45 !important;
        font-size: 36px !important;
      }
    }

    #topbar {
      padding: 6px 0 !important;
    }
    #topbar .d-flex.gap-4 {
      gap: 0.75rem !important;
      flex-wrap: wrap;
    }
    #topbar a span {
      font-size: 11px !important;
    }
    #topbar .btn-sm {
      padding: 4px 10px !important;
      font-size: 11px !important;
    }
    @media (max-width: 992px) {
      #topbar .d-flex.gap-4 {
        gap: 0.5rem !important;
      }
      #topbar a span {
        font-size: 10px !important;
      }
    }
    @media (max-width: 768px) {
      #topbar {
        padding: 4px 0 !important;
      }
      #topbar .d-flex.gap-4 {
        gap: 0.3rem !important;
      }
      #topbar a {
        font-size: 10px !important;
      }
      #topbar a span {
        display: none;
      }
      #topbar a i {
        font-size: 14px !important;
      }
      #topbar .btn-sm {
        padding: 3px 8px !important;
        font-size: 10px !important;
      }
    }
    @keyframes slideInDown {
      from {
        opacity: 0;
        transform: translateY(-30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    @keyframes slideInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .hero h2 {
      animation: slideInDown 0.8s ease-out;
    }
    .hero h2 span {
      animation: slideInUp 0.8s ease-out 0.2s both;
    }
    
    /* ═══════════════════════════════════════════════════════════════
       CINEMATIC HERO STYLING & ANIMATIONS
       ═══════════════════════════════════════════════════════════════ */
    .hero.section {
      background: transparent !important;
      position: relative !important;
      overflow: hidden !important;
    }
    
    .hero.section::before {
      content: '' !important;
      display: block !important;
      position: absolute !important;
      inset: 0 !important;
      background: linear-gradient(to bottom, rgba(0, 10, 35, 0.45) 0%, rgba(0, 15, 45, 0.65) 100%) !important;
      pointer-events: none !important;
      z-index: 1 !important;
    }

    .hero-overlay-gradient {
      display: none !important;
    }

    /* Ambient Lens Flare Spotlight */
    .cinematic-lens-flare {
      position: absolute;
      top: 30%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 700px;
      height: 280px;
      background: radial-gradient(ellipse at center, rgba(255, 196, 81, 0.2) 0%, rgba(0, 140, 255, 0.1) 45%, transparent 75%);
      filter: blur(60px);
      pointer-events: none;
      z-index: 1;
      animation: flarePulse 7s ease-in-out infinite alternate;
      will-change: transform, opacity;
    }

    @keyframes flarePulse {
      0% { opacity: 0.6; transform: translate(-50%, -50%) scale(0.92); }
      100% { opacity: 1; transform: translate(-50%, -50%) scale(1.12); }
    }

    /* Hero Section Container Security */
    .hero {
      overflow-x: hidden !important;
      position: relative !important;
    }

    /* Cinematic Text Effects */
    .hero h2 {
      font-weight: 900 !important;
      letter-spacing: 2px !important;
      text-shadow: 0 10px 30px rgba(0, 0, 0, 0.8), 0 0 30px rgba(255, 122, 0, 0.25) !important;
      overflow: visible !important;
      perspective: 1000px;
    }

    /* ANIMATION FORTE DE CROISEMENT : BIENVENUE chez (gauche -> milieu) & CAEI COMPANY GROUP (droite -> milieu) */
    @keyframes strongCrossLeft {
      0% {
        opacity: 0;
        transform: translate3d(-100vw, 0, 0) scale(0.6) rotate(-8deg);
        filter: blur(16px);
      }
      65% {
        opacity: 1;
        transform: translate3d(50px, 0, 0) scale(1.12) rotate(2deg);
        filter: blur(0px);
      }
      82% {
        transform: translate3d(-15px, 0, 0) scale(0.98) rotate(-1deg);
      }
      100% {
        opacity: 1;
        transform: translate3d(0, 0, 0) scale(1) rotate(0deg);
        filter: blur(0px);
      }
    }

    @keyframes strongCrossRight {
      0% {
        opacity: 0;
        transform: translate3d(100vw, 0, 0) scale(0.6) rotate(8deg);
        filter: blur(16px);
      }
      65% {
        opacity: 1;
        transform: translate3d(-50px, 0, 0) scale(1.12) rotate(-2deg);
        filter: blur(0px);
      }
      82% {
        transform: translate3d(15px, 0, 0) scale(0.98) rotate(1deg);
      }
      100% {
        opacity: 1;
        transform: translate3d(0, 0, 0) scale(1) rotate(0deg);
        filter: blur(0px);
      }
    }

    @keyframes orangeGlowPulse {
      0%, 100% {
        filter: drop-shadow(0 6px 20px rgba(255, 122, 0, 0.75)) drop-shadow(0 2px 8px rgba(0, 0, 0, 0.9));
      }
      50% {
        filter: drop-shadow(0 8px 40px rgba(255, 122, 0, 1)) drop-shadow(0 0 60px rgba(255, 170, 0, 0.9)) drop-shadow(0 2px 10px rgba(0, 0, 0, 0.95));
      }
    }

    .hero-text-left {
      display: inline-block !important;
      color: #ffffff !important;
      -webkit-text-fill-color: #ffffff !important;
      text-shadow: 0 6px 30px rgba(0, 0, 0, 0.95), 0 0 25px rgba(255, 255, 255, 0.4) !important;
      animation: strongCrossLeft 2.4s cubic-bezier(0.16, 1, 0.3, 1) both !important;
      will-change: transform, opacity;
    }

    .hero-text-right {
      display: inline-block !important;
      animation: strongCrossRight 2.4s cubic-bezier(0.16, 1, 0.3, 1) 0.15s both, orangeGlowPulse 3s ease-in-out 2.5s infinite !important;
      will-change: transform, opacity;
    }

    .hero h2 span.gradient-gold {
      background: linear-gradient(135deg, #fff7ed 0%, #ff8a00 30%, #ff5500 70%, #ffa500 100%) !important;
      -webkit-background-clip: text !important;
      -webkit-text-fill-color: transparent !important;
      background-clip: text !important;
      color: #ff7a00 !important;
      filter: drop-shadow(0 6px 25px rgba(255, 122, 0, 0.8)) drop-shadow(0 2px 10px rgba(0, 0, 0, 0.95)) !important;
    }

    .hero-subtitle {
      letter-spacing: 1.5px !important;
      color: rgba(255, 255, 255, 0.95) !important;
      text-shadow: 0 2px 10px rgba(0,0,0,0.8) !important;
      font-weight: 500 !important;
    }

    .hero-badge-pill {
      background: rgba(255, 122, 0, 0.2) !important;
      border: 1px solid rgba(255, 122, 0, 0.65) !important;
      box-shadow: 0 0 25px rgba(255, 122, 0, 0.35) !important;
      color: #ffaa00 !important;
      backdrop-filter: blur(14px) !important;
      letter-spacing: 1px !important;
      font-weight: 700 !important;
    }

    /* Cinematic Glassmorphism Service Cards & Flying Animation */
    @keyframes floatCardWave {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    /* ═══════════════════════════════════════════════════════════════
       HERO AGENCIES QUICK ACCESS (4 AGENCES DANS LE HERO)
       ═══════════════════════════════════════════════════════════════ */
    @keyframes floatHeroCircle {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-8px); }
    }

    .hero-agency-link {
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      text-decoration: none !important;
      background: transparent !important;
      border: none !important;
      box-shadow: none !important;
      padding: 0 !important;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
    }

    .hero-agency-circle {
      width: 130px !important;
      height: 130px !important;
      min-width: 130px !important;
      min-height: 130px !important;
      max-width: 130px !important;
      max-height: 130px !important;
      border-radius: 50% !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      position: relative !important;
      overflow: hidden !important;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5) !important;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
      animation: floatHeroCircle 4s ease-in-out infinite !important;
      cursor: pointer !important;
    }

    .hero-agency-col:nth-child(1) .hero-agency-circle { animation-delay: 0s !important; }
    .hero-agency-col:nth-child(2) .hero-agency-circle { animation-delay: 0.6s !important; }
    .hero-agency-col:nth-child(3) .hero-agency-circle { animation-delay: 1.2s !important; }
    .hero-agency-col:nth-child(4) .hero-agency-circle { animation-delay: 1.8s !important; }

    .hero-agency-circle.circle-elite {
      background: linear-gradient(135deg, rgb(203, 225, 247) 0%, #003d7a 100%) !important;
    }
    .hero-agency-link:hover .hero-agency-circle.circle-elite {
      transform: scale(1.18) rotate(5deg) !important;
      box-shadow: 0 20px 45px rgba(0, 61, 122, 0.75), 0 0 35px rgba(0, 140, 255, 0.6) !important;
    }

    .hero-agency-circle.circle-medical {
      background: linear-gradient(135deg, rgb(206, 241, 247) 0%, #138496 100%) !important;
    }
    .hero-agency-link:hover .hero-agency-circle.circle-medical {
      transform: scale(1.18) rotate(-5deg) !important;
      box-shadow: 0 20px 45px rgba(19, 132, 150, 0.75), 0 0 35px rgba(19, 206, 235, 0.6) !important;
    }

    .hero-agency-circle.circle-digital {
      background: linear-gradient(135deg, rgb(248, 239, 219) 0%, #b37700 100%) !important;
    }
    .hero-agency-link:hover .hero-agency-circle.circle-digital {
      transform: scale(1.18) rotate(5deg) !important;
      box-shadow: 0 20px 45px rgba(179, 119, 0, 0.75), 0 0 35px rgba(255, 170, 0, 0.6) !important;
    }

    .hero-agency-circle.circle-callcenter {
      background: linear-gradient(135deg, rgb(236, 229, 231) 0%, #6b0f2a 100%) !important;
    }
    .hero-agency-link:hover .hero-agency-circle.circle-callcenter {
      transform: scale(1.18) rotate(-5deg) !important;
      box-shadow: 0 20px 45px rgba(107, 15, 42, 0.75), 0 0 35px rgba(200, 30, 80, 0.6) !important;
    }

    /* Force strict sizing and override general .hero img absolute positioning */
    .hero .hero-agency-circle img,
    .hero-agency-circle .hero-agency-logo,
    .hero-agency-logo {
      position: static !important;
      inset: auto !important;
      width: 90px !important;
      height: 90px !important;
      min-width: 90px !important;
      min-height: 90px !important;
      max-width: 90px !important;
      max-height: 90px !important;
      object-fit: contain !important;
      display: block !important;
      margin: auto !important;
      z-index: 2 !important;
      pointer-events: none !important;
      transition: transform 0.35s ease !important;
      filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.35)) !important;
    }

    .hero-agency-link:hover .hero-agency-logo {
      transform: scale(1.08) !important;
    }

    @media (max-width: 991px) {
      .hero-agency-circle {
        width: 105px !important;
        height: 105px !important;
        min-width: 105px !important;
        min-height: 105px !important;
        max-width: 105px !important;
        max-height: 105px !important;
      }
      .hero .hero-agency-circle img,
      .hero-agency-circle .hero-agency-logo,
      .hero-agency-logo {
        width: 65px !important;
        height: 65px !important;
        min-width: 65px !important;
        min-height: 65px !important;
        max-width: 65px !important;
        max-height: 65px !important;
      }
    }

    @media (max-width: 576px) {
      .hero-agency-circle {
        width: 85px !important;
        height: 85px !important;
        min-width: 85px !important;
        min-height: 85px !important;
        max-width: 85px !important;
        max-height: 85px !important;
      }
      .hero .hero-agency-circle img,
      .hero-agency-circle .hero-agency-logo,
      .hero-agency-logo {
        width: 52px !important;
        height: 52px !important;
        min-width: 52px !important;
        min-height: 52px !important;
        max-width: 52px !important;
        max-height: 52px !important;
      }
    }

    /* ═══════════════════════════════════════════════════════════════
       3D CIRCULAR CAROUSEL FOR FORMATIONS EN COURS
       ═══════════════════════════════════════════════════════════════ */
    .formation-circle-stage {
      position: relative;
      width: 100%;
      min-height: 560px;
      perspective: 1400px;
      perspective-origin: 50% 48%;
      overflow: hidden;
      padding: 40px 0 20px 0;
      user-select: none;
    }

    .formation-circle-ring {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 320px;
      height: 440px;
      transform-style: preserve-3d;
      transform: translate(-50%, -50%) rotateY(0deg);
      cursor: grab;
      will-change: transform;
    }

    .formation-circle-ring:active {
      cursor: grabbing;
    }

    .formation-circle-item {
      position: absolute;
      top: 0;
      left: 0;
      width: 320px;
      height: 440px;
      border-radius: 22px;
      background: #ffffff;
      box-shadow: 0 15px 40px rgba(0, 15, 60, 0.14), 0 2px 10px rgba(0, 0, 0, 0.06);
      border: 1px solid rgba(0, 15, 60, 0.08);
      overflow: hidden;
      display: flex;
      flex-direction: column;
      transform-style: preserve-3d;
      backface-visibility: hidden;
      -webkit-backface-visibility: hidden;
      transition: box-shadow 0.4s ease, filter 0.4s ease, border-color 0.4s ease;
      text-decoration: none !important;
    }

    .formation-circle-item.active-front {
      box-shadow: 0 25px 60px rgba(0, 15, 60, 0.28), 0 0 35px rgba(255, 122, 0, 0.35);
      border-color: rgba(255, 122, 0, 0.6);
    }

    .formation-circle-item:hover {
      box-shadow: 0 25px 60px rgba(0, 15, 60, 0.25), 0 0 35px rgba(255, 122, 0, 0.4);
      border-color: #ff7a00;
    }

    .formation-card-img-wrap {
      position: relative;
      width: 100%;
      height: 180px;
      background-color: #000f3c;
      overflow: hidden;
    }

    .formation-card-img-wrap img {
      position: static !important;
      inset: auto !important;
      width: 100% !important;
      height: 100% !important;
      max-width: 100% !important;
      max-height: 100% !important;
      object-fit: cover !important;
      transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1) !important;
    }

    .formation-circle-item:hover .formation-card-img-wrap img {
      transform: scale(1.08) !important;
    }

    .formation-card-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(0, 15, 60, 0.75) 0%, transparent 60%);
      pointer-events: none;
    }

    .formation-card-badges {
      position: absolute;
      bottom: 12px;
      left: 14px;
      right: 14px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 2;
    }

    .formation-card-body {
      padding: 18px 20px;
      display: flex;
      flex-direction: column;
      flex-grow: 1;
      background: #ffffff;
    }

    .formation-card-title {
      font-size: 1.05rem;
      font-weight: 800;
      color: #000f3c;
      margin-bottom: 8px;
      line-height: 1.35;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .formation-card-desc {
      font-size: 0.82rem;
      color: #6c757d;
      line-height: 1.45;
      flex-grow: 1;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      margin-bottom: 12px;
    }

    .formation-card-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-top: 12px;
      border-top: 1px solid rgba(0, 0, 0, 0.07);
    }

    .formation-card-price {
      font-size: 1.1rem;
      font-weight: 800;
      color: #000f3c;
    }

    /* Controls */
    .formation-circle-nav {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 16px;
      margin-top: 20px;
    }

    .circle-arrow-btn {
      width: 46px;
      height: 46px;
      border-radius: 50%;
      border: 2px solid #ff7a00;
      background: #ffffff;
      color: #ff7a00;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.25rem;
      cursor: pointer;
      box-shadow: 0 4px 15px rgba(255, 122, 0, 0.25);
      transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .circle-arrow-btn:hover {
      background: #ff7a00;
      color: #ffffff;
      transform: scale(1.1);
      box-shadow: 0 8px 25px rgba(255, 122, 0, 0.45);
    }

    .circle-auto-toggle {
      background: rgba(0, 15, 60, 0.06);
      border: 1px solid rgba(0, 15, 60, 0.15);
      color: #000f3c;
      padding: 6px 14px;
      border-radius: 50px;
      font-size: 0.8rem;
      font-weight: 700;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: all 0.3s ease;
    }

    .circle-auto-toggle.active {
      background: rgba(255, 122, 0, 0.15);
      border-color: #ff7a00;
      color: #ff7a00;
    }

    .formation-circle-dots {
      display: flex;
      gap: 8px;
      align-items: center;
    }

    .formation-circle-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: #d1d5db;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .formation-circle-dot.active {
      width: 24px;
      border-radius: 10px;
      background: #ff7a00;
    }

    @media (max-width: 991px) {
      .formation-circle-stage {
        min-height: 510px;
      }
      .formation-circle-ring,
      .formation-circle-item {
        width: 280px;
        height: 410px;
      }
      .formation-card-img-wrap {
        height: 160px;
      }
    }

    @media (max-width: 576px) {
      .formation-circle-stage {
        min-height: 460px;
        perspective: 900px;
      }
      .formation-circle-ring,
      .formation-circle-item {
        width: 250px;
        height: 380px;
      }
      .formation-card-img-wrap {
        height: 140px;
      }
      .formation-card-body {
        padding: 12px 14px;
      }
      .formation-card-title {
        font-size: 0.95rem;
      }
    }

    /* ═══════════════════════════════════════════════════════════════
       SECTION BACKGROUND IMAGES (OVERRIDING WELCOME-MODERN.CSS)
       ═══════════════════════════════════════════════════════════════ */
    section#presentation.about.section,
    section#presentation {
      background: linear-gradient(135deg, rgba(248, 249, 252, 0.91) 0%, rgba(255, 255, 255, 0.94) 100%), url('{{ asset("assets/img/features-bg.jpg") }}') center/cover no-repeat scroll !important;
      position: relative !important;
    }

    section#features.features.section,
    section#features {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.92) 0%, rgba(248, 249, 252, 0.95) 100%), url('{{ asset("assets/img/services.jpg") }}') center/cover no-repeat scroll !important;
      position: relative !important;
    }

    section#agencies.agencies.section,
    section#agencies {
      background: linear-gradient(135deg, rgba(248, 249, 252, 0.91) 0%, rgba(255, 255, 255, 0.94) 100%), url('{{ asset("assets/img/company.jpg") }}') center/cover no-repeat scroll !important;
      position: relative !important;
    }

    section#services.services.section,
    section#services {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.92) 0%, rgba(248, 249, 252, 0.95) 100%), url('{{ asset("assets/img/img3.jpg") }}') center/cover no-repeat scroll !important;
      position: relative !important;
    }

    section#stats.stats.section,
    section#stats {
      background: linear-gradient(135deg, rgba(248, 249, 252, 0.91) 0%, rgba(255, 255, 255, 0.94) 100%), url('{{ asset("assets/img/im1.jpg") }}') center/cover no-repeat scroll !important;
      position: relative !important;
    }

    section#faq.faq.section,
    section#faq {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.92) 0%, rgba(248, 249, 252, 0.95) 100%), url('{{ asset("assets/img/features-bg.jpg") }}') center/cover no-repeat scroll !important;
      position: relative !important;
    }

    section#contact.contact.section,
    section#contact {
      background: linear-gradient(135deg, rgba(248, 249, 252, 0.91) 0%, rgba(255, 255, 255, 0.94) 100%), url('{{ asset("assets/img/testimonials-bg.jpg") }}') center/cover no-repeat scroll !important;
      position: relative !important;
    }

    /* ═══════════════════════════════════════════════════════════════
       VISIBLE PHOTO BACKGROUND UNDER EACH BOX WITH ANIMATION
       ═══════════════════════════════════════════════════════════════ */
    @keyframes agencyCardFloat {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-7px); }
    }

    section#about-agencies,
    #about-agencies {
      background: linear-gradient(135deg, rgba(0, 15, 60, 0.92) 0%, rgba(0, 31, 63, 0.88) 100%), url('{{ asset("assets/img/company.jpg") }}') center/cover no-repeat scroll !important;
      position: relative !important;
      padding: 90px 0 !important;
      overflow: hidden !important;
    }

    section#about-agencies .section-title h2,
    #about-agencies .section-title h2 {
      color: #ffffff !important;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.8) !important;
    }

    section#about-agencies .section-title p,
    #about-agencies .section-title p {
      color: rgba(255, 255, 255, 0.75) !important;
    }

    .about-agency-photo-card {
      position: relative !important;
      border-radius: 24px !important;
      overflow: hidden !important;
      min-height: 390px !important;
      border: 1px solid rgba(255, 255, 255, 0.25) !important;
      box-shadow: 0 20px 45px rgba(0, 0, 0, 0.15) !important;
      transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
      display: flex !important;
      flex-direction: column !important;
      animation: agencyCardFloat 5s ease-in-out infinite;
    }

    .col-lg-6:nth-child(1) .about-agency-photo-card { animation-delay: 0s; }
    .col-lg-6:nth-child(2) .about-agency-photo-card { animation-delay: 1.2s; }
    .col-lg-6:nth-child(3) .about-agency-photo-card { animation-delay: 2.4s; }
    .col-lg-6:nth-child(4) .about-agency-photo-card { animation-delay: 3.6s; }

    .about-agency-photo-card::before {
      content: '' !important;
      position: absolute !important;
      inset: 0 !important;
      background-size: cover !important;
      background-position: center !important;
      transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1), filter 0.6s ease !important;
      z-index: 1 !important;
      opacity: 1 !important;
      filter: brightness(0.85) contrast(1.08) !important;
    }

    .about-agency-photo-card.card-elite::before {
      background-image: url('{{ asset("assets/img/img3.jpg") }}') !important;
    }

    .about-agency-photo-card.card-digital::before {
      background-image: url('{{ asset("assets/img/img2.jpg") }}') !important;
    }

    .about-agency-photo-card.card-medical::before {
      background-image: url('{{ asset("assets/img/im1.jpg") }}') !important;
    }

    .about-agency-photo-card.card-call::before {
      background-image: url('{{ asset("assets/img/services.jpg") }}') !important;
    }

    .about-agency-photo-card .card-overlay {
      position: absolute !important;
      inset: 0 !important;
      background: linear-gradient(135deg, rgba(0, 10, 45, 0.88) 0%, rgba(0, 20, 55, 0.80) 100%) !important;
      z-index: 2 !important;
      transition: background 0.4s ease !important;
    }

    .about-agency-photo-card:hover {
      transform: translateY(-10px) scale(1.02) !important;
      border-color: rgba(255, 196, 81, 0.75) !important;
      box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5), 0 0 30px rgba(255, 196, 81, 0.25) !important;
      animation-play-state: paused !important;
    }

    .about-agency-photo-card:hover::before {
      transform: scale(1.1) rotate(1deg) !important;
      filter: brightness(1.05) contrast(1.15) !important;
    }

    .about-agency-photo-card:hover .card-overlay {
      background: linear-gradient(135deg, rgba(0, 10, 45, 0.78) 0%, rgba(0, 20, 55, 0.68) 100%) !important;
    }

    .about-agency-photo-card .agency-logo-wrapper {
      transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.4s ease !important;
    }

    .about-agency-photo-card:hover .agency-logo-wrapper {
      transform: scale(1.1) rotate(-3deg) !important;
      box-shadow: 0 12px 28px rgba(255, 196, 81, 0.35) !important;
    }

    .about-agency-photo-card:hover .bi-check-circle-fill {
      transform: scale(1.2) !important;
      color: #ff7a00 !important;
      transition: transform 0.3s ease !important;
    }

    .about-agency-photo-card h3 {
      color: #ffffff !important;
      font-weight: 800 !important;
      font-size: 24px !important;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.9) !important;
    }

    .service-logo-box {
      width: 95px !important;
      height: 95px !important;
      border-radius: 24px !important;
      background: linear-gradient(135deg, #001f3f 0%, #000f3c 100%) !important;
      border: 1px solid rgba(255, 196, 81, 0.35) !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      box-shadow: 0 12px 28px rgba(0, 15, 60, 0.25) !important;
      transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
      padding: 12px !important;
    }

    .service-logo-box img {
      width: 100% !important;
      height: 100% !important;
      object-fit: contain !important;
      filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.4)) !important;
      transition: transform 0.4s ease !important;
    }

    .service-item {
      transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
      border: 1px solid rgba(0, 15, 60, 0.08) !important;
    }

    .service-item:hover {
      transform: translateY(-8px) !important;
      box-shadow: 0 20px 40px rgba(0, 15, 60, 0.12) !important;
      border-color: rgba(255, 196, 81, 0.5) !important;
    }

    .service-item:hover .service-logo-box {
      transform: scale(1.1) rotate(-3deg) !important;
      border-color: rgba(255, 196, 81, 0.8) !important;
      box-shadow: 0 15px 35px rgba(0, 31, 63, 0.4) !important;
    }

    .about-agency-photo-card .card-body-content {
      position: relative !important;
      z-index: 3 !important;
      padding: 2.2rem !important;
    }

    .agency-logo-wrapper {
      width: 70px;
      height: 70px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.3);
      display: flex;
      align-items: center;
      justify-content: center;
      backdrop-filter: blur(10px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      flex-shrink: 0;
    }

    .agency-logo-wrapper img {
      width: 48px;
      height: 48px;
      object-fit: contain;
    }
    
    /* Chat Widget Styles */
    .chat-widget {
      position: fixed;
      bottom: 30px;
      right: 30px;
      z-index: 9999;
    }
    .chat-button {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: linear-gradient(135deg, #ff7a00 0%, #ff9500 100%);
      border: none;
      box-shadow: 0 4px 15px rgba(255, 122, 0, 0.45);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }
    .chat-button:hover {
      transform: scale(1.1);
      box-shadow: 0 6px 20px rgba(255, 196, 81, 0.6);
    }
    .chat-button i {
      font-size: 28px;
      color: white;
    }
    .chat-menu {
      position: absolute;
      bottom: 75px;
      right: 0;
      background: white;
      border-radius: 15px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
      padding: 20px;
      width: 280px;
      display: none;
      animation: slideUp 0.3s ease;
    }
    .chat-menu.active {
      display: block;
    }
    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .chat-menu h4 {
      font-size: 16px;
      font-weight: 600;
      color: #000f3c;
      margin-bottom: 15px;
      text-align: center;
    }
    .chat-option {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px;
      border-radius: 10px;
      margin-bottom: 10px;
      text-decoration: none;
      transition: all 0.3s ease;
      background: #f8f9fa;
    }
    .chat-option:hover {
      background: #e9ecef;
      transform: translateX(5px);
    }
    .chat-option i {
      font-size: 24px;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
    }
    .chat-option.whatsapp i {
      background: #25D366;
      color: white;
    }
    .chat-option.email i {
      background: #EA4335;
      color: white;
    }
    .chat-option.phone i {
      background: #0088cc;
      color: white;
    }
    .chat-option-text {
      flex: 1;
    }
    .chat-option-text strong {
      display: block;
      font-size: 14px;
      color: #000f3c;
      margin-bottom: 2px;
    }
    .chat-option-text span {
      font-size: 11px;
      color: #6c757d;
    }
    @media (max-width: 768px) {
      .chat-widget {
        bottom: 20px;
        right: 20px;
      }
      .chat-button {
        width: 55px;
        height: 55px;
      }
      .chat-menu {
        width: 260px;
      }
    }

    /* ══════════ STYLES DE CARTES DE SÉMINAIRE ══════════ */
    .section-divider {
        border: none;
        height: 2px;
        background: linear-gradient(90deg, transparent, rgba(248, 180, 0, .55), transparent);
        margin: 0 auto;
        max-width: 200px;
    }
    .seminar-card-modern {
        position: relative;
        width: 100%;
        aspect-ratio: 40 / 60; /* Ratio 40x60 (2:3) */
        border-radius: 20px;
        overflow: hidden;
        background-color: #061743;
        box-shadow: 0 8px 24px rgba(6, 23, 67, 0.05);
        transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        height: 100%;
    }
    .seminar-card-modern:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 32px rgba(6, 23, 67, 0.15);
    }
    .seminar-card-image-wrap {
        width: 100%;
        height: 100%;
        overflow: hidden;
        position: relative;
    }
    .seminar-card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .seminar-card-modern:hover .seminar-card-image {
        transform: scale(1.1);
    }
    .seminar-card-image-wrap::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(6, 23, 67, 0.45) 0%, transparent 60%);
        pointer-events: none;
    }
    .seminar-card-status-badge {
        position: absolute;
        top: 14px;
        right: 14px;
        z-index: 5;
        background: rgba(22, 163, 74, 0.9);
        color: #ffffff;
        font-size: 0.68rem;
        font-weight: 800;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 0.4rem 0.8rem;
        border-radius: 99px;
        box-shadow: 0 4px 12px rgba(6, 23, 67, 0.15);
        backdrop-filter: blur(4px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .seminar-card-overlay {
        position: absolute;
        inset: 0;
        z-index: 10;
        background: linear-gradient(to top, 
            rgba(6, 23, 67, 0.98) 0%, 
            rgba(6, 23, 67, 0.93) 60%, 
            rgba(6, 23, 67, 0.6) 100%);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        padding: 1.5rem 1.25rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transform: translateY(100%);
        transition: transform 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .seminar-card-modern:hover .seminar-card-overlay {
        transform: translateY(0);
    }
    .seminar-card-title-overlay {
        font-size: 1.15rem;
        font-weight: 900;
        color: #ffffff;
        line-height: 1.3;
        text-transform: uppercase;
        letter-spacing: -0.01em;
    }
    .seminar-card-desc-overlay {
        margin-top: 0.5rem;
        font-size: 0.78rem;
        color: #cbd5e1;
        line-height: 1.45;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .seminar-card-meta-list {
        display: flex;
        flex-direction: column;
        gap: 0.45rem;
        margin-top: 0.85rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 0.65rem;
    }
    .seminar-card-meta-row {
        display: flex;
        align-items: center;
        gap: 0.55rem;
        font-size: 0.8rem;
        color: #e2e8f0;
    }
    .seminar-card-meta-row i {
        font-size: 0.9rem;
        color: #ff7a00;
        flex-shrink: 0;
    }
    .seminar-card-buttons {
        display: flex;
        flex-direction: column;
        gap: 0.45rem;
        margin-top: 1rem;
    }
    .seminar-card-btn-view {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 0.55rem 1rem;
        border-radius: 10px;
        border: 2px solid #ffffff;
        background: transparent;
        color: #ffffff;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    .seminar-card-btn-view:hover {
        background: #ffffff;
        color: #061743;
    }
    .seminar-card-btn-sub {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 0.55rem 1rem;
        border-radius: 10px;
        border: none;
        background: #ff7a00;
        color: #ffffff;
        font-size: 0.72rem;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        box-shadow: 0 4px 12px rgba(255, 122, 0, 0.25);
        transition: all 0.3s ease;
        text-decoration: none;
    }
    .seminar-card-btn-sub:hover {
        background: #ff9500;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(255, 122, 0, 0.4);
    }
    .seminar-card-image-fallback {
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at top left, #0b2a66 0%, #061743 100%);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 2rem;
        text-align: center;
        position: relative;
        transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .seminar-card-image-fallback::before {
        content: '';
        position: absolute;
        inset: 12px;
        border: 2px dashed rgba(255, 196, 81, 0.2);
        border-radius: 12px;
        pointer-events: none;
    }
    .seminar-card-modern:hover .seminar-card-image-fallback {
        transform: scale(1.08);
    }
  </style>

  @vite(['resources/js/app.js'])
</head>

<body class="index-page">

  <!-- Top Contact Bar -->
  <div id="topbar" class="topbar d-flex align-items-center fixed-top" style="background-color: #000f3c; padding: 5px 0; z-index: 1000; top: 0; width: 100%; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); backdrop-filter: blur(10px);">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between" style="gap: 0.5rem; flex-wrap: wrap;">
      <div class="d-flex align-items-center gap-2 gap-md-3" style="flex-wrap: wrap;">
        <a href="tel:+21655335286" class="d-flex align-items-center gap-2 text-white text-decoration-none" style="font-size: 14px; white-space: nowrap;">
          <i class="bi bi-telephone-fill" style="color: #ff7a00;"></i>
          <span class="d-none d-sm-inline">+216 55 335 286</span>
        </a>
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=contact@caei-afri.com" target="_blank" class="d-flex align-items-center gap-2 text-white text-decoration-none" style="font-size: 14px; white-space: nowrap;">
          <i class="bi bi-envelope-fill" style="color: #ff7a00;"></i>
          <span class="d-none d-md-inline">contact@caei-afri.com</span>
        </a>
        <a href="https://www.google.com/maps/search/?api=1&query=SIS+8+Rue+Claude+Bernard+1002+Belvedere-Tunis+Tunisie" target="_blank" class="d-flex align-items-center gap-2 text-white text-decoration-none d-none d-lg-flex" style="font-size: 14px; white-space: nowrap;">
          <i class="bi bi-geo-alt-fill" style="color: #ff7a00;"></i>
          <span>SIS 8 Rue Claude Bernard 1002 Belvedere-Tunis , Tunisie</span>
        </a>
      </div>
      <a href="{{ asset('assets/img/catalogue CAEI GROUP.pdf') }}" target="_blank" style="font-size: 14px; color: #ff7a00; text-decoration: none; white-space: nowrap; transition: all 0.3s ease; display: flex; align-items: center; gap: 6px; padding: 0 8px;" onmouseover="this.style.color='#ffa500'; this.style.transform='translateX(2px)';" onmouseout="this.style.color='#ff7a00'; this.style.transform='translateX(0)';">
        <i class="bi bi-file-pdf" style="font-size: 17px;"></i>
        <span style="font-weight: 400; letter-spacing: 0.5px;" class="d-none d-sm-inline">Catalogue CAEI</span>
      </a>
    </div>
  </div>

  <header id="header" class="header d-flex align-items-center fixed-top" style="top: 35px; background: rgba(0, 15, 60, 0.85); backdrop-filter: blur(10px);">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-lg-0">
        <img src="{{ asset('assets/img/logocompany.png') }}" alt="CAEI Logo" height="60px" width="150px" style="object-fit: contain;">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#acceuil" class="active">Accueil<br></a></li>
          <li><a href="#presentation">Présentation</a></li>
          <li><a href="#agencies">Nos Agences</a></li>
          <li><a href="{{ route('home.old') }}">Nos séminaires</a></li>
          <li><a href="{{ route('callcenter.blog') }}">Nos actualités</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="{{ route('recrutement.index') }}">Recrutement</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <!-- Auth Controls (Breeze) -->
      @auth
        <div class="d-flex align-items-center gap-2 ms-xl-4">
          <a href="{{ route('dashboard') }}" class="btn-getstarted text-decoration-none">Mon espace</a>
        </div>
      @endauth

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="acceuil" class="hero section">

      <!-- Vidéo de fond native HTML5 (Réunion / Meeting Loop) - 0 Logo YouTube, 0 Boutons de contrôle -->
      <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; pointer-events: none; overflow: hidden; background: #000;">
        <video 
          autoplay 
          muted 
          loop 
          playsinline 
          preload="auto"
          style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.85; pointer-events: none;">
          <source src="{{ asset('assets/img/meeting_boardroom.mp4') }}" type="video/mp4">
          <source src="{{ asset('assets/img/meeting_room.mp4') }}" type="video/mp4">
        </video>
      </div>

      <div class="hero-overlay-gradient"></div>
      <div class="cinematic-lens-flare"></div>

      <div class="container text-center" style="position: relative; z-index: 2;">

        <div class="row justify-content-center">
          <div class="col-xl-9 col-lg-10">
            <div class="hero-badge-pill">
              <i class="bi bi-patch-check-fill"></i> Organisme Panafricain d'Excellence
            </div>
            <h2>
              <span class="hero-text-left">BIENVENUE chez</span><br>
              <span class="hero-text-right gradient-gold">CAEI COMPANY GROUP</span>
            </h2>
            <p class="hero-subtitle">
              l'union des experts et des elites africains du continent de renommée internationale
            </p>
          </div>
        </div>

        <!-- 4 Agences Directement Accessibles dans le Hero (Logos purs sans box) -->
        <div class="row justify-content-center align-items-center mt-4 pt-3 g-4">
          <!-- Agence 1 - Elite Training -->
          <div class="col-lg-3 col-md-3 col-6 d-flex justify-content-center hero-agency-col" data-aos="zoom-in" data-aos-delay="100">
            <a href="{{ route('elite.training') }}" class="hero-agency-link" title="CAEI Elite Training">
              <div class="hero-agency-circle circle-elite">
                <img src="{{ asset('assets/img/logo_elite_norm.png') }}" alt="CAEI Elite Training" class="hero-agency-logo">
              </div>
            </a>
          </div>

          <!-- Agence 2 - Medical Services -->
          <div class="col-lg-3 col-md-3 col-6 d-flex justify-content-center hero-agency-col" data-aos="zoom-in" data-aos-delay="200">
            <a href="{{ route('medical.services') }}" class="hero-agency-link" title="CAEI Medical Services">
              <div class="hero-agency-circle circle-medical">
                <img src="{{ asset('assets/img/logo_medical_norm.png') }}" alt="CAEI Medical Services" class="hero-agency-logo">
              </div>
            </a>
          </div>

          <!-- Agence 3 - Digital Moov -->
          <div class="col-lg-3 col-md-3 col-6 d-flex justify-content-center hero-agency-col" data-aos="zoom-in" data-aos-delay="300">
            <a href="{{ route('digitalmoov') }}" class="hero-agency-link" title="CAEI Digital Moov">
              <div class="hero-agency-circle circle-digital">
                <img src="{{ asset('assets/img/logo_digitalmoov_norm.png') }}" alt="CAEI Digital Moov" class="hero-agency-logo">
              </div>
            </a>
          </div>

          <!-- Agence 4 - Call Center -->
          <div class="col-lg-3 col-md-3 col-6 d-flex justify-content-center hero-agency-col" data-aos="zoom-in" data-aos-delay="400">
            <a href="{{ route('callcenter.index') }}" target="_blank" class="hero-agency-link" title="CAEI Call Center">
              <div class="hero-agency-circle circle-callcenter">
                <img src="{{ asset('assets/img/logo_callcenter_norm.png') }}" alt="CAEI Call Center" class="hero-agency-logo">
              </div>
            </a>
          </div>
        </div>

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="presentation" class="about section py-5" style="background: linear-gradient(135deg, rgba(248, 249, 252, 0.92) 0%, rgba(255, 255, 255, 0.95) 100%), url('{{ asset('assets/img/features-bg.jpg') }}') center/cover no-repeat scroll;">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6 order-1 order-lg-2">
            <img src="{{ asset('assets/img/professionel.jpg') }}" class="about-img img-fluid rounded shadow" alt="CAEI Professionnel" loading="lazy">
          </div>
          <div class="col-lg-6 order-2 order-lg-1 content d-flex flex-column justify-content-center">
            <h1 class="fw-bold" style="color: #000f3c;"><strong>Qui sommes-nous ?</strong></h1>
            <p class="fst-italic text-muted">
              Le CAEI regroupe des experts et élites africains du continent de renommée internationale, tous chevronnés dans leurs domaines respectifs, pour contribuer à la bonne gouvernance intellectuelle des cadres et élites de notre cher continent.
            </p>
            <ul class="list-unstyled mt-3">
              <li class="mb-2"><i class="bi bi-check2-all text-warning me-2"></i> <span>L'histoire du CAEI remonte aux années 1960, une époque où de nombreux pays africains ont accédé à l'indépendance.</span></li>
              <li class="mb-2"><i class="bi bi-check2-all text-warning me-2"></i> <span>Le Comité Africain d'Expertise Internationale (CAEI) est un organisme panafricain créé pour le développement.</span></li>
              <li class="mb-2"><i class="bi bi-check2-all text-warning me-2"></i> <span>Nous opérons dans 4 domaines clés avec une large gamme de services d'excellence.</span></li>
            </ul>
            <p class="mt-3">
              Notre mission est de regrouper les meilleures compétences africaines pour façonner l'avenir du continent et promouvoir une gouvernance intellectuelle de qualité.
            </p>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Formations Section -->
    <section id="formations" class="section py-5" style="background-color: #f9f9f9;">
      <div class="container" data-aos="fade-up">
        <div class="section-title text-center mb-5">
          <h2 class="fw-bold" style="color: #000f3c;">Formations en cours</h2>
          <p class="text-muted">Découvrez nos programmes de formation actuels et boostez vos compétences.</p>
        </div>
        
        @if(isset($formations) && $formations->count() > 0)
        <!-- 3D Circular Carousel Stage -->
        <div class="formation-circle-stage" id="formationCircleStage">
          <div class="formation-circle-ring" id="formationCircleRing">
            @foreach($formations as $formation)
            @php
              $domainLower = strtolower($formation->domain ?? '');
              $titleLower = strtolower($formation->title ?? '');
              
              if ($formation->image) {
                  $imgSrc = Storage::url($formation->image);
              } elseif (str_contains($titleLower, 'comptabilit') || str_contains($titleLower, 'trésorerie') || str_contains($titleLower, 'financ') || str_contains($domainLower, 'finance') || str_contains($domainLower, 'comptabilit')) {
                  $imgSrc = asset('assets/img/formation_finance.jpg');
              } elseif (str_contains($titleLower, 'audit') || str_contains($titleLower, 'contrôle') || str_contains($domainLower, 'audit')) {
                  $imgSrc = asset('assets/img/formation_audit.jpg');
              } elseif (str_contains($titleLower, 'leader') || str_contains($titleLower, 'management') || str_contains($domainLower, 'management')) {
                  $imgSrc = asset('assets/img/formation_leadership.jpg');
              } elseif (str_contains($titleLower, 'tech') || str_contains($titleLower, 'digital') || str_contains($domainLower, 'digital')) {
                  $imgSrc = asset('assets/img/formation_tech.jpg');
              } else {
                  $fallbackImages = [
                      asset('assets/img/formation_finance.jpg'),
                      asset('assets/img/formation_audit.jpg'),
                      asset('assets/img/formation_leadership.jpg'),
                      asset('assets/img/formation_tech.jpg'),
                      asset('assets/img/professionel.jpg'),
                      asset('assets/img/img3.jpg'),
                  ];
                  $imgSrc = $fallbackImages[$loop->index % count($fallbackImages)];
              }
            @endphp
            <div class="formation-circle-item" data-index="{{ $loop->index }}">
              <div class="formation-card-img-wrap">
                <img src="{{ $imgSrc }}" alt="{{ $formation->title }}" loading="lazy">
                <div class="formation-card-overlay"></div>
                <div class="formation-card-badges">
                  <span class="badge" style="background-color: #ff7a00; color: #ffffff; font-weight: 700; font-size: 0.75rem;">{{ ucfirst(str_replace('_', ' ', $formation->type)) }}</span>
                  <span class="badge bg-white text-dark shadow-sm" style="font-weight: 600; font-size: 0.72rem;">{{ $formation->domain }}</span>
                </div>
              </div>
              <div class="formation-card-body">
                <h5 class="formation-card-title">{{ $formation->title }}</h5>
                <p class="formation-card-desc">{{ Str::limit($formation->description, 110) }}</p>
                
                <div class="formation-card-footer">
                  <span class="text-muted small"><i class="bi bi-clock me-1 text-warning"></i> {{ $formation->duration }}</span>
                  @if($formation->price > 0)
                  <span class="formation-card-price">{{ number_format($formation->price, 0, ',', ' ') }} €</span>
                  @else
                  <span class="fw-bold text-success">Sur devis</span>
                  @endif
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <!-- Carousel Navigation Controls -->
        <div class="formation-circle-nav">
          <button type="button" class="circle-arrow-btn" id="circlePrevBtn" aria-label="Formation précédente">
            <i class="bi bi-chevron-left"></i>
          </button>
          
          <div class="formation-circle-dots" id="formationCircleDots">
            @foreach($formations as $formation)
            <span class="formation-circle-dot {{ $loop->first ? 'active' : '' }}" data-index="{{ $loop->index }}"></span>
            @endforeach
          </div>

          <button type="button" class="circle-arrow-btn" id="circleNextBtn" aria-label="Formation suivante">
            <i class="bi bi-chevron-right"></i>
          </button>

          <button type="button" class="circle-auto-toggle active ms-2" id="circleAutoToggle">
            <i class="bi bi-pause-fill"></i> Auto
          </button>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('home.old') }}" class="btn btn-warning rounded-pill px-5 py-2 fw-bold shadow-sm" style="background-color: #ff7a00; color: #ffffff; border: none; font-size: 0.95rem;">Voir tout le catalogue</a>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
          const stage = document.getElementById('formationCircleStage');
          const ring = document.getElementById('formationCircleRing');
          if (!ring || !stage) return;

          const items = ring.querySelectorAll('.formation-circle-item');
          const total = items.length;
          if (total === 0) return;

          let currentAngle = 0;
          let targetAngle = 0;
          let isAutoRotating = true;
          let isHovered = false;
          let isDragging = false;
          let startX = 0;
          let startAngle = 0;
          let lastTime = performance.now();
          const speedDegPerSec = 14; // Smooth continuous glide

          function getRadius() {
            const w = window.innerWidth;
            if (w < 576) return 210;
            if (w < 992) return 290;
            return 380;
          }

          function layoutCircle() {
            const radius = getRadius();
            const angleStep = 360 / total;
            items.forEach(function(item, index) {
              const angle = index * angleStep;
              item.style.transform = 'rotateY(' + angle + 'deg) translateZ(' + radius + 'px)';
              item.dataset.initialAngle = angle;
            });
          }

          function updateDepthAndBadges() {
            const angleStep = 360 / total;
            let norm = ((-currentAngle % 360) + 360) % 360;
            let activeIndex = Math.round(norm / angleStep) % total;

            items.forEach(function(item, index) {
              const initialAngle = parseFloat(item.dataset.initialAngle || 0);
              let relAngle = ((initialAngle + currentAngle) % 360 + 360) % 360;
              if (relAngle > 180) relAngle -= 360;

              const dist = Math.abs(relAngle) / 180;
              const opacity = 1.0 - (dist * 0.45);
              const blur = dist > 0.6 ? (dist - 0.6) * 4 : 0;

              item.style.filter = blur > 0.5 ? 'blur(' + blur.toFixed(1) + 'px)' : 'none';
              item.style.opacity = opacity.toFixed(2);

              if (index === activeIndex) {
                item.classList.add('active-front');
              } else {
                item.classList.remove('active-front');
              }
            });

            const dots = document.querySelectorAll('.formation-circle-dot');
            dots.forEach(function(dot, index) {
              if (index === activeIndex) {
                dot.classList.add('active');
              } else {
                dot.classList.remove('active');
              }
            });
          }

          function animLoop(now) {
            const dt = Math.min((now - lastTime) / 1000, 0.1);
            lastTime = now;

            if (isAutoRotating && !isHovered && !isDragging) {
              targetAngle -= speedDegPerSec * dt;
            }

            if (!isDragging) {
              currentAngle += (targetAngle - currentAngle) * 0.12;
            }

            ring.style.transform = 'translate(-50%, -50%) rotateY(' + currentAngle + 'deg)';
            updateDepthAndBadges();

            requestAnimationFrame(animLoop);
          }

          const nextBtn = document.getElementById('circleNextBtn');
          const prevBtn = document.getElementById('circlePrevBtn');
          const toggleBtn = document.getElementById('circleAutoToggle');

          function next() {
            const angleStep = 360 / total;
            targetAngle = Math.round(targetAngle / angleStep) * angleStep - angleStep;
          }

          function prev() {
            const angleStep = 360 / total;
            targetAngle = Math.round(targetAngle / angleStep) * angleStep + angleStep;
          }

          if (nextBtn) nextBtn.addEventListener('click', function(e) { e.preventDefault(); next(); });
          if (prevBtn) prevBtn.addEventListener('click', function(e) { e.preventDefault(); prev(); });

          if (toggleBtn) {
            toggleBtn.addEventListener('click', function() {
              isAutoRotating = !isAutoRotating;
              toggleBtn.classList.toggle('active', isAutoRotating);
              toggleBtn.innerHTML = isAutoRotating ? '<i class="bi bi-pause-fill"></i> Auto' : '<i class="bi bi-play-fill"></i> Reprendre';
            });
          }

          stage.addEventListener('mouseenter', function() { isHovered = true; });
          stage.addEventListener('mouseleave', function() { isHovered = false; });

          stage.addEventListener('mousedown', function(e) {
            isDragging = true;
            startX = e.clientX;
            startAngle = currentAngle;
          });

          window.addEventListener('mousemove', function(e) {
            if (!isDragging) return;
            const dx = e.clientX - startX;
            currentAngle = startAngle + (dx * 0.35);
            targetAngle = currentAngle;
          });

          window.addEventListener('mouseup', function() {
            if (!isDragging) return;
            isDragging = false;
            const angleStep = 360 / total;
            targetAngle = Math.round(currentAngle / angleStep) * angleStep;
          });

          stage.addEventListener('touchstart', function(e) {
            isDragging = true;
            startX = e.touches[0].clientX;
            startAngle = currentAngle;
          }, { passive: true });

          stage.addEventListener('touchmove', function(e) {
            if (!isDragging) return;
            const dx = e.touches[0].clientX - startX;
            currentAngle = startAngle + (dx * 0.35);
            targetAngle = currentAngle;
          }, { passive: true });

          stage.addEventListener('touchend', function() {
            if (!isDragging) return;
            isDragging = false;
            const angleStep = 360 / total;
            targetAngle = Math.round(currentAngle / angleStep) * angleStep;
          });

          items.forEach(function(item, index) {
            item.addEventListener('click', function() {
              const angleStep = 360 / total;
              const normTarget = Math.round(targetAngle / 360) * 360;
              targetAngle = normTarget - (index * angleStep);
            });
          });

          const dots = document.querySelectorAll('.formation-circle-dot');
          dots.forEach(function(dot) {
            dot.addEventListener('click', function() {
              const idx = parseInt(dot.dataset.index);
              const angleStep = 360 / total;
              const normTarget = Math.round(targetAngle / 360) * 360;
              targetAngle = normTarget - (idx * angleStep);
            });
          });

          window.addEventListener('resize', layoutCircle);

          layoutCircle();
          requestAnimationFrame(animLoop);
        });
        </script>
        @else
        <div class="text-center p-5 bg-white rounded-4 shadow-sm border border-light">
            <i class="bi bi-calendar-x text-muted" style="font-size: 3rem;"></i>
            <p class="text-muted mt-3 mb-0 fw-semibold">Aucune formation n'est programmée pour le moment.</p>
        </div>
        @endif
      </div>
    </section><!-- /Formations Section -->
    <!-- Why Choose Us Section -->
    <section id="features" class="features section py-5" style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.93) 0%, rgba(248, 249, 252, 0.95) 100%), url('{{ asset('assets/img/services.jpg') }}') center/cover no-repeat scroll;">

      <div class="container">

        <div class="section-title text-center mb-5" data-aos="fade-up">
          <h2 class="fw-bold" style="color: #000f3c;">Pourquoi nous choisir ?</h2>
          <p class="text-muted">Parce que nous mettons votre satisfaction au cœur de nos priorités.</p>
        </div>

        <div class="row gy-4">
          <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <img src="{{ asset('assets/img/features-bg.jpg') }}" alt="Why Choose CAEI" class="img-fluid rounded shadow" loading="lazy">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-content-center">

            <div class="features-item d-flex ps-0 ps-lg-3 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-award flex-shrink-0 text-warning fs-3 me-3"></i>
              <div>
                <h4 class="fw-bold" style="color: #000f3c;">EXPERIENCE ET EXPERTISE</h4>
                <p class="text-muted">Avec des années d'expérience dans le domaine, nous offrons une expertise inégalée pour répondre à vos besoins spécifiques, tout en respectant strictement vos délais.</p>
              </div>
            </div><!-- End Features Item-->

            <div class="features-item d-flex mt-4 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle flex-shrink-0 text-warning fs-3 me-3"></i>
              <div>
                <h4 class="fw-bold" style="color: #000f3c;">ENGAGÉ POUR VOTRE SUCCÈS</h4>
                <p class="text-muted">Nous nous engageons à vous fournir des solutions innovantes et efficaces pour atteindre vos objectifs dans les délais impartis.</p>
              </div>
            </div><!-- End Features Item-->

            <div class="features-item d-flex mt-4 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-star flex-shrink-0 text-warning fs-3 me-3"></i>
              <div>
                <h4 class="fw-bold" style="color: #000f3c;">QUALITÉ ET FIABILITÉ</h4>
                <p class="text-muted">La qualité est notre priorité, garantissant des résultats qui dépassent vos attentes à chaque étape du processus, dans le respect de vos échéances.</p>
              </div>
            </div><!-- End Features Item-->

            <div class="features-item d-flex mt-4 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-clock-history flex-shrink-0 text-warning fs-3 me-3"></i>
              <div>
                <h4 class="fw-bold" style="color: #000f3c;">RESPECT DES DEADLINES</h4>
                <p class="text-muted">Nous sommes fiers de notre réputation de fiabilité et de notre engagement envers l'excellence dans tout ce que nous entreprenons, en livrant toujours à temps.</p>
              </div>
            </div><!-- End Features Item-->

          </div>
        </div>

      </div>

    </section><!-- /Why Choose Us Section -->

    <!-- Agences Section -->
    <section id="agencies" class="agencies section py-5" style="background: linear-gradient(135deg, rgba(248, 249, 252, 0.92) 0%, rgba(255, 255, 255, 0.95) 100%), url('{{ asset('assets/img/company.jpg') }}') center/cover no-repeat scroll;">
      <div class="container" data-aos="fade-up">
        <div class="section-title text-center mb-5" data-aos="fade-up">
          <h2 class="fw-bold" style="color: #000f3c;">Nos Agences</h2>
          <p class="text-muted">Découvrez nos différentes plateformes en ligne pour mieux nous connaître.</p>
        </div>

        <div class="row gy-4 justify-content-center">
          <!-- Agence 1 - Elite Training -->
          <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center d-flex align-items-center justify-content-center" style="animation: floatCardWave 4s ease-in-out infinite; animation-delay: 0s; height: 100%; min-height: 200px;">
              <a href="{{ route('elite.training') }}" class="rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="background: linear-gradient(135deg, rgb(203, 225, 247) 0%, #003d7a 100%); width: 130px; height: 130px; text-decoration: none; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);" onmouseover="this.style.transform='scale(1.15) rotate(5deg)'; this.style.boxShadow='0 15px 35px rgba(0,61,122,0.4)';" onmouseout="this.style.transform='scale(1) rotate(0deg)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)';">
                <img src="{{ asset('assets/img/logo_elite_norm.png') }}" alt="CAEI Elite Training" style="width: 85px; height: 85px; object-fit: contain;">
              </a>
            </div>
          </div>

          <!-- Agence 2 - Medical Services -->
          <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center d-flex align-items-center justify-content-center" style="animation: floatCardWave 4s ease-in-out infinite; animation-delay: 0.5s; height: 100%; min-height: 200px;">
              <a href="{{ route('medical.services') }}" class="rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="background: linear-gradient(135deg, rgb(206, 241, 247) 0%, #138496 100%); width: 130px; height: 130px; text-decoration: none; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);" onmouseover="this.style.transform='scale(1.15) rotate(-5deg)'; this.style.boxShadow='0 15px 35px rgba(19,132,150,0.4)';" onmouseout="this.style.transform='scale(1) rotate(0deg)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)';">
                <img src="{{ asset('assets/img/logo_medical_norm.png') }}" alt="CAEI Medical Services" style="width: 85px; height: 85px; object-fit: contain;">
              </a>
            </div>
          </div>

          <!-- Agence 3 - Digital Moov -->
          <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="300">
            <div class="text-center d-flex align-items-center justify-content-center" style="animation: floatCardWave 4s ease-in-out infinite; animation-delay: 1s; height: 100%; min-height: 200px;">
              <a href="{{ route('digitalmoov') }}" class="rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="background: linear-gradient(135deg, rgb(248, 239, 219) 0%, #b37700 100%); width: 130px; height: 130px; text-decoration: none; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);" onmouseover="this.style.transform='scale(1.15) rotate(5deg)'; this.style.boxShadow='0 15px 35px rgba(179,119,0,0.4)';" onmouseout="this.style.transform='scale(1) rotate(0deg)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)';">
                <img src="{{ asset('assets/img/logo_digitalmoov_norm.png') }}" alt="CAEI Digital Moov" style="width: 85px; height: 85px; object-fit: contain;">
              </a>
            </div>
          </div>

          <!-- Agence 4 - Call Center -->
          <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="400">
            <div class="text-center d-flex align-items-center justify-content-center" style="animation: floatCardWave 4s ease-in-out infinite; animation-delay: 1.5s; height: 100%; min-height: 200px;">
              <a href="{{ route('callcenter.index') }}" target="_blank" class="rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="background: linear-gradient(135deg, rgb(236, 229, 231) 0%, #6b0f2a 100%); width: 130px; height: 130px; text-decoration: none; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);" onmouseover="this.style.transform='scale(1.15) rotate(-5deg)'; this.style.boxShadow='0 15px 35px rgba(107,15,42,0.4)';" onmouseout="this.style.transform='scale(1) rotate(0deg)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)';">
                <img src="{{ asset('assets/img/logo_callcenter_norm.png') }}" alt="CAEI Call Center" style="width: 85px; height: 85px; object-fit: contain;">
              </a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Agencies Section -->

    <!-- About Agencies Section -->
    <section id="about-agencies" class="about-agencies section py-5">
      <div class="container" data-aos="fade-up">
        
        <div class="section-title text-center mb-5" data-aos="fade-up">
          <span class="badge rounded-pill px-3 py-2 mb-2" style="background: rgba(255, 122, 0, 0.2) !important; color: #ff7a00 !important; border: 1px solid rgba(255, 122, 0, 0.5) !important; font-size: 13px; letter-spacing: 1px;">FILIALES DU GROUPE</span>
          <h2 class="fw-bold text-white mt-2" style="color: #ffffff !important; font-size: 36px; text-shadow: 0 2px 10px rgba(0,0,0,0.8);">À PROPOS DE NOS AGENCES</h2>
          <p style="color: rgba(255, 255, 255, 0.75) !important; font-size: 16px;">Une synergie d'expertises au service de l'excellence et du développement panafricain.</p>
        </div>

        <div class="row gy-4">

          <!-- Agence 1 - Elite Training -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="about-agency-photo-card card-elite">
              <div class="card-overlay"></div>
              <div class="card-body-content d-flex flex-column justify-content-between h-100">
                <div>
                  <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="agency-logo-wrapper" style="background: linear-gradient(135deg, rgba(255, 122, 0, 0.3) 0%, rgba(0, 31, 63, 0.8) 100%);">
                      <img src="{{ asset('assets/img/elite_training_logo.png') }}" alt="CAEI Elite Training Logo">
                    </div>
                    <div>
                      <span class="badge mb-1 px-3 py-1" style="background: rgba(255, 122, 0, 0.25); color: #ff7a00; border: 1px solid rgba(255, 122, 0, 0.5); font-size: 11px;">Formation & Cadres</span>
                      <h3 class="fw-bold text-white mb-0" style="color: #ffffff !important; font-size: 24px; text-shadow: 0 2px 10px rgba(0,0,0,0.9);">CAEI ELITE TRAINING</h3>
                    </div>
                  </div>

                  <p class="text-white mb-4" style="font-size: 15px; line-height: 1.7; opacity: 0.95; text-shadow: 0 1px 4px rgba(0,0,0,0.8);">
                    Le CAEI a pour mission de former les cadres et élites africaines pour les aider à relever les défis de développement auxquels le continent est confronté.
                  </p>

                  <ul class="list-unstyled text-white mb-0" style="font-size: 14px; text-shadow: 0 1px 4px rgba(0,0,0,0.8);">
                    <li class="mb-2 d-flex align-items-start gap-2">
                      <i class="bi bi-check-circle-fill text-warning fs-6 mt-0.5"></i>
                      <span class="text-white fw-medium">Formations dispensées par des experts de renommée internationale et africains.</span>
                    </li>
                    <li class="mb-2 d-flex align-items-start gap-2">
                      <i class="bi bi-check-circle-fill text-warning fs-6 mt-0.5"></i>
                      <span class="text-white fw-medium">Réseau d'institutions partenaires à travers tout le continent africain.</span>
                    </li>
                    <li class="d-flex align-items-start gap-2">
                      <i class="bi bi-check-circle-fill text-warning fs-6 mt-0.5"></i>
                      <span class="text-white fw-medium">Promotion active de la coopération entre les pays africains et l'international.</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Agence 2 - Digital Moov -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="about-agency-photo-card card-digital">
              <div class="card-overlay"></div>
              <div class="card-body-content d-flex flex-column justify-content-between h-100">
                <div>
                  <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="agency-logo-wrapper" style="background: linear-gradient(135deg, rgba(204, 136, 0, 0.35) 0%, rgba(0, 31, 63, 0.8) 100%);">
                      <img src="{{ asset('assets/img/caeidm02.png') }}" alt="CAEI Digital Moov Logo" style="transform: scale(1.2);">
                    </div>
                    <div>
                      <span class="badge mb-1 px-3 py-1" style="background: rgba(204, 136, 0, 0.3); color: #ffca66; border: 1px solid rgba(204, 136, 0, 0.6); font-size: 11px;">Transformation Digitale</span>
                      <h3 class="fw-bold text-white mb-0" style="color: #ffffff !important; font-size: 24px; text-shadow: 0 2px 10px rgba(0,0,0,0.9);">CAEI DIGITAL MOOV</h3>
                    </div>
                  </div>

                  <p class="text-white mb-4" style="font-size: 15px; line-height: 1.7; opacity: 0.95; text-shadow: 0 1px 4px rgba(0,0,0,0.8);">
                    Chez Digital Moov, nous sommes bien plus qu'une agence de marketing digital. Nous sommes des visionnaires et stratèges déterminés à transformer votre présence en ligne.
                  </p>

                  <ul class="list-unstyled text-white mb-0" style="font-size: 14px; text-shadow: 0 1px 4px rgba(0,0,0,0.8);">
                    <li class="mb-2 d-flex align-items-start gap-2">
                      <i class="bi bi-check-circle-fill text-warning fs-6 mt-0.5"></i>
                      <span class="text-white fw-medium">Création de stratégies digitales sur-mesure et expérience de marque captivante.</span>
                    </li>
                    <li class="mb-2 d-flex align-items-start gap-2">
                      <i class="bi bi-check-circle-fill text-warning fs-6 mt-0.5"></i>
                      <span class="text-white fw-medium">Développement d'outils numériques performants et orientés rentabilité.</span>
                    </li>
                    <li class="d-flex align-items-start gap-2">
                      <i class="bi bi-check-circle-fill text-warning fs-6 mt-0.5"></i>
                      <span class="text-white fw-medium">Accompagnement continu pour atteindre de nouveaux sommets dans le monde numérique.</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Agence 3 - Medical Services -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="about-agency-photo-card card-medical">
              <div class="card-overlay"></div>
              <div class="card-body-content d-flex flex-column justify-content-between h-100">
                <div>
                  <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="agency-logo-wrapper" style="background: linear-gradient(135deg, rgba(23, 162, 184, 0.35) 0%, rgba(0, 31, 63, 0.8) 100%);">
                      <img src="{{ asset('assets/img/t.png') }}" alt="CAEI Medical Services Logo">
                    </div>
                    <div>
                      <span class="badge mb-1 px-3 py-1" style="background: rgba(23, 162, 184, 0.3); color: #7ddbf0; border: 1px solid rgba(23, 162, 184, 0.6); font-size: 11px;">Santé & Accompagnement</span>
                      <h3 class="fw-bold text-white mb-0" style="color: #ffffff !important; font-size: 24px; text-shadow: 0 2px 10px rgba(0,0,0,0.9);">CAEI MEDICAL SERVICES</h3>
                    </div>
                  </div>

                  <p class="text-white mb-4" style="font-size: 15px; line-height: 1.7; opacity: 0.95; text-shadow: 0 1px 4px rgba(0,0,0,0.8);">
                    CAEI MEDICAL SERVICES est une agence internationale de services médicaux assurant la prise en charge complète des patients étrangers désirant se soigner en Tunisie.
                  </p>

                  <ul class="list-unstyled text-white mb-0" style="font-size: 14px; text-shadow: 0 1px 4px rgba(0,0,0,0.8);">
                    <li class="mb-2 d-flex align-items-start gap-2">
                      <i class="bi bi-check-circle-fill text-warning fs-6 mt-0.5"></i>
                      <span class="text-white fw-medium">Prise en charge personnalisée des séjours de soins et interventions chirurgicales.</span>
                    </li>
                    <li class="mb-2 d-flex align-items-start gap-2">
                      <i class="bi bi-check-circle-fill text-warning fs-6 mt-0.5"></i>
                      <span class="text-white fw-medium">Logistique médicale rigoureuse, personnel dédié et accompagnement relationnel.</span>
                    </li>
                    <li class="d-flex align-items-start gap-2">
                      <i class="bi bi-check-circle-fill text-warning fs-6 mt-0.5"></i>
                      <span class="text-white fw-medium">Référence en Afrique pour l'accès aux meilleures conditions de soins et de confort.</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Agence 4 - Call Center -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="about-agency-photo-card card-call">
              <div class="card-overlay"></div>
              <div class="card-body-content d-flex flex-column justify-content-between h-100">
                <div>
                  <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="agency-logo-wrapper" style="background: linear-gradient(135deg, rgba(139, 21, 56, 0.4) 0%, rgba(0, 31, 63, 0.8) 100%);">
                      <img src="{{ asset('assets/img/CAEICALL.png') }}" alt="CAEI Call Center Logo" style="transform: scale(1.2);">
                    </div>
                    <div>
                      <span class="badge mb-1 px-3 py-1" style="background: rgba(139, 21, 56, 0.35); color: #ff99b3; border: 1px solid rgba(139, 21, 56, 0.6); font-size: 11px;">Relation Client & Télécom</span>
                      <h3 class="fw-bold text-white mb-0" style="color: #ffffff !important; font-size: 24px; text-shadow: 0 2px 10px rgba(0,0,0,0.9);">CAEI CALL CENTER</h3>
                    </div>
                  </div>

                  <p class="text-white mb-4" style="font-size: 15px; line-height: 1.7; opacity: 0.95; text-shadow: 0 1px 4px rgba(0,0,0,0.8);">
                    Centre de télécommunication centralisé et international offrant des solutions professionnelles sur-mesure pour traiter les besoins des entreprises et de leurs clients.
                  </p>

                  <ul class="list-unstyled text-white mb-0" style="font-size: 14px; text-shadow: 0 1px 4px rgba(0,0,0,0.8);">
                    <li class="mb-2 d-flex align-items-start gap-2">
                      <i class="bi bi-check-circle-fill text-warning fs-6 mt-0.5"></i>
                      <span class="text-white fw-medium">Services d'assistance, support technique, télévente e-commerce et SAV.</span>
                    </li>
                    <li class="mb-2 d-flex align-items-start gap-2">
                      <i class="bi bi-check-circle-fill text-warning fs-6 mt-0.5"></i>
                      <span class="text-white fw-medium">Plus de 14 ans d'expertise dans la gestion de la relation client internationale.</span>
                    </li>
                    <li class="d-flex align-items-start gap-2">
                      <i class="bi bi-check-circle-fill text-warning fs-6 mt-0.5"></i>
                      <span class="text-white fw-medium">Prise de rendez-vous et gestion centralisée des requêtes à haute valeur ajoutée.</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- /About Agencies Section -->

    <!-- Section Séminaires déplacée vers /ancien-accueil -->

    <style>
  .service-card-modern {
    position: relative;
    overflow: hidden;
    border-radius: 24px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    min-height: 380px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 30px;
    transition: all 0.4s ease;
    cursor: pointer;
  }
  .service-card-modern .service-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    transition: transform 0.6s ease;
    z-index: 1;
  }
  .service-card-modern .service-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0,15,60,0.1) 0%, rgba(0,15,60,0.95) 100%);
    z-index: 2;
  }
  .service-card-modern:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,15,60,0.3);
  }
  .service-card-modern:hover .service-bg {
    transform: scale(1.1);
  }
  .service-card-modern .service-content {
    position: relative;
    z-index: 3;
    text-align: center;
  }
  .service-card-modern h3 {
    color: #ff7a00 !important;
    font-size: 22px;
    font-weight: 900;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-shadow: 0 2px 4px rgba(0,0,0,0.8);
  }
  .service-card-modern p {
    color: #ffffff !important;
    font-size: 14.5px;
    line-height: 1.6;
    opacity: 0.95;
    margin: 0;
    text-shadow: 0 1px 2px rgba(0,0,0,0.8);
  }
</style>
    <!-- Services Section -->
    <section id="services" class="services section py-5" style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.93) 0%, rgba(248, 249, 252, 0.95) 100%), url('{{ asset('assets/img/img3.jpg') }}') center/cover no-repeat scroll;">
      <div class="container section-title text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold" style="color: #000f3c;">Services</h2>
        <p class="text-muted">Découvrez notre gamme complète de services conçus pour répondre à vos besoins</p>
      </div>
      <div class="container">
        <div class="row gy-4">
          
          <!-- Service 1 -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-card-modern h-100">
              <div class="service-bg" style="background-image: url('{{ asset('assets/img/service_webdesign_1786525611976.jpg') }}');"></div>
              <div class="service-overlay"></div>
              <div class="service-content">
                <h3>Responsive Web Design</h3>
                <p>De la compréhension initiale de vos besoins à la mise en ligne finale, notre processus de création de sites web est conçu pour vous offrir une expérience fluide et un site web exceptionnel qui reflète parfaitement votre vision.</p>
              </div>
            </div>
          </div>

          <!-- Service 2 -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-card-modern h-100">
              <div class="service-bg" style="background-image: url('{{ asset('assets/img/service_marketing_1786525623115.jpg') }}');"></div>
              <div class="service-overlay"></div>
              <div class="service-content">
                <h3>Stratégie Marketing Digital</h3>
                <p>Nous développons des stratégies marketing complètes adaptées à votre entreprise pour augmenter votre visibilité en ligne et atteindre vos objectifs commerciaux.</p>
              </div>
            </div>
          </div>

          <!-- Service 3 -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-card-modern h-100">
              <div class="service-bg" style="background-image: url('{{ asset('assets/img/service_consulting_1786525632369.jpg') }}');"></div>
              <div class="service-overlay"></div>
              <div class="service-content">
                <h3>Consulting & Support</h3>
                <p>Notre équipe d'experts vous accompagne dans la transformation de votre entreprise avec des solutions personnalisées et un support continu.</p>
              </div>
            </div>
          </div>

          <!-- Service 4 -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-card-modern h-100">
              <div class="service-bg" style="background-image: url('{{ asset('assets/img/service_medical_1786525641121.jpg') }}');"></div>
              <div class="service-overlay"></div>
              <div class="service-content">
                <h3>Accompagnement Médical</h3>
                <p>L'accompagnement médical est un aspect crucial des soins de santé moderne, offrant un soutien continu et personnalisé aux patients tout au long de leur parcours médical.</p>
              </div>
            </div>
          </div>

          <!-- Service 5 -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-card-modern h-100">
              <div class="service-bg" style="background-image: url('{{ asset('assets/img/service_callcenter_1786525651775.jpg') }}');"></div>
              <div class="service-overlay"></div>
              <div class="service-content">
                <h3>Service Clientèle Unique</h3>
                <p>Fournissez une expérience client exceptionnelle grâce à notre service client dédié. Nous sommes là pour répondre aux questions, résoudre les problèmes et garantir la satisfaction.</p>
              </div>
            </div>
          </div>

          <!-- Service 6 -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-card-modern h-100">
              <div class="service-bg" style="background-image: url('{{ asset('assets/img/service_training_1786525661524.jpg') }}');"></div>
              <div class="service-overlay"></div>
              <div class="service-content">
                <h3>Formation Continue</h3>
                <p>Nous proposons des programmes de formation continue adaptés aux besoins spécifiques de nos partenaires, avec une expertise de pointe et une expérience pratique.</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- /Services Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background py-5 position-relative" style="background: url('{{ asset('assets/img/cta-bg.jpg') }}') center/cover; background-attachment: scroll;">
      <div class="position-absolute w-100 h-100" style="top: 0; left: 0; background: rgba(0, 15, 60, 0.7);"></div>
      <div class="container position-relative text-center text-white py-4" style="z-index: 2;" data-aos="zoom-in">
        <h3>Prêt à Transformer Votre Entreprise ?</h3>
        <p>Découvrez comment nos services peuvent vous aider à atteindre vos objectifs. Contactez-nous dès aujourd'hui.</p>
        <a class="btn btn-warning rounded-pill px-4 py-2 fw-bold mt-3" href="#contact" style="background-color: #ff7a00; color: #ffffff; border: none;">Nous Contacter</a>
      </div>
    </section><!-- /Call To Action Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section py-5" style="background: linear-gradient(135deg, rgba(248, 249, 252, 0.92) 0%, rgba(255, 255, 255, 0.95) 100%), url('{{ asset('assets/img/im1.jpg') }}') center/cover no-repeat scroll;">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 align-items-center justify-content-between">
          <div class="col-lg-5">
            <img src="{{ asset('assets/img/company.jpg') }}" alt="CAEI Company" class="img-fluid rounded shadow" loading="lazy">
          </div>
          <div class="col-lg-6">
            <h3 class="fw-bold mb-3" style="color: #000f3c; font-size: 28px;">Notre Excellence en Chiffres</h3>
            <p class="text-muted">
              Le CAEI regroupe des experts et élites africains de renommée internationale. Depuis plus de 14 ans, nous contribuons au développement du continent africain à travers nos quatre domaines d'expertise: formation, services médicaux, transformation digitale et centre d'appels.
            </p>
            <div class="row gy-4 mt-2">
              <div class="col-6">
                <div class="d-flex align-items-center">
                  <i class="bi bi-emoji-smile text-warning fs-2 me-3"></i>
                  <div>
                    <h3 class="fw-bold mb-0"><span data-purecounter-start="0" data-purecounter-end="337" data-purecounter-duration="1" class="purecounter">337</span></h3>
                    <p class="small text-muted mb-0">Clients Satisfaits</p>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="d-flex align-items-center">
                  <i class="bi bi-journal-richtext text-warning fs-2 me-3"></i>
                  <div>
                    <h3 class="fw-bold mb-0"><span data-purecounter-start="0" data-purecounter-end="200" data-purecounter-duration="1" class="purecounter">200</span></h3>
                    <p class="small text-muted mb-0">Projets Réalisés</p>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="d-flex align-items-center">
                  <i class="bi bi-headset text-warning fs-2 me-3"></i>
                  <div>
                    <h3 class="fw-bold mb-0"><span data-purecounter-start="0" data-purecounter-end="14" data-purecounter-duration="1" class="purecounter">14</span></h3>
                    <p class="small text-muted mb-0">Années d'Expérience</p>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="d-flex align-items-center">
                  <i class="bi bi-people text-warning fs-2 me-3"></i>
                  <div>
                    <h3 class="fw-bold mb-0"><span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter">150</span></h3>
                    <p class="small text-muted mb-0">Experts Qualifiés</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Stats Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section dark-background py-5 position-relative" style="background: url('{{ asset('assets/img/testimonials-bg.jpg') }}') center/cover; background-attachment: scroll;">
      <div class="position-absolute w-100 h-100" style="top: 0; left: 0; background: rgba(0, 15, 60, 0.8);"></div>
      <div class="container position-relative text-white py-4" style="z-index: 2;" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">
            <div class="swiper-slide text-center px-lg-5">
              <h3 class="fw-bold">Tariq Kamara</h3>
              <div class="stars my-2 text-warning">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p class="fst-italic max-w-2xl mx-auto">
                <i class="bi bi-quote fs-4 me-2"></i>
                <span>J'ai récemment eu l'occasion de contacter le service client de CAEI et je tiens à partager mon expérience extrêmement positive. Le personnel s'est montré professionnel, amical et dévoué.</span>
                <i class="bi bi-quote fs-4 ms-2"></i>
              </p>
            </div>
            <div class="swiper-slide text-center px-lg-5">
              <h3 class="fw-bold">Kofi Asante</h3>
              <div class="stars my-2 text-warning">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p class="fst-italic max-w-2xl mx-auto">
                <i class="bi bi-quote fs-4 me-2"></i>
                <span>Ma collaboration avec CAEI Marketing Solutions a été une expérience véritablement enrichissante. Leur équipe a démontré une compréhension approfondie des tendances du marché et une créativité exceptionnelle.</span>
                <i class="bi bi-quote fs-4 ms-2"></i>
              </p>
            </div>
            <div class="swiper-slide text-center px-lg-5">
              <h3 class="fw-bold">Fatou Diop</h3>
              <div class="stars my-2 text-warning">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p class="fst-italic max-w-2xl mx-auto">
                <i class="bi bi-quote fs-4 me-2"></i>
                <span>Travailler avec CAEI Marketing Solutions a été une véritable révélation. Leur équipe a su allier expertise du marché et innovation pour créer des stratégies efficaces et impactantes.</span>
                <i class="bi bi-quote fs-4 ms-2"></i>
              </p>
            </div>
          </div>
          <div class="swiper-pagination mt-4"></div>
        </div>
      </div>
    </section><!-- /Testimonials Section -->

    <!-- FAQ Section -->
    <section id="faq" class="faq section py-5" style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.93) 0%, rgba(248, 249, 252, 0.95) 100%), url('{{ asset('assets/img/features-bg.jpg') }}') center/cover no-repeat scroll;">
      <div class="container section-title text-center mb-5" data-aos="fade-up">
        <h2>Foire Aux Questions</h2>
        <p>Retrouvez toutes les réponses aux questions les plus fréquentes sur CAEI Company Group.</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="accordion faq-accordion" id="faqAccordion">
              
              <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                    <i class="bi bi-question-circle text-warning me-2"></i> Quels sont les domaines d'intervention de CAEI Company Group ?
                  </button>
                </h2>
                <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    CAEI Company Group est structuré autour de 4 filiales stratégiques : <strong>CAEI Elite Training</strong> (formation professionnelle et séminaires d'élite), <strong>CAEI Medical Services</strong> (evacuation et accompagnement médical international), <strong>CAEI Digital Moov</strong> (transformation digitale & marketing web), et <strong>CAEI Call Center</strong> (centre de relation client et support international).
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                    <i class="bi bi-question-circle text-warning me-2"></i> Comment s'inscrire à un séminaire ou une formation CAEI Elite Training ?
                  </button>
                </h2>
                <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    Vous pouvez consulter le catalogue complet de nos formations et séminaires directement sur notre plateforme ou en téléchargeant notre catalogue officiel. Pour réserver votre place, il vous suffit de créer un compte dans votre espace participant ou de nous contacter directement par téléphone ou email.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                    <i class="bi bi-question-circle text-warning me-2"></i> Quel est le périmètre géographique des services du groupe ?
                  </button>
                </h2>
                <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    Présent à l'échelle panafricaine avec son siège à Tunis, le CAEI collabore avec des experts, institutions et entreprises à travers toute l'Afrique, l'Europe et le Moyen-Orient.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                    <i class="bi bi-question-circle text-warning me-2"></i> Comment bénéficier d'un devis sur-mesure pour votre entreprise ?
                  </button>
                </h2>
                <div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faqHeading4" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    Remplissez notre formulaire de contact ci-dessous ou contactez nos équipes par email à <a href="mailto:contact@caei-afri.com">contact@caei-afri.com</a>. Un conseiller dédié étudiera votre besoin et vous fournira une proposition détaillée sous 24 à 48 heures.
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section><!-- /FAQ Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section py-5" style="background: linear-gradient(135deg, rgba(248, 249, 252, 0.92) 0%, rgba(255, 255, 255, 0.95) 100%), url('{{ asset('assets/img/testimonials-bg.jpg') }}') center/cover no-repeat scroll;">
      <div class="container section-title text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold" style="color: #000f3c;">Contact</h2>
        <p class="text-muted">Nous Contacter</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
          <iframe style="border:0; width: 100%; height: 320px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3193.834574311178!2d10.1830528!3d36.82248380000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd35b9cfa80ec7%3A0xd60231ea76b2a886!2sCaei%20Company%20Group!5e0!3m2!1sen!2stn!4v1760713368246!5m2!1sen!2stn" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="row gy-4">
          <div class="col-lg-4">
            <div class="info-item d-flex border p-3 rounded mb-3" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-geo-alt text-warning fs-3 me-3"></i>
              <div>
                <h5 class="fw-bold" style="color: #000f3c;">Adresse</h5>
                <p class="mb-0"><a href="https://www.google.com/maps/search/?api=1&query=SIS+8+Rue+Claude+Bernard+1002+Belvedere-Tunis+Tunisie" target="_blank" class="text-decoration-none text-muted">SIS 8 Rue Claude Bernard 1002 Belvedere-Tunis, Tunisie</a></p>
              </div>
            </div>

            <div class="info-item d-flex border p-3 rounded mb-3" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone text-warning fs-3 me-3"></i>
              <div>
                <h5 class="fw-bold" style="color: #000f3c;">Appelez-nous</h5>
                <p class="mb-0 text-muted">+216 55 335 286</p>
              </div>
            </div>

            <div class="info-item d-flex border p-3 rounded mb-3" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-envelope text-warning fs-3 me-3"></i>
              <div>
                <h5 class="fw-bold" style="color: #000f3c;">Contactez-nous</h5>
                <p class="mb-0 text-muted">contact@caei-afri.com</p>
              </div>
            </div>
          </div>

          <div class="col-lg-8">
            <form action="{{ route('contact.send') }}" method="post" id="contactForm" class="p-4 border rounded bg-white shadow-sm" data-aos="fade-up" data-aos-delay="200">
              @csrf
              <div class="row gy-3">
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Votre Nom" required>
                </div>
                <div class="col-md-6">
                  <input type="email" class="form-control" name="email" placeholder="Votre Email" required>
                </div>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Sujet" required>
                </div>
                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="col-md-12 text-center mt-4">
                  <div id="formLoading" class="d-none text-muted mb-2"><i class="bi bi-arrow-repeat spin me-2"></i>Chargement...</div>
                  <div id="formError" class="alert alert-danger d-none mb-2"></div>
                  <div id="formSuccess" class="alert alert-success d-none mb-2">Votre message a été envoyé. Merci!</div>
                  <button type="submit" class="btn btn-warning rounded-pill px-4 text-white fw-bold" style="background-color: #ff7a00; color: #ffffff !important; border: none;">Envoyer le Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer dark-background py-5" style="background-color: #000f3c; color: rgba(255,255,255,0.7);">
    <div class="footer-top container mb-4">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ route('home') }}" class="logo d-flex align-items-center mb-3">
            <img src="{{ asset('assets/img/logocompany.png') }}" alt="CAEI Logo" style="max-height: 55px; width: auto; max-width: 220px; object-fit: contain;">
          </a>
          <div class="footer-contact pt-2 text-white-50">
            <p><a href="https://www.google.com/maps/search/?api=1&query=SIS+8+Rue+Claude+Bernard+1002+Belvedere-Tunis+Tunisie" target="_blank" style="color: inherit; text-decoration: none;">SIS 8 Rue Claude Bernard 1002 Belvedere-Tunis, Tunisie</a></p>
            <p class="mt-3"><strong>Téléphone:</strong> <span><a href="tel:+21655335286" style="color: inherit; text-decoration: none;">+216 55 335 286</a></span></p>
            <p><strong>Email:</strong> <span>contact@caei-afri.com</span></p>
          </div>
          <div class="social-links d-flex mt-4 gap-2">   
            <a href="https://www.facebook.com/CAEIAfrique/" target="_blank" class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/caei_afri/" target="_blank" class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;"><i class="bi bi-instagram"></i></a>
            <a href="https://www.linkedin.com/company/comit%C3%A9-africain-d-expertise-internationale-caei/?originalSubdomain=tn" target="_blank" class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4 class="text-white fw-bold mb-3" style="font-size: 16px;">Liens Utiles</h4>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="bi bi-chevron-right text-warning me-2"></i> <a href="#acceuil" class="text-decoration-none text-white-50">Accueil</a></li>
            <li class="mb-2"><i class="bi bi-chevron-right text-warning me-2"></i> <a href="#presentation" class="text-decoration-none text-white-50">Présentation</a></li>
            <li class="mb-2"><i class="bi bi-chevron-right text-warning me-2"></i> <a href="#services" class="text-decoration-none text-white-50">Nos solutions</a></li>
            <li class="mb-2"><i class="bi bi-chevron-right text-warning me-2"></i> <a href="#contact" class="text-decoration-none text-white-50">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4 class="text-white fw-bold mb-3" style="font-size: 16px;">Nos Agences</h4>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="bi bi-chevron-right text-warning me-2"></i> <a href="{{ route('elite.training') }}" class="text-decoration-none text-white-50">CAEI ELITE TRAINING</a></li>
            <li class="mb-2"><i class="bi bi-chevron-right text-warning me-2"></i> <a href="{{ route('medical.services') }}" class="text-decoration-none text-white-50">CAEI MEDICAL SERVICES</a></li>
            <li class="mb-2"><i class="bi bi-chevron-right text-warning me-2"></i> <a href="{{ route('digitalmoov') }}" class="text-decoration-none text-white-50">CAEI DIGITAL MOOV</a></li>
            <li class="mb-2"><i class="bi bi-chevron-right text-warning me-2"></i> <a href="{{ route('callcenter.index') }}" target="_blank" class="text-decoration-none text-white-50">CAEI CALL CENTER</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4 class="text-white fw-bold mb-3" style="font-size: 16px;">Notre Infolettre</h4>
          <p class="text-white-50">Abonnez-vous à notre infolettre et recevez les dernières nouvelles sur nos produits et services!</p>
          <form action="#" method="post" class="mt-3">
            @csrf
            <div class="input-group">
              <input type="email" name="email" class="form-control" placeholder="Votre email" required>
              <button class="btn btn-warning fw-bold" type="submit" style="background-color: #ff7a00; color: #ffffff; border: none;">S'abonner</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <hr style="border-color: rgba(255,255,255,0.1);">

    <div class="copyright text-center text-white-50 pt-3">
      <div class="container">
        <p class="mb-1">&copy; Copyright 2026 <strong class="text-white">CAEI Company Group</strong>. All Rights Reserved</p>
        <div class="credits text-white-50" style="font-size: 12px;">
          Designed by <a href="{{ route('digitalmoov') }}" class="text-decoration-none text-white fw-bold" style="color: #ffffff !important;">CAEI DIGITAL MOOV</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center bg-warning text-white rounded-circle shadow" style="width: 40px; height: 40px; position: fixed; bottom: 85px; right: 20px; left: auto; z-index: 999; display: none; transition: opacity 0.3s;"><i class="bi bi-arrow-up-short fs-4"></i></a>

  <!-- Chat Widget -->
  <div class="chat-widget">
    <div class="chat-menu" id="chatMenu">
      <h4>Comment nous contacter?</h4>
      <a href="https://wa.me/21655335286" target="_blank" class="chat-option whatsapp">
        <i class="bi bi-whatsapp"></i>
        <div class="chat-option-text">
          <strong>WhatsApp</strong>
          <span>Discuter maintenant</span>
        </div>
      </a>
      <a href="mailto:contact@caei-afri.com" class="chat-option email">
        <i class="bi bi-envelope-fill"></i>
        <div class="chat-option-text">
          <strong>Email</strong>
          <span>contact@caei-afri.com</span>
        </div>
      </a>
      <a href="tel:+21655335286" class="chat-option phone">
        <i class="bi bi-telephone-fill"></i>
        <div class="chat-option-text">
          <strong>Téléphone</strong>
          <span>+216 55 335 286</span>
        </div>
      </a>
    </div>
    <button class="chat-button" id="chatButton">
      <i class="bi bi-chat-dots-fill"></i>
    </button>
  </div>

  <!-- Vendor JS Files (via CDNs) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11.1.10/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/imagesloaded@5.0.0/imagesloaded.pkgd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/isotope-layout@3.0.6/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs@1.5.0/dist/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}" defer></script>

  <!-- Hide Topbar on Scroll, Keep Header Fixed -->
  <script>
    let lastScrollTop = 0;
    const topbar = document.getElementById('topbar');
    const header = document.getElementById('header');

    window.addEventListener('scroll', function() {
      let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
      
      if (currentScroll > lastScrollTop) {
        // Scrolling DOWN - Hide topbar
        if (topbar) {
          topbar.style.opacity = '0';
          topbar.style.visibility = 'hidden';
          topbar.style.transition = 'opacity 0.3s ease, visibility 0.3s ease';
        }
        if (header) header.style.top = '0';
      } else {
        // Scrolling UP - Show topbar
        if (topbar) {
          topbar.style.opacity = '1';
          topbar.style.visibility = 'visible';
          topbar.style.transition = 'opacity 0.3s ease, visibility 0.3s ease';
        }
        if (header) header.style.top = '35px';
      }
      
      lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    });
  </script>

  <!-- Chat Widget Script -->
  <script>
    const chatButton = document.getElementById('chatButton');
    const chatMenu = document.getElementById('chatMenu');
    
    if (chatButton && chatMenu) {
      chatButton.addEventListener('click', function() {
        chatMenu.classList.toggle('active');
      });
      
      // Close chat menu when clicking outside
      document.addEventListener('click', function(event) {
        const chatWidget = document.querySelector('.chat-widget');
        if (chatWidget && !chatWidget.contains(event.target)) {
          chatMenu.classList.remove('active');
        }
      });
    }
  </script>

  <!-- AJAX Contact Form Script -->
  <script>
    const contactForm = document.getElementById('contactForm');
    const formLoading = document.getElementById('formLoading');
    const formError = document.getElementById('formError');
    const formSuccess = document.getElementById('formSuccess');

    if (contactForm) {
      contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        formLoading.classList.remove('d-none');
        formError.classList.add('d-none');
        formSuccess.classList.add('d-none');

        const formData = new FormData(contactForm);

        fetch(contactForm.getAttribute('action'), {
          method: 'POST',
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          },
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          formLoading.classList.add('d-none');
          if (data.status === 'success') {
            formSuccess.classList.remove('d-none');
            contactForm.reset();
          } else {
            formError.textContent = data.message || "Une erreur est survenue lors de l'envoi du message.";
            formError.classList.remove('d-none');
          }
        })
        .catch(error => {
          formLoading.classList.add('d-none');
          formError.textContent = "Impossible de se connecter au serveur pour envoyer le message.";
          formError.classList.remove('d-none');
        });
      });
    }
  </script>

</body>

</html>
