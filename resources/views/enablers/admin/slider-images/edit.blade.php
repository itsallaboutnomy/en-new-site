@extends('enablers.admin.layouts.admin')

@section('page-title','| Slider Images - Edit')

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
            font-size: 70px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }
        .cancel-adding-image {
            position: absolute;
            margin-top: 7px;
            right: 20px;
        }
    </style>
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit Slider Image</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('slider-images.index') }}">Slider Images List</a></li>
            <li class="breadcrumb-item active">Edit Slider Image</li>
        </ol>
    </div>
@endsection

@section('plugins')
    <script src="{{ _asset('assets-admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box start-->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Editing Slider Image</h3>
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
                    <form id="slider-image-form" class="form-horizontal" action="{{ route('slider-images.update',$sliderImage->id) }}" method="POSt" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row required">
                                <label for="order_number" class="col-sm-2 col-form-label">Image Order Number</label>
                                <div class="col-sm-10">
                                    <input type="number" name="order_number" id="order_number" class="form-control" min="1" max="9"
                                           value="{{ old('order_number') ? old('order_number') : $sliderImage->order_number }}" placeholder="Image Order Number"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="image_alt_name" class="col-sm-2 col-form-label">Image Alt Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="image_alt_name" id="image_alt_name" class="form-control" value="{{ old('image_alt_name') ? old('image_alt_name') : $sliderImage->image_alt_name }}" placeholder="Image Alternative Name">
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="web_image" class="col-sm-2 col-form-label">Add Web Image (1047x599)</label>
                                <div class="col-sm-3 mr-auto" id="displaying-web-image">
                                    <div class="img-thumbnail">
                                        <img src="{{ _asset($sliderImage->web_image_path) }}" class="product-image">
                                        <div class="overlay">
                                            <a href="javascript:void(0)" class="image-remove-icon" title="User Profile"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10" id="adding-web-image" style="display: none">
                                    <a id="cancel-adding-web-image" class="btn btn-xs btn-danger cancel-adding-image"> <i class="fas fa-times"></i> Cancel</a>
                                    <input type="file" name="web_image" id="web_image" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="mobile_image" class="col-sm-2 col-form-label">Add Mobile Image (1000x800)</label>
                                <div class="col-sm-3 mr-auto" id="displaying-mobile-image">
                                    <div class="img-thumbnail">
                                        <img src="{{ _asset($sliderImage->mobile_image_path) }}" class="product-image">
                                        <div class="overlay">
                                            <a href="javascript:void(0)" class="image-remove-icon" title="User Profile"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10" id="adding-mobile-image" style="display: none">
                                    <a id="cancel-adding-mobile-image" class="btn btn-xs btn-danger cancel-adding-image"> <i class="fas fa-times"></i> Cancel</a>
                                    <input type="file" name="mobile_image" id="mobile_image" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('slider-images.index') }}" class="btn btn-default mr-2">Cancel</a>
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

@section('scripts')
    <script>
        $("#slider-image-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                order_number: {
                    required: true,
                    min: 1,
                    max: 9
                },
                image_alt_name: {
                    required: true,
                    minlength: 3,
                    maxlength: 60
                },
                web_image: {
                    required: true,
                },
                mobile_image: {
                    required: true,
                }
            }
        });
        $('#web_image').change(function (){
            let inputElement = document.getElementById("web_image");
            CheckImageDimension(inputElement,1047,599,1047,599);
        });
        $('#mobile_image').change(function (){
            let inputElement = document.getElementById("mobile_image");
            CheckImageDimension(inputElement,1000,800,1000,800);
        });

        //Start Web image section script
        $('#displaying-web-image').click(function (){
            $(this).hide();
            $('#adding-web-image').show();
        });
        $('#cancel-adding-web-image').click(function (){
            $('#displaying-web-image').show();
            $('#adding-web-image').hide();
            $("#web_image").val('');
        });
        //End Web image section script

        //Start Mobile image section script
        $('#displaying-mobile-image').click(function (){
            $(this).hide();
            $('#adding-mobile-image').show();
        });
        $('#cancel-adding-mobile-image').click(function (){
            $('#displaying-mobile-image').show();
            $('#adding-mobile-image').hide();
            $("#mobile_image").val('');
        });
        //End Mobile image section script
    </script>
@endsection
