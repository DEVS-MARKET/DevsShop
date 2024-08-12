<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'password' => 'required|string',
        ];
    }

    /**
     * Change the default input names for the login.
     */
    public function attributes(): array
    {
        return [
            'name' => strtolower(__('Name')),
            'password' => strtolower(__('Password')),
        ];
    }
}
