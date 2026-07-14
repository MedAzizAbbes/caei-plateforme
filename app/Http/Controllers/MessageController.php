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

        $activeThread = $request->query('thread', 'General');

        $messages = $seminar->messages()
            ->with('author')
            ->where('thread_label', $activeThread)
            ->orderBy('created_at')
            ->get();

        if ($request->ajax()) {
            return view('shared.echange-feed', compact('seminar', 'messages', 'activeThread'));
        }

        // Available threads in this seminar
        $threadOptions = [
            'General',
            'Questions aux formateurs',
            'Discussion participants',
            'Jour 1',
            'Jour 2',
        ];

        // Gather counts for each thread label to show in the sidebar
        $threadCounts = $seminar->messages()
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

        $message = $seminar->messages()->create([
            'user_id'      => $request->user()->id,
            'thread_label' => $data['thread_label'] ?? 'General',
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
