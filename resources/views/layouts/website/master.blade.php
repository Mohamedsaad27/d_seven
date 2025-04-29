<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.svg') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('assets/css/front/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/front/LineIcons.3.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/front/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/front/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/front/main.css') }}" />
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    @stack('styles')    
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    @include('layouts.website.nav')
    <!-- Main Content -->
    @yield('content')

    @include('layouts.website.footer')

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets/js/front/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/front/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/js/front/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/front/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    @stack('scripts')
</body>
</html>