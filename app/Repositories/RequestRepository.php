<?php

namespace App\Repositories;

use App\Models\Request;
use App\Repositories\Interfaces\RequestRepositoryInterface;

class RequestRepository extends BaseRepository implements RequestRepositoryInterface
{
    public $model = Request::class;
}
