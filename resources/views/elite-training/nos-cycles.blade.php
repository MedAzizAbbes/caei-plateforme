<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Nos Cycles & Séminaires — CAEI Elite Training</title>
  <meta name="description" content="Découvrez nos cycles de perfectionnement et séminaires professionnels de longue et courte durée conçus pour les cadres et dirigeants africains.">

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
      padding: 8px 18px; border-radius: 50px; border: 1px solid rgba(255,255,255,0.2);
      transition: var(--transition);
    }
    .btn-back:hover {
      color: var(--navy); background: var(--gold-light); border-color: var(--gold-light);
    }

    /* HERO HEADER */
    .cycles-hero {
      position: relative;
      padding: 150px 0 80px;
      background: linear-gradient(135deg, #0f172a 0%, #1e293b 40%, #334155 80%, #0f172a 100%);
      color: var(--white);
      overflow: hidden;
    }

    .cycles-hero-bg {
      position: absolute; inset: 0;
      background: 
        radial-gradient(ellipse 70% 50% at 20% 40%, rgba(206, 146, 51, 0.18) 0%, transparent 70%),
        radial-gradient(ellipse 50% 70% at 80% 20%, rgba(0, 120, 255, 0.15) 0%, transparent 70%);
      pointer-events: none;
    }

    .hero-badge {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 6px 16px; border-radius: 50px;
      background: rgba(206, 146, 51, 0.15); border: 1px solid rgba(206, 146, 51, 0.4);
      color: var(--gold-light); font-size: 13px; font-weight: 600; margin-bottom: 20px;
    }

    .hero-title {
      font-family: var(--font-display); font-size: 42px; font-weight: 800; line-height: 1.2; margin-bottom: 16px;
    }
    .hero-title .highlight {
      background: linear-gradient(135deg, #f0b75a 0%, #ce9233 100%);
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    }

    .hero-subtitle {
      font-size: 16px; color: rgba(255,255,255,0.8); max-width: 850px; line-height: 1.7; margin-bottom: 0;
    }

    /* CARDS SECTION */
    .cycles-section {
      padding: 70px 0 100px;
    }

    .cycle-card {
      background: var(--white);
      border-radius: var(--radius-md);
      border: 1px solid rgba(0,0,0,0.06);
      padding: 30px;
      height: 100%;
      display: flex;
      flex-direction: column;
      box-shadow: var(--shadow-sm);
      transition: var(--transition);
      position: relative;
      overflow: hidden;
    }
    .cycle-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--navy) 0%, var(--gold) 100%);
      opacity: 0.7;
      transition: var(--transition);
    }
    .cycle-card:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow-md);
      border-color: rgba(206, 146, 51, 0.3);
    }
    .cycle-card:hover::before {
      opacity: 1;
      height: 5px;
    }

    .cycle-code-badge {
      display: inline-block;
      align-self: flex-start;
      background: rgba(0, 31, 63, 0.06);
      color: var(--navy);
      font-weight: 700;
      font-size: 12px;
      padding: 4px 12px;
      border-radius: 50px;
      border: 1px solid rgba(0, 31, 63, 0.12);
      margin-bottom: 16px;
      letter-spacing: 0.5px;
    }

    .cycle-title {
      font-family: var(--font-display);
      font-size: 19px;
      font-weight: 700;
      color: var(--navy);
      line-height: 1.4;
      margin-bottom: 14px;
    }

    .cycle-desc {
      font-size: 14px;
      color: #555;
      line-height: 1.6;
      margin-bottom: 24px;
      flex-grow: 1;
    }

    .cycle-meta {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding-top: 16px;
      border-top: 1px solid #f0f0f0;
      margin-bottom: 20px;
      font-size: 13px;
    }

    .meta-item {
      display: flex;
      align-items: center;
      gap: 6px;
      color: #555;
      font-weight: 600;
    }
    .meta-item i {
      color: var(--gold);
      font-size: 15px;
    }

    .meta-price {
      font-weight: 800;
      font-size: 16px;
      color: var(--navy);
      background: rgba(206, 146, 51, 0.12);
      padding: 4px 12px;
      border-radius: 8px;
    }

    .btn-register-cycle {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      width: 100%;
      padding: 12px 20px;
      background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
      color: var(--white);
      border-radius: 12px;
      text-decoration: none;
      font-weight: 600;
      font-size: 14px;
      transition: var(--transition);
      border: none;
    }
    .btn-register-cycle:hover {
      background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
      color: var(--white);
      box-shadow: var(--shadow-gold);
    }

    /* FOOTER */
    footer {
      background: #000c1a; color: rgba(255,255,255,0.7); padding: 60px 0 30px; font-size: 14px;
    }
    footer h5 {
      color: var(--white); font-family: var(--font-display); font-weight: 700; margin-bottom: 20px;
    }
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
          <i class="bi bi-arrow-left"></i> Retour à Elite Training
        </a>
      </div>
    </div>
  </nav>

  <!-- HERO HEADER -->
  <section class="cycles-hero">
    <div class="cycles-hero-bg"></div>
    <div class="container relative z-1" data-aos="fade-up">
      <div class="hero-badge">
        <i class="bi bi-award-fill"></i> Cycles & Séminaires de Perfectionnement
      </div>
      <h1 class="hero-title">
        Nos <span class="highlight">Cycles & Séminaires</span> Professionnels
      </h1>
      <p class="hero-subtitle">
        Le CAEI propose des cycles de formation de longue durée permettant d'acquérir une expertise approfondie, ainsi que des séminaires ciblés apportant des compétences immédiatement applicables dans votre environnement professionnel.
      </p>
    </div>
  </section>

  <!-- MAIN CYCLES GRID -->
  <section class="cycles-section">
    <div class="container">
      <div class="row g-4">
        @foreach($cycles as $index => $cycle)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
          <div class="cycle-card">
            <span class="cycle-code-badge"><i class="bi bi-bookmark-star-fill me-1"></i> {{ $cycle['code'] }}</span>
            <h3 class="cycle-title">{{ $cycle['title'] }}</h3>
            <p class="cycle-desc">{{ $cycle['description'] }}</p>
            
            <div class="cycle-meta">
              <div class="meta-item">
                <i class="bi bi-clock-history"></i>
                <span>{{ $cycle['duration'] }}</span>
              </div>
              <div class="meta-price">
                {{ $cycle['price'] }}
              </div>
            </div>

            <a href="{{ route('elite.inscription') }}?formation_title={{ urlencode('['.$cycle['code'].'] '.$cycle['title']) }}" class="btn-register-cycle" style="text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 8px;">
              <i class="bi bi-pencil-square"></i> S'inscrire à ce cycle
            </a>
          </div>
        </div>
        @endforeach
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

  <!-- REGISTRATION MODAL -->
  <div class="modal fade" id="cycleRegistrationModal" tabindex="-1" aria-labelledby="cycleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
        <div class="modal-header text-white p-4 border-0" style="background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);">
          <div>
            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill font-semibold mb-2" id="modalCycleCode">CP-001</span>
            <h5 class="modal-title font-display fw-bold text-white fs-4" id="cycleModalLabel">Inscription au Cycle</h5>
          </div>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 p-md-5" style="background: #fdfdfd;">
          
          @if(session('success'))
            <div class="alert alert-success border-0 rounded-4 mb-4 p-3 text-white font-bold" style="background: #28a745;">
              <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            </div>
          @endif

          <form action="{{ route('elite.appointment.store') }}" method="POST" id="modalForm">
            @csrf
            <input type="hidden" name="type" value="cycle_registration">
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
                <input type="text" name="objet" id="modalObjetInput" class="form-control rounded-3 border-light-subtle shadow-sm" placeholder="Intitulé de la formation" required>
              </div>

              <!-- 8. Date / Session souhaitée -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-dark fs-6">Date / Session souhaitée</label>
                <input type="date" name="date_session" class="form-control rounded-3 border-light-subtle shadow-sm" min="{{ date('Y-m-d') }}" placeholder="Sélectionnez une date">
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
                  <i class="bi bi-send-fill me-2"></i> Valider mon Inscription
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

    const cycleRegistrationModal = document.getElementById('cycleRegistrationModal');
    if (cycleRegistrationModal) {
      cycleRegistrationModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const code = button.getAttribute('data-cycle-code');
        const title = button.getAttribute('data-cycle-title');
        const price = button.getAttribute('data-cycle-price');
        
        document.getElementById('modalCycleCode').textContent = code + ' (' + price + ')';
        document.getElementById('modalObjetInput').value = code + ' - ' + title;
      });
    }
  </script>
</body>
</html>
