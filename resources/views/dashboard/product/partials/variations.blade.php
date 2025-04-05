<div class="row mb-4">
    <div class="col-12">
        <h6 class="section-title">Product Variations</h6>
    </div>

    <!-- Colors Section -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">Colors</h6>
                    <button type="button" class="btn btn-primary btn-sm" id="addColor">Add Color</button>
                </div>
                <div id="colorsContainer">
                    <div class="row color-row mb-3">
                        <div class="col-11">
                            <select name="colors[]" class="form-control" required>
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sizes Section -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">Sizes</h6>
                    <button type="button" class="btn btn-primary btn-sm" id="addSize">Add Size</button>
                </div>
                <div id="sizesContainer">
                    <div class="row size-row mb-3">
                        <div class="col-5">
                            <select name="sizes[]" class="form-control" required>
                                @foreach($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <input type="number" name="additional_prices[]" class="form-control" placeholder="Additional Price" step="0.01" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Dynamic fields management
        const addColorBtn = document.getElementById('addColor');
        const addSizeBtn = document.getElementById('addSize');
        const colorsContainer = document.getElementById('colorsContainer');
        const sizesContainer = document.getElementById('sizesContainer');
        
        // Add Color Field
        addColorBtn.addEventListener('click', function() {
            const colorField = `
                <div class="row color-row mb-3">
                    <div class="col-11">
                        <select name="colors[]" class="form-control" required>
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-danger btn-sm remove-field">×</button>
                    </div>
                </div>
            `;
            colorsContainer.insertAdjacentHTML('beforeend', colorField);
        });
    
        // Add Size Field
        addSizeBtn.addEventListener('click', function() {
            const sizeField = `
                <div class="row size-row mb-3">
                    <div class="col-5">
                        <select name="sizes[]" class="form-control" required>
                            @foreach($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->size }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <input type="number" name="additional_prices[]" class="form-control" placeholder="Additional Price" step="0.01" required>
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-danger btn-sm remove-field">×</button>
                    </div>
                </div>
            `;
            sizesContainer.insertAdjacentHTML('beforeend', sizeField);
        });
    
        // Remove Field
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-field')) {
                e.target.closest('.row').remove();
                updateInventoryTable();
            }
        });
    
        // Image Preview
        const imageInput = document.getElementById('productImages');
        const previewContainer = document.getElementById('imagePreview');
    
        imageInput.addEventListener('change', function() {
            previewContainer.innerHTML = '';
            [...this.files].forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = `
                        <div class="col-md-3 mb-3">
                            <img src="${e.target.result}" class="img-thumbnail" style="height: 150px; object-fit: cover;">
                        </div>
                    `;
                    previewContainer.insertAdjacentHTML('beforeend', preview);
                }
                reader.readAsDataURL(file);
            });
        });
    });
    </script>