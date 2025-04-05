<?php

namespace App\Http\Requests\Dashboard\Brand;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name_ar.required' => 'The Arabic name is required.',
            'name_ar.string' => 'The Arabic name must be a string.',
            'name_ar.max' => 'The Arabic name may not be longer than 255 characters.',
            'name_en.required' => 'The English name is required.',
            'name_en.string' => 'The English name must be a string.',
            'name_en.max' => 'The English name may not be longer than 255 characters.',
            'description_ar.string' => 'The Arabic description must be a string.',
            'description_en.string' => 'The English description must be a string.',
            'image.image' => 'The image must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image may not be larger than 2048 kilobytes.',
            'is_active.required' => 'The active status is required.',
            'is_active.boolean' => 'The active status must be a boolean value.',
        ];
    }
}
