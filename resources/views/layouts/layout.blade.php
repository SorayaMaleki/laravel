<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
{{--    <title>App Name - @yield('title')</title>--}}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" >
    <link href="{{asset('css/persianDatepicker-default.css')}}" rel="stylesheet" >
    <!-- Scripts -->
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/persianDatepicker.min.js')}}"></script>
</head>
<body>
@section('sidebar')
    This is the master sidebar.
@show
<div class="container">
    @yield('content')
</div>


</body>
</html>
