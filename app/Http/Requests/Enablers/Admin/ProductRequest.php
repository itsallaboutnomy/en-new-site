<?php

namespace App\Http\Requests\Enablers\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'short_summary' => 'required|string|min:3|max:190',
            'summary' => 'nullable|string|max:600',
            'redirect_url' => 'nullable|string|max:190',
            'logo' => $this->ImageRules('logo'),
            'banner' => $this->ImageRules('banner')
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
