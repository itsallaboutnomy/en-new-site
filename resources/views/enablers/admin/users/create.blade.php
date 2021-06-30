@extends('enablers.admin.layouts.admin')

@section('page-title','| Users - Add New')

@section('styles')
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Add New User</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users List</a></li>
            <li class="breadcrumb-item active">Add New User</li>
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
                        <h3 class="card-title">Adding User</h3>
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
                    <form id="user-form" class="form-horizontal" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="role" class="col-sm-2 col-form-label">Choose Role</label>
                                <div class="col-sm-10">
                                    <select name="role" id="role" class="form-control">
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role') ==  $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Add Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Add Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('name') }}">
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
                                <label for="profile_image" class="col-sm-2 col-form-label">Add Profile Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="profile_image" id="profile_image" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('users.index') }}" class="btn btn-default mr-2">Cancel</a>
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
        $("#user-form").validate({
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
                    required: true,
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
    </script>
@endsection
