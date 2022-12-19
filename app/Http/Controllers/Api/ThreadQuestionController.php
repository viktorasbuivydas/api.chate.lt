<?php

namespace App\Http\Controllers\Api;

use App\Models\Thread;
use App\Models\ThreadQuestion;
use App\Http\Controllers\Controller;
use App\Http\Resources\ThreadQuestionResource;
use App\Http\Requests\Thread\StoreQuestionRequest;
use App\Services\Interfaces\ThreadQuestionServiceInterface;

class ThreadQuestionController extends Controller
{
    protected ThreadQuestionServiceInterface $threadQuestionService;

    public function __construct(
        ThreadQuestionServiceInterface $threadQuestionService
    ) {
        $this->threadQuestionService = $threadQuestionService;
    }

    public function getQuestions(Thread $thread)
    {
        $questions = $this->threadQuestionService
            ->getQuestions($thread->id);

        if (! $questions) {
            return [];
        }

        return ThreadQuestionResource::collection($questions);
    }

    public function getQuestion(ThreadQuestion $question)
    {
        $question = $this->threadQuestionService
            ->getQuestion($question->id);

        abort_if(! $question, 404);

        return new ThreadQuestionResource($question);
    }

    public function store(StoreQuestionRequest $request, Thread $thread)
    {
        return $this->threadQuestionService
            ->createQuestion($thread->id, [
                'name' => $request->input('name'),
                'content' => $request->input('content'),
            ]);
    }
}
