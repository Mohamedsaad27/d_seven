@extends('layouts.dashboard.layout')
@section('title', 'Discounts')

@section('content')
    @include('layouts.dashboard.breadcrumb', ['component' => 'Discounts'])
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
    <div class="container-fluid px-4">
        <!-- Header Section -->
        <div class="d-flex align-items-center mb-4">
    <h2 class="h3 text-gray-800 mb-0">Discounts</h2>
    <div class="ms-auto d-flex gap-2">
        <a href="{{ route('discounts.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Discount
        </a>
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#assignProductsModal">
            <i class="fas fa-link me-2"></i>Assign Products to Discount
        </button>
    </div>
</div>

<!-- Assign Products Modal -->
<div class="modal fade" id="assignProductsModal" tabindex="-1" aria-labelledby="assignProductsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignProductsModalLabel">Assign Products to Discount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('discounts.assignProducts') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="discount_id" class="form-label">Select Discount</label>
                        <select class="form-select" id="discount_id" name="discount_id" required>
                            <option value="">Choose a discount...</option>
                            @foreach($discounts as $discount)
                                <option value="{{ $discount->id }}">
                                    {{ $discount->name }} 
                                    ({{ ucfirst($discount->discount_type) }}: 
                                    {{ $discount->discount_type == 'percent' ? $discount->discount_amount . '%' : '$' . number_format($discount->discount_amount, 2) }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Select Products</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-light border-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" class="form-control border-0 bg-light" id="productSearch" name="search"
                                placeholder="Search products">
                        </div>
                        
                        <div class="product-selection-container border rounded p-3" style="max-height: 300px; overflow-y: auto;">
                            <div class="d-flex justify-content-between mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAllProducts">
                                    <label class="form-check-label fw-bold" for="selectAllProducts">
                                        Select All
                                    </label>
                                </div>
                                <span class="text-muted small">Selected: <span id="selectedCount">0</span></span>
                            </div>
                            
                            <div id="productsContainer">
                                @foreach($products as $product)
                                    <div class="form-check product-item mb-2">
                                        <input class="form-check-input product-checkbox" type="checkbox" 
                                            name="product_ids[]" value="{{ $product->id }}" id="product{{ $product->id }}">
                                        <label class="form-check-label d-flex justify-content-between" for="product{{ $product->id }}">
                                            @if($product->name_ar)
                                                <div>{{ $product->name_ar }}</div>
                                            @else
                                                <div>{{ $product->name_en }}</div>
                                            @endif
                                            <div class="text-muted">${{ number_format($product->price, 2) }}</div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Assign Products</button>
                </div>
            </form>
        </div>
    </div>
</div>

        <!-- Main Card -->
        <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
            <div class="card-header bg-white py-3">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" class="form-control border-0 bg-light"
                                placeholder="Search Discounts">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4 py-3 text-muted">#</th>
                                <th class="px-4 py-3 text-muted">Name</th>
                                <th class="px-4 py-3 text-muted">Type</th>
                                <th class="px-4 py-3 text-muted">Amount</th>
                                <th class="px-4 py-3 text-muted">Validity</th>
                                <th class="px-4 py-3 text-muted">Status</th>
                                <th class="px-4 py-3 text-muted">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($discounts as $discount)
                                <tr>
                                    <td class="px-4">
                                        <span class="text-primary fw-medium">{{ $discount->id }}</span>
                                    </td>
                                    <td class="px-4">
                                        <div class="d-flex flex-column">
                                            <span class="text-dark">
                                                {{ $discount->name ?? 'N/A' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-4">
                                        <span class="badge bg-info">
                                            {{ ucfirst($discount->discount_type) }}
                                        </span>
                                    </td>
                                    <td class="px-4">
                                        @if($discount->discount_type == 'percent')
                                            <span class="fw-medium">{{ $discount->discount_amount }}%</span>
                                        @else
                                            <span class="fw-medium">${{ number_format($discount->discount_amount, 2) }}</span>
                                        @endif
                                    </td>
                                    <td class="px-4">
                                        <div class="small text-muted">
                                            <div>From: {{ $discount->starts_at->format('M d, Y') }}</div>
                                            <div>To: {{ $discount->ends_at->format('M d, Y') }}</div>
                                        </div>
                                    </td>
                                    <td class="px-4">
                                        <span class="badge bg-{{ $discount->is_active ? 'success' : 'danger' }}">
                                            {{ $discount->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="px-4">
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('discounts.edit', $discount->id) }}"
                                                class="btn btn-sm btn-light-primary" data-bs-toggle="tooltip"
                                                title="Edit Discount">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-light-primary"
                                                data-bs-toggle="modal" data-bs-target="#showAssignedProductsModal{{ $discount->id }}"
                                                title="Show Assigned Products">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $discount->id }}"
                                                title="Delete Discount">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>  
                                    
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $discount->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Delete Discount</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this discount?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('discounts.destroy', $discount->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No discounts found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @foreach($discounts as $discount)
<div class="modal fade" id="showAssignedProductsModal{{ $discount->id }}" tabindex="-1" 
    aria-labelledby="showAssignedProductsModalLabel{{ $discount->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showAssignedProductsModalLabel{{ $discount->id }}">
                    Products Assigned to: {{ $discount->name }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if($discount->products->count() > 0)
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" class="form-control border-0 bg-light product-search" 
                                placeholder="Search assigned products">
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="py-2">#</th>
                                    <th class="py-2">Product Name</th>
                                    <th class="py-2">Original Price</th>
                                    <th class="py-2">Discounted Price</th>
                                    <th class="py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="product-list">
                                @foreach($discount->products as $product)
                                    <tr class="product-item">
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($product->image)
                                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name_en }}" 
                                                        class="rounded me-3" width="40">
                                                @else
                                                    <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" 
                                                        style="width:40px;height:40px">
                                                        <i class="fas fa-box text-muted"></i>
                                                    </div>
                                                @endif
                                                <div>
                                                    @if($product->name_ar)
                                                        <div class="text-dark fw-medium">{{ $product->name_ar }}</div>
                                                    @else
                                                        <div class="text-dark fw-medium">{{ $product->name_en }}</div>
                                                    @endif
                                                    <div class="small text-muted">SKU: {{ $product->sku ?? 'N/A' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>${{ number_format($product->price, 2) }}</td>
                                        <td>
                                            @if($discount->discount_type == 'percent')
                                                ${{ number_format($product->price * (1 - $discount->discount_amount / 100), 2) }}
                                                <div class="small text-success">Save: {{ $discount->discount_amount }}%</div>
                                            @else
                                                ${{ number_format(max($product->price - $discount->discount_amount, 0), 2) }}
                                                <div class="small text-success">Save: ${{ number_format($discount->discount_amount, 2) }}</div>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('discounts.removeProduct') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="discount_id" value="{{ $discount->id }}">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit" class="btn btn-sm btn-light-danger" 
                                                    onclick="return confirm('Remove this product from the discount?')">
                                                    <i class="fas fa-unlink"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <div class="mb-3">
                            <i class="fas fa-box-open fa-3x text-muted"></i>
                        </div>
                        <h5 class="text-muted">No products assigned to this discount</h5>
                        <p class="mb-0">You can assign products using the "Assign Products to Discount" button above.</p>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignProductsModal">
                    Assign More Products
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach
    <!-- Add required CSS -->
    @push('styles')
        <style>
            .btn-light-primary {
                color: #556ee6;
                background-color: rgba(85, 110, 230, 0.1);
                border-color: transparent;
            }

            .btn-light-primary:hover {
                color: #fff;
                background-color: #556ee6;
            }

            .btn-light-danger {
                color: #f46a6a;
                background-color: rgba(244, 106, 106, 0.1);
                border-color: transparent;
            }

            .btn-light-danger:hover {
                color: #fff;
                background-color: #f46a6a;
            }

            .avatar-sm {
                width: 40px;
                height: 40px;
            }

            .table> :not(caption)>*>* {
                padding: 1rem 0.75rem;
            }

            .modal-content {
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            }
        </style>
    @endpush
    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add event listeners for each product search input
        document.querySelectorAll('.product-search').forEach(function(input) {
            input.addEventListener('keyup', function() {
                const searchTerm = this.value.toLowerCase();
                const productList = this.closest('.modal-body').querySelector('.product-list');
                
                if (productList) {
                    const products = productList.querySelectorAll('.product-item');
                    
                    products.forEach(function(product) {
                        const text = product.textContent.toLowerCase();
                        if (text.includes(searchTerm)) {
                            product.style.display = '';
                        } else {
                            product.style.display = 'none';
                        }
                    });
                }
            });
        });
        
        // Add event listener for Assign Products modal
        const productSearch = document.getElementById('productSearch');
        if (productSearch) {
            productSearch.addEventListener('keyup', function() {
                const searchTerm = this.value.toLowerCase();
                const productItems = document.querySelectorAll('#productsContainer .product-item');
                
                productItems.forEach(function(item) {
                    const text = item.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        }
        
        // Select all products functionality
        const selectAllCheckbox = document.getElementById('selectAllProducts');
        if (selectAllCheckbox) {
            selectAllCheckbox.addEventListener('change', function() {
                const productCheckboxes = document.querySelectorAll('.product-checkbox');
                productCheckboxes.forEach(function(checkbox) {
                    // Only select visible products
                    if (checkbox.closest('.product-item').style.display !== 'none') {
                        checkbox.checked = selectAllCheckbox.checked;
                    }
                });
                updateSelectedCount();
            });
        }
        
        // Update selected count
        const productCheckboxes = document.querySelectorAll('.product-checkbox');
        productCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', updateSelectedCount);
        });
        
        function updateSelectedCount() {
            const selectedCount = document.querySelectorAll('.product-checkbox:checked').length;
            const countElement = document.getElementById('selectedCount');
            if (countElement) {
                countElement.textContent = selectedCount;
            }
        }
    });
    // Wait for the document to be ready
document.addEventListener('DOMContentLoaded', function() {
    const productSearch = document.getElementById('productSearch');
    const productsContainer = document.getElementById('productsContainer');
    const selectAllCheckbox = document.getElementById('selectAllProducts');
    const selectedCountElement = document.getElementById('selectedCount');
    
    // Handle search input with debounce
    let searchTimeout;
    productSearch.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            const searchTerm = productSearch.value.trim();
            
            // If search is empty, reload all products
            if (searchTerm === '') {
                loadAllProducts();
                return;
            }
            
            // Perform AJAX search
            fetch(`/search-on-products?search=${encodeURIComponent(searchTerm)}`)
                .then(response => response.json())
                .then(products => {
                    updateProductsDisplay(products);
                })
                .catch(error => {
                    console.error('Error searching products:', error);
                });
        }, 300); // Debounce for 300ms
    });
    
    // "Select All" functionality
    selectAllCheckbox.addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.product-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
        updateSelectedCount();
    });
    
    // Function to update products displayed in the container
    function updateProductsDisplay(products) {
        // Clear the container
        productsContainer.innerHTML = '';
        
        if (products.length === 0) {
            productsContainer.innerHTML = '<p class="text-center text-muted">No products found</p>';
            return;
        }
        
        // Add each product to the container
        products.forEach(product => {
            const productElement = document.createElement('div');
            productElement.className = 'form-check product-item mb-2';
            
            const productName = product.name_ar || product.name_en;
            const formattedPrice = new Intl.NumberFormat('en-US', { 
                style: 'currency', 
                currency: 'USD' 
            }).format(product.price);
            
            productElement.innerHTML = `
                <input class="form-check-input product-checkbox" type="checkbox" 
                    name="product_ids[]" value="${product.id}" id="product${product.id}">
                <label class="form-check-label d-flex justify-content-between" for="product${product.id}">
                    <div>${productName}</div>
                    <div class="text-muted">${formattedPrice}</div>
                </label>
            `;
            
            productsContainer.appendChild(productElement);
        });
        
        // Add event listeners to the new checkboxes
        attachCheckboxListeners();
    }
    
    // Function to fetch all products (when search is cleared)
    function loadAllProducts() {
        // This assumes the initial page load has all products
        // If you need to reload them, you should make an AJAX call here instead
        // For now, we'll just reset the visibility
        const allProducts = document.querySelectorAll('.product-item');
        allProducts.forEach(product => {
            product.style.display = 'block';
        });
    }
    
    // Function to attach checkbox event listeners for counting selected items
    function attachCheckboxListeners() {
        const checkboxes = document.querySelectorAll('.product-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateSelectedCount);
        });
    }
    
    // Function to update the selected count
    function updateSelectedCount() {
        const checkedCount = document.querySelectorAll('.product-checkbox:checked').length;
        selectedCountElement.textContent = checkedCount;
    }
    
    // Initial setup: attach listeners to existing checkboxes
    attachCheckboxListeners();
});
</script>
    @endpush
@endsection