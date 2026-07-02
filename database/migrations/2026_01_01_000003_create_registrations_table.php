<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();       // participant
            $table->foreignId('seminar_id')->constrained()->cascadeOnDelete();
            $table->enum('status', ['inscrit', 'present', 'absent'])->default('inscrit');
            $table->timestamp('registered_at')->useCurrent();
            $table->timestamps();

            // un participant ne peut s'inscrire qu'une seule fois au même séminaire
            $table->unique(['user_id', 'seminar_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
