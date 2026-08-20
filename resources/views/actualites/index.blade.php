<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Nos Actualités & Événements — CAEI Company Group</title>
  <meta name="description" content="Découvrez les actualités, séminaires internationaux et collaborations du Comité Africain d'Expertise Internationale (CAEI).">
  <meta name="keywords" content="CAEI, séminaires, actualités, formation, LCB/FT, conformité, Afrique, Sénégal, BNDE">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logoh.ico') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&family=Poppins:wght@300;400;500;600;700;800&family=Raleway:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}?v={{ time() }}" rel="stylesheet">
  <link href="{{ asset('assets/css/welcome-modern.css') }}?v={{ time() }}" rel="stylesheet">
  
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8fafc;
      color: #1e293b;
    }

    /* Hero Banner with Photo Background (same height scale as main page) */
    .actualites-hero {
      background: linear-gradient(rgba(10, 15, 30, 0.72), rgba(10, 15, 30, 0.85)), url('{{ asset('assets/img/professionel.jpg') }}') center center / cover no-repeat;
      color: #ffffff;
      padding: 155px 0 80px 0;
      position: relative;
      overflow: hidden;
      border-bottom: 1px solid rgba(226, 232, 240, 0.15);
    }

    /* Card Article */
    .article-card {
      background: #ffffff;
      border-radius: 24px;
      border: 1px solid #e2e8f0;
      box-shadow: 0 15px 35px rgba(15, 23, 42, 0.06);
      padding: 40px;
      margin-bottom: 50px;
    }

    /* Photo Box */
    .photo-box {
      background: #ffffff;
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
      border: 1px solid #e2e8f0;
      height: 100%;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .photo-box:hover {
      transform: translateY(-4px);
      box-shadow: 0 18px 35px rgba(15, 23, 42, 0.14);
    }

    .photo-box img {
      width: 100%;
      height: 270px;
      object-fit: cover;
      display: block;
    }

    .photo-caption {
      position: absolute;
      bottom: 0; left: 0; right: 0;
      padding: 16px 20px;
      background: linear-gradient(to top, rgba(0, 15, 60, 0.95) 0%, rgba(0, 15, 60, 0.6) 70%, transparent 100%);
    }

    .photo-caption h6 {
      color: #ffffff !important;
      font-weight: 700;
      font-size: 15px;
      margin-bottom: 3px;
      text-shadow: 0 1px 4px rgba(0,0,0,0.8);
    }

    .photo-caption p {
      color: rgba(255, 255, 255, 0.88) !important;
      font-size: 12.5px;
      margin: 0;
      text-shadow: 0 1px 3px rgba(0,0,0,0.8);
    }

    /* Footer CAEI */
    .footer-caei {
      background: #000b26 !important;
      color: #e2e8f0 !important;
      padding: 60px 0 25px 0;
      border-top: 1px solid rgba(255,255,255,0.08);
    }

    .footer-caei h5 {
      color: #ffffff !important;
      font-size: 18px;
      font-weight: 700;
      margin-bottom: 20px;
      text-shadow: 0 1px 3px rgba(0,0,0,0.5);
    }

    .footer-caei p, 
    .footer-caei li,
    .footer-caei span {
      color: #e2e8f0 !important;
    }

    .footer-caei a {
      color: #f1f5f9 !important;
      text-decoration: none;
      transition: color 0.2s;
    }

    .footer-caei a:hover {
      color: #ff7a00 !important;
    }

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
        background: #ff7a00 !important;
      }
    }
  </style>
</head>

<body>

  <!-- Top Contact Bar -->
  <div id="topbar" class="topbar d-flex align-items-center fixed-top" style="background-color: #ffffff; padding: 5px 0; z-index: 1000; top: 0; width: 100%; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); border-bottom: 1px solid #e5e7eb; height: 35px;">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between" style="gap: 0.5rem; flex-wrap: wrap;">
      <div class="d-flex align-items-center gap-2 gap-md-3" style="flex-wrap: wrap;">
        <a href="tel:+21655335286" class="d-flex align-items-center gap-2 text-decoration-none" style="font-size: 14px; white-space: nowrap; color: #000f3c;">
          <i class="bi bi-telephone-fill" style="color: #ff7a00;"></i>
          <span class="d-none d-sm-inline">+216 55 335 286</span>
        </a>
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=contact@caei-afri.com" target="_blank" class="d-flex align-items-center gap-2 text-decoration-none" style="font-size: 14px; white-space: nowrap; color: #000f3c;">
          <i class="bi bi-envelope-fill" style="color: #ff7a00;"></i>
          <span class="d-none d-md-inline">contact@caei-afri.com</span>
        </a>
        <a href="https://www.google.com/maps/search/?api=1&query=SIS+8+Rue+Claude+Bernard+1002+Belvedere-Tunis+Tunisie" target="_blank" class="d-flex align-items-center gap-2 text-decoration-none d-none d-lg-flex" style="font-size: 14px; white-space: nowrap; color: #000f3c;">
          <i class="bi bi-geo-alt-fill" style="color: #ff7a00;"></i>
          <span>SIS 8 Rue Claude Bernard 1002 Belvedere-Tunis , Tunisie</span>
        </a>
      </div>
      <a href="{{ asset('assets/img/catalogue CAEI GROUP.pdf') }}" target="_blank" style="font-size: 14px; color: #ff7a00; text-decoration: none; white-space: nowrap; transition: all 0.3s ease; display: flex; align-items: center; gap: 6px; padding: 0 8px;" onmouseover="this.style.color='#cc5e00'; this.style.transform='translateX(2px)';" onmouseout="this.style.color='#ff7a00'; this.style.transform='translateX(0)';">
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
          <li><a href="{{ route('home') }}">Accueil</a></li>
          <li><a href="{{ route('home') }}#presentation">Présentation</a></li>
          <li><a href="{{ route('home') }}#about-agencies">Nos Agences</a></li>
          <li><a href="{{ route('home.old') }}">Nos séminaires</a></li>
          <li><a href="{{ route('actualites.index') }}" class="active">Nos actualités</a></li>
          <li><a href="{{ route('home') }}#contact">Contact</a></li>
          <li><a href="{{ route('recrutement.index') }}">Recrutement</a></li>
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

  <!-- Hero Banner -->
  <section class="actualites-hero text-center">
    <div class="container position-relative z-1" data-aos="fade-up">
      <span class="badge px-3 py-2 mb-3 rounded-pill" style="background: #ff7a00; color: #ffffff; font-size: 13px; font-weight: 700; box-shadow: 0 4px 15px rgba(255, 122, 0, 0.4);">
        <i class="bi bi-mortarboard-fill me-1"></i> Séminaires Internationaux & Coopération
      </span>
      <h1 class="display-4 fw-bold mb-3" style="color: #ffffff !important; text-shadow: 0 2px 12px rgba(0,0,0,0.7);">Nos Actualités & Événements</h1>
      <p class="fs-5 max-w-2xl mx-auto mb-0" style="color: #f8fafc !important; max-width: 750px; text-shadow: 0 1px 6px rgba(0,0,0,0.6); font-weight: 400;">
        Retrouvez l'ensemble des séminaires internationaux, formations professionnelles et moments forts du Comité Africain d'Expertise Internationale.
      </p>
    </div>
  </section>

  <!-- Main Content Area -->
  <main class="py-5">
    <div class="container">

      <!-- Intro / Compteur -->
      <div class="d-flex flex-wrap align-items-center justify-content-between mb-5 pb-3 border-bottom" data-aos="fade-up">
        <div>
          <span class="badge px-3 py-1 mb-2" style="background: #000f3c; color: #ff7a00; font-size: 11.5px;">TOUTES LES ACTUALITÉS</span>
          <h2 class="fw-bold mb-0" style="color: #000f3c; font-size: 1.85rem;">Sessions, Séminaires & Événements</h2>
        </div>
        <div class="text-muted small mt-2 mt-md-0">
          <span class="fw-bold text-dark fs-6">{{ count($actualites) }}</span> événements et séminaires publiés
        </div>
      </div>

      <!-- Grille des Actualités -->
      <div class="row g-4 mb-5">
        @foreach($actualites as $act)
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 70 }}">
            <div class="news-card h-100 p-4 shadow-sm d-flex flex-column justify-content-between">
              
              <div>
                <!-- Image Principale -->
                <div class="news-card-img-wrapper mb-3">
                  <img src="{{ asset($act['main_image']) }}" alt="{{ $act['main_image_alt'] }}">
                  <span class="position-absolute top-0 start-0 m-3 badge px-3 py-2 fw-bold shadow-sm" style="background: #000f3c; color: #ffffff !important; font-size: 11px; border-radius: 8px; backdrop-filter: blur(4px);">
                    {{ $act['category'] }}
                  </span>
                </div>

                <!-- Badges -->
                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                  <span class="badge px-2.5 py-1.5 fw-bold rounded-pill" style="background: rgba(255, 122, 0, 0.15); color: #d96600; font-size: 11.5px;">
                    📅 {{ $act['date'] }}
                  </span>
                  <span class="badge bg-secondary bg-opacity-10 text-dark fw-semibold px-2.5 py-1.5 rounded-pill" style="font-size: 11.5px;">
                    <i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $act['location'] }}
                  </span>
                  @if(!empty($act['country_badge']))
                    <span class="badge bg-light text-secondary border fw-semibold px-2.5 py-1.5 rounded-pill" style="font-size: 11px;">
                      {{ $act['country_badge'] }}
                    </span>
                  @endif
                </div>

                <!-- Titre & Sous-titre -->
                <h3 class="fw-bold mb-2" style="color: #000f3c; font-size: 1.35rem; line-height: 1.35;">
                  <a href="{{ route('actualites.show', $act['slug']) }}" class="text-decoration-none" style="color: #000f3c;">
                    {{ $act['title'] }}
                  </a>
                </h3>
                <p class="text-muted small mb-3" style="line-height: 1.65; font-size: 13.5px;">
                  {{ $act['summary'] }}
                </p>
              </div>

              <!-- Pied de carte avec Bouton Découvrir -->
              <div class="pt-3 border-top d-flex align-items-center justify-content-between mt-2">
                <span class="text-muted small fw-semibold">
                  <i class="bi bi-images text-warning me-1"></i> {{ count($act['gallery']) }} photos
                </span>
                <a href="{{ route('actualites.show', $act['slug']) }}" class="btn-discover">
                  → Découvrir le séminaire
                </a>
              </div>

            </div>
          </div>
        @endforeach
      </div>

      <!-- Bannière Contact / Collaboration -->
      <div class="p-5 text-center rounded-4 shadow-sm" style="background: linear-gradient(135deg, #000f3c 0%, #002266 100%);" data-aos="zoom-in">
        <h3 class="fw-bold mb-3" style="color: #ffffff !important; text-shadow: 0 2px 8px rgba(0,0,0,0.5); font-size: 1.9rem;">Vous souhaitez organiser un séminaire ou un audit pour votre institution ?</h3>
        <p class="fs-6 mb-4 mx-auto" style="color: #f1f5f9 !important; max-width: 650px; text-shadow: 0 1px 4px rgba(0,0,0,0.4);">
          Le CAEI accompagne les banques, institutions financières et organisations africaines dans le renforcement de leurs compétences et de leur conformité.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
          <a href="{{ route('home') }}#contact" class="btn btn-warning fw-bold px-4 py-3 rounded-pill" style="background: #ff7a00; border: none; color: #fff;">
            <i class="bi bi-envelope-fill me-2"></i> Contacter nos experts
          </a>
          <a href="{{ route('home.old') }}" class="btn btn-outline-light px-4 py-3 rounded-pill">
            <i class="bi bi-calendar-event me-2"></i> Voir le calendrier des séminaires
          </a>
        </div>
      </div>

    </div>
  </main>

  <!-- Footer -->
  <footer class="footer-caei">
    <div class="container">
      <div class="row g-4 pb-4">
        
        <div class="col-lg-4">
          <img src="{{ asset('assets/img/logocompany.png') }}" alt="CAEI Company Group" height="55px" class="mb-3">
          <p class="small" style="line-height: 1.8;">
            Le Comité Africain d’Expertise Internationale regroupe des experts et élites africains de renommée internationale au service du développement économique et institutionnel du continent.
          </p>
        </div>

        <div class="col-lg-4">
          <h5>Coordonnées</h5>
          <ul class="list-unstyled small" style="line-height: 2;">
            <li><i class="bi bi-geo-alt-fill text-warning me-2"></i> SIS 8 Rue Claude Bernard 1002 Belvedere-Tunis, Tunisie</li>
            <li><i class="bi bi-telephone-fill text-warning me-2"></i> +216 55 335 286</li>
            <li><i class="bi bi-envelope-fill text-warning me-2"></i> contact@caei-afri.com</li>
          </ul>
        </div>

        <div class="col-lg-4">
          <h5>Pôles d'Excellence</h5>
          <ul class="list-unstyled small" style="line-height: 2;">
            <li><a href="{{ route('elite.training') }}"><i class="bi bi-chevron-right me-1 text-warning"></i> CAEI Elite Training</a></li>
            <li><a href="{{ route('callcenter.index') }}"><i class="bi bi-chevron-right me-1 text-warning"></i> CAEI Call Center</a></li>
            <li><a href="{{ route('digitalmoov') }}"><i class="bi bi-chevron-right me-1 text-warning"></i> CAEI Digital MOOV</a></li>
            <li><a href="{{ route('medical.services') }}"><i class="bi bi-chevron-right me-1 text-warning"></i> CAEI Medical Services</a></li>
          </ul>
        </div>

      </div>

      <div class="pt-3 text-center border-top border-secondary border-opacity-25 small text-secondary">
        &copy; {{ date('Y') }} <strong>CAEI Company Group</strong>. Tous droits réservés.
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script src="{{ asset('assets/js/main.js') }}?v={{ time() }}"></script>
  <script>
    AOS.init({ duration: 800, once: true });
  </script>
</body>

</html>
