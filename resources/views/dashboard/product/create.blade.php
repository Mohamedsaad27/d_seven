@extends('layouts.dashboard.layout')

@section('title', 'Create Product')

@section('content')
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
@include('layouts.dashboard.breadcrumb', ['component' => 'Create Product'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create New Product</h5>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary btn-sm">Back to Products</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" id="createProductForm">
                        @csrf
                        
                        <!-- Basic Information -->
                        @include('dashboard.product.partials.basic-info')

                        <!-- Description -->
                        @include('dashboard.product.partials.description')

                        <!-- Images -->
                        @include('dashboard.product.partials.images')

                        <!-- Colors and Sizes -->
                        @include('dashboard.product.partials.variations')

                        <!-- Inventory -->
                        @include('dashboard.product.partials.inventory')

                        <div class="row mt-4">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Create Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    // Add this JavaScript to your create product page

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('createProductForm');
    
    // Validation configuration
    const validationRules = {
        'name_en': {
            required: true,
            minLength: 2,
            maxLength: 255,
            pattern: /^[a-zA-Z0-9\s\-\_\.\,\(\)]+$/,
            message: 'English name must contain only letters, numbers, and common punctuation'
        },
        'name_ar': {
            required: true,
            minLength: 2,
            maxLength: 255,
            pattern: /^[\u0600-\u06FF\s\-\_\.\,\(\)0-9]+$/,
            message: 'Arabic name must contain only Arabic characters, numbers, and common punctuation'
        },
        'description_en': {
            required: true,
            minLength: 10,
            maxLength: 5000,
            message: 'English description must be between 10-5000 characters'
        },
        'description_ar': {
            required: true,
            minLength: 10,
            maxLength: 5000,
            message: 'Arabic description must be between 10-5000 characters'
        },
        'price': {
            required: true,
            min: 0.01,
            max: 999999.99,
            pattern: /^\d+(\.\d{1,2})?$/,
            message: 'Price must be a valid amount with maximum 2 decimal places'
        },
        'category_id': {
            required: true,
            message: 'Please select a category'
        },
        'brand_id': {
            required: true,
            message: 'Please select a brand'
        }
    };

    // Real-time validation for form fields
    Object.keys(validationRules).forEach(fieldName => {
        const field = form.querySelector(`[name="${fieldName}"]`);
        if (field) {
            field.addEventListener('blur', () => validateField(field, validationRules[fieldName]));
            field.addEventListener('input', () => clearFieldError(field));
        }
    });

    // Image validation
    const imageInput = document.getElementById('productImages');
    if (imageInput) {
        imageInput.addEventListener('change', validateImages);
    }

    // Colors validation
    document.addEventListener('click', function(e) {
        if (e.target.closest('#addColor')) {
            setTimeout(validateColors, 100); // Delay to allow DOM update
        }
        if (e.target.closest('.remove-field')) {
            setTimeout(validateColors, 100);
        }
    });

    // Inventory validation
    document.addEventListener('click', function(e) {
        if (e.target.closest('#addInventoryRow')) {
            setTimeout(validateInventory, 100);
        }
        if (e.target.closest('.delete-row')) {
            setTimeout(validateInventory, 100);
        }
    });

    // Form submission validation
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (validateForm()) {
            // Show loading state
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating Product...';
            submitBtn.disabled = true;
            
            // Submit form
            form.submit();
        } else {
            // Scroll to first error
            const firstError = form.querySelector('.is-invalid');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
        }
    });

    // Validation functions
    function validateField(field, rules) {
        const value = field.value.trim();
        let isValid = true;
        let errorMessage = '';

        // Required validation
        if (rules.required && !value) {
            isValid = false;
            errorMessage = `${getFieldLabel(field)} is required`;
        }
        // Length validation
        else if (value && rules.minLength && value.length < rules.minLength) {
            isValid = false;
            errorMessage = `${getFieldLabel(field)} must be at least ${rules.minLength} characters`;
        }
        else if (value && rules.maxLength && value.length > rules.maxLength) {
            isValid = false;
            errorMessage = `${getFieldLabel(field)} cannot exceed ${rules.maxLength} characters`;
        }
        // Pattern validation
        else if (value && rules.pattern && !rules.pattern.test(value)) {
            isValid = false;
            errorMessage = rules.message || `${getFieldLabel(field)} has invalid format`;
        }
        // Numeric validation
        else if (value && rules.min !== undefined && parseFloat(value) < rules.min) {
            isValid = false;
            errorMessage = `${getFieldLabel(field)} must be at least ${rules.min}`;
        }
        else if (value && rules.max !== undefined && parseFloat(value) > rules.max) {
            isValid = false;
            errorMessage = `${getFieldLabel(field)} cannot exceed ${rules.max}`;
        }

        showFieldValidation(field, isValid, errorMessage);
        return isValid;
    }

    function validateImages() {
        const imageInput = document.getElementById('productImages');
        const files = imageInput.files;
        let isValid = true;
        let errorMessage = '';

        if (files.length === 0) {
            isValid = false;
            errorMessage = 'At least one product image is required';
        } else if (files.length > 10) {
            isValid = false;
            errorMessage = 'Maximum 10 images allowed';
        } else {
            // Validate each file
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                
                // File type validation
                if (!['image/jpeg', 'image/jpg', 'image/png', 'image/webp'].includes(file.type)) {
                    isValid = false;
                    errorMessage = 'Images must be JPEG, JPG, PNG, or WebP format';
                    break;
                }
                
                // File size validation (5MB)
                if (file.size > 5 * 1024 * 1024) {
                    isValid = false;
                    errorMessage = 'Each image must be less than 5MB';
                    break;
                }
            }
        }

        showFieldValidation(imageInput, isValid, errorMessage);
        return isValid;
    }

    function validateColors() {
        const colorSelects = form.querySelectorAll('select[name="colors[]"]');
        const selectedColors = Array.from(colorSelects).map(select => select.value).filter(value => value);
        const uniqueColors = [...new Set(selectedColors)];
        
        let isValid = true;
        let errorMessage = '';

        if (selectedColors.length === 0) {
            isValid = false;
            errorMessage = 'At least one color must be selected';
        } else if (selectedColors.length !== uniqueColors.length) {
            isValid = false;
            errorMessage = 'Duplicate colors are not allowed';
        } else if (selectedColors.length > 20) {
            isValid = false;
            errorMessage = 'Maximum 20 colors allowed';
        }

        // Show validation on colors container
        const colorsContainer = document.getElementById('colorsContainer');
        showContainerValidation(colorsContainer, isValid, errorMessage);
        return isValid;
    }

    function validateInventory() {
        const inventoryColors = form.querySelectorAll('select[name="inventory_colors[]"]');
        const quantities = form.querySelectorAll('input[name="quantities[]"]');
        
        let isValid = true;
        let errorMessage = '';

        // Check if we have inventory entries
        if (inventoryColors.length === 0) {
            isValid = false;
            errorMessage = 'At least one inventory entry is required';
        } else {
            // Validate each inventory row
            const selectedInventoryColors = [];
            
            for (let i = 0; i < inventoryColors.length; i++) {
                const colorValue = inventoryColors[i].value;
                const quantityValue = quantities[i] ? quantities[i].value : '';

                // Check color selection
                if (!colorValue) {
                    isValid = false;
                    errorMessage = 'All inventory colors must be selected';
                    break;
                }

                // Check for duplicate colors
                if (selectedInventoryColors.includes(colorValue)) {
                    isValid = false;
                    errorMessage = 'Duplicate inventory colors are not allowed';
                    break;
                }
                selectedInventoryColors.push(colorValue);

                // Check quantity
                if (!quantityValue || quantityValue < 0) {
                    isValid = false;
                    errorMessage = 'All quantities must be valid positive numbers';
                    break;
                }
            }

            // Check if inventory colors are subset of product colors
            if (isValid) {
                const productColors = Array.from(form.querySelectorAll('select[name="colors[]"]'))
                    .map(select => select.value).filter(value => value);
                
                const invalidInventoryColors = selectedInventoryColors.filter(
                    color => !productColors.includes(color)
                );
                
                if (invalidInventoryColors.length > 0) {
                    isValid = false;
                    errorMessage = 'All inventory colors must be selected in the product colors section';
                }
            }
        }

        // Show validation on inventory container
        const inventoryContainer = document.getElementById('inventoryTableBody');
        showContainerValidation(inventoryContainer.closest('.card'), isValid, errorMessage);
        return isValid;
    }

    function validateForm() {
        let isFormValid = true;

        // Validate all individual fields
        Object.keys(validationRules).forEach(fieldName => {
            const field = form.querySelector(`[name="${fieldName}"]`);
            if (field && !validateField(field, validationRules[fieldName])) {
                isFormValid = false;
            }
        });

        // Validate images
        if (!validateImages()) {
            isFormValid = false;
        }

        // Validate colors
        if (!validateColors()) {
            isFormValid = false;
        }

        // Validate inventory
        if (!validateInventory()) {
            isFormValid = false;
        }

        return isFormValid;
    }

    function showFieldValidation(field, isValid, errorMessage) {
        const existingError = field.parentNode.querySelector('.invalid-feedback');
        
        if (isValid) {
            field.classList.remove('is-invalid');
            field.classList.add('is-valid');
            if (existingError) {
                existingError.remove();
            }
        } else {
            field.classList.remove('is-valid');
            field.classList.add('is-invalid');
            
            if (existingError) {
                existingError.textContent = errorMessage;
            } else {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'invalid-feedback';
                errorDiv.textContent = errorMessage;
                field.parentNode.appendChild(errorDiv);
            }
        }
    }

    function showContainerValidation(container, isValid, errorMessage) {
        const existingError = container.querySelector('.validation-error');
        
        if (existingError) {
            existingError.remove();
        }

        if (!isValid) {
            const errorDiv = document.createElement('div');
            errorDiv.className = 'validation-error alert alert-danger mt-2';
            errorDiv.innerHTML = `<i class="fas fa-exclamation-triangle me-2"></i>${errorMessage}`;
            container.appendChild(errorDiv);
        }
    }

    function clearFieldError(field) {
        field.classList.remove('is-invalid', 'is-valid');
        const existingError = field.parentNode.querySelector('.invalid-feedback');
        if (existingError) {
            existingError.remove();
        }
    }

    function getFieldLabel(field) {
        const label = field.closest('.mb-3, .col-md-6, .col-md-4, .col-12')?.querySelector('label');
        return label ? label.textContent.replace('*', '').trim() : field.name;
    }
});
</script>

@endpush
@push('styles')
<style>
.card {
    border: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    padding: 1.5rem;
}

.form-label {
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.form-control:focus {
    border-color: #4CAF50;
    box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
}

.btn-primary {
    background-color: #4CAF50;
    border-color: #4CAF50;
}

.btn-primary:hover {
    background-color: #45a049;
    border-color: #45a049;
}

.section-title {
    border-bottom: 2px solid #4CAF50;
    padding-bottom: 0.5rem;
    margin-bottom: 1.5rem;
}

.remove-field {
    padding: 0.25rem 0.5rem;
    line-height: 1;
}

#imagePreview img {
    width: 100%;
    border-radius: 4px;
}
</style>
@endpush
