<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Digital-MOOV</title>
  <meta content="" name="description">
  <meta name="keywords" content="marketing digital, agence de marketing digital, CAEI DIGITAL MOOV, création de sites web, refonte de sites web, développement web, conception de sites internet, 
    UX/UI design, gestion des médias sociaux, stratégies de médias sociaux, optimisation des réseaux sociaux, stratégie numérique, stratégie digitale, stratégies de marketing digital, prospection commerciale, 
    acquisition de clients, génération de leads, campagnes d'emailing, email marketing, rédaction de contenu web, content marketing, rédaction SEO, SEO, optimisation pour les moteurs de recherche, 
    analyse de données, data analytics, publicité en ligne, Google Ads, Facebook Ads, publicité sur les réseaux sociaux, branding numérique, e-réputation, gestion de l'e-réputation, transformation numérique,
    solutions numériques, transformation digitale, automatisation du marketing, marketing automation, croissance en ligne, visibilité en ligne, engagement en ligne, engagement sur les réseaux sociaux, 
    influence marketing, influenceurs, collaboration avec des influenceurs, inbound marketing, marketing de contenu, création de contenu, contenu visuel, vidéos marketing, storytelling, stratégie de contenu,
    performance marketing, marketing axé sur la performance, retargeting, remarketing, marketing multi-canal, CRM, gestion de la relation client, expérience client, personnalisation de l'expérience client, 
    intelligence artificielle en marketing, AI marketing, big data, analyse de big data, tendances numériques, commerce électronique, e-commerce, site e-commerce, vente en ligne, optimisation de la conversion,
    taux de conversion, analyse des taux de conversion, fidélisation client, campagnes de fidélisation, campagnes publicitaires, innovation numérique, technologies numériques, 
    solutions web, services numériques">
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
  <link href="{{ asset('digitalmoov/assets/css/main.css') }}?v=3.0" rel="stylesheet">
  <link href="{{ asset('digitalmoov/assets/css/modern.css') }}?v=3.0" rel="stylesheet">

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
        <img src="{{ asset('digitalmoov/assets/img/caei dm cov.png') }}" alt="" style="max-height: 65px; width: auto; object-fit: contain;">
      </div>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{ route('home') }}" style="color: #ff9e59; font-weight: 700;"><i class="bi bi-arrow-left me-1"></i> Accueil</a></li>
          <li><a href="{{ route('digitalmoov') }}" class="active">Agence</a></li>
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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">

    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <span data-aos="fade-down" class="section-tag-pill mb-3" style="background: rgba(184, 100, 9, 0.25); color: #ff9e59; border-color: rgba(255, 158, 89, 0.4);">
              <i class="bi bi-rocket-takeoff-fill text-warning"></i> Agence de Marketing Digital & Web
            </span>
            <h2 data-aos="fade-down" style="font-weight: 800; color: #ffffff; text-align: center; font-size: 3rem; line-height: 1.2; text-shadow: 0 4px 20px rgba(0,0,0,0.6);" class="mb-3">
              Bienvenue chez <span style="background: linear-gradient(135deg, #ff9e59 0%, #b86409 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Digital MOOV</span>
            </h2>
           
            <p data-aos="fade-up" style="font-size: 1.2rem; color: #e2e8f0; max-width: 680px;" class="mx-auto mb-4">Votre partenaire d'excellence pour une transformation numérique réussie et des performances mesurables.</p>
            <div data-aos="fade-up" data-aos-delay="200" class="d-flex justify-content-center gap-3">
              <a href="{{ route('digitalmoov.contact') }}" class="ref-cta-btn fs-6">Contactez-nous <i class="bi bi-arrow-right-circle-fill"></i></a>
              <a href="{{ route('digitalmoov.services') }}" class="btn btn-outline-light rounded-pill px-4 py-3 fw-bold border-2 d-inline-flex align-items-center gap-2">Nos Expertises <i class="bi bi-grid-fill"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-item active" >
        <video autoplay muted loop style="width: 100%;">
          <source src="{{ asset('digitalmoov/assets/img/1114916_Man_Woman_Job_1280x720.mp4') }}" type="video/mp4" />
      </video>
      </div>
     

      
    </div>

  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Get Started Section ======= -->
    <section id="get-started" class="get-started section-bg">
      <div class="container">

        <div class="row justify-content-between gy-4">

          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
            <div class="content">
              <h3>Démarrez dès aujourd'hui votre voyage vers le succès en ligne avec Digital Moov. </h3>
              <p>Vous souhaitez propulser votre présence en ligne et stimuler la croissance de votre entreprise ? N'hésitez pas à nous contacter pour discuter de vos besoins en marketing digital. Notre équipe dévouée est là pour vous aider à atteindre vos objectifs et à réussir sur le web.
              <p>Notre équipe experte en marketing digital est là pour vous accompagner à chaque étape. Contactez-nous dès maintenant pour découvrir comment nous pouvons propulser votre entreprise vers de nouveaux sommets !"</p>
            </div>
          </div>

          <div class="col-lg-5" data-aos="fade">
            <form action="{{ route('contact.send') }}" method="post" id="quoteForm" class="php-email-form"> @csrf
              <h3>Contactez-nous!</h3>
              <div class="row gy-3">

                <div class="col-md-12">
                  <input type="text" name="name" class="form-control" placeholder="Nom" required>
                </div>

                <div class="col-md-12 ">
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="phone" placeholder="Numéro" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your quote request has been sent successfully. Thank you!</div>

                  <button type="submit">Envoyer</button>
                </div>

              </div>
            </form>
          </div><!-- End Quote Form -->

        </div>

      </div>
    </section><!-- End Get Started Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Services</h2>
          <p>Découvrez une gamme complète de services de marketing digital chez Digital Moov</p>
        </div>

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative h-100 shadow-sm border-0 rounded-4 overflow-hidden bg-white d-flex flex-column transition-all hover-lift">
              <div class="service-img position-relative overflow-hidden" style="height: 200px;">
                <img src="{{ asset('digitalmoov/assets/img/dm_service_webdev.jpg') }}" alt="Création de sites web" class="img-fluid w-100 h-100 object-fit-cover">
                <div class="icon position-absolute top-0 end-0 m-3 bg-dark bg-opacity-75 text-orange-500 rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; backdrop-filter: blur(8px);">
                  <i class="fa-solid fa-laptop text-orange-500 fs-5"></i>
                </div>
              </div>
              <div class="p-4 d-flex flex-column flex-grow-1 justify-content-between">
                <div>
                  <h3 class="h5 fw-bold text-dark mb-2">Création ou refonte des sites web</h3>
                  <p class="text-muted small leading-relaxed">Créez ou modernisez votre présence en ligne avec notre expertise sur-mesure en développement et design web.</p>
                </div>
                <a href="{{ route('digitalmoov.service-details') }}" class="readmore stretched-link text-orange-600 fw-bold text-decoration-none d-inline-flex align-items-center gap-1 mt-3">Savoir plus <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative h-100 shadow-sm border-0 rounded-4 overflow-hidden bg-white d-flex flex-column transition-all hover-lift">
              <div class="service-img position-relative overflow-hidden" style="height: 200px;">
                <img src="{{ asset('digitalmoov/assets/img/dm_service_editorial.jpg') }}" alt="Éditorial de contenu web" class="img-fluid w-100 h-100 object-fit-cover">
                <div class="icon position-absolute top-0 end-0 m-3 bg-dark bg-opacity-75 text-orange-500 rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; backdrop-filter: blur(8px);">
                  <i class="fa-solid fa-pen-nib text-orange-500 fs-5"></i>
                </div>
              </div>
              <div class="p-4 d-flex flex-column flex-grow-1 justify-content-between">
                <div>
                  <h3 class="h5 fw-bold text-dark mb-2">Éditorial de contenu web</h3>
                  <p class="text-muted small leading-relaxed">Optimisez votre contenu en ligne avec notre service éditorial professionnel et rédaction SEO haut de gamme.</p>
                </div>
                <a href="{{ route('digitalmoov.service-details') }}" class="readmore stretched-link text-orange-600 fw-bold text-decoration-none d-inline-flex align-items-center gap-1 mt-3">Savoir plus <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative h-100 shadow-sm border-0 rounded-4 overflow-hidden bg-white d-flex flex-column transition-all hover-lift">
              <div class="service-img position-relative overflow-hidden" style="height: 200px;">
                <img src="{{ asset('digitalmoov/assets/img/dm_service_strategy.jpg') }}" alt="Stratégies numériques" class="img-fluid w-100 h-100 object-fit-cover">
                <div class="icon position-absolute top-0 end-0 m-3 bg-dark bg-opacity-75 text-orange-500 rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; backdrop-filter: blur(8px);">
                  <i class="fa-solid fa-chart-line text-orange-500 fs-5"></i>
                </div>
              </div>
              <div class="p-4 d-flex flex-column flex-grow-1 justify-content-between">
                <div>
                  <h3 class="h5 fw-bold text-dark mb-2">Création de stratégies numériques</h3>
                  <p class="text-muted small leading-relaxed">Concevez une stratégie numérique sur mesure pour propulser votre entreprise vers le succès et maximiser votre ROI.</p>
                </div>
                <a href="{{ route('digitalmoov.service-details') }}" class="readmore stretched-link text-orange-600 fw-bold text-decoration-none d-inline-flex align-items-center gap-1 mt-3">Savoir plus <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative h-100 shadow-sm border-0 rounded-4 overflow-hidden bg-white d-flex flex-column transition-all hover-lift">
              <div class="service-img position-relative overflow-hidden" style="height: 200px;">
                <img src="{{ asset('digitalmoov/assets/img/dm_service_social.jpg') }}" alt="Gestion des médias sociaux" class="img-fluid w-100 h-100 object-fit-cover">
                <div class="icon position-absolute top-0 end-0 m-3 bg-dark bg-opacity-75 text-orange-500 rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; backdrop-filter: blur(8px);">
                  <i class="fa-solid fa-share-nodes text-orange-500 fs-5"></i>
                </div>
              </div>
              <div class="p-4 d-flex flex-column flex-grow-1 justify-content-between">
                <div>
                  <h3 class="h5 fw-bold text-dark mb-2">Gestion des médias sociaux</h3>
                  <p class="text-muted small leading-relaxed">Maximisez votre impact et votre notoriété sur les réseaux sociaux grâce à notre gestion stratégique de communauté.</p>
                </div>
                <a href="{{ route('digitalmoov.service-details') }}" class="readmore stretched-link text-orange-600 fw-bold text-decoration-none d-inline-flex align-items-center gap-1 mt-3">Savoir plus <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative h-100 shadow-sm border-0 rounded-4 overflow-hidden bg-white d-flex flex-column transition-all hover-lift">
              <div class="service-img position-relative overflow-hidden" style="height: 200px;">
                <img src="{{ asset('digitalmoov/assets/img/people-working-as-team-company.jpg') }}" alt="Prospection commerciale" class="img-fluid w-100 h-100 object-fit-cover">
                <div class="icon position-absolute top-0 end-0 m-3 bg-dark bg-opacity-75 text-orange-500 rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; backdrop-filter: blur(8px);">
                  <i class="fa-solid fa-bullseye text-orange-500 fs-5"></i>
                </div>
              </div>
              <div class="p-4 d-flex flex-column flex-grow-1 justify-content-between">
                <div>
                  <h3 class="h5 fw-bold text-dark mb-2">Prospection commerciale B2B</h3>
                  <p class="text-muted small leading-relaxed">Boostez vos ventes et générez des opportunités commerciales qualifiées grâce à nos techniques d'acquisition ciblées.</p>
                </div>
                <a href="{{ route('digitalmoov.service-details') }}" class="readmore stretched-link text-orange-600 fw-bold text-decoration-none d-inline-flex align-items-center gap-1 mt-3">Savoir plus <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative h-100 shadow-sm border-0 rounded-4 overflow-hidden bg-white d-flex flex-column transition-all hover-lift">
              <div class="service-img position-relative overflow-hidden" style="height: 200px;">
                <img src="{{ asset('digitalmoov/assets/img/la_strategie_marketing_digitale.jpg') }}" alt="Campagnes E-mailing" class="img-fluid w-100 h-100 object-fit-cover">
                <div class="icon position-absolute top-0 end-0 m-3 bg-dark bg-opacity-75 text-orange-500 rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; backdrop-filter: blur(8px);">
                  <i class="fa-solid fa-envelope-open-text text-orange-500 fs-5"></i>
                </div>
              </div>
              <div class="p-4 d-flex flex-column flex-grow-1 justify-content-between">
                <div>
                  <h3 class="h5 fw-bold text-dark mb-2">Campagnes E-mailing</h3>
                  <p class="text-muted small leading-relaxed">Engagez et fidélisez votre audience avec des campagnes e-mailing percutantes, personnalisées et à fort taux de conversion.</p>
                </div>
                <a href="{{ route('digitalmoov.service-details') }}" class="readmore stretched-link text-orange-600 fw-bold text-decoration-none d-inline-flex align-items-center gap-1 mt-3">Savoir plus <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Alt Services Section ======= -->
    <section id="alt-services" class="alt-services">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-around gy-4">
          <div class="col-lg-6 img-bg" style="background-image: url({{ asset('digitalmoov/assets/img/R1.jpg') }});" data-aos="zoom-in" data-aos-delay="100"></div>

          <div class="col-lg-5 d-flex flex-column justify-content-center">
            <h3>Les Fondations de la Réussite Numérique</h3>
            <p>En travaillant avec Digital Moov, les entreprises bénéficient d'un partenaire stratégique qui les aide à prospérer dans un paysage numérique en constante évolution, en leur offrant les outils, les connaissances et le soutien nécessaires pour réussir en ligne.</p>

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
              <i class="bi bi-easel flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Expertise Professionnelle :</a></h4>
                <p>Accès à une équipe d'experts en marketing digital dotés d'une expérience approfondie dans divers domaines, y compris le référencement, la publicité en ligne, les médias sociaux et le contenu.</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-patch-check flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Stratégies Personnalisées :</a></h4>
                <p>Des stratégies de marketing digital personnalisées, adaptées spécifiquement aux besoins uniques de chaque entreprise, visant à maximiser le retour sur investissement et à atteindre les objectifs commerciaux.</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-brightness-high flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Croissance de la Visibilité en Ligne : </a></h4>
                <p> Augmentation de la visibilité en ligne grâce à des techniques éprouvées de référencement, de gestion des médias sociaux et de publicité ciblée, ce qui permet d'atteindre un public plus large et d'augmenter le trafic sur le site web.</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-brightness-high flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Engagement Client Amélioré : </a></h4>
                <p> Création d'un contenu attrayant et pertinent qui attire et fidélise les clients potentiels, renforçant ainsi l'engagement et la confiance envers la marque.
                </p>
              </div>
            </div><!-- End Icon Box -->

          </div>
        </div>

      </div>
    </section><!-- End Alt Services Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features section-bg">
      <div class="container" data-aos="fade-up">

        <ul class="nav nav-tabs row  g-2 d-flex">

          <li class="nav-item col-3">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
              <h4>Qui sommes nous?</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
              <h4>Qu'est ce on vous propose ? </h4>
            </a><!-- End tab nav item -->

          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
              <h4>Notre mission!</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
              <h4>Nos valeurs!</h4>
            </a>
          </li><!-- End tab nav item -->

        </ul>

        <div class="tab-content">

          <div class="tab-pane active show" id="tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <h3>À Digital Moov, nous sommes les architectes de votre succès numérique.</h3>
                <p class="fst-italic">
                  Chez Digital Moov, nous sommes bien plus qu'une agence de marketing digital. Nous sommes des visionnaires, des créateurs et des stratèges déterminés à transformer votre présence en ligne en une expérience captivante et profitable. Avec notre expertise, notre passion et notre engagement envers votre succès, nous sommes là pour vous aider à atteindre de nouveaux sommets dans le monde numérique.
                </p>
                
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ asset('digitalmoov/assets/img/8.avif') }}" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane" id="tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>Digital Moov vous offre l'accès à des solutions de marketing digital innovantes et sur mesure.</h3>
                <p class="fst-italic">
                  A travers une liste de services diversifiée, nous contribuons au développement de vos activités et au renforcement de vos stratégies digitales. Nous mettons à votre disposition l'expertise d'une équipe dynamique, passionnée par le marketing et la communication digitale, composée de : experts, rédacteurs web, développeurs, marketeurs, designers, etc. Ils analysent vos besoins et vos attentes afin de vous proposer un ensemble de solutions idéales.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> Maximisez vos activités en ligne.</li>
                  <li><i class="bi bi-check2-all"></i>  Boostez votre entreprise.</li>
                  <li><i class="bi bi-check2-all"></i> Augmentez votre visibilité sur les moteurs de recherche et sur les sites de réseaux sociaux.</li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="{{ asset('digitalmoov/assets/img/solution.png') }}" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane" id="tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>Vers un Avenir Numérique Brillant</h3>
               
                <p class="fst-italic">
                  Notre mission chez Digital Moov est de propulser nos clients vers le succès dans le monde numérique en leur offrant des stratégies de marketing digital innovantes et personnalisées. Nous nous engageons à fournir des solutions de haute qualité qui répondent aux besoins spécifiques de chaque entreprise, tout en offrant un service client exceptionnel. Avec notre expertise et notre passion pour l'excellence, nous sommes déterminés à devenir le partenaire de confiance de nos clients dans leur parcours vers la croissance et la réussite en ligne.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="{{ asset('digitalmoov/assets/img/ill-mission-raison-d-etre.png') }}" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane" id="tab-4">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>Guidés par l'Intégrité, Propulsés par l'Innovation</h3>
                <p class="fst-italic">
                  Chez Digital Moov, nos valeurs fondamentales guident chacune de nos actions : l'innovation constante, l'intégrité inébranlable et le partenariat authentique avec nos clients, sont au cœur de tout ce que nous faisons.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> Créativité</li>
                  <li><i class="bi bi-check2-all"></i> Originalité</li>
                  <li><i class="bi bi-check2-all"></i> Réactivité</li>
                  <li><i class="bi bi-check2-all"></i> Qualité</li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="{{ asset('digitalmoov/assets/img/icon-valeurs.png') }}" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Our Projects Section ======= -->
    <section id="projects" class="projects">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Nos Projects</h2>
          <p>Nos projets chez Digital Moov ne se contentent pas de répondre à des besoins, ils incarnent notre passion pour l'excellence, notre engagement envers l'innovation et notre détermination à créer des solutions sur mesure qui propulsent nos clients vers de nouveaux sommets dans le monde numérique.</p>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

          <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">Tout</li>
            <li data-filter=".filter-remodeling">Site-Web</li>
            <li data-filter=".filter-construction">Construction</li>
            <li data-filter=".filter-repairs">Repairs</li>
            <li data-filter=".filter-design">Design</li>
          </ul><!-- End Projects Filters -->

          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
              <div class="portfolio-content h-100">
                <img src="{{ asset('digitalmoov/assets/img/tra.PNG') }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Remodeling 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="{{ asset('digitalmoov/assets/img/tra.PNG') }}" title="Remodeling 1" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="https://www.caei-afri.com/Elitetraining/" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
              <div class="portfolio-content h-100">
                <img src="{{ asset('digitalmoov/assets/img/optim.PNG') }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Construction 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="{{ asset('digitalmoov/assets/img/optim.PNG') }}" title="Construction 1" data-gallery="portfolio-gallery-construction" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('digitalmoov.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-repairs">
              <div class="portfolio-content h-100">
                <img src="{{ asset('digitalmoov/assets/img/projects/repairs-1.jpg') }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Repairs 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="{{ asset('digitalmoov/assets/img/projects/repairs-1.jpg') }}" title="Repairs 1" data-gallery="portfolio-gallery-repairs" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('digitalmoov.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-design">
              <div class="portfolio-content h-100">
                <img src="{{ asset('digitalmoov/assets/img/projects/design-1.jpg') }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Design 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="{{ asset('digitalmoov/assets/img/projects/design-1.jpg') }}" title="Repairs 1" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('digitalmoov.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
              <div class="portfolio-content h-100">
                <img src="{{ asset('digitalmoov/assets/img/projects/remodeling-2.jpg') }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Remodeling 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="{{ asset('digitalmoov/assets/img/projects/remodeling-2.jpg') }}" title="Remodeling 2" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('digitalmoov.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
              <div class="portfolio-content h-100">
                <img src="{{ asset('digitalmoov/assets/img/projects/construction-2.jpg') }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Construction 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="{{ asset('digitalmoov/assets/img/projects/construction-2.jpg') }}" title="Construction 2" data-gallery="portfolio-gallery-construction" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('digitalmoov.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-repairs">
              <div class="portfolio-content h-100">
                <img src="{{ asset('digitalmoov/assets/img/projects/repairs-2.jpg') }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Repairs 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="{{ asset('digitalmoov/assets/img/projects/repairs-2.jpg') }}" title="Repairs 2" data-gallery="portfolio-gallery-repairs" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('digitalmoov.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-design">
              <div class="portfolio-content h-100">
                <img src="{{ asset('digitalmoov/assets/img/projects/design-2.jpg') }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Design 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="{{ asset('digitalmoov/assets/img/projects/design-2.jpg') }}" title="Repairs 2" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('digitalmoov.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
              <div class="portfolio-content h-100">
                <img src="{{ asset('digitalmoov/assets/img/projects/remodeling-3.jpg') }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Remodeling 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="{{ asset('digitalmoov/assets/img/projects/remodeling-3.jpg') }}" title="Remodeling 3" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('digitalmoov.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
              <div class="portfolio-content h-100">
                <img src="{{ asset('digitalmoov/assets/img/projects/construction-3.jpg') }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Construction 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="{{ asset('digitalmoov/assets/img/projects/construction-3.jpg') }}" title="Construction 3" data-gallery="portfolio-gallery-construction" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('digitalmoov.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-repairs">
              <div class="portfolio-content h-100">
                <img src="{{ asset('digitalmoov/assets/img/projects/repairs-3.jpg') }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Repairs 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="{{ asset('digitalmoov/assets/img/projects/repairs-3.jpg') }}" title="Repairs 2" data-gallery="portfolio-gallery-repairs" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('digitalmoov.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-design">
              <div class="portfolio-content h-100">
                <img src="{{ asset('digitalmoov/assets/img/projects/design-3.jpg') }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Design 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="{{ asset('digitalmoov/assets/img/projects/design-3.jpg') }}" title="Repairs 3" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('digitalmoov.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

          </div><!-- End Projects Container -->

        </div>

      </div>
    </section><!-- End Our Projects Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Testimonials</h2>
          <p>Écoutez ce que nos clients satisfaits ont à dire sur leur expérience avec Digital Moov</p>
        </div>

        <div class="slides-2 swiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{ asset('digitalmoov/assets/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Digital Moov a transformé notre présence en ligne. Leur équipe est incroyablement professionnelle et compétente. Je recommande vivement leurs services !"
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{ asset('digitalmoov/assets/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Je suis impressionné par les résultats que nous avons obtenus avec Digital Moov. Leur expertise en marketing digital a considérablement augmenté notre visibilité en ligne et nos ventes.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{ asset('digitalmoov/assets/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Digital Moov a été un partenaire précieux pour notre entreprise. Leur expertise en marketing digital a généré des résultats concrets et tangibles, et leur service clientèle est tout simplement exceptionnel.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{ asset('digitalmoov/assets/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
                  <h3>Matt Brandon</h3>
                  <h4>Freelancer</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Travailler avec Digital Moov a été une bouffée d'air frais. Leur approche collaborative et leur engagement envers le succès de notre entreprise sont vraiment appréciés. Nous sommes ravis des progrès que nous avons réalisés grâce à leur aide.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{ asset('digitalmoov/assets/img/testimonials/testimonials-5.jpg') }}" class="testimonial-img" alt="">
                  <h3>John Larson</h3>
                  <h4>Entrepreneur</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Digital Moov a été le partenaire idéal pour notre entreprise. Leur approche stratégique et leur expertise en marketing digital ont considérablement amélioré notre visibilité en ligne et ont eu un impact direct sur nos résultats.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Derniers Articles Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">
      <div class="container" data-aos="fade-up"">

    
    
  <div class=" section-header">
        <h2>Derniers Articles</h2>
      </div>

      <div class="row gy-5">

        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="post-item position-relative h-100">

            <div class="post-img position-relative overflow-hidden">
              <img src="{{ asset('digitalmoov/assets/img/blog/blog-1.jpg') }}" class="img-fluid" alt="">
              <span class="post-date">12 Décembre</span>
            </div>

            <div class="post-content d-flex flex-column">

              <h3 class="post-title">Les 10 meilleures stratégies de marketing de contenu pour 2024</h3>

              <div class="meta d-flex align-items-center">
                <div class="d-flex align-items-center">
                  <i class="bi bi-person"></i> <span class="ps-2">Julia Parker</span>
                </div>
                <span class="px-3 text-black-50">/</span>
                <div class="d-flex align-items-center">
                  <i class="bi bi-folder2"></i> <span class="ps-2">Stratégie</span>
                </div>
              </div>

              <hr>

              <a href="{{ route('digitalmoov.blog-details') }}" class="readmore stretched-link"><span>Explorer</span><i class="bi bi-arrow-right"></i></a>

            </div>

          </div>
        </div><!-- End post item -->

        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="post-item position-relative h-100">

            <div class="post-img position-relative overflow-hidden">
              <img src="{{ asset('digitalmoov/assets/img/blog/blog-2.jpg') }}" class="img-fluid" alt="">
              <span class="post-date">17 Juillet</span>
            </div>

            <div class="post-content d-flex flex-column">

              <h3 class="post-title">Comment optimiser votre site web pour un meilleur référencement</h3>

              <div class="meta d-flex align-items-center">
                <div class="d-flex align-items-center">
                  <i class="bi bi-person"></i> <span class="ps-2">Mario Douglas</span>
                </div>
                <span class="px-3 text-black-50">/</span>
                <div class="d-flex align-items-center">
                  <i class="bi bi-folder2"></i> <span class="ps-2">Référencement</span>
                </div>
              </div>

              <hr>

              <a href="{{ route('digitalmoov.blog-details-2') }}" class="readmore stretched-link"><span>Explorer</span><i class="bi bi-arrow-right"></i></a>

            </div>

          </div>
        </div><!-- End post item -->

        <div class="col-xl-4 col-md-6">
          <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="300">

            <div class="post-img position-relative overflow-hidden">
              <img src="{{ asset('digitalmoov/assets/img/blog/blog-3.jpg') }}" class="img-fluid" alt="">
              <span class="post-date">30 Avril</span>
            </div>

            <div class="post-content d-flex flex-column">

              <h3 class="post-title">Les tendances incontournables en médias sociaux pour cette année</h3>

              <div class="meta d-flex align-items-center">
                <div class="d-flex align-items-center">
                  <i class="bi bi-person"></i> <span class="ps-2">Lisa Hunter</span>
                </div>
                <span class="px-3 text-black-50">/</span>
                <div class="d-flex align-items-center">
                  <i class="bi bi-folder2"></i> <span class="ps-2">Social Media</span>
                </div>
              </div>

              <hr>

              <a href="{{ route('digitalmoov.blog-details-3') }}" class="readmore stretched-link"><span>Explorer</span><i class="bi bi-arrow-right"></i></a>

            </div>

          </div>
        </div><!-- End post item -->

      </div>

      </div>
    </section>
    <!-- End Derniers Articles Section -->

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
      <x-intl-tel-input />
    </body>
</html>