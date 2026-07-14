<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Section Title -->
        <div class="mb-6 text-center">
            <h2 class="text-xl font-black text-[#061743] uppercase tracking-wide">Créer un compte</h2>
            <p class="mt-1 text-sm text-slate-500">Rejoignez la plateforme CAEI</p>
        </div>

        <!-- ─── Identité ─── -->
        <div class="mb-5">
            <p class="mb-3 text-xs font-black uppercase tracking-widest text-[#f2a90f]">Identité</p>
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                <div>
                    <x-input-label for="first_name" :value="__('Prénom')" class="!text-xs !font-bold !text-slate-600" />
                    <x-text-input id="first_name" class="block mt-1 w-full !rounded-lg !border-slate-200 !bg-slate-50 !text-sm focus:!border-[#061743] focus:!bg-white focus:!ring-[#061743]" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="given-name" placeholder="Ex: Jean" />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="last_name" :value="__('Nom')" class="!text-xs !font-bold !text-slate-600" />
                    <x-text-input id="last_name" class="block mt-1 w-full !rounded-lg !border-slate-200 !bg-slate-50 !text-sm focus:!border-[#061743] focus:!bg-white focus:!ring-[#061743]" type="text" name="last_name" :value="old('last_name')" required autocomplete="family-name" placeholder="Ex: Dupont" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-1" />
                </div>
            </div>
        </div>

        <!-- ─── Contact ─── -->
        <div class="mb-5">
            <p class="mb-3 text-xs font-black uppercase tracking-widest text-[#f2a90f]">Contact</p>
            <div class="space-y-3">
                <div>
                    <x-input-label for="email" :value="__('Adresse Email')" class="!text-xs !font-bold !text-slate-600" />
                    <x-text-input id="email" class="block mt-1 w-full !rounded-lg !border-slate-200 !bg-slate-50 !text-sm focus:!border-[#061743] focus:!bg-white focus:!ring-[#061743]" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="jean.dupont@email.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="phone" :value="__('Téléphone')" class="!text-xs !font-bold !text-slate-600" />
                    <x-text-input id="phone" class="block mt-1 w-full !rounded-lg !border-slate-200 !bg-slate-50 !text-sm focus:!border-[#061743] focus:!bg-white focus:!ring-[#061743]" type="text" name="phone" :value="old('phone')" autocomplete="tel" placeholder="+216 XX XXX XXX" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-1" />
                </div>
            </div>
        </div>

        <!-- ─── Profil professionnel ─── -->
        <div class="mb-5">
            <p class="mb-3 text-xs font-black uppercase tracking-widest text-[#f2a90f]">Profil professionnel</p>
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                <div>
                    <x-input-label for="pays" :value="__('Pays')" class="!text-xs !font-bold !text-slate-600" />
                    <x-text-input id="pays" class="block mt-1 w-full !rounded-lg !border-slate-200 !bg-slate-50 !text-sm focus:!border-[#061743] focus:!bg-white focus:!ring-[#061743]" type="text" name="pays" :value="old('pays')" placeholder="Tunisie" />
                    <x-input-error :messages="$errors->get('pays')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="poste" :value="__('Poste')" class="!text-xs !font-bold !text-slate-600" />
                    <x-text-input id="poste" class="block mt-1 w-full !rounded-lg !border-slate-200 !bg-slate-50 !text-sm focus:!border-[#061743] focus:!bg-white focus:!ring-[#061743]" type="text" name="poste" :value="old('poste')" placeholder="Chef de projet" />
                    <x-input-error :messages="$errors->get('poste')" class="mt-1" />
                </div>
                <div class="sm:col-span-2">
                    <x-input-label for="institution" :value="__('Institution / Organisation')" class="!text-xs !font-bold !text-slate-600" />
                    <x-text-input id="institution" class="block mt-1 w-full !rounded-lg !border-slate-200 !bg-slate-50 !text-sm focus:!border-[#061743] focus:!bg-white focus:!ring-[#061743]" type="text" name="institution" :value="old('institution')" placeholder="Nom de votre organisme" />
                    <x-input-error :messages="$errors->get('institution')" class="mt-1" />
                </div>
            </div>
        </div>

        <!-- ─── Sécurité ─── -->
        <div class="mb-5">
            <p class="mb-3 text-xs font-black uppercase tracking-widest text-[#f2a90f]">Sécurité</p>
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                <div>
                    <x-input-label for="password" :value="__('Mot de passe')" class="!text-xs !font-bold !text-slate-600" />
                    <x-text-input id="password" class="block mt-1 w-full !rounded-lg !border-slate-200 !bg-slate-50 !text-sm focus:!border-[#061743] focus:!bg-white focus:!ring-[#061743]"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirmer')" class="!text-xs !font-bold !text-slate-600" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full !rounded-lg !border-slate-200 !bg-slate-50 !text-sm focus:!border-[#061743] focus:!bg-white focus:!ring-[#061743]"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>
            </div>
        </div>

        <!-- ─── Actions ─── -->
        <div class="mt-6">
            <button type="submit"
                    class="w-full rounded-lg bg-[#f2a90f] px-5 py-3 text-sm font-black uppercase tracking-wider text-[#061743] shadow-md transition-all duration-200 hover:bg-[#ffd071] hover:shadow-lg active:scale-[0.98]">
                Créer mon compte
            </button>
            <p class="mt-4 text-center text-sm text-slate-500">
                Déjà inscrit ?
                <a href="{{ route('login') }}" class="font-bold text-[#061743] hover:text-[#f2a90f] transition-colors">
                    Se connecter
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
