<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Prospect;
use App\Models\RendezVous;
use App\Models\Qualification;
use App\Models\RendezVousHistory;
use Illuminate\Support\Facades\Hash;

class CallCenterSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Création Agent Call Center
        $agent = User::updateOrCreate(
            ['email' => 'agent@caei.com'],
            [
                'first_name' => 'Sami',
                'last_name'  => 'Agent',
                'phone'      => '+216 20 111 222',
                'role'       => 'callcenter_agent',
                'password'   => Hash::make('password123'),
            ]
        );

        // 2. Création Partenaire Commercial
        $partenaire = User::updateOrCreate(
            ['email' => 'partenaire@caei.com'],
            [
                'first_name'  => 'Leila',
                'last_name'   => 'Partenaire',
                'phone'       => '+216 50 333 444',
                'institution' => 'Cabinet Audit & Partner',
                'role'        => 'callcenter_partenaire',
                'password'    => Hash::make('password123'),
            ]
        );

        // 3. Création Prospects de test
        $prospect1 = Prospect::create([
            'agent_id'  => $agent->id,
            'nom'       => 'Ben Salem',
            'prenom'    => 'Youssef',
            'email'     => 'youssef.bensalem@tech.tn',
            'telephone' => '+216 98 123 456',
            'societe'   => 'Tech Innovation SARL',
            'secteur'   => 'Technologies & Digital',
            'notes'     => 'Prospect très intéressé par le contrat de maintenance call center 24/7.',
        ]);

        $prospect2 = Prospect::create([
            'agent_id'  => $agent->id,
            'nom'       => 'Trabelsi',
            'prenom'    => 'Amira',
            'email'     => 'amira.trabelsi@assur.com',
            'telephone' => '+216 22 987 654',
            'societe'   => 'Assurance Horizon',
            'secteur'   => 'Assurance',
            'notes'     => 'Recherche une équipe dédiée pour la téléprospection mutuelle entreprise.',
        ]);

        // 4. Création Rendez-vous
        $rdv1 = RendezVous::create([
            'prospect_id'       => $prospect1->id,
            'agent_id'          => $agent->id,
            'partenaire_id'     => $partenaire->id,
            'date_rendez_vous'  => now()->addDays(1)->format('Y-m-d'),
            'heure_rendez_vous' => '10:30:00',
            'objet'             => 'Présentation Offre Support Technique Dedicated',
            'notes'             => 'Présentation visioconférence avec le directeur général.',
            'statut'            => 'qualifie',
            'assigned_at'       => now(),
        ]);

        $rdv2 = RendezVous::create([
            'prospect_id'       => $prospect2->id,
            'agent_id'          => $agent->id,
            'partenaire_id'     => null, // En attente affectation par Admin
            'date_rendez_vous'  => now()->addDays(2)->format('Y-m-d'),
            'heure_rendez_vous' => '14:00:00',
            'objet'             => 'Téléprospection Gamme Mutuelle Entreprise',
            'notes'             => 'Prospect disponible uniquement l\'après-midi.',
            'statut'            => 'en_attente_affectation',
        ]);

        // 5. Qualification de test pour rdv1
        Qualification::create([
            'rendez_vous_id' => $rdv1->id,
            'partenaire_id'  => $partenaire->id,
            'resultat'       => 'Prospect qualifié',
            'potentiel'      => 'Élevé',
            'commentaire'    => 'Entretien très positif. Le client valide la proposition technique et souhaite signer le contrat annuel.',
            'qualified_at'   => now(),
        ]);

        // 6. Logs de test
        RendezVousHistory::log($rdv1->id, $agent->id, 'creation', "RDV créé par l'agent {$agent->fullName()}");
        RendezVousHistory::log($rdv1->id, 1, 'affectation', "RDV affecté au partenaire {$partenaire->fullName()}");
        RendezVousHistory::log($rdv1->id, $partenaire->id, 'qualification', "RDV qualifié avec succès");

        RendezVousHistory::log($rdv2->id, $agent->id, 'creation', "RDV créé par l'agent {$agent->fullName()}");
    }
}
