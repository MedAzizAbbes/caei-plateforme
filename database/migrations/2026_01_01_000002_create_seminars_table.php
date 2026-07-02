<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seminars', function (Blueprint $table) {
            $table->id();
            $table->string('theme');
            $table->string('country');
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['draft', 'published', 'closed'])->default('draft');
            $table->foreignId('created_by')->constrained('users'); // admin CAEI qui a créé le séminaire
            $table->timestamps();
        });

        // Table pivot : un séminaire peut avoir plusieurs formateurs,
        // un formateur peut intervenir sur plusieurs séminaires.
        Schema::create('seminar_trainer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seminar_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['seminar_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seminar_trainer');
        Schema::dropIfExists('seminars');
    }
};
