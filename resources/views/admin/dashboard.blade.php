@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-8 rounded-lg bg-[#061743] p-8 text-white">
            <p class="text-sm font-black uppercase text-[#ffbd45]">Back-office CAEI</p>
            <h1 class="mt-2 text-3xl font-black uppercase">Tableau de bord administrateur</h1>
            <p class="mt-3 text-white/75">Bienvenue {{ Auth::user()->first_name }}. Gere les seminaires, participants, contenus et statistiques.</p>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <div class="caei-card p-6 transition hover:shadow-lg">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-black text-[#061743]">Seminaires</h3>
                    <span class="text-3xl text-[#ffbd45]">01</span>
                </div>
                <p class="mb-4 text-sm text-slate-600">Creer, modifier et gerer les seminaires.</p>
                <div class="space-y-2 text-sm font-bold">
                    <a href="{{ route('admin.seminars.index') }}" class="block text-[#061743] hover:text-[#f2a90f]">Voir tous les seminaires</a>
                    <a href="{{ route('admin.seminars.create') }}" class="block text-[#061743] hover:text-[#f2a90f]">Creer un nouveau seminaire</a>
                </div>
            </div>

            <div class="caei-card p-6 transition hover:shadow-lg">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-black text-[#061743]">Participants</h3>
                    <span class="text-3xl text-[#ffbd45]">02</span>
                </div>
                <p class="mb-4 text-sm text-slate-600">Consulter la liste des participants et exporter.</p>
                <div class="space-y-2 text-sm font-bold">
                    <a href="{{ route('admin.participants.index') }}" class="block text-[#061743] hover:text-[#f2a90f]">Voir les participants</a>
                    <a href="{{ route('admin.participants.export.excel') }}" class="block text-[#061743] hover:text-[#f2a90f]">Exporter en Excel</a>
                    <a href="{{ route('admin.participants.export.pdf') }}" class="block text-[#061743] hover:text-[#f2a90f]">Exporter en PDF</a>
                </div>
            </div>

            <div class="caei-card p-6 transition hover:shadow-lg">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-black text-[#061743]">Statistiques</h3>
                    <span class="text-3xl text-[#ffbd45]">03</span>
                </div>
                <p class="mb-4 text-sm text-slate-600">Consulter les statistiques et metriques.</p>
                <a href="{{ route('admin.statistics.index') }}" class="block text-sm font-bold text-[#061743] hover:text-[#f2a90f]">Voir les statistiques</a>
            </div>

            <div class="caei-card p-6 transition hover:shadow-lg">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-black text-[#061743]">Accueil</h3>
                    <span class="text-3xl text-[#ffbd45]">04</span>
                </div>
                <p class="mb-4 text-sm text-slate-600">Revenir au tableau de bord utilisateur.</p>
                <a href="{{ route('dashboard') }}" class="block text-sm font-bold text-[#061743] hover:text-[#f2a90f]">Tableau de bord utilisateur</a>
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
                    <h3 class="text-lg font-black text-[#061743]">Discussions</h3>
                    <span class="text-3xl text-[#ffbd45]">06</span>
                </div>
                <p class="mb-4 text-sm text-slate-600">Accéder aux chats et aux discussions avec les participants.</p>
                <div class="space-y-2 text-sm font-bold">
                    <a href="{{ route('admin.seminars.index') }}" class="block text-[#061743] hover:text-[#f2a90f]">Voir les discussions</a>
                </div>
            </div>

            <div class="caei-card p-6 transition hover:shadow-lg">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-black text-[#061743]">Paiements</h3>
                    <span class="text-3xl text-[#ffbd45]">07</span>
                </div>
                <p class="mb-4 text-sm text-slate-600">Gérer les demandes d'arrangement et valider les paiements.</p>
                <div class="space-y-2 text-sm font-bold">
                    <a href="{{ route('admin.arrangements.index') }}" class="block text-[#061743] hover:text-[#f2a90f]">Voir les arrangements</a>
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
                <p class="text-sm text-white/65">Seminaires</p>
                <p class="mt-2 text-3xl font-black text-[#ffbd45]">{{ \App\Models\Seminar::count() }}</p>
            </div>
            <div class="rounded-lg bg-[#061743] p-6 text-white">
                <p class="text-sm text-white/65">Taux presence</p>
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
