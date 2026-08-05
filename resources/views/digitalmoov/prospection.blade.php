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
          <li><a href="{{ route('digitalmoov') }}">Agence</a></li>
          <li><a href="{{ route('digitalmoov.about') }}">A propos </a></li>
          <li><a href="{{ route('digitalmoov.services') }}"  class="active">Expertises</a></li>
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
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('digitalmoov/assets/img/cheerful-businesspeople-reaching-agreement.jpg') }}');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Prospection commerciale
        </h2>
        
        <ol>
          <li><a href="{{ route('digitalmoov') }}">Agence</a></li>
          <li>Expertises</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Service Details Section ======= -->
    <section id="service-details" class="service-details">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="services-list">
                <h4>Nos Besoins : </h4>

              <a href="#" class="active">1. Identification des Prospects</a>
              <a href="#" class="active">2. Développement de Stratégies</a>
              <a href="#" class="active">3. Communication Convaincante </a>
              <a href="#" class="active">4. Suivi et Relance</a>
            </div>

            
<a href="{{ route('digitalmoov.connexion') }}" class="button">Réserver</a>
                <style>
                  /* Style pour le bouton */
                  .button {
                      display: inline-block;
                      padding: 10px 20px;
                      background-color: #B86409;
                      color: #fff;
                      text-decoration: none; /* Supprime le soulignement du lien */
                      border-radius: 5px;
                  }
          
                  /* Style pour le survol du bouton */
                  .button:hover {
                      background-color: #B86409;
                  }
              </style>
          </div>

          

          <div class="col-lg-8">
            <img src="{{ asset('digitalmoov/assets/img/applicant-greeting-hr-manager-job-interview.jpg') }}" alt="" class="img-fluid services-img">
            <h3>Prospection Commerciale avec Digital Moov : Élargissez vos Horizons !</h3>
            <p>
                La prospection commerciale est le cœur battant de toute entreprise cherchant à développer son activité et à conquérir de nouveaux marchés. Chez Digital Moov, notre approche de la prospection commerciale est guidée par des valeurs solides et une compréhension profonde des besoins de nos clients.            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span> Persévérance : Nous croyons en la persévérance et la détermination dans la prospection commerciale. Notre équipe est prête à relever les défis et à explorer de nouvelles opportunités pour vous aider à développer votre activité.</span></li>
              <li><i class="bi bi-check-circle"></i> <span> Relationnel : Nous accordons une grande importance aux relations humaines dans nos activités de prospection. Nous cherchons à établir des liens solides et durables avec vos prospects, basés sur la confiance et le respect mutuel.</span></li>
              <li><i class="bi bi-check-circle"></i> <span> Créativité : L'innovation et la créativité sont au cœur de notre approche de la prospection commerciale. Nous sommes constamment à la recherche de nouvelles idées et de nouvelles stratégies pour attirer l'attention de vos prospects et les convertir en clients.</span></li>
              <li><i class="bi bi-check-circle"></i> <span> Résultats : Nous sommes orientés vers les résultats. Notre objectif ultime est de générer des leads qualifiés et des opportunités d'affaires tangibles qui contribuent à la croissance et à la rentabilité de votre entreprise.</span></li>

            </ul>

           
            
          </div>

        </div>

      </div>
    </section><!-- End Service Details Section -->

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
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
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

</body>

</html>