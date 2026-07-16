<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-black uppercase leading-tight text-slate-900">
            Paiement de l'inscription
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-2xl bg-white shadow-sm border border-amber-200">
                <div class="bg-amber-500 px-6 py-5">
                    <p class="text-xs font-black uppercase text-amber-100">Paiement annulé</p>
                    <h3 class="mt-1 text-xl font-black text-white">Transaction non aboutie</h3>
                </div>
                <div class="p-6 md:p-8 space-y-6 text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-amber-100">
                        <svg class="h-8 w-8 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <p class="text-lg font-black text-slate-800">Vous avez annulé le paiement par carte bancaire.</p>
                    <p class="text-sm text-slate-600">
                        Aucun montant n'a été débité de votre carte. Votre inscription reste en attente de paiement.
                    </p>
                    
                    <div class="pt-6 flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('participant.payment.show', $registration) }}?method=card" class="inline-flex items-center justify-center rounded-xl bg-[#061743] px-6 py-3 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#0a2060]">
                            Réessayer le paiement Visa
                        </a>
                        <a href="{{ route('participant.payment.show', $registration) }}" class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-6 py-3 text-sm font-black uppercase tracking-wide text-slate-700 transition hover:bg-slate-50">
                            Choisir une autre méthode
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
