@extends('layouts.callcenter')

@section('title', 'Actualités du Centre d\'Appels CAEI')

@section('content')
  <div class="d-flex flex-column justify-content-center" style="min-height: 70vh;">
    <!-- Header -->
    <section class="py-5 text-center position-relative mt-5">
      <div class="container py-5 position-relative z-1" data-aos="fade-up">
        <h1 class="display-4 fw-bold mb-4" style="color: #0f172a;">Actualités du Centre d'Appels CAEI</h1>
        <p class="fs-4 max-w-2xl mx-auto mb-0" style="color: #475569;">
          Découvrez nos dernières initiatives et les améliorations apportées à notre service clientèle.
        </p>
      </div>
    </section>

    <!-- Blog List Call Center -->
    <section class="pb-5 position-relative mb-5">
      <div class="container position-relative z-1">
      <div class="row g-4">
        
        <!-- Article 1 -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="card border-0 bg-transparent h-100">
            <div class="position-relative overflow-hidden mb-3" style="height: 200px;">
              <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=2070&auto=format&fit=crop" class="w-100 h-100" alt="Innovation" style="object-fit: cover;">
            </div>
            <div class="card-body p-0 d-flex flex-column">
              <span class="text-danger fw-bold small text-uppercase mb-2" style="letter-spacing: 1px;">INNOVATION</span>
              <h5 class="fw-bold mb-4" style="color: #0f172a; font-size: 1.1rem; line-height: 1.4;">Amélioration des processus de gestion des appels</h5>
              <div class="mt-auto pt-2 d-flex justify-content-between align-items-center border-0">
                <span class="small text-muted" style="font-size: 0.85rem;">Janvier 1, 2025</span>
                <span class="small text-muted" style="font-size: 0.85rem;">500 vues</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Article 2 -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="card border-0 bg-transparent h-100">
            <div class="position-relative overflow-hidden mb-3" style="height: 200px;">
              <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=2070&auto=format&fit=crop" class="w-100 h-100" alt="Formation" style="object-fit: cover;">
            </div>
            <div class="card-body p-0 d-flex flex-column">
              <span class="text-danger fw-bold small text-uppercase mb-2" style="letter-spacing: 1px;">FORMATION</span>
              <h5 class="fw-bold mb-4" style="color: #0f172a; font-size: 1.1rem; line-height: 1.4;">Formation continue pour nos agents</h5>
              <div class="mt-auto pt-2 d-flex justify-content-between align-items-center border-0">
                <span class="small text-muted" style="font-size: 0.85rem;">Janvier 3, 2025</span>
                <span class="small text-muted" style="font-size: 0.85rem;">400 vues</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Article 3 -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="card border-0 bg-transparent h-100">
            <div class="position-relative overflow-hidden mb-3" style="height: 200px;">
              <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?q=80&w=2069&auto=format&fit=crop" class="w-100 h-100" alt="Technologie" style="object-fit: cover;">
            </div>
            <div class="card-body p-0 d-flex flex-column">
              <span class="text-danger fw-bold small text-uppercase mb-2" style="letter-spacing: 1px;">TECHNOLOGIE</span>
              <h5 class="fw-bold mb-4" style="color: #0f172a; font-size: 1.1rem; line-height: 1.4;">Mise à jour de notre technologie d'appel</h5>
              <div class="mt-auto pt-2 d-flex justify-content-between align-items-center border-0">
                <span class="small text-muted" style="font-size: 0.85rem;">Janvier 5, 2025</span>
                <span class="small text-muted" style="font-size: 0.85rem;">350 vues</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Article 4 -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="card border-0 bg-transparent h-100">
            <div class="position-relative overflow-hidden mb-3" style="height: 200px;">
              <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=2070&auto=format&fit=crop" class="w-100 h-100" alt="Performance" style="object-fit: cover;">
            </div>
            <div class="card-body p-0 d-flex flex-column">
              <span class="text-danger fw-bold small text-uppercase mb-2" style="letter-spacing: 1px;">PERFORMANCE</span>
              <h5 class="fw-bold mb-4" style="color: #0f172a; font-size: 1.1rem; line-height: 1.4;">Optimisation des performances du centre d'appel</h5>
              <div class="mt-auto pt-2 d-flex justify-content-between align-items-center border-0">
                <span class="small text-muted" style="font-size: 0.85rem;">Janvier 7, 2025</span>
                <span class="small text-muted" style="font-size: 0.85rem;">300 vues</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
