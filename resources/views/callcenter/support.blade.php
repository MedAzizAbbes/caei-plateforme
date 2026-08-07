@extends('layouts.callcenter')

@section('title', 'Infrastructure de Support — CAEI Call Center (3D Glassmorphism)')

@section('content')
  <!-- Header -->
  <section class="py-5 text-center position-relative">
    <div class="container py-4 position-relative z-1" data-aos="fade-up">
      <div class="glass-badge mb-4 d-inline-block">Omnicanalité</div>
      <h1 class="display-4 fw-bold mb-3 text-white">Infrastructure de Support</h1>
      <p class="fs-5 max-w-2xl mx-auto mb-0" style="color: #cbd5e1;">Une disponibilité opérationnelle continue (24/7/365) déployée sur l'ensemble des canaux de communication.</p>
    </div>
  </section>

  <!-- Support Features -->
  <section class="py-5 position-relative">
    <div class="container py-5">
      <div class="row align-items-center mb-5">
        <div class="col-lg-5" data-aos="fade-right">
          <h2 class="display-5 fw-bold mb-4 text-white">Une présence systémique</h2>
          <p class="fs-5" style="color: #cbd5e1; text-align: justify; line-height: 1.8;">L'architecture de notre centre de contact permet un routage intelligent des requêtes. Que vos clients utilisent les canaux traditionnels ou digitaux, nous garantissons un temps de traitement optimisé et une traçabilité totale (SLA garantis).</p>
        </div>
        
        <div class="col-lg-6 offset-lg-1" data-aos="fade-left">
          <div class="row g-4">
            <div class="col-sm-6">
              <div class="glass-card text-center py-5">
                <i class="bi bi-telephone fs-1 mb-3" style="color: var(--cc-red);"></i>
                <h5 class="fw-bold mb-0 text-white">Vocal</h5>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="glass-card text-center py-5">
                <i class="bi bi-chat-dots fs-1 mb-3" style="color: var(--cc-red);"></i>
                <h5 class="fw-bold mb-0 text-white">Web Chat</h5>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="glass-card text-center py-5">
                <i class="bi bi-envelope fs-1 mb-3" style="color: var(--cc-red);"></i>
                <h5 class="fw-bold mb-0 text-white">Email</h5>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="glass-card text-center py-5">
                <i class="bi bi-diagram-3 fs-1 mb-3" style="color: var(--cc-red);"></i>
                <h5 class="fw-bold mb-0 text-white">Social</h5>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-5 p-5 glass-card position-relative overflow-hidden" data-aos="zoom-in">
        <!-- Inner glow -->
        <div class="position-absolute w-50 h-100 top-0 end-0" style="background: radial-gradient(circle at center, rgba(209, 17, 65, 0.2) 0%, transparent 70%);"></div>
        
        <div class="row align-items-center position-relative z-1">
          <div class="col-md-8 mb-4 mb-md-0">
            <h3 class="fw-bold mb-3 text-white">Intégration CRM personnalisée</h3>
            <p class="mb-0 fs-5" style="color: #cbd5e1;">Nos API s'interfacent avec Salesforce, Zendesk, Microsoft Dynamics et vos systèmes propriétaires pour une synchronisation en temps réel.</p>
          </div>
          <div class="col-md-4 text-md-end">
            <a href="tel:+21655335286" class="btn-glass-red px-4 py-3"><i class="bi bi-telephone-fill me-2"></i>Contacter nos ingénieurs</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
