<?php

namespace App\Http\Requests\Admin\Settings\Payment;

use Illuminate\Foundation\Http\FormRequest;

class Przelewy24Request extends FormRequest
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
            'merchantId' => 'required|string',
            'posId' => 'required|string',
            'crc' => 'required|string',
            'raportKey' => 'required|string',
            'mode' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'merchantId' => __('merchantId'),
            'posId' => __('posId'),
            'crc' => __('crc'),
            'raportKey' => __('raportKey'),
            'mode' => __('mode'),
        ];
    }
}
