<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCoachRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all authorized users
    }

    public function rules(): array
    {
        return [
            'user_id' => 'sometimes|exists:users,id|unique:coaches,user_id,' . $this->coach->id,
        ];
    }

}
