@extends('layouts.callcenter')

@section('title', 'Secteur Énergie et Environnement — CAEI Call Center (3D Glassmorphism)')

@section('content')
  <!-- Banner -->
  <section class="py-5 text-center position-relative">
    <div class="container py-4 position-relative z-1" data-aos="fade-up">
      <div class="glass-badge mb-4 d-inline-block">Secteur d'Expertise</div>
      <h1 class="display-4 fw-bold mb-3 text-white">Énergie et Environnement</h1>
      <p class="fs-5 max-w-2xl mx-auto mb-0" style="color: #cbd5e1;">Accompagnement opérationnel pour les acteurs de la transition énergétique et les fournisseurs d'utilités.</p>
    </div>
  </section>

  <!-- Content -->
  <section class="py-5 position-relative">
    <div class="container py-5">
      <div class="row align-items-center g-5">
        <div class="col-lg-6" data-aos="fade-right">
          <h2 class="display-5 fw-bold mb-4 text-white">Maîtrise des enjeux énergétiques</h2>
          <p class="fs-5 mb-4" style="color: #cbd5e1; text-align: justify; line-height: 1.8;">Le secteur de l'énergie et de l'environnement requiert une communication transparente face aux défis de la transition écologique, de la volatilité tarifaire et des évolutions réglementaires. Les consommateurs exigent une réactivité exemplaire.</p>
          <p class="fs-5 mb-5" style="color: #cbd5e1; text-align: justify; line-height: 1.8;">Le CAEI Call Center déploie des équipes spécifiquement formées aux produits énergétiques (électricité, gaz, renouvelables). Nous assurons un traitement qualitatif des flux d'information complexes.</p>
          
          <div class="glass-card">
            <h5 class="fw-bold mb-4 text-white d-flex align-items-center"><i class="fa-solid fa-bolt fs-3 me-3" style="color: var(--cc-red);"></i> Périmètre d'intervention</h5>
            <ul class="list-unstyled mb-0">
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill me-3 mt-1 fs-5" style="color: var(--cc-red);"></i> <span style="color: #cbd5e1;" class="fs-6">Gestion des cycles de vie contractuels (souscriptions, déménagements)</span></li>
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill me-3 mt-1 fs-5" style="color: var(--cc-red);"></i> <span style="color: #cbd5e1;" class="fs-6">Analyse et explication des structures de tarification</span></li>
              <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill me-3 mt-1 fs-5" style="color: var(--cc-red);"></i> <span style="color: #cbd5e1;" class="fs-6">Support technique de niveau 1 et coordination de dépannage</span></li>
              <li class="mb-0 d-flex align-items-start"><i class="bi bi-check-circle-fill me-3 mt-1 fs-5" style="color: var(--cc-red);"></i> <span style="color: #cbd5e1;" class="fs-6">Planification et ordonnancement des interventions techniques</span></li>
            </ul>
          </div>
        </div>
        
        <div class="col-lg-6" data-aos="fade-left">
          <div class="position-relative" style="perspective: 1000px;">
            <!-- Glow behind image -->
            <div class="position-absolute w-100 h-100 rounded-circle" style="background: #4318ff; filter: blur(80px); opacity: 0.15; top: 10%; right: 10%; z-index: 0;"></div>
            
            <img src="https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?q=80&w=2070&auto=format&fit=crop" class="img-fluid img-3d position-relative z-1" alt="Secteur Énergie" style="transform: rotateY(-5deg) rotateX(2deg);">
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
