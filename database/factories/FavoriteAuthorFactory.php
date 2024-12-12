<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\FavoriteAuthor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FavoriteAuthor>
 */
class FavoriteAuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = FavoriteAuthor::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Menggunakan factory User
            'favorite_author' => $this->faker->name(), // Nama author random
        ];
    }
}
