<?php

namespace App\Http\Controllers\Api;

use App\Domains\Request\Actions\CreateRequestAction;
use App\Domains\Request\DataTransfers\RequestData;
use App\Domains\Request\Requests\CreateRequest;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function store(CreateRequest $request)
    {
        return app(CreateRequestAction::class)
            ->handle(RequestData::fromRequest($request));
    }
}
