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
                </div>

                {{-- Navigation --}}
                <nav class="caei-public-nav border-t border-white/10">
                    <a href="{{ route('home') }}" class="caei-brand" aria-label="CAEI Company Group">
                        <span class="caei-brand-mark !h-12 !w-12 !text-xs">CAEI</span>
                        <span class="caei-brand-text !text-lg"><span>Company</span><strong class="!text-lg">Group</strong></span>
                    </a>
                    <div class="caei-public-links">
                        <a href="{{ route('home') }}">Accueil</a>
                        <a class="active" href="{{ route('home') }}#seminaires">Séminaires</a>
                        @auth
                            <a href="{{ route('dashboard') }}">Mon espace</a>
                        @else
                            <a href="{{ route('login') }}">Connexion</a>
                            <a href="{{ route('register') }}">Créer un compte</a>
                        @endauth
                    </div>
                    @guest
                        <div class="flex items-center gap-3 lg:hidden">
                            <a href="{{ route('login') }}" class="caei-btn caei-btn-outline text-xs py-2 px-4">Connexion</a>
                        </div>
                    @endguest
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

                        {{-- En-tête séminaire --}}
                        <div class="bg-gradient-to-br from-[#061743] to-[#0d2a6e] rounded-xl p-8 text-white shadow-lg">
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 rounded-xl bg-[#ffbd45] flex items-center justify-center shrink-0">
                                    <svg class="w-7 h-7 text-[#061743]" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838l-2.763 1.183 1.547.632 1.776-.762a1 1 0 01.788 0l4 1.714A1 1 0 0017 12v-4.84l-6.606-5.08z"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-[#ffbd45] text-xs font-bold uppercase tracking-widest">CAEI Company Group</p>
                                    <h1 class="mt-2 text-2xl font-black leading-tight">{{ $seminar->theme }}</h1>
                                    <div class="mt-3 flex flex-wrap gap-3">
                                        <span class="inline-flex items-center gap-1.5 text-xs text-white/70 bg-white/10 rounded-full px-3 py-1">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            </svg>
                                            {{ $seminar->country }}
                                        </span>
                                        <span class="inline-flex items-center gap-1.5 text-xs bg-green-500/20 text-green-300 rounded-full px-3 py-1 border border-green-500/30">
                                            Ouvert aux inscriptions
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Description --}}
                        @if($seminar->description)
                            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                                <h2 class="text-lg font-black text-[#061743] mb-4">Description</h2>
                                <div class="text-slate-700 leading-relaxed whitespace-pre-line">{{ $seminar->description }}</div>
                            </div>
                        @endif

                        {{-- Formateurs --}}
                        @if($seminar->trainers->isNotEmpty())
                            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                                <h2 class="text-lg font-black text-[#061743] mb-4">Formateur(s)</h2>
                                <div class="space-y-3">
                                    @foreach($seminar->trainers as $trainer)
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-[#061743]/10 flex items-center justify-center text-[#061743] font-black text-sm">
                                                {{ strtoupper(substr($trainer->first_name, 0, 1)) }}{{ strtoupper(substr($trainer->last_name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <p class="font-semibold text-slate-900">{{ $trainer->fullName() }}</p>
                                                <p class="text-sm text-slate-500">Formateur CAEI</p>
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
                        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                            <h2 class="text-base font-black text-[#061743] mb-4 uppercase tracking-wide">Informations</h2>
                            <dl class="space-y-4">
                                <div>
                                    <dt class="text-xs font-bold text-slate-500 uppercase tracking-wide">Date de début</dt>
                                    <dd class="mt-1 font-semibold text-slate-900">{{ $seminar->start_date->format('d/m/Y') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-xs font-bold text-slate-500 uppercase tracking-wide">Date de fin</dt>
                                    <dd class="mt-1 font-semibold text-slate-900">{{ $seminar->end_date->format('d/m/Y') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-xs font-bold text-slate-500 uppercase tracking-wide">Lieu</dt>
                                    <dd class="mt-1 font-semibold text-slate-900">{{ $seminar->country }}</dd>
                                </div>
                                <div>
                                    <dt class="text-xs font-bold text-slate-500 uppercase tracking-wide">Participants inscrits</dt>
                                    <dd class="mt-1 font-semibold text-[#061743]">{{ $seminar->registrations_count }}</dd>
                                </div>
                                <div>
                                    <dt class="text-xs font-bold text-slate-500 uppercase tracking-wide">Durée</dt>
                                    <dd class="mt-1 font-semibold text-slate-900">
                                        {{ $seminar->start_date->diffInDays($seminar->end_date) + 1 }} jour(s)
                                    </dd>
                                </div>
                            </dl>
                        </div>

                        {{-- Bouton S'inscrire --}}
                        <div class="bg-[#061743] rounded-xl p-6 text-white shadow-lg">
                            <p class="text-sm text-white/70 mb-1">Prêt à participer ?</p>
                            <p class="text-lg font-black mb-4">Rejoignez ce séminaire</p>

                            @auth
                                <a href="{{ route('registration.create', ['seminar_id' => $seminar->id]) }}"
                                   class="caei-btn caei-btn-gold w-full justify-center text-base py-3">
                                    S'inscrire maintenant
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                   class="caei-btn caei-btn-gold w-full justify-center text-base py-3 block text-center">
                                    Se connecter pour s'inscrire
                                </a>
                                <a href="{{ route('register') }}"
                                   class="mt-3 caei-btn caei-btn-outline w-full justify-center block text-center">
                                    Créer un compte
                                </a>
                                <p class="mt-3 text-xs text-white/50 text-center">
                                    Un compte est nécessaire pour s'inscrire.
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
            <footer class="bg-[#041136] py-8 text-center text-white/50 text-sm mt-10">
                <p class="font-black text-white/80 text-base mb-1">CAEI Company Group</p>
                <p>SIS 8 Rue Claude Bernard 1002 Belvedere-Tunis, Tunisie</p>
                <p class="mt-1">contact@caei-afri.com — +216 55 335 286</p>
                <p class="mt-4">&copy; {{ date('Y') }} CAEI Company Group. Tous droits réservés.</p>
            </footer>

        </div>
    </body>
</html>
