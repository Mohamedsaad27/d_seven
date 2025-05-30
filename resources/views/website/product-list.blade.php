@extends('layouts.website.master')
@section('title', 'Product List')
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
                        <!-- For Categories Widget -->
                            <div class="sidebar-widget p-3 border-bottom">
                                <h5 class="fw-bold mb-3">Categories</h5>
                                <div class="category-list">
                                    @foreach ($categories as $category)
                                    <div class="category-item d-flex justify-content-between align-items-center mb-2">
                                        <a href="#{{ $category->name_en }}" 
                                        class="text-decoration-none text-dark"
                                        data-category-id="{{ $category->id }}">
                                            {{ $category->name_ar ?  $category->name_ar : $category->name_en }}
                                        </a>
                                        <span class="badge bg-light text-dark rounded-pill">({{ $category->products()->count() }})</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- For Brands Widget -->
                            <div class="sidebar-widget p-3">
                                <h5 class="fw-bold mb-3">Brands</h5>
                                <div class="brand-filter">
                                    @foreach ($brands as $brand)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="brand-{{ $brand->id }}" data-brand-id="{{ $brand->id }}">
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
                                            <option selected value="popularity">Sort by: Popularity</option>
                                            <option value="price-asc">Price: Low to High</option>
                                            <option value="price-desc">Price: High to Low</option>
                                            <option value="name-asc">Name: A to Z</option>
                                            <option value="name-desc">Name: Z to A</option>
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
                        @if($product->created_at->isToday())
                        <span class="badge bg-primary position-absolute top-0 end-0 m-3">New</span>
                        @endif
                        @php
                            $firstImage = $product->productImages()->first();
                        @endphp

                        @if($firstImage && $firstImage->image_url)
                            <img src="{{ asset($firstImage->image_url ?? 'uploads/default-product-image.jpg') }}" 
                                alt="{{ $product->name_ar }}" 
                                class="img-fluid w-100 product-img">
                        @else
                            <img src="{{ asset('uploads/default-product-image.jpg') }}" 
                                alt="{{ $product->name_ar }}" 
                                class="img-fluid w-100 product-img">
                        @endif 
                        <div class="product-action position-absolute bottom-0 start-0 w-100 p-3 d-flex gap-2 justify-content-center opacity-0">
                            <button 
                                href="{{ route('cart.store', $product->id) }}"
                                class="btn btn-sm btn-outline-light rounded-circle add-to-cart " 
                                data-product-id="{{ $product->id }}" 
                                data-bs-toggle="tooltip" 
                                title="Add to Cart">
                                <i class="lni lni-cart"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-light rounded-circle" data-bs-toggle="tooltip" title="Add to Wishlist">
                                <i class="lni lni-heart"></i>
                            </button>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-outline-light rounded-circle" data-bs-toggle="tooltip" title="Quick View">
                                <i class="lni lni-eye"></i>
                            </a>
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
                                @php
                                    $rating = $product->calculateRating();
                                    $fullStars = floor($rating);
                                    $hasHalfStar = ($rating - $fullStars) >= 0.5;
                                @endphp
                                <div class="ratings me-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $fullStars)
                                            <i class="lni lni-star-filled text-warning"></i>
                                        @elseif ($hasHalfStar && $i == $fullStars + 1)
                                            <i class="lni lni-star-half text-warning"></i>
                                        @else
                                            <i class="lni lni-star text-warning"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-muted small">({{ number_format($rating, 1) }})</span>
                            </div>
                        </div>
                        <div class="product-price d-flex justify-content-between align-items-center">
                            <span class="new-price fw-bold text-primary">{{ number_format($product->price, 2) }} EGP</span>
                            <button 
                                href="{{ route('cart.store', $product->id) }}"
                                class="btn btn-primary btn-sm add-to-cart" 
                                data-product-id="{{ $product->id }}" 
                                data-bs-toggle="tooltip" 
                                title="Add to Cart">
                                <i class="lni lni-cart me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

  
</div>

                    <!-- Pagination -->
                    <div class="pagination-wrapper mt-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav aria-label="Product pagination" class="d-flex justify-content-center">
          <ul class="pagination pagination-modern">
            <!-- Previous Page Link -->
            @if ($products->onFirstPage())
              <li class="page-item disabled">
                <span class="page-link"><i class="lni lni-chevron-left"></i></span>
              </li>
            @else
              <li class="page-item">
                <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">
                  <i class="lni lni-chevron-left"></i>
                </a>
              </li>
            @endif

            <!-- Page Number Links -->
            @php
              $currentPage = $products->currentPage();
              $lastPage = $products->lastPage();
              
              // Calculate range of page numbers to display
              $startPage = max(1, $currentPage - 2);
              $endPage = min($lastPage, $currentPage + 2);
              
              // Show first page if not in range
              $showFirstPage = $startPage > 1;
              // Show last page if not in range
              $showLastPage = $endPage < $lastPage;
              // Show ellipsis after first page
              $showFirstEllipsis = $startPage > 2;
              // Show ellipsis before last page
              $showLastEllipsis = $endPage < $lastPage - 1;
            @endphp

            <!-- First Page Link -->
            @if ($showFirstPage)
              <li class="page-item">
                <a class="page-link" href="{{ $products->url(1) }}">1</a>
              </li>
              
              @if ($showFirstEllipsis)
                <li class="page-item disabled">
                  <span class="page-link page-ellipsis">...</span>
                </li>
              @endif
            @endif

            <!-- Page Range Links -->
            @for ($i = $startPage; $i <= $endPage; $i++)
              <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
              </li>
            @endfor

            <!-- Last Page Link -->
            @if ($showLastEllipsis)
              <li class="page-item disabled">
                <span class="page-link page-ellipsis">...</span>
              </li>
            @endif
            
            @if ($showLastPage)
              <li class="page-item">
                <a class="page-link" href="{{ $products->url($lastPage) }}">{{ $lastPage }}</a>
              </li>
            @endif

            <!-- Next Page Link -->
            @if ($products->hasMorePages())
              <li class="page-item">
                <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">
                  <i class="lni lni-chevron-right"></i>
                </a>
              </li>
            @else
              <li class="page-item disabled">
                <span class="page-link"><i class="lni lni-chevron-right"></i></span>
              </li>
            @endif
          </ul>
        </nav>
        
        <!-- Pagination Info -->
        <div class="pagination-info text-center mt-3">
          <p class="text-muted">
            Showing {{ $products->firstItem() ?? 0 }} to {{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- End Product Grids -->

    <!-- Custom CSS -->
    <div class="modal fade auth-modal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Visual Header with Kitchen Theme -->
                <div class="modal-visual-header">
                    <div class="kitchen-elements">
                        <i class="fas fa-utensils kitchen-icon"></i>
                        <i class="fas fa-cookie-bite kitchen-icon"></i>
                        <i class="fas fa-pepper-hot kitchen-icon"></i>
                        <i class="fas fa-coffee kitchen-icon"></i>
                        <i class="fas fa-blender kitchen-icon"></i>
                    </div>
                    <div class="brand-logo">
                        <div class="logo-icon">
                            <i class="fas fa-concierge-bell"></i>
                        </div>
                        <div class="brand-name" >  دي سيفن  </div>
                        <div class="brand-subtitle">كل أدوات الطبخ في مكان واحد</div>
                    </div>
                </div>

                <div class="modal-header">
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="w-100">
                        <h4 class="modal-title" id="loginModalLabel">مرحباً بك مرة أخرى</h4>
                        <p class="modal-subtitle">سجل دخولك للوصول إلى أفضل أدوات المطبخ وإضافة المنتجات إلى سلة التسوق</p>
                    </div>
                </div>
                
                <div class="modal-body">
                    <form id="loginForm" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <i class="fas fa-envelope"></i>
                            <input type="email" class="form-control" name="email" placeholder="البريد الإلكتروني" required>
                        </div>
                        
                        <div class="form-group">
                            <i class="fas fa-lock"></i>
                            <input type="password" class="form-control" name="password" placeholder="كلمة المرور" required>
                        </div>
                        
                        <div class="form-check text-start">
                            <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                            <label class="form-check-label" for="rememberMe">
                                تذكرني
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-login">
                            <span class="login-text">تسجيل الدخول</span>
                            <span class="login-spinner d-none">
                                <i class="spinner-border spinner-border-sm" role="status"></i>
                                جاري التسجيل...
                            </span>
                        </button>
                        
                        <div class="forgot-password">
                            <a href="#">نسيت كلمة المرور؟</a>
                        </div>
                    </form>
                    
                    <div class="divider">
                        <span>أو</span>
                    </div>
                    
                    <button class="btn btn-register" onclick="window.location.href='{{ route('register') }}'">
                        <i class="fas fa-user-plus me-2"></i>
                        إنشاء حساب جديد
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
                 
@push('styles')
    <link rel="stylesheet" href="{{ asset('website/css/product-list.css') }}">
    <style>
       .toast-message {
                font-family: 'Cairo', sans-serif; 
                font-size: 16px;
                text-align: right;
                padding-right: 10px;
            }
    </style>
    @endpush

    <!-- Custom JavaScript -->
    @push('scripts')
    <script src="{{ asset('website/js/product-list.js') }}"></script>
    @endpush