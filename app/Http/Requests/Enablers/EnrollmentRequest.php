<?php

namespace App\Http\Requests\Enablers;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EnrollmentRequest extends FormRequest
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
            'enroll_for' => ['required', 'string', 'max:190',
                function ($attribute, $value, $fail)
                {
                    $temp = explode(':',$value);
                    if (count($temp) < 2 || count($temp) > 2) {
                        $fail('The enroll for is invalid.');
                    }
                }
            ],

            'name' => ['required', 'string', 'max:60'],
            'father_name' => ['required', 'string', 'max:60'],

            'cnic' => ['required', 'string', 'min:8', 'max:16'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'phone' => ['required', 'string', 'min:11', 'max:15'],

            'country' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:100'],

            'heard_from' => ['required', Rule::in(['Social Media','Printing Media','Electronic Media','Friends Family','Colleagues'])],

            'payment_type' => $this->paymentTypeRules(),
            'transaction_type' => $this->transactionTypeRules(),

            'is_agreed' => $this->isAgreedRules(),

            'number_of_seats' => $this->numberOfSeatsRules(),
            'hired_for_hours' => $this->hiredForHoursRules(),

            'comments' => ['nullable','string','max:300'],
            'facebook_profile_link' => ['nullable','string','max:190'],
            'cnic_front_image' => $this->imageRules(),
            'cnic_back_image' => $this->imageRules(),
            'utility_bill_image' => $this->imageRules(),
            'income_proof_image' => $this->imageRules(),
        ];
    }

    public function messages()
    {
        return [
            'cnic.required' => 'The CNIC or passport field is required',
            'is_agreed.required' => 'This field is required',
        ];
    }

    private function isAgreedRules()
    {
        $rules = ['nullable'];

        $temp = explode(':',request()->enroll_for);

        if(($temp[0] == 'training' || $temp[0] == 'trainer') && $temp[1] != 'enabling-video-series'){
            $rules = ['required'];
        }

        return $rules;
    }
    private function imageRules() : string
    {
        $rules = 'nullable';
        $slug = explode(':',request()->enroll_for)[1];

        if($slug === 'enabling-video-series' and request()->is_free == 'YES'){
            $rules = 'required|image|mimes:jpeg,jpg,png|max:1024';
        }

        return $rules;
    }
    private function paymentTypeRules()
    {
        $rules = ['nullable'];

        $temp = explode(':',request()->enroll_for);

        if($temp[0] == 'training') {
            if($temp[1] == 'enabling-video-series'){
                $rules = ['required', Rule::in(['cash','online','free'])];
            } elseif($temp[1] == 'book'){
                $rules = ['required', Rule::in(['online'])];
            } else {
                $rules = ['required', Rule::in(['cash','online'])];
            }
        }

        return $rules;
    }
    private function numberOfSeatsRules()
    {
        $rules = ['nullable'];

        $enrollFor = explode(':',request()->enroll_for)[0];
        if($enrollFor == 'seminar'){
            $rules = ['required','max:999'];
        }

        return $rules;
    }
    private function hiredForHoursRules()
    {
        $rules = ['nullable'];

        $enrollFor = explode(':',request()->enroll_for)[0];
        if($enrollFor == 'trainer' and request()->mentorship === 'hourly'){
            $rules = ['required','max:999'];
        }

        return $rules;
    }
    private function transactionTypeRules()
    {
        $rules = ['nullable'];

        $enrollFor = explode(':',request()->enroll_for)[0];
        if($enrollFor == 'training'){
            $rules = ['required_if:payment_type,online', Rule::in(['local','international'])];
        }

        return $rules;
    }
}
