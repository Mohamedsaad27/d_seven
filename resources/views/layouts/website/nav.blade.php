    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Start Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-left">
                            <!-- <ul class="menu-top-link">
                                <li>
                                    <div class="select-position">
                                        <select id="select5">
                                            <option value="0" selected>English</option>
                                            <option value="1">العربية</option>
                                        </select>
                                    </div>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                            <ul class="useful-links">
                                <li><a href="{{route('index')}}">Home</a></li>
                                <li><a href="{{route('aboutUs')}}">About Us</a></li>
                                <li><a href="{{route('contact.index')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
    <div class="top-end">
        @if(Auth::check() && Auth::user()->is_active == 1)
            <div class="user">
                <i class="lni lni-user"></i>
                @if(Auth::user()->name_en)
                    Hello, {{ Auth::user()->name_en }}
                @else
                    Hello, {{ Auth::user()->name_ar }}
                @endif
            </div>
            <ul class="user-login">
                <li>
                    <a href="{{ route('myAccount') }}">My Account</a>
                </li>
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
            @else
            <div class="user">
                <i class="lni lni-user"></i>
                Hello
            </div>
            <ul class="user-login">
            @if(Auth::check() && Auth::user()->is_active == 0)
                <li>
                    <a href="{{ route('verification.form') }}">Verify Account</a>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}">Sign In</a>
                </li>
                <li>
                    <a href="{{ route('register') }}">Register</a>
                </li>
            @endauth
            </ul>
        @endauth
    </div>
</div>


                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="index.html">
                            <img src="assets/images/logo/logo.svg" alt="Logo">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <div class="navbar-search search-style-5">
                                <div class="search-select">
                                    <!-- <div class="select-position">
                                        <select id="select1">
                                            <option selected>All</option>
                                            <option value="1">option 01</option>
                                        </select>
                                    </div> -->
                                </div>
                                <div class="search-input">
                                    <input type="text" placeholder="Search">
                                </div>
                                <div class="search-btn">
                                    <button><i class="lni lni-search-alt"></i></button>
                                </div>
                            </div>
                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                            <i class="lni lni-phone-set"></i> <!-- Support hotline -->
                            <h3>Hotline:
                                    <span>(+20) 01021369699</span>
                                </h3>
                            </div>
                            <div class="navbar-cart">
                                <div class="wishlist">
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-heart"></i>
                                        <span class="total-items">0</span>
                                    </a>
                                </div>
                                <div class="cart-items">
                                <a href="{{ route('cart.index') }}" class="main-btn">
                                <i class="lni lni-cart"></i>
                                    @auth
                                        @php
                                            $cartItemsCount = \App\Models\Cart::where('user_id', auth()->id())
                                                ->withCount('cartItems')
                                                ->value('cart_items_count') ?? 0;
                                        @endphp
                                        <span class="total-items">{{ $cartItemsCount }}</span>
                                    @else
                                        <span class="total-items">0</span>
                                    @endauth
                                </a>
                                    <!-- Shopping Item -->
                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                            <span>@if(Auth::check()){{$cartItemsCount}} Items @else 0 Items @endif</span>
                                            <a href="{{route('cart.index')}}">View Cart</a>
                                        </div>
                                        <ul class="shopping-list">
                                            @auth
                                            @php
                                            $cart = \App\Models\Cart::with(['cartItems.product.productImages', 'cartItems.product.discounts', 'cartItems.color.color', 'cartItems.product.brand'])
                                                    ->where('user_id', auth()->id())
                                                    ->orderBy('created_at', 'desc')
                                                    ->first();
                                            @endphp
                                            @forelse($cart->cartItems as $cartItem)
                                            <li>
                                                <a href="javascript:void(0)" class="remove"
                                                    title="Remove this item"><i class="lni lni-close"></i></a>
                                                <div class="cart-img-head">
                                                    <a class="cart-img" href="{{route('product.show', $cartItem->product->id)}}"><img
                                                            src="{{asset($cartItem->product->productImages->where('is_primary', 1)->first()->image_url ?? 'uploads/default-product-image.jpg')}}"
                                                            alt="#"></a>
                                                </div>

                                                <div class="content">
                                                    <h4><a href="{{route('product.show', $cartItem->product->id)}}">
                                                            {{$cartItem->product->name_ar ? $cartItem->product->name_ar : $cartItem->product->name_en}}</a></h4>
                                                    <p class="quantity"><span class="amount">{{number_format($cartItem->price, 2)}} EGP</span></p>
                                                </div>
                                            </li>
                                           @empty
                                           <li>
                                                <p>No items in the cart</p>
                                           </li>
                                           @endforelse
                                            @else
                                            <li>
                                                <p>No items in the cart</p>
                                           </li>
                                            @endauth
                                        </ul>
                                        <div class="bottom">
                                            <div class="total">
                                                <span>Total</span>
                                                @auth
                                                <span class="total-amount">{{number_format($cart->cartItems->sum('price'), 2)}} EGP</span>
                                                @else
                                                <span class="total-amount">0 EGP</span>
                                                @endauth
                                            </div>
                                            <div class="button">
                                                <a href="{{route('cart.index')}}" class="btn animate">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Shopping Item -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
        <!-- Start Header Bottom -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="nav-inner">
                        @php
                        $categories = \App\Models\Category::whereNull('parent_category_id')
                        ->where('is_active', 1)
                        ->with(['children' => function ($q) {
                            $q->where('is_active', 1);
                        }])
                        ->get();
                        @endphp
                        <!-- Start Mega Category Menu -->
                        <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
                        <ul class="sub-category">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('product.index', $category->id) }}">
                                        {{ $category->name_en }}
                                        @if($category->children->count())
                                            <i class="lni lni-chevron-right"></i>
                                        @endif
                                    </a>

                                    @if($category->children->count())
                                        <ul class="inner-sub-category">
                                            @foreach($category->children as $child)
                                                <li>
                                                    <a href="{{ route('product.index', $child->id) }}">
                                                        {{ $child->name_en }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                            </ul>
                        </div>

                        <!-- End Mega Category Menu -->
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="{{route('index')}}" aria-label="Toggle navigation">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('aboutUs')}}" aria-label="Toggle navigation">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a aria-label="Toggle navigation" href="{{ route('product.index') }}">Products</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('contact.index')}}" aria-label="Toggle navigation">Contact Us</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Nav Social -->
                    <div class="nav-social">
                        <h5 class="title">Follow Us:</h5>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/profile.php?id=61570890732774"><i class="lni lni-facebook-filled"></i></a>
                            </li>
                            <li>
                                <a href="https://chat.whatsapp.com/LsE6xzbFvQHDFGFL6jppGZ">
                                <i class="lni lni-whatsapp"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://t.me/+EOgqegm9M_ZjMTk0"><i class="lni lni-telegram"></i></a>
                            </li>
                            <li>
                                <a href="https://vt.tiktok.com/ZShNaPGrL/"><i class="lni lni-tiktok"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/dseven_houseware?igsh=MXNtbDNzcDkzcHRzNg=="><i class="lni lni-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Nav Social -->
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->
    </header>
    <!-- End Header Area -->
