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
