<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-black uppercase leading-tight text-slate-900">
            Mon espace participant
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="caei-card">
                <div class="border-b border-slate-200 bg-[#061743] p-6 text-white">
                    <p class="text-sm font-black uppercase text-[#ffbd45]">CAEI Company Group</p>
                    <h3 class="mt-2 text-2xl font-black">Mes seminaires</h3>
                </div>

                <div class="p-6 text-slate-900">
                    @if($registrations->isEmpty())
                        <p class="text-slate-600">Vous n'etes inscrit a aucun seminaire pour le moment.</p>
                    @else
                        <div class="space-y-4">
                            @foreach($registrations as $registration)
                                <div class="rounded-lg border border-slate-200 p-4">
                                    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-start">
                                        <div>
                                            <h4 class="font-semibold">{{ $registration->seminar?->theme ?? 'Seminaire' }}</h4>
                                            <p class="text-sm text-slate-600">
                                                {{ $registration->seminar?->country ?? 'Pays non renseigne' }}
                                            </p>
                                            <p class="text-sm text-slate-600">
                                                Statut : <span class="font-medium">{{ $registration->status }}</span>
                                            </p>
                                        </div>
                                        <div class="rounded-md bg-[#061743]/5 px-3 py-2 text-sm text-slate-600">
                                            @if($registration->qrCode)
                                                <p>Code QR : {{ $registration->qrCode->code }}</p>
                                            @else
                                                <p>Code QR en preparation</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
