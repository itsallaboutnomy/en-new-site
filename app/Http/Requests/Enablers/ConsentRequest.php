<?php

namespace App\Http\Requests\Enablers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConsentRequest extends FormRequest
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
            'slug' => ['required', Rule::in([
                'exl-consent',
                'student-consent',
                'one-year-consent',
                'fba-wholesale-consent',
                'listing-promoter-consent',
            ])],
            'name' => 'required|string|max:60',
            'email' => 'required|email|max:60',
            'phone' => 'required|string|max:15',
            'training_id' => 'required_if:slug,student-consent',
            'signature_image_path' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'terms' => ['required', 'array', 'min:'.request()->termsCount]
        ];
    }

    public function messages()
    {
       return [
           'terms.required' => 'Please choose consent terms',
           'terms.min' =>  'Please choose all consent terms',

           'signature_image_path.required' => 'The digital signature field is required',
       ];
    }
}
