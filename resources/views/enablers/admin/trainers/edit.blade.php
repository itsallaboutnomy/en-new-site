@extends('enablers.admin.layouts.admin')

@section('page-title','| Trainers - Edit')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/summernote/summernote-bs4.min.css') }}">
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
        <h1>Edit Trainer</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('trainers.index') }}">Trainers List</a></li>
            <li class="breadcrumb-item active">Edit Trainer</li>
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
                        <h3 class="card-title">Editing Trainer</h3>
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
                    <form id="trainers-form" class="form-horizontal" action="{{ route('trainers.update',$trainer->id) }}" method="POSt" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row required">
                                <label for="order_number" class="col-sm-2 col-form-label">Order Number</label>
                                <div class="col-sm-10">
                                    <input type="number" name="order_number" id="order_number" class="form-control" value="{{ old('order_number') ? old('order_number') : $trainer->order_number }}" placeholder="Order Number">
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="name" class="col-sm-2 col-form-label">Add Trainer Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name') ? old('name') : $trainer->name }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="designation" class="col-sm-2 col-form-label">Add Designation</label>
                                <div class="col-sm-10">
                                    <input type="text" name="designation" id="designation" class="form-control" placeholder="Designation" value="{{ old('designation') ? old('designation') : $trainer->designation }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mentorship_fee" class="col-sm-2 col-form-label">Add Mentorship Fee</label>
                                <div class="col-sm-10">
                                    <input type="number" name="mentorship_fee" id="mentorship_fee" class="form-control" placeholder="Mentorship Fee" value="{{ old('mentorship_fee') ? old('mentorship_fee') : $trainer->mentorship_fee }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mentorship_fee_currency" class="col-sm-2 col-form-label">Choose Mentorship Fee Currency</label>
                                <div class="col-sm-10">
                                    <select name="mentorship_fee_currency" id="mentorship_fee_currency" class="form-control">
                                        <option value="PKR" {{ $trainer->mentorship_fee_currency ==  'PKR' ? 'selected' : '' }}>PKR</option>
                                        <option value="USD" {{ $trainer->mentorship_fee_currency ==  'USD' ? 'selected' : '' }}>USD</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="is_mentorship_enabled" class="col-sm-2 col-form-label">Is Available For Mentorship</label>
                                <div class="col-sm-10">
                                    <select name="is_mentorship_enabled" id="is_mentorship_enabled" class="form-control">
                                        <option value="0" {{ $trainer->is_mentorship_enabled ==  '0' ? 'selected' : '' }}>NO</option>
                                        <option value="1" {{ $trainer->is_mentorship_enabled ==  '1' ? 'selected' : '' }}>YES</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="per_hour_fee" class="col-sm-2 col-form-label">Add Per Hour Fee</label>
                                <div class="col-sm-10">
                                    <input type="number" name="per_hour_fee" id="per_hour_fee" class="form-control" placeholder="Per Hour Fee" value="{{ old('per_hour_fee') ? old('per_hour_fee') : $trainer->per_hour_fee }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="per_hour_fee_currency" class="col-sm-2 col-form-label">Choose Per Hour Fee Currency</label>
                                <div class="col-sm-10">
                                    <select name="per_hour_fee_currency" id="per_hour_fee_currency" class="form-control">
                                        <option value="PKR" {{ $trainer->per_hour_fee_currency ==  'PKR' ? 'selected' : '' }}>PKR</option>
                                        <option value="USD" {{ $trainer->per_hour_fee_currency ==  'USD' ? 'selected' : '' }}>USD</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="is_per_hour_enabled" class="col-sm-2 col-form-label">Is Available For Per Hour</label>
                                <div class="col-sm-10">
                                    <select name="is_per_hour_enabled" id="is_per_hour_enabled" class="form-control">
                                        <option value="0" {{ $trainer->is_per_hour_enabled ==  '0' ? 'selected' : '' }}>NO</option>
                                        <option value="1" {{ $trainer->is_per_hour_enabled ==  '1' ? 'selected' : '' }}>YES</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="profile_image" class="col-sm-2 col-form-label">Add Trainer Profile Image</label>
                                <div class="col-sm-3" id="display-image" style="{{ !\File::exists($trainer->profile_image_path) ? 'display: none' : '' }}">
                                    <div class="img-thumbnail">
                                        <img src="{{ _asset($trainer->profile_image_path) }}" class="product-image">
                                        <div class="overlay">
                                            <a href="javascript:void(0)" class="image-remove-icon" title="User Profile"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10" id="add-image" style="{{ !\File::exists($trainer->profile_image_path) ? '' : 'display: none' }}">
                                    <a id="cancel-add-image" class="btn btn-xs btn-danger" style="{{ !\File::exists($trainer->profile_image_path) ? 'display: none' : '' }}"> <i class="fas fa-times"></i> Cancel</a>
                                    <input type="file" name="profile_image" id="profile_image" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="summary" class="col-sm-2 col-form-label">Detail Summary</label>
                                <div class="col-sm-10">
                                    <textarea name="summary" id="summary" class="form-control" placeholder="Detail Description Here...">{{ old('summary') ? old('summary') : $trainer->summary }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('trainers.index') }}" class="btn btn-default mr-2">Cancel</a>
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
    <script src="{{ _asset('assets-admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endsection

@section('scripts')
    <script>
        $('#summary').summernote({
            toolbar: summernoteToolbar,
            placeholder: 'Training Summary Here',
            height: 300,
        });

        $("#trainers-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                order_number: {
                    required: true,
                    min: 1,
                    max: 30
                },
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 60
                },
                designation: {
                    required: true,
                    minlength: 3,
                    maxlength: 60
                },
                mentorship_fee: {
                    required: false,
                    min: 10,
                    max: 100000
                },
                per_hour_fee: {
                    required: false,
                    min: 10,
                    max: 100000
                },
                profile_image: {
                    required: true,
                },
                summary: {
                    maxlength: 500
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
