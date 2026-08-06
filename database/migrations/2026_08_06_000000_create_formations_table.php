<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable(); // ex: ACF-010, INT-001, MBA-001
            $table->string('title');
            $table->enum('type', ['certifiante', 'diplomante', 'sur_mesure', 'elearning'])->default('certifiante');
            $table->string('domain')->nullable(); // ex: Audit, Comptabilité & Finance, Soft Skills, etc.
            $table->string('duration')->nullable(); // ex: 1 semaine, 2 semaines, 10 jours
            $table->decimal('price', 10, 2)->nullable(); // ex: 1900.00, 3300.00 (null pour sur devis)
            $table->text('description')->nullable();
            $table->text('objectives')->nullable();
            $table->text('target_audience')->nullable();
            $table->string('location')->nullable()->default('Tunis, Tunisie & En ligne');
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
