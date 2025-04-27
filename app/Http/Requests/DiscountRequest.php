<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'discount_type' => 'required|in:percent,fixed',
            'discount_amount' => 'required|numeric|min:0',
            'starts_at' => 'required|date|after_or_equal:today',
            'ends_at' => 'required|date|after:starts_at',
            'is_active' => 'sometimes|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name must be at most 255 characters.',
            'discount_type.required' => 'The discount type field is required.',
            'discount_type.in' => 'The discount type must be percent or fixed.',
            'discount_amount.required' => 'The discount amount field is required.',
            'discount_amount.numeric' => 'The discount amount must be a number.',
            'discount_amount.min' => 'The discount amount must be at least 0.',
            'starts_at.required' => 'The starts at field is required.',
            'starts_at.date' => 'The starts at must be a valid date.',
            'starts_at.after_or_equal' => 'The starts at must be today or a future date.',
            'ends_at.required' => 'The ends at field is required.',
            'ends_at.date' => 'The ends at must be a valid date.',
            'ends_at.after' => 'The ends at must be after the starts at.',
            'is_active.boolean' => 'The is active must be a active or inactive .',
        ];
    }
}
