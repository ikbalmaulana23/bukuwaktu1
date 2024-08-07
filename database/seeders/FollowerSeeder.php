<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $followerFactory = new \Database\Factories\FollowerFactory();

        foreach (range(1, 20) as $index) {
            do {
                $relation = $followerFactory->definition();
                $exists = DB::table('followers')
                    ->where('user_id', $relation['user_id'])
                    ->where('follower_id', $relation['follower_id'])
                    ->exists();
            } while ($exists || $relation['user_id'] === $relation['follower_id']);

            DB::table('followers')->insert([
                'user_id' => $relation['user_id'],
                'follower_id' => $relation['follower_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
