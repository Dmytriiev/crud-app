<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'email' => 'nullable|email:rfc,dns|unique:users,email,' . $this->user,
            'phone_number' => 'nullable|numeric|min:10',
        ];
    }

    public function getData(): array
    {
        return $this->only(
            'first_name',
            'last_name',
            'birth_date',
            'email',
            'phone_number'
        );
    }
}
