@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241,245,249,0.85) 0%, rgba(226,232,240,0.88) 100%);">

    <x-admin-sidebar />

    <div class="flex-1 p-6 md:p-10 overflow-y-auto max-w-3xl">

        <div class="mb-6 flex items-center gap-2 text-xs font-bold text-slate-500">
            <a href="{{ route('admin.medical-requests.index') }}" class="hover:text-teal-600">🩺 Medical Center</a>
            <span>/</span>
            <a href="{{ route('admin.cliniques.index') }}" class="hover:text-indigo-600">🏥 Cliniques Partenaires</a>
            <span>/</span>
            <span class="text-slate-800">Ajouter une clinique</span>
        </div>

        {{-- Affichage des credentials (une seule fois) --}}
        @if(session('clinic_credentials'))
            @php $creds = session('clinic_credentials'); @endphp
            <div class="mb-6 rounded-2xl border-2 border-emerald-300 bg-emerald-50 p-6 shadow-lg">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500 flex items-center justify-center text-white text-xl">🔑</div>
                    <div>
                        <div class="font-black text-emerald-900 text-lg">Identifiants générés avec succès !</div>
                        <div class="text-emerald-700 text-sm">Copiez et communiquez ces informations à la clinique. <strong>Le mot de passe ne sera plus visible après cette page.</strong></div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-5 space-y-3 border border-emerald-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-xs font-black uppercase text-slate-500">Clinique</div>
                            <div class="font-bold text-slate-900">{{ $creds['name'] }}</div>
                        </div>
                    </div>
                    <hr class="border-slate-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-xs font-black uppercase text-slate-500">URL de connexion</div>
                            <div class="font-mono text-sky-700 font-bold">{{ $creds['url'] }}</div>
                        </div>
                        <button onclick="copyText('{{ $creds['url'] }}')" class="text-xs font-bold text-sky-600 hover:text-sky-800 bg-sky-50 hover:bg-sky-100 px-3 py-1.5 rounded-lg transition-all">📋 Copier</button>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-xs font-black uppercase text-slate-500">Email / Identifiant</div>
                            <div class="font-mono text-slate-900 font-bold">{{ $creds['email'] }}</div>
                        </div>
                        <button onclick="copyText('{{ $creds['email'] }}')" class="text-xs font-bold text-sky-600 hover:text-sky-800 bg-sky-50 hover:bg-sky-100 px-3 py-1.5 rounded-lg transition-all">📋 Copier</button>
                    </div>
                    <div class="flex items-center justify-between bg-yellow-50 rounded-xl p-3 border border-yellow-200">
                        <div>
                            <div class="text-xs font-black uppercase text-yellow-700">⚠️ Mot de passe (visible une seule fois)</div>
                            <div class="font-mono text-slate-900 font-black text-lg tracking-wider">{{ $creds['password'] }}</div>
                        </div>
                        <button onclick="copyText('{{ $creds['password'] }}')" class="text-xs font-bold text-yellow-700 hover:text-yellow-900 bg-yellow-100 hover:bg-yellow-200 px-3 py-1.5 rounded-lg transition-all">📋 Copier</button>
                    </div>
                </div>
                <div class="mt-3 text-xs text-emerald-700 font-semibold">
                    💡 Copiez ces informations maintenant. Vous pourrez toujours regénérer un nouveau mot de passe depuis la fiche clinique.
                </div>
            </div>
        @endif

        {{-- Formulaire --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="bg-gradient-to-r from-[#061743] to-[#0c3a6e] p-6">
                <h1 class="text-white font-black text-xl flex items-center gap-3">
                    🏥 Ajouter une Clinique Partenaire
                </h1>
                <p class="text-sky-200 text-sm mt-1">Un compte de connexion sera automatiquement créé pour cette clinique.</p>
            </div>

            @if(session('success'))
                <div class="mx-6 mt-4 rounded-xl bg-emerald-50 border border-emerald-200 p-4 text-emerald-800 font-semibold text-sm flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mx-6 mt-4 rounded-xl bg-rose-50 border border-rose-200 p-4 text-rose-800 font-semibold text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.cliniques.store') }}" method="POST" class="p-8 space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div class="md:col-span-2">
                        <label class="block text-xs font-black uppercase text-slate-600 mb-2">Nom de la Clinique *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="Ex: Clinique Beau Séjour" class="w-full rounded-xl border-2 border-slate-200 px-4 py-3 text-sm focus:border-[#061743] focus:outline-none font-semibold">
                    </div>

                    <div>
                        <label class="block text-xs font-black uppercase text-slate-600 mb-2">Email de connexion *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="clinique@exemple.com" class="w-full rounded-xl border-2 border-slate-200 px-4 py-3 text-sm focus:border-[#061743] focus:outline-none">
                        <p class="text-xs text-slate-400 mt-1">Cet email servira d'identifiant de connexion</p>
                    </div>

                    <div>
                        <label class="block text-xs font-black uppercase text-slate-600 mb-2">Téléphone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="+216 XX XXX XXX" class="w-full rounded-xl border-2 border-slate-200 px-4 py-3 text-sm focus:border-[#061743] focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-black uppercase text-slate-600 mb-2">Ville</label>
                        <input type="text" name="city" value="{{ old('city') }}" placeholder="Tunis, Sfax, Sousse..." class="w-full rounded-xl border-2 border-slate-200 px-4 py-3 text-sm focus:border-[#061743] focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-black uppercase text-slate-600 mb-2">Spécialité principale</label>
                        <input type="text" name="specialty" value="{{ old('specialty') }}" placeholder="Ex: Chirurgie esthétique, Cardiologie..." class="w-full rounded-xl border-2 border-slate-200 px-4 py-3 text-sm focus:border-[#061743] focus:outline-none">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-black uppercase text-slate-600 mb-2">Adresse</label>
                        <input type="text" name="address" value="{{ old('address') }}" placeholder="Adresse complète de la clinique" class="w-full rounded-xl border-2 border-slate-200 px-4 py-3 text-sm focus:border-[#061743] focus:outline-none">
                    </div>

                    <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-black uppercase text-slate-600 mb-2">Mot de passe *</label>
                            <div class="relative">
                                <input type="password" name="password" id="pwd-field" required minlength="8" placeholder="Minimum 8 caractères" class="w-full rounded-xl border-2 border-slate-200 px-4 py-3 text-sm focus:border-[#061743] focus:outline-none pr-11">
                                <button type="button" onclick="togglePwd('pwd-field', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-700 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-black uppercase text-slate-600 mb-2">Confirmer le mot de passe *</label>
                            <div class="relative">
                                <input type="password" name="password_confirmation" id="pwd-confirm-field" required minlength="8" placeholder="Répétez le mot de passe" class="w-full rounded-xl border-2 border-slate-200 px-4 py-3 text-sm focus:border-[#061743] focus:outline-none pr-11">
                                <button type="button" onclick="togglePwd('pwd-confirm-field', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-700 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>{{-- fin grid --}}

                <div class="flex items-center gap-3 pt-2">
                    <button type="submit" class="bg-[#061743] hover:bg-[#0a2569] text-white font-black text-sm px-8 py-3 rounded-xl shadow transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Créer la clinique
                    </button>
                    <a href="{{ route('admin.cliniques.index') }}" class="text-slate-500 hover:text-slate-800 text-sm font-semibold transition-colors">Annuler</a>
                </div>
            </form>
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
