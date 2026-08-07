@extends('layouts.callcenter')

@section('title', 'Contactez-nous — CAEI Call Center (Minimaliste)')

@section('content')
  <!-- Header -->
  <section class="py-5 bg-white text-center border-bottom border-light">
    <div class="container py-4" data-aos="fade-up">
      <span class="badge-clean mb-3">Support & Devis</span>
      <h1 class="display-5 fw-bold mb-3">Service Commercial</h1>
      <p class="fs-5 text-muted max-w-2xl mx-auto mb-0">Renseignez vos coordonnées ci-dessous pour être mis en relation avec un chargé d'affaires CAEI Call Center.</p>
    </div>
  </section>

  <!-- Contact Form & Info -->
  <section class="py-5 section-light">
    <div class="container py-5">
      <div class="row g-5">
        
        <!-- Contact Info -->
        <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
          <div class="pe-lg-4 h-100">
            <h4 class="fw-bold mb-4">Coordonnées</h4>
            <p class="text-muted small mb-5" style="text-align: justify;">Notre équipe commerciale s'engage à traiter votre demande de devis ou d'information dans un délai de 24 heures ouvrées.</p>
            
            <div class="mb-4 d-flex">
              <div class="mt-1 me-3">
                <i class="bi bi-geo-alt-fill text-danger fs-4"></i>
              </div>
              <div>
                <h6 class="fw-bold text-uppercase" style="letter-spacing: 1px; font-size: 12px;">Siège Social</h6>
                <p class="text-muted small mb-0">Immeuble Medina Palace,<br>53-55 Av. de Paris, Tunis, Tunisie</p>
              </div>
            </div>
            
            <div class="mb-4 d-flex">
              <div class="mt-1 me-3">
                <i class="bi bi-envelope-fill text-danger fs-4"></i>
              </div>
              <div>
                <h6 class="fw-bold text-uppercase" style="letter-spacing: 1px; font-size: 12px;">Adresse Électronique</h6>
                <p class="text-muted small mb-0">contact@caei-afri.com</p>
              </div>
            </div>

            <div class="mb-4 d-flex">
              <div class="mt-1 me-3">
                <i class="bi bi-telephone-fill text-danger fs-4"></i>
              </div>
              <div>
                <h6 class="fw-bold text-uppercase" style="letter-spacing: 1px; font-size: 12px;">Ligne Directe</h6>
                <p class="text-muted small mb-0">+216 55 335 286</p>
              </div>
            </div>
            
            <div class="mt-5 p-4 rounded-3 bg-white border border-light shadow-sm">
              <h6 class="fw-bold mb-2"><i class="bi bi-clock-fill text-danger me-2"></i> Heures d'Ouverture</h6>
              <p class="text-muted small mb-0">Du Lundi au Vendredi<br>De 09h00 à 18h00 (GMT+1)</p>
            </div>
          </div>
        </div>

        <!-- Form -->
        <div class="col-lg-8" data-aos="fade-left" data-aos-delay="200">
          <div class="clean-card bg-white">
            <h4 class="fw-bold mb-4">Formulaire de Demande</h4>
            <form action="#" method="POST" class="needs-validation">
              @csrf
              <div class="row g-4">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name" class="form-label text-muted fw-semibold small">Raison Sociale / Nom <span class="text-danger">*</span></label>
                    <input type="text" class="form-control-clean w-100" id="name" name="name" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email" class="form-label text-muted fw-semibold small">Email Professionnel <span class="text-danger">*</span></label>
                    <input type="email" class="form-control-clean w-100" id="email" name="email" required>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone" class="form-label text-muted fw-semibold small">Numéro de Téléphone <span class="text-danger">*</span></label>
                    <div class="w-100">
                      <input type="text" class="form-control-clean w-100" id="phone" name="phone" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="subject" class="form-label text-muted fw-semibold small">Objet de la demande <span class="text-danger">*</span></label>
                    <select class="form-select-clean w-100" id="subject" name="subject" required>
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
                    <label for="message" class="form-label text-muted fw-semibold small">Détails du Cahier des Charges <span class="text-danger">*</span></label>
                    <textarea class="form-control-clean w-100" id="message" name="message" style="height: 150px; resize: none;" required></textarea>
                  </div>
                </div>
                <div class="col-12 mt-4 text-end">
                  <button class="btn-clean-red" type="submit">Transmettre la demande</button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
  
  <style>
    /* Specific adjustments for intl-tel-input to match Minimalist mode */
    .iti { width: 100%; display: block; }
    .iti__flag-container { z-index: 5; }
    .iti input { padding-left: 52px !important; }
  </style>
@endsection
