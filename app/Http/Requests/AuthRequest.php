<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;


class AuthRequest extends FormRequest
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
            'name' => 'required|min:4|max:255|regex:/^[a-zA-Z\s-]+$/',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                Password::min(6)
                // ->mixedCase()
                // ->numbers()
                // ->symbols()
                // ->uncompromised()
                ,
                'confirmed'
            ],
            'contact' => 'required|regex:/^\+?(\d{1,3})?[-.\s]?\(?(\d{3})\)?[-.\s]?(\d{3})[-.\s]?(\d{4})$/',
            'location' => 'required|min:3|max:255',
            'image' => 'sometimes|image|max:500',
            'user_type' => 'nullable'
        ];
    }
}
