<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CAEI Medical Services — Agence Internationale de Santé & Évacuation Sanitaire en Tunisie</title>
        <meta name="description" content="CAEI Medical Services : Prise en charge médicale personnalisée en Tunisie. Chirurgie esthétique, évacuation sanitaire 24/7, PMA/FIV, chirurgie bariatrique et conciergerie médicale.">
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            html { scroll-behavior: smooth; }
            .teal-gradient-text {
                background: linear-gradient(135deg, #0d9488 0%, #2dd4bf 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .gold-gradient-text {
                background: linear-gradient(135deg, #f2a90f 0%, #ffd071 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .card-hover-teal {
                transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            }
            .card-hover-teal:hover {
                transform: translateY(-6px);
                box-shadow: 0 20px 40px rgba(13, 148, 136, 0.18);
                border-color: rgba(45, 212, 191, 0.4);
            }
            .medical-glow {
                box-shadow: 0 0 50px rgba(13, 148, 136, 0.2);
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-[#040e2b] text-slate-100 min-h-screen selection:bg-[#0d9488] selection:text-white">

        {{-- ══════════ TOPBAR MEDICAL ══════════ --}}
        <div class="bg-[#02081c] text-slate-300 text-xs py-2.5 px-4 border-b border-teal-500/20">
            <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-3">
                <div class="flex items-center gap-6 flex-wrap">
                    <span class="flex items-center gap-2 text-teal-400 font-bold">
                        <svg class="w-4 h-4 text-emerald-400 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Assistance & EVACSAN 24h/24 - 7j/7
                    </span>
                    <a href="tel:+21653359515" class="flex items-center gap-1.5 hover:text-teal-300 transition-colors">
                        <svg class="w-3.5 h-3.5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        +216 53 359 515
                    </a>
                    <a href="mailto:Medicale@caei-afri.com" class="hidden sm:flex items-center gap-1.5 hover:text-teal-300 transition-colors">
                        <svg class="w-3.5 h-3.5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Medicale@caei-afri.com
                    </a>
                    <span class="hidden md:flex items-center gap-1.5 text-slate-400">
                        <svg class="w-3.5 h-3.5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Immeuble Medina Palace, Avenue de Paris, Tunis
                    </span>
                </div>
                <div class="flex items-center gap-3 ms-auto">
                    <a href="{{ route('home') }}" class="text-xs text-slate-300 hover:text-teal-300 transition-colors">← Groupe CAEI</a>
                    <a href="https://caei-afri.com/Medicalservices/PDF/catalogueCAEIMedicalServices.pdf" target="_blank" class="inline-flex items-center gap-1 text-[11px] font-bold text-teal-300 bg-teal-500/20 hover:bg-teal-500 hover:text-white px-3 py-1 rounded-full transition-all">
                        📄 Catalogue PDF
                    </a>
                </div>
            </div>
        </div>

        {{-- ══════════ NAVBAR ══════════ --}}
        <nav class="sticky top-0 z-50 bg-[#061743]/95 backdrop-blur-lg border-b border-teal-500/20 px-4 lg:px-8 py-3.5">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                {{-- Logo --}}
                <a href="{{ route('medical.services') }}" class="flex items-center gap-3.5 hover:scale-105 transition-transform">
                    <div class="relative">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo CAEI Medical Services" class="h-12 w-12 md:h-14 md:w-14 rounded-full object-cover shadow-lg border-2 border-teal-400">
                        <span class="absolute -bottom-1 -right-1 bg-teal-500 text-[#040e2b] p-0.5 rounded-full border border-white">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"/></svg>
                        </span>
                    </div>
                    <div>
                        <span class="block text-lg font-black tracking-wider text-white uppercase leading-none">CAEI MEDICAL</span>
                        <span class="block text-[10px] font-bold text-teal-400 uppercase tracking-widest mt-1">Services & Évacuation Sanitaire</span>
                    </div>
                </a>

                {{-- Desktop Links --}}
                <div class="hidden lg:flex items-center gap-7 text-sm font-semibold">
                    <a href="#accueil" class="text-teal-400 hover:text-teal-300 transition-colors">Accueil</a>
                    <a href="#about" class="text-slate-200 hover:text-teal-300 transition-colors">À Propos</a>
                    <a href="#services" class="text-slate-200 hover:text-teal-300 transition-colors">Nos Services</a>
                    <a href="#pourquoi-tunisie" class="text-slate-200 hover:text-teal-300 transition-colors">Pourquoi la Tunisie ?</a>
                    <a href="#evacsan" class="text-rose-400 hover:text-rose-300 font-bold transition-colors">EVACSAN 24/7</a>
                    <a href="#contact" class="text-slate-200 hover:text-teal-300 transition-colors">Contact</a>
                </div>

                {{-- Action Button --}}
                <div class="flex items-center gap-3">
                    <a href="#devis" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-teal-500 to-emerald-400 hover:from-teal-400 hover:to-emerald-300 text-[#040e2b] font-black text-xs md:text-sm px-5 py-2.5 rounded-xl shadow-lg shadow-teal-500/25 hover:scale-105 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>Devis & Rendez-vous</span>
                    </a>
                </div>
            </div>
        </nav>

        {{-- ══════════ HERO SECTION ══════════ --}}
        <section id="accueil" class="relative py-20 lg:py-28 px-4 overflow-hidden bg-gradient-to-b from-[#061743] via-[#041238] to-[#040e2b]">
            {{-- Background decorative glows --}}
            <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-teal-500/10 blur-[120px] rounded-full pointer-events-none"></div>

            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10">
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 bg-teal-500/15 border border-teal-500/30 px-4 py-1.5 rounded-full text-teal-300 font-extrabold text-xs uppercase tracking-widest backdrop-blur-md">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-ping"></span>
                        VOTRE SANTÉ, NOTRE PRIORITÉ EN TUNISIE
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white uppercase tracking-tight leading-tight">
                        CAEI <span class="teal-gradient-text">MEDICAL SERVICES</span>
                    </h1>

                    <p class="text-lg sm:text-xl text-slate-300 font-light leading-relaxed max-w-2xl">
                        Agence internationale indépendante d'accompagnement médical, d'évacuation sanitaire et de conciergerie médicale en Tunisie. Accédez aux meilleures cliniques certifiées et chirurgiens réputés.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                        <a href="#devis" class="w-full sm:w-auto inline-flex items-center justify-center gap-3 bg-gradient-to-r from-teal-500 to-emerald-400 hover:from-teal-400 hover:to-emerald-300 text-[#040e2b] font-black text-base px-8 py-4 rounded-2xl shadow-xl shadow-teal-500/30 hover:scale-105 transition-all">
                            <span>Demander un Devis Gratuit</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="#evacsan" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 border-2 border-rose-500/60 hover:border-rose-400 text-rose-300 font-bold text-base px-6 py-4 rounded-2xl bg-rose-500/10 hover:bg-rose-500/20 transition-all">
                            <svg class="w-5 h-5 text-rose-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            <span>Urgence EVACSAN 24/7</span>
                        </a>
                    </div>

                    {{-- Badges trust --}}
                    <div class="pt-8 border-t border-white/10 grid grid-cols-3 gap-4 text-center lg:text-left">
                        <div>
                            <div class="text-2xl lg:text-3xl font-black text-teal-400">100%</div>
                            <div class="text-xs text-slate-400 font-semibold">Cliniques Certifiées</div>
                        </div>
                        <div>
                            <div class="text-2xl lg:text-3xl font-black text-[#f2a90f]">-60%</div>
                            <div class="text-xs text-slate-400 font-semibold">Économie vs Europe</div>
                        </div>
                        <div>
                            <div class="text-2xl lg:text-3xl font-black text-emerald-400">24h/7j</div>
                            <div class="text-xs text-slate-400 font-semibold">Prise en charge</div>
                        </div>
                    </div>
                </div>

                {{-- Hero Showcase Card --}}
                <div class="lg:col-span-5">
                    <div class="bg-gradient-to-br from-[#0a2569] to-[#04143a] p-8 rounded-3xl border border-teal-500/30 shadow-2xl space-y-6 medical-glow">
                        <div class="flex items-center justify-between border-b border-white/10 pb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-teal-500/20 text-teal-400 flex items-center justify-center font-bold">
                                    ⚕️
                                </div>
                                <div>
                                    <div class="text-base font-bold text-white uppercase">Séjour Santé Tout Compris</div>
                                    <div class="text-xs text-teal-400">Accompagnement Sur-Mesure</div>
                                </div>
                            </div>
                            <span class="bg-teal-500/20 text-teal-300 text-[10px] font-extrabold px-2.5 py-1 rounded-full uppercase">Certifié ISO</span>
                        </div>

                        <ul class="space-y-4 text-sm text-slate-200">
                            <li class="flex items-start gap-3">
                                <span class="w-5 h-5 rounded-full bg-teal-500/20 text-teal-400 flex items-center justify-center shrink-0 mt-0.5 font-bold">✓</span>
                                <span><strong>Diagnostic & Orientation :</strong> Choix du chirurgien spécialiste adapté à votre cas.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-5 h-5 rounded-full bg-teal-500/20 text-teal-400 flex items-center justify-center shrink-0 mt-0.5 font-bold">✓</span>
                                <span><strong>Conciergerie VIP :</strong> Accueil personnalisé à l'aéroport de Tunis-Carthage & chauffeur.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-5 h-5 rounded-full bg-teal-500/20 text-teal-400 flex items-center justify-center shrink-0 mt-0.5 font-bold">✓</span>
                                <span><strong>Hébergement Premium :</strong> Hôtel 4/5 étoiles pour la convalescence & suivi d'infirmiers.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-5 h-5 rounded-full bg-teal-500/20 text-teal-400 flex items-center justify-center shrink-0 mt-0.5 font-bold">✓</span>
                                <span><strong>Transparence Totale :</strong> Devis clair et sans frais cachés avant votre départ.</span>
                            </li>
                        </ul>

                        <div class="bg-teal-500/10 p-4 rounded-xl border border-teal-500/20 text-xs text-teal-200 flex items-center justify-between">
                            <span>📞 Support Direct Patient :</span>
                            <span class="font-bold text-white">+216 53 359 515</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ══════════ ALERTE DE SUCCÈS ══════════ --}}
        @if(session('success'))
            <div class="max-w-4xl mx-auto my-6 px-4">
                <div class="bg-emerald-500/20 border border-emerald-400 text-emerald-200 p-5 rounded-2xl flex items-center gap-4">
                    <svg class="w-8 h-8 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>
                        <div class="font-bold text-base text-white">Demande enregistrée avec succès</div>
                        <div class="text-sm mt-0.5">{{ session('success') }}</div>
                    </div>
                </div>
            </div>
        @endif

        {{-- ══════════ SECTION PRESENTATION & WHY TUNISIA ══════════ --}}
        <section id="about" class="py-20 bg-slate-900 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <p class="text-xs font-black uppercase text-teal-400 tracking-widest">Excellence Médicale Internationale</p>
                    <h2 class="mt-2 text-3xl sm:text-4xl font-black uppercase tracking-tight">Pourquoi Choisir CAEI Medical Services & La Tunisie ?</h2>
                    <div class="w-20 h-1 bg-gradient-to-r from-teal-500 to-emerald-400 mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6 text-slate-300 leading-relaxed text-base">
                        <p class="text-lg font-semibold text-white">
                            La Tunisie s'impose aujourd'hui comme <span class="text-teal-400">l'une des meilleures destinations mondiales de tourisme médical</span>, combinant des normes chirurgicales européennes et des coûts maîtrisés.
                        </p>
                        <p>
                            Les médecins et chirurgiens tunisiens, d'une sélectivité universitaire extrême (souvent issus des 1000 premiers bacheliers au niveau national), sont formés dans les plus prestigieuses facultés de médecine en Tunisie et en France. Ils maîtrisent parfaitement les dernières innovations et interventions de pointe.
                        </p>
                        <div class="space-y-3 pt-2">
                            <div class="flex items-start gap-3 bg-white/5 p-4 rounded-xl border border-white/10">
                                <span class="text-2xl">🥇</span>
                                <div>
                                    <h4 class="font-bold text-white">Plateaux Techniques Sophistiqués</h4>
                                    <p class="text-xs text-slate-400 mt-1">Cliniques privées dotées de blocs opératoires ultramodernes, de scanners 3D et d'unités de réanimation certifiées.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 bg-white/5 p-4 rounded-xl border border-white/10">
                                <span class="text-2xl">🤝</span>
                                <div>
                                    <h4 class="font-bold text-white">Agence 100% Indépendante</h4>
                                    <p class="text-xs text-slate-400 mt-1">Nous sélectionnons pour vous les meilleurs spécialistes en toute neutralité, sans compromis sur la qualité des soins.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-[#061743] p-6 rounded-2xl border border-teal-500/30 text-center space-y-3">
                            <div class="text-4xl">🏥</div>
                            <div class="text-xl font-black text-white">Cliniques VIP</div>
                            <p class="text-xs text-slate-300">Structures médicales homologuées aux normes internationales ISO.</p>
                        </div>
                        <div class="bg-[#061743] p-6 rounded-2xl border border-teal-500/30 text-center space-y-3">
                            <div class="text-4xl">✈️</div>
                            <div class="text-xl font-black text-white">Prise en Charge 360°</div>
                            <p class="text-xs text-slate-300">Vol, accueil aéroport, clinique, hôtel & suivi post-opératoire.</p>
                        </div>
                        <div class="bg-[#061743] p-6 rounded-2xl border border-teal-500/30 text-center space-y-3">
                            <div class="text-4xl">💉</div>
                            <div class="text-xl font-black text-white">Spécialistes de Renom</div>
                            <p class="text-xs text-slate-300">Chirurgiens inscrits au Conseil de l'Ordre avec diplômes français & tunisiens.</p>
                        </div>
                        <div class="bg-[#061743] p-6 rounded-2xl border border-teal-500/30 text-center space-y-3">
                            <div class="text-4xl">🌴</div>
                            <div class="text-xl font-black text-white">Convalescence Douce</div>
                            <p class="text-xs text-slate-300">Cadre méditerranéen idéal pour se reposer en toute quiétude.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ══════════ NOS SERVICES MÉDICAUX ══════════ --}}
        <section id="services" class="py-24 bg-[#040e2b] relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <p class="text-xs font-black uppercase text-teal-400 tracking-widest">Prestations Certifiées</p>
                    <h2 class="mt-2 text-3xl sm:text-5xl font-black uppercase tracking-tight text-white">Nos Domaines d'Expertise Médicale</h2>
                    <div class="w-20 h-1 bg-gradient-to-r from-teal-500 to-emerald-400 mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($services as $service)
                        <div class="bg-gradient-to-br from-[#061743] to-[#0a2054] p-8 rounded-3xl border border-white/10 card-hover-teal flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between mb-6">
                                    <span class="bg-teal-500/20 text-teal-300 border border-teal-500/30 text-xs font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">
                                        {{ $service['badge'] }}
                                    </span>
                                    <div class="w-10 h-10 rounded-full bg-teal-500/10 text-teal-400 flex items-center justify-center font-bold">
                                        ⚕️
                                    </div>
                                </div>

                                <h3 class="text-xl font-bold text-white mb-3 leading-snug">
                                    {{ $service['title'] }}
                                </h3>

                                <p class="text-slate-300 text-xs leading-relaxed mb-6">
                                    {{ $service['description'] }}
                                </p>

                                <ul class="space-y-2 mb-6">
                                    @foreach($service['features'] as $feature)
                                        <li class="flex items-center gap-2 text-xs text-slate-300">
                                            <svg class="w-4 h-4 text-teal-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                            <span>{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <a href="#devis" class="inline-flex items-center justify-center gap-2 w-full py-3 bg-teal-500/15 hover:bg-teal-500 hover:text-[#040e2b] border border-teal-500/30 text-teal-300 font-bold text-xs rounded-xl transition-all">
                                Demander un Devis pour ce Soin →
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ══════════ SECTION EVACSAN (ÉVACUATION SANITAIRE 24/7) ══════════ --}}
        <section id="evacsan" class="py-20 bg-gradient-to-r from-rose-950/60 via-[#061743] to-rose-950/60 border-y border-rose-500/30 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-gradient-to-br from-slate-900 to-[#040e2b] rounded-3xl p-8 lg:p-12 border border-rose-500/40 shadow-2xl grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-8 space-y-4">
                        <div class="inline-flex items-center gap-2 bg-rose-500/20 text-rose-300 border border-rose-500/40 px-3.5 py-1 rounded-full text-xs font-black uppercase tracking-wider">
                            <span class="w-2 h-2 rounded-full bg-rose-400 animate-ping"></span>
                            UNITÉ D'URGENCE INTERNATIONALE
                        </div>
                        <h2 class="text-2xl sm:text-4xl font-black text-white uppercase tracking-tight">
                            Évacuation Sanitaire d'Urgence (EVACSAN 24/7)
                        </h2>
                        <p class="text-slate-300 text-sm leading-relaxed">
                            Besoins d'un transfert médical d'urgence vers la Tunisie pour vous-même, un proche ou un collaborateur ? Notre cellule EVACSAN coordonne l'ensemble des démarches : avion sanitaire équipé, équipe médicale de réanimation à bord, autorisations de survol et accueil immédiat en soins intensifs à Tunis.
                        </p>
                        <div class="flex flex-wrap items-center gap-6 pt-2 text-xs font-semibold text-rose-200">
                            <span class="flex items-center gap-1.5">🚑 Avion Sanitaire Équipé</span>
                            <span class="flex items-center gap-1.5">👨‍⚕️ Médecins Réanimateurs à Bord</span>
                            <span class="flex items-center gap-1.5">📋 Formalités & Visas Accélérés</span>
                        </div>
                    </div>
                    <div class="lg:col-span-4 text-center lg:text-right space-y-4">
                        <a href="tel:+21653359515" class="inline-flex items-center justify-center gap-3 bg-rose-600 hover:bg-rose-500 text-white font-black text-lg px-8 py-4 rounded-2xl shadow-xl shadow-rose-600/40 hover:scale-105 transition-all w-full sm:w-auto">
                            <svg class="w-6 h-6 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>Appel Urgence : +216 53 359 515</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- ══════════ FORMULAIRE DE DEVIS / RENDEZ-VOUS ══════════ --}}
        <section id="devis" class="py-24 bg-slate-950 relative">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-[#061743] p-8 sm:p-12 rounded-3xl border border-teal-500/30 shadow-2xl">
                    <div class="text-center mb-10">
                        <span class="bg-teal-500/20 text-teal-300 text-xs font-black px-3.5 py-1 rounded-full uppercase tracking-wider">Demande Confidentielle & Gratuite</span>
                        <h2 class="text-3xl font-black text-white uppercase tracking-tight mt-3">Demande de Devis Médical & Rendez-vous</h2>
                        <p class="text-slate-300 text-xs mt-2">Remplissez ce formulaire. Un conseiller médical vous contactera confidentiellement sous 24 heures.</p>
                    </div>

                    <form action="{{ route('medical.services.request') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Nom & Prénom *</label>
                                <input type="text" name="fullname" required placeholder="Ex: Jean Dupont" class="w-full bg-[#040e2b] border border-white/20 rounded-xl px-4 py-3 text-white text-sm focus:border-teal-400 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Adresse Email *</label>
                                <input type="email" name="email" required placeholder="Ex: jean.dupont@email.com" class="w-full bg-[#040e2b] border border-white/20 rounded-xl px-4 py-3 text-white text-sm focus:border-teal-400 focus:outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Numéro Téléphone / WhatsApp *</label>
                                <input type="text" name="phone" required placeholder="Ex: +225 07 00 00 00" class="w-full bg-[#040e2b] border border-white/20 rounded-xl px-4 py-3 text-white text-sm focus:border-teal-400 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Pays de Résidence *</label>
                                <input type="text" name="country" required placeholder="Ex: Côte d'Ivoire, Sénégal, France..." class="w-full bg-[#040e2b] border border-white/20 rounded-xl px-4 py-3 text-white text-sm focus:border-teal-400 focus:outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Type de Soin / Spécialité *</label>
                            <select name="service_type" required class="w-full bg-[#040e2b] border border-white/20 rounded-xl px-4 py-3 text-white text-sm focus:border-teal-400 focus:outline-none">
                                <option value="">-- Sélectionnez la prestation souhaitée --</option>
                                <option value="Chirurgie Esthétique">Chirurgie Esthétique & Réparatrice</option>
                                <option value="Évacuation Sanitaire">Évacuation Sanitaire (EVACSAN)</option>
                                <option value="PMA / FIV">Assistance à la Procréation (PMA / FIV)</option>
                                <option value="Chirurgie Bariatrique">Chirurgie Obésité / Bariatrique</option>
                                <option value="Cardiologie / Orthopédie">Cardiologie / Orthopédie / Chirurgie lourde</option>
                                <option value="Bilan de santé global">Bilan de santé global & Consultation</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Message & Précisions Médicales</label>
                            <textarea name="message" rows="4" placeholder="Décrivez succinctement vos besoins ou symptômes..." class="w-full bg-[#040e2b] border border-white/20 rounded-xl px-4 py-3 text-white text-sm focus:border-teal-400 focus:outline-none"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-teal-500 to-emerald-400 hover:from-teal-400 hover:to-emerald-300 text-[#040e2b] font-black text-base py-4 rounded-xl shadow-xl shadow-teal-500/25 hover:scale-[1.01] transition-all">
                            Envoyer la Demande de Devis Gratuit
                        </button>
                    </form>
                </div>
            </div>
        </section>

        {{-- ══════════ SECTION CONTACT & FOOTER ══════════ --}}
        <section id="contact" class="py-16 bg-[#02081c] border-t border-white/10 text-slate-300 text-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10 rounded-full border border-teal-400">
                        <span class="font-black text-white text-base">CAEI MEDICAL</span>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Agence internationale indépendante d'accompagnement médical & d'évacuation sanitaire en Tunisie.
                    </p>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-3 text-xs uppercase tracking-wider text-teal-400">Services Clés</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="#services" class="hover:text-white transition-colors">Chirurgie Esthétique</a></li>
                        <li><a href="#evacsan" class="hover:text-white transition-colors">Évacuation Sanitaire 24/7</a></li>
                        <li><a href="#services" class="hover:text-white transition-colors">Assistance PMA / FIV</a></li>
                        <li><a href="#services" class="hover:text-white transition-colors">Chirurgie Bariatrique</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-3 text-xs uppercase tracking-wider text-teal-400">Liens Utiles</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Site Officiel Groupe CAEI</a></li>
                        <li><a href="{{ route('plateforme') }}" class="hover:text-white transition-colors">Plateforme Séminaires</a></li>
                        <li><a href="https://caei-afri.com/Medicalservices/PDF/catalogueCAEIMedicalServices.pdf" target="_blank" class="hover:text-white transition-colors">Télécharger Catalogue PDF</a></li>
                    </ul>
                </div>

                <div class="space-y-2 text-xs">
                    <h4 class="font-bold text-white mb-3 uppercase tracking-wider text-teal-400">Contact Tunis</h4>
                    <p>📍 Immeuble Medina Palace, 53-55 Av. de Paris, Tunis</p>
                    <p>📞 +216 53 359 515</p>
                    <p>✉️ Medicale@caei-afri.com</p>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-t border-white/10 pt-6 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500">
                <p>© {{ date('Y') }} CAEI Medical Services — Tous droits réservés.</p>
                <p>Développé par CAEI Digital MOOV</p>
            </div>
        </section>

    </body>
</html>
