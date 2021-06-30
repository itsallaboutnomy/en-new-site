<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Enablers @yield('page-title')</title>

    <!-- Fontawesome Css -->
    <link href="{{ _asset('assets-app/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!--  Bootstrap Css -->
    <link href="{{ _asset('assets-app/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--  Owl Carousel Min Css -->
    <link href="{{ _asset('assets-app/css/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- Owl Theme Default -->
    <link href="{{ _asset('assets-app/css/owl.theme.default.min.css') }}" rel="stylesheet">

    <!--  Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">

    <!--  Animate css -->
    <link href="{{ _asset('assets-app/css/animate.min.css') }}" rel="stylesheet">
    <!-- Style Css -->
    <link href="{{ _asset('assets-app/css/style.css') }}" rel="stylesheet">

    <!-- Custom Style CSS -->
    @yield('styles')
    <style>
        .form-group.required .label:after {
            content:"*";
            color:red;
        }
        label.error.is-invalid{
            width: 100%;
            margin-top: .25rem;
            font-size: 1.5rem;
            color: #dc3545;
        }
    </style>
</head>
<body>

@include('enablers.app.layouts.header')

<!--   Start Main -->
<main id="main">

    @yield('content')

    @include('enablers.app.layouts.footer')
</main>

<!--  Jquery min -->
<script src="{{ _asset('assets-app/plugins/jquery/jquery.min.js') }}"></script>
<!--   bootstrap bundle -->
<script src="{{ _asset('assets-app/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!--  Jquery easing -->
<script src="{{ _asset('assets-app/plugins/jquery-easing/jquery.easing.min.js') }}"></script>
<!--   Owl carousel -->
<script src="{{ _asset('assets-app/js/owl.carousel.js') }}"></script>
<!-- custom  js -->
<script src="{{ _asset('assets-app/js/custom.js') }}"></script>

<!-- Custom Scripts -->
<script>
    var datetimepickerIcons = {
        time:'fa fa-clock-o',
        date:'fa fa-calendar',
        up:'fa fa-chevron-up',
        down:'fa fa-chevron-down',
        previous:'fa fa-chevron-left',
        next:'fa fa-chevron-right',
        today:'fa fa-crosshairs',
        clear:'fa fa-trash-o',
        close:'fa fa-times'
    };
    setTimeout(function(){
        $('.alert-auto-hide').hide();
    }, 4000);
</script>
@yield('scripts')

</body>
</html>
