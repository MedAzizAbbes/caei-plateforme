<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clinic_partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('name');                         // Ex: Clinique Beau Séjour
            $table->string('slug')->unique();               // beau-sejour
            $table->string('city')->nullable();             // Tunis
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('specialty')->nullable();        // Ex: Chirurgie esthétique
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clinic_partners');
    }
};
