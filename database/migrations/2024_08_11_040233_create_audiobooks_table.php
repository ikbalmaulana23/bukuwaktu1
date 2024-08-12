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
        Schema::create('audiobooks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('speaker_id')->constrained('users')->onDelete('cascade'); // Menambahkan kolom speaker_id
            $table->string('cover')->nullable();
            $table->string('file_path'); // Path to the audio file
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audiobooks');
    }
};
