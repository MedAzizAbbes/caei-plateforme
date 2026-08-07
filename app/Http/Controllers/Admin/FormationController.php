<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    /**
     * Display a listing of the formations with filters.
     */
    public function index(Request $request)
    {
        $query = Formation::with('creator')->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%")
                  ->orWhere('domain', 'like', "%{$search}%");
            });
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('domain')) {
            $query->where('domain', $request->domain);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $formations = $query->paginate(15)->withQueryString();

        // Récupérer les domaines distincts pour le filtre
        $domains = Formation::distinct()->pluck('domain')->filter()->sort();

        // Statistiques rapides
        $stats = [
            'total' => Formation::count(),
            'certifiantes' => Formation::certifiante()->count(),
            'diplomantes' => Formation::diplomante()->count(),
            'cycles' => Formation::cycle()->count(),
            'active' => Formation::active()->count(),
        ];

        return view('admin.formations.index', compact('formations', 'domains', 'stats'));
    }

    /**
     * Show the form for creating a new formation.
     */
    public function create()
    {
        $domains = [
            'Audit, Comptabilité & Finance',
            'Contrôle de Gestion',
            'Informatique & NTIC',
            'Soft Skills & Développement Personnel',
            'Projets & Programmes de Développement',
            'Projet Éducatif en Afrique',
            'E-Commerce, Fintech & Développement Durable',
            'Marchés Publics',
            'Droit des Affaires & Droit OHADA',
            'Marketing, Communication & Distribution',
            'Gestion des Ressources Humaines',
            'Secrétariat & Archives / Bureau d d\'Ordre',
            'Qualité, Hygiène, Sécurité & Environnement',
            'Digitalisation de l\'Administration Publique',
            'Management & Governance',
        ];

        return view('admin.formations.create', compact('domains'));
    }

    /**
     * Store a newly created formation in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'code'            => ['nullable', 'string', 'max:50'],
            'title'           => ['required', 'string', 'max:255'],
            'type'            => ['required', 'in:certifiante,diplomante,sur_mesure,elearning,cycle'],
            'domain'          => ['nullable', 'string', 'max:150'],
            'duration'        => ['nullable', 'string', 'max:100'],
            'price'           => ['nullable', 'numeric', 'min:0'],
            'description'     => ['nullable', 'string'],
            'objectives'      => ['nullable', 'string'],
            'target_audience' => ['nullable', 'string'],
            'location'        => ['nullable', 'string', 'max:150'],
            'image'           => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status'          => ['required', 'in:active,inactive'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('formations', 'public');
        }

        $data['created_by'] = $request->user()->id;

        Formation::create($data);

        return redirect()->route('admin.formations.index')
            ->with('success', 'La formation a été créée avec succès.');
    }

    /**
     * Show the form for editing the specified formation.
     */
    public function edit(Formation $formation)
    {
        $domains = [
            'Audit, Comptabilité & Finance',
            'Contrôle de Gestion',
            'Informatique & NTIC',
            'Soft Skills & Développement Personnel',
            'Projets & Programmes de Développement',
            'Projet Éducatif en Afrique',
            'E-Commerce, Fintech & Développement Durable',
            'Marchés Publics',
            'Droit des Affaires & Droit OHADA',
            'Marketing, Communication & Distribution',
            'Gestion des Ressources Humaines',
            'Secrétariat & Archives / Bureau d\'Ordre',
            'Qualité, Hygiène, Sécurité & Environnement',
            'Digitalisation de l\'Administration Publique',
            'Management & Governance',
        ];

        return view('admin.formations.edit', compact('formation', 'domains'));
    }

    /**
     * Update the specified formation in storage.
     */
    public function update(Request $request, Formation $formation)
    {
        $data = $request->validate([
            'code'            => ['nullable', 'string', 'max:50'],
            'title'           => ['required', 'string', 'max:255'],
            'type'            => ['required', 'in:certifiante,diplomante,sur_mesure,elearning,cycle'],
            'domain'          => ['nullable', 'string', 'max:150'],
            'duration'        => ['nullable', 'string', 'max:100'],
            'price'           => ['nullable', 'numeric', 'min:0'],
            'description'     => ['nullable', 'string'],
            'objectives'      => ['nullable', 'string'],
            'target_audience' => ['nullable', 'string'],
            'location'        => ['nullable', 'string', 'max:150'],
            'image'           => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status'          => ['required', 'in:active,inactive'],
        ]);

        if ($request->hasFile('image')) {
            if ($formation->image) {
                Storage::disk('public')->delete($formation->image);
            }
            $data['image'] = $request->file('image')->store('formations', 'public');
        }

        $formation->update($data);

        return redirect()->route('admin.formations.index')
            ->with('success', 'La formation a été mise à jour avec succès.');
    }

    /**
     * Remove the specified formation from storage.
     */
    public function destroy(Formation $formation)
    {
        if ($formation->image) {
            Storage::disk('public')->delete($formation->image);
        }

        $formation->delete();

        return back()->with('success', 'La formation a été supprimée.');
    }
}
