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
            'is_locked' => $this->is_locked,
            'parent_id' => $this->parent_id,
            'children_count' => $this->whenCounted('children'),
            'question_count' => $this->whenCounted('questions'),
            'children' => $this->whenLoaded('children', function () {
                return ThreadResource::collection($this->children);
            }),
            'parent' => $this->whenLoaded('parent', function () {
                return new ThreadResource($this->parent);
            }),
            'questions' => $this->whenLoaded('questions', function () {
                return QuestionResource::collection($this->questions);
            }),
        ];
    }
}
