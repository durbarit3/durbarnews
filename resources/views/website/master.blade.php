<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title','Durbarnews-Home')
    </title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/website/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/national.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/marquee.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/example.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/video.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>
    <!-- news header start -->
    @include('website.include.header_top')

    <!-- Mobile menu area start -->
    @include('website.include.mobile_menu')

    <!-- main menu area start -->
    @include('website.include.main_menu')
    
    <!-- recent post section start -->
    @yield('content')
        <!-- footer part -->

    @include('website.include.footer')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="{{asset('public/website/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('public/website/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/website/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/website/js/marquee.js')}}"></script>
    <script src="{{asset('public/website/js/lazyload.min.js')}}"></script>

    <script src="{{asset('public/website/js/main.js')}}"></script>

</body>

</html>