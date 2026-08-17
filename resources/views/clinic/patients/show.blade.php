<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dossier : {{ $patient->fullname }} — {{ $clinic->name }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Figtree', sans-serif; background: #f1f5f9; min-height: 100vh; }
        .sidebar { background: linear-gradient(180deg, #061743 0%, #0c3a6e 100%); min-height: 100vh; width: 260px; flex-shrink: 0; }
        .nav-link { display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem; border-radius: 10px; font-size: 0.875rem; font-weight: 600; color: rgba(255,255,255,0.7); transition: all 0.2s; }
        .nav-link:hover, .nav-link.active { background: rgba(255,255,255,0.12); color: white; }
        .section-card { background: white; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.05); padding: 1.5rem; }
        .input-field { width: 100%; padding: 0.75rem 1rem; border: 2px solid #e2e8f0; border-radius: 10px; font-size: 0.9rem; font-weight: 500; color: #1e293b; background: #f8fafc; transition: all 0.2s; outline: none; }
        .input-field:focus { border-color: #0284c7; background: #fff; box-shadow: 0 0 0 3px rgba(2,132,199,0.1); }
    </style>
</head>
<body class="flex">

    {{-- Sidebar --}}
    <aside class="sidebar flex flex-col p-5 sticky top-0 h-screen overflow-y-auto">
        <div class="flex items-center gap-3 mb-8 pb-6 border-b border-white/10">
            <img src="{{ asset('images/logo.png') }}" alt="CAEI" class="w-10 h-10 rounded-full object-cover border-2 border-sky-400">
            <div>
                <div class="text-white font-black text-sm uppercase">CAEI MEDICAL</div>
                <div class="text-sky-300 text-[10px] font-bold uppercase tracking-wider">Espace Clinique</div>
            </div>
        </div>
        <div class="bg-white/10 rounded-xl p-4 mb-6">
            <div class="text-white font-bold text-sm">🏥 {{ $clinic->name }}</div>
            @if($clinic->city)<div class="text-sky-300 text-xs mt-1">📍 {{ $clinic->city }}</div>@endif
        </div>
        <nav class="space-y-1 flex-1">
            <a href="{{ route('clinic.dashboard') }}" class="nav-link">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Tableau de bord
            </a>
            <a href="{{ route('clinic.patients.index') }}" class="nav-link active">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Mes Patients
            </a>
        </nav>
        <form method="POST" action="{{ route('clinic.logout') }}" class="mt-6 pt-4 border-t border-white/10">
            @csrf
            <button type="submit" class="nav-link w-full text-rose-300 hover:text-rose-100 hover:bg-rose-900/20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Déconnexion
            </button>
        </form>
    </aside>

    {{-- Main --}}
    <main class="flex-1 p-8 overflow-y-auto">

        {{-- Top Bar --}}
        <div class="flex items-center justify-between mb-6">
            <a href="{{ route('clinic.patients.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-slate-800 font-semibold transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Retour à la liste
            </a>
            <div class="flex items-center gap-4">
                <x-clinic-notification-bell />
            </div>
        </div>

        @if(session('success'))
            <div class="mb-5 rounded-xl bg-emerald-50 border border-emerald-200 p-4 flex items-center gap-3 text-emerald-900 font-semibold text-sm">
                <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- LEFT: Fiche Patient --}}
            <div class="lg:col-span-2 space-y-5">

                {{-- En-tête dossier --}}
                <div class="section-card">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-sky-100 flex items-center justify-center text-sky-700 font-black text-xl">
                                {{ strtoupper(substr($patient->fullname, 0, 2)) }}
                            </div>
                            <div>
                                <h1 class="text-2xl font-black text-slate-900">{{ $patient->fullname }}</h1>
                                <div class="flex items-center gap-3 mt-1 flex-wrap">
                                    <span class="text-sm text-slate-500">📍 {{ $patient->country }}</span>
                                    <span class="text-sm text-slate-500">📅 Reçu le {{ $patient->assigned_at ? $patient->assigned_at->format('d/m/Y') : $patient->created_at->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            @php
                                $statusMap = [
                                    'pending_review' => ['label' => '⏳ En attente', 'class' => 'bg-amber-100 text-amber-800'],
                                    'accepted'       => ['label' => '✅ Accepté',     'class' => 'bg-emerald-100 text-emerald-800'],
                                    'quoted'         => ['label' => '💰 Devis envoyé','class' => 'bg-blue-100 text-blue-800'],
                                    'rejected'       => ['label' => '❌ Refusé',      'class' => 'bg-rose-100 text-rose-800'],
                                ];
                                $s = $statusMap[$patient->clinic_status] ?? ['label' => '—', 'class' => 'bg-slate-100 text-slate-600'];
                            @endphp
                            <span class="text-sm font-bold px-4 py-2 rounded-full {{ $s['class'] }}">{{ $s['label'] }}</span>
                        </div>
                    </div>
                </div>

                {{-- Informations patient --}}
                <div class="section-card">
                    <h2 class="font-black text-slate-800 text-base mb-4 flex items-center gap-2">
                        <span>👤</span> Informations Patient
                    </h2>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div class="bg-slate-50 rounded-xl p-3">
                            <div class="text-xs font-bold uppercase text-slate-500 mb-1">Email</div>
                            <a href="mailto:{{ $patient->email }}" class="text-sky-600 hover:text-sky-800 font-semibold">{{ $patient->email }}</a>
                        </div>
                        <div class="bg-slate-50 rounded-xl p-3">
                            <div class="text-xs font-bold uppercase text-slate-500 mb-1">Téléphone</div>
                            <a href="tel:{{ $patient->phone }}" class="text-slate-800 font-semibold">{{ $patient->phone }}</a>
                        </div>
                        <div class="bg-slate-50 rounded-xl p-3">
                            <div class="text-xs font-bold uppercase text-slate-500 mb-1">Pays</div>
                            <div class="text-slate-800 font-semibold">{{ $patient->country }}</div>
                        </div>
                        <div class="bg-slate-50 rounded-xl p-3">
                            <div class="text-xs font-bold uppercase text-slate-500 mb-1">Prestation souhaitée</div>
                            <div class="text-teal-700 font-bold">{{ $patient->service_type }}</div>
                        </div>
                        <div class="bg-slate-50 rounded-xl p-3">
                            <div class="text-xs font-bold uppercase text-slate-500 mb-1">Date souhaitée</div>
                            <div class="text-slate-800 font-semibold">{{ $patient->preferred_date ? $patient->preferred_date->format('d/m/Y') : 'Non spécifiée' }}</div>
                        </div>
                        <div class="bg-slate-50 rounded-xl p-3">
                            <div class="text-xs font-bold uppercase text-slate-500 mb-1">Demande reçue</div>
                            <div class="text-slate-800 font-semibold">{{ $patient->created_at->format('d/m/Y H:i') }}</div>
                        </div>
                    </div>
                    @if($patient->message)
                        <div class="mt-4">
                            <div class="text-xs font-bold uppercase text-slate-500 mb-2">Message du patient</div>
                            <div class="bg-teal-50 border border-teal-100 rounded-xl p-4 text-sm text-slate-800 whitespace-pre-wrap">{{ $patient->message }}</div>
                        </div>
                    @endif
                </div>

                {{-- Devis envoyé (si existant) --}}
                @if($patient->devis_amount)
                    <div class="section-card border-blue-100 bg-blue-50">
                        <h2 class="font-black text-blue-800 text-base mb-4 flex items-center gap-2">
                            <span>💰</span> Devis Envoyé
                        </h2>
                        <div class="text-3xl font-black text-blue-900 mb-2">
                            {{ number_format($patient->devis_amount, 2) }} {{ $patient->devis_currency }}
                        </div>
                        <div class="text-xs text-blue-600 mb-3">Envoyé le {{ $patient->devis_sent_at?->format('d/m/Y à H:i') }}</div>
                        @if($patient->devis_message)
                            <div class="bg-white rounded-xl p-4 text-sm text-slate-800 border border-blue-100 whitespace-pre-wrap">{{ $patient->devis_message }}</div>
                        @endif
                    </div>
                @endif

            </div>

            {{-- RIGHT: Actions --}}
            <div class="space-y-5">

                {{-- Qualifier le dossier --}}
                <div class="section-card">
                    <h2 class="font-black text-slate-800 text-base mb-4 flex items-center gap-2">
                        <span>⚡</span> Qualifier le Dossier
                    </h2>
                    <form action="{{ route('clinic.patients.status', $patient->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Statut du dossier</label>
                            <select name="clinic_status" class="input-field">
                                <option value="pending_review" {{ $patient->clinic_status === 'pending_review' ? 'selected' : '' }}>⏳ En attente de traitement</option>
                                <option value="accepted" {{ $patient->clinic_status === 'accepted' ? 'selected' : '' }}>✅ Accepter le dossier</option>
                                <option value="rejected" {{ $patient->clinic_status === 'rejected' ? 'selected' : '' }}>❌ Refuser le dossier</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Notes clinique</label>
                            <textarea name="clinic_notes" rows="3" class="input-field" placeholder="Disponibilités, conditions, remarques...">{{ $patient->clinic_notes }}</textarea>
                        </div>

                        <button type="submit" class="w-full bg-[#061743] hover:bg-[#0a2569] text-white font-bold text-sm py-3 px-5 rounded-xl shadow transition-all flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Enregistrer
                        </button>
                    </form>
                </div>

                {{-- Envoyer un devis --}}
                <div class="section-card border-2 border-emerald-100 bg-emerald-50/30">
                    <h2 class="font-black text-emerald-800 text-base mb-1 flex items-center gap-2">
                        <span>💰</span> Envoyer un Devis
                    </h2>
                    <p class="text-xs text-emerald-600 mb-4">Proposez un tarif au patient pour cette prestation médicale</p>

                    <form action="{{ route('clinic.patients.devis', $patient->id) }}" method="POST" class="space-y-4">
                        @csrf

                        <div class="flex gap-3">
                            <div class="flex-1">
                                <label class="block text-xs font-bold uppercase text-slate-600 mb-1.5">Montant</label>
                                <input type="number" name="devis_amount" step="0.01" min="0" class="input-field" placeholder="0.00" value="{{ $patient->devis_amount }}">
                            </div>
                            <div class="w-24">
                                <label class="block text-xs font-bold uppercase text-slate-600 mb-1.5">Devise</label>
                                <select name="devis_currency" class="input-field">
                                    <option value="TND" {{ ($patient->devis_currency ?? 'TND') === 'TND' ? 'selected' : '' }}>TND</option>
                                    <option value="EUR" {{ ($patient->devis_currency ?? '') === 'EUR' ? 'selected' : '' }}>EUR</option>
                                    <option value="USD" {{ ($patient->devis_currency ?? '') === 'USD' ? 'selected' : '' }}>USD</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-1.5">Message accompagnant le devis</label>
                            <textarea name="devis_message" rows="5" class="input-field" placeholder="Détaillez ici votre offre : intervention proposée, durée d'hospitalisation, inclusions (hébergement, suivi post-op), modalités de paiement...">{{ $patient->devis_message }}</textarea>
                        </div>

                        <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm py-3 px-5 rounded-xl shadow transition-all flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                            Envoyer le devis
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </main>
</body>
</html>
