@extends('layouts.dashboard.layout')

@section('title', 'Show Product')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold">Product Details</h5>
                    <div>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-light btn-sm me-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('products.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                
                <div class="card-body p-0">
                    <div class="product-header p-4 bg-light">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3 class="product-title mb-1">{{ $product->name_en }}</h3>
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <span class="badge bg-{{ $product->is_active ? 'success' : 'danger' }} status-badge">
                                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                    <span class="text-muted">|</span>
                                    <span class="text-primary font-weight-bold">${{ number_format($product->price, 2) }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <div class="product-meta">
                                    <div class="mb-1"><span class="text-muted">Category:</span> <span class="fw-medium">{{ $product->category->name_en }}</span></div>
                                    <div><span class="text-muted">Brand:</span> <span class="fw-medium">{{ $product->brand->name_en }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4">
                        <ul class="nav nav-tabs nav-fill" id="productTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="true">
                                    <i class="fas fa-info-circle me-2"></i>Details
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="images-tab" data-bs-toggle="tab" data-bs-target="#images" type="button" role="tab" aria-controls="images" aria-selected="false">
                                    <i class="fas fa-images me-2"></i>Images
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="variations-tab" data-bs-toggle="tab" data-bs-target="#variations" type="button" role="tab" aria-controls="variations" aria-selected="false">
                                    <i class="fas fa-tags me-2"></i>Variations
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="inventory-tab" data-bs-toggle="tab" data-bs-target="#inventory" type="button" role="tab" aria-controls="inventory" aria-selected="false">
                                    <i class="fas fa-boxes me-2"></i>Inventory
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">
                                    <i class="fas fa-star me-2"></i>Reviews
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content p-4" id="productTabsContent">
                            <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                                @include('dashboard.product.partials.show-basic-info')
                            </div>
                            <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                @include('dashboard.product.partials.show-images')
                            </div>
                            <div class="tab-pane fade" id="variations" role="tabpanel" aria-labelledby="variations-tab">
                                @include('dashboard.product.partials.show-variations')
                            </div>
                            <div class="tab-pane fade" id="inventory" role="tabpanel" aria-labelledby="inventory-tab">
                                @include('dashboard.product.partials.show-inventory')
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                @include('dashboard.product.partials.show-reviews')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
:root {
    --primary-color: #4361ee;
    --secondary-color: #3f37c9;
    --success-color: #4CAF50;
    --danger-color: #f72585;
    --warning-color: #ff9e00;
    --info-color: #4cc9f0;
    --light-color: #f8f9fa;
    --dark-color: #212529;
    --border-radius: 0.5rem;
    --box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    --transition: all 0.3s ease;
}

/* Card styling */
.card {
    border-radius: var(--border-radius);
    overflow: hidden;
    transition: var(--transition);
}

.card:hover {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.card-header {
    padding: 1rem 1.5rem;
}

.bg-gradient-primary {
    background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
}

/* Product header */
.product-header {
    border-bottom: 1px solid rgba(0,0,0,0.1);
}

.product-title {
    font-weight: 700;
    color: var(--dark-color);
}

/* Tabs styling */
.nav-tabs {
    border-bottom: 1px solid rgba(0,0,0,0.1);
}

.nav-tabs .nav-link {
    color: var(--dark-color);
    border: none;
    padding: 1rem 1.5rem;
    font-weight: 500;
    transition: var(--transition);
}

.nav-tabs .nav-link:hover {
    color: var(--primary-color);
    border-color: transparent;
}

.nav-tabs .nav-link.active {
    color: var(--primary-color);
    background-color: transparent;
    border-bottom: 3px solid var(--primary-color);
}

/* Status badges */
.status-badge {
    padding: 0.5em 1em;
    border-radius: 30px;
    font-weight: 500;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Product images */
.product-image-container {
    position: relative;
    overflow: hidden;
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
}

.product-image {
    width: 100%;
    height: 350px;
    object-fit: contain;
    background-color: #f8f9fa;
    transition: var(--transition);
}

.thumbnails-container {
    display: flex;
    gap: 0.5rem;
    margin-top: 1rem;
    flex-wrap: wrap;
}

.thumbnail-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    cursor: pointer;
    border: 2px solid transparent;
    border-radius: var(--border-radius);
    transition: var(--transition);
}

.thumbnail-image:hover {
    transform: scale(1.05);
}

.thumbnail-image.active {
    border-color: var(--primary-color);
}

/* Section styling */
.section-title {
    position: relative;
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 1.5rem;
    padding-bottom: 0.75rem;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 3px;
    background-color: var(--primary-color);
}

/* Info labels */
.info-label {
    font-weight: 600;
    color: #6c757d;
    display: block;
    margin-bottom: 0.25rem;
}

/* Variations */
.variations-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 1rem;
}

.variation-card {
    background-color: var(--light-color);
    border-radius: var(--border-radius);
    padding: 1.5rem;
    transition: var(--transition);
}

.variation-card:hover {
    box-shadow: var(--box-shadow);
}

.variation-badge {
    padding: 0.5em 1em;
    border-radius: 4px;
    margin: 0.25rem;
    display: inline-block;
    background-color: rgba(0,0,0,0.05);
    transition: var(--transition);
}

.variation-badge:hover {
    background-color: rgba(0,0,0,0.1);
}

/* Inventory table */
.inventory-table {
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
    border-radius: var(--border-radius);
    overflow: hidden;
}

.inventory-table th {
    background-color: rgba(0,0,0,0.03);
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.75rem;
    letter-spacing: 0.5px;
}

.inventory-table th,
.inventory-table td {
    padding: 1rem;
    border: 1px solid rgba(0,0,0,0.05);
}

/* Reviews */
.reviews-container {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 1.5rem;
}

.review-summary {
    background-color: var(--light-color);
    border-radius: var(--border-radius);
    padding: 1.5rem;
    text-align: center;
}

.review-rating {
    font-size: 3rem;
    font-weight: 700;
    color: var(--dark-color);
}

.star-rating {
    color: #ffc107;
    font-size: 1.25rem;
    margin: 0.5rem 0;
}

.review-card {
    border-left: 4px solid var(--primary-color);
    margin-bottom: 1rem;
    padding: 1.25rem;
    background-color: var(--light-color);
    border-radius: 0 var(--border-radius) var(--border-radius) 0;
    transition: var(--transition);
}

.review-card:hover {
    box-shadow: var(--box-shadow);
}

.review-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.75rem;
}

.review-author {
    font-weight: 600;
}

.review-date {
    color: #6c757d;
    font-size: 0.875rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .reviews-container {
        grid-template-columns: 1fr;
    }
    
    .nav-tabs .nav-link {
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
    }
    
    .product-image {
        height: 250px;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap tabs
    var triggerTabList = [].slice.call(document.querySelectorAll('#productTabs button'))
    triggerTabList.forEach(function (triggerEl) {
        var tabTrigger = new bootstrap.Tab(triggerEl)
        triggerEl.addEventListener('click', function (event) {
            event.preventDefault()
            tabTrigger.show()
        })
    })
    
    // Image gallery functionality
    const mainImage = document.getElementById('mainImage');
    const thumbnails = document.querySelectorAll('.thumbnail-image');
    
    if (mainImage && thumbnails.length > 0) {
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                // Update main image
                mainImage.src = this.src;
                mainImage.classList.add('fade-in');
                setTimeout(() => {
                    mainImage.classList.remove('fade-in');
                }, 300);
                
                // Update active state
                thumbnails.forEach(thumb => {
                    thumb.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
    }
});
</script>
@endpush