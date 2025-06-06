@extends('layouts.website.master')

@section('title', Auth::check() ? 'Cart' : 'My Cart')

@section('content')
<!-- Hero Section -->
<div class="cart-hero">
    <div class="container">
        <div class="cart-hero-content">
            <h1>Your Shopping Cart</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="lni lni-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- Shopping Cart Section -->
<section class="cart-section">
    <div class="container"> 
        <div class="cart-container">
            <!-- Cart Items -->
            <div class="cart-items">
                <div class="cart-header">
                    <h2>Cart Items <span class="item-count">({{ $cart->cartItems->count() }})</span></h2>
                    @if ($cart->cartItems->count() > 0)
                        <button class="btn btn-danger btn-sm clear-cart" style="margin-left: auto;">
                            <i class="lni lni-trash"></i> Clear Cart
                        </button>
                    @endif
                </div>
                
                <!-- Cart Item -->
                @if ($cart->cartItems->count() > 0)
                    @foreach ($cart->cartItems as $cartItem)
                    <div class="cart-item" data-id="{{ $cartItem->id }}" data-price="{{ $cartItem->product->getCurrentPrice() }}" data-discount="{{ $cartItem->product->getDiscountAmount() }}">
                        <!-- Remove Button - Top Right -->
                        <button class="remove-item remove-item-top" data-item-id="{{ $cartItem->id }}" aria-label="Remove item" title="Remove from cart">
                            <i class="lni lni-close"></i>
                        </button>
                        
                        <div class="item-image">
                            <a href="{{ route('product.show', $cartItem->product->id) }}">
                                <img src="{{ asset($cartItem->product->productImages->where('is_primary', 1)->first()->image_url ?? 'uploads/default-product-image.jpg') }}" alt="{{ $cartItem->product->name_en }}">
                            </a>
                        </div>
                        
                        <div class="item-details">
                            <div class="item-info">
                                <h3 class="item-title">
                                    <a href="{{ route('product.show', $cartItem->product->id) }}">{{ $cartItem->product->name_ar ? $cartItem->product->name_ar : $cartItem->product->name_en }}</a>
                                </h3>
                                <div class="item-meta">
                                    <span class="meta-item">
                                        <span class="meta-label">Brand:</span> 
                                        {{ $cartItem->product->brand->name_ar ? $cartItem->product->brand->name_ar : $cartItem->product->brand->name_en }}
                                    </span>
                                    <span class="meta-item">
                                        <span class="meta-label">Color:</span> 
                                        {{ $cartItem->color->color->name_en ? $cartItem->color->color->name_en : $cartItem->color->color->name_ar }}
                                    </span>
                                </div>
                                
                                <!-- Mobile Price Display -->
                                <div class="item-price-mobile">
                                    <div class="price-current">{{ $cartItem->product->getCurrentPrice() }} EGP</div>
                                    @if($cartItem->product->discounts->isNotEmpty())
                                        <div class="price-original">
                                            <del>{{ $cartItem->product->price }} EGP</del>
                                        </div>
                                        <div class="price-discount">
                                            <span class="discount-badge">-{{ $cartItem->product->discounts->first()->discount_amount }} EGP</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="item-controls">
                                <!-- Quantity Control -->
                                <div class="quantity-control">
                                    <button class="qty-btn decrease" data-item-id="{{ $cartItem->id }}">
                                        <i class="lni lni-minus"></i>
                                    </button>
                                    <input type="number" class="qty-input" value="{{ $cartItem->quantity }}" min="1" data-item-id="{{ $cartItem->id }}">
                                    <button class="qty-btn increase" data-item-id="{{ $cartItem->id }}">
                                        <i class="lni lni-plus"></i>
                                    </button>
                                </div>
                                
                                <!-- Desktop Price Display -->
                                <div class="item-price">
                                    <div class="price-current">
                                        {{ $cartItem->product->getCurrentPrice() }} EGP
                                    </div>
                                    @if($cartItem->product->discounts->isNotEmpty())
                                        <div class="price-original">
                                            <del>{{ $cartItem->product->price }} EGP</del>
                                        </div>
                                        <div class="price-discount">
                                            <span class="discount-badge">-{{ $cartItem->product->discounts->first()->discount_amount }} EGP</span>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Remove Button - In Controls -->
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <!-- Empty Cart Message -->
                    <div class="empty-cart">
                        <div class="empty-cart-icon">
                            <i class="lni lni-cart"></i>
                        </div>
                        <h3>Your cart is empty</h3>
                        <p>Looks like you haven't added anything to your cart yet.</p>
                        <a href="{{ route('products.index') }}" class="btn-shop-now">Start Shopping</a>
                    </div>
                @endif
            </div>
            
            <!-- Cart Summary -->
            <div class="cart-summary">
                <div class="summary-header">
                    <h2>Order Summary</h2>
                </div>
                
                <div class="summary-content">
                    <div class="coupon-section">
                        <div class="coupon-form">
                            <div class="input-group">
                                <input type="text" disabled placeholder="Enter coupon code" class="coupon-input">
                                <button class="btn-apply-coupon">Apply</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="summary-totals">
                        <div class="summary-row">
                            <span class="summary-label">Subtotal</span>
                            <span class="summary-value subtotal">{{ $cart->cartItems->sum(function($item) { return $item->product->getCurrentPrice() * $item->quantity; }) }} EGP</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">Discount</span>
                            <span class="summary-value discount">-{{ $cart->cartItems->sum(function($item) { return $item->product->getDiscountAmount() * $item->quantity; }) }} EGP</span>
                        </div>
                        <div class="summary-row">
                            <span class="shipping-label">Shipping</span>
                            <span class="shipping-value">
                                <select id="shipping-zone" class="shipping-select">
                                    @foreach($shippingZones as $zone)
                                        <option value="{{ $zone->id }}" data-cost="{{ $zone->shipping_cost }}">
                                            {{ $zone->zone_name }} - {{ $zone->shipping_cost > 0 ? $zone->shipping_cost . ' EGP' : 'Free' }}
                                        </option>
                                    @endforeach
                                </select>
                            </span>
                        </div>
                        <div class="summary-row total">
                            <span class="summary-label">Total</span>
                            <span class="summary-value total-amount">
                                {{ $cart->cartItems->sum(function($item) { 
                                    return ($item->product->getCurrentPrice() * $item->quantity) - ($item->product->getDiscountAmount() * $item->quantity);
                                }) + ($shippingZones->first() ? $shippingZones->first()->shipping_cost : 0) }} EGP
                            </span>
                        </div>
                    </div>
                    
                    <div class="checkout-actions">
                        <a href="#" class="btn-checkout">
                            Proceed to Checkout
                        </a>
                        <a href="{{ route('products.index') }}" class="btn-continue">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- You May Also Like Section -->
<section class="recommendations-section">
    <div class="container">
        <h2 class="section-title">You May Also Like</h2>
        <div class="product-slider">
            @if(isset($cart->recommendedProducts) && $cart->recommendedProducts->count() > 0)
                <div class="recommended-products">
                    @foreach($cart->recommendedProducts as $product)
                    <div class="product-card">
                        <div class="product-image">
                            <a href="{{ route('product.show', $product->id) }}">
                                <img src="{{ asset($product->productImages->where('is_primary', 1)->first()->image_url ?? 'uploads/default-product-image.jpg') }}" alt="{{ $product->name_en }}">
                            </a>
                            @if($product->discounts->isNotEmpty())
                            <div class="product-badge">{{ $product->discounts->first()->discount_amount }} OFF</div>
                            @endif
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">
                                <a href="{{ route('product.show', $product->id) }}">{{ $product->name_ar ? $product->name_ar : $product->name_en }}</a>
                            </h3>
                            <div class="product-price">
                                <span class="current-price">{{ $product->getCurrentPrice() }} EGP</span>
                                @if($product->discounts->isNotEmpty())
                                <span class="original-price"><del>{{ $product->price }} EGP</del></span>
                                @endif
                            </div>
                            <div class="button">
                                <a href="{{ route('cart.store', $product->id) }}" class="btn add-to-cart" data-product-id="{{ $product->id }}">
                                    <i class="lni lni-cart"></i> Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
            <div class="product-placeholder">
                <div class="placeholder-text">Related products would appear here</div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('website/css/cart.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('website/js/cart.js') }}"></script>
@endpush