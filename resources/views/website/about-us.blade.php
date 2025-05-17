@extends('layouts.website.master')
@section('title',trans('messages.about-us'))

@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs py-4" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title fw-bold">About Us</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 justify-content-md-end">
                            <li class="breadcrumb-item"><a href="/"><i class="lni lni-home me-1"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start About Area -->
    <section class="about-us section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12 mb-5 mb-lg-0">
                    <div class="content-left position-relative">
                        <img src="{{asset('WhatsApp Image 2025-04-26 at 12.16.44_abdae11c.jpg?height=300&width=300')}}" alt="About Our Store" class="img-fluid rounded-4 shadow-lg main-img">
                        <!-- <img src="{{asset('WhatsApp Image 2025-04-26 at 12.16.44_abdae11c.jpg?height=300&width=300')}}" alt="Quality Products" class="img-fluid rounded-4 shadow position-absolute secondary-img d-none d-lg-block" style="bottom: -50px; right: -50px; z-index: 2; border: 5px solid white;"> -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- content-1 start -->
                    <div class="content-right ps-lg-4">
                        <div class="section-tag mb-3">
                            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-normal">Our Story</span>
                        </div>
                        <h2 class="display-5 fw-bold mb-4">Bringing Style & Comfort to Your Home</h2>
                        <p class="lead text-muted mb-4">Founded in 2010, we've been transforming houses into homes with our carefully curated collection of premium houseware products.</p>
                        
                        <div class="about-features mb-4">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="feature-item d-flex align-items-center">
                                        <div class="icon-box me-3 bg-success-subtle rounded-circle p-3 text-success">
                                            <i class="lni lni-checkmark-circle fs-4"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-1">Quality Assurance</h5>
                                            <p class="mb-0 small text-muted">Every product is tested for quality</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-item d-flex align-items-center">
                                        <div class="icon-box me-3 bg-warning-subtle rounded-circle p-3 text-warning">
                                            <i class="lni lni-delivery fs-4"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-1">Fast Delivery</h5>
                                            <p class="mb-0 small text-muted">Nationwide shipping available</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <p class="mb-4">We believe that beautiful, functional home goods should be accessible to everyone. Our team of expert curators travels the world to bring you the finest selection of kitchenware, furniture, decor, and more - all at competitive prices.</p>
                        
                        <div class="cta-buttons">
                            <a href="/shop" class="btn btn-primary btn-lg me-3 px-4 py-2">
                                <i class="lni lni-shopping-basket me-2"></i> Shop Now
                            </a>
                            <a href="/contact" class="btn btn-outline-secondary btn-lg px-4 py-2">
                                <i class="lni lni-phone me-2"></i> Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Area -->

    <!-- Start Stats Section -->
    <section class="stats-section py-5 my-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="stat-card bg-white p-4 rounded-4 shadow-sm h-100">
                        <div class="icon-circle mx-auto mb-3 bg-primary-subtle text-primary">
                            <i class="lni lni-users fs-3"></i>
                        </div>
                        @php
                        $customers = \App\Models\User::where('role', 'user')->count();
                        @endphp
                        <h2 class="counter fw-bold mb-2">{{ $customers }}</h2>
                        <p class="mb-0 text-muted">Happy Customers</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="stat-card bg-white p-4 rounded-4 shadow-sm h-100">
                        <div class="icon-circle mx-auto mb-3 bg-success-subtle text-success">
                            <i class="lni lni-package fs-3"></i>
                        </div>
                        @php
                        $products = \App\Models\Product::count();
                        @endphp
                        <h2 class="counter fw-bold mb-2">{{ $products }}</h2>
                        <p class="mb-0 text-muted">Products</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="stat-card bg-white p-4 rounded-4 shadow-sm h-100">
                        <div class="icon-circle mx-auto mb-3 bg-warning-subtle text-warning">
                            <i class="lni lni-star fs-3"></i>
                        </div>
                        @php
                        $reviews = \App\Models\Review::count();
                        @endphp
                        <h2 class="counter fw-bold mb-2">{{ $reviews }}</h2>
                        <p class="mb-0 text-muted">Average Rating</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="stat-card bg-white p-4 rounded-4 shadow-sm h-100">
                        <div class="icon-circle mx-auto mb-3 bg-danger-subtle text-danger">
                            <i class="lni lni-map-marker fs-3"></i>
                        </div>
                        @php
                        $shipping_zones = \App\Models\ShippingZone::count();
                        @endphp
                        <h2 class="counter fw-bold mb-2">{{ $shipping_zones }}</h2>
                        <p class="mb-0 text-muted">Shipping Zones</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Stats Section -->

    <!-- Start Values Section -->
    <section class="values-section section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <div class="section-tag mb-3">
                        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-normal">Our Values</span>
                    </div>
                    <h2 class="display-5 fw-bold mb-3">What Makes Us Different</h2>
                    <p class="lead text-muted mx-auto" style="max-width: 700px;">We're committed to providing exceptional products and service that transform your living spaces.</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="value-card bg-white p-4 rounded-4 shadow-sm h-100 position-relative overflow-hidden">
                        <div class="card-decoration position-absolute" style="width: 120px; height: 120px; background-color: rgba(var(--bs-primary-rgb), 0.1); border-radius: 50%; top: -30px; right: -30px;"></div>
                        <div class="icon-box mb-4 bg-primary-subtle text-primary rounded-3 p-3 d-inline-block">
                            <i class="lni lni-leaf fs-3"></i>
                        </div>
                        <h3 class="fw-bold mb-3">Sustainability</h3>
                        <p class="text-muted mb-0">We're committed to eco-friendly practices and sustainable sourcing for all our products.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="value-card bg-white p-4 rounded-4 shadow-sm h-100 position-relative overflow-hidden">
                        <div class="card-decoration position-absolute" style="width: 120px; height: 120px; background-color: rgba(var(--bs-success-rgb), 0.1); border-radius: 50%; top: -30px; right: -30px;"></div>
                        <div class="icon-box mb-4 bg-success-subtle text-success rounded-3 p-3 d-inline-block">
                            <i class="lni lni-invention fs-3"></i>
                        </div>
                        <h3 class="fw-bold mb-3">Innovation</h3>
                        <p class="text-muted mb-0">We constantly seek out the latest designs and technologies to enhance your home experience.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="value-card bg-white p-4 rounded-4 shadow-sm h-100 position-relative overflow-hidden">
                        <div class="card-decoration position-absolute" style="width: 120px; height: 120px; background-color: rgba(var(--bs-warning-rgb), 0.1); border-radius: 50%; top: -30px; right: -30px;"></div>
                        <div class="icon-box mb-4 bg-warning-subtle text-warning rounded-3 p-3 d-inline-block">
                            <i class="lni lni-customer fs-3"></i>
                        </div>
                        <h3 class="fw-bold mb-3">Customer Focus</h3>
                        <p class="text-muted mb-0">Your satisfaction is our priority, with dedicated support and hassle-free returns.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Values Section -->


    <!-- Start CTA Section -->
    <section class="cta-section py-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-card bg-primary text-white p-5 rounded-4 shadow position-relative overflow-hidden">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-7 col-12 mb-4 mb-md-0">
                                <h2 class="display-5 fw-bold mb-3">Ready to Transform Your Home?</h2>
                                <p class="lead mb-4">Join thousands of satisfied customers and discover our premium collection today.</p>
                                <div class="cta-buttons">
                                    <a href="{{ route('product.index') }}" class="btn btn-light btn-lg me-3 px-4">Shop Now</a>
                                    <a href="/contact" class="btn btn-outline-light btn-lg px-4">Contact Us</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 col-12 text-center text-md-end">
                                <img src="/placeholder.svg?height=200&width=200" alt="Home Decor" class="img-fluid rounded-circle cta-image" style="border: 5px solid rgba(255,255,255,0.3);">
                            </div>
                        </div>
                        <!-- Decorative elements -->
                        <div class="decoration-circle position-absolute" style="width: 300px; height: 300px; background-color: rgba(255,255,255,0.1); border-radius: 50%; bottom: -150px; right: -150px;"></div>
                        <div class="decoration-circle position-absolute" style="width: 200px; height: 200px; background-color: rgba(255,255,255,0.1); border-radius: 50%; top: -100px; left: -100px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End CTA Section -->
@endsection

@push('styles')
<style>
    /* Custom Styles for About Us Page */
    .icon-circle {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .secondary-img {
        max-width: 60%;
    }
    
    .rounded-4 {
        border-radius: 0.75rem !important;
    }
    
    .section-tag .badge {
        font-size: 0.9rem;
    }
    
    .counter {
        font-size: 2.5rem;
    }
    
    .testimonial-text {
        font-style: italic;
        position: relative;
    }
    
    .testimonial-text::before {
        content: '"';
        font-size: 3rem;
        position: absolute;
        top: -20px;
        left: -10px;
        opacity: 0.1;
    }
    
    /* Animation for elements */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translate3d(0, 30px, 0);
        }
        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }
    
    .about-us .content-left,
    .about-us .content-right,
    .values-section .value-card,
    .testimonials-section .testimonial-card,
    .stats-section .stat-card {
        animation: fadeInUp 0.5s ease-out;
    }
    
    /* Hover effects */
    .value-card:hover,
    .testimonial-card:hover,
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        transition: all 0.3s ease;
    }
    
    /* Custom colors */
    .bg-primary-subtle {
        background-color: rgba(var(--bs-primary-rgb), 0.1) !important;
    }
    
    .bg-success-subtle {
        background-color: rgba(var(--bs-success-rgb), 0.1) !important;
    }
    
    .bg-warning-subtle {
        background-color: rgba(var(--bs-warning-rgb), 0.1) !important;
    }
    
    .bg-danger-subtle {
        background-color: rgba(var(--bs-danger-rgb), 0.1) !important;
    }
    
    .text-primary {
        color: var(--bs-primary) !important;
    }
    
    .text-success {
        color: var(--bs-success) !important;
    }
    
    .text-warning {
        color: var(--bs-warning) !important;
    }
    
    .text-danger {
        color: var(--bs-danger) !important;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .counter {
            font-size: 2rem;
        }
        
        .secondary-img {
            display: none;
        }
    }
</style>
@endpush