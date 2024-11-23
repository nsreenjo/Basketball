<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSessionStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow authorization logic here if needed
    }

    public function rules(): array
    {
        return [
            'attendanceTime' => 'required|date_format:H:i',
            'note' => 'nullable|string',
            'session_id' => 'required|exists:sessions,id',
            'student_id' => 'required|exists:students,id',
        ];
    }
}
