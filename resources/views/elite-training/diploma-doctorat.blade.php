<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctorat & DBA — CAEI Elite Training</title>
  <meta name="description" content="Doctorate in Business Administration (DBA) et Doctorat de CAEI Elite Training pour chercheurs, dirigeants et hauts cadres.">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

  <!-- Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

  <style>
    :root {
      --primary: #061743;
      --primary-dark: #040e2b;
      --gold: #ce9233;
      --gold-light: #f2a90f;
      --bg-light: #f8fafc;
      --card-bg: #ffffff;
      --text-dark: #0f172a;
      --text-muted: #64748b;
      --border-color: #e2e8f0;
      --font-main: 'Plus Jakarta Sans', sans-serif;
      --font-display: 'Outfit', sans-serif;
    }
    body {
      font-family: var(--font-main);
      background-color: #f8fafc;
      background-image: 
        radial-gradient(at 10% 20%, rgba(6, 23, 67, 0.04) 0px, transparent 50%),
        radial-gradient(at 90% 80%, rgba(206, 146, 51, 0.06) 0px, transparent 50%),
        url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23061743' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
      color: var(--text-dark);
      line-height: 1.6;
    }

    /* Navbar Pro */
    .et-navbar {
      background: #061743 !important;
      box-shadow: 0 4px 25px rgba(0, 0, 0, 0.25);
      padding: 16px 0;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .nav-brand-title {
      font-family: var(--font-display);
      font-weight: 800;
      color: #ffffff !important;
      font-size: 1.25rem;
    }
    .nav-brand-title span {
      color: var(--gold-light) !important;
    }

    /* Hero Banner Pro */
    .hero-banner {
      background: linear-gradient(135deg, rgba(6, 23, 67, 0.9) 0%, rgba(10, 37, 105, 0.82) 100%), url('{{ asset("assets/img/professionel.jpg") }}') center/cover no-repeat;
      color: #ffffff;
      padding: 100px 0 80px;
      box-shadow: inset 0 -10px 30px rgba(0, 0, 0, 0.15);
    }
    .badge-program {
      background: rgba(242, 169, 15, 0.15);
      color: var(--gold-light);
      border: 1px solid rgba(242, 169, 15, 0.3);
      padding: 8px 20px;
      border-radius: 50px;
      font-weight: 700;
      font-size: 0.85rem;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }

    /* Buttons */
    .btn-gold {
      background: linear-gradient(135deg, #f2a90f 0%, #ce9233 100%);
      color: #061743 !important;
      font-weight: 800;
      padding: 12px 30px;
      border-radius: 50px;
      border: none;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      box-shadow: 0 4px 15px rgba(206, 146, 51, 0.25);
    }
    .btn-gold:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(206, 146, 51, 0.4);
      color: #061743 !important;
    }
    .btn-outline-pro {
      border: 1.5px solid rgba(255, 255, 255, 0.3);
      color: #ffffff !important;
      font-weight: 700;
      padding: 8px 20px;
      border-radius: 50px;
      transition: all 0.3s ease;
      background: rgba(255, 255, 255, 0.08);
      text-decoration: none;
    }
    .btn-outline-pro:hover {
      border-color: var(--gold-light);
      background: rgba(242, 169, 15, 0.15);
      color: var(--gold-light) !important;
    }

    /* Section titles */
    .section-title-pro {
      font-family: var(--font-display);
      font-weight: 800;
      color: var(--primary);
      position: relative;
      margin-bottom: 1.5rem;
    }
    .section-title-pro::after {
      content: '';
      display: block;
      width: 50px;
      height: 4px;
      background: var(--gold);
      margin-top: 8px;
      border-radius: 2px;
    }

    /* Cards */
    .info-card {
      background: #ffffff;
      border-radius: 20px;
      border: 1px solid var(--border-color);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
      padding: 32px;
    }
    .key-info-item {
      padding: 16px;
      background: #f8fafc;
      border-radius: 14px;
      border-left: 4px solid var(--gold);
      margin-bottom: 12px;
    }

    .feature-card {
      background: #ffffff;
      border: 1px solid var(--border-color);
      border-radius: 20px;
      padding: 30px;
      transition: all 0.3s ease;
      height: 100%;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
    }
    .feature-card:hover {
      transform: translateY(-5px);
      border-color: var(--gold);
      box-shadow: 0 15px 35px rgba(6, 23, 67, 0.08);
    }

    /* Form styling */
    .form-container {
      background: #ffffff;
      border-radius: 24px;
      border: 1px solid var(--border-color);
      box-shadow: 0 20px 40px rgba(6, 23, 67, 0.06);
      padding: 40px;
    }
    .pro-input {
      background: #f8fafc;
      border: 1px solid #cbd5e1;
      border-radius: 12px;
      padding: 12px 18px;
      color: var(--text-dark);
      font-size: 0.95rem;
      transition: all 0.2s ease;
    }
    .pro-input:focus {
      background: #ffffff;
      border-color: var(--primary);
      box-shadow: 0 0 0 4px rgba(6, 23, 67, 0.1);
      outline: none;
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg sticky-top et-navbar">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('elite.training') }}">
        <img src="{{ asset('assets/img/elite_training_logo.png') }}" alt="CAEI Elite Training" height="48" style="object-fit: contain;">
        <span class="nav-brand-title">CAEI <span>ELITE TRAINING</span></span>
      </a>
      <div class="d-flex align-items-center gap-3">
        <a href="{{ route('elite.training') }}" class="btn-outline-pro btn-sm">← Retour aux Formations</a>
        <a href="#inscription" class="btn-gold btn-sm">Postuler au DBA</a>
      </div>
    </div>
  </nav>

  <!-- HERO BANNER -->
  <header class="hero-banner">
    <div class="container text-center" data-aos="fade-up">
      <span class="badge-program mb-3 d-inline-block">Sommet Académique & Recherche Appliquée</span>
      <h1 class="display-4 font-display fw-bold text-white mb-3">Doctorat & <span style="color: var(--gold-light);">DBA</span></h1>
      <p class="lead text-white-50 mx-auto" style="max-width: 800px;">
        Le Doctorate in Business Administration (DBA) est un programme de doctorat professionnel destiné aux dirigeants et consultants souhaitant développer une expertise de recherche appliquée de très haut niveau.
      </p>
    </div>
  </header>

  <!-- CONTENT SECTION -->
  <section class="py-5">
    <div class="container">
      
      <!-- APERÇU ET ADMISSION -->
      <div class="row g-4 mb-5">
        <div class="col-lg-7" data-aos="fade-right">
          <div class="info-card h-100">
            <h3 class="section-title-pro">Présentation du Programme DBA</h3>
            <p class="text-slate-600 mb-3">
              Le Doctorate in Business Administration (DBA) est un programme doctoral d’excellence destiné aux cadres dirigeants, entrepreneurs et consultants souhaitant approfondir leurs connaissances en gestion d’entreprise et produire des travaux de recherche novateurs.
            </p>
            <p class="text-slate-600 mb-4">
              Accessible en ligne et en format hybride, ce programme permet de concilier vie professionnelle et études doctorales, avec un encadrement personnalisé assuré par des professeurs universitaires habilités et des chercheurs de renommée internationale.
            </p>

            <h5 class="fw-bold text-[#061743] mb-3"><i class="bi bi-mortarboard-fill text-gold me-2"></i>Objectifs du Programme</h5>
            <div class="row g-3">
              <div class="col-md-6">
                <div class="d-flex gap-2.5 align-items-start">
                  <i class="bi bi-check-circle-fill text-success fs-5"></i>
                  <span class="small text-slate-700">Approfondir la recherche appliquée en management stratégique.</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex gap-2.5 align-items-start">
                  <i class="bi bi-check-circle-fill text-success fs-5"></i>
                  <span class="small text-slate-700">Développer des compétences en publication scientifique.</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex gap-2.5 align-items-start">
                  <i class="bi bi-check-circle-fill text-success fs-5"></i>
                  <span class="small text-slate-700">Préparer aux postes de haut conseil et direction générale.</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex gap-2.5 align-items-start">
                  <i class="bi bi-check-circle-fill text-success fs-5"></i>
                  <span class="small text-slate-700">Apporter des solutions innovantes aux enjeux d'entreprise.</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-5" data-aos="fade-left">
          <div class="info-card h-100 bg-white">
            <h4 class="section-title-pro">Procédures d'Admission</h4>
            
            <div class="key-info-item">
              <div class="text-xs font-bold text-slate-500 uppercase">Diplômes Requis</div>
              <div class="text-sm font-bold text-[#061743]">Master, MBA, EMBA ou Bac+3 (avec min. 5 ans d'expérience)</div>
            </div>

            <div class="key-info-item">
              <div class="text-xs font-bold text-slate-500 uppercase">Expérience Exigée</div>
              <div class="text-sm font-bold text-[#061743]">Middle / Top Management ou Conseil</div>
            </div>

            <div class="key-info-item mb-0">
              <div class="text-xs font-bold text-slate-500 uppercase">Dossier de Candidature</div>
              <div class="text-sm font-bold text-[#061743]">CV + Lettre de motivation + Projet de thèse</div>
            </div>
          </div>
        </div>
      </div>

      <!-- ATOUTS DU DBA -->
      <div class="my-5" data-aos="fade-up">
        <h3 class="section-title-pro text-center mx-auto mb-4">Les Atouts Majeurs du DBA CAEI</h3>
        <p class="text-center text-slate-500 mb-5 max-w-2xl mx-auto">Un accompagnement scientifique et professionnel de premier ordre pour votre réussite académique.</p>

        <div class="row g-4">
          <div class="col-md-6 col-lg-4">
            <div class="feature-card">
              <div class="fs-2 text-amber-600 mb-3"><i class="bi bi-lightbulb-fill"></i></div>
              <h5 class="fw-bold text-[#061743] mb-2">Recherche Pratique & Réelle</h5>
              <p class="text-slate-500 small mb-0">Travailler sur des problématiques managériales concrètes directement rencontrées au sein de votre entreprise ou secteur.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="feature-card">
              <div class="fs-2 text-amber-600 mb-3"><i class="bi bi-person-workspace"></i></div>
              <h5 class="fw-bold text-[#061743] mb-2">Encadrement Personnalisé</h5>
              <p class="text-slate-500 small mb-0">Un suivi individuel par un directeur de thèse réputé et un accès au réseau international de chercheurs partenaires.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="feature-card">
              <div class="fs-2 text-amber-600 mb-3"><i class="bi bi-journal-text"></i></div>
              <h5 class="fw-bold text-[#061743] mb-2">Publications Scientifiques</h5>
              <p class="text-slate-500 small mb-0">Développement de compétences en rédaction, conceptualisation et opportunité de publier dans des revues académiques internationales.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- FORMULAIRE DE CANDIDATURE -->
      <div class="mt-5 pt-4" id="inscription" data-aos="fade-up">
        <div class="form-container max-w-4xl mx-auto">
          <div class="text-center mb-4">
            <span class="badge bg-amber-100 text-amber-800 font-bold px-3 py-1 rounded-pill uppercase text-xs">Doctorat & DBA</span>
            <h3 class="section-title-pro text-center mx-auto mt-2">Dossier de Candidature — DBA</h3>
            <p class="text-slate-500">Soumettez votre projet de recherche et votre profil pour évaluation par le conseil académique.</p>
          </div>

          @if(session('success'))
            <div class="alert alert-success bg-emerald-50 text-emerald-800 border border-emerald-200 rounded-4 p-3 mb-4 text-center font-bold">
              <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            </div>
          @endif

          <form action="{{ route('elite.appointment.store') }}" method="POST" id="contactForm">
            @csrf
            <input type="hidden" name="type" value="inscription">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label font-bold text-slate-700 small">Nom & Prénom <span class="text-danger">*</span></label>
                <input type="text" name="nom" class="form-control pro-input" placeholder="Votre nom complet" required>
              </div>
              <div class="col-md-6">
                <label class="form-label font-bold text-slate-700 small">Email professionnel <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control pro-input" placeholder="votre@email.com" required>
              </div>
              <div class="col-md-6">
                <label class="form-label font-bold text-slate-700 small">Téléphone</label>
                <input type="text" name="mobile" class="form-control pro-input" placeholder="+216 XX XXX XXX">
              </div>
              <div class="col-md-6">
                <label class="form-label font-bold text-slate-700 small">Programme sélectionné</label>
                <input type="text" id="objetInput" name="objet" class="form-control pro-input bg-white font-bold text-[#061743]" value="Candidature Doctorat / DBA" readonly>
              </div>
              <div class="col-12">
                <label class="form-label font-bold text-slate-700 small">Sujet / Projet de recherche proposé <span class="text-danger">*</span></label>
                <textarea name="message" class="form-control pro-input" rows="4" placeholder="Décrivez votre parcours académique/professionnel et votre domaine de recherche souhaité..." required></textarea>
              </div>
              <div class="col-12 text-center mt-4">
                <button type="submit" class="btn-gold px-5 py-3 border-0">
                  <i class="bi bi-check2-circle me-2 fs-5"></i>Soumettre ma Candidature
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>

  <!-- FOOTER PRO -->
  <footer class="py-4 bg-white border-top text-center text-slate-500 small mt-5">
    <div class="container">
      <p class="mb-0">© {{ date('Y') }} CAEI Elite Training. Tous droits réservés. | <a href="{{ route('elite.training') }}" class="text-amber-600 font-bold">Retour au portail Elite Training</a></p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    if (typeof AOS !== 'undefined') {
      AOS.init({ duration: 700, once: true });
    }
  </script>
  <x-intl-tel-input />
</body>
</html>
