<?php

namespace App\Http\Requests\Enablers\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EVSSeriesRequest extends FormRequest
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
            'order_number' => 'required|integer|min:1|max:100',
            'image_path' => $this->ImageRules('image_path'),
            'title' => 'required|string|min:3|max:60',
            'short_summary' => 'required|string|min:3|max:600',
        ];
    }
    private function ImageRules($file) : string
    {
        $rules = 'nullable|image|mimes:jpeg,png,jpg|max:2048';
        if(request()->method() == 'PUT' and !request()->hasFile($file)){
            $rules = 'nullable';
        }

        return $rules;
    }
}
