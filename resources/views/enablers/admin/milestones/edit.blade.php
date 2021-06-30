@extends('enablers.admin.layouts.admin')

@section('page-title','| Milestones - Edit')

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
        <h1>Edit Milestone</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('milestones.index') }}">Milestones List</a></li>
            <li class="breadcrumb-item active">Edit Milestone</li>
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
                        <h3 class="card-title">Editing Milestone</h3>
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
                    <form id="milestones-form" class="form-horizontal" action="{{ route('milestones.update',$milestone->id) }}" method="POSt" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row required">
                                <label for="order_number" class="col-sm-2 col-form-label">Order Number</label>
                                <div class="col-sm-10">
                                    <input type="number" name="order_number" id="order_number" class="form-control" value="{{ old('order_number') ? old('order_number') : $milestone->order_number }}" placeholder="Order Number">
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="alt_name" class="col-sm-2 col-form-label">Add Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? old('title') : $milestone->title }}" placeholder="Milestone Title">
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="alt_name" class="col-sm-2 col-form-label">Add Sub Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="sub_title" id="sub_title" class="form-control" value="{{ old('sub_title') ? old('sub_title') : $milestone->sub_title }}" placeholder="Milestone Sub Title">
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="alt_name" class="col-sm-2 col-form-label">Add logo</label>
                                <div class="col-sm-3" id="display-image" style="{{ !\File::exists($milestone->logo_path) ? 'display: none' : '' }}">
                                    <div class="img-thumbnail">
                                        <img src="{{ _asset($milestone->logo_path) }}" class="product-image">
                                        <div class="overlay">
                                            <a href="javascript:void(0)" class="image-remove-icon" title="User Profile"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10" id="add-image" style="{{ !\File::exists($milestone->logo_path) ? '' : 'display: none' }}">
                                    <a id="cancel-add-image" class="btn btn-xs btn-danger" style="{{ !\File::exists($milestone->logo_path) ? 'display: none' : '' }}"> <i class="fas fa-times"></i> Cancel</a>
                                    <input type="file" name="logo" id="logo" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="summary" class="col-sm-2 col-form-label">Detail Description</label>
                                <div class="col-sm-10">
                                    <textarea name="summary" id="summary" class="form-control" rows="5" placeholder="Detail Description Here...">{{ old('summary') ? old('summary') : $milestone->summary }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('milestones.index') }}" class="btn btn-default mr-2">Cancel</a>
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
        $("#milestones-form").validate({
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
                    maxlength: 30
                },
                sub_title: {
                    required: true,
                    minlength: 2,
                    maxlength: 100
                },
                logo: {
                    required: true,
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
