<?php

namespace App\Http\Requests\Enablers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'email' => 'required|email|max:60|unique:virtual_assistant_requests',
            'city'  => 'required|string|max:30',
            'contact_number'  => 'required|string|max:15',
            'va_experience'  => 'required|string|max:60',
            'speciality'  => 'required|string|min:3|max:60',
            'product_hunting'  => ['required', Rule::in(['Good','Normal','Low'])],
            'listing_creation'  => ['required', Rule::in(['Good','Normal','Low'])],
            'bulk_listing'  => ['required', Rule::in(['Good','Normal','Low'])],
            'ppc'  => ['required', Rule::in(['Good','Normal','Low'])],
            'listing_copy_writing'  => ['required', Rule::in(['Good','Normal','Low'])],
            'keyword_research'  => ['required', Rule::in(['Good','Normal','Low'])],
            'fba_shipment_creation'  => ['required', Rule::in(['Good','Normal','Low'])],
            'product_launch'  => ['required', Rule::in(['Good','Normal','Low'])],
            'images_designing'  => ['required', Rule::in(['Good','Normal','Low'])],
            'a_plus_content_manager'  => ['required', Rule::in(['Good','Normal','Low'])],
            'promotions_creation'  => ['required', Rule::in(['Good','Normal','Low'])],
            'fbm_orders_management'  => ['required', Rule::in(['Good','Normal','Low'])],
            'availability'  => ['required', Rule::in(['4 Hours','8 Hours','as required'])],
            'short_summary'  => 'required|string|max:600',
            'comments'  => 'nullable|string|max:600'
        ];
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
