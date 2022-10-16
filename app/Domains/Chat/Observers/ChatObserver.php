<?php

namespace App\Domains\Chat\Observers;

use App\Domains\Chat\Models\Chat;
use Illuminate\Support\Str;

class ChatObserver
{
    /**
     * Handle the Chat "created" event.
     *
     * @param  \App\Chat  $chat
     * @return void
     */
    public function creating(Chat $chat)
    {
        $chat->slug = Str::slug($chat->name);
    }

    /**
     * Handle the Chat "updated" event.
     *
     * @param  \App\Chat  $chat
     * @return void
     */
    public function updated(Chat $chat)
    {
        //
    }

    /**
     * Handle the Chat "deleted" event.
     *
     * @param  \App\Chat  $chat
     * @return void
     */
    public function deleted(Chat $chat)
    {
        //
    }

    /**
     * Handle the Chat "restored" event.
     *
     * @param  \App\Chat  $chat
     * @return void
     */
    public function restored(Chat $chat)
    {
        //
    }

    /**
     * Handle the Chat "force deleted" event.
     *
     * @param  \App\Chat  $chat
     * @return void
     */
    public function forceDeleted(Chat $chat)
    {
        //
    }
}
