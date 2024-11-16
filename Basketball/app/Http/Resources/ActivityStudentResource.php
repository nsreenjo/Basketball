<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityStudentResource extends JsonResource
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
            'activity' => new ActivityResource($this->whenLoaded('activity')),  // Assuming there's a resource for Activity
            'student' => new StudentResource($this->whenLoaded('student')),    // Assuming there's a resource for Student
            'enrollmentDate' => $this->enrollmentDate,
            'enrollmentStatus' => $this->enrollmentStatus,
            'completionDate' => $this->completionDate,
        ];
    }
    
}
