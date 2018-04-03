<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormValidation extends FormRequest
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
            'username' => 'required|unique|max:50',
			'password' => 'required|min:6',
        ];
    }
	public function messages()
    {
        return [
            'username.required' => 'Please Enter Email',
            'password.required' => 'Please Enter password',
            'password.min' => 'Password should be more than 6 characters',
			
        ];
    }
}
