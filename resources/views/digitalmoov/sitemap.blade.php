<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Carte du Site - Digital-MOOV</title>
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
  <link href="{{ asset('digitalmoov/assets/css/main.css') }}" rel="stylesheet">
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
        <h2>Carte du Site (Sitemap)</h2>
        <ol>
          <li><a href="{{ route('digitalmoov') }}">Accueil</a></li>
          <li>Sitemap</li>
        </ol>
      </div>
    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
      <div class="container" data-aos="fade-up">
        <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius: 12px; background: #fff;">
          <h3 class="mb-4 text-center" style="color: var(--color-primary); font-weight: 700;">Structure du site CAEI Platform</h3>
          <p class="text-muted text-center mb-5">
            Trouvez rapidement toutes les pages locales disponibles sur notre portail en ligne et nos filiales.
          </p>

          <div class="row g-4">
            <!-- Site Principal Column -->
            <div class="col-md-6">
              <div class="p-4 border rounded-3 h-100 bg-light">
                <h5 class="fw-bold text-dark mb-3"><i class="bi bi-globe me-2 text-primary"></i> CAEI Groupe Vitrine</h5>
                <ul class="list-unstyled ps-2 leading-relaxed">
                  <li class="mb-3">
                    <a href="{{ route('home') }}" class="text-decoration-none text-muted fw-bold d-block"><i class="bi bi-chevron-right me-1 text-primary"></i> Page d'accueil générale</a>
                    <span class="small text-muted ps-3">Portail officiel vitrine de CAEI Company Group</span>
                  </li>
                  <li class="mb-3">
                    <a href="{{ route('home.old') }}" class="text-decoration-none text-muted fw-bold d-block"><i class="bi bi-chevron-right me-1 text-primary"></i> Catalogue Elite Training (Séminaires)</a>
                    <span class="small text-muted ps-3">Inscription aux formations de séminaires</span>
                  </li>
                  <li class="mb-3">
                    <a href="{{ route('medical.services') }}" class="text-decoration-none text-muted fw-bold d-block"><i class="bi bi-chevron-right me-1 text-primary"></i> CAEI Medical Services</a>
                    <span class="small text-muted ps-3">Portail de services médicaux et assistance médicale</span>
                  </li>
                  <li class="mb-3">
                    <a href="{{ route('login') }}" class="text-decoration-none text-muted fw-bold d-block"><i class="bi bi-chevron-right me-1 text-primary"></i> Espace E-learning / Connexion</a>
                    <span class="small text-muted ps-3">Espace de connexion sécurisé Breeze</span>
                  </li>
                </ul>
              </div>
            </div>

            <!-- Digital Moov Column -->
            <div class="col-md-6">
              <div class="p-4 border rounded-3 h-100 bg-light">
                <h5 class="fw-bold text-dark mb-3" style="color: var(--color-primary) !important;"><i class="bi bi-cpu me-2"></i> CAEI Digital Moov</h5>
                <ul class="list-unstyled ps-2 leading-relaxed">
                  <li class="mb-2"><a href="{{ route('digitalmoov') }}" class="text-decoration-none text-muted"><i class="bi bi-chevron-right me-1 text-warning"></i> Page d'accueil Agence</a></li>
                  <li class="mb-2"><a href="{{ route('digitalmoov.about') }}" class="text-decoration-none text-muted"><i class="bi bi-chevron-right me-1 text-warning"></i> Présentation & Histoire</a></li>
                  <li class="mb-2"><a href="{{ route('digitalmoov.services') }}" class="text-decoration-none text-muted"><i class="bi bi-chevron-right me-1 text-warning"></i> Expertises (Services digitaux)</a></li>
                  <li class="mb-2"><a href="{{ route('digitalmoov.projects') }}" class="text-decoration-none text-muted"><i class="bi bi-chevron-right me-1 text-warning"></i> Projets réalisés</a></li>
                  <li class="mb-2"><a href="{{ route('digitalmoov.reference') }}" class="text-decoration-none text-muted"><i class="bi bi-chevron-right me-1 text-warning"></i> Références & Blog</a></li>
                  <li class="mb-2"><a href="{{ route('digitalmoov.contact') }}" class="text-decoration-none text-muted"><i class="bi bi-chevron-right me-1 text-warning"></i> Nous contacter</a></li>
                  <li class="mb-2"><a href="{{ asset('digitalmoov/pdf/CAEI DIGITAL MOOV CATALOGUE.pdf') }}" target="_blank" class="text-decoration-none text-muted"><i class="bi bi-chevron-right me-1 text-warning"></i> Catalogue Commercial (PDF)</a></li>
                  <li class="mb-2"><a href="{{ route('digitalmoov.privacy') }}" class="text-decoration-none text-muted"><i class="bi bi-chevron-right me-1 text-warning"></i> Politique de Confidentialité</a></li>
                  <li class="mb-2"><a href="{{ route('digitalmoov.terms') }}" class="text-decoration-none text-muted"><i class="bi bi-chevron-right me-1 text-warning"></i> Mentions Légales & CGU</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

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
  <script src="{{ asset('digitalmoov/assets/js/main.js') }}"></script>
  <script>
    AOS.init({
      duration: 800,
      easing: 'slide',
      once: true
    });
  </script>
</body>
</html>
