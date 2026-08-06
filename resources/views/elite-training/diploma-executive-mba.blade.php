<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Executive MBA — CAEI Elite Training</title>
  <meta name="description" content="Programme Executive MBA de CAEI Elite Training : 6 spécialités pour dirigeants, managers et cadres supérieurs.">

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
      background: linear-gradient(135deg, rgba(6,23,67,0.95) 0%, rgba(10,32,90,0.9) 100%), url('{{ asset("assets/img/img3.jpg") }}') center/cover no-repeat;
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
    .program-card {
      background: var(--bg-card);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 20px;
      padding: 28px;
      transition: all 0.3s ease;
      height: 100%;
    }
    .program-card:hover {
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
        <a href="#inscription" class="btn-gold btn-sm px-4">S'inscrire</a>
      </div>
    </div>
  </nav>

  <!-- HERO BANNER -->
  <header class="hero-banner">
    <div class="container text-center" data-aos="fade-up">
      <span class="badge-gold mb-3 d-inline-block">Formation Diplômante — Haute Direction</span>
      <h1 class="display-4 font-display fw-bold text-white mb-3">Programme <span style="color: var(--gold-light);">Executive MBA</span></h1>
      <p class="lead text-slate-300 mx-auto" style="max-width: 800px;">
        L'Master of Business Administration d'Excellence pour cadres supérieurs et dirigeants souhaitant renforcer leurs compétences en leadership et prise de décision stratégique.
      </p>
    </div>
  </header>

  <!-- DETAILS SECTION -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4 mb-5">
        <div class="col-lg-8" data-aos="fade-right">
          <h3 class="font-display fw-bold text-white mb-4">Présentation de l'Executive MBA</h3>
          <p class="text-slate-300 leading-relaxed">
            L'Executive MBA (EMBA) est un programme de formation continue d'excellence proposé par le CAEI en partenariat avec plusieurs universités internationales de renom. Il est destiné aux dirigeants et hauts responsables qui ambitionnent d'acquérir une vision globale et holistique des affaires.
          </p>
          <p class="text-slate-300 leading-relaxed mb-4">
            La durée du programme est de 12 à 18 mois, alternant des sessions en présentiel, en distanciel et des séminaires d'immersion dans plusieurs villes d'Afrique et à l'international.
          </p>

          <h4 class="font-display fw-bold text-white mt-4 mb-3">Objectifs Stratégiques</h4>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="p-3 rounded-4 bg-white/5 border border-white/10 d-flex gap-3 align-items-center">
                <i class="bi bi-check-circle-fill text-gold fs-4"></i>
                <span class="small text-slate-200">Acquérir une compréhension approfondie de la gestion stratégique internationale.</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 rounded-4 bg-white/5 border border-white/10 d-flex gap-3 align-items-center">
                <i class="bi bi-check-circle-fill text-gold fs-4"></i>
                <span class="small text-slate-200">Développer des compétences avancées en leadership et négociation de haut niveau.</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 rounded-4 bg-white/5 border border-white/10 d-flex gap-3 align-items-center">
                <i class="bi bi-check-circle-fill text-gold fs-4"></i>
                <span class="small text-slate-200">Maîtriser les outils analytiques pour anticiper et piloter les risques majeurs.</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 rounded-4 bg-white/5 border border-white/10 d-flex gap-3 align-items-center">
                <i class="bi bi-check-circle-fill text-gold fs-4"></i>
                <span class="small text-slate-200">Constituer un réseau d'affaires stratégique et influent à l'échelle panafricaine.</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4" data-aos="fade-left">
          <div class="bg-white/5 p-4 rounded-4 border border-white/10">
            <h5 class="font-display fw-bold text-white mb-4">Informations Clés</h5>
            <ul class="list-unstyled space-y-3 text-slate-300 small">
              <li class="d-flex justify-content-between border-b border-white/10 pb-2">
                <span>Durée du programme :</span> <strong class="text-white">12 Mois</strong>
              </li>
              <li class="d-flex justify-content-between border-b border-white/10 pb-2">
                <span>Tarif par spécialité :</span> <strong class="text-gold">5 200 €</strong>
              </li>
              <li class="d-flex justify-content-between border-b border-white/10 pb-2">
                <span>Public cible :</span> <strong class="text-white">Cadres Dirigeants</strong>
              </li>
              <li class="d-flex justify-content-between border-b border-white/10 pb-2">
                <span>Diplôme :</span> <strong class="text-white">Master EMBA International</strong>
              </li>
            </ul>
            <a href="#inscription" class="btn-gold w-100 text-center d-block mt-4">Prendre Rendez-vous</a>
          </div>
        </div>
      </div>

      <!-- PROGRAMMES TABLE -->
      <div class="mt-5" data-aos="fade-up">
        <h3 class="font-display fw-bold text-white mb-4">Les 6 Spécialités d'Executive MBA</h3>
        <div class="row g-4">
          @php
            $embaList = [
              ['code' => 'SEM-001', 'title' => 'EMBA : Management des Affaires Internationales & Projets Innovants', 'desc' => 'Acquérez des compétences en pilotage de projets innovants et en gestion stratégique à l’échelle internationale.', 'duration' => '12 mois', 'price' => '5 200 €'],
              ['code' => 'SEM-002', 'title' => 'EMBA : Gouvernance Publique, Relations Internationales & Diplomatie', 'desc' => 'Développez vos compétences en gestion des affaires publiques, diplomatie et stratégies de coopération internationale.', 'duration' => '12 mois', 'price' => '5 200 €'],
              ['code' => 'SEM-003', 'title' => 'EMBA : Sécurité et Défense Internationale', 'desc' => 'Analysez les enjeux stratégiques mondiaux, les politiques de sécurité et les dispositifs de défense à l’échelle internationale.', 'duration' => '12 mois', 'price' => '5 200 €'],
              ['code' => 'SEM-004', 'title' => 'EMBA : Science Politique', 'desc' => 'Développez une compréhension approfondie des institutions, des enjeux géopolitiques et des stratégies politiques modernes.', 'duration' => '12 mois', 'price' => '5 200 €'],
              ['code' => 'SEM-005', 'title' => 'EMBA : Ingénierie Financière – Stratégie de Gestion & Risques', 'desc' => 'Maîtrisez les outils de l’ingénierie financière pour optimiser la stratégie de gestion et anticiper les risques financiers.', 'duration' => '12 mois', 'price' => '5 200 €'],
              ['code' => 'SEM-006', 'title' => 'MBA : Audit et Contrôle de Gestion', 'desc' => 'Développez des compétences avancées en audit interne, contrôle budgétaire et analyse de performance pour piloter efficacement les organisations.', 'duration' => '12 mois', 'price' => '5 200 €'],
            ];
          @endphp

          @foreach($embaList as $item)
            <div class="col-md-6 col-lg-4">
              <div class="program-card d-flex flex-column justify-content-between">
                <div>
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge bg-amber-500/20 text-gold border border-amber-500/30 px-3 py-1 font-mono fw-bold">{{ $item['code'] }}</span>
                    <span class="text-slate-400 small"><i class="bi bi-clock me-1"></i>{{ $item['duration'] }}</span>
                  </div>
                  <h5 class="fw-bold text-white mb-2">{{ $item['title'] }}</h5>
                  <p class="text-slate-300 small mb-4">{{ $item['desc'] }}</p>
                </div>
                <div class="pt-3 border-t border-white/10 d-flex justify-content-between align-items-center">
                  <span class="fs-5 fw-bold text-gold font-mono">{{ $item['price'] }}</span>
                  <a href="#inscription" onclick="setProgram('Executive MBA : {{ $item['title'] }}')" class="btn btn-outline-warning btn-sm rounded-pill font-bold px-3">S'inscrire</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <!-- INSCRIPTION FORM -->
      <div class="mt-5 pt-5" id="inscription" data-aos="fade-up">
        <div class="bg-white/5 p-4 p-md-5 rounded-4 border border-white/10 max-w-4xl mx-auto">
          <h3 class="font-display fw-bold text-white text-center mb-2">Prendre Rendez-vous pour l'Executive MBA</h3>
          <p class="text-slate-300 text-center mb-4">Remplissez ce formulaire pour planifier un entretien ou vous inscrire à un programme d'Executive MBA.</p>

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
                <label class="form-label text-slate-300 small font-bold">Objet / Programme choisi</label>
                <input type="text" id="objetInput" name="objet" class="form-control et-form-control" value="Inscription Executive MBA" placeholder="Ex: EMBA - Management des Affaires Internationales">
              </div>
              <div class="col-12">
                <label class="form-label text-slate-300 small font-bold">Message / Questions</label>
                <textarea name="message" class="form-control et-form-control" rows="4" placeholder="Décrivez votre projet professionnel..." required></textarea>
              </div>
              <div class="col-12 text-center mt-4">
                <button type="submit" class="btn-gold px-5 py-3 border-0">
                  <i class="bi bi-send-fill me-2"></i>Envoyer ma demande
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

    function setProgram(title) {
      document.getElementById('objetInput').value = title;
      document.getElementById('inscription').scrollIntoView({ behavior: 'smooth' });
    }
  </script>
</body>
</html>
