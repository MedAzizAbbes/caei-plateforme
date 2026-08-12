<?php

namespace App\Http\Controllers;

use App\Models\Recrutement;
use Illuminate\Http\Request;

class RecrutementController extends Controller
{
    public function create()
    {
        return view('recrutement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:255',
            'domaine' => 'required|string|max:255',
            'cv' => 'required|mimes:pdf,doc,docx|max:5120', // Max 5MB
            'message' => 'nullable|string',
        ]);

        $cvPath = $request->file('cv')->store('cvs', 'public');

        Recrutement::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'domaine' => $request->domaine,
            'message' => $request->message,
            'cv_path' => $cvPath,
        ]);

        return back()->with('success', 'Votre candidature a été envoyée avec succès. Nous vous contacterons bientôt.');
    }
}
