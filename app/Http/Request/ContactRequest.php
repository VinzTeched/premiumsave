<?php

namespace App\Http\Request;

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
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ];
    }
    
    public function messages(){
        return [
            'name.required' => 'The name field should be filled'
        ];
        
    }
    
    public function attributes(){
        return [
            'email' => 'email address',
            'phone' => 'Phone Number'
        ];
    }
}
