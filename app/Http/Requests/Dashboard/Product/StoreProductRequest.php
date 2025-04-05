<?php

namespace App\Http\Requests\Dashboard\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'is_active' => 'required|boolean',
            'images' => 'required|array|min:1',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'colors' => 'required|array|min:1',
            'colors.*' => 'required|exists:colors,id',
            'sizes' => 'nullable|array|min:1',
            'sizes.*' => 'nullable|string',
            'additional_prices' => 'nullable|numeric|min:0',
            'additional_prices.*' => 'nullable|numeric|min:0',
            'inventory_colors' => 'required|array|min:1',
            'inventory_colors.*' => 'required|exists:product_colors,id',
            'inventory_sizes' => 'required|array|min:1',
            'inventory_sizes.*' => 'required|exists:product_sizes,id',
            'quantities' => 'required|array|min:1',
            'quantities.*' => 'required|numeric|min:0',
        ];
    }
    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name_en.required' => 'English name is required.',
            'name_ar.required' => 'Arabic name is required.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a number.',
            'price.min' => 'Price must be at least 0.',
            'description_en.required' => 'English description is required.',
            'description_ar.required' => 'Arabic description is required.',
            'category_id.required' => 'Category is required.',
            'category_id.exists' => 'Category does not exist.',
            'brand_id.required' => 'Brand is required.',
            'brand_id.exists' => 'Brand does not exist.',
            'is_active.required' => 'Active status is required.',
            'is_active.boolean' => 'Active status must be a boolean.',
            'images.required' => 'At least one image is required.',
            'images.array' => 'Images must be an array.',
            'images.min' => 'At least one image is required.',
            'images.*.image' => 'Each image must be an image.',
            'images.*.mimes' => 'Each image must be a valid image format.',
            'images.*.max' => 'Each image size must not be greater than 2048KB.',
            'colors.required' => 'At least one color is required.',
            'colors.array' => 'Colors must be an array.',
            'colors.min' => 'At least one color is required.',
            'colors.*.exists' => 'Color does not exist.',
            'sizes.array' => 'Sizes must be an array.',
            'sizes.min' => 'At least one size is required.',
            'additional_prices.numeric' => 'Additional price must be a number.',
            'additional_prices.min' => 'Additional price must be at least 0.',
            'inventory_colors.required' => 'At least one inventory color is required.',
            'inventory_colors.array' => 'Inventory colors must be an array.',
            'inventory_colors.min' => 'At least one inventory color is required.',
            'inventory_colors.*.exists' => 'Inventory color does not exist.',
            'inventory_sizes.required' => 'At least one inventory size is required.',
            'inventory_sizes.array' => 'Inventory sizes must be an array.',
            'inventory_sizes.min' => 'At least one inventory size is required.',
            'inventory_sizes.*.exists' => 'Inventory size does not exist.',
            'quantities.required' => 'At least one quantity is required.',
            'quantities.array' => 'Quantities must be an array.',
            'quantities.min' => 'At least one quantity is required.',
            'quantities.*.numeric' => 'Quantity must be a number.',
            'quantities.*.min' => 'Quantity must be at least 0.',
        ];
    }
}
