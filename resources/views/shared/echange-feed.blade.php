@forelse($messages as $message)
    @php
        $isMe = Auth::id() === $message->user_id;
        $authorName = $message->author?->fullName() ?: $message->author?->email ?: 'Utilisateur';
        $roleLabel = match($message->author?->role) {
            'admin' => 'Admin',
            'formateur' => 'Formateur',
            default => 'Participant'
        };
        $roleColor = match($message->author?->role) {
            'admin' => 'text-indigo-600 bg-indigo-50 border border-indigo-100',
            'formateur' => 'text-emerald-700 bg-emerald-50 border border-emerald-100',
            default => 'text-slate-600 bg-slate-100'
        };
    @endphp

    <div class="flex flex-col {{ $isMe ? 'items-end' : 'items-start' }} mb-4">
        <!-- Message bubble container -->
        <div class="max-w-[75%] rounded-2xl px-4 py-3 shadow-sm relative {{ $isMe ? 'bg-[#061743] text-white rounded-tr-none' : 'bg-white text-slate-800 rounded-tl-none border border-slate-200' }}">
            
            <!-- Author & Role (only if not me) -->
            @if(!$isMe)
                <div class="flex items-center gap-2 mb-1">
                    <span class="font-bold text-xs text-[#061743]">{{ $authorName }}</span>
                    <span class="px-1.5 py-0.5 text-[10px] font-semibold rounded {{ $roleColor }}">
                        {{ $roleLabel }}
                    </span>
                </div>
            @endif

            <!-- Content -->
            <p class="text-sm whitespace-pre-line leading-relaxed">{{ $message->content }}</p>

            <!-- Time -->
            <div class="text-[10px] mt-1 text-right {{ $isMe ? 'text-white/60' : 'text-slate-400' }}">
                {{ $message->created_at?->format('H:i') }}
            </div>
        </div>
    </div>
@empty
    <div class="flex flex-col items-center justify-center h-full py-12 text-center">
        <div class="rounded-full bg-slate-100 p-3 text-slate-400 mb-2">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
            </svg>
        </div>
        <p class="text-sm font-semibold text-slate-500">Aucun message pour le moment</p>
        <p class="text-xs text-slate-400 mt-1">Envoyez un message pour commencer la discussion.</p>
    </div>
@endforelse
