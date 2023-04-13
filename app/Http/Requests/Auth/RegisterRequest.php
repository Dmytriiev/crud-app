<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'phone_number' => 'nullable|numeric|min:10',
            'password' => [
                'required',
                Password::min(8)
                    ->numbers()
                    ->letters(),
                'confirmed',
            ],
        ];
    }
}
