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

            .seminar-card-modern {
                position: relative;
                width: 100%;
                aspect-ratio: 40 / 60; /* Ratio 40x60 (2:3) */
                border-radius: 20px;
                overflow: hidden;
                background-color: #061743;
                box-shadow: 0 8px 24px rgba(6, 23, 67, 0.05);
                transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            }
            .seminar-card-modern:hover {
                transform: translateY(-6px);
                box-shadow: 0 16px 32px rgba(6, 23, 67, 0.15);
            }

            /* Image et Zoom */
            .seminar-card-image-wrap {
                width: 100%;
                height: 100%;
                overflow: hidden;
                position: relative;
            }
            .seminar-card-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            }
            .seminar-card-modern:hover .seminar-card-image {
                transform: scale(1.1);
            }

            /* Overlay dégradé subtil au repos pour un rendu élégant */
            .seminar-card-image-wrap::after {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(to top, rgba(6, 23, 67, 0.45) 0%, transparent 60%);
                pointer-events: none;
            }

            /* Badge de Statut */
            .seminar-card-status-badge {
                position: absolute;
                top: 14px;
                right: 14px;
                z-index: 5;
                background: rgba(22, 163, 74, 0.9);
                color: #ffffff;
                font-size: 0.68rem;
                font-weight: 800;
                letter-spacing: 0.06em;
                text-transform: uppercase;
                padding: 0.4rem 0.8rem;
                border-radius: 99px;
                box-shadow: 0 4px 12px rgba(6, 23, 67, 0.15);
                backdrop-filter: blur(4px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            /* Zone de détails en overlay glissant */
            .seminar-card-overlay {
                position: absolute;
                inset: 0;
                z-index: 10;
                background: linear-gradient(to top, 
                    rgba(6, 23, 67, 0.98) 0%, 
                    rgba(6, 23, 67, 0.93) 60%, 
                    rgba(6, 23, 67, 0.6) 100%);
                backdrop-filter: blur(8px);
                -webkit-backdrop-filter: blur(8px);
                padding: 1.5rem 1.25rem;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                transform: translateY(100%);
                transition: transform 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
            }
            .seminar-card-modern:hover .seminar-card-overlay {
                transform: translateY(0);
            }

            /* Titre et description dans l'overlay */
            .seminar-card-title-overlay {
                font-size: 1.15rem;
                font-weight: 900;
                color: #ffffff;
                line-height: 1.3;
                text-transform: uppercase;
                letter-spacing: -0.01em;
            }
            .seminar-card-desc-overlay {
                margin-top: 0.5rem;
                font-size: 0.78rem;
                color: #cbd5e1;
                line-height: 1.45;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
            
            /* Métadonnées */
            .seminar-card-meta-list {
                display: flex;
                flex-direction: column;
                gap: 0.45rem;
                margin-top: 0.85rem;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                padding-top: 0.65rem;
            }
            .seminar-card-meta-row {
                display: flex;
                align-items: center;
                gap: 0.55rem;
                font-size: 0.8rem;
                color: #e2e8f0;
            }
            .seminar-card-meta-row svg {
                width: 0.9rem;
                height: 0.9rem;
                color: #f2a90f;
                flex-shrink: 0;
            }

            /* Boutons d'action */
            .seminar-card-buttons {
                display: flex;
                flex-direction: column;
                gap: 0.45rem;
                margin-top: 1rem;
            }
            .seminar-card-btn-view {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                padding: 0.55rem 1rem;
                border-radius: 10px;
                border: 2px solid #ffffff;
                background: transparent;
                color: #ffffff;
                font-size: 0.72rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                transition: all 0.3s ease;
            }
            .seminar-card-btn-view:hover {
                background: #ffffff;
                color: #061743;
            }
            .seminar-card-btn-sub {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                padding: 0.55rem 1rem;
                border-radius: 10px;
                border: none;
                background: #f2a90f;
                color: #061743;
                font-size: 0.72rem;
                font-weight: 900;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                box-shadow: 0 4px 12px rgba(242, 169, 15, 0.2);
                transition: all 0.3s ease;
            }
            .seminar-card-btn-sub:hover {
                background: #ffd071;
                transform: translateY(-1px);
                box-shadow: 0 6px 16px rgba(242, 169, 15, 0.35);
            }
            
            /* Fallback d'affiche si l'image est absente */
            .seminar-card-image-fallback {
                width: 100%;
                height: 100%;
                background: radial-gradient(circle at top left, #0b2a66 0%, #061743 100%);
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 2rem;
                text-align: center;
                position: relative;
                transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            }
            .seminar-card-image-fallback::before {
                content: '';
                position: absolute;
                inset: 12px;
                border: 2px dashed rgba(242, 169, 15, 0.2);
                border-radius: 12px;
                pointer-events: none;
            }
            .seminar-card-modern:hover .seminar-card-image-fallback {
                transform: scale(1.08);
            }


            @keyframes bounceSlow {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-12px); }
            }
            .animate-bounce-slow {
                animation: bounceSlow 4s ease-in-out infinite;
            }

            @media (max-width: 639px) {
                .seminar-card-title-overlay { font-size: 1.15rem; }
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
                        @else
                            <a href="{{ route('login') }}" class="caei-btn caei-btn-outline">Se connecter</a>
                        @endauth
                    </div>
                </div>
            </section>

            {{-- ══════════ SECTION SÉMINAIRES ══════════ --}}
            <section id="seminaires" class="pt-20 pb-32 bg-slate-50">
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
                        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 mb-12">
                            @foreach($seminars as $seminar)
                                <article class="seminar-card-modern">
                                    <!-- Affiche / Image du séminaire -->
                                    <div class="seminar-card-image-wrap">
                                        @if($seminar->image)
                                            <img
                                                src="{{ Storage::url($seminar->image) }}"
                                                alt="Affiche — {{ $seminar->theme }}"
                                                class="seminar-card-image"
                                            >
                                        @else
                                            <div class="seminar-card-image-fallback">
                                                <div class="h-16 w-16 rounded-full bg-[#f2a90f]/10 flex items-center justify-center mb-4">
                                                    <svg class="w-8 h-8 text-[#f2a90f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                    </svg>
                                                </div>
                                                <h4 class="text-white font-black text-sm uppercase px-4 line-clamp-3 leading-tight">{{ $seminar->theme }}</h4>
                                                <p class="text-[9px] text-[#f2a90f] mt-3 uppercase tracking-widest font-black">CAEI Company Group</p>
                                            </div>
                                        @endif

                                        <!-- Badge de Statut (Visible par défaut) -->
                                        <span class="seminar-card-status-badge">Ouvert</span>
                                    </div>

                                    <!-- Zone de détails en overlay (Affichée au hover) -->
                                    <div class="seminar-card-overlay">
                                        <div>
                                            <h3 class="seminar-card-title-overlay">
                                                {{ $seminar->theme }}
                                            </h3>

                                            @if($seminar->description)
                                                <p class="seminar-card-desc-overlay">
                                                    {{ $seminar->description }}
                                                </p>
                                            @endif

                                            <div class="seminar-card-meta-list">
                                                <!-- Date -->
                                                <div class="seminar-card-meta-row">
                                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                    </svg>
                                                    <span class="font-medium">
                                                        Du {{ $seminar->start_date->format('d/m/Y') }}
                                                        @if($seminar->start_date != $seminar->end_date)
                                                            au {{ $seminar->end_date->format('d/m/Y') }}
                                                        @endif
                                                    </span>
                                                </div>

                                                <!-- Lieu -->
                                                <div class="seminar-card-meta-row">
                                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    </svg>
                                                    <span class="font-medium">{{ $seminar->country }}</span>
                                                </div>

                                                <!-- Prix -->
                                                @if($seminar->price)
                                                    <div class="seminar-card-meta-row">
                                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <span class="font-bold text-[#f2a90f]">{{ number_format($seminar->price, 2, ',', ' ') }} €</span>
                                                    </div>
                                                @endif

                                                <!-- Places disponibles -->
                                                <div class="seminar-card-meta-row">
                                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    </svg>
                                                    <span class="font-medium">{{ max(0, 30 - $seminar->registrations_count) }} places disponibles</span>
                                                </div>

                                                <!-- Formateurs -->
                                                @if($seminar->trainers->isNotEmpty())
                                                    <div class="seminar-card-meta-row">
                                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                        </svg>
                                                        <span class="truncate font-medium" title="{{ $seminar->trainers->map->fullName()->join(', ') }}">
                                                            {{ $seminar->trainers->map->fullName()->join(', ') }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Actions -->
                                        <div class="seminar-card-buttons">
                                            <a href="{{ route('seminaires.show', $seminar) }}" class="seminar-card-btn-view">
                                                Voir les détails
                                            </a>

                                            @auth
                                                <a href="{{ route('registration.create', ['seminar_id' => $seminar->id]) }}" class="seminar-card-btn-sub">
                                                    S'inscrire
                                                </a>
                                            @else
                                                <a href="{{ route('login') }}" class="seminar-card-btn-sub">
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
            <footer class="bg-[#041136] py-6 text-center text-white/50 text-[13px]">
                <p class="font-black text-white/80 text-base mb-1">CAEI Company Group</p>
                <p>SIS 8 Rue Claude Bernard 1002 Belvedere-Tunis, Tunisie</p>
                <p class="mt-1">contact@caei-afri.com — +216 55 335 286</p>
                <p class="mt-2 text-xs">&copy; {{ date('Y') }} CAEI Company Group. Tous droits réservés.</p>
            </footer>

        </main>
    </body>
</html>
