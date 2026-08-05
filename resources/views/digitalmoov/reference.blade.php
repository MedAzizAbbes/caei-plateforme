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
          <li><a href="{{ route('digitalmoov.about') }}">A propos </a></li>
          <li><a href="{{ route('digitalmoov.services') }}">Expertises</a></li>
          <li><a href="{{ route('digitalmoov.projects') }}">Projects</a></li>
          <li><a href="{{ route('digitalmoov.reference') }}" class="active">References</a></li>
          <li><a href="{{ asset('digitalmoov/pdf/CAEI DIGITAL MOOV CATALOGUE.pdf') }}" target="_blank">Catalogue</a></li>
          <li><a href="{{ route('digitalmoov.contact') }}">Contact</a></li>
          <li><a href="{{ route('digitalmoov.contact') }}">Connexion</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('digitalmoov/assets/img/people-working-as-team-company.jpg') }}');">
     
    </div><!-- End Breadcrumbs -->

 <!-- ======= Constructions Section ======= -->
 <section id="constructions" class="constructions">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>*****</h2>
        <p>Explorez comment Digital Moov a transformé les défis de ses clients en opportunités de croissance exceptionnelles grâce à des stratégies de marketing digital innovantes et des résultats mesurables.</p>
      </div>

      <div class="row gy-4">

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="card-item">
            <div class="row">
              <div class="col-xl-5">
                <div class="card-bg" style="background-image: url({{ asset('digitalmoov/assets/img/front-view-online-shopping-concept.jpg') }});"></div>
              </div>
              <div class="col-xl-7 d-flex align-items-center">
                <div class="card-body">
                  <h4 class="card-title">Étude de cas - Augmentation des ventes en ligne </h4>
                  <p>Pour notre client XYZ Fashion, nous avons mis en œuvre une stratégie de marketing digital complète, comprenant la refonte de leur site Web, l'optimisation du référencement (SEO) et la gestion de campagnes publicitaires sur les réseaux sociaux. En conséquence, les ventes en ligne de XYZ Fashion ont augmenté de 300 % en six mois, propulsant ainsi leur entreprise vers de nouveaux sommets de succès.</p>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <div class="card-item">
            <div class="row">
              <div class="col-xl-5">
                <div class="card-bg" style="background-image: url({{ asset('digitalmoov/assets/img/relation-client-digital.png') }});"></div>
              </div>
              <div class="col-xl-7 d-flex align-items-center">
                <div class="card-body">
                  <h4 class="card-title">Témoignage client - ABC Corporation</h4>
                  <p>Digital Moov a été un partenaire indispensable pour ABC Corporation. Leur équipe a une compréhension approfondie de notre secteur d'activité et a su développer des stratégies de marketing digital qui ont dépassé nos attentes. Grâce à leur expertise, nous avons vu une augmentation de 150 % du trafic sur notre site Web et une croissance significative de nos revenus en ligne.</p>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
          <div class="card-item">
            <div class="row">
              <div class="col-xl-5">
                <div class="card-bg" style="background-image: url({{ asset('digitalmoov/assets/img/social-media-marketing-concept-marketing-with-applications.jpg') }});"></div>
              </div>
              <div class="col-xl-7 d-flex align-items-center">
                <div class="card-body">
                  <h4 class="card-title">Projet remarquable - Campagne publicitaire sur les réseaux sociaux </h4>
                  <p>Pour le lancement de leur dernier produit, DEF Electronics a fait confiance à Digital Moov pour développer une campagne publicitaire sur les réseaux sociaux. En utilisant des ciblages précis et des annonces créatives, nous avons atteint plus de 1 million d'utilisateurs et généré un retour sur investissement (ROI) de 500 % pour DEF Electronics, établissant ainsi leur positionnement sur le marché.</p>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
          <div class="card-item">
            <div class="row">
              <div class="col-xl-5">
                <div class="card-bg" style="background-image: url({{ asset('digitalmoov/assets/img/1930702.jpg') }});"></div>
              </div>
              <div class="col-xl-7 d-flex align-items-center">
                <div class="card-body">
                  <h4 class="card-title">Reconnaissance de l'industrie - Prix du Meilleur Agence de Marketing Digital</h4>
                  <p>Digital Moov est honoré d'avoir été désigné Meilleure Agence de Marketing Digital de l'année par l'Association des Professionnels du Marketing. Cette reconnaissance témoigne de notre engagement envers l'excellence et de notre capacité à offrir des résultats exceptionnels à nos clients.</p>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Card Item -->

      </div>

    </div>
  </section><!-- End Constructions Section -->


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