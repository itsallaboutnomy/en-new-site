<?php

namespace App\Http\Requests\Enablers\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookPaymentProofRequest extends FormRequest
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
            'transaction_amount' => 'required|min:0|max:1000000',
            'date' => 'required',
            'payment_receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'cnic_front'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'cnic_back'  => 'required|image|mimes:jpeg,png,jpg|max:2048',

        ];
    }
}
