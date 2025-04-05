<div class="row">
    <div class="col-12">
        <h6 class="section-title">Basic Information</h6>
    </div>
    
    <div class="col-md-6">
        <div class="mb-4">
            <div class="row mb-3">
                <div class="col-md-6">
                    <span class="info-label">Name (English)</span>
                    <p class="h5">{{ $product->name_en }}</p>
                </div>
                <div class="col-md-6">
                    <span class="info-label">Name (Arabic)</span>
                    <p class="h5">{{ $product->name_ar }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <span class="info-label">Price</span>
                    <p class="h5">${{ number_format($product->price, 2) }}</p>
                </div>
                <div class="col-md-6">
                    <span class="info-label">Status</span>
                    <br>
                    <span class="badge bg-{{ $product->is_active ? 'success' : 'danger' }} status-badge">
                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <span class="info-label">Category</span>
                    <p>{{ $product->category->name_en }}</p>
                </div>
                <div class="col-md-6">
                    <span class="info-label">Brand</span>
                    <p>{{ $product->brand->name_en }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-4">
            <span class="info-label">Description (English)</span>
            <p>{{ $product->description_en }}</p>
            
            <span class="info-label">Description (Arabic)</span>
            <p>{{ $product->description_ar }}</p>
        </div>
    </div>
</div>