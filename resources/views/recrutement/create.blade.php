<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ config('app.name', 'CAEI Plateforme') }} — Séminaires & Portail Officiel</title>
  <meta name="description" content="Consultez et inscrivez-vous aux séminaires CAEI Company Group. Formation professionnelle, gestion des participants et suivi de présence.">
  <meta name="keywords" content="CAEI, Elite Training, séminaires, formation, Afrique, Tunisie">

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
      background: linear-gradient(to bottom, rgba(0, 5, 24, 0.4) 0%, rgba(0, 5, 24, 0.8) 100%) !important;
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

    /* Cinematic Text Effects */
    .hero h2 {
      font-weight: 900 !important;
      letter-spacing: 2px !important;
      text-shadow: 0 10px 30px rgba(0, 0, 0, 0.7), 0 0 30px rgba(255, 255, 255, 0.15) !important;
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
      color: rgba(255, 255, 255, 0.9) !important;
      text-shadow: 0 2px 10px rgba(0,0,0,0.6) !important;
      font-weight: 500 !important;
    }

    .hero-badge-pill {
      background: rgba(255, 196, 81, 0.14) !important;
      border: 1px solid rgba(255, 196, 81, 0.45) !important;
      box-shadow: 0 0 25px rgba(255, 196, 81, 0.25) !important;
      backdrop-filter: blur(14px) !important;
      letter-spacing: 1px !important;
      font-weight: 700 !important;
    }

    /* Cinematic Glassmorphism Service Cards & Flying Animation */
    @keyframes floatCardWave {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    .hero-service-card {
      width: 160px !important;
      height: 160px !important;
      margin: 0 auto !important;
      padding: 16px !important;
      background: rgba(255, 255, 255, 0.07) !important;
      border: 1px solid rgba(255, 255, 255, 0.18) !important;
      backdrop-filter: blur(20px) !important;
      -webkit-backdrop-filter: blur(20px) !important;
      border-radius: 24px !important;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.45), inset 0 1px 0 rgba(255, 255, 255, 0.25) !important;
      transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1) !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      position: relative !important;
      overflow: hidden !important;
      animation: floatCardWave 4s ease-in-out infinite;
    }

    .col-6:nth-child(1) .hero-service-card { animation-delay: 0s; }
    .col-6:nth-child(2) .hero-service-card { animation-delay: 0.8s; }
    .col-6:nth-child(3) .hero-service-card { animation-delay: 1.6s; }
    .col-6:nth-child(4) .hero-service-card { animation-delay: 2.4s; }

    .hero-service-card-wrapper:hover .hero-service-card {
      background: rgba(255, 196, 81, 0.16) !important;
      border-color: rgba(255, 196, 81, 0.7) !important;
      transform: translateY(-14px) scale(1.06) !important;
      box-shadow: 0 25px 50px rgba(255, 196, 81, 0.45), inset 0 1px 0 rgba(255, 255, 255, 0.45) !important;
      animation-play-state: paused !important;
    }

    .hero-service-card img {
      width: 110px !important;
      height: 110px !important;
      max-width: 110px !important;
      max-height: 110px !important;
      object-fit: contain !important;
      margin: auto !important;
      display: block !important;
      filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.35)) !important;
      transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), filter 0.4s ease !important;
    }

    /* Scale boost for logos with transparent padding */
    .hero-service-card img.logo-boost {
      transform: scale(1.18) !important;
      transform-origin: center center !important;
    }

    .hero-service-card-wrapper:hover img {
      transform: scale(1.1) rotate(2deg) !important;
      filter: drop-shadow(0 12px 24px rgba(255, 196, 81, 0.55)) !important;
    }

    .hero-service-card-wrapper:hover img.logo-boost {
      transform: scale(1.28) rotate(2deg) !important;
      filter: drop-shadow(0 12px 24px rgba(255, 196, 81, 0.55)) !important;
    }

    .agency-label-tag {
      font-weight: 700 !important;
      letter-spacing: 1px !important;
      text-shadow: 0 2px 8px rgba(0, 0, 0, 0.6) !important;
      transition: all 0.3s ease !important;
    }

    .hero-service-card-wrapper:hover .agency-label-tag {
      color: #ffc451 !important;
      text-shadow: 0 0 15px rgba(255, 196, 81, 0.7) !important;
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
      color: #ffc451 !important;
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
      background: linear-gradient(135deg, #ffc451 0%, #ff9800 100%);
      border: none;
      box-shadow: 0 4px 15px rgba(255, 196, 81, 0.4);
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
        color: #ffc451;
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
        background: #ffc451;
        color: #061743;
        font-size: 0.72rem;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        box-shadow: 0 4px 12px rgba(255, 196, 81, 0.2);
        transition: all 0.3s ease;
        text-decoration: none;
    }
    .seminar-card-btn-sub:hover {
        background: #ffd581;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(255, 196, 81, 0.35);
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
          <i class="bi bi-telephone-fill" style="color: #ffc451;"></i>
          <span class="d-none d-sm-inline">+216 55 335 286</span>
        </a>
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=contact@caei-afri.com" target="_blank" class="d-flex align-items-center gap-2 text-white text-decoration-none" style="font-size: 14px; white-space: nowrap;">
          <i class="bi bi-envelope-fill" style="color: #ffc451;"></i>
          <span class="d-none d-md-inline">contact@caei-afri.com</span>
        </a>
        <a href="https://www.google.com/maps/search/?api=1&query=SIS+8+Rue+Claude+Bernard+1002+Belvedere-Tunis+Tunisie" target="_blank" class="d-flex align-items-center gap-2 text-white text-decoration-none d-none d-lg-flex" style="font-size: 14px; white-space: nowrap;">
          <i class="bi bi-geo-alt-fill" style="color: #ffc451;"></i>
          <span>SIS 8 Rue Claude Bernard 1002 Belvedere-Tunis , Tunisie</span>
        </a>
      </div>
      <a href="{{ asset('assets/img/catalogue CAEI GROUP.pdf') }}" target="_blank" style="font-size: 14px; color: #ffc451; text-decoration: none; white-space: nowrap; transition: all 0.3s ease; display: flex; align-items: center; gap: 6px; padding: 0 8px;" onmouseover="this.style.color='#ffdb8d'; this.style.transform='translateX(2px)';" onmouseout="this.style.color='#ffc451'; this.style.transform='translateX(0)';">
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
          <li><a href="{{ route('home') }}#acceuil">Accueil<br></a></li>
          <li><a href="{{ route('home') }}#presentation">Présentation</a></li>
          <li><a href="{{ route('home') }}#agencies">Nos Agences</a></li>
          <li><a href="{{ route('home.old') }}">Nos séminaires</a></li>
          <li><a href="{{ route('actualites.index') }}">Nos actualités</a></li>
          <li><a href="{{ route('recrutement.index') }}" class="active">Recrutement</a></li>
          <li><a href="{{ route('home') }}#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <!-- Auth Controls (Breeze) -->
      @auth
        <div class="d-flex align-items-center gap-2 ms-xl-4">
          <a href="{{ route('dashboard') }}" class="btn-getstarted text-decoration-none">Mon espace</a>
        </div>
      @else
        <div class="d-flex align-items-center gap-2 ms-xl-4">
          <a href="{{ route('login') }}" class="btn-getstarted text-decoration-none">Connexion</a>
        </div>
      @endauth

    </div>
  </header>

  <main class="main">

    <style>
      .recrutement-form .form-control, .recrutement-form .form-select {
        color: #000f3c !important;
        background-color: #ffffff !important;
        border: 1px solid #cbd5e1 !important;
        padding: 0.75rem 1rem;
        border-radius: 10px;
      }
      .recrutement-form .form-control::placeholder, .recrutement-form .form-select::placeholder {
        color: #94a3b8 !important;
      }
      .recrutement-form .form-control:focus, .recrutement-form .form-select:focus {
        background-color: #ffffff !important;
        border-color: #000f3c !important;
        box-shadow: 0 0 0 0.25rem rgba(0, 15, 60, 0.12) !important;
        color: #000f3c !important;
      }
      .recrutement-form input[type="file"]::file-selector-button {
        background-color: #000f3c;
        color: white;
        border: none;
        padding: 0.4rem 0.8rem;
        margin-right: 1rem;
        border-radius: 6px;
        transition: 0.3s;
      }
      .recrutement-form input[type="file"]::file-selector-button:hover {
        background-color: #ffc451;
        color: #000f3c;
      }
    </style>

    <section class="section py-5" style="padding-top: 150px !important; padding-bottom: 100px; background: linear-gradient(135deg, rgba(248, 249, 252, 0.92) 0%, rgba(255, 255, 255, 0.95) 100%), url('{{ asset('assets/img/features-bg.jpg') }}') center/cover no-repeat scroll; min-height: 85vh;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="text-center mb-5">
              <h2 class="fw-bold" style="color: #000f3c; font-family: 'Outfit', sans-serif;">Rejoignez le <span style="color: #ffc451;">CAEI</span></h2>
              <p class="text-muted fs-6">Postulez dès maintenant pour intégrer l'union des experts et des élites africains du continent de renommée internationale.</p>
            </div>

            @if(session('success'))
            <div class="alert alert-success bg-white border-success text-success d-flex align-items-center mb-4 shadow-sm rounded-3" role="alert">
              <i class="bi bi-check-circle-fill me-2 fs-4"></i>
              <div>{{ session('success') }}</div>
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger bg-white border-danger text-danger mb-4 shadow-sm rounded-3">
              <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <div class="card shadow-lg rounded-4 border-0" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(0, 15, 60, 0.08) !important;">
              <div class="card-body p-4 p-md-5">
                <form action="{{ route('recrutement.store') }}" method="POST" enctype="multipart/form-data" class="recrutement-form">
                  @csrf
                  
                  <div class="row g-4">
                    <div class="col-md-6">
                      <label class="form-label fw-semibold" style="color: #000f3c;">Nom <span class="text-danger">*</span></label>
                      <input type="text" name="nom" class="form-control" required placeholder="Votre nom" value="{{ old('nom') }}">
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label fw-semibold" style="color: #000f3c;">Prénom <span class="text-danger">*</span></label>
                      <input type="text" name="prenom" class="form-control" required placeholder="Votre prénom" value="{{ old('prenom') }}">
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label fw-semibold" style="color: #000f3c;">Email <span class="text-danger">*</span></label>
                      <input type="email" name="email" class="form-control" required placeholder="votre@email.com" value="{{ old('email') }}">
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label fw-semibold" style="color: #000f3c;">Téléphone <span class="text-danger">*</span></label>
                      <input type="text" name="telephone" class="form-control" required placeholder="+216 XX XXX XXX" value="{{ old('telephone') }}">
                    </div>

                    <div class="col-md-12">
                      <label class="form-label fw-semibold" style="color: #000f3c;">Domaine d'expertise <span class="text-danger">*</span></label>
                      <select name="domaine" class="form-select" required>
                        <option value="" disabled selected>Sélectionnez votre domaine</option>
                        <option value="IT & Transformation Digitale" {{ old('domaine') == 'IT & Transformation Digitale' ? 'selected' : '' }}>IT & Transformation Digitale</option>
                        <option value="Marketing & Communication" {{ old('domaine') == 'Marketing & Communication' ? 'selected' : '' }}>Marketing & Communication</option>
                        <option value="Business & Management" {{ old('domaine') == 'Business & Management' ? 'selected' : '' }}>Business & Management</option>
                        <option value="Services Médicaux" {{ old('domaine') == 'Services Médicaux' ? 'selected' : '' }}>Services Médicaux</option>
                        <option value="Centre d'Appels & Support" {{ old('domaine') == 'Centre d\'Appels & Support' ? 'selected' : '' }}>Centre d'Appels & Support</option>
                        <option value="Formation Professionnelle" {{ old('domaine') == 'Formation Professionnelle' ? 'selected' : '' }}>Formation Professionnelle</option>
                        <option value="Autre" {{ old('domaine') == 'Autre' ? 'selected' : '' }}>Autre</option>
                      </select>
                    </div>
                    
                    <div class="col-12">
                      <label class="form-label fw-semibold" style="color: #000f3c;">Votre CV (PDF, DOC, DOCX - Max 5MB) <span class="text-danger">*</span></label>
                      <input type="file" name="cv" class="form-control" required accept=".pdf,.doc,.docx">
                    </div>
                    
                    <div class="col-12">
                      <label class="form-label fw-semibold" style="color: #000f3c;">Message de motivation (Optionnel)</label>
                      <textarea name="message" class="form-control" rows="4" placeholder="Parlez-nous de vous...">{{ old('message') }}</textarea>
                    </div>

                    <div class="col-12 text-center mt-5">
                      <button type="submit" class="btn text-white fw-bold px-5 py-3 rounded-pill shadow-sm" style="background-color: #000f3c; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#ffc451'; this.style.color='#000f3c';" onmouseout="this.style.backgroundColor='#000f3c'; this.style.color='#ffffff';">
                        Soumettre ma candidature
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

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
              <button class="btn btn-warning fw-bold" type="submit" style="background-color: #ffc451; color: #000f3c;">S'abonner</button>
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
