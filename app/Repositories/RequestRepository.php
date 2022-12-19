<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Request;
use App\Repositories\Interfaces\RequestRepositoryInterface;

class RequestRepository extends BaseRepository implements RequestRepositoryInterface
{
    public $model = Request::class;

    public function getRequests()
    {
        return $this->getModelInstance()
            ->withTrashed()
            ->get();
    }

    public function getNewRequests()
    {
        return $this->getModelInstance()
            ->notApproved()
            ->get();
    }

    public function approve(int $requestId)
    {
        return $this->getModelInstance()
            ->whereId($requestId)
            ->notApproved()
            ->update([
                'approved_at' => Carbon::now(),
            ]);
    }
}
