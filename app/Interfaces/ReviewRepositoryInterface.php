<?php

namespace App\Interfaces;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

interface ReviewRepositoryInterface
{
    public function getReviews(Product $product);
    public function createReview(Request $request);
    public function updateReview(Review $review, Request $request);
    public function deleteReview(Review $review);
}
