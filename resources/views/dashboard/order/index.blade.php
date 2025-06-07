@extends('layouts.dashboard.layout')
@section('title', 'Orders Management')

@section('content')
@include('layouts.dashboard.breadcrumb', ['component' => 'Orders'])

<div class="orders-management">
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stats-card stats-primary">
                <div class="stats-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="stats-content">
                    <h3>{{ number_format($stats['total']) }}</h3>
                    <p>Total Orders</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stats-card stats-warning">
                <div class="stats-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stats-content">
                    <h3>{{ number_format($stats['pending']) }}</h3>
                    <p>Pending Orders</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stats-card stats-info">
                <div class="stats-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <div class="stats-content">
                    <h3>{{ number_format($stats['processing']) }}</h3>
                    <p>Processing</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stats-card stats-success">
                <div class="stats-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stats-content">
                    <h3>{{ number_format($stats['completed']) }}</h3>
                    <p>Completed</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Revenue Stats -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="revenue-card">
                <div class="revenue-content">
                    <h4>{{ number_format($stats['total_revenue'], 2) }} EGP</h4>
                    <p>Total Revenue</p>
                </div>
                <div class="revenue-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="revenue-card">
                <div class="revenue-content">
                    <h4>{{ number_format($stats['today']) }}</h4>
                    <p>Today's Orders</p>
                </div>
                <div class="revenue-icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="revenue-card">
                <div class="revenue-content">
                    <h4>{{ number_format($stats['this_month']) }}</h4>
                    <p>This Month</p>
                </div>
                <div class="revenue-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters and Actions -->
    <div class="orders-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="page-title">Orders Management</h2>
            </div>
            <div class="col-md-6 text-end">
                <button class="btn btn-outline-primary me-2" onclick="exportOrders()">
                    <i class="fas fa-download"></i> Export
                </button>
                <button class="btn btn-danger" id="bulkDeleteBtn" style="display: none;">
                    <i class="fas fa-trash"></i> Delete Selected
                </button>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="filters-section">
        <form method="GET"  class="filters-form">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Order ID, Customer name, Email..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="">All Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Shipping Zone</label>
                        <select name="shipping_zone" class="form-control">
                            <option value="">All Zones</option>
                            @foreach($shippingZones as $zone)
                                <option value="{{ $zone->id }}" {{ request('shipping_zone') == $zone->id ? 'selected' : '' }}>
                                    {{ $zone->zone_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Date From</label>
                        <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Date To</label>
                        <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Orders Table -->
    <div class="orders-table-container">
        <div class="table-responsive">
            <table class="table orders-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="selectAll" class="form-check-input">
                        </th>
                        <th>Order Number</th>
                        <th>Customer</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Shipping Zone</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input order-checkbox" value="{{ $order->id }}">
                        </td>
                        <td>
                            <div class="order-id">
                                <strong>{{ $order->order_number }}</strong>
                            </div>
                        </td>
                        <td>
                            <div class="customer-info">
                                <div class="customer-name">{{ $order->user->name_ar ?? $order->user->name_en }}</div>
                                <div class="customer-email">{{ $order->user->email }}</div>
                            </div>
                        </td>
                        <td>
                            <div class="order-items">
                                <span class="items-count">{{ $order->orderItems->count() }} items</span>
                                <div class="items-preview">
                                    @foreach($order->orderItems->take(2) as $item)
                                        <span class="item-name">{{ $item->product->name_ar ?? $item->product->name_en }}</span>
                                        @if(!$loop->last), @endif
                                    @endforeach
                                    @if($order->orderItems->count() > 2)
                                        <span class="more-items">+{{ $order->orderItems->count() - 2 }} more</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="order-total">
                                <strong>{{ number_format($order->total_price, 2) }} EGP</strong>
                            </div>
                        </td>
                        <td>
                            <div class="shipping-zone">
                                {{ $order->shippingZone->zone_name }}
                            </div>
                        </td>
                        <td>
                            <div class="status-container">
                                <select class="form-control status-select" data-order-id="{{ $order->id }}">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                <span class="status-badge status-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="order-date">
                                <div class="date">{{ $order->created_at->format('M d, Y') }}</div>
                                <div class="time">{{ $order->created_at->format('H:i') }}</div>
                            </div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button class="btn btn-sm btn-outline-danger delete-order" data-order-id="{{ $order->id }}" title="Delete Order">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-5">
                            <div class="empty-state">
                                <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                                <h4>No Orders Found</h4>
                                <p class="text-muted">No orders match your current filters.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($orders->hasPages())
        <div class="pagination-container">
            {{ $orders->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Bulk Actions Modal -->
<div class="modal fade" id="bulkActionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bulk Actions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="bulkActionForm">
                    <div class="form-group mb-3">
                        <label>Action</label>
                        <select name="action" class="form-control" required>
                            <option value="">Select Action</option>
                            <option value="update_status">Update Status</option>
                            <option value="delete">Delete Orders</option>
                        </select>
                    </div>
                    <div class="form-group mb-3" id="statusGroup" style="display: none;">
                        <label>New Status</label>
                        <select name="status" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="selected-orders">
                        <p>Selected Orders: <span id="selectedCount">0</span></p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="executeBulkAction">Execute</button>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('dashboard/css/orders.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('dashboard/js/orders.js') }}"></script>
@endpush
@endsection