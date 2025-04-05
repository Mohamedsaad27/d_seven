@extends('layouts.dashboard.layout')

@section('title', 'Show Product')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Product Details</h5>
                    <div>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm me-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                    <!-- Basic Information -->
                    @include('dashboard.product.partials.show-basic-info')

                    <!-- Product Images -->
                    @include('dashboard.product.partials.show-images')

                    <!-- Product Variations -->
                    @include('dashboard.product.partials.show-variations')

                    <!-- Inventory Status -->
                    @include('dashboard.product.partials.show-inventory')

                    <!-- Reviews -->
                    @include('dashboard.product.partials.show-reviews')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<style>
.product-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.thumbnail-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    cursor: pointer;
    border: 2px solid transparent;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.thumbnail-image:hover {
    transform: scale(1.05);
}

.thumbnail-image.active {
    border-color: #4CAF50;
}

.section-title {
    border-bottom: 2px solid #4CAF50;
    padding-bottom: 0.5rem;
    margin: 2rem 0 1rem;
    color: #2c3e50;
}

.info-label {
    font-weight: 600;
    color: #6c757d;
}

.status-badge {
    padding: 0.5em 1em;
    border-radius: 30px;
    font-weight: 500;
}

.review-card {
    border-left: 4px solid #4CAF50;
    margin-bottom: 1rem;
    padding: 1rem;
    background-color: #f8f9fa;
}

.star-rating {
    color: #ffc107;
}

.inventory-table th {
    background-color: #f8f9fa;
}

.variation-badge {
    padding: 0.5em 1em;
    border-radius: 4px;
    margin: 0.25rem;
    display: inline-block;
}
</style>
@endpush