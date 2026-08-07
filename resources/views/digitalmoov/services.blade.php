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
  <link href="{{ asset('digitalmoov/assets/css/modern.css') }}?v=2.0" rel="stylesheet">

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
        <li><a href="{{ route('digitalmoov.about') }}">A propos de nous?</a></li>
        <li><a href="{{ route('digitalmoov.services') }}" class="active">Expertises</a></li>
        <li><a href="{{ route('digitalmoov.projects') }}">Projects</a></li>
        <li><a href="{{ route('digitalmoov.blog') }}">Blog</a></li>
        <li><a href="{{ route('digitalmoov.contact') }}">Contact</a></li>
        <li><a href="{{ route('digitalmoov.contact') }}">Connexion</a></li>
      </ul>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('digitalmoov/assets/img/serivce-marketing-mix-7p-booms-bitner-toolshero.jpg') }}');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Explorez nos services</h2>
        <ol>
          <li><a href="{{ route('digitalmoov') }}">Agence</a></li>
          <li>Expertises</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

   <!-- ======= Services Section ======= -->
   <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-header text-center mb-5">
        <span class="section-tag-pill">
          <i class="bi bi-lightning-charge-fill text-warning"></i> Nos Expertises & Solutions
        </span>
        <h2 style="font-weight: 800; color: #0f172a; font-size: 2.2rem;" class="mt-2 mb-3">Nos Services Digital & Marketing</h2>
        <p class="mx-auto" style="max-width: 750px; color: #64748b; font-size: 1.05rem;">
          De la réflexion stratégique à la réalisation technique, nous activons les leviers digitaux les plus performants pour propulser votre entreprise.
        </p>
      </div>

      <div class="row gy-4">

        <!-- Service 1: Web -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-laptop"></i>
            </div>
            <h3>Création & Refonte de Sites Web</h3>
            <p>Créez ou modernisez votre présence en ligne avec des sites web sur-mesure, ultra-rapides, ergonomiques et optimisés pour la conversion.</p>
            <a href="{{ route('digitalmoov.service-details') }}" class="readmore stretched-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item 1 -->

        <!-- Service 2: Editorial -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-pencil-square"></i>
            </div>
            <h3>Rédaction & Éditorial Web</h3>
            <p>Optimisez votre visibilité et captez votre audience grâce à un contenu éditorial captivant, professionnel et structuré pour le SEO.</p>
            <a href="{{ route('digitalmoov.editorial') }}" class="readmore stretched-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item 2 -->

        <!-- Service 3: Stratégie -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-diagram-3-fill"></i>
            </div>
            <h3>Stratégie Numérique Sur-Mesure</h3>
            <p>Concevez une feuille de route digitale performante et alignée sur vos objectifs business pour distancer vos concurrents.</p>
            <a href="{{ route('digitalmoov.strategie') }}" class="readmore stretched-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item 3 -->

        <!-- Service 4: Media -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-share-fill"></i>
            </div>
            <h3>Gestion des Réseaux Sociaux</h3>
            <p>Développez une communauté engagée et boostez votre notoriété grâce à une gestion proactive de vos réseaux sociaux.</p>
            <a href="{{ route('digitalmoov.media') }}" class="readmore stretched-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item 4 -->

        <!-- Service 5: Prospection -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-funnel-fill"></i>
            </div>
            <h3>Prospection Commerciale</h3>
            <p>Générez un flux régulier de leads qualifiés et accélérez votre tunnel de conversion grâce à nos techniques de prospection ciblées.</p>
            <a href="{{ route('digitalmoov.prospection') }}" class="readmore stretched-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item 5 -->

        <!-- Service 6: Emailing -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-envelope-check-fill"></i>
            </div>
            <h3>Campagnes E-mailing & Automation</h3>
            <p>Engagez vos prospects et fidélisez vos clients avec des campagnes d'e-mailing automatisées à fort taux d'ouverture et de conversion.</p>
            <a href="{{ route('digitalmoov.emailing') }}" class="readmore stretched-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item 6 -->

        <!-- Service 7: Sponsor -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-megaphone-fill"></i>
            </div>
            <h3>Sponsoring & Partenariats Digital</h3>
            <p>Propulsez l'image de votre marque en l'associant à des événements et des leaders d'opinion stratégiques de votre secteur.</p>
            <a href="{{ route('digitalmoov.sponsor') }}" class="readmore stretched-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item 7 -->

        <!-- Service 8: SEO/SEA -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="800">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-search-heart"></i>
            </div>
            <h3>SEO & SEA (Référencement Google)</h3>
            <p>Dominez les premiers résultats de recherche Google grâce à une alliance puissante entre référencement naturel et annonces payantes.</p>
            <a href="{{ route('digitalmoov.sea') }}" class="readmore stretched-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item 8 -->

        <!-- Service 9: Audio-Visuel -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="900">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-film"></i>
            </div>
            <h3>Production Audio-Visuelle & Vidéo</h3>
            <p>Créez des vidéos immersives et du contenu multimédia captivant qui valorisent vos produits et marquent les esprits.</p>
            <a href="{{ route('digitalmoov.audio') }}" class="readmore stretched-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item 9 -->

      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Process Section ======= -->
  <section class="ref-process-section">
    <div class="container" data-aos="fade-up">
      <div class="section-header text-center mb-5">
        <span class="section-tag-pill">
          <i class="bi bi-gear-wide-connected text-warning"></i> Notre Méthodologie
        </span>
        <h2 style="font-weight: 800; color: #0f172a; font-size: 2.2rem;" class="mt-2 mb-3">Comment Nous Accompagnons Votre Succès</h2>
        <p class="mx-auto" style="max-width: 700px; color: #64748b; font-size: 1.05rem;">
          Une approche rigoureuse et orientée résultat en 4 étapes clés.
        </p>
      </div>

      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="process-step-card">
            <div class="process-step-number">01</div>
            <h4>Audit & Analyse</h4>
            <p>Étude approfondie de votre marché, de vos concurrents et de votre écosystème actuel.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="process-step-card">
            <div class="process-step-number">02</div>
            <h4>Stratégie & Plan</h4>
            <p>Élaboration d'un plan d'action sur-mesure avec choix des canaux à fort ROI.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="process-step-card">
            <div class="process-step-number">03</div>
            <h4>Production & Dév</h4>
            <p>Conception créative, rédaction, développement technique et déploiement des campagnes.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="process-step-card">
            <div class="process-step-number">04</div>
            <h4>Optimisation & ROI</h4>
            <p>Suivi en temps réel des KPI, reporting transparent et ajustements continus.</p>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Process Section -->

  <!-- ======= CTA Section ======= -->
  <section class="ref-cta-section">
    <div class="container" data-aos="zoom-in">
      <div class="ref-cta-banner text-center">
        <h2 style="font-weight: 800; font-size: 2.2rem;" class="mb-3">Besoin d'une expertise sur-mesure ?</h2>
        <p class="mx-auto mb-4" style="max-width: 650px; color: #cbd5e1; font-size: 1.1rem;">
          Discutons de vos projets et découvrez comment Digital Moov peut accélérer votre croissance digitale dès maintenant.
        </p>
        <a href="{{ route('digitalmoov.contact') }}" class="ref-cta-btn">
          Prendre rendez-vous avec un expert <i class="bi bi-calendar-check-fill"></i>
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