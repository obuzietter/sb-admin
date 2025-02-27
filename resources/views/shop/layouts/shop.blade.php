<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <title>@yield('title')</title>

        {{-- head links --}}
        @include('shop.layouts.components.head-links')

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