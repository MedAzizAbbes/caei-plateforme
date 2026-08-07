@extends('layouts.callcenter')

@section('title', 'Contactez-nous — CAEI Call Center (3D Glassmorphism)')

@section('content')
  <!-- Header -->
  <section class="py-5 text-center position-relative">
    <div class="container py-4 position-relative z-1" data-aos="fade-up">
      <div class="glass-badge mb-4 d-inline-block">Support & Devis</div>
      <h1 class="display-4 fw-bold mb-3 text-white">Service Commercial</h1>
      <p class="fs-5 max-w-2xl mx-auto mb-0" style="color: #cbd5e1;">Renseignez vos coordonnées ci-dessous pour être mis en relation avec un chargé d'affaires CAEI Call Center.</p>
    </div>
  </section>

  <!-- Contact Form & Info -->
  <section class="py-5 position-relative">
    <div class="container py-5">
      <div class="row g-5">
        
        <!-- Contact Info -->
        <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
          <div class="glass-card pe-lg-4 h-100">
            <h4 class="fw-bold mb-4 text-white">Coordonnées</h4>
            <p class="small mb-5" style="color: #cbd5e1; text-align: justify;">Notre équipe commerciale s'engage à traiter votre demande de devis ou d'information dans un délai de 24 heures ouvrées.</p>
            
            <div class="mb-4 d-flex">
              <div class="mt-1 me-3">
                <i class="bi bi-geo-alt-fill fs-4" style="color: var(--cc-red);"></i>
              </div>
              <div>
                <h6 class="fw-bold text-white text-uppercase" style="letter-spacing: 1px; font-size: 12px;">Siège Social</h6>
                <p class="small mb-0" style="color: #cbd5e1;">Immeuble Medina Palace,<br>53-55 Av. de Paris, Tunis</p>
              </div>
            </div>
            
            <div class="mb-4 d-flex">
              <div class="mt-1 me-3">
                <i class="bi bi-envelope-fill fs-4" style="color: var(--cc-red);"></i>
              </div>
              <div>
                <h6 class="fw-bold text-white text-uppercase" style="letter-spacing: 1px; font-size: 12px;">Adresse Électronique</h6>
                <p class="small mb-0" style="color: #cbd5e1;">contact@caei-afri.com</p>
              </div>
            </div>

            <div class="mb-4 d-flex">
              <div class="mt-1 me-3">
                <i class="bi bi-telephone-fill fs-4" style="color: var(--cc-red);"></i>
              </div>
              <div>
                <h6 class="fw-bold text-white text-uppercase" style="letter-spacing: 1px; font-size: 12px;">Ligne Directe</h6>
                <p class="small mb-0" style="color: #cbd5e1;">+216 55 335 286</p>
              </div>
            </div>
            
            <div class="mt-5 p-4 rounded-4" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
              <h6 class="fw-bold text-white mb-2"><i class="bi bi-clock-fill me-2" style="color: var(--cc-red);"></i> Heures d'Ouverture</h6>
              <p class="small mb-0" style="color: #cbd5e1;">Du Lundi au Vendredi<br>De 09h00 à 18h00 (GMT+1)</p>
            </div>
          </div>
        </div>

        <!-- Form -->
        <div class="col-lg-8" data-aos="fade-left" data-aos-delay="200">
          <div class="glass-card p-4 p-lg-5 h-100">
            <h4 class="fw-bold mb-4 text-white">Formulaire de Demande</h4>
            
            @if(session('success'))
                <div class="alert alert-success bg-success bg-opacity-25 text-white border-0 mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                </div>
            @endif

            <form action="{{ route('callcenter.contact.store') }}" method="POST" class="needs-validation">
              @csrf
              <div class="row g-4">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name" class="form-label fw-semibold small" style="color: #94a3b8;">Raison Sociale / Nom <span class="text-danger">*</span></label>
                    <input type="text" class="form-control-glass w-100" id="name" name="name" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email" class="form-label fw-semibold small" style="color: #94a3b8;">Email Professionnel <span class="text-danger">*</span></label>
                    <input type="email" class="form-control-glass w-100" id="email" name="email" required>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone" class="form-label fw-semibold small" style="color: #94a3b8;">Numéro de Téléphone <span class="text-danger">*</span></label>
                    <div class="w-100">
                      <input type="text" class="form-control-glass w-100" id="phone" name="phone" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="subject" class="form-label fw-semibold small" style="color: #94a3b8;">Objet de la demande <span class="text-danger">*</span></label>
                    <select class="form-select-glass w-100" id="subject" name="subject" required>
                      <option value="" selected disabled>Sélectionner une option</option>
                      <option value="Devis">Demande de Devis d'Externalisation</option>
                      <option value="Information">Demande d'Information Générale</option>
                      <option value="Partenariat">Proposition de Partenariat</option>
                      <option value="Recrutement">Recrutement</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-12">
                  <div class="form-group">
                    <label for="message" class="form-label fw-semibold small" style="color: #94a3b8;">Détails du Cahier des Charges <span class="text-danger">*</span></label>
                    <textarea class="form-control-glass w-100" id="message" name="message" style="height: 150px; resize: none;" required></textarea>
                  </div>
                </div>
                <div class="col-12 mt-4 text-end">
                  <button class="btn-glass-red" type="submit">Transmettre la demande</button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
  
  <style>
    /* Specific adjustments for intl-tel-input to match Glass mode */
    .iti { width: 100%; display: block; }
    .iti__flag-container { z-index: 5; }
    .iti input { padding-left: 52px !important; }
    .iti__country-list { background-color: rgba(5, 5, 10, 0.95) !important; backdrop-filter: blur(10px); color: white !important; border-color: rgba(255,255,255,0.1) !important; }
    .iti__country.iti__highlight { background-color: rgba(209, 17, 65, 0.3) !important; }
    .iti__divider { border-bottom: 1px solid rgba(255,255,255,0.1) !important; }
  </style>
@endsection
