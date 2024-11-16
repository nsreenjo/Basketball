<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoachRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all authorized users
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id|unique:coaches,user_id',
        ];
    }
}
