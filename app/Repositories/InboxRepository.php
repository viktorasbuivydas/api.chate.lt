<?php

namespace App\Repositories;

use App\Models\Inbox;
use App\Repositories\Interfaces\InboxRepositoryInterface;

class InboxRepository extends BaseRepository implements InboxRepositoryInterface
{
    public $model = Inbox::class;
}
