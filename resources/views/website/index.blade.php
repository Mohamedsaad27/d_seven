@extends('layouts.website.master')

@section('title', 'Home Page')

@section('content')
   <!-- Start Hero Area -->
  <!-- Start Hero Area -->
<!-- Start Hero Area -->
<section class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="hero-slider-container">
                    <!-- Start Hero Slider -->
                    <div class="hero-slider swiper">
                        <div class="swiper-wrapper">
                            <!-- Start Single Slider -->
                            <div class="swiper-slide single-slider">
                                <div class="slider-image-container">
                                    <img src="https://via.placeholder.com/800x500" alt="M75 Sport Watch" class="slider-bg">
                                    <div class="overlay"></div>
                                </div>
                                <div class="content">
                                    <div class="badge-offer">No restocking fee ($35 savings)</div>
                                    <h2 class="slider-title">M75 Sport Watch</h2>
                                    <p class="slider-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
                                        labore dolore magna aliqua.</p>
                                    <div class="price-container">
                                        <span class="price-label">Now Only</span>
                                        <h3 class="price">$320.99</h3>
                                    </div>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now <i class="lni lni-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                            
                            <!-- Start Single Slider -->
                            <div class="swiper-slide single-slider">
                                <div class="slider-image-container">
                                    <img src="https://via.placeholder.com/800x500" alt="CCTV Camera" class="slider-bg">
                                    <div class="overlay"></div>
                                </div>
                                <div class="content">
                                    <div class="badge-offer">Big Sale Offer</div>
                                    <h2 class="slider-title">Get the Best Deal on CCTV Camera</h2>
                                    <p class="slider-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
                                        labore dolore magna aliqua.</p>
                                    <div class="price-container">
                                        <span class="price-label">Combo Only:</span>
                                        <h3 class="price">$590.00</h3>
                                    </div>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now <i class="lni lni-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                        </div>
                        
                        <!-- Slider pagination -->
                        <div class="swiper-pagination"></div>
                        
                        <!-- Slider navigation -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <!-- End Hero Slider -->
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-12 mb-4">
                        <!-- Start Small Banner -->
                        <div class="hero-small-banner">
                            <div class="banner-image-container">
                                <img src="https://via.placeholder.com/370x250" alt="iPhone 12 Pro Max" class="banner-bg">
                                <div class="overlay"></div>
                            </div>
                            <div class="content">
                                <div class="badge-offer">New line required</div>
                                <h2 class="banner-title">iPhone 12 Pro Max</h2>
                                <h3 class="banner-price">$259.99</h3>
                                <a href="product-grids.html" class="banner-btn">View Details</a>
                            </div>
                        </div>
                        <!-- End Small Banner -->
                    </div>
                    <div class="col-lg-12 col-md-6 col-12">
                        <!-- Start Small Banner -->
                        <div class="hero-small-banner weekly-sale">
                            <div class="content">
                                <div class="sale-icon"><i class="lni lni-bolt"></i></div>
                                <h2 class="banner-title">Weekly Sale!</h2>
                                <p class="banner-text">Saving up to 50% off all online store items this week.</p>
                                <div class="button">
                                    <a class="btn" href="product-grids.html">Shop Now <i class="lni lni-arrow-right"></i></a>
                                </div>
                                <div class="sale-timer">
                                    <div class="countdown">
                                        <div class="countdown-item">
                                            <span id="days">03</span>
                                            <p>Days</p>
                                        </div>
                                        <div class="countdown-item">
                                            <span id="hours">12</span>
                                            <p>Hours</p>
                                        </div>
                                        <div class="countdown-item">
                                            <span id="minutes">45</span>
                                            <p>Minutes</p>
                                        </div>
                                        <div class="countdown-item">
                                            <span id="seconds">30</span>
                                            <p>Seconds</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Small Banner -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero Area -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            <!-- Start Single Slider -->
                            <div class="single-slider"
                                style="background-image: url(https://via.placeholder.com/800x500);">
                                <div class="content">
                                    <h2><span>No restocking fee ($35 savings)</span>
                                        M75 Sport Watch
                                    </h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
                                        labore dolore magna aliqua.</p>
                                    <h3><span>Now Only</span> $320.99</h3>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                            <!-- Start Single Slider -->
                            <div class="single-slider"
                                style="background-image: url(https://via.placeholder.com/800x500);">
                                <div class="content">
                                    <h2><span>Big Sale Offer</span>
                                        Get the Best Deal on CCTV Camera
                                    </h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
                                        labore dolore magna aliqua.</p>
                                    <h3><span>Combo Only:</span> $590.00</h3>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner"
                                style="background-image: url('https://via.placeholder.com/370x250');">
                                <div class="content">
                                    <h2>
                                        <span>New line required</span>
                                        iPhone 12 Pro Max
                                    </h2>
                                    <h3>$259.99</h3>
                                </div>
                            </div>
                            <!-- End Small Banner -->
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>Weekly Sale!</h2>
                                    <p>Saving up to 50% off all online store items this week.</p>
                                    <div class="button">
                                        <a class="btn" href="product-grids.html">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Small Banner -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- End Hero Area -->

<!-- Start Featured Categories Area -->
<section class="featured-categories section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Featured Categories</h2>
                    <p>Discover our curated selection of top product categories designed to meet your everyday needs with premium quality and style.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Category -->
                <div class="single-category modern-category">
                    <div class="category-image">
                        <img src="{{ asset('uploads/1.jpg') }}" alt="TV & Audios">
                        <div class="category-overlay"></div>
                    </div>
                    <div class="category-content">
                        <h3 class="category-heading">TV & Audios</h3>
                        <ul class="category-list">
                            <li><a href="product-grids.html">Smart Television</a></li>
                            <li><a href="product-grids.html">QLED TV</a></li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li><a href="product-grids.html">Headphones</a></li>
                            <li><a href="product-grids.html" class="view-all">View All <i class="lni lni-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Single Category -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Category -->
                <div class="single-category modern-category">
                    <div class="category-image">
                        <img src="{{ asset('uploads/2.jpg') }}" alt="Desktop & Laptop">
                        <div class="category-overlay"></div>
                    </div>
                    <div class="category-content">
                        <h3 class="category-heading">Desktop & Laptop</h3>
                        <ul class="category-list">
                            <li><a href="product-grids.html">Gaming Laptops</a></li>
                            <li><a href="product-grids.html">Business Laptops</a></li>
                            <li><a href="product-grids.html">Desktop Computers</a></li>
                            <li><a href="product-grids.html">Computer Accessories</a></li>
                            <li><a href="product-grids.html" class="view-all">View All <i class="lni lni-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Single Category -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Category -->
                <div class="single-category modern-category">
                    <div class="category-image">
                        <img src="{{ asset('uploads/3.jpg') }}" alt="CCTV Camera">
                        <div class="category-overlay"></div>
                    </div>
                    <div class="category-content">
                        <h3 class="category-heading">CCTV Camera</h3>
                        <ul class="category-list">
                            <li><a href="product-grids.html">Security Cameras</a></li>
                            <li><a href="product-grids.html">Smart Doorbells</a></li>
                            <li><a href="product-grids.html">Wireless Systems</a></li>
                            <li><a href="product-grids.html">Surveillance Kits</a></li>
                            <li><a href="product-grids.html" class="view-all">View All <i class="lni lni-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Single Category -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Category -->
                <div class="single-category modern-category">
                    <div class="category-image">
                        <img src="{{ asset('uploads/4.jpg') }}" alt="DSLR Camera">
                        <div class="category-overlay"></div>
                    </div>
                    <div class="category-content">
                        <h3 class="category-heading">DSLR Camera</h3>
                        <ul class="category-list">
                            <li><a href="product-grids.html">DSLR Cameras</a></li>
                            <li><a href="product-grids.html">Mirrorless Cameras</a></li>
                            <li><a href="product-grids.html">Camera Lenses</a></li>
                            <li><a href="product-grids.html">Camera Accessories</a></li>
                            <li><a href="product-grids.html" class="view-all">View All <i class="lni lni-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Single Category -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Category -->
                <div class="single-category modern-category">
                    <div class="category-image">
                        <img src="{{ asset('uploads/5.jpg') }}" alt="Smart Phones">
                        <div class="category-overlay"></div>
                    </div>
                    <div class="category-content">
                        <h3 class="category-heading">Smart Phones</h3>
                        <ul class="category-list">
                            <li><a href="product-grids.html">Apple iPhones</a></li>
                            <li><a href="product-grids.html">Android Phones</a></li>
                            <li><a href="product-grids.html">Phone Cases</a></li>
                            <li><a href="product-grids.html">Phone Accessories</a></li>
                            <li><a href="product-grids.html" class="view-all">View All <i class="lni lni-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Single Category -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Category -->
                <div class="single-category modern-category">
                    <div class="category-image">
                        <img src="{{ asset('uploads/6.jpg') }}" alt="Game Console">
                        <div class="category-overlay"></div>
                    </div>
                    <div class="category-content">
                        <h3 class="category-heading">Game Console</h3>
                        <ul class="category-list">
                            <li><a href="product-grids.html">PlayStation 5</a></li>
                            <li><a href="product-grids.html">Xbox Series X</a></li>
                            <li><a href="product-grids.html">Nintendo Switch</a></li>
                            <li><a href="product-grids.html">Gaming Accessories</a></li>
                            <li><a href="product-grids.html" class="view-all">View All <i class="lni lni-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Single Category -->
            </div>
        </div>
    </div>
</section>
<!-- End Featured Categories Area -->

<!-- Start Trending Product Area -->
<section class="trending-product section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Trending Product</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row">
    <div class="col-lg-3 col-md-6 col-12">
        <!-- Start Single Product -->
        <div class="single-product">
            <div class="product-image">
                <img src="{{ asset('uploads/1.jpg') }}" alt="#" class="product-img">
                <div class="button">
                    <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                </div>
            </div>
            <div class="product-info">
                <span class="category">Watches</span>
                <h4 class="title">
                    <a href="product-grids.html">Xiaomi Mi Band 5</a>
                </h4>
                <ul class="review">
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star"></i></li>
                    <li><span>4.0 Review(s)</span></li>
                </ul>
                <div class="price">
                    <span>$199.00</span>
                </div>
            </div>
        </div>
        <!-- End Single Product -->
    </div>
    <div class="col-lg-3 col-md-6 col-12">
        <!-- Start Single Product -->
        <div class="single-product">
            <div class="product-image">
                <img src="{{ asset('uploads/2.jpg') }}" alt="#" class="product-img">
                <span class="sale-tag">-25%</span>
                <div class="button">
                    <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                </div>
            </div>
            <div class="product-info">
                <span class="category">Speaker</span>
                <h4 class="title">
                    <a href="product-grids.html">Big Power Sound Speaker</a>
                </h4>
                <ul class="review">
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><span>5.0 Review(s)</span></li>
                </ul>
                <div class="price">
                    <span>$275.00</span>
                    <span class="discount-price">$300.00</span>
                </div>
            </div>
        </div>
        <!-- End Single Product -->
    </div>
    <!-- Remaining product items with the same structure and class="product-img" added to all img tags -->
    <div class="col-lg-3 col-md-6 col-12">
        <!-- Start Single Product -->
        <div class="single-product">
            <div class="product-image">
                <img src="{{ asset('uploads/3.jpg') }}" alt="#" class="product-img">
                <div class="button">
                    <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                </div>
            </div>
            <div class="product-info">
                <span class="category">Camera</span>
                <h4 class="title">
                    <a href="product-grids.html">WiFi Security Camera</a>
                </h4>
                <ul class="review">
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><span>5.0 Review(s)</span></li>
                </ul>
                <div class="price">
                    <span>$399.00</span>
                </div>
            </div>
        </div>
        <!-- End Single Product -->
    </div>
    <div class="col-lg-3 col-md-6 col-12">
        <!-- Start Single Product -->
        <div class="single-product">
            <div class="product-image">
                <img src="{{ asset('uploads/4.jpg') }}" alt="#" class="product-img">
                <span class="new-tag">New</span>
                <div class="button">
                    <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                </div>
            </div>
            <div class="product-info">
                <span class="category">Phones</span>
                <h4 class="title">
                    <a href="product-grids.html">iphone 6x plus</a>
                </h4>
                <ul class="review">
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><span>5.0 Review(s)</span></li>
                </ul>
                <div class="price">
                    <span>$400.00</span>
                </div>
            </div>
        </div>
        <!-- End Single Product -->
    </div>
</div>
    </div>
</section>
<!-- End Trending Product Area -->

<!-- Start Banner Area -->
<section class="banner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="modern-banner" style="background-image:url('{{ asset('uploads/6.jpg') }}')">
                    <div class="banner-overlay"></div>
                    <div class="content">
                        <span class="category-tag">Featured</span>
                        <h2>Smart Watch 2.0</h2>
                        <p>Space Gray Aluminum Case with premium Black/Volt Real Sport Band for ultimate comfort and style</p>
                        <div class="banner-price">
                            <span class="price">$299.00</span>
                            <span class="discount">$350.00</span>
                        </div>
                        <div class="button">
                            <a href="product-grids.html" class="btn banner-btn">
                                View Details <i class="lni lni-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="modern-banner" style="background-image:url('{{ asset('uploads/5.jpg') }}')">
                    <div class="banner-overlay"></div>
                    <div class="content">
                        <span class="category-tag">New Arrival</span>
                        <h2>Smart Headphone</h2>
                        <p>Premium noise-cancelling headphones with crystal-clear sound quality and all-day comfort</p>
                        <div class="banner-price">
                            <span class="price">$199.00</span>
                            <span class="discount">$250.00</span>
                        </div>
                        <div class="button">
                            <a href="product-grids.html" class="btn banner-btn">
                                Shop Now <i class="lni lni-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!-- Start Special Offer -->
<section class="special-offer section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Special Offer</h2>
                    <p>Limited-time deals on premium products with exclusive discounts you won't find anywhere else.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{ asset('uploads/1.jpg') }}" alt="#" class="product-img">
                                <div class="product-overlay"></div>
                                <div class="button">
                                    <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">Camera</span>
                                <h4 class="title">
                                    <a href="product-grids.html">WiFi Security Camera</a>
                                </h4>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><span>5.0 Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    <span>$399.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{ asset('uploads/2.jpg') }}" alt="#" class="product-img">
                                <div class="product-overlay"></div>
                                <div class="button">
                                    <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">Laptop</span>
                                <h4 class="title">
                                    <a href="product-grids.html">Apple MacBook Air</a>
                                </h4>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><span>5.0 Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    <span>$899.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{ asset('uploads/3.jpg') }}" alt="#" class="product-img">
                                <div class="product-overlay"></div>
                                <div class="button">
                                    <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">Speaker</span>
                                <h4 class="title">
                                    <a href="product-grids.html">Bluetooth Speaker</a>
                                </h4>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star"></i></li>
                                    <li><span>4.0 Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    <span>$70.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                </div>
                <!-- Start Banner -->
                <div class="single-banner modern-banner" style="background-image:url('{{ asset('uploads/2.jpg') }}');">
                    <div class="banner-overlay"></div>
                    <div class="content">
                        <span class="badge">Featured Deal</span>
                        <h2>Samsung Notebook 9</h2>
                        <p>Ultra-thin, lightweight design with powerful performance and all-day battery life.</p>
                        <div class="price-tag">
                            <span class="regular-price">$650.00</span>
                            <span class="price">$590.00</span>
                        </div>
                        <div class="button">
                            <a href="product-grids.html" class="btn shop-now-btn">Shop Now <i class="lni lni-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Banner -->
            </div>
            <div class="col-lg-4 col-md-12 col-12">
                <div class="offer-content">
                    <div class="image">
                        <img src="{{ asset('uploads/4.jpg') }}" alt="#" class="offer-img">
                        <span class="sale-tag">-50%</span>
                        <div class="offer-overlay"></div>
                    </div>
                    <div class="text">
                        <span class="deal-badge">Hot Deal</span>
                        <h2><a href="product-grids.html">Premium Bluetooth Headphones</a></h2>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><span>5.0 Review(s)</span></li>
                        </ul>
                        <div class="price">
                            <span class="current-price">$200.00</span>
                            <span class="discount-price">$400.00</span>
                        </div>
                        <p>Noise-cancelling technology with premium sound quality and 30-hour battery life for immersive audio experience.</p>
                        
                        <div class="deal-counter-wrapper">
                            <h4>Hurry Up! Offer ends in:</h4>
                            <div class="deal-counter">
                                <div class="counter-item">
                                    <div class="counter-number" id="days">00</div>
                                    <div class="counter-text">Days</div>
                                </div>
                                <div class="counter-item">
                                    <div class="counter-number" id="hours">00</div>
                                    <div class="counter-text">Hours</div>
                                </div>
                                <div class="counter-item">
                                    <div class="counter-number" id="minutes">00</div>
                                    <div class="counter-text">Mins</div>
                                </div>
                                <div class="counter-item">
                                    <div class="counter-number" id="seconds">00</div>
                                    <div class="counter-text">Secs</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="offer-btn">
                            <a href="product-details.html" class="btn">Shop Now <i class="lni lni-arrow-right"></i></a>
                        </div>
                        
                        <!-- Deal Ended Alert (hidden by default) -->
                        <div class="deal-ended-alert">
                            <div class="alert-icon"><i class="lni lni-alarm-clock"></i></div>
                            <h3>We are sorry, this offer has ended!</h3>
                            <p>Check our other deals for more savings</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Special Offer -->

<!-- Start Home Product List -->
<section class="home-product-list section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                <h4 class="list-title">Best Sellers</h4>
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="https://via.placeholder.com/100x100" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">GoPro Hero4 Silver</a>
                        </h3>
                        <span>$287.99</span>
                    </div>
                </div>
                <!-- End Single List -->
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="https://via.placeholder.com/100x100" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">Puro Sound Labs BT2200</a>
                        </h3>
                        <span>$95.00</span>
                    </div>
                </div>
                <!-- End Single List -->
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="https://via.placeholder.com/100x100" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">HP OfficeJet Pro 8710</a>
                        </h3>
                        <span>$120.00</span>
                    </div>
                </div>
                <!-- End Single List -->
            </div>
            <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                <h4 class="list-title">New Arrivals</h4>
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="https://via.placeholder.com/100x100" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">iPhone X 256 GB Space Gray</a>
                        </h3>
                        <span>$1150.00</span>
                    </div>
                </div>
                <!-- End Single List -->
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="https://via.placeholder.com/100x100" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">Canon EOS M50 Mirrorless Camera</a>
                        </h3>
                        <span>$950.00</span>
                    </div>
                </div>
                <!-- End Single List -->
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="https://via.placeholder.com/100x100" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">Microsoft Xbox One S</a>
                        </h3>
                        <span>$298.00</span>
                    </div>
                </div>
                <!-- End Single List -->
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <h4 class="list-title">Top Rated</h4>
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="https://via.placeholder.com/100x100" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">Samsung Gear 360 VR Camera</a>
                        </h3>
                        <span>$68.00</span>
                    </div>
                </div>
                <!-- End Single List -->
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="https://via.placeholder.com/100x100" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">Samsung Galaxy S9+ 64 GB</a>
                        </h3>
                        <span>$840.00</span>
                    </div>
                </div>
                <!-- End Single List -->
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="https://via.placeholder.com/100x100" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">Zeus Bluetooth Headphones</a>
                        </h3>
                        <span>$28.00</span>
                    </div>
                </div>
                <!-- End Single List -->
            </div>
        </div>
    </div>
</section>
<!-- End Home Product List -->

<!-- Start Brands Area -->
<div class="brands">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                <h2 class="title">Popular Brands</h2>
            </div>
        </div>
        <div class="brands-logo-wrapper">
            <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
                <div class="brand-logo">
                    <img src="https://via.placeholder.com/220x160" alt="#">
                </div>
                <div class="brand-logo">
                    <img src="https://via.placeholder.com/220x160" alt="#">
                </div>
                <div class="brand-logo">
                    <img src="https://via.placeholder.com/220x160" alt="#">
                </div>
                <div class="brand-logo">
                    <img src="https://via.placeholder.com/220x160" alt="#">
                </div>
                <div class="brand-logo">
                    <img src="https://via.placeholder.com/220x160" alt="#">
                </div>
                <div class="brand-logo">
                    <img src="https://via.placeholder.com/220x160" alt="#">
                </div>
                <div class="brand-logo">
                    <img src="https://via.placeholder.com/220x160" alt="#">
                </div>
                <div class="brand-logo">
                    <img src="https://via.placeholder.com/220x160" alt="#">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Brands Area -->

<!-- Start Blog Section Area -->
<section class="blog-section section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Our Latest News</h2>
                    <p>There are many variations of passages of Lorem
                        Ipsum available, but the majority have suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Blog -->
                <div class="single-blog">
                    <div class="blog-img">
                        <a href="blog-single-sidebar.html">
                            <img src="https://via.placeholder.com/370x215" alt="#">
                        </a>
                    </div>
                    <div class="blog-content">
                        <a class="category" href="javascript:void(0)">eCommerce</a>
                        <h4>
                            <a href="blog-single-sidebar.html">What information is needed for shipping?</a>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt.</p>
                        <div class="button">
                            <a href="javascript:void(0)" class="btn">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Blog -->
                <div class="single-blog">
                    <div class="blog-img">
                        <a href="blog-single-sidebar.html">
                            <img src="https://via.placeholder.com/370x215" alt="#">
                        </a>
                    </div>
                    <div class="blog-content">
                        <a class="category" href="javascript:void(0)">Gaming</a>
                        <h4>
                            <a href="blog-single-sidebar.html">Interesting fact about gaming consoles</a>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt.</p>
                        <div class="button">
                            <a href="javascript:void(0)" class="btn">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Blog -->
                <div class="single-blog">
                    <div class="blog-img">
                        <a href="blog-single-sidebar.html">
                            <img src="https://via.placeholder.com/370x215" alt="#">
                        </a>
                    </div>
                    <div class="blog-content">
                        <a class="category" href="javascript:void(0)">Electronic</a>
                        <h4>
                            <a href="blog-single-sidebar.html">Electronics, instrumentation & control engineering
                            </a>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt.</p>
                        <div class="button">
                            <a href="javascript:void(0)" class="btn">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
        </div>
    </div>
</section>
<!-- End Blog Section Area -->

<!-- Start Shipping Info -->
<section class="shipping-info">
    <div class="container">
        <ul>
            <!-- Free Shipping -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-delivery"></i>
                </div>
                <div class="media-body">
                    <h5>Free Shipping</h5>
                    <span>On order over $99</span>
                </div>
            </li>
            <!-- Money Return -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-support"></i>
                </div>
                <div class="media-body">
                    <h5>24/7 Support.</h5>
                    <span>Live Chat Or Call.</span>
                </div>
            </li>
            <!-- Support 24/7 -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-credit-cards"></i>
                </div>
                <div class="media-body">
                    <h5>Online Payment.</h5>
                    <span>Secure Payment Services.</span>
                </div>
            </li>
            <!-- Safe Payment -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-reload"></i>
                </div>
                <div class="media-body">
                    <h5>Easy Return.</h5>
                    <span>Hassle Free Shopping.</span>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- End Shipping Info -->


@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<style>
    /* Hero Area Styles */
    /* Modern Featured Categories Styles */
.featured-categories {
    padding: 70px 0;
    background-color: #f9f9f9;
}

.section-title {
    text-align: center;
    margin-bottom: 50px;
}

.section-title h2 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 15px;
    position: relative;
    display: inline-block;
}

.section-title h2:after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: -10px;
    transform: translateX(-50%);
    width: 70px;
    height: 3px;
    background: linear-gradient(45deg, #ff6b6b, #ff9f43);
    border-radius: 10px;
}

.section-title p {
    font-size: 16px;
    max-width: 600px;
    margin: 0 auto;
    color: #666;
    line-height: 1.6;
    margin-top: 20px;
}

/* Modern Category Styles */
.modern-category {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    margin-bottom: 30px;
    transition: all 0.3s ease;
    position: relative;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.modern-category:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.category-image {
    position: relative;
    overflow: hidden;
    height: 180px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f5f5f5;
}

.category-image img {
    transition: all 0.5s ease;
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
}

.modern-category:hover .category-image img {
    transform: scale(1.1);
}
/* Product Image Standardization */
.product-image {
    position: relative;
    overflow: hidden;
    border-radius: 8px 8px 0 0;
    height: 280px; /* Fixed height for all product images */
    background-color: #f9f9f9;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-image img.product-img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* This ensures the image covers the area without distortion */
    transition: transform 0.4s ease;
}

/* Optional: Add a nice hover effect */
.product-image:hover img.product-img {
    transform: scale(1.05);
}

/* Make sure the sale and new tags are properly positioned */
.sale-tag, .new-tag {
    position: absolute;
    top: 10px;
    left: 10px;
    padding: 5px 10px;
    font-size: 12px;
    font-weight: 600;
    border-radius: 4px;
    z-index: 2;
}

.sale-tag {
    background-color: #ff6b6b;
    color: #fff;
}

.new-tag {
    background-color: #4e54c8;
    color: #fff;
}

/* Ensure the button appears on hover */
.product-image .button {
    position: absolute;
    bottom: -50px;
    left: 0;
    right: 0;
    text-align: center;
    transition: all 0.4s ease;
    opacity: 0;
    z-index: 2;
}

.single-product:hover .product-image .button {
    bottom: 20px;
    opacity: 1;
}

/* Improve the overall product card appearance */
.single-product {
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    margin-bottom: 30px;
    overflow: hidden;
}

.single-product:hover {
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transform: translateY(-5px);
}

.product-info {
    padding: 20px;
}

.product-info .title {
    margin-top: 10px;
    margin-bottom: 10px;
    font-size: 16px;
    font-weight: 600;
}

.product-info .title a {
    color: #333;
    text-decoration: none;
}

.product-info .title a:hover {
    color: #ff6b6b;
}

.product-info .category {
    color: #777;
    font-size: 13px;
    display: block;
    margin-bottom: 5px;
}

.product-info .price {
    margin-top: 15px;
    font-weight: 700;
    color: #333;
    font-size: 18px;
}

.product-info .price .discount-price {
    text-decoration: line-through;
    color: #999;
    margin-left: 10px;
    font-size: 14px;
    font-weight: 400;
}

/* Review stars styling */
.product-info .review {
    margin: 0;
    padding: 0;
    list-style: none;
    display: flex;
    align-items: center;
    margin-top: 5px;
}

.product-info .review li {
    margin-right: 2px;
    font-size: 14px;
    color: #ffb800;
}

.product-info .review li:last-child {
    margin-right: 0;
    margin-left: 5px;
    color: #777;
    font-size: 12px;
}
.category-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.2) 100%);
    opacity: 0;
    transition: all 0.3s ease;
}
/* Modern Special Offer Styles */
.special-offer {
    padding: 70px 0;
    background-color: #f9f9f9;
}

.section-title {
    text-align: center;
    margin-bottom: 50px;
}

.section-title h2 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 15px;
    position: relative;
    display: inline-block;
}

.section-title h2:after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: -10px;
    transform: translateX(-50%);
    width: 70px;
    height: 3px;
    background: linear-gradient(45deg, #ff6b6b, #ff9f43);
    border-radius: 10px;
}
/* Modern Banner Section Styles */
.banner-section {
    padding: 70px 0;
    background-color: #f9f9f9;
}

.modern-banner {
    position: relative;
    height: 400px;
    border-radius: 12px;
    overflow: hidden;
    background-size: cover;
    background-position: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    transition: all 0.3s ease;
}

.modern-banner:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.banner-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.2) 100%);
    z-index: 1;
    transition: all 0.3s ease;
}

.modern-banner:hover .banner-overlay {
    background: linear-gradient(to right, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.3) 100%);
}

.modern-banner .content {
    position: relative;
    z-index: 2;
    padding: 40px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    max-width: 80%;
}

.category-tag {
    display: inline-block;
    background: linear-gradient(45deg, #ff6b6b, #ff9f43);
    color: #fff;
    padding: 6px 16px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
    transform: translateY(0);
    transition: all 0.3s ease;
}

.modern-banner:hover .category-tag {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(255, 107, 107, 0.4);
}

.modern-banner h2 {
    color: #fff;
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 15px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    transform: translateY(0);
    transition: all 0.3s ease 0.1s;
}

.modern-banner:hover h2 {
    transform: translateY(-3px);
}

.modern-banner p {
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 25px;
    font-size: 15px;
    line-height: 1.6;
    max-width: 90%;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    transform: translateY(0);
    transition: all 0.3s ease 0.2s;
}

.modern-banner:hover p {
    transform: translateY(-3px);
}

.banner-price {
    margin-bottom: 25px;
    transform: translateY(0);
    transition: all 0.3s ease 0.3s;
}

.modern-banner:hover .banner-price {
    transform: translateY(-3px);
}

.banner-price .price {
    color: #fff;
    font-size: 24px;
    font-weight: 700;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.banner-price .discount {
    text-decoration: line-through;
    color: rgba(255, 255, 255, 0.7);
    font-size: 18px;
    margin-left: 10px;
}

.banner-btn {
    background: linear-gradient(45deg, #ff6b6b, #ff9f43);
    border: none;
    color: #fff;
    padding: 12px 25px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 15px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transform: translateY(0);
    transition: all 0.3s ease 0.4s;
}

.modern-banner:hover .banner-btn {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(255, 107, 107, 0.4);
}

.banner-btn:hover {
    background: linear-gradient(45deg, #ff9f43, #ff6b6b);
    transform: translateY(-2px) !important;
    box-shadow: 0 10px 25px rgba(255, 107, 107, 0.5) !important;
}

.banner-btn i {
    font-size: 14px;
    transition: transform 0.3s ease;
}

.banner-btn:hover i {
    transform: translateX(3px);
}

/* Responsive Styles */
@media (max-width: 991px) {
    .banner-section {
        padding: 50px 0;
    }
    
    .modern-banner {
        height: 350px;
    }
    
    .modern-banner .content {
        padding: 30px;
    }
    
    .modern-banner h2 {
        font-size: 28px;
    }
}

@media (max-width: 767px) {
    .modern-banner {
        height: 300px;
    }
    
    .modern-banner .content {
        padding: 25px;
        max-width: 90%;
    }
    
    .modern-banner h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }
    
    .modern-banner p {
        font-size: 14px;
        margin-bottom: 15px;
    }
    
    .banner-price {
        margin-bottom: 20px;
    }
    
    .banner-price .price {
        font-size: 20px;
    }
    
    .banner-price .discount {
        font-size: 16px;
    }
    
    .banner-btn {
        padding: 10px 20px;
        font-size: 14px;
    }
}

@media (max-width: 575px) {
    .banner-section {
        padding: 40px 0;
    }
    
    .modern-banner {
        height: 250px;
    }
    
    .modern-banner .content {
        padding: 20px;
    }
    
    .category-tag {
        padding: 5px 12px;
        font-size: 10px;
        margin-bottom: 10px;
    }
    
    .modern-banner h2 {
        font-size: 20px;
    }
    
    .modern-banner p {
        font-size: 12px;
        margin-bottom: 12px;
    }
    
    .banner-price .price {
        font-size: 18px;
    }
    
    .banner-price .discount {
        font-size: 14px;
    }
}
.section-title p {
    font-size: 16px;
    max-width: 600px;
    margin: 0 auto;
    color: #666;
    line-height: 1.6;
    margin-top: 20px;
}

/* Product Styles */
.product-image {
    position: relative;
    overflow: hidden;
    border-radius: 8px 8px 0 0;
    height: 220px;
    background-color: #f5f5f5;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.2) 100%);
    opacity: 0;
    transition: all 0.3s ease;
}

.single-product:hover .product-overlay {
    opacity: 1;
}

.single-product:hover .product-img {
    transform: scale(1.05);
}

.product-image .button {
    position: absolute;
    bottom: -50px;
    left: 0;
    right: 0;
    text-align: center;
    transition: all 0.4s ease;
    opacity: 0;
    z-index: 2;
}

.single-product:hover .product-image .button {
    bottom: 20px;
    opacity: 1;
}

.product-image .button .btn {
    background: linear-gradient(45deg, #ff6b6b, #ff9f43);
    color: #fff;
    border: none;
    padding: 8px 20px;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
    transition: all 0.3s ease;
}

.product-image .button .btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(255, 107, 107, 0.4);
}

.single-product {
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    margin-bottom: 30px;
    overflow: hidden;
}

.single-product:hover {
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transform: translateY(-5px);
}

.product-info {
    padding: 20px;
}

.product-info .category {
    color: #777;
    font-size: 13px;
    display: block;
    margin-bottom: 5px;
}

.product-info .title {
    margin-top: 10px;
    margin-bottom: 10px;
    font-size: 16px;
    font-weight: 600;
}

.product-info .title a {
    color: #333;
    text-decoration: none;
}

.product-info .title a:hover {
    color: #ff6b6b;
}

.product-info .review {
    margin: 0;
    padding: 0;
    list-style: none;
    display: flex;
    align-items: center;
    margin-top: 5px;
}

.product-info .review li {
    margin-right: 2px;
    font-size: 14px;
    color: #ffb800;
}

.product-info .review li:last-child {
    margin-right: 0;
    margin-left: 5px;
    color: #777;
    font-size: 12px;
}

.product-info .price {
    margin-top: 15px;
    font-weight: 700;
    color: #333;
    font-size: 18px;
}

/* Modern Banner Styles */
.modern-banner {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    height: 250px;
    background-size: cover;
    background-position: center;
    margin-top: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.banner-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.1) 100%);
    z-index: 1;
}

.modern-banner .content {
    position: relative;
    z-index: 2;
    padding: 30px;
    max-width: 60%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.modern-banner .badge {
    display: inline-block;
    background: #4e54c8;
    color: #fff;
    padding: 5px 15px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 5px 15px rgba(78, 84, 200, 0.3);
}

.modern-banner h2 {
    color: #fff;
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 10px;
}

.modern-banner p {
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 20px;
    font-size: 14px;
}

.price-tag {
    margin-bottom: 20px;
}

.price-tag .regular-price {
    text-decoration: line-through;
    color: rgba(255, 255, 255, 0.6);
    font-size: 16px;
    margin-right: 10px;
}

.price-tag .price {
    color: #fff;
    font-size: 24px;
    font-weight: 700;
}

.shop-now-btn {
    background: linear-gradient(45deg, #ff6b6b, #ff9f43);
    border: none;
    color: #fff;
    padding: 10px 25px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.shop-now-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(255, 107, 107, 0.4);
    background: linear-gradient(45deg, #ff9f43, #ff6b6b);
}

/* Offer Content Styles */
.offer-content {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    height: 100%;
    display: flex;
    flex-direction: column;
}

.offer-content .image {
    position: relative;
    height: 300px;
    overflow: hidden;
}

.offer-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.offer-content:hover .offer-img {
    transform: scale(1.05);
}

.offer-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.3) 100%);
}

.sale-tag {
    position: absolute;
    top: 20px;
    right: 20px;
    background: #ff6b6b;
    color: #fff;
    padding: 8px 15px;
    border-radius: 30px;
    font-size: 16px;
    font-weight: 700;
    z-index: 2;
    box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
}

.offer-content .text {
    padding: 30px;
    position: relative;
}

.deal-badge {
    display: inline-block;
    background: linear-gradient(45deg, #ff6b6b, #ff9f43);
    color: #fff;
    padding: 5px 15px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
}

.offer-content h2 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 15px;
}

.offer-content h2 a {
    color: #333;
    text-decoration: none;
    transition: all 0.3s ease;
}

.offer-content h2 a:hover {
    color: #ff6b6b;
}

.offer-content .price {
    margin: 15px 0;
}

.current-price {
    font-size: 24px;
    font-weight: 700;
    color: #333;
}

.discount-price {
    text-decoration: line-through;
    color: #999;
    font-size: 18px;
    margin-left: 10px;
}

.offer-content p {
    color: #666;
    margin-bottom: 20px;
    font-size: 14px;
    line-height: 1.6;
}

/* Deal Counter Styles */
.deal-counter-wrapper {
    background: #f9f9f9;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 25px;
}

.deal-counter-wrapper h4 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #333;
    text-align: center;
}

.deal-counter {
    display: flex;
    justify-content: space-between;
    gap: 10px;
}

.counter-item {
    background: #fff;
    border-radius: 8px;
    padding: 10px;
    min-width: 60px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
}

.counter-number {
    font-size: 24px;
    font-weight: 700;
    color: #ff6b6b;
    line-height: 1;
}

.counter-text {
    font-size: 12px;
    color: #777;
    margin-top: 5px;
}

.offer-btn {
    text-align: center;
}

.offer-btn .btn {
    background: linear-gradient(45deg, #ff6b6b, #ff9f43);
    border: none;
    color: #fff;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.offer-btn .btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(255, 107, 107, 0.4);
    background: linear-gradient(45deg, #ff9f43, #ff6b6b);
}

/* Deal Ended Alert Styles */
.deal-ended-alert {
    background: #f8d7da;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    margin-top: 20px;
    display: none; /* Hidden by default, show with JavaScript when timer ends */
}

.alert-icon {
    font-size: 30px;
    color: #dc3545;
    margin-bottom: 10px;
}

.deal-ended-alert h3 {
    color: #721c24;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.deal-ended-alert p {
    color: #721c24;
    font-size: 14px;
    margin-bottom: 0;
}

/* Responsive Styles */
@media (max-width: 991px) {
    .modern-banner .content {
        max-width: 80%;
    }
    
    .modern-banner h2 {
        font-size: 24px;
    }
    
    .offer-content .image {
        height: 250px;
    }
}

@media (max-width: 767px) {
    .special-offer {
        padding: 50px 0;
    }
    
    .section-title h2 {
        font-size: 28px;
    }
    
    .modern-banner {
        height: 200px;
    }
    
    .modern-banner .content {
        max-width: 100%;
        padding: 20px;
    }
    
    .modern-banner h2 {
        font-size: 20px;
    }
    
    .price-tag .price {
        font-size: 20px;
    }
    
    .counter-item {
        min-width: 50px;
        padding: 8px;
    }
    
    .counter-number {
        font-size: 20px;
    }
    
    .counter-text {
        font-size: 10px;
    }
}
.modern-category:hover .category-overlay {
    opacity: 1;
}

.category-content {
    padding: 20px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.category-heading {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 15px;
    color: #333;
    position: relative;
    padding-bottom: 10px;
}

.category-heading:after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 40px;
    height: 2px;
    background: #ff6b6b;
    border-radius: 10px;
}

.category-list {
    list-style: none;
    padding: 0;
    margin: 0;
    flex-grow: 1;
}

.category-list li {
    margin-bottom: 8px;
    position: relative;
}

.category-list li a {
    color: #666;
    font-size: 14px;
    transition: all 0.3s ease;
    display: inline-block;
    text-decoration: none;
}

.category-list li a:hover {
    color: #ff6b6b;
    transform: translateX(5px);
}

.category-list li a.view-all {
    color: #ff6b6b;
    font-weight: 600;
    margin-top: 5px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.category-list li a.view-all i {
    font-size: 12px;
    transition: all 0.3s ease;
}

.category-list li a.view-all:hover i {
    transform: translateX(3px);
}

/* Responsive Styles */
@media (max-width: 991px) {
    .featured-categories {
        padding: 50px 0;
    }
    
    .section-title h2 {
        font-size: 28px;
    }
}

@media (max-width: 767px) {
    .featured-categories {
        padding: 40px 0;
    }
    
    .section-title h2 {
        font-size: 24px;
    }
    
    .section-title p {
        font-size: 14px;
    }
    
    .category-heading {
        font-size: 18px;
    }
}
    .hero-area {
        padding: 40px 0;
        background-color: #f9f9f9;
        overflow: hidden;
    }

    /* Main Slider Styles */
    .hero-slider-container {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        height: 500px;
    }

    .hero-slider {
        height: 100%;
    }

    .single-slider {
        position: relative;
        height: 100%;
        display: flex;
        align-items: center;
    }

    .slider-image-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .slider-bg {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0.2) 100%);
        z-index: 2;
    }

    .single-slider .content {
        position: relative;
        z-index: 3;
        padding: 40px;
        max-width: 60%;
        color: white;
    }

    .badge-offer {
        display: inline-block;
        background-color: var(--primary-color, #0167F3);
        color: white;
        padding: 6px 15px;
        border-radius: 30px;
        font-size: 14px;
        margin-bottom: 15px;
        font-weight: 500;
        box-shadow: 0 2px 10px rgba(1, 103, 243, 0.3);
    }

    .slider-title {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 15px;
        color: white;
    }

    .slider-text {
        margin-bottom: 20px;
        font-size: 16px;
        line-height: 1.6;
    }

    .price-container {
        display: flex;
        align-items: baseline;
        gap: 10px;
        margin-bottom: 25px;
    }

    .price-label {
        font-size: 16px;
        font-weight: 400;
    }

    .price {
        font-size: 28px;
        font-weight: 700;
        color: white;
    }

    .btn {
        background-color: var(--primary-color, #0167F3);
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 30px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn:hover {
        background-color: var(--primary-color-dark, #0156cc);
        transform: translateY(-3px);
        box-shadow: 0 10px 15px rgba(1, 103, 243, 0.2);
    }

    /* Swiper customization */
    .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background: white;
        opacity: 0.5;
    }

    .swiper-pagination-bullet-active {
        opacity: 1;
        background: var(--primary-color, #0167F3);
    }

    .swiper-button-next, 
    .swiper-button-prev {
        color: white;
        background: rgba(255, 255, 255, 0.2);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-button-next:hover, 
    .swiper-button-prev:hover {
        background: var(--primary-color, #0167F3);
    }

    .swiper-button-next:after, 
    .swiper-button-prev:after {
        font-size: 18px;
    }

    /* Small Banner Styles */
    .hero-small-banner {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        height: 220px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    .banner-image-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .banner-bg {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hero-small-banner .content {
        position: relative;
        z-index: 3;
        padding: 25px;
        color: white;
    }

    .banner-title {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 10px;
        color: white;
    }

    .banner-price {
        font-size: 24px;
        font-weight: 700;
        color: white;
        margin-bottom: 15px;
    }

    .banner-btn {
        display: inline-block;
        padding: 8px 20px;
        background-color: white;
        color: var(--primary-color, #0167F3);
        border-radius: 30px;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .banner-btn:hover {
        background-color: var(--primary-color, #0167F3);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(255, 255, 255, 0.2);
    }

    /* Weekly Sale Banner */
    .weekly-sale {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sale-icon {
        font-size: 30px;
        margin-bottom: 15px;
        background: rgba(255, 255, 255, 0.2);
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }

    .weekly-sale .content {
        width: 100%;
    }

    .banner-text {
        margin-bottom: 20px;
        font-size: 15px;
    }

    .sale-timer {
        margin-top: 20px;
    }

    .countdown {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .countdown-item {
        background: rgba(255, 255, 255, 0.2);
        padding: 8px 12px;
        border-radius: 5px;
        min-width: 50px;
    }

    .countdown-item span {
        font-size: 18px;
        font-weight: 700;
        display: block;
    }

    .countdown-item p {
        font-size: 12px;
        margin: 0;
    }

    /* Responsive Adjustments */
    @media (max-width: 991px) {
        .hero-slider-container {
            height: 400px;
            margin-bottom: 30px;
        }
        
        .single-slider .content {
            max-width: 80%;
        }
    }

    @media (max-width: 767px) {
        .hero-slider-container {
            height: 350px;
        }
        
        .single-slider .content {
            max-width: 90%;
            padding: 20px;
        }
        
        .slider-title {
            font-size: 24px;
        }
        
        .hero-small-banner {
            margin-bottom: 20px;
        }
    }

    @media (max-width: 576px) {
        .single-slider .content {
            max-width: 100%;
        }
        
        .price-container {
            flex-direction: column;
            gap: 5px;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Initialize countdown timer
    initCountdownTimer();
});
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effect for banners
    const banners = document.querySelectorAll('.modern-banner');
    
    banners.forEach(banner => {
        // Optional: Add parallax effect on mouse move
        banner.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const xPercent = x / rect.width;
            const yPercent = y / rect.height;
            
            // Subtle movement of background
            this.style.backgroundPosition = `${50 + (xPercent - 0.5) * 10}% ${50 + (yPercent - 0.5) * 10}%`;
        });
        
        // Reset position on mouse leave
        banner.addEventListener('mouseleave', function() {
            this.style.backgroundPosition = 'center';
        });
    });
});
function initCountdownTimer() {
    // Set the countdown date (7 days from now)
    const countdownDate = new Date();
    countdownDate.setDate(countdownDate.getDate() + 7);
    
    // Update the countdown every second
    const countdownTimer = setInterval(function() {
        // Get current date and time
        const now = new Date().getTime();
        
        // Find the distance between now and the countdown date
        const distance = countdownDate - now;
        
        // Time calculations for days, hours, minutes and seconds
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        // Display the result
        document.getElementById('days').textContent = days < 10 ? '0' + days : days;
        document.getElementById('hours').textContent = hours < 10 ? '0' + hours : hours;
        document.getElementById('minutes').textContent = minutes < 10 ? '0' + minutes : minutes;
        document.getElementById('seconds').textContent = seconds < 10 ? '0' + seconds : seconds;
        
        // If the countdown is finished, show the deal ended alert
        if (distance < 0) {
            clearInterval(countdownTimer);
            document.getElementById('days').textContent = '00';
            document.getElementById('hours').textContent = '00';
            document.getElementById('minutes').textContent = '00';
            document.getElementById('seconds').textContent = '00';
            
            // Show the deal ended alert
            document.querySelector('.deal-ended-alert').style.display = 'block';
            document.querySelector('.deal-counter-wrapper').style.display = 'none';
            document.querySelector('.offer-btn').style.display = 'none';
        }
    }, 1000);
    
    // Add hover effects to product images
    const productImages = document.querySelectorAll('.product-img');
    productImages.forEach(img => {
        img.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
        });
        
        img.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
}
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the hero slider
        const heroSwiper = new Swiper('.hero-slider', {
            loop: true,
            effect: 'fade',
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        // Countdown timer for weekly sale
        function updateCountdown() {
            // Set the target date (1 week from now)
            const now = new Date();
            const targetDate = new Date();
            targetDate.setDate(now.getDate() + 7);
            
            // Calculate the time difference
            const diff = targetDate - now;
            
            // Calculate days, hours, minutes, seconds
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);
            
            // Update the countdown
            document.getElementById('days').textContent = days.toString().padStart(2, '0');
            document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
            document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
        }
        
        // Initial call and set interval
        updateCountdown();
        setInterval(updateCountdown, 1000);
        
        // Add hover effects for buttons
        const buttons = document.querySelectorAll('.btn, .banner-btn');
        buttons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>
@endpush