<?php

namespace App\Http\Requests\Admin\Settings\Payment;

use Illuminate\Foundation\Http\FormRequest;

class PayByLinkRequest extends FormRequest
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
            'shopId' => ['required', 'string'],
            'hash' => ['required', 'string'],
            'mode' => ['required', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'shopId' => __('shopId'),
            'hash' => __('hash'),
            'mode' => __('mode'),
        ];
    }
}
