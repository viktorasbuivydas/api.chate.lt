<?php

namespace App\Services;

use App\Services\Interfaces\QuestionCommentServiceInterface;
use App\Repositories\Interfaces\QuestionCommentRepositoryInterface;

class QuestionCommentService extends BaseService implements QuestionCommentServiceInterface
{

    public function __construct(
    protected QuestionCommentRepositoryInterface $questionCommentRepository
    ) {
    }

    public function getComments(int $questionId)
    {
        return $this->questionCommentRepository->getComments($questionId);
    }

    public function createComment(int $questionId, array $data)
    {
        return $this->questionCommentRepository->createOrUpdateFromArray(
            array_merge(
                $data,
                [
                    'thread_id' => $questionId,
                    'user_id' => auth()->id(),
                ]
            )
        );
    }
}
