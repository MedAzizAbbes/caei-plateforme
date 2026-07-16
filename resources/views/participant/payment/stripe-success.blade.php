<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-black uppercase leading-tight text-slate-900">
            Paiement de l'inscription
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-2xl bg-white shadow-sm border border-emerald-200">
                <div class="bg-emerald-600 px-6 py-5">
                    <p class="text-xs font-black uppercase text-emerald-100">Paiement en cours de vérification</p>
                    <h3 class="mt-1 text-xl font-black text-white">Transaction soumise avec succès</h3>
                </div>
                <div class="p-6 md:p-8 space-y-6 text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-100">
                        <svg class="h-8 w-8 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="text-lg font-black text-slate-800">Votre paiement par carte bancaire a été soumis avec succès.</p>
                    <p class="text-sm text-slate-600">
                        La confirmation sera effectuée automatiquement par Stripe. Vous recevrez un email de confirmation dès que le paiement sera validé par notre système.
                    </p>
                    
                    <div class="rounded-lg bg-yellow-50 p-4 border border-yellow-200 text-sm text-yellow-800 text-left">
                        <p class="font-bold flex items-center gap-2">
                            <span>⚠️</span> Note importante
                        </p>
                        <p class="mt-1">Le traitement du paiement par Stripe peut prendre quelques instants. Vous pouvez retourner à votre espace, votre statut sera mis à jour automatiquement.</p>
                    </div>

                    <div class="pt-4">
                        <a href="{{ route('participant.dashboard') }}" class="inline-flex items-center justify-center rounded-xl bg-[#061743] px-6 py-3 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#0a2060]">
                            Retourner à mon espace
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
