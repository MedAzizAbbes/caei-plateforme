<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recrutement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecrutementController extends Controller
{
    public function index()
    {
        $recrutements = Recrutement::latest()->paginate(15);
        return view('admin.recrutements.index', compact('recrutements'));
    }

    public function downloadCv($id)
    {
        $recrutement = Recrutement::findOrFail($id);
        
        if (Storage::disk('public')->exists($recrutement->cv_path)) {
            return Storage::disk('public')->download($recrutement->cv_path);
        }

        return back()->with('error', 'Le fichier CV est introuvable.');
    }

    public function updateStatut(Request $request, $id)
    {
        $request->validate([
            'statut' => 'required|in:en_attente,accepte,refuse',
        ]);

        $recrutement = Recrutement::findOrFail($id);
        $recrutement->update(['statut' => $request->statut]);

        $labels = [
            'en_attente' => 'En attente',
            'accepte'    => 'Accepté',
            'refuse'     => 'Refusé',
        ];

        return back()->with('success', "Statut mis à jour : {$labels[$request->statut]}.");
    }

    public function destroy($id)
    {
        $recrutement = Recrutement::findOrFail($id);
        
        // Supprimer le fichier CV si existant
        if ($recrutement->cv_path && Storage::disk('public')->exists($recrutement->cv_path)) {
            Storage::disk('public')->delete($recrutement->cv_path);
        }
        
        $recrutement->delete();

        return back()->with('success', 'La candidature a été supprimée avec succès.');
    }
}
