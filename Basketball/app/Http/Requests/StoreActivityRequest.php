<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Ensure this is set to true for authorization
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'coach_id' => 'required|exists:coaches,id',
            'startDate' => 'required|date|after_or_equal:today',
            'endDate' => 'required|date|after:startDate',
            'durationHours' => 'required|integer|min:1',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:event,course,championship',
            'status' => 'nullable|in:active,inactive,finished',
            'image' => 'nullable|string|max:255', // Or 'image' if it’s a file upload
        ];
    }

}
