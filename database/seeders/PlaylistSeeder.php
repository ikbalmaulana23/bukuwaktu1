<?php

namespace Database\Seeders;

use App\Models\playlist;
use App\Models\Audiobook;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Buat beberapa playlist
        Playlist::factory(5) // Buat 5 playlist
            ->hasAttached(
                Audiobook::factory(10)->create(), // Tambahkan 10 audiobook ke setiap playlist
                [
                    'order' => fake()->numberBetween(1, 10), // Random order
                    'added_at' => now(), // Waktu sekarang
                ]
            )
            ->create();
    }
}
