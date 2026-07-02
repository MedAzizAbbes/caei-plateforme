<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /** Écran 05 — fils de discussion d'un séminaire. */
    public function index(Request $request, Seminar $seminar)
    {
        $threads = $seminar->messages()
            ->with('author')
            ->orderBy('created_at')
            ->get()
            ->groupBy('thread_label');

        return view('shared.echange', compact('seminar', 'threads'));
    }

    /** Envoi d'un message dans un fil de discussion du séminaire. */
    public function store(Request $request, Seminar $seminar)
    {
        $data = $request->validate([
            'thread_label' => ['nullable', 'string', 'max:100'],
            'content'      => ['required', 'string', 'max:2000'],
        ]);

        $seminar->messages()->create([
            'user_id'      => $request->user()->id,
            'thread_label' => $data['thread_label'] ?? 'Général',
            'content'      => $data['content'],
        ]);

        return back();
    }
}
