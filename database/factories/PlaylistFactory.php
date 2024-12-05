<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\playlist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Playlist>
 */
class PlaylistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = playlist::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Factory user terkait
            'name' => $this->faker->sentence(3), // Nama playlist
            'description' => $this->faker->text(100), // Deskripsi playlist
            'is_public' => $this->faker->boolean(), // Status publik
        ];
    }
}
