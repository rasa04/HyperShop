<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'categories' => 'nullable|array',
            'brands' => 'nullable|array',
            'prices' => 'nullable|array',
            'page' => 'nullable|integer',
            'id' => 'nullable|array'
        ];
    }
}
