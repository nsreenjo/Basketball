<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSessionRequest extends FormRequest
{

    public function authorize(): bool
    {

        return true; // For now, we are allowing all users
    }


    public function rules(): array
    {
        return [
            'activity_id' => 'required|exists:activities,id', // Ensures activity exists
            'sessionDate' => 'required|date',                 // Ensures a valid date
            'sessionStartTime' => 'required|date_format:H:i:s', // Ensures valid start time
            'sessionEndTime' => 'required|date_format:H:i:s',   // Ensures valid end time
            'status' => 'required|in:Present,Absent,Excused',    // Ensures valid status
        ];
    }
}
