@extends('layouts.callcenter')

@section('title', 'Assurance et Finance — CAEI Call Center (3D Glassmorphism)')

@section('content')
  <!-- Banner -->
  <section class="py-5 text-center position-relative">
    <div class="container py-4 position-relative z-1" data-aos="fade-up">
      <div class="glass-badge mb-4 d-inline-block">Secteur d'Expertise</div>
      <h1 class="display-4 fw-bold mb-3 text-white">Assurance et Finance</h1>
      <p class="fs-5 max-w-2xl mx-auto mb-0" style="color: #cbd5e1;">Confidentialité absolue et rigueur de traitement pour rassurer vos assurés et investisseurs.</p>
    </div>
  </section>

  <!-- Content -->
  <section class="py-5 position-relative">
    <div class="container py-5">
      <div class="row align-items-center g-5 flex-lg-row-reverse">
        <div class="col-lg-6" data-aos="fade-left">
          <h2 class="display-5 fw-bold mb-4 text-white">Sécurité des Données & Empathie</h2>
          <p class="fs-5 mb-4" style="color: #cbd5e1; text-align: justify; line-height: 1.8;">Le domaine bancaire et assurantiel repose sur la confiance. Face à un sinistre ou à une interrogation financière, vos clients exigent une prise en charge immédiate, sécurisée et empathique.</p>
          <p class="fs-5 mb-5" style="color: #cbd5e1; text-align: justify; line-height: 1.8;">Nos collaborateurs opèrent sous des protocoles stricts de confidentialité et bénéficient d'une formation approfondie sur vos produits financiers. Ils désamorcent les situations sensibles avec un grand professionnalisme.</p>
          
          <div class="glass-card">
            <h5 class="fw-bold mb-4 text-white d-flex align-items-center"><i class="fa-solid fa-shield-halved fs-3 me-3" style="color: var(--cc-red);"></i> Périmètre d'intervention</h5>
            <ul class="list-unstyled mb-0">
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill me-3 mt-1 fs-5" style="color: var(--cc-red);"></i> <span style="color: #cbd5e1;" class="fs-6">Déclaration, suivi et orientation de sinistres en temps réel</span></li>
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill me-3 mt-1 fs-5" style="color: var(--cc-red);"></i> <span style="color: #cbd5e1;" class="fs-6">Support commercial à la souscription de nouveaux contrats</span></li>
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill me-3 mt-1 fs-5" style="color: var(--cc-red);"></i> <span style="color: #cbd5e1;" class="fs-6">Recouvrement amiable et gestion des portefeuilles d'impayés</span></li>
              <li class="mb-0 d-flex align-items-start"><i class="bi bi-check-circle-fill me-3 mt-1 fs-5" style="color: var(--cc-red);"></i> <span style="color: #cbd5e1;" class="fs-6">Planification de rendez-vous pour vos conseillers réseaux</span></li>
            </ul>
          </div>
        </div>
        
        <div class="col-lg-6" data-aos="fade-right">
          <div class="position-relative" style="perspective: 1000px;">
            <!-- Glow behind image -->
            <div class="position-absolute w-100 h-100 rounded-circle" style="background: var(--cc-red); filter: blur(80px); opacity: 0.15; top: 10%; left: 10%; z-index: 0;"></div>
            
            <img src="https://images.unsplash.com/photo-1556740714-a8395b3bf30f?q=80&w=2070&auto=format&fit=crop" class="img-fluid img-3d position-relative z-1" alt="Finance" style="transform: rotateY(5deg) rotateX(2deg);">
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
