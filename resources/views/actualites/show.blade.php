<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ $actualite['title'] }} — CAEI Company Group</title>
  <meta name="description" content="{{ $actualite['summary'] }}">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <style>
    :root {
      --navy: #000f3c;
      --orange: #ff7a00;
      --navy-light: #001a66;
      --text-dark: #0f172a;
      --text-muted: #64748b;
      --bg-page: #f8fafc;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-color: var(--bg-page);
      color: var(--text-dark);
    }

    /* Fixed top bar & header */
    .top-bar-caei {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 35px;
      z-index: 1030;
      background: #ffffff;
      border-bottom: 1px solid #e2e8f0;
      font-size: 11.5px;
      color: #334155;
    }

    .top-bar-caei a {
      color: #334155;
      text-decoration: none;
    }

    .top-bar-caei a:hover {
      color: var(--orange);
    }

    #header.fixed-top {
      position: fixed !important;
      top: 35px !important;
      left: 0;
      right: 0;
      z-index: 1020;
      background: var(--navy) !important;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
      padding: 0;
    }

    .header-container {
      min-height: 75px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .header .logo img {
      max-height: 60px;
      width: auto;
      object-fit: contain;
    }

    .navmenu ul {
      margin: 0;
      padding: 0;
      display: flex;
      list-style: none;
      align-items: center;
      gap: 0.5rem;
    }

    .navmenu a {
      color: #ffffff !important;
      font-weight: 600;
      font-size: 14px;
      padding: 8px 14px;
      border-radius: 6px;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .navmenu a:hover,
    .navmenu a.active {
      color: #ffffff !important;
      background: rgba(255, 255, 255, 0.12);
    }

    .btn-getstarted {
      background: var(--orange) !important;
      color: #ffffff !important;
      font-weight: 700;
      font-size: 13px;
      padding: 8px 18px;
      border-radius: 50px;
      border: none;
      transition: all 0.3s ease;
    }

    .btn-getstarted:hover {
      background: #e06900 !important;
      transform: translateY(-1px);
    }

    /* Hero Detail Banner */
    .article-hero {
      position: relative;
      background: linear-gradient(180deg, rgba(0, 15, 60, 0.90) 0%, rgba(0, 15, 60, 0.96) 100%),
                  url("{{ asset('images/professionel.jpg') }}") center/cover no-repeat fixed;
      padding-top: 170px;
      padding-bottom: 50px;
      color: #ffffff;
    }

    .article-container {
      background: #ffffff;
      border-radius: 28px;
      border: 1px solid #e2e8f0;
      padding: 3rem;
      box-shadow: 0 10px 30px rgba(0, 15, 60, 0.05);
      margin-top: -30px;
      position: relative;
      z-index: 10;
    }

    /* Photo Box Gallery */
    .photo-box {
      border-radius: 18px;
      overflow: hidden;
      background: #000f3c;
      height: 220px;
      cursor: pointer;
      border: 2px solid #e2e8f0;
      transition: all 0.35s ease;
    }

    .photo-box:hover {
      border-color: var(--orange);
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(0, 15, 60, 0.18);
    }

    .photo-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }

    .photo-box:hover img {
      transform: scale(1.08);
      opacity: 0.88;
    }

    .photo-caption {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 12px 14px;
      background: linear-gradient(transparent, rgba(0, 15, 60, 0.95));
      color: #ffffff;
    }

    .photo-caption h6 {
      font-size: 13px;
      font-weight: 700;
      margin-bottom: 2px;
      color: #ffffff;
    }

    .photo-caption p {
      font-size: 11px;
      margin-bottom: 0;
      color: #cbd5e1;
    }

    /* Other News Cards */
    .mini-news-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 18px;
      transition: all 0.3s ease;
      overflow: hidden;
    }

    .mini-news-card:hover {
      transform: translateY(-5px);
      border-color: var(--orange);
      box-shadow: 0 12px 24px rgba(0, 15, 60, 0.1);
    }

    /* Footer */
    .footer-caei {
      background: #000a26;
      color: #e2e8f0 !important;
      padding-top: 60px;
      padding-bottom: 25px;
    }

    .footer-caei h5 {
      color: #ffffff !important;
      font-weight: 700;
      margin-bottom: 18px;
    }

    .footer-caei a {
      color: #cbd5e1 !important;
      text-decoration: none;
      transition: color 0.2s;
    }

    .footer-caei a:hover {
      color: var(--orange) !important;
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

  <!-- Hero Header Detail -->
  <section class="article-hero">
    <div class="container position-relative z-1" data-aos="fade-up">
      <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <a href="{{ route('actualites.index') }}" class="btn btn-outline-light btn-sm rounded-pill px-3 py-2 fw-semibold">
          <i class="bi bi-arrow-left me-1"></i> Retour à toutes les actualités
        </a>
        <div class="d-flex flex-wrap align-items-center gap-2">
          <span class="badge px-3 py-2 fw-bold" style="background: var(--orange); color: #ffffff !important; border-radius: 8px; font-size: 12px;">
            {{ $actualite['category'] }}
          </span>
          <span class="badge bg-light bg-opacity-25 text-white fw-semibold px-3 py-2 rounded-pill font-monospace" style="font-size: 12px;">
            📅 {{ $actualite['date'] }}
          </span>
          <span class="badge bg-light bg-opacity-25 text-white fw-semibold px-3 py-2 rounded-pill" style="font-size: 12px;">
            <i class="bi bi-geo-alt-fill text-warning me-1"></i> {{ $actualite['location'] }}
          </span>
          @if(!empty($actualite['country_badge']))
            <span class="badge bg-light bg-opacity-25 text-white fw-semibold px-3 py-2 rounded-pill" style="font-size: 12px;">
              {{ $actualite['country_badge'] }}
            </span>
          @endif
        </div>
      </div>

      <h1 class="fw-bold mb-2 text-white" style="font-size: 2.5rem; line-height: 1.25; text-shadow: 0 2px 10px rgba(0,0,0,0.6);">
        {{ $actualite['title'] }}
      </h1>
      <p class="fs-5 mb-0" style="color: #cbd5e1 !important; text-shadow: 0 1px 4px rgba(0,0,0,0.5);">
        {{ $actualite['subtitle'] }}
      </p>
    </div>
  </section>

  <!-- Main Article Content -->
  <main class="py-4 mb-5">
    <div class="container">
      
      <div class="article-container" data-aos="fade-up">
        
        <!-- Row Présentation Principale -->
        <div class="row align-items-center g-4 g-lg-5 mb-5 pb-4 border-bottom">
          
          <div class="col-lg-5 text-center">
            <img src="{{ asset($actualite['main_image']) }}" alt="{{ $actualite['main_image_alt'] }}" class="img-fluid shadow" style="max-height: 520px; width: auto; max-width: 100%; border-radius: 26px; border: 2px solid #e2e8f0; display: inline-block;">
          </div>

          <div class="col-lg-7">
            
            <div class="mb-4">
              @foreach($actualite['content'] as $p)
                <p class="fs-6 mb-3" style="color: #334155; line-height: 1.85; text-align: justify;">
                  {!! $p !!}
                </p>
              @endforeach
            </div>

            <!-- Encadré Partenaire si existant -->
            @if(!empty($actualite['partner']))
              <div class="p-3 mb-4 rounded-3 d-flex align-items-center gap-3" style="background: #fff8f0; border-left: 4px solid #ff7a00;">
                <div class="fs-3 text-warning">
                  <i class="bi {{ $actualite['partner']['icon'] ?? 'bi-shield-check' }}"></i>
                </div>
                <div>
                  <strong style="color: #000f3c; font-size: 14px;">🤝 {{ $actualite['partner']['title'] }} :</strong>
                  <p class="mb-0 small text-secondary">
                    {{ $actualite['partner']['text'] }}
                  </p>
                </div>
              </div>
            @endif

            <!-- Fiche mémo -->
            <div class="row g-2 text-center">
              <div class="col-4">
                <div class="p-2.5 rounded-3 bg-light border">
                  <span class="d-block text-muted small">📍 Lieu</span>
                  <strong style="color: #000f3c; font-size: 13px;">{{ $actualite['location'] }}</strong>
                </div>
              </div>
              <div class="col-4">
                <div class="p-2.5 rounded-3 bg-light border">
                  <span class="d-block text-muted small">📅 Date</span>
                  <strong style="color: #000f3c; font-size: 13px;">{{ $actualite['date'] }}</strong>
                </div>
              </div>
              <div class="col-4">
                <div class="p-2.5 rounded-3 bg-light border">
                  <span class="d-block text-muted small">🎯 Thématique</span>
                  <strong style="color: #000f3c; font-size: 13px;">{{ $actualite['theme'] ?? 'Séminaire' }}</strong>
                </div>
              </div>
            </div>

          </div>

        </div>

        <!-- Galerie Photos Complète -->
        <div class="pt-2">
          <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <div>
              <span class="badge px-3 py-1 mb-2" style="background: #000f3c; color: #ff7a00; font-size: 11px;">MOMENTS FORTS</span>
              <h3 class="fw-bold mb-0" style="color: #000f3c;">{{ $actualite['gallery_title'] }}</h3>
            </div>
            <div class="text-muted small">
              <i class="bi bi-camera-fill text-warning me-1"></i> {{ count($actualite['gallery']) }} photos officielles
            </div>
          </div>

          <div class="row g-4">
            @foreach($actualite['gallery'] as $photo)
              <div class="col-md-6 col-lg-3">
                <div class="photo-box position-relative">
                  <img src="{{ asset($photo['image']) }}" alt="{{ $photo['title'] }}" style="object-position: center;">
                  <div class="photo-caption">
                    <h6>{{ $photo['title'] }}</h6>
                    <p>{{ $photo['desc'] }}</p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>

      </div>

      <!-- Section Découvrir d'autres actualités -->
      @if(count($otherActualites) > 0)
        <div class="mt-5 pt-4" data-aos="fade-up">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
              <span class="badge px-3 py-1 mb-2" style="background: #000f3c; color: #ff7a00; font-size: 11px;">À DÉCOUVRIR AUSSI</span>
              <h3 class="fw-bold mb-0" style="color: #000f3c;">Autres Séminaires & Actualités</h3>
            </div>
            <a href="{{ route('actualites.index') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-semibold">
              Voir tout <i class="bi bi-arrow-right ms-1"></i>
            </a>
          </div>

          <div class="row g-4">
            @foreach(array_slice($otherActualites, 0, 3) as $other)
              <div class="col-md-6 col-lg-4">
                <div class="mini-news-card h-100 p-3 shadow-sm d-flex flex-column justify-content-between">
                  <div>
                    <div class="position-relative overflow-hidden rounded-3 mb-3" style="height: 180px;">
                      <img src="{{ asset($other['main_image']) }}" alt="{{ $other['main_image_alt'] }}" class="w-100 h-100 object-fit-cover rounded-3">
                      <span class="position-absolute top-0 start-0 m-2 badge px-2 py-1 fw-bold shadow-sm" style="background: #000f3c; color: #ffffff !important; font-size: 10.5px; border-radius: 6px;">
                        {{ $other['category'] }}
                      </span>
                    </div>
                    <span class="badge px-2 py-1 fw-bold rounded-pill mb-2" style="background: rgba(255, 122, 0, 0.15); color: #d96600; font-size: 11px;">
                      📅 {{ $other['date'] }}
                    </span>
                    <h5 class="fw-bold mb-2" style="color: #000f3c; font-size: 1.1rem; line-height: 1.35;">
                      {{ $other['title'] }}
                    </h5>
                  </div>
                  <div class="pt-2 border-top mt-2">
                    <a href="{{ route('actualites.show', $other['slug']) }}" class="btn btn-sm btn-outline-warning text-dark fw-bold w-100 rounded-pill py-1.5" style="border-color: #ff7a00;">
                      → Découvrir le séminaire
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endif

      <!-- Bannière Contact / Collaboration -->
      <div class="mt-5 p-5 text-center rounded-4 shadow-sm" style="background: linear-gradient(135deg, #000f3c 0%, #002266 100%);" data-aos="zoom-in">
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
