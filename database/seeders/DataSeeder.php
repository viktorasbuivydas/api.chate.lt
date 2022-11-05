<?php

namespace Database\Seeders;

use App\Domains\Chat\Models\Chat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DataSeeder extends Seeder
{
    public function run()
    {
        $this->createChatRooms();
    }

    private function createChatRooms()
    {
        $data = collect(config('seeder-data'));
        Chat::insert(Arr::get($data, 'chat'));
    }
}
