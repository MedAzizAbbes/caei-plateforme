<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Modifier la colonne role de la table users en VARCHAR(191)
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 191)->default('participant')->change();
        });

        // 2. Table Prospects
        if (!Schema::hasTable('prospects')) {
            Schema::create('prospects', function (Blueprint $table) {
                $table->id();
                $table->foreignId('agent_id')->constrained('users')->onDelete('cascade');
                $table->string('nom');
                $table->string('prenom')->nullable();
                $table->string('email')->nullable();
                $table->string('telephone');
                $table->string('societe')->nullable();
                $table->string('secteur')->nullable();
                $table->string('adresse')->nullable();
                $table->text('notes')->nullable();
                $table->timestamps();
            });
        }

        // 3. Table Rendez-vous
        if (!Schema::hasTable('rendez_vous')) {
            Schema::create('rendez_vous', function (Blueprint $table) {
                $table->id();
                $table->foreignId('prospect_id')->constrained('prospects')->onDelete('cascade');
                $table->foreignId('agent_id')->constrained('users')->onDelete('cascade');
                $table->foreignId('partenaire_id')->nullable()->constrained('users')->onDelete('set null');
                $table->date('date_rendez_vous');
                $table->time('heure_rendez_vous');
                $table->string('objet');
                $table->text('notes')->nullable();
                $table->string('statut', 50)->default('en_attente_affectation');
                $table->timestamp('assigned_at')->nullable();
                $table->timestamps();
            });
        }

        // 4. Table Qualifications
        if (!Schema::hasTable('qualifications')) {
            Schema::create('qualifications', function (Blueprint $table) {
                $table->id();
                $table->foreignId('rendez_vous_id')->constrained('rendez_vous')->onDelete('cascade');
                $table->foreignId('partenaire_id')->constrained('users')->onDelete('cascade');
                $table->string('resultat');
                $table->string('potentiel');
                $table->text('commentaire')->nullable();
                $table->timestamp('qualified_at')->nullable();
                $table->timestamps();
            });
        }

        // 5. Table Historique des Rendez-vous
        if (!Schema::hasTable('rendez_vous_histories')) {
            Schema::create('rendez_vous_histories', function (Blueprint $table) {
                $table->id();
                $table->foreignId('rendez_vous_id')->constrained('rendez_vous')->onDelete('cascade');
                $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
                $table->string('action');
                $table->text('description');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('rendez_vous_histories');
        Schema::dropIfExists('qualifications');
        Schema::dropIfExists('rendez_vous');
        Schema::dropIfExists('prospects');
    }
};
