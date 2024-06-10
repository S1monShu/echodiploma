<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
         * USERS
         */

        // SEEDS FOR USER AUTH!!!
        User::factory()->create([
            'name' => 'Artem',
            'email' => 'user@mail.ru',
            'password' => Hash::make('useruser'),
            'image' => 'https://avatars.yandex.net/get-music-content/4581417/e9d70380.p.165131/200x200',
            'description' => 'Советский и российский певец, музыкант, композитор, музыкальный продюсер, народный артист Российской Федерации. Член Международного союза деятелей эстрадного искусства города Москвы, заслуженный артист Республики Ингушетия, народный артист Карачаево-Черкесской Республики',
            'is_candidate' => 0,
            'role_id' => 1
        ]);

        // SEEDS FOR ARTIST AUTH!!!
        User::factory()->create([
            'name' => 'Gazyanov',
            'email' => 'artist@mail.ru',
            'password' => Hash::make('artistartist'),
            'image' => 'https://avatars.yandex.net/get-music-feed-promotion/34168/645394dbe1d74350ebcf4627-landing.image/orig',
            'description' => 'Российская музыкальная группа. Состоит из двух братьев - Тимура и Ильяса Гаязовых. Выпускают музыку под лейблом Warner Music Russia. Тимур - автор песен и исполнитель, Ильяс - продюсер, автор песен и исполнитель',
            'is_candidate' => 0,
            'role_id' => 2,
        ]);

        // SEEDS FOR ADMIN AUTH!!!
        User::factory()->create([
            'name' => 'MOT',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('adminadmin'),
            'image' => 'https://avatars.yandex.net/get-music-content/3927581/b4c73933.p.1636897/200x200',
            'description' => 'Российский музыкант, рэп-исполнитель. С 1 марта 2013 года по 22 января 2022 являлся артистом лейбла Black Star Inc',
            'is_candidate' => 0,
            'role_id' => 3,
        ]);
    }
}
