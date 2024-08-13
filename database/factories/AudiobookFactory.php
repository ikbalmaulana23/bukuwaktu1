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
            'title' => $this->faker->sentence(3), // judul acak dengan 3 kata
            'speaker_id' => 1, // buat speaker baru dan ambil ID-nya
            'cover' => 'audiobooks/covers/contoh.png', // gunakan file contoh.jpg sebagai cover
            'file_path' => 'audiobooks/contoh.mp3',
            'description' => $this->faker->paragraph(), // deskripsi acak
        ];
    }
}
