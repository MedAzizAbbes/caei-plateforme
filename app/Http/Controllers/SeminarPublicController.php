<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Http\Request;

class SeminarPublicController extends Controller
{
    /**
     * Page d'accueil publique — liste de tous les séminaires publiés.
     */
    public function index()
    {
        $seminars = Seminar::where('status', 'published')
            ->withCount('registrations')
            ->with('trainers')
            ->orderBy('start_date')
            ->get();

        return view('welcome', compact('seminars'));
    }

    /**
     * Page de détail publique d'un séminaire.
     */
    public function show(Seminar $seminar)
    {
        // Seuls les séminaires publiés sont accessibles publiquement
        if ($seminar->status !== 'published') {
            abort(404);
        }

        $seminar->loadCount('registrations')->load('trainers');

        return view('seminaires.show', compact('seminar'));
    }
}
