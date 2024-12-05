<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FavoriteBook>
 */
class FavoriteBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10), // Membuat user secara otomatis
            'favorite_book_image' => 'img/' . $this->faker->randomElement([
                'contoh1.png',
                'contoh2.png',
                'contoh3.png',
                'contoh4.png',
            ]),
            'favorite_book_title' => $this->faker->sentence(3), // Judul buku
            'favorite_book_rate' => $this->faker->randomFloat(1, 0, 5), // Rating antara 0-5
            'favorite_book_description' => $this->faker->paragraph(), // Deskripsi buku
        ];
    }
}
