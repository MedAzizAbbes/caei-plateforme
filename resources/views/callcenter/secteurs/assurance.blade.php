@extends('layouts.callcenter')

@section('title', 'Assurance et Finance — CAEI Call Center (Minimaliste)')

@section('content')
  <!-- Banner -->
  <section class="py-5 bg-white text-center border-bottom border-light">
    <div class="container py-4" data-aos="fade-up">
      <span class="badge-clean mb-3">Secteur d'Expertise</span>
      <h1 class="display-5 fw-bold mb-3">Assurance et Finance</h1>
      <p class="fs-5 text-muted max-w-2xl mx-auto mb-0">Confidentialité absolue et rigueur de traitement pour rassurer vos assurés et investisseurs.</p>
    </div>
  </section>

  <!-- Content -->
  <section class="py-5 section-light">
    <div class="container py-5">
      <div class="row align-items-center g-5 flex-lg-row-reverse">
        <div class="col-lg-6" data-aos="fade-left">
          <h3 class="display-6 fw-bold mb-4">Sécurité des Données & Empathie</h3>
          <p class="text-muted fs-6 mb-4" style="text-align: justify; line-height: 1.8;">Le domaine bancaire et assurantiel repose sur la confiance. Face à un sinistre ou à une interrogation financière, vos clients exigent une prise en charge immédiate, sécurisée et empathique.</p>
          <p class="text-muted fs-6 mb-5" style="text-align: justify; line-height: 1.8;">Nos collaborateurs opèrent sous des protocoles stricts de confidentialité et bénéficient d'une formation approfondie sur vos produits financiers. Ils désamorcent les situations sensibles avec un grand professionnalisme.</p>
          
          <div class="clean-card bg-white">
            <h5 class="fw-bold mb-4 d-flex align-items-center"><i class="fa-solid fa-shield-halved text-danger fs-4 me-3"></i> Périmètre d'intervention</h5>
            <ul class="list-unstyled mb-0">
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill text-danger me-3 mt-1 fs-6"></i> <span class="text-muted fs-6">Déclaration, suivi et orientation de sinistres en temps réel</span></li>
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill text-danger me-3 mt-1 fs-6"></i> <span class="text-muted fs-6">Support commercial à la souscription de nouveaux contrats</span></li>
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill text-danger me-3 mt-1 fs-6"></i> <span class="text-muted fs-6">Recouvrement amiable et gestion des portefeuilles d'impayés</span></li>
              <li class="mb-0 d-flex align-items-start"><i class="bi bi-check-circle-fill text-danger me-3 mt-1 fs-6"></i> <span class="text-muted fs-6">Planification de rendez-vous pour vos conseillers réseaux</span></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-right">
          <div class="position-relative">
            <div class="position-absolute bg-white rounded-4 shadow-sm" style="top: 20px; left: 20px; right: -20px; bottom: -20px; border: 1px solid var(--cc-border); z-index: 0;"></div>
            <img src="https://images.unsplash.com/photo-1556740714-a8395b3bf30f?q=80&w=2070&auto=format&fit=crop" class="img-fluid rounded-4 position-relative z-1" alt="Finance" style="box-shadow: 0 10px 30px -10px rgba(0,0,0,0.1);">
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
