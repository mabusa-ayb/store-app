<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SL2 Online - @yield('title')</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset ('public/admin-assets/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset ('public/admin-assets/plugins/toastr/toastr.min.css') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('public/assets/images/favicon.png') }}">

    <meta name="theme-color" content="#ffffff">

    <link href="{{ asset('public/coreui/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('public/coreui/css/custom.css') }}" rel="stylesheet">

    <link href="{{ asset('public/coreui/vendors/@coreui/chartjs/css/coreui-chartjs.css') }}" rel="stylesheet">

    <!--Icomoon icons -->
    <link href="{{ asset('public/assets/js/dl-menu/component.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/svg/style.css')}}" rel="stylesheet">

    @stack('css')

    <meta name="robots" content="noindex">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>-->
    <script async="" src="{{ asset('public/coreui/gtag/js.js?id=UA-118965717-1') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-118965717-1');
    </script></head>
<body class="c-app">
@include('back.inc.sidebar')
<div class="c-wrapper c-fixed-components">
    @include('back.inc.topbar')
    @yield('content')
    @include('back.inc.footer')
</div>


<!-- jQuery -->
<script src="{{ asset ('public/admin-assets/js/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('public/coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
<!--[if IE]><!-->
<script src="{{ asset('public/coreui/vendors/@coreui/icons/js/svgxuse.min.js') }}"></script>
<!--<![endif]-->

<script src="{{ asset('public/coreui/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js') }}"></script>
<script src="{{ asset('public/coreui/vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
<script src="{{ asset('public/coreui/js/main.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset ('public/admin-assets/plugins/toastr/toastr.min.js') }}"></script>
{!! Toastr::render() !!}

@stack('js')

</body>
</html>
