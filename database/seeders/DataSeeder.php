<?php

namespace Database\Seeders;

use App\Models\ChatRoom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DataSeeder extends Seeder
{
    public function run()
    {
        $this->createChatRooms();
    }

    private function createChatRooms()
    {
        $data = collect(config('seeder-data'));

        ChatRoom::insert(Arr::get($data, 'chat'));
    }

    private function createForumCategories()
    {
        // $data = collect(config('seeder-data'));
        // Forum::insert(Arr::get($data, 'forum'));
    }
}
