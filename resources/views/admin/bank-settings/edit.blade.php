<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-black uppercase leading-tight text-slate-900">
            Paramètres Bancaires CAEI
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-xl bg-white shadow-sm border border-slate-200">
                
                <div class="bg-[#061743] px-6 py-5">
                    <p class="text-xs font-black uppercase text-[#f2a90f]">Configuration</p>
                    <h3 class="mt-1 text-xl font-black text-white">Coordonnées affichées aux participants</h3>
                </div>

                @if(session('success'))
                    <div class="p-4 m-6 mb-0 rounded-lg border border-emerald-200 bg-emerald-50 text-sm font-semibold text-emerald-800">
                        ✅ {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.bank-settings.update') }}" class="p-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Nom de la banque</label>
                            <input type="text" name="bank_name" value="{{ old('bank_name', $setting->bank_name) }}" 
                                   class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                            @error('bank_name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Pays de la banque</label>
                            <input type="text" name="country" value="{{ old('country', $setting->country) }}" 
                                   class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                            @error('country')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Titulaire du compte (Bénéficiaire)</label>
                            <input type="text" name="account_holder" value="{{ old('account_holder', $setting->account_holder) }}" 
                                   class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                            @error('account_holder')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">IBAN</label>
                            <input type="text" name="iban" value="{{ old('iban', $setting->iban) }}" 
                                   class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-mono text-slate-800 focus:border-[#061743]">
                            @error('iban')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">RIB (Local)</label>
                            <input type="text" name="rib" value="{{ old('rib', $setting->rib) }}" 
                                   class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-mono text-slate-800 focus:border-[#061743]">
                            @error('rib')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Code SWIFT / BIC</label>
                            <input type="text" name="swift_code" value="{{ old('swift_code', $setting->swift_code) }}" 
                                   class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-mono uppercase text-slate-800 focus:border-[#061743]">
                            @error('swift_code')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Devise par défaut</label>
                            <select name="currency" class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                                <option value="TND" {{ old('currency', $setting->currency) == 'TND' ? 'selected' : '' }}>TND - Dinar Tunisien</option>
                                <option value="EUR" {{ old('currency', $setting->currency) == 'EUR' ? 'selected' : '' }}>EUR - Euro</option>
                                <option value="USD" {{ old('currency', $setting->currency) == 'USD' ? 'selected' : '' }}>USD - Dollar Américain</option>
                            </select>
                            @error('currency')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                        </div>

                    </div>

                    <div class="mt-8 border-t border-slate-100 pt-6 text-right">
                        <button type="submit" class="inline-flex rounded-xl bg-[#061743] px-6 py-3 text-sm font-black uppercase text-white transition hover:bg-[#0a2060]">
                            Enregistrer les paramètres
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
