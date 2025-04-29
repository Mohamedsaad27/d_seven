<?php

namespace App\Repositories;

use App\Interfaces\ReviewRepositoryInterface;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewRepository implements ReviewRepositoryInterface
{
    public function getReviews(Product $product)
    {
        return $product->reviews()->orderBy('created_at', 'desc')->get();
    }

    public function createReview(Request $request)
    {
        $validatedData = $request->validate([
            'rating' => 'required|numeric|between:1,5',
            'comment' => 'required',
        ]);
        $validatedData['product_id'] = $request->product_id;
        $validatedData['user_id'] = auth()->user()->id;
        return Review::create([
            'product_id' => $validatedData['product_id'],
            'user_id' => $validatedData['user_id'],
            'rating' => $validatedData['rating'],
            'comment' => $validatedData['comment'],
        ]);
    }

    public function updateReview(Review $review, Request $request)
    {
        return $review->update($request->all());
    }

    public function deleteReview(Review $review)
    {
        return $review->delete();
    }
}
