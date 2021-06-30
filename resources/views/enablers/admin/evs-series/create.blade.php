@extends('enablers.admin.layouts.admin')

@section('page-title','| EVS Categories - Add New')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Add New Category</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('evs-series.index') }}">EVS Categories List</a></li>
            <li class="breadcrumb-item active">Add New Category</li>
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
                        <h3 class="card-title">Add Category</h3>
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
                    <form id="evs-categories-form" class="form-horizontal" action="{{ route('evs-series.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        <div class="form-group row required">
                                <label for="order_number" class="col-sm-2 col-form-label">Order Number</label>
                                <div class="col-sm-10">
                                    <input type="number" name="order_number" id="order_number" class="form-control" placeholder="Order Number" value="{{ old('order_number') }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="title" class="col-sm-2 col-form-label">Add Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" value="{{ old('title') }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="parent_id" class="col-sm-2 col-form-label">Choose Category</label>
                                <div class="col-sm-10">
                                    <select name="parent_id" id="parent_id" class="form-control" style="width: 100%;">
                                    <option value = ''>Select Category</option>
                                        @foreach($series as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image_path" class="col-sm-2 col-form-label">Add Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image_path" id="image_path" class="form-control" accept=".jpg, .jpeg, .png"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="short_summary" class="col-sm-2 col-form-label">Short Summary</label>
                                <div class="col-sm-10">
                                    <textarea name="short_summary" id="short_summary" class="form-control" rows="3" placeholder="Short Description Here..." minlength="3" maxlength="190">{{ old('short_summary') }}</textarea>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="content" class="col-sm-2 col-form-label">Content</label>
                                <div class="col-sm-10">
                                    <textarea name="content" id="content" class="form-control" rows="4">{{ old('content') }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('evs-series.index') }}" class="btn btn-default mr-2">Cancel</a>
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
    <script src="{{ _asset('assets-admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endsection

@section('scripts')
    <script>
        $('#content').summernote({
            toolbar: summernoteToolbar,
            placeholder: 'Category Description Here',
            height: 300,
        });
        $("#evs-categories-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                order_number: {
                    required: true,
                    min: 1,
                    max: 100
                },
                title: {
                    required: true,
                    maxlength: 60
                },
                short_summary: {
                    required: true,
                    maxlength: 190
                }
            }
        });
        $('#image_path').change(function (){
            let inputElement = document.getElementById("image_path");
            CheckImageDimension(inputElement);
        });
    </script>
@endsection
