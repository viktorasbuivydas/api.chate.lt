<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Domains\Authorization\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);
    }
}
