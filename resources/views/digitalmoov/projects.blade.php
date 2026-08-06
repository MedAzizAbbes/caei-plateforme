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
          <li><a href="{{ route('digitalmoov.about') }}">A propos </a></li>
          <li><a href="{{ route('digitalmoov.services') }}">Expertises</a></li>
          <li><a href="{{ route('digitalmoov.projects') }}" class="active">Projects</a></li>
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
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('digitalmoov/assets/img/people-working-as-team-company.jpg') }}');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Nos projets</h2>
        <ol>
          <li><a href="{{ route('digitalmoov') }}">Agence</a></li>
          <li>Projects</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Our Projects Section ======= -->
    <section id="projects" class="projects">
      <div class="container" data-aos="fade-up">

        <div class="section-header text-center mb-5">
          <span class="section-tag-pill">
            <i class="bi bi-grid-fill text-warning"></i> Notre Portfolio
          </span>
          <h2 style="font-weight: 800; color: #0f172a; font-size: 2.2rem;" class="mt-2 mb-3">Découvrez Nos Projets & Réalisations</h2>
          <p class="mx-auto" style="max-width: 750px; color: #64748b; font-size: 1.05rem;">
            Exploitez tout le potentiel de votre marque avec nos solutions digitales sur-mesure en développement web, design graphique, campagnes emailing et création de contenu.
          </p>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

          <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">Tous</li>
            <li data-filter=".filter-web">Développement Web</li>
            <li data-filter=".filter-design">Design Graphique</li>
            <li data-filter=".filter-email">Emails Pro</li>
            <li data-filter=".filter-content">Création de Contenu</li>
          </ul><!-- End Projects Filters -->

          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <!-- Item 1: Web -->
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-content h-100">
                <span class="project-card-badge"><i class="bi bi-code-slash"></i> Web Dev</span>
                <img src="{{ asset('digitalmoov/assets/img/dm_service_webdev.jpg') }}" class="img-fluid" alt="Plateforme E-Commerce Mode">
                <div class="portfolio-info">
                  <h4>Plateforme E-Commerce Mode</h4>
                  <p>Refonte complète UI/UX, plateforme Laravel sur-mesure & paiement sécurisé.</p>
                  <div class="action-links">
                    <a href="{{ asset('digitalmoov/assets/img/dm_service_webdev.jpg') }}" title="Plateforme E-Commerce Mode" data-gallery="portfolio-gallery-web" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="{{ route('digitalmoov.project-details') }}" title="Plus de détails" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Projects Item 1 -->

            <!-- Item 2: Design -->
            <div class="col-lg-4 col-md-6 portfolio-item filter-design">
              <div class="portfolio-content h-100">
                <span class="project-card-badge"><i class="bi bi-palette"></i> Design Graphique</span>
                <img src="{{ asset('digitalmoov/assets/img/projects/design-1.jpg') }}" class="img-fluid" alt="Identité Visuelle & Branding">
                <div class="portfolio-info">
                  <h4>Identité Visuelle & Branding</h4>
                  <p>Charte graphique corporate, création de logotype & déclinaisons visuelles.</p>
                  <div class="action-links">
                    <a href="{{ asset('digitalmoov/assets/img/projects/design-1.jpg') }}" title="Identité Visuelle & Branding" data-gallery="portfolio-gallery-design" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="{{ route('digitalmoov.project-details') }}" title="Plus de détails" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Projects Item 2 -->

            <!-- Item 3: Email -->
            <div class="col-lg-4 col-md-6 portfolio-item filter-email">
              <div class="portfolio-content h-100">
                <span class="project-card-badge"><i class="bi bi-envelope-paper"></i> Emailing Pro</span>
                <img src="{{ asset('digitalmoov/assets/img/dm_service_editorial.jpg') }}" class="img-fluid" alt="Campagne Emailing Automation">
                <div class="portfolio-info">
                  <h4>Campagne Emailing Automation</h4>
                  <p>Templates HTML interactifs, ciblage comportemental & séquences de conversion.</p>
                  <div class="action-links">
                    <a href="{{ asset('digitalmoov/assets/img/dm_service_editorial.jpg') }}" title="Campagne Emailing Automation" data-gallery="portfolio-gallery-email" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="{{ route('digitalmoov.project-details') }}" title="Plus de détails" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Projects Item 3 -->

            <!-- Item 4: Content -->
            <div class="col-lg-4 col-md-6 portfolio-item filter-content">
              <div class="portfolio-content h-100">
                <span class="project-card-badge"><i class="bi bi-camera-reels"></i> Contenu</span>
                <img src="{{ asset('digitalmoov/assets/img/dm_service_social.jpg') }}" class="img-fluid" alt="Stratégie Social Media & Vidéo">
                <div class="portfolio-info">
                  <h4>Stratégie Social Media & Vidéo</h4>
                  <p>Production de contenus animés, Reels & visuels haute définition engageants.</p>
                  <div class="action-links">
                    <a href="{{ asset('digitalmoov/assets/img/dm_service_social.jpg') }}" title="Stratégie Social Media & Vidéo" data-gallery="portfolio-gallery-content" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="{{ route('digitalmoov.project-details') }}" title="Plus de détails" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Projects Item 4 -->

            <!-- Item 5: Web -->
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-content h-100">
                <span class="project-card-badge"><i class="bi bi-laptop"></i> Web Dev</span>
                <img src="{{ asset('digitalmoov/assets/img/front-view-online-shopping-concept.jpg') }}" class="img-fluid" alt="Portail Client Interactif">
                <div class="portfolio-info">
                  <h4>Portail Client & SaaS</h4>
                  <p>Dashboard sur-mesure avec intégration d'outils métiers & API interactives.</p>
                  <div class="action-links">
                    <a href="{{ asset('digitalmoov/assets/img/front-view-online-shopping-concept.jpg') }}" title="Portail Client & SaaS" data-gallery="portfolio-gallery-web" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="{{ route('digitalmoov.project-details') }}" title="Plus de détails" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Projects Item 5 -->

            <!-- Item 6: Design -->
            <div class="col-lg-4 col-md-6 portfolio-item filter-design">
              <div class="portfolio-content h-100">
                <span class="project-card-badge"><i class="bi bi-brush"></i> UI/UX Design</span>
                <img src="{{ asset('digitalmoov/assets/img/projects/design-2.jpg') }}" class="img-fluid" alt="Design d'Interface Mobile App">
                <div class="portfolio-info">
                  <h4>Design Mobile App UX/UI</h4>
                  <p>Prototypage Figma, maquettage interactif et design de parcours utilisateur intuitifs.</p>
                  <div class="action-links">
                    <a href="{{ asset('digitalmoov/assets/img/projects/design-2.jpg') }}" title="Design Mobile App UX/UI" data-gallery="portfolio-gallery-design" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="{{ route('digitalmoov.project-details') }}" title="Plus de détails" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Projects Item 6 -->

            <!-- Item 7: Email -->
            <div class="col-lg-4 col-md-6 portfolio-item filter-email">
              <div class="portfolio-content h-100">
                <span class="project-card-badge"><i class="bi bi-send-check"></i> Emailing Pro</span>
                <img src="{{ asset('digitalmoov/assets/img/relation-client-digital.png') }}" class="img-fluid" alt="Série de Newsletters B2B">
                <div class="portfolio-info">
                  <h4>Série de Newsletters B2B</h4>
                  <p>Conception de newsletters hebdomadaires à fort engagement & segmentation d'audience.</p>
                  <div class="action-links">
                    <a href="{{ asset('digitalmoov/assets/img/relation-client-digital.png') }}" title="Série de Newsletters B2B" data-gallery="portfolio-gallery-email" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="{{ route('digitalmoov.project-details') }}" title="Plus de détails" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Projects Item 7 -->

            <!-- Item 8: Content -->
            <div class="col-lg-4 col-md-6 portfolio-item filter-content">
              <div class="portfolio-content h-100">
                <span class="project-card-badge"><i class="bi bi-journal-text"></i> Brand Content</span>
                <img src="{{ asset('digitalmoov/assets/img/social-media-marketing-concept-marketing-with-applications.jpg') }}" class="img-fluid" alt="Campagne d'Influence & Content">
                <div class="portfolio-info">
                  <h4>Campagne Multi-Canal & Storytelling</h4>
                  <p>Déploiement de campagnes éditoriales à forte notoriété sur les réseaux sociaux.</p>
                  <div class="action-links">
                    <a href="{{ asset('digitalmoov/assets/img/social-media-marketing-concept-marketing-with-applications.jpg') }}" title="Campagne Multi-Canal & Storytelling" data-gallery="portfolio-gallery-content" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="{{ route('digitalmoov.project-details') }}" title="Plus de détails" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Projects Item 8 -->

            <!-- Item 9: Web -->
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-content h-100">
                <span class="project-card-badge"><i class="bi bi-globe"></i> Web Dev</span>
                <img src="{{ asset('digitalmoov/assets/img/dm_service_strategy.jpg') }}" class="img-fluid" alt="Site Corporate SEO-First">
                <div class="portfolio-info">
                  <h4>Site Corporate SEO-First</h4>
                  <p>Site d'entreprise responsive ultra-rapide optimisé pour le référencement naturel.</p>
                  <div class="action-links">
                    <a href="{{ asset('digitalmoov/assets/img/dm_service_strategy.jpg') }}" title="Site Corporate SEO-First" data-gallery="portfolio-gallery-web" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="{{ route('digitalmoov.project-details') }}" title="Plus de détails" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Projects Item 9 -->

          </div><!-- End Projects Container -->

        </div>

      </div>
    </section><!-- End Our Projects Section -->

    <!-- ======= CTA Section ======= -->
    <section class="ref-cta-section">
      <div class="container" data-aos="zoom-in">
        <div class="ref-cta-banner text-center">
          <h2 style="font-weight: 800; font-size: 2.2rem;" class="mb-3">Vous avez un projet digital en tête ?</h2>
          <p class="mx-auto mb-4" style="max-width: 650px; color: #cbd5e1; font-size: 1.1rem;">
            Transformez vos idées en réalités performantes. Nos experts sont prêts à concevoir votre prochaine réussite.
          </p>
          <a href="{{ route('digitalmoov.contact') }}" class="ref-cta-btn">
            Lancer mon projet <i class="bi bi-rocket-takeoff-fill"></i>
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