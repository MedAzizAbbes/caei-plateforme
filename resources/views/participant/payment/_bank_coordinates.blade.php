@php
    $bank = $bankSetting ?? null;
@endphp

<div class="rounded-xl border border-slate-200 bg-slate-50 p-6">
    <h4 class="text-sm font-black uppercase text-slate-800 mb-4">Coordonnées bancaires CAEI</h4>

    @if($bank && ($bank->bank_name || $bank->iban || $bank->rib))
        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
            <div>
                <dt class="text-xs font-bold uppercase text-slate-400">Banque</dt>
                <dd class="mt-1 font-semibold text-slate-800">{{ $bank->bank_name ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs font-bold uppercase text-slate-400">Titulaire du compte</dt>
                <dd class="mt-1 font-semibold text-slate-800">{{ $bank->account_holder ?? '—' }}</dd>
            </div>
            @if($bank->rib)
                <div>
                    <dt class="text-xs font-bold uppercase text-slate-400">RIB</dt>
                    <dd class="mt-1 font-mono font-semibold text-slate-800">{{ $bank->rib }}</dd>
                </div>
            @endif
            @if($bank->iban)
                <div>
                    <dt class="text-xs font-bold uppercase text-slate-400">IBAN</dt>
                    <dd class="mt-1 font-mono font-semibold text-slate-800">{{ $bank->iban }}</dd>
                </div>
            @endif
            @if($bank->swift_code)
                <div>
                    <dt class="text-xs font-bold uppercase text-slate-400">SWIFT / BIC</dt>
                    <dd class="mt-1 font-mono font-semibold uppercase text-slate-800">{{ $bank->swift_code }}</dd>
                </div>
            @endif
            @if($bank->country)
                <div>
                    <dt class="text-xs font-bold uppercase text-slate-400">Pays</dt>
                    <dd class="mt-1 font-semibold text-slate-800">{{ $bank->country }}</dd>
                </div>
            @endif
        </dl>
    @else
        <p class="text-sm text-amber-700 bg-amber-50 border border-amber-200 rounded-lg p-4">
            Les coordonnées bancaires CAEI ne sont pas encore configurées. L'administration les ajoutera prochainement.
        </p>
    @endif
</div>
