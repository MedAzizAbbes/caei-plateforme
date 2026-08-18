<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ $domainInfo['title'] }} — CAEI Elite Training</title>
  <meta name="description" content="{{ $domainInfo['subtitle'] }}">

  <!-- Favicon -->
  <link href="{{ asset('assets/img/logoh.ico') }}" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <!-- AOS Animations -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <style>
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
      --shadow-sm: 0 4px 15px rgba(0,0,0,0.06);
      --shadow-md: 0 8px 30px rgba(0,0,0,0.1);
      --shadow-lg: 0 20px 60px rgba(0,0,0,0.15);
      --shadow-gold: 0 8px 30px rgba(206, 146, 51, 0.3);
      --radius-sm: 12px;
      --radius-md: 20px;
      --radius-lg: 32px;
      --transition: all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: var(--font-main); background: var(--off-white); color: #1a1a2e; }

    /* SCROLLBAR */
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: var(--navy); }
    ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 3px; }

    /* NAVBAR */
    .et-navbar {
      position: fixed;
      top: 0; width: 100%; z-index: 1000;
      padding: 16px 0;
      background: rgba(0, 31, 63, 0.97);
      backdrop-filter: blur(20px);
      box-shadow: 0 4px 30px rgba(0,0,0,0.25);
    }

    .et-navbar .nav-brand {
      display: flex; align-items: center; gap: 12px; text-decoration: none;
    }
    .et-navbar .nav-brand img { height: 48px; object-fit: contain; }
    .et-navbar .nav-brand span {
      font-family: var(--font-display); font-weight: 800; font-size: 18px; color: var(--white);
    }
    .et-navbar .nav-brand span em { color: var(--gold-light); font-style: normal; }

    .btn-back {
      display: inline-flex; align-items: center; gap: 8px;
      color: rgba(255,255,255,0.85); text-decoration: none; font-size: 13px; font-weight: 600;
      padding: 8px 16px; border-radius: 50px; border: 1px solid rgba(255,255,255,0.2);
      transition: var(--transition);
    }
    .btn-back:hover {
      color: var(--navy); background: var(--gold-light); border-color: var(--gold-light);
    }

    /* DOMAIN HERO HEADER */
    .domain-hero {
      position: relative;
      padding: 140px 0 70px;
      background: linear-gradient(135deg, #000f3c 0%, #001f3f 40%, #002a5c 80%, #001030 100%);
      color: var(--white);
      overflow: hidden;
    }

    .domain-hero-bg {
      position: absolute; inset: 0;
      background: 
        radial-gradient(ellipse 70% 50% at 20% 40%, rgba(206, 146, 51, 0.18) 0%, transparent 70%),
        radial-gradient(ellipse 50% 70% at 80% 20%, rgba(0, 120, 255, 0.15) 0%, transparent 70%);
      pointer-events: none;
    }

    .breadcrumb-custom {
      display: flex; align-items: center; gap: 8px; font-size: 13px; color: rgba(255,255,255,0.6);
      margin-bottom: 20px; list-style: none; padding: 0;
    }
    .breadcrumb-custom a { color: var(--gold-light); text-decoration: none; font-weight: 500; }
    .breadcrumb-custom a:hover { text-decoration: underline; }

    .domain-badge {
      display: inline-flex; align-items: center; gap: 10px;
      background: rgba(206, 146, 51, 0.15); border: 1px solid rgba(206, 146, 51, 0.35);
      color: var(--gold-light); padding: 8px 20px; border-radius: 50px;
      font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;
      margin-bottom: 20px; backdrop-filter: blur(10px);
    }

    .domain-title {
      font-family: var(--font-display); font-size: clamp(32px, 4vw, 54px); font-weight: 900;
      line-height: 1.15; margin-bottom: 16px; letter-spacing: -0.5px;
    }

    .domain-subtitle {
      font-size: 17px; color: rgba(255,255,255,0.8); max-width: 700px; line-height: 1.7; margin-bottom: 30px;
    }

    /* SEARCH BAR IN HERO */
    .hero-search-box {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 50px;
      padding: 6px 6px 6px 24px;
      display: flex; align-items: center; gap: 12px;
      backdrop-filter: blur(20px);
      max-width: 550px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .hero-search-box input {
      background: transparent; border: none; outline: none; color: var(--white);
      font-size: 15px; width: 100%; font-family: var(--font-main);
    }
    .hero-search-box input::placeholder { color: rgba(255,255,255,0.45); }

    .hero-search-box button {
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      border: none; color: var(--navy); font-weight: 700; font-size: 14px;
      padding: 12px 26px; border-radius: 50px; cursor: pointer; transition: var(--transition);
      white-space: nowrap;
    }
    .hero-search-box button:hover {
      transform: scale(1.02); box-shadow: var(--shadow-gold);
    }

    /* COURSE CARDS */
    .course-card {
      background: var(--white);
      border-radius: var(--radius-md);
      border: 1px solid #eef0f5;
      padding: 28px;
      height: 100%;
      display: flex; flex-direction: column;
      transition: var(--transition);
      position: relative;
      overflow: hidden;
      box-shadow: var(--shadow-sm);
    }

    .course-card::before {
      content: '';
      position: absolute; top: 0; left: 0; width: 5px; height: 100%;
      background: linear-gradient(180deg, var(--gold), var(--gold-light));
      border-radius: 4px 0 0 4px;
      transition: var(--transition);
    }

    .course-card:hover {
      transform: translateY(-6px);
      box-shadow: var(--shadow-lg);
      border-color: rgba(206,146,51,0.3);
    }

    .course-code-badge {
      display: inline-block;
      background: rgba(206, 146, 51, 0.12);
      border: 1px solid rgba(206, 146, 51, 0.25);
      color: var(--gold-dark);
      font-family: monospace; font-size: 12px; font-weight: 800;
      padding: 4px 12px; border-radius: 8px; letter-spacing: 0.5px;
    }

    .course-title {
      font-family: var(--font-display); font-weight: 800; font-size: 18px; color: var(--navy);
      margin: 14px 0 10px; line-height: 1.4;
    }

    .course-desc {
      font-size: 14px; color: var(--gray); line-height: 1.6; flex-grow: 1; margin-bottom: 20px;
    }

    .course-meta {
      display: flex; align-items: center; gap: 16px; font-size: 13px; color: var(--gray);
      padding-top: 16px; border-top: 1px solid #f0f2f7; margin-bottom: 20px;
    }

    .course-meta-item {
      display: flex; align-items: center; gap: 6px; font-weight: 500;
    }
    .course-meta-item i { color: var(--gold); }

    .course-footer {
      display: flex; align-items: center; justify-content: space-between; gap: 12px;
      padding-top: 16px; border-top: 1px solid #f0f2f7;
    }

    .course-price-tag {
      font-family: var(--font-display); font-size: 22px; font-weight: 900; color: var(--gold-dark);
    }

    .btn-register-course {
      display: inline-flex; align-items: center; gap: 8px;
      background: linear-gradient(135deg, var(--navy), var(--navy-mid));
      color: var(--white); font-weight: 700; font-size: 13px;
      padding: 10px 20px; border-radius: 50px; text-decoration: none; border: none;
      cursor: pointer; transition: var(--transition);
    }

    .btn-register-course:hover {
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      color: var(--navy); transform: translateY(-2px); box-shadow: var(--shadow-gold);
    }

    /* SIDEBAR CATEGORIES */
    .sidebar-widget {
      background: var(--white);
      border-radius: var(--radius-md);
      padding: 24px;
      border: 1px solid #eef0f5;
      box-shadow: var(--shadow-sm);
      margin-bottom: 24px;
    }

    .sidebar-widget-title {
      font-family: var(--font-display); font-weight: 800; font-size: 16px; color: var(--navy);
      margin-bottom: 16px; padding-bottom: 12px; border-b: 2px solid #eef0f5;
    }

    .domain-list-group {
      display: flex; flex-direction: column; gap: 8px; list-style: none; padding: 0; margin: 0;
    }

    .domain-list-item a {
      display: flex; align-items: center; justify-content: space-between;
      padding: 10px 14px; border-radius: 12px; color: var(--gray); text-decoration: none;
      font-size: 13px; font-weight: 600; transition: var(--transition);
    }

    .domain-list-item.active a,
    .domain-list-item a:hover {
      background: rgba(206,146,51,0.1); color: var(--gold-dark);
    }

    /* FOOTER */
    .et-footer { background: #00142b; padding: 30px 0; text-align: center; color: rgba(255,255,255,0.4); font-size: 13px; }
    .et-footer a { color: var(--gold); text-decoration: none; }
  </style>
</head>

<body>

  <!-- NAVBAR -->
  <nav class="et-navbar">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="{{ route('elite.training') }}" class="nav-brand">
        <img src="{{ asset('assets/img/elite_training_logo.png') }}" alt="CAEI Elite Training">
        <span>CAEI <em>ELITE TRAINING</em></span>
      </a>

      <div class="d-flex align-items-center gap-3">
        <a href="{{ route('elite.training') }}" class="btn-back">
          <i class="bi bi-arrow-left"></i> Accueil
        </a>
      </div>
    </div>
  </nav>

  <!-- HERO HEADER -->
  <header class="domain-hero">
    <div class="domain-hero-bg"></div>
    <div class="container position-relative z-1">
      <!-- Breadcrumb -->
      <ul class="breadcrumb-custom">
        <li><a href="{{ route('home') }}">Accueil</a></li>
        <li><i class="bi bi-chevron-right" style="font-size:10px;"></i></li>
        <li><a href="{{ route('elite.training') }}">Elite Training</a></li>
        <li><i class="bi bi-chevron-right" style="font-size:10px;"></i></li>
        <li class="text-white">{{ $domainInfo['name'] }}</li>
      </ul>

      <div class="row align-items-center">
        <div class="col-lg-8" data-aos="fade-right">
          <div class="domain-badge">
            <i class="bi {{ $domainInfo['icon'] }}"></i> Domaine d'Expertise
          </div>

          <h1 class="domain-title">{{ $domainInfo['title'] }}</h1>
          <p class="domain-subtitle">{{ $domainInfo['subtitle'] }}</p>

          <!-- Search form inside hero -->
          <form method="GET" action="{{ route('elite.training.domain', $slug) }}" class="hero-search-box">
            <i class="bi bi-search text-gold fs-5 ms-2"></i>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher par code, intitulé, sujet...">
            <button type="submit">Rechercher</button>
          </form>
        </div>

        <div class="col-lg-4 d-none d-lg-block text-end" data-aos="fade-left">
          <div class="d-inline-flex flex-column align-items-center justify-content-center p-4 rounded-4" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(206,146,51,0.3); backdrop-filter: blur(20px); min-width: 220px;">
            <span class="display-4 font-black text-gold-light mb-0" style="font-family: var(--font-display); font-weight:900;">{{ $formations->count() }}</span>
            <span class="text-uppercase tracking-wider font-bold text-white-50 mt-1" style="font-size: 11px;">Formations Disponibles</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- MAIN CONTENT SECTION -->
  <main class="py-5">
    <div class="container">
      <div class="row g-4">
        
        <!-- SIDEBAR DOMAINES -->
        <div class="col-lg-3">
          <div class="sidebar-widget sticky-top" style="top: 100px;">
            <h6 class="sidebar-widget-title">Toutes les Catégories</h6>
            <ul class="domain-list-group">
              @foreach($allDomains as $key => $info)
                <li class="domain-list-item {{ $slug === $key ? 'active' : '' }}">
                  <a href="{{ route('elite.training.domain', $key) }}">
                    <span><i class="bi {{ $info['icon'] }} me-2"></i> {{ $info['name'] }}</span>
                    <i class="bi bi-chevron-right text-xs"></i>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>

          <!-- ASSISTANCE CARD -->
          <div class="p-4 rounded-4 text-white text-center position-relative overflow-hidden shadow-md" style="background: linear-gradient(135deg, var(--navy), #003366);">
            <i class="bi bi-headset text-gold display-4 mb-3 d-block"></i>
            <h6 class="font-bold mb-2" style="font-family: var(--font-display);">Besoin de conseil ?</h6>
            <p class="text-white-50 text-xs mb-3">Nos conseillers vous orientent vers le programme le mieux adapté à vos objectifs.</p>
            <a href="tel:+21655332885" class="btn btn-sm btn-gold font-bold rounded-pill px-3 py-2 w-100">
              <i class="bi bi-telephone-fill me-1"></i> +216 55 332 885
            </a>
          </div>
        </div>

        <!-- LISTE DES FORMATIONS -->
        <div class="col-lg-9">
          {{-- Header info --}}
          <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom">
            <div>
              <h5 class="font-bold text-navy mb-1" style="font-family: var(--font-display);">
                Catalogue des Formations — {{ $domainInfo['name'] }}
              </h5>
              <p class="text-muted text-xs mb-0">Affichage de {{ $formations->count() }} formation(s) disponible(s)</p>
            </div>
            @if(request('search'))
              <a href="{{ route('elite.training.domain', $slug) }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                ✕ Réinitialiser la recherche
              </a>
            @endif
          </div>

          {{-- Grille des formations --}}
          <div class="row g-4">
            @forelse($formations as $formation)
              <div class="col-md-6" data-aos="fade-up">
                <div class="course-card">
                  <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="course-code-badge">{{ $formation->code ?: 'CERTIF' }}</span>
                    <span class="badge bg-light text-dark border px-2.5 py-1 text-xs font-semibold">
                      ⏱️ {{ $formation->duration ?: '2 Semaines' }}
                    </span>
                  </div>

                  <h5 class="course-title">{{ $formation->title }}</h5>

                  <p class="course-desc">
                    {{ $formation->description ?: 'Formation professionnelle d\'excellence dispensée par les experts du CAEI.' }}
                  </p>

                  <div class="course-meta">
                    <div class="course-meta-item">
                      <i class="bi bi-geo-alt-fill"></i>
                      <span>{{ $formation->location ?: 'Tunis & En ligne' }}</span>
                    </div>
                    <div class="course-meta-item">
                      <i class="bi bi-award-fill"></i>
                      <span>Certificat CAEI</span>
                    </div>
                  </div>

                  <div class="course-footer">
                    <div>
                      <span class="text-muted d-block text-xs">Tarif formation</span>
                      <span class="course-price-tag">
                        @if($formation->price)
                          {{ number_format($formation->price, 0, ',', ' ') }} €
                        @else
                          Sur devis
                        @endif
                      </span>
                    </div>

                    <button type="button" 
                            onclick="openRegistrationModal('{{ addslashes($formation->code ? '['.$formation->code.'] '.$formation->title : $formation->title) }}')"
                            class="btn-register-course">
                      <span>S'inscrire</span>
                      <i class="bi bi-arrow-right"></i>
                    </button>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-12 py-5 text-center bg-white rounded-4 shadow-sm border p-5">
                <div class="display-1 text-muted mb-3">📁</div>
                <h5 class="font-bold text-navy">Aucune formation trouvée</h5>
                <p class="text-muted text-sm mb-4">Aucun résultat ne correspond à votre recherche dans le domaine {{ $domainInfo['name'] }}.</p>
                <a href="{{ route('elite.training.domain', $slug) }}" class="btn btn-gold font-bold rounded-pill px-4">
                  Voir toutes les formations de ce domaine
                </a>
              </div>
            @endforelse
          </div>
        </div>

      </div>
    </div>
  </main>

  <!-- MODALE PROPRE D'INSCRIPTION / DEMANDE DE DEVIS -->
  <div class="modal fade" id="quickRegisterModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
        <div class="modal-header p-4 text-white" style="background: linear-gradient(135deg, var(--navy), #002a5c);">
          <div>
            <span class="text-gold-light text-uppercase tracking-wider font-bold text-xs">Inscription</span>
            <h5 class="modal-title font-black text-white mt-1" id="modalCourseTitle" style="font-family: var(--font-display);">Intitulé du Cours</h5>
          </div>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>

        <form action="{{ route('elite.appointment.store') }}" method="POST" id="quickRegisterForm" class="p-4">
          @csrf
          <input type="hidden" name="type" value="inscription">
          <input type="hidden" name="subject" id="modalCourseInput">

          <div class="mb-3">
            <label class="form-label text-xs font-bold uppercase text-muted">Nom & Prénom *</label>
            <input type="text" name="name" required placeholder="Votre nom complet" class="form-control rounded-3 py-2 text-sm">
          </div>

          <div class="mb-3">
            <label class="form-label text-xs font-bold uppercase text-muted">Email Professionnel *</label>
            <input type="email" name="email" required placeholder="votre@adresse.com" class="form-control rounded-3 py-2 text-sm">
          </div>

          <div class="mb-3">
            <label class="form-label text-xs font-bold uppercase text-muted">Téléphone / WhatsApp</label>
            <input type="text" name="phone" placeholder="+216 XX XXX XXX" class="form-control rounded-3 py-2 text-sm">
          </div>

          <div class="mb-4">
            <label class="form-label text-xs font-bold uppercase text-muted">Message / Précisions</label>
            <textarea name="message" rows="3" placeholder="Organisme, dates souhaitées ou questions..." class="form-control rounded-3 text-sm"></textarea>
          </div>

          <div class="d-flex items-center justify-end gap-2">
            <button type="button" class="btn btn-light rounded-pill font-semibold text-xs px-4 py-2" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-gold rounded-pill font-bold text-sm px-4 py-2">
              <i class="bi bi-send-fill me-1"></i> Envoyer ma demande
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="et-footer">
    <div class="container">
      <p>© {{ date('Y') }} <a href="{{ route('elite.training') }}">CAEI Elite Training</a>. Tous droits réservés.</p>
    </div>
  </footer>

  <!-- SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 600, once: true });

    function openRegistrationModal(courseTitle) {
      document.getElementById('modalCourseTitle').textContent = courseTitle;
      document.getElementById('modalCourseInput').value = courseTitle;
      const modal = new bootstrap.Modal(document.getElementById('quickRegisterModal'));
      modal.show();
    }
  </script>
  <x-intl-tel-input />
</body>
</html>
