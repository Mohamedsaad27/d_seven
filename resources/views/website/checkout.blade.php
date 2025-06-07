@extends('layouts.website.master')

@section('title', 'Checkout')

@section('content')


<!-- Checkout Section -->
<section class="checkout-section">
    <div class="container">
        <div class="row">
            <!-- Order Summary -->
            <div class="col-lg-5 col-md-6">
                <div class="checkout-summary">
                    <div class="summary-header">
                        <h3>Order Summary</h3>
                        <span class="item-count">{{ $cart->cartItems->count() }} Items</span>
                    </div>
                    
                    <div class="summary-items">
                        @foreach($cart->cartItems as $cartItem)
                        <div class="summary-item">
                            <div class="item-image">
                                <img src="{{ asset($cartItem->product->productImages->where('is_primary', 1)->first()->image_url ?? 'uploads/default-product-image.jpg') }}" 
                                     alt="{{ $cartItem->product->name_ar ? $cartItem->product->name_ar : $cartItem->product->name_en }}">
                            </div>
                            <div class="item-details">
                                <h4>{{ $cartItem->product->name_ar ? $cartItem->product->name_ar : $cartItem->product->name_en }}</h4>
                                <div class="item-meta">
                                    <span>Color: {{ $cartItem->color->color->name_en ? $cartItem->color->color->name_en : $cartItem->color->color->name_ar }}</span>
                                    <span>Qty: {{ $cartItem->quantity }}</span>
                                </div>
                                <div class="item-price">{{ $cartItem->product->getCurrentPrice() * $cartItem->quantity }} EGP</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="summary-totals">
                        <div class="total-row">
                            <span>Subtotal:</span>
                            <span class="subtotal">{{ $cart->cartItems->sum(function($item) { return $item->product->getCurrentPrice() * $item->quantity; }) }} EGP</span>
                        </div>
                        <div class="total-row">
                            <span>Discount:</span>
                            <span class="discount">-{{ $cart->cartItems->sum(function($item) { return $item->product->getDiscountAmount() * $item->quantity; }) }} EGP</span>
                        </div>
                        <div class="total-row">
                            <span>Shipping:</span>
                            <span class="shipping-cost">0 EGP</span>
                        </div>
                        <div class="total-row grand-total">
                            <span>Total:</span>
                            <span class="total-amount">
                                {{ $cart->cartItems->sum(function($item) { 
                                    return ($item->product->getCurrentPrice() * $item->quantity) - ($item->product->getDiscountAmount() * $item->quantity);
                                }) }} EGP
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Checkout Form -->
            <div class="col-lg-7 col-md-6">
                <div class="checkout-form">
                    <h3>Shipping Information</h3>
                    
                    <form id="checkoutForm" action="{{ route('cart.checkout') }}" method="POST">
                        @csrf
                        
                        <!-- User Information (Read-only) -->
                        <div class="form-section">
                            <h4>Personal Information</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->name_en }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Shipping Zone -->
                        <div class="form-section">
                            <h4>Shipping Details</h4>
                            <div class="form-group">
                                <label for="shipping_zone_id">Shipping Zone <span class="required">*</span></label>
                                <select name="shipping_zone_id" id="shipping_zone_id" class="form-control" required>
                                    <option value="">Select Shipping Zone</option>
                                    @foreach($shippingZones as $zone)
                                        <option value="{{ $zone->id }}" data-cost="{{ $zone->shipping_cost }}">
                                            {{ $zone->zone_name }} - {{ $zone->shipping_cost > 0 ? $zone->shipping_cost . ' EGP' : 'Free' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('shipping_zone_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Additional Notes -->
                        <div class="form-section">
                            <div class="form-group">
                                <label for="notes">Order Notes (Optional)</label>
                                <textarea name="notes" id="notes" class="form-control" rows="3" 
                                         placeholder="Any special instructions for your order..."></textarea>
                            </div>
                        </div>
                        
                        <!-- Terms and Conditions -->
                        <div class="form-section">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" target="_blank">Terms and Conditions</a> <span class="required">*</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="checkout-actions">
                            <button type="submit" class="btn btn-primary btn-checkout">
                                <span class="checkout-text">Place Order</span>
                                <span class="checkout-spinner d-none">
                                    <i class="fas fa-spinner fa-spin"></i> Processing...
                                </span>
                            </button>
                            <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary">Back to Cart</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- First Order Modal -->
<div class="modal fade" id="firstOrderModal" tabindex="-1" aria-labelledby="firstOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 text-center">
                <div class="w-100">
                    <div class="success-icon mb-3">
                        <i class="fas fa-check-circle text-success"></i>
                    </div>
                    <h4 class="modal-title" id="firstOrderModalLabel">Congratulations!</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="first-order-content">
                    <h5 class="text-primary mb-3">🎉 Welcome to Our Store! 🎉</h5>
                    <p class="lead">This is your first order with us!</p>
                    
                    <div class="special-offer">
                        <div class="offer-badge">
                            <i class="fas fa-gift"></i>
                            <span>Special Gift</span>
                        </div>
                        <h6 class="text-success mt-3">FREE SHIPPING</h6>
                        <p class="text-muted">As a welcome gift, shipping is completely free on your first order!</p>
                    </div>
                    
                    <div class="order-details mt-4">
                        <div class="detail-row">
                            <span>Order Number:</span>
                            <strong id="orderNumber"></strong>
                        </div>
                        <div class="detail-row">
                            <span>Total Amount:</span>
                            <strong id="orderTotal"></strong>
                        </div>
                        <div class="detail-row text-success">
                            <span>Shipping:</span>
                            <strong>FREE</strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <a href="{{ route('orders.index') }}" class="btn btn-primary" id="viewOrderBtn">View Order Details</a>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary" data-bs-dismiss="modal">Continue Shopping</a>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 text-center">
                <div class="w-100">
                    <div class="success-icon mb-3">
                        <i class="fas fa-check-circle text-success"></i>
                    </div>
                    <h4 class="modal-title" id="successModalLabel">Order Placed Successfully!</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="lead">Thank you for your order!</p>
                <div class="order-details">
                    <div class="detail-row">
                        <span>Order Number:</span>
                        <strong id="regularOrderNumber"></strong>
                    </div>
                    <div class="detail-row">
                        <span>Total Amount:</span>
                        <strong id="regularOrderTotal"></strong>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn btn-primary" id="viewRegularOrderBtn">View Order Details</button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Continue Shopping</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('website/css/checkout.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('website/js/checkout.js') }}"></script>
@endpush