<?php

namespace App\Http\Requests\Dashboard\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            // Basic Information
            'name_en' => [
                'required',
                'string',
                'min:2',
                'max:255',
                'regex:/^[a-zA-Z0-9\s\-\_\.\,\(\)]+$/',  // Allow alphanumeric, spaces, and common punctuation
            ],
            'name_ar' => [
                'required',
                'string',
                'min:2',
                'max:255',
                'regex:/^[\p{Arabic}\s\-\_\.\,\(\)0-9]+$/u',  // Allow Arabic characters, spaces, and common punctuation
            ],
            'description_en' => [
                'required',
                'string',
                'min:10',
                'max:5000',
            ],
            'description_ar' => [
                'required',
                'string',
                'min:10',
                'max:5000',
            ],
            'price' => [
                'required',
                'numeric',
                'min:0.01',
                'max:999999.99',
                'regex:/^\d+(\.\d{1,2})?$/',  // Ensure proper decimal format
            ],
            'category_id' => [
                'required',
                'integer',
                'exists:categories,id',
            ],
            'brand_id' => [
                'required',
                'integer',
                'exists:brands,id',
            ],
            'is_active' => [
                'nullable',
                'boolean',
            ],
            // Images
            'images' => [
                'required',
                'array',
                'min:1',
                'max:10',  // Maximum 10 images
            ],
            'images.*' => [
                'required',
                'image',
                'mimes:jpeg,jpg,png,webp',
                'max:5120',  // 5MB max per image
                'dimensions:min_width=300,min_height=300,max_width=3000,max_height=3000',
            ],
            // Colors
            'colors' => [
                'required',
                'array',
                'min:1',
                'max:20',  // Maximum 20 colors
            ],
            'colors.*' => [
                'required',
                'integer',
                'exists:colors,id',
                'distinct',  // No duplicate colors
            ],
            // Inventory
            'inventory_colors' => [
                'required',
                'array',
                'min:1',
            ],
            'inventory_colors.*' => [
                'required',
                'integer',
                'exists:colors,id',
            ],
            'quantities' => [
                'required',
                'array',
                'size:' . count($this->input('inventory_colors', [])),  // Must match inventory_colors array size
            ],
            'quantities.*' => [
                'required',
                'integer',
                'min:0',
                'max:999999',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            // Basic Information Messages
            'name_en.required' => 'English name is required.',
            'name_en.min' => 'English name must be at least 2 characters.',
            'name_en.max' => 'English name cannot exceed 255 characters.',
            'name_en.regex' => 'English name contains invalid characters.',
            'name_ar.required' => 'Arabic name is required.',
            'name_ar.min' => 'Arabic name must be at least 2 characters.',
            'name_ar.max' => 'Arabic name cannot exceed 255 characters.',
            'name_ar.regex' => 'Arabic name contains invalid characters.',
            'description_en.required' => 'English description is required.',
            'description_en.min' => 'English description must be at least 10 characters.',
            'description_en.max' => 'English description cannot exceed 5000 characters.',
            'description_ar.required' => 'Arabic description is required.',
            'description_ar.min' => 'Arabic description must be at least 10 characters.',
            'description_ar.max' => 'Arabic description cannot exceed 5000 characters.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a valid number.',
            'price.min' => 'Price must be at least $0.01.',
            'price.max' => 'Price cannot exceed $999,999.99.',
            'price.regex' => 'Price must have maximum 2 decimal places.',
            'category_id.required' => 'Category is required.',
            'category_id.exists' => 'Selected category does not exist.',
            'brand_id.required' => 'Brand is required.',
            'brand_id.exists' => 'Selected brand does not exist.',
            // Images Messages
            'images.required' => 'At least one product image is required.',
            'images.min' => 'At least one product image is required.',
            'images.max' => 'Maximum 10 images allowed.',
            'images.*.required' => 'All image files are required.',
            'images.*.image' => 'File must be a valid image.',
            'images.*.mimes' => 'Image must be JPEG, JPG, PNG, or WebP format.',
            'images.*.max' => 'Image size cannot exceed 5MB.',
            'images.*.dimensions' => 'Image dimensions must be between 300x300 and 3000x3000 pixels.',
            // Colors Messages
            'colors.required' => 'At least one color must be selected.',
            'colors.min' => 'At least one color must be selected.',
            'colors.max' => 'Maximum 20 colors allowed.',
            'colors.*.required' => 'Color selection is required.',
            'colors.*.exists' => 'Selected color does not exist.',
            'colors.*.distinct' => 'Duplicate colors are not allowed.',
            // Inventory Messages
            'inventory_colors.required' => 'Inventory colors are required.',
            'inventory_colors.min' => 'At least one inventory entry is required.',
            'inventory_colors.*.required' => 'Inventory color is required.',
            'inventory_colors.*.exists' => 'Selected inventory color does not exist.',
            'quantities.required' => 'Quantities are required.',
            'quantities.size' => 'Quantities must match the number of inventory colors.',
            'quantities.*.required' => 'Quantity is required.',
            'quantities.*.integer' => 'Quantity must be a whole number.',
            'quantities.*.min' => 'Quantity cannot be negative.',
            'quantities.*.max' => 'Quantity cannot exceed 999,999.',
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Check if inventory colors are subset of product colors
            $colors = $this->input('colors', []);
            $inventoryColors = $this->input('inventory_colors', []);

            $invalidInventoryColors = array_diff($inventoryColors, $colors);
            if (!empty($invalidInventoryColors)) {
                $validator->errors()->add(
                    'inventory_colors',
                    'All inventory colors must be selected in the product colors section.'
                );
            }

            // Check for duplicate inventory color entries
            if (count($inventoryColors) !== count(array_unique($inventoryColors))) {
                $validator->errors()->add(
                    'inventory_colors',
                    'Duplicate inventory colors are not allowed.'
                );
            }

            // Validate that quantities array has values for each inventory color
            $quantities = $this->input('quantities', []);
            if (count($inventoryColors) !== count($quantities)) {
                $validator->errors()->add(
                    'quantities',
                    'Each inventory color must have a corresponding quantity.'
                );
            }
        });
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Clean and prepare the data
        $this->merge([
            'price' => is_numeric($this->price) ? round((float) $this->price, 2) : $this->price,
            'is_active' => $this->has('is_active') ? 1 : 0,
            'colors' => array_filter($this->input('colors', []), function ($value) {
                return !empty($value);
            }),
            'inventory_colors' => array_filter($this->input('inventory_colors', []), function ($value) {
                return !empty($value);
            }),
            'quantities' => array_filter($this->input('quantities', []), function ($value) {
                return $value !== null && $value !== '';
            }),
        ]);
    }
}
