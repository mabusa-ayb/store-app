<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>SL2 | @yield('title').</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('public/assets/images/favicon.png') }}">
    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/magnific-popup.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/font-awesome.css') }}">
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/jquery.fancybox.min.css') }}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/themify-icons.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/niceselect.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/animate.css') }}">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/flex-slider.min.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('/assets/css/owl-carousel.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/slicknav.min.css') }}">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/responsive.css') }}">
    @stack('css')
</head>
<body class="js">

<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- End Preloader -->
<!-- header -->
@include('front.inc.header')
<!--/ End header -->

@yield('content')

<!-- footer -->
@include('front.inc.footer')
<!--/ End footer -->

<!-- Jquery -->
<script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery-migrate-3.0.0.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery-ui.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('public/assets/js/popper.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
<!-- Color JS -->
<script src="{{ asset('public/assets/js/colors.html') }}"></script>
<!-- Slicknav JS -->
<script src="{{ asset('public/assets/js/slicknav.min.js') }}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('public/assets/js/owl-carousel.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('public/assets/js/magnific-popup.js') }}"></script>
<!-- Fancybox JS -->
<script src="{{ asset('public/assets/js/facnybox.min.js') }}"></script>
<!-- Waypoints JS -->
<script src="{{ asset('public/assets/js/waypoints.min.js') }}"></script>
<!-- Countdown JS -->
<script src="{{ asset('public/assets/js/finalcountdown.min.js') }}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('public/assets/js/nicesellect.js') }}"></script>
<!-- Ytplayer JS -->
<script src="{{ asset('public/assets/js/ytplayer.min.js') }}"></script>
<!-- Flex Slider JS -->
<script src="{{ asset('public/assets/js/flex-slider.js') }}"></script>
<!-- ScrollUp JS -->
<script src="{{ asset('public/assets/js/scrollup.js') }}"></script>
<!-- Onepage Nav JS -->
<script src="{{ asset('public/assets/js/onepage-nav.min.js') }}"></script>
<!-- Easing JS -->
<script src="{{ asset('public/assets/js/easing.js') }}"></script>
<!-- Active JS -->
<script src="{{ asset('public/assets/js/active.js') }}"></script>
@include('front.inc.add-alert')
@stack('js')
</body>

</html>
