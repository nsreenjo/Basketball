<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'first_name' => $this->firstName,
            'middle_name' => $this->midName,
            'last_name' => $this->lastName,
            'first_name_ar' => $this->firstName_ar,
            'middle_name_ar' => $this->midName_ar,
            'last_name_ar' => $this->lastName_ar,
            'email' => $this->email,
            'phone' => $this->phone,
            'role' => $this->role,
            'image' => $this->image,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
