@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241, 245, 249, 0.85) 0%, rgba(226, 232, 240, 0.88) 100%), url('{{ asset('assets/img/service_medical_1786525641121.jpg') }}') center/cover fixed no-repeat;">
    
    {{-- Sidebar Administrateur --}}
    <x-admin-sidebar />

    {{-- Main Back-Office Content --}}
    <div class="flex-1 p-6 md:p-10 overflow-y-auto">
        
        {{-- En-tête du module --}}
        <div class="mb-8 rounded-2xl p-8 text-white shadow-xl flex flex-col md:flex-row md:items-center justify-between gap-6 relative overflow-hidden" style="background: linear-gradient(135deg, rgba(6, 23, 67, 0.88) 0%, rgba(0, 15, 60, 0.92) 100%), url('{{ asset('assets/img/service_medical_1786525641121.jpg') }}') center/cover no-repeat;">
            <div class="absolute -right-6 -bottom-8 opacity-20 text-8xl pointer-events-none select-none">🩺</div>
            <div class="relative z-10">
                <span class="inline-flex items-center gap-1.5 bg-[#f2a90f] text-[#061743] text-xs font-black px-3 py-1 rounded-md uppercase tracking-wider mb-2">
                    <span>🩺</span> CAEI Medical Center
                </span>
                <h1 class="text-3xl font-black uppercase tracking-tight flex items-center gap-3">
                    <span>Gestion des Devis & Rendez-vous Médicaux</span> 🏥
                </h1>
                <p class="mt-2 text-slate-200 text-sm">Consultez, traitez et suivez les demandes d'accompagnement et d'évacuation sanitaire de vos patients internationaux.</p>
            </div>
            <div class="shrink-0 flex items-center gap-3 relative z-10">
                <a href="{{ route('medical.services') }}" target="_blank" class="inline-flex items-center gap-2 bg-teal-500 hover:bg-teal-400 text-[#061743] font-bold text-xs px-4 py-2.5 rounded-xl shadow transition-all">
                    <span>Voir le site Medical Center 🩺</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>
        </div>

        {{-- Alerte de succès --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-300 p-4 text-emerald-900 text-sm font-semibold flex items-center gap-3">
                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- Statistiques clés --}}
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
            <a href="{{ route('admin.medical-requests.index') }}" class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all text-center">
                <div class="text-xs uppercase font-bold text-slate-500">Total Demandes</div>
                <div class="text-2xl font-black text-slate-900 mt-1">{{ $stats['total'] }}</div>
            </a>
            <a href="{{ route('admin.medical-requests.index', ['status' => 'pending']) }}" class="bg-amber-50 p-5 rounded-2xl border border-amber-200 shadow-sm hover:shadow-md transition-all text-center">
                <div class="text-xs uppercase font-bold text-amber-700">En Attente</div>
                <div class="text-2xl font-black text-amber-700 mt-1">{{ $stats['pending'] }}</div>
            </a>
            <a href="{{ route('admin.medical-requests.index', ['status' => 'in_progress']) }}" class="bg-blue-50 p-5 rounded-2xl border border-blue-200 shadow-sm hover:shadow-md transition-all text-center">
                <div class="text-xs uppercase font-bold text-blue-700">En Cours</div>
                <div class="text-2xl font-black text-blue-700 mt-1">{{ $stats['in_progress'] }}</div>
            </a>
            <a href="{{ route('admin.medical-requests.index', ['status' => 'completed']) }}" class="bg-emerald-50 p-5 rounded-2xl border border-emerald-200 shadow-sm hover:shadow-md transition-all text-center">
                <div class="text-xs uppercase font-bold text-emerald-700">Traités</div>
                <div class="text-2xl font-black text-emerald-700 mt-1">{{ $stats['completed'] }}</div>
            </a>
            <a href="{{ route('admin.medical-requests.index', ['status' => 'cancelled']) }}" class="bg-rose-50 p-5 rounded-2xl border border-rose-200 shadow-sm hover:shadow-md transition-all text-center">
                <div class="text-xs uppercase font-bold text-rose-700">Annulés</div>
                <div class="text-2xl font-black text-rose-700 mt-1">{{ $stats['cancelled'] }}</div>
            </a>
        </div>

        {{-- Filtres & Recherche --}}
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm mb-8">
            <form method="GET" action="{{ route('admin.medical-requests.index') }}" class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Rechercher</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nom, email, pays, soin..." class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-[#061743] focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Statut</label>
                    <select name="status" class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-[#061743] focus:outline-none">
                        <option value="">Tous les statuts</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>En attente</option>
                        <option value="in_progress" {{ request('status') === 'in_progress' ? 'selected' : '' }}>En cours</option>
                        <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Traité</option>
                        <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Annulé</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Trier par Date & Heure</label>
                    <select name="sort" class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-[#061743] focus:outline-none">
                        <option value="desc" {{ request('sort', 'desc') === 'desc' ? 'selected' : '' }}>📅 Plus récents d'abord (Décroissant)</option>
                        <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>📅 Plus anciens d'abord (Croissant)</option>
                    </select>
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="w-full bg-[#061743] hover:bg-[#0a2569] text-white font-bold text-sm py-2.5 px-5 rounded-xl shadow transition-all">
                        Filtrer
                    </button>
                    <a href="{{ route('admin.medical-requests.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-sm py-2.5 px-4 rounded-xl transition-all">
                        Effacer
                    </a>
                </div>
            </form>
        </div>

        {{-- Tableau des demandes --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            @if($requests->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-700">
                        <thead class="bg-slate-50 text-xs font-black uppercase tracking-wider text-slate-600 border-b border-slate-200">
                            <tr>
                                <th class="p-4">
                                    <a href="{{ route('admin.medical-requests.index', array_merge(request()->query(), ['sort' => request('sort') === 'asc' ? 'desc' : 'asc'])) }}" class="inline-flex items-center gap-1.5 hover:text-teal-600 transition-colors" title="Cliquer pour basculer le tri par date et heure">
                                        <span>Réf / Date</span>
                                        @if(request('sort') === 'asc')
                                            <span class="text-teal-600 font-black">↑ (Anciens)</span>
                                        @else
                                            <span class="text-teal-600 font-black">↓ (Récents)</span>
                                        @endif
                                    </a>
                                </th>
                                <th class="p-4">Patient</th>
                                <th class="p-4">Coordonnées</th>
                                <th class="p-4">Prestation Médicale</th>
                                <th class="p-4">Partenaire</th>
                                <th class="p-4">Date Souhaitée</th>
                                <th class="p-4">Statut</th>
                                <th class="p-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($requests as $req)
                                <tr class="transition-colors {{ $req->status === 'completed' ? 'bg-emerald-100/60 hover:bg-emerald-200/60' : ($req->status === 'in_progress' ? 'bg-blue-100/60 hover:bg-blue-200/60' : 'hover:bg-slate-50/80') }}">
                                    <td class="p-4 font-mono font-bold text-[#061743]">
                                        #{{ ($requests->currentPage() - 1) * $requests->perPage() + $loop->iteration }}
                                        <span class="block text-[11px] font-normal text-slate-400 mt-0.5">
                                            {{ $req->created_at->format('d/m/Y H:i') }}
                                        </span>
                                    </td>
                                    <td class="p-4">
                                        <div class="font-bold text-slate-900">{{ $req->fullname }}</div>
                                        <div class="text-xs text-slate-500 font-medium">📍 {{ $req->country }}</div>
                                    </td>
                                    <td class="p-4">
                                        <div class="font-medium text-slate-800">{{ $req->email }}</div>
                                        <div class="text-xs text-teal-700 font-bold">📞 {{ $req->phone }}</div>
                                    </td>
                                    <td class="p-4">
                                        <span class="inline-block bg-teal-50 text-[#0d9488] font-bold text-xs px-2.5 py-1 rounded-lg border border-teal-100">
                                            {{ $req->service_type }}
                                        </span>
                                        @if($req->message)
                                            <p class="text-xs text-slate-500 mt-1 line-clamp-1 italic">"{{ $req->message }}"</p>
                                        @endif
                                    </td>
                                    <td class="p-4">
                                        @if($req->partner_clinic)
                                            <div>
                                                <span class="inline-flex items-center gap-1 bg-indigo-50 text-indigo-700 font-bold text-[11px] px-2.5 py-1 rounded-lg border border-indigo-100">
                                                    🏥 {{ $req->partner_clinic }}
                                                </span>
                                            </div>
                                            @if($req->clinic_status === 'pending_review')
                                                <span class="bg-amber-50 text-amber-700 border border-amber-200 text-[10px] font-bold px-2 py-0.5 rounded-full mt-1 inline-block">⏳ En attente validation</span>
                                            @elseif($req->clinic_status === 'accepted')
                                                <span class="bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-bold px-2 py-0.5 rounded-full mt-1 inline-block">✅ Accepté par la clinique</span>
                                            @elseif($req->clinic_status === 'quoted')
                                                <span class="bg-blue-50 text-blue-700 border border-blue-200 text-[10px] font-bold px-2 py-0.5 rounded-full mt-1 inline-block">💰 Devis : {{ number_format($req->devis_amount, 2) }} {{ $req->devis_currency }}</span>
                                            @elseif($req->clinic_status === 'rejected')
                                                <span class="bg-rose-50 text-rose-700 border border-rose-200 text-[10px] font-bold px-2 py-0.5 rounded-full mt-1 inline-block">❌ Refusé</span>
                                            @endif
                                            @if($req->assigned_at)
                                                <div class="text-[10px] text-slate-400 mt-0.5">Affecté le {{ $req->assigned_at->format('d/m/Y H:i') }}</div>
                                            @endif
                                        @else
                                            <span class="text-slate-300 italic text-xs">Non affecté</span>
                                        @endif
                                    </td>
                                    <td class="p-4 font-semibold text-slate-800">
                                        @if($req->preferred_date)
                                            📅 {{ $req->preferred_date->format('d/m/Y') }}
                                        @else
                                            <span class="text-slate-400 italic">Non spécifiée</span>
                                        @endif
                                    </td>
                                    <td class="p-4">
                                        @if($req->status === 'pending')
                                            <span class="bg-amber-100 text-amber-800 text-xs font-bold px-3 py-1 rounded-full">En attente</span>
                                        @elseif($req->status === 'in_progress')
                                            <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full">En cours</span>
                                        @elseif($req->status === 'completed')
                                            <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full">Traité</span>
                                        @else
                                            <span class="bg-rose-100 text-rose-800 text-xs font-bold px-3 py-1 rounded-full">Annulé</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-right">
                                        <button onclick="openModal('modal-{{ $req->id }}')" class="inline-flex items-center gap-1 text-xs font-bold text-[#061743] hover:text-[#f2a90f] bg-slate-100 hover:bg-slate-200 px-3 py-1.5 rounded-lg transition-all">
                                            <span>Gérer</span>
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                        </button>
                                    </td>
                                </tr>

                                {{-- Modal de Gestion de la Demande --}}
                                <div id="modal-{{ $req->id }}" class="hidden fixed inset-0 z-50 overflow-y-auto bg-black/60 backdrop-blur-xs flex items-center justify-center p-4">
                                    <div class="bg-white rounded-3xl max-w-2xl w-full p-8 shadow-2xl space-y-6 relative text-left">
                                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                                            <div>
                                                <span class="text-xs font-bold uppercase text-teal-600">Devis Médical #{{ ($requests->currentPage() - 1) * $requests->perPage() + $loop->iteration }}</span>
                                                <h3 class="text-xl font-black text-slate-900">{{ $req->fullname }}</h3>
                                            </div>
                                            <button onclick="closeModal('modal-{{ $req->id }}')" class="text-slate-400 hover:text-slate-700 text-xl font-bold p-2">✕</button>
                                        </div>

                                        <div class="grid grid-cols-2 gap-4 bg-slate-50 p-4 rounded-2xl text-xs space-y-1">
                                            <div><strong>Email :</strong> {{ $req->email }}</div>
                                            <div><strong>Téléphone :</strong> {{ $req->phone }}</div>
                                            <div><strong>Pays :</strong> {{ $req->country }}</div>
                                            <div><strong>Prestation :</strong> {{ $req->service_type }}</div>
                                            <div><strong>Date souhaitée :</strong> {{ $req->preferred_date ? $req->preferred_date->format('d/m/Y') : 'Non spécifiée' }}</div>
                                            <div><strong>Demande reçue :</strong> {{ $req->created_at->format('d/m/Y H:i') }}</div>
                                            @if($req->partner_clinic)
                                                <div class="col-span-2"><strong>🏥 Affecté à :</strong> <span class="text-indigo-700 font-bold">{{ $req->partner_clinic }}</span> <span class="text-slate-400">({{ $req->assigned_at?->format('d/m/Y H:i') }})</span></div>
                                            @endif
                                        </div>

                                        @if($req->message)
                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Message du patient :</label>
                                                <div class="p-4 bg-teal-50/60 rounded-2xl text-xs text-slate-800 border border-teal-100 whitespace-pre-wrap">
                                                    {{ $req->message }}
                                                </div>
                                            </div>
                                        @endif

                                        {{-- ════ Section : Retour de la Clinique Partenaire (Devis & Notes) ════ --}}
                                        @if($req->partner_clinic && ($req->clinic_status || $req->devis_amount || $req->clinic_notes))
                                            <div class="rounded-2xl border-2 {{ $req->clinic_status === 'quoted' ? 'border-blue-200 bg-blue-50/40' : ($req->clinic_status === 'accepted' ? 'border-emerald-200 bg-emerald-50/40' : ($req->clinic_status === 'rejected' ? 'border-rose-200 bg-rose-50/40' : 'border-amber-200 bg-amber-50/40')) }} p-5 space-y-3">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center gap-2">
                                                        <span class="text-lg">🏥</span>
                                                        <div>
                                                            <div class="text-xs font-black uppercase {{ $req->clinic_status === 'quoted' ? 'text-blue-900' : ($req->clinic_status === 'accepted' ? 'text-emerald-900' : 'text-slate-900') }}">
                                                                Retour de {{ $req->partner_clinic }}
                                                            </div>
                                                            <div class="text-[11px] text-slate-500">Statut et devis transmis par la clinique partenaire</div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        @if($req->clinic_status === 'pending_review')
                                                            <span class="bg-amber-100 text-amber-800 text-xs font-bold px-3 py-1 rounded-full">⏳ En attente de traitement</span>
                                                        @elseif($req->clinic_status === 'accepted')
                                                            <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full">✅ Dossier Accepté</span>
                                                        @elseif($req->clinic_status === 'quoted')
                                                            <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full">💰 Devis Transmis</span>
                                                        @elseif($req->clinic_status === 'rejected')
                                                            <span class="bg-rose-100 text-rose-800 text-xs font-bold px-3 py-1 rounded-full">❌ Dossier Refusé</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($req->devis_amount)
                                                    <div class="bg-white rounded-xl p-4 border border-blue-100">
                                                        <div class="flex items-baseline justify-between mb-1">
                                                            <span class="text-xs font-black uppercase text-blue-700">Montant proposé par la clinique</span>
                                                            <span class="text-[10px] text-slate-400">{{ $req->devis_sent_at?->format('d/m/Y H:i') }}</span>
                                                        </div>
                                                        <div class="text-2xl font-black text-blue-900">
                                                            {{ number_format($req->devis_amount, 2) }} {{ $req->devis_currency }}
                                                        </div>
                                                        @if($req->devis_message)
                                                            <div class="mt-2 text-xs text-slate-700 bg-blue-50/50 p-3 rounded-lg border border-blue-100 whitespace-pre-wrap">
                                                                <strong>Détails du devis :</strong><br>{{ $req->devis_message }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif

                                                @if($req->clinic_notes)
                                                    <div class="text-xs text-slate-700 bg-white p-3 rounded-xl border border-slate-200">
                                                        <strong>Notes transmises par la clinique :</strong><br>{{ $req->clinic_notes }}
                                                    </div>
                                                @endif
                                            </div>
                                        @endif

                                        {{-- ════ Section : Affecter au Partenaire Clinique ════ --}}
                                        <div class="rounded-2xl border-2 border-indigo-100 bg-indigo-50/40 p-5 space-y-3">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-2">
                                                    <span class="text-lg">🏥</span>
                                                    <div>
                                                        <div class="text-sm font-black text-indigo-900">Affecter au Partenaire Clinique</div>
                                                        <div class="text-[11px] text-indigo-600">Sélectionnez la clinique partenaire à qui référer ce patient</div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('admin.cliniques.create') }}" target="_blank" class="text-[11px] text-indigo-600 hover:text-indigo-900 font-bold underline">+ Ajouter une clinique</a>
                                            </div>
                                            <form action="{{ route('admin.medical-requests.assign-partner', $req) }}" method="POST" class="flex items-end gap-3">
                                                @csrf
                                                @method('PUT')
                                                <div class="flex-1">
                                                    <label class="block text-[11px] font-bold uppercase text-indigo-700 mb-1.5">Clinique partenaire</label>
                                                    @if($partnerClinics->count() > 0)
                                                        <select name="partner_clinic_id" class="w-full rounded-xl border-2 border-indigo-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-800 focus:border-indigo-500 focus:outline-none">
                                                            <option value="">— Aucune affectation —</option>
                                                            @foreach($partnerClinics as $clinic)
                                                                <option value="{{ $clinic->id }}" {{ $req->partner_clinic_id == $clinic->id ? 'selected' : '' }}>
                                                                    🏥 {{ $clinic->name }}@if($clinic->city) — {{ $clinic->city }}@endif
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        <div class="text-xs text-slate-500 italic p-3 bg-white rounded-xl border border-indigo-100">
                                                            Aucune clinique partenaire enregistrée.
                                                            <a href="{{ route('admin.cliniques.create') }}" target="_blank" class="text-indigo-600 font-bold hover:underline">Créer la première →</a>
                                                        </div>
                                                    @endif
                                                </div>
                                                @if($partnerClinics->count() > 0)
                                                    <button type="submit" class="shrink-0 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-sm px-5 py-2.5 rounded-xl shadow transition-all flex items-center gap-2">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                                        Affecter
                                                    </button>
                                                @endif
                                            </form>
                                        </div>

                                        {{-- ════ Section : Statut & Notes ════ --}}
                                        <form action="{{ route('admin.medical-requests.update-status', $req) }}" method="POST" class="space-y-4">
                                            @csrf
                                            @method('PUT')

                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-700 mb-2">Changer le statut :</label>
                                                <select name="status" class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-[#061743] focus:outline-none">
                                                    <option value="pending" {{ $req->status === 'pending' ? 'selected' : '' }}>En attente</option>
                                                    <option value="in_progress" {{ $req->status === 'in_progress' ? 'selected' : '' }}>En cours de traitement</option>
                                                    <option value="completed" {{ $req->status === 'completed' ? 'selected' : '' }}>Traité / Devis Envoyé</option>
                                                    <option value="cancelled" {{ $req->status === 'cancelled' ? 'selected' : '' }}>Annulé</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-700 mb-2">Notes internes Administrateur :</label>
                                                <textarea name="admin_notes" rows="3" placeholder="Ajoutez vos notes ou suivi interne..." class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-[#061743] focus:outline-none">{{ $req->admin_notes }}</textarea>
                                            </div>

                                            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                                                <button type="submit" class="bg-[#061743] hover:bg-[#0a2569] text-white font-bold text-sm px-6 py-3 rounded-xl shadow transition-all">
                                                    Enregistrer les modifications
                                                </button>
                                        </form>

                                                <form action="{{ route('admin.medical-requests.destroy', $req) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-rose-600 hover:text-rose-800 text-xs font-bold underline">
                                                        Supprimer la demande
                                                    </button>
                                                </form>
                                            </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border-t border-slate-200">
                    {{ $requests->links() }}
                </div>
            @else
                <div class="p-12 text-center text-slate-500">
                    <p class="text-base font-semibold">Aucune demande de devis médical trouvée.</p>
                </div>
            @endif
        </div>

    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>
@endsection
