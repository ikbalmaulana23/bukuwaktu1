<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Self Development',
            'slug' => 'self-development'
        ]);

        Category::create([
            'name' => 'Novel',
            'slug' => 'novel'
        ]);
        Category::create([
            'name' => 'Psikologi',
            'slug' => 'psikologi'
        ]);
        Category::create([
            'name' => 'Sains',
            'slug' => 'sains'
        ]);
        Category::create([
            'name' => 'Kedokteran',
            'slug' => 'kedokteran'
        ]);
    }
}
