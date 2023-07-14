<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Signup extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ];
    }

    public function attributes()
    {
        return [
            "first_name" => "First Name",
            "last_name" => "Last Name",
            "email" => "Email Address",
            "password" => "Password"
        ];
    }

    public function messages()
    {
        return [
            "required" => ':attribute is required',
            "unique" => 'An account with this :attribute already exists',
            "confirmed" => ':attribute must match with Confirm Password'
        ];
    }
}
