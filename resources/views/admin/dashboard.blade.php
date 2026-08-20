@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241, 245, 249, 0.85) 0%, rgba(226, 232, 240, 0.88) 100%), url('{{ asset('assets/img/company.jpg') }}') center/cover fixed no-repeat;">
    
    {{-- Sidebar avec liens Séminaires et Medical Center --}}
    <x-admin-sidebar />

    {{-- Contenu principal --}}
    <div class="flex-1 p-6 md:p-8 overflow-y-auto">
        <div class="mb-8 rounded-2xl p-8 text-white shadow-xl relative overflow-hidden" style="background: linear-gradient(135deg, rgba(6, 23, 67, 0.88) 0%, rgba(0, 15, 60, 0.92) 100%), url('{{ asset('assets/img/company.jpg') }}') center/cover no-repeat;">
            <div class="absolute -right-6 -bottom-8 opacity-20 text-8xl pointer-events-none select-none">📊</div>
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <p class="text-sm font-black uppercase flex items-center gap-2" style="color: #ffbd45;">
                        <span>📊</span> Back-office CAEI Administrateur
                    </p>
                    <h1 class="mt-2 text-3xl font-black uppercase flex items-center gap-3">
                        <span>Tableau de bord de gestion</span> ⚡
                    </h1>
                    <p class="mt-3 text-white/75">Bienvenue {{ Auth::user()->first_name }}. Gère l'ensemble des séminaires, participants, contenus et statistiques.</p>
                </div>
                <div>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#f2a90f] hover:bg-[#d9950b] text-xs font-black uppercase tracking-wider rounded-xl shadow-lg transition" style="color: #061743;">
                        📊 Console BI Executive ➔
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <div class="caei-card p-6 transition hover:shadow-lg">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-black text-[#061743]">Séminaires B2B</h3>
                    <span class="text-3xl text-[#ffbd45]">01</span>
                </div>
                <p class="mb-4 text-sm text-slate-600">Créer, modifier et gérer la programmation des séminaires.</p>
                <div class="space-y-2 text-sm font-bold">
                    <a href="{{ route('admin.seminars.index') }}" class="block text-[#061743] hover:text-[#f2a90f]">Voir tous les séminaires</a>
                    <a href="{{ route('admin.seminars.create') }}" class="block text-[#061743] hover:text-[#f2a90f]">Créer un nouveau séminaire</a>
                </div>
            </div>

            <div class="caei-card p-6 transition hover:shadow-lg">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-black text-[#061743]">Participants</h3>
                    <span class="text-3xl text-[#ffbd45]">02</span>
                </div>
                <p class="mb-4 text-sm text-slate-600">Consulter la liste des inscrits et générer les exports PDF/Excel.</p>
                <div class="space-y-2 text-sm font-bold">
                    <a href="{{ route('admin.participants.index') }}" class="block text-[#061743] hover:text-[#f2a90f]">Voir les participants</a>
                    <a href="{{ route('admin.participants.export.excel') }}" class="block text-[#061743] hover:text-[#f2a90f]">Exporter en Excel</a>
                    <a href="{{ route('admin.participants.export.pdf') }}" class="block text-[#061743] hover:text-[#f2a90f]">Exporter en PDF</a>
                </div>
            </div>

            <div class="caei-card p-6 transition hover:shadow-lg">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-black text-[#061743]">Statistiques BI</h3>
                    <span class="text-3xl text-[#ffbd45]">03</span>
                </div>
                <p class="mb-4 text-sm text-slate-600">Consulter la console BI et les métriques de performance.</p>
                <a href="{{ route('dashboard') }}" class="block text-sm font-bold text-[#061743] hover:text-[#f2a90f]">Console BI Administrateur ➔</a>
            </div>

            <div class="caei-card p-6 transition hover:shadow-lg">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-black text-[#061743]">Call Center Outsourcing</h3>
                    <span class="text-3xl text-[#ffbd45]">04</span>
                </div>
                <p class="mb-4 text-sm text-slate-600">Gérer les rendez-vous, qualifications et affectations aux partenaires.</p>
                <a href="{{ route('admin.callcenter.index') }}" class="block text-sm font-bold text-[#061743] hover:text-[#f2a90f]">Espace Call Center Admin</a>
            </div>

            <div class="caei-card p-6 transition hover:shadow-lg">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-black text-[#061743]">Formateurs</h3>
                    <span class="text-3xl text-[#ffbd45]">05</span>
                </div>
                <p class="mb-4 text-sm text-slate-600">Gérer les comptes formateurs et leur affectation aux séminaires.</p>
                <div class="space-y-2 text-sm font-bold">
                    <a href="{{ route('admin.formateurs.index') }}" class="block text-[#061743] hover:text-[#f2a90f]">Voir tous les formateurs</a>
                    <a href="{{ route('admin.formateurs.create') }}" class="block text-[#061743] hover:text-[#f2a90f]">Ajouter un formateur</a>
                </div>
            </div>

            <div class="caei-card p-6 transition hover:shadow-lg">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-black text-[#061743]">CAEI Medical Center</h3>
                    <span class="text-3xl text-[#ffbd45]">06</span>
                </div>
                <p class="mb-4 text-sm text-slate-600">Accéder aux demandes de devis médicaux et cliniques partenaires.</p>
                <div class="space-y-2 text-sm font-bold">
                    <a href="{{ route('admin.medical-requests.index') }}" class="block text-[#061743] hover:text-[#f2a90f]">Demandes de Devis Médicaux</a>
                    <a href="{{ route('admin.cliniques.index') }}" class="block text-[#061743] hover:text-[#f2a90f]">Cliniques Partenaires</a>
                </div>
            </div>

            <div class="caei-card p-6 transition hover:shadow-lg">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-black text-[#061743]">Paiements & Finances</h3>
                    <span class="text-3xl text-[#ffbd45]">07</span>
                </div>
                <p class="mb-4 text-sm text-slate-600">Valider les virements, Visa et arrangements. Configurer le RIB/IBAN CAEI.</p>
                <div class="space-y-2 text-sm font-bold">
                    <a href="{{ route('admin.arrangements.index') }}" class="block text-[#061743] hover:text-[#f2a90f]">Gérer les paiements</a>
                    <a href="{{ route('admin.bank-settings.edit') }}" class="block text-[#061743] hover:text-[#f2a90f]">Coordonnées bancaires CAEI</a>
                </div>
            </div>
        </div>

        <div class="mt-12 grid grid-cols-1 gap-4 md:grid-cols-5">
            <div class="rounded-lg bg-[#061743] p-6 text-white">
                <p class="text-sm text-white/65">Participants</p>
                <p class="mt-2 text-3xl font-black text-[#ffbd45]">{{ \App\Models\User::where('role', 'participant')->count() }}</p>
            </div>
            <div class="rounded-lg bg-[#061743] p-6 text-white">
                <p class="text-sm text-white/65">Inscriptions</p>
                <p class="mt-2 text-3xl font-black text-[#ffbd45]">{{ \App\Models\Registration::count() }}</p>
            </div>
            <div class="rounded-lg bg-[#061743] p-6 text-white">
                <p class="text-sm text-white/65">Séminaires</p>
                <p class="mt-2 text-3xl font-black text-[#ffbd45]">{{ \App\Models\Seminar::count() }}</p>
            </div>
            <div class="rounded-lg bg-[#061743] p-6 text-white">
                <p class="text-sm text-white/65">Taux présence</p>
                <p class="mt-2 text-3xl font-black text-[#ffbd45]">{{ \App\Models\Registration::count() > 0 ? round(\App\Models\Registration::where('status', 'present')->count() / \App\Models\Registration::count() * 100, 1) : 0 }}%</p>
            </div>
            <div class="rounded-lg bg-[#061743] p-6 text-white">
                <p class="text-sm text-white/65">Formateurs</p>
                <p class="mt-2 text-3xl font-black text-[#ffbd45]">{{ \App\Models\User::where('role', 'formateur')->count() }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
