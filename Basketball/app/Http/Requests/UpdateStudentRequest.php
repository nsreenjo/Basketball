<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'gender' => 'required|in:male,female',
            'Nationality' => 'required|string|max:255',
            'Birthday' => 'required|date',
            'levelOfPlayer' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'schoolName' => 'required|string|max:255',
            'ageCategory' => 'required|in:under 18,under 12,under 9',
            'address' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
