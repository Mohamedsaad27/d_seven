<div class="row mb-4">
    <div class="col-12">
        <h6 class="section-title">Basic Information</h6>
    </div>
    
    <div class="col-md-6 mb-3">
        <label class="form-label">Name (English)</label>
        <input type="text" placeholder="Name (English)" name="name_en" class="form-control @error('name_en') is-invalid @enderror" required>
        @error('name_en')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Name (Arabic)</label>
        <input type="text" placeholder="Name (Arabic)" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror" required>
        @error('name_ar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Price</label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="number" placeholder="Price" name="price" class="form-control @error('price') is-invalid @enderror" step="0.01" required>
        </div>
        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name_en }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Brand</label>
        <select name="brand_id" class="form-select @error('brand_id') is-invalid @enderror" required>
            <option value="">Select Brand</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name_en }}</option>
            @endforeach
        </select>
        @error('brand_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" id="isActive" value="1" checked>
            <label class="form-check-label" for="isActive">Active Status</label>
        </div>
    </div>
</div>