<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'activity_name' => $this->name,
            'activity_description' => $this->description,
            'coach_name' => optional($this->coach->user)->firstName, // Null-safe navigation
            'activity_startDate' => Carbon::parse($this->startDate)->toDateTimeString(),
            'activity_endDate' => Carbon::parse($this->endDate)->toDateTimeString(),
            'activity_durationHours' => $this->durationHours ?? 0,
            'activity_location' => $this->location ?? 'Not provided',
            'activity_type' => $this->type ?? 'Unknown',
            'activity_price' => $this->price ??0,
            'activity_status' => $this->status ?? 'inactive',
            'activity_image' => $this->image ?? 'default_image_path.jpg',

        ];
    }
}
