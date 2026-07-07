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
                        </div>

                        <div id="checkin-result" class="hidden rounded-lg border p-4 text-sm"></div>
                    </form>

                    <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
                        <video id="camera-preview" class="hidden aspect-square w-full rounded-md bg-slate-900 object-cover" muted playsinline></video>
                        <div id="camera-help" class="grid aspect-square w-full place-items-center rounded-md border border-dashed border-slate-300 text-center text-sm text-slate-500">
                            Collez le code scanne ou utilisez la camera si le navigateur la prend en charge.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('checkin-form');
        const input = document.getElementById('code');
        const result = document.getElementById('checkin-result');
        const cameraButton = document.getElementById('camera-button');
        const video = document.getElementById('camera-preview');
        const cameraHelp = document.getElementById('camera-help');
        let stream = null;
        let detector = null;
        let scanning = false;

        function showResult(ok, message) {
            result.className = ok
                ? 'rounded-lg border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800'
                : 'rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-800';
            result.textContent = message;
        }

        async function submitCode() {
            const response = await fetch('{{ route('checkin.scan') }}', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ code: input.value.trim() }),
            });

            const data = await response.json().catch(() => ({}));

            if (response.ok) {
                showResult(true, `${data.participant} - ${data.seminar} - ${data.scanned_at}`);
                input.value = '';
                input.focus();
                return;
            }

            showResult(false, data.message || 'Code QR introuvable.');
        }

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            await submitCode();
        });

        cameraButton.addEventListener('click', async () => {
            if (!('BarcodeDetector' in window)) {
                showResult(false, 'Le scan camera n est pas disponible dans ce navigateur. Vous pouvez coller le code manuellement.');
                return;
            }

            detector = detector || new BarcodeDetector({ formats: ['qr_code'] });
            stream = stream || await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } });
            video.srcObject = stream;
            video.classList.remove('hidden');
            cameraHelp.classList.add('hidden');
            await video.play();
            scanning = true;
            scanFrame();
        });

        async function scanFrame() {
            if (!scanning) {
                return;
            }

            const codes = await detector.detect(video).catch(() => []);

            if (codes.length > 0) {
                input.value = codes[0].rawValue;
                scanning = false;
                await submitCode();
            }

            requestAnimationFrame(scanFrame);
        }
    </script>
</x-app-layout>
