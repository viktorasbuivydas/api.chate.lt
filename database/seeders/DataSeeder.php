<?php

namespace Database\Seeders;

use App\Models\ChatRoom;
use App\Models\Thread;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DataSeeder extends Seeder
{
    public function run()
    {
        $this->createChatRooms();
        $this->createForumCategories();
    }

    private function createChatRooms()
    {
        $data = collect(config('seeder-data'));

        ChatRoom::insert(Arr::get($data, 'chat'));
    }

    private function createForumCategories()
    {
        $data = collect(config('seeder-data'));
        $forum = Arr::get($data, 'forum');
        $threads = collect($forum)->keys();
        $threads->map(function ($thread, $key) use ($forum) {
            $parent = Thread::create([
                'name' => $thread,
            ]);

            collect($forum[$thread])->map(function ($item) use ($parent) {
                Thread::create([
                    'name' => $item,
                    'parent_id' => $parent->id,
                ]);
            });
        });
    }
}
