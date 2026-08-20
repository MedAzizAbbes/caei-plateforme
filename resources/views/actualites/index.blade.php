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

  <!-- Top Bar Contact & PDF Catalogue (Exact identical size & position as main page) -->
  <div style="background: rgba(255, 255, 255, 0.98); border-bottom: 1px solid rgba(0, 0, 0, 0.08); position: fixed; top: 0; left: 0; right: 0; z-index: 1000; height: 35px; backdrop-filter: blur(10px);">
    <div class="container-fluid container-xl h-100 d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center gap-3">
        <a href="tel:+21655335286" class="d-flex align-items-center gap-2 text-decoration-none" style="font-size: 14px; white-space: nowrap; color: #000f3c;">
          <i class="bi bi-telephone-fill" style="color: #ff7a00;"></i>
          <span>+216 55 335 286</span>
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

  <!-- Header Navigation (Exact identical size & position as main page) -->
  <header id="header" class="header d-flex align-items-center fixed-top" style="top: 35px; background: rgba(0, 15, 60, 0.85); backdrop-filter: blur(10px);">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-lg-0">
        <img src="{{ asset('assets/img/logocompany.png') }}" alt="CAEI Logo" height="60px" width="150px" style="object-fit: contain;">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}#acceuil">Accueil<br></a></li>
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
      @endauth

    </div>
  </header>

  <!-- Hero Header -->
  <section class="actualites-hero text-center">
    <div class="container position-relative z-1" data-aos="fade-up">
      <span class="badge px-3 py-2 mb-3 rounded-pill" style="background: #ff7a00; color: #ffffff; font-size: 13px; font-weight: 700; box-shadow: 0 4px 15px rgba(255, 122, 0, 0.4);">
        <i class="bi bi-mortarboard-fill me-1"></i> Séminaires Internationaux & Coopération
      </span>
      <h1 class="display-4 fw-bold mb-3" style="color: #ffffff !important; text-shadow: 0 2px 12px rgba(0,0,0,0.7);">Nos Actualités & Événements</h1>
      <p class="fs-5 max-w-2xl mx-auto mb-0" style="color: #f8fafc !important; max-width: 750px; text-shadow: 0 1px 6px rgba(0,0,0,0.6); font-weight: 400;">
        Suivez les activités, séminaires de haut niveau et partenariats stratégiques du Comité Africain d'Expertise Internationale.
      </p>
    </div>
  </section>

  <!-- Main Content Area -->
  <main class="py-5">
    <div class="container">

      <!-- Article : Séminaire international LCB/FT -->
      <article class="article-card" data-aos="fade-up">
        
        <!-- En-tête de l'article -->
        <div class="mb-4 pb-3" style="border-bottom: 2px solid #f1f5f9;">
          <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
            <span class="badge px-3 py-2 fw-bold" style="background: #000f3c; color: #ffffff !important; border-radius: 8px; font-size: 12.5px;">
              🎓 Séminaire international
            </span>
            <span class="badge px-3 py-2 fw-bold rounded-pill" style="background: rgba(255, 122, 0, 0.15); color: #d96600;">
              Décembre 2025
            </span>
            <span class="badge bg-secondary bg-opacity-10 text-dark fw-semibold px-3 py-2 rounded-pill">
              <i class="bi bi-geo-alt-fill text-danger me-1"></i> Tunis, Tunisie
            </span>
          </div>

          <h2 class="fw-bold mb-2" style="color: #000f3c; font-size: 2.2rem; line-height: 1.3;">
            Audit du dispositif de conformité LCB/FT
          </h2>
          <p class="text-muted mb-0">Lutte contre le Blanchiment de Capitaux et le Financement du Terrorisme</p>
        </div>

        <!-- Corps et photo vedette -->
        <div class="row align-items-center g-4 g-lg-5 mb-5">
          <div class="col-lg-6">
            <div class="rounded-4 overflow-hidden shadow-sm" style="border: 4px solid #f8fafc;">
              <img src="{{ asset('images/actualites/reunion-caei-6.jpg') }}" alt="Séminaire international LCB/FT CAEI" class="img-fluid w-100" style="max-height: 390px; object-fit: cover; border-radius: 12px;">
            </div>
          </div>

          <div class="col-lg-6">
            <p class="fs-6 mb-3" style="color: #334155; line-height: 1.85; text-align: justify;">
              Le <strong>Comité Africain d’Expertise Internationale (CAEI)</strong> a organisé en <strong>décembre 2025</strong> un séminaire international consacré à l’audit du dispositif de conformité en matière de Lutte contre le Blanchiment de Capitaux et le Financement du Terrorisme (<strong>LCB/FT</strong>).
            </p>

            <p class="fs-6 mb-4" style="color: #475569; line-height: 1.85; text-align: justify;">
              Cette rencontre a réuni des professionnels du secteur financier autour des enjeux liés au renforcement des dispositifs de conformité, à l’identification des risques et à l’efficacité des mécanismes de contrôle interne.
            </p>

            <!-- Partenaire BNDE Sénégal -->
            <div class="p-3 rounded-3 mb-4 d-flex align-items-center gap-3" style="background: #fff7ed; border-left: 4px solid #ff7a00;">
              <i class="bi bi-shield-check fs-2 text-warning flex-shrink-0"></i>
              <div>
                <strong style="color: #000f3c; font-size: 14.5px;">🤝 Partenariat Stratégique :</strong>
                <p class="small mb-0" style="color: #334155;">
                  Avec la participation de la <strong>Banque Nationale pour le Développement Économique (BNDE)</strong> du Sénégal.
                </p>
              </div>
            </div>

            <!-- Fiche mémo -->
            <div class="row g-2 text-center">
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted small">📍 Lieu</span>
                  <strong style="color: #000f3c; font-size: 13px;">Tunis, Tunisie</strong>
                </div>
              </div>
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted small">📅 Date</span>
                  <strong style="color: #000f3c;">Décembre 2025</strong>
                </div>
              </div>
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted small">🎯 Thématique</span>
                  <strong style="color: #000f3c;">Audit LCB/FT</strong>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Galerie des 6 Photos de l'événement -->
        <div class="pt-4" style="border-top: 1px solid #f1f5f9;">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
              <span class="badge px-3 py-1 mb-2" style="background: #000f3c; color: #ff7a00; font-size: 11px;">MOMENTS FORTS</span>
              <h4 class="fw-bold mb-0" style="color: #000f3c;">Galerie Photos du Séminaire</h4>
            </div>
          </div>

          <div class="row g-4">
            
            <!-- Photo 1 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/reunion-caei-1.jpg') }}" alt="Cadrage Opérationnel & Travaux en Commission">
                <div class="photo-caption">
                  <h6>Cadrage & Travaux en Commission</h6>
                  <p>Échanges et études de cas financiers</p>
                </div>
              </div>
            </div>

            <!-- Photo 2 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/reunion-caei-2.jpg') }}" alt="Présentation Méthodologique">
                <div class="photo-caption">
                  <h6>Présentation Méthodologique</h6>
                  <p>Normes et mécanismes de contrôle interne</p>
                </div>
              </div>
            </div>

            <!-- Photo 3 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/reunion-caei-3.jpg') }}" alt="Coopération Internationale">
                <div class="photo-caption">
                  <h6>Coopération Internationale</h6>
                  <p>Délégation BNDE Sénégal & Experts CAEI</p>
                </div>
              </div>
            </div>

            <!-- Photo 4 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/reunion-caei-4.jpg') }}" alt="Identification des Risques">
                <div class="photo-caption">
                  <h6>Identification des Risques</h6>
                  <p>Cartographie des risques et gouvernance</p>
                </div>
              </div>
            </div>

            <!-- Photo 5 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/reunion-caei-5.jpg') }}" alt="Intervention Expert LCB/FT">
                <div class="photo-caption">
                  <h6>Intervention Expert LCB/FT</h6>
                  <p>Dispositif de conformité et audit opérationnel</p>
                </div>
              </div>
            </div>

            <!-- Photo 6 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/reunion-caei-6.jpg') }}" alt="Clôture & Synergie CAEI">
                <div class="photo-caption">
                  <h6>Clôture & Synergie CAEI</h6>
                  <p>Comité Africain d’Expertise Internationale</p>
                </div>
              </div>
            </div>

          </div>
        </div>

      </article>

      <!-- Article 2 : Séminaire international GED & Archivage Numérique -->
      <article class="article-card" data-aos="fade-up">
        
        <!-- En-tête de l'article -->
        <div class="mb-4 pb-3" style="border-bottom: 2px solid #f1f5f9;">
          <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
            <span class="badge px-3 py-2 fw-bold" style="background: #000f3c; color: #ffffff !important; border-radius: 8px; font-size: 12.5px;">
              📁 Séminaire international
            </span>
            <span class="badge px-3 py-2 fw-bold rounded-pill" style="background: rgba(255, 122, 0, 0.15); color: #d96600;">
              Décembre 2025
            </span>
            <span class="badge bg-secondary bg-opacity-10 text-dark fw-semibold px-3 py-2 rounded-pill">
              <i class="bi bi-geo-alt-fill text-danger me-1"></i> Abidjan, Côte d’Ivoire
            </span>
          </div>

          <h2 class="fw-bold mb-2" style="color: #000f3c; font-size: 2.2rem; line-height: 1.3;">
            Pilotage du projet GED et archivage numérique
          </h2>
          <p class="text-muted mb-0">Gestion Électronique des Documents, Dématérialisation et Stratégie d’Archivage Numérique</p>
        </div>

        <!-- Corps et photo vedette -->
        <div class="row align-items-center g-4 g-lg-5 mb-5">
          <div class="col-lg-5 text-center">
            <img src="{{ asset('images/actualites/ged-abidjan-1.jpg') }}" alt="Délégation et Formateurs Experts CAEI Abidjan" class="img-fluid shadow" style="max-height: 530px; width: auto; max-width: 100%; border-radius: 26px; border: 2px solid #e2e8f0; display: inline-block;">
          </div>

          <div class="col-lg-7">
            <p class="fs-6 mb-3" style="color: #334155; line-height: 1.85; text-align: justify;">
              Le <strong>Comité Africain d’Expertise Internationale (CAEI)</strong> a organisé en <strong>décembre 2025</strong> à <strong>Abidjan</strong> un séminaire international consacré au pilotage des projets de <strong>Gestion Électronique des Documents (GED)</strong> et d’<strong>archivage numérique</strong>.
            </p>

            <p class="fs-6 mb-4" style="color: #475569; line-height: 1.85; text-align: justify;">
              Cette rencontre a permis aux participants d’approfondir les méthodes et bonnes pratiques nécessaires à la conception, au déploiement et au pilotage d’un projet de digitalisation documentaire, ainsi qu’à la mise en place d’une stratégie efficace d’archivage numérique.
            </p>

            <!-- Fiche mémo -->
            <div class="row g-2 text-center">
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted small">📍 Lieu</span>
                  <strong style="color: #000f3c; font-size: 13px;">Abidjan, Côte d’Ivoire</strong>
                </div>
              </div>
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted small">📅 Date</span>
                  <strong style="color: #000f3c; font-size: 13px;">Décembre 2025</strong>
                </div>
              </div>
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted small">🎯 Thématique</span>
                  <strong style="color: #000f3c; font-size: 13px;">Pilotage GED & Archivage</strong>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Galerie Photos de la session GED Abidjan -->
        <div class="pt-4" style="border-top: 1px solid #f1f5f9;">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
              <span class="badge px-3 py-1 mb-2" style="background: #000f3c; color: #ff7a00; font-size: 11px;">MOMENTS FORTS</span>
              <h4 class="fw-bold mb-0" style="color: #000f3c;">Galerie Photos — Session Abidjan</h4>
            </div>
          </div>

          <div class="row g-4">
            
            <!-- Photo 1 -->
            <div class="col-md-6 col-lg-3">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/ged-abidjan-presentation.jpg') }}" alt="Intervention Méthodologique GED & BPM" style="object-position: top center;">
                <div class="photo-caption">
                  <h6>Présentation GED & BPM</h6>
                  <p>Méthodologie & Workflow</p>
                </div>
              </div>
            </div>

            <!-- Photo 2 -->
            <div class="col-md-6 col-lg-3">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/ged-abidjan-salle.jpg') }}" alt="Salle de formation et participants GED Abidjan" style="object-position: center;">
                <div class="photo-caption">
                  <h6>Salle & Participants</h6>
                  <p>Travaux & échanges Abidjan</p>
                </div>
              </div>
            </div>

            <!-- Photo 3 -->
            <div class="col-md-6 col-lg-3">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/ged-abidjan-3.jpg') }}" alt="Remise des Attestations de Formation GED">
                <div class="photo-caption">
                  <h6>Remise des Certificats</h6>
                  <p>Attestation de compétences</p>
                </div>
              </div>
            </div>

            <!-- Photo 4 -->
            <div class="col-md-6 col-lg-3">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/ged-abidjan-4.jpg') }}" alt="Cérémonie de Clôture & Partage">
                <div class="photo-caption">
                  <h6>Clôture Officielle</h6>
                  <p>Partage et certification</p>
                </div>
              </div>
            </div>

          </div>
        </div>

      </article>

      <!-- Article 3 : Formation professionnelle — Techniques de vente et prospection -->
      <article class="article-card" data-aos="fade-up">
        
        <!-- En-tête de l'article -->
        <div class="mb-4 pb-3" style="border-bottom: 2px solid #f1f5f9;">
          <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
            <span class="badge px-3 py-2 fw-bold" style="background: #000f3c; color: #ffffff !important; border-radius: 8px; font-size: 12.5px;">
              🎓 Formation professionnelle
            </span>
            <span class="badge px-3 py-2 fw-bold rounded-pill" style="background: rgba(255, 122, 0, 0.15); color: #d96600;">
              Novembre 2024
            </span>
            <span class="badge bg-secondary bg-opacity-10 text-dark fw-semibold px-3 py-2 rounded-pill">
              <i class="bi bi-geo-alt-fill text-danger me-1"></i> Tunis, Tunisie
            </span>
          </div>

          <h2 class="fw-bold mb-2" style="color: #000f3c; font-size: 2.2rem; line-height: 1.3;">
            Techniques de vente et prospection
          </h2>
          <p class="text-muted mb-0">Développement Commercial, Négociation et Gestion de la Relation Client</p>
        </div>

        <!-- Corps et photo vedette -->
        <div class="row align-items-center g-4 g-lg-5 mb-5">
          <div class="col-lg-6">
            <div class="rounded-4 overflow-hidden shadow-sm" style="border: 4px solid #f8fafc;">
              <img src="{{ asset('images/actualites/vente-prospection-2.png') }}" alt="Formation professionnelle techniques de vente CAEI Tunis" class="img-fluid w-100" style="max-height: 390px; object-fit: cover; border-radius: 12px;">
            </div>
          </div>

          <div class="col-lg-6">
            <p class="fs-6 mb-3" style="color: #334155; line-height: 1.85; text-align: justify;">
              Le <strong>Comité Africain d’Expertise Internationale (CAEI)</strong> a organisé à <strong>Tunis</strong> une formation professionnelle dédiée aux <strong>techniques de vente</strong> et de <strong>prospection commerciale</strong>.
            </p>

            <p class="fs-6 mb-4" style="color: #475569; line-height: 1.85; text-align: justify;">
              Cette formation a permis aux participants de renforcer leurs compétences en matière de prospection, prise de contact, argumentation commerciale, traitement des objections et développement de la relation client.
            </p>

            <!-- Fiche mémo -->
            <div class="row g-2 text-center">
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted small">📍 Lieu</span>
                  <strong style="color: #000f3c; font-size: 13px;">Tunis, Tunisie</strong>
                </div>
              </div>
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted small">📅 Date</span>
                  <strong style="color: #000f3c; font-size: 13px;">Novembre 2024</strong>
                </div>
              </div>
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted small">🎯 Thématique</span>
                  <strong style="color: #000f3c; font-size: 13px;">Vente & Prospection</strong>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Galerie Photos de la formation -->
        <div class="pt-4" style="border-top: 1px solid #f1f5f9;">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
              <span class="badge px-3 py-1 mb-2" style="background: #000f3c; color: #ff7a00; font-size: 11px;">MOMENTS FORTS</span>
              <h4 class="fw-bold mb-0" style="color: #000f3c;">Galerie Photos — Session Tunis</h4>
            </div>
          </div>

          <div class="row g-4">
            
            <!-- Photo 1 -->
            <div class="col-md-6 col-lg-3">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/vente-prospection-1.jpg') }}" alt="Session interactive & Argumentation commerciale">
                <div class="photo-caption">
                  <h6>Atelier Interactif</h6>
                  <p>Prise de contact & vente</p>
                </div>
              </div>
            </div>

            <!-- Photo 2 -->
            <div class="col-md-6 col-lg-3">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/vente-prospection-5.jpg') }}" alt="Travaux pratiques en salle de réunion" style="object-position: center;">
                <div class="photo-caption">
                  <h6>Session de Travail</h6>
                  <p>Études de cas & prospection</p>
                </div>
              </div>
            </div>

            <!-- Photo 3 -->
            <div class="col-md-6 col-lg-3">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/vente-prospection-3.png') }}" alt="Participants en séance de formation">
                <div class="photo-caption">
                  <h6>Échanges & Pratique</h6>
                  <p>Traitement des objections</p>
                </div>
              </div>
            </div>

            <!-- Photo 4 -->
            <div class="col-md-6 col-lg-3">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/vente-prospection-4.jpg') }}" alt="Clôture et moment convivial">
                <div class="photo-caption">
                  <h6>Moment Convivial</h6>
                  <p>Équipe & participants CAEI</p>
                </div>
              </div>
            </div>

          </div>
        </div>

      </article>

      <!-- Article 4 : Visite professionnelle — Archives Nationales de Tunisie -->
      <article class="article-card" data-aos="fade-up">
        
        <!-- En-tête de l'article -->
        <div class="mb-4 pb-3" style="border-bottom: 2px solid #f1f5f9;">
          <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
            <span class="badge px-3 py-2 fw-bold" style="background: #000f3c; color: #ffffff !important; border-radius: 8px; font-size: 12.5px;">
              🏛️ Visite professionnelle
            </span>
            <span class="badge px-3 py-2 fw-bold rounded-pill" style="background: rgba(255, 122, 0, 0.15); color: #d96600;">
              Juillet 2025
            </span>
            <span class="badge bg-secondary bg-opacity-10 text-dark fw-semibold px-3 py-2 rounded-pill">
              <i class="bi bi-geo-alt-fill text-danger me-1"></i> Tunis, Tunisie
            </span>
          </div>

          <h2 class="fw-bold mb-2" style="color: #000f3c; font-size: 2.2rem; line-height: 1.3;">
            Archives Nationales de Tunisie
          </h2>
          <p class="text-muted mb-0">Conservation, Valorisation, Modernisation et Gestion Documentaire</p>
        </div>

        <!-- Corps et photo vedette -->
        <div class="row align-items-center g-4 g-lg-5 mb-5">
          <div class="col-lg-5 text-center">
            <img src="{{ asset('images/actualites/archives-tunisie-1.jpg') }}" alt="Visite professionnelle Archives Nationales de Tunisie CAEI BAD" class="img-fluid shadow" style="max-height: 530px; width: auto; max-width: 100%; border-radius: 26px; border: 2px solid #e2e8f0; display: inline-block;">
          </div>

          <div class="col-lg-7">
            <p class="fs-6 mb-3" style="color: #334155; line-height: 1.85; text-align: justify;">
              Dans le cadre de ses activités professionnelles et de ses échanges internationaux, le <strong>Comité Africain d’Expertise Internationale (CAEI)</strong> a organisé une visite aux <strong>Archives Nationales de Tunisie</strong> en <strong>juillet 2025</strong>.
            </p>

            <p class="fs-6 mb-3" style="color: #475569; line-height: 1.85; text-align: justify;">
              Cette visite a réuni des professionnels autour des enjeux liés à la gestion documentaire, la conservation, la valorisation et la modernisation des archives, avec la présence de représentants de la <strong>Banque Africaine de Développement (BAD)</strong> de Côte d’Ivoire.
            </p>

            <p class="fs-6 mb-4" style="color: #475569; line-height: 1.85; text-align: justify;">
              Cette rencontre a également permis de favoriser les échanges d’expériences et le partage de bonnes pratiques dans le domaine de la gestion et de l’archivage documentaire.
            </p>

            <!-- Partenaire BAD Côte d'Ivoire -->
            <div class="p-3 rounded-3 mb-4 d-flex align-items-center gap-3" style="background: #fff7ed; border-left: 4px solid #ff7a00;">
              <i class="bi bi-bank fs-2 text-warning flex-shrink-0"></i>
              <div>
                <strong style="color: #000f3c; font-size: 14.5px;">🤝 Coopération Institutionnelle :</strong>
                <p class="small mb-0" style="color: #334155;">
                  Avec la présence de représentants de la <strong>Banque Africaine de Développement (BAD)</strong> – Côte d’Ivoire.
                </p>
              </div>
            </div>

            <!-- Fiche mémo -->
            <div class="row g-2 text-center">
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted small">📍 Lieu</span>
                  <strong style="color: #000f3c; font-size: 13px;">Tunis, Tunisie</strong>
                </div>
              </div>
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted small">📅 Date</span>
                  <strong style="color: #000f3c; font-size: 13px;">Juillet 2025</strong>
                </div>
              </div>
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted small">🎯 Thématique</span>
                  <strong style="color: #000f3c; font-size: 13px;">Archives & Gestion</strong>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Galerie Photos de la visite -->
        <div class="pt-4" style="border-top: 1px solid #f1f5f9;">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
              <span class="badge px-3 py-1 mb-2" style="background: #000f3c; color: #ff7a00; font-size: 11px;">MOMENTS FORTS</span>
              <h4 class="fw-bold mb-0" style="color: #000f3c;">Galerie Photos — Archives Nationales</h4>
            </div>
          </div>

          <div class="row g-4">
            
            <!-- Photo 1 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/archives-tunisie-2.png') }}" alt="Consultation des registres d'archives et boîtes de classement" style="object-position: center;">
                <div class="photo-caption">
                  <h6>Conservation & Rayonnages</h6>
                  <p>Présentation des boîtes et registres</p>
                </div>
              </div>
            </div>

            <!-- Photo 2 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/archives-tunisie-3.png') }}" alt="Échanges techniques avec les experts archivistes" style="object-position: center;">
                <div class="photo-caption">
                  <h6>Échanges Techniques</h6>
                  <p>Partage de méthodes et bonnes pratiques</p>
                </div>
              </div>
            </div>

            <!-- Photo 3 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/archives-tunisie-4.jpg') }}" alt="Consultation documentaire Archidoc" style="object-position: center;">
                <div class="photo-caption">
                  <h6>Atelier de Traitement</h6>
                  <p>Dématérialisation et archivage</p>
                </div>
              </div>
            </div>

          </div>
        </div>

      </article>

      <!-- Article 5 : Remise des certificats internationaux — Séminaire LCB/FT -->
      <article class="article-card" data-aos="fade-up">
        
        <!-- En-tête de l'article -->
        <div class="mb-4 pb-3" style="border-bottom: 2px solid #f1f5f9;">
          <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
            <span class="badge px-3 py-2 fw-bold" style="background: #000f3c; color: #ffffff !important; border-radius: 8px; font-size: 12.5px;">
              🏆 Remise des certificats
            </span>
            <span class="badge px-3 py-2 fw-bold rounded-pill" style="background: rgba(255, 122, 0, 0.15); color: #d96600;">
              15 au 17 juin 2026
            </span>
            <span class="badge bg-secondary bg-opacity-10 text-dark fw-semibold px-3 py-2 rounded-pill">
              <i class="bi bi-geo-alt-fill text-danger me-1"></i> Abidjan, Côte d’Ivoire 🇨🇮
            </span>
            <span class="badge bg-light text-secondary border fw-semibold px-3 py-2 rounded-pill small">
              🇹🇳 Tunisie · 🇨🇮 Côte d’Ivoire · 🇬🇳 Guinée
            </span>
          </div>

          <h2 class="fw-bold mb-2" style="color: #000f3c; font-size: 2.2rem; line-height: 1.3;">
            Remise des certificats internationaux — Séminaire LCB/FT
          </h2>
          <p class="text-muted mb-0">Reconnaissance de l'Excellence et Clôture du Séminaire International de Conformité</p>
        </div>

        <!-- Corps et photo vedette -->
        <div class="row align-items-center g-4 g-lg-5 mb-5">
          <div class="col-lg-6">
            <div class="rounded-4 overflow-hidden shadow" style="border: 3px solid #ffffff; border-radius: 22px;">
              <img src="{{ asset('images/actualites/certificats-abidjan-groupe.jpg') }}" alt="Photo de groupe officielle remise des certificats LCB/FT Abidjan CAEI" class="img-fluid w-100" style="max-height: 420px; object-fit: cover; border-radius: 20px;">
            </div>
          </div>

          <div class="col-lg-6">
            <p class="fs-6 mb-3" style="color: #334155; line-height: 1.85; text-align: justify;">
              À l’issue du séminaire international consacré à l’audit du dispositif de conformité en matière de Lutte contre le Blanchiment de Capitaux et le Financement du Terrorisme (<strong>LCB/FT</strong>), le <strong>Comité Africain d’Expertise Internationale (CAEI)</strong> a organisé la remise des certificats internationaux aux participants.
            </p>

            <p class="fs-6 mb-3" style="color: #475569; line-height: 1.85; text-align: justify;">
              Cette cérémonie a réuni plusieurs professionnels et représentants d’organisations, notamment le <strong>Trésor Public de Côte d’Ivoire</strong>, <strong>ARTWORKS INTERNATIONAL</strong>, <strong>THALYS CONSEILS & ASSOCIÉS</strong> et <strong>AVENI-RE</strong>.
            </p>

            <p class="fs-6 mb-4" style="color: #475569; line-height: 1.85; text-align: justify;">
              Un moment de reconnaissance qui vient clôturer une session riche en échanges, en expertise et en partage d’expériences autour des enjeux de conformité et de lutte contre la criminalité financière.
            </p>

            <!-- Institutions participantes -->
            <div class="p-3 rounded-3 mb-4 d-flex align-items-center gap-3" style="background: #fff7ed; border-left: 4px solid #ff7a00;">
              <i class="bi bi-award fs-2 text-warning flex-shrink-0"></i>
              <div>
                <strong style="color: #000f3c; font-size: 14.5px;">🤝 Institutions participantes :</strong>
                <p class="small mb-0" style="color: #334155;">
                  Trésor Public de Côte d’Ivoire · ARTWORKS INTERNATIONAL · THALYS CONSEILS & ASSOCIÉS · AVENI-RE
                </p>
              </div>
            </div>

            <!-- Fiche mémo -->
            <div class="row g-2 text-center">
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted small">📍 Lieu</span>
                  <strong style="color: #000f3c; font-size: 13px;">Abidjan, Côte d’Ivoire</strong>
                </div>
              </div>
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted small">📅 Date</span>
                  <strong style="color: #000f3c; font-size: 13px;">15 – 17 juin 2026</strong>
                </div>
              </div>
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted small">🎯 Thématique</span>
                  <strong style="color: #000f3c; font-size: 13px;">Audit LCB/FT</strong>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Galerie Photos de la remise -->
        <div class="pt-4" style="border-top: 1px solid #f1f5f9;">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
              <span class="badge px-3 py-1 mb-2" style="background: #000f3c; color: #ff7a00; font-size: 11px;">MOMENTS FORTS</span>
              <h4 class="fw-bold mb-0" style="color: #000f3c;">Galerie Photos — Remise Individuelle des Certificats</h4>
            </div>
          </div>

          <div class="row g-4">
            
            <!-- Photo 1 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/certificats-abidjan-4.jpg') }}" alt="Remise de certificat Mme Bamba Zeinab" style="object-position: top center;">
                <div class="photo-caption">
                  <h6>Remise de Certificat</h6>
                  <p>Mme Bamba Zeinab — Attestation CAEI</p>
                </div>
              </div>
            </div>

            <!-- Photo 2 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/certificats-abidjan-1.jpg') }}" alt="Remise de certificat international LCB/FT" style="object-position: top center;">
                <div class="photo-caption">
                  <h6>Remise de Certificat</h6>
                  <p>Attestation & sacoche officielle CAEI</p>
                </div>
              </div>
            </div>

            <!-- Photo 3 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/certificats-abidjan-2.jpg') }}" alt="Remise de certificat participant LCB/FT" style="object-position: top center;">
                <div class="photo-caption">
                  <h6>Certification & Honneur</h6>
                  <p>Validation du cycle d'audit LCB/FT</p>
                </div>
              </div>
            </div>

            <!-- Photo 4 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/certificats-abidjan-3.jpg') }}" alt="Célébration et remise de certificat" style="object-position: top center;">
                <div class="photo-caption">
                  <h6>Reconnaissance Officielle</h6>
                  <p>Félicitations et certificat CAEI</p>
                </div>
              </div>
            </div>

            <!-- Photo 5 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/certificats-abidjan-5.jpg') }}" alt="Remise de diplôme M. Tassonou" style="object-position: top center;">
                <div class="photo-caption">
                  <h6>Excellence Professionnelle</h6>
                  <p>M. Tassonou — Distinction CAEI</p>
                </div>
              </div>
            </div>

            <!-- Photo 6 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/certificats-abidjan-6.jpg') }}" alt="Cérémonie officielle de remise" style="object-position: top center;">
                <div class="photo-caption">
                  <h6>Délégation & Cérémonie</h6>
                  <p>Partage et clôture officielle</p>
                </div>
              </div>
            </div>

            <!-- Photo 7 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/certificats-abidjan-7.jpg') }}" alt="Attestation de compétences LCB/FT" style="object-position: top center;">
                <div class="photo-caption">
                  <h6>Attestation de Compétences</h6>
                  <p>Comité Africain d'Expertise Internationale</p>
                </div>
              </div>
            </div>

            <!-- Photo 8 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/certificats-abidjan-8.jpg') }}" alt="Remise de certificat M. Agja Pierre" style="object-position: top center;">
                <div class="photo-caption">
                  <h6>Distinction d'Honneur</h6>
                  <p>M. Agja Pierre — Certification LCB/FT</p>
                </div>
              </div>
            </div>

            <!-- Photo 9 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/certificats-abidjan-9.jpg') }}" alt="Remise de certificat M. Bosson" style="object-position: top center;">
                <div class="photo-caption">
                  <h6>Validation de Formation</h6>
                  <p>M. Bosson — Remise officielle</p>
                </div>
              </div>
            </div>

            <!-- Photo 10 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/certificats-abidjan-10.jpg') }}" alt="Remise de certificat Mme Becher" style="object-position: top center;">
                <div class="photo-caption">
                  <h6>Reconnaissance & Mérite</h6>
                  <p>Mme Becher — Conformité LCB/FT</p>
                </div>
              </div>
            </div>

            <!-- Photo 11 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/certificats-abidjan-11.jpg') }}" alt="Remise de certificat Mme Koua" style="object-position: top center;">
                <div class="photo-caption">
                  <h6>Excellence Professionnelle</h6>
                  <p>Mme Koua — Certification CAEI</p>
                </div>
              </div>
            </div>

            <!-- Photo 12 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/certificats-abidjan-12.jpg') }}" alt="Remise de certificat M. Kouakou" style="object-position: top center;">
                <div class="photo-caption">
                  <h6>Cérémonie & Félicitations</h6>
                  <p>M. Kouakou — Audit LCB/FT</p>
                </div>
              </div>
            </div>

            <!-- Photo 13 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/certificats-abidjan-13.jpg') }}" alt="Remise de certificat M. Konan Jean Pierre" style="object-position: top center;">
                <div class="photo-caption">
                  <h6>Attestation Officielle</h6>
                  <p>M. Konan Jean Pierre — Conformité LCB/FT</p>
                </div>
              </div>
            </div>

            <!-- Photo 14 -->
            <div class="col-md-6 col-lg-4">
              <div class="photo-box position-relative">
                <img src="{{ asset('images/actualites/certificats-abidjan-14.jpg') }}" alt="Remise de certificat M. N'Gori" style="object-position: top center;">
                <div class="photo-caption">
                  <h6>Honneur & Clôture</h6>
                  <p>M. N'Gori — Certification CAEI</p>
                </div>
              </div>
            </div>

          </div>
        </div>

      </article>

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
