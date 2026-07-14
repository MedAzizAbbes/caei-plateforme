<x-app-layout>
    @php
        $backRoute = Auth::user()->isFormateur()
            ? route('formateur.dashboard')
            : route('participant.dashboard');
    @endphp

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
        </div>
    </div>

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
            
            // Poll every 3 seconds
            pollingInterval = setInterval(fetchFeed, 3000);
        });

        // Clear interval on leave if needed
        window.addEventListener('beforeunload', () => {
            if (pollingInterval) clearInterval(pollingInterval);
        });
    </script>
</x-app-layout>
