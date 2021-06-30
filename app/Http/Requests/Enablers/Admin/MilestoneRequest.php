<?php

namespace App\Http\Requests\Enablers\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MilestoneRequest extends FormRequest
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
            'order_number' => 'required|integer|min:1|max:9',
            'title' => 'required|string|min:3|max:60',
            'sub_title' => 'required|string|min:3|max:100',
            'summary' => 'nullable|string|max:600',
            'logo' => $this->ImageRules()
        ];
    }

    private function ImageRules() : string
    {
        $rules = 'required|image|mimes:jpeg,png,jpg|max:2048';
        if(request()->method() == 'PUT' and !request()->hasFile('logo')){
            $rules = 'nullable';
        }

        return $rules;
    }
}
