<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            //
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'nullable|url',
            'sale' => 'nullable|integer|min:0|max:100',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'sizes' => 'nullable|array',
            'sizes.*' => 'required|string|max:255',
            'colors' => 'nullable|array',
            'colors.*' => 'required|string|max:255',
        ];
    }
}
