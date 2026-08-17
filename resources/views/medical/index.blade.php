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
            .medical-blue-text {
                background: linear-gradient(135deg, #0284c7 0%, #0284c7 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .card-hover-light {
                transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            }
            .card-hover-light:hover {
                transform: translateY(-6px);
                box-shadow: 0 20px 35px -10px rgba(13, 148, 136, 0.18);
                border-color: #5eead4;
            }
            .bg-hero-pattern {
                background-image: linear-gradient(to right, rgba(255, 255, 255, 0.94) 0%, rgba(240, 253, 250, 0.90) 50%, rgba(255, 255, 255, 0.95) 100%), url('{{ asset("images/medical_hero_bg.jpg") }}');
                background-size: cover;
                background-position: center;
            }
            .bg-about-pattern {
                background-image: linear-gradient(to bottom, rgba(248, 250, 252, 0.93), rgba(248, 250, 252, 0.96)), url('{{ asset("images/medical_clinic_bg.jpg") }}');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
            }
            .bg-evacsan-pattern {
                background-image: linear-gradient(to right, rgba(225, 29, 72, 0.92), rgba(190, 18, 60, 0.88)), url('{{ asset("assets/img/im1.jpg") }}');
                background-size: cover;
                background-position: center;
            }
            .bg-devis-pattern {
                background-image: linear-gradient(to bottom, rgba(248, 250, 252, 0.94), rgba(255, 255, 255, 0.92)), url('{{ asset("images/medical_hero_bg.jpg") }}');
                background-size: cover;
                background-position: center;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-white text-slate-800 min-h-screen selection:bg-[#0284c7] selection:text-white">

        {{-- ══════════ TOPBAR MEDICAL (CLAIRE & ÉPURÉE) ══════════ --}}
        <div class="bg-sky-50 text-sky-900 text-xs py-2.5 px-4 border-b border-sky-100">
            <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-3">
                <div class="flex items-center gap-6 flex-wrap">
                    <span class="flex items-center gap-2 text-sky-600 font-bold">
                        <svg class="w-4 h-4 text-sky-500 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Assistance & EVACSAN 24h/24 - 7j/7
                    </span>
                    <a href="tel:+21653359515" class="flex items-center gap-1.5 hover:text-sky-700 transition-colors">
                        <svg class="w-3.5 h-3.5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        +216 53 359 515
                    </a>
                    <a href="mailto:Medicale@caei-afri.com" class="hidden sm:flex items-center gap-1.5 hover:text-sky-700 transition-colors">
                        <svg class="w-3.5 h-3.5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Medicale@caei-afri.com
                    </a>
                    <span class="hidden md:flex items-center gap-1.5 text-sky-600">
                        <svg class="w-3.5 h-3.5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Immeuble Medina Palace, Avenue de Paris, Tunis
                    </span>
                </div>
                <div class="flex items-center gap-4 ms-auto">
                    <a href="{{ route('home') }}" class="text-xs text-sky-700 hover:text-sky-700 font-medium transition-colors">← Groupe CAEI</a>
                    <a href="https://caei-afri.com/Medicalservices/PDF/catalogueCAEIMedicalServices.pdf" target="_blank" class="inline-flex items-center gap-1.5 text-[11px] font-bold text-white bg-[#0284c7] hover:bg-[#0369a1] px-3.5 py-1 rounded-full shadow-sm transition-all">
                        📄 Catalogue PDF
                    </a>
                </div>
            </div>
        </div>

        {{-- ══════════ NAVBAR BLANCHE ET LUMINEUSE ══════════ --}}
        <nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-100 shadow-sm px-4 lg:px-8 py-3.5">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                {{-- Logo --}}
                <a href="{{ route('medical.services') }}" class="flex items-center gap-3.5 hover:scale-105 transition-transform">
                    <div class="relative">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo CAEI Medical Services" class="h-12 w-12 md:h-14 md:w-14 rounded-full object-cover shadow-md border-2 border-[#0284c7]">
                        <span class="absolute -bottom-1 -right-1 bg-[#0284c7] text-white p-0.5 rounded-full border-2 border-white">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"/></svg>
                        </span>
                    </div>
                    <div>
                        <span class="block text-xl font-black tracking-wider text-slate-900 uppercase leading-none">CAEI MEDICAL</span>
                        <span class="block text-[10px] font-bold text-[#0284c7] uppercase tracking-widest mt-1">Services & Évacuation Sanitaire</span>
                    </div>
                </a>

                {{-- Desktop Links --}}
                <div class="hidden lg:flex items-center gap-8 text-sm font-semibold">
                    <a href="#accueil" class="text-[#0284c7] font-bold hover:text-sky-700 transition-colors">Accueil</a>
                    <a href="#pourquoi-tunisie" class="text-slate-600 hover:text-[#0284c7] transition-colors">À Propos</a>
                    <a href="#services" class="text-slate-600 hover:text-[#0284c7] transition-colors">Nos Services</a>
                    <a href="#pourquoi-tunisie" class="text-slate-600 hover:text-[#0284c7] transition-colors">Pourquoi la Tunisie ?</a>
                    <a href="#evacsan" class="text-rose-600 hover:text-rose-700 font-bold transition-colors">EVACSAN 24/7</a>
                    <a href="#contact" class="text-slate-600 hover:text-[#0284c7] transition-colors">Contact</a>
                </div>

                {{-- Action Button --}}
                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs md:text-sm px-4 py-2.5 rounded-full border border-slate-200 transition-all">
                        <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        <span>Accueil</span>
                    </a>
                    <a href="{{ route('clinic.login') }}" class="hidden md:inline-flex items-center justify-center gap-1.5 bg-white hover:bg-slate-50 text-[#061743] font-bold text-xs border border-slate-300 px-4 py-2.5 rounded-full shadow-sm transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <span>Espace Cliniques</span>
                    </a>
                    <a href="#devis" class="inline-flex items-center justify-center gap-2 bg-[#0284c7] hover:bg-[#0369a1] text-white font-bold text-xs md:text-sm px-5 py-2.5 rounded-full shadow-md shadow-sky-500/20 hover:scale-105 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>Devis & Rendez-vous</span>
                    </a>
                </div>

            </div>
        </nav>

        {{-- ══════════ HERO SECTION AVEC VIDEO BACKGROUND ══════════ --}}
        <section id="accueil" class="relative py-16 lg:py-24 px-4 overflow-hidden border-b border-sky-50">
            <!-- Video Background Container -->
            <div class="absolute inset-0 w-full h-full z-0 overflow-hidden bg-sky-50">
                <!-- Overlay blanc/bleu très transparent pour l'effet clinique -->
                <div class="absolute inset-0 bg-white/75 z-10"></div>
                
                <!-- Remplacez 'VOTRE_ID_YOUTUBE_ICI' par l'ID de votre vidéo médicale -->
                <iframe 
                    class="absolute top-1/2 left-1/2 w-[100vw] h-[56.25vw] min-h-[100vh] min-w-[177.77vh] -translate-x-1/2 -translate-y-1/2 pointer-events-none opacity-60"
                    src="https://www.youtube.com/embed/7apjhhiyNlg?autoplay=1&mute=1&controls=0&showinfo=0&autohide=1&loop=1&playlist=7apjhhiyNlg&vq=hd1080" 
                    frameborder="0" 
                    allow="autoplay; fullscreen" 
                    allowfullscreen>
                </iframe>
            </div>

            <!-- Content -->
            <div class="relative z-20 max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                {{-- Text column --}}
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 bg-white/90 border border-sky-200 shadow-sm px-4 py-1.5 rounded-full text-[#0284c7] font-extrabold text-xs uppercase tracking-wider backdrop-blur-md">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#0284c7] animate-ping"></span>
                        VOTRE SANTÉ, NOTRE PRIORITÉ EN TUNISIE
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 uppercase tracking-tight leading-tight">
                        CAEI <span class="medical-blue-text">MEDICAL SERVICES</span>
                    </h1>

                    <p class="text-lg sm:text-xl text-slate-700 font-medium leading-relaxed max-w-2xl bg-white/80 backdrop-blur-xs p-2 rounded-full border border-white/50">
                        Agence internationale indépendante d'accompagnement médical, d'évacuation sanitaire et de conciergerie médicale en Tunisie. Accédez aux meilleures cliniques certifiées et chirurgiens de renom.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                        <a href="#devis" class="w-full sm:w-auto inline-flex items-center justify-center gap-3 bg-[#0284c7] hover:bg-[#0369a1] text-white font-black text-base px-8 py-4 rounded-[20px] shadow-lg shadow-sky-600/25 hover:scale-105 transition-all">
                            <span>Demander un Devis Gratuit</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="#evacsan" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 border-2 border-rose-500 hover:bg-rose-50 text-rose-700 font-bold text-base px-6 py-4 rounded-[20px] bg-white shadow-sm transition-all">
                            <svg class="w-5 h-5 text-rose-600 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            <span>Urgence EVACSAN 24/7</span>
                        </a>
                    </div>

                    {{-- Key metrics --}}
                    <div class="pt-8 border-t border-slate-100 grid grid-cols-3 gap-4 text-center lg:text-left">
                        <div class="bg-white/90 backdrop-blur-md p-4 rounded-[20px] border border-sky-100 shadow-sm">
                            <div class="text-2xl lg:text-3xl font-black text-[#0284c7]">100%</div>
                            <div class="text-xs text-slate-600 font-semibold mt-0.5">Cliniques Certifiées</div>
                        </div>
                        <div class="bg-white/90 backdrop-blur-md p-4 rounded-[20px] border border-sky-100 shadow-sm">
                            <div class="text-2xl lg:text-3xl font-black text-amber-600">-60%</div>
                            <div class="text-xs text-slate-600 font-semibold mt-0.5">Économie vs Europe</div>
                        </div>
                        <div class="bg-white/90 backdrop-blur-md p-4 rounded-[20px] border border-sky-100 shadow-sm">
                            <div class="text-2xl lg:text-3xl font-black text-emerald-600">24h/7j</div>
                            <div class="text-xs text-slate-600 font-semibold mt-0.5">Prise en Charge</div>
                        </div>
                    </div>
                </div>

                {{-- Hero Card Column (Claire avec visuel clinique) --}}
                <div class="lg:col-span-5">
                    <div class="bg-white/95 backdrop-blur-md p-8 rounded-[24px] border border-sky-200 shadow-xl space-y-6">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-11 h-11 rounded-full bg-sky-50 text-[#0284c7] flex items-center justify-center font-bold text-xl border border-sky-100 shadow-sm">
                                    ⚕️
                                </div>
                                <div>
                                    <div class="text-base font-black text-slate-900 uppercase">Séjour Santé Tout Compris</div>
                                    <div class="text-xs text-[#0284c7] font-bold">Accompagnement Sur-Mesure</div>
                                </div>
                            </div>
                            <span class="bg-sky-100 text-[#0284c7] text-[10px] font-black px-2.5 py-1 rounded-full uppercase">ISO Certified</span>
                        </div>

                        <ul class="space-y-4 text-sm text-slate-700">
                            <li class="flex items-start gap-3">
                                <span class="w-5 h-5 rounded-full bg-sky-100 text-[#0284c7] flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs">✓</span>
                                <span><strong>Diagnostic & Orientation :</strong> Choix du chirurgien spécialiste adapté à votre cas.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-5 h-5 rounded-full bg-sky-100 text-[#0284c7] flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs">✓</span>
                                <span><strong>Conciergerie VIP :</strong> Accueil personnalisé à l'aéroport de Tunis-Carthage & chauffeur.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-5 h-5 rounded-full bg-sky-100 text-[#0284c7] flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs">✓</span>
                                <span><strong>Hébergement Premium :</strong> Hôtel 4/5 étoiles pour la convalescence & suivi d'infirmiers.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-5 h-5 rounded-full bg-sky-100 text-[#0284c7] flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs">✓</span>
                                <span><strong>Transparence Totale :</strong> Devis clair et sans frais cachés avant votre départ.</span>
                            </li>
                        </ul>

                        <div class="bg-sky-50 p-4 rounded-[20px] border border-sky-200/60 text-xs text-slate-700 flex items-center justify-between shadow-xs">
                            <span class="font-semibold">📞 Support Direct Patient :</span>
                            <span class="font-black text-[#0284c7] text-sm">+216 53 359 515</span>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- ══════════ ALERTE DE SUCCÈS ══════════ --}}
        @if(session('success'))
            <div class="max-w-4xl mx-auto my-6 px-4">
                <div class="bg-emerald-50 border border-emerald-300 text-emerald-900 p-5 rounded-[20px] flex items-center gap-4 shadow-sm">
                    <svg class="w-8 h-8 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>
                        <div class="font-bold text-base text-emerald-950">Demande enregistrée avec succès</div>
                        <div class="text-sm mt-0.5">{{ session('success') }}</div>
                    </div>
                </div>
            </div>
        @endif

        {{-- ══════════ SECTION PRESENTATION & WHY TUNISIA (AVEC PHOTO CLINIQUE EN FOND) ══════════ --}}
        <section id="pourquoi-tunisie" class="py-20 bg-about-pattern text-slate-800 border-b border-slate-100/60">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <p class="text-xs font-black uppercase text-[#0284c7] tracking-widest">Excellence Médicale Internationale</p>
                    <h2 class="mt-2 text-3xl sm:text-4xl font-black uppercase tracking-tight text-slate-900">Pourquoi Choisir CAEI Medical Services & La Tunisie ?</h2>
                    <div class="w-20 h-1 bg-[#0284c7] mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6 text-slate-700 leading-relaxed text-base bg-white/80 backdrop-blur-md p-6 rounded-[24px] border border-slate-100 shadow-sm">
                        <p class="text-lg font-semibold text-slate-900">
                            La Tunisie s'impose aujourd'hui comme <span class="text-[#0284c7] font-bold">l'une des meilleures destinations mondiales de tourisme médical</span>, combinant des normes chirurgicales européennes et des coûts maîtrisés.
                        </p>
                        <p>
                            Les médecins et chirurgiens tunisiens, d'une sélectivité universitaire extrême (souvent issus des 1000 premiers bacheliers au niveau national), sont formés dans les plus prestigieuses facultés de médecine en Tunisie et en France. Ils maîtrisent parfaitement les dernières innovations et interventions de pointe.
                        </p>
                        <div class="space-y-4 pt-2">
                            <div class="flex items-center gap-4 bg-white p-4 rounded-[20px] border border-slate-100 shadow-sm overflow-hidden group">
                                <img src="{{ asset('images/frames/plateau_technique.jpg') }}" alt="Plateaux Techniques" class="w-20 h-20 rounded-full object-cover shrink-0 shadow-xs group-hover:scale-105 transition-transform duration-300">
                                <div>
                                    <h4 class="font-black text-slate-900 text-base">Plateaux Techniques Sophistiqués</h4>
                                    <p class="text-xs text-slate-500 mt-1">Cliniques privées dotées de blocs opératoires ultramodernes, de scanners 3D et d'unités de réanimation certifiées.</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 bg-white p-4 rounded-[20px] border border-slate-100 shadow-sm overflow-hidden group">
                                <img src="{{ asset('images/frames/agence_independante.jpg') }}" alt="Agence Indépendante" class="w-20 h-20 rounded-full object-cover shrink-0 shadow-xs group-hover:scale-105 transition-transform duration-300">
                                <div>
                                    <h4 class="font-black text-slate-900 text-base">Agence 100% Indépendante</h4>
                                    <p class="text-xs text-slate-500 mt-1">Nous sélectionnons pour vous les meilleurs spécialistes en toute neutralité, sans compromis sur la qualité des soins.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        {{-- Cadre 1: Cliniques VIP --}}
                        <div class="bg-white rounded-[20px] border border-sky-100 shadow-sm overflow-hidden card-hover-light flex flex-col justify-between group">
                            <div class="h-28 w-full relative overflow-hidden">
                                <img src="{{ asset('images/frames/clinique_vip.jpg') }}" alt="Cliniques VIP" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-white via-white/20 to-transparent"></div>
                            </div>
                            <div class="p-5 pt-1 text-center">
                                <div class="text-base font-black text-slate-900">Cliniques VIP</div>
                                <p class="text-xs text-slate-500 mt-1">Structures médicales homologuées aux normes internationales ISO.</p>
                            </div>
                        </div>

                        {{-- Cadre 2: Prise en Charge 360° --}}
                        <div class="bg-white rounded-[20px] border border-sky-100 shadow-sm overflow-hidden card-hover-light flex flex-col justify-between group">
                            <div class="h-28 w-full relative overflow-hidden">
                                <img src="{{ asset('images/frames/prise_en_charge.jpg') }}" alt="Prise en Charge 360°" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-white via-white/20 to-transparent"></div>
                            </div>
                            <div class="p-5 pt-1 text-center">
                                <div class="text-base font-black text-slate-900">Prise en Charge 360°</div>
                                <p class="text-xs text-slate-500 mt-1">Vol, accueil aéroport, clinique, hôtel & suivi post-opératoire.</p>
                            </div>
                        </div>

                        {{-- Cadre 3: Spécialistes de Renom --}}
                        <div class="bg-white rounded-[20px] border border-sky-100 shadow-sm overflow-hidden card-hover-light flex flex-col justify-between group">
                            <div class="h-28 w-full relative overflow-hidden">
                                <img src="{{ asset('images/frames/specialistes.jpg') }}" alt="Spécialistes de Renom" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-white via-white/20 to-transparent"></div>
                            </div>
                            <div class="p-5 pt-1 text-center">
                                <div class="text-base font-black text-slate-900">Spécialistes de Renom</div>
                                <p class="text-xs text-slate-500 mt-1">Chirurgiens inscrits au Conseil de l'Ordre avec diplômes français & tunisiens.</p>
                            </div>
                        </div>

                        {{-- Cadre 4: Convalescence Douce --}}
                        <div class="bg-white rounded-[20px] border border-sky-100 shadow-sm overflow-hidden card-hover-light flex flex-col justify-between group">
                            <div class="h-28 w-full relative overflow-hidden">
                                <img src="{{ asset('images/frames/convalescence.jpg') }}" alt="Convalescence Douce" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-white via-white/20 to-transparent"></div>
                            </div>
                            <div class="p-5 pt-1 text-center">
                                <div class="text-base font-black text-slate-900">Convalescence Douce</div>
                                <p class="text-xs text-slate-500 mt-1">Cadre méditerranéen idéal pour se reposer en toute quiétude.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ══════════ NOS SERVICES MÉDICAUX ══════════ --}}
        <section id="services" class="py-24 bg-white relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <p class="text-xs font-black uppercase text-[#0284c7] tracking-widest">Prestations Certifiées</p>
                    <h2 class="mt-2 text-3xl sm:text-5xl font-black uppercase tracking-tight text-slate-900">Nos Domaines d'Expertise Médicale</h2>
                    <div class="w-20 h-1 bg-[#0284c7] mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($services as $service)
                        <div class="relative overflow-hidden rounded-[24px] border border-slate-100/90 shadow-md card-hover-light flex flex-col justify-between bg-white group"
                             style="background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.90) 0%, rgba(255, 255, 255, 0.97) 100%), url('{{ asset("images/services/" . $service["image"]) }}'); background-size: cover; background-position: center;">
                            
                            {{-- Top Service Photo Banner --}}
                            <div class="h-36 w-full relative overflow-hidden">
                                <img src="{{ asset('images/services/' . $service['image']) }}" alt="{{ $service['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-white via-white/40 to-transparent"></div>
                                <div class="absolute top-4 left-4 right-4 flex items-center justify-between z-10">
                                    <span class="bg-white/90 backdrop-blur-md text-[#0284c7] border border-sky-200 text-xs font-black px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">
                                        {{ $service['badge'] }}
                                    </span>
                                    <div class="w-10 h-10 rounded-full bg-white/90 backdrop-blur-md text-[#0284c7] flex items-center justify-center font-bold text-lg border border-sky-200 shadow-sm">
                                        ⚕️
                                    </div>
                                </div>
                            </div>

                            <div class="p-8 pt-2 flex flex-col justify-between flex-grow">
                                <div>
                                    <h3 class="text-xl font-black text-slate-900 mb-3 leading-snug">
                                        {{ $service['title'] }}
                                    </h3>

                                    <p class="text-slate-600 text-xs leading-relaxed mb-6 font-medium bg-white/80 backdrop-blur-xs p-2 rounded-full border border-slate-100">
                                        {{ $service['description'] }}
                                    </p>

                                    <ul class="space-y-2.5 mb-6">
                                        @foreach($service['features'] as $feature)
                                            <li class="flex items-center gap-2.5 text-xs text-slate-800 font-semibold">
                                                <svg class="w-4 h-4 text-[#0284c7] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                                <span>{{ $feature }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <a href="#devis" class="inline-flex items-center justify-center gap-2 w-full py-3 bg-[#f0fdfa] hover:bg-[#0284c7] text-[#0284c7] hover:text-white border border-sky-200 font-bold text-xs rounded-full transition-all shadow-sm">
                                    Demander un Devis pour ce Soin →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ══════════ SECTION EVACSAN (AVEC PHOTO DE BACKGROUND MÉDICAL D'URGENCE) ══════════ --}}
        <section id="evacsan" class="py-20 bg-evacsan-pattern text-white relative shadow-xl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-black/20 backdrop-blur-md rounded-[24px] p-8 lg:p-12 border border-white/30 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-8 space-y-4">
                        <div class="inline-flex items-center gap-2 bg-white text-rose-700 px-3.5 py-1 rounded-full text-xs font-black uppercase tracking-wider shadow-md">
                            <span class="w-2 h-2 rounded-full bg-rose-600 animate-ping"></span>
                            UNITÉ D'URGENCE INTERNATIONALE
                        </div>
                        <h2 class="text-2xl sm:text-4xl font-black text-white uppercase tracking-tight">
                            Évacuation Sanitaire d'Urgence (EVACSAN 24/7)
                        </h2>
                        <p class="text-rose-100 text-sm leading-relaxed max-w-2xl">
                            Besoins d'un transfert médical d'urgence vers la Tunisie pour vous-même, un proche ou un collaborateur ? Notre cellule EVACSAN coordonne l'ensemble des démarches : avion sanitaire équipé, équipe médicale de réanimation à bord, autorisations de survol et accueil immédiat en soins intensifs à Tunis.
                        </p>
                        <div class="flex flex-wrap items-center gap-6 pt-2 text-xs font-bold text-white">
                            <span class="flex items-center gap-1.5">🚑 Avion Sanitaire Équipé</span>
                            <span class="flex items-center gap-1.5">👨‍⚕️ Médecins Réanimateurs à Bord</span>
                            <span class="flex items-center gap-1.5">📋 Formalités & Visas Accélérés</span>
                        </div>
                    </div>
                    <div class="lg:col-span-4 text-center lg:text-right space-y-4">
                        <a href="tel:+21653359515" class="inline-flex items-center justify-center gap-3 bg-white hover:bg-slate-100 text-rose-700 font-black text-lg px-8 py-4 rounded-[20px] shadow-xl hover:scale-105 transition-all w-full sm:w-auto">
                            <svg class="w-6 h-6 animate-pulse text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>Appel Urgence : +216 53 359 515</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- ══════════ FORMULAIRE DE DEVIS / RENDEZ-VOUS (AVEC FOND TEXTURÉ SUBTIL) ══════════ --}}
        <section id="devis" class="py-24 bg-devis-pattern relative border-b border-slate-100">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white/95 backdrop-blur-md p-8 sm:p-12 rounded-[24px] border border-slate-100 shadow-xl">
                    <div class="text-center mb-10">
                        <span class="bg-sky-50 text-[#0284c7] border border-sky-200 text-xs font-black px-3.5 py-1 rounded-full uppercase tracking-wider">Demande Confidentielle & Gratuite</span>
                        <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight mt-3">Demande de Devis Médical & Rendez-vous</h2>
                        <p class="text-slate-500 text-xs mt-2">Remplissez ce formulaire. Un conseiller médical vous contactera confidentiellement sous 24 heures.</p>
                    </div>

                    <form action="{{ route('medical.services.request') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nom & Prénom *</label>
                                <input type="text" name="fullname" required placeholder="Ex: Jean Dupont" class="w-full bg-[#f8fafc] border border-slate-300 rounded-full px-4 py-3 text-slate-900 text-sm focus:border-[#0284c7] focus:bg-white focus:outline-none transition-all">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Adresse Email *</label>
                                <input type="email" name="email" required placeholder="Ex: jean.dupont@email.com" class="w-full bg-[#f8fafc] border border-slate-300 rounded-full px-4 py-3 text-slate-900 text-sm focus:border-[#0284c7] focus:bg-white focus:outline-none transition-all">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Numéro Téléphone / WhatsApp *</label>
                                <input type="text" name="phone" required placeholder="Ex: +225 07 00 00 00" class="w-full bg-[#f8fafc] border border-slate-300 rounded-full px-4 py-3 text-slate-900 text-sm focus:border-[#0284c7] focus:bg-white focus:outline-none transition-all">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Pays de Résidence *</label>
                                <input type="text" name="country" required placeholder="Ex: Côte d'Ivoire, Sénégal, France..." class="w-full bg-[#f8fafc] border border-slate-300 rounded-full px-4 py-3 text-slate-900 text-sm focus:border-[#0284c7] focus:bg-white focus:outline-none transition-all">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Type de Soin / Spécialité *</label>
                                <select name="service_type" required class="w-full bg-[#f8fafc] border border-slate-300 rounded-full px-4 py-3 text-slate-900 text-sm focus:border-[#0284c7] focus:bg-white focus:outline-none transition-all">
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
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Date Souhaitée *</label>
                                <input type="date" name="preferred_date" min="{{ date('Y-m-d') }}" required class="w-full bg-[#f8fafc] border border-slate-300 rounded-full px-4 py-3 text-slate-900 text-sm focus:border-[#0284c7] focus:bg-white focus:outline-none transition-all">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Message & Précisions Médicales</label>
                            <textarea name="message" rows="4" placeholder="Décrivez succinctement vos besoins ou symptômes..." class="w-full bg-[#f8fafc] border border-slate-300 rounded-full px-4 py-3 text-slate-900 text-sm focus:border-[#0284c7] focus:bg-white focus:outline-none transition-all"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-[#0284c7] hover:bg-[#0369a1] text-white font-black text-base py-4 rounded-full shadow-lg shadow-sky-600/20 hover:scale-[1.01] transition-all">
                            Envoyer la Demande de Devis Gratuit
                        </button>
                    </form>
                </div>
            </div>
        </section>

        {{-- ══════════ SECTION CONTACT & FOOTER ══════════ --}}
        <footer id="contact" class="bg-[#0f172a] text-sky-700 py-16 text-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10 rounded-full border border-sky-400">
                        <span class="font-black text-white text-base">CAEI MEDICAL</span>
                    </div>
                    <p class="text-xs text-sky-600 leading-relaxed">
                        Agence internationale indépendante d'accompagnement médical & d'évacuation sanitaire en Tunisie.
                    </p>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-3 text-xs uppercase tracking-wider text-sky-600">Services Clés</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="#services" class="hover:text-white transition-colors">Chirurgie Esthétique</a></li>
                        <li><a href="#evacsan" class="hover:text-white transition-colors">Évacuation Sanitaire 24/7</a></li>
                        <li><a href="#services" class="hover:text-white transition-colors">Assistance PMA / FIV</a></li>
                        <li><a href="#services" class="hover:text-white transition-colors">Chirurgie Bariatrique</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-3 text-xs uppercase tracking-wider text-sky-600">Liens Utiles</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Site Officiel Groupe CAEI</a></li>
                        <li><a href="{{ route('plateforme') }}" class="hover:text-white transition-colors">Plateforme Séminaires</a></li>
                        <li><a href="https://caei-afri.com/Medicalservices/PDF/catalogueCAEIMedicalServices.pdf" target="_blank" class="hover:text-white transition-colors">Télécharger Catalogue PDF</a></li>
                    </ul>
                </div>

                <div class="space-y-2 text-xs">
                    <h4 class="font-bold text-white mb-3 uppercase tracking-wider text-sky-600">Contact Tunis</h4>
                    <p>📍 Immeuble Medina Palace, 53-55 Av. de Paris, Tunis</p>
                    <p>📞 +216 53 359 515</p>
                    <p>✉️ Medicale@caei-afri.com</p>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-t border-sky-100 pt-6 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500">
                <p>© {{ date('Y') }} CAEI Medical Services — Tous droits réservés.</p>
                <p>Développé par CAEI Digital MOOV</p>
            </div>
        </footer>
        <x-intl-tel-input />
    </body>
</html>
