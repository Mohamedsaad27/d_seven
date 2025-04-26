@extends('layouts.website.master')
@section('title', trans('Sign Up'))
@section('content')
    
    <!-- Start Hero Section -->
    <div class="signup-hero py-5" style="background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="hero-content py-5 ps-lg-4">
                        <h1 class="display-4 fw-bold mb-3">Join <span style="color: #4e73df;">D-Seven Store</span></h1>
                        <p class="lead text-muted mb-4">Create an account and discover a world of amazing products at your fingertips.</p>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/" class="text-decoration-none"><i class="lni lni-home me-1"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Registration</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 d-none d-md-block">
                    <!-- <img src="/placeholder.svg?height=400&width=500" alt="Registration" class="img-fluid rounded-4 shadow-sm"> -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Start Account Register Area -->
    <div class="account-register py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-12">
                    <div class="register-form bg-white rounded-4 shadow-sm p-4 p-lg-5">
                        <div class="text-center mb-4">
                            <div class="icon-circle mb-3 mx-auto">
                                <i class="lni lni-user fs-3"></i>
                            </div>
                            <h2 class="fw-bold">Create Your Account</h2>
                            <p class="text-muted">Join our community in less than a minute</p>
                        </div>
                        
                        <form class="row g-3" method="post" action="{{ route('register.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Name in English -->
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name_en" name="name_en" placeholder="Name in English" required>
                                    <label for="name_en"><i class="lni lni-user me-1"></i> Name in English</label>
                                </div>
                            </div>
                            
                            <!-- Name in Arabic -->
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="Name in Arabic" required>
                                    <label for="name_ar"><i class="lni lni-user me-1"></i> Name in Arabic</label>
                                </div>
                            </div>
                            
                            <!-- Email -->
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                                    <label for="email"><i class="lni lni-envelope me-1"></i> Email Address</label>
                                </div>
                            </div>
                            
                            <!-- Phone -->
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                                    <label for="phone"><i class="lni lni-phone me-1"></i> Phone Number</label>
                                </div>
                            </div>
                            
                            <!-- Gender -->
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option value="" selected disabled>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <label for="gender"><i class="lni lni-users me-1"></i> Gender</label>
                                </div>
                            </div>
                            
                            <!-- Profile Image -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="profile_image" class="form-label"><i class="lni lni-image me-1"></i> Profile Image</label>
                                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                                </div>
                            </div>
                            
                            <!-- Password -->
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    <label for="password"><i class="lni lni-lock-alt me-1"></i> Password</label>
                                </div>
                            </div>
                            
                            <!-- Confirm Password -->
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                                    <label for="password_confirmation"><i class="lni lni-lock me-1"></i> Confirm Password</label>
                                </div>
                            </div>
                            
                            <!-- Terms and Conditions -->
                            <div class="col-12">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                    <label class="form-check-label text-muted" for="terms">
                                        I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> and <a href="#" class="text-decoration-none">Privacy Policy</a>
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="col-12">
                                <button class="btn btn-primary btn-lg w-100 py-3 mb-3" type="submit">
                                    <i class="lni lni-user me-2"></i> Create Account
                                </button>
                                
                                <div class="text-center">
                                    <p class="mb-0">or sign up with</p>
                                    <div class="social-login mt-3 mb-4">
                                        <a href="#" class="btn btn-outline-secondary me-2"><i class="lni lni-google"></i></a>
                                        <a href="#" class="btn btn-outline-secondary me-2"><i class="lni lni-facebook"></i></a>
                                        <a href="#" class="btn btn-outline-secondary"><i class="lni lni-apple"></i></a>
                                    </div>
                                    <p class="mb-0">Already have an account? <a href="{{route('login')}}" class="fw-bold text-decoration-none">Login Now</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Register Area -->

@endsection

@push('styles')
<style>
    /* Custom Styles */
    .signup-hero {
        position: relative;
        overflow: hidden;
    }
    
    .icon-circle {
        width: 70px;
        height: 70px;
        background-color: #f8f9fa;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4e73df;
        border: 2px solid rgba(78, 115, 223, 0.1);
    }
    
    .form-floating > .form-control,
    .form-floating > .form-select {
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
    
    .social-login .btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .social-login .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    
    .form-control:focus,
    .form-select:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
    }
    
    .rounded-4 {
        border-radius: 0.75rem !important;
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
    
    .register-form {
        animation: fadeInUp 0.5s ease-out;
    }
</style>
@endpush

