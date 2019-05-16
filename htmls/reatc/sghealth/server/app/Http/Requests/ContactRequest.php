<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'          => 'required|regex:/^[\pL\s\-]+$/u',
            'email'         => 'required|string|email|max:255',
            'phone_number'  => 'required',
            'country_code'  => 'required',
            'body'          => 'required',
            ];
    }

    public function messages()
    {   
        return [
            'name.required'     => 'Please provide a valid name',
            'email.required'    => 'Please provide the valid email',
            'phone_number.required' => 'Please provide the phone_number',
            'body.required'     => 'Please provide a messege',
            'country_code.required'     => 'Please provide a country code',
        ];
    }
}
