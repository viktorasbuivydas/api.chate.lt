<?php

namespace App\Console\Commands;

use Hash;
use App\Models\User;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {username} {email} {password} {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $username = $this->argument('username');
        $password =  Hash::make($this->argument('password'));
        $email = $this->argument('email');
        $role = $this->argument('role');

        $user = User::factory()->create([
            'username' => $username,
            'email' => $email,
            'password' => $password
        ]);

        $user->assignRole($role);
        
        return Command::SUCCESS;
    }
}
