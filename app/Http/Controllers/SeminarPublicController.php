<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use App\Models\Formation;
use Illuminate\Http\Request;

class SeminarPublicController extends Controller
{
    /**
     * Page d'accueil publique — liste de tous les séminaires publiés et formations.
     */
    public function index()
    {
        $seminars = Seminar::where('status', 'published')
            ->withCount('registrations')
            ->with('trainers')
            ->orderBy('start_date')
            ->get();

        $formations = Formation::active()->take(3)->get();

        return view('welcome', compact('seminars', 'formations'));
    }

    /**
     * Page d'accueil principale / Alias pour la route home.
     */
    public function main()
    {
        return $this->index();
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
