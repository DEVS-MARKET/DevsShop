<?php

namespace App\Http\Requests\Admin\Settings\Payment;

use Illuminate\Foundation\Http\FormRequest;

class DPayRequest extends FormRequest
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
            'serviceName' => 'nullable|string',
            'serviceHash' => 'nullable|string',
            'guid' => 'nullable|string',
            'secretKey' => 'nullable|string',
            'mode' => 'nullable|string|in:sandbox,production',
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
            'serviceName' => __('serviceName'),
            'serviceHash' => __('serviceHash'),
            'guid' => __('guid'),
            'secretKey' => __('secretKey'),
            'mode' => __('mode'),
        ];
    }
}
