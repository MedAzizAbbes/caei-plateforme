@extends('layouts.callcenter')

@section('title', 'Insights & Actualités — CAEI Call Center (3D Glassmorphism)')

@section('content')
  <!-- Header -->
  <section class="py-5 text-center position-relative">
    <div class="container py-4 position-relative z-1" data-aos="fade-up">
      <div class="glass-badge mb-4 d-inline-block">Notre Blog</div>
      <h1 class="display-4 fw-bold mb-3 text-white">Insights & Actualités</h1>
      <p class="fs-5 max-w-2xl mx-auto mb-0" style="color: #cbd5e1;">Analyses sectorielles, évolutions technologiques et bonnes pratiques en gestion de la relation client.</p>
    </div>
  </section>

  <!-- Blog List -->
  <section class="py-5 position-relative">
    <div class="container py-5">
      <div class="row g-5">
        <!-- Article 1 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="glass-card p-0 d-flex flex-column h-100 overflow-hidden" style="border-radius: 24px;">
            <div class="position-relative overflow-hidden" style="height: 220px;">
              <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?q=80&w=2070&auto=format&fit=crop" class="w-100 h-100" alt="Blog Image" style="object-fit: cover; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
            </div>
            <div class="p-4 flex-grow-1 d-flex flex-column position-relative" style="background: rgba(255,255,255,0.03);">
              <span class="position-absolute top-0 start-0 translate-middle-y px-3 py-1 text-uppercase fw-bold rounded-pill text-white" style="font-size: 11px; letter-spacing: 1px; margin-left: 20px; background: var(--cc-red); box-shadow: 0 4px 10px rgba(209, 17, 65, 0.4);">Analyse Stratégique</span>
              <h5 class="fw-bold text-white mt-3 mb-3">L'intelligence artificielle : menace ou opportunité pour le support client ?</h5>
              <p class="small mb-4" style="text-align: justify; color: #94a3b8;">Examen détaillé de l'intégration des modèles linguistiques (LLM) dans les flux de support technique et leur impact sur la productivité des agents humains.</p>
              <a href="{{ route('callcenter.blog.details', 'intelligence-artificielle') }}" class="btn-glass-outline mt-auto text-decoration-none text-center py-2">Consulter l'article</a>
            </div>
          </div>
        </div>

        <!-- Article 2 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="glass-card p-0 d-flex flex-column h-100 overflow-hidden" style="border-radius: 24px;">
            <div class="position-relative overflow-hidden" style="height: 220px;">
              <img src="https://images.unsplash.com/photo-1549923746-c502d488b3ea?q=80&w=2071&auto=format&fit=crop" class="w-100 h-100" alt="Blog Image" style="object-fit: cover; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
            </div>
            <div class="p-4 flex-grow-1 d-flex flex-column position-relative" style="background: rgba(255,255,255,0.03);">
              <span class="position-absolute top-0 start-0 translate-middle-y px-3 py-1 text-uppercase fw-bold rounded-pill text-white" style="font-size: 11px; letter-spacing: 1px; margin-left: 20px; background: #4318ff; box-shadow: 0 4px 10px rgba(67, 24, 255, 0.4);">Ressources Humaines</span>
              <h5 class="fw-bold text-white mt-3 mb-3">Rétention des talents : structurer l'évolution de carrière en centre de contact</h5>
              <p class="small mb-4" style="text-align: justify; color: #94a3b8;">La gestion de l'attrition est un KPI critique. Méthodologies appliquées par CAEI pour maintenir un taux de turnover inférieur aux standards de l'industrie.</p>
              <a href="{{ route('callcenter.blog.details', 'retention-des-talents') }}" class="btn-glass-outline mt-auto text-decoration-none text-center py-2">Consulter l'article</a>
            </div>
          </div>
        </div>

        <!-- Article 3 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="glass-card p-0 d-flex flex-column h-100 overflow-hidden" style="border-radius: 24px;">
            <div class="position-relative overflow-hidden" style="height: 220px;">
              <img src="https://images.unsplash.com/photo-1556740714-a8395b3bf30f?q=80&w=2070&auto=format&fit=crop" class="w-100 h-100" alt="Blog Image" style="object-fit: cover; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
            </div>
            <div class="p-4 flex-grow-1 d-flex flex-column position-relative" style="background: rgba(255,255,255,0.03);">
              <span class="position-absolute top-0 start-0 translate-middle-y px-3 py-1 text-uppercase fw-bold rounded-pill text-white" style="font-size: 11px; letter-spacing: 1px; margin-left: 20px; background: rgba(255,255,255,0.2); backdrop-filter: blur(5px); border: 1px solid rgba(255,255,255,0.3);">Technologie</span>
              <h5 class="fw-bold text-white mt-3 mb-3">Déploiement omnicanal : architecture logicielle et défis d'intégration</h5>
              <p class="small mb-4" style="text-align: justify; color: #94a3b8;">Comment garantir l'intégrité de la donnée client lors du passage d'un canal asynchrone (email) à un canal synchrone (voix).</p>
              <a href="{{ route('callcenter.blog.details', 'deploiement-omnicanal') }}" class="btn-glass-outline mt-auto text-decoration-none text-center py-2">Consulter l'article</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
