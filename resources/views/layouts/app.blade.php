<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Academy - E-learning</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('favicon.ico')}}">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    @yield('css')

</head>

<body>
    <div id="container">

        <!-- ##### Preloader ##### -->
        <div id="preloader">
            <i class="circle-preloader"></i>
        </div>

        <!-- ##### Header Area Start ##### -->

    @if(Auth::guard('web')->check())

        @include('inc.user_header')


    @elseif(Auth::guard('teacher')->check())

        @include('inc.teacher_header')

    @else
        @include('inc.header')
    @endif
    <!-- ##### Header Area End ##### -->

    @yield('content')

    <!-- ##### Footer Area Start ##### -->
    @include('inc.footer')
    <!-- ##### Footer Area Start ##### -->

        <!-- ##### All Javascript Script ##### -->
        <!-- jQuery-2.2.4 js -->
        <script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
        <!-- Popper js -->
        <script src="{{asset('js/bootstrap/popper.min.js')}}"></script>
        <!-- Bootstrap js -->
        <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>

        <!-- All Plugins js -->
        <script src="{{asset('js/plugins/plugins.js')}}"></script>
        <!-- Active js -->
        <script src="{{asset('js/active.js')}}"></script>


        @yield('js')
    </div>

</body>

</html>