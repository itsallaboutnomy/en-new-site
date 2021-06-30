<?php

namespace App\Http\Requests\Enablers;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PaymentProofRequest extends FormRequest
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
            'enroll_for' => ['required', Rule::in(['book', 'seminar', 'trainer', 'training', 'upcomingEvent'])],

            'transaction_amount' => ['required', 'numeric', 'between:0,999999.99'],
            'transaction_date' => ['required', 'string'],

            'payment_receipt' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'cnic_front_image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'cnic_back_image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],

            'training_mode' => ['required_if:training_mode,training', Rule::in(['online','face-to-face'])],
            'training_city_id' => ['required_if:training_mode,face-to-face'],
        ];
    }

    public function messages()
    {
        return [];
    }
}
