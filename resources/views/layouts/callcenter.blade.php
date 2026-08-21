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
      background-color: #f1f5f9;
      background-image: none;
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
      /* Scale slightly to ensure full coverage with no black bars */
      transform: translate(-50%, -50%) scale(1.1);
      pointer-events: none !important;
      opacity: 0.38;
      border: none;
      z-index: 0;
    }
    /* Transparent shield placed directly over the iframe to block YouTube UI icons */
    .video-iframe-shield {
      position: absolute;
      inset: 0;
      z-index: 1;
      pointer-events: none !important;
      background: transparent;
    }
    /* Overlay gradient — suffisamment opaque pour garantir la lisibilité */
    .video-overlay {
      position: absolute;
      inset: 0;
      background: rgba(248, 250, 252, 0.82);
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
    /* ── Global text color overrides for light video background ── */

    /* text-white → dark (sauf boutons/badges) */
    .text-white:not(.btn-glass-red):not(.cc-login-btn):not(.dropdown-item):not(.badge):not(.btn) {
      color: #0f172a !important;
    }

    /* Toutes les couleurs pâles inline → sombre */
    [style*="color: #cbd5e1"],
    [style*="color:#cbd5e1"] {
      color: #334155 !important;
    }
    [style*="color: #94a3b8"],
    [style*="color:#94a3b8"] {
      color: #475569 !important;
    }
    [style*="color: #64748b"],
    [style*="color:#64748b"] {
      color: #475569 !important;
    }

    /* Labels des formulaires */
    .form-label {
      color: #334155 !important;
    }

    /* Encadrés internes sombres dans glass-card → fond clair */
    [style*="background: rgba(255,255,255,0.05)"],
    [style*="background: rgba(255,255,255,0.03)"] {
      background: rgba(241, 245, 249, 0.9) !important;
      border-color: rgba(203, 213, 225, 0.8) !important;
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

    /* Call Center Navbar — Statique */
    .cc-navbar-wrap {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-bottom: 1px solid rgba(226, 232, 240, 0.9);
      box-shadow: 0 2px 20px rgba(15, 23, 42, 0.06);
      position: relative;
      z-index: 100;
      padding: 0 24px;
    }

    .cc-navbar {
      max-width: 1400px;
      margin: 0 auto;
      padding: 12px 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
    }

    .cc-nav-shell {
      display: flex;
      align-items: center;
      gap: 2px;
      padding: 4px;
      border: 1px solid rgba(226, 232, 240, 0.8);
      border-radius: 999px;
      background: rgba(241, 245, 249, 0.8);
    }

    .cc-nav-link {
      position: relative;
      border-radius: 999px;
      color: #475569 !important;
      font-size: 14px;
      font-weight: 600;
      padding: 8px 14px;
      white-space: nowrap;
      text-decoration: none;
      transition: color 0.25s ease, background 0.25s ease;
    }

    .cc-nav-link:hover,
    .cc-nav-link.active {
      color: var(--cc-red) !important;
      background: rgba(127, 5, 4, 0.08);
    }

    .cc-nav-link.active::after {
      content: "";
      position: absolute;
      left: 14px;
      right: 14px;
      bottom: 3px;
      height: 2px;
      border-radius: 2px;
      background: var(--cc-red);
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
      box-shadow: 0 6px 16px rgba(127, 5, 4, 0.25);
      transition: transform 0.25s ease, box-shadow 0.25s ease;
      white-space: nowrap;
    }

    .cc-login-btn:hover {
      color: #fff !important;
      transform: translateY(-1px);
      background: linear-gradient(135deg, #990505, #bd1515);
      box-shadow: 0 10px 22px rgba(127, 5, 4, 0.35);
    }

    .cc-back-home {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      min-height: 38px;
      border-radius: 999px;
      padding: 8px 16px;
      background: #ffffff;
      border: 1px solid #cbd5e1;
      color: #334155;
      font-size: 13px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.25s ease;
      white-space: nowrap;
    }

    .cc-back-home:hover {
      color: var(--cc-red);
      border-color: var(--cc-red);
    }

    .cc-nav-mobile-toggle {
      display: none;
      background: rgba(241, 245, 249, 0.9);
      border: 1px solid #cbd5e1;
      border-radius: 10px;
      padding: 8px 10px;
      cursor: pointer;
      color: #0f172a;
      font-size: 20px;
      line-height: 1;
    }

    @media (max-width: 991.98px) {
      .cc-navbar {
        flex-wrap: wrap;
      }
      .cc-nav-mobile-toggle {
        display: block;
      }
      .cc-nav-center,
      .cc-nav-right {
        display: none;
        width: 100%;
      }
      .cc-nav-center.open,
      .cc-nav-right.open {
        display: flex;
      }
      .cc-nav-shell {
        flex-direction: column;
        border-radius: 14px;
        width: 100%;
        align-items: stretch;
      }
      .cc-nav-link {
        border-radius: 10px;
        padding: 10px 14px;
      }
      .cc-nav-right {
        flex-direction: row;
        flex-wrap: wrap;
        gap: 8px;
        padding-bottom: 10px;
        justify-content: flex-start;
      }
    }

    @yield('styles')
  </style>
</head>
<body>

  <!-- Video Background Call Center (self-hosted — no YouTube icons) -->
  <div class="video-bg-container">
    <video autoplay muted loop playsinline preload="auto">
      <source src="{{ asset('assets/video/callcenter-bg.mp4') }}" type="video/mp4">
    </video>
    <div class="video-overlay"></div>
  </div>

  <div class="ambient-orb orb-1"></div>
  <div class="ambient-orb orb-2"></div>

  <!-- Navbar Statique -->
  <header class="cc-navbar-wrap">
    <nav class="cc-navbar">

      <!-- Logo -->
      <a href="{{ route('callcenter.index') }}" style="flex-shrink:0; display:flex; align-items:center; text-decoration:none;">
        <img src="{{ asset('images/logo-call-center.png') }}" alt="CAEI Call Center"
          style="height: 90px; width: auto; object-fit: contain; border-radius: 6px; transition: opacity 0.25s ease;"
          onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">
      </a>

      <!-- Bouton mobile -->
      <button class="cc-nav-mobile-toggle" onclick="
        var c = document.getElementById('cc-nav-center');
        var r = document.getElementById('cc-nav-right');
        c.classList.toggle('open');
        r.classList.toggle('open');
      ">
        <i class="bi bi-list"></i>
      </button>

      <!-- Liens de navigation -->
      <div id="cc-nav-center" class="cc-nav-center" style="display:flex; align-items:center;">
        <div class="cc-nav-shell">
          <a class="cc-nav-link {{ request()->routeIs('callcenter.index') ? 'active' : '' }}" href="{{ route('callcenter.index') }}">Accueil</a>
          <a class="cc-nav-link {{ request()->routeIs('callcenter.about') ? 'active' : '' }}" href="{{ route('callcenter.about') }}">Qui sommes-nous !</a>
          <a class="cc-nav-link {{ request()->routeIs('callcenter.services') ? 'active' : '' }}" href="{{ route('callcenter.services') }}">Nos services</a>
          <a class="cc-nav-link {{ request()->routeIs('callcenter.blog') ? 'active' : '' }}" href="{{ route('callcenter.blog') }}">Nos actualités</a>
          <a class="cc-nav-link {{ request()->routeIs('callcenter.contact') ? 'active' : '' }}" href="{{ route('callcenter.contact') }}">Contactez-nous !</a>
        </div>
      </div>

      <!-- Boutons droite -->
      <div id="cc-nav-right" class="cc-nav-right" style="display:flex; align-items:center; gap:8px; flex-shrink:0;">
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

    </nav>
  </header>

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
          <div class="col-lg-4 col-md-12 text-center text-lg-start">
            <div class="mb-4 d-inline-block">
              <img src="{{ asset('images/logo-callcenter-footer.png') }}" alt="CAEI Call Center Logo" class="img-fluid" style="max-height: 75px; max-width: 250px; width: auto; object-fit: contain; filter: drop-shadow(0 2px 8px rgba(0,0,0,0.06));">
            </div>
            
            <p class="small mb-4" style="color: #334155; line-height: 1.7; font-weight: 500; max-width: 340px; margin: 0 auto; margin-lg-0: 0;">
              L'excellence opérationnelle au service de votre relation client grâce aux dernières innovations technologiques.
            </p>
            
            <div class="d-flex justify-content-center justify-content-lg-start gap-2">
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
          <div class="col-lg-4 col-md-6">
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
          <div class="col-lg-4 col-md-6">
            <h5 class="fw-bold mb-4" style="color: #0f172a; font-size: 17px; letter-spacing: 0.5px;">Liens utiles</h5>
            <ul class="list-unstyled mb-0">
              <li class="mb-3"><a href="{{ route('callcenter.about') }}" class="text-decoration-none small fw-semibold" style="color: #334155; transition: all 0.2s;" onmouseover="this.style.color='var(--cc-red)'; this.style.paddingLeft='4px'" onmouseout="this.style.color='#334155'; this.style.paddingLeft='0'"><i class="bi bi-chevron-right me-2" style="color: var(--cc-red); font-size: 12px;"></i>Qui Sommes-Nous ?</a></li>
              <li class="mb-3"><a href="{{ route('callcenter.services') }}" class="text-decoration-none small fw-semibold" style="color: #334155; transition: all 0.2s;" onmouseover="this.style.color='var(--cc-red)'; this.style.paddingLeft='4px'" onmouseout="this.style.color='#334155'; this.style.paddingLeft='0'"><i class="bi bi-chevron-right me-2" style="color: var(--cc-red); font-size: 12px;"></i>Nos Services</a></li>
              <li class="mb-3"><a href="#" class="text-decoration-none small fw-semibold" style="color: #334155; transition: all 0.2s;" onmouseover="this.style.color='var(--cc-red)'; this.style.paddingLeft='4px'" onmouseout="this.style.color='#334155'; this.style.paddingLeft='0'"><i class="bi bi-chevron-right me-2" style="color: var(--cc-red); font-size: 12px;"></i>Carrières</a></li>
              <li class="mb-3"><a href="#" class="text-decoration-none small fw-semibold" style="color: #334155; transition: all 0.2s;" onmouseover="this.style.color='var(--cc-red)'; this.style.paddingLeft='4px'" onmouseout="this.style.color='#334155'; this.style.paddingLeft='0'"><i class="bi bi-chevron-right me-2" style="color: var(--cc-red); font-size: 12px;"></i>Confidentialité</a></li>
              <li class="mb-0"><a href="{{ route('callcenter.support') }}" class="text-decoration-none small fw-semibold" style="color: #334155; transition: all 0.2s;" onmouseover="this.style.color='var(--cc-red)'; this.style.paddingLeft='4px'" onmouseout="this.style.color='#334155'; this.style.paddingLeft='0'"><i class="bi bi-chevron-right me-2" style="color: var(--cc-red); font-size: 12px;"></i>Support Client</a></li>
            </ul>
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
