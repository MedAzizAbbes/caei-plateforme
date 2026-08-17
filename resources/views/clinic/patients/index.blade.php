<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mes Patients — {{ $clinic->name }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Figtree', sans-serif; background: #f1f5f9; min-height: 100vh; }
        .sidebar { background: linear-gradient(180deg, #061743 0%, #0c3a6e 100%); min-height: 100vh; width: 260px; flex-shrink: 0; }
        .nav-link { display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem; border-radius: 10px; font-size: 0.875rem; font-weight: 600; color: rgba(255,255,255,0.7); transition: all 0.2s; }
        .nav-link:hover, .nav-link.active { background: rgba(255,255,255,0.12); color: white; }
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
            @if($clinic->city) <div class="text-sky-300 text-xs mt-1">📍 {{ $clinic->city }}</div> @endif
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

        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-black text-slate-900">Mes Patients Affectés</h1>
                <p class="text-slate-500 text-sm mt-1">Consultez et traitez les dossiers patients qui vous ont été confiés par CAEI Medical Center</p>
            </div>
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

        {{-- Stats rapides --}}
        <div class="grid grid-cols-2 md:grid-cols-5 gap-3 mb-6">
            <a href="{{ route('clinic.patients.index') }}" class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm text-center hover:shadow-md transition-all">
                <div class="text-xs font-bold uppercase text-slate-500">Total</div>
                <div class="text-2xl font-black text-slate-900 mt-0.5">{{ $stats['total'] }}</div>
            </a>
            <a href="{{ route('clinic.patients.index', ['clinic_status' => 'pending_review']) }}" class="bg-amber-50 p-4 rounded-xl border border-amber-200 shadow-sm text-center hover:shadow-md transition-all">
                <div class="text-xs font-bold uppercase text-amber-700">En attente</div>
                <div class="text-2xl font-black text-amber-700 mt-0.5">{{ $stats['pending_review'] }}</div>
            </a>
            <a href="{{ route('clinic.patients.index', ['clinic_status' => 'accepted']) }}" class="bg-emerald-50 p-4 rounded-xl border border-emerald-200 shadow-sm text-center hover:shadow-md transition-all">
                <div class="text-xs font-bold uppercase text-emerald-700">Acceptés</div>
                <div class="text-2xl font-black text-emerald-700 mt-0.5">{{ $stats['accepted'] }}</div>
            </a>
            <a href="{{ route('clinic.patients.index', ['clinic_status' => 'quoted']) }}" class="bg-blue-50 p-4 rounded-xl border border-blue-200 shadow-sm text-center hover:shadow-md transition-all">
                <div class="text-xs font-bold uppercase text-blue-700">Devis</div>
                <div class="text-2xl font-black text-blue-700 mt-0.5">{{ $stats['quoted'] }}</div>
            </a>
            <a href="{{ route('clinic.patients.index', ['clinic_status' => 'rejected']) }}" class="bg-rose-50 p-4 rounded-xl border border-rose-200 shadow-sm text-center hover:shadow-md transition-all">
                <div class="text-xs font-bold uppercase text-rose-700">Refusés</div>
                <div class="text-2xl font-black text-rose-700 mt-0.5">{{ $stats['rejected'] }}</div>
            </a>
        </div>

        {{-- Filtres --}}
        <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm mb-6">
            <form method="GET" action="{{ route('clinic.patients.index') }}" class="flex flex-wrap gap-3 items-end">
                <div class="flex-1 min-w-48">
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Rechercher</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nom, email, service..." class="w-full rounded-xl border border-slate-300 px-4 py-2 text-sm focus:border-sky-500 focus:outline-none">
                </div>
                <div class="min-w-40">
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Statut</label>
                    <select name="clinic_status" class="w-full rounded-xl border border-slate-300 px-4 py-2 text-sm focus:border-sky-500 focus:outline-none">
                        <option value="">Tous</option>
                        <option value="pending_review" {{ request('clinic_status') === 'pending_review' ? 'selected' : '' }}>En attente</option>
                        <option value="accepted" {{ request('clinic_status') === 'accepted' ? 'selected' : '' }}>Accepté</option>
                        <option value="quoted" {{ request('clinic_status') === 'quoted' ? 'selected' : '' }}>Devis envoyé</option>
                        <option value="rejected" {{ request('clinic_status') === 'rejected' ? 'selected' : '' }}>Refusé</option>
                    </select>
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="bg-[#061743] hover:bg-[#0a2569] text-white font-bold text-sm py-2 px-5 rounded-xl transition-all">Filtrer</button>
                    <a href="{{ route('clinic.patients.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-sm py-2 px-4 rounded-xl transition-all">Effacer</a>
                </div>
            </form>
        </div>

        {{-- Table --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            @if($patients->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-700">
                        <thead class="bg-slate-50 text-xs font-black uppercase tracking-wider text-slate-600 border-b border-slate-200">
                            <tr>
                                <th class="p-4">Réf</th>
                                <th class="p-4">Patient</th>
                                <th class="p-4">Prestation</th>
                                <th class="p-4">Date souhaitée</th>
                                <th class="p-4">Statut</th>
                                <th class="p-4">Devis</th>
                                <th class="p-4 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($patients as $patient)
                                @php
                                    $statusMap = [
                                        'pending_review' => ['label' => '⏳ En attente', 'class' => 'bg-amber-100 text-amber-800'],
                                        'accepted'       => ['label' => '✅ Accepté',    'class' => 'bg-emerald-100 text-emerald-800'],
                                        'quoted'         => ['label' => '💰 Devis envoyé','class' => 'bg-blue-100 text-blue-800'],
                                        'rejected'       => ['label' => '❌ Refusé',     'class' => 'bg-rose-100 text-rose-800'],
                                    ];
                                    $s = $statusMap[$patient->clinic_status] ?? ['label' => '—', 'class' => 'bg-slate-100 text-slate-600'];
                                @endphp
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="p-4 font-mono font-bold text-slate-600 text-xs">#{{ $patient->id }}</td>
                                    <td class="p-4">
                                        <div class="font-bold text-slate-900">{{ $patient->fullname }}</div>
                                        <div class="text-xs text-slate-500">📍 {{ $patient->country }}</div>
                                    </td>
                                    <td class="p-4">
                                        <span class="bg-teal-50 text-teal-700 text-xs font-bold px-2.5 py-1 rounded-lg border border-teal-100">{{ $patient->service_type }}</span>
                                    </td>
                                    <td class="p-4 text-sm text-slate-700">
                                        {{ $patient->preferred_date ? $patient->preferred_date->format('d/m/Y') : '—' }}
                                    </td>
                                    <td class="p-4">
                                        <span class="text-xs font-bold px-3 py-1 rounded-full {{ $s['class'] }}">{{ $s['label'] }}</span>
                                    </td>
                                    <td class="p-4">
                                        @if($patient->devis_amount)
                                            <div class="font-black text-slate-900">{{ number_format($patient->devis_amount, 2) }} {{ $patient->devis_currency }}</div>
                                            <div class="text-[10px] text-slate-400">{{ $patient->devis_sent_at?->format('d/m/Y') }}</div>
                                        @else
                                            <span class="text-slate-300 text-xs italic">Non envoyé</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-right">
                                        <a href="{{ route('clinic.patients.show', $patient->id) }}" class="inline-flex items-center gap-1.5 bg-[#061743] hover:bg-[#0a2569] text-white text-xs font-bold px-3 py-1.5 rounded-lg transition-all">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                            Voir dossier
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-slate-100">{{ $patients->links() }}</div>
            @else
                <div class="p-12 text-center text-slate-400">
                    <div class="text-5xl mb-3">📋</div>
                    <p class="font-semibold">Aucun patient trouvé.</p>
                </div>
            @endif
        </div>
    </main>
</body>
</html>
