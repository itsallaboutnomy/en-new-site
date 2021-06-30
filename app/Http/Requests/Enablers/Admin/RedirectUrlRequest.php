<?php

namespace App\Http\Requests\Enablers\Admin;

use Illuminate\Foundation\Http\FormRequest;
use function Symfony\Component\Translation\t;

class RedirectUrlRequest extends FormRequest
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
            'url_name' => 'required|min:3|max:60' ,
            'redirect_from' => 'required|max:190',
            'redirect_to' => 'required|max:190',
            'description'  => 'nullable|max:190'
        ];
    }
}
