@extends('layouts.callcenter')

@section('title', 'Profil Entreprise — CAEI Call Center (3D Glassmorphism)')

@section('content')
  <!-- Header -->
  <section class="py-5 text-center position-relative">
    <div class="container py-4 position-relative z-1" data-aos="fade-up">
      <div class="glass-badge mb-4 d-inline-block">Notre Histoire</div>
      <h1 class="display-4 fw-bold mb-3" style="color: #0f172a;">Profil Entreprise</h1>
      <p class="fs-5 max-w-2xl mx-auto mb-0" style="color: #475569;">Historique, vision stratégique et engagements de CAEI Call Center envers l'excellence opérationnelle.</p>
    </div>
  </section>

  <!-- About Content -->
  <section class="py-5 position-relative">
    <div class="container py-5">
      <div class="row align-items-center g-5">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="position-relative" style="perspective: 1000px;">
            <!-- Glow behind image -->
            <div class="position-absolute w-100 h-100 rounded-circle" style="background: var(--cc-red); filter: blur(80px); opacity: 0.15; top: 10%; left: 10%; z-index: 0;"></div>
            
            <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?q=80&w=2070&auto=format&fit=crop" alt="Notre Équipe" class="img-fluid img-3d position-relative z-1" style="transform: rotateY(5deg) rotateX(2deg);">
            
            <div class="position-absolute bottom-0 end-0 glass-card p-4 border" style="margin-right: -20px; margin-bottom: -20px; z-index: 2; width: auto; height: auto;">
              <h3 class="fw-bold mb-0" style="color: #0f172a;"><span style="color: var(--cc-red);">14+</span> Ans</h3>
              <p class="mb-0 small fw-medium" style="color: #475569;">D'Expertise B2B/B2C</p>
            </div>
          </div>
        </div>
        
        <div class="col-lg-6 ps-lg-5" data-aos="fade-left">
          <h2 class="display-5 fw-bold mb-4" style="color: #0f172a;">Un partenaire structuré pour votre croissance</h2>
          <p class="fs-6 mb-4" style="color: #334155; text-align: justify; line-height: 1.8;">Fondé sur l'exigence et la rigueur, le CAEI Call Center s'est imposé comme une structure de référence dans l'externalisation de la relation client. Nous mettons à disposition de nos partenaires des infrastructures technologiques de pointe et des ressources humaines hautement qualifiées.</p>
          
          <div class="mt-4 glass-card p-4" style="border-left: 4px solid var(--cc-red);">
            <h5 class="fw-bold mb-2" style="color: #0f172a;">Gouvernance & Qualité</h5>
            <p class="small mb-0" style="color: #475569;">Nos processus sont alignés sur les standards internationaux (ISO), garantissant une sécurité des données optimale et une constance dans la qualité de service.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Vision / Mission -->
  <section class="py-5 position-relative mt-4">
    <div class="container py-5">
      <div class="row g-4 text-center">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="glass-card">
            <div class="glass-icon-wrapper mx-auto">
              <i class="bi bi-bullseye"></i>
            </div>
            <h4 class="fw-bold mb-3" style="color: #0f172a;">Mission</h4>
            <p class="small mb-0" style="color: #475569;">Structurer et opérer des cellules de contact multicanal performantes pour accroître la compétitivité de nos donneurs d'ordres.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
          <div class="glass-card">
            <div class="glass-icon-wrapper mx-auto">
              <i class="bi bi-eye"></i>
            </div>
            <h4 class="fw-bold mb-3" style="color: #0f172a;">Vision</h4>
            <p class="small mb-0" style="color: #475569;">Consolider notre positionnement de leader régional en intégrant les dernières avancées en matière d'intelligence artificielle et d'analyse de données.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
          <div class="glass-card">
            <div class="glass-icon-wrapper mx-auto">
              <i class="bi bi-shield-check"></i>
            </div>
            <h4 class="fw-bold mb-3" style="color: #0f172a;">Valeurs</h4>
            <p class="small mb-0" style="color: #475569;">Rigueur professionnelle, intégrité absolue, confidentialité des données et orientation résultat.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
