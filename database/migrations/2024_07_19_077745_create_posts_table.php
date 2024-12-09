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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('author_id')->nullable()->constrained(
                table: 'users',
                indexName: 'posts_author_id'
            );
            $table->foreignId('category_id')->nullable()->constrained(
                table: 'categories',
                indexName: 'posts_category_id'
            );
            $table->string('cover')->nullable();
            $table->string('slug')->unique();
            $table->text('body');
            $table->enum('type', ['rangkuman', 'resensi'])->default('rangkuman'); // Tipe dengan nilai default 'rangkuman'
            $table->boolean('is_audited')->default(true); // Lolos audit dengan nilai default true
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
