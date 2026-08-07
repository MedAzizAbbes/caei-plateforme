<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formation;

class CycleSeeder extends Seeder
{
    public function run()
    {
        $cycles = [
            ['code' => 'CP-001', 'title' => 'Cycle de perfectionnement Manager Spécialiste en Sécurité Alimentaire', 'duration' => '2 Semaines', 'price' => 3400, 'description' => 'Maîtrisez les normes et outils pour garantir la sécurité alimentaire dans tout type de structure.', 'type' => 'cycle', 'domain' => 'Qualité, Hygiène, Sécurité & Environnement', 'status' => 'active'],
            ['code' => 'CP-002', 'title' => 'Cycle perfectionnement Manager Spécialiste en Hygiène Alimentaire', 'duration' => '2 Semaines', 'price' => 3400, 'description' => 'Maîtrisez les normes et outils pour garantir l’hygiène alimentaire dans tous types de structures.', 'type' => 'cycle', 'domain' => 'Qualité, Hygiène, Sécurité & Environnement', 'status' => 'active'],
            ['code' => 'CP-003', 'title' => 'Cycle perfectionnement Manager Spécialiste en Suivi et Évaluation des Projets Agricoles', 'duration' => '2 Semaines', 'price' => 3400, 'description' => 'Développez les compétences nécessaires pour planifier, suivre et évaluer efficacement les projets agricoles selon les normes internationales.', 'type' => 'cycle', 'domain' => 'Projets & Programmes de Développement', 'status' => 'active'],
            ['code' => 'CP-004', 'title' => 'Cycle perfectionnement Manager Spécialiste en Entrepreneuriat agricole', 'duration' => '2 Semaines', 'price' => 3400, 'description' => 'Acquérez les clés pour lancer, gérer et développer avec succès des projets agro-entrepreneuriaux durables et innovants.', 'type' => 'cycle', 'domain' => 'Projets & Programmes de Développement', 'status' => 'active'],
            ['code' => 'CP-005', 'title' => 'Cycle perfectionnement Manager Spécialiste en Gestion des crises alimentaires', 'duration' => '2 Semaines', 'price' => 3400, 'description' => 'Formez-vous à anticiper, gérer et atténuer les crises alimentaires grâce à des outils de gestion et d\'intervention efficaces.', 'type' => 'cycle', 'domain' => 'Management & Governance', 'status' => 'active'],
            ['code' => 'CP-006', 'title' => 'Cycle de perfectionnement Manager Spécialiste en Gestion des Ouvrages d’eau et d’assainissement', 'duration' => '2 Semaines', 'price' => 3400, 'description' => 'Maîtrisez la gestion, le suivi et la maintenance des ouvrages d’eau et d’assainissement pour garantir un accès durable aux services essentiels.', 'type' => 'cycle', 'domain' => 'Qualité, Hygiène, Sécurité & Environnement', 'status' => 'active'],
            ['code' => 'CP-007', 'title' => 'Cycle perfectionnement Manager Spécialiste en Gestion Participative des Ressources Naturelles', 'duration' => '2 Semaines', 'price' => 3400, 'description' => 'Apprenez à mobiliser les acteurs locaux et à gérer durablement les ressources naturelles à travers des approches participatives et inclusives.', 'type' => 'cycle', 'domain' => 'E-Commerce, Fintech & Développement Durable', 'status' => 'active'],
            ['code' => 'CP-008', 'title' => 'Cycle perfectionnement Manager Spécialiste en Gestion Agricole', 'duration' => '2 Semaines', 'price' => 3400, 'description' => 'Développez vos compétences en planification, pilotage et optimisation des activités agricoles pour une gestion efficace et durable des exploitations.', 'type' => 'cycle', 'domain' => 'Management & Governance', 'status' => 'active'],
            ['code' => 'CP-009', 'title' => 'Cycle perfectionnement Manager Spécialiste en Sauvegarde Environnementale', 'duration' => '2 Semaines', 'price' => 3400, 'description' => 'Maîtrisez les stratégies et outils de protection de l’environnement pour intégrer la durabilité dans les projets et politiques de développement.', 'type' => 'cycle', 'domain' => 'Qualité, Hygiène, Sécurité & Environnement', 'status' => 'active'],
            ['code' => 'CP-010', 'title' => 'Cycle de perfectionnement aux procédures douanières', 'duration' => '2 Semaines', 'price' => 3400, 'description' => 'Maîtriser les procédures douanières pour optimiser les opérations d’import-export en conformité avec la réglementation en vigueur.', 'type' => 'cycle', 'domain' => 'Audit, Comptabilité & Finance', 'status' => 'active'],
            ['code' => 'CP-011', 'title' => 'Cycle de perfectionnement Manager Spécialiste en ingénierie de la formation', 'duration' => '2 Semaines', 'price' => 3400, 'description' => 'Maîtrisez les méthodes clés pour concevoir et piloter des formations performantes en entreprise.', 'type' => 'cycle', 'domain' => 'Gestion des Ressources Humaines', 'status' => 'active'],
            ['code' => 'CP-012', 'title' => 'Cycle perfectionnement Manager Spécialiste en système de management environnemental', 'duration' => '2 Semaines', 'price' => 3400, 'description' => 'Maîtrisez les systèmes et outils essentiels pour piloter efficacement la performance environnementale en organisation.', 'type' => 'cycle', 'domain' => 'Qualité, Hygiène, Sécurité & Environnement', 'status' => 'active'],
            ['code' => 'CP-013', 'title' => 'Cycle perfectionnement Manager Spécialiste gestion des marchés publics', 'duration' => '2 Semaines', 'price' => 3400, 'description' => 'Maîtrisez les procédures et bonnes pratiques pour gérer efficacement les marchés publics.', 'type' => 'cycle', 'domain' => 'Marchés Publics', 'status' => 'active'],
            ['code' => 'CP-014', 'title' => 'Cycle perfectionnement en développement personnel', 'duration' => '2 Semaines', 'price' => 3400, 'description' => 'Développez vos compétences personnelles pour mieux réussir vos défis professionnels et personnels.', 'type' => 'cycle', 'domain' => 'Soft Skills & Développement Personnel', 'status' => 'active'],
        ];

        foreach ($cycles as $c) {
            Formation::updateOrCreate(['code' => $c['code']], $c);
        }
    }
}
