<?php

namespace App\Repositories;

use App\Models\ThreadQuestion;
use App\Repositories\Interfaces\ThreadQuestionRepositoryInterface;

class ThreadQuestionRepository extends BaseRepository implements ThreadQuestionRepositoryInterface
{
    public $model = ThreadQuestion::class;

    public function getTopics()
    {
        return $this->getModelInstance()
            ->withCount([
                'messages',
            ])
            ->get();
    }
}
