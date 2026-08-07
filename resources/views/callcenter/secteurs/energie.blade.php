@extends('layouts.callcenter')

@section('title', 'Secteur Énergie et Environnement — CAEI Call Center (Minimaliste)')

@section('content')
  <!-- Banner -->
  <section class="py-5 bg-white text-center border-bottom border-light">
    <div class="container py-4" data-aos="fade-up">
      <span class="badge-clean mb-3">Secteur d'Expertise</span>
      <h1 class="display-5 fw-bold mb-3">Énergie et Environnement</h1>
      <p class="fs-5 text-muted max-w-2xl mx-auto mb-0">Accompagnement opérationnel pour les acteurs de la transition énergétique et les fournisseurs d'utilités.</p>
    </div>
  </section>

  <!-- Content -->
  <section class="py-5 section-light">
    <div class="container py-5">
      <div class="row align-items-center g-5">
        <div class="col-lg-6" data-aos="fade-right">
          <h3 class="display-6 fw-bold mb-4">Maîtrise des enjeux énergétiques</h3>
          <p class="text-muted fs-6 mb-4" style="text-align: justify; line-height: 1.8;">Le secteur de l'énergie et de l'environnement requiert une communication transparente face aux défis de la transition écologique, de la volatilité tarifaire et des évolutions réglementaires. Les consommateurs exigent une réactivité exemplaire.</p>
          <p class="text-muted fs-6 mb-5" style="text-align: justify; line-height: 1.8;">Le CAEI Call Center déploie des équipes spécifiquement formées aux produits énergétiques (électricité, gaz, renouvelables). Nous assurons un traitement qualitatif des flux d'information complexes.</p>
          
          <div class="clean-card bg-white">
            <h5 class="fw-bold mb-4 d-flex align-items-center"><i class="fa-solid fa-bolt text-danger fs-4 me-3"></i> Périmètre d'intervention</h5>
            <ul class="list-unstyled mb-0">
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill text-danger me-3 mt-1 fs-6"></i> <span class="text-muted fs-6">Gestion des cycles de vie contractuels (souscriptions, déménagements)</span></li>
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill text-danger me-3 mt-1 fs-6"></i> <span class="text-muted fs-6">Analyse et explication des structures de tarification</span></li>
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill text-danger me-3 mt-1 fs-6"></i> <span class="text-muted fs-6">Support technique de niveau 1 et coordination de dépannage</span></li>
              <li class="mb-0 d-flex align-items-start"><i class="bi bi-check-circle-fill text-danger me-3 mt-1 fs-6"></i> <span class="text-muted fs-6">Planification et ordonnancement des interventions techniques</span></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <div class="position-relative">
            <div class="position-absolute bg-white rounded-4 shadow-sm" style="top: 20px; left: -20px; right: 20px; bottom: -20px; border: 1px solid var(--cc-border); z-index: 0;"></div>
            <img src="https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?q=80&w=2070&auto=format&fit=crop" class="img-fluid rounded-4 position-relative z-1" alt="Secteur Énergie" style="box-shadow: 0 10px 30px -10px rgba(0,0,0,0.1);">
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
