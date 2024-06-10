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
            'genre_id' => 5,
            'song_id' => 1,
        ]);
    }
}
