<?php

namespace App\Http\Requests\Enablers;

use Illuminate\Foundation\Http\FormRequest;

class FranchiseApplicationRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:60'],
            'last_name'  => ['required', 'string', 'max:60'],
            'father_name'  =>  ['required', 'string', 'max:60'],
            'shareholder'  =>  ['required', 'string', 'max:30'],
            'address'  =>  ['required', 'string', 'max:190'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'cnic' => ['required', 'string', 'unique:franchise_applications', 'min:8', 'max:16'],
            'phone' => ['required', 'string', 'min:11', 'max:15'],
            'country' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:100'],
        ];
    }
}
