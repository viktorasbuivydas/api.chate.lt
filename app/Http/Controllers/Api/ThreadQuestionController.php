<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ThreadQuestionResource;
use App\Models\Thread;
use App\Models\ThreadQuestion;
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

        if (!$questions) {
            return [];
        }

        return ThreadQuestionResource::collection($questions);
    }

    public function getQuestion(ThreadQuestion $question)
    {
        $question = $this->threadQuestionService
            ->getQuestion($question->id);

        abort_if(!$question, 404);

        return new ThreadQuestionResource($question);
    }
}
