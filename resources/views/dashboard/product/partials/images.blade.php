<div class="row mb-4">
    <div class="col-12">
        <h6 class="section-title">Product Images</h6>
    </div>

    <div class="col-12 mb-3">
        <label class="form-label">Upload Images</label>
        <input type="file" name="images[]" id="productImages" class="form-control @error('images') is-invalid @enderror" multiple accept="image/*" required>
        @error('images')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <small class="text-muted">You can select multiple images. First image will be set as primary.</small>
    </div>

    <div class="col-12">
        <div class="row" id="imagePreview"></div>
    </div>
</div>