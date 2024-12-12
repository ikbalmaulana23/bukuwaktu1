<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\FavoriteAuthor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FavoriteAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        // Jika ada user, tambahkan beberapa favorite author
        foreach ($users as $user) {
            // Membuat beberapa favorite author untuk setiap user
            FavoriteAuthor::create([
                'user_id' => $user->id,
                'favorite_author' => fake()->name(), // Menggunakan fake name untuk author
            ]);

            FavoriteAuthor::create([
                'user_id' => $user->id,
                'favorite_author' => fake()->name(),
            ]);
        }
    }
}
