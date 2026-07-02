<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seminar_id')->constrained()->cascadeOnDelete();
            $table->foreignId('uploaded_by')->constrained('users');
            $table->string('title');
            $table->enum('type', ['pdf', 'pptx', 'video', 'autre'])->default('pdf');
            $table->string('file_path');       // chemin du fichier sur le disque (storage/documents)
            $table->unsignedTinyInteger('day_number')->default(1); // 1 = Jour 1, 2 = Jour 2 ...
            $table->unsignedInteger('size_kb')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
