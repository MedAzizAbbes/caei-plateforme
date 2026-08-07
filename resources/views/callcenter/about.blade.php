@extends('layouts.callcenter')

@section('title', 'Profil Entreprise — CAEI Call Center (Minimaliste)')

@section('content')
  <!-- Header -->
  <section class="py-5 bg-white text-center border-bottom border-light">
    <div class="container py-4" data-aos="fade-up">
      <span class="badge-clean mb-3">Notre Histoire</span>
      <h1 class="display-5 fw-bold mb-3">Profil Entreprise</h1>
      <p class="fs-5 text-muted max-w-2xl mx-auto mb-0">Historique, vision stratégique et engagements de CAEI Call Center envers l'excellence opérationnelle.</p>
    </div>
  </section>

  <!-- About Content -->
  <section class="py-5 bg-white">
    <div class="container py-5">
      <div class="row align-items-center g-5">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="position-relative">
            <div class="position-absolute bg-light rounded-4" style="top: 20px; left: -20px; right: 20px; bottom: -20px; border: 1px solid var(--cc-border); z-index: 0;"></div>
            <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?q=80&w=2070&auto=format&fit=crop" alt="Notre Équipe" class="img-fluid rounded-4 position-relative z-1" style="box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
            
            <div class="position-absolute bottom-0 end-0 p-4 bg-white rounded-3 shadow-sm border" style="margin-right: -10px; margin-bottom: -10px; z-index: 2;">
              <h3 class="fw-bold mb-0 text-title"><span class="text-danger">14+</span> Ans</h3>
              <p class="text-muted mb-0 small fw-medium">D'Expertise B2B/B2C</p>
            </div>
          </div>
        </div>
        
        <div class="col-lg-6 ps-lg-5" data-aos="fade-left">
          <h2 class="display-6 fw-bold mb-4">Un partenaire structuré pour votre croissance</h2>
          <p class="text-muted fs-6 mb-4" style="text-align: justify; line-height: 1.8;">Fondé sur l'exigence et la rigueur, le CAEI Call Center s'est imposé comme une structure de référence dans l'externalisation de la relation client. Nous mettons à disposition de nos partenaires des infrastructures technologiques de pointe et des ressources humaines hautement qualifiées.</p>
          
          <div class="mt-4 p-4 rounded-3 bg-light border-start border-4 border-danger">
            <h6 class="fw-bold mb-2">Gouvernance & Qualité</h6>
            <p class="text-muted small mb-0">Nos processus sont alignés sur les standards internationaux (ISO), garantissant une sécurité des données optimale et une constance dans la qualité de service.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Vision / Mission -->
  <section class="py-5 section-light">
    <div class="container py-5">
      <div class="row g-4 text-center">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="clean-card">
            <div class="clean-icon mx-auto">
              <i class="bi bi-bullseye"></i>
            </div>
            <h5 class="fw-bold mb-3">Mission</h5>
            <p class="text-muted small mb-0">Structurer et opérer des cellules de contact multicanal performantes pour accroître la compétitivité de nos donneurs d'ordres.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
          <div class="clean-card">
            <div class="clean-icon mx-auto">
              <i class="bi bi-eye"></i>
            </div>
            <h5 class="fw-bold mb-3">Vision</h5>
            <p class="text-muted small mb-0">Consolider notre positionnement de leader régional en intégrant les dernières avancées en matière d'intelligence artificielle et d'analyse de données.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
          <div class="clean-card">
            <div class="clean-icon mx-auto">
              <i class="bi bi-shield-check"></i>
            </div>
            <h5 class="fw-bold mb-3">Valeurs</h5>
            <p class="text-muted small mb-0">Rigueur professionnelle, intégrité absolue, confidentialité des données et orientation résultat.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
