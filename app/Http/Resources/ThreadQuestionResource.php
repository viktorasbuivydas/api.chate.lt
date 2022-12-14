<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ThreadQuestionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'content' => $this->content,
            'comments' => $this->whenCounted('comments'),
            'thread' => $this->whenLoaded('thread', function () {
                return new ThreadResource($this->thread);
            }),

        ];
    }
}
