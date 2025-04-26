@extends('layouts.website.master')

@section('title',trans('messages.contact_us'))

@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs py-4" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title fw-bold">Contact Us</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 justify-content-md-end">
                            <li class="breadcrumb-item"><a href="/" class="text-decoration-none"><i class="lni lni-home me-1"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Contact Hero Section -->
    <section class="contact-hero py-5" style="background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12 mb-5 mb-lg-0">
                    <div class="section-tag mb-3">
                        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-normal">Get In Touch</span>
                    </div>
                    <h2 class="display-4 fw-bold mb-4">We'd Love to Hear From You</h2>
                    <p class="lead text-muted mb-4">Have questions about our products, services, or need assistance? Our team is here to help you every step of the way.</p>
                    <div class="contact-cta d-flex flex-wrap gap-3">
                        <a href="#contact-form" class="btn btn-primary btn-lg px-4 py-2">
                            <i class="lni lni-envelope me-2"></i> Send Message
                        </a>
                        <a href="tel:+18005554400" class="btn btn-outline-secondary btn-lg px-4 py-2">
                            <i class="lni lni-phone me-2"></i> Call Us
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="contact-image text-center">
                        <img src="{{asset('WhatsApp Image 2025-04-26 at 12.16.44_abdae11c.jpg?height=300&width=300')}}" alt="Contact Us" class="img-fluid rounded-4 shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Hero Section -->

    <!-- Start Contact Info Section -->
    <section class="contact-info-section py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="contact-info-card bg-white p-4 rounded-4 shadow-sm h-100">
                        <div class="icon-box mb-4 bg-primary-subtle text-primary rounded-circle p-3 d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                            <i class="lni lni-map-marker fs-3"></i>
                        </div>
                        <h3 class="fw-bold mb-3">Our Location</h3>
                        <p class="text-muted mb-2">Nag Hammadi, Egypt</p>
                        <p class="text-muted mb-0">Qena, Egypt.</p>
                        <a href="https://maps.app.goo.gl/CcLqsDDSsschQUKR6" target="_blank" class="btn btn-link text-primary p-0 mt-3 text-decoration-none">
                            View on Map <i class="lni lni-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="contact-info-card bg-white p-4 rounded-4 shadow-sm h-100">
                        <div class="icon-box mb-4 bg-success-subtle text-success rounded-circle p-3 d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                            <i class="lni lni-phone fs-3"></i>
                        </div>
                        <h3 class="fw-bold mb-3">Phone Numbers</h3>
                        <p class="text-muted mb-2">Customer Support:</p>
                        <p class="mb-2"><a href="tel:+201021369699" class="text-primary fw-medium text-decoration-none">+201021369699</a> (Toll free)</p>
                        <p class="text-muted mb-2">Sales Department:</p>
                        <p class="mb-0"><a href="tel:+201098001021" class="text-primary fw-medium text-decoration-none">+201098001021</a></p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="contact-info-card bg-white p-4 rounded-4 shadow-sm h-100">
                        <div class="icon-box mb-4 bg-warning-subtle text-warning rounded-circle p-3 d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                            <i class="lni lni-envelope fs-3"></i>
                        </div>
                        <h3 class="fw-bold mb-3">Email Addresses</h3>
                        <p class="text-muted mb-2">Customer Support:</p>
                        <p class="mb-2"><a href="mailto:dev.mohamedsaadphp@gmail.com" class="text-primary fw-medium text-decoration-none">D-sevenStore@gmail.com</a></p>
                        <p class="text-muted mb-2">Career Inquiries:</p>
                        <p class="mb-0"><a href="mailto:dev.mohamedsaadphp@gmail.com" class="text-primary fw-medium text-decoration-none">D-sevenStore@gmail.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Info Section -->

    <!-- Start Contact Form Section -->
    <section id="contact-form" class="contact-form-section py-5 my-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-12 text-center mb-5">
                    <div class="section-tag mb-3">
                        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-normal">Send Us a Message</span>
                    </div>
                    <h2 class="display-5 fw-bold mb-3">How Can We Help You?</h2>
                    <p class="lead text-muted mx-auto" style="max-width: 700px;">Fill out the form below and our team will get back to you within 24 hours.</p>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-10 col-12">
                    <div class="contact-form-wrapper bg-white p-4 p-lg-5 rounded-4 shadow-sm">
                        <form class="contact-form row g-4" method="post" action="assets/mail/mail.php">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                    <label for="name"><i class="lni lni-user me-1"></i> Your Name</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                    <label for="email"><i class="lni lni-envelope me-1"></i> Your Email</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Your Phone">
                                    <label for="phone"><i class="lni lni-phone me-1"></i> Your Phone</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Your Subject" required>
                                    <label for="subject"><i class="lni lni-text-align-justify me-1"></i> Your Subject</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" name="message" placeholder="Your Message" style="height: 150px" required></textarea>
                                    <label for="message"><i class="lni lni-comments-alt me-1"></i> Your Message</label>
                                </div>
                            </div>
                            
                            <div class="col-12 mt-4 text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5 py-3">
                                    <i class="lni lni-telegram-original me-2"></i> Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
   

    <!-- Start CTA Section -->
    <section class="cta-section py-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-card bg-primary text-white p-5 rounded-4 shadow position-relative overflow-hidden">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-7 col-12 mb-4 mb-md-0">
                                <h2 class="display-5 fw-bold mb-3">Connect With Us on Social Media</h2>
                                <p class="lead mb-4">Follow us for the latest updates, promotions, and inspiration for your home.</p>
                                <div class="social-links">
                                    <a href="#" class="btn btn-light btn-lg me-2 mb-2 mb-md-0" style="width: 50px; height: 50px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center;">
                                        <i class="lni lni-facebook-filled"></i>
                                    </a>
                                    <a href="#" class="btn btn-light btn-lg me-2 mb-2 mb-md-0" style="width: 50px; height: 50px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center;">
                                        <i class="lni lni-instagram"></i>
                                    </a>
                                    <a href="#" class="btn btn-light btn-lg me-2 mb-2 mb-md-0" style="width: 50px; height: 50px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center;">
                                        <i class="lni lni-twitter-original"></i>
                                    </a>
                                    <a href="#" class="btn btn-light btn-lg me-2 mb-2 mb-md-0" style="width: 50px; height: 50px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center;">
                                        <i class="lni lni-pinterest"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- <div class="col-lg-4 col-md-5 col-12 text-center text-md-end">
                                <img src="{{asset('WhatsApp Image 2025-04-26 at 12.16.44_abdae11c.jpg?height=200&width=200')}}" alt="Social Media" class="img-fluid rounded-circle cta-image" style="border: 5px solid rgba(255,255,255,0.3);">
                            </div> -->
                        </div>
                        <!-- Decorative elements -->
                        <div class="decoration-circle position-absolute" style="width: 300px; height: 300px; background-color: rgba(255,255,255,0.1); border-radius: 50%; bottom: -150px; right: -150px;"></div>
                        <div class="decoration-circle position-absolute" style="width: 200px; height: 200px; background-color: rgba(255,255,255,0.1); border-radius: 50%; top: -100px; left: -100px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End CTA Section -->
@endsection

@push('styles')
<style>
    /* Custom Styles for Contact Us Page */
    .icon-circle {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .rounded-4 {
        border-radius: 0.75rem !important;
    }
    
    .section-tag .badge {
        font-size: 0.9rem;
    }
    
    /* Form styling */
    .form-control {
        padding: 0.75rem 1rem;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: var(--bs-primary);
        box-shadow: 0 0 0 0.25rem rgba(var(--bs-primary-rgb), 0.25);
    }
    
    .form-floating > label {
        padding: 1rem 1rem;
    }
    
    .form-floating > .form-control {
        padding: 1rem 1rem;
        height: calc(3.5rem + 2px);
    }
    
    .form-floating > .form-control-textarea {
        min-height: 150px;
    }
    
    /* Button styling */
    .btn-primary {
        background-color: var(--bs-primary);
        border-color: var(--bs-primary);
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(var(--bs-primary-rgb), 0.3);
    }
    
    /* Accordion styling */
    .accordion-button:not(.collapsed) {
        background-color: rgba(var(--bs-primary-rgb), 0.1);
        color: var(--bs-primary);
        box-shadow: none;
    }
    
    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(var(--bs-primary-rgb), 0.25);
    }
    
    /* Animation for elements */
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
    
    .contact-info-card,
    .contact-form-wrapper,
    .accordion-item {
        animation: fadeInUp 0.5s ease-out;
    }
    
    /* Hover effects */
    .contact-info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        transition: all 0.3s ease;
    }
    
    /* Custom colors */
    .bg-primary-subtle {
        background-color: rgba(var(--bs-primary-rgb), 0.1) !important;
    }
    
    .bg-success-subtle {
        background-color: rgba(var(--bs-success-rgb), 0.1) !important;
    }
    
    .bg-warning-subtle {
        background-color: rgba(var(--bs-warning-rgb), 0.1) !important;
    }
    
    .text-primary {
        color: var(--bs-primary) !important;
    }
    
    .text-success {
        color: var(--bs-success) !important;
    }
    
    .text-warning {
        color: var(--bs-warning) !important;
    }
    
    /* Social media buttons hover effect */
    .social-links .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .display-4 {
            font-size: 2.5rem;
        }
        
        .display-5 {
            font-size: 2rem;
        }
    }
</style>
@endpush