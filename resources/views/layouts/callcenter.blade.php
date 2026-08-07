<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'CAEI Call Center — Design Minimaliste')</title>
  <link rel="icon" type="image/png" href="https://caei-afri.com/Callcenter/img/log%20(1).png">
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  
  <!-- AOS Animation -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <style>
    :root {
      --cc-red: #d11141; /* Vibrant red for clean contrast */
      --cc-red-light: rgba(209, 17, 65, 0.05); /* Pastel red for backgrounds */
      --cc-bg: #ffffff;
      --cc-surface: #ffffff;
      --cc-border: #eaeaea;
      --cc-text: #475569; /* Slate 600 */
      --cc-title: #0f172a; /* Slate 900 */
      --font-main: 'Inter', sans-serif;
    }

    body {
      font-family: var(--font-main);
      background-color: var(--cc-bg);
      color: var(--cc-text);
      overflow-x: hidden;
      line-height: 1.6;
      -webkit-font-smoothing: antialiased;
    }

    h1, h2, h3, h4, h5, h6 {
      font-weight: 700;
      color: var(--cc-title);
      letter-spacing: -0.03em;
    }

    p {
      color: var(--cc-text);
      font-weight: 400;
    }

    /* Minimalist Cards */
    .clean-card {
      background-color: var(--cc-surface);
      border: 1px solid var(--cc-border);
      border-radius: 12px;
      padding: 40px;
      transition: all 0.3s ease;
      height: 100%;
      position: relative;
      overflow: hidden;
    }
    .clean-card:hover {
      box-shadow: 0 12px 24px -10px rgba(0, 0, 0, 0.08);
      transform: translateY(-2px);
      border-color: rgba(209, 17, 65, 0.2);
    }
    
    .clean-icon {
      width: 48px;
      height: 48px;
      background-color: var(--cc-red-light);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      color: var(--cc-red);
      margin-bottom: 24px;
    }

    /* Buttons */
    .btn-clean {
      background-color: var(--cc-title);
      color: white;
      border: none;
      border-radius: 6px;
      padding: 12px 28px;
      font-weight: 500;
      font-size: 15px;
      transition: all 0.2s ease;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .btn-clean:hover {
      background-color: #000;
      color: white;
      box-shadow: 0 4px 6px rgba(0,0,0,0.15);
      transform: translateY(-1px);
    }
    .btn-clean-red {
      background-color: var(--cc-red);
      color: white;
      border: none;
      border-radius: 6px;
      padding: 12px 28px;
      font-weight: 500;
      font-size: 15px;
      transition: all 0.2s ease;
    }
    .btn-clean-red:hover {
      background-color: #a30e32;
      color: white;
    }
    .btn-outline-clean {
      background-color: white;
      color: var(--cc-title);
      border: 1px solid var(--cc-border);
      border-radius: 6px;
      padding: 12px 28px;
      font-weight: 500;
      font-size: 15px;
      transition: all 0.2s ease;
      box-shadow: 0 1px 2px rgba(0,0,0,0.03);
    }
    .btn-outline-clean:hover {
      background-color: #f8f9fa;
      border-color: #d1d5db;
    }

    /* Sections */
    .section-light {
      background-color: #f8fafc; /* Very light slate */
      border-top: 1px solid var(--cc-border);
      border-bottom: 1px solid var(--cc-border);
    }
    
    .section-divider {
      height: 1px;
      background-color: var(--cc-border);
      width: 100%;
      margin: 60px 0;
    }

    /* Form Controls */
    .form-control-clean {
      background-color: white;
      border: 1px solid var(--cc-border);
      border-radius: 6px;
      padding: 14px 18px;
      color: var(--cc-title);
      transition: all 0.2s;
      box-shadow: 0 1px 2px rgba(0,0,0,0.02) inset;
    }
    .form-control-clean:focus {
      background-color: white;
      border-color: var(--cc-red);
      box-shadow: 0 0 0 3px rgba(209, 17, 65, 0.1);
      outline: none;
    }
    .form-select-clean {
      background-color: white;
      border: 1px solid var(--cc-border);
      border-radius: 6px;
      padding: 14px 18px;
      color: var(--cc-title);
      transition: all 0.2s;
    }

    /* Sub Badge */
    .badge-clean {
      background-color: var(--cc-red-light);
      color: var(--cc-red);
      padding: 6px 12px;
      border-radius: 4px;
      font-weight: 600;
      font-size: 12px;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      border: 1px solid rgba(209, 17, 65, 0.1);
    }

    /* Footer - Minimalist */
    .cc-footer {
      background: #f8fafc;
      color: var(--cc-text);
      padding: 80px 0 0px;
      border-top: 1px solid var(--cc-border);
    }
    .cc-footer h5 {
      color: var(--cc-title);
      font-weight: 600;
      margin-bottom: 20px;
      font-size: 16px;
    }
    .cc-footer-links a {
      color: var(--cc-text);
      text-decoration: none;
      transition: color 0.2s;
      display: block;
      margin-bottom: 12px;
      font-size: 14px;
    }
    .cc-footer-links a:hover {
      color: var(--cc-red);
    }
    .sub-footer {
      border-top: 1px solid var(--cc-border);
      padding: 24px 0;
      margin-top: 60px;
      font-size: 14px;
    }
    @yield('styles')
  </style>
</head>
<body>

  <!-- Navbar (White version requested by user) -->
  <nav class="navbar navbar-expand-lg bg-white sticky-top py-3" style="border-bottom: 1px solid var(--cc-border); box-shadow: 0 1px 2px rgba(0,0,0,0.02);">
    <div class="container-fluid px-4 px-lg-5">
      <a class="navbar-brand d-flex align-items-center" href="{{ route('callcenter.index') }}">
        <img src="https://caei-afri.com/Callcenter/img/log%20(1).png" alt="Logo" height="50">
      </a>
      <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <i class="bi bi-list fs-1" style="color: #000;"></i>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Center Nav Pill -->
        <div class="mx-auto my-3 my-lg-0">
          <ul class="navbar-nav align-items-center px-3 py-1" style="background-color: #f8fafc; border-radius: 100px; border: 1px solid var(--cc-border);">
            <li class="nav-item">
              <a class="nav-link px-3 fw-medium {{ request()->routeIs('callcenter.index') ? 'text-danger' : 'text-dark' }}" href="{{ route('callcenter.index') }}" style="font-size: 15px;">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3 fw-medium {{ request()->routeIs('callcenter.about') ? 'text-danger' : 'text-dark' }}" href="{{ route('callcenter.about') }}" style="font-size: 15px;">Qui sommes-nous !</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3 fw-medium {{ request()->routeIs('callcenter.services') ? 'text-danger' : 'text-dark' }}" href="{{ route('callcenter.services') }}" style="font-size: 15px;">Nos services</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle px-3 fw-medium text-dark" href="#" role="button" data-bs-toggle="dropdown" style="font-size: 15px;">Secteurs d'activité</a>
              <ul class="dropdown-menu border shadow-sm rounded-3 mt-2 p-1" style="border-color: var(--cc-border);">
                <li><a class="dropdown-item py-2 px-3 rounded-2 text-dark" href="{{ route('callcenter.secteurs.energie') }}" style="font-size: 14px;">Énergie & Environnement</a></li>
                <li><a class="dropdown-item py-2 px-3 rounded-2 text-dark" href="{{ route('callcenter.secteurs.assurance') }}" style="font-size: 14px;">Assurance & Finance</a></li>
                <li><a class="dropdown-item py-2 px-3 rounded-2 text-dark" href="{{ route('callcenter.secteurs.technologie') }}" style="font-size: 14px;">Technologie & Télécom</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3 fw-medium {{ request()->routeIs('callcenter.support') ? 'text-danger' : 'text-dark' }}" href="{{ route('callcenter.support') }}" style="font-size: 15px;">Support client</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3 fw-medium {{ request()->routeIs('callcenter.blog') ? 'text-danger' : 'text-dark' }}" href="{{ route('callcenter.blog') }}" style="font-size: 15px;">Actualité</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3 fw-medium {{ request()->routeIs('callcenter.contact') ? 'text-danger' : 'text-dark' }}" href="{{ route('callcenter.contact') }}" style="font-size: 15px;">Contactez-nous !</a>
            </li>
          </ul>
        </div>
        
        <!-- Right Button -->
        <div class="d-flex">
          <a href="#" class="btn text-white px-4 py-2" style="background-color: var(--cc-red); border-radius: 6px; font-weight: 500; font-size: 14px; box-shadow: 0 1px 2px rgba(209,17,65,0.2);">Connexion</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  @yield('content')

  <!-- Footer (Minimalist) -->
  <footer class="cc-footer">
    <div class="container">
      <div class="row g-5 mb-4">
        <!-- Logo & Social -->
        <div class="col-lg-4 text-center text-lg-start">
          <img src="https://caei-afri.com/Callcenter/img/log%20(1).png" alt="Logo" class="img-fluid mb-4" style="max-width: 150px; opacity: 0.9;">
          <p class="small text-muted mb-4 pe-lg-5">Infrastructure technologique et ressources humaines qualifiées pour l'externalisation de votre relation client.</p>
          <div class="d-flex gap-3 justify-content-center justify-content-lg-start">
            <a href="#" class="text-muted text-decoration-none"><i class="fab fa-linkedin fs-5"></i></a>
            <a href="#" class="text-muted text-decoration-none"><i class="fab fa-twitter fs-5"></i></a>
            <a href="#" class="text-muted text-decoration-none"><i class="fab fa-facebook fs-5"></i></a>
          </div>
        </div>
        
        <!-- Contactez-nous -->
        <div class="col-lg-4 col-md-6">
          <h5>Coordonnées</h5>
          <ul class="list-unstyled cc-footer-links mt-3">
            <li class="d-flex align-items-start mb-2">
              <span class="text-muted">Immeuble Medina Palace,<br>53-55 Av. de Paris, Tunis</span>
            </li>
            <li class="d-flex align-items-center mb-2 mt-2">
              <span class="text-muted">+216 55 335 286</span>
            </li>
            <li class="d-flex align-items-center mt-2">
              <span class="text-muted">contact@caei.com</span>
            </li>
          </ul>
        </div>
        
        <!-- Liens utiles -->
        <div class="col-lg-4 col-md-6">
          <h5>Ressources</h5>
          <ul class="list-unstyled cc-footer-links mt-3">
            <li><a href="{{ route('callcenter.about') }}">Profil Entreprise</a></li>
            <li><a href="{{ route('callcenter.services') }}">Solutions</a></li>
            <li><a href="{{ route('callcenter.contact') }}">Demander un devis</a></li>
            <li><a href="#">Politique de confidentialité</a></li>
          </ul>
        </div>
      </div>
      
      <!-- Sub Footer -->
      <div class="sub-footer d-flex flex-column flex-md-row justify-content-between align-items-center text-muted">
        <div>
          &copy; {{ date('Y') }} CAEI Call Center. Tous droits réservés.
        </div>
        <div class="d-flex align-items-center mt-3 mt-md-0">
          <span>Conçu par CAEI Digital MOOV</span>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 600,
      once: true,
      offset: 20
    });
  </script>
  @yield('scripts')
  <x-intl-tel-input />
</body>
</html>
