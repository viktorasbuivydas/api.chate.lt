<?php

namespace App\Domains\Chat\DataTransfers;

use App\Domains\Chat\Requests\CreateChatRequest;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\ConditionallyLoadsAttributes;

class ChatData implements Arrayable
{
    use ConditionallyLoadsAttributes;

    public function __construct(
        public string $name,
    ) {
    }

    public static function fromRequest(CreateChatRequest $request): ChatData
    {
        return new static(
            name: $request->input('name'),
        );
    }

    public function toArray()
    {
        return $this->filter([
            'name' => $this->name,
        ]);
    }
}
