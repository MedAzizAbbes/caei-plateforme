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
      --white: #ffffff;
      --off-white: #f8f9fc;
      --font-main: 'Inter', sans-serif;
      --font-display: 'Outfit', sans-serif;
    }
    body { font-family: var(--font-main); background: var(--off-white); color: #1a1a2e; }

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
    }
    .btn-back:hover {
      color: var(--navy); background: var(--gold-light); border-color: var(--gold-light);
    }

    .inscription-container {
      margin-top: 120px;
      margin-bottom: 80px;
    }

    .form-wrapper {
      background: var(--white);
      border-radius: 16px;
      padding: 40px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.08);
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
      <div class="col-lg-8">
        <div class="form-wrapper" data-aos="fade-up">
          <div class="text-center mb-4">
            <h2 class="font-display fw-bold text-navy">Demande d'Inscription</h2>
            <p class="text-muted">Veuillez remplir le formulaire ci-dessous pour confirmer votre inscription.</p>
          </div>
          
          @if(isset($formation) && $formation->image)
            <div class="mb-4 text-center">
              <img src="{{ asset('storage/' . $formation->image) }}" class="img-fluid rounded shadow-sm" style="max-height: 400px; width: auto; object-fit: contain;" alt="Affiche de la formation">
            </div>
          @endif
          
          <form action="{{ route('elite.appointment.store') }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="inscription">
            
            <!-- Default values are pre-filled if passed via query string -->
            <input type="hidden" name="formation_title" value="{{ request('formation_title') }}">

            <div class="row g-3">
              <!-- 1. Nom & Prénom -->
              <div class="col-md-6">
                <label class="form-label font-semibold text-dark small mb-1">Nom & Prénom *</label>
                <input type="text" name="nom" class="form-control" required placeholder="Votre nom & prénom">
              </div>

              <!-- 2. Téléphone -->
              <div class="col-md-6">
                <label class="form-label font-semibold text-dark small mb-1">Téléphone *</label>
                <input type="tel" name="telephone" class="form-control" required placeholder="+216 XX XXX XXX">
              </div>

              <!-- 3. Adresse e-mail -->
              <div class="col-md-6">
                <label class="form-label font-semibold text-dark small mb-1">Adresse e-mail *</label>
                <input type="email" name="email" class="form-control" required placeholder="votre@email.com">
              </div>

              <!-- 4. Pays -->
              <div class="col-md-6">
                <label class="form-label font-semibold text-dark small mb-1">Pays *</label>
                <input type="text" name="pays" class="form-control" required placeholder="Ex: Tunisie, Côte d'Ivoire...">
              </div>

              <!-- 5. Fonction / Poste -->
              <div class="col-md-6">
                <label class="form-label font-semibold text-dark small mb-1">Fonction / Poste *</label>
                <input type="text" name="poste" class="form-control" required placeholder="Ex: Directeur Financier...">
              </div>

              <!-- 6. Entreprise / Institution -->
              <div class="col-md-6">
                <label class="form-label font-semibold text-dark small mb-1">Entreprise / Institution *</label>
                <input type="text" name="entreprise" class="form-control" required placeholder="Nom de votre entreprise">
              </div>

              <!-- 7. Formation ou séminaire choisi -->
              <div class="col-md-12">
                <label class="form-label font-semibold text-dark small mb-1">Formation ou séminaire choisi *</label>
                <input type="text" name="objet" class="form-control bg-light fw-bold text-navy" placeholder="Intitulé de la formation" required value="{{ request('formation_title') }}" {{ request('formation_title') ? 'readonly' : '' }}>
              </div>

              <!-- 8. Date / Session souhaitée -->
              <div class="col-md-6">
                <label class="form-label font-semibold text-dark small mb-1">Date / Session souhaitée</label>
                <input type="date" name="date_session" class="form-control" min="{{ date('Y-m-d') }}" placeholder="Sélectionnez une date">
              </div>

              <!-- 9. Mode de participation -->
              <div class="col-md-6">
                <label class="form-label font-semibold text-dark small mb-1">Mode de participation *</label>
                <select name="mode_participation" class="form-select" required>
                  <option value="" disabled selected>-- Sélectionner un mode --</option>
                  <option value="présentiel">Présentiel</option>
                  <option value="en_ligne">En ligne</option>
                </select>
              </div>

              <!-- 10. Comment avez-vous connu cette formation ? -->
              <div class="col-md-12">
                <label class="form-label font-semibold text-dark small mb-1">Comment avez-vous connu cette formation ?</label>
                <select name="comment_connu" class="form-select">
                  <option value="" disabled selected>-- Sélectionner une option --</option>
                  <option value="Réseaux sociaux">Réseaux sociaux (LinkedIn, Facebook...)</option>
                  <option value="Recommandation">Recommandation d'un collègue / ami</option>
                  <option value="Site web">Site web CAEI</option>
                  <option value="Emailing / Newsletter">Emailing / Newsletter</option>
                  <option value="Autre">Autre</option>
                </select>
              </div>

              <div class="col-12 mt-4">
                <button type="submit" class="btn text-white w-100 py-3 rounded-pill fw-bold shadow" style="background: linear-gradient(135deg, var(--gold), var(--gold-dark));">
                  Envoyer ma demande d'inscription
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="bg-navy text-white pt-5 pb-4" style="background: #001026;">
    <div class="container text-center">
      <div class="d-flex justify-content-center align-items-center gap-2 mb-3">
        <img src="{{ asset('assets/img/training1.png') }}" alt="Logo" height="30">
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
