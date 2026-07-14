<x-app-layout>
    @php
        $backRoute = Auth::user()->isFormateur()
            ? route('formateur.dashboard')
            : route('participant.dashboard');
    @endphp

    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
            <a href="{{ $backRoute }}" class="inline-flex items-center text-sm font-bold text-[#061743] transition hover:text-[#f2a90f]">
                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Retour
            </a>
            <div>
                <p class="text-xs font-black uppercase text-[#f2a90f]">Supports du séminaire</p>
                <h2 class="text-xl font-black uppercase leading-tight text-slate-900">
                    {{ $seminar->theme }}
                </h2>
                <p class="mt-1 text-sm text-slate-600">{{ $seminar->country ?? 'Pays non renseigne' }}</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Résumé du séminaire -->
            <div class="mb-8 rounded-lg bg-[#061743] p-6 text-white shadow-sm">
                <p class="text-sm font-black uppercase text-[#ffbd45]">CAEI Company Group</p>
                <h3 class="mt-2 text-2xl font-black">Espace séminaire</h3>
                <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4">
                    <div class="rounded-lg border border-white/10 bg-white/10 p-4">
                        <p class="text-sm font-medium text-white/65">Dates</p>
                        <p class="mt-1 font-semibold text-white">
                            @if($seminar->start_date && $seminar->end_date)
                                {{ $seminar->start_date->format('d/m/Y') }} — {{ $seminar->end_date->format('d/m/Y') }}
                            @else
                                À définir
                            @endif
                        </p>
                    </div>
                    <div class="rounded-lg border border-white/10 bg-white/10 p-4">
                        <p class="text-sm font-medium text-white/65">Nombre de jours</p>
                        <p class="mt-1 font-semibold text-white">
                            @php
                                $dayCount = $documentsByDay->keys()->max() ?? 1;
                            @endphp
                            {{ $dayCount }} jour(s)
                        </p>
                    </div>
                    <div class="rounded-lg border border-white/10 bg-white/10 p-4">
                        <p class="text-sm font-medium text-white/65">Nombre d'heures</p>
                        <p class="mt-1 font-semibold text-white">
                            {{ $seminar->hours ?? '-' }} heure(s)
                        </p>
                    </div>
                    <div class="rounded-lg border border-white/10 bg-white/10 p-4">
                        <p class="text-sm font-medium text-white/65">Total de documents</p>
                        <p class="mt-1 font-semibold text-[#ffbd45]">{{ $documentsByDay->sum(function($docs) { return $docs->count(); }) }} document(s)</p>
                    </div>
                </div>

                @if($seminar->description)
                    <div class="mt-5 border-t border-white/10 pt-5">
                        <p class="text-sm leading-6 text-white/75">{{ $seminar->description }}</p>
                    </div>
                @endif
            </div>

            <!-- Documents classés par jour -->
            @if($documentsByDay->isEmpty())
                <div class="caei-card p-12 text-center">
                    <div class="mx-auto grid h-14 w-14 place-items-center rounded-lg bg-[#061743]/5 text-[#061743]">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-black text-[#061743]">Aucun document</h3>
                    <p class="mt-2 text-sm text-slate-600">Les supports du séminaire seront bientot disponibles.</p>
                </div>
            @else
                <div class="space-y-6">
                    @foreach($documentsByDay as $dayNumber => $documents)
                        <div class="caei-card">
                            <!-- En-tête du jour -->
                            <div class="border-b border-slate-200 bg-[#061743] px-6 py-4">
                                <h3 class="flex items-center text-lg font-black text-white">
                                    <svg class="mr-2 h-6 w-6 text-[#ffbd45]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v2h16V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5H4v8a2 2 0 002 2h12a2 2 0 002-2V7h-2v1a1 1 0 11-2 0V7H9v1a1 1 0 11-2 0V7H6v1a1 1 0 11-2 0V7z" clip-rule="evenodd"></path>
                                    </svg>
                                    Jour {{ $dayNumber }} — {{ $documents->count() }} document(s)
                                </h3>
                            </div>

                            <!-- Liste des documents -->
                            <div class="divide-y divide-slate-200">
                                @foreach($documents as $document)
                                    @php
                                        $fileExt = $document->getFileExtension();
                                        $downloadUrl = route('participant.formation.download', [$seminar, $document->id]);
                                        $previewUrl = route('participant.formation.preview', [
                                            'seminar' => $seminar,
                                            'documentId' => $document->id,
                                        ]);
                                        $fileTypes = [
                                            'pdf' => ['icon' => 'PDF', 'label' => 'PDF', 'bgClass' => 'bg-red-50 text-red-700 border border-red-100'],
                                            'doc' => ['icon' => 'DOC', 'label' => 'Document', 'bgClass' => 'bg-[#061743]/5 text-[#061743] border border-[#061743]/10'],
                                            'docx' => ['icon' => 'DOCX', 'label' => 'Document', 'bgClass' => 'bg-[#061743]/5 text-[#061743] border border-[#061743]/10'],
                                            'ppt' => ['icon' => 'PPT', 'label' => 'Présentation', 'bgClass' => 'bg-[#ffbd45]/20 text-[#061743] border border-[#ffbd45]/30'],
                                            'pptx' => ['icon' => 'PPTX', 'label' => 'Présentation', 'bgClass' => 'bg-[#ffbd45]/20 text-[#061743] border border-[#ffbd45]/30'],
                                            'xls' => ['icon' => 'XLS', 'label' => 'Feuille', 'bgClass' => 'bg-emerald-50 text-emerald-700 border border-emerald-100'],
                                            'xlsx' => ['icon' => 'XLSX', 'label' => 'Feuille', 'bgClass' => 'bg-emerald-50 text-emerald-700 border border-emerald-100'],
                                            'mp4' => ['icon' => 'MP4', 'label' => 'Vidéo', 'bgClass' => 'bg-[#061743]/5 text-[#061743] border border-[#061743]/10'],
                                            'avi' => ['icon' => 'AVI', 'label' => 'Vidéo', 'bgClass' => 'bg-[#061743]/5 text-[#061743] border border-[#061743]/10'],
                                            'mov' => ['icon' => 'MOV', 'label' => 'Vidéo', 'bgClass' => 'bg-[#061743]/5 text-[#061743] border border-[#061743]/10'],
                                            'zip' => ['icon' => 'ZIP', 'label' => 'Archive', 'bgClass' => 'bg-slate-100 text-slate-700 border border-slate-200'],
                                            'rar' => ['icon' => 'RAR', 'label' => 'Archive', 'bgClass' => 'bg-slate-100 text-slate-700 border border-slate-200'],
                                        ];
                                        $fileInfo = $fileTypes[$fileExt] ?? ['icon' => 'FILE', 'label' => 'Fichier', 'bgClass' => 'bg-slate-100 text-slate-700 border border-slate-200'];
                                    @endphp
                                    <div class="flex flex-col gap-4 p-4 transition hover:bg-slate-50 sm:flex-row sm:items-center sm:justify-between">
                                        <!-- Infos du document -->
                                        <div class="flex items-center flex-1 min-w-0">
                                            <div class="flex-shrink-0">
                                                <div class="flex h-12 w-12 items-center justify-center rounded-lg {{ $fileInfo['bgClass'] }}">
                                                    <span class="text-xs font-black">{{ $fileInfo['icon'] }}</span>
                                                </div>
                                            </div>
                                            <div class="ml-4 min-w-0 flex-1">
                                                <h4 class="truncate text-sm font-bold text-slate-900">{{ $document->title }}</h4>
                                                <div class="mt-2 flex flex-wrap items-center gap-2">
                                                    <span class="inline-flex items-center rounded bg-[#061743]/5 px-2 py-1 text-xs font-bold text-[#061743]">
                                                        {{ $fileInfo['label'] }}
                                                    </span>
                                                    @if($document->size_kb)
                                                        <span class="text-xs text-slate-600">
                                                            @if($document->size_kb > 1024)
                                                                {{ number_format($document->size_kb / 1024, 2) }} MB
                                                            @else
                                                                {{ $document->size_kb }} KB
                                                            @endif
                                                        </span>
                                                    @endif
                                                    @if($document->created_at)
                                                        <span class="text-xs text-slate-500">
                                                            Ajouté le {{ $document->created_at->format('d/m/Y') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Actions -->
                                        <div class="flex flex-shrink-0 flex-wrap gap-2 sm:ml-4">
                                            <!-- Bouton Télécharger -->
                                            <a href="{{ $downloadUrl }}" 
                                               class="inline-flex items-center justify-center rounded-md bg-[#ffbd45] px-3 py-2 text-sm font-black text-[#061743] transition hover:bg-[#ffd071]"
                                               title="Télécharger">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                                </svg>
                                                Télécharger
                                            </a>

                                            <!-- Bouton Apercu -->
                                                <button onclick="openPreview({{ Illuminate\Support\Js::from($previewUrl) }})"
                                                        class="inline-flex items-center justify-center rounded-md border border-[#061743]/15 bg-white px-3 py-2 text-sm font-bold text-[#061743] transition hover:bg-[#061743]/5"
                                                        title="Aperçu">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    Aperçu
                                                </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Modal de prévisualisation -->
    <div id="previewModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 p-4">
        <div class="flex max-h-[90vh] w-full max-w-6xl flex-col rounded-lg bg-white shadow-xl">
            <!-- Header -->
            <div class="flex items-center justify-between border-b border-slate-200 p-4">
                <h3 class="text-lg font-black text-[#061743]">Aperçu du document</h3>
                <button onclick="closePreview()" class="rounded-md p-1 text-slate-500 transition hover:bg-slate-100 hover:text-[#061743]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <!-- Contenu -->
            <div class="flex-1 overflow-auto bg-slate-100 p-4">
                <div id="previewContent" class="flex min-h-full items-center justify-center">
                    <p class="text-slate-600">Chargement...</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        async function openPreview(url) {
            const modal = document.getElementById('previewModal');
            const content = document.getElementById('previewContent');
            content.innerHTML = '<p class="text-slate-600">Chargement...</p>';
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            try {
                const response = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                });

                if (!response.ok) {
                    throw new Error('Preview failed');
                }

                content.innerHTML = await response.text();
            } catch (error) {
                content.innerHTML = "<div class=\"rounded-md border border-red-100 bg-red-50 p-4 text-sm text-red-700\">Impossible de charger l'apercu du document.</div>";
            }
        }

        function closePreview() {
            const modal = document.getElementById('previewModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.getElementById('previewContent').innerHTML = '<p class="text-slate-600">Chargement...</p>';
        }

        // Fermer le modal en cliquant sur le fond
        document.getElementById('previewModal')?.addEventListener('click', function(event) {
            if (event.target === this) {
                closePreview();
            }
        });

        // Fermer avec Échap
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closePreview();
            }
        });
    </script>
</x-app-layout>
