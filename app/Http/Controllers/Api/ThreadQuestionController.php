<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\ThreadQuestionServiceInterface;

class ThreadQuestionController extends Controller
{
    protected ThreadQuestionServiceInterface $threadQuestionService;

    public function __construct(
        ThreadQuestionServiceInterface $threadQuestionService
    ) {
        $this->threadQuestionService = $threadQuestionService;
    }

    public function index()
    {
        // return $this->threadQuestionService
        //     ->sendCode($request->input('email'));
    }
}
