<?php

namespace App\Repositories;

use App\Models\Code;
use App\Repositories\Interfaces\CodeRepositoryInterface;

class CodeRepository extends BaseRepository implements CodeRepositoryInterface
{
    public $model = Code::class;
}
