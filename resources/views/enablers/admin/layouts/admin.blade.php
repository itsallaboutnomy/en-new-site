<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Enablers Admin @yield('page-title')</title>

    <!--  Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&display=swap" rel="stylesheet">

    <!-- Rubik Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ _asset('assets-admin/css/adminlte.css') }}">

    <!-- Custom Style -->
    <style>
        .sidebar-dark-primary{
            background-color: #067EF5;
        }
        .nav-sidebar>.nav-item:hover>.nav-link:hover {
            color: #fd7e14;
        }
        .nav-treeview>.nav-item:hover>.nav-link:hover {
            color: #fd7e14;
        }
        .nav-sidebar .nav-link p {
            color: #fff;
        }
        .nav-sidebar .nav-link i {
            color: #fff;
        }
        .navbar-nav .nav-link {
            color: #fff;
        }
        .toast.bg-success .toast-header {
            display: none;
        }
        .toast-body {
            font-size: larger;
        }
        .toasts-top-right {
            top: 7%;
            right: 43%;
        }
        .form-group.required .col-form-label:after {
            content:"*";
            color:red;
        }
        label.error.is-invalid{
            width: 100%;
            margin-top: .25rem;
            font-size: 80%;
            color: #dc3545;
        }
    </style>
    @yield('styles')
    <!-- /. Custom Style -->

</head>
<body class="sidebar-mini sidebar-collapse hold-transition sidebar-mini layout-fixed layout-navbar-fixed">

<!-- Site wrapper -->
<div class="wrapper">

    @include('enablers.admin.layouts.header')

    @include('enablers.admin.layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    @yield('content-header')
                </div>
            </div>
        </section>
        <!-- /.Content Header -->

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>

<!-- jQuery -->
<script src="{{ _asset('assets-admin/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ _asset('assets-admin/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ _asset('assets-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ _asset('assets-admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- overlayScrollbars -->
<script src="{{ _asset('assets-admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ _asset('assets-admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toaster -->
<script src="{{ _asset('assets-admin/plugins/toastr/toastr.min.js') }}"></script>
<!-- AdminLTE App -->

<!-- Start Page specific plugins -->
@yield('plugins')
<!-- End Page specific plugins -->

<script src="{{ _asset('assets-admin/js/adminlte.min.js') }}"></script>

<!-- Page specific script -->
<script>
    @if (session()->has('error'))
    $(document).Toasts('create', {
        class: 'bg-error',
        autohide: true,
        delay: 4000,
        body: '{!! session()->get('error') !!}'
    });
    @elseif (session()->has('success'))
    $(document).Toasts('create', {
        class: 'bg-success',
        autohide: true,
        delay: 4000,
        body: '{!! session()->get('success') !!}'
    });
    @endif
    function internalServerError(error){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong! Internal server error',
            footer: error
        });
    }
    function showInputErrorLabel(inputElement,message){
        let label = '<label id="'+inputElement.id+'-error" class="error invalid-feedback" style="display: inline-block">'+message+'</label>'
        $(label).insertAfter(inputElement);
        $(inputElement).addClass('is-invalid');
        setTimeout(function(){
            $('#'+inputElement.id+'-error').remove();
            $(inputElement).removeClass('is-invalid');
        }, 3000);
    }
    function CheckImageDimension(inputElement,minWidth,minHeight,maxWidth,maxHeight) {
        //Get reference of File.

        //Check whether the file is valid Image.
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.jpeg)$");
        if (regex.test(inputElement.value.toLowerCase())) {

            //Check whether HTML5 is supported.
            if (typeof (inputElement.files) != "undefined") {
                //Initiate the FileReader object.
                let reader = new FileReader();
                //Read the contents of Image File.
                reader.readAsDataURL(inputElement.files[0]);
                reader.onload = function (e) {
                    //Initiate the JavaScript Image object.
                    let image = new Image();

                    //Set the Base64 string return from FileReader as source.
                    image.src = e.target.result;

                    //Validate the File Height and Width.
                    image.onload = function () {
                        let height = this.height;
                        let width = this.width;

                        //show width and height to user
                        // document.getElementById("width").innerHTML=width;
                        // document.getElementById("height").innerHTML=height;

                        if (minHeight && minWidth) {
                            if (height < minHeight || width < minWidth) {
                                showInputErrorLabel(inputElement,'Sorry, Minimum width '+minWidth+' & height '+minHeight+' image allowed.');
                                inputElement.value = null;
                                return false;
                            }
                        }
                        if (maxHeight && maxWidth) {
                            if (height > maxHeight || width > maxWidth) {
                                showInputErrorLabel(inputElement,'Sorry, Maximum width '+maxWidth+' & height '+maxHeight+' image allowed.');
                                inputElement.value = null;
                                return false;
                            }
                        }
                        return true;
                    };
                }
            } else {
                showInputErrorLabel(inputElement,'Sorry, This browser does not support HTML5.');
                inputElement.value = null;
                return false;
            }
        } else {
            inputElement.value = null;
            showInputErrorLabel(inputElement,'Sorry, only JPG, JPEG & PNG files are allowed.');
            return false;
        }
    }

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

    var summernoteToolbar = [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['view', ['fullscreen', 'codeview', 'help']],
    ];
</script>
@yield('scripts')
<!-- /.Page specific script -->

</body>
</html>
