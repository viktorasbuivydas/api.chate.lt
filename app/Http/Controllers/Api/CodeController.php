<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Code\CreateCodeRequest;
use App\Services\Interfaces\CodeServiceInterface;

class CodeController extends Controller
{
    protected CodeServiceInterface $codeService;

    public function __construct(
        CodeServiceInterface $codeService
    ) {
        $this->codeService = $codeService;
    }

    public function store(CreateCodeRequest $request)
    {
        return $this->codeService
            ->sendCode($request->input('email'));
    }
}
