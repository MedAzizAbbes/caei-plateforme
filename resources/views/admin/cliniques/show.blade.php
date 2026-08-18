@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241,245,249,0.85) 0%, rgba(226,232,240,0.88) 100%);">

    <x-admin-sidebar />

    <div class="flex-1 p-6 md:p-10 overflow-y-auto">

        <div class="mb-6 flex items-center gap-2 text-xs font-bold text-slate-500">
            <a href="{{ route('admin.medical-requests.index') }}" class="hover:text-teal-600">🩺 Medical Center</a>
            <span>/</span>
            <a href="{{ route('admin.cliniques.index') }}" class="hover:text-indigo-600">🏥 Cliniques Partenaires</a>
            <span>/</span>
            <span class="text-slate-800">{{ $clinique->name }}</span>
        </div>

        {{-- Affichage des credentials --}}
        @if(session('clinic_credentials'))
            @php $creds = session('clinic_credentials'); @endphp
            <div class="mb-6 rounded-2xl border-2 border-emerald-300 bg-emerald-50 p-6 shadow-lg">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500 flex items-center justify-center text-white text-xl">🔑</div>
                    <div>
                        <div class="font-black text-emerald-900 text-lg">Nouveau mot de passe généré !</div>
                        <div class="text-emerald-700 text-sm">Communiquez ces nouveaux identifiants à la clinique. <strong>Le mot de passe ne sera plus visible après cette page.</strong></div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-5 space-y-3 border border-emerald-200">
                    <div class="flex items-center justify-between bg-yellow-50 rounded-xl p-3 border border-yellow-200">
                        <div>
                            <div class="text-xs font-black uppercase text-yellow-700">⚠️ Nouveau Mot de passe</div>
                            <div class="font-mono text-slate-900 font-black text-lg tracking-wider">{{ $creds['password'] }}</div>
                        </div>
                        <button onclick="copyText('{{ $creds['password'] }}')" class="text-xs font-bold text-yellow-700 hover:text-yellow-900 bg-yellow-100 hover:bg-yellow-200 px-3 py-1.5 rounded-lg transition-all">📋 Copier</button>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-xs font-black uppercase text-slate-500">Email</div>
                            <div class="font-mono text-slate-900 font-bold">{{ $creds['email'] }}</div>
                        </div>
                        <button onclick="copyText('{{ $creds['email'] }}')" class="text-xs font-bold text-sky-600 bg-sky-50 hover:bg-sky-100 px-3 py-1.5 rounded-lg transition-all">📋 Copier</button>
                    </div>
                </div>
            </div>
        @endif

        @if(session('success'))
            <div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-300 p-4 text-emerald-900 text-sm font-semibold flex items-center gap-3">
                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Info clinique --}}
            <div class="lg:col-span-2 space-y-5">

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-gradient-to-r from-[#061743] to-[#0c3a6e] p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center text-2xl">🏥</div>
                            <div>
                                <h1 class="text-white font-black text-xl">{{ $clinique->name }}</h1>
                                @if($clinique->city)<div class="text-sky-200 text-sm">📍 {{ $clinique->city }}</div>@endif
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <div class="text-xs font-black uppercase text-slate-500 mb-1">Email de connexion</div>
                                <div class="font-semibold text-slate-800">{{ $clinique->user->email }}</div>
                            </div>
                            @if($clinique->phone)
                            <div>
                                <div class="text-xs font-black uppercase text-slate-500 mb-1">Téléphone</div>
                                <div class="font-semibold text-slate-800">{{ $clinique->phone }}</div>
                            </div>
                            @endif
                            @if($clinique->specialty)
                            <div>
                                <div class="text-xs font-black uppercase text-slate-500 mb-1">Spécialité</div>
                                <div class="font-semibold text-teal-700">{{ $clinique->specialty }}</div>
                            </div>
                            @endif
                            <div>
                                <div class="text-xs font-black uppercase text-slate-500 mb-1">Statut</div>
                                @if($clinique->is_active)
                                    <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-2.5 py-1 rounded-full">● Active</span>
                                @else
                                    <span class="bg-slate-100 text-slate-500 text-xs font-bold px-2.5 py-1 rounded-full">● Désactivée</span>
                                @endif
                            </div>
                            <div>
                                <div class="text-xs font-black uppercase text-slate-500 mb-1">Dernière connexion</div>
                                <div class="font-semibold text-slate-600 text-xs">{{ $clinique->last_login_at ? $clinique->last_login_at->format('d/m/Y à H:i') : 'Jamais' }}</div>
                            </div>
                            <div>
                                <div class="text-xs font-black uppercase text-slate-500 mb-1">URL Espace Clinique</div>
                                <a href="{{ route('clinic.login') }}" target="_blank" class="text-sky-600 hover:text-sky-800 font-mono text-xs">{{ route('clinic.login') }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Derniers dossiers patients --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-slate-100">
                        <h2 class="font-black text-slate-800">Derniers dossiers patients</h2>
                    </div>
                    @if($clinique->medicalRequests->count() > 0)
                        <div class="divide-y divide-slate-50">
                            @foreach($clinique->medicalRequests as $req)
                                @php
                                    $statusMap = [
                                        'pending_review' => ['label' => '⏳ En attente', 'class' => 'bg-amber-100 text-amber-800'],
                                        'accepted'       => ['label' => '✅ Accepté',    'class' => 'bg-emerald-100 text-emerald-800'],
                                        'quoted'         => ['label' => '💰 Devis envoyé','class' => 'bg-blue-100 text-blue-800'],
                                        'rejected'       => ['label' => '❌ Refusé',     'class' => 'bg-rose-100 text-rose-800'],
                                    ];
                                    $s = $statusMap[$req->clinic_status] ?? ['label' => '—', 'class' => 'bg-slate-100 text-slate-600'];
                                @endphp
                                <div class="flex items-center gap-4 p-4">
                                    <div class="w-9 h-9 rounded-full bg-sky-100 flex items-center justify-center text-sky-700 font-black text-xs flex-shrink-0">
                                        {{ strtoupper(substr($req->fullname, 0, 2)) }}
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-bold text-slate-900 text-sm">{{ $req->fullname }}</div>
                                        <div class="text-xs text-slate-500">{{ $req->service_type }}</div>
                                    </div>
                                    <span class="text-[11px] font-bold px-2.5 py-1 rounded-full {{ $s['class'] }}">{{ $s['label'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="p-8 text-center text-slate-400 text-sm">Aucun dossier affecté pour le moment.</div>
                    @endif
                </div>
            </div>

            {{-- Stats + Actions --}}
            <div class="space-y-5">

                {{-- Stats --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
                    <h2 class="font-black text-slate-800 mb-4">Statistiques</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-slate-600">Total dossiers</span>
                            <span class="font-black text-slate-900 text-lg">{{ $stats['total'] }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-amber-700">⏳ En attente</span>
                            <span class="font-bold text-amber-700">{{ $stats['pending_review'] }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-emerald-700">✅ Acceptés</span>
                            <span class="font-bold text-emerald-700">{{ $stats['accepted'] }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-blue-700">💰 Devis envoyés</span>
                            <span class="font-bold text-blue-700">{{ $stats['quoted'] }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-rose-700">❌ Refusés</span>
                            <span class="font-bold text-rose-700">{{ $stats['rejected'] }}</span>
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 space-y-3">
                    <h2 class="font-black text-slate-800 mb-4">Actions</h2>

                    {{-- Formulaire Modifier le mot de passe --}}
                    <div class="rounded-xl border border-indigo-100 bg-indigo-50/50 p-4 space-y-3">
                        <div class="text-xs font-black uppercase text-indigo-900 flex items-center gap-1.5">
                            <span>🔑</span> Modifier le mot de passe
                        </div>
                        <form action="{{ route('admin.cliniques.reset-password', $clinique) }}" method="POST" class="space-y-3">
                            @csrf
                            <div class="relative">
                                <input type="password" name="password" id="new-clinic-pwd" required minlength="8" placeholder="Nouveau mot de passe" class="w-full rounded-xl border border-indigo-200 bg-white px-3 py-2 text-xs font-semibold focus:border-indigo-500 focus:outline-none pr-9">
                                <button type="button" onclick="togglePwd('new-clinic-pwd', this)" class="absolute right-2.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                            </div>
                            <button type="submit" class="w-full flex items-center gap-2 justify-center bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs py-2 px-3 rounded-lg shadow-xs transition-all">
                                Mettre à jour le mot de passe
                            </button>
                        </form>
                    </div>

                    <form action="{{ route('admin.cliniques.toggle-active', $clinique) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-2 justify-center {{ $clinique->is_active ? 'bg-amber-100 hover:bg-amber-200 text-amber-800' : 'bg-emerald-100 hover:bg-emerald-200 text-emerald-800' }} font-bold text-sm py-2.5 px-4 rounded-xl transition-all">
                            {{ $clinique->is_active ? '⏸ Désactiver la clinique' : '▶ Activer la clinique' }}
                        </button>
                    </form>

                    <div class="pt-2 border-t border-slate-100">
                        <form action="{{ route('admin.cliniques.destroy', $clinique) }}" method="POST" onsubmit="return confirm('Supprimer définitivement cette clinique et son compte ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full text-rose-600 hover:text-rose-800 text-xs font-bold underline text-center">
                                Supprimer cette clinique
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection

<script>
function copyText(text) {
    navigator.clipboard.writeText(text).then(() => {
        alert('✅ Copié dans le presse-papiers !');
    });
}
function togglePwd(fieldId, btn) {
    const input = document.getElementById(fieldId);
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>
