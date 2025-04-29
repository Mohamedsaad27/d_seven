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
                        <img id="currentImage" src="{{ asset($product->productImages->where('is_primary', 1)->first()->image_url ?? asset($product->productImages->first()->image_url ?? 'assets/images/placeholder.jpg'))}}" alt="{{ $product->{'name_' . app()->getLocale()} }}">
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
                                <div class="current-price">${{ number_format($discountedPrice, 2) }}</div>
                                <div class="original-price">${{ number_format($product->price, 2) }}</div>
                                <div class="discount-timer">
                                    Sale ends: {{ \Carbon\Carbon::parse($discountEndsAt)->format('F j, Y') }}
                                </div>
                            </div>
                        @else 
                            ${{ number_format($product->price, 2) }} 
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
                                <div class="color-options">
                                    @foreach($product->colors as $productColor)
                                        @php
                                            $color = $productColor->color;
                                        @endphp
                                        @if($color)
                                            <div class="color-option color-{{ $color->color_code ?? 'default' }} {{ $loop->first ? 'active' : '' }}" 
                                                data-color="{{ $color->id }}">
                                            </div>
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
                        <p>{{ $product->{'description_' . app()->getLocale()} }}</p>
                        
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
                        <img src="{{ asset($product->productImages->first()->image_url ?? 'assets/images/placeholder.jpg') }}" alt="Product details" class="img-fluid rounded">
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
                            <div class="review-date">{{ $review->created_at->format('M d, Y') }}</div>
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
        </div>
        
        <!-- Related Products -->
        @if($product->relatedProducts->isNotEmpty())
        <div class="related-products mt-5">
            <h2 class="section-title mb-4">Related Products</h2>
            <div class="row">
                @foreach($product->relatedProducts as $relatedProduct)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="product-card">
                            <div class="product-image">
                                <a href="{{ route('product.show', $relatedProduct->id) }}">
                                    <img src="{{ asset($relatedProduct->productImages->first()->image_url ?? asset('uploads/download5.png')) }}" alt="{{ $relatedProduct->name_en }}" class="img-fluid">
                                </a>
                                <div class="product-action">
                                    <a href="#" class="quick-view" data-product-id="{{ $relatedProduct->id }}"><i class="lni lni-eye"></i></a>
                                    <a href="#" class="add-to-wishlist" data-product-id="{{ $relatedProduct->id }}"><i class="lni lni-heart"></i></a>
                                    <a href="#" class="add-to-cart" data-product-id="{{ $relatedProduct->id }}"><i class="lni lni-cart"></i></a>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-name"><a href="{{ route('product.show', $relatedProduct->id) }}">{{ $relatedProduct->name_ar }}</a></h3>
                                
                                <div class="product-price">${{ number_format($relatedProduct->price, 2) }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </section>

    <!-- Review Modal -->
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
    @push('styles')
    <style>
    :root {
        --primary-color: #3a86ff;
        --secondary-color: #ff006e;
        --dark-color: #212529;
        --light-color: #f8f9fa;
        --success-color: #4bb543;
        --warning-color: #ffc107;
        --danger-color: #dc3545;
        --gray-color: #6c757d;
        --light-gray: #e9ecef;
    }

    /* Product Gallery */
    .product-gallery {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .main-image {
        width: 100%;
        height: 450px;
        overflow: hidden;
        position: relative;
        border-radius: 12px;
        background-color: var(--light-gray);
    }

    .main-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .main-image:hover img {
        transform: scale(1.05);
    }

    .thumbnails {
        display: flex;
        gap: 10px;
        margin-top: 15px;
        overflow-x: auto;
        scrollbar-width: thin;
        padding-bottom: 10px;
    }

    .thumbnails::-webkit-scrollbar {
        height: 5px;
    }

    .thumbnails::-webkit-scrollbar-track {
        background: var(--light-gray);
        border-radius: 10px;
    }

    .thumbnails::-webkit-scrollbar-thumb {
        background: var(--gray-color);
        border-radius: 10px;
    }

    .thumbnail {
        width: 80px;
        height: 80px;
        border-radius: 8px;
        overflow: hidden;
        cursor: pointer;
        flex-shrink: 0;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .thumbnail.active {
        border-color: var(--primary-color);
    }

    .thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Product Info */
    .product-info {
        padding: 20px 0;
    }

    .product-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: var(--dark-color);
    }

    .product-category {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 0.9rem;
        color: var(--gray-color);
        margin-bottom: 15px;
    }

    .product-category a {
        color: var(--primary-color);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .product-category a:hover {
        color: var(--secondary-color);
    }

    .product-price {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .product-price .original-price {
        font-size: 1.2rem;
        color: var(--gray-color);
        text-decoration: line-through;
    }

    .product-description {
        margin-bottom: 25px;
        line-height: 1.6;
        color: var(--gray-color);
    }

    /* Product Options */
    .product-options {
        margin-bottom: 30px;
    }

    .option-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--dark-color);
    }

    .color-options {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .color-option {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
        position: relative;
        border: 2px solid var(--light-gray);
        transition: all 0.3s ease;
    }

    .color-option.active {
        border-color: var(--primary-color);
    }

    .color-option.active::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: white;
    }

    .color-black { background-color: #000; }
    .color-white { background-color: #fff; }
    .color-blue { background-color: #3a86ff; }
    .color-red { background-color: #ff006e; }

    .select-wrapper {
        position: relative;
        margin-bottom: 20px;
    }

    .custom-select {
        appearance: none;
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--light-gray);
        border-radius: 8px;
        background-color: white;
        font-size: 1rem;
        cursor: pointer;
        transition: border-color 0.3s ease;
    }
    .reviews-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 30px;
}

.average-rating {
    font-size: 48px;
    font-weight: bold;
    margin-right: 20px;
}

.rating-bars {
    flex-grow: 1;
    max-width: 400px;
}

.rating-bar {
    display: flex;
    align-items: center;
    margin-bottom: 5px;
}

.rating-label {
    width: 60px;
}

.progress-bar {
    height: 12px;
    background-color: #eee;
    border-radius: 10px;
    flex-grow: 1;
    margin: 0 10px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background-color: #ffc107;
}

.rating-count {
    width: 30px;
    text-align: right;
}

.reviews-list {
    margin-top: 30px;
}

.review-item {
    padding: 20px;
    border-bottom: 1px solid #eee;
}

.review-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.reviewer-name {
    font-weight: 600;
}

.verified-badge {
    font-size: 12px;
    background-color: #4CAF50;
    color: white;
    padding: 2px 6px;
    border-radius: 3px;
    margin-left: 8px;
}

.review-date {
    color: #777;
    font-size: 14px;
}

.review-rating {
    color: #ffc107;
}

.review-title {
    font-weight: 600;
    margin-bottom: 8px;
}

.review-content {
    margin-bottom: 15px;
    line-height: 1.5;
}

.review-images {
    display: flex;
    gap: 10px;
    margin-top: 15px;
}

.review-image {
    width: 80px;
    height: 80px;
    border-radius: 5px;
    overflow: hidden;
}

.review-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.review-actions {
    margin-top: 15px;
}

.no-reviews {
    padding: 30px;
    text-align: center;
    color: #777;
}

@media (max-width: 768px) {
    .reviews-header {
        flex-direction: column;
    }
    
    .rating-overview {
        display: flex;
        margin-bottom: 20px;
        width: 100%;
    }
}
    .custom-select:focus {
        outline: none;
        border-color: var(--primary-color);
    }

    .select-wrapper::after {
        content: '▼';
        font-size: 0.8rem;
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: var(--gray-color);
    }

    /* Quantity Selector */
    .quantity-selector {
        display: flex;
        align-items: center;
        border: 1px solid var(--light-gray);
        border-radius: 8px;
        overflow: hidden;
        width: fit-content;
    }

    .quantity-btn {
        background: none;
        border: none;
        width: 40px;
        height: 40px;
        font-size: 1.2rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gray-color);
        transition: all 0.3s ease;
    }

    .quantity-btn:hover {
        background-color: var(--light-gray);
        color: var(--dark-color);
    }

    .quantity-input {
        width: 50px;
        height: 40px;
        border: none;
        text-align: center;
        font-size: 1rem;
        font-weight: 600;
    }

    .quantity-input:focus {
        outline: none;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 15px;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .btn {
        padding: 12px 25px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border: none;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-primary:hover {
        background-color: #2a75e6;
        transform: translateY(-2px);
    }

    .btn-outline {
        background-color: transparent;
        border: 1px solid var(--light-gray);
        color: var(--dark-color);
    }

    .btn-outline:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
        transform: translateY(-2px);
    }

    .btn-icon {
        width: 45px;
        height: 45px;
        padding: 0;
        border-radius: 50%;
    }

    /* Product Details Tabs */
    .product-tabs {
        margin-top: 60px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .tabs-nav {
        display: flex;
        background-color: white;
        border-bottom: 1px solid var(--light-gray);
    }

    .tab-btn {
        padding: 15px 25px;
        font-weight: 600;
        cursor: pointer;
        background: none;
        border: none;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
        color: var(--gray-color);
    }

    .tab-btn.active {
        color: var(--primary-color);
        border-bottom-color: var(--primary-color);
    }

    .tab-content {
        padding: 30px;
        background-color: white;
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .tab-content h3 {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: var(--dark-color);
    }

    .features-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .features-list li {
        padding: 8px 0;
        position: relative;
        padding-left: 25px;
    }

    .features-list li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--primary-color);
        font-weight: bold;
    }

    .specs-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .specs-list li {
        padding: 10px 0;
        display: flex;
        border-bottom: 1px solid var(--light-gray);
    }

    .specs-list li:last-child {
        border-bottom: none;
    }

    .specs-list span {
        font-weight: 600;
        width: 150px;
        color: var(--dark-color);
    }

    /* Reviews Section */
    .reviews-section {
        margin-top: 60px;
    }

    .reviews-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .rating-overview {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .average-rating {
        font-size: 3rem;
        font-weight: 700;
        color: var(--dark-color);
    }

    .rating-bars {
        flex-grow: 1;
        max-width: 300px;
    }

    .rating-bar {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 5px;
    }

    .rating-label {
        min-width: 60px;
        font-size: 0.9rem;
        color: var(--gray-color);
    }

    .progress-bar {
        flex-grow: 1;
        height: 8px;
        background-color: var(--light-gray);
        border-radius: 4px;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        background-color: var(--primary-color);
    }

    .rating-count {
        min-width: 30px;
        font-size: 0.9rem;
        color: var(--gray-color);
        text-align: right;
    }

    .review-item {
        display: flex;
        gap: 20px;
        padding: 20px 0;
        border-bottom: 1px solid var(--light-gray);
    }

    .review-item:last-child {
        border-bottom: none;
    }

    .reviewer-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        overflow: hidden;
        flex-shrink: 0;
    }

    .reviewer-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .review-content {
        flex-grow: 1;
    }

    .reviewer-name {
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--dark-color);
    }

    .review-date {
        font-size: 0.9rem;
        color: var(--gray-color);
        margin-bottom: 10px;
    }

    .review-stars {
        display: flex;
        gap: 2px;
        margin-bottom: 10px;
    }

    .review-stars i {
        color: var(--warning-color);
    }

    .review-text {
        line-height: 1.6;
        color: var(--gray-color);
    }

    /* Review Modal */
    .review-modal .modal-content {
        border-radius: 12px;
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .review-modal .modal-header {
        border-bottom: 1px solid var(--light-gray);
        padding: 20px 30px;
    }

    .review-modal .modal-title {
        font-weight: 700;
        color: var(--dark-color);
    }

    .review-modal .modal-body {
        padding: 30px;
    }

    .review-modal .form-group {
        margin-bottom: 20px;
    }

    .review-modal label {
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
        color: var(--dark-color);
    }

    .review-modal .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--light-gray);
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .review-modal .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
    }

    .review-modal .modal-footer {
        border-top: 1px solid var(--light-gray);
        padding: 20px 30px;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .main-image {
            height: 400px;
        }
    }

    @media (max-width: 768px) {
        .main-image {
            height: 350px;
        }
        
        .product-title {
            font-size: 1.8rem;
        }
        
        .product-price {
            font-size: 1.5rem;
        }
        
        .action-buttons {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
        }
        
        .reviews-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
        }
    }

    @media (max-width: 576px) {
        .main-image {
            height: 300px;
        }
        
        .thumbnail {
            width: 60px;
            height: 60px;
        }
        
        .tab-btn {
            padding: 10px 15px;
            font-size: 0.9rem;
        }
        
        .tab-content {
            padding: 20px;
        }
    }
</style>
    @endpush
    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Product Gallery
        const currentImage = document.getElementById('currentImage');
        const thumbnails = document.querySelectorAll('.thumbnail');
        
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                // Update main image
                currentImage.src = this.getAttribute('data-src');
                
                // Update active thumbnail
                thumbnails.forEach(thumb => thumb.classList.remove('active'));
                this.classList.add('active');
            });
        });
        
        // Color Options
        const colorOptions = document.querySelectorAll('.color-option');
        const selectedColorInput = document.getElementById('selectedColor');
        
        if (colorOptions.length > 0) {
            colorOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // Update active color
                    colorOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Update hidden input
                    selectedColorInput.value = this.getAttribute('data-color');
                });
            });
        }
        
        // Quantity Selector
        const quantityInput = document.querySelector('.quantity-input');
        const decreaseBtn = document.querySelector('.decrease-btn');
        const increaseBtn = document.querySelector('.increase-btn');
        
        if (quantityInput && decreaseBtn && increaseBtn) {
            decreaseBtn.addEventListener('click', function() {
                let value = parseInt(quantityInput.value);
                if (value > 1) {
                    quantityInput.value = value - 1;
                }
            });
            
            increaseBtn.addEventListener('click', function() {
                let value = parseInt(quantityInput.value);
                let max = parseInt(quantityInput.getAttribute('max'));
                if (value < max) {
                    quantityInput.value = value + 1;
                }
            });
            
            quantityInput.addEventListener('change', function() {
                let value = parseInt(this.value);
                let max = parseInt(this.getAttribute('max'));
                
                if (isNaN(value) || value < 1) {
                    this.value = 1;
                } else if (value > max) {
                    this.value = max;
                }
            });
        }
        
        // Tabs
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');
                
                // Update active tab button
                tabButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                // Update active tab content
                tabContents.forEach(content => content.classList.remove('active'));
                document.getElementById(`${tabId}-tab`).classList.add('active');
            });
        });
        
        // Add to Wishlist
        const wishlistButtons = document.querySelectorAll('.add-to-wishlist');
        
        wishlistButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const productId = this.getAttribute('data-product-id');
                
                // Add animation
                this.classList.add('animate__animated', 'animate__heartBeat');
                
                // AJAX request to add to wishlist
                fetch(`#`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ product_id: productId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success message
                        alert(data.message || 'Added to wishlist');
                    } else {
                        // Show error message
                        alert(data.message || 'Error adding to wishlist');
                    }
                    
                    // Remove animation
                    setTimeout(() => {
                        this.classList.remove('animate__animated', 'animate__heartBeat');
                    }, 1000);
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error adding to wishlist');
                    
                    // Remove animation
                    setTimeout(() => {
                        this.classList.remove('animate__animated', 'animate__heartBeat');
                    }, 1000);
                });
            });
        });
        
        // Share Button
        const shareButton = document.querySelector('.share-btn');
        
        if (shareButton && navigator.share) {
            shareButton.addEventListener('click', async () => {
                try {
                    await navigator.share({
                        title: '{{ $product->{'name_' . app()->getLocale()} }}',
                        text: '{{ $product->{'description_' . app()->getLocale()} }}',
                        url: window.location.href
                    });
                } catch (error) {
                    console.error('Error sharing:', error);
                }
            });
        } else if (shareButton) {
            // Fallback for browsers that don't support Web Share API
            shareButton.addEventListener('click', () => {
                // Create a temporary input to copy the URL
                const input = document.createElement('input');
                input.value = window.location.href;
                document.body.appendChild(input);
                input.select();
                document.execCommand('copy');
                document.body.removeChild(input);
                
                alert('Link copied to clipboard');
            });
        }
    });
</script>
    @endpush
@endsection

