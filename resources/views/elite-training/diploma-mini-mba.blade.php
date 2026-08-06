<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mini MBA — CAEI Elite Training</title>
  <meta name="description" content="Découvrez le programme Mini MBA de CAEI Elite Training : 9 spécialités de haut niveau pour booster votre carrière managériale.">

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
      background: linear-gradient(135deg, rgba(6,23,67,0.95) 0%, rgba(10,32,90,0.9) 100%), url('{{ asset("assets/img/professionel.jpg") }}') center/cover no-repeat;
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
      <span class="badge-gold mb-3 d-inline-block">Formation Diplômante — Cycle Court</span>
      <h1 class="display-4 font-display fw-bold text-white mb-3">Programme <span style="color: var(--gold-light);">Mini MBA</span></h1>
      <p class="lead text-slate-300 mx-auto" style="max-width: 800px;">
        Un programme condensé et intensif conçu pour les cadres et professionnels souhaitant acquérir l'essentiel du management et développer leurs compétences stratégiques.
      </p>
    </div>
  </header>

  <!-- DETAILS SECTION -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4 mb-5">
        <div class="col-lg-8" data-aos="fade-right">
          <h3 class="font-display fw-bold text-white mb-4">Présentation Générale</h3>
          <p class="text-slate-300 leading-relaxed">
            Le Mini MBA offert par le Comité Africain d’Expertise Internationale (CAEI) est une formation de haut niveau destinée aux gestionnaires, cadres supérieurs, entrepreneurs et professionnels souhaitant perfectionner leurs pratiques managériales en peu de temps.
          </p>
          <p class="text-slate-300 leading-relaxed mb-4">
            Ce programme intensif couvre l'ensemble des piliers de la gestion d'entreprise : stratégie, leadership, finance, marketing, opérations et ressources humaines. Il se compose de modules modulaires accessibles en présentiel ou à distance.
          </p>

          <h4 class="font-display fw-bold text-white mt-4 mb-3">Objectifs de la Formation</h4>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="p-3 rounded-4 bg-white/5 border border-white/10 d-flex gap-3 align-items-center">
                <i class="bi bi-check-circle-fill text-gold fs-4"></i>
                <span class="small text-slate-200">Maîtriser les principes clés de la gestion d'entreprise et de la stratégie.</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 rounded-4 bg-white/5 border border-white/10 d-flex gap-3 align-items-center">
                <i class="bi bi-check-circle-fill text-gold fs-4"></i>
                <span class="small text-slate-200">Renforcer les compétences en leadership et pilotage d'équipe.</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 rounded-4 bg-white/5 border border-white/10 d-flex gap-3 align-items-center">
                <i class="bi bi-check-circle-fill text-gold fs-4"></i>
                <span class="small text-slate-200">Comprendre les enjeux économiques et les transformations digitales.</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 rounded-4 bg-white/5 border border-white/10 d-flex gap-3 align-items-center">
                <i class="bi bi-check-circle-fill text-gold fs-4"></i>
                <span class="small text-slate-200">Obtenir une certification internationale valorisable sur le marché.</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4" data-aos="fade-left">
          <div class="bg-white/5 p-4 rounded-4 border border-white/10">
            <h5 class="font-display fw-bold text-white mb-4">Informations Clés</h5>
            <ul class="list-unstyled space-y-3 text-slate-300 small">
              <li class="d-flex justify-content-between border-b border-white/10 pb-2">
                <span>Durée du cycle :</span> <strong class="text-white">06 Mois</strong>
              </li>
              <li class="d-flex justify-content-between border-b border-white/10 pb-2">
                <span>Tarif du module :</span> <strong class="text-gold">2 800 €</strong>
              </li>
              <li class="d-flex justify-content-between border-b border-white/10 pb-2">
                <span>Format :</span> <strong class="text-white">Présentiel & En ligne</strong>
              </li>
              <li class="d-flex justify-content-between border-b border-white/10 pb-2">
                <span>Attestation :</span> <strong class="text-white">Certificat de Réussite CAEI</strong>
              </li>
            </ul>
            <a href="#inscription" class="btn-gold w-100 text-center d-block mt-4">Prendre Rendez-vous</a>
          </div>
        </div>
      </div>

      <!-- PROGRAMMES TABLE -->
      <div class="mt-5" data-aos="fade-up">
        <h3 class="font-display fw-bold text-white mb-4">Les 9 Spécialités Disponibles en Mini MBA</h3>
        <div class="row g-4">
          @php
            $miniMBAList = [
              ['code' => 'SM-001', 'title' => 'Management des Affaires Internationales & Projets Innovants', 'desc' => 'Développez les compétences pour piloter des projets à portée internationale et innovante.', 'duration' => '06 mois', 'price' => '2 800 €'],
              ['code' => 'SM-002', 'title' => 'Leadership et Management Opérationnel', 'desc' => 'Formez-vous aux techniques de leadership, gestion d’équipe et pilotage stratégique.', 'duration' => '06 mois', 'price' => '2 800 €'],
              ['code' => 'SM-003', 'title' => 'Management des Entreprises', 'desc' => 'Maîtrisez les outils de gestion pour piloter efficacement une entreprise moderne.', 'duration' => '06 mois', 'price' => '2 800 €'],
              ['code' => 'SM-004', 'title' => 'Digitalisation, Archivage & Préservation de la mémoire numérique', 'desc' => 'Spécialisez-vous dans les processus de digitalisation et préservation numérique.', 'duration' => '06 mois', 'price' => '2 800 €'],
              ['code' => 'SM-005', 'title' => 'Marketing Digital', 'desc' => 'Apprenez à concevoir, piloter et optimiser une stratégie digitale performante.', 'duration' => '06 mois', 'price' => '2 800 €'],
              ['code' => 'SM-006', 'title' => 'Ingénierie digitale pour la finance (Finance digital)', 'desc' => 'Maîtrisez les outils numériques appliqués au secteur financier moderne.', 'duration' => '06 mois', 'price' => '2 800 €'],
              ['code' => 'SM-007', 'title' => 'Ingénierie Financière - Stratégie & Risques', 'desc' => 'Analysez les risques financiers et mettez en place des stratégies robustes.', 'duration' => '06 mois', 'price' => '2 800 €'],
              ['code' => 'SM-008', 'title' => 'QHSE (Qualité Hygiène Sécurité Environnement)', 'desc' => 'Déployez une politique QHSE adaptée aux normes et exigences internationales.', 'duration' => '06 mois', 'price' => '2 800 €'],
              ['code' => 'SM-009', 'title' => 'RSSI & Stratégie de Sécurité des Systèmes d’Information', 'desc' => 'Formez-vous pour devenir Responsable de la Sécurité des Systèmes d\'Information.', 'duration' => '06 mois', 'price' => '2 800 €'],
            ];
          @endphp

          @foreach($miniMBAList as $item)
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
                  <a href="#inscription" onclick="setProgram('Mini MBA : {{ $item['title'] }}')" class="btn btn-outline-warning btn-sm rounded-pill font-bold px-3">S'inscrire</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <!-- INSCRIPTION FORM -->
      <div class="mt-5 pt-5" id="inscription" data-aos="fade-up">
        <div class="bg-white/5 p-4 p-md-5 rounded-4 border border-white/10 max-w-4xl mx-auto">
          <h3 class="font-display fw-bold text-white text-center mb-2">Prendre Rendez-vous pour le Mini MBA</h3>
          <p class="text-slate-300 text-center mb-4">Remplissez ce formulaire pour planifier un entretien ou vous inscrire à une spécialité du Mini MBA.</p>

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
                <input type="text" id="objetInput" name="objet" class="form-control et-form-control" value="Inscription Mini MBA" placeholder="Ex: Mini MBA - Marketing Digital">
              </div>
              <div class="col-12">
                <label class="form-label text-slate-300 small font-bold">Message / Questions</label>
                <textarea name="message" class="form-control et-form-control" rows="4" placeholder="Décrivez votre besoin..." required></textarea>
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
