<?php

namespace App\Services;

use App\Mail\RequestApproved;
use App\Repositories\Interfaces\CodeRepositoryInterface;
use App\Services\Interfaces\CodeServiceInterface;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CodeService extends BaseService implements CodeServiceInterface
{
    protected CodeRepositoryInterface $codeRepository;

    public function __construct(
        CodeRepositoryInterface $codeRepository,
    ) {
        $this->codeRepository = $codeRepository;
    }

    public function sendCode(string $email)
    {
        $code = Str::random(50);

        $this->codeRepository->createOrUpdateFromArray([
            'email' => $email,
            'code' => $code,
        ]);

        Mail::to($email)
            ->send(new RequestApproved($email, $code));
    }

    public function checkCode(string $email, $code)
    {
        $this->codeRepository->checkCode($email, $code);
    }
}
