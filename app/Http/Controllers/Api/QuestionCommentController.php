<?php

namespace App\Http\Controllers\Api;

use App\Models\ThreadQuestion;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionCommentResource;
use App\Http\Requests\Thread\StoreCommentRequest;
use App\Services\Interfaces\QuestionCommentServiceInterface;

class QuestionCommentController extends Controller
{
    public function __construct(protected QuestionCommentServiceInterface $questionCommentService)
    {
    }

    public function getComments(ThreadQuestion $question)
    {
        $comments = $this->questionCommentService->getComments($question->id);

        if (! $comments) {
            return [];
        }

        return QuestionCommentResource::collection($comments);
    }

    public function store(StoreCommentRequest $request, ThreadQuestion $question)
    {
        return $this->questionCommentService->createComment($question->id, [
            'content' => $request->input('content'),
            'question_id' => $question->id,
        ]);
    }
}
