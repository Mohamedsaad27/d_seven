@extends('layouts.dashboard.layout')

@section('title', 'Edit Product')

@section('content')
@include('layouts.dashboard.breadcrumb', ['component' => 'Edit Product'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Product: {{ $product->name_en }}</h5>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary btn-sm">Back to Products</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" id="editProductForm">
                        @csrf
                        @method('PUT')
                        
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
                                <button type="submit" class="btn btn-primary">Update Product</button>
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
    // Image preview for new uploads
    document.getElementById('productImages').addEventListener('change', function(event) {
        const preview = document.getElementById('imagePreview');
        preview.innerHTML = '';
        
        Array.from(event.target.files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const col = document.createElement('div');
                col.className = 'col-md-2 col-sm-3 col-6 mb-3';
                
                const card = document.createElement('div');
                card.className = 'card h-100';
                
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'card-img-top';
                img.alt = 'Product Image Preview';
                
                const cardBody = document.createElement('div');
                cardBody.className = 'card-body p-2 text-center';
                cardBody.innerHTML = `<small>New Image ${index + 1}</small>`;
                
                card.appendChild(img);
                card.appendChild(cardBody);
                col.appendChild(card);
                preview.appendChild(col);
            }
            reader.readAsDataURL(file);
        });
    });
    
    // Handle existing images
    document.addEventListener('DOMContentLoaded', function() {
        // Delete image button
        document.querySelectorAll('.delete-image-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                if (confirm('Are you sure you want to delete this image?')) {
                    const imageContainer = this.closest('.existing-image-container');
                    const imageId = imageContainer.dataset.imageId;
                    
                    // Create a hidden input to mark this image for deletion
                    const deleteInput = document.createElement('input');
                    deleteInput.type = 'hidden';
                    deleteInput.name = 'delete_images[]';
                    deleteInput.value = imageId;
                    document.getElementById('editProductForm').appendChild(deleteInput);
                    
                    // Visual feedback
                    imageContainer.style.opacity = '0.5';
                    this.disabled = true;
                    imageContainer.querySelector('.set-primary-btn')?.setAttribute('disabled', 'disabled');
                }
            });
        });
        
        // Set primary image button
        document.querySelectorAll('.set-primary-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const imageId = this.dataset.imageId;
                
                // Remove primary badge from all images
                document.querySelectorAll('.existing-image-container .badge').forEach(badge => {
                    badge.remove();
                });
                
                // Set all buttons visible
                document.querySelectorAll('.set-primary-btn').forEach(button => {
                    button.style.display = 'block';
                });
                
                // Hide this button and show primary badge
                this.style.display = 'none';
                const badge = document.createElement('span');
                badge.className = 'badge bg-success position-absolute';
                badge.style = 'top: 10px; left: 10px;';
                badge.textContent = 'Primary';
                this.parentNode.appendChild(badge);
                
                // Update the primary image input
                const primaryInput = document.querySelector('input[name="is_primary"]');
                primaryInput.value = imageId;
            });
        });
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

.existing-image-container {
    margin-bottom: 15px;
}

.image-card {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.image-actions {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.05);
    opacity: 0;
    transition: opacity 0.3s;
    border-radius: 8px;
}

.existing-image-container:hover .image-actions {
    opacity: 1;
}
</style>
@endpush