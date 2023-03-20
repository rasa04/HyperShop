<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'username' => 'required|string|unique:users,username',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'display_name' => 'required|string',
            'first_name' => 'nullable|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'age' => 'nullable|integer',
            'address' => 'nullable|string',
            'gender' => 'required|integer'
        ];
    }
}
