@extends('layouts.callcenter')

@section('title', 'Insights & Actualités — CAEI Call Center')

@section('content')
  <!-- Header -->
  <section class="py-5 text-center position-relative">
    <div class="container py-4 position-relative z-1" data-aos="fade-up">
      <div class="glass-badge mb-4 d-inline-block">
        <i class="bi bi-newspaper me-2"></i> Pôle Relation Client
      </div>
      <h1 class="display-4 fw-bold mb-3" style="color: #0f172a;">Actualités Call Center</h1>
      <p class="fs-5 max-w-2xl mx-auto mb-0" style="color: #475569;">
        Tendances de la relation client, innovations technologiques et bonnes pratiques de l'externalisation.
      </p>
    </div>
  </section>

  <!-- Blog List Call Center -->
  <section class="py-4 position-relative mb-5">
    <div class="container position-relative z-1">
      <div class="row g-4">
        
        <!-- Article 1 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="glass-card p-0 d-flex flex-column h-100 overflow-hidden" style="border-radius: 24px;">
            <div class="position-relative overflow-hidden" style="height: 220px;">
              <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?q=80&w=2070&auto=format&fit=crop" class="w-100 h-100" alt="IA et Relation Client" style="object-fit: cover; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">
            </div>
            <div class="p-4 flex-grow-1 d-flex flex-column" style="background: rgba(255,255,255,0.85);">
              <span class="badge bg-danger bg-opacity-10 text-danger fw-bold align-self-start mb-2 px-3 py-1 rounded-pill small">Intelligence Artificielle</span>
              <h5 class="fw-bold mb-3" style="color: #0f172a;">L'IA générative au service des conseillers client</h5>
              <p class="small mb-4" style="color: #475569; line-height: 1.7;">
                Comment les assistants IA permettent d'augmenter la productivité des téléconseillers et de réduire le délai moyen de traitement (DMT) sans déshumaniser l'échange.
              </p>
              <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                <span class="small text-muted"><i class="bi bi-clock me-1"></i> 4 min de lecture</span>
                <span class="small fw-bold text-danger">CAEI Tech</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Article 2 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="glass-card p-0 d-flex flex-column h-100 overflow-hidden" style="border-radius: 24px;">
            <div class="position-relative overflow-hidden" style="height: 220px;">
              <img src="https://images.unsplash.com/photo-1549923746-c502d488b3ea?q=80&w=2071&auto=format&fit=crop" class="w-100 h-100" alt="Qualité et Formation" style="object-fit: cover; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">
            </div>
            <div class="p-4 flex-grow-1 d-flex flex-column" style="background: rgba(255,255,255,0.85);">
              <span class="badge bg-primary bg-opacity-10 text-primary fw-bold align-self-start mb-2 px-3 py-1 rounded-pill small">Qualité & Formation</span>
              <h5 class="fw-bold mb-3" style="color: #0f172a;">Rétention des talents et excellence opérationnelle</h5>
              <p class="small mb-4" style="color: #475569; line-height: 1.7;">
                La fidélisation des agents est la clé de la satisfaction client. Découvrez les programmes de coaching continu mis en place au sein de CAEI Call Center.
              </p>
              <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                <span class="small text-muted"><i class="bi bi-clock me-1"></i> 5 min de lecture</span>
                <span class="small fw-bold text-primary">Management</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Article 3 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="glass-card p-0 d-flex flex-column h-100 overflow-hidden" style="border-radius: 24px;">
            <div class="position-relative overflow-hidden" style="height: 220px;">
              <img src="https://images.unsplash.com/photo-1556740714-a8395b3bf30f?q=80&w=2070&auto=format&fit=crop" class="w-100 h-100" alt="Omnicanalité" style="object-fit: cover; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">
            </div>
            <div class="p-4 flex-grow-1 d-flex flex-column" style="background: rgba(255,255,255,0.85);">
              <span class="badge bg-success bg-opacity-10 text-success fw-bold align-self-start mb-2 px-3 py-1 rounded-pill small">Stratégie Omnicanale</span>
              <h5 class="fw-bold mb-3" style="color: #0f172a;">Réussir la transition vers une relation client 360°</h5>
              <p class="small mb-4" style="color: #475569; line-height: 1.7;">
                Voix, WhatsApp, live chat, réseaux sociaux : comment synchroniser l'ensemble de vos canaux de contact pour offrir une expérience sans couture.
              </p>
              <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                <span class="small text-muted"><i class="bi bi-clock me-1"></i> 3 min de lecture</span>
                <span class="small fw-bold text-success">Stratégie</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
