@extends('layouts.website.master')
@section('title', trans('website.product_list'))
@section('content')

    <!-- Start Hero Section -->
    <div class="shop-hero bg-light">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="hero-content">
                        <h1 class="fw-bold mb-2">Discover Our Collection</h1>
                        <p class="text-muted">Find the perfect products that match your style</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-md-end mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none"><i class="lni lni-home me-1"></i>Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Start Product Grids -->
    <section class="product-section py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-12">
                    <!-- Start Product Sidebar -->
                    <div class="shop-sidebar rounded-3 shadow-sm">
                        <!-- Search Widget -->
                        <div class="sidebar-widget p-3 border-bottom">
                            <h5 class="fw-bold mb-3">Search Products</h5>
                            <div class="search-form">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="What are you looking for?">
                                    <button class="btn btn-primary" type="button"><i class="lni lni-search-alt"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- Categories Widget -->
                        <div class="sidebar-widget p-3 border-bottom">
                            <h5 class="fw-bold mb-3">Categories</h5>
                            <div class="category-list">
                                @foreach ($categories as $category)
                                <div class="category-item d-flex justify-content-between align-items-center mb-2">
                                    <a href="#{{ $category->name_en }}" class="text-decoration-none text-dark">{{ $category->name_en }}</a>
                                    <span class="badge bg-light text-dark rounded-pill">{{ $category->products()->count() }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Price Range Widget -->
                        <div class="sidebar-widget p-3 border-bottom">
                            <h5 class="fw-bold mb-3">Price Range</h5>
                            <div class="price-range-wrapper">
                                <div class="range-slider mb-3">
                                    <input type="range" class="form-range" min="0" max="10000" step="50" id="priceRange">
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="price-input">
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="text" class="form-control" id="minPrice" placeholder="0">
                                            <span class="input-group-text">-</span>
                                            <input type="text" class="form-control" id="maxPrice" placeholder="10000">
                                        </div>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary ms-2">Apply</button>
                                </div>
                            </div>
                        </div>

                        <!-- Filter by Brand -->
                        <div class="sidebar-widget p-3">
                            <h5 class="fw-bold mb-3">Brands</h5>
                            <div class="brand-filter">
                                @foreach ($brands as $brand)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="brand-{{ $brand->id }}">
                                    <label class="form-check-label d-flex justify-content-between w-100" for="brand-{{ $brand->id }}">
                                        {{ $brand->name_ar }}
                                        <span class="text-muted">({{ $brand->products()->count() }})</span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- End Product Sidebar -->
                </div>

                <div class="col-lg-9 col-12">
                    <!-- Product Top Controls -->
                    <div class="products-top-wrapper bg-white p-3 rounded-3 shadow-sm mb-4">
                        <div class="row align-items-center">
                            <div class="col-md-8 col-12 mb-3 mb-md-0">
                                <div class="d-flex align-items-center flex-wrap">
                                    <div class="me-4">
                                        <select class="form-select" id="sortingOptions">
                                            <option selected>Sort by: Popularity</option>
                                            <option>Price: Low to High</option>
                                            <option>Price: High to Low</option>
                                            <option>Rating: Highest</option>
                                            <option>Name: A to Z</option>
                                            <option>Name: Z to A</option>
                                        </select>
                                    </div>
                                    <p class="text-muted mb-0 small">Showing <span class="fw-bold">1-12</span> of <span class="fw-bold">{{ $products->total() ?? 'all' }}</span> products</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="d-flex justify-content-md-end">
                                    <div class="view-options btn-group" role="group">
                                        <button type="button" class="btn btn-outline-primary active" data-bs-target="#nav-grid" data-bs-toggle="tab">
                                            <i class="lni lni-grid-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-primary" data-bs-target="#nav-list" data-bs-toggle="tab">
                                            <i class="lni lni-list"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="tab-content">
                        <!-- Grid View -->
                        <div class="tab-pane fade show active" id="nav-grid">
                            <div class="row g-4">
                                @foreach($products as $product)
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="product-card rounded-3 overflow-hidden bg-white shadow-sm h-100">
                                        <div class="product-image position-relative">
                                            <span class="badge bg-primary position-absolute top-0 end-0 m-3">New</span>
                                            <img src="{{ $product->productImages()->first()->image_url ?? 'https://via.placeholder.com/335x335' }}" 
                                                 alt="{{ $product->name_ar }}" 
                                                 class="img-fluid w-100 product-img">
                                            <div class="product-action position-absolute bottom-0 start-0 w-100 p-3 d-flex gap-2 justify-content-center opacity-0">
                                                <button class="btn btn-sm btn-primary rounded-circle" data-bs-toggle="tooltip" title="Add to Cart">
                                                    <i class="lni lni-cart"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-light rounded-circle" data-bs-toggle="tooltip" title="Add to Wishlist">
                                                    <i class="lni lni-heart"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-light rounded-circle" data-bs-toggle="tooltip" title="Quick View">
                                                    <i class="lni lni-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product-info p-3">
                                            <div class="product-category mb-1">
                                                <span class="text-muted small">{{ $product->category->name_ar ?? 'Category' }}</span>
                                            </div>
                                            <h5 class="product-title mb-2">
                                                <a href="{{ route('product.show', $product->id) }}" class="text-dark text-decoration-none">{{ $product->name_ar }}</a>
                                            </h5>
                                            <div class="product-rating mb-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="ratings me-2">
                                                        <i class="lni lni-star-filled text-warning"></i>
                                                        <i class="lni lni-star-filled text-warning"></i>
                                                        <i class="lni lni-star-filled text-warning"></i>
                                                        <i class="lni lni-star-filled text-warning"></i>
                                                        <i class="lni lni-star text-warning"></i>
                                                    </div>
                                                    <span class="text-muted small">(4.0)</span>
                                                </div>
                                            </div>
                                            <div class="product-price d-flex justify-content-between align-items-center">
                                                <span class="new-price fw-bold text-primary">${{ number_format($product->price, 2) }}</span>
                                                <button class="btn btn-primary btn-sm add-to-cart">
                                                    <i class="lni lni-cart me-1"></i> Add
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- List View -->
                        <div class="tab-pane fade" id="nav-list">
                            <div class="row g-4">
                                @foreach($products as $product)
                                <div class="col-12">
                                    <div class="product-card-horizontal rounded-3 overflow-hidden bg-white shadow-sm">
                                        <div class="row g-0">
                                            <div class="col-md-4 position-relative">
                                                <span class="badge bg-primary position-absolute top-0 start-0 m-3">New</span>
                                                <img src="{{ $product->productImages()->first()->image_url ?? 'https://via.placeholder.com/335x335' }}" 
                                                     class="img-fluid h-100 object-fit-cover" 
                                                     alt="{{ $product->name_ar }}">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body d-flex flex-column h-100 p-4">
                                                    <div class="mb-1">
                                                        <span class="text-muted small">{{ $product->category->name_ar ?? 'Category' }}</span>
                                                    </div>
                                                    <h4 class="product-title mb-2">
                                                        <a href="{{ route('product.show', $product->id) }}" class="text-dark text-decoration-none">{{ $product->name_ar }}</a>
                                                    </h4>
                                                    <div class="product-rating mb-2">
                                                        <div class="d-flex align-items-center">
                                                            <div class="ratings me-2">
                                                                <i class="lni lni-star-filled text-warning"></i>
                                                                <i class="lni lni-star-filled text-warning"></i>
                                                                <i class="lni lni-star-filled text-warning"></i>
                                                                <i class="lni lni-star-filled text-warning"></i>
                                                                <i class="lni lni-star text-warning"></i>
                                                            </div>
                                                            <span class="text-muted small">(4.0)</span>
                                                        </div>
                                                    </div>
                                                    <p class="text-muted mb-4">{{ $product->description ?? 'No description available' }}</p>
                                                    <div class="mt-auto d-flex justify-content-between align-items-center">
                                                        <div class="product-price">
                                                            <span class="new-price fw-bold text-primary fs-4">${{ number_format($product->price, 2) }}</span>
                                                        </div>
                                                        <div class="product-actions d-flex gap-2">
                                                            <button class="btn btn-primary">
                                                                <i class="lni lni-cart me-1"></i> Add to Cart
                                                            </button>
                                                            <button class="btn btn-outline-secondary">
                                                                <i class="lni lni-heart"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-wrapper mt-5 d-flex justify-content-center">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Grids -->

    <!-- Custom CSS -->
    @push('styles')
    <style>
        /* Hero section styling */
        .shop-hero {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
        }

        /* Product card styling */
        .product-card {
            transition: all 0.3s ease;
            border: 1px solid #eee;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        }
        
        .product-card:hover .product-action {
            opacity: 1 !important;
            bottom: 10px;
        }
        
        .product-image {
            height: 220px;
            overflow: hidden;
            background-color: #f8f9fa;
        }
        
        .product-img {
            height: 100%;
            object-fit: cover;
            transition: all 0.5s ease;
        }
        
        .product-card:hover .product-img {
            transform: scale(1.05);
        }
        
        .product-action {
            transition: all 0.3s ease;
            background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 100%);
            bottom: -50px;
        }
        
        .product-title {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        
        /* Sidebar styling */
        .shop-sidebar {
            background-color: white;
            border: 1px solid #eee;
        }
        
        /* Specific UI element improvements */
        .sidebar-widget {
            transition: all 0.3s ease;
        }
        
        .sidebar-widget:hover {
            background-color: #f8f9fa;
        }
        
        .category-item:hover {
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        
        /* Fix for list view images */
        .object-fit-cover {
            object-fit: cover;
        }
        
        /* Improve form controls */
        .form-control:focus, .form-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        
        /* Additional responsive improvements */
        @media (max-width: 768px) {
            .product-image {
                height: 180px;
            }
        }
    </style>
    @endpush

    <!-- Custom JavaScript -->
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Price range slider
            const rangeInput = document.getElementById('priceRange');
            const minPriceInput = document.getElementById('minPrice');
            const maxPriceInput = document.getElementById('maxPrice');
            
            if(rangeInput && minPriceInput && maxPriceInput) {
                rangeInput.addEventListener('input', function() {
                    const value = this.value;
                    maxPriceInput.value = value;
                });
                
                // Additional price range logic can be added here
            }
            
            // View switching (grid/list)
            const viewButtons = document.querySelectorAll('.view-options .btn');
            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    viewButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
    @endpush
@endsection