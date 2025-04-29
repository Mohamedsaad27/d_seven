<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Interfaces\ReviewRepositoryInterface;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    private $reviewRepository;

    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function index(Product $product)
    {
        $reviews = $this->reviewRepository->getReviews($product);
        return view('website.reviews', compact('reviews', 'product'));
    }

    public function store(Request $request)
    {
        $this->reviewRepository->createReview($request);
        return redirect()->back()->with('success', 'Review added successfully');
    }

    public function update(Request $request, Review $review)
    {
        $this->reviewRepository->updateReview($review, $request);
        return redirect()->back();
    }

    public function destroy(Review $review)
    {
        $this->reviewRepository->deleteReview($review);
        return redirect()->back();
    }
}
