<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('registration_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('seminar_id')->constrained()->cascadeOnDelete();

            $table->enum('payment_method', ['bank_transfer', 'visa', 'arrangement'])->nullable();
            $table->enum('status', ['unpaid', 'pending', 'arrangement_pending', 'paid', 'rejected'])
                  ->default('unpaid');

            // Champs arrangement
            $table->string('arrangement_type')->nullable();       // Entreprise, Université, Administration, Autre
            $table->string('organization_name')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('arrangement_document')->nullable();   // Chemin fichier justificatif
            $table->text('arrangement_reason')->nullable();

            // Administration
            $table->text('admin_note')->nullable();

            // Chemins des documents générés
            $table->string('attestation_path')->nullable();
            $table->string('invitation_path')->nullable();

            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
