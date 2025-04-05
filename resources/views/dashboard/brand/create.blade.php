@extends('layouts.dashboard.layout')

@section('title', 'Create Brand')

@section('content')
        @include('layouts.dashboard.breadcrumb', ['component' => 'Create Brand'])
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3 text-gray-800 mb-0">Brand</h2>
                <a href="{{ route('brand.index') }}" class="btn btn-secondary">
                    Back To List
                </a>
            </div>
            <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name_ar" class="form-label">Arabic Name</label>
                        <input type="text" 
                               class="form-control @error('name_ar') is-invalid @enderror" 
                               id="name_ar" 
                               name="name_ar" 
                               value="{{ old('name_ar') }}" 
                               required 
                               autofocus 
                               placeholder="Enter Arabic Name">
                        @error('name_ar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="name_en" class="form-label">English Name</label>
                        <input type="text" 
                               class="form-control @error('name_en') is-invalid @enderror" 
                               id="name_en" 
                               name="name_en" 
                               value="{{ old('name_en') }}" 
                               required 
                               placeholder="Enter English Name">
                        @error('name_en')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="description_ar" class="form-label">Arabic Description</label>
                        <textarea 
                            class="form-control @error('description_ar') is-invalid @enderror" 
                            id="description_ar" 
                            name="description_ar" 
                            rows="3" 
                            placeholder="Enter Arabic Description">{{ old('description_ar') }}</textarea>
                        @error('description_ar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="description_en" class="form-label">English Description</label>
                        <textarea 
                            class="form-control @error('description_en') is-invalid @enderror" 
                            id="description_en" 
                            name="description_en" 
                            rows="3" 
                            placeholder="Enter English Description">{{ old('description_en') }}</textarea>
                        @error('description_en')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="image" class="form-label">Brand Image</label>
                        <div class="custom-file">
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="form-text text-muted">
                                Upload a brand image (max 2MB, jpg/png)
                            </small>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="is_active" class="form-label">Status</label>
                        <select 
                            class="form-select @error('is_active') is-invalid @enderror" 
                            id="is_active" 
                            name="is_active">
                            <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('is_active')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                        Create Brand
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
