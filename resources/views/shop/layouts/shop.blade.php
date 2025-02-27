<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        {{-- <title>Fruitables - Vegetable Website Template</title> --}}
        <title>@yield('title')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="/shop/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="/shop/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Template Stylesheet -->
        <link href="/shop/css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        @include('shop.layouts.components.spinner')
        <!-- Spinner End -->


        <!-- Navbar start -->
        @include('shop.layouts.components.navbar')
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        @include('shop.layouts.components.modal-search')
        <!-- Modal Search End -->


       @yield('content')

        <!-- Footer Start -->
        @include('shop.layouts.components.footer')
        <!-- Footer End -->

        <!-- Copyright Start -->
        @include('shop.layouts.components.copyright')
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
   @include('shop.layouts.components.js-links')
    </body>

</html>