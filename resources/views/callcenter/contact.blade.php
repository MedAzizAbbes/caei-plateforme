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
          <div class="glass-card h-100">
            <h4 class="fw-bold mb-4 text-white">Formulaire de Demande</h4>
            
            @if(session('success'))
                <div class="alert alert-success bg-success bg-opacity-25 text-white border-0 mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                </div>
            @endif

            <form action="{{ route('callcenter.contact.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation">
              @csrf
              <div class="row g-4">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name" class="form-label fw-semibold small" style="color: #94a3b8;">Nom & Prénom / Contact <span class="text-danger">*</span></label>
                    <input type="text" class="form-control-glass w-100" id="name" name="name" required placeholder="Votre nom & prénom">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email" class="form-label fw-semibold small" style="color: #94a3b8;">Email Professionnel <span class="text-danger">*</span></label>
                    <input type="email" class="form-control-glass w-100" id="email" name="email" required placeholder="votre@email.com">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone" class="form-label fw-semibold small" style="color: #94a3b8;">Numéro de Téléphone <span class="text-danger">*</span></label>
                    <div class="w-100">
                      <input type="tel" class="form-control-glass w-100" id="phone" name="phone" required placeholder="+216 XX XXX XXX">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pays" class="form-label fw-semibold small" style="color: #94a3b8;">Pays <span class="text-danger">*</span></label>
                    <input type="text" class="form-control-glass w-100" id="pays" name="pays" required placeholder="Ex: Tunisie, France, Côte d'Ivoire...">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="entreprise" class="form-label fw-semibold small" style="color: #94a3b8;">Entreprise / Institution <span class="text-danger">*</span></label>
                    <input type="text" class="form-control-glass w-100" id="entreprise" name="entreprise" required placeholder="Nom de votre entreprise">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="poste" class="form-label fw-semibold small" style="color: #94a3b8;">Fonction / Poste <span class="text-danger">*</span></label>
                    <input type="text" class="form-control-glass w-100" id="poste" name="poste" required placeholder="Ex: Directeur Commercial, Responsable SAV...">
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <label for="subject" class="form-label fw-semibold small" style="color: #94a3b8;">Objet de la demande <span class="text-danger">*</span></label>
                    <select class="form-select-glass w-100" id="subject" name="subject" required>
                      <option value="" selected disabled>Sélectionner une option</option>
                      <option value="Devis Externalisation">Demande de Devis d'Externalisation</option>
                      <option value="Service Client 24/7">Service Client & Réception d'appels</option>
                      <option value="Téléprospection & Vente">Téléprospection & Vente Sortante</option>
                      <option value="Support Technique & Helpdesk">Support Technique & Helpdesk</option>
                      <option value="Information Générale">Demande d'Information Générale</option>
                      <option value="Partenariat">Proposition de Partenariat</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-12">
                  <div class="form-group">
                    <label for="message" class="form-label fw-semibold small" style="color: #94a3b8;">Détails de votre besoin / Message <span class="text-danger">*</span></label>
                    <textarea class="form-control-glass w-100" id="message" name="message" style="height: 130px; resize: none;" required placeholder="Précisez vos besoins, volumes d'appels, plages horaires souhaitées..."></textarea>
                  </div>
                </div>

                <!-- Pièce Jointe / Document -->
                <div class="col-12">
                  <div class="form-group">
                    <label for="attachment" class="form-label fw-semibold small d-flex justify-content-between align-items-center" style="color: #94a3b8;">
                      <span><i class="bi bi-paperclip me-1" style="color: #ff6b6b;"></i> Pièce jointe / Cahier des charges (Optionnel)</span>
                      <span class="text-white-50" style="font-size: 11px;">PDF, DOC, DOCX, PNG, JPG (Max 10 Mo)</span>
                    </label>
                    <input type="file" class="form-control-glass w-100 py-2" id="attachment" name="attachment" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg,.zip">
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
    /* ── intl-tel-input — Light Theme ── */
    .iti { width: 100%; display: block; }
    .iti__flag-container { z-index: 5; }

    /* Bouton du drapeau */
    .iti__flag-container .iti__selected-flag {
      background: rgba(241, 245, 249, 0.9) !important;
      border-right: 1px solid #cbd5e1;
      border-radius: 12px 0 0 12px;
      padding: 0 12px;
      transition: background 0.2s;
    }
    .iti__flag-container .iti__selected-flag:hover,
    .iti__flag-container .iti__selected-flag:focus {
      background: rgba(127, 5, 4, 0.08) !important;
    }
    .iti__selected-dial-code {
      color: #334155;
      font-size: 13px;
      font-weight: 600;
      margin-left: 6px;
    }
    .iti__arrow {
      border-top-color: #64748b !important;
    }

    /* Input téléphone */
    .iti input[type=tel] {
      padding-left: 90px !important;
      background: #ffffff !important;
      border: 1px solid #cbd5e1 !important;
      border-radius: 12px !important;
      color: #0f172a !important;
      width: 100%;
    }
    .iti input[type=tel]:focus {
      border-color: var(--cc-red) !important;
      box-shadow: 0 0 0 4px rgba(127, 5, 4, 0.12) !important;
      outline: none;
    }
    .iti input[type=tel]::placeholder {
      color: #94a3b8;
    }

    /* Liste des pays (dropdown) */
    .iti__country-list {
      background-color: #ffffff !important;
      border: 1px solid #e2e8f0 !important;
      border-radius: 12px !important;
      box-shadow: 0 20px 40px rgba(15, 23, 42, 0.1);
      color: #334155 !important;
      padding: 6px;
      max-height: 220px;
      scrollbar-width: thin;
      scrollbar-color: rgba(127,5,4,0.3) transparent;
    }
    .iti__country-list::-webkit-scrollbar { width: 4px; }
    .iti__country-list::-webkit-scrollbar-track { background: transparent; }
    .iti__country-list::-webkit-scrollbar-thumb { background: rgba(127,5,4,0.3); border-radius: 4px; }

    .iti__country {
      border-radius: 8px;
      padding: 8px 10px !important;
      transition: background 0.15s;
      color: #334155;
    }
    .iti__country.iti__highlight,
    .iti__country:hover {
      background: rgba(127, 5, 4, 0.08) !important;
      color: var(--cc-red) !important;
    }
    .iti__country-name, .iti__dial-code {
      color: inherit !important;
    }
    .iti__divider {
      border-bottom: 1px solid #e2e8f0 !important;
      margin: 4px 0;
    }
    .iti__search-input {
      background: #f8fafc !important;
      border: 1px solid #cbd5e1 !important;
      border-radius: 8px !important;
      color: #0f172a !important;
      padding: 8px 12px !important;
      margin-bottom: 4px;
    }
    .iti__search-input::placeholder { color: #94a3b8 !important; }
    .iti__search-input:focus { border-color: var(--cc-red) !important; outline: none !important; }
  </style>
@endsection

@section('scripts')
  {{-- intl-tel-input chargé uniquement sur la page contact --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  <style>
    .iti__flag {background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/img/flags.png");}
    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
      .iti__flag {background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/img/flags@2x.png");}
    }
  </style>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const input = document.querySelector('#phone');
    if (!input) return;

    const iti = window.intlTelInput(input, {
      initialCountry: "tn",   // fixé — évite le fetch ipapi.co externe
      separateDialCode: true,
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });

    const form = input.closest('form');
    if (form) {
      form.addEventListener('submit', function() {
        if (input.value.trim()) {
          input.value = iti.getNumber();
        }
      });
    }
  });
  </script>
@endsection
