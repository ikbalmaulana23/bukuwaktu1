<?php

namespace Database\Factories;

use App\Models\Audiobook;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audiobook>
 */
class AudiobookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Audiobook::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3), // Judul acak dengan 3 kata
            'speaker_id' => rand(1, 10), // Speaker ID acak antara 1 dan 20
            'cover' => 'audiobooks/covers/' . $this->faker->randomElement([
                'contoh.png',
                'contoh2.png',
                'contoh3.png',
                'contoh4.png',
            ]), // Gunakan file contoh sebagai cover
            'file_path' => 'audiobooks/' . $this->faker->randomElement([
                'contoh1.mp3',
                'contoh2.mp3',
                'contoh3.mp3',
                'contoh4.mp3'
            ]), // File audio dipilih secara acak
            'description' => $this->faker->paragraph(), // Deskripsi acak
        ];
    }
}
