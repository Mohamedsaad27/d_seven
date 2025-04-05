@extends('layouts.dashboard.layout')

@section('title', 'Edit Shipping Zone')

@section('content')
        @include('layouts.dashboard.breadcrumb', ['component' => 'Edit Shipping Zone'])
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3 text-gray-800 mb-0">Shipping Zone</h2>
                <a href="{{ route('shipping_zone.index') }}" class="btn btn-secondary">
                    Back To List
                </a>
            </div>
            <form action="{{ route('shipping_zone.update', $shippingZone->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="zone_name" class="form-label">Name</label>
                        <input type="text" 
                               class="form-control @error('zone_name') is-invalid @enderror" 
                               id="zone_name" 
                               name="zone_name" 
                               value="{{ $shippingZone->zone_name }}" 
                               required 
                               autofocus 
                               placeholder="Enter Name">
                        @error('zone_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="shipping_cost" class="form-label">Shipping Cost</label>
                        <input type="number" 
                               class="form-control @error('shipping_cost') is-invalid @enderror" 
                               id="shipping_cost" 
                               name="shipping_cost" 
                               value="{{ $shippingZone->shipping_cost }}" 
                               step="0.01" 
                               placeholder="Enter Shipping Cost">
                        @error('shipping_cost')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                        Create Shipping Zone
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
