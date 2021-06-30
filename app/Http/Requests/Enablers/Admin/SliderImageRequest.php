<?php

namespace App\Http\Requests\Enablers\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SliderImageRequest extends FormRequest
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
            'image_alt_name' => 'required|string|min:3|max:60',
            'web_image' => $this->ImageRules('web_image'),
            'mobile_image' => $this->ImageRules('mobile_image')
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
