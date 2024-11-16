<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityStudent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'activity_id' => 'required|exists:activities,id',
            'student_id' => 'required|exists:students,id',
            'enrollmentDate' => 'required|date',
            'enrollmentStatus' => 'required|in:Enrolled,Completed,Dropped',
            'completionDate' => 'nullable|date|after:enrollmentDate',
        ];
    }
    
}



