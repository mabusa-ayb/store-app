<!DOCTYPE html>

<html lang="en">
<head>
    <!-- Removed by WebCopy --><!--<base href="./">--><!-- Removed by WebCopy -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>SL2 | @yield('title').</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="public/assets/images/favicon.png">

    <meta name="theme-color" content="#ffffff">

    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('public/coreui/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <meta name="robots" content="noindex">
    <script async="" src="{{ asset('public/coreui/gtag/js.js?id=UA-118965717-1') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-118965717-1');
    </script></head>
<body class="c-app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        @yield('content')
    </div>
</div>

<script src="{{ asset('public/coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
<!--[if IE]><!-->
<script src="{{ asset('public/coreui/vendors/@coreui/icons/js/svgxuse.min.js') }}"></script>
<!--<![endif]-->
</body>
</html>
