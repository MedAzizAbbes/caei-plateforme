<x-app-layout>
    @php
        $user = Auth::user();
        $isAdmin = $user?->isAdmin();
        $backRoute = $isAdmin 
            ? route('admin.seminars.index') 
            : ($user?->isFormateur() ? route('formateur.dashboard') : route('participant.dashboard'));
    @endphp

    @if($isAdmin)
    <div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241,245,249,0.85) 0%, rgba(226,232,240,0.88) 100%);">
        <x-admin-sidebar />
        <div class="flex-1 p-6 md:p-8 overflow-y-auto">
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <span class="inline-flex items-center gap-1.5 bg-[#f2a90f] text-[#061743] text-xs font-black px-3 py-1 rounded-md uppercase tracking-wider mb-2">
                        💬 Espace Discussions & Échanges
                    </span>
                    <h1 class="text-2xl font-black uppercase text-slate-900 tracking-tight">{{ $seminar->theme }}</h1>
                    <p class="text-xs text-slate-500 font-medium mt-0.5">Fil de discussion en temps réel du séminaire</p>
                </div>
                <a href="{{ $backRoute }}" class="inline-flex items-center gap-2 rounded-xl border border-slate-300 bg-white px-4 py-2 text-xs font-bold text-slate-700 hover:bg-slate-50 shadow-sm transition">
                    ⬅ Retour aux séminaires
                </a>
            </div>
    @else
        <x-slot name="header">
            <div class="flex items-center gap-4">
                <a href="{{ $backRoute }}" class="inline-flex items-center text-[#061743] hover:text-[#f2a90f] font-bold text-sm transition">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Retour
                </a>
                <div>
                    <h2 class="font-black text-xl text-slate-900 leading-tight">
                        {{ $seminar->theme }}
                    </h2>
                    <p class="text-xs text-slate-600">Espace échange et discussion en temps réel</p>
                </div>
            </div>
        </x-slot>

        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @endif
            <div class="bg-white rounded-xl shadow-md border border-slate-200 overflow-hidden grid grid-cols-1 md:grid-cols-[16rem_1fr] h-[calc(100vh-14rem)] min-h-[500px]">
                
                <!-- Sidebar: Threads list -->
                <div class="border-r border-slate-200 bg-slate-50 flex flex-col">
                    <div class="p-4 border-b border-slate-200">
                        <h3 class="text-xs font-black uppercase text-slate-500 tracking-wider">Salons de discussion</h3>
                    </div>
                    <nav class="flex-1 overflow-y-auto p-2 space-y-1" id="threads-nav">
                        @foreach($threadOptions as $option)
                            @php
                                $isActive = $activeThread === $option;
                                $count = $threadCounts[$option] ?? 0;
                            @endphp
                            <button 
                                onclick="switchThread('{{ $option }}')"
                                data-thread="{{ $option }}"
                                class="w-full flex items-center justify-between px-3 py-3 text-left rounded-lg text-sm transition font-bold {{ $isActive ? 'bg-[#061743] text-white shadow-sm' : 'text-slate-700 hover:bg-slate-200 hover:text-slate-900' }}">
                                <span class="truncate">{{ $option }}</span>
                                <span class="px-2 py-0.5 text-xs rounded-full {{ $isActive ? 'bg-white/20 text-white' : 'bg-slate-200 text-slate-600' }} thread-count">
                                    {{ $count }}
                                </span>
                            </button>
                        @endforeach
                    </nav>
                </div>

                <!-- Chat Pane -->
                <div class="flex flex-col bg-slate-50 h-full">
                    <!-- Chat Header -->
                    <div class="px-6 py-4 bg-white border-b border-slate-200 flex items-center justify-between shadow-sm">
                        <div>
                            <h3 class="font-black text-[#061743]" id="active-thread-title">{{ $activeThread }}</h3>
                            <p class="text-xs text-slate-500 flex items-center gap-1.5 mt-0.5">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                Chat en direct
                            </p>
                        </div>
                        {{-- Boutons Appels Audio / Vidéo --}}
                        <div class="flex items-center gap-2">
                            <button
                                type="button"
                                onclick="CaeiCall.openMembersPanel('audio')"
                                title="Lancer un appel audio"
                                class="inline-flex items-center gap-1.5 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 font-bold text-xs px-3 py-2 border border-emerald-200 shadow-xs transition-all hover:scale-105"
                            >
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                <span class="hidden sm:inline">Appel audio</span>
                            </button>
                            <button
                                type="button"
                                onclick="CaeiCall.openMembersPanel('video')"
                                title="Lancer un appel vidéo"
                                class="inline-flex items-center gap-1.5 rounded-lg bg-[#061743] hover:bg-[#0b245f] text-white font-bold text-xs px-3 py-2 shadow-xs transition-all hover:scale-105"
                            >
                                <svg class="w-4 h-4 text-[#f2a90f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                <span class="hidden sm:inline">Appel vidéo</span>
                            </button>
                            <button
                                type="button"
                                onclick="CaeiCall.openMembersPanel('history')"
                                title="Historique des appels"
                                class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 transition-all border border-slate-200"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Messages Feed -->
                    <div class="flex-1 overflow-y-auto p-6" id="chat-messages-container">
                        @include('shared.echange-feed', ['messages' => $messages])
                    </div>

                    <!-- Message Input Form -->
                    <div class="p-4 bg-white border-t border-slate-200">
                        <form id="chat-input-form" onsubmit="sendMessage(event)" class="flex gap-2">
                            @csrf
                            <input type="hidden" name="thread_label" id="form-thread-label" value="{{ $activeThread }}">
                            <input 
                                type="text" 
                                name="content" 
                                id="message-content-input" 
                                autocomplete="off"
                                required 
                                placeholder="Écrivez votre message..." 
                                class="flex-1 rounded-lg border border-slate-300 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#061743]/20 focus:border-[#061743]"
                            >
                            <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-[#061743] px-5 py-2 text-sm font-black text-white hover:bg-[#0b245f] transition shadow-sm">
                                <span>Envoyer</span>
                                <svg class="w-4 h-4 ml-1.5 transform rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        @if($isAdmin)
            </div>
        </div>
        @else
            </div>
        </div>
        @endif

    <script>
        let currentThread = '{{ $activeThread }}';
        const messagesContainer = document.getElementById('chat-messages-container');
        const inputField = document.getElementById('message-content-input');
        const threadTitle = document.getElementById('active-thread-title');
        const formThreadInput = document.getElementById('form-thread-label');
        let pollingInterval = null;

        // Auto-scroll messages to bottom
        function scrollToBottom() {
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        // Switch active thread
        async function switchThread(threadName) {
            currentThread = threadName;
            threadTitle.textContent = threadName;
            formThreadInput.value = threadName;

            // Update active state in sidebar UI
            document.querySelectorAll('#threads-nav button').forEach(button => {
                const buttonThread = button.getAttribute('data-thread');
                const countBadge = button.querySelector('.thread-count');
                if (buttonThread === threadName) {
                    button.className = "w-full flex items-center justify-between px-3 py-3 text-left rounded-lg text-sm transition font-bold bg-[#061743] text-white shadow-sm";
                    countBadge.className = "px-2 py-0.5 text-xs rounded-full bg-white/20 text-white thread-count";
                } else {
                    button.className = "w-full flex items-center justify-between px-3 py-3 text-left rounded-lg text-sm transition font-bold text-slate-700 hover:bg-slate-200 hover:text-slate-900";
                    countBadge.className = "px-2 py-0.5 text-xs rounded-full bg-slate-200 text-slate-600 thread-count";
                }
            });

            // Fetch thread feed immediately
            await fetchFeed();
            scrollToBottom();
            inputField.focus();
        }

        // Fetch feed partial via AJAX
        async function fetchFeed() {
            try {
                const response = await fetch(`{{ route('echange.index', $seminar) }}?thread=${encodeURIComponent(currentThread)}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                if (response.ok) {
                    const html = await response.text();
                    
                    // Only update and scroll if the content has actually changed
                    if (messagesContainer.innerHTML !== html) {
                        const shouldScroll = messagesContainer.scrollTop + messagesContainer.clientHeight >= messagesContainer.scrollHeight - 50;
                        messagesContainer.innerHTML = html;
                        if (shouldScroll) {
                            scrollToBottom();
                        }
                    }
                }
            } catch (err) {
                console.error("Erreur de récupération des messages :", err);
            }
        }

        // Send message via AJAX
        async function sendMessage(event) {
            event.preventDefault();
            const content = inputField.value.trim();
            if (!content) return;

            inputField.value = '';

            try {
                const response = await fetch(`{{ route('echange.store', $seminar) }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'text/html',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        thread_label: currentThread,
                        content: content
                    })
                });

                if (response.ok) {
                    const html = await response.text();
                    messagesContainer.innerHTML = html;
                    scrollToBottom();
                    
                    // Increment the count badge in the sidebar dynamically
                    const activeBtn = document.querySelector(`#threads-nav button[data-thread="${currentThread}"]`);
                    if (activeBtn) {
                        const countBadge = activeBtn.querySelector('.thread-count');
                        let count = parseInt(countBadge.textContent.trim()) || 0;
                        countBadge.textContent = count + 1;
                    }
                }
            } catch (err) {
                console.error("Erreur d'envoi du message :", err);
            }
        }

        // Initialize polling and scroll on load
        window.addEventListener('DOMContentLoaded', () => {
            scrollToBottom();
            
            // Poll every 3 seconds for chat
            pollingInterval = setInterval(fetchFeed, 3000);
        });

        // Clear interval on leave if needed
        window.addEventListener('beforeunload', () => {
            if (pollingInterval) clearInterval(pollingInterval);
        });
    </script>

{{-- ══════════ LIVEKIT CALL SYSTEM ══════════ --}}
@include('shared.call-modals')

{{-- LiveKit SDK via CDN --}}
<script src="https://cdn.jsdelivr.net/npm/livekit-client@2/dist/livekit-client.umd.min.js"></script>

<script>
// ─── CAEI Call Manager (LiveKit) ─────────────────────────────────────────────
const CaeiCall = (() => {
    // ── State ──────────────────────────────────────────────────────────────
    let room         = null;
    let currentCallId = null;
    let callType     = 'audio';
    let micEnabled   = true;
    let camEnabled   = true;
    let timerInterval = null;
    let timerSeconds  = 0;
    let incomingPollInterval = null;
    let callerPollInterval   = null;
    let incomingCallId       = null;

    const SEMINAR_ID = {{ $seminar->id }};
    const CSRF_TOKEN = '{{ csrf_token() }}';
    const BASE_URL   = `${window.location.origin}`;

    // ── DOM refs ───────────────────────────────────────────────────────────
    const $ = id => document.getElementById(id);

    // ── Utilities ──────────────────────────────────────────────────────────
    async function apiPost(url, data = {}) {
        const res = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': CSRF_TOKEN,
                'Accept': 'application/json',
            },
            body: JSON.stringify(data),
        });
        const json = await res.json().catch(() => ({}));
        if (!res.ok) {
            const msg = json.error || json.message || `Erreur (${res.status})`;
            throw new Error(msg);
        }
        return json;
    }

    async function apiGet(url) {
        const res = await fetch(url, {
            headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
        });
        const json = await res.json().catch(() => ({}));
        if (!res.ok) {
            const msg = json.error || json.message || `Erreur (${res.status})`;
            throw new Error(msg);
        }
        return json;
    }

    // ── Modals ─────────────────────────────────────────────────────────────
    function showModal(id) {
        ['modal-outgoing','modal-incoming','modal-active-call'].forEach(m => $(`${m}`)?.classList.add('hidden'));
        $(id)?.classList.remove('hidden');
    }
    function hideAllModals() {
        ['modal-outgoing','modal-incoming','modal-active-call'].forEach(m => $(`${m}`)?.classList.add('hidden'));
    }

    // ── Timer ──────────────────────────────────────────────────────────────
    function startTimer() {
        timerSeconds = 0;
        if (timerInterval) clearInterval(timerInterval);
        timerInterval = setInterval(() => {
            timerSeconds++;
            const m = Math.floor(timerSeconds / 60);
            const s = timerSeconds % 60;
            $('call-timer').textContent = `${m}:${String(s).padStart(2,'0')}`;
        }, 1000);
    }
    function stopTimer() {
        if (timerInterval) { clearInterval(timerInterval); timerInterval = null; }
        timerSeconds = 0;
    }

    // ── LiveKit Room ───────────────────────────────────────────────────────
    async function connectToRoom(wsUrl, token, isVideo) {
        if (room) { await room.disconnect(); room = null; }

        room = new LivekitClient.Room({
            adaptiveStream: true,
            dynacast: true,
        });

        room.on(LivekitClient.RoomEvent.TrackSubscribed, (track, pub, participant) => {
            if (track.kind === LivekitClient.Track.Kind.Video) {
                const el = track.attach();
                el.style.cssText = 'width:100%;height:100%;object-fit:cover;';
                $('remote-video-placeholder').classList.add('hidden');
                $('remote-video-container').appendChild(el);
            } else if (track.kind === LivekitClient.Track.Kind.Audio) {
                const el = track.attach();
                document.body.appendChild(el);
            }
        });

        room.on(LivekitClient.RoomEvent.TrackUnsubscribed, (track) => track.detach());

        room.on(LivekitClient.RoomEvent.Disconnected, (reason) => {
            stopTimer();
            hideAllModals();
            if (reason) {
                console.warn('LiveKit déconnecté :', reason);
            }
        });

        try {
            await room.connect(wsUrl, token, {
                autoSubscribe: true,
            });
        } catch (err) {
            console.error('Erreur connexion LiveKit :', err);
            hideAllModals();
            alert('Connexion à l\'appel échouée : ' + (err.message || err));
            return;
        }

        // Publish local tracks
        try {
            if (isVideo) {
                await room.localParticipant.setCameraEnabled(true).catch(e => console.warn('Erreur caméra :', e));
                await room.localParticipant.setMicrophoneEnabled(true).catch(e => console.warn('Erreur micro :', e));
                // Attach local video
                const camTrack = room.localParticipant.getTrack(LivekitClient.Track.Source.Camera);
                if (camTrack?.track) {
                    const el = camTrack.track.attach();
                    el.style.cssText = 'width:100%;height:100%;object-fit:cover;';
                    $('local-video-placeholder').classList.add('hidden');
                    $('local-video-container').appendChild(el);
                }
            } else {
                await room.localParticipant.setMicrophoneEnabled(true).catch(e => console.warn('Erreur micro :', e));
                $('btn-toggle-cam').classList.add('opacity-40', 'pointer-events-none');
            }
        } catch (mediaErr) {
            console.warn('Avertissement périphériques audio/vidéo :', mediaErr);
        }

        micEnabled = true;
        camEnabled = isVideo;
        updateControlIcons();
    }

    function updateControlIcons() {
        $('icon-mic-on').classList.toggle('hidden', !micEnabled);
        $('icon-mic-off').classList.toggle('hidden', micEnabled);
        $('icon-cam-on').classList.toggle('hidden', !camEnabled);
        $('icon-cam-off').classList.toggle('hidden', camEnabled);
        $('btn-toggle-mic').classList.toggle('bg-rose-500/40', !micEnabled);
        $('btn-toggle-cam').classList.toggle('bg-rose-500/40', !camEnabled);
    }

    // ── Public API ─────────────────────────────────────────────────────────

    async function startCall(calleeId, type) {
        callType = type;
        try {
            const data = await apiPost(`${BASE_URL}/seminaires/${SEMINAR_ID}/appels`, {
                callee_id: calleeId, type
            });
            if (!data || !data.call_id) {
                alert(data?.error || data?.message || 'Impossible d\'initier l\'appel.');
                return;
            }

            currentCallId = data.call_id;
            $('outgoing-callee-name').textContent = data.callee?.name || 'Correspondant';
            $('outgoing-call-type').textContent = type === 'video' ? '📹 Appel vidéo en cours...' : '📞 Appel audio en cours...';
            showModal('modal-outgoing');
            playRingtone();
            document.getElementById('panel-members').classList.add('hidden');

            // Poll caller side for accept/refuse
            callerPollInterval = setInterval(async () => {
                try {
                    const st = await apiGet(`${BASE_URL}/seminaires/${SEMINAR_ID}/appels/${currentCallId}/status`);
                    if (st.status === 'accepted') {
                        clearInterval(callerPollInterval);
                        stopRingtone();
                        await joinActiveCall(data.ws_url, data.token, data.callee?.name || 'Correspondant', type);
                    } else if (['refused','missed','ended'].includes(st.status)) {
                        clearInterval(callerPollInterval);
                        stopRingtone();
                        hideAllModals();
                        showNotification(st.status === 'refused' ? '❌ Appel refusé' : '📵 Appel manqué', 'warning');
                    }
                } catch(e) {}
            }, 2000);

        } catch (e) {
            console.error(e);
            stopRingtone();
            alert(e.message || 'Impossible d\'initier l\'appel.');
        }
    }

    async function joinActiveCall(wsUrl, token, peerName, type) {
        stopRingtone();
        $('active-peer-name').textContent = peerName;
        $('active-call-type-label').textContent = type === 'video' ? '📹 Appel vidéo' : '📞 Appel audio';
        showModal('modal-active-call');
        await connectToRoom(wsUrl, token, type === 'video');
        startTimer();
    }

    async function acceptIncoming() {
        if (!incomingCallId) return;
        clearInterval(incomingPollInterval);
        stopRingtone();

        try {
            const data = await apiPost(`${BASE_URL}/seminaires/${SEMINAR_ID}/appels/${incomingCallId}/answer`);
            if (data.error) { alert(data.error); hideAllModals(); return; }

            currentCallId = data.call_id;
            await joinActiveCall(data.ws_url, data.token, data.caller.name, callType);
        } catch(e) {
            console.error(e);
            hideAllModals();
        }
    }

    async function refuseIncoming() {
        if (!incomingCallId) return;
        clearInterval(incomingPollInterval);
        stopRingtone();
        try {
            await apiPost(`${BASE_URL}/seminaires/${SEMINAR_ID}/appels/${incomingCallId}/refuse`);
        } catch(e) {}
        hideAllModals();
        incomingCallId = null;
    }

    async function hangUp() {
        if (callerPollInterval) clearInterval(callerPollInterval);
        stopTimer();
        stopRingtone();

        if (currentCallId) {
            try {
                await apiPost(`${BASE_URL}/seminaires/${SEMINAR_ID}/appels/${currentCallId}/end`);
            } catch(e) {}
        }
        if (room) {
            await room.disconnect();
            room = null;
        }
        // Clean video elements
        ['remote-video-container','local-video-container'].forEach(id => {
            const el = $(id);
            el.querySelectorAll('video').forEach(v => v.remove());
        });
        $('remote-video-placeholder').classList.remove('hidden');
        $('local-video-placeholder').classList.remove('hidden');

        currentCallId = null;
        hideAllModals();
    }

    function toggleMic() {
        micEnabled = !micEnabled;
        room?.localParticipant.setMicrophoneEnabled(micEnabled);
        updateControlIcons();
    }

    function toggleCamera() {
        if (!room) return;
        camEnabled = !camEnabled;
        room.localParticipant.setCameraEnabled(camEnabled);
        updateControlIcons();
    }

    // ── Ringtone synth (Web Audio API) ────────────────────────────────────
    let audioCtx = null;
    let ringtoneTimer = null;

    function playRingtone() {
        try {
            if (!audioCtx) {
                audioCtx = new (window.AudioContext || window.webkitAudioContext)();
            }
            if (audioCtx.state === 'suspended') audioCtx.resume();
            stopRingtone();
            
            function beep() {
                if (!audioCtx) return;
                const osc = audioCtx.createOscillator();
                const gain = audioCtx.createGain();
                osc.type = 'sine';
                osc.frequency.setValueAtTime(440, audioCtx.currentTime);
                gain.gain.setValueAtTime(0.08, audioCtx.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.8);
                osc.connect(gain);
                gain.connect(audioCtx.destination);
                osc.start();
                osc.stop(audioCtx.currentTime + 0.8);
            }
            beep();
            ringtoneTimer = setInterval(beep, 2500);
        } catch(e) {}
    }

    function stopRingtone() {
        if (ringtoneTimer) {
            clearInterval(ringtoneTimer);
            ringtoneTimer = null;
        }
    }

    // ── Members panel ──────────────────────────────────────────────────────
    async function openMembersPanel(mode = 'members') {
        document.getElementById('panel-members').classList.remove('hidden');
        if (mode === 'history') {
            showTab('history');
        } else {
            showTab('members');
            await loadMembers(mode);
        }
    }

    async function loadMembers(preferredMode = 'members') {
        const container = $('tab-members');
        container.innerHTML = '<div class="text-center py-8 text-slate-400 text-sm">Chargement des membres...</div>';
        try {
            const data = await apiGet(`${BASE_URL}/seminaires/${SEMINAR_ID}/appels/membres`);
            if (!data.members || data.members.length === 0) {
                container.innerHTML = '<div class="text-center py-8 text-slate-400 text-sm">Aucun autre membre dans ce séminaire.</div>';
                return;
            }
            container.innerHTML = data.members.map(m => `
                <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 border border-slate-100 hover:border-slate-200 transition group shadow-2xs">
                    <div class="w-10 h-10 rounded-full bg-[#061743] flex items-center justify-center text-white font-black text-sm shrink-0 shadow-xs">
                        ${m.name.split(' ').map(n=>n[0]).join('').toUpperCase().slice(0,2)}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-black text-slate-900 truncate">${m.name}</p>
                        <p class="text-[11px] ${m.role==='Formateur' ? 'text-emerald-600 font-bold' : 'text-slate-500'} font-semibold">${m.role}</p>
                    </div>
                    <div class="flex gap-1.5 shrink-0">
                        <button onclick="CaeiCall.startCall(${m.id},'audio')" title="Appel audio avec ${m.name}"
                            class="w-9 h-9 rounded-full ${preferredMode==='audio' ? 'bg-emerald-600 text-white shadow-md ring-2 ring-emerald-400/40' : 'bg-slate-100 text-emerald-700 hover:bg-emerald-600 hover:text-white'} flex items-center justify-center transition-all hover:scale-105">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </button>
                        <button onclick="CaeiCall.startCall(${m.id},'video')" title="Appel vidéo avec ${m.name}"
                            class="w-9 h-9 rounded-full ${preferredMode==='video' ? 'bg-[#061743] text-[#f2a90f] shadow-md ring-2 ring-[#f2a90f]/40' : 'bg-slate-100 text-[#061743] hover:bg-[#061743] hover:text-[#f2a90f]'} flex items-center justify-center transition-all hover:scale-105">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                        </button>
                    </div>
                </div>
            `).join('');
        } catch(e) {
            container.innerHTML = '<div class="text-center py-8 text-rose-400 text-sm">Erreur de chargement des membres.</div>';
        }
    }

    async function loadHistory() {
        const container = $('tab-history');
        container.innerHTML = '<div class="text-center py-8 text-slate-400 text-sm">Chargement...</div>';
        try {
            const data = await apiGet(`${BASE_URL}/seminaires/${SEMINAR_ID}/appels/historique`);
            if (!data.calls || data.calls.length === 0) {
                container.innerHTML = '<div class="text-center py-8 text-slate-400 text-sm">Aucun appel dans l\'historique.</div>';
                return;
            }
            const statusLabels = { ended: '✅ Terminé', refused: '❌ Refusé', missed: '📵 Manqué', accepted: '✅ Accepté' };
            const statusColors = { ended: 'text-emerald-600', refused: 'text-rose-500', missed: 'text-amber-600', accepted: 'text-emerald-600' };
            container.innerHTML = data.calls.map(c => `
                <div class="p-3 rounded-xl border border-slate-100 bg-white shadow-xs">
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-xs font-black text-slate-800">${c.is_caller ? '📤' : '📥'} ${c.other_name}</span>
                        <span class="text-[10px] ${statusColors[c.status] || 'text-slate-500'} font-bold">${statusLabels[c.status] || c.status}</span>
                    </div>
                    <div class="flex items-center gap-3 text-[11px] text-slate-400 font-semibold">
                        <span>${c.type === 'video' ? '📹' : '📞'} ${c.type}</span>
                        ${c.duration !== '0:00' ? `<span>⏱ ${c.duration}</span>` : ''}
                        <span class="ml-auto">${c.created_at}</span>
                    </div>
                </div>
            `).join('');
        } catch(e) {
            container.innerHTML = '<div class="text-center py-8 text-rose-400 text-sm">Erreur de chargement.</div>';
        }
    }

    function showTab(tab) {
        $('tab-members').classList.toggle('hidden', tab !== 'members');
        $('tab-history').classList.toggle('hidden', tab !== 'history');
        $('tab-members-btn').classList.toggle('text-[#061743]', tab === 'members');
        $('tab-members-btn').classList.toggle('border-[#f2a90f]', tab === 'members');
        $('tab-members-btn').classList.toggle('text-slate-500', tab !== 'members');
        $('tab-members-btn').classList.toggle('border-transparent', tab !== 'members');
        $('tab-history-btn').classList.toggle('text-[#061743]', tab === 'history');
        $('tab-history-btn').classList.toggle('border-[#f2a90f]', tab === 'history');
        $('tab-history-btn').classList.toggle('text-slate-500', tab !== 'history');
        $('tab-history-btn').classList.toggle('border-transparent', tab !== 'history');
        if (tab === 'history') loadHistory();
    }

    // ── Toast notification ──────────────────────────────────────────────────
    function showNotification(message, type = 'info') {
        const toast = document.createElement('div');
        const colors = { info: 'bg-slate-800', warning: 'bg-amber-600', success: 'bg-emerald-600' };
        toast.className = `fixed bottom-6 left-1/2 -translate-x-1/2 z-[99999] ${colors[type] || 'bg-slate-800'} text-white text-sm font-black px-6 py-3 rounded-full shadow-xl transition-all`;
        toast.textContent = message;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3500);
    }

    // ── Incoming call polling (server-side, like chat polling) ──────────────
    function startIncomingPoll() {
        incomingPollInterval = setInterval(async () => {
            // Don't poll if already in a call
            if (currentCallId) return;
            try {
                const data = await apiGet(`${BASE_URL}/seminaires/${SEMINAR_ID}/appels/incoming`);
                if (data.incoming && data.call_id !== incomingCallId) {
                    incomingCallId = data.call_id;
                    callType = data.type;
                    $('incoming-caller-name').textContent = data.caller.name;
                    $('incoming-call-type').textContent = data.type === 'video' ? '📹 Appel vidéo entrant' : '📞 Appel audio entrant';
                    showModal('modal-incoming');
                    playRingtone();
                    // Auto-miss after 30s
                    setTimeout(() => {
                        if ($('modal-incoming') && !$('modal-incoming').classList.contains('hidden')) {
                            stopRingtone();
                            hideAllModals();
                            incomingCallId = null;
                        }
                    }, 30000);
                } else if (!data.incoming && incomingCallId) {
                    // Call was cancelled or timed out
                    stopRingtone();
                    if ($('modal-incoming') && !$('modal-incoming').classList.contains('hidden')) {
                        hideAllModals();
                    }
                    incomingCallId = null;
                }
            } catch(e) {}
        }, 2000);
    }

    // ── Init ────────────────────────────────────────────────────────────────
    window.addEventListener('DOMContentLoaded', startIncomingPoll);
    window.addEventListener('beforeunload', () => {
        if (incomingPollInterval) clearInterval(incomingPollInterval);
        if (callerPollInterval) clearInterval(callerPollInterval);
        if (currentCallId && room) hangUp();
    });

    return { startCall, acceptIncoming, refuseIncoming, hangUp, toggleMic, toggleCamera, openMembersPanel, showTab };
})();
</script>
</x-app-layout>
