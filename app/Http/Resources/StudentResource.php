<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'code' => $this->code,
            'date_of_birth' => $this->date_of_birth,
            'email' => $this->email,
            'level' => new LevelResource($this->whenLoaded('level')),
            'courses' => CourseResource::collection($this->whenLoaded('courses')),
        ];
    }
}
