<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-black uppercase leading-tight text-slate-900">
            Check-in QR Code
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="caei-card">
                <div class="border-b border-slate-200 bg-[#061743] p-6 text-white">
                    <p class="text-sm font-black uppercase text-[#ffbd45]">Controle de presence</p>
                    <h3 class="mt-2 text-2xl font-black">Validation de presence</h3>
                </div>

                <div class="grid gap-6 p-6 lg:grid-cols-[1fr_18rem]">
                    <form id="checkin-form" class="space-y-4">
                        @csrf

                        <!-- Alerte de synchronisation hors-ligne -->
                        <div id="sync-queue-alert" class="hidden rounded-lg border border-amber-200 bg-amber-50 p-4 text-sm text-amber-800 flex justify-between items-center mb-4">
                            <div>
                                <span class="font-bold" id="sync-queue-count">0</span> scan(s) en attente de synchronisation (hors-ligne).
                            </div>
                            <button type="button" onclick="syncPendingScans()" id="sync-button" class="ml-2 rounded bg-amber-600 px-3 py-1 text-xs font-black text-white hover:bg-amber-700 transition">
                                Synchroniser
                            </button>
                        </div>

                        <div>
                            <x-input-label for="code" :value="__('Code QR ou lien securise')" />
                            <x-text-input id="code" class="mt-1 block w-full font-mono" type="text" name="code" required autofocus
                                placeholder="CAEI-2026-0001 ou https://.../p/token" />
                            <x-input-error :messages="$errors->get('code')" class="mt-2" />
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <x-primary-button type="submit">
                                Valider la presence
                            </x-primary-button>
                            <button type="button" id="camera-button" class="inline-flex items-center rounded-md border border-slate-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-slate-700 shadow-sm transition hover:bg-slate-50">
                                Scanner avec camera
                            </button>
                            <label for="qr-file-input" class="inline-flex items-center rounded-md border border-slate-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-slate-700 shadow-sm transition cursor-pointer hover:bg-slate-50">
                                Importer photo / QR
                            </label>
                            <input type="file" id="qr-file-input" accept="image/*" class="hidden">
                        </div>

                        <div id="checkin-result" class="hidden rounded-lg border p-4 text-sm"></div>
                    </form>

                    <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
                        <div id="reader" class="hidden w-full overflow-hidden rounded-md bg-slate-900 aspect-square"></div>
                        <div id="camera-help" class="grid aspect-square w-full place-items-center rounded-md border border-dashed border-slate-300 text-center text-sm text-slate-500">
                            Collez le code scanne ou utilisez la camera si le navigateur la prend en charge.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Html5-Qrcode Library -->
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        const form = document.getElementById('checkin-form');
        const input = document.getElementById('code');
        const result = document.getElementById('checkin-result');
        const cameraButton = document.getElementById('camera-button');
        const fileInput = document.getElementById('qr-file-input');
        const reader = document.getElementById('reader');
        const cameraHelp = document.getElementById('camera-help');
        let html5QrCode = null;
        let scanning = false;

        function showResult(ok, message) {
            result.className = ok
                ? 'rounded-lg border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800'
                : 'rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-800';
            result.textContent = message;
            result.classList.remove('hidden');
        }

        function getPendingScans() {
            return JSON.parse(localStorage.getItem('pending_scans') || '[]');
        }

        function savePendingScans(scans) {
            localStorage.setItem('pending_scans', JSON.stringify(scans));
            updateSyncQueueUI();
        }

        function queueScan(code) {
            const scans = getPendingScans();
            if (!scans.includes(code)) {
                scans.push(code);
                savePendingScans(scans);
            }
        }

        function updateSyncQueueUI() {
            const scans = getPendingScans();
            const alertDiv = document.getElementById('sync-queue-alert');
            const countSpan = document.getElementById('sync-queue-count');
            
            if (scans.length > 0) {
                countSpan.textContent = scans.length;
                alertDiv.classList.remove('hidden');
            } else {
                alertDiv.classList.add('hidden');
            }
        }

        let isSyncing = false;
        async function syncPendingScans() {
            if (isSyncing) return;
            const scans = getPendingScans();
            if (scans.length === 0) return;

            isSyncing = true;
            const syncButton = document.getElementById('sync-button');
            syncButton.disabled = true;
            syncButton.textContent = "Synchro...";

            let successCount = 0;
            let remainingScans = [...scans];

            for (const code of scans) {
                try {
                    const response = await fetch('{{ route('checkin.scan') }}', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({ code: code }),
                    });

                    if (response.ok) {
                        successCount++;
                        remainingScans = remainingScans.filter(c => c !== code);
                        savePendingScans(remainingScans);
                    }
                } catch (err) {
                    console.error("Échec de synchronisation hors-ligne pour :", code, err);
                    break;
                }
            }

            isSyncing = false;
            syncButton.disabled = false;
            syncButton.textContent = "Synchroniser";

            if (successCount > 0) {
                showResult(true, `${successCount} présence(s) synchronisée(s) avec succès.`);
            }
            updateSyncQueueUI();
        }

        async function submitCode() {
            const codeValue = input.value.trim();
            if (!codeValue) return;

            try {
                const response = await fetch('{{ route('checkin.scan') }}', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ code: codeValue }),
                });

                const data = await response.json().catch(() => ({}));

                if (response.ok) {
                    showResult(true, `${data.participant} - ${data.seminar} - ${data.scanned_at}`);
                    input.value = '';
                    input.focus();
                    return;
                }

                showResult(false, data.message || 'Code QR introuvable.');
            } catch (err) {
                queueScan(codeValue);
                showResult(true, `⚠️ Mode hors-ligne : Scan enregistré localement (${codeValue}). Il sera synchronisé dès le retour de la connexion.`);
                input.value = '';
                input.focus();
            }
        }

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            await submitCode();
        });

        cameraButton.addEventListener('click', async () => {
            if (scanning) {
                await stopScanning();
                return;
            }

            try {
                reader.classList.remove('hidden');
                cameraHelp.classList.add('hidden');
                cameraButton.textContent = 'Arrêter la caméra';
                
                if (!html5QrCode) {
                    html5QrCode = new Html5Qrcode("reader");
                }
                
                scanning = true;
                
                await html5QrCode.start(
                    { facingMode: "environment" },
                    {
                        fps: 15,
                        qrbox: (width, height) => {
                            const size = Math.min(width, height) * 0.7;
                            return { width: size, height: size };
                        }
                    },
                    async (decodedText) => {
                        input.value = decodedText;
                        await stopScanning();
                        await submitCode();
                    },
                    (errorMessage) => {
                        // On scan failure, usually noise or non-QR frame, ignore or log silently.
                    }
                );
            } catch (err) {
                showResult(false, 'Erreur d accès à la caméra : ' + err.message);
                await stopScanning();
            }
        });

        fileInput.addEventListener('change', async (e) => {
            if (e.target.files.length === 0) {
                return;
            }

            const imageFile = e.target.files[0];
            
            if (scanning) {
                await stopScanning();
            }

            showResult(true, "Analyse de l'image...");
            
            try {
                if (!html5QrCode) {
                    html5QrCode = new Html5Qrcode("reader");
                }
                const decodedText = await html5QrCode.scanFile(imageFile, true);
                input.value = decodedText;
                showResult(true, "QR Code détecté ! Validation...");
                await submitCode();
            } catch (err) {
                showResult(false, "Aucun code QR détecté. Assurez-vous que l'image est nette, bien éclairée et bien centrée.");
            }
        });

        async function stopScanning() {
            if (html5QrCode && scanning) {
                try {
                    await html5QrCode.stop();
                } catch (err) {
                    console.error("Erreur lors de l arrêt de la caméra :", err);
                }
            }
            scanning = false;
            reader.classList.add('hidden');
            cameraHelp.classList.remove('hidden');
            cameraButton.textContent = 'Scanner avec camera';
        }

        // Initialisation de la file hors-ligne au chargement
        window.addEventListener('DOMContentLoaded', () => {
            updateSyncQueueUI();
            
            // Tente de synchroniser si en ligne toutes les 10 secondes
            setInterval(() => {
                if (navigator.onLine && getPendingScans().length > 0) {
                    syncPendingScans();
                }
            }, 10000);
        });

        // Tente de synchroniser dès que la connexion revient
        window.addEventListener('online', () => {
            syncPendingScans();
        });
    </script>
</x-app-layout>
