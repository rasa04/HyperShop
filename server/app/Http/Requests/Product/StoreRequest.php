<?php

namespace App\Http\Requests\Product;

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
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|integer|max:10000|min:1',
            'about' => 'required|string|min:20',
            'product_images' => 'required|array|min:1|max:3',
            'brand_id' => 'required',
            'category_id' => 'required',
        ];
    }
}
