<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'CAEI Call Center — 3D Glassmorphism')</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo-callcenter-white.png') }}">
  
  <!-- Fonts (preload for speed) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  
  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <!-- Font Awesome chargé en différé -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" media="print" onload="this.media='all'">
  
  <!-- AOS Animation -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <style>
    :root {
      --cc-red: #7f0504;
      --cc-red-light: #a81111;
      --cc-red-dark: #5c0202;
      --cc-red-glow: rgba(127, 5, 4, 0.25);
      --font-main: 'Inter', sans-serif;
    }

    body {
      font-family: var(--font-main);
      background-color: #f8fafc;
      background-image: 
        radial-gradient(circle at 15% 15%, rgba(127, 5, 4, 0.05) 0%, transparent 40%),
        radial-gradient(circle at 85% 85%, rgba(15, 23, 42, 0.04) 0%, transparent 40%),
        linear-gradient(135deg, #f8fafc 0%, #f1f5f9 50%, #edf2f7 100%);
      color: #334155;
      overflow-x: hidden;
      line-height: 1.6;
      -webkit-font-smoothing: antialiased;
    }

    /* Ambient Background Orbs — doux et lumineux */
    .ambient-orb {
      position: fixed;
      border-radius: 50%;
      filter: blur(80px);
      z-index: -1;
      pointer-events: none;
      will-change: opacity;
    }
    .orb-1 {
      width: 500px;
      height: 500px;
      background: rgba(127, 5, 4, 0.07);
      top: 0%;
      left: -5%;
    }
    .orb-2 {
      width: 550px;
      height: 550px;
      background: rgba(14, 165, 233, 0.05);
      bottom: 5%;
      right: -5%;
    }

    /* Video Background Container */
    .video-bg-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      z-index: -2;
      overflow: hidden;
      background: #f8fafc;
      pointer-events: none !important;
      user-select: none;
    }
    .video-bg-container iframe,
    .video-bg-container video {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 100vw;
      height: 56.25vw;
      min-height: 100vh;
      min-width: 177.77vh;
      object-fit: cover;
      transform: translate(-50%, -50%) scale(1.25);
      pointer-events: none !important;
      opacity: 0.38;
      border: none;
      z-index: 0;
    }
    /* Overlay gradient for maximum readability placed ON TOP of video to block any UI */
    .video-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(248, 250, 252, 0.65) 0%, rgba(241, 245, 249, 0.45) 50%, rgba(248, 250, 252, 0.65) 100%);
      z-index: 2;
      pointer-events: none !important;
    }

    /* 3D Perspective Wrapper */
    .perspective-wrapper {
      perspective: 1500px;
    }

    /* Glassmorphism Cards — style clair et épuré */
    .glass-card {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1px solid rgba(226, 232, 240, 0.9);
      border-radius: 20px;
      padding: 40px;
      transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
      height: 100%;
      position: relative;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
      color: #334155;
      will-change: transform;
    }
    .glass-card:hover {
      background: rgba(255, 255, 255, 0.98);
      border-color: rgba(127, 5, 4, 0.25);
      transform: translateY(-6px);
      box-shadow: 0 20px 40px rgba(15, 23, 42, 0.09), 0 0 20px rgba(127, 5, 4, 0.08);
    }
    
    .glass-icon {
      width: 56px;
      height: 56px;
      background: rgba(127, 5, 4, 0.08);
      border: 1px solid rgba(127, 5, 4, 0.18);
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      color: var(--cc-red);
      margin-bottom: 24px;
      box-shadow: 0 4px 12px rgba(127, 5, 4, 0.1);
      transition: transform 0.3s ease;
    }
    .glass-card:hover .glass-icon {
      transform: translateZ(30px) scale(1.1);
    }

    /* 3D Images */
    .img-3d {
      border-radius: 24px;
      box-shadow: 0 20px 40px rgba(15, 23, 42, 0.12);
      transition: transform 0.5s ease;
      border: 1px solid rgba(226, 232, 240, 0.8);
    }
    .img-3d:hover {
      transform: scale(1.02) rotateY(-2deg) rotateX(2deg);
    }

    /* Buttons */
    .btn-glass-red {
      background: linear-gradient(135deg, #7f0504 0%, #a81111 100%);
      color: #ffffff !important;
      border: 1px solid rgba(127, 5, 4, 0.3);
      border-radius: 12px;
      padding: 14px 32px;
      font-weight: 600;
      font-size: 15px;
      transition: all 0.3s ease;
      box-shadow: 0 10px 24px rgba(127, 5, 4, 0.28);
    }
    .btn-glass-red:hover {
      background: linear-gradient(135deg, #990505 0%, #bd1515 100%);
      transform: translateY(-2px);
      box-shadow: 0 15px 30px rgba(127, 5, 4, 0.4);
      color: #ffffff !important;
    }
    .btn-glass-outline {
      background: rgba(255, 255, 255, 0.9);
      color: #1e293b !important;
      border: 1px solid #cbd5e1;
      border-radius: 12px;
      padding: 14px 32px;
      font-weight: 600;
      font-size: 15px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
    }
    .btn-glass-outline:hover {
      background: #ffffff;
      border-color: var(--cc-red);
      color: var(--cc-red) !important;
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    /* Form Controls */
    .form-control-glass, .form-select-glass {
      background: rgba(255, 255, 255, 0.95);
      border: 1px solid #cbd5e1;
      border-radius: 12px;
      padding: 16px 20px;
      color: #0f172a;
      transition: all 0.3s;
      -webkit-appearance: none;
      appearance: none;
    }
    .form-select-glass {
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%2364748b' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 16px center;
      padding-right: 40px;
      cursor: pointer;
    }
    .form-select-glass option {
      background-color: #ffffff;
      color: #0f172a;
    }
    .form-control-glass:focus, .form-select-glass:focus {
      background: #ffffff;
      border-color: var(--cc-red-light);
      box-shadow: 0 0 0 4px rgba(127, 5, 4, 0.15);
      color: #0f172a;
      outline: none;
    }
    .form-control-glass::placeholder {
      color: #94a3b8;
    }

    /* Glass Badge */
    .glass-badge {
      display: inline-flex;
      align-items: center;
      padding: 6px 18px;
      border-radius: 999px;
      background: rgba(127, 5, 4, 0.08);
      border: 1px solid rgba(127, 5, 4, 0.2);
      color: var(--cc-red);
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      backdrop-filter: blur(8px);
    }

    /* Glass Icon Wrapper */
    .glass-icon-wrapper {
      width: 60px;
      height: 60px;
      background: rgba(127, 5, 4, 0.08);
      border: 1px solid rgba(127, 5, 4, 0.18);
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 26px;
      color: var(--cc-red);
      margin-bottom: 20px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(127, 5, 4, 0.08);
    }
    .glass-card:hover .glass-icon-wrapper {
      background: rgba(127, 5, 4, 0.15);
      transform: translateY(-4px) scale(1.05);
      box-shadow: 0 8px 25px rgba(127, 5, 4, 0.16);
    }

    /* Text Enhancements */
    h1, h2, h3, h4, h5, h6 {
      font-weight: 700;
      color: #0f172a;
      letter-spacing: 0;
    }
    .text-white:not(.btn-glass-red):not(.cc-login-btn):not(.dropdown-item):not(.badge):not(.btn) {
      color: #0f172a !important;
    }
    .text-white-50 {
      color: #64748b !important;
    }
    footer h5, footer h6 {
      color: #0f172a !important;
      font-weight: 700;
    }
    footer p, footer li, footer span {
      color: #334155;
    }
    .text-gradient {
      background: linear-gradient(135deg, #7f0504 0%, #a81111 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    /* Call Center Navbar */
    .cc-navbar-wrap {
      z-index: 1030;
      padding-top: 14px;
    }

    .cc-navbar {
      max-width: 1400px;
      padding: 10px 18px;
      border: 1px solid rgba(226, 232, 240, 0.9);
      border-radius: 18px;
      background: rgba(255, 255, 255, 0.88);
      backdrop-filter: blur(22px);
      -webkit-backdrop-filter: blur(22px);
      box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06), inset 0 1px 0 rgba(255, 255, 255, 0.9);
    }

    .cc-brand {
      min-width: 96px;
    }

    .cc-brand img {
      height: 48px;
      filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.08));
    }

    .cc-nav-shell {
      gap: 4px;
      padding: 5px;
      border: 1px solid rgba(226, 232, 240, 0.8);
      border-radius: 999px;
      background: rgba(241, 245, 249, 0.8);
      box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.04);
    }

    .cc-nav-shell .nav-link,
    .cc-nav-link {
      position: relative;
      border-radius: 999px;
      color: #475569 !important;
      font-size: 14px;
      font-weight: 600;
      padding: 9px 14px !important;
      white-space: nowrap;
      transition: color 0.25s ease, background 0.25s ease, box-shadow 0.25s ease;
    }

    .cc-nav-shell .nav-link:hover,
    .cc-nav-shell .nav-link.show,
    .cc-nav-link:hover,
    .cc-nav-link.active,
    .cc-nav-link.show {
      color: var(--cc-red) !important;
      background: rgba(127, 5, 4, 0.08);
      box-shadow: inset 0 0 0 1px rgba(127, 5, 4, 0.2);
    }

    .cc-nav-shell .nav-link.active::after,
    .cc-nav-link.active::after {
      content: "";
      position: absolute;
      left: 18px;
      right: 18px;
      bottom: 4px;
      height: 2px;
      border-radius: 2px;
      background: var(--cc-red);
      box-shadow: 0 0 8px rgba(127, 5, 4, 0.6);
    }

    .cc-nav-shell .dropdown-menu,
    .cc-dropdown {
      margin-top: 12px;
      padding: 8px;
      border: 1px solid rgba(226, 232, 240, 0.9) !important;
      border-radius: 14px;
      background: rgba(255, 255, 255, 0.96);
      backdrop-filter: blur(18px);
      -webkit-backdrop-filter: blur(18px);
      box-shadow: 0 20px 45px rgba(15, 23, 42, 0.1);
    }

    .cc-nav-shell .dropdown-item,
    .cc-dropdown .dropdown-item {
      border-radius: 10px;
      color: #334155 !important;
      font-size: 14px;
      padding: 10px 12px;
    }

    .cc-nav-shell .dropdown-item:hover,
    .cc-nav-shell .dropdown-item:focus,
    .cc-dropdown .dropdown-item:hover,
    .cc-dropdown .dropdown-item:focus,
    .cc-dropdown .dropdown-item.active {
      color: #fff !important;
      background: linear-gradient(135deg, #7f0504, #a81111) !important;
    }

    .cc-navbar-toggler {
      width: 44px;
      height: 42px;
      border: 1px solid #cbd5e1 !important;
      border-radius: 12px;
      background: rgba(241, 245, 249, 0.8);
      color: #0f172a;
    }

    .cc-login-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 38px;
      border-radius: 999px;
      padding: 9px 18px;
      background: linear-gradient(135deg, #7f0504, #a81111);
      color: #fff !important;
      font-size: 14px;
      font-weight: 700;
      text-decoration: none;
      box-shadow: 0 10px 20px rgba(127, 5, 4, 0.25);
      transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .cc-login-btn:hover {
      color: #fff !important;
      transform: translateY(-1px);
      background: linear-gradient(135deg, #990505, #bd1515);
      box-shadow: 0 14px 25px rgba(127, 5, 4, 0.35);
    }

    .cc-back-home {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      min-height: 38px;
      border-radius: 999px;
      padding: 9px 16px;
      background: rgba(255, 255, 255, 0.9);
      border: 1px solid #cbd5e1;
      color: #334155;
      font-size: 13px;
      font-weight: 600;
      text-decoration: none;
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
    }

    .cc-back-home:hover {
      color: var(--cc-red);
      background: #ffffff;
      border-color: var(--cc-red);
      transform: translateX(-3px);
    }

    .cc-back-home i {
      font-size: 15px;
      transition: transform 0.3s ease;
    }

    .cc-back-home:hover i {
      transform: translateX(-3px);
    }

    @media (max-width: 991.98px) {
      .cc-navbar {
        border-radius: 16px;
      }

      .cc-nav-shell {
        align-items: stretch !important;
        border-radius: 16px;
        background: rgba(241, 245, 249, 0.95);
      }

      .cc-nav-shell .nav-link,
      .cc-nav-link {
        border-radius: 12px;
        padding: 11px 14px !important;
      }

      .cc-nav-shell .nav-link.active::after,
      .cc-nav-link.active::after {
        left: 12px;
        right: auto;
        bottom: 10px;
        width: 3px;
        height: 18px;
      }
    }

    @yield('styles')
  </style>
</head>
<body>

  <!-- Video Background Call Center -->
  <div class="video-bg-container">
    <iframe src="https://www.youtube.com/embed/lx8lyKfDQdU?autoplay=1&mute=1&controls=0&showinfo=0&autohide=1&loop=1&playlist=lx8lyKfDQdU&playsinline=1&enablejsapi=1&disablekb=1&iv_load_policy=3&modestbranding=1&rel=0&vq=hd1080" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
    <div class="video-overlay"></div>
  </div>

  <div class="ambient-orb orb-1"></div>
  <div class="ambient-orb orb-2"></div>

  <!-- Floating Glass Navbar -->
  <div class="fixed-top cc-navbar-wrap px-3 px-lg-5">
    <nav class="navbar navbar-expand-lg mx-auto cc-navbar">
      <div class="container-fluid px-0">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center gap-3 py-0" href="{{ route('callcenter.index') }}">
          <img src="{{ asset('images/logo-caei-transparent.png') }}" alt="CAEI Call Center Logo" style="height: 100px; width: auto; object-fit: contain;">
        </a>
        
        <button class="navbar-toggler shadow-none cc-navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <i class="bi bi-list fs-3"></i>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <!-- Center Nav Pill (Glass Style) -->
          <div class="mx-auto my-3 my-lg-0">
            <ul class="navbar-nav align-items-center cc-nav-shell">
              <li class="nav-item">
                <a class="nav-link cc-nav-link {{ request()->routeIs('callcenter.index') ? 'active' : '' }}" href="{{ route('callcenter.index') }}">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link cc-nav-link {{ request()->routeIs('callcenter.about') ? 'active' : '' }}" href="{{ route('callcenter.about') }}">Qui sommes-nous !</a>
              </li>
              <li class="nav-item">
                <a class="nav-link cc-nav-link {{ request()->routeIs('callcenter.services') ? 'active' : '' }}" href="{{ route('callcenter.services') }}">Nos services</a>
              </li>


              <li class="nav-item">
                <a class="nav-link cc-nav-link {{ request()->routeIs('callcenter.blog') ? 'active' : '' }}" href="{{ route('callcenter.blog') }}">Nos actualités</a>
              </li>
              <li class="nav-item">
                <a class="nav-link cc-nav-link {{ request()->routeIs('callcenter.contact') ? 'active' : '' }}" href="{{ route('callcenter.contact') }}">Contactez-nous !</a>
              </li>
            </ul>
          </div>
          
          <!-- Right Buttons -->
          <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0">
            <a href="{{ route('home') }}" class="cc-back-home">
              <i class="bi bi-arrow-left"></i> Accueil CAEI
            </a>
            @auth
              @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.callcenter.index') }}" class="cc-login-btn"><i class="bi bi-speedometer2 me-1"></i> Espace Admin</a>
              @elseif(auth()->user()->isCallCenterAgent())
                <a href="{{ route('callcenter.agent.index') }}" class="cc-login-btn"><i class="bi bi-headset me-1"></i> Espace Agent</a>
              @elseif(auth()->user()->isCallCenterPartenaire())
                <a href="{{ route('callcenter.partenaire.index') }}" class="cc-login-btn"><i class="bi bi-handbag me-1"></i> Espace Partenaire</a>
              @else
                <a href="{{ route('dashboard') }}" class="cc-login-btn"><i class="bi bi-person-circle me-1"></i> Mon Compte</a>
              @endif
            @else
              <a href="{{ route('login') }}" class="cc-login-btn"><i class="bi bi-box-arrow-in-right me-1"></i> Connexion</a>
            @endauth
          </div>
        </div>
      </div>
    </nav>
  </div>

  <!-- Page Content -->
  <div class="perspective-wrapper">
    @yield('content')
  </div>

  <!-- Footer (Bright Clean Panoramic Footer with Minimalist Background Photo) -->
  <footer class="mt-5 position-relative z-2">
    <div style="background: linear-gradient(180deg, rgba(248, 250, 252, 0.40) 0%, rgba(241, 245, 249, 0.25) 50%, rgba(248, 250, 252, 0.50) 100%), url('{{ asset('images/callcenter-footer-bg.jpg') }}?v=3') center center / cover no-repeat; border-top: 1px solid rgba(203, 213, 225, 0.9); box-shadow: 0 -10px 40px rgba(15, 23, 42, 0.05); position: relative;">
      <div class="container pt-5 pb-4">
        <div class="row g-5 align-items-start">
          <!-- Logo & Social -->
          <div class="col-lg-3 col-md-6 text-center text-md-start">
            <div class="mb-4 d-inline-block">
              <img src="{{ asset('images/logo-callcenter-footer.png') }}" alt="CAEI Call Center Logo" class="img-fluid" style="max-height: 75px; max-width: 250px; width: auto; object-fit: contain; filter: drop-shadow(0 2px 8px rgba(0,0,0,0.06));">
            </div>
            
            <p class="small mb-4" style="color: #334155; line-height: 1.7; font-weight: 500;">L'excellence opérationnelle au service de votre relation client grâce aux dernières innovations technologiques.</p>
            
            <div class="d-flex justify-content-center justify-content-md-start gap-2">
              <a href="https://www.facebook.com/CAEICallCenter/" class="d-flex align-items-center justify-content-center text-decoration-none" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.9); border: 1px solid #cbd5e1; border-radius: 10px; color: var(--cc-red); transition: all 0.3s; box-shadow: 0 2px 8px rgba(0,0,0,0.04);" onmouseover="this.style.background='var(--cc-red)'; this.style.color='#fff'; this.style.borderColor='var(--cc-red)'; this.style.transform='translateY(-3px)'" onmouseout="this.style.background='rgba(255, 255, 255, 0.9)'; this.style.color='var(--cc-red)'; this.style.borderColor='#cbd5e1'; this.style.transform='translateY(0)'">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://www.instagram.com/caei_callcenter/" class="d-flex align-items-center justify-content-center text-decoration-none" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.9); border: 1px solid #cbd5e1; border-radius: 10px; color: var(--cc-red); transition: all 0.3s; box-shadow: 0 2px 8px rgba(0,0,0,0.04);" onmouseover="this.style.background='var(--cc-red)'; this.style.color='#fff'; this.style.borderColor='var(--cc-red)'; this.style.transform='translateY(-3px)'" onmouseout="this.style.background='rgba(255, 255, 255, 0.9)'; this.style.color='var(--cc-red)'; this.style.borderColor='#cbd5e1'; this.style.transform='translateY(0)'">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="https://www.linkedin.com/company/caei-call-center/" class="d-flex align-items-center justify-content-center text-decoration-none" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.9); border: 1px solid #cbd5e1; border-radius: 10px; color: var(--cc-red); transition: all 0.3s; box-shadow: 0 2px 8px rgba(0,0,0,0.04);" onmouseover="this.style.background='var(--cc-red)'; this.style.color='#fff'; this.style.borderColor='var(--cc-red)'; this.style.transform='translateY(-3px)'" onmouseout="this.style.background='rgba(255, 255, 255, 0.9)'; this.style.color='var(--cc-red)'; this.style.borderColor='#cbd5e1'; this.style.transform='translateY(0)'">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
          
          <!-- Contactez-nous -->
          <div class="col-lg-3 col-md-6">
            <h5 class="fw-bold mb-4" style="color: #0f172a; font-size: 17px; letter-spacing: 0.5px;">Contactez-nous</h5>
            <ul class="list-unstyled mb-0">
              <li class="d-flex align-items-start mb-3">
                <i class="bi bi-geo-alt-fill me-3 mt-1" style="color: var(--cc-red); font-size: 18px;"></i>
                <span class="small fw-semibold" style="color: #1e293b; line-height: 1.6;">SIS 8 Rue Claude Bernard<br>1002 Belvedere-Tunis</span>
              </li>
              <li class="d-flex align-items-center mb-3">
                <i class="bi bi-telephone-fill me-3" style="color: var(--cc-red); font-size: 18px;"></i>
                <span class="small fw-semibold" style="color: #1e293b;">+216 55 335 286</span>
              </li>
              <li class="d-flex align-items-center">
                <i class="bi bi-envelope-fill me-3" style="color: var(--cc-red); font-size: 18px;"></i>
                <span class="small fw-semibold" style="color: #1e293b;">contact@caei-afri.com</span>
              </li>
            </ul>
          </div>
          
          <!-- Liens utiles -->
          <div class="col-lg-3 col-md-6">
            <h5 class="fw-bold mb-4" style="color: #0f172a; font-size: 17px; letter-spacing: 0.5px;">Liens utiles</h5>
            <ul class="list-unstyled mb-0">
              <li class="mb-3"><a href="{{ route('callcenter.about') }}" class="text-decoration-none small fw-semibold" style="color: #334155; transition: all 0.2s;" onmouseover="this.style.color='var(--cc-red)'; this.style.paddingLeft='4px'" onmouseout="this.style.color='#334155'; this.style.paddingLeft='0'"><i class="bi bi-chevron-right me-2" style="color: var(--cc-red); font-size: 12px;"></i>Qui Sommes-Nous ?</a></li>
              <li class="mb-3"><a href="{{ route('callcenter.services') }}" class="text-decoration-none small fw-semibold" style="color: #334155; transition: all 0.2s;" onmouseover="this.style.color='var(--cc-red)'; this.style.paddingLeft='4px'" onmouseout="this.style.color='#334155'; this.style.paddingLeft='0'"><i class="bi bi-chevron-right me-2" style="color: var(--cc-red); font-size: 12px;"></i>Nos Services</a></li>
              <li class="mb-3"><a href="#" class="text-decoration-none small fw-semibold" style="color: #334155; transition: all 0.2s;" onmouseover="this.style.color='var(--cc-red)'; this.style.paddingLeft='4px'" onmouseout="this.style.color='#334155'; this.style.paddingLeft='0'"><i class="bi bi-chevron-right me-2" style="color: var(--cc-red); font-size: 12px;"></i>Carrières</a></li>
              <li class="mb-3"><a href="#" class="text-decoration-none small fw-semibold" style="color: #334155; transition: all 0.2s;" onmouseover="this.style.color='var(--cc-red)'; this.style.paddingLeft='4px'" onmouseout="this.style.color='#334155'; this.style.paddingLeft='0'"><i class="bi bi-chevron-right me-2" style="color: var(--cc-red); font-size: 12px;"></i>Confidentialité</a></li>
              <li class="mb-0"><a href="{{ route('callcenter.support') }}" class="text-decoration-none small fw-semibold" style="color: #334155; transition: all 0.2s;" onmouseover="this.style.color='var(--cc-red)'; this.style.paddingLeft='4px'" onmouseout="this.style.color='#334155'; this.style.paddingLeft='0'"><i class="bi bi-chevron-right me-2" style="color: var(--cc-red); font-size: 12px;"></i>Support Client</a></li>
            </ul>
          </div>
          
          <!-- Newsletter -->
          <div class="col-lg-3 col-md-6">
            <h5 class="fw-bold mb-4" style="color: #0f172a; font-size: 17px; letter-spacing: 0.5px;">Newsletter</h5>
            <p class="small mb-4" style="color: #334155; line-height: 1.6; font-weight: 500;">Restez informés des dernières évolutions de la relation client.</p>
            <div class="position-relative w-100">
              <input type="email" placeholder="Votre email" style="width: 100%; background: rgba(255, 255, 255, 0.95); border: 1.5px solid #cbd5e1; border-radius: 12px; padding: 14px 110px 14px 16px; color: #0f172a; outline: none; transition: border-color 0.3s; box-shadow: 0 2px 6px rgba(0,0,0,0.03);" onfocus="this.style.borderColor='var(--cc-red)'" onblur="this.style.borderColor='#cbd5e1'">
              <button type="button" class="position-absolute top-50 translate-middle-y end-0 me-2 border-0 text-white fw-medium" style="background: linear-gradient(135deg, #7f0504, #a81111); border-radius: 8px; padding: 8px 16px; font-size: 13px; transition: all 0.3s; box-shadow: 0 4px 12px rgba(127, 5, 4, 0.3);" onmouseover="this.style.background='linear-gradient(135deg, #990505, #bd1515)'" onmouseout="this.style.background='linear-gradient(135deg, #7f0504, #a81111)'">
                S'inscrire
              </button>
            </div>
          </div>
        </div>
        
        <!-- Sub Footer -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-4 mt-5" style="border-top: 1px solid rgba(203, 213, 225, 0.8);">
          <div class="small" style="color: #475569; font-weight: 500;">
            &copy; {{ date('Y') }} <span class="fw-bold" style="color: #0f172a;">CAEI Call Center</span>. Tous droits réservés.
          </div>
          <div class="d-flex align-items-center mt-3 mt-md-0">
            <span class="small me-4" style="color: #475569; font-weight: 500;">Conçu par <span style="color: var(--cc-red); font-weight: 700;">CAEI Digital MOOV</span></span>
            <a href="#" class="d-flex align-items-center justify-content-center text-decoration-none" style="width: 38px; height: 38px; background: rgba(255, 255, 255, 0.9); border: 1px solid #cbd5e1; color: #334155; border-radius: 8px; transition: all 0.3s; box-shadow: 0 2px 6px rgba(0,0,0,0.04);" onmouseover="this.style.background='var(--cc-red)'; this.style.color='#fff'; this.style.borderColor='var(--cc-red)'" onmouseout="this.style.background='rgba(255, 255, 255, 0.9)'; this.style.color='#334155'; this.style.borderColor='#cbd5e1'" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;">
              <i class="bi bi-arrow-up"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      once: true,
      offset: 50
    });
  </script>
  @yield('scripts')
  {{-- intl-tel-input chargé uniquement sur les pages qui en ont besoin via @yield('scripts') --}}
</body>
</html>
