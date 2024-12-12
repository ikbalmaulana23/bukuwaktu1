<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\InterestGenre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InterestGenre>
 */
class InterestGenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = InterestGenre::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Factory untuk User
            'genre' => $this->faker->randomElement(['Action', 'Comedy', 'Drama', 'Fantasy', 'Horror']), // Genre random
        ];
    }
}
