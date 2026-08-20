@extends('layouts.callcenter')

@section('title', 'Séminaire International Audit LCB/FT — CAEI Call Center')

@section('content')
  <!-- Header -->
  <section class="py-5 text-center position-relative">
    <div class="container py-4 position-relative z-1" data-aos="fade-up">
      <div class="glass-badge mb-4 d-inline-block">
        <i class="bi bi-mortarboard-fill me-2"></i> Séminaire International & Événements
      </div>
      <h1 class="display-4 fw-bold mb-3" style="color: #0f172a;">Nos Actualités</h1>
      <p class="fs-5 max-w-2xl mx-auto mb-0" style="color: #475569;">
        Retrouvez les temps forts, séminaires de haut niveau et collaborations internationales du CAEI.
      </p>
    </div>
  </section>

  <!-- Article Principal : Séminaire International LCB/FT -->
  <section class="py-4 position-relative">
    <div class="container position-relative z-1">
      
      <!-- Carte Article Complet -->
      <div class="glass-card p-4 p-md-5 mb-5" data-aos="fade-up">
        
        <!-- Header de l'article -->
        <div class="mb-4 pb-3" style="border-bottom: 1px solid rgba(226, 232, 240, 0.9);">
          <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
            <span class="badge px-3 py-2" style="background: var(--cc-red); color: white; font-weight: 700; font-size: 12px; border-radius: 8px;">
              🎓 Séminaire International
            </span>
            <span class="badge bg-danger bg-opacity-10 text-danger fw-bold px-3 py-2 rounded-pill small">
              Décembre 2025
            </span>
            <span class="badge bg-secondary bg-opacity-10 text-secondary fw-semibold px-3 py-2 rounded-pill small">
              <i class="bi bi-geo-alt-fill text-danger me-1"></i> Tunis | Sénégal
            </span>
          </div>
          
          <h2 class="fw-bold mb-2" style="color: #0f172a; font-size: 2rem; line-height: 1.35;">
            Audit du dispositif de conformité LCB/FT
          </h2>
          <p class="mb-0 text-muted small">Lutte contre le Blanchiment de Capitaux et le Financement du Terrorisme</p>
        </div>

        <!-- Contenu & Photo en vedette -->
        <div class="row align-items-center g-4 g-lg-5 mb-4">
          <div class="col-lg-6">
            <div class="position-relative overflow-hidden rounded-4 shadow-sm" style="border: 3px solid #ffffff;">
              <img src="{{ asset('images/actualites/reunion-caei-6.jpg') }}" alt="Séminaire international CAEI LCB/FT" class="img-fluid w-100" style="object-fit: cover; max-height: 400px; border-radius: 14px; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
            </div>
          </div>
          
          <div class="col-lg-6">
            <p class="fs-6 mb-3" style="color: #334155; line-height: 1.8; text-align: justify;">
              Le <strong>Comité Africain d’Expertise Internationale (CAEI)</strong> a organisé en <strong>décembre 2025</strong> un séminaire international consacré à l’audit du dispositif de conformité en matière de Lutte contre le Blanchiment de Capitaux et le Financement du Terrorisme (<strong>LCB/FT</strong>).
            </p>
            
            <p class="fs-6 mb-4" style="color: #475569; line-height: 1.8; text-align: justify;">
              Cette rencontre a réuni des professionnels du secteur financier autour des enjeux liés au renforcement des dispositifs de conformité, à l’identification des risques et à l’efficacité des mécanismes de contrôle interne.
            </p>

            <!-- Partenaire en encadré mis en valeur -->
            <div class="p-3 rounded-3 mb-3 d-flex align-items-center gap-3" style="background: rgba(127, 5, 4, 0.06); border-left: 4px solid var(--cc-red);">
              <i class="bi bi-handshake-fill fs-3 text-danger flex-shrink-0"></i>
              <div>
                <strong style="color: #0f172a; font-size: 14.5px;">🤝 Partenariat d'Excellence :</strong>
                <p class="small mb-0" style="color: #334155;">
                  Avec la participation de la <strong>Banque Nationale pour le Développement Économique (BNDE)</strong> du Sénégal.
                </p>
              </div>
            </div>

            <!-- Fiche récapitulative -->
            <div class="row g-2 pt-2 text-center">
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted" style="font-size: 11px;">📍 Lieu</span>
                  <strong style="color: #0f172a; font-size: 13.5px;">Tunis</strong>
                </div>
              </div>
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted" style="font-size: 11px;">📅 Date</span>
                  <strong style="color: #0f172a; font-size: 13.5px;">Déc. 2025</strong>
                </div>
              </div>
              <div class="col-4">
                <div class="p-2 rounded-3 bg-light border">
                  <span class="d-block text-muted" style="font-size: 11px;">🎯 Thématique</span>
                  <strong style="color: #0f172a; font-size: 13.5px;">LCB/FT</strong>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

      <!-- Galerie des 6 Photos du Séminaire -->
      <div class="mb-5">
        <div class="d-flex align-items-center justify-content-between mb-4" data-aos="fade-up">
          <div>
            <div class="glass-badge mb-2">Moments Forts en Images</div>
            <h3 class="fw-bold mb-0" style="color: #0f172a;">Galerie du Séminaire LCB/FT</h3>
          </div>
          <span class="text-muted small d-none d-md-block"><i class="bi bi-zoom-in me-1"></i> Cliquez sur une photo pour l'agrandir</span>
        </div>

        <div class="row g-4">
          
          <!-- Photo 1 -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="glass-card p-2 h-100 overflow-hidden" style="border-radius: 20px;">
              <div class="position-relative overflow-hidden rounded-4" style="height: 270px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#photoModal1">
                <img src="{{ asset('images/actualites/reunion-caei-1.jpg') }}" alt="Séminaire LCB/FT - Travaux" class="w-100 h-100" style="object-fit: cover; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">
                <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(to top, rgba(15,23,42,0.92) 0%, rgba(15,23,42,0.6) 60%, transparent 100%);">
                  <h6 class="fw-bold mb-1" style="color: #ffffff !important; text-shadow: 0 1px 4px rgba(0,0,0,0.8);">Cadrage & Travaux en Commission</h6>
                  <p class="small mb-0" style="color: rgba(255, 255, 255, 0.85) !important; text-shadow: 0 1px 3px rgba(0,0,0,0.8);">Échanges et études de cas financiers</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Photo 2 -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="glass-card p-2 h-100 overflow-hidden" style="border-radius: 20px;">
              <div class="position-relative overflow-hidden rounded-4" style="height: 270px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#photoModal2">
                <img src="{{ asset('images/actualites/reunion-caei-2.jpg') }}" alt="Séminaire LCB/FT - Présentation" class="w-100 h-100" style="object-fit: cover; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">
                <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(to top, rgba(15,23,42,0.92) 0%, rgba(15,23,42,0.6) 60%, transparent 100%);">
                  <h6 class="fw-bold mb-1" style="color: #ffffff !important; text-shadow: 0 1px 4px rgba(0,0,0,0.8);">Présentation Méthodologique</h6>
                  <p class="small mb-0" style="color: rgba(255, 255, 255, 0.85) !important; text-shadow: 0 1px 3px rgba(0,0,0,0.8);">Normes et mécanismes de contrôle interne</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Photo 3 -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="glass-card p-2 h-100 overflow-hidden" style="border-radius: 20px;">
              <div class="position-relative overflow-hidden rounded-4" style="height: 270px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#photoModal3">
                <img src="{{ asset('images/actualites/reunion-caei-3.jpg') }}" alt="Délégation BNDE Sénégal & CAEI" class="w-100 h-100" style="object-fit: cover; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">
                <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(to top, rgba(15,23,42,0.92) 0%, rgba(15,23,42,0.6) 60%, transparent 100%);">
                  <h6 class="fw-bold mb-1" style="color: #ffffff !important; text-shadow: 0 1px 4px rgba(0,0,0,0.8);">Coopération Internationale</h6>
                  <p class="small mb-0" style="color: rgba(255, 255, 255, 0.85) !important; text-shadow: 0 1px 3px rgba(0,0,0,0.8);">Délégation BNDE Sénégal & Experts CAEI</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Photo 4 -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="glass-card p-2 h-100 overflow-hidden" style="border-radius: 20px;">
              <div class="position-relative overflow-hidden rounded-4" style="height: 270px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#photoModal4">
                <img src="{{ asset('images/actualites/reunion-caei-4.jpg') }}" alt="Session d'analyse des risques" class="w-100 h-100" style="object-fit: cover; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">
                <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(to top, rgba(15,23,42,0.92) 0%, rgba(15,23,42,0.6) 60%, transparent 100%);">
                  <h6 class="fw-bold mb-1" style="color: #ffffff !important; text-shadow: 0 1px 4px rgba(0,0,0,0.8);">Identification des Risques</h6>
                  <p class="small mb-0" style="color: rgba(255, 255, 255, 0.85) !important; text-shadow: 0 1px 3px rgba(0,0,0,0.8);">Cartographie des risques et gouvernance</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Photo 5 -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
            <div class="glass-card p-2 h-100 overflow-hidden" style="border-radius: 20px;">
              <div class="position-relative overflow-hidden rounded-4" style="height: 270px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#photoModal5">
                <img src="{{ asset('images/actualites/reunion-caei-5.jpg') }}" alt="Intervention Audit & Conformité" class="w-100 h-100" style="object-fit: cover; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">
                <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(to top, rgba(15,23,42,0.92) 0%, rgba(15,23,42,0.6) 60%, transparent 100%);">
                  <h6 class="fw-bold mb-1" style="color: #ffffff !important; text-shadow: 0 1px 4px rgba(0,0,0,0.8);">Intervention Expert LCB/FT</h6>
                  <p class="small mb-0" style="color: rgba(255, 255, 255, 0.85) !important; text-shadow: 0 1px 3px rgba(0,0,0,0.8);">Dispositif de conformité et audit opérationnel</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Photo 6 -->
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
            <div class="glass-card p-2 h-100 overflow-hidden" style="border-radius: 20px;">
              <div class="position-relative overflow-hidden rounded-4" style="height: 270px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#photoModal6">
                <img src="{{ asset('images/actualites/reunion-caei-6.jpg') }}" alt="CAEI Company Group & Délégation" class="w-100 h-100" style="object-fit: cover; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">
                <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(to top, rgba(15,23,42,0.92) 0%, rgba(15,23,42,0.6) 60%, transparent 100%);">
                  <h6 class="fw-bold mb-1" style="color: #ffffff !important; text-shadow: 0 1px 4px rgba(0,0,0,0.8);">Clôture & Synergie CAEI</h6>
                  <p class="small mb-0" style="color: rgba(255, 255, 255, 0.85) !important; text-shadow: 0 1px 3px rgba(0,0,0,0.8);">Comité Africain d’Expertise Internationale</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- CTA Bas de page -->
      <div class="glass-card p-5 text-center my-4" style="background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(241,245,249,0.9) 100%);" data-aos="zoom-in">
        <h3 class="fw-bold mb-3" style="color: #0f172a;">Intéressé par nos programmes de formation & séminaires ?</h3>
        <p class="fs-6 mb-4 mx-auto" style="color: #475569; max-width: 600px;">
          Découvrez nos programmes d'accompagnement sur mesure pour vos institutions et entreprises.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
          <a href="{{ route('callcenter.contact') }}" class="btn-glass-red text-decoration-none px-4 py-3">
            <i class="bi bi-envelope-fill me-2"></i> Nous contacter pour un séminaire
          </a>
          <a href="{{ route('callcenter.services') }}" class="btn-glass-outline text-decoration-none px-4 py-3">
            <i class="bi bi-grid-fill me-2"></i> Explorer tous nos services
          </a>
        </div>
      </div>

    </div>
  </section>

  <!-- Modales Lightbox -->
  <div class="modal fade" id="photoModal1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content bg-dark border-0 rounded-4 overflow-hidden shadow-lg">
        <div class="modal-header border-0 pb-0">
          <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body p-4 text-center">
          <img src="{{ asset('images/actualites/reunion-caei-1.jpg') }}" class="img-fluid rounded-3 mb-3" alt="Séminaire LCB/FT" style="max-height: 80vh; object-fit: contain;">
          <h5 class="text-white fw-bold mb-1">Cadrage Opérationnel & Travaux en Commission</h5>
          <p class="text-white-50 small mb-0">Séminaire international — Audit du dispositif de conformité LCB/FT (Tunis, Décembre 2025)</p>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="photoModal2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content bg-dark border-0 rounded-4 overflow-hidden shadow-lg">
        <div class="modal-header border-0 pb-0">
          <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body p-4 text-center">
          <img src="{{ asset('images/actualites/reunion-caei-2.jpg') }}" class="img-fluid rounded-3 mb-3" alt="Séminaire LCB/FT" style="max-height: 80vh; object-fit: contain;">
          <h5 class="text-white fw-bold mb-1">Présentation Méthodologique & Audit</h5>
          <p class="text-white-50 small mb-0">Séminaire international — Audit du dispositif de conformité LCB/FT (Tunis, Décembre 2025)</p>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="photoModal3" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content bg-dark border-0 rounded-4 overflow-hidden shadow-lg">
        <div class="modal-header border-0 pb-0">
          <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body p-4 text-center">
          <img src="{{ asset('images/actualites/reunion-caei-3.jpg') }}" class="img-fluid rounded-3 mb-3" alt="Délégation BNDE Sénégal & CAEI" style="max-height: 80vh; object-fit: contain;">
          <h5 class="text-white fw-bold mb-1">Coopération Internationale — BNDE Sénégal</h5>
          <p class="text-white-50 small mb-0">Avec la participation de la Banque Nationale pour le Développement Économique (BNDE) du Sénégal</p>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="photoModal4" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content bg-dark border-0 rounded-4 overflow-hidden shadow-lg">
        <div class="modal-header border-0 pb-0">
          <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body p-4 text-center">
          <img src="{{ asset('images/actualites/reunion-caei-4.jpg') }}" class="img-fluid rounded-3 mb-3" alt="Identification des Risques" style="max-height: 80vh; object-fit: contain;">
          <h5 class="text-white fw-bold mb-1">Identification des Risques & Contrôle Interne</h5>
          <p class="text-white-50 small mb-0">Séminaire international — Audit du dispositif de conformité LCB/FT (Tunis, Décembre 2025)</p>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="photoModal5" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content bg-dark border-0 rounded-4 overflow-hidden shadow-lg">
        <div class="modal-header border-0 pb-0">
          <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body p-4 text-center">
          <img src="{{ asset('images/actualites/reunion-caei-5.jpg') }}" class="img-fluid rounded-3 mb-3" alt="Intervention Expert LCB/FT" style="max-height: 80vh; object-fit: contain;">
          <h5 class="text-white fw-bold mb-1">Intervention Expert : Audit de Conformité LCB/FT</h5>
          <p class="text-white-50 small mb-0">Séminaire international — Audit du dispositif de conformité LCB/FT (Tunis, Décembre 2025)</p>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="photoModal6" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content bg-dark border-0 rounded-4 overflow-hidden shadow-lg">
        <div class="modal-header border-0 pb-0">
          <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body p-4 text-center">
          <img src="{{ asset('images/actualites/reunion-caei-6.jpg') }}" class="img-fluid rounded-3 mb-3" alt="CAEI Company Group" style="max-height: 80vh; object-fit: contain;">
          <h5 class="text-white fw-bold mb-1">CAEI Company Group — Clôture & Synergies</h5>
          <p class="text-white-50 small mb-0">Comité Africain d’Expertise Internationale (CAEI)</p>
        </div>
      </div>
    </div>
  </div>
@endsection
