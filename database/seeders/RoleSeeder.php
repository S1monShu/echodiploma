<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
         * ROLES
         */

        // ROLE USER!!!
        Role::factory()->create([
            'title' => 'user'
        ]);

        // ROLE ARTIST!!!
        Role::factory()->create([
            'title' => 'artist'
        ]);

        // ROLE ADMIN!!!
        Role::factory()->create([
            'title' => 'admin'
        ]);
    }
}
