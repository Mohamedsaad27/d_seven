<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preload" href="{{ asset('assets/css/front/bootstrap.min.css') }}" as="style">
    <link rel="preload" href="{{ asset('assets/css/front/LineIcons.3.0.css') }}" as="style">
    <link rel="preload" href="{{ asset('assets/css/front/tiny-slider.css') }}" as="style">
    <link rel="preload" href="{{ asset('assets/css/front/glightbox.min.css') }}" as="style">
    <link rel="preload" href="{{ asset('assets/css/front/main.css') }}" as="style">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.svg') }}" />

    <!-- ========================= CSS here ========================= -->
   
    @stack('styles')    

</head>

<body>