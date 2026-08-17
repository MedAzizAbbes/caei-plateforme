<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('medical_requests', function (Blueprint $table) {
            // Lien vers le partenaire clinique (compte réel)
            $table->foreignId('partner_clinic_id')->nullable()->constrained('clinic_partners')->nullOnDelete()->after('partner_clinic');

            // Statut côté clinique
            $table->string('clinic_status')->default('pending_review')->after('partner_clinic_id');
            // pending_review | accepted | quoted | rejected

            // Notes de la clinique sur le dossier
            $table->text('clinic_notes')->nullable()->after('clinic_status');

            // Devis envoyé par la clinique
            $table->decimal('devis_amount', 10, 2)->nullable()->after('clinic_notes');
            $table->string('devis_currency', 10)->default('TND')->after('devis_amount');
            $table->text('devis_message')->nullable()->after('devis_currency');
            $table->timestamp('devis_sent_at')->nullable()->after('devis_message');
        });
    }

    public function down(): void
    {
        Schema::table('medical_requests', function (Blueprint $table) {
            $table->dropForeign(['partner_clinic_id']);
            $table->dropColumn(['partner_clinic_id', 'clinic_status', 'clinic_notes', 'devis_amount', 'devis_currency', 'devis_message', 'devis_sent_at']);
        });
    }
};
