<?php

namespace Database\Seeders;

use App\Models\Relations\UserSong;
use Illuminate\Database\Seeder;

class UserSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ID:1
        UserSong::factory()->create([
            'user_id' => 3,
            'song_id' => 1,
        ]);

        UserSong::factory()->create([
            'user_id' => 3,
            'song_id' => 2,
        ]);

        UserSong::factory()->create([
            'user_id' => 3,
            'song_id' => 3,
        ]);

        UserSong::factory()->create([
            'user_id' => 3,
            'song_id' => 4,
        ]);

        // ID:2
        UserSong::factory()->create([
            'user_id' => 4,
            'song_id' => 5,
        ]);

        UserSong::factory()->create([
            'user_id' => 4,
            'song_id' => 6,
        ]);

        UserSong::factory()->create([
            'user_id' => 4,
            'song_id' => 7,
        ]);

        UserSong::factory()->create([
            'user_id' => 4,
            'song_id' => 8,
        ]);
        // ID:3
        UserSong::factory()->create([
            'user_id' => 5,
            'song_id' => 9,
        ]);

        UserSong::factory()->create([
            'user_id' => 5,
            'song_id' => 10,
        ]);

        UserSong::factory()->create([
            'user_id' => 5,
            'song_id' => 11,
        ]);

        UserSong::factory()->create([
            'user_id' => 5,
            'song_id' => 12,
        ]);
        // ID:4
        UserSong::factory()->create([
            'user_id' => 6,
            'song_id' => 13,
        ]);

        UserSong::factory()->create([
            'user_id' => 6,
            'song_id' => 14,
        ]);

        UserSong::factory()->create([
            'user_id' => 6,
            'song_id' => 15,
        ]);

        UserSong::factory()->create([
            'user_id' => 6,
            'song_id' => 16,
        ]);
        // ID:5
        UserSong::factory()->create([
            'user_id' => 7,
            'song_id' => 17,
        ]);

        UserSong::factory()->create([
            'user_id' => 7,
            'song_id' => 18,
        ]);

        UserSong::factory()->create([
            'user_id' => 7,
            'song_id' => 19,
        ]);

        UserSong::factory()->create([
            'user_id' => 7,
            'song_id' => 20,
        ]);
        // ID:6
        UserSong::factory()->create([
            'user_id' => 8,
            'song_id' => 21,
        ]);

        UserSong::factory()->create([
            'user_id' => 8,
            'song_id' => 22,
        ]);

        UserSong::factory()->create([
            'user_id' => 8,
            'song_id' => 23,
        ]);
        // ID:7
        UserSong::factory()->create([
            'user_id' => 9,
            'song_id' => 24,
        ]);

        UserSong::factory()->create([
            'user_id' => 9,
            'song_id' => 25,
        ]);

        UserSong::factory()->create([
            'user_id' => 9,
            'song_id' => 26,
        ]);

        UserSong::factory()->create([
            'user_id' => 9,
            'song_id' => 27,
        ]);
        // ID:8
        UserSong::factory()->create([
            'user_id' => 10,
            'song_id' => 28,
        ]);

        UserSong::factory()->create([
            'user_id' => 10,
            'song_id' => 29,
        ]);

        UserSong::factory()->create([
            'user_id' => 10,
            'song_id' => 30,
        ]);

        UserSong::factory()->create([
            'user_id' => 10,
            'song_id' => 31,
        ]);
        // ID:9
        UserSong::factory()->create([
            'user_id' => 11,
            'song_id' => 32,
        ]);

        UserSong::factory()->create([
            'user_id' => 11,
            'song_id' => 33,
        ]);

        UserSong::factory()->create([
            'user_id' => 11,
            'song_id' => 34,
        ]);

        UserSong::factory()->create([
            'user_id' => 11,
            'song_id' => 35,
        ]);

        UserSong::factory()->create([
            'user_id' => 11,
            'song_id' => 36,
        ]);
        // ID:10
        UserSong::factory()->create([
            'user_id' => 3,
            'song_id' => 37,
        ]);

        UserSong::factory()->create([
            'user_id' => 3,
            'song_id' => 38,
        ]);

        UserSong::factory()->create([
            'user_id' => 3,
            'song_id' => 39,
        ]);

        UserSong::factory()->create([
            'user_id' => 3,
            'song_id' => 40,
        ]);

        UserSong::factory()->create([
            'user_id' => 3,
            'song_id' => 41,
        ]);
    }
}
