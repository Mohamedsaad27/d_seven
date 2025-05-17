<div class="row">
    <div class="col-md-7 mb-4 mb-md-0">
        <div class="product-image-container">
            <img src="{{ asset($product->productImages->first()->image_url ?? 'uploads/default-product-image.jpg') }}" 
                 alt="{{ $product->name_en }}" 
                 class="product-image" 
                 id="mainImage">
        </div>
    </div>
    
    <div class="col-md-5">
        <h6 class="section-title">Gallery</h6>
        <p class="text-muted mb-3">Click on an image to view it in the main display</p>
        
        <div class="thumbnails-container">
            @foreach($product->productImages as $image)
            <div class="thumbnail-wrapper">
                <img src="{{ asset($image->image_url ?? 'uploads/default-product-image.jpg') }}" 
                     alt="{{ $product->name_en }}"
                     class="thumbnail-image {{ $loop->first ? 'active' : '' }}">
            </div>
            @endforeach
        </div>
        
        <div class="mt-4">
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <span class="badge bg-primary rounded-pill">{{ $product->productImages->count() }}</span>
                </div>
                <div class="text-muted">Total Images</div>
            </div>
        </div>
    </div>
</div>