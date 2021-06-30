<?php

namespace App\Http\Requests\Enablers\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
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
            'order_number' => 'required|integer|min:1|max:20',
            'starting_at' => 'nullable',
            'ending_at' => 'nullable',
            'title' => 'required|string|min:3|max:190',
            'slug' => 'required|string|max:190',
            'key' => 'required|string|min:3|max:5',
            'charging_fee' => 'nullable|integer|min:10|max:1000000',
            'currency' => ['required', Rule::in(['PKR','USD'])],
            'cities' => 'required|array',
            'short_summary' => 'required',
        ];
    }
}
