@extends('layouts.callcenter')

@section('title', 'CAEI Call Center - Accueil')

@section('content')
<!-- Hero Section -->
<section class="position-relative min-vh-100 d-flex align-items-center overflow-hidden">
  <div class="container py-5 mt-4 position-relative z-1">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
        <div class="glass-badge mb-4">
          <i class="bi bi-stars me-2"></i> Support Client Nouvelle Génération
        </div>
        <h1 class="display-4 fw-bold mb-4 lh-sm" style="color: #0f172a;">
          Propulsez votre <br>
          <span class="text-gradient">Relation Client</span>
        </h1>
        <p class="lead mb-5" style="color: #334155; font-size: 1.15rem; max-width: 520px; line-height: 1.8;">
          Des solutions sur mesure d'assistance téléphonique, de téléprospection, de fidélisation et de support technique pour propulser votre entreprise vers l'avenir.
        </p>
        <div class="d-flex flex-wrap gap-3">
          <a href="{{ route('callcenter.services') }}" class="btn-glass-red text-decoration-none">
            <i class="bi bi-grid-fill me-2"></i> Découvrir nos services
          </a>
          <a href="{{ route('callcenter.contact') }}" class="btn-glass-outline text-decoration-none">
            <i class="bi bi-calendar-check me-2"></i> Prendre RDV / Devis
          </a>
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
</section>

<!-- Section 1: Pourquoi nous choisir / Nos Atouts -->
<section class="py-5 position-relative">
  <div class="container py-4 position-relative z-1">
    <div class="text-center max-w-2xl mx-auto mb-5" data-aos="fade-up">
      <div class="glass-badge mb-3">Pourquoi CAEI Call Center ?</div>
      <h2 class="display-6 fw-bold mb-3" style="color: #0f172a;">Une infrastructure conçue pour <span class="text-gradient">votre réussite</span></h2>
      <p class="fs-6 mb-0" style="color: #475569; max-width: 650px; margin: 0 auto;">
        Nous combinons technologies de pointe, expertise humaine et rigueur méthodologique pour délivrer une expérience client d'exception.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
        <div class="glass-card h-100">
          <div class="glass-icon-wrapper">
            <i class="bi bi-cpu-fill"></i>
          </div>
          <h5 class="fw-bold mb-2" style="color: #0f172a;">Omnicanalité & IA</h5>
          <p class="small mb-0" style="color: #475569; line-height: 1.7;">
            Gestion unifiée de vos flux voix, emails, chat et réseaux sociaux intégrés à votre CRM avec assistance intelligente.
          </p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
        <div class="glass-card h-100">
          <div class="glass-icon-wrapper">
            <i class="bi bi-people-fill"></i>
          </div>
          <h5 class="fw-bold mb-2" style="color: #0f172a;">Agents Qualifiés</h5>
          <p class="small mb-0" style="color: #475569; line-height: 1.7;">
            Des conseillers bilingues hautement formés aux techniques de communication, d'écoute active et de négociation.
          </p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
        <div class="glass-card h-100">
          <div class="glass-icon-wrapper">
            <i class="bi bi-shield-check"></i>
          </div>
          <h5 class="fw-bold mb-2" style="color: #0f172a;">Conformité & Sécurité</h5>
          <p class="small mb-0" style="color: #475569; line-height: 1.7;">
            Respect scrupuleux du RGPD, protocoles ISO certifiés et sécurité maximale pour la protection de vos données clients.
          </p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
        <div class="glass-card h-100">
          <div class="glass-icon-wrapper">
            <i class="bi bi-graph-up-arrow"></i>
          </div>
          <h5 class="fw-bold mb-2" style="color: #0f172a;">Reporting en Temps Réel</h5>
          <p class="small mb-0" style="color: #475569; line-height: 1.7;">
            Accès à un tableau de bord analytique transparent : suivi des KPI, DMT, taux de conversion et enquêtes de satisfaction.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section 2: Nos Services Phares -->
<section class="py-5 position-relative">
  <div class="container py-4 position-relative z-1">
    <div class="row align-items-end justify-content-between mb-5" data-aos="fade-up">
      <div class="col-lg-7">
        <div class="glass-badge mb-3">Nos Domaines d'Intervention</div>
        <h2 class="display-6 fw-bold mb-2" style="color: #0f172a;">Des solutions complètes adaptées à <span class="text-gradient">vos enjeux métiers</span></h2>
        <p class="fs-6 mb-0" style="color: #475569;">Externalisez vos activités en toute sérénité avec des équipes expertes dédiées.</p>
      </div>
      <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
        <a href="{{ route('callcenter.services') }}" class="btn-glass-outline text-decoration-none">
          Voir tout le catalogue <i class="bi bi-arrow-right ms-2"></i>
        </a>
      </div>
    </div>

    <div class="row g-4">
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="glass-card p-4 d-flex flex-column h-100">
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="glass-icon-wrapper mb-0" style="width: 50px; height: 50px; font-size: 22px;">
              <i class="bi bi-headset"></i>
            </div>
            <div>
              <span class="badge bg-danger bg-opacity-10 text-danger small fw-bold px-2 py-1">Inbound</span>
              <h5 class="fw-bold mb-0 mt-1" style="color: #0f172a;">Service Client 24/7</h5>
            </div>
          </div>
          <p class="small flex-grow-1" style="color: #475569; line-height: 1.7;">
            Prise en charge professionnelle des appels entrants, gestion des commandes, réclamations et assistance multicanale pour fidéliser vos clients.
          </p>
          <ul class="list-unstyled small mb-4" style="color: #334155;">
            <li class="mb-2"><i class="bi bi-check2-circle text-danger me-2"></i> Accueil & Renseignement</li>
            <li class="mb-2"><i class="bi bi-check2-circle text-danger me-2"></i> Traitement des réclamations</li>
            <li><i class="bi bi-check2-circle text-danger me-2"></i> SLA & temps d'attente optimisés</li>
          </ul>
          <a href="{{ route('callcenter.services') }}" class="btn-glass-outline text-decoration-none text-center py-2 mt-auto">En savoir plus</a>
        </div>
      </div>

      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="glass-card p-4 d-flex flex-column h-100">
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="glass-icon-wrapper mb-0" style="width: 50px; height: 50px; font-size: 22px;">
              <i class="bi bi-telephone-outbound-fill"></i>
            </div>
            <div>
              <span class="badge bg-danger bg-opacity-10 text-danger small fw-bold px-2 py-1">Outbound</span>
              <h5 class="fw-bold mb-0 mt-1" style="color: #0f172a;">Téléprospection & Vente</h5>
            </div>
          </div>
          <p class="small flex-grow-1" style="color: #475569; line-height: 1.7;">
            Campagnes dynamiques d'appels sortants B2B/B2C, génération de leads qualifiés, prise de rendez-vous stratégiques et closing commercial.
          </p>
          <ul class="list-unstyled small mb-4" style="color: #334155;">
            <li class="mb-2"><i class="bi bi-check2-circle text-danger me-2"></i> Prise de RDV commerciaux</li>
            <li class="mb-2"><i class="bi bi-check2-circle text-danger me-2"></i> Qualification de bases de données</li>
            <li><i class="bi bi-check2-circle text-danger me-2"></i> Vente directe et réactivation</li>
          </ul>
          <a href="{{ route('callcenter.services') }}" class="btn-glass-outline text-decoration-none text-center py-2 mt-auto">En savoir plus</a>
        </div>
      </div>

      <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
        <div class="glass-card p-4 d-flex flex-column h-100">
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="glass-icon-wrapper mb-0" style="width: 50px; height: 50px; font-size: 22px;">
              <i class="bi bi-tools"></i>
            </div>
            <div>
              <span class="badge bg-danger bg-opacity-10 text-danger small fw-bold px-2 py-1">Support</span>
              <h5 class="fw-bold mb-0 mt-1" style="color: #0f172a;">Helpdesk & Support N1/N2</h5>
            </div>
          </div>
          <p class="small flex-grow-1" style="color: #475569; line-height: 1.7;">
            Assistance technique réactive pour logiciels, applications et matériels. Diagnostic rapide et résolution au premier contact (FCR).
          </p>
          <ul class="list-unstyled small mb-4" style="color: #334155;">
            <li class="mb-2"><i class="bi bi-check2-circle text-danger me-2"></i> Support N1 & Escalade N2</li>
            <li class="mb-2"><i class="bi bi-check2-circle text-danger me-2"></i> Diagnostic & prise en main</li>
            <li><i class="bi bi-check2-circle text-danger me-2"></i> Base de connaissances enrichie</li>
          </ul>
          <a href="{{ route('callcenter.services') }}" class="btn-glass-outline text-decoration-none text-center py-2 mt-auto">En savoir plus</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section 3: Notre Méthode en 4 Étapes -->
<section class="py-5 position-relative">
  <div class="container py-4 position-relative z-1">
    <div class="text-center max-w-2xl mx-auto mb-5" data-aos="fade-up">
      <div class="glass-badge mb-3">Méthodologie Éprouvée</div>
      <h2 class="display-6 fw-bold mb-3" style="color: #0f172a;">Comment démarrer votre <span class="text-gradient">partenariat avec CAEI</span></h2>
      <p class="fs-6 mb-0" style="color: #475569; max-width: 600px; margin: 0 auto;">Un déploiement fluide et structuré en 4 étapes clés pour garantir des résultats rapides.</p>
    </div>

    <div class="row g-4">
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
        <div class="glass-card text-center h-100 p-4">
          <div class="badge rounded-circle mb-3 d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px; font-size: 18px; background: var(--cc-red); color: #fff;">1</div>
          <h5 class="fw-bold mb-2" style="color: #0f172a;">Audit & Cadrage</h5>
          <p class="small mb-0" style="color: #475569; line-height: 1.7;">
            Analyse détaillée de vos besoins, définition des KPI cibles, rédaction des scripts d'appels et validation des processus.
          </p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
        <div class="glass-card text-center h-100 p-4">
          <div class="badge rounded-circle mb-3 d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px; font-size: 18px; background: var(--cc-red); color: #fff;">2</div>
          <h5 class="fw-bold mb-2" style="color: #0f172a;">Formation & Outils</h5>
          <p class="small mb-0" style="color: #475569; line-height: 1.7;">
            Formation intensive des agents dédiés à vos produits et interfaçage technique complet avec votre CRM.
          </p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
        <div class="glass-card text-center h-100 p-4">
          <div class="badge rounded-circle mb-3 d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px; font-size: 18px; background: var(--cc-red); color: #fff;">3</div>
          <h5 class="fw-bold mb-2" style="color: #0f172a;">Lancement des Flux</h5>
          <p class="small mb-0" style="color: #475569; line-height: 1.7;">
            Démarrage des opérations sous la supervision active de team leaders et double écoute qualité en continu.
          </p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
        <div class="glass-card text-center h-100 p-4">
          <div class="badge rounded-circle mb-3 d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px; font-size: 18px; background: var(--cc-red); color: #fff;">4</div>
          <h5 class="fw-bold mb-2" style="color: #0f172a;">Pilotage & Optimisation</h5>
          <p class="small mb-0" style="color: #475569; line-height: 1.7;">
            Comités de pilotage hebdomadaires, rapports de rentabilité et amélioration continue des taux de satisfaction.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section 4: Chiffres Clés & Impact -->
<section class="py-5 position-relative">
  <div class="container py-4 position-relative z-1">
    <div class="glass-card p-5" style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 250, 252, 0.9) 100%); border-left: 5px solid var(--cc-red);" data-aos="zoom-in">
      <div class="row text-center g-4 align-items-center">
        <div class="col-6 col-lg-3">
          <h2 class="display-5 fw-bold mb-1" style="color: var(--cc-red);">+500K</h2>
          <p class="fw-semibold mb-0" style="color: #0f172a;">Appels traités / an</p>
          <span class="small" style="color: #64748b;">Entrants et sortants</span>
        </div>
        <div class="col-6 col-lg-3">
          <h2 class="display-5 fw-bold mb-1" style="color: var(--cc-red);">98.4%</h2>
          <p class="fw-semibold mb-0" style="color: #0f172a;">Résolution 1er Contact</p>
          <span class="small" style="color: #64748b;">Efficacité et réactivité</span>
        </div>
        <div class="col-6 col-lg-3">
          <h2 class="display-5 fw-bold mb-1" style="color: var(--cc-red);">-35%</h2>
          <p class="fw-semibold mb-0" style="color: #0f172a;">Coûts Opérationnels</p>
          <span class="small" style="color: #64748b;">Économies pour nos clients</span>
        </div>
        <div class="col-6 col-lg-3">
          <h2 class="display-5 fw-bold mb-1" style="color: var(--cc-red);">100%</h2>
          <p class="fw-semibold mb-0" style="color: #0f172a;">Conformité RGPD</p>
          <span class="small" style="color: #64748b;">Sécurité & Confidentialité</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section 5: Call To Action (CTA) -->
<section class="py-5 position-relative text-center">
  <div class="container py-5 position-relative z-1" data-aos="fade-up">
    <div class="glass-card p-5 mx-auto" style="max-width: 900px;">
      <div class="glass-badge mb-3">Passez à la vitesse supérieure</div>
      <h2 class="display-5 fw-bold mb-3" style="color: #0f172a;">
        Prêt à transformer votre <span class="text-gradient">Expérience Client</span> ?
      </h2>
      <p class="fs-6 mb-4 mx-auto" style="color: #475569; max-width: 650px; line-height: 1.8;">
        Discutons de vos objectifs. Nos experts analysent vos flux et vous proposent un dispositif d'externalisation sur mesure en moins de 48 heures.
      </p>
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="{{ route('callcenter.contact') }}" class="btn-glass-red text-decoration-none px-4 py-3">
          <i class="bi bi-send-fill me-2"></i> Demander une étude gratuite
        </a>
        <a href="{{ route('callcenter.about') }}" class="btn-glass-outline text-decoration-none px-4 py-3">
          <i class="bi bi-info-circle me-2"></i> En savoir plus sur nous
        </a>
      </div>
    </div>
  </div>
</section>
@endsection
