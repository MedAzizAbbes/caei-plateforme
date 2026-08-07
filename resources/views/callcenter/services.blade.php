@extends('layouts.callcenter')

@section('title', 'Solutions & Services — CAEI Call Center (Minimaliste)')

@section('content')
  <!-- Header -->
  <section class="py-5 bg-white text-center border-bottom border-light">
    <div class="container py-4" data-aos="fade-up">
      <span class="badge-clean mb-3">Notre Catalogue</span>
      <h1 class="display-5 fw-bold mb-3">Solutions & Services</h1>
      <p class="fs-5 text-muted max-w-2xl mx-auto mb-0">Un catalogue complet de prestations d'externalisation pour structurer et optimiser vos opérations de relation client.</p>
    </div>
  </section>

  <!-- Services Grid -->
  <section class="py-5 section-light">
    <div class="container py-5">
      <div class="row g-4">
        <!-- Service 1 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="clean-card">
            <div class="clean-icon">
              <i class="fa-solid fa-headset"></i>
            </div>
            <h5 class="fw-bold mb-3">Gestion de Service Client</h5>
            <p class="text-muted mb-0 small">Prise en charge intégrale des flux entrants (appels, emails, réseaux sociaux). Standardisation des processus de réponse pour une satisfaction client maximale et homogène.</p>
          </div>
        </div>

        <!-- Service 2 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="clean-card">
            <div class="clean-icon">
              <i class="fa-solid fa-screwdriver-wrench"></i>
            </div>
            <h5 class="fw-bold mb-3">Support Technique</h5>
            <p class="text-muted mb-0 small">Cellules d'assistance technique de Niveaux 1 et 2. Résolution d'incidents informatiques, support applicatif et accompagnement au déploiement technique.</p>
          </div>
        </div>

        <!-- Service 3 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="clean-card">
            <div class="clean-icon">
              <i class="fa-solid fa-chart-line"></i>
            </div>
            <h5 class="fw-bold mb-3">Acquisition & Télévente</h5>
            <p class="text-muted mb-0 small">Campagnes structurées d'appels sortants B2B et B2C. Qualification de fichiers, génération de leads, prise de rendez-vous qualifiés et closing commercial.</p>
          </div>
        </div>

        <!-- Service 4 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="clean-card">
            <div class="clean-icon">
              <i class="fa-solid fa-landmark"></i>
            </div>
            <h5 class="fw-bold mb-3">Prestations Institutionnelles</h5>
            <p class="text-muted mb-0 small">Dispositifs spécifiques pour les entités gouvernementales et parapubliques. Numéros verts, gestion de crise, enquêtes publiques et information citoyenne.</p>
          </div>
        </div>

        <!-- Service 5 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="clean-card">
            <div class="clean-icon">
              <i class="fa-solid fa-clipboard-check"></i>
            </div>
            <h5 class="fw-bold mb-3">Service Après-Vente (SAV)</h5>
            <p class="text-muted mb-0 small">Pilotage rigoureux des retours, réclamations, et suivis de garanties. Traitement des litiges avec diplomatie pour préserver l'image de marque de votre entreprise.</p>
          </div>
        </div>

        <!-- Service 6 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
          <div class="clean-card">
            <div class="clean-icon">
              <i class="fa-solid fa-database"></i>
            </div>
            <h5 class="fw-bold mb-3">Enquêtes & Data Processing</h5>
            <p class="text-muted mb-0 small">Réalisation de sondages, études de marché, nettoyage et enrichissement de bases de données (CRM) pour fiabiliser vos assets informationnels.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-5 bg-white text-center border-top border-light">
    <div class="container py-5" data-aos="zoom-in">
      <h3 class="display-6 fw-bold mb-3">Besoin d'une infrastructure dédiée ?</h3>
      <p class="text-muted fs-6 mb-5 mx-auto" style="max-width: 600px;">Consultez notre département commercial pour l'élaboration d'un cahier des charges sur-mesure répondant aux spécificités de vos processus métiers.</p>
      <a href="{{ route('callcenter.contact') }}" class="btn-clean-red px-5 py-3 fs-6">Demander une proposition commerciale</a>
    </div>
  </section>
@endsection
