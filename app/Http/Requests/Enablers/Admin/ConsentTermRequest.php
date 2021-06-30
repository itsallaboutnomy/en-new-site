<?php

namespace App\Http\Requests\Enablers\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConsentTermRequest extends FormRequest
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
            'consent_for' => ['required' ,Rule::in([
                'Student Consent',
                'FBA Wholesale Consent',
                'One Year Specialization Consent',
                'Listing Promoter Consent',
                'EXL Consent'
            ])],
            'terms' => 'required'
        ];
    }
}
