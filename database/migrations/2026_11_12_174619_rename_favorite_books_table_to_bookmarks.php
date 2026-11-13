<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename('favorite_books', 'bookmarks');

        Schema::table('bookmarks', function (Blueprint $table) {
            $table->renameColumn('favorite_book_image', 'image');
            $table->renameColumn('favorite_book_title', 'title');
            $table->renameColumn('favorite_book_rate', 'rate');
            $table->renameColumn('favorite_book_description', 'description');
        });
    }

    public function down(): void
    {
        Schema::table('bookmarks', function (Blueprint $table) {
            $table->renameColumn('image', 'favorite_book_image');
            $table->renameColumn('title', 'favorite_book_title');
            $table->renameColumn('rate', 'favorite_book_rate');
            $table->renameColumn('description', 'favorite_book_description');
        });

        Schema::rename('bookmarks', 'favorite_books');
    }
};
