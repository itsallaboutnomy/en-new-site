@extends('enablers.admin.layouts.admin')

@section('page-title','| objectives - Add New')

@section('styles')
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Add New Objective</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('objectives.index') }}">Objectives List</a></li>
            <li class="breadcrumb-item active">Add New Objective</li>
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
                        <h3 class="card-title">Adding Objective</h3>
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
                    <form id="objectives-form" class="form-horizontal" action="{{ route('objectives.store') }}" method="POSt" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row required">
                                <label for="order_number" class="col-sm-2 col-form-label">Order Number</label>
                                <div class="col-sm-10">
                                    <input type="number" name="order_number" id="order_number" class="form-control" placeholder="Order Number" value="{{ old('order_number') }}"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="alt_name" class="col-sm-2 col-form-label">Add Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Objective Title" value="{{ old('title') }}"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="alt_name" class="col-sm-2 col-form-label">Add Sub Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="sub_title" id="sub_title" class="form-control" placeholder="Objective Sub Title" value="{{ old('sub_title') }}"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="logo" class="col-sm-2 col-form-label">Add Logo</label>
                                <div class="col-sm-10">
                                    <input type="file" name="logo" id="logo" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('objectives.index') }}" class="btn btn-default mr-2">Cancel</a>
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
        $("#objectives-form").validate({
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
                sub_title: {
                    required: true,
                    minlength: 3,
                    maxlength: 60
                },
                logo: {
                    required: true,
                },
            }
        });
        $('#logo').change(function (){
            let inputElement = document.getElementById("logo");
            CheckImageDimension(inputElement);
        });
    </script>
@endsection
