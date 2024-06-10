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
    }
}
