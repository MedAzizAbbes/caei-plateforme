<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalServiceController extends Controller
{
    /**
     * Page d'accueil CAEI Medical Services.
     */
    public function index()
    {
        $services = [
            [
                'id' => 'chirurgie-esthetique',
                'title' => 'Chirurgie Esthétique & Réparatrice',
                'badge' => 'Populaire',
                'icon' => 'sparkles',
                'image' => 'chirurgie-esthetique.jpg',
                'description' => 'Interventions esthétiques et reconstructrices de haute précision réalisées par des chirurgiens plasticiens de renom en Tunisie.',
                'features' => ['Rhinoplastie & Chirurgie du visage', 'Augmentation & Réduction mammaire', 'Liposuccion & Abdominoplastie', 'Soins de médecine esthétique']
            ],
            [
                'id' => 'evacuation-sanitaire',
                'title' => 'Évacuation Sanitaire (EVACSAN)',
                'badge' => 'Urgence 24/7',
                'icon' => 'ambulance',
                'image' => 'evacuation-sanitaire.jpg',
                'description' => 'Prise en charge globale et transport médicalisé d’urgence (avion sanitaire ou vol régulier assisté) depuis n’importe quel pays.',
                'features' => ['Transfert médicalisé 24/7', 'Médecins réanimateurs à bord', 'Coordination aéroportuaire', 'Admission directe en soins intensifs']
            ],
            [
                'id' => 'accompagnement-medical',
                'title' => 'Accompagnement & Séjour Médical',
                'badge' => 'Clé en main',
                'icon' => 'user-check',
                'image' => 'accompagnement-medical.jpg',
                'description' => 'Prise en charge intégrale du patient international : orientation vers le meilleur spécialiste, conciergerie et séjour tout compris.',
                'features' => ['Consultation pré-opératoire', 'Accueil aéroport & transferts VIP', 'Réservation hôtel & clinique', 'Suivi post-opératoire personnalisé']
            ],
            [
                'id' => 'assistance-procreation',
                'title' => 'Assistance à la Procréation (PMA / FIV)',
                'badge' => 'Expertise',
                'icon' => 'heart',
                'image' => 'assistance-procreation.jpg',
                'description' => 'Accompagnement bienveillant et hautement spécialisé pour la fertilité, Fécondation In Vitro (FIV) et bilans complets.',
                'features' => ['Bilan de fertilité complet', 'Fécondation In Vitro (FIV & ICSI)', 'PMA hautement sécurisée', 'Confidentialité absolue']
            ],
            [
                'id' => 'chirurgie-bariatrique',
                'title' => 'Chirurgie Obésité & Bariatrique',
                'badge' => 'Spécialité',
                'icon' => 'scale',
                'image' => 'chirurgie-bariatrique.jpg',
                'description' => 'Traitements chirurgicaux efficaces contre l’obésité sévère (Sleeve, Bypass) pour retrouver santé et qualité de vie.',
                'features' => ['Sleeve gastrectomie', 'Bypass gastrique', 'Suivi nutritionnel & psychologique', 'Bilan métabolique complet']
            ],
            [
                'id' => 'soins-specialises',
                'title' => 'Cardiologie, Orthopédie & Spécialités',
                'badge' => 'Haute Technologie',
                'icon' => 'activity',
                'image' => 'soins-specialises.jpg',
                'description' => 'Interventions lourdes en chirurgie cardiaque, prothèses orthopédiques, oncologie et neurochirurgie sur plateaux de pointe.',
                'features' => ['Chirurgie cardiaque & angioplastie', 'Prothèses de hanche et genou', 'Soins ophtalmologiques & Lasik', 'Oncologie & Radiothérapie']
            ]
        ];

        return view('medical.index', compact('services'));
    }

    /**
     * Traitement du formulaire de demande de devis / rendez-vous médical.
     */
    public function storeRequest(Request $request)
    {
        $validated = $request->validate([
            'fullname'       => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'phone'          => 'required|string|max:50',
            'country'        => 'required|string|max:100',
            'service_type'   => 'required|string',
            'preferred_date' => 'nullable|date',
            'message'        => 'nullable|string|max:2000',
        ]);

        $medicalRequest = \App\Models\MedicalRequest::create($validated);

        // Notifier les administrateurs
        if (class_exists('\App\Models\AdminNotification')) {
            try {
                \App\Models\AdminNotification::create([
                    'title'   => 'Nouvelle Demande de Devis Médical',
                    'message' => 'Demande reçue de ' . $medicalRequest->fullname . ' (' . $medicalRequest->country . ') pour ' . $medicalRequest->service_type,
                    'type'    => 'medical_request',
                    'link'    => route('admin.medical-requests.index'),
                ]);
            } catch (\Exception $e) {
                // Ignore si la table de notif a un autre schéma
            }
        }

        return back()->with('success', 'Votre demande de devis médical a été transmise avec succès à notre équipe d\'experts (Réf. #' . $medicalRequest->id . '). Vous serez contacté sous 24h.');
    }
}
