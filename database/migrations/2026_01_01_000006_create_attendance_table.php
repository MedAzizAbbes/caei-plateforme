<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->constrained()->cascadeOnDelete();
            $table->foreignId('seminar_id')->constrained()->cascadeOnDelete(); // dénormalisé pour requêtes rapides
            $table->foreignId('scanned_by')->nullable()->constrained('users'); // admin/formateur qui a scanné
            $table->enum('method', ['qr', 'manuel'])->default('qr');
            $table->timestamp('scanned_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
