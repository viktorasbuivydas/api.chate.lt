<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Domains\Authorization\Models\User::factory(10)->create();

        \App\Domains\Authorization\Models\User::factory()->create([
            'name' => 'Viktoras',
            'email' => 'viktoras162@gmail.com',
        ]);
    }
}
