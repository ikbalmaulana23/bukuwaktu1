<?php

namespace Database\Seeders;

use App\Models\InterestGenre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InterestGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InterestGenre::factory(10)->create();
    }
}
