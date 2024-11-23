<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SessionStudentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'attendanceTime' => $this->attendanceTime,
            'note' => $this->note,
            'activity_title' => $this->session ? $this->session->activity->name : null,
            'student' => $this->student ? $this->student->user->firstName : null, 
        ];
    }
}

