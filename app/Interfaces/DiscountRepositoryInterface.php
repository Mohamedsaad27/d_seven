<?php

namespace App\Interfaces;

use App\Models\Discount;
use App\Http\Requests\DiscountRequest;

interface DiscountRepositoryInterface
{
    public function getAllDiscounts();
    public function getDiscountById(Discount $discount);
    public function createDiscount(DiscountRequest $request);
    public function updateDiscount(Discount $discount, DiscountRequest $request);
    public function deleteDiscount(Discount $discount);
}
