<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoachResource extends JsonResource
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
        'user' => [
            'id' => $this->user->id,
            'first_name' => $this->user->firstName,
            'mid_name' => $this->user->midName,
            'last_name' => $this->user->lastName,
            'email' => $this->user->email,
            'phone' => $this->user->phone,
            'role' => $this->user->role,
            'image' => $this->user->image,
        ],
        'created_at' => $this->created_at->toDateTimeString(),
        'updated_at' => $this->updated_at->toDateTimeString(),
        'deleted_at' => $this->deleted_at ? $this->deleted_at->toDateTimeString() : null,
    ];
    }
}
