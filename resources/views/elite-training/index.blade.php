<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>CAEI Elite Training — Formation Professionnelle d'Excellence en Afrique</title>
  <meta name="description" content="Le Comité Africain d'Expertise Internationale (CAEI) propose des formations certifiantes, diplômantes et sur mesure pour les professionnels africains. Mini MBA, Executive MBA, Doctorat et plus de 150 formations disponibles.">
  <meta name="keywords" content="CAEI, Elite Training, formation professionnelle, MBA, Afrique, Tunisie, séminaire, certification">
  <meta property="og:title" content="CAEI Elite Training — Formation d'Excellence">
  <meta property="og:description" content="Formations certifiantes, diplômantes et sur mesure pour les professionnels africains.">

  <!-- Favicon -->
  <link href="{{ asset('assets/img/logoh.ico') }}" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <!-- AOS Animations -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <!-- Swiper -->
  <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet">

  <style>
    /* ===== ROOT VARIABLES ===== */
    :root {
      --gold: #ce9233;
      --gold-light: #f0b75a;
      --gold-dark: #a87228;
      --navy: #001f3f;
      --navy-mid: #002f5e;
      --navy-light: #003d7a;
      --white: #ffffff;
      --off-white: #f8f9fc;
      --gray: #6c757d;
      --font-main: 'Inter', sans-serif;
      --font-display: 'Outfit', sans-serif;
      --shadow-sm: 0 4px 15px rgba(0,0,0,0.08);
      --shadow-md: 0 8px 30px rgba(0,0,0,0.12);
      --shadow-lg: 0 20px 60px rgba(0,0,0,0.18);
      --shadow-gold: 0 8px 30px rgba(206, 146, 51, 0.3);
      --radius-sm: 12px;
      --radius-md: 20px;
      --radius-lg: 32px;
      --transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    html { scroll-behavior: smooth; }

    body {
      font-family: var(--font-main);
      background: var(--white);
      color: #1a1a2e;
      overflow-x: hidden;
    }

    /* ===== SCROLLBAR ===== */
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: var(--navy); }
    ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 3px; }

    /* ===== NAVBAR ===== */
    .et-navbar {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      padding: 18px 0;
      transition: var(--transition);
      background: transparent;
    }

    .et-navbar.scrolled {
      background: rgba(0, 31, 63, 0.97);
      backdrop-filter: blur(20px);
      padding: 12px 0;
      box-shadow: 0 4px 30px rgba(0,0,0,0.3);
    }

    .et-navbar .nav-brand {
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
    }

    .et-navbar .nav-brand img {
      height: 52px;
      object-fit: contain;
      transition: var(--transition);
    }

    .et-navbar .nav-brand span {
      font-family: var(--font-display);
      font-weight: 800;
      font-size: 18px;
      color: var(--white);
      letter-spacing: 0.5px;
    }

    .et-navbar .nav-brand span em {
      color: var(--gold-light);
      font-style: normal;
    }

    .et-navbar .nav-links {
      display: flex;
      align-items: center;
      gap: 8px;
      list-style: none;
    }

    .et-navbar .nav-links a {
      color: rgba(255,255,255,0.85);
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
      padding: 8px 14px;
      border-radius: 8px;
      transition: var(--transition);
    }

    .et-navbar .nav-links a:hover {
      color: var(--gold-light);
      background: rgba(255,255,255,0.08);
    }

    /* ===== NAV DROPDOWN ===== */
    .et-navbar .nav-dropdown {
      position: relative;
    }

    .et-navbar .nav-dropdown-toggle {
      display: inline-flex;
      align-items: center;
      cursor: pointer;
    }

    .et-navbar .nav-dropdown-toggle i {
      transition: transform 0.3s ease;
    }

    .et-navbar .nav-dropdown:hover .nav-dropdown-toggle i {
      transform: rotate(180deg);
    }

    .et-navbar .nav-dropdown-menu {
      position: absolute;
      top: 100%;
      left: 50%;
      transform: translateX(-50%) translateY(10px);
      min-width: 220px;
      background: rgba(6, 23, 67, 0.96);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1px solid rgba(206, 146, 51, 0.3);
      border-radius: 12px;
      padding: 8px 0;
      margin-top: 4px;
      list-style: none;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.45);
      opacity: 0;
      visibility: hidden;
      transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
      z-index: 1000;
    }

    .et-navbar .nav-dropdown:hover .nav-dropdown-menu {
      opacity: 1;
      visibility: visible;
      transform: translateX(-50%) translateY(0);
    }

    .et-navbar .nav-dropdown-menu li {
      margin: 0;
      padding: 0 6px;
    }

    .et-navbar .nav-dropdown-menu a {
      display: flex;
      align-items: center;
      padding: 10px 16px;
      font-size: 13.5px;
      font-weight: 500;
      color: rgba(255, 255, 255, 0.9) !important;
      border-radius: 8px;
      transition: all 0.2s ease;
      white-space: nowrap;
    }

    .et-navbar .nav-dropdown-menu a:hover {
      background: rgba(206, 146, 51, 0.15) !important;
      color: var(--gold-light) !important;
      transform: translateX(4px);
    }

    .et-navbar .nav-cta {
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      color: var(--navy) !important;
      font-weight: 700 !important;
      border-radius: 50px !important;
      padding: 10px 22px !important;
      box-shadow: var(--shadow-gold);
      transition: var(--transition) !important;
    }

    .et-navbar .nav-cta:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 35px rgba(206,146,51,0.45) !important;
    }

    .btn-back-home {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      color: rgba(255,255,255,0.7);
      text-decoration: none;
      font-size: 13px;
      font-weight: 500;
      padding: 6px 12px;
      border-radius: 8px;
      border: 1px solid rgba(255,255,255,0.2);
      transition: var(--transition);
    }

    .btn-back-home:hover {
      color: var(--white);
      border-color: rgba(255,255,255,0.5);
      background: rgba(255,255,255,0.08);
    }

    /* ===== HERO ===== */
    .et-hero {
      position: relative;
      height: 100vh;
      min-height: 700px;
      display: flex;
      align-items: center;
      overflow: hidden;
      background: var(--navy);
    }

    .et-hero > .container {
      position: relative;
      z-index: 5;
    }

    .et-hero-bg {
      position: absolute;
      inset: 0;
      background: 
        radial-gradient(ellipse 80% 60% at 20% 40%, rgba(240, 183, 90, 0.15) 0%, transparent 60%),
        radial-gradient(ellipse 60% 80% at 80% 20%, rgba(0, 122, 255, 0.15) 0%, transparent 60%),
        linear-gradient(135deg, rgba(6, 30, 75, 0.52) 0%, rgba(10, 48, 110, 0.42) 40%, rgba(15, 65, 140, 0.38) 70%, rgba(5, 25, 65, 0.50) 100%);
      z-index: 2;
    }

    /* ===== VIDEO BACKGROUND ===== */
    .et-hero-video {
      position: absolute;
      inset: 0;
      z-index: 1;
      overflow: hidden;
    }

    .et-hero-video video {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
      filter: brightness(0.85) contrast(1.05);
    }

    .et-hero-video::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(
        180deg,
        rgba(10, 50, 110, 0.25) 0%,
        rgba(0, 40, 90, 0.15) 50%,
        rgba(10, 50, 110, 0.30) 100%
      );
      z-index: 1;
    }

    /* Animated particles canvas */
    #particles-canvas {
      position: absolute;
      inset: 0;
      opacity: 0.5;
      pointer-events: none;
      z-index: 3;
    }

    /* Animated geometric shapes */
    .hero-shapes {
      position: absolute;
      inset: 0;
      overflow: hidden;
      pointer-events: none;
      z-index: 3;
    }

    .hero-shapes .shape {
      position: absolute;
      border-radius: 50%;
      filter: blur(60px);
      animation: floatShape 8s ease-in-out infinite;
    }

    .hero-shapes .shape-1 {
      width: 400px; height: 400px;
      background: radial-gradient(circle, rgba(206,146,51,0.2) 0%, transparent 70%);
      top: -100px; right: 10%;
      animation-delay: 0s;
    }

    .hero-shapes .shape-2 {
      width: 300px; height: 300px;
      background: radial-gradient(circle, rgba(0,120,255,0.15) 0%, transparent 70%);
      bottom: -50px; left: 5%;
      animation-delay: 2s;
    }

    .hero-shapes .shape-3 {
      width: 200px; height: 200px;
      background: radial-gradient(circle, rgba(206,146,51,0.12) 0%, transparent 70%);
      top: 40%; left: 40%;
      animation-delay: 4s;
    }

    @keyframes floatShape {
      0%, 100% { transform: translateY(0) scale(1); }
      50% { transform: translateY(-30px) scale(1.05); }
    }

    .hero-content {
      position: relative;
      z-index: 5;
    }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(206, 146, 51, 0.15);
      border: 1px solid rgba(206, 146, 51, 0.4);
      color: var(--gold-light);
      padding: 8px 18px;
      border-radius: 50px;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
      margin-bottom: 24px;
      backdrop-filter: blur(10px);
    }

    .hero-title {
      font-family: var(--font-display);
      font-size: clamp(38px, 5vw, 72px);
      font-weight: 900;
      color: var(--white);
      line-height: 1.1;
      margin-bottom: 24px;
      letter-spacing: -1px;
    }

    .hero-title .highlight {
      background: linear-gradient(135deg, var(--gold), var(--gold-light), #fff3cd);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .hero-subtitle {
      font-size: 18px;
      color: rgba(255,255,255,0.75);
      line-height: 1.7;
      max-width: 580px;
      margin-bottom: 40px;
    }

    .hero-actions {
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
    }

    .btn-gold {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      color: var(--navy);
      font-weight: 700;
      font-size: 15px;
      padding: 16px 32px;
      border-radius: 50px;
      text-decoration: none;
      border: none;
      cursor: pointer;
      transition: var(--transition);
      box-shadow: var(--shadow-gold);
    }

    .btn-gold:hover {
      color: var(--navy);
      transform: translateY(-3px);
      box-shadow: 0 16px 40px rgba(206,146,51,0.5);
    }

    .btn-outline-white {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: transparent;
      color: var(--white);
      font-weight: 600;
      font-size: 15px;
      padding: 16px 32px;
      border-radius: 50px;
      text-decoration: none;
      border: 2px solid rgba(255,255,255,0.3);
      cursor: pointer;
      transition: var(--transition);
      backdrop-filter: blur(10px);
    }

    .btn-outline-white:hover {
      color: var(--white);
      border-color: rgba(255,255,255,0.7);
      background: rgba(255,255,255,0.08);
      transform: translateY(-3px);
    }

    /* Hero floating cards */
    .hero-visual {
      position: relative;
      height: 520px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .hero-logo-card {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 220px;
      height: 220px;
      background: rgba(255,255,255,0.08);
      border: 2px solid rgba(206,146,51,0.3);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      backdrop-filter: blur(20px);
      animation: rotateSlow 20s linear infinite;
    }

    .hero-logo-card img {
      width: 160px;
      height: 160px;
      object-fit: contain;
      filter: drop-shadow(0 8px 25px rgba(206, 146, 51, 0.4));
      filter: drop-shadow(0 8px 25px rgba(206, 146, 51, 0.4));
      animation: rotateSlow 20s linear infinite reverse;
    }

    @keyframes rotateSlow {
      from { transform: translate(-50%, -50%) rotate(0deg); }
      to { transform: translate(-50%, -50%) rotate(360deg); }
    }

    .hero-stat-card {
      position: absolute;
      background: rgba(255,255,255,0.08);
      border: 1px solid rgba(206,146,51,0.25);
      backdrop-filter: blur(20px);
      border-radius: var(--radius-sm);
      padding: 16px 20px;
      text-align: center;
      animation: floatCard 4s ease-in-out infinite;
    }

    .hero-stat-card:nth-child(1) { top: 8%; right: 10%; animation-delay: 0s; }
    .hero-stat-card:nth-child(2) { bottom: 15%; right: 0%; animation-delay: 1.5s; }
    .hero-stat-card:nth-child(3) { top: 35%; left: 0%; animation-delay: 3s; }
    .hero-stat-card:nth-child(4) { bottom: 8%; left: 10%; animation-delay: 2s; }

    @keyframes floatCard {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-12px); }
    }

    .hero-stat-card .stat-num {
      font-family: var(--font-display);
      font-size: 28px;
      font-weight: 900;
      color: var(--gold-light);
      display: block;
    }

    .hero-stat-card .stat-label {
      font-size: 12px;
      color: rgba(255,255,255,0.7);
      font-weight: 500;
    }

    /* Scroll indicator */
    .scroll-indicator {
      position: absolute;
      bottom: 40px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 5;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
      color: rgba(255,255,255,0.5);
      font-size: 12px;
      animation: bounce 2s ease-in-out infinite;
    }

    @keyframes bounce {
      0%, 100% { transform: translateX(-50%) translateY(0); }
      50% { transform: translateX(-50%) translateY(10px); }
    }

    /* ===== SECTION TITLES ===== */
    .section-label {
      display: inline-block;
      background: rgba(206, 146, 51, 0.1);
      border: 1px solid rgba(206, 146, 51, 0.3);
      color: var(--gold);
      padding: 6px 16px;
      border-radius: 50px;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      margin-bottom: 16px;
    }

    .section-title {
      font-family: var(--font-display);
      font-size: clamp(28px, 4vw, 48px);
      font-weight: 800;
      color: var(--navy);
      line-height: 1.2;
      letter-spacing: -0.5px;
    }

    .section-title .accent { color: var(--gold); }

    .section-subtitle {
      font-size: 17px;
      color: var(--gray);
      line-height: 1.7;
      max-width: 600px;
      margin: 0 auto;
    }

    /* ===== ABOUT SECTION ===== */
    .et-about {
      padding: 100px 0;
      background: linear-gradient(135deg, rgba(248, 249, 252, 0.92) 0%, rgba(255, 255, 255, 0.94) 100%), url('{{ asset("assets/img/features-bg.jpg") }}') center/cover no-repeat fixed;
      overflow: hidden;
      position: relative;
    }

    .about-visual {
      position: relative;
      height: 480px;
    }

    .about-img-main {
      position: absolute;
      top: 0;
      right: 0;
      width: 80%;
      height: 400px;
      border-radius: var(--radius-md);
      object-fit: cover;
      box-shadow: var(--shadow-lg);
    }

    .about-img-secondary {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 55%;
      height: 260px;
      border-radius: var(--radius-md);
      object-fit: cover;
      box-shadow: var(--shadow-md);
      border: 5px solid var(--white);
    }

    .about-badge {
      position: absolute;
      top: 40%;
      left: -20px;
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      color: var(--navy);
      padding: 20px;
      border-radius: var(--radius-sm);
      text-align: center;
      box-shadow: var(--shadow-gold);
      z-index: 2;
      min-width: 120px;
    }

    .about-badge .number {
      font-family: var(--font-display);
      font-size: 36px;
      font-weight: 900;
      display: block;
      line-height: 1;
    }

    .about-badge .text {
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .about-feature {
      display: flex;
      align-items: flex-start;
      gap: 16px;
      padding: 20px;
      background: var(--white);
      border-radius: var(--radius-sm);
      box-shadow: var(--shadow-sm);
      transition: var(--transition);
      border-left: 4px solid transparent;
    }

    .about-feature:hover {
      transform: translateX(6px);
      border-left-color: var(--gold);
      box-shadow: var(--shadow-md);
    }

    .about-feature-icon {
      width: 50px;
      height: 50px;
      min-width: 50px;
      background: linear-gradient(135deg, rgba(206,146,51,0.1), rgba(206,146,51,0.2));
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--gold);
      font-size: 22px;
    }

    .about-feature h6 {
      font-family: var(--font-display);
      font-weight: 700;
      color: var(--navy);
      margin-bottom: 4px;
    }

    .about-feature p {
      font-size: 13px;
      color: var(--gray);
      margin: 0;
      line-height: 1.5;
    }

    /* ===== FEATURES CARDS ===== */
    .et-features {
      padding: 100px 0;
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.93) 0%, rgba(248, 249, 252, 0.95) 100%), url('{{ asset("assets/img/cta-bg.jpg") }}') center/cover no-repeat fixed;
      position: relative;
    }

    .feature-card {
      background: var(--white);
      border-radius: var(--radius-md);
      padding: 40px 30px;
      text-align: center;
      border: 2px solid #eef0f5;
      transition: var(--transition);
      position: relative;
      overflow: hidden;
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .feature-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0;
      right: 0; height: 4px;
      background: linear-gradient(90deg, var(--gold), var(--gold-light));
      transform: scaleX(0);
      transform-origin: left;
      transition: var(--transition);
    }

    .feature-card:hover {
      border-color: rgba(206,146,51,0.3);
      box-shadow: var(--shadow-lg);
      transform: translateY(-10px);
    }

    .feature-card:hover::before { transform: scaleX(1); }

    .feature-card:hover .feature-icon {
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      color: var(--white);
      transform: rotateY(360deg);
      box-shadow: var(--shadow-gold);
    }

    .feature-icon {
      width: 80px;
      height: 80px;
      border-radius: 20px;
      background: rgba(206,146,51,0.1);
      color: var(--gold);
      font-size: 32px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 24px;
      transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .feature-card h5 {
      font-family: var(--font-display);
      font-weight: 700;
      font-size: 18px;
      color: var(--navy);
      margin-bottom: 12px;
    }

    .feature-card p {
      color: var(--gray);
      font-size: 14px;
      line-height: 1.6;
      flex-grow: 1;
    }

    .feature-link {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      color: var(--gold);
      font-weight: 600;
      font-size: 14px;
      text-decoration: none;
      margin-top: 20px;
      transition: var(--transition);
    }

    .feature-link:hover {
      color: var(--gold-dark);
      gap: 10px;
    }

    /* ===== STATS SECTION ===== */
    .et-stats {
      padding: 100px 0;
      background: linear-gradient(135deg, var(--navy) 0%, #002f5e 50%, var(--navy-light) 100%);
      position: relative;
      overflow: hidden;
    }

    .et-stats::before {
      content: '';
      position: absolute;
      inset: 0;
      background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ce9233' fill-opacity='0.04'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .stat-item {
      text-align: center;
      padding: 40px 20px;
      position: relative;
    }

    .stat-item::after {
      content: '';
      position: absolute;
      right: 0;
      top: 20%;
      height: 60%;
      width: 1px;
      background: rgba(206,146,51,0.2);
    }

    .stat-item:last-child::after { display: none; }

    .stat-number {
      font-family: var(--font-display);
      font-size: 56px;
      font-weight: 900;
      color: var(--gold-light);
      display: block;
      line-height: 1;
      margin-bottom: 8px;
    }

    .stat-label {
      font-size: 14px;
      color: rgba(255,255,255,0.6);
      text-transform: uppercase;
      letter-spacing: 1.5px;
      font-weight: 600;
    }

    .stat-icon {
      font-size: 36px;
      color: rgba(206,146,51,0.3);
      margin-bottom: 16px;
    }

    /* Progress bars */
    .progress-section {
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(206,146,51,0.15);
      border-radius: var(--radius-md);
      padding: 40px;
      backdrop-filter: blur(10px);
    }

    .progress-item {
      margin-bottom: 28px;
    }

    .progress-item:last-child { margin-bottom: 0; }

    .progress-header {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }

    .progress-label {
      color: rgba(255,255,255,0.85);
      font-weight: 600;
      font-size: 14px;
    }

    .progress-value {
      color: var(--gold-light);
      font-weight: 700;
      font-size: 14px;
    }

    .et-progress {
      height: 8px;
      background: rgba(255,255,255,0.1);
      border-radius: 50px;
      overflow: hidden;
    }

    .et-progress-bar {
      height: 100%;
      background: linear-gradient(90deg, var(--gold), var(--gold-light));
      border-radius: 50px;
      width: 0%;
      transition: width 1.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    /* ===== DIPLOMAS SECTION ===== */
    .et-diplomas {
      padding: 100px 0;
      background: linear-gradient(135deg, rgba(248, 249, 252, 0.93) 0%, rgba(255, 255, 255, 0.95) 100%), url('{{ asset("assets/img/testimonials-bg.jpg") }}') center/cover no-repeat fixed;
      position: relative;
    }

    .diploma-card {
      background: var(--white);
      border-radius: var(--radius-md);
      overflow: hidden;
      box-shadow: var(--shadow-sm);
      transition: var(--transition);
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .diploma-card:hover {
      box-shadow: var(--shadow-lg);
      transform: translateY(-8px);
    }

    .diploma-card-img {
      height: 200px;
      overflow: hidden;
      position: relative;
    }

    .diploma-card-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }

    .diploma-card:hover .diploma-card-img img {
      transform: scale(1.08);
    }

    .diploma-card-img .card-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(0,31,63,0.7) 0%, transparent 60%);
    }

    .diploma-badge {
      position: absolute;
      top: 16px;
      right: 16px;
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      color: var(--navy);
      font-size: 11px;
      font-weight: 800;
      padding: 5px 12px;
      border-radius: 50px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .diploma-card-body {
      padding: 28px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    .diploma-card-body h5 {
      font-family: var(--font-display);
      font-weight: 800;
      font-size: 20px;
      color: var(--navy);
      margin-bottom: 12px;
    }

    .diploma-card-body p {
      color: var(--gray);
      font-size: 14px;
      line-height: 1.6;
      flex-grow: 1;
    }

    .diploma-card-footer {
      padding: 20px 28px;
      border-top: 1px solid #eef0f5;
    }

    .btn-discover {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: var(--navy);
      color: var(--white);
      font-weight: 600;
      font-size: 14px;
      padding: 12px 24px;
      border-radius: 50px;
      text-decoration: none;
      transition: var(--transition);
    }

    .btn-discover:hover {
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      color: var(--navy);
      transform: translateX(4px);
    }

    /* ===== CERTIFICATIONS SECTION ===== */
    .et-certifications {
      padding: 100px 0;
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.93) 0%, rgba(248, 249, 252, 0.95) 100%), url('{{ asset("assets/img/company.jpg") }}') center/cover no-repeat fixed;
      position: relative;
    }

    .cert-card {
      background: var(--white);
      border: 2px solid #eef0f5;
      border-radius: var(--radius-sm);
      overflow: hidden;
      transition: var(--transition);
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .cert-card:hover {
      border-color: var(--gold);
      box-shadow: 0 12px 40px rgba(206,146,51,0.15);
      transform: translateY(-6px);
    }

    .cert-card-img {
      height: 160px;
      overflow: hidden;
    }

    .cert-card-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .cert-card:hover .cert-card-img img {
      transform: scale(1.1);
    }

    .cert-card-body {
      padding: 20px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    .cert-card-body h6 {
      font-family: var(--font-display);
      font-weight: 700;
      font-size: 15px;
      color: var(--navy);
      margin-bottom: 8px;
    }

    .cert-card-body p {
      font-size: 13px;
      color: var(--gray);
      line-height: 1.5;
      flex-grow: 1;
    }

    .cert-card-link {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      color: var(--gold);
      font-weight: 600;
      font-size: 13px;
      text-decoration: none;
      margin-top: 12px;
      transition: var(--transition);
    }

    .cert-card-link:hover {
      color: var(--gold-dark);
      gap: 10px;
    }

    /* ===== PROGRAMME / SCHEDULE SECTION UPGRADE ===== */
    .et-schedule {
      padding: 100px 0;
      background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
      position: relative;
    }

    .month-filter {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
      justify-content: center;
      margin-bottom: 50px;
    }

    .month-btn {
      padding: 12px 28px;
      border: 1.5px solid #e2e8f0;
      background: #ffffff;
      color: #475569;
      border-radius: 50px;
      font-size: 14.5px;
      font-weight: 700;
      cursor: pointer;
      box-shadow: 0 4px 14px rgba(0, 0, 0, 0.03);
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .month-btn:hover {
      border-color: var(--gold);
      color: var(--navy);
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(206, 146, 51, 0.18);
    }

    .month-btn.active {
      border-color: var(--gold);
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      color: var(--navy);
      box-shadow: 0 8px 25px rgba(206, 146, 51, 0.35);
      transform: translateY(-2px);
    }

    .schedule-card {
      background: #ffffff;
      border-radius: 20px;
      overflow: hidden;
      border: 1px solid rgba(226, 232, 240, 0.8);
      box-shadow: 0 10px 30px rgba(0, 31, 63, 0.05);
      transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
      height: 100%;
      display: flex;
      flex-direction: column;
      position: relative;
    }

    .schedule-card:hover {
      box-shadow: 0 20px 40px rgba(0, 31, 63, 0.12);
      transform: translateY(-8px);
      border-color: rgba(206, 146, 51, 0.4);
    }

    .schedule-card-img {
      height: 180px;
      overflow: hidden;
      position: relative;
    }

    .schedule-card-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }

    .schedule-card:hover .schedule-card-img img {
      transform: scale(1.1);
    }

    .schedule-card-img::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 50%;
      background: linear-gradient(to top, rgba(0, 31, 63, 0.35), transparent);
      pointer-events: none;
    }

    .schedule-card-body {
      padding: 22px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    .schedule-code {
      display: inline-block;
      background: rgba(206, 146, 51, 0.12);
      color: var(--gold-dark);
      font-size: 11px;
      font-weight: 800;
      padding: 5px 12px;
      border-radius: 8px;
      letter-spacing: 0.6px;
      text-transform: uppercase;
    }

    .schedule-card-body h6 {
      font-family: var(--font-display);
      font-weight: 800;
      font-size: 15.5px;
      color: var(--navy);
      margin-top: 10px;
      margin-bottom: 14px;
      line-height: 1.45;
      min-height: 44px;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .schedule-meta {
      display: flex;
      flex-direction: column;
      gap: 8px;
      margin-bottom: 18px;
      background: #f8fafc;
      padding: 10px 14px;
      border-radius: 12px;
      border: 1px solid #f1f5f9;
    }

    .schedule-meta-item {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 12.5px;
      color: #64748b;
      font-weight: 600;
    }

    .schedule-meta-item i {
      color: var(--gold);
      font-size: 15px;
      background: rgba(206, 146, 51, 0.1);
      width: 26px;
      height: 26px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
    }

    .schedule-price {
      font-family: var(--font-display);
      font-size: 21px;
      font-weight: 900;
      color: var(--navy);
      letter-spacing: -0.5px;
    }

    .btn-register {
      display: block;
      width: 100%;
      background: linear-gradient(135deg, var(--navy), var(--navy-mid));
      color: var(--white);
      font-weight: 800;
      font-size: 13.5px;
      padding: 13px;
      border-radius: 12px;
      text-align: center;
      text-decoration: none;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
      box-shadow: 0 4px 15px rgba(0, 31, 63, 0.15);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .btn-register:hover {
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      color: var(--navy);
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(206, 146, 51, 0.35);
    }

    /* Swiper customization */
    .schedule-swiper-container {
      position: relative;
      padding: 0 50px;
    }

    @media (max-width: 768px) {
      .schedule-swiper-container {
        padding: 0 5px;
      }
    }

    .scheduleSwiper {
      padding: 15px 8px 40px 8px;
    }

    .swiper-pagination-bullet {
      width: 10px;
      height: 10px;
      background: #cbd5e1;
      opacity: 1;
      transition: all 0.3s ease;
    }

    .swiper-pagination-bullet-active {
      background: var(--gold);
      width: 28px;
      border-radius: 10px;
    }

    .schedule-swiper-container .swiper-button-next,
    .schedule-swiper-container .swiper-button-prev {
      color: var(--navy) !important;
      background: #ffffff;
      width: 48px !important;
      height: 48px !important;
      border-radius: 50%;
      border: 1.5px solid #e2e8f0;
      box-shadow: 0 8px 25px rgba(0, 31, 63, 0.12);
      z-index: 10;
      top: 45% !important;
      transition: all 0.3s ease;
    }

    .schedule-swiper-container .swiper-button-next:hover,
    .schedule-swiper-container .swiper-button-prev:hover {
      background: var(--navy);
      color: var(--gold) !important;
      border-color: var(--navy);
      transform: scale(1.1);
      box-shadow: 0 12px 30px rgba(0, 31, 63, 0.25);
    }

    .schedule-swiper-container .swiper-button-prev {
      left: 0 !important;
    }

    .schedule-swiper-container .swiper-button-next {
      right: 0 !important;
    }

    .swiper-button-next::after,
    .swiper-button-prev::after {
      font-size: 16px !important;
      font-weight: 900;
    }

    /* ===== QUARTERLY MONTH FILTER STYLES ===== */
    .quarter-nav-wrapper {
      background: #ffffff;
      border: 1px solid rgba(0, 15, 60, 0.1);
      border-radius: 50px;
      padding: 6px 12px;
      box-shadow: 0 4px 20px rgba(0, 15, 60, 0.06);
    }

    .quarter-nav-btn {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      border: none;
      background: #000f3c;
      color: #ffffff;
      font-size: 13px;
      transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 12px rgba(0, 15, 60, 0.15);
      cursor: pointer;
    }

    .quarter-nav-btn:hover {
      background: #ce9233;
      color: #000f3c;
      transform: scale(1.08);
      box-shadow: 0 6px 18px rgba(206, 146, 51, 0.35);
    }

    .month-pill-btn {
      padding: 8px 20px;
      border-radius: 30px;
      border: 1px solid rgba(0, 15, 60, 0.12);
      background: #ffffff;
      color: #000f3c;
      font-weight: 600;
      font-size: 13px;
      transition: all 0.3s ease;
      cursor: pointer;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
    }

    .month-pill-btn:hover {
      border-color: #ce9233;
      color: #ce9233;
      transform: translateY(-1px);
    }

    .month-pill-btn.active {
      background: linear-gradient(135deg, #000f3c 0%, #061743 100%);
      color: #ffc451;
      border-color: #000f3c;
      font-weight: 700;
      box-shadow: 0 4px 15px rgba(0, 15, 60, 0.22);
    }

    .quarter-indicator-badge {
      font-size: 12px;
      font-weight: 800;
      letter-spacing: 1px;
      text-transform: uppercase;
      color: #ce9233;
      background: rgba(206, 146, 51, 0.12);
      padding: 5px 16px;
      border-radius: 20px;
      border: 1px solid rgba(206, 146, 51, 0.25);
    }

    @media (max-width: 576px) {
      .quarter-nav-wrapper {
        border-radius: 24px;
        padding: 6px 8px;
        gap: 4px !important;
        width: 100%;
        max-width: 100%;
      }
      .month-pill-btn {
        padding: 6px 12px;
        font-size: 11.5px;
        border-radius: 20px;
      }
      .quarter-nav-btn {
        width: 32px;
        height: 32px;
        font-size: 11px;
      }
      .quarter-indicator-badge {
        font-size: 10.5px;
        padding: 4px 12px;
      }
    }

    /* ===== CONTACT SECTION GLASSMORPHISM UPGRADE ===== */
    .et-contact {
      padding: 110px 0;
      background: radial-gradient(circle at top right, #002d5c 0%, #001229 100%) !important;
      position: relative;
      overflow: hidden;
    }

    .et-contact::before {
      content: '';
      position: absolute;
      top: -200px; right: -200px;
      width: 600px; height: 600px;
      background: radial-gradient(circle, rgba(206,146,51,0.18) 0%, transparent 70%);
      pointer-events: none;
    }

    .et-contact::after {
      content: '';
      position: absolute;
      bottom: -150px; left: -150px;
      width: 500px; height: 500px;
      background: radial-gradient(circle, rgba(0, 61, 122, 0.4) 0%, transparent 70%);
      pointer-events: none;
    }

    .contact-info-card {
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 20px;
      padding: 20px 24px;
      margin-bottom: 20px;
      display: flex;
      align-items: flex-start;
      gap: 18px;
      backdrop-filter: blur(15px);
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .contact-info-card:hover {
      background: rgba(255, 255, 255, 0.07);
      border-color: rgba(206, 146, 51, 0.4);
      transform: translateX(8px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
    }

    .contact-icon {
      width: 54px;
      height: 54px;
      min-width: 54px;
      background: linear-gradient(135deg, rgba(206,146,51,0.25), rgba(206,146,51,0.05));
      border: 1.5px solid rgba(206,146,51,0.4);
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--gold-light);
      font-size: 22px;
      box-shadow: 0 4px 15px rgba(206,146,51,0.15);
    }

    .contact-info-card h6 {
      color: var(--gold-light);
      font-weight: 800;
      font-size: 12.5px;
      text-transform: uppercase;
      letter-spacing: 1.2px;
      margin-bottom: 5px;
    }

    .contact-info-card p,
    .contact-info-card a {
      color: rgba(255,255,255,0.85);
      font-size: 14.5px;
      margin: 0;
      text-decoration: none;
      transition: color 0.3s ease;
      font-weight: 500;
    }

    .contact-info-card a:hover {
      color: var(--gold-light);
    }

    .social-links {
      display: flex;
      gap: 14px;
    }

    .social-link {
      width: 48px;
      height: 48px;
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: rgba(255,255,255,0.8);
      font-size: 20px;
      text-decoration: none;
      transition: all 0.35s ease;
      backdrop-filter: blur(10px);
    }

    .social-link:hover {
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      border-color: var(--gold);
      color: var(--navy);
      transform: translateY(-4px) scale(1.05);
      box-shadow: 0 8px 25px rgba(206,146,51,0.4);
    }

    .contact-form-card {
      background: rgba(255, 255, 255, 0.04);
      border: 1.5px solid rgba(255, 255, 255, 0.12);
      border-radius: 28px;
      padding: 50px 44px;
      backdrop-filter: blur(25px);
      box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35), inset 0 1px 0 rgba(255, 255, 255, 0.1);
      position: relative;
    }

    @media (max-width: 768px) {
      .contact-form-card {
        padding: 30px 22px;
      }
    }

    .et-form-group {
      margin-bottom: 20px;
      position: relative;
    }

    .et-form-group label {
      color: rgba(255,255,255,0.85);
      font-size: 13px;
      font-weight: 700;
      margin-bottom: 8px;
      display: block;
      letter-spacing: 0.3px;
    }

    .input-icon-wrapper {
      position: relative;
      display: flex;
      align-items: center;
    }

    .input-icon-wrapper i {
      position: absolute;
      left: 18px;
      color: var(--gold-light);
      font-size: 16px;
      pointer-events: none;
      z-index: 2;
      transition: all 0.3s ease;
    }

    .et-form-control {
      width: 100%;
      background: rgba(255, 255, 255, 0.06);
      border: 1.5px solid rgba(255, 255, 255, 0.14);
      border-radius: 14px;
      padding: 14px 18px 14px 48px;
      color: var(--white);
      font-size: 14.5px;
      font-family: var(--font-main);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      outline: none;
    }

    textarea.et-form-control {
      padding-left: 48px;
      padding-top: 14px;
      resize: vertical;
      min-height: 130px;
    }

    .et-form-control::placeholder { color: rgba(255,255,255,0.35); }

    .et-form-control:focus {
      border-color: var(--gold-light);
      background: rgba(255,255,255,0.12);
      box-shadow: 0 0 25px rgba(206,146,51,0.25);
    }

    .et-form-control:focus + i,
    .input-icon-wrapper:focus-within i {
      color: #ffffff;
      transform: scale(1.15);
    }

    .btn-contact-submit {
      width: 100%;
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      color: var(--navy);
      font-weight: 900;
      font-size: 16px;
      padding: 16px;
      border-radius: 14px;
      border: none;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      transition: all 0.35s ease;
      box-shadow: 0 8px 30px rgba(206, 146, 51, 0.35);
      text-transform: uppercase;
      letter-spacing: 0.8px;
    }

    .btn-contact-submit:hover {
      background: linear-gradient(135deg, #ffffff, var(--gold-light));
      color: var(--navy);
      transform: translateY(-3px);
      box-shadow: 0 12px 35px rgba(206, 146, 51, 0.5);
    }

    /* Intl-tel-input styling & alignment fix */
    .iti {
      width: 100%;
    }

    .iti .et-form-control {
      padding-left: 95px !important;
    }

    .iti__flag-container {
      padding-left: 10px;
    }

    .iti__selected-dial-code {
      color: var(--gold-light) !important;
      font-weight: 700;
      font-size: 14px;
      margin-left: 4px;
    }

    .iti__country-list {
      background-color: #ffffff !important;
      color: #0f172a !important;
      border-radius: 14px !important;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3) !important;
      border: 1px solid #e2e8f0 !important;
      z-index: 9999 !important;
    }

    .iti__country {
      color: #0f172a !important;
      padding: 10px 14px !important;
    }

    .iti__country-name, .iti__dial-code {
      color: #1e293b !important;
    }

    /* ===== FOOTER ===== */
    .et-footer {
      background: #00142b;
      padding: 30px 0;
      text-align: center;
    }

    .et-footer p {
      color: rgba(255,255,255,0.4);
      font-size: 13px;
      margin: 0;
    }

    .et-footer a {
      color: var(--gold);
      text-decoration: none;
    }

    /* ===== UTILITIES ===== */
    .text-gold { color: var(--gold) !important; }
    .bg-navy { background: var(--navy) !important; }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 991px) {
      .et-navbar .nav-links { display: none; }
      .hero-visual { display: none; }
      .about-visual { height: 300px; margin-bottom: 40px; }
      .stat-item::after { display: none; }
      .contact-form-card { padding: 30px 20px; }
      .et-hero-video video { display: none; }
      .et-hero-bg {
        background: 
          radial-gradient(ellipse 80% 60% at 20% 40%, rgba(206, 146, 51, 0.15) 0%, transparent 60%),
          radial-gradient(ellipse 60% 80% at 80% 20%, rgba(0, 100, 200, 0.12) 0%, transparent 60%),
          linear-gradient(135deg, #000f3c 0%, #001f3f 40%, #002a5c 70%, #001030 100%);
      }
    }

    @media (max-width: 767px) {
      .hero-title { font-size: 36px; }
      .hero-actions { flex-direction: column; }
      .hero-actions a { text-align: center; justify-content: center; }
      .et-stats .row > div { border-bottom: 1px solid rgba(206,146,51,0.1); }
    }
  </style>
</head>

<body>

  <!-- ===== NAVBAR ===== -->
  <nav class="et-navbar" id="etNavbar">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="{{ route('home') }}" class="nav-brand">
        <img src="{{ asset('assets/img/elite_training_logo.png') }}" alt="CAEI Elite Training">
        <span>CAEI <em>ELITE TRAINING</em></span>
      </a>

      <ul class="nav-links mb-0 ps-0">
        <li><a href="#about">À Propos</a></li>
        <li><a href="{{ route('elite.services') }}">Services</a></li>
        <li class="nav-dropdown">
          <a href="#formations" class="nav-dropdown-toggle">
            Formations <i class="bi bi-chevron-down ms-1" style="font-size: 10px;"></i>
          </a>
          <ul class="nav-dropdown-menu">
            <li><a href="#formations"><i class="bi bi-grid-fill me-2" style="color: var(--gold-light);"></i> Nos Formations</a></li>
            <li><a href="#diplomes"><i class="bi bi-mortarboard-fill me-2" style="color: var(--gold-light);"></i> Diplômes</a></li>
            <li><a href="#certifications"><i class="bi bi-patch-check-fill me-2" style="color: var(--gold-light);"></i> Certifications</a></li>
          </ul>
        </li>
        <li class="nav-dropdown">
          <a href="{{ route('elite.nos-cycles') }}" class="nav-dropdown-toggle">
            Cycles & Séminaires <i class="bi bi-chevron-down ms-1" style="font-size: 10px;"></i>
          </a>
          <ul class="nav-dropdown-menu">
            <li><a href="{{ route('elite.nos-cycles') }}"><i class="bi bi-calendar-event me-2" style="color: var(--gold-light);"></i> Nos Cycles</a></li>
            <li><a href="{{ route('home.old') }}"><i class="bi bi-calendar-check me-2" style="color: var(--gold-light);"></i> Nos Séminaires</a></li>
          </ul>
        </li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#contact" class="nav-cta">S'inscrire</a></li>
      </ul>

      <a href="{{ route('home') }}" class="btn-back-home d-none d-lg-flex">
        <i class="bi bi-arrow-left"></i> Accueil
      </a>
    </div>
  </nav>
  <!-- /NAVBAR -->


  <!-- ===== HERO ===== -->
  <section class="et-hero" id="home">
    <!-- Video Background -->
    <div class="et-hero-video">
      <video autoplay muted loop playsinline preload="auto" poster="{{ asset('assets/img/features-bg.jpg') }}">
        <source src="{{ asset('assets/img/elite_training_bg.mp4') }}" type="video/mp4">
      </video>
    </div>
    <div class="et-hero-bg"></div>
    <canvas id="particles-canvas"></canvas>
    <div class="hero-shapes">
      <div class="shape shape-1"></div>
      <div class="shape shape-2"></div>
      <div class="shape shape-3"></div>
    </div>

    <div class="container">
      <div class="row align-items-center">

        <!-- Left content -->
        <div class="col-lg-6 hero-content" data-aos="fade-right" data-aos-duration="800">
          <div class="hero-badge">
            <i class="bi bi-stars"></i>
            Formation Professionnelle d'Excellence
          </div>

          <h1 class="hero-title">
            Formez les Élites<br>
            <span class="highlight">Africaines de Demain</span>
          </h1>

          <p class="hero-subtitle">
            Le CAEI regroupe des experts africains de renommée internationale pour contribuer à la bonne gouvernance intellectuelle des cadres et élites du continent.
          </p>

          <div class="hero-actions">
            <a href="{{ route('elite.programme') }}" class="btn-gold">
              <i class="bi bi-calendar3"></i>
              Voir le Programme
            </a>
            <a href="#about" class="btn-outline-white">
              <i class="bi bi-play-circle"></i>
              En savoir plus
            </a>
          </div>
        </div>

        <!-- Right visual -->
        <div class="col-lg-6 d-none d-lg-block" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
          <div class="hero-visual">
            <!-- Floating stat cards -->
            <div class="hero-stat-card">
              <span class="stat-num" data-target="150">0</span>
              <span class="stat-label">Formations</span>
            </div>
            <div class="hero-stat-card">
              <span class="stat-num" data-target="95">0</span>
              <span class="stat-label">% Satisfaction</span>
            </div>
            <div class="hero-stat-card">
              <span class="stat-num" data-target="8888">0</span>
              <span class="stat-label">Professionnels</span>
            </div>
            <div class="hero-stat-card">
              <span class="stat-num">15+</span>
              <span class="stat-label">Pays Africains</span>
            </div>

            <!-- Center logo -->
            <div class="hero-logo-card">
              <img src="{{ asset('assets/img/elite_training_logo.png') }}" alt="CAEI Elite Training">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="scroll-indicator">
      <span>Défiler</span>
      <i class="bi bi-chevron-double-down" style="font-size:20px; color: rgba(255,255,255,0.4);"></i>
    </div>
  </section>
  <!-- /HERO -->


  <!-- ===== ABOUT ===== -->
  <section class="et-about" id="about">
    <div class="container">
      <div class="row align-items-center g-5">

        <!-- Visual -->
        <div class="col-lg-5" data-aos="fade-right">
          <div class="about-visual">
            <img src="{{ asset('assets/img/img3.jpg') }}" alt="Formation CAEI" class="about-img-main" loading="lazy">
            <img src="{{ asset('assets/img/professionel.jpg') }}" alt="Professionnels CAEI" class="about-img-secondary" loading="lazy">
            <div class="about-badge">
              <span class="number">10+</span>
              <span class="text">Ans d'Expérience</span>
            </div>
          </div>
        </div>

        <!-- Content -->
        <div class="col-lg-7" data-aos="fade-left" data-aos-delay="100">
          <span class="section-label">Qui Sommes-Nous</span>
          <h2 class="section-title mb-4">
            Un Organisme <span class="accent">Panafricain</span><br>de Formation Continue
          </h2>
          <p class="text-muted mb-5" style="font-size:16px; line-height:1.8;">
            Le Comité Africain d'Expertise Internationale (CAEI) a été créé dans le but de contribuer au développement du continent africain. Nous regroupons des experts africains de renommée internationale, tous chevronnés dans leurs domaines respectifs.
          </p>

          <div class="d-flex flex-column gap-3">
            <div class="about-feature" data-aos="fade-up" data-aos-delay="150">
              <div class="about-feature-icon">
                <i class="bi bi-award"></i>
              </div>
              <div>
                <h6>Experts Certifiés & Reconnus</h6>
                <p>Des formateurs de renommée internationale, sélectionnés pour leur expertise et leur engagement envers l'excellence africaine.</p>
              </div>
            </div>

            <div class="about-feature" data-aos="fade-up" data-aos-delay="200">
              <div class="about-feature-icon">
                <i class="bi bi-graph-up-arrow"></i>
              </div>
              <div>
                <h6>Renforcement des Capacités</h6>
                <p>Des formations conçues pour développer les compétences individuelles et collectives des professionnels africains.</p>
              </div>
            </div>

            <div class="about-feature" data-aos="fade-up" data-aos-delay="250">
              <div class="about-feature-icon">
                <i class="bi bi-globe-africa"></i>
              </div>
              <div>
                <h6>Réseau Panafricain</h6>
                <p>Une présence dans plus de 15 pays africains avec des partenariats institutionnels solides et reconnus.</p>
              </div>
            </div>
          </div>

          <div class="mt-5">
            <div class="d-inline-flex align-items-center gap-3 p-4 rounded-3" style="background: linear-gradient(135deg, rgba(206,146,51,0.08), rgba(206,146,51,0.15)); border: 1px solid rgba(206,146,51,0.2);">
              <i class="bi bi-quote" style="font-size: 32px; color: var(--gold);"></i>
              <p class="mb-0" style="font-size: 15px; font-style: italic; color: var(--navy); font-weight: 500;">
                "Vous Construisez un rêve. Nous le construisons à la réalité."
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /ABOUT -->


  <!-- ===== FEATURES ===== -->
  <section class="et-features" id="formations">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <span class="section-label">Nos Types de Formation</span>
        <h2 class="section-title mb-3">Quatre Voies <span class="accent">Vers l'Excellence</span></h2>
        <p class="section-subtitle">Des parcours variés pour répondre à tous les besoins professionnels</p>
      </div>

      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="bi bi-mortarboard-fill"></i>
            </div>
            <h5>Formation Diplômante</h5>
            <p>Obtenez un diplôme reconnu internationalement pour faire évoluer votre parcours professionnel vers les sommets.</p>
            <a href="#diplomes" class="feature-link">
              Découvrir <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="bi bi-patch-check-fill"></i>
            </div>
            <h5>Formation Certifiante</h5>
            <p>Acquérez des compétences concrètes et valorisez-les grâce à une certification reconnue à l'échelle internationale.</p>
            <a href="#certifications" class="feature-link">
              Découvrir <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="bi bi-sliders"></i>
            </div>
            <h5>Formation Sur Mesure</h5>
            <p>Des parcours personnalisés adaptés à vos besoins spécifiques et à votre secteur d'activité particulier.</p>
            <a href="#contact" class="feature-link">
              Nous contacter <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="bi bi-laptop-fill"></i>
            </div>
            <h5>Formation en Ligne</h5>
            <p>Suivez vos cours à distance avec flexibilité grâce à notre plateforme numérique interactive et moderne.</p>
            <a href="#contact" class="feature-link">
              S'inscrire <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /FEATURES -->


  <!-- ===== STATS ===== -->
  <section class="et-stats">
    <div class="container position-relative">
      <div class="row">
        <!-- Stat counters -->
        <div class="col-lg-7">
          <div class="text-center text-lg-start mb-5 mb-lg-0" data-aos="fade-right">
            <span class="section-label" style="background: rgba(206,146,51,0.2);">Nos Résultats</span>
            <h2 class="mt-3 mb-5" style="font-family: var(--font-display); font-size: clamp(28px,4vw,46px); font-weight:800; color: white; line-height:1.2;">
              Des chiffres qui<br><span style="color: var(--gold-light);">parlent d'eux-mêmes</span>
            </h2>

            <div class="row g-0">
              <div class="col-6 col-md-3">
                <div class="stat-item">
                  <i class="bi bi-book stat-icon"></i>
                  <span class="stat-number counter-animate" data-target="150">0</span>
                  <span class="stat-label">Formations</span>
                </div>
              </div>
              <div class="col-6 col-md-3">
                <div class="stat-item">
                  <i class="bi bi-people stat-icon"></i>
                  <span class="stat-number counter-animate" data-target="8888">0</span>
                  <span class="stat-label">Professionnels</span>
                </div>
              </div>
              <div class="col-6 col-md-3">
                <div class="stat-item">
                  <i class="bi bi-globe stat-icon"></i>
                  <span class="stat-number counter-animate" data-target="15">0</span>
                  <span class="stat-label">Pays</span>
                </div>
              </div>
              <div class="col-6 col-md-3">
                <div class="stat-item">
                  <i class="bi bi-star stat-icon"></i>
                  <span class="stat-number">95<span style="font-size:30px">%</span></span>
                  <span class="stat-label">Satisfaction</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Progress bars -->
        <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200">
          <div class="progress-section">
            <h5 style="color: white; font-family: var(--font-display); font-weight: 700; margin-bottom: 30px;">
              Nos Indicateurs Clés
            </h5>

            <div class="progress-item">
              <div class="progress-header">
                <span class="progress-label">Taux de satisfaction</span>
                <span class="progress-value">95%</span>
              </div>
              <div class="et-progress">
                <div class="et-progress-bar" data-width="95"></div>
              </div>
            </div>

            <div class="progress-item">
              <div class="progress-header">
                <span class="progress-label">Formations personnalisées</span>
                <span class="progress-value">85%</span>
              </div>
              <div class="et-progress">
                <div class="et-progress-bar" data-width="85"></div>
              </div>
            </div>

            <div class="progress-item">
              <div class="progress-header">
                <span class="progress-label">Taux d'insertion professionnelle</span>
                <span class="progress-value">92%</span>
              </div>
              <div class="et-progress">
                <div class="et-progress-bar" data-width="92"></div>
              </div>
            </div>

            <div class="progress-item">
              <div class="progress-header">
                <span class="progress-label">Formations accessibles en ligne</span>
                <span class="progress-value">70%</span>
              </div>
              <div class="et-progress">
                <div class="et-progress-bar" data-width="70"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /STATS -->


  <!-- ===== DIPLOMAS ===== -->
  <section class="et-diplomas" id="diplomes">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <span class="section-label">Diplômes</span>
        <h2 class="section-title mb-3">Mini MBA, MBA & <span class="accent">Executive MBA</span></h2>
        <p class="section-subtitle">Des programmes d'excellence reconnus pour propulser votre carrière vers les plus hauts niveaux</p>
      </div>

      <div class="row g-4">
        <!-- Mini MBA -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="diploma-card">
            <div class="diploma-card-img">
              <img src="{{ asset('assets/img/professionel.jpg') }}" alt="Mini MBA" loading="lazy">
              <div class="card-overlay"></div>
              <span class="diploma-badge">Mini MBA</span>
            </div>
            <div class="diploma-card-body">
              <h5>Mini MBA</h5>
              <p>Un programme condensé et intensif pour acquérir l'essentiel du management en peu de temps. Idéal pour les cadres en activité souhaitant une mise à niveau rapide.</p>
              <div class="d-flex align-items-center gap-3 mt-3 pt-3" style="border-top: 1px solid #eef0f5;">
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-clock text-gold"></i>
                  <span class="text-muted" style="font-size:13px;">3 à 6 mois</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-geo-alt text-gold"></i>
                  <span class="text-muted" style="font-size:13px;">Présentiel / En ligne</span>
                </div>
              </div>
            </div>
            <div class="diploma-card-footer">
              <a href="{{ route('elite.training.diploma.mini-mba') }}" class="btn-discover">
                En savoir plus <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Executive MBA -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="diploma-card">
            <div class="diploma-card-img">
              <img src="{{ asset('assets/img/img3.jpg') }}" alt="Executive MBA" loading="lazy">
              <div class="card-overlay"></div>
              <span class="diploma-badge">Executive MBA</span>
            </div>
            <div class="diploma-card-body">
              <h5>Executive MBA</h5>
              <p>Formez-vous au leadership stratégique tout en conciliant formation et carrière. Un programme conçu pour les managers expérimentés visant les postes dirigeants.</p>
              <div class="d-flex align-items-center gap-3 mt-3 pt-3" style="border-top: 1px solid #eef0f5;">
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-clock text-gold"></i>
                  <span class="text-muted" style="font-size:13px;">12 à 18 mois</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-geo-alt text-gold"></i>
                  <span class="text-muted" style="font-size:13px;">Présentiel / En ligne</span>
                </div>
              </div>
            </div>
            <div class="diploma-card-footer">
              <a href="{{ route('elite.training.diploma.executive-mba') }}" class="btn-discover">
                En savoir plus <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Doctorat -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="diploma-card">
            <div class="diploma-card-img">
              <img src="{{ asset('assets/img/img2.jpg') }}" alt="Doctorat" loading="lazy">
              <div class="card-overlay"></div>
              <span class="diploma-badge">Doctorat</span>
            </div>
            <div class="diploma-card-body">
              <h5>Doctorat</h5>
              <p>Le summum de l'excellence académique et professionnelle. Un programme doctoral rigoureux orienté vers la recherche appliquée et l'innovation managériale.</p>
              <div class="d-flex align-items-center gap-3 mt-3 pt-3" style="border-top: 1px solid #eef0f5;">
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-clock text-gold"></i>
                  <span class="text-muted" style="font-size:13px;">3 à 4 ans</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-geo-alt text-gold"></i>
                  <span class="text-muted" style="font-size:13px;">Recherche hybride</span>
                </div>
              </div>
            </div>
            <div class="diploma-card-footer">
              <a href="{{ route('elite.training.diploma.doctorat') }}" class="btn-discover">
                En savoir plus <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /DIPLOMAS -->


  <!-- ===== CERTIFICATIONS ===== -->
  <section class="et-certifications" id="certifications">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <span class="section-label">Certifications</span>
        <h2 class="section-title mb-3">Nos Certifications <span class="accent">Professionnelles</span></h2>
        <p class="section-subtitle">8 domaines d'expertise pour propulser votre carrière vers l'excellence</p>
      </div>

      <div class="row g-4">
        @php
          $certifications = [
            ['slug' => 'audit-comptabilite-finance', 'domain' => 'Audit, Comptabilité & Finance', 'img' => 'img3.jpg', 'title' => 'Audit, Comptabilité & Finance', 'desc' => 'Maîtrisez les outils comptables, le reporting IFRS et les analyses financières essentielles.'],
            ['slug' => 'controle-de-gestion', 'domain' => 'Contrôle de Gestion', 'img' => 'img3.jpg', 'title' => 'Contrôle de Gestion', 'desc' => 'Pilotez la performance financière et la trésorerie de votre entreprise avec efficacité.'],
            ['slug' => 'informatique-ntic', 'domain' => 'Informatique & NTIC', 'img' => 'company.jpg', 'title' => 'Informatique & NTIC', 'desc' => 'Cybersécurité, audit de sécurité, réseaux et systèmes d\'information.'],
            ['slug' => 'soft-skills', 'domain' => 'Soft Skills & Développement Personnel', 'img' => 'professionel.jpg', 'title' => 'Développement Personnel & Soft Skills', 'desc' => 'Gestion du temps, intelligence émotionnelle, négociation et leadership.'],
            ['slug' => 'projets-developpement', 'domain' => 'Projets & Programmes de Développement', 'img' => 'cta-bg.jpg', 'title' => 'Projets & Programmes de Développement', 'desc' => 'Planification, exécution, suivi-évaluation et audit des projets en Afrique.'],
            ['slug' => 'projet-educatif', 'domain' => 'Projet Éducatif en Afrique', 'img' => 'services.jpg', 'title' => 'Projet Éducatif en Afrique', 'desc' => 'Gouvernance, pilotage et amélioration de la qualité du secteur éducatif.'],
            ['slug' => 'ecommerce-fintech', 'domain' => 'E-Commerce, Fintech & Développement Durable', 'img' => 'services.jpg', 'title' => 'E-Commerce & Fintech', 'desc' => 'Intelligence Artificielle, transformation numérique et solutions financières.'],
            ['slug' => 'marches-publics', 'domain' => 'Marchés Publics', 'img' => 'im1.jpg', 'title' => 'Marchés Publics', 'desc' => 'Passation, exécution et suivi des contrats de marchés publics.'],
          ];
        @endphp

        @foreach($certifications as $i => $cert)
        <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{ ($i % 4 + 1) * 100 }}">
          <a href="{{ route('elite.training.domain', $cert['slug']) }}" class="text-decoration-none text-dark">
            <div class="cert-card cursor-pointer">
              <div class="cert-card-img">
                <img src="{{ asset('assets/img/' . $cert['img']) }}" alt="{{ $cert['title'] }}" loading="lazy">
              </div>
              <div class="cert-card-body">
                <h6>{{ $cert['title'] }}</h6>
                <p>{{ $cert['desc'] }}</p>
                <span class="cert-card-link">
                  Voir les formations <i class="bi bi-arrow-right"></i>
                </span>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- /CERTIFICATIONS -->


  <!-- ===== PROGRAMME / CALENDAR ===== -->
  @php
    $frenchMonths = [
      1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril',
      5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août',
      9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre'
    ];
    $currentMonthNum = (int)date('n'); // Month 1..12
    $rollingMonths = [];
    for ($i = 0; $i < 3; $i++) {
        $mNum = (($currentMonthNum - 1 + $i) % 12) + 1;
        $name = $frenchMonths[$mNum];
        $slug = \Illuminate\Support\Str::slug($name);
        $rollingMonths[] = [
            'name' => $name,
            'slug' => $slug,
            'num'  => $mNum
        ];
    }
  @endphp

  <section class="et-schedule" id="programme">
    <div class="container">
      <div class="text-center mb-4" data-aos="fade-up">
        <span class="section-label">CALENDRIER</span>
        <h2 class="section-title mb-2">Formez-vous Dès Maintenant</h2>
        <p class="section-subtitle">Sessions à venir — Inscrivez-vous avant la date limite</p>
      </div>

      <!-- Quarter Indicator -->
      <div class="text-center mb-3" data-aos="fade-up">
        <span id="quarter-indicator" class="quarter-indicator-badge">T1 (Janvier - Mars)</span>
      </div>

      <!-- Month filter tabs by Quarter -->
      <div class="month-filter d-flex align-items-center justify-content-center mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="quarter-nav-wrapper d-flex align-items-center gap-2 flex-wrap justify-content-center">
          <button class="quarter-nav-btn" id="prev-quarter" title="Trimestre précédent" type="button">
            <i class="bi bi-chevron-left"></i>
          </button>
          
          <div id="quarter-months" class="d-flex flex-wrap gap-2 justify-content-center align-items-center">
            <!-- Dynamically populated by JS -->
          </div>
          
          <button class="quarter-nav-btn" id="next-quarter" title="Trimestre suivant" type="button">
            <i class="bi bi-chevron-right"></i>
          </button>
        </div>
      </div>

      <!-- Swiper Carousel -->
      <div class="swiper scheduleSwiper" data-aos="fade-up" data-aos-delay="200">
        <div class="swiper-wrapper">

          @forelse($allFormations ?? [] as $index => $formation)
          @php 
            $monthsList = ['janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre'];
            $month = $formation->start_date ? $monthsList[$formation->start_date->format('n') - 1] : $monthsList[$index % 12];
          @endphp
          <div class="swiper-slide filterable-slide" data-month="{{ $month }}" style="width: 300px;">
            <div class="schedule-card">
              <div class="schedule-card-img">
                <img src="{{ $formation->image ? asset('storage/' . $formation->image) : asset('assets/img/img3.jpg') }}" alt="{{ $formation->title }}" loading="lazy">
              </div>
              <div class="schedule-card-body">
                <span class="schedule-code">{{ $formation->code ?: ($formation->type === 'diplomante' ? 'DIPLÔME' : 'CERTIF') }}</span>
                <h6 title="{{ $formation->title }}">{{ $formation->title }}</h6>
                <div class="schedule-meta">
                  <div class="schedule-meta-item">
                    <i class="bi bi-geo-alt"></i>
                    <span>{{ $formation->location ?: 'Tunis & En ligne' }}</span>
                  </div>
                  <div class="schedule-meta-item">
                    <i class="bi bi-clock"></i>
                    <span>{{ $formation->duration ?: 'Non spécifiée' }}</span>
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <span class="schedule-price">
                    @if($formation->price)
                      {{ number_format($formation->price, 0, ',', ' ') }} €
                    @else
                      Sur devis
                    @endif
                  </span>
                  <span class="badge" style="background: rgba(206,146,51,0.1); color: var(--gold-dark); font-size:11px; padding: 5px 10px; border-radius: 6px;">{{ ucfirst($formation->type) }}</span>
                </div>
                <a href="#contact" onclick="document.querySelector('input[name=objet]').value = '{{ addslashes($formation->code ? '['.$formation->code.'] '.$formation->title : $formation->title) }}'" class="btn-register">S'inscrire / Devis</a>
              </div>
            </div>
          </div>
          @empty
          <div class="text-center py-5 text-muted">
            <p>Aucune formation disponible pour le moment.</p>
          </div>
          @endforelse

          </div>

          <div class="swiper-pagination mt-4" style="position: relative;"></div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>

      <div class="text-center mt-5">
        <a href="{{ route('home') }}" class="btn-gold">
          <i class="bi bi-calendar4-week"></i>
          Voir tout le programme
        </a>
      </div>
    </div>
  </section>
  <!-- /PROGRAMME -->


  <!-- ===== CONTACT ===== -->
  <section class="et-contact" id="contact">
    <div class="container position-relative" style="z-index: 2;">
      <div class="row g-5 align-items-center">

        <!-- Info -->
        <div class="col-lg-5" data-aos="fade-right">
          <span class="section-label" style="background: rgba(206,146,51,0.18); color: var(--gold-light); border: 1px solid rgba(206,146,51,0.3);">
            <i class="bi bi-chat-left-dots-fill me-1"></i> Contact & Rendez-vous
          </span>
          <h2 class="mt-3 mb-4" style="font-family: var(--font-display); font-size: clamp(28px,4vw,46px); font-weight:900; color: white; line-height:1.2;">
            Restons <span style="color: var(--gold-light); background: linear-gradient(135deg, var(--gold-light), #ffffff); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Connectés !</span>
          </h2>
          <p class="mb-5" style="color: rgba(255,255,255,0.75); font-size: 15.5px; line-height: 1.8;">
            Notre équipe d'experts est à votre disposition pour planifier votre entretien d'admission, personnaliser votre programme ou vous guider sur les modalités de financement.
          </p>

          <div class="contact-info-card">
            <div class="contact-icon">
              <i class="bi bi-geo-alt-fill"></i>
            </div>
            <div>
              <h6>Adresse Siège</h6>
              <p>SIS 8 Rue Claude Bernard 1002 Belvédère-Tunis, Tunisie</p>
            </div>
          </div>

          <div class="contact-info-card">
            <div class="contact-icon">
              <i class="bi bi-telephone-fill"></i>
            </div>
            <div>
              <h6>Ligne Directe</h6>
              <p><a href="tel:+21655332885">+216 55 332 885</a></p>
            </div>
          </div>

          <div class="contact-info-card">
            <div class="contact-icon">
              <i class="bi bi-envelope-check-fill"></i>
            </div>
            <div>
              <h6>Email Officiel</h6>
              <p><a href="mailto:contact@caei-afri.com">contact@caei-afri.com</a></p>
            </div>
          </div>

          <div class="contact-info-card">
            <div class="contact-icon">
              <i class="bi bi-clock-fill"></i>
            </div>
            <div>
              <h6>Horaires d'Ouverture</h6>
              <p>Lundi – Vendredi : 09h00 – 18h00</p>
            </div>
          </div>

          <div class="mt-4 pt-2">
            <p class="mb-3" style="color: rgba(255,255,255,0.6); font-size: 13px; text-transform: uppercase; letter-spacing: 1.2px; font-weight: 700;">Rejoignez la Communauté</p>
            <div class="social-links">
              <a href="https://www.facebook.com/CAEIAfrique/" target="_blank" class="social-link" title="Facebook CAEI">
                <i class="bi bi-facebook"></i>
              </a>
              <a href="https://www.instagram.com/caei_afri/" target="_blank" class="social-link" title="Instagram CAEI">
                <i class="bi bi-instagram"></i>
              </a>
              <a href="https://www.linkedin.com/company/comit%C3%A9-africain-d-expertise-internationale-caei/" target="_blank" class="social-link" title="LinkedIn CAEI">
                <i class="bi bi-linkedin"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Form -->
        <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
          <div class="contact-form-card">
            <div class="d-flex align-items-center justify-content-between mb-4">
              <div>
                <span class="badge mb-2" style="background: rgba(206,146,51,0.18); color: var(--gold-light); border: 1px solid rgba(206,146,51,0.3); font-size: 11px; padding: 6px 12px; border-radius: 8px;">
                  Formulaire Rapide
                </span>
                <h3 style="font-family: var(--font-display); color: white; font-weight: 800; margin: 0;">
                  Prendre Rendez-vous en Ligne
                </h3>
              </div>
              <span class="d-none d-sm-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background: rgba(206,146,51,0.15); border-radius: 50%; color: var(--gold-light); font-size: 22px;">
                <i class="bi bi-calendar-plus"></i>
              </span>
            </div>

            @if(session('success'))
              <div class="alert alert-success border-0 rounded-4 mb-4 p-3 text-white font-bold d-flex align-items-center gap-3" style="background: rgba(40, 167, 69, 0.25); border: 1px solid #28a745 !important;">
                <i class="bi bi-check-circle-fill text-success" style="font-size: 24px;"></i>
                <div>
                  <strong class="d-block text-white">Demande Envoyée avec Succès !</strong>
                  <span style="font-size: 13.5px; opacity: 0.9;">{{ session('success') }}</span>
                </div>
              </div>
            @endif

            <form action="{{ route('elite.appointment.store') }}" method="POST" id="contactForm">
              @csrf
              <input type="hidden" name="type" value="appointment">
              <div class="row g-3">

                <!-- 1. Nom & Prénom -->
                <div class="col-md-6">
                  <div class="et-form-group">
                    <label>Nom & Prénom *</label>
                    <div class="input-icon-wrapper">
                      <i class="bi bi-person-fill"></i>
                      <input type="text" name="nom" class="et-form-control" placeholder="Votre nom & prénom" required>
                    </div>
                  </div>
                </div>

                <!-- 2. Téléphone -->
                <div class="col-md-6">
                  <div class="et-form-group">
                    <label>Téléphone *</label>
                    <div class="input-icon-wrapper">
                      <i class="bi bi-telephone-fill"></i>
                      <input type="tel" name="telephone" class="et-form-control" placeholder="+216 XX XXX XXX" required>
                    </div>
                  </div>
                </div>

                <!-- 3. Adresse e-mail -->
                <div class="col-md-6">
                  <div class="et-form-group">
                    <label>Adresse e-mail *</label>
                    <div class="input-icon-wrapper">
                      <i class="bi bi-envelope-fill"></i>
                      <input type="email" name="email" class="et-form-control" placeholder="votre@email.com" required>
                    </div>
                  </div>
                </div>

                <!-- 4. Pays -->
                <div class="col-md-6">
                  <div class="et-form-group">
                    <label>Pays *</label>
                    <div class="input-icon-wrapper">
                      <i class="bi bi-geo-alt-fill"></i>
                      <input type="text" name="pays" class="et-form-control" placeholder="Ex: Tunisie, Côte d'Ivoire..." required>
                    </div>
                  </div>
                </div>

                <!-- 5. Fonction / Poste -->
                <div class="col-md-6">
                  <div class="et-form-group">
                    <label>Fonction / Poste *</label>
                    <div class="input-icon-wrapper">
                      <i class="bi bi-briefcase-fill"></i>
                      <input type="text" name="poste" class="et-form-control" placeholder="Ex: Directeur Financier..." required>
                    </div>
                  </div>
                </div>

                <!-- 6. Entreprise / Institution -->
                <div class="col-md-6">
                  <div class="et-form-group">
                    <label>Entreprise / Institution *</label>
                    <div class="input-icon-wrapper">
                      <i class="bi bi-building"></i>
                      <input type="text" name="entreprise" class="et-form-control" placeholder="Nom de votre entreprise" required>
                    </div>
                  </div>
                </div>

                <!-- 7. Formation ou séminaire choisi -->
                <div class="col-md-6">
                  <div class="et-form-group">
                    <label>Formation ou séminaire choisi *</label>
                    <div class="input-icon-wrapper">
                      <i class="bi bi-journal-bookmark-fill"></i>
                      <input type="text" name="objet" class="et-form-control" placeholder="Intitulé de la formation" required>
                    </div>
                  </div>
                </div>

                <!-- 8. Date / Session souhaitée -->
                <div class="col-md-6">
                  <div class="et-form-group">
                    <label>Date / Session souhaitée</label>
                    <div class="input-icon-wrapper">
                      <i class="bi bi-calendar-event-fill"></i>
                      <input type="text" name="date_session" class="et-form-control" placeholder="Ex: Octobre 2026">
                    </div>
                  </div>
                </div>

                <!-- 9. Mode de participation -->
                <div class="col-md-6">
                  <div class="et-form-group">
                    <label>Mode de participation *</label>
                    <div class="input-icon-wrapper">
                      <i class="bi bi-laptop-fill"></i>
                      <select name="mode_participation" class="et-form-control" required style="background: rgba(255,255,255,0.08); color: white;">
                        <option value="" disabled selected style="background: #001f3f; color: white;">-- Sélectionner un mode --</option>
                        <option value="présentiel" style="background: #001f3f; color: white;">Présentiel</option>
                        <option value="en_ligne" style="background: #001f3f; color: white;">En ligne</option>
                      </select>
                    </div>
                  </div>
                </div>

                <!-- 10. Comment avez-vous connu cette formation ? -->
                <div class="col-md-6">
                  <div class="et-form-group">
                    <label>Comment avez-vous connu cette formation ?</label>
                    <div class="input-icon-wrapper">
                      <i class="bi bi-megaphone-fill"></i>
                      <select name="comment_connu" class="et-form-control" style="background: rgba(255,255,255,0.08); color: white;">
                        <option value="" disabled selected style="background: #001f3f; color: white;">-- Sélectionner une option --</option>
                        <option value="Réseaux sociaux" style="background: #001f3f; color: white;">Réseaux sociaux (LinkedIn, Facebook...)</option>
                        <option value="Recommandation" style="background: #001f3f; color: white;">Recommandation d'un collègue / ami</option>
                        <option value="Site web" style="background: #001f3f; color: white;">Site web CAEI</option>
                        <option value="Emailing / Newsletter" style="background: #001f3f; color: white;">Emailing / Newsletter</option>
                        <option value="Autre" style="background: #001f3f; color: white;">Autre</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-12 mt-4">
                  <button type="submit" class="btn-gold w-100 justify-content-center py-3" style="border: none; font-size: 16px; border-radius: 12px;">
                    <i class="bi bi-send-fill me-2"></i>
                    Envoyer ma demande d'inscription
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /CONTACT -->


  <!-- ===== FOOTER ===== -->
  <footer class="et-footer">
    <div class="container">
      <p>
        © {{ date('Y') }} <a href="{{ route('elite.training') }}">CAEI Elite Training</a>. 
        Tous droits réservés. | 
        <a href="{{ route('home') }}" style="color: rgba(255,255,255,0.4);">← Retour au portail</a>
      </p>
    </div>
  </footer>


  <!-- ===== MODALE DE LISTE DES FORMATIONS PAR CATÉGORIE ===== -->
  <div class="modal fade" id="categoryFormationsModal" tabindex="-1" aria-labelledby="categoryModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content" style="border-radius: 24px; overflow: hidden; border: none; box-shadow: 0 25px 60px rgba(0,0,0,0.35);">
        {{-- Modal Header --}}
        <div class="modal-header px-4 py-3" style="background: linear-gradient(135deg, #001f3f 0%, #002f5e 100%); color: #ffffff;">
          <div class="d-flex align-items-center gap-3">
            <span class="d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: rgba(206,146,51,0.2); border-radius: 12px; color: #f0b75a; font-size: 20px;">
              <i class="bi bi-journal-bookmark-fill"></i>
            </span>
            <div>
              <span class="text-uppercase tracking-wider font-bold" style="font-size: 11px; color: #f0b75a; letter-spacing: 1px;">Catalogue CAEI Elite</span>
              <h4 class="modal-title font-black mb-0 text-white" id="categoryModalTitle" style="font-family: 'Outfit', sans-serif;">Formations</h4>
            </div>
          </div>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>

        {{-- Modal Sub-header / Search --}}
        <div class="px-4 py-3 border-bottom d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3" style="background: #f8f9fc;">
          <div style="font-size: 14px; font-weight: 600; color: #4a5568;" id="categoryModalSubtitle">
            Formations disponibles
          </div>
          <div style="min-width: 250px;">
            <input type="text" id="categoryModalSearch" onkeyup="filterCategoryModalCourses()" placeholder="🔍 Rechercher dans ce domaine..." class="form-control form-control-sm rounded-pill" style="padding: 8px 16px; border-color: #cbd5e1;">
          </div>
        </div>

        {{-- Modal Body --}}
        <div class="modal-body p-4" style="background: #f1f5f9;">
          <div class="row g-4" id="categoryModalGrid">
            {{-- Injection dynamique par JavaScript --}}
          </div>
        </div>

        {{-- Modal Footer --}}
        <div class="modal-footer px-4 py-3" style="background: #ffffff; border-top: 1px solid #e2e8f0;">
          <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal" style="font-size: 14px; font-weight: 600;">Fermer</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /MODALE -->


  <!-- ===== SCRIPTS ===== -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
    // Toutes les formations chargées depuis la base de données
    window.allFormationsData = @json($allFormations ?? []);

    // Fonction pour ouvrir la modale d'une catégorie
    function openCategoryModal(domainName, categoryTitle) {
      document.getElementById('categoryModalTitle').textContent = categoryTitle;
      document.getElementById('categoryModalSearch').value = '';
      
      const grid = document.getElementById('categoryModalGrid');
      grid.innerHTML = '';

      // Filtrer les formations correspondant au domaine (comparaison souple)
      const matchingFormations = window.allFormationsData.filter(f => {
        if (!f.domain) return false;
        const d1 = f.domain.toLowerCase().trim();
        const d2 = domainName.toLowerCase().trim();
        return d1.includes(d2) || d2.includes(d1);
      });

      document.getElementById('categoryModalSubtitle').innerHTML = `
        <span class="badge bg-warning text-dark px-3 py-1 rounded-pill">${matchingFormations.length} Formations</span> disponibles en <strong>${categoryTitle}</strong>
      `;

      if (matchingFormations.length === 0) {
        grid.innerHTML = `
          <div class="col-12 text-center py-5">
            <div class="fs-1 text-muted mb-2">📁</div>
            <h6 class="text-muted">Aucune formation répertoriée dans cette catégorie pour le moment.</h6>
          </div>
        `;
      } else {
        matchingFormations.forEach(f => {
          const col = document.createElement('div');
          col.className = 'col-md-6 col-lg-6 category-course-item';
          col.setAttribute('data-search', `${f.code || ''} ${f.title || ''} ${f.description || ''}`.toLowerCase());

          const formattedPrice = f.price ? Number(f.price).toLocaleString('fr-FR') + ' €' : 'Sur devis';
          const courseCode = f.code ? `<span class="badge bg-primary text-white font-mono px-2 py-1">${f.code}</span>` : '';

          col.innerHTML = `
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 transition" style="background: #ffffff; border-left: 4px solid #ce9233 !important;">
              <div class="d-flex align-items-center justify-content-between mb-2">
                ${courseCode}
                <span class="badge bg-light text-dark border px-2.5 py-1" style="font-size: 12px; font-weight: 600;">
                  ⏱️ ${f.duration || '2 Semaines'}
                </span>
              </div>
              <h6 class="font-bold text-navy mb-2" style="font-family: 'Outfit', sans-serif; font-size: 16px; color: #001f3f; line-height: 1.4;">
                ${f.title}
              </h6>
              <p class="text-muted mb-3" style="font-size: 13px; line-height: 1.5; flex-grow: 1;">
                ${f.description || 'Formation de haut niveau pour renforcer les compétences professionnelles.'}
              </p>
              <div class="d-flex align-items-center justify-content-between pt-3 mt-auto border-top">
                <div>
                  <span class="text-muted d-block" style="font-size: 11px;">Tarif indicatif</span>
                  <span class="font-black" style="font-size: 18px; color: #ce9233;">${formattedPrice}</span>
                </div>
                <button type="button" onclick="selectCourseAndContact('${escapeHtml(f.code ? '['+f.code+'] '+f.title : f.title)}')" class="btn btn-sm btn-gold font-bold px-3 py-2 rounded-pill" style="font-size: 13px;">
                  S'inscrire / Devis →
                </button>
              </div>
            </div>
          `;
          grid.appendChild(col);
        });
      }

      // Afficher la modale Bootstrap
      const modalEl = document.getElementById('categoryFormationsModal');
      const bsModal = new bootstrap.Modal(modalEl);
      bsModal.show();
    }

    // Helper pour échapper le HTML dans les attributs JS
    function escapeHtml(str) {
      return str.replace(/'/g, "\\'").replace(/"/g, '&quot;');
    }

    // Filtrer les cours dans la modale via le champ de recherche
    function filterCategoryModalCourses() {
      const q = document.getElementById('categoryModalSearch').value.toLowerCase().trim();
      const items = document.querySelectorAll('.category-course-item');
      items.forEach(item => {
        const text = item.getAttribute('data-search') || '';
        item.style.display = text.includes(q) ? 'block' : 'none';
      });
    }

    // Sélectionner une formation et défiler vers le formulaire de contact
    function selectCourseAndContact(courseTitle) {
      // Fermer la modale
      const modalEl = document.getElementById('categoryFormationsModal');
      const bsModal = bootstrap.Modal.getInstance(modalEl);
      if (bsModal) bsModal.hide();

      // Remplir l'objet du formulaire de contact
      const objetInput = document.querySelector('input[name=objet]');
      if (objetInput) {
        objetInput.value = courseTitle;
        objetInput.focus();
      }

      // Défiler en douceur vers le formulaire de contact
      const contactSection = document.getElementById('contact');
      if (contactSection) {
        const offset = 80;
        const top = contactSection.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top, behavior: 'smooth' });
      }
    }

    // ===== AOS INIT =====
    AOS.init({ duration: 700, once: true, easing: 'ease-out-cubic' });

    // ===== NAVBAR SCROLL =====
    const navbar = document.getElementById('etNavbar');
    window.addEventListener('scroll', () => {
      navbar.classList.toggle('scrolled', window.scrollY > 60);
    });

    // ===== PARTICLE CANVAS =====
    const canvas = document.getElementById('particles-canvas');
    const ctx = canvas.getContext('2d');

    let particles = [];

    function resizeCanvas() {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
    }

    class Particle {
      constructor() { this.reset(); }
      reset() {
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;
        this.size = Math.random() * 2.5 + 0.5;
        this.speedX = (Math.random() - 0.5) * 0.6;
        this.speedY = (Math.random() - 0.5) * 0.6;
        this.opacity = Math.random() * 0.5 + 0.1;
        this.color = Math.random() > 0.5 ? 'rgba(206,146,51,' : 'rgba(255,255,255,';
      }
      update() {
        this.x += this.speedX;
        this.y += this.speedY;
        if (this.x < 0 || this.x > canvas.width || this.y < 0 || this.y > canvas.height) {
          this.reset();
        }
      }
      draw() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fillStyle = this.color + this.opacity + ')';
        ctx.fill();
      }
    }

    function initParticles() {
      particles = [];
      for (let i = 0; i < 120; i++) particles.push(new Particle());
    }

    function animateParticles() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      particles.forEach(p => { p.update(); p.draw(); });

      // Draw connections
      for (let i = 0; i < particles.length; i++) {
        for (let j = i + 1; j < particles.length; j++) {
          const dx = particles[i].x - particles[j].x;
          const dy = particles[i].y - particles[j].y;
          const dist = Math.sqrt(dx*dx + dy*dy);
          if (dist < 120) {
            ctx.beginPath();
            ctx.strokeStyle = `rgba(206,146,51,${0.06 * (1 - dist/120)})`;
            ctx.lineWidth = 0.5;
            ctx.moveTo(particles[i].x, particles[i].y);
            ctx.lineTo(particles[j].x, particles[j].y);
            ctx.stroke();
          }
        }
      }
      requestAnimationFrame(animateParticles);
    }

    resizeCanvas();
    initParticles();
    animateParticles();
    window.addEventListener('resize', () => { resizeCanvas(); initParticles(); });

    // ===== COUNTER ANIMATION =====
    function animateCounters() {
      document.querySelectorAll('.counter-animate').forEach(el => {
        const target = parseInt(el.dataset.target);
        const duration = 2000;
        const start = performance.now();

        function update(currentTime) {
          const elapsed = currentTime - start;
          const progress = Math.min(elapsed / duration, 1);
          const eased = 1 - Math.pow(1 - progress, 3);
          el.textContent = Math.floor(eased * target).toLocaleString();
          if (progress < 1) requestAnimationFrame(update);
          else el.textContent = target.toLocaleString();
        }
        requestAnimationFrame(update);
      });

      // Hero floating cards counters
      document.querySelectorAll('.hero-stat-card .stat-num[data-target]').forEach(el => {
        const target = parseInt(el.dataset.target);
        const duration = 1500;
        const start = performance.now();
        function update(t) {
          const progress = Math.min((t - start) / duration, 1);
          el.textContent = Math.floor((1 - Math.pow(1 - progress, 3)) * target).toLocaleString();
          if (progress < 1) requestAnimationFrame(update);
          else el.textContent = target.toLocaleString();
        }
        requestAnimationFrame(update);
      });
    }

    // ===== PROGRESS BARS ANIMATION =====
    function animateProgressBars() {
      document.querySelectorAll('.et-progress-bar').forEach(bar => {
        bar.style.width = bar.dataset.width + '%';
      });
    }

    // Intersection Observer for counters and progress bars
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          if (entry.target.classList.contains('et-stats')) animateCounters();
          if (entry.target.classList.contains('progress-section')) animateProgressBars();
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.3 });

    document.querySelector('.et-stats') && observer.observe(document.querySelector('.et-stats'));
    document.querySelector('.progress-section') && observer.observe(document.querySelector('.progress-section'));

    // ===== SWIPER INIT =====
    window.scheduleSwiper = new Swiper('.scheduleSwiper', {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.schedule-swiper-container .swiper-button-next',
        prevEl: '.schedule-swiper-container .swiper-button-prev',
      },
      breakpoints: {
        576: { slidesPerView: 2 },
        768: { slidesPerView: 2 },
        992: { slidesPerView: 3 },
        1200: { slidesPerView: 4 },
      }
    });

    // ===== QUARTERLY MONTH FILTER (TRIMESTRES) =====
    const quarters = [
      {
        title: 'Trimestre 1',
        label: 'T1 (Janvier - Mars)',
        months: [
          { slug: 'janvier', label: 'Janvier' },
          { slug: 'fevrier', label: 'Février' },
          { slug: 'mars', label: 'Mars' }
        ]
      },
      {
        title: 'Trimestre 2',
        label: 'T2 (Avril - Juin)',
        months: [
          { slug: 'avril', label: 'Avril' },
          { slug: 'mai', label: 'Mai' },
          { slug: 'juin', label: 'Juin' }
        ]
      },
      {
        title: 'Trimestre 3',
        label: 'T3 (Juillet - Septembre)',
        months: [
          { slug: 'juillet', label: 'Juillet' },
          { slug: 'aout', label: 'Août' },
          { slug: 'septembre', label: 'Septembre' }
        ]
      },
      {
        title: 'Trimestre 4',
        label: 'T4 (Octobre - Décembre)',
        months: [
          { slug: 'octobre', label: 'Octobre' },
          { slug: 'novembre', label: 'Novembre' },
          { slug: 'decembre', label: 'Décembre' }
        ]
      }
    ];

    let currentQuarterIdx = Math.floor((new Date().getMonth()) / 3);

    const quarterMonthsContainer = document.getElementById('quarter-months');
    const prevQuarterBtn = document.getElementById('prev-quarter');
    const nextQuarterBtn = document.getElementById('next-quarter');
    const quarterIndicator = document.getElementById('quarter-indicator');

    function filterSchedule(targetMonth, qIdx) {
      const scheduleSlides = document.querySelectorAll('.scheduleSwiper .swiper-slide');
      const currentQuarterMonths = quarters[qIdx].months.map(m => m.slug);
      let visibleCount = 0;

      scheduleSlides.forEach(slide => {
        const slideMonth = slide.getAttribute('data-month');
        if (targetMonth === 'all-quarter') {
          if (currentQuarterMonths.includes(slideMonth)) {
            slide.style.display = '';
            visibleCount++;
          } else {
            slide.style.display = 'none';
          }
        } else {
          if (slideMonth === targetMonth) {
            slide.style.display = '';
            visibleCount++;
          } else {
            slide.style.display = 'none';
          }
        }
      });

      let emptyMsg = document.getElementById('schedule-empty-msg');
      if (visibleCount === 0) {
        if (!emptyMsg) {
          emptyMsg = document.createElement('div');
          emptyMsg.id = 'schedule-empty-msg';
          emptyMsg.className = 'text-center py-5 text-muted w-100 fs-6';
          emptyMsg.innerHTML = '<p class="mb-0"><i class="bi bi-calendar-x fs-3 d-block text-warning mb-2"></i>Aucune session programmée pour ce mois.</p>';
          const wrapper = document.querySelector('.scheduleSwiper .swiper-wrapper');
          if (wrapper) wrapper.appendChild(emptyMsg);
        } else {
          emptyMsg.style.display = 'block';
        }
      } else {
        if (emptyMsg) {
          emptyMsg.style.display = 'none';
        }
      }

      if (window.scheduleSwiper) {
        window.scheduleSwiper.update();
        window.scheduleSwiper.slideTo(0);
      }
    }

    function renderQuarter(qIdx) {
      if (!quarterMonthsContainer) return;

      const quarter = quarters[qIdx];
      quarterMonthsContainer.innerHTML = '';

      // All Quarter Button
      const allBtn = document.createElement('button');
      allBtn.type = 'button';
      allBtn.className = 'month-pill-btn active';
      allBtn.setAttribute('data-month', 'all-quarter');
      allBtn.innerHTML = `<i class="bi bi-grid-fill me-1"></i> Tout ${quarter.title}`;
      quarterMonthsContainer.appendChild(allBtn);

      // Month Buttons
      quarter.months.forEach(m => {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'month-pill-btn';
        btn.setAttribute('data-month', m.slug);
        btn.innerText = m.label;
        quarterMonthsContainer.appendChild(btn);
      });

      if (quarterIndicator) {
        quarterIndicator.innerText = quarter.label;
      }

      const pills = quarterMonthsContainer.querySelectorAll('.month-pill-btn');
      pills.forEach(pill => {
        pill.addEventListener('click', function() {
          pills.forEach(p => p.classList.remove('active'));
          this.classList.add('active');
          const targetMonth = this.getAttribute('data-month');
          filterSchedule(targetMonth, qIdx);
        });
      });

      filterSchedule('all-quarter', qIdx);
    }

    if (prevQuarterBtn) {
      prevQuarterBtn.addEventListener('click', function() {
        currentQuarterIdx = (currentQuarterIdx - 1 + quarters.length) % quarters.length;
        renderQuarter(currentQuarterIdx);
      });
    }

    if (nextQuarterBtn) {
      nextQuarterBtn.addEventListener('click', function() {
        currentQuarterIdx = (currentQuarterIdx + 1) % quarters.length;
        renderQuarter(currentQuarterIdx);
      });
    }

    // Initial render on DOM Ready
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', function() {
        renderQuarter(currentQuarterIdx);
      });
    } else {
      renderQuarter(currentQuarterIdx);
    }

    // ===== SMOOTH SCROLL for nav links =====
    document.querySelectorAll('a[href^="#"]').forEach(a => {
      a.addEventListener('click', function(e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          e.preventDefault();
          const offset = 80;
          const top = target.getBoundingClientRect().top + window.scrollY - offset;
          window.scrollTo({ top, behavior: 'smooth' });
        }
      });
    });
  </script>
  <x-intl-tel-input />
</body>
</html>
