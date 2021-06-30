<?php

namespace App\Http\Requests\Enablers\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title'  =>'required|max:190',
            'slug'  =>'required|max:190',
            'blog_image'  => $this->ImageRules(),
            'author'  =>'required|max:30',
            'date'  =>'required',
            'category'  =>'required|max:190',
            'short_summary' =>'required|max:500',
            'content'  =>'required',
        ];
    }

    private function ImageRules() : string
    {
        $rules = 'required|image|mimes:jpeg,png,jpg|max:2048';
        if(request()->method() == 'PUT' and !request()->hasFile('blog_image')){
            $rules = 'nullable';
        }

        return $rules;
    }
}
