<x-guest-layout>
    <div class="mb-6 text-center">
        <p class="text-sm font-black uppercase text-[#ffbd45]">Acces plateforme</p>
        <h1 class="mt-2 text-2xl font-black uppercase text-[#061743]">Connexion CAEI</h1>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-[#061743] shadow-sm focus:ring-[#ffbd45]" name="remember">
                <span class="ms-2 text-sm text-slate-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="rounded-md text-sm font-semibold text-slate-600 underline hover:text-[#061743] focus:outline-none focus:ring-2 focus:ring-[#ffbd45] focus:ring-offset-2" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="mt-5 text-center border-t border-slate-200 pt-5">
            <p class="text-sm text-slate-600">
                Pas encore de compte ?
                <a href="{{ route('register') }}" class="font-bold text-[#061743] hover:text-[#f2a90f] underline">
                    Créer un compte
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
