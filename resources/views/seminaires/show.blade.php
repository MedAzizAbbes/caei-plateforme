<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $seminar->theme }} — CAEI Plateforme</title>
        <meta name="description" content="{{ Str::limit($seminar->description, 155) }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-slate-50">

            {{-- Topbar --}}
            <div class="bg-[#061743]">
                <div class="caei-topbar">
                    <span>+216 55 335 286</span>
                    <span>contact@caei-afri.com</span>
                    <span>SIS 8 Rue Claude Bernard 1002 Belvedere-Tunis, Tunisie</span>
                    <span class="ms-auto hidden lg:inline-flex">Catalogue CAEI COMPANY GROUP</span>
                </div>

                {{-- Navigation --}}
                <nav class="caei-public-nav border-t border-white/10">
                    <a href="{{ route('home') }}" class="flex items-center hover:scale-105 transition-transform duration-300" aria-label="CAEI Company Group">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo CAEI" class="h-16 w-16 md:h-20 md:w-20 rounded-full object-cover shadow-md border-2 border-white/10">
                    </a>
                    
                    {{-- Desktop Links --}}
                    <div class="caei-public-links">
                        <a href="{{ route('home') }}">Accueil</a>
                        <a class="active" href="{{ route('home') }}#seminaires">Séminaires</a>
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
            </div>

            {{-- Breadcrumb --}}
            <div class="bg-white border-b border-slate-200">
                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
                    <nav class="flex items-center gap-2 text-sm text-slate-500">
                        <a href="{{ route('home') }}" class="hover:text-[#061743] transition-colors">Accueil</a>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                        <a href="{{ route('home') }}#seminaires" class="hover:text-[#061743] transition-colors">Séminaires</a>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                        <span class="text-[#061743] font-semibold truncate max-w-xs">{{ $seminar->theme }}</span>
                    </nav>
                </div>
            </div>

            {{-- Contenu principal --}}
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    {{-- Colonne principale --}}
                    <div class="lg:col-span-2 space-y-6">

                        {{-- Affiche --}}
                        @if($seminar->image)
                            <div class="bg-white rounded-2xl shadow-md border border-slate-100 overflow-hidden w-full max-w-xl">
                                <img
                                    src="{{ Storage::url($seminar->image) }}"
                                    alt="Affiche — {{ $seminar->theme }}"
                                    class="w-full h-auto object-cover"
                                >
                            </div>
                        @endif

                        {{-- En-tête séminaire --}}
                        <div class="bg-gradient-to-br from-[#061743] to-[#0d2a6e] rounded-2xl p-6 sm:p-8 text-white shadow-lg border border-white/5 flex flex-col gap-4 items-start animate-fade-in">
                            <div class="space-y-3 w-full">
                                <p class="text-[#ffbd45] text-xs font-black uppercase tracking-widest">CAEI Company Group</p>
                                <h1 class="text-2xl sm:text-3xl font-black leading-tight">{{ $seminar->theme }}</h1>
                                <div class="flex flex-wrap gap-2">
                                    <span class="inline-flex items-center gap-1.5 text-xs text-white/80 bg-white/10 rounded-full px-3 py-1.5 border border-white/5 font-semibold">
                                        <svg class="w-3.5 h-3.5 text-[#ffbd45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        </svg>
                                        {{ $seminar->country }}
                                    </span>
                                    <span class="inline-flex items-center gap-1.5 text-xs bg-emerald-500/20 text-emerald-300 rounded-full px-3 py-1.5 border border-emerald-500/30 font-bold uppercase tracking-wide">
                                        Ouvert aux inscriptions
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Description --}}
                        @if($seminar->description)
                            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 sm:p-8">
                                <h2 class="text-lg font-black text-[#061743] mb-4 flex items-center gap-2">
                                    <span class="w-1 h-5 bg-[#f2a90f] rounded-full"></span>
                                    Description du Séminaire
                                </h2>
                                <div class="text-slate-600 leading-relaxed whitespace-pre-line text-sm sm:text-base font-medium">{{ $seminar->description }}</div>
                            </div>
                        @endif

                        {{-- Formateurs --}}
                        @if($seminar->trainers->isNotEmpty())
                            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 sm:p-8">
                                <h2 class="text-lg font-black text-[#061743] mb-6 flex items-center gap-2">
                                    <span class="w-1 h-5 bg-[#f2a90f] rounded-full"></span>
                                    Formateurs Experts
                                </h2>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    @foreach($seminar->trainers as $trainer)
                                        <div class="flex items-center gap-4 p-4 rounded-xl bg-slate-50 border border-slate-100 transition-all hover:bg-slate-100/50">
                                            <div class="w-12 h-12 rounded-xl bg-[#061743] text-[#ffbd45] flex items-center justify-center font-black text-base shadow-sm shrink-0">
                                                {{ strtoupper(substr($trainer->first_name, 0, 1)) }}{{ strtoupper(substr($trainer->last_name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <p class="font-bold text-[#061743]">{{ $trainer->fullName() }}</p>
                                                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Expert CAEI</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>

                    {{-- Colonne latérale --}}
                    <div class="space-y-4">

                        {{-- Fiche rapide --}}
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                            <h2 class="text-base font-black text-[#061743] mb-6 uppercase tracking-wider flex items-center gap-2">
                                <svg class="w-5 h-5 text-[#f2a90f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Fiche Technique
                            </h2>
                            <div class="space-y-5">
                                <div class="flex items-start gap-3">
                                    <div class="p-2 rounded-lg bg-slate-50 text-[#061743] shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Période du séminaire</span>
                                        <span class="text-sm font-bold text-slate-800">
                                            Du {{ $seminar->start_date->format('d/m/Y') }}
                                            @if($seminar->start_date != $seminar->end_date)
                                                au {{ $seminar->end_date->format('d/m/Y') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <div class="p-2 rounded-lg bg-slate-50 text-[#061743] shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Lieu / Pays</span>
                                        <span class="text-sm font-bold text-slate-800">{{ $seminar->country }}</span>
                                    </div>
                                </div>

                                @if($seminar->price)
                                    <div class="flex items-start gap-3">
                                        <div class="p-2 rounded-lg bg-[#f2a90f]/10 text-[#f2a90f] shrink-0">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Frais de participation</span>
                                            <span class="text-sm font-extrabold text-[#061743]">{{ number_format($seminar->price, 2, ',', ' ') }} €</span>
                                        </div>
                                    </div>
                                @endif

                                <div class="flex items-start gap-3">
                                    <div class="p-2 rounded-lg bg-slate-50 text-[#061743] shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Durée totale</span>
                                        <span class="text-sm font-bold text-slate-800">
                                            {{ $seminar->start_date->diffInDays($seminar->end_date) + 1 }} jour(s)
                                            @if($seminar->hours)
                                                ({{ $seminar->hours }} h)
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <div class="p-2 rounded-lg bg-slate-50 text-[#061743] shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Inscriptions</span>
                                        <span class="text-sm font-bold text-slate-800">{{ $seminar->registrations_count }} inscrit(s)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Bouton S'inscrire --}}
                        <div class="bg-gradient-to-br from-[#061743] to-[#0a2260] rounded-2xl p-6 text-white shadow-lg border border-white/5">
                            <p class="text-[11px] text-[#ffbd45] font-black uppercase tracking-widest mb-1">Inscriptions Ouvertes</p>
                            <p class="text-lg font-black mb-4">Rejoignez ce séminaire</p>

                            @auth
                                <a href="{{ route('registration.create', ['seminar_id' => $seminar->id]) }}"
                                   class="caei-btn caei-btn-gold w-full justify-center text-sm py-3 font-black uppercase tracking-wide">
                                    S'inscrire maintenant
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                   class="caei-btn caei-btn-gold w-full justify-center text-sm py-3 font-black uppercase tracking-wide block text-center">
                                    Se connecter pour s'inscrire
                                </a>
                                <a href="{{ route('register') }}"
                                   class="mt-3 caei-btn caei-btn-outline w-full justify-center text-xs py-2.5 font-bold uppercase tracking-wider block text-center">
                                    Créer un compte
                                </a>
                                <p class="mt-3 text-[11px] text-white/50 text-center font-medium">
                                    Un compte est requis pour s'inscrire.
                                </p>
                            @endauth
                        </div>

                        {{-- Retour --}}
                        <a href="{{ route('home') }}#seminaires"
                           class="flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-[#061743] transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Retour aux séminaires
                        </a>

                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <footer class="bg-[#041136] py-6 text-center text-white/50 text-[13px] mt-10">
                <p class="font-black text-white/80 text-base mb-1">CAEI Company Group</p>
                <p>SIS 8 Rue Claude Bernard 1002 Belvedere-Tunis, Tunisie</p>
                <p class="mt-1">contact@caei-afri.com — +216 55 335 286</p>
                <p class="mt-2 text-xs">&copy; {{ date('Y') }} CAEI Company Group. Tous droits réservés.</p>
            </footer>

        </div>
    </body>
</html>
