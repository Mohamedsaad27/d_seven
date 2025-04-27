@extends('layouts.dashboard.layout')

@section('title', 'Edit Discount')

@section('content')
        @include('layouts.dashboard.breadcrumb', ['component' => 'Edit Discount'])
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3 text-gray-800 mb-0">Edit Discount</h2>
                <a href="{{ route('discounts.index') }}" class="btn btn-secondary">
                    Back To List
                </a>
            </div>
            <form action="{{ route('discounts.update', $discount->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Discount Name</label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $discount->name) }}" 
                               required 
                               autofocus 
                               placeholder="Enter Discount Name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="discount_type" class="form-label">Discount Type</label>
                        <select class="form-control @error('discount_type') is-invalid @enderror" 
                                id="discount_type" 
                                name="discount_type" 
                                required>
                            <option value="">Select Discount Type</option>
                            <option value="percent" {{ old('discount_type', $discount->discount_type) == 'percent' ? 'selected' : '' }}>Percentage (%)</option>
                            <option value="fixed" {{ old('discount_type', $discount->discount_type) == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                        </select>
                        @error('discount_type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="discount_amount" class="form-label">Discount Amount</label>
                        <input type="number" 
                               class="form-control @error('discount_amount') is-invalid @enderror" 
                               id="discount_amount" 
                               name="discount_amount" 
                               value="{{ old('discount_amount', $discount->discount_amount) }}" 
                               step="0.01" 
                               min="0" 
                               required 
                               placeholder="Enter Discount Amount">
                        @error('discount_amount')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="is_active" class="form-label">Status</label>
                        <div class="d-flex align-items-center">
                            <div class="form-check form-switch">
                                <input class="form-check-input @error('is_active') is-invalid @enderror" 
                                type="checkbox" 
                                id="is_active" 
                                name="is_active" 
                                value="1" 
                                {{ old('is_active', $discount->is_active) == '1' ? 'checked' : '' }}
                                style="width: 3em; height: 1.5em;">
                                <label class="form-check-label ms-2" for="is_active">
                                    <span class="badge bg-{{ old('is_active', $discount->is_active) == '1' ? 'success' : 'danger' }} status-badge">
                                        {{ old('is_active', $discount->is_active) == '1' ? 'Active' : 'Inactive' }}
                                    </span>
                                </label>
                            </div>
                        </div>
                        @error('is_active')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="starts_at" class="form-label">Start Date</label>
                        <input type="datetime-local" 
                               class="form-control @error('starts_at') is-invalid @enderror" 
                               id="starts_at" 
                               name="starts_at" 
                               value="{{ old('starts_at', $discount->starts_at->format('Y-m-d\TH:i')) }}" 
                               required>
                        @error('starts_at')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="ends_at" class="form-label">End Date</label>
                        <input type="datetime-local" 
                               class="form-control @error('ends_at') is-invalid @enderror" 
                               id="ends_at" 
                               name="ends_at" 
                               value="{{ old('ends_at', $discount->ends_at->format('Y-m-d\TH:i')) }}" 
                               required>
                        @error('ends_at')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                        Update Discount
                    </button>
                </div>
            </form>
            
@endsection
@push('styles')
<style>
    body {
        background-color: #f4f6f9;
        padding-top: 50px;
    }
    .form-container {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        padding: 30px;
    }
    .form-group label {
        font-weight: 600;
        color: #495057;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }
    .custom-file-input:lang(en)::after {
        content: "Choose file...";
    }
    .custom-file-input:lang(en)::before {
        content: "Browse";
    }
</style>
@endpush