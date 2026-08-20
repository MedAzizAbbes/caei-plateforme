@extends('layouts.callcenter')

@section('title', 'CAEI Call Center - Accueil')

@section('content')
<!-- Hero Section -->
<div class="position-relative min-vh-100 d-flex align-items-center overflow-hidden">
  <div class="container py-5 mt-5 position-relative z-1">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
        <div class="glass-badge mb-4">
          Support Client Nouvelle Génération
        </div>
        <h1 class="display-4 fw-bold mb-4 lh-sm" style="color: #0f172a;">
          Propulsez votre <br>
          <span class="text-gradient">Relation Client</span>
        </h1>
        <p class="lead mb-5" style="color: #334155; font-size: 1.1rem; max-width: 520px;">
          Des solutions sur mesure d'assistance téléphonique, de fidélisation et de prospection commerciale pour propulser votre entreprise vers l'avenir.
        </p>
        <div class="d-flex flex-wrap gap-3">
          <a href="{{ route('callcenter.services') }}" class="btn-glass-red">Découvrir nos services</a>
          <a href="{{ route('callcenter.contact') }}" class="btn-glass-outline">Prendre RDV</a>
        </div>
        
        <div class="d-flex flex-wrap mt-5 pt-4 gap-4 gap-md-5" style="border-top: 1px solid rgba(226, 232, 240, 0.9);">
          <div>
            <h3 class="fw-bold mb-0" style="color: #0f172a;">98%</h3>
            <p class="small mb-0" style="color: #64748b;">Satisfaction Client</p>
          </div>
          <div class="d-none d-md-block" style="width: 1px; height: 40px; background: rgba(203, 213, 225, 0.8);"></div>
          <div>
            <h3 class="fw-bold mb-0" style="color: #0f172a;">24/7</h3>
            <p class="small mb-0" style="color: #64748b;">Disponibilité</p>
          </div>
          <div class="d-none d-md-block" style="width: 1px; height: 40px; background: rgba(203, 213, 225, 0.8);"></div>
          <div>
            <h3 class="fw-bold mb-0" style="color: #0f172a;">+10</h3>
            <p class="small mb-0" style="color: #64748b;">Langues parlées</p>
          </div>
        </div>
      </div>
      
      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
        <div class="position-relative p-2 p-md-3">
          <!-- Ambient Glow -->
          <div class="position-absolute top-50 start-50 translate-middle w-100 h-100 rounded-circle" style="background: radial-gradient(circle, rgba(127, 5, 4, 0.09) 0%, rgba(99, 102, 241, 0.04) 50%, transparent 70%); filter: blur(70px); z-index: -1;"></div>

          <!-- Main Clean Corporate Photo Container -->
          <div class="position-relative overflow-hidden" style="border-radius: 28px; box-shadow: 0 25px 60px -15px rgba(15, 23, 42, 0.16); border: 4px solid #ffffff; background: #ffffff;">
            <img src="{{ asset('assets/img/callcenter_team_hero.jpg') }}" alt="Équipe CAEI Call Center" class="img-fluid w-100" style="object-fit: cover; max-height: 470px; display: block; border-radius: 24px;" loading="lazy">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Secteurs supprimés à la demande -->
@endsection
