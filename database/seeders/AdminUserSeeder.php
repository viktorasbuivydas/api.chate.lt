<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'username' => 'Merkurijus',
            'email' => 'viktoras162@gmail.com',
        ]);

        $user->assignRole('super admin');

        User::factory()->create([
            'username' => 'Shopass',
            'email' => 'shopass@gmail.com',
        ]);

        User::factory()->create([
            'username' => 'Anonim',
            'email' => 'anonim@gmail.com',
        ]);
    }
}
