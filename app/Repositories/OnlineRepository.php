<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Online;
use App\Repositories\Interfaces\OnlineRepositoryInterface;

class OnlineRepository extends BaseRepository implements OnlineRepositoryInterface
{
    public $model = Online::class;

    public function getOnlineUsers()
    {
        return $this->getModelInstance()
            ->with('user')
            ->where('updated_at', '>', Carbon::now()->subMinutes(10))
            ->get();
    }
}
