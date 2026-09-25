<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ikbal Maulana',
            'username' => 'ikbalmaulana',
            'bio' => 'Hidup yang tidak diperjuangkan, tidak pernah dimenangkan',
            'profile_photo' => 'avatar2.jpg',
            'email' => 'ikbalmaulanaalfatih@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'ferina anggraini',
            'username' => 'ferina anggraini',
            'bio' => 'life is choice, i dare to choice',
            'profile_photo' => 'avatar1.jpg',
            'email' => 'ferinaanggraini@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        User::factory(10)->create();
    }
}
