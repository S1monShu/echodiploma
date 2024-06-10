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
            'name' => 'Simon',
            'email' => 'user@mail.ru',
            'password' => Hash::make('useruser'),
            'image' => 'http://89.111.175.236/storage/app/public/users/avatars/Allogikal.jpg',
            'is_candidate' => 0,
            'role_id' => 1
        ]);

        // SEEDS FOR ADMIN AUTH!!!
        User::factory()->create([
            'name' => 'ROOT',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('adminadmin'),
            'image' => 'http://89.111.175.236/storage/app/public/users/avatars/ROOT.jpg',
            'is_candidate' => 0,
            'role_id' => 3,
        ]);
        User::factory()->create([
            'name' => 'Muse',
            'email' => 'muse@gmail.com',
            'password' => Hash::make('12345678'),
            'image' => 'http://89.111.175.236/storage/app/public/users/avatars/ROOT.jpg',
            'is_candidate' => 0,
            'role_id' => 2,
        ]);
    }
}
