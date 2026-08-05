<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Prendre Rendez-vous - Digital-MOOV</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="{{ asset('digitalmoov/assets/img/caei dm 01.png') }}" type="image/x-icon">
  <link rel="apple-touch-icon" href="{{ asset('digitalmoov/assets/img/caei dm 01.png') }}">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/swiper@11.1.10/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('digitalmoov/assets/css/main.css') }}?v=2.0" rel="stylesheet">
  <link href="{{ asset('digitalmoov/assets/css/modern.css') }}?v=1.0" rel="stylesheet">
  
  <!-- JQuery UI CSS -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <style>
    body {
      background-color: #f4f6f9 !important;
    }
    /* Style personnalisé pour le calendrier Datepicker JQuery UI */
    .ui-datepicker {
      font-size: 16px;
      border: none !important;
      box-shadow: 0px 10px 30px rgba(0,0,0,0.15);
      border-radius: 8px;
      overflow: hidden;
      padding: 0;
    }
    .ui-datepicker-header {
      background-color: var(--color-primary) !important;
      color: #fff !important;
      border: none !important;
      border-radius: 0;
      padding: 8px 0;
    }
    .ui-datepicker-calendar thead th {
      color: #777;
      font-weight: 600;
    }
    .ui-datepicker-calendar tbody td a {
      border: none !important;
      background: none !important;
      text-align: center;
      border-radius: 4px;
      padding: 8px;
    }
    .ui-datepicker-calendar tbody td a.ui-state-active, 
    .ui-datepicker-calendar tbody td a:hover {
      background-color: var(--color-primary) !important;
      color: #fff !important;
    }
    /* Custom form styling */
    .form-card {
      border-radius: 16px;
      background-color: #ffffff;
      box-shadow: 0 10px 30px rgba(0,0,0,0.04);
      border: none;
      padding: 40px;
    }
    .form-floating > .form-control:focus ~ label, 
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
      color: var(--color-primary);
    }
    .form-control:focus, .form-select:focus {
      border-color: var(--color-primary);
      box-shadow: 0 0 0 0.25px rgba(240, 160, 0, 0.25);
    }
    .btn-submit {
      background-color: var(--color-primary) !important;
      border: none !important;
      color: #fff !important;
      padding: 14px 30px;
      font-weight: 700;
      border-radius: 30px;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
    }
    .btn-submit:hover {
      background-color: #b37700 !important;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(179, 119, 0, 0.3);
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo">
        <img src="{{ asset('digitalmoov/assets/img/caei dm cov.png') }}" alt="" >
      </div>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{ route('digitalmoov') }}">Agence</a></li>
          <li><a href="{{ route('digitalmoov.about') }}">A propos </a></li>
          <li><a href="{{ route('digitalmoov.services') }}">Expertises</a></li>
          <li><a href="{{ route('digitalmoov.projects') }}">Projects</a></li>
          <li><a href="{{ route('digitalmoov.reference') }}">References</a></li>
          <li><a href="{{ asset('digitalmoov/pdf/CAEI DIGITAL MOOV CATALOGUE.pdf') }}" target="_blank">Catalogue</a></li>
          <li><a href="{{ route('digitalmoov.contact') }}">Contact</a></li>
          <li><a href="{{ route('login') }}">Connexion</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('digitalmoov/assets/img/people-working-as-team-company.jpg') }}');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        <h2>Prendre Rendez-vous</h2>
        <ol>
          <li><a href="{{ route('digitalmoov') }}">Accueil</a></li>
          <li>Rendez-vous</li>
        </ol>
      </div>
    </div><!-- End Breadcrumbs -->

    <div class="container my-5" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="form-card">
            
            <div class="text-center mb-5">
              <h2 class="fw-bold mb-2" style="color: var(--color-primary);">Planifier un Rendez-vous</h2>
              <p class="text-muted">Remplissez les informations ci-dessous pour planifier votre session stratégique de marketing digital.</p>
            </div>

            <!-- Formulaire -->
            <form action="{{ route('contact.send') }}" method="post" id="quoteForm" autocomplete="off">
              @csrf
              <div class="row g-3">
                
                <!-- Prénom -->
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
                    <label for="prenom">Prénom*</label>
                  </div>
                </div>

                <!-- Nom -->
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom" required>
                    <label for="Nom">Nom*</label>
                  </div>
                </div>

                <!-- Téléphone -->
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="tel" class="form-control" id="tel" name="phone" placeholder="Numéro de téléphone" required>
                    <label for="tel">Numéro de téléphone*</label>
                  </div>
                </div>

                <!-- Société -->
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="societe" name="company" placeholder="Société" required>
                    <label for="societe">Société*</label>
                  </div>
                </div>

                <!-- Email -->
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Adresse e-mail" required>
                    <label for="email">Adresse e-mail*</label>
                  </div>
                </div>

                <!-- Site Web -->
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="website" name="website" placeholder="Site web de votre entreprise" required>
                    <label for="website">Site web de votre entreprise*</label>
                  </div>
                </div>

                <!-- Service -->
                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-select" name="service" id="service" required>
                      <option value="" disabled selected hidden>Choisissez un service</option>
                      <option value="strategie">Stratégie de Marketing Digital</option>
                      <option value="referencement">Référencement (SEO)</option>
                      <option value="publicite">Publicité en Ligne (SEA)</option>
                      <option value="reseauxsociaux">Gestion des Réseaux Sociaux</option>
                      <option value="contenu">Création de Contenu</option>
                    </select>
                    <label for="service">Service concerné*</label>
                  </div>
                </div>

                <!-- Datepicker -->
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="datepicker" name="datepicker" placeholder="Date de la réunion" required readonly style="background-color: #ffffff;">
                    <label for="datepicker">Date souhaitée pour la réunion*</label>
                  </div>
                </div>

                <!-- Objectifs -->
                <div class="col-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="objet" name="objet" placeholder="Objectifs de marketing" required>
                    <label for="objet">Objectifs de marketing*</label>
                  </div>
                </div>

                <!-- Message -->
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Message" id="message" name="message" style="height: 150px" required></textarea>
                    <label for="message">Message*</label>
                  </div>
                </div>

                <!-- Checkbox -->
                <div class="col-12 my-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="checkbox" name="checkbox" required>
                    <label class="form-check-label text-muted small" for="checkbox">
                      J'accepte les conditions de réservation de Moov et je consens au traitement de mes données personnelles conformément à la politique de confidentialité.
                    </label>
                  </div>
                </div>

                <!-- Submit Button / Alerts -->
                <div class="col-12 text-center mt-4">
                  <div class="loading d-none mb-3 text-warning fw-bold">Envoi de la demande en cours...</div>
                  <div class="error-message d-none mb-3 text-danger fw-bold"></div>
                  <div class="sent-message d-none mb-3 text-success fw-bold">Votre demande de rendez-vous a bien été envoyée. Merci !</div>
                  
                  <button type="submit" class="btn-submit w-100 py-3">JE PRENDS RENDEZ-VOUS</button>
                </div>

              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

  </main><!-- End #main -->

  <footer id="footer" class="footer">
    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <div class="logo mb-3">
                <img src="{{ asset('digitalmoov/assets/img/caei dm cov.png') }}" alt="CAEI Digital Moov" style="max-height: 60px; width: auto;">
              </div>
              <p>
                Immeuble Medina Palace au 53-55 <br>
                Avenue de Paris Tunis-Tunisie, 1001<br><br>
                <strong>Phone:</strong> +216 55 335 286<br>
                <strong>Email:</strong> contact@caei-afri.com<br>
              </p>
              <div class="social-links d-flex mt-3">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Liens utiles</h4>
            <ul>
              <li><a href="{{ route('digitalmoov') }}">Accueil</a></li>
              <li><a href="{{ route('digitalmoov.about') }}">Présentation</a></li>
              <li><a href="{{ route('digitalmoov.services') }}">Services</a></li>
              <li><a href="{{ route('digitalmoov.terms') }}">Terms of service</a></li>
              <li><a href="{{ route('digitalmoov.privacy') }}">Privacy policy</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Nos Services</h4>
            <ul>
              <li><a href="{{ route('digitalmoov.services') }}">Web Design</a></li>
              <li><a href="{{ route('digitalmoov.services') }}">Web Development</a></li>
              <li><a href="{{ route('digitalmoov.services') }}">Product Management</a></li>
              <li><a href="{{ route('digitalmoov.services') }}">Marketing</a></li>
              <li><a href="{{ route('digitalmoov.services') }}">Graphic Design</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Explorez</h4>
            <ul>
              <li><a href="{{ route('digitalmoov.services') }}">Services</a></li>
              <li><a href="{{ route('digitalmoov.blog') }}">Blog</a></li>
              <li><a href="{{ route('digitalmoov') }}#get-started">FAQ</a></li>
              <li><a href="{{ route('digitalmoov.about') }}">Partenaires</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Ressources</h4>
            <ul>
              <li><a href="{{ route('digitalmoov.privacy') }}">Politique de Confidentialité</a></li>
              <li><a href="{{ route('digitalmoov.sitemap') }}">Carte du Site</a></li>
              <li><a href="{{ route('digitalmoov.terms') }}">Mentions Légales</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>CAEI Digital-MOOV</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="{{ route('digitalmoov') }}">Digital.MOOV</a>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11.1.10/swiper-bundle.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <script src="{{ asset('digitalmoov/assets/js/main.js') }}"></script>
  
  <script>
    AOS.init({
      duration: 800,
      easing: 'slide',
      once: true
    });
    
    $(function() {
        var currentDate = new Date();
        $("#datepicker").datepicker({
            minDate: currentDate,
            dateFormat: "dd/mm/yy"
        });
    });

    // Gestion AJAX du formulaire de devis/rendez-vous
    const quoteForm = document.getElementById("quoteForm");
    if (quoteForm) {
      quoteForm.addEventListener("submit", function(e) {
        e.preventDefault();
        const loading = quoteForm.querySelector(".loading");
        const errorMsg = quoteForm.querySelector(".error-message");
        const sentMsg = quoteForm.querySelector(".sent-message");

        if(loading) loading.classList.remove("d-none");
        if(errorMsg) errorMsg.classList.add("d-none");
        if(sentMsg) sentMsg.classList.add("d-none");

        const formData = new FormData(quoteForm);

        fetch(quoteForm.getAttribute("action"), {
          method: "POST",
          headers: {
            "X-Requested-With": "XMLHttpRequest"
          },
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if(loading) loading.classList.add("d-none");
          if (data.status === "success") {
            if(sentMsg) sentMsg.classList.remove("d-none");
            quoteForm.reset();
          } else {
            if(errorMsg) {
              errorMsg.textContent = data.message || "Une erreur est survenue.";
              errorMsg.classList.remove("d-none");
            }
          }
        })
        .catch(err => {
          if(loading) loading.classList.add("d-none");
          if(errorMsg) {
            errorMsg.textContent = "Impossible de se connecter au serveur.";
            errorMsg.classList.remove("d-none");
          }
        });
      });
    }
  </script>
</body>
</html>