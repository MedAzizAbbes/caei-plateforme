<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Services d'Excellence & Accompagnement — CAEI Elite Training</title>
  <meta name="description" content="Découvrez les services haut de gamme du CAEI : Conseil en ingénierie de formation, Évaluation des compétences, Consulting stratégique, Coaching de dirigeants et le Pack Séjour clé en main pour les participants internationaux.">

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
      --navy-dark: #000c1a;
      --white: #ffffff;
      --off-white: #f4f6fa;
      --gray-light: #eef2f7;
      --font-main: 'Inter', sans-serif;
      --font-display: 'Outfit', sans-serif;
      --shadow-sm: 0 4px 20px rgba(0,0,0,0.05);
      --shadow-md: 0 12px 35px rgba(0,0,0,0.08);
      --shadow-glow: 0 15px 40px rgba(206, 146, 51, 0.22);
      --radius-sm: 14px;
      --radius-md: 24px;
      --radius-lg: 36px;
      --transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: var(--font-main); background: var(--off-white); color: #1a1e29; overflow-x: hidden; }

    /* SCROLLBAR */
    ::-webkit-scrollbar { width: 7px; }
    ::-webkit-scrollbar-track { background: var(--navy-dark); }
    ::-webkit-scrollbar-thumb { background: linear-gradient(to bottom, var(--gold-light), var(--gold)); border-radius: 4px; }

    /* NAVBAR */
    .et-navbar {
      position: fixed;
      top: 0; width: 100%; z-index: 1000;
      padding: 16px 0;
      background: rgba(0, 31, 63, 0.96);
      backdrop-filter: blur(20px);
      box-shadow: 0 4px 30px rgba(0,0,0,0.3);
      border-bottom: 1px solid rgba(255,255,255,0.08);
    }
    .et-navbar .nav-brand { display: flex; align-items: center; gap: 12px; text-decoration: none; }
    .et-navbar .nav-brand img { height: 48px; object-fit: contain; }
    .et-navbar .nav-brand span { font-family: var(--font-display); font-weight: 800; font-size: 19px; color: var(--white); }
    .et-navbar .nav-brand span em { color: var(--gold-light); font-style: normal; }

    .btn-back {
      display: inline-flex; align-items: center; gap: 8px;
      color: rgba(255,255,255,0.9); text-decoration: none; font-size: 13px; font-weight: 600;
      padding: 9px 20px; border-radius: 50px; border: 1px solid rgba(255,255,255,0.25);
      background: rgba(255,255,255,0.05); transition: var(--transition);
    }
    .btn-back:hover { color: var(--navy-dark); background: var(--gold-light); border-color: var(--gold-light); transform: translateY(-2px); }

    /* HERO HEADER ULTRA MODERN */
    .services-hero {
      position: relative;
      padding: 170px 0 100px;
      background: linear-gradient(135deg, #0f172a 0%, #1e293b 45%, #334155 80%, #0f172a 100%);
      color: var(--white);
      overflow: hidden;
    }
    .hero-glow-bg {
      position: absolute; inset: 0;
      background: 
        radial-gradient(circle 600px at 15% 30%, rgba(206, 146, 51, 0.22) 0%, transparent 70%),
        radial-gradient(circle 500px at 85% 70%, rgba(0, 110, 255, 0.18) 0%, transparent 70%);
      pointer-events: none;
    }
    .hero-grid-pattern {
      position: absolute; inset: 0;
      background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px);
      background-size: 32px 32px;
      opacity: 0.25;
      pointer-events: none;
    }

    .hero-badge-pill {
      display: inline-flex; align-items: center; gap: 10px;
      padding: 8px 20px; border-radius: 50px;
      background: rgba(206, 146, 51, 0.14); border: 1px solid rgba(206, 146, 51, 0.4);
      color: var(--gold-light); font-size: 13px; font-weight: 700; letter-spacing: 0.5px;
      margin-bottom: 24px; text-transform: uppercase;
      box-shadow: 0 4px 20px rgba(206, 146, 51, 0.15);
    }
    .hero-title {
      font-family: var(--font-display); font-size: 48px; font-weight: 900; line-height: 1.15; margin-bottom: 20px;
    }
    @media (max-width: 768px) { .hero-title { font-size: 34px; } }
    
    .hero-title .highlight {
      background: linear-gradient(135deg, #ffe094 0%, #f0b75a 50%, #ce9233 100%);
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    }
    .hero-subtitle {
      font-size: 17px; color: rgba(255,255,255,0.85); max-width: 820px; line-height: 1.8; margin-bottom: 30px; font-weight: 400;
    }

    /* STATS BANNER BAR */
    .hero-stats-bar {
      margin-top: 40px;
      background: rgba(255,255,255,0.06);
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: var(--radius-md);
      padding: 24px 30px;
    }
    .stat-box { display: flex; align-items: center; gap: 16px; }
    .stat-icon {
      width: 48px; height: 48px; border-radius: 12px;
      background: linear-gradient(135deg, rgba(206, 146, 51, 0.25) 0%, rgba(240, 183, 90, 0.1) 100%);
      color: var(--gold-light); display: flex; align-items: center; justify-content: center; font-size: 22px;
    }
    .stat-num { font-family: var(--font-display); font-weight: 800; font-size: 24px; color: white; line-height: 1; }
    .stat-label { font-size: 12px; color: rgba(255,255,255,0.7); font-weight: 500; margin-top: 4px; }

    /* FILTER TABS */
    .filter-tabs-wrapper { margin-top: -30px; position: relative; z-index: 10; }
    .filter-tab-btn {
      padding: 12px 26px; border-radius: 50px; border: 1px solid rgba(0,31,63,0.12);
      background: white; color: var(--navy); font-weight: 700; font-size: 14px;
      cursor: pointer; transition: var(--transition); box-shadow: var(--shadow-sm);
    }
    .filter-tab-btn:hover, .filter-tab-btn.active {
      background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
      color: white; border-color: var(--navy); box-shadow: var(--shadow-md); transform: translateY(-2px);
    }
    .filter-tab-btn.active { background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold) 100%); border-color: var(--gold); }

    /* SERVICE CARDS GRID */
    .services-section { padding: 60px 0 100px; }

    .service-card-modern {
      background: white;
      border-radius: var(--radius-md);
      border: 1px solid rgba(0, 31, 63, 0.08);
      padding: 36px 32px;
      height: 100%;
      display: flex; flex-direction: column;
      box-shadow: var(--shadow-sm);
      transition: var(--transition);
      position: relative;
      overflow: hidden;
    }
    .service-card-modern::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0; height: 5px;
      background: linear-gradient(90deg, var(--navy) 0%, var(--gold) 100%);
      opacity: 0.8; transition: var(--transition);
    }
    .service-card-modern:hover {
      transform: translateY(-10px);
      box-shadow: var(--shadow-glow);
      border-color: rgba(206, 146, 51, 0.35);
    }
    .service-card-modern:hover::before { opacity: 1; height: 6px; }

    .service-tag {
      display: inline-block; align-self: flex-start;
      font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.8px;
      padding: 4px 12px; border-radius: 50px; margin-bottom: 20px;
    }
    .tag-gold { background: rgba(206, 146, 51, 0.12); color: var(--gold-dark); border: 1px solid rgba(206, 146, 51, 0.25); }
    .tag-navy { background: rgba(0, 31, 63, 0.08); color: var(--navy); border: 1px solid rgba(0, 31, 63, 0.15); }
    .tag-blue { background: rgba(0, 110, 255, 0.08); color: #005ce6; border: 1px solid rgba(0, 110, 255, 0.2); }

    .service-icon-wrapper {
      width: 64px; height: 64px; border-radius: 18px;
      background: linear-gradient(135deg, rgba(0,31,63,0.06) 0%, rgba(206,146,51,0.15) 100%);
      color: var(--navy); display: flex; align-items: center; justify-content: center;
      font-size: 28px; margin-bottom: 22px; transition: var(--transition);
    }
    .service-card-modern:hover .service-icon-wrapper {
      background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
      color: var(--gold-light); transform: rotate(-5deg) scale(1.05);
    }

    .service-title-modern {
      font-family: var(--font-display); font-size: 21px; font-weight: 800; color: var(--navy);
      line-height: 1.35; margin-bottom: 14px;
    }
    .service-desc-modern {
      font-size: 14.5px; color: #4a5268; line-height: 1.7; margin-bottom: 28px; flex-grow: 1;
    }

    .service-highlights-list {
      list-style: none; padding: 0; margin: 0 0 24px; font-size: 13px; color: #555;
    }
    .service-highlights-list li {
      display: flex; align-items: center; gap: 8px; margin-bottom: 8px; font-weight: 500;
    }
    .service-highlights-list li i { color: var(--gold); font-size: 14px; }

    .btn-action-glow {
      display: inline-flex; align-items: center; justify-content: center; gap: 10px;
      width: 100%; padding: 14px 22px;
      background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
      color: white; border-radius: 14px; font-weight: 700; font-size: 14px;
      text-decoration: none; border: none; transition: var(--transition);
    }
    .btn-action-glow:hover {
      background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
      color: white; box-shadow: var(--shadow-glow); transform: translateY(-2px);
    }

    /* PACK SEJOUR SECTION ULTRA LUXE */
    .pack-sejour-luxe {
      background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
      color: white; padding: 90px 0; position: relative; overflow: hidden;
    }
    .pack-glow-bg {
      position: absolute; inset: 0;
      background: radial-gradient(circle 700px at 50% 50%, rgba(206, 146, 51, 0.15) 0%, transparent 70%);
      pointer-events: none;
    }
    .pack-card-luxe {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid rgba(255, 255, 255, 0.12);
      border-radius: var(--radius-md);
      padding: 34px 28px; height: 100%;
      backdrop-filter: blur(12px);
      transition: var(--transition);
    }
    .pack-card-luxe:hover {
      background: rgba(255, 255, 255, 0.08);
      border-color: var(--gold-light);
      transform: translateY(-8px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }
    .pack-icon-luxe {
      width: 56px; height: 56px; border-radius: 16px;
      background: linear-gradient(135deg, rgba(206,146,51,0.25) 0%, rgba(240,183,90,0.1) 100%);
      color: var(--gold-light); display: flex; align-items: center; justify-content: center;
      font-size: 24px; margin-bottom: 22px;
    }

    /* OTHER DIVISIONS BANNER */
    .divisions-banner {
      background: white; border-radius: var(--radius-md); border: 1px solid rgba(0,31,63,0.08);
      padding: 45px; box-shadow: var(--shadow-sm); margin-top: 60px;
    }
    .division-pill {
      display: inline-flex; align-items: center; gap: 10px;
      padding: 12px 20px; border-radius: 14px; background: var(--off-white);
      border: 1px solid rgba(0,0,0,0.06); font-weight: 700; font-size: 14px; color: var(--navy);
      transition: var(--transition); text-decoration: none;
    }
    .division-pill:hover { background: var(--navy); color: white; border-color: var(--navy); transform: translateY(-3px); }

    /* FOOTER */
    footer { background: #000814; color: rgba(255,255,255,0.7); padding: 60px 0 30px; font-size: 14px; }
    footer h5 { color: var(--white); font-family: var(--font-display); font-weight: 700; margin-bottom: 20px; }
    footer a { color: rgba(255,255,255,0.7); text-decoration: none; transition: var(--transition); }
    footer a:hover { color: var(--gold-light); }
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
          <i class="bi bi-arrow-left"></i> Retour à l'Accueil
        </a>
      </div>
    </div>
  </nav>

  <!-- HERO HEADER -->
  <section class="services-hero">
    <div class="hero-glow-bg"></div>
    <div class="hero-grid-pattern"></div>
    <div class="container relative z-1" data-aos="fade-up">
      <div class="hero-badge-pill">
        <i class="bi bi-stars"></i> Expertise & Ingénierie De Formation
      </div>
      <h1 class="hero-title">
        Des Services Sur-Mesure Pour<br>
        <span class="highlight">Propulser Vos Équipes</span>
      </h1>
      <p class="hero-subtitle">
        Le Comité Africain d'Expertise Internationale (CAEI) offre une suite complète de services à forte valeur ajoutée : Conseil en formation, Diagnostic organisationnel, Audit des compétences, Coaching de dirigeants et prise en charge logistique d'excellence.
      </p>

      <!-- STATS BANNER BAR -->
      <div class="hero-stats-bar" data-aos="fade-up" data-aos-delay="200">
        <div class="row g-4 align-items-center">
          <div class="col-6 col-md-3">
            <div class="stat-box">
              <div class="stat-icon"><i class="bi bi-globe-africa-west"></i></div>
              <div>
                <div class="stat-num">15+</div>
                <div class="stat-label">Pays Africains Couverts</div>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="stat-box">
              <div class="stat-icon"><i class="bi bi-building"></i></div>
              <div>
                <div class="stat-num">150+</div>
                <div class="stat-label">Entreprises Accompagnées</div>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="stat-box">
              <div class="stat-icon"><i class="bi bi-suitcase-lg-fill"></i></div>
              <div>
                <div class="stat-num">100%</div>
                <div class="stat-label">Prise en Charge Séjour</div>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="stat-box">
              <div class="stat-icon"><i class="bi bi-star-fill"></i></div>
              <div>
                <div class="stat-num">4.9/5</div>
                <div class="stat-label">Taux de Satisfaction</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FILTER TABS -->
  <div class="container filter-tabs-wrapper text-center">
    <div class="d-inline-flex flex-wrap justify-content-center gap-2 p-2 bg-white rounded-pill shadow-sm border">
      <button class="filter-tab-btn active" onclick="filterServices('all', this)">Tous les Services</button>
      <button class="filter-tab-btn" onclick="filterServices('conseil', this)">Conseil & Audit</button>
      <button class="filter-tab-btn" onclick="filterServices('coaching', this)">Coaching & Executive</button>
      <button class="filter-tab-btn" onclick="filterServices('sejour', this)">Pack Séjour International</button>
    </div>
  </div>

  <!-- MAIN SERVICES GRID -->
  <section class="services-section">
    <div class="container">

      <div class="row g-4 id-services-grid">
        <!-- Service 1: Conseil en Formation -->
        <div class="col-lg-4 col-md-6 service-item-card" data-category="conseil" data-aos="fade-up" data-aos-delay="100">
          <div class="service-card-modern">
            <span class="service-tag tag-gold"><i class="bi bi-patch-check-fill me-1"></i> Stratégique</span>
            <div class="service-icon-wrapper"><i class="bi bi-diagram-3-fill"></i></div>
            <h3 class="service-title-modern">Conseil en Formation</h3>
            <p class="service-desc-modern">
              Accompagnement sur-mesure dans la conception, l'ingénierie et la planification de plans de formation globale adaptés aux enjeux spécifiques de votre organisation.
            </p>
            <ul class="service-highlights-list">
              <li><i class="bi bi-check-circle-fill"></i> Elaboration du plan de formation</li>
              <li><i class="bi bi-check-circle-fill"></i> Choix des modules & formateurs</li>
              <li><i class="bi bi-check-circle-fill"></i> Optimisation des budgets</li>
            </ul>
            <button class="btn-action-glow" data-bs-toggle="modal" data-bs-target="#serviceModal" data-service-title="Conseil en Formation">
              <i class="bi bi-file-earmark-text-fill"></i> Demander une cotation
            </button>
          </div>
        </div>

        <!-- Service 2: Evaluation des Competences -->
        <div class="col-lg-4 col-md-6 service-item-card" data-category="conseil" data-aos="fade-up" data-aos-delay="200">
          <div class="service-card-modern">
            <span class="service-tag tag-navy"><i class="bi bi-bar-chart-fill me-1"></i> Performance</span>
            <div class="service-icon-wrapper"><i class="bi bi-clipboard2-pulse-fill"></i></div>
            <h3 class="service-title-modern">Évaluation des Compétences</h3>
            <p class="service-desc-modern">
              Audit précis des écarts de compétences, cartographie des métiers et mesure concrète du retour sur investissement (ROI) des sessions de formation exécutées.
            </p>
            <ul class="service-highlights-list">
              <li><i class="bi bi-check-circle-fill"></i> Bilan de compétences collaborateurs</li>
              <li><i class="bi bi-check-circle-fill"></i> Tests de positionnement amont/aval</li>
              <li><i class="bi bi-check-circle-fill"></i> Rapport d'impact exécutif</li>
            </ul>
            <button class="btn-action-glow" data-bs-toggle="modal" data-bs-target="#serviceModal" data-service-title="Évaluation des Compétences">
              <i class="bi bi-file-earmark-text-fill"></i> Demander une cotation
            </button>
          </div>
        </div>

        <!-- Service 3: Seminaires et Ateliers -->
        <div class="col-lg-4 col-md-6 service-item-card" data-category="conseil" data-aos="fade-up" data-aos-delay="300">
          <div class="service-card-modern">
            <span class="service-tag tag-blue"><i class="bi bi-calendar-event-fill me-1"></i> Événementiel</span>
            <div class="service-icon-wrapper"><i class="bi bi-people-fill"></i></div>
            <h3 class="service-title-modern">Séminaires & Ateliers</h3>
            <p class="service-desc-modern">
              Organisation clé en main de séminaires thématiques à forte valeur ajoutée, rassemblant des experts de renommée internationale pour échanger sur les meilleures pratiques.
            </p>
            <ul class="service-highlights-list">
              <li><i class="bi bi-check-circle-fill"></i> Thématiques métiers ciblées</li>
              <li><i class="bi bi-check-circle-fill"></i> Formateurs de classe internationale</li>
              <li><i class="bi bi-check-circle-fill"></i> Réseautage & B2B haut de gamme</li>
            </ul>
            <button class="btn-action-glow" data-bs-toggle="modal" data-bs-target="#serviceModal" data-service-title="Séminaires & Ateliers">
              <i class="bi bi-file-earmark-text-fill"></i> Demander une cotation
            </button>
          </div>
        </div>

        <!-- Service 4: Consulting -->
        <div class="col-lg-4 col-md-6 service-item-card" data-category="conseil" data-aos="fade-up" data-aos-delay="400">
          <div class="service-card-modern">
            <span class="service-tag tag-gold"><i class="bi bi-award-fill me-1"></i> Organisation</span>
            <div class="service-icon-wrapper"><i class="bi bi-briefcase-fill"></i></div>
            <h3 class="service-title-modern">Consulting & Transformation</h3>
            <p class="service-desc-modern">
              Accompagnement opérationnel : diagnostic institutionnel, conduite du changement, restructuration et optimisation des processus clés des entreprises et ministères.
            </p>
            <ul class="service-highlights-list">
              <li><i class="bi bi-check-circle-fill"></i> Diagnostic organisationnel</li>
              <li><i class="bi bi-check-circle-fill"></i> Re-engineering de processus</li>
              <li><i class="bi bi-check-circle-fill"></i> Conduite du changement</li>
            </ul>
            <button class="btn-action-glow" data-bs-toggle="modal" data-bs-target="#serviceModal" data-service-title="Consulting & Transformation">
              <i class="bi bi-file-earmark-text-fill"></i> Demander une cotation
            </button>
          </div>
        </div>

        <!-- Service 5: Coaching & Executive Mentoring -->
        <div class="col-lg-4 col-md-6 service-item-card" data-category="coaching" data-aos="fade-up" data-aos-delay="500">
          <div class="service-card-modern">
            <span class="service-tag tag-navy"><i class="bi bi-gem me-1"></i> Leadership</span>
            <div class="service-icon-wrapper"><i class="bi bi-person-badge-fill"></i></div>
            <h3 class="service-title-modern">Coaching & Executive Mentoring</h3>
            <p class="service-desc-modern">
              Programme individuel et confidentiel pour dirigeants et hauts cadres : renforcement du posture de leader, gestion du stress et de la décision stratégique.
            </p>
            <ul class="service-highlights-list">
              <li><i class="bi bi-check-circle-fill"></i> Coaching de comité de direction</li>
              <li><i class="bi bi-check-circle-fill"></i> Mentoring individuel VIP</li>
              <li><i class="bi bi-check-circle-fill"></i> Leadership & intelligence émotionnelle</li>
            </ul>
            <button class="btn-action-glow" data-bs-toggle="modal" data-bs-target="#serviceModal" data-service-title="Coaching & Executive Mentoring">
              <i class="bi bi-file-earmark-text-fill"></i> Demander une cotation
            </button>
          </div>
        </div>

        <!-- Service 6: Formations Sur Mesure -->
        <div class="col-lg-4 col-md-6 service-item-card" data-category="conseil" data-aos="fade-up" data-aos-delay="600">
          <div class="service-card-modern">
            <span class="service-tag tag-blue"><i class="bi bi-cpu-fill me-1"></i> Sur-Mesure</span>
            <div class="service-icon-wrapper"><i class="bi bi-sliders"></i></div>
            <h3 class="service-title-modern">Formations Intra-Entreprise</h3>
            <p class="service-desc-modern">
              Programmes conçus exclusivement selon les défis de votre secteur, dispensés soit dans vos locaux, soit dans nos centres d'excellence de Tunis ou en ligne.
            </p>
            <ul class="service-highlights-list">
              <li><i class="bi bi-check-circle-fill"></i> Cas pratiques réels d'entreprise</li>
              <li><i class="bi bi-check-circle-fill"></i> Emploi du temps flexible</li>
              <li><i class="bi bi-check-circle-fill"></i> Certifications d'expertise CAEI</li>
            </ul>
            <button class="btn-action-glow" data-bs-toggle="modal" data-bs-target="#serviceModal" data-service-title="Formations Sur Mesure">
              <i class="bi bi-file-earmark-text-fill"></i> Demander une cotation
            </button>
          </div>
        </div>
      </div>

      <!-- DIVISIONS SYNERGIE BANNER -->
      <div class="divisions-banner" data-aos="fade-up">
        <div class="row align-items-center g-4">
          <div class="col-lg-5">
            <span class="badge bg-gold text-dark px-3 py-1 rounded-pill font-bold mb-2">Pôles Spécialisés CAEI</span>
            <h3 class="font-display fw-bold text-navy fs-3 mb-2">Une Synergie Multi-Métiers</h3>
            <p class="text-muted fs-6 mb-0">Le CAEI opère à travers des divisions expertes dédiées à chaque secteur d'activité clé du continent.</p>
          </div>
          <div class="col-lg-7">
            <div class="d-flex flex-wrap gap-3 justify-content-lg-end">
              <a href="{{ route('medical.services') }}" class="division-pill">
                <i class="bi bi-heart-pulse-fill text-danger"></i> CAEI Medical Services
              </a>
              <a href="{{ route('digitalmoov') }}" class="division-pill">
                <i class="bi bi-lightning-charge-fill text-warning"></i> CAEI Digital Moov
              </a>
              <a href="{{ route('callcenter.index') }}" class="division-pill">
                <i class="bi bi-headset text-primary"></i> CAEI Call Center
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- PACK SEJOUR SECTION ULTRA LUXE -->
  <section class="pack-sejour-luxe" id="pack-sejour">
    <div class="pack-glow-bg"></div>
    <div class="container relative z-1">
      <div class="row align-items-center mb-5">
        <div class="col-lg-8" data-aos="fade-right">
          <span class="badge bg-warning text-dark px-3 py-2 rounded-pill font-bold mb-3 uppercase tracking-wider">
            <i class="bi bi-stars"></i> Service Inclus — Apprenants Internationaux
          </span>
          <h2 class="font-display fw-black text-white fs-1">
            Pack Séjour Clé en Main en Afrique
          </h2>
          <p class="text-white-50 fs-5 mt-2" style="max-width: 750px;">
            Pour chaque formation en présentiel à Tunis, le CAEI s'occupe de l'intégralité de vos formalités et de votre séjour pour que vous vous concentriez exclusivement sur votre apprentissage.
          </p>
        </div>
        <div class="col-lg-4 text-lg-end" data-aos="fade-left">
          <a href="{{ route('elite.training') }}#contact" class="btn btn-warning btn-lg fw-bold rounded-pill px-4 py-3 shadow-lg" style="background: linear-gradient(135deg, #f0b75a 0%, #ce9233 100%); border: none;">
            <i class="bi bi-check-circle-fill me-2"></i> Réserver Mon Séjour
          </a>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="pack-card-luxe">
            <div class="pack-icon-luxe"><i class="bi bi-passport"></i></div>
            <h4 class="h5 fw-bold text-white mb-2">Formalités & Visa</h4>
            <p class="text-white-50 fs-6 mb-0">Délivrance expresse de l'attestation officielle de stage et assistance personnalisée auprès des ambassades.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="pack-card-luxe">
            <div class="pack-icon-luxe"><i class="bi bi-airplane-fill"></i></div>
            <h4 class="h5 fw-bold text-white mb-2">Accueil & Transferts VIP</h4>
            <p class="text-white-50 fs-6 mb-0">Chauffeur privé à votre arrivée à l'aéroport et navettes quotidiennes hôtel / centre de formation.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="pack-card-luxe">
            <div class="pack-icon-luxe"><i class="bi bi-building-check"></i></div>
            <h4 class="h5 fw-bold text-white mb-2">Hébergement 4★ / 5★</h4>
            <p class="text-white-50 fs-6 mb-0">Hôtels sélectionnés pour leur grand confort, wifi haut débit, espaces de travail et restauration de qualité.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="pack-card-luxe">
            <div class="pack-icon-luxe"><i class="bi bi-compass-fill"></i></div>
            <h4 class="h5 fw-bold text-white mb-2">Excursions Culturelles</h4>
            <p class="text-white-50 fs-6 mb-0">Visites guidées des grands sites historiques et touristiques pour marier apprentissage et découverte.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="et-footer" style="background: #000c1a; color: rgba(255,255,255,0.7); padding: 60px 0 30px; font-size: 14px; border-top: 1px solid rgba(255,255,255,0.08);">
    <div class="container">
      <div class="row g-4 mb-5 text-start">
        <div class="col-lg-5">
          <div class="d-flex align-items-center gap-2 mb-3">
            <img src="{{ asset('assets/img/training1.png') }}" alt="Logo" style="height:38px; filter:brightness(0) invert(1);">
            <span style="font-family: 'Outfit', sans-serif; font-weight: 800; color: white; font-size: 19px;">CAEI <span style="color: #f0b75a;">ELITE TRAINING</span></span>
          </div>
          <p style="font-size: 13.5px; color: rgba(255,255,255,0.65); line-height: 1.7; max-width: 400px;">
            Comité Africain d'Expertise Internationale — Organisme d'excellence pour le renforcement des capacités et la gouvernance intellectuelle des cadres en Afrique.
          </p>
        </div>
        <div class="col-lg-3">
          <h5 style="color: white; font-family: 'Outfit', sans-serif; font-weight: 700; margin-bottom: 20px;">Navigation</h5>
          <ul class="list-unstyled d-flex flex-column gap-2" style="font-size: 13px;">
            <li><a href="{{ route('elite.training') }}" style="color: rgba(255,255,255,0.7); text-decoration: none;"><i class="bi bi-chevron-right me-1 text-warning"></i> Accueil Elite Training</a></li>
            <li><a href="{{ route('elite.services') }}" style="color: rgba(255,255,255,0.7); text-decoration: none;"><i class="bi bi-chevron-right me-1 text-warning"></i> Services & Offres</a></li>
            <li><a href="{{ route('elite.nos-cycles') }}" style="color: rgba(255,255,255,0.7); text-decoration: none;"><i class="bi bi-chevron-right me-1 text-warning"></i> Nos Cycles</a></li>
            <li><a href="{{ route('home.old') }}" style="color: rgba(255,255,255,0.7); text-decoration: none;"><i class="bi bi-chevron-right me-1 text-warning"></i> Nos Séminaires</a></li>
            <li><a href="{{ route('elite.training') }}#contact" style="color: rgba(255,255,255,0.7); text-decoration: none;"><i class="bi bi-chevron-right me-1 text-warning"></i> Contact & Inscription</a></li>
          </ul>
        </div>
        <div class="col-lg-4">
          <h5 style="color: white; font-family: 'Outfit', sans-serif; font-weight: 700; margin-bottom: 20px;">Coordonnées</h5>
          <p style="font-size: 13px; margin-bottom: 8px;"><i class="bi bi-geo-alt-fill text-warning me-2"></i> SIS 8 Rue Claude Bernard 1002 Belvédère-Tunis, Tunisie</p>
          <p style="font-size: 13px; margin-bottom: 8px;"><i class="bi bi-telephone-fill text-warning me-2"></i> +216 55 332 885</p>
          <p style="font-size: 13px; margin-bottom: 0;"><i class="bi bi-envelope-fill text-warning me-2"></i> contact@caei-afri.com</p>
        </div>
      </div>
      <div class="border-top border-secondary pt-3 text-center" style="font-size: 12px; color: rgba(255,255,255,0.45);">
        &copy; {{ date('Y') }} <a href="{{ route('elite.training') }}" style="color: #ce9233; text-decoration: none;">CAEI Elite Training</a>. Tous droits réservés. | <a href="{{ route('home') }}" style="color: rgba(255,255,255,0.4); text-decoration: none;">← Retour au portail</a>
      </div>
    </div>
  </footer>

  <!-- SERVICE REQUEST MODAL -->
  <div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
        <div class="modal-header text-white p-4 border-0" style="background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);">
          <div>
            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill font-bold mb-2">Demande de Cotation</span>
            <h5 class="modal-title font-display fw-bold text-white fs-4" id="serviceModalLabel">Demande de Service</h5>
          </div>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 p-md-5" style="background: #fdfdfd;">
          <form action="{{ route('elite.appointment.store') }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="service_request">
            <div class="row g-3">
              <!-- 1. Nom & Prénom -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-dark fs-6">Nom & Prénom <span class="text-danger">*</span></label>
                <input type="text" name="nom" class="form-control rounded-3 border-light-subtle shadow-sm" placeholder="Votre nom & prénom" required>
              </div>

              <!-- 2. Téléphone -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-dark fs-6">Téléphone <span class="text-danger">*</span></label>
                <input type="tel" name="telephone" class="form-control rounded-3 border-light-subtle shadow-sm" placeholder="+216 XX XXX XXX" required>
              </div>

              <!-- 3. Adresse e-mail -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-dark fs-6">Adresse e-mail <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control rounded-3 border-light-subtle shadow-sm" placeholder="votre@email.com" required>
              </div>

              <!-- 4. Pays -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-dark fs-6">Pays <span class="text-danger">*</span></label>
                <input type="text" name="pays" class="form-control rounded-3 border-light-subtle shadow-sm" placeholder="Ex: Tunisie, Côte d'Ivoire..." required>
              </div>

              <!-- 5. Fonction / Poste -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-dark fs-6">Fonction / Poste <span class="text-danger">*</span></label>
                <input type="text" name="poste" class="form-control rounded-3 border-light-subtle shadow-sm" placeholder="Ex: Directeur Financier..." required>
              </div>

              <!-- 6. Entreprise / Institution -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-dark fs-6">Entreprise / Institution <span class="text-danger">*</span></label>
                <input type="text" name="entreprise" class="form-control rounded-3 border-light-subtle shadow-sm" placeholder="Nom de votre entreprise" required>
              </div>

              <!-- 7. Formation ou séminaire choisi -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-dark fs-6">Formation ou séminaire choisi <span class="text-danger">*</span></label>
                <input type="text" name="objet" id="modalServiceInput" class="form-control rounded-3 border-light-subtle shadow-sm" placeholder="Intitulé de la formation" required>
              </div>

              <!-- 8. Date / Session souhaitée -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-dark fs-6">Date / Session souhaitée</label>
                <input type="text" name="date_session" class="form-control rounded-3 border-light-subtle shadow-sm" placeholder="Ex: Octobre 2026">
              </div>

              <!-- 9. Mode de participation -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-dark fs-6">Mode de participation <span class="text-danger">*</span></label>
                <select name="mode_participation" class="form-select rounded-3 border-light-subtle shadow-sm" required>
                  <option value="" disabled selected>-- Sélectionner un mode --</option>
                  <option value="présentiel">Présentiel</option>
                  <option value="en_ligne">En ligne</option>
                </select>
              </div>

              <!-- 10. Comment avez-vous connu cette formation ? -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-dark fs-6">Comment avez-vous connu cette formation ?</label>
                <select name="comment_connu" class="form-select rounded-3 border-light-subtle shadow-sm">
                  <option value="" disabled selected>-- Sélectionner une option --</option>
                  <option value="Réseaux sociaux">Réseaux sociaux (LinkedIn, Facebook...)</option>
                  <option value="Recommandation">Recommandation d'un collègue / ami</option>
                  <option value="Site web">Site web CAEI</option>
                  <option value="Emailing / Newsletter">Emailing / Newsletter</option>
                  <option value="Autre">Autre</option>
                </select>
              </div>

              <div class="col-12 pt-3">
                <button type="submit" class="btn btn-warning btn-lg w-100 fw-bold rounded-3 text-dark py-3 shadow" style="background: linear-gradient(135deg, #f0b75a 0%, #ce9233 100%); border: none;">
                  <i class="bi bi-send-fill me-2"></i> Transmettre Ma Demande
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 800, once: true });

    const serviceModal = document.getElementById('serviceModal');
    if (serviceModal) {
      serviceModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const serviceTitle = button.getAttribute('data-service-title');
        document.getElementById('modalServiceInput').value = serviceTitle;
      });
    }

    function filterServices(category, btnElement) {
      const buttons = document.querySelectorAll('.filter-tab-btn');
      buttons.forEach(btn => btn.classList.remove('active'));
      btnElement.classList.add('active');

      const items = document.querySelectorAll('.service-item-card');
      items.forEach(item => {
        if (category === 'all' || item.getAttribute('data-category') === category) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    }
  </script>
</body>
</html>
