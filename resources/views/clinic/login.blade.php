<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Espace Cliniques Partenaires — CAEI Medical</title>
    <meta name="description" content="Connexion sécurisée pour les cliniques partenaires CAEI Medical Center.">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Figtree', sans-serif; }
        .login-bg {
            background: linear-gradient(135deg, #0f1f5c 0%, #061743 40%, #0c3a6e 100%);
            min-height: 100vh;
        }
        .glass-card {
            background: rgba(255,255,255,0.97);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.3);
        }
        .input-field {
            width: 100%;
            padding: 0.875rem 1.25rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.9375rem;
            font-weight: 500;
            color: #1e293b;
            background: #f8fafc;
            transition: all 0.2s;
            outline: none;
        }
        .input-field:focus {
            border-color: #0284c7;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(2, 132, 199, 0.1);
        }
        .btn-primary {
            width: 100%;
            padding: 0.9375rem;
            background: linear-gradient(135deg, #0284c7, #0369a1);
            color: white;
            font-weight: 800;
            font-size: 1rem;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 15px rgba(2, 132, 199, 0.35);
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(2, 132, 199, 0.45);
        }
        .btn-primary:active { transform: translateY(0); }
        .floating-cross {
            position: absolute;
            opacity: 0.06;
            font-size: 8rem;
            pointer-events: none;
            user-select: none;
        }
    </style>
</head>
<body class="login-bg flex items-center justify-center p-4 relative overflow-hidden">

    {{-- Decorative elements --}}
    <div class="floating-cross top-10 left-10">✚</div>
    <div class="floating-cross bottom-10 right-10" style="font-size:12rem">✚</div>
    <div class="floating-cross top-1/2 left-1/4" style="font-size:5rem">✚</div>

    <div class="w-full max-w-md relative z-10">

        {{-- Logo Header --}}
        <div class="text-center mb-8">
            <a href="{{ route('medical.services') }}" class="inline-flex items-center gap-3 group">
                <div class="relative">
                    <img src="{{ asset('images/logo-medical-square.png') }}" alt="CAEI Medical" class="h-16 w-16 rounded-full object-cover border-3 border-white/30 shadow-xl">
                    <span class="absolute -bottom-1 -right-1 bg-[#0284c7] text-white p-1 rounded-full border-2 border-white/50">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"/></svg>
                    </span>
                </div>
                <div class="text-left">
                    <div class="text-white font-black text-xl uppercase tracking-wider">CAEI MEDICAL</div>
                    <div class="text-sky-300 text-xs font-bold uppercase tracking-widest">Espace Cliniques Partenaires</div>
                </div>
            </a>
        </div>

        {{-- Login Card --}}
        <div class="glass-card rounded-3xl shadow-2xl overflow-hidden">

            {{-- Card Header --}}
            <div class="bg-gradient-to-r from-[#061743] to-[#0c3a6e] p-6 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white/10 rounded-2xl mb-3">
                    <span class="text-3xl">🏥</span>
                </div>
                <h1 class="text-white font-black text-xl">Connexion Clinique</h1>
                <p class="text-sky-200 text-sm mt-1">Accédez à votre espace partenaire sécurisé</p>
            </div>

            {{-- Form --}}
            <div class="p-8">

                {{-- Error Message --}}
                @if($errors->any())
                    <div class="mb-5 rounded-xl bg-rose-50 border border-rose-200 p-4 flex items-start gap-3">
                        <svg class="w-5 h-5 text-rose-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <div>
                            <p class="text-rose-800 font-bold text-sm">Erreur de connexion</p>
                            <p class="text-rose-600 text-xs mt-0.5">{{ $errors->first('email') }}</p>
                        </div>
                    </div>
                @endif

                @if(session('success'))
                    <div class="mb-5 rounded-xl bg-emerald-50 border border-emerald-200 p-4 text-emerald-800 text-sm font-semibold">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('clinic.login.post') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-xs font-black uppercase text-slate-600 mb-2 tracking-wider">
                            Adresse email
                        </label>
                        <div class="relative">
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                id="clinic-email"
                                class="input-field pl-12"
                                placeholder="clinique@exemple.com"
                                required
                                autocomplete="email"
                            >
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-black uppercase text-slate-600 mb-2 tracking-wider">
                            Mot de passe
                        </label>
                        <div class="relative">
                            <input
                                type="password"
                                name="password"
                                id="clinic-password"
                                class="input-field pl-12 pr-12"
                                placeholder="••••••••"
                                required
                                autocomplete="current-password"
                            >
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </span>
                            <button type="button" id="togglePassword" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn-primary">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            Se connecter à mon espace
                        </span>
                    </button>
                </form>

                <div class="mt-6 pt-5 border-t border-slate-100 text-center">
                    <p class="text-xs text-slate-500">Vous n'avez pas encore vos identifiants ?</p>
                    <p class="text-xs text-slate-500 mt-1">Contactez <span class="font-bold text-[#0284c7]">CAEI Medical Center</span> pour obtenir vos accès.</p>
                    <a href="mailto:Medicale@caei-afri.com" class="inline-flex items-center gap-1.5 mt-2 text-xs text-sky-600 hover:text-sky-800 font-semibold transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Medicale@caei-afri.com
                    </a>
                </div>
            </div>
        </div>

        {{-- Footer links --}}
        <div class="mt-6 text-center">
            <a href="{{ route('medical.services') }}" class="text-sky-300 hover:text-white text-sm font-medium transition-colors inline-flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Retour au site médical
            </a>
        </div>

    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const pwd = document.getElementById('clinic-password');
            pwd.type = pwd.type === 'password' ? 'text' : 'password';
        });
    </script>
</body>
</html>
