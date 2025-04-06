@extends('layouts.website.master')
@section('title', trans('website.login'))
@section('content')

    <!-- Start Hero Section -->
    <div class="login-hero py-5" style="background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="hero-content py-5 ps-lg-4">
                        <h1 class="display-4 fw-bold mb-3">Welcome <span style="color: #4e73df;">Back</span></h1>
                        <p class="lead text-muted mb-4">Sign in to access your account and continue your shopping journey.</p>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/" class="text-decoration-none"><i class="lni lni-home me-1"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Login</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 d-none d-md-block">
                    <!-- <img src="/placeholder.svg?height=400&width=500" alt="Login" class="img-fluid rounded-4 shadow-sm"> -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Start Account Login Area -->
    <div class="account-login py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="login-form bg-white rounded-4 shadow-sm p-4 p-lg-5">
                        
                        <!-- Login Icon -->
                        <div class="text-center mb-4">
                            <div class="icon-circle mb-3 mx-auto">
                                <i class="lni lni-user fs-3"></i>
                            </div>
                            <h2 class="fw-bold">Sign In</h2>
                            <p class="text-muted">Access your D-Seven Store account</p>
                        </div>
                        
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        
                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        
                        <!-- Social Login -->
                        <div class="social-login mb-4">
                            <div class="row g-2">
                                <div class="col-sm-4">
                                    <a href="#" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center gap-2 py-2">
                                        <i class="lni lni-facebook-filled"></i>
                                        <span>Facebook</span>
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" class="btn btn-outline-info w-100 d-flex align-items-center justify-content-center gap-2 py-2">
                                        <i class="lni lni-twitter-original"></i>
                                        <span>Twitter</span>
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2 py-2">
                                        <i class="lni lni-google"></i>
                                        <span>Google</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="divider mb-4">
                            <span>OR</span>
                        </div>
                        
                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <!-- Email -->
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                                <label for="email"><i class="lni lni-envelope me-1"></i> Email Address</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Password -->
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                                <label for="password"><i class="lni lni-lock-alt me-1"></i> Password</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Remember Me & Forgot Password -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-muted" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" class="text-decoration-none fw-medium">Forgot password?</a>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary btn-lg py-3">
                                    <i class="lni lni-enter me-2"></i> Sign In
                                </button>
                            </div>
                            
                            <!-- Register Link -->
                            <div class="text-center">
                                <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="fw-bold text-decoration-none">Register here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->

@endsection

@push('styles')
<style>
    /* Custom Styles */
    .login-hero {
        position: relative;
        overflow: hidden;
    }
    
    .icon-circle {
        width: 80px;
        height: 80px;
        background-color: rgba(78, 115, 223, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4e73df;
        font-size: 1.5rem;
        margin: 0 auto;
    }
    
    .login-form {
        animation: fadeInUp 0.5s ease-out;
    }
    
    .form-floating > .form-control {
        padding: 1rem 0.75rem;
        height: calc(3.5rem + 2px);
        line-height: 1.25;
    }
    
    .form-floating > label {
        padding: 1rem 0.75rem;
    }
    
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: #3a5ccc;
        border-color: #3a5ccc;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(78, 115, 223, 0.3);
    }
    
    .rounded-4 {
        border-radius: 0.75rem !important;
    }
    
    .divider {
        display: flex;
        align-items: center;
        text-align: center;
        color: #adb5bd;
    }
    
    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #dee2e6;
    }
    
    .divider::before {
        margin-right: 1rem;
    }
    
    .divider::after {
        margin-left: 1rem;
    }
    
    .social-login .btn {
        transition: all 0.3s ease;
    }
    
    .social-login .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    
    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
    }
    
    /* Animation for the form */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translate3d(0, 30px, 0);
        }
        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }
    
    @media (max-width: 576px) {
        .social-login .btn span {
            display: none;
        }
        
        .social-login .btn i {
            margin: 0;
        }
    }
</style>
@endpush

