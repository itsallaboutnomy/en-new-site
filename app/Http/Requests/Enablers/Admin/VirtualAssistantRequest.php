<?php

namespace App\Http\Requests\Enablers\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VirtualAssistantRequest extends FormRequest
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
            'skills' => 'required|array',
            'experience_level' => 'required|string|max:60',
            'facebook_link' => 'nullable|max:190',
            'linkedin_link' => 'nullable|max:190',
        ];
    }
}
