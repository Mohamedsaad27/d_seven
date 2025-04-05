@extends('layouts.dashboard.layout')

@section('title', 'Edit Size')

@section('content')
        @include('layouts.dashboard.breadcrumb', ['component' => 'Edit Size'])
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3 text-gray-800 mb-0">Size</h2>
                <a href="{{ route('sizes.index') }}" class="btn btn-secondary">
                    Back To List
                </a>
            </div>
            <form action="{{ route('sizes.update', $size->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="size" class="form-label">Size</label>
                        <input type="text" 
                               class="form-control @error('size') is-invalid @enderror" 
                               id="size" 
                               name="size" 
                               value="{{ $size->size }}" 
                               required 
                               autofocus 
                               placeholder="Enter Arabic Name">
                        @error('name_ar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    
                </div>

                

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                        Edit Color
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
