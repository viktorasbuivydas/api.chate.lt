<?php

namespace App\Domains\Request\Actions;

use App\Domains\Request\DataTransfers\RequestData;
use App\Domains\Request\Models\Request;

class CreateRequestAction
{
    public function handle(RequestData $input)
    {
        Request::create($input->toArray());
    }
}
