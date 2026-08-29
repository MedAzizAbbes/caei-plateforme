<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Mettre à jour les anciennes valeurs avant de modifier l'ENUM
        DB::statement("UPDATE call_center_requests SET status = 'Non traité' WHERE status = 'Nouveau'");
        DB::statement("UPDATE call_center_requests SET status = 'En cours de traitement' WHERE status = 'En cours'");

        // Modifier la colonne ENUM avec les nouvelles valeurs
        DB::statement("ALTER TABLE call_center_requests MODIFY COLUMN status ENUM('Non traité', 'En cours de traitement', 'Traité') NOT NULL DEFAULT 'Non traité'");
    }

    public function down(): void
    {
        // Remettre les anciennes valeurs
        DB::statement("UPDATE call_center_requests SET status = 'Nouveau' WHERE status = 'Non traité'");
        DB::statement("UPDATE call_center_requests SET status = 'En cours' WHERE status = 'En cours de traitement'");

        DB::statement("ALTER TABLE call_center_requests MODIFY COLUMN status ENUM('Nouveau', 'En cours', 'Traité') NOT NULL DEFAULT 'Nouveau'");
    }
};
