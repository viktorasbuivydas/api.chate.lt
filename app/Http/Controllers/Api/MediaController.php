<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Thread\CreateThreadRequest;
use App\Services\Interfaces\ThreadServiceInterface;

class MediaController extends Controller
{
    protected ThreadServiceInterface $threadService;

    public function __construct(
        ThreadServiceInterface $threadService
    ) {
        $this->threadService = $threadService;
    }

    public function store(CreateThreadRequest $request)
    {
        return $this->threadService
            ->createThread([
                'name' => $request->name,
            ]);
    }
}
