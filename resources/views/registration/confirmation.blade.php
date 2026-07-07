<x-guest-layout>
    @php
        $portalUrl = $registration->qrCode?->portalUrl();
        $qrSvg = $portalUrl ? \App\Support\QrCodeSvg::render($portalUrl) : null;
    @endphp

    <div class="mb-6 text-center">
        <p class="text-sm font-black uppercase text-[#ffbd45]">Inscription confirmee</p>
        <h1 class="mt-2 text-2xl font-black uppercase text-[#061743]">Votre QR Code</h1>
    </div>

    <div class="space-y-4 text-sm text-slate-700">
        <p>Votre inscription a bien ete enregistree.</p>

        <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
            <p><strong>Participant :</strong> {{ $registration->user?->fullName() }}</p>
            <p><strong>Seminaire :</strong> {{ $registration->seminar?->theme }}</p>
            <p><strong>Institution :</strong> {{ $registration->user?->institution ?? 'Non renseignee' }}</p>
            <p><strong>Statut :</strong> {{ $registration->status }}</p>
        </div>

        @if($registration->qrCode && $qrSvg)
            <div class="rounded-lg border border-slate-200 p-4 text-center">
                <div class="mx-auto w-56">
                    {!! $qrSvg !!}
                </div>
                <p class="mt-3 font-mono text-sm font-semibold text-[#061743]">{{ $registration->qrCode->code }}</p>
                <p class="mt-1 text-xs text-slate-500">A presenter le jour du seminaire pour le check-in.</p>
            </div>

            <div class="space-y-2">
                <a href="{{ $portalUrl }}" class="inline-flex w-full items-center justify-center rounded-md bg-[#ffbd45] px-4 py-3 text-sm font-black uppercase text-[#061743] transition hover:bg-[#ffd071]">
                    Acceder a mon espace
                </a>
                <p class="break-all rounded-md bg-slate-100 p-3 font-mono text-xs text-slate-600">{{ $portalUrl }}</p>
            </div>
        @else
            <p class="rounded-lg border border-amber-200 bg-amber-50 p-4 text-amber-800">
                Le QR Code est en cours de generation.
            </p>
        @endif
    </div>
</x-guest-layout>
