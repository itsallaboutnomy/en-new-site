<?php

namespace App\Http\Requests\Enablers\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookPaymentRequest extends FormRequest
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
            'name' => 'required|max:60',
            'phone' => 'required|max:15',
            'cnic' => 'required|max:15',
            'email'  => 'required|email|max:60',
            'street_address' => 'required|max:200',
            'city' => 'required|min:3|max:60',
            'country' => 'required|min:3|max:60',
            'payment_type' => ['required', Rule::in(['cash','online'])],
            'transaction_type' => 'required_if:payment_type,online',
        ];
    }

}
