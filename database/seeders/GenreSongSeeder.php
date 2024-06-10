<?php

namespace Database\Seeders;

use App\Models\Relations\GenreSong;
use Illuminate\Database\Seeder;

class GenreSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ID:1
        GenreSong::factory()->create([
            'genre_id' => 1,
            'song_id' => 1,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 1,
            'song_id' => 2,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 1,
            'song_id' => 3,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 1,
            'song_id' => 4,
        ]);
        // ID:2
        GenreSong::factory()->create([
            'genre_id' => 1,
            'song_id' => 5,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 1,
            'song_id' => 6,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 1,
            'song_id' => 7,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 1,
            'song_id' => 8,
        ]);
        // ID:3
        GenreSong::factory()->create([
            'genre_id' => 1,
            'song_id' => 9,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 1,
            'song_id' => 10,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 1,
            'song_id' => 11,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 1,
            'song_id' => 12,
        ]);
        // ID:4
        GenreSong::factory()->create([
            'genre_id' => 2,
            'song_id' => 13,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 2,
            'song_id' => 14,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 2,
            'song_id' => 15,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 2,
            'song_id' => 16,
        ]);
        // ID:5
        GenreSong::factory()->create([
            'genre_id' => 2,
            'song_id' => 17,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 2,
            'song_id' => 18,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 2,
            'song_id' => 19,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 2,
            'song_id' => 20,
        ]);
        // ID:6
        GenreSong::factory()->create([
            'genre_id' => 3,
            'song_id' => 21,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 3,
            'song_id' => 22,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 3,
            'song_id' => 23,
        ]);
        // ID:7
        GenreSong::factory()->create([
            'genre_id' => 4,
            'song_id' => 24,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 4,
            'song_id' => 25,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 4,
            'song_id' => 26,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 4,
            'song_id' => 27,
        ]);
        // ID:8
        GenreSong::factory()->create([
            'genre_id' => 5,
            'song_id' => 28,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 5,
            'song_id' => 29,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 5,
            'song_id' => 30,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 5,
            'song_id' => 31,
        ]);
        // ID:9
        GenreSong::factory()->create([
            'genre_id' => 6,
            'song_id' => 32,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 6,
            'song_id' => 33,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 6,
            'song_id' => 34,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 6,
            'song_id' => 35,
        ]);

        GenreSong::factory()->create([
            'genre_id' => 6,
            'song_id' => 36,
        ]);
    }
}
