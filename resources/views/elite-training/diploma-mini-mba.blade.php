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

    .program-card {
      background: #ffffff;
      border: 1px solid var(--border-color);
      border-radius: 20px;
      padding: 28px;
      transition: all 0.3s ease;
      height: 100%;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .program-card:hover {
      transform: translateY(-5px);
      border-color: var(--gold);
      box-shadow: 0 15px 35px rgba(6, 23, 67, 0.08);
    }
    .code-badge {
      background: rgba(6, 23, 67, 0.06);
      color: var(--primary);
      font-weight: 800;
      font-family: monospace;
      padding: 6px 14px;
      border-radius: 8px;
      font-size: 0.85rem;
      border: 1px solid rgba(6, 23, 67, 0.1);
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
        <a href="{{ route('elite.training') }}" class="btn-outline-pro btn-sm">← Accueil</a>
        <a href="#inscription" class="btn-gold btn-sm">S'inscrire</a>
      </div>
    </div>
  </nav>

  <!-- HERO BANNER -->
  <header class="hero-banner">
    <div class="container text-center" data-aos="fade-up">
      <span class="badge-program mb-3 d-inline-block">Cycle Court Diplômant</span>
      <h1 class="display-4 font-display fw-bold text-white mb-3">Programme <span style="color: var(--gold-light);">Mini MBA</span></h1>
      <p class="lead text-white-50 mx-auto" style="max-width: 800px;">
        Un parcours intensif et condensé de 6 mois conçu pour les cadres, managers et professionnels souhaitant maîtriser l'essentiel de la gestion d'entreprise.
      </p>
    </div>
  </header>

  <!-- CONTENT SECTION -->
  <section class="py-5">
    <div class="container">
      
      <!-- APERÇU ET POINTS CLÉS -->
      <div class="row g-4 mb-5">
        <div class="col-lg-7" data-aos="fade-right">
          <div class="info-card h-100">
            <h3 class="section-title-pro">Présentation du Programme</h3>
            <p class="text-slate-600 mb-3">
              Le Mini MBA offert par le Comité Africain d’Expertise Internationale (CAEI) est une formation de haut niveau centrée sur la pratique et l'apprentissage applicatif.
            </p>
            <p class="text-slate-600 mb-4">
              Organisé sur plusieurs semaines intensives, ce programme couvre l'ensemble des piliers managériaux : stratégie d'entreprise, leadership, gestion financière, marketing digital, opérations et ressources humaines.
            </p>

            <h5 class="fw-bold text-[#061743] mb-3"><i class="bi bi-bullseye text-gold me-2"></i>Objectifs Clés</h5>
            <div class="row g-3">
              <div class="col-md-6">
                <div class="d-flex gap-2.5 align-items-start">
                  <i class="bi bi-check-circle-fill text-success fs-5"></i>
                  <span class="small text-slate-700">Maîtriser les principes de comptabilité, finance, marketing & stratégie.</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex gap-2.5 align-items-start">
                  <i class="bi bi-check-circle-fill text-success fs-5"></i>
                  <span class="small text-slate-700">Renforcer vos capacités de leadership et la conduite du changement.</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex gap-2.5 align-items-start">
                  <i class="bi bi-check-circle-fill text-success fs-5"></i>
                  <span class="small text-slate-700">Prendre des décisions stratégiques fondées sur l'analyse des données.</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex gap-2.5 align-items-start">
                  <i class="bi bi-check-circle-fill text-success fs-5"></i>
                  <span class="small text-slate-700">Obtenir une certification internationale délivrée par le CAEI.</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-5" data-aos="fade-left">
          <div class="info-card h-100 bg-white">
            <h4 class="section-title-pro">Modalités de la Formation</h4>
            
            <div class="key-info-item">
              <div class="text-xs font-bold text-slate-500 uppercase">Durée de la formation</div>
              <div class="text-lg font-bold text-[#061743]">06 Mois par spécialité</div>
            </div>

            <div class="key-info-item">
              <div class="text-xs font-bold text-slate-500 uppercase">Tarif par module</div>
              <div class="text-lg font-bold text-amber-600">2 800 €</div>
            </div>

            <div class="key-info-item">
              <div class="text-xs font-bold text-slate-500 uppercase">Format & Flexibilité</div>
              <div class="text-lg font-bold text-[#061743]">Présentiel & E-Learning interactif</div>
            </div>

            <div class="key-info-item mb-0">
              <div class="text-xs font-bold text-slate-500 uppercase">Diplôme Délivré</div>
              <div class="text-lg font-bold text-[#061743]">Certificat de Réussite CAEI Panafricain</div>
            </div>
          </div>
        </div>
      </div>

      <!-- PROGRAMMES ET SPÉCIALITÉS -->
      <div class="my-5" data-aos="fade-up">
        <h3 class="section-title-pro text-center mx-auto mb-4">Les 9 Spécialités Officielles du Mini MBA</h3>
        <p class="text-center text-slate-500 mb-5 max-w-2xl mx-auto">Sélectionnez la spécialité qui correspond le mieux à vos objectifs professionnels et inscrivez-vous en un clic.</p>

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
              <div class="program-card">
                <div>
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="code-badge">{{ $item['code'] }}</span>
                    <span class="text-slate-500 small"><i class="bi bi-clock me-1"></i>{{ $item['duration'] }}</span>
                  </div>
                  <h5 class="fw-bold text-[#061743] mb-2">{{ $item['title'] }}</h5>
                  <p class="text-slate-500 small mb-4">{{ $item['desc'] }}</p>
                </div>
                <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                  <span class="fs-5 fw-bold text-amber-600">{{ $item['price'] }}</span>
                  <a href="#inscription" onclick="setProgram('Mini MBA : {{ $item['title'] }}')" class="btn-gold btn-sm py-2 px-3 fs-7">
                    S'inscrire <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <!-- FORMULAIRE D'INSCRIPTION -->
      <div class="mt-5 pt-4" id="inscription" data-aos="fade-up">
        <div class="form-container max-w-4xl mx-auto">
          <div class="text-center mb-4">
            <span class="badge bg-amber-100 text-amber-800 font-bold px-3 py-1 rounded-pill uppercase text-xs">Inscription en ligne</span>
            <h3 class="section-title-pro text-center mx-auto mt-2">Formulaire d'Inscription — Mini MBA</h3>
            <p class="text-slate-500">Remplissez vos coordonnés ci-dessous pour transmettre votre candidature d'inscription à l'administration.</p>
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
              <!-- 1. Nom & Prénom -->
              <div class="col-md-6">
                <label class="form-label font-bold text-slate-700 small">Nom & Prénom <span class="text-danger">*</span></label>
                <input type="text" name="nom" class="form-control pro-input" placeholder="Votre nom & prénom" required>
              </div>

              <!-- 2. Téléphone -->
              <div class="col-md-6">
                <label class="form-label font-bold text-slate-700 small">Téléphone <span class="text-danger">*</span></label>
                <input type="tel" name="telephone" class="form-control pro-input" placeholder="+216 XX XXX XXX" required>
              </div>

              <!-- 3. Adresse e-mail -->
              <div class="col-md-6">
                <label class="form-label font-bold text-slate-700 small">Adresse e-mail <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control pro-input" placeholder="votre@email.com" required>
              </div>

              <!-- 4. Pays -->
              <div class="col-md-6">
                <label class="form-label font-bold text-slate-700 small">Pays <span class="text-danger">*</span></label>
                <input type="text" name="pays" class="form-control pro-input" placeholder="Ex: Tunisie, Côte d'Ivoire..." required>
              </div>

              <!-- 5. Fonction / Poste -->
              <div class="col-md-6">
                <label class="form-label font-bold text-slate-700 small">Fonction / Poste <span class="text-danger">*</span></label>
                <input type="text" name="poste" class="form-control pro-input" placeholder="Ex: Directeur Financier..." required>
              </div>

              <!-- 6. Entreprise / Institution -->
              <div class="col-md-6">
                <label class="form-label font-bold text-slate-700 small">Entreprise / Institution <span class="text-danger">*</span></label>
                <input type="text" name="entreprise" class="form-control pro-input" placeholder="Nom de votre entreprise" required>
              </div>

              <!-- 7. Formation ou séminaire choisi -->
              <div class="col-md-6">
                <label class="form-label font-bold text-slate-700 small">Formation ou séminaire choisi <span class="text-danger">*</span></label>
                <input type="text" id="objetInput" name="objet" class="form-control pro-input" value="Inscription Mini MBA" placeholder="Intitulé de la formation" required>
              </div>

              <!-- 8. Date / Session souhaitée -->
              <div class="col-md-6">
                <label class="form-label font-bold text-slate-700 small">Date / Session souhaitée</label>
                <input type="text" name="date_session" class="form-control pro-input" placeholder="Ex: Octobre 2026">
              </div>

              <!-- 9. Mode de participation -->
              <div class="col-md-6">
                <label class="form-label font-bold text-slate-700 small">Mode de participation <span class="text-danger">*</span></label>
                <select name="mode_participation" class="form-control pro-input" required>
                  <option value="" disabled selected>-- Sélectionner un mode --</option>
                  <option value="présentiel">Présentiel</option>
                  <option value="en_ligne">En ligne</option>
                </select>
              </div>

              <!-- 10. Comment avez-vous connu cette formation ? -->
              <div class="col-md-6">
                <label class="form-label font-bold text-slate-700 small">Comment avez-vous connu cette formation ?</label>
                <select name="comment_connu" class="form-control pro-input">
                  <option value="" disabled selected>-- Sélectionner une option --</option>
                  <option value="Réseaux sociaux">Réseaux sociaux (LinkedIn, Facebook...)</option>
                  <option value="Recommandation">Recommandation d'un collègue / ami</option>
                  <option value="Site web">Site web CAEI</option>
                  <option value="Emailing / Newsletter">Emailing / Newsletter</option>
                  <option value="Autre">Autre</option>
                </select>
              </div>

              <div class="col-12 text-center mt-4">
                <button type="submit" class="btn-gold px-5 py-3 border-0">
                  <i class="bi bi-check2-circle me-2 fs-5"></i>Valider mon Inscription
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

    function setProgram(title) {
      document.getElementById('objetInput').value = title;
      document.getElementById('inscription').scrollIntoView({ behavior: 'smooth' });
    }
  </script>
  <x-intl-tel-input />
</body>
</html>
