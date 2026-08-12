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
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/welcome-modern.css') }}?v=7.0" rel="stylesheet">
  
  <style>
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
      background: linear-gradient(135deg, #fff4d4 0%, #ffc451 45%, #e69d00 85%, #ffe699 100%) !important;
      -webkit-background-clip: text !important;
      -webkit-text-fill-color: transparent !important;
      background-clip: text !important;
      filter: drop-shadow(0 6px 20px rgba(255, 196, 81, 0.45)) !important;
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
          <li><a href="#acceuil" class="active">Accueil<br></a></li>
          <li><a href="#presentation">Présentation</a></li>
          <li><a href="#agencies">Nos Agences</a></li>
          <li><a href="{{ route('home.old') }}">Séminaires</a></li>
          <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('elite.training') }}">CAEI ELITE TRAINING</a></li>
              <li><a href="{{ route('medical.services') }}">CAEI MEDICAL SERVICES</a></li>
              <li><a href="{{ route('digitalmoov') }}">CAEI DIGITAL MOOV</a></li>
              <li><a href="{{ route('callcenter.index') }}" target="_blank">CAEI CALL CENTER</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <!-- Auth Controls (Breeze) -->
      <div class="d-flex align-items-center gap-2 ms-xl-4">
        @auth
          <a href="{{ route('dashboard') }}" class="btn-getstarted text-decoration-none">Mon espace</a>
        @else
          <a href="{{ route('login') }}" class="text-white text-decoration-none fw-semibold me-3 d-none d-sm-inline-block" style="font-size: 14px; transition: color 0.3s;" onmouseover="this.style.color='#ffc451'" onmouseout="this.style.color='#fff'">Connexion</a>
          <a href="{{ route('register') }}" class="btn-getstarted text-decoration-none">Créer un compte</a>
        @endauth
      </div>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="acceuil" class="hero section">

      <!-- YouTube Background Video (World Connection / Globe Loop) - Ultra reliable -->
      <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; pointer-events: none; overflow: hidden; background: #000;">
        <iframe src="https://www.youtube.com/embed/rDrjQyatgXQ?autoplay=1&mute=1&controls=0&showinfo=0&autohide=1&loop=1&playlist=rDrjQyatgXQ&vq=hd1080" style="width: 100vw; height: 56.25vw; min-height: 100vh; min-width: 177.77vh; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.6;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
      </div>

      <div class="hero-overlay-gradient"></div>
      <div class="cinematic-lens-flare"></div>

      <div class="container text-center" style="position: relative; z-index: 2;">

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <div class="col-xl-9 col-lg-10">
            <div class="hero-badge-pill">
              <i class="bi bi-patch-check-fill"></i> Organisme Panafricain d'Excellence
            </div>
            <h2>
              BIENVENUE chez<br>
              <span class="gradient-gold">CAEI COMPANY GROUP</span>
            </h2>
            <p class="hero-subtitle">
              l'union des experts et des elites africains du continent de renommée internationale
            </p>
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
                <img src="{{ asset('assets/img/training1.png') }}" alt="CAEI Elite Training" style="width: 85px; height: 85px; object-fit: contain;">
              </a>
            </div>
          </div>

          <!-- Agence 2 - Medical Services -->
          <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center d-flex align-items-center justify-content-center" style="animation: floatCardWave 4s ease-in-out infinite; animation-delay: 0.5s; height: 100%; min-height: 200px;">
              <a href="{{ route('medical.services') }}" class="rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="background: linear-gradient(135deg, rgb(206, 241, 247) 0%, #138496 100%); width: 130px; height: 130px; text-decoration: none; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);" onmouseover="this.style.transform='scale(1.15) rotate(-5deg)'; this.style.boxShadow='0 15px 35px rgba(19,132,150,0.4)';" onmouseout="this.style.transform='scale(1) rotate(0deg)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)';">
                <img src="{{ asset('assets/img/t.png') }}" alt="CAEI Medical Services" style="width: 85px; height: 85px; object-fit: contain;">
              </a>
            </div>
          </div>

          <!-- Agence 3 - Digital Moov -->
          <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="300">
            <div class="text-center d-flex align-items-center justify-content-center" style="animation: floatCardWave 4s ease-in-out infinite; animation-delay: 1s; height: 100%; min-height: 200px;">
              <a href="{{ route('digitalmoov') }}" class="rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="background: linear-gradient(135deg, rgb(248, 239, 219) 0%, #b37700 100%); width: 130px; height: 130px; text-decoration: none; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);" onmouseover="this.style.transform='scale(1.15) rotate(5deg)'; this.style.boxShadow='0 15px 35px rgba(179,119,0,0.4)';" onmouseout="this.style.transform='scale(1) rotate(0deg)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)';">
                <img src="{{ asset('assets/img/caeidm02.png') }}" alt="CAEI Digital Moov" style="width: 85px; height: 85px; object-fit: contain;">
              </a>
            </div>
          </div>

          <!-- Agence 4 - Call Center -->
          <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="400">
            <div class="text-center d-flex align-items-center justify-content-center" style="animation: floatCardWave 4s ease-in-out infinite; animation-delay: 1.5s; height: 100%; min-height: 200px;">
              <a href="{{ route('callcenter.index') }}" target="_blank" class="rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="background: linear-gradient(135deg, rgb(236, 229, 231) 0%, #6b0f2a 100%); width: 130px; height: 130px; text-decoration: none; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);" onmouseover="this.style.transform='scale(1.15) rotate(-5deg)'; this.style.boxShadow='0 15px 35px rgba(107,15,42,0.4)';" onmouseout="this.style.transform='scale(1) rotate(0deg)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)';">
                <img src="{{ asset('assets/img/CAEICALL.png') }}" alt="CAEI Call Center" style="width: 85px; height: 85px; object-fit: contain;">
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
          <span class="badge rounded-pill px-3 py-2 mb-2" style="background: rgba(255, 196, 81, 0.2) !important; color: #ffc451 !important; border: 1px solid rgba(255, 196, 81, 0.4) !important; font-size: 13px; letter-spacing: 1px;">FILIALES DU GROUPE</span>
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
                    <div class="agency-logo-wrapper" style="background: linear-gradient(135deg, rgba(255, 196, 81, 0.3) 0%, rgba(0, 31, 63, 0.8) 100%);">
                      <img src="{{ asset('assets/img/training1.png') }}" alt="CAEI Elite Training Logo">
                    </div>
                    <div>
                      <span class="badge mb-1 px-3 py-1" style="background: rgba(255, 196, 81, 0.25); color: #ffc451; border: 1px solid rgba(255, 196, 81, 0.5); font-size: 11px;">Formation & Cadres</span>
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
            <div class="service-item position-relative p-4 border rounded-4 shadow-sm bg-white h-100">
              <div class="service-logo-box mb-4" style="background: linear-gradient(135deg, #001f3f 0%, #000f3c 100%) !important; border: 1px solid rgba(204, 136, 0, 0.5) !important;">
                <img src="{{ asset('assets/img/caeidm02.png') }}" alt="CAEI Digital Moov Logo" style="transform: scale(1.3);">
              </div>
              <h3 class="fw-bold" style="color: #000f3c; font-size: 20px;">Responsive Web Design</h3>
              <p class="text-muted small">De la compréhension initiale de vos besoins à la mise en ligne finale, notre processus de création de sites web est conçu pour vous offrir une expérience fluide et un site web exceptionnel qui reflète parfaitement votre vision.</p>
            </div>
          </div>

          <!-- Service 2 -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative p-4 border rounded-4 shadow-sm bg-white h-100">
              <div class="service-logo-box mb-4" style="background: linear-gradient(135deg, #001f3f 0%, #000f3c 100%) !important; border: 1px solid rgba(204, 136, 0, 0.5) !important;">
                <img src="{{ asset('assets/img/caeidm02.png') }}" alt="CAEI Digital Moov Logo" style="transform: scale(1.3);">
              </div>
              <h3 class="fw-bold" style="color: #000f3c; font-size: 20px;">Stratégie Marketing Digital</h3>
              <p class="text-muted small">Nous développons des stratégies marketing complètes adaptées à votre entreprise pour augmenter votre visibilité en ligne et atteindre vos objectifs commerciaux.</p>
            </div>
          </div>

          <!-- Service 3 -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative p-4 border rounded-4 shadow-sm bg-white h-100">
              <div class="service-logo-box mb-4" style="background: linear-gradient(135deg, #001f3f 0%, #000f3c 100%) !important; border: 1px solid rgba(255, 196, 81, 0.5) !important;">
                <img src="{{ asset('assets/img/logof.png') }}" alt="CAEI Group Logo" style="transform: scale(1.2);">
              </div>
              <h3 class="fw-bold" style="color: #000f3c; font-size: 20px;">Consulting & Support</h3>
              <p class="text-muted small">Notre équipe d'experts vous accompagne dans la transformation de votre entreprise avec des solutions personnalisées et un support continu.</p>
            </div>
          </div>

          <!-- Service 4 -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative p-4 border rounded-4 shadow-sm bg-white h-100">
              <div class="service-logo-box mb-4" style="background: linear-gradient(135deg, #001f3f 0%, #000f3c 100%) !important; border: 1px solid rgba(23, 162, 184, 0.5) !important;">
                <img src="{{ asset('assets/img/t.png') }}" alt="CAEI Medical Services Logo" style="transform: scale(1.2);">
              </div>
              <h3 class="fw-bold" style="color: #000f3c; font-size: 20px;">Accompagnement Médical</h3>
              <p class="text-muted small">L'accompagnement médical est un aspect crucial des soins de santé moderne, offrant un soutien continu et personnalisé aux patients tout au long de leur parcours médical.</p>
            </div>
          </div>

          <!-- Service 5 -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative p-4 border rounded-4 shadow-sm bg-white h-100">
              <div class="service-logo-box mb-4" style="background: linear-gradient(135deg, #001f3f 0%, #000f3c 100%) !important; border: 1px solid rgba(139, 21, 56, 0.5) !important;">
                <img src="{{ asset('assets/img/CAEICALL.png') }}" alt="CAEI Call Center Logo" style="transform: scale(1.3);">
              </div>
              <h3 class="fw-bold" style="color: #000f3c; font-size: 20px;">Service Clientèle Unique</h3>
              <p class="text-muted small">Fournissez une expérience client exceptionnelle grâce à notre service client dédié. Nous sommes là pour répondre aux questions, résoudre les problèmes et garantir la satisfaction.</p>
            </div>
          </div>

          <!-- Service 6 -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative p-4 border rounded-4 shadow-sm bg-white h-100">
              <div class="service-logo-box mb-4" style="background: linear-gradient(135deg, #001f3f 0%, #000f3c 100%) !important; border: 1px solid rgba(255, 196, 81, 0.5) !important;">
                <img src="{{ asset('assets/img/training1.png') }}" alt="CAEI Elite Training Logo" style="transform: scale(1.2);">
              </div>
              <h3 class="fw-bold" style="color: #000f3c; font-size: 20px;">Formation Continue</h3>
              <p class="text-muted small">Nous proposons des programmes de formation continue adaptés aux besoins spécifiques de nos partenaires, avec une expertise de pointe et une expérience pratique.</p>
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
        <a class="btn btn-warning rounded-pill px-4 py-2 fw-bold mt-3" href="#contact" style="background-color: #ffc451; color: #000f3c;">Nous Contacter</a>
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
                    <h3 class="fw-bold mb-0"><span data-purecounter-start="0" data-purecounter-end="337" data-purecounter-duration="1" class="purecounter">0</span></h3>
                    <p class="small text-muted mb-0">Clients Satisfaits</p>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="d-flex align-items-center">
                  <i class="bi bi-journal-richtext text-warning fs-2 me-3"></i>
                  <div>
                    <h3 class="fw-bold mb-0"><span data-purecounter-start="0" data-purecounter-end="200" data-purecounter-duration="1" class="purecounter">0</span></h3>
                    <p class="small text-muted mb-0">Projets Réalisés</p>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="d-flex align-items-center">
                  <i class="bi bi-headset text-warning fs-2 me-3"></i>
                  <div>
                    <h3 class="fw-bold mb-0"><span data-purecounter-start="0" data-purecounter-end="14" data-purecounter-duration="1" class="purecounter">0</span></h3>
                    <p class="small text-muted mb-0">Années d'Expérience</p>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="d-flex align-items-center">
                  <i class="bi bi-people text-warning fs-2 me-3"></i>
                  <div>
                    <h3 class="fw-bold mb-0"><span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter">0</span></h3>
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
                  <button type="submit" class="btn btn-warning rounded-pill px-4 text-white fw-bold" style="background-color: #ffc451; color: #000f3c !important; border: none;">Envoyer le Message</button>
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
            <img src="{{ asset('assets/img/logof.png') }}" alt="CAEI Logo" style="max-height: 50px;">
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
        <p class="mb-1">&copy; Copyright <strong class="text-white">CAEI Company Group</strong>. All Rights Reserved</p>
        <div class="credits text-white-50" style="font-size: 12px;">
          Designed by <a href="{{ route('digitalmoov') }}" class="text-decoration-none text-warning fw-bold">CAEI DIGITAL MOOV</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center bg-warning text-white rounded-circle shadow" style="width: 40px; height: 40px; position: fixed; bottom: 30px; left: 30px; z-index: 999; display: none; transition: opacity 0.3s;"><i class="bi bi-arrow-up-short fs-4"></i></a>

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
