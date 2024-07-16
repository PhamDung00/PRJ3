<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'product_details' => 'required|array',
            'product_details.*.sizes' => 'required|array',
            'product_details.*.sizes.*.quantity' => 'required|integer|min:0',
            'product_details.*.sizes.*.name' => 'required|string|max:255',
            'product_details.*.colors' => 'required|array',
            'product_details.*.colors.*.quantity' => 'required|integer|min:0',
            'product_details.*.colors.*.name' => 'required|string|max:255',
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,PNG,jpec',
            'description' => 'required',
            'sale' => 'nullable',
            'price' => 'required',
            'category_ids' => 'required'
        ];
    }
}
