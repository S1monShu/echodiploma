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
    }
}
