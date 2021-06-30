<?php

namespace App\Http\Requests\QuizCertification;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ExaminerRequest extends FormRequest
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
            'name' => 'required|max:60',
            'email' => $this->emailRules(),
            'password' => $this->passwordRules(),
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    private function passwordRules() : string
    {
        $rules = 'required|max:6|max:60|same:confirm-password';
        if(request()->method() == 'PUT'){
            $rules = 'nullable|max:6|max:60|same:confirm-password';
        }

        return $rules;
    }

    private function emailRules() : string
    {
        $rules = 'required|email|max:60|unique:users,email';
        if(request()->method() == 'PUT'){
            $user = User::where('email', $this->email)->first();
            $rules = 'required|email|unique:users,email,'.$user->id;
        }

        return $rules;
    }
}
