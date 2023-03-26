<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "display_name" => "required|string",
            "username" => "required|string|max:30|unique:users,username",
            "email" => "required|string|max:50|unique:users,email",
            "password" => "required|string|min:5|max:80|confirmed",
        ];
    }
}
