@extends('layouts.dashboard.layout')

@section('title', 'Products')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Header -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">Products</h5>
                        <p class="text-sm mb-0">Manage your products inventory</p>
                    </div>
                    <div class="d-flex gap-2">
                        <div class="search-box">
                            <input type="text" 
                                   id="searchInput" 
                                   class="form-control form-control-sm" 
                                   placeholder="Search products...">
                        </div>
                        <a href="{{ route('products.create') }}" 
                           class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Product
                        </a>
                    </div>
                </div>

                <!-- Filters -->
                <div class="card-header border-bottom-0 pt-0">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select form-select-sm" id="categoryFilter">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Brand</label>
                            <select class="form-select form-select-sm" id="brandFilter">
                                <option value="">All Brands</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select form-select-sm" id="statusFilter">
                                <option value="">All Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Sort By</label>
                            <select class="form-select form-select-sm" id="sortBy">
                                <option value="newest">Newest First</option>
                                <option value="oldest">Oldest First</option>
                                <option value="price_high">Price: High to Low</option>
                                <option value="price_low">Price: Low to High</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="card-body px-0 pt-0">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Brand</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stock</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div>
                                                @if($product->productImages->first())
                                                    <img src="{{ asset($product->productImages->first()->image_url) }}" 
                                                         class="product-thumbnail" 
                                                         alt="{{ $product->name_en }}">
                                                @else
                                                    <div class="no-image">No Image</div>
                                                @endif
                                            </div>
                                            <div class="d-flex flex-column justify-content-center ms-3">
                                                <h6 class="mb-0 text-sm">{{ $product->name_en }}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ Str::limit($product->description_en, 50) }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $product->category->name_en }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $product->brand->name_en }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">${{ number_format($product->price, 2) }}</p>
                                    </td>
                                    <td>
                                        @php
                                            $totalStock = $product->inventory->sum('quantity');
                                        @endphp
                                        <span class="badge bg-{{ $totalStock > 10 ? 'success' : ($totalStock > 0 ? 'warning' : 'danger') }}">
                                            {{ $totalStock }} in stock
                                        </span>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input type="checkbox" 
                                                   class="form-check-input status-toggle" 
                                                   data-product-id="{{ $product->id }}"
                                                   {{ $product->is_active ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('products.show', $product->id) }}" 
                                               class="btn btn-info btn-sm" 
                                               title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('products.edit', $product->id) }}" 
                                               class="btn btn-primary btn-sm" 
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" 
                                                    class="btn btn-danger btn-sm delete-product" 
                                                    data-product-id="{{ $product->id }}"
                                                    title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <div class="empty-state">
                                            <i class="fas fa-box fa-3x mb-3"></i>
                                            <h6>No Products Found</h6>
                                            <p class="text-muted">Start by adding your first product</p>
                                            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
                                                Add Product
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center justify-content-md-end px-3 py-3">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this product? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<style>
.card {
    border: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #fff;
    padding: 1.5rem;
}

.product-thumbnail {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 8px;
}

.no-image {
    width: 50px;
    height: 50px;
    background: #f8f9fa;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    color: #6c757d;
}

.search-box {
    min-width: 200px;
}

.empty-state {
    text-align: center;
    padding: 2rem;
    color: #6c757d;
}

.form-switch .form-check-input {
    width: 2.5em;
}

.form-check-input:checked {
    background-color: #4CAF50;
    border-color: #4CAF50;
}

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
}

.table > :not(caption) > * > * {
    padding: 1rem 0.5rem;
}

.badge {
    font-weight: 500;
    padding: 0.5em 0.75em;
}
</style>
@endpush
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Delete Product
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const deleteForm = document.getElementById('deleteForm');
    
    document.querySelectorAll('.delete-product').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            deleteForm.action = `/admin/products/${productId}`;
            deleteModal.show();
        });
    });

    // Status Toggle
    document.querySelectorAll('.status-toggle').forEach(toggle => {
        toggle.addEventListener('change', async function() {
            const productId = this.dataset.productId;
            try {
                const response = await fetch(`/admin/products/${productId}/toggle-status`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
                
                if (!response.ok) throw new Error('Failed to update status');
                
                const toast = new bootstrap.Toast(document.createElement('div'));
                toast.show();
            } catch (error) {
                console.error('Error:', error);
                this.checked = !this.checked;
            }
        });
    });

    // Filters
    const filters = ['category', 'brand', 'status', 'sort'];
    filters.forEach(filter => {
        document.getElementById(`${filter}Filter`)?.addEventListener('change', applyFilters);
    });

    // Search
    let searchTimeout;
    document.getElementById('searchInput')?.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(applyFilters, 500);
    });

    function applyFilters() {
        const searchQuery = document.getElementById('searchInput')?.value;
        const categoryId = document.getElementById('categoryFilter')?.value;
        const brandId = document.getElementById('brandFilter')?.value;
        const status = document.getElementById('statusFilter')?.value;
        const sortBy = document.getElementById('sortBy')?.value;

        const params = new URLSearchParams(window.location.search);
        
        if (searchQuery) params.set('search', searchQuery);
        if (categoryId) params.set('category', categoryId);
        if (brandId) params.set('brand', brandId);
        if (status) params.set('status', status);
        if (sortBy) params.set('sort', sortBy);

        window.location.search = params.toString();
    }
});
</script>
@endpush
