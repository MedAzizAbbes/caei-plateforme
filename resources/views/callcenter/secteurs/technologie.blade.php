@extends('layouts.callcenter')

@section('title', 'Technologie et Télécom — CAEI Call Center (Minimaliste)')

@section('content')
  <!-- Banner -->
  <section class="py-5 bg-white text-center border-bottom border-light">
    <div class="container py-4" data-aos="fade-up">
      <span class="badge-clean mb-3">Secteur d'Expertise</span>
      <h1 class="display-5 fw-bold mb-3">Technologie et Télécom</h1>
      <p class="fs-5 text-muted max-w-2xl mx-auto mb-0">Support technique de haut niveau pour fidéliser vos utilisateurs sur un marché hautement concurrentiel.</p>
    </div>
  </section>

  <!-- Content -->
  <section class="py-5 section-light">
    <div class="container py-5">
      <div class="row align-items-center g-5">
        <div class="col-lg-6" data-aos="fade-right">
          <h3 class="display-6 fw-bold mb-4">Ingénierie du support client</h3>
          <p class="text-muted fs-6 mb-4" style="text-align: justify; line-height: 1.8;">Dans les secteurs de la Tech et des Télécommunications, l'expérience utilisateur est déterminée par l'agilité et la précision du support technique. La complexité de vos offres nécessite une vulgarisation efficace.</p>
          <p class="text-muted fs-6 mb-5" style="text-align: justify; line-height: 1.8;">Nos cellules dédiées au Helpdesk intègrent rapidement vos spécifications techniques (logiciels, équipements réseau, applications). Nous agissons en véritable extension de vos équipes de développement.</p>
          
          <div class="clean-card bg-white">
            <h5 class="fw-bold mb-4 d-flex align-items-center"><i class="fa-solid fa-microchip text-danger fs-4 me-3"></i> Périmètre d'intervention</h5>
            <ul class="list-unstyled mb-0">
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill text-danger me-3 mt-1 fs-6"></i> <span class="text-muted fs-6">Assistance technique (Helpdesk N1 & N2) et résolution d'incidents</span></li>
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill text-danger me-3 mt-1 fs-6"></i> <span class="text-muted fs-6">Support à l'installation, onboarding utilisateur et paramétrage</span></li>
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill text-danger me-3 mt-1 fs-6"></i> <span class="text-muted fs-6">Télévente B2B/B2C, upgrades d'abonnements (Up-selling)</span></li>
              <li class="mb-0 d-flex align-items-start"><i class="bi bi-check-circle-fill text-danger me-3 mt-1 fs-6"></i> <span class="text-muted fs-6">Stratégies de rétention et prévention de l'attrition (Churn)</span></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <div class="position-relative">
            <div class="position-absolute bg-white rounded-4 shadow-sm" style="top: 20px; left: -20px; right: 20px; bottom: -20px; border: 1px solid var(--cc-border); z-index: 0;"></div>
            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=2070&auto=format&fit=crop" class="img-fluid rounded-4 position-relative z-1" alt="Technologie" style="box-shadow: 0 10px 30px -10px rgba(0,0,0,0.1);">
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
