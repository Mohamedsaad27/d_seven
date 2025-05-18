<div class="row mb-4">
    <div class="col-12">
        <h6 class="section-title">Product Images</h6>
    </div>

    @if(isset($product) && $product->productImages->count() > 0)
    <div class="col-12 mb-3">
        <label class="form-label">Current Images</label>
        <div class="row existing-images">
            @foreach($product->productImages as $image)
            <div class="col-md-2 col-sm-3 col-6 mb-3 existing-image-container" data-image-id="{{ $image->id }}">
                <div class="image-card position-relative">
                    <img src="{{ asset($image->image_url) }}" class="img-fluid rounded" alt="Product Image">
                    <div class="image-actions">
                        @if($image->is_primary)
                            <span class="badge bg-success position-absolute" style="top: 10px; left: 10px;">Primary</span>
                        @else
                            <button type="button" class="btn btn-sm btn-primary set-primary-btn position-absolute" 
                                style="top: 10px; left: 10px;" data-image-id="{{ $image->id }}">
                                Set Primary
                            </button>
                        @endif
                        <button type="button" class="btn btn-danger btn-sm position-absolute delete-image-btn" 
                            style="top: 10px; right: 10px;" data-image-id="{{ $image->id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <input type="hidden" name="existing_images[]" value="{{ $image->id }}">
                    <input type="hidden" name="is_primary" value="{{ $image->is_primary ? $image->id : '' }}">
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <div class="col-12 mb-3">
        <label class="form-label">{{ isset($product) ? 'Upload Additional Images' : 'Upload Images' }}</label>
        <input type="file" name="images[]" id="productImages" class="form-control @error('images') is-invalid @enderror" 
            multiple accept="image/*" {{ isset($product) ? '' : 'required' }}>
        @error('images')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <small class="text-muted">
            You can select multiple images. 
            {{ !isset($product) || $product->productImages->count() == 0 ? 'First image will be set as primary.' : '' }}
        </small>
    </div>

    <div class="col-12">
        <div class="row" id="imagePreview"></div>
    </div>
</div>