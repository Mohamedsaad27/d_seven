@extends('layouts.dashboard.layout')
@section('title', 'Show Brand')

@section('content')
    @include('layouts.dashboard.breadcrumb',['component'=>'Show Brand'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Brand Details</h5>
                    <a href="{{ route('brand.index') }}" class="btn btn-secondary btn-sm">Back to Brands</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Brand Image -->
                        <div class="col-md-4 text-center">
                            <div class="brand-image-container mb-4">
                                <img src="{{ $brand->getImage($brand->image) }}" 
                                     alt="{{ $brand->name_en }}" 
                                     class="img-fluid rounded shadow-sm"
                                     style="max-height: 200px; object-fit: contain;">
                            </div>
                        </div>
                        
                        <!-- Brand Information -->
                        <div class="col-md-8">
                            <div class="brand-info">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h6 class="text-muted">English Name</h6>
                                        <p class="h5">{{ $brand->name_en }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted">Arabic Name</h6>
                                        <p class="h5">{{ $brand->name_ar }}</p>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <h6 class="text-muted">English Description</h6>
                                        <p>{{ $brand->description_en }}</p>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <h6 class="text-muted">Arabic Description</h6>
                                        <p>{{ $brand->description_ar }}</p>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="text-muted">Status</h6>
                                        <span class="badge bg-{{ $brand->is_active ? 'success' : 'danger' }}">
                                            {{ $brand->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted">Total Products</h6>
                                        <span class="badge bg-info">
                                            {{ $brand->products->count() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Brand Products</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name (EN)</th>
                                    <th>Name (AR)</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($brand->products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        @if($product->productImages->first())
                                        <img src="{{ asset($product->productImages->first()->image) }}" 
                                             alt="{{ $product->name_en }}"
                                             class="img-thumbnail"
                                             style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                        <span class="text-muted">No image</span>
                                        @endif
                                    </td>
                                    <td>{{ $product->name_en }}</td>
                                    <td>{{ $product->name_ar }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>
                                        <span class="badge bg-{{ $product->is_active ? 'success' : 'danger' }}">
                                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('product.show', $product->id) }}" 
                                           class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('product.edit', $product->id) }}" 
                                           class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No products found for this brand</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('styles')
<style>
    .brand-image-container {
        padding: 20px;
        background: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .brand-info {
        padding: 20px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    
    .card {
        border: none;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }
    
    .card-header {
        background-color: #fff;
        border-bottom: 1px solid rgba(0,0,0,0.125);
        padding: 1.5rem;
    }
    
    .table th {
        font-weight: 600;
        background-color: #f8f9fa;
    }
    
    .table td {
        vertical-align: middle;
    }
    
    .badge {
        padding: 0.5em 1em;
        font-weight: 500;
    }
    
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        margin: 0 2px;
    }
    
    .text-muted {
        color: #6c757d !important;
        font-size: 0.875rem;
    }
    
    .h5 {
        margin-bottom: 0.5rem;
        font-weight: 600;
    }
    </style>
@endpush