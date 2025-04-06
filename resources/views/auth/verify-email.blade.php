@extends('layouts.website.master')
@section('title', trans('Verify Email'))
@section('content')

<!-- Start Verification Hero Section -->
<div class="verification-hero py-5" style="background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="hero-content py-5 ps-lg-4">
                    <h1 class="display-4 fw-bold mb-3">Verify Your <span style="color: #4e73df;">Email</span></h1>
                    <p class="lead text-muted mb-4">Please enter the verification code sent to your email address.</p>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="text-decoration-none"><i class="lni lni-home me-1"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Verify Email</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 d-none d-md-block">
                <!-- <img src="/placeholder.svg?height=400&width=500" alt="Email Verification" class="img-fluid rounded-4 shadow-sm"> -->
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Start Verification Form Section -->
<div class="verification-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12">
                <div class="verification-form bg-white rounded-4 shadow-sm p-4 p-lg-5">
                    
                    <!-- Email Sent Icon -->
                    <div class="text-center mb-4">
                        <div class="icon-circle mb-3 mx-auto">
                            <i class="lni lni-envelope-open fs-3"></i>
                        </div>
                        <h2 class="fw-bold">Check Your Email</h2>
                        <p class="text-muted">We've sent a verification code to <strong>{{ auth()->user()->email ?? 'your email address' }}</strong></p>
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
                    
                    <!-- Verification Form -->
                    <form method="POST" action="{{ route('verification.verify') }}" class="verification-code-form">
                        @csrf
                        
                        <div class="verification-code-container mb-4">
                            <label class="form-label mb-3">Enter Verification Code</label>
                            <div class="code-inputs d-flex justify-content-between gap-2">
                                <input type="text" class="form-control code-input text-center fw-bold" maxlength="1" name="code[]" required autofocus>
                                <input type="text" class="form-control code-input text-center fw-bold" maxlength="1" name="code[]" required>
                                <input type="text" class="form-control code-input text-center fw-bold" maxlength="1" name="code[]" required>
                                <input type="text" class="form-control code-input text-center fw-bold" maxlength="1" name="code[]" required>
                                <input type="text" class="form-control code-input text-center fw-bold" maxlength="1" name="code[]" required>
                            </div>
                            @error('code')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                            
                            <div class="verification-note text-center mt-3">
                                <small class="text-muted">The code will expire in <span id="countdown">30:00</span> minutes</small>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg py-3">
                                <i class="lni lni-checkmark-circle me-2"></i> Verify Email
                            </button>
                        </div>
                    </form>
                    
                    <!-- <div class="text-center mt-4">
                        <p class="mb-0">Didn't receive the code?</p>
                        <form method="POST"  class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-decoration-none fw-bold">
                                Resend Code
                            </button>
                        </form>
                    </div> -->
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Verification Form Section -->

@endsection

@push('styles')
<style>
    /* Custom Styles */
    .verification-hero {
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
    
    .verification-form {
        animation: fadeInUp 0.5s ease-out;
    }
    
    .code-input {
        height: 60px;
        width: 60px;
        font-size: 24px;
        border: 2px solid #d1d9e6;
        border-radius: 12px;
        background-color: #f7f9fc;
    }
    
    .code-input:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        background-color: #ffffff;
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
        .code-input {
            height: 50px;
            width: 45px;
            font-size: 20px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-focus next input when a digit is entered
        const codeInputs = document.querySelectorAll('.code-input');
        
        codeInputs.forEach((input, index) => {
            input.addEventListener('keyup', function(e) {
                // If a digit was entered and there's a next input, focus it
                if (this.value.length === 1 && index < codeInputs.length - 1) {
                    codeInputs[index + 1].focus();
                }
                
                // Allow backspace to go to previous input
                if (e.key === 'Backspace' && index > 0 && this.value.length === 0) {
                    codeInputs[index - 1].focus();
                }
            });
            
            // Handle paste event
            input.addEventListener('paste', function(e) {
                e.preventDefault();
                const pastedData = e.clipboardData.getData('text');
                
                // If we have pasted data and it's numeric
                if (pastedData && /^\d+$/.test(pastedData)) {
                    // Fill in the inputs with the pasted digits
                    const digits = pastedData.split('');
                    
                    codeInputs.forEach((input, i) => {
                        if (i < digits.length) {
                            input.value = digits[i];
                        }
                    });
                    
                    // Focus the next empty input or the last one
                    const lastFilledIndex = Math.min(digits.length, codeInputs.length) - 1;
                    codeInputs[lastFilledIndex].focus();
                }
            });
        });
        
        // Countdown timer
        let timeLeft = 30 * 60; // 30 minutes in seconds
        const countdownEl = document.getElementById('countdown');
        
        const countdownTimer = setInterval(function() {
            const minutes = Math.floor(timeLeft / 60);
            let seconds = timeLeft % 60;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            
            countdownEl.textContent = minutes + ':' + seconds;
            
            if (timeLeft <= 0) {
                clearInterval(countdownTimer);
                countdownEl.textContent = '0:00';
                countdownEl.parentElement.innerHTML += ' <span class="text-danger">Code expired!</span>';
            }
            
            timeLeft--;
        }, 1000);
    });
</script>
@endpush

