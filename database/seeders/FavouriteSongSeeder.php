<?php

namespace Database\Seeders;

use App\Models\Relations\FavouriteSong;
use Illuminate\Database\Seeder;

class FavouriteSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FavouriteSong::factory()->create([
            'user_id' => 1,
            'song_id' => 1,
        ]);

        FavouriteSong::factory()->create([
            'user_id' => 1,
            'song_id' => 2,
        ]);

        FavouriteSong::factory()->create([
            'user_id' => 1,
            'song_id' => 30,
        ]);

        FavouriteSong::factory()->create([
            'user_id' => 1,
            'song_id' => 32,
        ]);

        FavouriteSong::factory()->create([
            'user_id' => 1,
            'song_id' => 22,
        ]);

        FavouriteSong::factory()->create([
            'user_id' => 1,
            'song_id' => 12,
        ]);

        FavouriteSong::factory()->create([
            'user_id' => 2,
            'song_id' => 10,
        ]);

        FavouriteSong::factory()->create([
            'user_id' => 2,
            'song_id' => 11,
        ]);

        FavouriteSong::factory()->create([
            'user_id' => 2,
            'song_id' => 12,
        ]);

        FavouriteSong::factory()->create([
            'user_id' => 2,
            'song_id' => 13,
        ]);

        FavouriteSong::factory()->create([
            'user_id' => 2,
            'song_id' => 28,
        ]);

        FavouriteSong::factory()->create([
            'user_id' => 3,
            'song_id' => 19,
        ]);

        FavouriteSong::factory()->create([
            'user_id' => 3,
            'song_id' => 29,
        ]);

        FavouriteSong::factory()->create([
            'user_id' => 3,
            'song_id' => 22,
        ]);

        FavouriteSong::factory()->create([
            'user_id' => 3,
            'song_id' => 20,
        ]);

        FavouriteSong::factory()->create([
            'user_id' => 3,
            'song_id' => 33,
        ]);
    }
}
