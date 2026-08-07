@extends('layouts.callcenter')

@section('title', 'Technologie et Télécom — CAEI Call Center (3D Glassmorphism)')

@section('content')
  <!-- Banner -->
  <section class="py-5 text-center position-relative">
    <div class="container py-4 position-relative z-1" data-aos="fade-up">
      <div class="glass-badge mb-4 d-inline-block">Secteur d'Expertise</div>
      <h1 class="display-4 fw-bold mb-3 text-white">Technologie et Télécom</h1>
      <p class="fs-5 max-w-2xl mx-auto mb-0" style="color: #cbd5e1;">Support technique de haut niveau pour fidéliser vos utilisateurs sur un marché hautement concurrentiel.</p>
    </div>
  </section>

  <!-- Content -->
  <section class="py-5 position-relative">
    <div class="container py-5">
      <div class="row align-items-center g-5">
        <div class="col-lg-6" data-aos="fade-right">
          <h2 class="display-5 fw-bold mb-4 text-white">Ingénierie du support client</h2>
          <p class="fs-5 mb-4" style="color: #cbd5e1; text-align: justify; line-height: 1.8;">Dans les secteurs de la Tech et des Télécommunications, l'expérience utilisateur est déterminée par l'agilité et la précision du support technique. La complexité de vos offres nécessite une vulgarisation efficace.</p>
          <p class="fs-5 mb-5" style="color: #cbd5e1; text-align: justify; line-height: 1.8;">Nos cellules dédiées au Helpdesk intègrent rapidement vos spécifications techniques (logiciels, équipements réseau, applications). Nous agissons en véritable extension de vos équipes de développement.</p>
          
          <div class="glass-card">
            <h5 class="fw-bold mb-4 text-white d-flex align-items-center"><i class="fa-solid fa-microchip fs-3 me-3" style="color: var(--cc-red);"></i> Périmètre d'intervention</h5>
            <ul class="list-unstyled mb-0">
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill me-3 mt-1 fs-5" style="color: var(--cc-red);"></i> <span style="color: #cbd5e1;" class="fs-6">Assistance technique (Helpdesk N1 & N2) et résolution d'incidents</span></li>
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill me-3 mt-1 fs-5" style="color: var(--cc-red);"></i> <span style="color: #cbd5e1;" class="fs-6">Support à l'installation, onboarding utilisateur et paramétrage</span></li>
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill me-3 mt-1 fs-5" style="color: var(--cc-red);"></i> <span style="color: #cbd5e1;" class="fs-6">Télévente B2B/B2C, upgrades d'abonnements (Up-selling)</span></li>
              <li class="mb-0 d-flex align-items-start"><i class="bi bi-check-circle-fill me-3 mt-1 fs-5" style="color: var(--cc-red);"></i> <span style="color: #cbd5e1;" class="fs-6">Stratégies de rétention et prévention de l'attrition (Churn)</span></li>
            </ul>
          </div>
        </div>
        
        <div class="col-lg-6" data-aos="fade-left">
          <div class="position-relative" style="perspective: 1000px;">
            <!-- Glow behind image -->
            <div class="position-absolute w-100 h-100 rounded-circle" style="background: rgba(255,255,255,0.2); filter: blur(80px); top: 10%; right: 10%; z-index: 0;"></div>
            
            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=2070&auto=format&fit=crop" class="img-fluid img-3d position-relative z-1" alt="Technologie" style="transform: rotateY(-5deg) rotateX(2deg);">
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
