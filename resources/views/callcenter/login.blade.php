@extends('layouts.callcenter')

@section('title', 'Connexion — CAEI Call Center')

@section('content')
<section class="py-5" style="min-height: 80vh; display: flex; align-items: center; justify-content: center;">
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-8 col-sm-10">

        <!-- Glassmorphism Login Card -->
        <div class="glass-card text-center p-4 p-md-5 shadow-lg position-relative" style="border-radius: 28px; background: rgba(255, 255, 255, 0.92); backdrop-filter: blur(20px); border: 1px solid rgba(127, 5, 4, 0.2); box-shadow: 0 20px 50px rgba(127, 5, 4, 0.12);">
          
          <!-- Top Badge -->
          <div class="mb-4">
            <span class="glass-badge" style="background: rgba(127, 5, 4, 0.08); border-color: rgba(127, 5, 4, 0.25); color: var(--cc-red); padding: 8px 20px; font-weight: 700;">
              <i class="bi bi-shield-lock-fill me-2"></i> Espace Sécurisé
            </span>
          </div>

          <!-- Logo -->
          <div class="mb-4">
            <img src="{{ asset('images/logo-call-center.png') }}" alt="CAEI Call Center" style="max-height: 90px; width: auto; filter: drop-shadow(0 4px 10px rgba(127, 5, 4, 0.15));">
          </div>

          <h3 class="fw-bold mb-2" style="color: #0f172a; font-size: 24px;">Connexion Call Center</h3>
          <p class="small text-muted mb-4" style="color: #475569 !important;">Accédez à votre espace d'administration, d'agent ou de partenaire.</p>

          <!-- Roles Info Pills -->
          <div class="d-flex justify-content-center gap-2 mb-4 flex-wrap" style="font-size: 11px;">
            <span class="badge rounded-pill px-3 py-2" style="background: rgba(127, 5, 4, 0.1); color: var(--cc-red); border: 1px solid rgba(127, 5, 4, 0.2);">
              <i class="bi bi-person-badge me-1"></i> Admin
            </span>
            <span class="badge rounded-pill px-3 py-2" style="background: rgba(14, 165, 233, 0.1); color: #0284c7; border: 1px solid rgba(14, 165, 233, 0.2);">
              <i class="bi bi-headset me-1"></i> Agent
            </span>
            <span class="badge rounded-pill px-3 py-2" style="background: rgba(16, 185, 129, 0.1); color: #059669; border: 1px solid rgba(16, 185, 129, 0.2);">
              <i class="bi bi-handbag me-1"></i> Partenaire
            </span>
          </div>

          <!-- Session Status / Errors -->
          @if (session('status'))
            <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 text-start small">
              <i class="bi bi-check-circle-fill me-2"></i> {{ session('status') }}
            </div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4 text-start small" style="background: #fef2f2; color: #991b1b; border: 1px solid #fecaca !important;">
              <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ $errors->first() }}
            </div>
          @endif

          <!-- Form -->
          <form method="POST" action="{{ route('callcenter.login.post') }}" class="text-start">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
              <label for="email" class="form-label fw-bold small text-slate-700 mb-1" style="color: #334155 !important;">
                Adresse Email <span class="text-danger">*</span>
              </label>
              <div class="position-relative">
                <i class="bi bi-envelope-fill position-absolute top-50 translate-middle-y ms-3" style="color: var(--cc-red); font-size: 16px; z-index: 5;"></i>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="form-control form-control-glass ps-5" placeholder="ex: agent@caei-callcenter.com" style="border-radius: 14px; padding-left: 45px !important;">
              </div>
            </div>

            <!-- Password -->
            <div class="mb-3">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <label for="password" class="form-label fw-bold small text-slate-700 mb-0" style="color: #334155 !important;">
                  Mot de passe <span class="text-danger">*</span>
                </label>
                @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}" class="small text-decoration-none" style="color: var(--cc-red); font-weight: 600; font-size: 12px;">
                    Mot de passe oublié ?
                  </a>
                @endif
              </div>
              <div class="position-relative">
                <i class="bi bi-lock-fill position-absolute top-50 translate-middle-y ms-3" style="color: var(--cc-red); font-size: 16px; z-index: 5;"></i>
                <input id="password" type="password" name="password" required
                       class="form-control form-control-glass ps-5 pe-5" placeholder="••••••••" style="border-radius: 14px; padding-left: 45px !important;">
                <button type="button" class="btn btn-link position-absolute top-50 end-0 translate-middle-y text-muted pe-3 text-decoration-none" onclick="togglePasswordVisibility()" style="z-index: 5;">
                  <i class="bi bi-eye" id="togglePasswordIcon"></i>
                </button>
              </div>
            </div>

            <!-- Remember Me -->
            <div class="mb-4 form-check">
              <input id="remember_me" type="checkbox" class="form-check-input" name="remember" style="accent-color: var(--cc-red); cursor: pointer;">
              <label for="remember_me" class="form-check-label small text-muted" style="cursor: pointer; color: #64748b !important;">
                Se souvenir de moi
              </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-glass-red w-100 py-3 rounded-4 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2" style="font-size: 16px;">
              <i class="bi bi-box-arrow-in-right fs-5"></i> Se connecter
            </button>
          </form>

          <!-- Back link -->
          <div class="mt-4 pt-3 border-top" style="border-color: rgba(226, 232, 240, 0.8) !important;">
            <a href="{{ route('callcenter.index') }}" class="small text-decoration-none d-inline-flex align-items-center gap-2" style="color: #64748b; font-weight: 600;" onmouseover="this.style.color='var(--cc-red)'" onmouseout="this.style.color='#64748b'">
              <i class="bi bi-arrow-left"></i> Retour à la page Call Center
            </a>
          </div>

        </div>

      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')
<script>
  function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('togglePasswordIcon');
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      toggleIcon.classList.remove('bi-eye');
      toggleIcon.classList.add('bi-eye-slash');
    } else {
      passwordInput.type = 'password';
      toggleIcon.classList.remove('bi-eye-slash');
      toggleIcon.classList.add('bi-eye');
    }
  }
</script>
@endsection
