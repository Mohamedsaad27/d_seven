<div class="row g-4">
    <div class="col-md-6">
        <div class="info-card p-4 h-100">
            <h6 class="section-title">Product Information</h6>
            
            <div class="mb-4">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <span class="info-label">Name (English)</span>
                        <p class="h5 mb-0">{{ $product->name_en }}</p>
                    </div>
                    <div class="col-md-6">
                        <span class="info-label">Name (Arabic)</span>
                        <p class="h5 mb-0">{{ $product->name_ar }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <span class="info-label">Price</span>
                        <p class="h5 mb-0 text-primary">${{ number_format($product->price, 2) }}</p>
                    </div>
                    <div class="col-md-6">
                        <span class="info-label">Status</span>
                        <div>
                            <span class="badge bg-{{ $product->is_active ? 'success' : 'danger' }} status-badge">
                                {{ $product->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <span class="info-label">Category</span>
                        <p class="mb-0">{{ $product->category->name_en }}</p>
                    </div>
                    <div class="col-md-6">
                        <span class="info-label">Brand</span>
                        <p class="mb-0">{{ $product->brand->name_en }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="info-card p-4 h-100">
            <h6 class="section-title">Product Description</h6>
            
            <div class="mb-3">
                <span class="info-label">Description (English)</span>
                <div class="description-box p-3 bg-light rounded mb-3">
                    {{ $product->description_en }}
                </div>
            </div>
            
            <div>
                <span class="info-label">Description (Arabic)</span>
                <div class="description-box p-3 bg-light rounded">
                    {{ $product->description_ar }}
                </div>
            </div>
        </div>
    </div>
</div>