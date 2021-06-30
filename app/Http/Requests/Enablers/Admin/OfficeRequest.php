<?php

namespace App\Http\Requests\Enablers\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OfficeRequest extends FormRequest
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
            'order_number' => 'required|integer|min:1|max:50',
            'title' => 'required|string|min:3|max:60',

            'city' => 'required|string|min:3|max:60',
            'address' => 'required|string|min:3|max:190',

            'timings' => 'nullable|string|max:20',
            'working_days' => 'nullable|string|max:20',

            'phone' => 'nullable|string|min:8|max:20',
            'mobile' => 'nullable|string|min:11|max:20',
            'fax' => 'nullable|string|min:8|max:20',

            'map_link' => 'nullable|string|max:190',
            'short_summary' => 'nullable|string|max:500',

            'image' => $this->ImageRules(),
        ];
    }

    private function ImageRules() : string
    {
        $rules = 'required|image|mimes:jpeg,png,jpg|max:2048';
        if(request()->method() == 'PUT' and !request()->hasFile('image')){
            $rules = 'nullable';
        }

        return $rules;
    }
}
