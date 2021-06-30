@extends('enablers.admin.layouts.admin')

@section('page-title','| Slider Images - Add New')

@section('styles')
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Add New Slider Image</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('slider-images.index') }}">Slider Images List</a></li>
            <li class="breadcrumb-item active">Add New Slider Image</li>
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
                        <h3 class="card-title">Adding Image</h3>
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
                    <form id="slider-image-form" class="form-horizontal" action="{{ route('slider-images.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row required">
                                <label for="order_number" class="col-sm-2 col-form-label">Image Order Number</label>
                                <div class="col-sm-10">
                                    <input type="number" name="order_number" id="order_number" class="form-control" placeholder="Image Order Number" value="{{ old('order_number') }}"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="image_alt_name" class="col-sm-2 col-form-label">Image Alt Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="image_alt_name" id="image_alt_name" class="form-control" placeholder="Image Alternative Name" value="{{ old('image_alt_name') }}"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="web_image" class="col-sm-2 col-form-label">Add Web Image (1047x599)</label>
                                <div class="col-sm-10">
                                    <input type="file" name="web_image" id="web_image" class="form-control" accept=".jpg, .jpeg, .png"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="mobile_image" class="col-sm-2 col-form-label">Add Mobile Image (1000x800)</label>
                                <div class="col-sm-10">
                                    <input type="file" name="mobile_image" id="mobile_image" class="form-control" accept=".jpg, .jpeg, .png"/>
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

@section('plugins')
    <script src="{{ _asset('assets-admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
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
    </script>
@endsection
