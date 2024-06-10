<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ID:1
        Song::factory()->create([
            'title' => 'Hysteria',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://89.111.175.236/storage/app/public/songs/source/Muse-Hysteria-_HD_.mp3',
            'image' => 'http://89.111.175.236/storage/app/public/songs/avatars/Muse+Absolution+Album+Cover',
        ]);
    }
}
