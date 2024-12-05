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
        Schema::table('posts', function (Blueprint $table) {
            $table->enum('type', ['rangkuman', 'resensi'])->default('rangkuman'); // Tipe dengan nilai default 'rangkuman'
            $table->boolean('is_audited')->default(true); // Lolos audit dengan nilai default true
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['type', 'is_audited']);
        });
    }
};
