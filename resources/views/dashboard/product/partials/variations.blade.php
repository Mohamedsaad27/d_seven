<div class="row mb-4">
    <div class="col-12">
        <h5 class="section-title mb-3 text-primary">
            <i class="fas fa-palette me-2"></i>Product Variations
        </h5>
    </div>

    <!-- Colors Section -->
    <div class="col-12 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h6 class="mb-0 fw-bold text-dark">
                            <i class="fas fa-tint me-2 text-primary"></i>Color Options
                        </h6>
                        <small class="text-muted">Add different color variations for this product</small>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm rounded-pill" id="addColor">
                        <i class="fas fa-plus me-1"></i> Add Color
                    </button>
                </div>
                
                <div id="colorsContainer" class="variation-container">
                    <div class="row color-row mb-3 align-items-center g-2">
                        <div class="col-md-11 col-10">
                            <select name="colors[]" class="form-select shadow-none" required>
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1 col-2 text-end">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-field rounded-circle">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .section-title {
        font-weight: 600;
        position: relative;
        padding-bottom: 10px;
    }
    .section-title:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 3px;
        background: linear-gradient(90deg, #0d6efd, rgba(13, 110, 253, 0.5));
        border-radius: 3px;
    }
    .variation-container {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 15px;
    }
    .form-select, .form-control {
        border: 1px solid #dee2e6;
        transition: all 0.3s;
    }
    .form-select:focus, .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    .btn-sm.rounded-circle {
        width: 28px;
        height: 28px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Dynamic fields management
        const addColorBtn = document.getElementById('addColor');
        const colorsContainer = document.getElementById('colorsContainer');
        
        // Add Color Field
        addColorBtn.addEventListener('click', function() {
            const colorField = `
                <div class="row color-row mb-3 align-items-center g-2">
                    <div class="col-md-11 col-10">
                        <select name="colors[]" class="form-select shadow-none" required>
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-1 col-2 text-end">
                        <button type="button" class="btn btn-outline-danger btn-sm remove-field rounded-circle">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            `;
            colorsContainer.insertAdjacentHTML('beforeend', colorField);
        });
    
        // Remove Field
        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-field')) {
                e.target.closest('.color-row').remove();
            }
        });
    
        // Image Preview
        const imageInput = document.getElementById('productImages');
        const previewContainer = document.getElementById('imagePreview');
    
        if (imageInput) {
            imageInput.addEventListener('change', function() {
                previewContainer.innerHTML = '';
                [...this.files].forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = `
                            <div class="col-md-3 mb-3">
                                <div class="position-relative">
                                    <img src="${e.target.result}" class="img-thumbnail rounded shadow-sm" style="height: 150px; width: 100%; object-fit: cover;">
                                    <button type="button" class="btn-close position-absolute top-0 end-0 m-1 bg-white rounded-circle p-1" style="font-size: 0.5rem;" aria-label="Remove"></button>
                                </div>
                            </div>
                        `;
                        previewContainer.insertAdjacentHTML('beforeend', preview);
                    }
                    reader.readAsDataURL(file);
                });
            });
        }
    });
</script>