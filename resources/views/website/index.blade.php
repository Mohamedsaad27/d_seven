@extends('layouts.website.master')

@section('title', 'Home Page')

@section('content')
   <!-- Start Hero Area -->
<!-- Start Hero Area -->
<section class="modern-hero-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 pe-lg-4">
                <div class="main-hero-slider">
                    <!-- Start Hero Slider -->
                    <div class="hero-slider-item" style="background-image: url({{ asset('uploads/3d-rendering-cartoon-shopping-cart.jpg?height=1500&width=500') }});">
                        <div class="hero-slider-overlay"></div>
                        <div class="hero-content">
                            <div class="hero-content-inner">
                                <span class="hero-subtitle">Free shipping on orders over 1000EGP</span>
                                <h1 class="hero-title">Premium Cookware Set</h1>
                                <p class="hero-description">Professional-grade stainless steel cookware with non-stick coating, heat-resistant handles, and dishwasher-safe construction for the modern kitchen.</p>
                                
                                <div class="hero-button">
                                    <a href="{{ route('product.index') }}" class="btn hero-btn">
                                        Shop Now <i class="lni lni-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Hero Slider -->
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="row">
                    @if($latestProduct)
                    <div class="col-lg-12 col-md-6 col-12 mb-4">
                        <!-- Start Small Banner -->
                        <div class="small-banner" style="background-image: url({{ asset($latestProduct->productImages->where('is_primary', 1)->first()->image_url ?? 'uploads/default-product-image.jpg') }});">
                            <div class="small-banner-overlay"></div>
                            <div class="banner-content">
                                <span class="banner-subtitle">New arrival</span>
                                <h2 class="banner-title">{{ $latestProduct->name_ar ? $latestProduct->name_ar : $latestProduct->name_en }}</h2>
                                <div class="banner-price">{{ $latestProduct->price }} EGP</div>
                                <a href="{{ route('product.show', $latestProduct->id) }}" class="banner-link">
                                    Explore <i class="lni lni-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- End Small Banner -->
                    </div>
                    @endif
                    <div class="col-lg-12 col-md-6 col-12">
                        <!-- Start Small Banner -->
                        <div class="small-banner weekly-sale">
                            <div class="banner-content">
                                <div class="sale-badge">Spring Sale</div>
                                <h2 class="banner-title">Kitchen Essentials!</h2>
                                <p class="banner-description">Refresh your home with up to 40% off kitchen and dining collections this week.</p>
                                <div class="banner-button">
                                    <a class="btn sale-btn" href="{{ route('product.index') }}">
                                        Shop Now <i class="lni lni-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Small Banner -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero Area -->

<!-- Start Featured Categories Area -->
<section class="featured-categories section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Featured Categories</h2>
                    <p>Discover our curated selection of top product categories designed to meet your everyday needs with premium quality and style.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Category -->
                <div class="single-category modern-category">
                    <div class="category-content">
                        <div class="category-image">
                            @if ($category->image && file_exists(public_path($category->image)))
                                <img src="{{ asset($category->image) }}" alt="{{ $category->name_ar ? $category->name_ar : $category->name_en }}">
                            @else
                                <img src="{{ asset('images/placeholder-category.jpg') }}" alt="{{ $category->name_ar ? $category->name_ar : $category->name_en }}">
                            @endif
                            <div class="category-overlay"></div>
                        </div>
                        <h3 class="category-heading">{{ $category->name_ar ? $category->name_ar : $category->name_en }}</h3>
                        @if ($category->children->isNotEmpty())
                            <ul class="category-list">
                                @foreach ($category->children as $child)
                                    <li><a href="{{ route('product.index', ['category_id' => $child->id]) }}">{{ $child->name_ar ? $child->name_ar : $child->name_en }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <!-- End Single Category -->
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Featured Categories Area -->

<!-- Start Trending Product Area -->
<section class="trending-product section"> 
    <div class="container"> 
        <div class="row"> 
            <div class="col-12"> 
                <div class="section-title"> 
                    <h2>Trending Product</h2> 
                    <p>Explore our trending products—loved by customers and handpicked for quality, style, and unbeatable value. Don't miss out on what's hot right now!</p> 
                </div> 
            </div> 
        </div> 
        <div class="row"> 
            @foreach ($trendingProducts as $product) 
            <div class="col-lg-3 col-md-6 col-12"> 
                <!-- Start Single Product --> 
                <div class="single-product"> 
                    <div class="product-image"> 
                        <img src="{{ asset($product->productImages->where('is_primary', 1)->first()->image_url ?? 'uploads/default-product-image.jpg') }}" alt="{{ $product->name_ar ? $product->name_ar : $product->name_en }}" class="product-img"> 
                        @php
                            $activeDiscount = $product->discounts->firstWhere(function($discount) {
                                return $discount->is_active && $discount->ends_at > now();
                            });
                        @endphp
                        @if ($activeDiscount)
                            @if ($activeDiscount->discount_type == 'percent')
                                <span class="sale-tag">-{{ $activeDiscount->discount_amount }}%</span>
                            @else
                                <span class="sale-tag">-{{ number_format($activeDiscount->discount_amount, 0) }} EGP</span>
                            @endif
                        @endif
                        <div class="button">  
                            <a href="{{ route('cart.store', $product->id) }}" class="btn add-to-cart" data-product-id="{{ $product->id }}">
                                <i class="lni lni-cart"></i> Add to Cart
                            </a>  
                        </div>
                    </div>
                    <div class="product-info"> 
                        <span class="category">{{ $product->category->name_ar ? $product->category->name_ar : $product->category->name_en }}</span> 
                        <h4 class="title"> 
                            <a href="{{ route('product.show', $product->id) }}">{{ $product->name_ar ? $product->name_ar : $product->name_en }}</a> 
                        </h4> 
                        <ul class="review"> 
                            @php
                                $rating = $product->calculateRating();
                                $fullStars = floor($rating);
                                $hasHalfStar = ($rating - $fullStars) >= 0.5;
                                $reviewCount = $product->reviews->count();
                            @endphp
                            
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $fullStars)
                                    <li><i class="lni lni-star-filled"></i></li>
                                @elseif ($i == $fullStars + 1 && $hasHalfStar)
                                    <li><i class="lni lni-star-half"></i></li>
                                @else
                                    <li><i class="lni lni-star"></i></li>
                                @endif
                            @endfor
                            <li><span>{{ number_format($rating, 1) }} Review(s) ({{ $reviewCount }})</span></li>
                        </ul> 
                        <div class="price"> 
                            @if ($product->discount_price)
                                <span>{{ $product->discount_price }} EGP</span> 
                                <span class="discount-price">{{ $product->price }} EGP</span>
                            @else
                                <span>{{ $product->price }} EGP</span>
                            @endif
                        </div> 
                    </div> 
                </div>
                <!-- End Single Product -->
            </div> 
            @endforeach 
        </div> 
    </div> 
</section>
<!-- End Trending Product Area -->


<!-- Start Special Offer -->
<section class="special-offer section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Special Offer</h2>
                    <p>Limited-time deals on premium products with exclusive discounts you won't find anywhere else.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{ asset('uploads/1.jpg') }}" alt="#" class="product-img">
                                <div class="product-overlay"></div>
                                <div class="button">
                                    <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">Camera</span>
                                <h4 class="title">
                                    <a href="product-grids.html">WiFi Security Camera</a>
                                </h4>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><span>5.0 Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    <span>$399.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{ asset('uploads/2.jpg') }}" alt="#" class="product-img">
                                <div class="product-overlay"></div>
                                <div class="button">
                                    <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">Laptop</span>
                                <h4 class="title">
                                    <a href="product-grids.html">Apple MacBook Air</a>
                                </h4>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><span>5.0 Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    <span>$899.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{ asset('uploads/3.jpg') }}" alt="#" class="product-img">
                                <div class="product-overlay"></div>
                                <div class="button">
                                    <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">Speaker</span>
                                <h4 class="title">
                                    <a href="product-grids.html">Bluetooth Speaker</a>
                                </h4>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star"></i></li>
                                    <li><span>4.0 Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    <span>$70.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                </div>
                <!-- Start Banner -->
                <div class="single-banner modern-banner" style="background-image:url('{{ asset('uploads/2.jpg') }}');">
                    <div class="banner-overlay"></div>
                    <div class="content">
                        <span class="badge">Featured Deal</span>
                        <h2>Samsung Notebook 9</h2>
                        <p>Ultra-thin, lightweight design with powerful performance and all-day battery life.</p>
                        <div class="price-tag">
                            <span class="regular-price">$650.00</span>
                            <span class="price">$590.00</span>
                        </div>
                        <div class="button">
                            <a href="product-grids.html" class="btn shop-now-btn">Shop Now <i class="lni lni-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Banner -->
            </div>
            <div class="col-lg-4 col-md-12 col-12">
                <div class="offer-content">
                    <div class="image">
                        <img src="{{ asset('uploads/4.jpg') }}" alt="#" class="offer-img">
                        <span class="sale-tag">-50%</span>
                        <div class="offer-overlay"></div>
                    </div>
                    <div class="text">
                        <span class="deal-badge">Hot Deal</span>
                        <h2><a href="product-grids.html">Premium Bluetooth Headphones</a></h2>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><span>5.0 Review(s)</span></li>
                        </ul>
                        <div class="price">
                            <span class="current-price">$200.00</span>
                            <span class="discount-price">$400.00</span>
                        </div>
                        <p>Noise-cancelling technology with premium sound quality and 30-hour battery life for immersive audio experience.</p>
                        
                        <div class="deal-counter-wrapper">
                            <h4>Hurry Up! Offer ends in:</h4>
                            <div class="deal-counter">
                                <div class="counter-item">
                                    <div class="counter-number" id="days">00</div>
                                    <div class="counter-text">Days</div>
                                </div>
                                <div class="counter-item">
                                    <div class="counter-number" id="hours">00</div>
                                    <div class="counter-text">Hours</div>
                                </div>
                                <div class="counter-item">
                                    <div class="counter-number" id="minutes">00</div>
                                    <div class="counter-text">Mins</div>
                                </div>
                                <div class="counter-item">
                                    <div class="counter-number" id="seconds">00</div>
                                    <div class="counter-text">Secs</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="offer-btn">
                            <a href="product-details.html" class="btn">Shop Now <i class="lni lni-arrow-right"></i></a>
                        </div>
                        
                        <!-- Deal Ended Alert (hidden by default) -->
                        <div class="deal-ended-alert">
                            <div class="alert-icon"><i class="lni lni-alarm-clock"></i></div>
                            <h3>We are sorry, this offer has ended!</h3>
                            <p>Check our other deals for more savings</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Special Offer -->

<!-- Start Home Product List -->
<section class="home-product-list section">
    <div class="container">
        <div class="row">
            @foreach ([
                ['title' => 'Best Sellers', 'products' => $bestSellers],
                ['title' => 'New Arrivals', 'products' => $newArrivals],
                ['title' => 'Top Rated', 'products' => $topRated]
            ] as $section)
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class="list-title">{{ $section['title'] }}</h4>
                    @forelse ($section['products'] as $product)
                        <div class="single-list">
                            <div class="list-image">
                                <a href="{{ route('product.show', $product->id) }}">
                                    <img src="{{ asset($product->productImages->first()->image_url ?? 'uploads/default-product-image.jpg') }}" alt="{{ $product->name_en }}">
                                </a>
                            </div>
                            <div class="list-info">
                                <h3>
                                    <a href="{{ route('product.show', $product->id) }}">{{ $product->name_ar ?? $product->name_en }}</a>
                                </h3>
                                <span>{{ $product->price }} EGP</span>
                            </div>
                        </div>
                    @empty
                        <div class="single-list">
                            <div class="list-info">
                                <h3>
                                    <a href="#">No Products Found</a>
                                </h3>
                            </div>
                        </div>
                    @endforelse
                </div>
            @endforeach
        </div>
    </div>
</section>



<!-- End Home Product List -->

<!-- Start Brands Area -->
<section class="brands-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2>Popular Brands</h2>
                    <p>Shop your favorite products from trusted brands worldwide</p>
                </div>
            </div>
        </div>
        <div class="brands-container">
            <div class="brands-wrapper">
                @forelse ($brands as $brand)
                    <div class="brand-item">
                        <div class="brand-logo">
                            <img src="{{ asset($brand->image ?? 'uploads/Brands/default-brand-image.jpg') }}" alt="Brand Logo">
                        </div>
                    </div>
                @empty
                    <div class="brand-item">
                        <div class="brand-logo">
                            <img src="{{ asset('uploads/Brands/default-brand-image.jpg') }}" alt="Brand Logo">
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
<!-- End Brands Area -->


<!-- Start Shipping Info -->
<section class="shipping-info-section">
    <div class="container">
        <div class="shipping-info-wrapper">
            <!-- Free Shipping -->
            <div class="shipping-info-item">
                <div class="info-icon">
                    <i class="lni lni-delivery"></i>
                </div>
                <div class="info-content">
                    <h4>Free Shipping</h4>
                    <p>On orders over 1000 EGP</p>
                </div>
            </div>
            
            <!-- 24/7 Support -->
            <div class="shipping-info-item">
                <div class="info-icon">
                    <i class="lni lni-support"></i>
                </div>
                <div class="info-content">
                    <h4>24/7 Support</h4>
                    <p>Live chat or call</p>
                </div>
            </div>
            
            <!-- Online Payment -->
            <div class="shipping-info-item">
                <div class="info-icon">
                    <i class="lni lni-credit-cards"></i>
                </div>
                <div class="info-content">
                    <h4>Secure Payment</h4>
                    <p>100% secure checkout</p>
                </div>
            </div>
            
            <!-- Easy Return -->
            <div class="shipping-info-item">
                <div class="info-icon">
                    <i class="lni lni-reload"></i>
                </div>
                <div class="info-content">
                    <h4>Easy Returns</h4>
                    <p>10-day return policy</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shipping Info -->


@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<link rel="stylesheet" href="{{ asset('website/css/index.css') }}">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="{{ asset('website/js/index.js') }}"></script>
<script>
    // Configure toastr options
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right", // Changed to center position
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "rtl": true // Enable RTL for Arabic text
    };

    // Add custom CSS to further customize toastr appearance
    $("<style>")
        .prop("type", "text/css")
        .html(`
            .toast-top-center {
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 250px;
            }
            .toast-message {
                font-family: 'Cairo', sans-serif; 
                font-size: 16px;
                text-align: right;
                padding-right: 10px;
            }
            .toast-success, .toast-error, .toast-info, .toast-warning {
                padding-left: 50px; /* Make room for the icon */
            }
        `)
        .appendTo("head");
</script>
@endpush