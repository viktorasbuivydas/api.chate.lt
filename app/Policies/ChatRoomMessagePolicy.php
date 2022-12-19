<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ChatRoomMessage;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChatRoomMessagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ChatRoomMessage  $chatRoomMessage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ChatRoomMessage $chatRoomMessage)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    public function update(User $user, ChatRoomMessage $chatRoomMessage): bool
    {
        return $user === $chatRoomMessage->user_id;
    }

    public function delete(User $user, ChatRoomMessage $chatRoomMessage): bool
    {
        return $user->hasPermissionTo('delete chat room message');
    }

    public function forceDelete(User $user, ChatRoomMessage $chatRoomMessage): bool
    {
        return $user->hasRole('super admin');
    }
}
