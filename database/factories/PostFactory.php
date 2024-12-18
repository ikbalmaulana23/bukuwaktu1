<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => implode(' ', fake()->words(rand(2, 4))),
            'author_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => Str::slug(fake()->sentence()),
            'body' => implode("\n\n", fake()->paragraphs(fake()->numberBetween(5, 10))),
            'cover' => 'img/' . $this->faker->randomElement([
                'contoh1.png',
                'contoh2.png',
                'contoh3.png',
                'contoh4.png',
            ])
        ];
    }
}
