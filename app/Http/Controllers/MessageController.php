<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /** Écran 05 — fils de discussion d'un séminaire. */
    public function index(Request $request, Seminar $seminar)
    {
        $this->authorizeSeminarAccess($request, $seminar);

        $user = $request->user();
        $isAdmin = $user?->isAdmin();

        $baseThreads = [
            'Questions aux formateurs',
            'Discussion participants',
        ];

        if ($isAdmin) {
            $existingThreads = $seminar->messages()->select('thread_label')->distinct()->pluck('thread_label')->toArray();
            $threadOptions = array_values(array_unique(array_merge($baseThreads, $existingThreads)));
        } else {
            $threadOptions = $baseThreads;
            $privateThread = 'Privé avec admin - ' . $user->fullName();
            $threadOptions[] = $privateThread;
        }

        $activeThread = $request->query('thread');
        if (!$activeThread || !in_array($activeThread, $threadOptions)) {
            $activeThread = $threadOptions[0] ?? 'Questions aux formateurs';
        }

        $messages = $seminar->messages()
            ->with('author')
            ->where('thread_label', $activeThread)
            ->orderBy('created_at')
            ->get();

        if ($request->ajax()) {
            return view('shared.echange-feed', compact('seminar', 'messages', 'activeThread'));
        }

        // Gather counts for each thread label to show in the sidebar
        $threadCounts = $seminar->messages()
            ->whereIn('thread_label', $threadOptions)
            ->select('thread_label', \DB::raw('count(*) as count'))
            ->groupBy('thread_label')
            ->pluck('count', 'thread_label');

        return view('shared.echange', compact('seminar', 'messages', 'activeThread', 'threadOptions', 'threadCounts'));
    }

    /** Envoi d'un message dans un fil de discussion du séminaire. */
    public function store(Request $request, Seminar $seminar)
    {
        $this->authorizeSeminarAccess($request, $seminar);

        $data = $request->validate([
            'thread_label' => ['nullable', 'string', 'max:100'],
            'content'      => ['required', 'string', 'max:2000'],
        ]);

        $user = $request->user();
        $isAdmin = $user?->isAdmin();

        $threadLabel = $data['thread_label'] ?? 'Questions aux formateurs';

        if (!$isAdmin) {
            $baseThreads = [
                'Questions aux formateurs',
                'Discussion participants',
            ];
            $privateThread = 'Privé avec admin - ' . $user->fullName();
            
            if (!in_array($threadLabel, $baseThreads) && $threadLabel !== $privateThread) {
                abort(403, 'Action non autorisée.');
            }
        }

        $message = $seminar->messages()->create([
            'user_id'      => $user->id,
            'thread_label' => $threadLabel,
            'content'      => $data['content'],
        ]);

        if ($request->ajax()) {
            $activeThread = $message->thread_label;
            $messages = $seminar->messages()
                ->with('author')
                ->where('thread_label', $activeThread)
                ->orderBy('created_at')
                ->get();
            return view('shared.echange-feed', compact('seminar', 'messages', 'activeThread'));
        }

        return back();
    }

    private function authorizeSeminarAccess(Request $request, Seminar $seminar): void
    {
        $user = $request->user();

        if ($user?->isAdmin()) {
            return;
        }

        $isAssignedTrainer = $user?->isFormateur()
            && $seminar->trainers()->whereKey($user->id)->exists();

        if ($isAssignedTrainer) {
            return;
        }

        $isRegisteredParticipant = $user?->isParticipant()
            && $user->registrations()->where('seminar_id', $seminar->id)->exists();

        abort_unless($isRegisteredParticipant, 403, 'Acces reserve aux participants inscrits et aux formateurs du seminaire.');
    }
}
