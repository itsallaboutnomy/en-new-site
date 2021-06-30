<?php

namespace App\Http\Requests\Enablers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServicesDirectoryRequests extends FormRequest
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
            'name' => 'required|string|min:3|max:60',
            'email' => 'required|email|max:60',
            'phone'  => 'required|string|max:20',
            'cnic'  => 'required|string|max:60',
            'service'  => 'required',
            'employees'  => 'required|string|max:30',
            'office_address'  => 'required|string|max:200',
            'city'  => 'required|string|max:60',
            'country'  => 'required|string|max:60',
            'message'  => 'required|string|max:100',
        ];
    }
}
