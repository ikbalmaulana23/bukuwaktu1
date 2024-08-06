<?php

namespace Database\Seeders;

use App\Models\BukuFavorit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BukuFavoritSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        BukuFavorit::factory()->count(30)->create();
    }
}
