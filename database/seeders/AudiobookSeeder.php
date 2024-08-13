<?php

namespace Database\Seeders;

use App\Models\Audiobook;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AudiobookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Audiobook::create([
            'title' => 'The First 20 Hours',
            'speaker_id' => 1,
            'cover' => 'audiobooks/covers/contoh.png',
            'file_path' => 'audiobooks/contoh.mp3',
            'description' => 'What the perfect hour to start to learn new skills?'
        ]);

        Audiobook::create([
            'title' => 'Show Your Work!',
            'speaker_id' => 1,
            'cover' => 'audiobooks/covers/contoh2.png',
            'file_path' => 'audiobooks/contoh2.mp3',
            'description' => 'You Dont have to be a Genius'
        ]);

        Audiobook::create([
            'title' => 'Love for Imperfect Things',
            'speaker_id' => 2,
            'cover' => 'audiobooks/covers/contoh3.png',
            'file_path' => 'audiobooks/contoh3.mp3',
            'description' => 'Love Our Self'
        ]);

        Audiobook::create([
            'title' => 'Men Are From Mars, Women Are From Venus',
            'speaker_id' => 3,
            'cover' => 'audiobooks/covers/contoh4.png',
            'file_path' => 'audiobooks/contoh4.mp3',
            'description' => 'If we are to feel the positive feelings of love, happiness, trust, and gratitude, we periodically also have to feel anger, sadness, fear, and sorrow.'
        ]);
    }
}
