@extends('enablers.admin.layouts.admin')

@section('page-title','| Examiner - Edit')

@section('styles')
    <style>
        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: .3s ease;
            background-color: red;
        }
        .overlay:hover {
            opacity: 1;
            background-color: rgb(99 99 99 / 70%);
        }
        .image-remove-icon {
            color: red;
            font-size: 100px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }
        #cancel-add-image {
            position: absolute;
            margin-top: 7px;
            right: 20px;
        }
    </style>
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit Examiner</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('examiners.index') }}">Users List</a></li>
            <li class="breadcrumb-item active">Edit Examiner</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box start-->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Editing Examiner</h3>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- form start -->
                    <form id="examiner-form" class="form-horizontal" action="{{ route('examiners.update',$user->id) }}" method="POSt" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Add User Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name') ? old('name') : $user->name }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Add Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') ? old('email') : $user->email }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Add Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="confirm-password" class="col-sm-2 col-form-label">Add Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Confirm Password" value="{{ old('confirm-password') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="profile_image" class="col-sm-2 col-form-label">Add User Profile Image</label>
                                <div class="col-sm-3" id="display-image" style="{{ !\File::exists($user->profile_image_path) ? 'display: none' : '' }}">
                                    <div class="img-thumbnail">
                                        <img src="{{ _asset($user->profile_image_path) }}" class="product-image">
                                        <div class="overlay">
                                            <a href="javascript:void(0)" class="image-remove-icon" title="User Profile"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10" id="add-image" style="{{ !\File::exists($user->profile_image_path) ? '' : 'display: none' }}">
                                    <a id="cancel-add-image" class="btn btn-xs btn-danger" style="{{ !\File::exists($user->profile_image_path) ? 'display: none' : '' }}"> <i class="fas fa-times"></i> Cancel</a>
                                    <input type="file" name="profile_image" id="profile_image" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('examiners.index') }}" class="btn btn-default mr-2">Cancel</a>
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- form end -->
                </div>
                <!-- Default box end-->
            </div>
        </div>
    </div>
@endsection

@section('plugins')
    <script src="{{ _asset('assets-admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endsection

@section('scripts')
    <script>
        $("#examiner-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                name: {
                    required: true,
                    maxlength: 60,
                },
                email: {
                    required: true,
                    maxlength: 100,
                },
                password: {
                    required: false,
                    minlength : 6,
                    maxlength: 10,
                },
                password_confirm : {
                    minlength : 6,
                    equalTo : "#password"
                }
            }
        });

        $('#profile_image').change(function (){
            let inputElement = document.getElementById("profile_image");
            CheckImageDimension(inputElement);
        });

        $('#display-image').click(function (){
            $(this).hide();
            $('#add-image').show();
        });
        $('#cancel-add-image').click(function (){
            $('#display-image').show();
            $('#add-image').hide();
            $("#image").val('');
        });
    </script>
@endsection
