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
            'email' => 'ikbalmaulanaalfatih@gmail.com',
            'password' => 'admin123'

        ]);
        User::create([

            'name' => 'fizi',
            'username' => 'fizi',
            'bio' => 'someone',
            'email' => 'fizi@gmail.com',
            'password' => '12345678'

        ]);

        User::factory(10)->create();
    }
}
