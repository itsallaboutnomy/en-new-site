<?php

namespace App\Http\Requests\Enablers\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'order_number' => 'required|integer|min:1|max:20',
            'type' => ['required', Rule::in(['seminar','upcoming'])],
            'title' => 'required|string|max:190',
            'topic' => $this->topicRules(),
            'location' => 'required|string|max:190',
            'venue' => $this->venueRules(),
            'charging_fee' => 'required|integer|min:0|max:1000000',
            'currency' => ['required', Rule::in(['PKR','USD'])],
            'host_name' => $this->hostNameRules(),
            'host_designation' => $this->hostDesignationRules(),
        ];
    }


    private function topicRules() : string
    {
        $rules = 'nullable';
        if(request()->type == 'upcoming'){
            $rules = 'required|string|max:190';
        }

        return $rules;
    }
    private function hostNameRules() : string
    {
        $rules = 'nullable';
        if(request()->type == 'upcoming'){
            $rules = 'required|string|max:190';
        }

        return $rules;
    }
    private function hostDesignationRules() : string
    {
        $rules = 'nullable';
        if(request()->type == 'upcoming'){
            $rules = 'required|string|max:190';
        }

        return $rules;
    }
    private function venueRules() : string
    {
        $rules = 'nullable';
        if(request()->type == 'seminar'){
            $rules = 'required|string|max:190';
        }

        return $rules;
    }

}
