<?php

namespace App\Domains\Request\DataTransfers;

use App\Domains\Request\Requests\CreateRequest;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\ConditionallyLoadsAttributes;

class RequestData implements Arrayable
{
    use ConditionallyLoadsAttributes;

    public function __construct(
        public string $email,
        public string $content,
    ) {
    }

    public static function fromRequest(CreateRequest $request): RequestData
    {
        return new static(
            email: $request->input('email'),
            content: $request->input('content')
        );
    }

    public function toArray()
    {
        return $this->filter([
            'email' => $this->email,
            'content' => $this->content,
        ]);
    }
}
