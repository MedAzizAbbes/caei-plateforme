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
      --bg-primary: #061743;
      --bg-card: #0a205a;
      --gold-primary: #ce9233;
      --gold-light: #f2a90f;
      --text-muted: #94a3b8;
      --font-main: 'Plus Jakarta Sans', sans-serif;
      --font-display: 'Outfit', sans-serif;
    }
    body {
      font-family: var(--font-main);
      background-color: var(--bg-primary);
      color: #ffffff;
    }
    .et-navbar {
      background: rgba(6, 23, 67, 0.95);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .hero-banner {
      background: linear-gradient(135deg, rgba(6,23,67,0.95) 0%, rgba(10,32,90,0.9) 100%), url('{{ asset("assets/img/img2.jpg") }}') center/cover no-repeat;
      padding: 100px 0 60px;
    }
    .badge-gold {
      background: rgba(242, 169, 15, 0.15);
      color: var(--gold-light);
      border: 1px solid rgba(242, 169, 15, 0.3);
      padding: 6px 16px;
      border-radius: 50px;
      font-size: 13px;
      font-weight: 700;
      text-transform: uppercase;
    }
    .btn-gold {
      background: linear-gradient(135deg, #f2a90f 0%, #ce9233 100%);
      color: #061743;
      font-weight: 800;
      padding: 12px 28px;
      border-radius: 50px;
      transition: all 0.3s ease;
      border: none;
      text-decoration: none;
    }
    .btn-gold:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(242, 169, 15, 0.4);
      color: #061743;
    }
    .feature-card {
      background: var(--bg-card);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 20px;
      padding: 28px;
      transition: all 0.3s ease;
      height: 100%;
    }
    .feature-card:hover {
      border-color: var(--gold-light);
      transform: translateY(-5px);
    }
    .et-form-control {
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(255,255,255,0.15);
      color: #ffffff !important;
      border-radius: 12px;
      padding: 12px 16px;
    }
    .et-form-control:focus {
      background: rgba(255,255,255,0.1);
      border-color: var(--gold-light);
      box-shadow: none;
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg sticky-top et-navbar">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('elite.training') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Logo CAEI" height="40">
        <span class="fw-bold text-white font-display fs-5">CAEI <span style="color: var(--gold-light);">ELITE TRAINING</span></span>
      </a>
      <div class="d-flex align-items-center gap-3">
        <a href="{{ route('elite.training') }}" class="btn btn-outline-light btn-sm rounded-pill px-3">← Retour aux Formations</a>
        <a href="#inscription" class="btn-gold btn-sm px-4">Postuler au DBA</a>
      </div>
    </div>
  </nav>

  <!-- HERO BANNER -->
  <header class="hero-banner">
    <div class="container text-center" data-aos="fade-up">
      <span class="badge-gold mb-3 d-inline-block">Sommet Académique & Recherche Appliquée</span>
      <h1 class="display-4 font-display fw-bold text-white mb-3">Doctorat & <span style="color: var(--gold-light);">DBA</span></h1>
      <p class="lead text-slate-300 mx-auto" style="max-width: 800px;">
        Le Doctorate in Business Administration (DBA) est un programme de doctorat professionnel destiné aux dirigeants et consultants souhaitant développer une expertise de recherche appliquée de très haut niveau.
      </p>
    </div>
  </header>

  <!-- DETAILS SECTION -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4 mb-5">
        <div class="col-lg-8" data-aos="fade-right">
          <h3 class="font-display fw-bold text-white mb-4">Présentation du Programme DBA</h3>
          <p class="text-slate-300 leading-relaxed">
            Le Doctorate in Business Administration (DBA) est un programme doctoral d’excellence destiné aux cadres dirigeants, entrepreneurs et consultants souhaitant approfondir leurs connaissances en gestion d’entreprise et produire des travaux de recherche novateurs.
          </p>
          <p class="text-slate-300 leading-relaxed mb-4">
            Accessible en ligne et en format hybride, ce programme permet de concilier vie professionnelle et études doctorales, avec un encadrement personnalisé assuré par des professeurs universitaires habilités et des chercheurs de renommée internationale.
          </p>

          <h4 class="font-display fw-bold text-white mt-4 mb-3">Objectifs du Programme</h4>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="p-3 rounded-4 bg-white/5 border border-white/10 d-flex gap-3 align-items-center">
                <i class="bi bi-mortarboard-fill text-gold fs-4"></i>
                <span class="small text-slate-200">Approfondir les connaissances en management stratégique et leadership.</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 rounded-4 bg-white/5 border border-white/10 d-flex gap-3 align-items-center">
                <i class="bi bi-mortarboard-fill text-gold fs-4"></i>
                <span class="small text-slate-200">Développer des compétences avancées en recherche appliquée en gestion.</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 rounded-4 bg-white/5 border border-white/10 d-flex gap-3 align-items-center">
                <i class="bi bi-mortarboard-fill text-gold fs-4"></i>
                <span class="small text-slate-200">Préparer les étudiants à des postes de direction de très haut niveau.</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 rounded-4 bg-white/5 border border-white/10 d-flex gap-3 align-items-center">
                <i class="bi bi-mortarboard-fill text-gold fs-4"></i>
                <span class="small text-slate-200">Encourager l’innovation et la résolution de problématiques complexes.</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4" data-aos="fade-left">
          <div class="bg-white/5 p-4 rounded-4 border border-white/10">
            <h5 class="font-display fw-bold text-white mb-4">Procédures d'Admission</h5>
            <div class="mb-3">
              <span class="text-gold font-bold small text-uppercase">Critères requis :</span>
              <ul class="list-unstyled space-y-2 text-slate-300 small mt-2">
                <li><i class="bi bi-check2 text-gold me-2"></i>Titulaire d’un Master, MBA ou EMBA.</li>
                <li><i class="bi bi-check2 text-gold me-2"></i>Ou diplôme Bac+3 avec min. 5 ans d’expérience professionnelle.</li>
                <li><i class="bi bi-check2 text-gold me-2"></i>Expérience dans le middle ou top management.</li>
              </ul>
            </div>
            <div class="border-t border-white/10 pt-3">
              <span class="text-gold font-bold small text-uppercase">Dossier de candidature :</span>
              <ul class="list-unstyled space-y-1 text-slate-300 small mt-2 mb-0">
                <li>• CV actualisé</li>
                <li>• Lettre de motivation</li>
                <li>• Projet de recherche / Thèse</li>
              </ul>
            </div>
            <a href="#inscription" class="btn-gold w-100 text-center d-block mt-4">Déposer ma Candidature</a>
          </div>
        </div>
      </div>

      <!-- ATOUTS DU DBA -->
      <div class="mt-5" data-aos="fade-up">
        <h3 class="font-display fw-bold text-white mb-4 text-center">Les Atouts Majeurs du DBA CAEI</h3>
        <div class="row g-4">
          <div class="col-md-6 col-lg-4">
            <div class="feature-card">
              <div class="fs-2 text-gold mb-3"><i class="bi bi-lightbulb-fill"></i></div>
              <h5 class="fw-bold text-white mb-2">Recherche Pratique & Réelle</h5>
              <p class="text-slate-300 small mb-0">Travailler sur des problématiques managériales concrètes directement rencontrées au sein de votre entreprise ou secteur.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="feature-card">
              <div class="fs-2 text-gold mb-3"><i class="bi bi-person-workspace"></i></div>
              <h5 class="fw-bold text-white mb-2">Encadrement Personnalisé</h5>
              <p class="text-slate-300 small mb-0">Un suivi individuel par un directeur de thèse réputé et un accès au réseau international de chercheurs partenaires.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="feature-card">
              <div class="fs-2 text-gold mb-3"><i class="bi bi-journal-text"></i></div>
              <h5 class="fw-bold text-white mb-2">Publications Scientifiques</h5>
              <p class="text-slate-300 small mb-0">Développement de compétences en rédaction, conceptualisation et opportunité de publier dans des revues académiques internationales.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- INSCRIPTION FORM -->
      <div class="mt-5 pt-5" id="inscription" data-aos="fade-up">
        <div class="bg-white/5 p-4 p-md-5 rounded-4 border border-white/10 max-w-4xl mx-auto">
          <h3 class="font-display fw-bold text-white text-center mb-2">Candidature au Doctorat / DBA</h3>
          <p class="text-slate-300 text-center mb-4">Remplissez ce formulaire pour postuler ou prendre rendez-vous avec le responsable du programme doctoral.</p>

          @if(session('success'))
            <div class="alert alert-success bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 rounded-4 p-3 mb-4 text-center font-bold">
              <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            </div>
          @endif

          <form action="{{ route('elite.appointment.store') }}" method="POST" id="contactForm">
            @csrf
            <input type="hidden" name="type" value="inscription">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label text-slate-300 small font-bold">Nom & Prénom</label>
                <input type="text" name="nom" class="form-control et-form-control" placeholder="Votre nom complet" required>
              </div>
              <div class="col-md-6">
                <label class="form-label text-slate-300 small font-bold">Email</label>
                <input type="email" name="email" class="form-control et-form-control" placeholder="votre@email.com" required>
              </div>
              <div class="col-md-6">
                <label class="form-label text-slate-300 small font-bold">Téléphone</label>
                <input type="text" name="mobile" class="form-control et-form-control" placeholder="+216 XX XXX XXX">
              </div>
              <div class="col-md-6">
                <label class="form-label text-slate-300 small font-bold">Objet / Programme</label>
                <input type="text" id="objetInput" name="objet" class="form-control et-form-control" value="Candidature Doctorat / DBA" readonly>
              </div>
              <div class="col-12">
                <label class="form-label text-slate-300 small font-bold">Projet de recherche / Message</label>
                <textarea name="message" class="form-control et-form-control" rows="4" placeholder="Présentez brièvement votre parcours et votre sujet de recherche..." required></textarea>
              </div>
              <div class="col-12 text-center mt-4">
                <button type="submit" class="btn-gold px-5 py-3 border-0">
                  <i class="bi bi-send-fill me-2"></i>Soumettre ma candidature
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="py-4 border-t border-white/10 text-center text-slate-400 small">
    <p class="mb-0">© {{ date('Y') }} CAEI Elite Training. Tous droits réservés. | <a href="{{ route('elite.training') }}" class="text-gold">Accueil Elite Training</a></p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 700, once: true });
  </script>
</body>
</html>
