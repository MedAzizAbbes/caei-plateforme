@extends('layouts.callcenter')

@section('title', 'Infrastructure de Support — CAEI Call Center (Minimaliste)')

@section('content')
  <!-- Header -->
  <section class="py-5 bg-white text-center border-bottom border-light">
    <div class="container py-4" data-aos="fade-up">
      <span class="badge-clean mb-3">Omnicanalité</span>
      <h1 class="display-5 fw-bold mb-3">Infrastructure de Support</h1>
      <p class="fs-5 text-muted max-w-2xl mx-auto mb-0">Une disponibilité opérationnelle continue (24/7/365) déployée sur l'ensemble des canaux de communication.</p>
    </div>
  </section>

  <!-- Support Features -->
  <section class="py-5 section-light">
    <div class="container py-5">
      <div class="row align-items-center mb-5">
        <div class="col-lg-5" data-aos="fade-right">
          <h2 class="display-6 fw-bold mb-4">Une présence systémique</h2>
          <p class="text-muted fs-6" style="text-align: justify; line-height: 1.8;">L'architecture de notre centre de contact permet un routage intelligent des requêtes. Que vos clients utilisent les canaux traditionnels ou digitaux, nous garantissons un temps de traitement optimisé et une traçabilité totale (SLA garantis).</p>
        </div>
        <div class="col-lg-6 offset-lg-1" data-aos="fade-left">
          <div class="row g-3">
            <div class="col-sm-6">
              <div class="clean-card text-center">
                <i class="bi bi-telephone text-danger fs-1 mb-3"></i>
                <h6 class="fw-bold mb-0">Vocal</h6>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="clean-card text-center">
                <i class="bi bi-chat-dots text-danger fs-1 mb-3"></i>
                <h6 class="fw-bold mb-0">Web Chat</h6>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="clean-card text-center">
                <i class="bi bi-envelope text-danger fs-1 mb-3"></i>
                <h6 class="fw-bold mb-0">Email</h6>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="clean-card text-center">
                <i class="bi bi-diagram-3 text-danger fs-1 mb-3"></i>
                <h6 class="fw-bold mb-0">Réseaux Sociaux</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-5 p-5 rounded-4 bg-white border" data-aos="zoom-in" style="box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
        <div class="row align-items-center">
          <div class="col-md-8 mb-4 mb-md-0">
            <h4 class="fw-bold mb-2">Intégration CRM personnalisée</h4>
            <p class="text-muted mb-0 fs-6">Nos API s'interfacent avec Salesforce, Zendesk, Microsoft Dynamics et vos systèmes propriétaires pour une synchronisation en temps réel.</p>
          </div>
          <div class="col-md-4 text-md-end">
            <a href="tel:+21655335286" class="btn-clean-red px-4 py-3"><i class="bi bi-telephone-fill me-2"></i>Contacter nos ingénieurs</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
