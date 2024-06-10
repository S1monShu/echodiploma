<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Роли
        $this->call(RoleSeeder::class);
        // Жанры
        $this->call(GenreSeeder::class);
        // Исполнители
        $this->call(ArtistSeeder::class);
        // Треки
        $this->call(SongSeeder::class);
        // Связи
        $this->call(UserSongSeeder::class);
        // Связи
        $this->call(GenreSongSeeder::class);
        // Связи
        $this->call(FavouriteSongSeeder::class);
    }
}
