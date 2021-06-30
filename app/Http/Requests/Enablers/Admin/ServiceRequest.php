<?php

namespace App\Http\Requests\Enablers\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'service_image' => $this->ImageRules('service_image'),
            'name' => 'required|string|min:3|max:60',
            'url' => 'required|string|min:2|max:150',
        ];
    }
    private function ImageRules($file) : string
    {
        $rules = 'required|image|mimes:jpeg,png,jpg|max:2048';
        if(request()->method() == 'PUT' and !request()->hasFile($file)){
            $rules = 'nullable';
        }

        return $rules;
    }
}
