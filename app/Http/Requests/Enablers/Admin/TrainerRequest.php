<?php

namespace App\Http\Requests\Enablers\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TrainerRequest extends FormRequest
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
            'order_number' => 'required|integer|min:1|max:30',
            'name' => 'required|string|min:3|max:190',

            'mentorship_fee' => 'nullable|integer|min:10|max:1000000',
            'is_mentorship_enabled' => 'required|boolean',
            'mentorship_fee_currency' => ['required', Rule::in(['PKR','USD'])],

            'per_hour_fee' => 'nullable|integer|min:10|max:1000000',
            'is_per_hour_enabled' => 'required|boolean',
            'per_hour_fee_currency' => ['required', Rule::in(['PKR','USD'])],

            'profile_image' => $this->ImageRules()
        ];
    }

    private function ImageRules() : string
    {
        $rules = 'required|image|mimes:jpeg,png,jpg|max:2048';
        if(request()->method() == 'PUT' and !request()->hasFile('profile_image')){
            $rules = 'nullable';
        }

        return $rules;
    }
}
