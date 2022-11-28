<?php

namespace App\Services;

use App\Mail\RequestApproved;
use App\Repositories\Interfaces\CodeRepositoryInterface;
use App\Services\Interfaces\CodeServiceInterface;
use App\Traits\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CodeService extends BaseService implements CodeServiceInterface
{
    use Response;

    protected CodeRepositoryInterface $codeRepository;

    public function __construct(
        CodeRepositoryInterface $codeRepository,
    ) {
        $this->codeRepository = $codeRepository;
    }

    public function sendCode(string $email)
    {
        $code = Str::random(50);

        if ($this->checkEmail($email)) {
            return $this->response('Toks el. pašto adresas jau gavo kodą', 400);
        }

        $this->codeRepository->createOrUpdateFromArray([
            'email' => $email,
            'code' => $code,
        ]);

        Mail::to($email)
            ->queue(new RequestApproved($email, $code));
    }

    public function checkCode(string $email, $code)
    {
        $this->codeRepository->checkCode($email, $code);
    }

    private function checkEmail(string $email)
    {
        return $this->codeRepository->checkEmail($email);
    }
}
