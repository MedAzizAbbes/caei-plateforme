@extends('layouts.callcenter')

@section('title', 'Insights & Actualités — CAEI Call Center (Minimaliste)')

@section('content')
  <!-- Header -->
  <section class="py-5 bg-white text-center border-bottom border-light">
    <div class="container py-4" data-aos="fade-up">
      <span class="badge-clean mb-3">Notre Blog</span>
      <h1 class="display-5 fw-bold mb-3">Insights & Actualités</h1>
      <p class="fs-5 text-muted max-w-2xl mx-auto mb-0">Analyses sectorielles, évolutions technologiques et bonnes pratiques en gestion de la relation client.</p>
    </div>
  </section>

  <!-- Blog List -->
  <section class="py-5 section-light">
    <div class="container py-5">
      <div class="row g-5">
        <!-- Article 1 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="clean-card p-0 d-flex flex-column h-100 bg-white">
            <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?q=80&w=2070&auto=format&fit=crop" class="w-100" alt="Blog Image" style="height: 220px; object-fit: cover;">
            <div class="p-4 flex-grow-1 d-flex flex-column">
              <span class="text-danger fw-bold small text-uppercase" style="letter-spacing: 1px;">Analyse Stratégique</span>
              <h5 class="fw-bold mt-3 mb-3">L'intelligence artificielle : menace ou opportunité pour le support client ?</h5>
              <p class="text-muted small mb-4" style="text-align: justify;">Examen détaillé de l'intégration des modèles linguistiques (LLM) dans les flux de support technique et leur impact sur la productivité des agents humains.</p>
              <a href="#" class="btn-outline-clean mt-auto text-decoration-none text-center">Consulter l'article</a>
            </div>
          </div>
        </div>

        <!-- Article 2 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="clean-card p-0 d-flex flex-column h-100 bg-white">
            <img src="https://images.unsplash.com/photo-1549923746-c502d488b3ea?q=80&w=2071&auto=format&fit=crop" class="w-100" alt="Blog Image" style="height: 220px; object-fit: cover;">
            <div class="p-4 flex-grow-1 d-flex flex-column">
              <span class="text-danger fw-bold small text-uppercase" style="letter-spacing: 1px;">Ressources Humaines</span>
              <h5 class="fw-bold mt-3 mb-3">Rétention des talents : structurer l'évolution de carrière en centre de contact</h5>
              <p class="text-muted small mb-4" style="text-align: justify;">La gestion de l'attrition est un KPI critique. Méthodologies appliquées par CAEI pour maintenir un taux de turnover inférieur aux standards de l'industrie.</p>
              <a href="#" class="btn-outline-clean mt-auto text-decoration-none text-center">Consulter l'article</a>
            </div>
          </div>
        </div>

        <!-- Article 3 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="clean-card p-0 d-flex flex-column h-100 bg-white">
            <img src="https://images.unsplash.com/photo-1556740714-a8395b3bf30f?q=80&w=2070&auto=format&fit=crop" class="w-100" alt="Blog Image" style="height: 220px; object-fit: cover;">
            <div class="p-4 flex-grow-1 d-flex flex-column">
              <span class="text-danger fw-bold small text-uppercase" style="letter-spacing: 1px;">Technologie</span>
              <h5 class="fw-bold mt-3 mb-3">Déploiement omnicanal : architecture logicielle et défis d'intégration</h5>
              <p class="text-muted small mb-4" style="text-align: justify;">Comment garantir l'intégrité de la donnée client lors du passage d'un canal asynchrone (email) à un canal synchrone (voix).</p>
              <a href="#" class="btn-outline-clean mt-auto text-decoration-none text-center">Consulter l'article</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
