<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            "email" => "email|unique:users,email",
            "address" => "string|min:3",
            "phone" => "string|min:10|unique:users,phone",
        ];
    }
    public function errors()
    {
        return [
            "email|email" => "Email needs to be in email format",
            "email|unique" => "Email is already taken",
            "address|string" => "Address needs to be text",
            "address|min" => "Address needs to have at least 3 characters",
            "phone|string" => "Phone needs to be valid",
            "phone|min" => "Phone needs to have at least 10 characters",
            "phone|unique" => "Phone is already taken"
        ];
    }
}
