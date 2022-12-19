<?php

namespace App\Services\Interfaces;

interface QuestionCommentServiceInterface
{
    public function getComments(int $questionId);
    
    public function createComment(int $questionId, array $data);
}
