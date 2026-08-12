<?php
$lines = file('resources/views/welcome.blade.php');
$header = implode('', array_slice($lines, 0, 872));
$footer = implode('', array_slice($lines, 1555));

$form = <<<'HTML'

    <section class="section" style="padding-top: 150px; padding-bottom: 100px; background-color: #000518; min-height: 80vh;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="text-center mb-5">
              <h2 class="text-white" style="font-weight: 700; font-family: 'Outfit', sans-serif;">Rejoignez le <span style="color: #ffc451;">CAEI</span></h2>
              <p class="text-white-50">Postulez dès maintenant pour intégrer l'union des experts et des élites africains du continent de renommée internationale.</p>
            </div>

            @if(session('success'))
            <div class="alert alert-success bg-transparent border-success text-success d-flex align-items-center mb-4" role="alert">
              <i class="bi bi-check-circle-fill me-2 fs-4"></i>
              <div>{{ session('success') }}</div>
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger bg-transparent border-danger text-danger mb-4">
              <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <div class="card bg-transparent border border-secondary shadow-lg rounded-4">
              <div class="card-body p-4 p-md-5">
                <form action="{{ route('recrutement.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  
                  <div class="row g-4">
                    <div class="col-md-6">
                      <label class="form-label text-white-50">Nom <span class="text-danger">*</span></label>
                      <input type="text" name="nom" class="form-control bg-transparent text-white border-secondary" required placeholder="Votre nom" value="{{ old('nom') }}">
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label text-white-50">Prénom <span class="text-danger">*</span></label>
                      <input type="text" name="prenom" class="form-control bg-transparent text-white border-secondary" required placeholder="Votre prénom" value="{{ old('prenom') }}">
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label text-white-50">Email <span class="text-danger">*</span></label>
                      <input type="email" name="email" class="form-control bg-transparent text-white border-secondary" required placeholder="votre@email.com" value="{{ old('email') }}">
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label text-white-50">Téléphone <span class="text-danger">*</span></label>
                      <input type="text" name="telephone" class="form-control bg-transparent text-white border-secondary" required placeholder="+216 XX XXX XXX" value="{{ old('telephone') }}">
                    </div>
                    
                    <div class="col-12">
                      <label class="form-label text-white-50">Votre CV (PDF, DOC, DOCX - Max 5MB) <span class="text-danger">*</span></label>
                      <input type="file" name="cv" class="form-control bg-transparent text-white border-secondary" required accept=".pdf,.doc,.docx">
                    </div>
                    
                    <div class="col-12">
                      <label class="form-label text-white-50">Message de motivation (Optionnel)</label>
                      <textarea name="message" class="form-control bg-transparent text-white border-secondary" rows="4" placeholder="Parlez-nous de vous...">{{ old('message') }}</textarea>
                    </div>

                    <div class="col-12 text-center mt-5">
                      <button type="submit" class="btn text-dark fw-bold px-5 py-3 rounded-pill" style="background-color: #ffc451; transition: 0.3s;" onmouseover="this.style.backgroundColor='#e5ad3c'" onmouseout="this.style.backgroundColor='#ffc451'">
                        Soumettre ma candidature
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

HTML;

file_put_contents('resources/views/recrutement/create.blade.php', $header . "\n<main>\n" . $form . "\n</main>\n" . $footer);
echo "Done";
