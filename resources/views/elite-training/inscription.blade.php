<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Inscription à une Formation — CAEI Elite Training</title>
  
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
      --navy-deep: #001026;
      --white: #ffffff;
      --off-white: #f8f9fc;
      --font-main: 'Inter', sans-serif;
      --font-display: 'Outfit', sans-serif;
    }

    body {
      font-family: var(--font-main);
      color: #1a1a2e;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      background: linear-gradient(135deg, rgba(0, 16, 40, 0.88) 0%, rgba(0, 31, 63, 0.84) 100%), 
                  url('{{ asset($bgImage ?? 'assets/img/cta-bg.jpg') }}') center/cover no-repeat fixed;
      position: relative;
    }

    /* Subtle background ambient overlay */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background: radial-gradient(circle at top right, rgba(206, 146, 51, 0.15), transparent 60%),
                  radial-gradient(circle at bottom left, rgba(0, 100, 200, 0.12), transparent 50%);
      pointer-events: none;
      z-index: 0;
    }

    /* NAVBAR */
    .et-navbar {
      position: fixed;
      top: 0; width: 100%; z-index: 1050;
      padding: 16px 0;
      background: rgba(0, 20, 45, 0.94);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid rgba(206, 146, 51, 0.25);
      box-shadow: 0 4px 30px rgba(0,0,0,0.35);
    }
    .et-navbar .nav-brand {
      display: flex; align-items: center; gap: 12px; text-decoration: none;
    }
    .et-navbar .nav-brand img { height: 46px; object-fit: contain; }
    .et-navbar .nav-brand span {
      font-family: var(--font-display); font-weight: 800; font-size: 18px; color: var(--white);
    }
    .et-navbar .nav-brand span em { color: var(--gold-light); font-style: normal; }

    .btn-back {
      display: inline-flex; align-items: center; gap: 8px;
      color: rgba(255,255,255,0.9); text-decoration: none; font-size: 13px; font-weight: 600;
      padding: 8px 18px; border-radius: 50px; 
      background: rgba(255,255,255,0.08);
      border: 1px solid rgba(255,255,255,0.2);
      transition: all 0.3s ease;
    }
    .btn-back:hover {
      color: var(--navy); background: var(--gold-light); border-color: var(--gold-light);
      transform: translateX(-3px);
    }

    .inscription-container {
      margin-top: 110px;
      margin-bottom: 70px;
      position: relative;
      z-index: 10;
      flex: 1;
    }

    .form-wrapper {
      background: rgba(255, 255, 255, 0.98);
      backdrop-filter: blur(20px);
      border-radius: 24px;
      border: 1px solid rgba(206, 146, 51, 0.3);
      box-shadow: 0 25px 60px rgba(0,0,0,0.45);
      overflow: hidden;
    }

    .side-visual-banner {
      background: linear-gradient(145deg, #001736 0%, #00285a 100%);
      color: white;
      position: relative;
      overflow: hidden;
    }
    .side-visual-banner::after {
      content: '';
      position: absolute;
      inset: 0;
      background: url('{{ asset($bgImage ?? 'assets/img/im1.jpg') }}') center/cover no-repeat;
      opacity: 0.18;
      pointer-events: none;
    }

    .badge-gold {
      background: rgba(206, 146, 51, 0.15);
      border: 1px solid rgba(206, 146, 51, 0.4);
      color: var(--gold-light);
      padding: 6px 14px;
      border-radius: 50px;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .form-label {
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: #334155;
      margin-bottom: 6px;
    }

    .form-control, .form-select {
      border-radius: 12px;
      padding: 10px 16px;
      font-size: 14px;
      border: 1.5px solid #cbd5e1;
      background-color: #f8fafc;
      transition: all 0.2s ease;
    }
    .form-control:focus, .form-select:focus {
      background-color: #ffffff;
      border-color: var(--gold);
      box-shadow: 0 0 0 4px rgba(206, 146, 51, 0.18);
      outline: none;
    }

    .btn-submit-gold {
      background: linear-gradient(135deg, #e5a93b 0%, #b87a1d 100%);
      color: #ffffff;
      font-weight: 800;
      font-family: var(--font-display);
      font-size: 16px;
      letter-spacing: 0.5px;
      border: none;
      border-radius: 50px;
      padding: 14px 28px;
      box-shadow: 0 8px 25px rgba(184, 122, 29, 0.35);
      transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .btn-submit-gold:hover {
      background: linear-gradient(135deg, #f0b75a 0%, #ce9233 100%);
      color: #ffffff;
      transform: translateY(-2px);
      box-shadow: 0 12px 30px rgba(184, 122, 29, 0.45);
    }

    .perk-item {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 14px;
      font-size: 13px;
      color: rgba(255,255,255,0.85);
    }
    .perk-icon {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: rgba(206,146,51,0.25);
      color: var(--gold-light);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 14px;
      flex-shrink: 0;
    }
  </style>
</head>
<body>
  <!-- NAVBAR -->
  <nav class="et-navbar">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="{{ route('elite.training') }}" class="nav-brand">
        <img src="{{ asset('assets/img/training1.png') }}" alt="CAEI Logo">
        <span>CAEI <em>Elite Training</em></span>
      </a>
      <a href="{{ url()->previous() }}" class="btn-back">
        <i class="bi bi-arrow-left"></i> Retour
      </a>
    </div>
  </nav>

  <main class="container inscription-container">
    <div class="row justify-content-center">
      <div class="col-xl-11 col-lg-12">
        <div class="form-wrapper" data-aos="fade-up" data-aos-duration="700">
          <div class="row g-0">
            
            <!-- Colonne Visuelle & Détails (Gauche) -->
            <div class="col-lg-5 side-visual-banner p-4 p-md-5 d-flex flex-column justify-content-between position-relative">
              <div class="position-relative" style="z-index: 2;">
                <div class="badge-gold mb-3">
                  <i class="bi bi-stars"></i> Formation d'Excellence
                </div>

                @if(isset($formation) && $formation->image)
                  <div class="text-center my-3">
                    <img src="{{ asset('storage/' . $formation->image) }}" class="img-fluid rounded-4 shadow-lg border border-white-50" style="max-height: 260px; object-fit: cover;" alt="Formation Poster">
                  </div>
                @endif

                <h3 class="fw-bold text-white mb-2" style="font-family: var(--font-display); font-size: 24px; line-height: 1.3;">
                  {{ request('formation_title') ?? ($formation->title ?? 'Programme de Formation Internationale') }}
                </h3>

                <p class="text-white-50 small mb-4">
                  Rejoignez les élites et cadres dirigeants formés par les meilleurs experts et consultants du continent africain.
                </p>

                <div class="mt-4 pt-3 border-top border-white-10">
                  <div class="perk-item">
                    <div class="perk-icon"><i class="bi bi-patch-check-fill"></i></div>
                    <div><strong>Certificat d'Excellence</strong> internationalement reconnu</div>
                  </div>
                  <div class="perk-item">
                    <div class="perk-icon"><i class="bi bi-person-video3"></i></div>
                    <div><strong>Experts Praticiens</strong> et consultants de haut niveau</div>
                  </div>
                  <div class="perk-item">
                    <div class="perk-icon"><i class="bi bi-laptop"></i></div>
                    <div><strong>Formats Flexibles :</strong> Présentiel & Classe virtuelle</div>
                  </div>
                  <div class="perk-item">
                    <div class="perk-icon"><i class="bi bi-headset"></i></div>
                    <div><strong>Accompagnement VIP</strong> & suivi post-formation</div>
                  </div>
                </div>
              </div>

              <!-- Bas de la colonne gauche -->
              <div class="mt-4 pt-3 border-top border-white-10 d-flex align-items-center justify-content-between position-relative" style="z-index: 2;">
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-shield-lock-fill text-gold-light fs-5"></i>
                  <span class="text-white-50 small">Inscription 100% sécurisée</span>
                </div>
                <span class="badge bg-white text-dark rounded-pill px-3 py-1 fw-bold text-xs">Session {{ date('Y') }}</span>
              </div>
            </div>

            <!-- Colonne Formulaire (Droite) -->
            <div class="col-lg-7 p-4 p-md-5 bg-white">
              
              @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-4 p-3 mb-4 shadow-sm" role="alert">
                  <i class="bi bi-check-circle-fill me-2 fs-5 text-success"></i>
                  <strong>Félicitations !</strong> {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
              @endif

              <div class="mb-4">
                <span class="badge bg-light text-navy fw-bold px-3 py-1.5 rounded-pill mb-2 border">
                  Formulaire Officiel
                </span>
                <h2 class="fw-bold mb-1 text-navy" style="font-family: var(--font-display); font-size: 26px;">
                  Demande d'Inscription
                </h2>
                <p class="text-muted small mb-0">Remplissez les informations ci-dessous pour réserver votre place.</p>
              </div>

              <form action="{{ route('elite.appointment.store') }}" method="POST">
                @csrf
                <input type="hidden" name="type" value="inscription">
                <input type="hidden" name="formation_title" value="{{ request('formation_title') ?? ($formation->title ?? '') }}">

                <div class="row g-3">
                  <!-- 1. Nom & Prénom -->
                  <div class="col-md-6">
                    <label class="form-label">Nom & Prénom <span class="text-danger">*</span></label>
                    <input type="text" name="nom" class="form-control" required placeholder="Ex: Jean Dupont">
                  </div>

                  <!-- 2. Téléphone / WhatsApp -->
                  <div class="col-md-6">
                    <label class="form-label">Téléphone / WhatsApp <span class="text-danger">*</span></label>
                    <input type="tel" name="telephone" class="form-control" required placeholder="+216 XX XXX XXX">
                  </div>

                  <!-- 3. Adresse e-mail -->
                  <div class="col-md-6">
                    <label class="form-label">Adresse e-mail professionnelle <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" required placeholder="contact@entreprise.com">
                  </div>

                  <!-- 4. Pays -->
                  <div class="col-md-6">
                    <label class="form-label">Pays de résidence <span class="text-danger">*</span></label>
                    <input type="text" name="pays" class="form-control" required placeholder="Ex: Tunisie, Côte d'Ivoire, Sénégal...">
                  </div>

                  <!-- 5. Fonction / Poste -->
                  <div class="col-md-6">
                    <label class="form-label">Fonction / Poste occupé <span class="text-danger">*</span></label>
                    <input type="text" name="poste" class="form-control" required placeholder="Ex: Directeur Général, Cadre...">
                  </div>

                  <!-- 6. Entreprise / Organisation -->
                  <div class="col-md-6">
                    <label class="form-label">Entreprise / Organisation <span class="text-danger">*</span></label>
                    <input type="text" name="entreprise" class="form-control" required placeholder="Nom de votre institution">
                  </div>

                  <!-- 7. Formation choisie -->
                  <div class="col-12">
                    <label class="form-label">Formation ou Programme choisi <span class="text-danger">*</span></label>
                    <input type="text" name="objet" class="form-control fw-bold text-navy" 
                           style="background-color: #f1f5f9;"
                           placeholder="Intitulé de la formation" required 
                           value="{{ request('formation_title') ?? ($formation->title ?? '') }}" 
                           {{ (request('formation_title') || isset($formation)) ? 'readonly' : '' }}>
                  </div>

                  <!-- 8. Date / Session -->
                  <div class="col-md-6">
                    <label class="form-label">Date / Session souhaitée</label>
                    <input type="date" name="date_session" class="form-control" min="{{ date('Y-m-d') }}">
                  </div>

                  <!-- 9. Mode de participation -->
                  <div class="col-md-6">
                    <label class="form-label">Mode de participation <span class="text-danger">*</span></label>
                    <select name="mode_participation" class="form-select" required>
                      <option value="" disabled selected>-- Choisir le mode --</option>
                      <option value="présentiel">🏢 Présentiel (Tunis / Paris)</option>
                      <option value="en_ligne">💻 En Ligne / Classe Virtuelle</option>
                      <option value="hybride">🔄 Format Hybride</option>
                    </select>
                  </div>

                  <!-- 10. Origine -->
                  <div class="col-12">
                    <label class="form-label">Comment avez-vous découvert cette formation ?</label>
                    <select name="comment_connu" class="form-select">
                      <option value="" disabled selected>-- Sélectionnez une option --</option>
                      <option value="Réseaux sociaux">Réseaux sociaux (LinkedIn, Facebook, etc.)</option>
                      <option value="Recommandation">Recommandation d'un collègue / Institution</option>
                      <option value="Site web">Site officiel CAEI</option>
                      <option value="Emailing">Emailing / Brochure officielle</option>
                      <option value="Autre">Autre</option>
                    </select>
                  </div>

                  <!-- Bouton de soumission -->
                  <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-submit-gold w-100 py-3">
                      <i class="bi bi-send-check me-2"></i> Envoyer ma demande d'inscription
                    </button>
                    <p class="text-center text-muted small mt-2 mb-0">
                      <i class="bi bi-info-circle me-1"></i> Notre équipe d'admission vous contactera sous 24h ouvrées.
                    </p>
                  </div>
                </div>
              </form>
              
            </div> <!-- End Form Column -->
          </div> <!-- End row g-0 -->
        </div>
      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="text-white py-4 mt-auto" style="background: rgba(0, 16, 38, 0.95); border-top: 1px solid rgba(255,255,255,0.1);">
    <div class="container text-center">
      <div class="d-flex justify-content-center align-items-center gap-2 mb-2">
        <img src="{{ asset('assets/img/training1.png') }}" alt="Logo" height="28">
        <span class="font-display fw-bold text-white fs-6">CAEI ELITE TRAINING</span>
      </div>
      <p class="text-white-50 small mb-0">&copy; {{ date('Y') }} CAEI Elite Training. Tous droits réservés.</p>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 800, once: true });
  </script>
</body>
</html>
