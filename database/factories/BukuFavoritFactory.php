<?php

namespace Database\Factories;

use App\Models\BukuFavorit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BukuFavorit>
 */
class BukuFavoritFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = BukuFavorit::class;

    public function definition()
    {
        return [
            'id_profile' => $this->faker->numberBetween(1, 10),
            'judul_buku' => $this->faker->sentence,
            'penulis' => $this->faker->name,
            'rating' => $this->faker->numberBetween(3, 5),
        ];
    }
}
