<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Programme, Diplômes & Certifications — CAEI Elite Training</title>
  <meta name="description" content="Découvrez le programme complet et toutes les formations disponibles chez CAEI Elite Training : Diplômes (Mini MBA, Executive MBA, Doctorat), Certifications et Formations Sur-Mesure.">
  <meta name="keywords" content="CAEI, Elite Training, Programme Formations, Catalogue Formations, MBA, Doctorat, Certifications, Afrique">

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

    /* PROGRAMME HERO */
    .programme-hero {
      position: relative;
      padding: 140px 0 70px;
      background: linear-gradient(135deg, #000f3c 0%, #001f3f 40%, #002a5c 80%, #001030 100%);
      color: var(--white);
      overflow: hidden;
    }

    .programme-hero-bg {
      position: absolute; inset: 0;
      background: 
        radial-gradient(ellipse 70% 50% at 20% 40%, rgba(206, 146, 51, 0.18) 0%, transparent 70%),
        radial-gradient(ellipse 50% 70% at 80% 20%, rgba(0, 120, 255, 0.15) 0%, transparent 70%);
      pointer-events: none;
    }

    .hero-badge {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 8px 18px; border-radius: 50px;
      background: rgba(206, 146, 51, 0.15); border: 1px solid rgba(206, 146, 51, 0.3);
      color: var(--gold-light); font-size: 13px; font-weight: 600; margin-bottom: 20px;
    }

    .hero-title {
      font-family: var(--font-display); font-size: 42px; font-weight: 900;
      line-height: 1.15; margin-bottom: 20px;
    }
    .hero-title .highlight {
      background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 100%);
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    }

    .hero-subtitle {
      font-size: 16px; color: rgba(255, 255, 255, 0.8); max-width: 760px; line-height: 1.7;
    }

    /* SECTION TITLES */
    .section-label {
      display: inline-block; padding: 6px 16px; border-radius: 50px;
      background: rgba(206,146,51,0.12); color: var(--gold-dark);
      font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px;
      margin-bottom: 12px;
    }

    .section-title {
      font-family: var(--font-display); font-weight: 800; font-size: 34px; color: var(--navy);
    }
    .section-title .accent { color: var(--gold); }

    .section-subtitle {
      color: var(--gray); font-size: 15px; max-width: 600px; margin: 0 auto;
    }

    /* ===== FEATURES CARDS (QUATRE VOIES VERS L'EXCELLENCE) ===== */
    .et-features {
      padding: 80px 0;
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
      top: 0; left: 0; right: 0; height: 4px;
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
      width: 80px; height: 80px; border-radius: 20px;
      background: rgba(206,146,51,0.1); color: var(--gold); font-size: 32px;
      display: flex; align-items: center; justify-content: center;
      margin: 0 auto 24px; transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .feature-card h5 {
      font-family: var(--font-display); font-weight: 700; font-size: 18px;
      color: var(--navy); margin-bottom: 12px;
    }

    .feature-card p {
      color: var(--gray); font-size: 14px; line-height: 1.6; flex-grow: 1;
    }

    .feature-link {
      display: inline-flex; align-items: center; gap: 6px;
      color: var(--gold); font-weight: 600; font-size: 14px;
      text-decoration: none; margin-top: 20px; transition: var(--transition);
    }

    .feature-link:hover { color: var(--gold-dark); gap: 10px; }

    /* ===== DIPLOMAS SECTION ===== */
    .et-diplomas {
      padding: 90px 0;
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
      display: flex; flex-direction: column;
    }
    .diploma-card:hover {
      box-shadow: var(--shadow-lg); transform: translateY(-8px);
    }
    .diploma-card-img {
      height: 200px; overflow: hidden; position: relative;
    }
    .diploma-card-img img {
      width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease;
    }
    .diploma-card:hover .diploma-card-img img { transform: scale(1.08); }
    .diploma-card-img .card-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(to top, rgba(0,31,63,0.7) 0%, transparent 60%);
    }
    .diploma-badge {
      position: absolute; top: 16px; right: 16px;
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      color: var(--navy); font-size: 11px; font-weight: 800; padding: 5px 12px;
      border-radius: 50px; text-transform: uppercase; letter-spacing: 0.5px;
    }
    .diploma-card-body {
      padding: 28px; flex-grow: 1; display: flex; flex-direction: column;
    }
    .diploma-card-body h5 {
      font-family: var(--font-display); font-weight: 800; font-size: 20px;
      color: var(--navy); margin-bottom: 12px;
    }
    .diploma-card-body p {
      color: var(--gray); font-size: 14px; line-height: 1.6; flex-grow: 1;
    }
    .diploma-card-footer {
      padding: 20px 28px; border-top: 1px solid #eef0f5;
    }
    .btn-discover {
      display: inline-flex; align-items: center; gap: 8px;
      background: var(--navy); color: var(--white); font-weight: 600; font-size: 14px;
      padding: 12px 24px; border-radius: 50px; text-decoration: none; transition: var(--transition);
    }
    .btn-discover:hover {
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      color: var(--navy); transform: translateX(4px);
    }

    /* ===== CERTIFICATIONS SECTION ===== */
    .et-certifications {
      padding: 90px 0;
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.93) 0%, rgba(248, 249, 252, 0.95) 100%), url('{{ asset("assets/img/company.jpg") }}') center/cover no-repeat fixed;
      position: relative;
    }
    .cert-card {
      background: var(--white); border: 2px solid #eef0f5; border-radius: var(--radius-sm);
      overflow: hidden; transition: var(--transition); height: 100%; display: flex; flex-direction: column;
    }
    .cert-card:hover {
      border-color: var(--gold); box-shadow: 0 12px 40px rgba(206,146,51,0.15); transform: translateY(-6px);
    }
    .cert-card-img { height: 160px; overflow: hidden; }
    .cert-card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
    .cert-card:hover .cert-card-img img { transform: scale(1.1); }
    .cert-card-body { padding: 20px; flex-grow: 1; display: flex; flex-direction: column; }
    .cert-card-body h6 {
      font-family: var(--font-display); font-weight: 700; font-size: 15px; color: var(--navy); margin-bottom: 8px;
    }
    .cert-card-body p { font-size: 13px; color: var(--gray); line-height: 1.5; flex-grow: 1; }
    .cert-card-link { font-size: 13px; font-weight: 700; color: var(--gold); display: flex; align-items: center; gap: 4px; margin-top: 10px; }

    /* FORMATION CARDS GRID */
    .formation-card {
      background: var(--white); border-radius: var(--radius-md); border: 1px solid rgba(0, 31, 63, 0.08);
      padding: 24px; height: 100%; display: flex; flex-direction: column; justify-content: space-between;
      transition: var(--transition); position: relative;
    }
    .formation-card:hover {
      transform: translateY(-5px); box-shadow: var(--shadow-md); border-color: rgba(206, 146, 51, 0.4);
    }

    .formation-badge {
      display: inline-block; padding: 4px 10px; border-radius: 50px;
      font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;
    }
    .badge-certifiante { background: rgba(206, 146, 51, 0.15); color: var(--gold-dark); }
    .badge-diplomante { background: rgba(0, 31, 63, 0.1); color: var(--navy); }
    .badge-sur_mesure { background: rgba(16, 185, 129, 0.15); color: #047857; }
    .badge-elearning { background: rgba(59, 130, 246, 0.15); color: #1d4ed8; }

    .formation-code { font-family: monospace; font-weight: 700; font-size: 12px; color: var(--gray); }
    .formation-title { font-family: var(--font-display); font-size: 18px; font-weight: 700; color: var(--navy); line-height: 1.35; margin: 12px 0 10px; }
    .formation-domain { font-size: 12px; font-weight: 600; color: var(--gold-dark); margin-bottom: 12px; display: flex; align-items: center; gap: 6px; }
    .formation-desc { font-size: 13.5px; color: #64748b; line-height: 1.6; margin-bottom: 18px; }

    .formation-meta {
      display: flex; align-items: center; justify-content: space-between;
      padding-top: 14px; border-top: 1px solid #f1f5f9; font-size: 12px; color: var(--gray);
    }
    .formation-meta i { color: var(--gold); }

    .btn-card-action {
      display: inline-flex; align-items: center; justify-content: center; gap: 6px;
      padding: 10px 16px; border-radius: 50px; font-size: 13px; font-weight: 700;
      text-decoration: none; transition: var(--transition); border: none; width: 100%;
    }
    .btn-card-gold { background: linear-gradient(135deg, var(--gold), var(--gold-dark)); color: white; }
    .btn-card-gold:hover { background: var(--navy); color: var(--gold-light); }

    /* MODAL */
    .modal-content { border-radius: var(--radius-md); border: none; overflow: hidden; }
    .modal-header { background: var(--navy); color: white; border: none; padding: 20px 24px; }
    .modal-title { font-family: var(--font-display); font-weight: 700; }
  </style>
</head>

<body>

  <!-- NAVBAR -->
  <nav class="et-navbar">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="{{ route('elite.training') }}" class="nav-brand">
        <img src="{{ asset('assets/img/training1.png') }}" alt="CAEI Elite Training">
        <span>CAEI <em>ELITE TRAINING</em></span>
      </a>

      <div class="d-flex align-items-center gap-3">
        <a href="{{ asset('assets/img/catalogue CAEI GROUP.pdf') }}" target="_blank" class="btn-back d-none d-md-inline-flex" style="background: rgba(206,146,51,0.2); border-color: var(--gold-light); color: var(--gold-light);">
          <i class="bi bi-file-earmark-pdf-fill"></i> Catalogue PDF
        </a>
        <a href="{{ route('elite.training') }}" class="btn-back">
          <i class="bi bi-arrow-left"></i> Accueil Elite Training
        </a>
      </div>
    </div>
  </nav>

  <!-- HERO HEADER -->
  <header class="programme-hero">
    <div class="programme-hero-bg"></div>
    <div class="container relative z-1" data-aos="fade-up">
      <div class="hero-badge">
        <i class="bi bi-journal-bookmark-fill"></i> Programme & Catalogue des Formations 2026
      </div>
      <h1 class="hero-title">
        Toutes les Formations <br>
        <span class="highlight">CAEI Elite Training</span>
      </h1>
      <p class="hero-subtitle">
        Explorez notre offre complète de formations certifiantes, diplômantes (MBA/Doctorat), parcours Sur-Mesure et E-Learning conçus pour les cadres et dirigeants d'Afrique.
      </p>
    </div>
  </header>

  <!-- ===== NOS TYPES DE FORMATION (QUATRE VOIES VERS L'EXCELLENCE) ===== -->
  <section class="et-features" id="types-formation">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <span class="section-label">Nos Types de Formation</span>
        <h2 class="section-title mb-3">Quatre Voies <span class="accent">Vers l'Excellence</span></h2>
        <p class="section-subtitle">Des parcours variés pour répondre à tous les besoins professionnels</p>
      </div>

      <div class="row g-4">
        <!-- Formation Diplômante -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="bi bi-mortarboard-fill"></i>
            </div>
            <h5>Formation Diplômante</h5>
            <p>Obtenez un diplôme reconnu internationalement (Mini MBA, Executive MBA, DBA Doctorat) pour propulser votre parcours.</p>
            <a href="#diplomes" class="feature-link">
              Découvrir <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- Formation Certifiante -->
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

        <!-- Formation Sur Mesure -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="bi bi-sliders"></i>
            </div>
            <h5>Formation Sur Mesure</h5>
            <p>Des parcours personnalisés adaptés aux besoins spécifiques de votre entreprise ou de votre secteur d'activité.</p>
            <a href="#inscriptionModal" data-bs-toggle="modal" data-formation-title="Formation Sur Mesure" class="feature-link">
              Nous contacter <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- Formation en Ligne -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="bi bi-laptop-fill"></i>
            </div>
            <h5>Formation en Ligne</h5>
            <p>Suivez vos cours à distance avec flexibilité grâce à notre plateforme numérique interactive et moderne.</p>
            <a href="#catalogue-section" class="feature-link">
              S'inscrire <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== DIPLOMAS SECTION ===== -->
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
              <h5>Doctorat (DBA)</h5>
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

  <!-- ===== CERTIFICATIONS SECTION ===== -->
  <section class="et-certifications" id="certifications">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <span class="section-label">Certifications</span>
        <h2 class="section-title mb-3">Nos Certifications <span class="accent">Professionnelles</span></h2>
        <p class="section-subtitle">Domaines d'expertise spécialisés pour propulser votre carrière vers l'excellence</p>
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

  <!-- MAIN CATALOGUE CONTAINER -->
  <main class="py-5" id="catalogue-section">
    <div class="container">

      <!-- SECTION HEADER -->
      <div class="text-center mb-5" data-aos="fade-up">
        <span class="section-label">Catalogue Officiel</span>
        <h2 class="section-title mb-3">Catalogue des <span class="accent">Formations Disponibles</span></h2>
        <p class="section-subtitle">Retrouvez ci-dessous l'ensemble des formations d'excellence proposées par le CAEI.</p>
      </div>

      <!-- FORMATIONS CARDS GRID -->
      @if($allFormations->count() > 0)
        <div class="row g-4">
          @foreach($allFormations as $f)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 6) * 50 }}">
              <div class="formation-card">
                <div>
                  <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="formation-badge badge-{{ $f->type ?? 'certifiante' }}">
                      {{ ucfirst(str_replace('_', ' ', $f->type ?? 'certifiante')) }}
                    </span>
                    <span class="formation-code">{{ $f->code ?? 'CAEI-'.sprintf('%03d', $f->id) }}</span>
                  </div>

                  <h5 class="formation-title">{{ $f->title }}</h5>

                  @if($f->domain)
                    <div class="formation-domain">
                      <i class="bi bi-bookmark-fill"></i> {{ $f->domain }}
                    </div>
                  @endif

                  <p class="formation-desc">
                    {{ Str::limit($f->description ?? $f->objectives ?? 'Programme de formation professionnelle d\'excellence dispensé par les experts du CAEI.', 120) }}
                  </p>
                </div>

                <div>
                  <div class="formation-meta mb-3">
                    <span><i class="bi bi-clock me-1"></i> {{ $f->duration ?? '5 Jours' }}</span>
                    <span><i class="bi bi-geo-alt me-1"></i> {{ $f->location ?? 'Présentiel / En Ligne' }}</span>
                    @if($f->price)
                      <span class="fw-bold text-dark"><i class="bi bi-tag me-1"></i> {{ number_format($f->price, 0, ',', ' ') }} €</span>
                    @endif
                  </div>

                  <button type="button" class="btn-card-action btn-card-gold" data-bs-toggle="modal" data-bs-target="#inscriptionModal" data-formation-title="{{ $f->title }}" data-formation-code="{{ $f->code ?? 'CAEI-'.$f->id }}">
                    <i class="bi bi-pencil-square"></i> S'inscrire
                  </button>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <!-- EMPTY STATE FALLBACK -->
        <div class="text-center py-5 my-5 bg-white rounded-4 shadow-sm p-5" data-aos="fade-up">
          <i class="bi bi-journal-x text-warning display-3 mb-3 d-block"></i>
          <h4 class="fw-bold text-navy mb-2">Aucune formation disponible</h4>
          <p class="text-muted max-w-md mx-auto mb-4">Consultez nos autres rubriques ou contactez-nous directement pour vos besoins en formation.</p>
        </div>
      @endif

    </div>
  </main>

  <!-- MODAL INSCRIPTION & APPOINTMENT -->
  <div class="modal fade" id="inscriptionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-white">Demande d'Inscription</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body p-4">
          <form action="{{ route('elite.appointment.store') }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="inscription">
            <input type="hidden" name="formation_title" id="modalFormationTitle">

            <div class="row g-3">
              <div class="col-12">
                <label class="form-label font-semibold text-dark small mb-1">Formation / Séminaire choisi</label>
                <input type="text" id="modalFormationDisplay" name="subject" class="form-control bg-light fw-bold text-navy" readonly>
              </div>

              <!-- 1. Nom & Prénom -->
              <div class="col-md-6">
                <label class="form-label font-semibold text-dark small mb-1">Nom & Prénom *</label>
                <input type="text" name="name" class="form-control" required placeholder="Votre nom complet">
              </div>

              <!-- 2. Téléphone / WhatsApp -->
              <div class="col-md-6">
                <label class="form-label font-semibold text-dark small mb-1">Téléphone / WhatsApp *</label>
                <input type="tel" name="phone" class="form-control" required placeholder="+216 XX XXX XXX">
              </div>

              <!-- 3. Adresse e-mail -->
              <div class="col-md-6">
                <label class="form-label font-semibold text-dark small mb-1">Adresse e-mail *</label>
                <input type="email" name="email" class="form-control" required placeholder="votre@email.com">
              </div>

              <!-- 4. Pays -->
              <div class="col-md-6">
                <label class="form-label font-semibold text-dark small mb-1">Pays *</label>
                <input type="text" name="country" class="form-control" required placeholder="Ex: Tunisie, Sénégal, Côte d'Ivoire...">
              </div>

              <!-- 5. Fonction / Poste -->
              <div class="col-md-6">
                <label class="form-label font-semibold text-dark small mb-1">Fonction / Poste *</label>
                <input type="text" name="job_title" class="form-control" required placeholder="Ex: Chef de Projet, Directeur...">
              </div>

              <!-- 6. Entreprise / Institution -->
              <div class="col-md-6">
                <label class="form-label font-semibold text-dark small mb-1">Entreprise / Institution *</label>
                <input type="text" name="company" class="form-control" required placeholder="Nom de votre entreprise">
              </div>

              <!-- 7. Date / Session souhaitée -->
              <div class="col-md-6">
                <label class="form-label font-semibold text-dark small mb-1">Date / Session souhaitée</label>
                <input type="text" name="session_date" class="form-control" placeholder="Ex: Octobre 2026 / Prochaine session">
              </div>

              <!-- 8. Mode de participation -->
              <div class="col-md-6">
                <label class="form-label font-semibold text-dark small mb-1">Mode de participation *</label>
                <select name="participation_mode" class="form-select" required>
                  <option value="" disabled selected>-- Sélectionnez un mode --</option>
                  <option value="présentiel">Présentiel</option>
                  <option value="en_ligne">En ligne</option>
                </select>
              </div>

              <!-- 9. Comment avez-vous connu cette formation ? -->
              <div class="col-12">
                <label class="form-label font-semibold text-dark small mb-1">Comment avez-vous connu cette formation ?</label>
                <select name="source" class="form-select">
                  <option value="" disabled selected>-- Sélectionnez une option --</option>
                  <option value="Réseaux sociaux">Réseaux sociaux (LinkedIn, Facebook...)</option>
                  <option value="Recommandation">Recommandation d'un collègue / ami</option>
                  <option value="Site web">Site web CAEI</option>
                  <option value="Emailing / Newsletter">Emailing / Newsletter</option>
                  <option value="Autre">Autre</option>
                </select>
              </div>

              <div class="col-12 mt-3">
                <button type="submit" class="btn text-white w-100 py-3 rounded-pill fw-bold" style="background: linear-gradient(135deg, var(--gold), var(--gold-dark));">
                  Envoyer ma demande d'inscription
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="bg-navy text-white pt-5 pb-4 mt-5" style="background: #001026; border-top: 1px solid rgba(255,255,255,0.1);">
    <div class="container">
      <div class="row g-4 mb-4">
        <div class="col-lg-4">
          <div class="d-flex align-items-center gap-2 mb-3">
            <img src="{{ asset('assets/img/training1.png') }}" alt="Logo" height="40">
            <span class="font-display fw-bold text-white fs-5">CAEI ELITE TRAINING</span>
          </div>
          <p class="text-white-50 small">Le Comité Africain d'Expertise Internationale forme les cadres, experts et dirigeants africains de demain.</p>
        </div>
        <div class="col-lg-4 text-center">
          <h6 class="text-gold font-bold mb-3">NAVIGATION</h6>
          <div class="d-flex justify-content-center gap-3 text-white-50 small">
            <a href="{{ route('elite.training') }}" class="text-white-50 text-decoration-none">Accueil</a>
            <a href="{{ route('elite.programme') }}" class="text-white-50 text-decoration-none">Programme</a>
            <a href="{{ route('elite.services') }}" class="text-white-50 text-decoration-none">Services</a>
            <a href="{{ route('elite.nos-cycles') }}" class="text-white-50 text-decoration-none">Cycles</a>
          </div>
        </div>
        <div class="col-lg-4 text-lg-end">
          <h6 class="text-gold font-bold mb-3">CONTACT</h6>
          <p class="text-white-50 small mb-1"><i class="bi bi-envelope me-2"></i> contact@caei-afri.com</p>
          <p class="text-white-50 small"><i class="bi bi-telephone me-2"></i> +216 55 335 286</p>
        </div>
      </div>
      <div class="text-center pt-3 border-top border-secondary text-white-50 small">
        &copy; {{ date('Y') }} CAEI Elite Training. Tous droits réservés.
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 800, once: true });

    // Modal data population
    const inscriptionModal = document.getElementById('inscriptionModal');
    if (inscriptionModal) {
      inscriptionModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const formationTitle = button.getAttribute('data-formation-title') || 'Formation';
        const formationCode = button.getAttribute('data-formation-code') || '';
        
        document.getElementById('modalFormationTitle').value = formationCode + ' - ' + formationTitle;
        document.getElementById('modalFormationDisplay').value = formationCode + ' — ' + formationTitle;
      });
    }
  </script>
</body>
</html>
