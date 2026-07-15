<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'CAEI Plateforme') }} — Séminaires</title>
        <meta name="description" content="Consultez et inscrivez-vous aux séminaires CAEI Company Group. Formation professionnelle, gestion des participants et suivi de présence.">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .section-divider {
                border: none;
                height: 2px;
                background: linear-gradient(90deg, transparent, rgba(248, 180, 0, .55), transparent);
                margin: 0 auto;
                max-width: 200px;
            }
            html { scroll-behavior: smooth; }

            .seminar-card {
                background: #ffffff;
                border-radius: 20px;
                border: 1px solid rgba(11, 42, 102, 0.08);
                box-shadow: 0 8px 24px rgba(11, 42, 102, 0.08);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                overflow: hidden;
            }
            .seminar-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 20px 48px rgba(11, 42, 102, 0.16);
            }

            .seminar-card__cover {
                position: relative;
                width: 100%;
                aspect-ratio: 16 / 9;
                overflow: hidden;
                background: #0B2A66;
            }
            .seminar-card__image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.3s ease;
            }
            .seminar-card:hover .seminar-card__image {
                transform: scale(1.05);
            }
            .seminar-card__cover::after {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(180deg, rgba(11, 42, 102, 0) 40%, rgba(11, 42, 102, 0.35) 100%);
                pointer-events: none;
            }

            .seminar-card__badge {
                position: absolute;
                top: 14px;
                right: 14px;
                z-index: 2;
                background: rgba(255, 255, 255, 0.95);
                color: #15803d;
                border: 1px solid rgba(34, 197, 94, 0.35);
                font-size: 0.72rem;
                font-weight: 800;
                letter-spacing: 0.04em;
                text-transform: uppercase;
                padding: 0.45rem 0.85rem;
                border-radius: 999px;
                box-shadow: 0 4px 14px rgba(11, 42, 102, 0.12);
                backdrop-filter: blur(6px);
            }

            .seminar-card__body {
                display: flex;
                flex-direction: column;
                flex: 1;
                padding: 1.5rem;
            }
            .seminar-card__title {
                font-size: 1.2rem;
                font-weight: 800;
                color: #0B2A66;
                line-height: 1.35;
            }
            .seminar-card__description {
                margin-top: 0.5rem;
                font-size: 0.875rem;
                color: #64748b;
                line-height: 1.6;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .seminar-card__meta {
                margin-top: 1rem;
                display: flex;
                flex-direction: column;
                gap: 0.55rem;
            }
            .seminar-card__meta-item {
                display: flex;
                align-items: center;
                gap: 0.55rem;
                font-size: 0.875rem;
                color: #475569;
            }
            .seminar-card__meta-item svg {
                width: 1rem;
                height: 1rem;
                color: #F8B400;
                flex-shrink: 0;
            }

            .seminar-card__actions {
                margin-top: auto;
                padding-top: 1.25rem;
                border-top: 1px solid #f1f5f9;
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }
            .seminar-card__btn-details {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                padding: 0.65rem 1rem;
                border-radius: 12px;
                border: 2px solid #0B2A66;
                background: #ffffff;
                color: #0B2A66;
                font-size: 0.875rem;
                font-weight: 700;
                transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease;
            }
            .seminar-card__btn-details:hover {
                background: #0B2A66;
                color: #ffffff;
                transform: translateY(-1px);
            }
            .seminar-card__btn-register {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                padding: 0.65rem 1rem;
                border-radius: 12px;
                border: none;
                background: linear-gradient(135deg, #F8B400 0%, #ffd45c 100%);
                color: #0B2A66;
                font-size: 0.875rem;
                font-weight: 900;
                text-transform: uppercase;
                letter-spacing: 0.03em;
                transition: filter 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            }
            .seminar-card__btn-register:hover {
                filter: brightness(1.05);
                transform: translateY(-1px);
                box-shadow: 0 8px 20px rgba(248, 180, 0, 0.35);
            }

            @media (max-width: 639px) {
                .seminar-card__title { font-size: 1.1rem; }
                .seminar-card__body { padding: 1.15rem; }
            }
        </style>
    </head>
    <body class="font-sans antialiased text-white">
        <main class="min-h-screen bg-caei-navy">

            {{-- ══════════ SECTION HERO ══════════ --}}
            <section class="caei-hero" style="background-image: url('{{ asset('images/hero/hero_bg.png') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
                {{-- Topbar --}}
                <div class="caei-topbar">
                    <span>+216 55 335 286</span>
                    <span>contact@caei-afri.com</span>
                    <span>SIS 8 Rue Claude Bernard 1002 Belvedere-Tunis, Tunisie</span>
                    <span class="ms-auto hidden lg:inline-flex">Catalogue CAEI COMPANY GROUP</span>
                </div>

                {{-- Navigation --}}
                <nav class="caei-public-nav">
                    <a href="{{ route('home') }}" class="flex items-center hover:scale-105 transition-transform duration-300" aria-label="CAEI Company Group">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo CAEI" class="h-16 w-16 md:h-20 md:w-20 rounded-full object-cover shadow-md border-2 border-white/10">
                    </a>
                    
                    {{-- Desktop Links --}}
                    <div class="caei-public-links">
                        <a class="active" href="{{ route('home') }}">Accueil</a>
                        <a href="#seminaires">Séminaires</a>
                    </div>

                    {{-- Actions (Right Aligned) --}}
                    <div class="flex items-center gap-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="caei-btn caei-btn-gold text-xs py-2.5 px-5">Mon espace</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-white/95 hover:text-[#ffbd45] transition-colors">Connexion</a>
                            <a href="{{ route('register') }}" class="caei-btn caei-btn-gold text-xs py-2.5 px-5">Créer un compte</a>
                        @endauth
                    </div>
                </nav>

                {{-- Hero Content --}}
                <div class="caei-hero-content">
                    <p class="caei-eyebrow">Plateforme officielle CAEI Company Group</p>
                    <h1>
                        <span>Bienvenue sur</span>
                        CAEI Plateforme
                    </h1>
                    <p class="caei-hero-copy">
                        Découvrez nos séminaires professionnels, inscrivez-vous en ligne et accédez à votre espace participant avec vos supports et votre QR code de présence.
                    </p>
                    <div class="caei-actions">
                        <a href="#seminaires" class="caei-btn caei-btn-gold">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                            Voir les séminaires
                        </a>
                        
                        @auth
                            <a href="{{ route('dashboard') }}" class="caei-btn caei-btn-outline">Mon espace</a>
                        @endauth
                    </div>
                </div>
            </section>

            {{-- ══════════ SECTION SÉMINAIRES ══════════ --}}
            <section id="seminaires" class="py-20 bg-slate-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    {{-- En-tête section --}}
                    <div class="text-center mb-12">
                        <p class="text-sm font-black uppercase text-[#f2a90f] tracking-widest">CAEI Company Group</p>
                        <h2 class="mt-3 text-4xl font-black uppercase text-[#061743]">Nos Séminaires</h2>
                        <hr class="section-divider mt-5">
                        <p class="mt-6 text-slate-600 max-w-2xl mx-auto text-base">
                            Consultez nos séminaires disponibles. Cliquez sur "Voir les détails" pour en savoir plus ou sur "S'inscrire" pour rejoindre un séminaire.
                        </p>
                    </div>

                    {{-- Grille de séminaires --}}
                    @if($seminars->isEmpty())
                        <div class="text-center py-20">
                            <div class="mx-auto w-20 h-20 rounded-full bg-[#061743]/8 flex items-center justify-center mb-6">
                                <svg class="w-10 h-10 text-[#061743]/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-black text-[#061743]">Aucun séminaire disponible</h3>
                            <p class="mt-2 text-slate-500">De nouveaux séminaires seront publiés prochainement.</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach($seminars as $seminar)
                                <article class="seminar-card flex flex-col">
                                    <div class="seminar-card__cover">
                                        <img
                                            src="{{ $seminar->image ? Storage::url($seminar->image) : asset('images/seminars/default.svg') }}"
                                            alt="Affiche — {{ $seminar->theme }}"
                                            class="seminar-card__image"
                                        >
                                        <span class="seminar-card__badge">Ouvert</span>
                                    </div>

                                    <div class="seminar-card__body">
                                        <h3 class="seminar-card__title">
                                            {{ $seminar->theme }}
                                        </h3>

                                        @if($seminar->description)
                                            <p class="seminar-card__description">
                                                {{ $seminar->description }}
                                            </p>
                                        @endif

                                        <div class="seminar-card__meta">
                                            <div class="seminar-card__meta-item">
                                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                <span>
                                                    {{ $seminar->start_date->format('d/m/Y') }}
                                                    @if($seminar->start_date != $seminar->end_date)
                                                        — {{ $seminar->end_date->format('d/m/Y') }}
                                                    @endif
                                                </span>
                                            </div>

                                            <div class="seminar-card__meta-item">
                                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                                <span>{{ $seminar->country }}</span>
                                            </div>

                                            @if($seminar->price)
                                                <div class="seminar-card__meta-item">
                                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <span class="font-bold text-[#0B2A66]">{{ number_format($seminar->price, 2, ',', ' ') }} €</span>
                                                </div>
                                            @endif

                                            <div class="seminar-card__meta-item">
                                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                                <span>{{ $seminar->registrations_count }} participant(s) inscrit(s)</span>
                                            </div>

                                            @if($seminar->trainers->isNotEmpty())
                                                <div class="seminar-card__meta-item">
                                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                    </svg>
                                                    <span>{{ $seminar->trainers->map->fullName()->join(', ') }}</span>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="seminar-card__actions">
                                            <a href="{{ route('seminaires.show', $seminar) }}" class="seminar-card__btn-details">
                                                Voir les détails
                                            </a>

                                            @auth
                                                <a href="{{ route('registration.create', ['seminar_id' => $seminar->id]) }}" class="seminar-card__btn-register">
                                                    S'inscrire
                                                </a>
                                            @else
                                                <a href="{{ route('login') }}" class="seminar-card__btn-register">
                                                    S'inscrire
                                                </a>
                                            @endauth
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @endif

                    {{-- CTA bas de page --}}
                    
            </section>

            {{-- Footer --}}
            <footer class="bg-[#041136] py-10 text-center text-white/50 text-sm">
                <p class="font-black text-white/80 text-base mb-1">CAEI Company Group</p>
                <p>SIS 8 Rue Claude Bernard 1002 Belvedere-Tunis, Tunisie</p>
                <p class="mt-1">contact@caei-afri.com — +216 55 335 286</p>
                <p class="mt-4">&copy; {{ date('Y') }} CAEI Company Group. Tous droits réservés.</p>
            </footer>

        </main>
    </body>
</html>
