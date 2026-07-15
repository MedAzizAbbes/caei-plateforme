@if($bankSetting)
    <div class="rounded-xl border border-slate-100 bg-slate-50 p-6 space-y-3 font-mono text-sm">
        <div class="flex flex-col sm:flex-row sm:justify-between border-b border-slate-200 pb-2">
            <span class="font-sans font-bold text-xs uppercase text-slate-500">Bénéficiaire</span>
            <span class="font-semibold text-slate-800">{{ $bankSetting->account_holder }}</span>
        </div>
        <div class="flex flex-col sm:flex-row sm:justify-between border-b border-slate-200 pb-2">
            <span class="font-sans font-bold text-xs uppercase text-slate-500">Banque & Pays</span>
            <span class="font-semibold text-slate-800">{{ $bankSetting->bank_name }}, {{ $bankSetting->country }}</span>
        </div>
        <div class="flex flex-col sm:flex-row sm:justify-between border-b border-slate-200 pb-2">
            <span class="font-sans font-bold text-xs uppercase text-slate-500">IBAN</span>
            <span class="font-semibold text-slate-800 tracking-wider">{{ $bankSetting->iban }}</span>
        </div>
        @if($bankSetting->rib)
        <div class="flex flex-col sm:flex-row sm:justify-between border-b border-slate-200 pb-2">
            <span class="font-sans font-bold text-xs uppercase text-slate-500">RIB</span>
            <span class="font-semibold text-slate-800 tracking-wider">{{ $bankSetting->rib }}</span>
        </div>
        @endif
        <div class="flex flex-col sm:flex-row sm:justify-between pb-2">
            <span class="font-sans font-bold text-xs uppercase text-slate-500">BIC / SWIFT</span>
            <span class="font-semibold text-slate-800">{{ $bankSetting->swift_code }}</span>
        </div>
    </div>
@else
    <div class="p-4 bg-yellow-50 text-yellow-800 text-sm font-semibold rounded-lg">
        Les coordonnées bancaires ne sont pas encore configurées par l'administration.
    </div>
@endif
