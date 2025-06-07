@extends('layouts.dashboard.layout')
@section('title', 'Order Details - #' . $order->id)

@section('content')

@include('layouts.dashboard.breadcrumb', ['component' => 'Orders', 'subcomponent' => 'Order #' . $order->id])
@if (session('success'))
        <script>
            iziToast.success({
                title: 'Success',
                message: '{{ session('success') }}',
                position: 'topRight'
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            iziToast.error({
                title: 'Error',
                message: '{{ session('error') }}',
                position: 'topRight'
            });
        </script>
    @endif
<div class="order-details">
    <!-- Order Header -->
    <div class="order-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="order-title">Order #{{ $order->order_number }}</h2>
                <div class="order-meta">
                    <span class="order-date">
                        <i class="fas fa-calendar"></i>
                        {{ $order->created_at->format('F d, Y \a\t H:i') }}
                    </span>
                </div>
            </div>
            <div class="col-md-6 text-end">
                <div class="order-actions">
                    <button class="btn btn-outline-primary" onclick="window.print()">
                        <i class="fas fa-print"></i> Print Order
                    </button>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Orders
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Order Information -->
        <div class="col-lg-8">
            <!-- Order Status -->
            <div class="order-section">
                <div class="section-header">
                    <h4>Order Status</h4>
                </div>
                <div class="status-management">
                    <div class="current-status">
                        <span class="status-badge status-{{ $order->status }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    <div class="status-update">
                        <select class="form-control status-select" data-order-id="{{ $order->id }}">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <button class="btn btn-primary update-status-btn" data-order-id="{{ $order->id }}">
                            Update Status
                        </button>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="order-section">
                <div class="section-header">
                    <h4>Order Items ({{ $order->orderItems->count() }})</h4>
                </div>
                <div class="order-items">
                    @foreach($order->orderItems as $item)
                    <div class="order-item">
                        <div class="item-image">
                            <img src="{{ asset($item->product->productImages->where('is_primary', 1)->first()->image_url ?? 'uploads/default-product-image.jpg') }}" 
                                 alt="{{ $item->product->name_ar ?? $item->product->name_en }}">
                        </div>
                        <div class="item-details">
                            <h5 class="item-name">{{ $item->product->name_ar ?? $item->product->name_en }}</h5>
                            <div class="item-meta">
                                @if($item->color)
                                <span class="meta-item">
                                    <strong>Color:</strong> {{ $item->color->color->name_en ?? $item->color->color->name_ar }}
                                </span>
                                @endif
                                @if($item->size)
                                <span class="meta-item">
                                    <strong>Size:</strong> {{ $item->size->size_name }}
                                </span>
                                @endif
                            </div>
                            <div class="item-pricing">
                                <div class="quantity">Qty: {{ $item->quantity }}</div>
                                <div class="unit-price">{{ number_format($item->price, 2) }} EGP each</div>
                                <div class="total-price">{{ number_format($item->price * $item->quantity, 2) }} EGP</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Order Timeline -->
            <div class="order-section">
                <div class="section-header">
                    <h4>Order Timeline</h4>
                </div>
                <div class="order-timeline">
                    <div class="timeline-item active">
                        <div class="timeline-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="timeline-content">
                            <h6>Order Placed</h6>
                            <p>{{ $order->created_at->format('F d, Y \a\t H:i') }}</p>
                        </div>
                    </div>
                    
                    @if($order->status != 'pending')
                    <div class="timeline-item {{ in_array($order->status, ['processing', 'completed']) ? 'active' : '' }}">
                        <div class="timeline-icon">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="timeline-content">
                            <h6>Processing</h6>
                            <p>Order is being processed</p>
                        </div>
                    </div>
                    @endif
                    
                    @if($order->status == 'completed')
                    <div class="timeline-item active">
                        <div class="timeline-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="timeline-content">
                            <h6>Completed</h6>
                            <p>Order has been completed</p>
                        </div>
                    </div>
                    @endif
                    
                    @if($order->status == 'cancelled')
                    <div class="timeline-item cancelled">
                        <div class="timeline-icon">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div class="timeline-content">
                            <h6>Cancelled</h6>
                            <p>Order has been cancelled</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            <!-- Customer Information -->
            <div class="order-section">
                <div class="section-header">
                    <h4>Customer Information</h4>
                </div>
                <div class="customer-info">
                    <div class="customer-avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="customer-details">
                        <h5>{{ $order->user->name_ar ?? $order->user->name_en }}</h5>
                        <p class="customer-email">{{ $order->user->email }}</p>
                        @if($order->user->phone)
                        <p class="customer-phone">
                            <i class="fas fa-phone"></i> {{ $order->user->phone }}
                        </p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Shipping Information -->
            <div class="order-section">
                <div class="section-header">
                    <h4>Shipping Information</h4>
                </div>
                <div class="shipping-info">
                    <div class="shipping-zone">
                        <strong>{{ $order->shippingZone->zone_name }}</strong>
                    </div>
                    <div class="shipping-cost">
                        Shipping Cost: {{ number_format($order->shippingZone->shipping_cost, 2) }} EGP
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="order-section">
                <div class="section-header">
                    <h4>Order Summary</h4>
                </div>
                <div class="order-summary">
                    <div class="summary-row">
                        <span>Subtotal:</span>
                        <span>{{ number_format($order->orderItems->sum(function($item) { return $item->price * $item->quantity; }), 2) }} EGP</span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping:</span>
                        <span>{{ number_format($order->shippingZone->shipping_cost, 2) }} EGP</span>
                    </div>
                    <div class="summary-row total">
                        <span><strong>Total:</strong></span>
                        <span><strong>{{ number_format($order->total_price, 2) }} EGP</strong></span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="order-section">
                <div class="section-header">
                    <h4>Quick Actions</h4>
                </div>
                <div class="quick-actions">
                    <form action="{{ route('orders.send-confirmation-email', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-block mb-2">
                            <i class="fas fa-envelope"></i> Send Email to Customer
                        </button>
                    </form>
                    <button class="btn btn-outline-warning btn-block mb-2">
                        <i class="fas fa-edit"></i> Add Order Note
                    </button>
                    <button class="btn btn-outline-danger btn-block delete-order" data-order-id="{{ $order->id }}">
                        <i class="fas fa-trash"></i> Delete Order
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('dashboard/css/order-details.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('dashboard/js/order-details.js') }}"></script>
@endpush
@endsection