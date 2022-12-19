<?php

namespace App\Http\Controllers\Api;

use App\Models\Thread;
use App\Http\Controllers\Controller;
use App\Http\Resources\ThreadResource;
use App\Http\Requests\Thread\ThreadRequest;
use App\Exceptions\ThreadHasNoDataException;
use App\Http\Requests\Thread\CreateThreadRequest;
use App\Http\Requests\Thread\UpdateThreadRequest;
use App\Services\Interfaces\ThreadServiceInterface;

class ThreadController extends Controller
{
    protected ThreadServiceInterface $threadService;

    public function __construct(
        ThreadServiceInterface $threadService
    ) {
        $this->threadService = $threadService;
    }

    public function index(ThreadRequest $request)
    {
        $thread = $this->threadService
            ->getThreadChildren($request->input('parent_id'));

        throw_if(! $thread, new ThreadHasNoDataException());

        if ($request->has('parent_id')) {
            return new ThreadResource($thread);
        }

        return ThreadResource::collection($thread);
    }

    public function show(Thread $thread)
    {
        $thread = $this->threadService
            ->getThread($thread->id);

        return new ThreadResource($thread);
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
