<?php

namespace App\Http\Requests\Admin\Settings\Payment;

use Illuminate\Foundation\Http\FormRequest;

class GetPayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'api_key' => 'required|string',
            'api_secret' => 'required|string',
            'mode' => 'required|string|in:sandbox,production',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'api_key' => __('api_key'),
            'api_secret' => __('api_secret'),
            'mode' => __('mode'),
        ];
    }
}
