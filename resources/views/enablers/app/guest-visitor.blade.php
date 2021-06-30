<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Enablers</title>

    <!--  Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&display=swap" rel="stylesheet">
    <link href="{{ _asset('assets-app/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        form {border: 3px solid #f1f1f1;}

        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <form action="{{ route('confirm-visitor') }}" method="POST" novalidate>
        @csrf
        <div class="imgcontainer">
            <img src="{{ _asset('assets-admin/img/enablers-logo.png') }}" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
            <label for="username"><b>User</b></label>
            <input type="text" class="form-control" placeholder="User Type" id="username" name="username" value="guest" readonly>

            <label for="password"><b>Password -{{ session()->get('error') }}</b></label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Entry Password" id="password" name="password" required>
            @error('password')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror

            <button type="submit">Go</button>
        </div>

    </form>
</div>
<script src="{{ _asset('assets-app/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ _asset('assets-app/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

