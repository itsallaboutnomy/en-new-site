<?php

namespace App\Http\Requests\Enablers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AppointmentRequest extends FormRequest
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
            'full_name' => 'required|string|max:60',
            'email' => 'required|email|max:60',
            'phone'  => 'required|string|max:20',
            'office_id'  => 'required',
            'appointment_date'  => 'required|date|max:30',
            'purpose_visit'  => 'required|string|max:100',
            'appointment_time'  => ['required', Rule::in(['2:00PM - 3:00PM', '3:00PM - 5:00PM'])],
        ];
    }
}
