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
            'name' => 'Allogikal',
            'email' => 'user@mail.ru',
            'password' => Hash::make('useruser'),
            'image' => 'http://[::1]:5173/storage/app/public/users/avatars/Allogikal.jpg',
            'is_candidate' => 0,
            'role_id' => 1
        ]);

        // SEEDS FOR ADMIN AUTH!!!
        User::factory()->create([
            'name' => 'ROOT',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('adminadmin'),
            'image' => 'http://[::1]:5173/storage/app/public/users/avatars/ROOT.jpg',
            'is_candidate' => 0,
            'role_id' => 3,
        ]);

        // SEEDS FOR ARTIST AUTH!!! ID:3
        User::factory()->create([
            'name' => 'МИЧЕЛЗ',
            'email' => 'artist@mail.ru',
            'password' => Hash::make('artistartist'),
            'image' => 'http://[::1]:5173/storage/app/public/users/avatars/МИЧЕЛЗ.jpg',
            'is_candidate' => 0,
            'role_id' => 2,
        ]);

        // SEEDS FOR ARTIST AUTH!!! ID:4
        User::factory()->create([
            'name' => 'Zivert',
            'email' => 'zivertOf@mail.ru',
            'password' => Hash::make('artistartist'),
            'image' => 'http://[::1]:5173/storage/app/public/users/avatars/Zivert.jpg',
            'is_candidate' => 0,
            'role_id' => 2,
        ]);

        // SEEDS FOR ARTIST AUTH!!! ID:5
        User::factory()->create([
            'name' => 'DJ SMASH',
            'email' => 'dj_smash@mail.ru',
            'password' => Hash::make('artistartist'),
            'image' => 'http://[::1]:5173/storage/app/public/users/avatars/DJ_SMASH.jpg',
            'is_candidate' => 0,
            'role_id' => 2,
        ]);

        // SEEDS FOR ARTIST AUTH!!! ID:6
        User::factory()->create([
            'name' => 'WYR GEMI',
            'email' => 'wyrr_gemi@mail.ru',
            'password' => Hash::make('artistartist'),
            'image' => 'http://[::1]:5173/storage/app/public/users/avatars/WYR_GEMI.jpg',
            'is_candidate' => 0,
            'role_id' => 2,
        ]);

        // SEEDS FOR ARTIST AUTH!!! ID:7
        User::factory()->create([
            'name' => 'MAGA',
            'email' => 'maga@mail.ru',
            'password' => Hash::make('artistartist'),
            'image' => 'http://[::1]:5173/storage/app/public/users/avatars/MAGA.jpg',
            'is_candidate' => 0,
            'role_id' => 2,
        ]);

        // SEEDS FOR ARTIST AUTH!!! ID:8
        User::factory()->create([
            'name' => 'Junona Boys',
            'email' => 'junona_boys@mail.ru',
            'password' => Hash::make('artistartist'),
            'image' => 'http://[::1]:5173/storage/app/public/users/avatars/JUNONA_BOYS.jpg',
            'is_candidate' => 0,
            'role_id' => 2,
        ]);

        // SEEDS FOR ARTIST AUTH!!! ID:9
        User::factory()->create([
            'name' => 'WEEKND',
            'email' => 'the_weeknd@mail.ru',
            'password' => Hash::make('artistartist'),
            'image' => 'http://[::1]:5173/storage/app/public/users/avatars/WEEKND.jpg',
            'is_candidate' => 0,
            'role_id' => 2,
        ]);

        // SEEDS FOR ARTIST AUTH!!! ID:10
        User::factory()->create([
            'name' => 'Король и Шут',
            'email' => 'king@mail.ru',
            'password' => Hash::make('artistartist'),
            'image' => 'http://[::1]:5173/storage/app/public/users/avatars/КОРОЛЬИШУТ.jpg',
            'is_candidate' => 0,
            'role_id' => 2,
        ]);

        // SEEDS FOR ARTIST AUTH!!! ID:11
        User::factory()->create([
            'name' => 'Chris Isaak',
            'email' => 'chris@mail.ru',
            'password' => Hash::make('artistartist'),
            'image' => 'http://[::1]:5173/storage/app/public/users/avatars/Chris_Isaak.jpg',
            'is_candidate' => 0,
            'role_id' => 2,
        ]);

        // SEEDS FOR ARTIST AUTH!!! ID:12
        User::factory()->create([
            'name' => 'Robert D.S.',
            'email' => 'robert@mail.ru',
            'password' => Hash::make('artistartist'),
            'image' => 'http://[::1]:5173/storage/app/public/users/avatars/Chris_Isaak.jpg',
            'is_candidate' => 1,
            'role_id' => 2,
        ]);

        // SEEDS FOR ARTIST AUTH!!! ID:13
        User::factory()->create([
            'name' => 'New player',
            'email' => 'player@mail.ru',
            'password' => Hash::make('artistartist'),
            'image' => 'http://[::1]:5173/storage/app/public/users/avatars/Chris_Isaak.jpg',
            'is_candidate' => 1,
            'role_id' => 2,
        ]);

        // SEEDS FOR ARTIST AUTH!!! ID:14
        User::factory()->create([
            'name' => 'Cancel',
            'email' => 'cancel@mail.ru',
            'password' => Hash::make('artistartist'),
            'image' => 'http://[::1]:5173/storage/app/public/users/avatars/Chris_Isaak.jpg',
            'is_candidate' => 1,
            'role_id' => 2,
        ]);
    }
}
