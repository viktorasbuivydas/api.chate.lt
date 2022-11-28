<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ThreadResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'icon' => $this->icon,
            'position' => $this->position,
            'parent_id' => $this->parent_id,
            'children_count' => $this->whenCounted('children'),
            'questions' => $this->whenLoaded('questions', function () {
                return QuestionResource::collection($this->questions);
            }),
        ];
    }
}
