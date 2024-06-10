<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
         * GENRES
         */

        // GENRE!!!
        Genre::factory()->create([
            'title' => 'Поп-музыка',
            'popularity' => 0,
            'image' => 'https://avatars.yandex.net/get-music-user-playlist/27701/rd3n8snzrJUBlr/200x200?1654591853261'
        ]);

        // GENRE!!!
        Genre::factory()->create([
            'title' => 'Рок',
            'popularity' => 0,
            'image' => 'https://avatars.yandex.net/get-music-user-playlist/70586/553947738.1037.31367.ru/200x200?1542023831367'
        ]);

        // GENRE!!!
        Genre::factory()->create([
            'title' => 'Электро',
            'popularity' => 0,
            'image' => 'https://avatars.yandex.net/get-music-user-playlist/38125/603134215.1006.26105.ru/200x200?1538401726105'
        ]);

        // GENRE!!!
        Genre::factory()->create([
            'title' => 'Легкая',
            'popularity' => 0,
            'image' => 'https://avatars.yandex.net/get-music-user-playlist/28719/rtoaq6RlEnaTah/200x200?1682429263665'
        ]);

        // GENRE!!!
        Genre::factory()->create([
            'title' => 'Постпанк',
            'popularity' => 0,
            'image' => 'https://avatars.yandex.net/get-music-user-playlist/34120/553947738.1049.52138.ru/200x200?1540993252138'
        ]);

        // GENRE!!!
        Genre::factory()->create([
            'title' => 'Фонк',
            'popularity' => 0,
            'image' => 'https://avatars.yandex.net/get-music-content/9737237/a2f36a35.a.25758047-1/200x200'
        ]);
    }
}
