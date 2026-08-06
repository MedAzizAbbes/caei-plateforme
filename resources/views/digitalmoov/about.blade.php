<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Digital-MOOV</title>
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

  <!-- =======================================================
  * Template Name: UpConstruction
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
          <li><a href="{{ route('digitalmoov') }}" >Agence</a></li>
          <li><a href="{{ route('digitalmoov.about') }}" class="active">A propos </a></li>
          <li><a href="{{ route('digitalmoov.services') }}">Expertises</a></li>
          <li><a href="{{ route('digitalmoov.projects') }}">Projects</a></li>
          <li><a href="{{ route('digitalmoov.reference') }}">References</a></li>
         <li><a href="{{ asset('digitalmoov/pdf/CAEI DIGITAL MOOV CATALOGUE.pdf') }}" target="_blank">Catalogue</a></li>
          <li><a href="{{ route('digitalmoov.contact') }}">Contact</a></li>
          <li><a href="{{ route('digitalmoov.contact') }}">Connexion</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('digitalmoov/assets/img/la_strategie_marketing_digitale.jpg') }}');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        <h2>À Propos de Digital-MOOV</h2>
        <ol>
          <li><a href="{{ route('digitalmoov') }}">Agence</a></li>
          <li>À Propos</li>
        </ol>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row position-relative g-4">

          <div class="col-lg-7 about-img" style="background-image: url({{ asset('digitalmoov/assets/img/66.avif') }});"></div>

          <div class="col-lg-7">
            <span class="section-tag-pill mb-3">
              <i class="bi bi-building-gear text-warning"></i> Notre Histoire & Vision
            </span>
            <h2 style="font-weight: 800; color: #0f172a;" class="mb-3">CAEI Digital-MOOV</h2>
            <div class="our-story">
              <h4>Depuis 2012</h4>
              <h3>Pionniers de l'Accompagnement Digital</h3>
              <p>
                CAEI Digital-MOOV est une agence de marketing digital fondée en Tunisie en 2012 et implantée en France depuis 2022. Forts de plus de 10 ans d'expertise transfrontalière, nous accompagnons les entreprises, PME et grands comptes dans la réussite de leur transformation numérique.
              </p>
              <p>
                Dans un univers en constante évolution, notre mission est de concrétiser vos ambitions en déployant des stratégies créatives, des technologies web robustes et des leviers marketing à fort impact ROI.
              </p>
              
              <div class="watch-video d-flex align-items-center position-relative mt-4">
                <i class="bi bi-play-circle-fill text-warning fs-2 me-2"></i>
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox stretched-link fw-bold text-dark">Découvrir notre présentation vidéo</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="ref-stats-banner">
      <div class="container" data-aos="fade-up">
        <div class="row g-4">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="ref-stat-box">
              <div class="ref-stat-icon">
                <i class="bi bi-emoji-smile-fill"></i>
              </div>
              <div class="ref-stat-number">+250</div>
              <div class="ref-stat-label">Clients Satisfaits</div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="ref-stat-box">
              <div class="ref-stat-icon">
                <i class="bi bi-journal-check"></i>
              </div>
              <div class="ref-stat-number">500+</div>
              <div class="ref-stat-label">Projets Réalisés</div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="ref-stat-box">
              <div class="ref-stat-icon">
                <i class="bi bi-calendar3"></i>
              </div>
              <div class="ref-stat-number">12+</div>
              <div class="ref-stat-label">Années d'Expérience</div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="ref-stat-box">
              <div class="ref-stat-icon">
                <i class="bi bi-people-fill"></i>
              </div>
              <div class="ref-stat-number">20+</div>
              <div class="ref-stat-label">Experts Passionnés</div>
            </div>
          </div><!-- End Stats Item -->

        </div>
      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Values Section ======= -->
    <section class="ref-process-section">
      <div class="container" data-aos="fade-up">
        <div class="section-header text-center mb-5">
          <span class="section-tag-pill">
            <i class="bi bi-shield-check text-warning"></i> Nos Piliers
          </span>
          <h2 style="font-weight: 800; color: #0f172a; font-size: 2.2rem;" class="mt-2 mb-3">Nos Valeurs Fondamentales</h2>
          <p class="mx-auto" style="max-width: 700px; color: #64748b; font-size: 1.05rem;">
            Ce qui anime notre équipe au quotidien pour vous délivrer une valeur inégalée.
          </p>
        </div>

        <div class="row g-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="about-value-card">
              <div class="about-value-icon">
                <i class="bi bi-lightbulb-fill"></i>
              </div>
              <h3 style="font-weight: 700; color: #0f172a;" class="mb-3">Innovation & Créativité</h3>
              <p style="color: #64748b; font-size: 0.95rem; line-height: 1.6;">
                Nous anticipons les tendances digitales et concevons des solutions novatrices qui font sortir votre marque du lot.
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="about-value-card">
              <div class="about-value-icon">
                <i class="bi bi-graph-up-arrow"></i>
              </div>
              <h3 style="font-weight: 700; color: #0f172a;" class="mb-3">Culture du ROI</h3>
              <p style="color: #64748b; font-size: 0.95rem; line-height: 1.6;">
                Chaque euro investi doit générer de la valeur. Nous mesurons et optimisons continuellement les performances de vos campagnes.
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="about-value-card">
              <div class="about-value-icon">
                <i class="bi bi-hand-thumbs-up-fill"></i>
              </div>
              <h3 style="font-weight: 700; color: #0f172a;" class="mb-3">Transparence & Proximité</h3>
              <p style="color: #64748b; font-size: 0.95rem; line-height: 1.6;">
                Une collaboration basée sur la confiance, une communication fluide et des reporting transparents à chaque étape.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Values Section -->



    <!-- ======= CTA Section ======= -->
    <section class="ref-cta-section">
      <div class="container" data-aos="zoom-in">
        <div class="ref-cta-banner text-center">
          <h2 style="font-weight: 800; font-size: 2.2rem;" class="mb-3">Prêt à collaborer avec notre équipe ?</h2>
          <p class="mx-auto mb-4" style="max-width: 650px; color: #cbd5e1; font-size: 1.1rem;">
            Découvrez comment notre savoir-faire peut transformer votre présence sur le web.
          </p>
          <a href="{{ route('digitalmoov.contact') }}" class="ref-cta-btn">
            Contactez notre équipe <i class="bi bi-arrow-right-circle-fill"></i>
          </a>
        </div>
      </div>
    </section><!-- End CTA Section -->

  </main><!-- End #main -->

 <!-- ======= Footer ======= -->
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
          </div><!-- End footer info column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Liens utiles</h4>
            <ul>
              <li><a href="{{ route('digitalmoov') }}">Accueil</a></li>
              <li><a href="{{ route('digitalmoov.about') }}">Présentation</a></li>
              <li><a href="{{ route('digitalmoov.services') }}">Services</a></li>
              <li><a href="{{ route('digitalmoov.terms') }}">Terms of service</a></li>
              <li><a href="{{ route('digitalmoov.privacy') }}">Privacy policy</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Nos Services</h4>
            <ul>
              <li><a href="{{ route('digitalmoov.services') }}">Web Design</a></li>
              <li><a href="{{ route('digitalmoov.services') }}">Web Development</a></li>
              <li><a href="{{ route('digitalmoov.services') }}">Product Management</a></li>
              <li><a href="{{ route('digitalmoov.services') }}">Marketing</a></li>
              <li><a href="{{ route('digitalmoov.services') }}">Graphic Design</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Explorez</h4>
            <ul>
              <li><a href="{{ route('digitalmoov.services') }}">Services</a></li>
              <li><a href="{{ route('digitalmoov.blog') }}">Blog</a></li>
              <li><a href="{{ route('digitalmoov') }}#get-started">FAQ</a></li>
              <li><a href="{{ route('digitalmoov.about') }}">Partenaires</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Ressources</h4>
            <ul>
              <li><a href="{{ route('digitalmoov.privacy') }}">Politique de Confidentialité</a></li>
              <li><a href="{{ route('digitalmoov.sitemap') }}">Carte du Site</a></li>
              <li><a href="{{ route('digitalmoov.terms') }}">Mentions Légales</a></li>
            </ul>
          </div><!-- End footer links column-->

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
<!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/isotope-layout@3.0.6/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11.1.10/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs@1.5.0/dist/purecounter_vanilla.js"></script>
  <!-- <script src="{{ asset('digitalmoov/assets/vendor/php-email-form/validate.js') }}"></script> -->

  <!-- Template Main JS File -->
  <script src="{{ asset('digitalmoov/assets/js/main.js') }}"></script>


      <script>
        const quoteForm = document.getElementById("quoteForm");
        const contactForm = document.getElementById("contactForm");
        
        function handleFormSubmit(form) {
          if (!form) return;
          form.addEventListener("submit", function(e) {
            e.preventDefault();
            const loading = form.querySelector(".loading");
            const errorMsg = form.querySelector(".error-message");
            const sentMsg = form.querySelector(".sent-message");

            if(loading) loading.style.display = "block";
            if(errorMsg) errorMsg.style.display = "none";
            if(sentMsg) sentMsg.style.display = "none";

            const formData = new FormData(form);

            fetch(form.getAttribute("action"), {
              method: "POST",
              headers: {
                "X-Requested-With": "XMLHttpRequest"
              },
              body: formData
            })
            .then(response => response.json())
            .then(data => {
              if(loading) loading.style.display = "none";
              if (data.status === "success") {
                if(sentMsg) sentMsg.style.display = "block";
                form.reset();
              } else {
                if(errorMsg) {
                  errorMsg.textContent = data.message || "Une erreur est survenue.";
                  errorMsg.style.display = "block";
                }
              }
            })
            .catch(err => {
              if(loading) loading.style.display = "none";
              if(errorMsg) {
                errorMsg.textContent = "Impossible de se connecter au serveur.";
                errorMsg.style.display = "block";
              }
            });
          });
        }
        
        handleFormSubmit(quoteForm);
        handleFormSubmit(contactForm);
      </script>
    </body>

</html>