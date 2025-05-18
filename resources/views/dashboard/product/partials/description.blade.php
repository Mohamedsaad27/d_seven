<div class="row mb-4">
    <div class="col-12">
        <h6 class="section-title">Description</h6>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Description (English)</label>
        <textarea name="description_en" placeholder="Description (English)" rows="4" class="form-control @error('description_en') is-invalid @enderror" required>
            {{ old('description_en', $product->description_en ?? '') }}
        </textarea>
        @error('description_en')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Description (Arabic)</label>
        <textarea name="description_ar" placeholder="Description (Arabic)" rows="4" class="form-control @error('description_ar') is-invalid @enderror" required>
            {{ old('description_ar', $product->description_ar ?? '') }}
        </textarea>
        @error('description_ar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>