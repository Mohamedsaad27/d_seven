@extends('layouts.website.master')

@section('title', 'Home Page')

@section('content')
   <!-- Start Hero Area -->
  <!-- Start Hero Area -->
  <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            <!-- Start Single Slider -->
                            <div class="single-slider"
                                style="background-image: url({{ asset('uploads/1.jpg') }});">
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
<section class="banner section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-banner" style="background-image:url('{{ asset('uploads/6.jpg') }}')">
                    <div class="content">
                        <h2>Smart Watch 2.0</h2>
                        <p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
                        <div class="button">
                            <a href="product-grids.html" class="btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-banner custom-responsive-margin"
                    style="background-image:url('{{ asset('uploads/5.jpg') }}')">
                    <div class="content">
                        <h2>Smart Headphone</h2>
                        <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                            incididunt ut labore.</p>
                        <div class="button">
                            <a href="product-grids.html" class="btn">Shop Now</a>
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
<section class="brands-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2>Popular Brands</h2>
                    <p>Shop your favorite products from trusted brands worldwide</p>
                </div>
            </div>
        </div>
        <div class="brands-container">
            <div class="brands-wrapper">
                <div class="brand-item">
                    <div class="brand-logo">
                        <img src="{{ asset('uploads/1.jpg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="brand-item">
                    <div class="brand-logo">
                        <img src="{{ asset('uploads/2.jpg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="brand-item">
                    <div class="brand-logo">
                        <img src="{{ asset('uploads/3.jpg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="brand-item">
                    <div class="brand-logo">
                        <img src="{{ asset('uploads/4.jpg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="brand-item">
                    <div class="brand-logo">
                        <img src="{{ asset('uploads/5.jpg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="brand-item">
                    <div class="brand-logo">
                        <img src="{{ asset('uploads/6.jpg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="brand-item">
                    <div class="brand-logo">
                        <img src="{{ asset('uploads/1.jpg') }}" alt="Brand Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Brands Area -->


<!-- Start Shipping Info -->
<section class="shipping-info-section">
    <div class="container">
        <div class="shipping-info-wrapper">
            <!-- Free Shipping -->
            <div class="shipping-info-item">
                <div class="info-icon">
                    <i class="lni lni-delivery"></i>
                </div>
                <div class="info-content">
                    <h4>Free Shipping</h4>
                    <p>On orders over $99</p>
                </div>
            </div>
            
            <!-- 24/7 Support -->
            <div class="shipping-info-item">
                <div class="info-icon">
                    <i class="lni lni-support"></i>
                </div>
                <div class="info-content">
                    <h4>24/7 Support</h4>
                    <p>Live chat or call</p>
                </div>
            </div>
            
            <!-- Online Payment -->
            <div class="shipping-info-item">
                <div class="info-icon">
                    <i class="lni lni-credit-cards"></i>
                </div>
                <div class="info-content">
                    <h4>Secure Payment</h4>
                    <p>100% secure checkout</p>
                </div>
            </div>
            
            <!-- Easy Return -->
            <div class="shipping-info-item">
                <div class="info-icon">
                    <i class="lni lni-reload"></i>
                </div>
                <div class="info-content">
                    <h4>Easy Returns</h4>
                    <p>30-day return policy</p>
                </div>
            </div>
        </div>
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
   

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0.2) 100%);
        z-index: 2;
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

   
    /* ========================
   Brands Section Styles
   ======================== */
.brands-section {
    padding: 70px 0;
    background-color: #f9f9f9;
}

.section-title {
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
    color: #666;
    max-width: 600px;
    margin: 0 auto;
    margin-top: 20px;
}

.brands-container {
    padding: 20px 0;
    position: relative;
    overflow: hidden;
}

.brands-container:before,
.brands-container:after {
    content: '';
    position: absolute;
    top: 0;
    width: 100px;
    height: 100%;
    z-index: 2;
    pointer-events: none;
}

.brands-container:before {
    left: 0;
    background: linear-gradient(to right, #f9f9f9, rgba(249, 249, 249, 0));
}

.brands-container:after {
    right: 0;
    background: linear-gradient(to left, #f9f9f9, rgba(249, 249, 249, 0));
}

.brands-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 30px;
    animation: scrollBrands 30s linear infinite;
    width: max-content;
}

@keyframes scrollBrands {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(calc(-150px * 3.5));
    }
}

.brand-item {
    flex: 0 0 150px;
    height: 100px;
    padding: 15px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.brand-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.brand-logo {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.brand-logo img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: all 0.3s ease;
    filter: grayscale(100%);
    opacity: 0.7;
}

.brand-item:hover .brand-logo img {
    filter: grayscale(0%);
    opacity: 1;
    transform: scale(1.05);
}

/* ========================
   Shipping Info Styles
   ======================== */
.shipping-info-section {
    padding: 70px 0;
    background-color: #fff;
}

.shipping-info-wrapper {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
}

.shipping-info-item {
    background: #fff;
    border-radius: 10px;
    padding: 30px 20px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    text-align: center;
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.shipping-info-item:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 0;
    background: linear-gradient(45deg, rgba(255, 107, 107, 0.05), rgba(255, 159, 67, 0.05));
    transition: all 0.5s ease;
    z-index: -1;
}

.shipping-info-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
}

.shipping-info-item:hover:before {
    height: 100%;
}

.info-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(45deg, #ff6b6b, #ff9f43);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    box-shadow: 0 10px 20px rgba(255, 107, 107, 0.3);
    transition: all 0.3s ease;
}

.shipping-info-item:hover .info-icon {
    transform: rotateY(180deg);
}

.info-icon i {
    font-size: 28px;
    color: #fff;
    transition: all 0.3s ease;
}

.info-content h4 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 10px;
    color: #333;
}

.info-content p {
    font-size: 14px;
    color: #666;
    margin: 0;
}

/* Responsive Styles */
@media (max-width: 991px) {
    .shipping-info-wrapper {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .brands-section,
    .shipping-info-section {
        padding: 50px 0;
    }
    
    .section-title h2 {
        font-size: 28px;
    }
}

@media (max-width: 767px) {
    .brand-item {
        flex: 0 0 130px;
        height: 90px;
    }
    
    .section-title h2 {
        font-size: 24px;
    }
    
    .section-title p {
        font-size: 14px;
    }
}

@media (max-width: 575px) {
    .shipping-info-wrapper {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .brands-section,
    .shipping-info-section {
        padding: 40px 0;
    }
    
    .brand-item {
        flex: 0 0 120px;
        height: 80px;
        padding: 10px;
    }
    
    .info-icon {
        width: 60px;
        height: 60px;
    }
    
    .info-icon i {
        font-size: 24px;
    }
    
    .info-content h4 {
        font-size: 16px;
    }
    
    .info-content p {
        font-size: 13px;
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
    // Clone brand items for infinite scroll effect
    const brandsWrapper = document.querySelector('.brands-wrapper');
    
    if (brandsWrapper) {
        const brandItems = document.querySelectorAll('.brand-item');
        
        // Clone the first set of brand items and append to the end
        brandItems.forEach(item => {
            const clone = item.cloneNode(true);
            brandsWrapper.appendChild(clone);
        });
        
        // Pause animation on hover
        brandsWrapper.addEventListener('mouseenter', function() {
            this.style.animationPlayState = 'paused';
        });
        
        brandsWrapper.addEventListener('mouseleave', function() {
            this.style.animationPlayState = 'running';
        });
    }
    
    // Add hover effects to shipping info items
    const shippingItems = document.querySelectorAll('.shipping-info-item');
    
    shippingItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            // Add a subtle pulse effect to the icon
            const icon = this.querySelector('.info-icon');
            icon.style.transform = 'scale(1.1) rotateY(180deg)';
            
            // Highlight the text
            const title = this.querySelector('h4');
            title.style.color = '#ff6b6b';
        });
        
        item.addEventListener('mouseleave', function() {
            const icon = this.querySelector('.info-icon');
            icon.style.transform = '';
            
            const title = this.querySelector('h4');
            title.style.color = '';
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
  
</script>
@endpush