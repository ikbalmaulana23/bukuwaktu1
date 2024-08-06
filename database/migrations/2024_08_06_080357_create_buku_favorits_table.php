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
        Schema::create('buku_favorits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_profile')->constrained('users')->onDelete('cascade');
            $table->string('judul_buku');
            $table->string('penulis');
            $table->integer('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku_favorits');
    }
};
