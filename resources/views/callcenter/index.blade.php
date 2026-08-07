@extends('layouts.callcenter')

@section('title', 'Accueil — CAEI Call Center (Minimaliste)')

@section('content')
  <!-- Hero Minimalist -->
  <section class="py-5 bg-white position-relative overflow-hidden">
    <!-- Subtle background decoration -->
    <div class="position-absolute" style="top: -50px; right: -50px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(209, 17, 65, 0.03) 0%, transparent 70%); border-radius: 50%; z-index: 0;"></div>
    
    <div class="container py-lg-5 position-relative z-1">
      <div class="row align-items-center g-5">
        <div class="col-lg-6" data-aos="fade-up">
          <span class="badge-clean mb-4 d-inline-block">Excellence Opérationnelle 2.0</span>
          <h1 class="display-4 fw-bold mb-4" style="line-height: 1.15;">
            L'innovation au cœur de votre relation client.
          </h1>
          <p class="fs-5 text-muted mb-5" style="max-width: 500px;">
            Optimisez vos interactions, fidélisez vos clients et propulsez votre croissance grâce à nos solutions d'externalisation haut de gamme.
          </p>
          <div class="d-flex flex-wrap gap-3">
            <a href="{{ route('callcenter.contact') }}" class="btn-clean-red">Démarrer un projet</a>
            <a href="{{ route('callcenter.services') }}" class="btn-outline-clean">Découvrir nos services</a>
          </div>
          
          <div class="mt-5 pt-4 d-flex gap-5 border-top border-light">
            <div>
              <h3 class="fw-bold mb-1">98%</h3>
              <p class="text-muted small text-uppercase fw-semibold mb-0" style="letter-spacing: 0.5px; font-size: 11px;">Satisfaction</p>
            </div>
            <div>
              <h3 class="fw-bold mb-1">24/7</h3>
              <p class="text-muted small text-uppercase fw-semibold mb-0" style="letter-spacing: 0.5px; font-size: 11px;">Support</p>
            </div>
            <div>
              <h3 class="fw-bold mb-1">5M+</h3>
              <p class="text-muted small text-uppercase fw-semibold mb-0" style="letter-spacing: 0.5px; font-size: 11px;">Interactions</p>
            </div>
          </div>
        </div>
        
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="position-relative">
            <!-- Subtle shadow frame -->
            <div class="position-absolute bg-white rounded-4 shadow-sm" style="top: 20px; left: -20px; right: 20px; bottom: -20px; border: 1px solid var(--cc-border); z-index: 0;"></div>
            <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?q=80&w=2069&auto=format&fit=crop" class="img-fluid rounded-4 position-relative z-1" alt="Call Center" style="box-shadow: 0 10px 30px -10px rgba(0,0,0,0.1);">
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="container"><div class="section-divider my-0"></div></div>

  <!-- Services Minimalist -->
  <section class="py-5 section-light">
    <div class="container py-5">
      <div class="row mb-5 justify-content-between align-items-end">
        <div class="col-lg-6" data-aos="fade-right">
          <h2 class="display-6 fw-bold mb-3">Expertise Multisectorielle</h2>
          <p class="text-muted mb-0 fs-5">Des solutions sur-mesure pour chaque aspect de votre centre de contact.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0" data-aos="fade-left">
          <a href="{{ route('callcenter.services') }}" class="text-decoration-none fw-semibold" style="color: var(--cc-red);">Voir tous les services <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
      </div>

      <div class="row g-4">
        <!-- Service 1 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="clean-card">
            <div class="clean-icon">
              <i class="fa-solid fa-headset"></i>
            </div>
            <h4 class="fs-5 fw-bold mb-3">Support Client</h4>
            <p class="text-muted mb-0 small">Assistance technique et commerciale de premier ordre pour répondre aux exigences de vos clients avec précision et efficacité professionnelle.</p>
          </div>
        </div>
        
        <!-- Service 2 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="clean-card">
            <div class="clean-icon">
              <i class="fa-solid fa-phone-volume"></i>
            </div>
            <h4 class="fs-5 fw-bold mb-3">Télémarketing</h4>
            <p class="text-muted mb-0 small">Stratégies d'appels sortants pour générer des leads qualifiés, optimiser vos prises de rendez-vous et accroître vos performances.</p>
          </div>
        </div>

        <!-- Service 3 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="clean-card">
            <div class="clean-icon">
              <i class="fa-solid fa-comments"></i>
            </div>
            <h4 class="fs-5 fw-bold mb-3">Gestion Omnicanal</h4>
            <p class="text-muted mb-0 small">Traitement centralisé et sécurisé des emails, chats, et réseaux sociaux pour une expérience client fluide et unifiée.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Minimalist -->
  <section class="py-5 bg-white">
    <div class="container py-5" data-aos="zoom-in">
      <div class="clean-card text-center py-5 border-0 bg-transparent" style="box-shadow: none;">
        <span class="badge-clean mb-3">Audit gratuit</span>
        <h2 class="display-5 fw-bold mb-4">Prêt à transformer votre service client ?</h2>
        <p class="fs-5 mb-5 mx-auto text-muted" style="max-width: 600px;">Consultez nos experts pour un audit de vos processus actuels et découvrez comment notre infrastructure peut réduire vos coûts.</p>
        <a href="{{ route('callcenter.contact') }}" class="btn-clean-red px-5 py-3">Planifier une consultation</a>
      </div>
    </div>
  </section>
@endsection
