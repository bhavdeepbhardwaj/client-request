<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="ASHPLAN MEDIA | CLIENT REQUEST PORTAL">
    <meta name="author" content="Sandeep Rawat">
    <meta name="keywords" content="ASHPLAN MEDIA | CLIENT REQUEST PORTAL">

    <!-- Title Page-->

    <title>{{ config('app.name', 'ASHPLAN') }}</title>


  <!-- Fontfaces CSS-->
  <link href="{{ asset('css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('css/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" media="all">

    <!-- css CSS-->
    <link href="{{ asset('css/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" media="all">

    </head>

    <body class="animsition">

        <div class="page-wrapper">

        @include('partials.header.mobile')

      
           <!-- PAGE CONTAINER-->
           <div class="page-container">
           @include('partials.sidebar')
             @include('partials.header.desktop')


     
            <!-- MAIN CONTENT-->
            <div class="main-content">

            @yield('content')

          </div>

    </div>
     <!-- Jquery JS-->
     <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('js/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- css JS       -->
    <script src="{{ asset('js/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('js/wow/wow.min.js') }}"></script>
    <script src="{{ asset('js/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('js/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('js/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('js/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>