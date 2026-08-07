<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'CAEI Call Center — 3D Glassmorphism')</title>
  <link rel="icon" type="image/png" href="https://caei-afri.com/Callcenter/img/log%20(1).png">
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  
  <!-- AOS Animation -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <style>
    :root {
      --cc-red: #d11141;
      --font-main: 'Inter', sans-serif;
    }

    body {
      font-family: var(--font-main);
      background-color: #0d1b2a; /* Dark Premium Background */
      color: #fff;
      overflow-x: hidden;
      line-height: 1.6;
      -webkit-font-smoothing: antialiased;
    }

    /* Ambient Background Orbs */
    .ambient-orb {
      position: fixed;
      border-radius: 50%;
      filter: blur(100px);
      z-index: -1;
      animation: float-orb 15s infinite ease-in-out alternate;
    }
    .orb-1 {
      width: 400px;
      height: 400px;
      background: rgba(209, 17, 65, 0.15);
      top: 10%;
      left: -10%;
    }
    .orb-2 {
      width: 500px;
      height: 500px;
      background: rgba(43, 88, 118, 0.15);
      bottom: 20%;
      right: -10%;
      animation-delay: -5s;
    }

    @keyframes float-orb {
      0% { transform: translate(0, 0) scale(1); }
      50% { transform: translate(50px, 50px) scale(1.1); }
      100% { transform: translate(-30px, 80px) scale(0.9); }
    }

    /* 3D Perspective Wrapper */
    .perspective-wrapper {
      perspective: 1500px;
    }

    /* Glassmorphism Cards */
    .glass-card {
      background: rgba(255, 255, 255, 0.03);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 20px;
      padding: 40px;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      height: 100%;
      position: relative;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    .glass-card:hover {
      background: rgba(255, 255, 255, 0.06);
      border-color: rgba(255, 255, 255, 0.15);
      transform: translateY(-10px) rotateX(2deg) rotateY(2deg);
      box-shadow: 0 20px 40px rgba(0,0,0,0.4), 0 0 20px rgba(209, 17, 65, 0.2);
    }
    
    .glass-icon {
      width: 56px;
      height: 56px;
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      color: var(--cc-red);
      margin-bottom: 24px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      transition: transform 0.3s ease;
    }
    .glass-card:hover .glass-icon {
      transform: translateZ(30px) scale(1.1);
    }

    /* 3D Images */
    .img-3d {
      border-radius: 24px;
      box-shadow: 0 25px 50px rgba(0,0,0,0.5);
      transition: transform 0.5s ease;
      border: 1px solid rgba(255,255,255,0.1);
    }
    .img-3d:hover {
      transform: scale(1.02) rotateY(-2deg) rotateX(2deg);
    }

    /* Buttons */
    .btn-glass-red {
      background: rgba(209, 17, 65, 0.8);
      backdrop-filter: blur(10px);
      color: white;
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 12px;
      padding: 14px 32px;
      font-weight: 600;
      font-size: 15px;
      transition: all 0.3s ease;
      box-shadow: 0 10px 20px rgba(209, 17, 65, 0.3);
    }
    .btn-glass-red:hover {
      background: rgba(209, 17, 65, 1);
      transform: translateY(-2px);
      box-shadow: 0 15px 25px rgba(209, 17, 65, 0.4);
      color: white;
    }
    .btn-glass-outline {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
      color: white;
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 12px;
      padding: 14px 32px;
      font-weight: 600;
      font-size: 15px;
      transition: all 0.3s ease;
    }
    .btn-glass-outline:hover {
      background: rgba(255, 255, 255, 0.15);
      border-color: rgba(255, 255, 255, 0.3);
      transform: translateY(-2px);
      color: white;
    }

    /* Form Controls */
    .form-control-glass, .form-select-glass {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 12px;
      padding: 16px 20px;
      color: white;
      backdrop-filter: blur(10px);
      transition: all 0.3s;
      -webkit-appearance: none;
      appearance: none;
    }
    .form-select-glass {
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23ffffff99' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 16px center;
      padding-right: 40px;
      cursor: pointer;
    }
    .form-select-glass option {
      background-color: #0d1b2a;
      color: white;
    }
    .form-control-glass:focus, .form-select-glass:focus {
      background: rgba(255, 255, 255, 0.08);
      border-color: var(--cc-red);
      box-shadow: 0 0 0 4px rgba(209, 17, 65, 0.15);
      color: white;
      outline: none;
    }
    .form-control-glass::placeholder {
      color: rgba(255, 255, 255, 0.4);
    }

    /* Glass Badge */
    .glass-badge {
      display: inline-flex;
      align-items: center;
      padding: 6px 18px;
      border-radius: 999px;
      background: rgba(209, 17, 65, 0.12);
      border: 1px solid rgba(209, 17, 65, 0.35);
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
      background: rgba(209, 17, 65, 0.1);
      border: 1px solid rgba(209, 17, 65, 0.25);
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 26px;
      color: var(--cc-red);
      margin-bottom: 20px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(209, 17, 65, 0.15);
    }
    .glass-card:hover .glass-icon-wrapper {
      background: rgba(209, 17, 65, 0.2);
      transform: translateY(-4px) scale(1.05);
      box-shadow: 0 8px 25px rgba(209, 17, 65, 0.25);
    }

    /* Text Enhancements */
    h1, h2, h3, h4, h5, h6 {
      font-weight: 700;
      letter-spacing: 0;
    }
    .text-gradient {
      background: linear-gradient(135deg, #fff 0%, #a5b4fc 100%);
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
      border: 1px solid rgba(255, 255, 255, 0.12);
      border-radius: 18px;
      background:
        linear-gradient(135deg, rgba(13, 17, 31, 0.92), rgba(22, 28, 48, 0.78)),
        radial-gradient(circle at 12% 20%, rgba(209, 17, 65, 0.24), transparent 34%);
      backdrop-filter: blur(22px);
      -webkit-backdrop-filter: blur(22px);
      box-shadow: 0 18px 55px rgba(0, 0, 0, 0.34), inset 0 1px 0 rgba(255, 255, 255, 0.08);
    }

    .cc-brand {
      min-width: 96px;
    }

    .cc-brand::before {
      content: "";
      position: absolute;
      inset: -8px -18px;
      border-radius: 16px;
      background: rgba(255, 255, 255, 0.9);
      filter: blur(18px);
      opacity: 0.18;
      z-index: -1;
    }

    .cc-brand img {
      height: 46px;
      filter: drop-shadow(0 8px 18px rgba(0, 0, 0, 0.45));
    }

    .cc-nav-shell {
      gap: 4px;
      padding: 5px;
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 999px;
      background: rgba(255, 255, 255, 0.045);
      box-shadow: inset 0 1px 18px rgba(0, 0, 0, 0.24);
    }

    .cc-nav-shell .nav-link,
    .cc-nav-link {
      position: relative;
      border-radius: 999px;
      color: rgba(255, 255, 255, 0.72) !important;
      font-size: 14px;
      font-weight: 600;
      padding: 9px 14px !important;
      white-space: nowrap;
      transition: color 0.25s ease, background 0.25s ease, box-shadow 0.25s ease;
    }

    .cc-nav-shell .nav-link:hover,
    .cc-nav-shell .nav-link.text-white,
    .cc-nav-shell .nav-link.show,
    .cc-nav-link:hover,
    .cc-nav-link.active,
    .cc-nav-link.show {
      color: #fff !important;
      background: rgba(209, 17, 65, 0.14);
      box-shadow: inset 0 0 0 1px rgba(209, 17, 65, 0.28);
    }

    .cc-nav-shell .nav-link.text-white::after,
    .cc-nav-link.active::after {
      content: "";
      position: absolute;
      left: 18px;
      right: 18px;
      bottom: 4px;
      height: 2px;
      border-radius: 2px;
      background: var(--cc-red);
      box-shadow: 0 0 12px rgba(209, 17, 65, 0.8);
    }

    .cc-nav-shell .dropdown-menu,
    .cc-dropdown {
      margin-top: 12px;
      padding: 8px;
      border: 1px solid rgba(255, 255, 255, 0.12) !important;
      border-radius: 14px;
      background: rgba(12, 15, 27, 0.96);
      backdrop-filter: blur(18px);
      -webkit-backdrop-filter: blur(18px);
      box-shadow: 0 20px 45px rgba(0, 0, 0, 0.38);
    }

    .cc-nav-shell .dropdown-item,
    .cc-dropdown .dropdown-item {
      border-radius: 10px;
      color: rgba(255, 255, 255, 0.74) !important;
      font-size: 14px;
      padding: 10px 12px;
    }

    .cc-nav-shell .dropdown-item:hover,
    .cc-nav-shell .dropdown-item:focus,
    .cc-dropdown .dropdown-item:hover,
    .cc-dropdown .dropdown-item:focus,
    .cc-dropdown .dropdown-item.active {
      color: #fff !important;
      background: linear-gradient(135deg, rgba(209, 17, 65, 0.95), rgba(172, 13, 52, 0.9)) !important;
    }

    .cc-navbar-toggler {
      width: 44px;
      height: 42px;
      border: 1px solid rgba(255, 255, 255, 0.12) !important;
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.08);
      color: #fff;
    }

    .cc-login-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 38px;
      border-radius: 999px;
      padding: 9px 18px;
      background: linear-gradient(135deg, var(--cc-red), #a70d33);
      color: #fff;
      font-size: 14px;
      font-weight: 700;
      text-decoration: none;
      box-shadow: 0 12px 24px rgba(209, 17, 65, 0.3);
      transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .cc-login-btn:hover {
      color: #fff;
      transform: translateY(-1px);
      box-shadow: 0 16px 30px rgba(209, 17, 65, 0.4);
    }

    @media (max-width: 991.98px) {
      .cc-navbar {
        border-radius: 16px;
      }

      .cc-nav-shell {
        align-items: stretch !important;
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.06);
      }

      .cc-nav-shell .nav-link,
      .cc-nav-link {
        border-radius: 12px;
        padding: 11px 14px !important;
      }

      .cc-nav-shell .nav-link.text-white::after,
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

  <div class="ambient-orb orb-1"></div>
  <div class="ambient-orb orb-2"></div>

  <!-- Floating Glass Navbar -->
  <div class="fixed-top cc-navbar-wrap px-3 px-lg-5">
    <nav class="navbar navbar-expand-lg mx-auto cc-navbar">
      <div class="container-fluid px-0">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center position-relative cc-brand" href="{{ route('callcenter.index') }}">
          <img src="https://caei-afri.com/Callcenter/img/log%20(1).png" alt="Logo" class="position-relative z-1">
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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle cc-nav-link {{ request()->routeIs('callcenter.secteurs.*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">Secteurs d'activité</a>
                <ul class="dropdown-menu cc-dropdown">
                  <li><a class="dropdown-item {{ request()->routeIs('callcenter.secteurs.energie') ? 'active' : '' }}" href="{{ route('callcenter.secteurs.energie') }}">Énergie & Environnement</a></li>
                  <li><a class="dropdown-item {{ request()->routeIs('callcenter.secteurs.assurance') ? 'active' : '' }}" href="{{ route('callcenter.secteurs.assurance') }}">Assurance & Finance</a></li>
                  <li><a class="dropdown-item {{ request()->routeIs('callcenter.secteurs.technologie') ? 'active' : '' }}" href="{{ route('callcenter.secteurs.technologie') }}">Technologie & Télécom</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link cc-nav-link {{ request()->routeIs('callcenter.support') ? 'active' : '' }}" href="{{ route('callcenter.support') }}">Support client</a>
              </li>
              <li class="nav-item">
                <a class="nav-link cc-nav-link {{ request()->routeIs('callcenter.blog') ? 'active' : '' }}" href="{{ route('callcenter.blog') }}">Actualité</a>
              </li>
              <li class="nav-item">
                <a class="nav-link cc-nav-link {{ request()->routeIs('callcenter.contact') ? 'active' : '' }}" href="{{ route('callcenter.contact') }}">Contactez-nous !</a>
              </li>
            </ul>
          </div>
          
          <!-- Right Button -->
          <div class="d-flex mt-3 mt-lg-0">
            <a href="#" class="cc-login-btn">Connexion</a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <!-- Page Content -->
  <div class="perspective-wrapper">
    @yield('content')
  </div>

  <!-- Footer (Refined Glassmorphism) -->
  <footer class="mt-5 position-relative z-2">
    <!-- Subtle glass panel for the entire footer -->
    <div style="background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(25px); -webkit-backdrop-filter: blur(25px); border-top: 1px solid rgba(255, 255, 255, 0.08); box-shadow: 0 -10px 40px rgba(0,0,0,0.2);">
      <div class="container pt-5 pb-4">
        <div class="row g-5">
          <!-- Logo & Social -->
          <div class="col-lg-3 text-center text-lg-start">
            <div class="mb-4 position-relative d-inline-block">
              <!-- Glow behind logo to make black text readable without ugly white box -->
              <div class="position-absolute top-50 start-50 translate-middle w-100 h-100" style="background: radial-gradient(circle, rgba(255,255,255,0.8) 0%, rgba(255,255,255,0) 70%); z-index: -1; filter: blur(15px);"></div>
              <img src="https://caei-afri.com/Callcenter/img/log%20(1).png" alt="Logo" class="img-fluid position-relative z-1" style="max-width: 160px;">
            </div>
            
            <p class="small mb-4" style="color: #cbd5e1; line-height: 1.6;">L'excellence opérationnelle au service de votre relation client grâce aux dernières innovations technologiques.</p>
            
            <div class="d-flex justify-content-center justify-content-lg-start gap-2">
              <a href="https://www.facebook.com/CAEICallCenter/" class="d-flex align-items-center justify-content-center text-decoration-none" style="width: 42px; height: 42px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; color: var(--cc-red); transition: all 0.3s;" onmouseover="this.style.background='rgba(209,17,65,0.1)'; this.style.borderColor='var(--cc-red)'; this.style.transform='translateY(-3px)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.1)'; this.style.transform='translateY(0)'">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://www.instagram.com/caei_callcenter/" class="d-flex align-items-center justify-content-center text-decoration-none" style="width: 42px; height: 42px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; color: var(--cc-red); transition: all 0.3s;" onmouseover="this.style.background='rgba(209,17,65,0.1)'; this.style.borderColor='var(--cc-red)'; this.style.transform='translateY(-3px)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.1)'; this.style.transform='translateY(0)'">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="https://www.linkedin.com/company/caei-call-center/" class="d-flex align-items-center justify-content-center text-decoration-none" style="width: 42px; height: 42px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; color: var(--cc-red); transition: all 0.3s;" onmouseover="this.style.background='rgba(209,17,65,0.1)'; this.style.borderColor='var(--cc-red)'; this.style.transform='translateY(-3px)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.1)'; this.style.transform='translateY(0)'">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
          
          <!-- Contactez-nous -->
          <div class="col-lg-3 col-md-6">
            <h5 class="fw-bold mb-4 text-white">Contactez-nous</h5>
            <ul class="list-unstyled">
              <li class="d-flex align-items-start mb-3">
                <i class="bi bi-geo-alt-fill me-3 mt-1" style="color: var(--cc-red); font-size: 18px;"></i>
                <span class="small" style="color: #cbd5e1;">SIS 8 Rue Claude Bernard<br>1002 Belvedere-Tunis</span>
              </li>
              <li class="d-flex align-items-center mb-3">
                <i class="bi bi-telephone-fill me-3" style="color: var(--cc-red); font-size: 18px;"></i>
                <span class="small" style="color: #cbd5e1;">+216 55 335 286</span>
              </li>
              <li class="d-flex align-items-center">
                <i class="bi bi-envelope-fill me-3" style="color: var(--cc-red); font-size: 18px;"></i>
                <span class="small" style="color: #cbd5e1;">contact@caei-afri.com</span>
              </li>
            </ul>
          </div>
          
          <!-- Liens utiles -->
          <div class="col-lg-3 col-md-6">
            <h5 class="fw-bold mb-4 text-white">Liens utiles</h5>
            <ul class="list-unstyled">
              <li class="mb-3"><a href="{{ route('callcenter.about') }}" class="text-decoration-none small" style="color: #cbd5e1; transition: color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#cbd5e1'"><i class="bi bi-chevron-right me-2" style="color: var(--cc-red); font-size: 12px;"></i>Qui Sommes-Nous ?</a></li>
              <li class="mb-3"><a href="{{ route('callcenter.services') }}" class="text-decoration-none small" style="color: #cbd5e1; transition: color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#cbd5e1'"><i class="bi bi-chevron-right me-2" style="color: var(--cc-red); font-size: 12px;"></i>Nos Services</a></li>
              <li class="mb-3"><a href="#" class="text-decoration-none small" style="color: #cbd5e1; transition: color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#cbd5e1'"><i class="bi bi-chevron-right me-2" style="color: var(--cc-red); font-size: 12px;"></i>Carrières</a></li>
              <li class="mb-3"><a href="#" class="text-decoration-none small" style="color: #cbd5e1; transition: color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#cbd5e1'"><i class="bi bi-chevron-right me-2" style="color: var(--cc-red); font-size: 12px;"></i>Confidentialité</a></li>
              <li class="mb-0"><a href="{{ route('callcenter.support') }}" class="text-decoration-none small" style="color: #cbd5e1; transition: color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#cbd5e1'"><i class="bi bi-chevron-right me-2" style="color: var(--cc-red); font-size: 12px;"></i>Support Client</a></li>
            </ul>
          </div>
          
          <!-- Newsletter -->
          <div class="col-lg-3">
            <h5 class="fw-bold mb-4 text-white">Newsletter</h5>
            <p class="small mb-4" style="color: #cbd5e1;">Restez informés des dernières évolutions de la relation client.</p>
            <div class="position-relative w-100">
              <input type="email" placeholder="Votre email" style="width: 100%; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; padding: 14px 110px 14px 16px; color: white; outline: none; transition: border-color 0.3s;" onfocus="this.style.borderColor='var(--cc-red)'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
              <button type="button" class="position-absolute top-50 translate-middle-y end-0 me-2 border-0 text-white fw-medium" style="background: var(--cc-red); border-radius: 8px; padding: 8px 16px; font-size: 13px; transition: background 0.3s;" onmouseover="this.style.background='#a30e32'" onmouseout="this.style.background='var(--cc-red)'">
                S'inscrire
              </button>
            </div>
          </div>
        </div>
        
        <!-- Sub Footer -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-4 mt-5" style="border-top: 1px solid rgba(255,255,255,0.08);">
          <div class="small" style="color: #94a3b8;">
            &copy; {{ date('Y') }} <span class="text-white fw-medium">CAEI Call Center</span>. Tous droits réservés.
          </div>
          <div class="d-flex align-items-center mt-3 mt-md-0">
            <span class="small me-4" style="color: #94a3b8;">Conçu par <span style="color: var(--cc-red); font-weight: 600;">CAEI Digital MOOV</span></span>
            <a href="#" class="d-flex align-items-center justify-content-center text-white text-decoration-none" style="width: 36px; height: 36px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; transition: all 0.3s;" onmouseover="this.style.background='var(--cc-red)'; this.style.borderColor='var(--cc-red)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.1)'" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;">
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
  <x-intl-tel-input />
</body>
</html>
