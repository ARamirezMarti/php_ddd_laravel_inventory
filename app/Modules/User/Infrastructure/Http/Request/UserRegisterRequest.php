<?php

namespace User\Infrastructure\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'lastname' => 'required',
            'password' => 'required|min:8',
        ]; 
    }

    public function messages(){
     
        return [
            'name.required' => 'Name field is required.',
            'password.required' => 'Password field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be email address.',
            'email.unique' => 'That email is already in use ',
            'password.min' => 'Password has to be 8 character at least',  

        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator ){

        $errors = $this->validator->errors();

        throw new \Illuminate\Http\Exceptions\HttpResponseException(
            response()->json([
                'errors' => $errors->all(),

            ], )
        );
    }

    
}
