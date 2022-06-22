<html lang="en">
<head>
    <title>@yield('pageTitle')</title>
    <link rel="icon" href="{{asset("favicon.svg")}}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/responsive.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/fontawesome.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/animate.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/datatables.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/toastr.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <script type="text/javascript" src="{{asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.bundle.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/axios.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/config.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/datatables.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
</head>
<body class="body-background">
    @yield('content')
</body>
</html>

