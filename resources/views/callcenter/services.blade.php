@extends('layouts.callcenter')

@section('title', 'Solutions & Services — CAEI Call Center (3D Glassmorphism)')

@section('content')
  <!-- Header -->
  <section class="py-5 text-center position-relative">
    <div class="container py-4 position-relative z-1" data-aos="fade-up">
      <div class="glass-badge mb-4 d-inline-block">Notre Catalogue</div>
      <h1 class="display-4 fw-bold mb-3 text-white">Solutions & Services</h1>
      <p class="fs-5 max-w-2xl mx-auto mb-0" style="color: #cbd5e1;">Un catalogue complet de prestations d'externalisation pour structurer et optimiser vos opérations de relation client.</p>
    </div>
  </section>

  <!-- Services Grid -->
  <section class="py-5 position-relative">
    <div class="container py-5">
      <div class="row g-4">
        <!-- Service 1 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="glass-card">
            <div class="glass-icon-wrapper">
              <i class="fa-solid fa-headset"></i>
            </div>
            <h4 class="fw-bold mb-3 text-white">Gestion de Service Client</h4>
            <p class="mb-0 fs-6">Prise en charge intégrale des flux entrants (appels, emails, réseaux sociaux). Standardisation des processus de réponse pour une satisfaction client maximale et homogène.</p>
          </div>
        </div>

        <!-- Service 2 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="glass-card">
            <div class="glass-icon-wrapper">
              <i class="fa-solid fa-screwdriver-wrench"></i>
            </div>
            <h4 class="fw-bold mb-3 text-white">Support Technique</h4>
            <p class="mb-0 fs-6">Cellules d'assistance technique de Niveaux 1 et 2. Résolution d'incidents informatiques, support applicatif et accompagnement au déploiement technique.</p>
          </div>
        </div>

        <!-- Service 3 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="glass-card">
            <div class="glass-icon-wrapper">
              <i class="fa-solid fa-chart-line"></i>
            </div>
            <h4 class="fw-bold mb-3 text-white">Acquisition & Télévente</h4>
            <p class="mb-0 fs-6">Campagnes structurées d'appels sortants B2B et B2C. Qualification de fichiers, génération de leads, prise de rendez-vous qualifiés et closing commercial.</p>
          </div>
        </div>

        <!-- Service 4 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="glass-card">
            <div class="glass-icon-wrapper">
              <i class="fa-solid fa-landmark"></i>
            </div>
            <h4 class="fw-bold mb-3 text-white">Prestations Institutionnelles</h4>
            <p class="mb-0 fs-6">Dispositifs spécifiques pour les entités gouvernementales et parapubliques. Numéros verts, gestion de crise, enquêtes publiques et information citoyenne.</p>
          </div>
        </div>

        <!-- Service 5 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="glass-card">
            <div class="glass-icon-wrapper">
              <i class="fa-solid fa-clipboard-check"></i>
            </div>
            <h4 class="fw-bold mb-3 text-white">Service Après-Vente (SAV)</h4>
            <p class="mb-0 fs-6">Pilotage rigoureux des retours, réclamations, et suivis de garanties. Traitement des litiges avec diplomatie pour préserver l'image de marque de votre entreprise.</p>
          </div>
        </div>

        <!-- Service 6 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
          <div class="glass-card">
            <div class="glass-icon-wrapper">
              <i class="fa-solid fa-database"></i>
            </div>
            <h4 class="fw-bold mb-3 text-white">Enquêtes & Data Processing</h4>
            <p class="mb-0 fs-6">Réalisation de sondages, études de marché, nettoyage et enrichissement de bases de données (CRM) pour fiabiliser vos assets informationnels.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-5 position-relative text-center mt-4">
    <!-- Glowing orb -->
    <div class="position-absolute start-50 top-50 translate-middle rounded-circle" style="width: 500px; height: 500px; background: rgba(67, 24, 255, 0.15); filter: blur(80px); z-index: 0;"></div>
    
    <div class="container py-5 position-relative z-1" data-aos="zoom-in">
      <h3 class="display-5 fw-bold mb-4 text-white">Besoin d'une infrastructure dédiée ?</h3>
      <p class="fs-5 mb-5 mx-auto" style="color: #cbd5e1; max-width: 650px;">Consultez notre département commercial pour l'élaboration d'un cahier des charges sur-mesure répondant aux spécificités de vos processus métiers.</p>
      <a href="{{ route('callcenter.contact') }}" class="btn-glass-red px-5 py-3 fs-5 text-decoration-none">Demander une proposition commerciale</a>
    </div>
  </section>
@endsection
