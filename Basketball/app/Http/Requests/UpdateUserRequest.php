<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        // Allow all authorized users to perform this request
        return true;
    }


    public function rules(): array
    {
        return [
            'firstName' => 'sometimes|string|max:255',
            'midName' => 'sometimes|string|max:255',
            'lastName' => 'sometimes|string|max:255',
            'firstName_ar' => 'sometimes|string|max:255',
            'midName_ar' => 'sometimes|string|max:255',
            'lastName_ar' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $this->user->id,
            'phone' => 'sometimes|string|max:20',
            'password' => 'sometimes|string|min:8|confirmed',
            'image' => 'sometimes|nullable|string', // or 'image' if it’s an image file
            'role' => 'sometimes|in:superAdmin,coach,student',
        ];
    }
}
