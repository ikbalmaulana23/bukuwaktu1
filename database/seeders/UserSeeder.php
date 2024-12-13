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
            'profile_photo' => fake()->randomElement(['avatar1.jpg', 'avatar2.jpg', 'avatar3.jpg', 'avatar4.jpg']), // Pilihan acak untuk profile_photo
            'email' => 'ikbalmaulanaalfatih@gmail.com',
            'password' =>  bcrypt('password'),

        ]);
        User::create([

            'name' => 'fizi',
            'username' => 'fizi',
            'bio' => 'someone',
            'profile_photo' => fake()->randomElement(['avatar1.jpg', 'avatar2.jpg', 'avatar3.jpg', 'avatar4.jpg']), // Pilihan acak untuk profile_photo
            'email' => 'fizi@gmail.com',
            'password' =>  bcrypt('password'),
            'role' => 'podcaster',
        ]);
    }
}
