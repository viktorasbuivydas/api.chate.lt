<?php

namespace App\Http\Controllers\Api;

use App\Models\Thread;
use App\Http\Controllers\Controller;
use App\Http\Resources\ThreadResource;
use App\Http\Requests\Thread\ThreadRequest;
use App\Http\Requests\Thread\CreateThreadRequest;
use App\Http\Requests\Thread\UpdateThreadRequest;
use App\Services\Interfaces\ThreadServiceInterface;

class TopicController extends Controller
{
    protected ThreadServiceInterface $threadService;

    public function __construct(
        ThreadServiceInterface $threadService
    ) {
        $this->threadService = $threadService;
    }

    public function index(ThreadRequest $request)
    {
        $threads = $this->threadService
            ->getThreads($request->input('parent_id'));

        if (! $threads) {
            return [];
        }

        return ThreadResource::collection($threads);
    }

    public function store(CreateThreadRequest $request)
    {
        return $this->threadService
            ->createThread([
                'name' => $request->name,
            ]);
    }

    public function update(Thread $thread, UpdateThreadRequest $request)
    {
        return $this->threadService
            ->updateThread($thread->id, [
                'name' => $request->name,
            ]);
    }

    public function delete(Thread $thread)
    {
        return $this->threadService
            ->deleteThread($thread->id);
    }
}
