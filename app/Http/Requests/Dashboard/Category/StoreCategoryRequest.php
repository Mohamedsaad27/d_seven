<?php

namespace App\Http\Requests\Dashboard\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent_category_id' => 'nullable|exists:categories,id',
            'is_active' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name_en.required' => 'English name is required.',
            'name_ar.required' => 'Arabic name is required.',
            'image.required' => 'Image is required.',
            'image.image' => 'The image must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image may not be larger than 2048 kilobytes.',
            'parent_category_id.exists' => 'The selected parent category is invalid.',
            'is_active.required' => 'Active status is required.',
            'is_active.boolean' => 'The active status must be a boolean value.',
        ];
    }
}
