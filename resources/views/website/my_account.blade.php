@extends('layouts.website.master')
@section('title', trans('My Account'))
@section('content')

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs py-4 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title fs-2 fw-bold text-primary">My Account</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none"><i class="lni lni-home me-1"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Account Area -->
    <section class="account-section py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Account Sidebar -->
                <div class="col-lg-3 col-md-4">
                    <div class="account-sidebar bg-white shadow rounded-4 sticky-lg-top" style="top: 20px;">
                        <div class="user-profile p-4 bg-primary bg-opacity-10 text-center">
                            <div class="profile-image position-relative mb-3">
                                @if(auth()->user()->profile_image)
                                    <img src="{{ asset(auth()->user()->profile_image) }}" alt="{{ auth()->user()->name_en }}" class="rounded-circle border border-3 border-white shadow" style="width: 100px; height: 100px; object-fit: cover;">
                                @else
                                    <div class="default-avatar rounded-circle bg-primary d-flex align-items-center justify-content-center mx-auto border border-3 border-white shadow" style="width: 100px; height: 100px;">
                                        <span class="text-white fs-2">{{ substr(auth()->user()->name_en, 0, 1) }}</span>
                                    </div>
                                @endif
                                <button class="btn btn-sm btn-light rounded-circle position-absolute bottom-0 end-0 shadow-sm" data-bs-toggle="tooltip" title="Change Photo">
                                    <i class="lni lni-camera"></i>
                                </button>
                            </div>
                            <h5 class="mb-1 fw-bold">{{ auth()->user()->name_en }}</h5>
                            <p class="text-muted small mb-0">{{ auth()->user()->email }}</p>
                        </div>
                        <div class="account-menu p-2">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0 p-0">
                                    <a href="#" class="d-flex align-items-center p-3 rounded text-decoration-none active">
                                        <i class="lni lni-dashboard me-3 fs-5"></i> 
                                        <span>Dashboard</span>
                                        <i class="lni lni-chevron-right ms-auto"></i>
                                    </a>
                                </li>
                                <li class="list-group-item border-0 p-0">
                                    <a href="#" class="d-flex align-items-center p-3 rounded text-decoration-none">
                                        <i class="lni lni-cart me-3 fs-5"></i> 
                                        <span>My Orders</span>
                                        <span class="badge bg-primary rounded-pill ms-auto">3</span>
                                    </a>
                                </li>
                                <li class="list-group-item border-0 p-0">
                                    <a href="#" class="d-flex align-items-center p-3 rounded text-decoration-none">
                                        <i class="lni lni-heart me-3 fs-5"></i> 
                                        <span>Wishlist</span>
                                        <span class="badge bg-danger rounded-pill ms-auto">5</span>
                                    </a>
                                </li>
                                <li class="list-group-item border-0 p-0">
                                    <a href="#" class="d-flex align-items-center p-3 rounded text-decoration-none">
                                        <i class="lni lni-user me-3 fs-5"></i> 
                                        <span>Profile Settings</span>
                                        <i class="lni lni-chevron-right ms-auto"></i>
                                    </a>
                                </li>
                                <li class="list-group-item border-0 p-0">
                                    <a href="#" class="d-flex align-items-center p-3 rounded text-decoration-none">
                                        <i class="lni lni-map-marker me-3 fs-5"></i> 
                                        <span>My Addresses</span>
                                        <i class="lni lni-chevron-right ms-auto"></i>
                                    </a>
                                </li>
                                <li class="list-group-item border-0 p-0">
                                    <a href="#" class="d-flex align-items-center p-3 rounded text-decoration-none">
                                        <i class="lni lni-lock me-3 fs-5"></i> 
                                        <span>Change Password</span>
                                        <i class="lni lni-chevron-right ms-auto"></i>
                                    </a>
                                </li>
                                <li class="list-group-item border-0 p-0">
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-flex align-items-center p-3 rounded text-decoration-none text-danger">
                                        <i class="lni lni-power-switch me-3 fs-5"></i> 
                                        <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Account Content -->
                <div class="col-lg-9 col-md-8">
                    <!-- Dashboard Overview -->
                    <div class="account-wrapper bg-white shadow rounded-4 p-4 p-lg-5">
                        <div class="account-header d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                            <div>
                                <h4 class="mb-1 fw-bold">Account Dashboard</h4>
                                <p class="text-muted mb-0">Welcome back, {{ auth()->user()->name_en }}!</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-success d-flex align-items-center p-2">
                                    <i class="lni lni-checkmark-circle me-1"></i> Active Account
                                </span>
                            </div>
                        </div>
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                                <i class="lni lni-checkmark-circle me-2 fs-5"></i>
                                <div>
                                    {{ session('success') }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        <!-- Account Info Cards -->
                        <div class="row g-4 mb-5">
                            <div class="col-md-4">
                                <div class="dashboard-card h-100 rounded-4 overflow-hidden position-relative">
                                    <div class="card-bg position-absolute top-0 start-0 w-100 h-100 bg-gradient-primary"></div>
                                    <div class="card-content position-relative p-4 d-flex flex-column h-100">
                                        <div class="d-flex justify-content-between align-items-start mb-4">
                                            <div class="card-icon-container rounded-circle bg-white p-3 shadow-sm">
                                                <i class="lni lni-cart fs-4 text-primary"></i>
                                            </div>
                                            <div class="card-badge rounded-pill px-3 py-1 bg-white text-primary fw-medium">
                                                <i class="lni lni-package me-1"></i> Orders
                                            </div>
                                        </div>
                                        <div class="card-body p-0 mt-auto">
                                            <div class="d-flex align-items-end justify-content-between">
                                                <div>
                                                    <h2 class="display-5 fw-bold text-white mb-0">{{ $orderCount ?? 0 }}</h2>
                                                    <p class="text-white text-opacity-75 mb-0">Total Orders</p>
                                                </div>
                                                <a href="#" class="btn btn-light rounded-pill px-4 shadow-sm">
                                                    <span>View All</span>
                                                    <i class="lni lni-arrow-right ms-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-card h-100 rounded-4 overflow-hidden position-relative">
                                    <div class="card-bg position-absolute top-0 start-0 w-100 h-100 bg-gradient-danger"></div>
                                    <div class="card-content position-relative p-4 d-flex flex-column h-100">
                                        <div class="d-flex justify-content-between align-items-start mb-4">
                                            <div class="card-icon-container rounded-circle bg-white p-3 shadow-sm">
                                                <i class="lni lni-heart fs-4 text-danger"></i>
                                            </div>
                                            <div class="card-badge rounded-pill px-3 py-1 bg-white text-danger fw-medium">
                                                <i class="lni lni-heart-filled me-1"></i> Wishlist
                                            </div>
                                        </div>
                                        <div class="card-body p-0 mt-auto">
                                            <div class="d-flex align-items-end justify-content-between">
                                                <div>
                                                    <h2 class="display-5 fw-bold text-white mb-0">{{ $wishlistCount ?? 0 }}</h2>
                                                    <p class="text-white text-opacity-75 mb-0">Saved Items</p>
                                                </div>
                                                <a href="#" class="btn btn-light rounded-pill px-4 shadow-sm">
                                                    <span>View All</span>
                                                    <i class="lni lni-arrow-right ms-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-card h-100 rounded-4 overflow-hidden position-relative">
                                    <div class="card-bg position-absolute top-0 start-0 w-100 h-100 bg-gradient-info"></div>
                                    <div class="card-content position-relative p-4 d-flex flex-column h-100">
                                        <div class="d-flex justify-content-between align-items-start mb-4">
                                            <div class="card-icon-container rounded-circle bg-white p-3 shadow-sm">
                                                <i class="lni lni-map-marker fs-4 text-info"></i>
                                            </div>
                                            <div class="card-badge rounded-pill px-3 py-1 bg-white text-info fw-medium">
                                                <i class="lni lni-map me-1"></i> Addresses
                                            </div>
                                        </div>
                                        <div class="card-body p-0 mt-auto">
                                            <div class="d-flex align-items-end justify-content-between">
                                                <div>
                                                    <h2 class="display-5 fw-bold text-white mb-0">{{ $addressCount ?? 0 }}</h2>
                                                    <p class="text-white text-opacity-75 mb-0">Saved Locations</p>
                                                </div>
                                                <a href="#" class="btn btn-light rounded-pill px-4 shadow-sm">
                                                    <span>View All</span>
                                                    <i class="lni lni-arrow-right ms-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Recent Orders -->
                        <div class="recent-orders mb-5">
                            <div class="section-header d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                                <h5 class="fw-bold mb-0">
                                    <i class="lni lni-cart-full me-2"></i>
                                    Recent Orders
                                </h5>
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    View All <i class="lni lni-arrow-right ms-1"></i>
                                </a>
                            </div>
                            
                            @if(isset($recentOrders) && count($recentOrders) > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Date</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($recentOrders as $order)
                                                <tr>
                                                    <td>
                                                        <span class="fw-medium">#{{ $order->order_number }}</span>
                                                    </td>
                                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                                    <td>
                                                        <span class="fw-bold">${{ number_format($order->total, 2) }}</span>
                                                    </td>
                                                    <td>
                                                        @if($order->status == 'pending')
                                                            <span class="badge bg-warning text-dark">
                                                                <i class="lni lni-timer me-1"></i> Pending
                                                            </span>
                                                        @elseif($order->status == 'processing')
                                                            <span class="badge bg-info">
                                                                <i class="lni lni-cog me-1"></i> Processing
                                                            </span>
                                                        @elseif($order->status == 'completed')
                                                            <span class="badge bg-success">
                                                                <i class="lni lni-checkmark-circle me-1"></i> Completed
                                                            </span>
                                                        @elseif($order->status == 'cancelled')
                                                            <span class="badge bg-danger">
                                                                <i class="lni lni-close me-1"></i> Cancelled
                                                            </span>
                                                        @else
                                                            <span class="badge bg-secondary">
                                                                {{ ucfirst($order->status) }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="dropdown">
                                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item" href="#"><i class="lni lni-eye me-2"></i> View Details</a></li>
                                                                <li><a class="dropdown-item" href="#"><i class="lni lni-download me-2"></i> Download Invoice</a></li>
                                                                <li><a class="dropdown-item" href="#"><i class="lni lni-reload me-2"></i> Track Order</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-5 bg-light rounded-4">
                                    <img src="{{ asset('shopping-cart-empty-side-view-svgrepo-com.svg') }}" alt="No Orders" class="img-fluid mb-4" style="max-width: 150px;">
                                    <h5 class="fw-bold">No Orders Yet</h5>
                                    <p class="text-muted mb-4">You haven't placed any orders yet.</p>
                                    <a href="#" class="btn btn-primary">
                                        <i class="lni lni-cart me-2"></i> Start Shopping
                                    </a>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Account Info -->
                        <div class="account-info">
                            <div class="section-header d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                                <h5 class="fw-bold mb-0">
                                    <i class="lni lni-user me-2"></i>
                                    Account Information
                                </h5>
                            </div>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="info-block bg-light rounded-4 p-4 h-100 border">
                                        <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                                            <h6 class="fw-bold mb-0">
                                                <i class="lni lni-envelope me-2"></i> Contact Information
                                            </h6>
                                            <a href="#" class="btn btn-sm btn-outline-primary">
                                                <i class="lni lni-pencil me-1"></i> Edit
                                            </a>
                                        </div>
                                        <div class="mb-3">
                                            <p class="mb-1 d-flex align-items-center">
                                                <span class="text-muted me-2 w-25">Name:</span>
                                                <span class="fw-medium">{{ auth()->user()->name_en }}</span>
                                            </p>
                                            <p class="mb-1 d-flex align-items-center">
                                                <span class="text-muted me-2 w-25">Email:</span>
                                                <span class="fw-medium">{{ auth()->user()->email }}</span>
                                            </p>
                                            <p class="mb-1 d-flex align-items-center">
                                                <span class="text-muted me-2 w-25">Phone:</span>
                                                <span class="fw-medium">{{ auth()->user()->phone ?? 'Not provided' }}</span>
                                            </p>
                                            <p class="mb-0 d-flex align-items-center">
                                                <span class="text-muted me-2 w-25">Member Since:</span>
                                                <span class="fw-medium">{{ auth()->user()->created_at->format('M d, Y') }}</span>
                                            </p>
                                        </div>
                                        <div class="alert alert-info d-flex align-items-center mb-0" role="alert">
                                            <i class="lni lni-information me-2"></i>
                                            <div>Keep your contact information up to date for order notifications.</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="info-block bg-light rounded-4 p-4 h-100 border">
                                        <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                                            <h6 class="fw-bold mb-0">
                                                <i class="lni lni-map me-2"></i> Default Shipping Address
                                            </h6>
                                            <a href="#" class="btn btn-sm btn-outline-primary">
                                                <i class="lni lni-pencil me-1"></i> Edit
                                            </a>
                                        </div>
                                        
                                        @if(isset($defaultAddress))
                                            <div class="address-details">
                                                <p class="mb-1 fw-medium">{{ $defaultAddress->name }}</p>
                                                <p class="mb-1">{{ $defaultAddress->address_line1 }}</p>
                                                <p class="mb-1">{{ $defaultAddress->city }}, {{ $defaultAddress->state }} {{ $defaultAddress->zip_code }}</p>
                                                <p class="mb-3">{{ $defaultAddress->country }}</p>
                                                <div class="d-flex gap-2">
                                                    <a href="#" class="btn btn-sm btn-outline-secondary">
                                                        <i class="lni lni-map-marker me-1"></i> Set as Default
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-outline-danger">
                                                        <i class="lni lni-trash me-1"></i> Remove
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-center py-4">
                                                <i class="lni lni-map-marker fs-1 text-muted mb-3"></i>
                                                <p class="text-muted mb-3">No default shipping address set.</p>
                                                <a href="#" class="btn btn-primary">
                                                    <i class="lni lni-plus me-1"></i> Add New Address
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Account Area -->

@endsection

@push('styles')
<style>
    /* Account Sidebar Styling */
    .account-sidebar {
        transition: all 0.3s ease;
    }
    
    .account-sidebar .account-menu li a {
        color: #333;
        transition: all 0.3s ease;
        border-radius: 8px;
    }
    
    .account-sidebar .account-menu li a:hover,
    .account-sidebar .account-menu li a.active {
        background-color: var(--bs-primary);
        color: #fff;
    }
    
    .account-sidebar .account-menu li a i {
        font-size: 20px;
    }
    
    /* Info Cards Styling */
    .info-card {
        transition: all 0.3s ease;
        overflow: hidden;
    }
    
    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .info-card .icon-box {
        transition: all 0.3s ease;
    }
    
    .info-card:hover .icon-box {
        transform: scale(1.1);
    }
    
    /* Info Blocks Styling */
    .info-block {
        transition: all 0.3s ease;
    }
    
    .info-block:hover {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }
    
    /* Section Headers */
    .section-header {
        position: relative;
    }
    
    /* Table Styling */
    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
    }
    
    .table td {
        vertical-align: middle;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 991px) {
        .sticky-lg-top {
            position: relative !important;
            top: 0 !important;
        }
    }
    
    @media (max-width: 767px) {
        .account-sidebar {
            margin-bottom: 30px;
        }
        
        .info-card {
            margin-bottom: 20px;
        }
    }
    
    /* Active Menu Item */
    .account-menu li a.active {
        background-color: var(--bs-primary);
        color: white !important;
    }
    
    /* Animation for Cards */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .info-card {
        animation: fadeInUp 0.5s ease-out forwards;
    }
    
    .info-card:nth-child(1) {
        animation-delay: 0.1s;
    }
    
    .info-card:nth-child(2) {
        animation-delay: 0.2s;
    }
    
    .info-card:nth-child(3) {
        animation-delay: 0.3s;
    }
    
    /* Badge Styling */
    .badge {
        font-weight: 500;
        padding: 0.5em 0.8em;
    }

    /* Enhanced Info Cards Styling */
    .info-card {
        transition: all 0.3s ease;
        border: none;
        background-color: white;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }

    .info-card .icon-wrapper {
        transition: all 0.3s ease;
    }

    .info-card:hover .icon-wrapper {
        transform: scale(1.1);
    }

    .info-card .card-stats {
        border-top: 1px solid rgba(0,0,0,0.05);
    }

    .info-card .btn {
        transition: all 0.3s ease;
    }

    .info-card:hover .btn {
        padding-left: 1.2rem !important;
        padding-right: 1.2rem !important;
    }

    .card-decoration {
        opacity: 0.9;
        transition: all 0.3s ease;
    }

    .info-card:hover .card-decoration {
        opacity: 1;
        height: 10px !important;
    }

    /* Dashboard Cards Styling */
    .dashboard-card {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: none;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .card-icon-container {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .dashboard-card:hover .card-icon-container {
        transform: scale(1.1);
    }

    .card-badge {
        font-size: 0.85rem;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #4361ee, #3f37c9);
    }

    .bg-gradient-danger {
        background: linear-gradient(135deg, #f72585, #b5179e);
    }

    .bg-gradient-info {
        background: linear-gradient(135deg, #4cc9f0, #4895ef);
    }

    .dashboard-card .btn {
        transition: all 0.3s ease;
        border: none;
    }

    .dashboard-card:hover .btn {
        transform: translateX(5px);
    }

    .dashboard-card .display-5 {
        font-size: 2.5rem;
    }

    @media (max-width: 767px) {
        .dashboard-card .display-5 {
            font-size: 2rem;
        }
    }
</style>
@endpush

