<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Eduhome - Educational HTML Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="./img/favicon.png">

        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/meanmenu.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/et-line-icon.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/reset.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
        <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    </head>
    <body>
        @include('frontend.partials.header')
        <!-- Main Wrapper Start -->
        @yield('content')
        @include('frontend.partials.footer')
        <!-- Footer End -->
        <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.meanmenu.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/ajax-mail.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.mb.YTPlayer.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    </body>
</html>
