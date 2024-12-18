<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Audiobook;
use Illuminate\Support\Str;
use App\Models\FavoriteBook;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\FollowerSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\FavoriteAuthorSeeder;
use Database\Factories\FavoriteBookFactory;
use Database\Factories\FavoriteAuthorFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([CategorySeeder::class]);
        Post::factory(100)->recycle([
            Category::all(),
            User::all(),
        ])->create();
        FavoriteBook::factory()->count(50)->create();
        $this->call(FollowerSeeder::class);
        Audiobook::factory()->count(100)->create();
        $this->call(PlaylistSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(InterestGenreSeeder::class);
        $this->call(FavoriteAuthorSeeder::class);
    }
}
