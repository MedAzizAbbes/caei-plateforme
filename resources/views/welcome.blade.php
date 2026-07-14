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
            .seminar-card {
                transition: transform .22s ease, box-shadow .22s ease;
            }
            .seminar-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 16px 40px rgba(6,23,67,.18);
            }
            .badge-published {
                background: rgba(34,197,94,.12);
                color: #15803d;
                border: 1px solid rgba(34,197,94,.25);
            }
            .section-divider {
                border: none;
                height: 2px;
                background: linear-gradient(90deg, transparent, rgba(255,189,69,.5), transparent);
                margin: 0 auto;
                max-width: 200px;
            }
            /* Scroll suave vers la section */
            html { scroll-behavior: smooth; }
        </style>
    </head>
    <body class="font-sans antialiased text-white">
        <main class="min-h-screen bg-caei-navy">

            {{-- ══════════ SECTION HERO ══════════ --}}
            <section class="caei-hero">
                {{-- Topbar --}}
                <div class="caei-topbar">
                    <span>+216 55 335 286</span>
                    <span>contact@caei-afri.com</span>
                    <span>SIS 8 Rue Claude Bernard 1002 Belvedere-Tunis, Tunisie</span>
                    <span class="ms-auto hidden lg:inline-flex">Catalogue CAEI COMPANY GROUP</span>
                </div>

                {{-- Navigation --}}
                <nav class="caei-public-nav">
                    <a href="{{ route('home') }}" class="caei-brand" aria-label="CAEI Company Group">
                        <span class="caei-brand-mark">CAEI</span>
                        <span class="caei-brand-text"><span>Company</span><strong>Group</strong></span>
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
                        @guest
                            <a href="{{ route('register') }}" class="caei-btn caei-btn-outline">Créer un compte</a>
                        @endguest
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
                                <article class="seminar-card caei-card flex flex-col">

                                    {{-- Bannière colorée du séminaire --}}
                                    <div class="relative h-44 bg-gradient-to-br from-[#061743] to-[#0d2a6e] flex items-end p-5 overflow-hidden">
                                        {{-- Motif de fond --}}
                                        <div class="absolute inset-0 opacity-10">
                                            <svg viewBox="0 0 200 200" class="w-full h-full" fill="none">
                                                <circle cx="160" cy="40" r="80" stroke="white" stroke-width="1"/>
                                                <circle cx="40" cy="160" r="60" stroke="white" stroke-width="1"/>
                                            </svg>
                                        </div>
                                        {{-- Badge statut --}}
                                        <span class="absolute top-4 right-4 badge-published text-xs font-bold px-3 py-1 rounded-full">
                                            Ouvert
                                        </span>
                                        {{-- Numéro / icône --}}
                                        <div class="relative">
                                            <div class="w-10 h-10 rounded-lg bg-[#ffbd45] flex items-center justify-center mb-3">
                                                <svg class="w-5 h-5 text-[#061743]" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838l-2.763 1.183 1.547.632 1.776-.762a1 1 0 01.788 0l4 1.714A1 1 0 0017 12v-4.84l-6.606-5.08zM17 14.2l-5.5 2.357L6 14.2V12.5l5.5 2.357L17 12.5v1.7z"/>
                                                </svg>
                                            </div>
                                            <p class="text-[#ffbd45] text-xs font-bold uppercase tracking-widest">Séminaire</p>
                                        </div>
                                    </div>

                                    {{-- Contenu --}}
                                    <div class="flex flex-col flex-1 p-6">
                                        <h3 class="text-lg font-black text-[#061743] leading-snug">
                                            {{ $seminar->theme }}
                                        </h3>

                                        @if($seminar->description)
                                            <p class="mt-2 text-sm text-slate-600 line-clamp-2 leading-relaxed">
                                                {{ $seminar->description }}
                                            </p>
                                        @endif

                                        {{-- Métadonnées --}}
                                        <div class="mt-4 space-y-2">
                                            {{-- Dates --}}
                                            <div class="flex items-center gap-2 text-sm text-slate-600">
                                                <svg class="w-4 h-4 text-[#f2a90f] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                <span>
                                                    {{ $seminar->start_date->format('d/m/Y') }}
                                                    @if($seminar->start_date != $seminar->end_date)
                                                        — {{ $seminar->end_date->format('d/m/Y') }}
                                                    @endif
                                                </span>
                                            </div>

                                            {{-- Lieu / Pays --}}
                                            <div class="flex items-center gap-2 text-sm text-slate-600">
                                                <svg class="w-4 h-4 text-[#f2a90f] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                                <span>{{ $seminar->country }}</span>
                                            </div>

                                            {{-- Inscriptions --}}
                                            <div class="flex items-center gap-2 text-sm text-slate-600">
                                                <svg class="w-4 h-4 text-[#f2a90f] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                                <span>{{ $seminar->registrations_count }} participant(s) inscrit(s)</span>
                                            </div>

                                            {{-- Formateurs --}}
                                            @if($seminar->trainers->isNotEmpty())
                                                <div class="flex items-center gap-2 text-sm text-slate-600">
                                                    <svg class="w-4 h-4 text-[#f2a90f] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                    </svg>
                                                    <span>{{ $seminar->trainers->map->fullName()->join(', ') }}</span>
                                                </div>
                                            @endif
                                        </div>

                                        {{-- Actions --}}
                                        <div class="mt-6 flex flex-col gap-2 mt-auto pt-4 border-t border-slate-100">
                                            <a href="{{ route('seminaires.show', $seminar) }}"
                                               class="inline-flex items-center justify-center w-full px-4 py-2.5 rounded-lg border border-[#061743] text-[#061743] text-sm font-bold hover:bg-[#061743] hover:text-white transition-colors">
                                                Voir les détails
                                            </a>

                                            @auth
                                                <a href="{{ route('registration.create', ['seminar_id' => $seminar->id]) }}"
                                                   class="inline-flex items-center justify-center w-full px-4 py-2.5 rounded-lg bg-[#ffbd45] text-[#061743] text-sm font-black uppercase hover:bg-[#ffd071] transition-colors">
                                                    S'inscrire
                                                </a>
                                            @else
                                                <a href="{{ route('login') }}"
                                                   class="inline-flex items-center justify-center w-full px-4 py-2.5 rounded-lg bg-[#ffbd45] text-[#061743] text-sm font-black uppercase hover:bg-[#ffd071] transition-colors">
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
                    <div class="mt-16 text-center">
                        @guest
                            <div class="inline-block rounded-2xl bg-[#061743] px-10 py-8 text-white shadow-xl">
                                <p class="text-sm font-bold uppercase text-[#ffbd45] tracking-widest">Pas encore de compte ?</p>
                                <h3 class="mt-2 text-2xl font-black">Créez votre espace participant</h3>
                                <p class="mt-2 text-white/70 text-sm">Inscrivez-vous en quelques secondes pour accéder aux séminaires.</p>
                                <div class="mt-5 flex flex-wrap gap-3 justify-center">
                                    <a href="{{ route('register') }}" class="caei-btn caei-btn-gold">Créer un compte</a>
                                    <a href="{{ route('login') }}" class="caei-btn caei-btn-outline">Se connecter</a>
                                </div>
                            </div>
                        @endguest
                    </div>

                </div>
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
