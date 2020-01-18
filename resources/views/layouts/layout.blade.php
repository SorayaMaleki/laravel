<!-- Stored in resources/views/layouts/master.blade.php -->
<html>
<head>
    <title>App Name - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/persianDatepicker.min.js')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/persianDatepicker-default.css')}}" rel="stylesheet" type="text/css" >

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
