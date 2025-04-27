<?php

namespace App\Repositories;

use App\Http\Requests\DiscountRequest;
use App\Interfaces\DiscountRepositoryInterface;
use App\Models\Discount;
use App\Models\Product;

class DiscountRepository implements DiscountRepositoryInterface
{
    private $discount;

    public function __construct(Discount $discount, Product $product)
    {
        $this->discount = $discount;
        $this->product = $product;
    }

    public function getAllDiscounts()
    {
        return $this->discount->orderBy('created_at', 'desc')->get();
    }

    public function getDiscountById(Discount $discount)
    {
        return $this->discount->findOrFail($discount->id);
    }

    public function createDiscount(DiscountRequest $discountRequest)
    {
        $validated = $discountRequest->validated();
        return $this->discount->create($validated);
    }

    public function updateDiscount(Discount $discount, DiscountRequest $discountRequest)
    {
        $validated = $discountRequest->validated();
        if (!isset($validated['is_active'])) {
            $validated['is_active'] = 0;
        }
        return $discount->update($validated);
    }

    public function deleteDiscount(Discount $discount)
    {
        return $discount->delete();
    }
}
