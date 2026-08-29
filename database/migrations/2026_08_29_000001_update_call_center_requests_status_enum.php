<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Étape 1 : Élargir l'ENUM pour accepter TOUTES les valeurs (anciennes + nouvelles)
        DB::statement("ALTER TABLE call_center_requests MODIFY COLUMN status ENUM('Nouveau', 'En cours', 'Traité', 'Non traité', 'En cours de traitement') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nouveau'");

        // Étape 2 : Migrer les données vers les nouvelles valeurs
        DB::statement("UPDATE call_center_requests SET status = 'Non traité' WHERE status = 'Nouveau'");
        DB::statement("UPDATE call_center_requests SET status = 'En cours de traitement' WHERE status = 'En cours'");

        // Étape 3 : Réduire l'ENUM aux nouvelles valeurs uniquement
        DB::statement("ALTER TABLE call_center_requests MODIFY COLUMN status ENUM('Non traité', 'En cours de traitement', 'Traité') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Non traité'");
    }

    public function down(): void
    {
        // Étape 1 : Élargir l'ENUM pour la rollback
        DB::statement("ALTER TABLE call_center_requests MODIFY COLUMN status ENUM('Nouveau', 'En cours', 'Traité', 'Non traité', 'En cours de traitement') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Non traité'");

        // Étape 2 : Remettre les anciennes valeurs
        DB::statement("UPDATE call_center_requests SET status = 'Nouveau' WHERE status = 'Non traité'");
        DB::statement("UPDATE call_center_requests SET status = 'En cours' WHERE status = 'En cours de traitement'");

        // Étape 3 : Réduire aux anciennes valeurs
        DB::statement("ALTER TABLE call_center_requests MODIFY COLUMN status ENUM('Nouveau', 'En cours', 'Traité') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nouveau'");
    }
};
