<?php

namespace App\Http\Requests\Enablers\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaymentAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => ['required', Rule::in(['cash','local','international'])],
            'bank_name' => 'required|string|max:60',
            'account_title' => 'nullable|string|max:60',
            'account_number' => 'required|string|max:30',
            'iban' => 'nullable|string|max:35',
        ];
    }
}
