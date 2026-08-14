@extends('layouts.callcenter')

@section('title', 'CAEI Call Center - Accueil')

@section('content')
<!-- Hero Section -->
<div class="position-relative min-vh-100 d-flex align-items-center overflow-hidden">
  <div class="container py-5 mt-5 position-relative z-1">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0 text-center text-lg-start" data-aos="fade-right">
        <div class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-3 py-2 rounded-pill mb-4" style="backdrop-filter: blur(4px);">
          Support Client Nouvelle Génération
        </div>
        <h1 class="display-4 fw-bold text-white mb-4 lh-sm">
          Propulsez votre <br>
          <span class="text-gradient">Relation Client</span>
        </h1>
        <p class="lead text-white-50 mb-5" style="font-size: 1.15rem; max-width: 500px; margin: 0 auto; margin-lg-start: 0;">
          Des solutions sur mesure d'assistance téléphonique, de fidélisation et de prospection commerciale pour propulser votre entreprise vers l'avenir.
        </p>
        <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3">
          <a href="{{ route('callcenter.services') }}" class="btn-glass-red">Découvrir nos services</a>
          <a href="{{ route('callcenter.contact') }}" class="btn-glass-outline">Prendre RDV</a>
        </div>
        
        <div class="d-flex flex-wrap justify-content-center justify-content-lg-start mt-5 pt-4 gap-4 gap-md-5 border-top border-light border-opacity-10">
          <div>
            <h3 class="fw-bold text-white mb-0">98%</h3>
            <p class="small text-white-50 mb-0">Satisfaction Client</p>
          </div>
          <div class="d-none d-md-block" style="width: 1px; height: 40px; background: rgba(255,255,255,0.1);"></div>
          <div>
            <h3 class="fw-bold text-white mb-0">24/7</h3>
            <p class="small text-white-50 mb-0">Disponibilité</p>
          </div>
          <div class="d-none d-md-block" style="width: 1px; height: 40px; background: rgba(255,255,255,0.1);"></div>
          <div>
            <h3 class="fw-bold text-white mb-0">+10</h3>
            <p class="small text-white-50 mb-0">Langues parlées</p>
          </div>
        </div>
      </div>
      
      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
        <div class="position-relative p-4">
          <div class="position-absolute top-50 start-50 translate-middle w-75 h-75 bg-warning rounded-circle filter-blur-100" style="opacity: 0.2; filter: blur(60px); z-index: -1;"></div>
          
          <img src="{{ asset('assets/img/service_callcenter_1786525651775.jpg') }}" alt="Call Center Agent" class="img-fluid img-3d w-100 shadow-lg" style="border-radius: 24px; object-fit: cover; max-height: 420px; border: 1.5px solid rgba(255, 255, 255, 0.15);" loading="lazy">
          
          <!-- Floating UI Element -->
          <div class="position-absolute bottom-0 start-0 translate-middle-x mb-5 ms-5 glass-card p-3 d-none d-md-flex align-items-center gap-3" style="width: auto; animation: float 6s infinite ease-in-out;">
            <div style="width: 48px; height: 48px; background: rgba(59, 130, 246, 0.2); border: 1px solid rgba(59, 130, 246, 0.3); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
              <i class="bi bi-headset text-primary fs-4"></i>
            </div>
            <div>
              <p class="small text-white-50 mb-0">Agent Connecté</p>
              <h6 class="fw-bold text-white mb-0">En ligne</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
@keyframes float {
  0% { transform: translateY(0px); }
  50% { transform: translateY(-15px); }
  100% { transform: translateY(0px); }
}
</style>

<!-- Secteurs supprimés à la demande -->
@endsection
