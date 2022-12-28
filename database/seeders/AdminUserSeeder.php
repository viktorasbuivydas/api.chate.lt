<?php

namespace Database\Seeders;

use App;
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
        if (App::environment('local')) {
            $user = User::factory()->create([
                'username' => 'admin',
                'email' => 'admin@gmail.com',
            ]);

            $user->assignRole('super admin');
        }
    }
}
