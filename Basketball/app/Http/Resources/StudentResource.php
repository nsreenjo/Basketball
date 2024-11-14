<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Student;

class StudentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [ 
        'gender' => $this->gender,
        'nationality' => $this->Nationality,
        'birthday' => $this->Birthday,
        'level_of_player' => $this->levelOfPlayer,
        'position' => $this->position,
        'weight' => $this->weight,
        'height' => $this->height,
        'school_name' => $this->schoolName,
        'age_category' => $this->ageCategory,
        'address' => $this->address,
        'created_at' => $this->created_at->toDateTimeString(),
        'updated_at' => $this->updated_at->toDateTimeString(),
        'user_first_name_en' => $this->user->firstName,
        'user_middle_name_en' => $this->user->midName,
        'user_last_name_en' => $this->user->lastName,
        'user_first_name_ar' => $this->user->firstName_ar,
        'user_middle_name_ar' => $this->user->midName_ar,
        'user_last_name_ar' => $this->user->lastName_ar,
        
    ];

    }
}


