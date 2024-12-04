<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'firstName' => 'required|string|max:255',
            'midName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'firstName_ar' => 'required|string|max:255',
            'midName_ar' => 'nullable|string|max:255',
            'lastName_ar' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:20',
            'role' => 'required|in:superAdmin,coach,student',
            'image' => 'nullable|max:2048',
        ];
    }

}
