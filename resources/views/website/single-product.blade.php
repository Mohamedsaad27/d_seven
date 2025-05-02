@extends('layouts.website.master')
@section('title', 'Single Product')

@section('content')
    <!-- Breadcrumbs -->
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="lni lni-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name_en }}</li>
            </ol>
        </nav>
    </div>

    <!-- Product Details -->
    <section class="container py-5">
        <div class="row">
            <!-- Product Gallery -->
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="product-gallery">
                    <div class="main-image">
                        <img id="currentImage" src="{{ asset($product->productImages->where('is_primary', 1)->first()->image_url ?? asset($product->productImages->first()->image_url ?? 'uploads/default-product-image.jpg'))}}" alt="{{ $product->name_en }}">
                    </div>
                    <div class="thumbnails">
                        @foreach($product->productImages as $image)
                            <div class="thumbnail {{ $loop->first ? 'active' : '' }}" data-src="{{ asset($image->image_url) }}">
                                <img src="{{ asset($image->image_url) }}" alt="Product thumbnail">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-6">
                <div class="product-info">
                    <h1 class="product-title">{{ $product->name_en }}</h1>
                    @if($product->name_ar)
                        <h1 class="product-title">{{ $product->name_ar }}</h1>
                    @endif
                    <div class="product-category">
                        <i class="lni lni-tag"></i>
                        {{ $product->category->name_en }}
                        @if($product->brand)
                            <span>|</span>
                            <a href="{{ route('product.index', $product->brand->id) }}">{{ $product->brand->name_en }}</a>
                        @endif
                    </div>
                    
                    <div class="review-stars mb-3">
                        @php
                            $rating = $product->calculateRating();
                            $fullStars = floor($rating);
                            $halfStar = $rating - $fullStars >= 0.5;
                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                        @endphp
                        
                        @for($i = 0; $i < $fullStars; $i++)
                            <i class="lni lni-star-filled"></i>
                        @endfor
                        
                        @if($halfStar)
                            <i class="lni lni-star-half"></i>
                        @endif
                        
                        @for($i = 0; $i < $emptyStars; $i++)
                            <i class="lni lni-star"></i>
                        @endfor
                        
                        <span class="ms-2 text-muted">({{ number_format($product->calculateRating(), 1) }} Reviews)</span>
                    </div>
                    
                    <div class="product-price"> 
                        @php 
                            $discountedPrice = $product->price; 
                            $hasDiscount = false;
                            $discountEndsAt = null;
                            
                            if($product->discounts->isNotEmpty()) { 
                                foreach($product->discounts as $discount) { 
                                    if($discount->is_active && $discount->ends_at > now()) { 
                                        $newPrice = 0;
                                        
                                        if($discount->discount_type == 'fixed') { 
                                            $newPrice = max($product->price - $discount->discount_amount, 0);
                                        } else { 
                                            $discountPercentage = min(max($discount->discount_amount, 0), 100);
                                            $newPrice = $product->price - ($product->price * $discountPercentage / 100); 
                                        } 
                                        $minimumPrice = 0; 
                                        $discountedPrice = max($newPrice, $minimumPrice);
                                        $hasDiscount = true;
                                        $discountEndsAt = $discount->ends_at;
                                        break; 
                                    } 
                                } 
                            } 
                        @endphp 

                        @if($hasDiscount) 
                            <div class="price-container">
                                <div class="current-price">{{ number_format($discountedPrice, 2) }} EGP</div>
                                <div class="original-price">{{ number_format($product->price, 2) }} EGP</div>
                                <div class="discount-timer">
                                    Sale ends: {{ \Carbon\Carbon::parse($discountEndsAt)->format('F j, Y') }}
                                </div>
                            </div>
                        @else 
                            {{ number_format($product->price, 2) }} EGP 
                        @endif 
                    </div>
                    
                    <p class="product-description">
                        @if($product->description_ar)
                            {{ $product->description_ar }}
                        @else
                            {{ $product->description_en }}
                        @endif
                    </p>
                    
                    <form action="#" method="POST" class="product-options">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                        @if($product->colors->isNotEmpty())
                            <div class="mb-4">
                                <h3 class="option-title">Colors</h3>
                                <div class="color-options d-flex flex-wrap gap-2">
                                    @foreach($product->colors as $productColor)
                                        @php
                                            $color = $productColor->color;
                                        @endphp
                                        @if($color)
                                            <span class="badge color-badge color-{{ $color->name_en ?? 'default' }} {{ $loop->first ? 'active' : '' }}" 
                                                data-color="{{ $color->id }}"
                                                style="background-color: {{ $color->name_en ?? '#ccc' }}">
                                                {{ $color->name_en }}
                                            </span>
                                        @endif
                                    @endforeach
                                    <input type="hidden" name="color_id" id="selectedColor" value="{{ $product->colors->first()?->color?->id ?? '' }}">
                                </div>
                            </div>
                        @endif
                        
                        <div class="mb-4">
                            <h3 class="option-title">Quantity</h3>
                            <div class="quantity-selector">
                                <button type="button" class="quantity-btn decrease-btn">-</button>
                                <input type="number" name="quantity" class="quantity-input" value="1" min="1" max="{{ $product->inventory->sum('quantity') }}">
                                <button type="button" class="quantity-btn increase-btn">+</button>
                            </div>
                        </div>
                        
                        <div class="action-buttons">
                            <button type="submit" class="btn btn-primary">
                                <i class="lni lni-cart"></i> Add to Cart
                            </button>
                            
                            <button type="button" class="btn btn-outline add-to-wishlist" data-product-id="{{ $product->id }}">
                                <i class="lni lni-heart"></i> Add to Wishlist
                            </button>
                            
                            <button type="button" class="btn btn-outline btn-icon share-btn">
                                <i class="lni lni-share"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Product Tabs -->
        <div class="product-tabs mt-5">
            <div class="tabs-nav">
                <button class="tab-btn active" data-tab="details">Details</button>
                <button class="tab-btn" data-tab="specifications">Specs</button>
                <button class="tab-btn" data-tab="shipping">Shipping</button>
                <button class="tab-btn" data-tab="reviews">Reviews ({{ $product->reviews->count() }})</button>
            </div>
            
            <div class="tab-content active" id="details-tab">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Product Details</h3>
                        <p>{{ $product->description_ar }}</p>
                        
                        <h3 class="mt-4">Features</h3>
                        <ul class="features-list">
                            <li>High-quality materials for durability</li>
                            <li>Ergonomic design for comfort</li>
                            <li>Versatile functionality for various uses</li>
                            <li>Easy to clean and maintain</li>
                            <li>Compact and portable design</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset($product->productImages->first()->image_url ?? 'uploads/default-product-image.jpg') }}" alt="Product details" class="img-fluid rounded">
                    </div>
                </div>
            </div>
            
            <div class="tab-content" id="specifications-tab">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Technical Specifications</h3>
                        <ul class="specs-list">
                            <li><span>Dimensions:</span> 10 x 5 x 2 inches</li>
                            <li><span>Weight:</span> 1.5 lbs</li>
                            <li><span>Material:</span> Premium aluminum alloy</li>
                            <li><span>Color Options:</span> Black, White, Blue, Red</li>
                            <li><span>Warranty:</span> 2 years limited warranty</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h3>Package Contents</h3>
                        <ul class="specs-list">
                            <li><span>Main Product:</span> 1x {{ $product->name_en }}</li>
                            <li><span>User Manual:</span> 1x Instruction booklet</li>
                            <li><span>Accessories:</span> Varies by model</li>
                            <li><span>Warranty Card:</span> Included</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="tab-content" id="shipping-tab">
                <h3>Shipping Information</h3>
                <ul class="specs-list">
                    <li><span>Standard Shipping:</span> 3-5 business days</li>
                    <li><span>Express Shipping:</span> 1-2 business days</li>
                    <li><span>Free Shipping:</span> Orders over 1000EGP (domestic only)</li>
                </ul>
                
                <h3 class="mt-4">Return Policy</h3>
                <p class="text-danger">We offer a 10-day return policy for most items. Products must be returned in original packaging and in unused condition. Please contact our customer service team to initiate a return.</p>
            </div>
            
            <div class="tab-content" id="reviews-tab">
                <div class="reviews-header">
                    <div class="rating-overview">
                        <div class="average-rating">{{ number_format($product->calculateRating(), 1) }}</div>
                        <div class="rating-bars">
                            @php
                                $reviewCounts = [
                        5 => $product->reviews->where('rating', 5)->count(),
                        4 => $product->reviews->where('rating', 4)->count(),
                        3 => $product->reviews->where('rating', 3)->count(),
                        2 => $product->reviews->where('rating', 2)->count(),
                        1 => $product->reviews->where('rating', 1)->count(),
                    ];
                    $totalReviews = $product->reviews->count() ?: 1;
                @endphp
                
                @for($i = 5; $i >= 1; $i--)
                    <div class="rating-bar">
                        <div class="rating-label">{{ $i }} stars</div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: {{ ($reviewCounts[$i] / $totalReviews) * 100 }}%"></div>
                        </div>
                        <div class="rating-count">{{ $reviewCounts[$i] }}</div>
                    </div>
                @endfor
            </div>
        </div>
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewModal">
            <i class="lni lni-pencil"></i> Write a Review
        </button>
    </div>

        <!-- Reviews List Section -->
        <div class="reviews-list">
            @if($product->reviews->count() > 0)
                @foreach($product->reviews->sortByDesc('created_at') as $review)
                    <div class="review-item">
                        <div class="review-header">
                            <div class="reviewer-info">
                                <div class="reviewer-name">
                                    {{ $review->user->name_en ?? 'Anonymous' }}
                                    @if($review->verified_purchase)
                                        <span class="verified-badge">Verified Purchase</span>
                                    @endif
                                </div>
                                <div class="review-date">{{ \Carbon\Carbon::parse($review->created_at)->format('M d, Y') }}</div>
                            </div>
                            <div class="review-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        <i class="lni lni-star-filled"></i>
                                    @else
                                        <i class="lni lni-star"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        <div class="review-title">{{ $review->comment }}</div>
                        <div class="review-content">{{ $review->comment }}</div>
                        
                        @if($review->user_id == auth()->id())
                            <div class="review-actions">
                                <button class="btn btn-sm btn-outline-secondary edit-review" 
                                        data-review-id="{{ $review->id }}"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editReviewModal">
                                    Edit
                                </button>
                                <form action="{{ route('reviews.destroy', $review) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                            onclick="return confirm('Are you sure you want to delete this review?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
                
                @if($product->reviews->count() > 5)
                    <div class="text-center mt-4">
                        <button id="loadMoreReviews" class="btn btn-outline-primary">Load More Reviews</button>
                    </div>
                @endif
            @else
                <div class="no-reviews">
                    <p>This product has no reviews yet. Be the first to review!</p>
                </div>
            @endif
        </div>
    </div>
        
        <!-- Related Products -->
@if($product->relatedProducts->isNotEmpty())
    <section class="related-products-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Related Products</h2>
                <div class="section-controls">
                    <button id="prev-related" class="slider-arrow" aria-label="Previous products">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </button>
                    <button id="next-related" class="slider-arrow" aria-label="Next products">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </button>
                </div>
            </div>
            
            <div class="related-products-slider">
                @foreach($product->relatedProducts as $relatedProduct)
                    <div class="product-card" data-product-id="{{ $relatedProduct->id }}">
                    <div class="product-badge">
                        @if($relatedProduct->created_at > now()->subDays(10) || $relatedProduct->discounts->where('is_active', 1)->count() > 0)
                            <span class="badge-group">
                                @if($relatedProduct->created_at > now()->subDays(10))<span class="badge new">New</span>@endif
                                @if($relatedProduct->discounts->where('is_active', 1)->count() > 0)<span class="badge sale">-{{ $relatedProduct->discounts->where('is_active', 1)->first()->discount_amount }}%</span>@endif
                            </span>
                        @endif
                    </div>
                        
                        <div class="product-image">
                            <a href="{{ route('product.show', $relatedProduct->id) }}">
                                <img 
                                    src="{{ asset($relatedProduct->productImages->first()->image_url ?? 'uploads/default-product-image.jpg') }}" 
                                    alt="{{ $relatedProduct->name_en }}" 
                                    class="product-thumbnail"
                                    loading="lazy"
                                >
                            </a>
                        </div>
                        
                        <div class="product-content">
                            <h3 class="product-title">
                                <a href="{{ route('product.show', $relatedProduct->id) }}">
                                    {{ $relatedProduct->name_ar ? $relatedProduct->name_ar : $relatedProduct->name_en }}
                                </a>
                            </h3>
                            
                            <div class="product-price">
                                @if($relatedProduct->discount_percentage > 0)
                                    <span class="original-price">{{ number_format($relatedProduct->original_price, 2) }} EGP</span>
                                @endif
                                <span class="current-price">{{ number_format($relatedProduct->price, 2) }} EGP</span>
                            </div>
                            
                            <div class="product-actions">
                                <button class="action-button add-to-cart" data-product-id="{{ $relatedProduct->id }}" aria-label="Add to cart">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                    <span>Add to Cart</span>
                                </button>
                                <button class="action-icon wishlist" data-product-id="{{ $relatedProduct->id }}" aria-label="Add to wishlist">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                </button>
                                <button class="action-icon quick-view" data-product-id="{{ $relatedProduct->id }}" aria-label="Quick view">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

    
    </section>

    <div class="modal fade review-modal" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewModalLabel">Write a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('reviews.store', $product) }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="review-rating">Rating</label>
                            <select class="form-control" id="review-rating" name="rating" required>
                                <option value="5">5 stars</option>
                                <option value="4">4 stars</option>
                                <option value="3">3 stars</option>
                                <option value="2">2 stars</option>
                                <option value="1">1 star</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="review-comment">Your Review</label>
                            <textarea class="form-control" id="review-comment" name="comment"  rows="5" required>Write your review here</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Review Modal -->
    <!-- Edit Review Modal -->
<div class="modal fade review-modal" id="editReviewModal" tabindex="-1" aria-labelledby="editReviewModalLabel" aria-hidden="true">
    @php
        $userReview = null;
        if(auth()->check()) {
            $userReview = auth()->user()->reviews->where('product_id', $product->id)->first();
        }
    @endphp
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editReviewModalLabel">Edit Your Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if($userReview)
                <form id="editReviewForm" action="{{ route('reviews.update', $userReview->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-review-rating">Rating</label>
                            <select class="form-control" id="edit-review-rating" name="rating" required>
                                <option value="5" {{ $userReview->rating == 5 ? 'selected' : '' }}>5 stars</option>
                                <option value="4" {{ $userReview->rating == 4 ? 'selected' : '' }}>4 stars</option>
                                <option value="3" {{ $userReview->rating == 3 ? 'selected' : '' }}>3 stars</option>
                                <option value="2" {{ $userReview->rating == 2 ? 'selected' : '' }}>2 stars</option>
                                <option value="1" {{ $userReview->rating == 1 ? 'selected' : '' }}>1 star</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-review-comment">Your Review</label>
                            <textarea class="form-control" id="edit-review-comment" name="comment" rows="5" required>{{ $userReview->comment }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Review</button>
                    </div>
                </form>
            @else
                <div class="modal-body">
                    <p class="text-center">You haven't written a review for this product yet.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#reviewModal">Write a Review</button>
                </div>
            @endif
        </div>
    </div>
</div>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('website/css/single-product.css') }}">
    @endpush
    @push('scripts')
    <script src="{{ asset('website/js/single-product.js') }}"></script>
    @endpush
@endsection

