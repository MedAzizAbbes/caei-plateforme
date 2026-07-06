<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-black uppercase leading-tight text-slate-900">
            Tableau de bord CAEI
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="caei-card">
                <div class="grid gap-8 p-8 lg:grid-cols-[1fr_.7fr] lg:items-center">
                    <div>
                        <p class="text-sm font-black uppercase text-[#ffbd45]">Bienvenue</p>
                        <h3 class="mt-2 text-3xl font-black text-[#061743]">Votre espace CAEI est pret.</h3>
                        <p class="mt-4 max-w-2xl text-slate-600">
                            Accedez aux outils de gestion des seminaires, au suivi des participants et aux espaces de formation selon votre role.
                        </p>
                        <div class="mt-6 flex flex-wrap gap-3">
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="caei-btn caei-btn-gold">Administration</a>
                            @endif
                            @if(Auth::user()->isParticipant())
                                <a href="{{ route('participant.dashboard') }}" class="caei-btn caei-btn-gold">Espace participant</a>
                            @endif
                            @if(Auth::user()->isFormateur())
                                <a href="{{ route('formateur.dashboard') }}" class="caei-btn caei-btn-gold">Espace formateur</a>
                            @endif
                        </div>
                    </div>
                    <div class="rounded-lg bg-[#061743] p-6 text-white">
                        <p class="text-sm font-bold uppercase text-white/60">CAEI Company Group</p>
                        <p class="mt-5 text-5xl font-black text-[#ffbd45]">{{ Auth::user()->role }}</p>
                        <p class="mt-3 text-white/75">{{ Auth::user()->fullName() ?: Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
