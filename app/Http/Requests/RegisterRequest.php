<?php

namespace App\Http\Requests;

use Exception;
use Illuminate\Foundation\Http\FormRequest;

use function PHPUnit\Framework\returnSelf;

class RegisterRequest extends FormRequest
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
            "register_first_name" => "required|string",
            "register_last_name" => "required|string",
            "register_email" => "required|email|unique:users,email",
            "register_password" => "required|min:3|max:10",
            "register_confirm_password" => "required_with:register_password|same:register_password",
            "register_address" => "required|string",
            "register_phone" => "required|min:10|unique:users,phone"
        ];
    }
    public function errors()
    {
        return [
            "register_first_name|required" => "First Name is required",
            "register_first_name|string" => "First Name needs to be text",
            "register_last_name|required" => "Last Name is required",
            "register_last_name|string" => "Last Name needs to be text",
            "register_email|required" => "Email is required",
            "register_email|email" => "Email needs to be in email format",
            "register_email|unique" => "Email is already taken",
            "register_password|required" => "Password is required",
            "register_password|min" => "Password needs to have at least 3 characters",
            "register_password|max" => "Password can have a maximum of 8 characters",
            "register_confirm_password|required_with" => "Confirm password is required",
            "register_confirm_password|same" => "Confirm password and password don't match",
            "register_address|required" => "Address is required",
            "register_phone|required" => "Phone is required",
            "register_phone|string" => "Phone needs to be valid",
            "register_phone|min" => "Phone needs to have at least 10 characters",
            "register_address|string" => "Address needs to be text",
        ];
    }
}
