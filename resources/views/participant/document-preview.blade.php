@php
    $mode = $preview['mode'] ?? 'unsupported';
@endphp

<div class="w-full">
    <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
        <div>
            <p class="text-xs font-black uppercase text-[#f2a90f]">{{ strtoupper($extension ?: 'fichier') }}</p>
            <h4 class="text-base font-black text-[#061743]">{{ $document->title }}</h4>
        </div>
        <span class="rounded bg-[#061743]/5 px-3 py-1 text-xs font-bold text-[#061743]">
            Apercu dans la plateforme
        </span>
    </div>

    @if($mode === 'frame')
        <iframe src="{{ $preview['url'] }}" class="h-[72vh] w-full rounded-md border border-slate-200 bg-white" frameborder="0"></iframe>
    @elseif($mode === 'video')
        <video controls class="max-h-[72vh] w-full rounded-md bg-black">
            <source src="{{ $preview['url'] }}" type="{{ $preview['mime'] }}">
            Votre navigateur ne supporte pas la lecture video.
        </video>
    @elseif($mode === 'table')
        @if(empty($preview['rows']))
            <div class="rounded-md border border-slate-200 bg-white p-6 text-sm text-slate-600">
                Aucun contenu lisible n'a ete trouve dans ce fichier.
            </div>
        @else
            <div class="max-h-[70vh] overflow-auto rounded-md border border-slate-200 bg-white">
                <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                    <tbody class="divide-y divide-slate-100">
                        @foreach($preview['rows'] as $row)
                            <tr>
                                @foreach($row as $cell)
                                    <td class="min-w-32 whitespace-pre-wrap border-r border-slate-100 px-3 py-2 text-slate-700">
                                        {{ $cell }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @elseif($mode === 'text')
        @if(trim($preview['content'] ?? '') === '')
            <div class="rounded-md border border-slate-200 bg-white p-6 text-sm text-slate-600">
                Aucun texte lisible n'a ete trouve dans ce document.
            </div>
        @else
            <div class="max-h-[70vh] overflow-auto rounded-md border border-slate-200 bg-white p-5">
                <p class="whitespace-pre-wrap text-sm leading-6 text-slate-700">{{ $preview['content'] }}</p>
            </div>
        @endif
    @elseif($mode === 'slides')
        @if(empty($preview['slides']))
            <div class="rounded-md border border-slate-200 bg-white p-6 text-sm text-slate-600">
                Aucun texte lisible n'a ete trouve dans cette presentation.
            </div>
        @else
            <div class="max-h-[70vh] space-y-3 overflow-auto pr-1">
                @foreach($preview['slides'] as $slide)
                    <section class="rounded-lg border border-slate-200 bg-white shadow-sm">
                        <div class="border-b border-slate-100 bg-[#061743]/5 px-4 py-2">
                            <h5 class="text-xs font-black uppercase tracking-wide text-[#061743]">{{ $slide['title'] }}</h5>
                        </div>
                        <div class="px-4 py-3 text-sm leading-7 text-slate-700">
                            {!! nl2br(e($slide['text'])) !!}
                        </div>
                    </section>
                @endforeach
            </div>
        @endif
    @else
        <div class="rounded-md border border-slate-200 bg-white p-6 text-sm text-slate-600">
            {{ $preview['message'] ?? 'Apercu non disponible pour ce fichier.' }}
        </div>
    @endif
</div>
