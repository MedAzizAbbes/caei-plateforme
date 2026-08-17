<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicPartner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClinicPartnerController extends Controller
{
    /**
     * Liste toutes les cliniques partenaires.
     */
    public function index()
    {
        $clinics = ClinicPartner::with('user')
            ->withCount(['medicalRequests', 'medicalRequests as pending_count' => fn($q) => $q->where('clinic_status', 'pending_review')])
            ->latest()
            ->paginate(20);

        return view('admin.cliniques.index', compact('clinics'));
    }

    /**
     * Formulaire de création d'un compte clinique.
     */
    public function create()
    {
        return view('admin.cliniques.create');
    }

    /**
     * Créer un nouveau compte clinique + générer les identifiants.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'city'      => 'nullable|string|max:100',
            'address'   => 'nullable|string|max:255',
            'phone'     => 'nullable|string|max:50',
            'specialty' => 'nullable|string|max:255',
            'email'     => 'required|email|max:255|unique:users,email',
            'password'  => 'required|string|min:8|confirmed',
        ]);

        $rawPassword = $validated['password'];

        // Créer le compte utilisateur
        $user = User::create([
            'first_name' => $validated['name'],
            'last_name'  => '',
            'email'      => $validated['email'],
            'password'   => Hash::make($rawPassword),
            'role'       => 'clinic',
            'phone'      => $validated['phone'] ?? null,
        ]);

        // Créer le profil clinique
        $clinic = ClinicPartner::create([
            'user_id'   => $user->id,
            'name'      => $validated['name'],
            'slug'      => ClinicPartner::generateSlug($validated['name']),
            'city'      => $validated['city'] ?? null,
            'address'   => $validated['address'] ?? null,
            'phone'     => $validated['phone'] ?? null,
            'specialty' => $validated['specialty'] ?? null,
        ]);

        // Stocker en session les credentials pour les afficher une seule fois
        session()->flash('clinic_credentials', [
            'name'     => $clinic->name,
            'email'    => $user->email,
            'password' => $rawPassword,
            'url'      => route('clinic.login'),
        ]);

        return redirect()->route('admin.cliniques.show', $clinic)
            ->with('success', 'Le compte clinique "' . $clinic->name . '" a été créé avec succès.');
    }

    /**
     * Afficher les détails d'une clinique + patients affectés.
     */
    public function show(ClinicPartner $clinique)
    {
        $clinique->load(['user', 'medicalRequests' => fn($q) => $q->latest()->take(10)]);

        $stats = [
            'total'          => $clinique->medicalRequests()->count(),
            'pending_review' => $clinique->medicalRequests()->where('clinic_status', 'pending_review')->count(),
            'accepted'       => $clinique->medicalRequests()->where('clinic_status', 'accepted')->count(),
            'quoted'         => $clinique->medicalRequests()->where('clinic_status', 'quoted')->count(),
            'rejected'       => $clinique->medicalRequests()->where('clinic_status', 'rejected')->count(),
        ];

        return view('admin.cliniques.show', compact('clinique', 'stats'));
    }

    /**
     * Définir un nouveau mot de passe pour une clinique.
     */
    public function resetPassword(Request $request, ClinicPartner $clinique)
    {
        $validated = $request->validate([
            'password' => 'required|string|min:8',
        ]);

        $rawPassword = $validated['password'];

        $clinique->user->update(['password' => Hash::make($rawPassword)]);

        session()->flash('clinic_credentials', [
            'name'     => $clinique->name,
            'email'    => $clinique->user->email,
            'password' => $rawPassword,
            'url'      => route('clinic.login'),
        ]);

        return redirect()->route('admin.cliniques.show', $clinique)
            ->with('success', 'Nouveau mot de passe défini avec succès pour "' . $clinique->name . '".');
    }

    /**
     * Activer / Désactiver une clinique.
     */
    public function toggleActive(ClinicPartner $clinique)
    {
        $clinique->update(['is_active' => ! $clinique->is_active]);

        $msg = $clinique->is_active ? 'activée' : 'désactivée';
        return back()->with('success', '"' . $clinique->name . '" a été ' . $msg . '.');
    }

    /**
     * Supprimer une clinique partenaire.
     */
    public function destroy(ClinicPartner $clinique)
    {
        $name = $clinique->name;
        $clinique->user->delete(); // cascade supprime la clinique aussi
        return redirect()->route('admin.cliniques.index')
            ->with('success', '"' . $name . '" a été supprimé.');
    }
}
