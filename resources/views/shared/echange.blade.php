<x-app-layout>
    @php
        $backRoute = Auth::user()->isFormateur()
            ? route('formateur.dashboard')
            : route('participant.dashboard');

        $threadOptions = [
            'General',
            'Questions aux formateurs',
            'Discussion participants',
            'Jour 1',
            'Jour 2',
        ];
    @endphp

    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ $backRoute }}" class="inline-flex items-center text-gray-600 hover:text-gray-900">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Retour
            </a>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $seminar->theme }} - Espace echange
                </h2>
                <p class="text-sm text-gray-600 mt-1">Questions, reponses et discussions du seminaire</p>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-[0.8fr_1.2fr]">
                <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
                    <h3 class="text-lg font-semibold text-slate-900">Nouveau message</h3>

                    @if($errors->any())
                        <div class="mt-4 rounded-md bg-red-50 p-3 text-sm text-red-700">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('echange.store', $seminar) }}" class="mt-5 space-y-4">
                        @csrf

                        <div>
                            <label for="thread_label" class="block text-sm font-medium text-slate-700">Fil de discussion</label>
                            <select id="thread_label" name="thread_label" class="mt-1 block w-full rounded-md border border-slate-300 px-3 py-2 text-sm">
                                @foreach($threadOptions as $threadOption)
                                    <option value="{{ $threadOption }}" @selected(old('thread_label') === $threadOption)>{{ $threadOption }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="content" class="block text-sm font-medium text-slate-700">Message</label>
                            <textarea id="content" name="content" rows="6" required class="mt-1 block w-full rounded-md border border-slate-300 px-3 py-2 text-sm" placeholder="Ecrivez votre question ou votre reponse...">{{ old('content') }}</textarea>
                        </div>

                        <button type="submit" class="inline-flex items-center rounded-md bg-[#061743] px-4 py-2 text-sm font-semibold text-white hover:bg-[#0b245f]">
                            Envoyer
                        </button>
                    </form>
                </div>

                <div class="space-y-5">
                    @forelse($threads as $threadLabel => $messages)
                        <section class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden">
                            <div class="border-b border-slate-200 bg-slate-50 px-5 py-3">
                                <h3 class="font-semibold text-slate-900">{{ $threadLabel ?: 'General' }}</h3>
                                <p class="text-xs text-slate-500">{{ $messages->count() }} message(s)</p>
                            </div>

                            <div class="divide-y divide-slate-100">
                                @foreach($messages as $message)
                                    <article class="p-5">
                                        <p class="font-semibold text-slate-900">
                                            {{ $message->author?->fullName() ?: $message->author?->email ?: 'Utilisateur' }}
                                        </p>
                                        <p class="text-xs text-slate-500">
                                            {{ ucfirst($message->author?->role ?? 'participant') }} - {{ $message->created_at?->format('d/m/Y H:i') }}
                                        </p>
                                        <p class="mt-3 whitespace-pre-line text-sm leading-6 text-slate-700">{{ $message->content }}</p>
                                    </article>
                                @endforeach
                            </div>
                        </section>
                    @empty
                        <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-10 text-center">
                            <h3 class="text-lg font-semibold text-slate-900">Aucun message</h3>
                            <p class="mt-2 text-sm text-slate-600">Lancez la discussion avec une question au formateur ou un message aux participants.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
