@extends('enablers.admin.layouts.admin')

@section('page-title','| Products - Edit')

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
        <h1>Edit Product</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products List</a></li>
            <li class="breadcrumb-item active">Edit Product</li>
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
                        <h3 class="card-title">Editing Product</h3>
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
                    <form id="product-form" class="form-horizontal" action="{{ route('products.update',$product->id) }}" method="POSt" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row required">
                                <label for="order_number" class="col-sm-2 col-form-label">Image Order Number</label>
                                <div class="col-sm-10">
                                    <input type="number" name="order_number" id="order_number" class="form-control" min="1" max="9"
                                           value="{{ old('order_number') ? old('order_number') : $product->order_number }}" placeholder="Order Number"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="title" class="col-sm-2 col-form-label">Add Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? old('title') : $product->title }}" placeholder="Product Title">
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="web_image" class="col-sm-2 col-form-label">Add logo Image</label>
                                <div class="col-sm-3 mr-auto" id="displaying-logo-image">
                                    <div class="img-thumbnail" style="background-color: #6A6A6A">
                                        <img src="{{ _asset($product->logo_path) }}" class="product-image">
                                        <div class="overlay">
                                            <a href="javascript:void(0)" class="image-remove-icon" title="User Profile"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10" id="adding-logo-image" style="display: none">
                                    <a id="cancel-adding-logo-image" class="btn btn-xs btn-danger cancel-adding-image"> <i class="fas fa-times"></i> Cancel</a>
                                    <input type="file" name="logo" id="logo" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="mobile_image" class="col-sm-2 col-form-label">Add Banner Image</label>
                                <div class="col-sm-3 mr-auto" id="displaying-banner-image">
                                    <div class="img-thumbnail">
                                        <img src="{{ _asset($product->banner_path) }}" class="product-image">
                                        <div class="overlay">
                                            <a href="javascript:void(0)" class="image-remove-icon" title="User Profile"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10" id="adding-banner-image" style="display: none">
                                    <a id="cancel-adding-banner-image" class="btn btn-xs btn-danger cancel-adding-image"> <i class="fas fa-times"></i> Cancel</a>
                                    <input type="file" name="banner" id="banner" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="redirect_url" class="col-sm-2 col-form-label">Redirect URL</label>
                                <div class="col-sm-10">
                                    <input type="text" name="redirect_url" id="redirect_url" class="form-control" placeholder="Redirect URL" value="{{ old('redirect_url') ? old('redirect_url') : $product->redirect_url }}"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="short_summary" class="col-sm-2 col-form-label">Short Summary</label>
                                <div class="col-sm-10">
                                    <textarea name="short_summary" id="short_summary" class="form-control" rows="3" placeholder="Short Description Here...">{{ old('short_summary') ? old('short_summary') : $product->short_summary }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="summary" class="col-sm-2 col-form-label">Detail Description</label>
                                <div class="col-sm-10">
                                    <textarea name="summary" id="summary" class="form-control" rows="5" placeholder="Detail Description Here...">{{ old('summary') ? old('summary') : $product->summary }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('products.index') }}" class="btn btn-default mr-2">Cancel</a>
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
        $("#product-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                order_number: {
                    required: true,
                    min: 1,
                    max: 9
                },
                title: {
                    required: true,
                    minlength: 3,
                    maxlength: 60
                },
                logo: {
                    required: true,
                },
                banner: {
                    required: true,
                },
                redirect_url: {
                    required: false,
                    maxlength: 190,
                },
                short_summary: {
                    required: true,
                    maxlength: 190
                },
                summary: {
                    maxlength: 500
                }
            }
        });
        $('#logo').change(function (){
            let inputElement = document.getElementById("logo");
            CheckImageDimension(inputElement);
        });
        $('#banner').change(function (){
            let inputElement = document.getElementById("banner");
            CheckImageDimension(inputElement);
        });

        //Start Web image section script
        $('#displaying-logo-image').click(function (){
            $(this).hide();
            $('#adding-logo-image').show();
        });
        $('#cancel-adding-logo-image').click(function (){
            $('#displaying-logo-image').show();
            $('#adding-logo-image').hide();
            $("#logo").val('');
        });
        //End Web image section script

        //Start Mobile image section script
        $('#displaying-banner-image').click(function (){
            $(this).hide();
            $('#adding-banner-image').show();
        });
        $('#cancel-adding-banner-image').click(function (){
            $('#displaying-banner-image').show();
            $('#adding-banner-image').hide();
            $("#banner").val('');
        });
        //End Mobile image section script
    </script>
@endsection
