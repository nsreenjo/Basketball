<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Ensure this is set to true for authorization
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'coach_id' => 'sometimes|exists:coaches,id',
            'startDate' => 'sometimes|date|after_or_equal:today',
            'endDate' => 'sometimes|date|after:startDate',
            'durationHours' => 'sometimes|integer|min:1',
            'location' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric|min:0',
            'type' => 'sometimes|in:event,course,championship',
            'status' => 'sometimes|in:active,inactive,finished',
            'image' => 'nullable|max:255',
        ];
    }

}
