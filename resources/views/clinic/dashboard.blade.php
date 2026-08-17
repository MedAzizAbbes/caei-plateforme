<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $clinic->name }} — Espace Partenaire CAEI Medical</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Figtree', sans-serif; background: #f1f5f9; min-height: 100vh; }
        .sidebar { background: linear-gradient(180deg, #061743 0%, #0c3a6e 100%); min-height: 100vh; width: 260px; flex-shrink: 0; }
        .stat-card { background: white; border-radius: 16px; padding: 1.25rem; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
        .nav-link { display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem; border-radius: 10px; font-size: 0.875rem; font-weight: 600; color: rgba(255,255,255,0.7); transition: all 0.2s; }
        .nav-link:hover, .nav-link.active { background: rgba(255,255,255,0.12); color: white; }
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-accepted { background: #d1fae5; color: #065f46; }
        .badge-quoted { background: #dbeafe; color: #1e40af; }
        .badge-rejected { background: #fee2e2; color: #991b1b; }
    </style>
</head>
<body class="flex">

    {{-- Sidebar --}}
    <aside class="sidebar flex flex-col p-5 sticky top-0 h-screen overflow-y-auto">
        {{-- Logo --}}
        <div class="flex items-center gap-3 mb-8 pb-6 border-b border-white/10">
            <img src="{{ asset('images/logo.png') }}" alt="CAEI" class="w-10 h-10 rounded-full object-cover border-2 border-sky-400">
            <div>
                <div class="text-white font-black text-sm uppercase">CAEI MEDICAL</div>
                <div class="text-sky-300 text-[10px] font-bold uppercase tracking-wider">Espace Clinique</div>
            </div>
        </div>

        {{-- Clinic Info --}}
        <div class="bg-white/10 rounded-xl p-4 mb-6">
            <div class="text-white font-bold text-sm">🏥 {{ $clinic->name }}</div>
            @if($clinic->city)
                <div class="text-sky-300 text-xs mt-1">📍 {{ $clinic->city }}</div>
            @endif
            @if($clinic->specialty)
                <div class="text-sky-200 text-xs mt-0.5">{{ $clinic->specialty }}</div>
            @endif
        </div>

        {{-- Navigation --}}
        <nav class="space-y-1 flex-1">
            <a href="{{ route('clinic.dashboard') }}" class="nav-link {{ request()->routeIs('clinic.dashboard') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Tableau de bord
            </a>
            <a href="{{ route('clinic.patients.index') }}" class="nav-link {{ request()->routeIs('clinic.patients.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Mes Patients
                @php $pendingCount = $clinic->medicalRequests()->where('clinic_status', 'pending_review')->count(); @endphp
                @if($pendingCount > 0)
                    <span class="ml-auto bg-amber-400 text-amber-900 text-[10px] font-black px-2 py-0.5 rounded-full">{{ $pendingCount }}</span>
                @endif
            </a>
        </nav>

        {{-- Logout --}}
        <form method="POST" action="{{ route('clinic.logout') }}" class="mt-6 pt-4 border-t border-white/10">
            @csrf
            <button type="submit" class="nav-link w-full text-rose-300 hover:text-rose-100 hover:bg-rose-900/20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Déconnexion
            </button>
        </form>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 p-8 overflow-y-auto">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-black text-slate-900">Bonjour, {{ $clinic->name }} 👋</h1>
                <p class="text-slate-500 text-sm mt-1">Bienvenue dans votre espace partenaire CAEI Medical Center</p>
            </div>
            <div class="text-right text-xs text-slate-400">
                <div>{{ now()->format('d/m/Y') }}</div>
                <div class="font-bold text-slate-600">{{ now()->format('H:i') }}</div>
            </div>
        </div>

        {{-- Success Alert --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-200 p-4 flex items-center gap-3 text-emerald-900 font-semibold text-sm">
                <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- Stats --}}
        <div class="grid grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
            <a href="{{ route('clinic.patients.index') }}" class="stat-card text-center hover:shadow-md transition-all">
                <div class="text-xs font-bold uppercase text-slate-500 mb-1">Total</div>
                <div class="text-3xl font-black text-slate-900">{{ $stats['total'] }}</div>
                <div class="text-xs text-slate-400 mt-1">dossiers</div>
            </a>
            <a href="{{ route('clinic.patients.index', ['clinic_status' => 'pending_review']) }}" class="stat-card text-center hover:shadow-md transition-all border-amber-100 bg-amber-50">
                <div class="text-xs font-bold uppercase text-amber-700 mb-1">En attente</div>
                <div class="text-3xl font-black text-amber-700">{{ $stats['pending_review'] }}</div>
                <div class="text-xs text-amber-500 mt-1">à traiter</div>
            </a>
            <a href="{{ route('clinic.patients.index', ['clinic_status' => 'accepted']) }}" class="stat-card text-center hover:shadow-md transition-all border-emerald-100 bg-emerald-50">
                <div class="text-xs font-bold uppercase text-emerald-700 mb-1">Acceptés</div>
                <div class="text-3xl font-black text-emerald-700">{{ $stats['accepted'] }}</div>
                <div class="text-xs text-emerald-500 mt-1">dossiers</div>
            </a>
            <a href="{{ route('clinic.patients.index', ['clinic_status' => 'quoted']) }}" class="stat-card text-center hover:shadow-md transition-all border-blue-100 bg-blue-50">
                <div class="text-xs font-bold uppercase text-blue-700 mb-1">Devis envoyés</div>
                <div class="text-3xl font-black text-blue-700">{{ $stats['quoted'] }}</div>
                <div class="text-xs text-blue-500 mt-1">devis</div>
            </a>
            <a href="{{ route('clinic.patients.index', ['clinic_status' => 'rejected']) }}" class="stat-card text-center hover:shadow-md transition-all border-rose-100 bg-rose-50">
                <div class="text-xs font-bold uppercase text-rose-700 mb-1">Refusés</div>
                <div class="text-3xl font-black text-rose-700">{{ $stats['rejected'] }}</div>
                <div class="text-xs text-rose-500 mt-1">dossiers</div>
            </a>
        </div>

        {{-- Recent Patients --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h2 class="font-black text-slate-900 text-lg">Derniers dossiers reçus</h2>
                    <p class="text-slate-500 text-sm">Patients récemment affectés à votre clinique</p>
                </div>
                <a href="{{ route('clinic.patients.index') }}" class="text-sm font-bold text-sky-600 hover:text-sky-800 transition-colors">
                    Voir tous →
                </a>
            </div>

            @if($recentRequests->count() > 0)
                <div class="divide-y divide-slate-50">
                    @foreach($recentRequests as $req)
                        <a href="{{ route('clinic.patients.show', $req->id) }}" class="flex items-center gap-4 p-5 hover:bg-slate-50 transition-colors group">
                            <div class="w-10 h-10 rounded-full bg-sky-100 flex items-center justify-center text-sky-700 font-black text-sm flex-shrink-0">
                                {{ strtoupper(substr($req->fullname, 0, 2)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="font-bold text-slate-900 group-hover:text-sky-700 transition-colors">{{ $req->fullname }}</div>
                                <div class="text-xs text-slate-500">{{ $req->service_type }} • {{ $req->country }}</div>
                            </div>
                            <div class="text-right">
                                @php
                                    $statusMap = [
                                        'pending_review' => ['label' => 'En attente', 'class' => 'badge-pending'],
                                        'accepted'       => ['label' => 'Accepté',    'class' => 'badge-accepted'],
                                        'quoted'         => ['label' => 'Devis envoyé','class' => 'badge-quoted'],
                                        'rejected'       => ['label' => 'Refusé',     'class' => 'badge-rejected'],
                                    ];
                                    $s = $statusMap[$req->clinic_status] ?? ['label' => '—', 'class' => ''];
                                @endphp
                                <span class="inline-block {{ $s['class'] }} text-[11px] font-bold px-2.5 py-1 rounded-full">{{ $s['label'] }}</span>
                                <div class="text-[11px] text-slate-400 mt-1">{{ $req->assigned_at ? $req->assigned_at->format('d/m/Y') : $req->created_at->format('d/m/Y') }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="p-12 text-center text-slate-400">
                    <div class="text-5xl mb-3">📋</div>
                    <p class="font-semibold">Aucun dossier affecté pour le moment.</p>
                    <p class="text-sm mt-1">CAEI Medical Center vous affectera des patients prochainement.</p>
                </div>
            @endif
        </div>

    </main>
</body>
</html>
