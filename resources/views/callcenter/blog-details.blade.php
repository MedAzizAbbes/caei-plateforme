@extends('layouts.callcenter')

@section('title', $article['title'] . ' — CAEI Call Center')

@section('content')
  <!-- Header -->
  <section class="py-5 text-center position-relative">
    <div class="container py-4 position-relative z-1" data-aos="fade-up">
      <a href="{{ route('callcenter.blog') }}" class="btn-glass-outline mb-4 d-inline-flex align-items-center" style="font-size: 14px;">
        <i class="bi bi-arrow-left me-2"></i> Retour au blog
      </a>
      <div class="glass-badge mb-3 d-block mx-auto" style="width: fit-content;">{{ $article['category'] }}</div>
      <h1 class="display-5 fw-bold mb-3 text-white">{{ $article['title'] }}</h1>
      <div class="d-flex justify-content-center align-items-center text-white-50 gap-3">
        <span><i class="bi bi-calendar3 me-1"></i> {{ $article['date'] }}</span>
        <span><i class="bi bi-person me-1"></i> Par CAEI Team</span>
      </div>
    </div>
  </section>

  <!-- Article Content -->
  <section class="py-5 position-relative">
    <div class="container pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="glass-card p-4 p-md-5" style="border-radius: 24px;" data-aos="fade-up">
            
            <div class="mb-5 overflow-hidden" style="border-radius: 16px;">
              <img src="{{ $article['image'] }}" class="w-100 img-fluid" alt="Blog cover image">
            </div>

            <div class="text-white" style="line-height: 1.8;">
              {!! $article['content'] !!}
            </div>

            <!-- Share and Tags -->
            <div class="d-flex justify-content-between align-items-center mt-5 pt-4 border-top border-secondary">
              <div class="d-flex gap-2">
                <span class="badge bg-dark border border-secondary px-3 py-2 text-white">{{ $article['category'] }}</span>
                <span class="badge bg-dark border border-secondary px-3 py-2 text-white">Call Center</span>
              </div>
              <div class="d-flex gap-3">
                <span class="text-white-50">Partager :</span>
                <a href="#" class="text-white text-decoration-none"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="text-white text-decoration-none"><i class="bi bi-twitter"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
