@extends('enablers.admin.layouts.admin')

@section('page-title','| Blogs - Add New')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/summernote/summernote-bs4.min.css') }}">

@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Add New Blog</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Blogs List</a></li>
            <li class="breadcrumb-item active">Add New Blog</li>
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
                        <h3 class="card-title">Adding Blog</h3>
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
                    <form id="blogs-form" class="form-horizontal" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row required">
                                <label for="blog_image" class="col-sm-2 col-form-label">Blog Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="blog_image" id="blog_image" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="title" class="col-sm-2 col-form-label">Add Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Blog Title" value="{{ old('title') }}"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="slug" class="col-sm-2 col-form-label">Add Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" name="slug" id="slug" class="form-control" placeholder="Title Slug" value="{{ old('slug') }}"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="author" class="col-sm-2 col-form-label">Author</label>
                                <div class="col-sm-10">
                                    <input type="text" name="author" id="author" class="form-control" placeholder="Blog Author" value="{{ old('author') }}"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="date" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="text" name="date" id="date" class="form-control" placeholder="Blog Date" value="{{ old('date') }}" />
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="category" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <input type="text" name="category" id="category" class="form-control" placeholder="Blog Category" value="{{ old('category') }}"/>
                                </div>
                            </div>

                             <div class="form-group row required">
                                <label for="short_summary" class="col-sm-2 col-form-label">Short Summary</label>
                                <div class="col-sm-10">
                                    <textarea name="short_summary" id="short_summary" class="form-control" rows="3" placeholder="Short Summary Here...">{{ old('short_summary') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="content" class="col-sm-2 col-form-label">Detail Content</label>
                                <div class="col-sm-10">
                                    <textarea name="content" id="content" class="form-control" rows="10" placeholder="Detail Content Here...">{{ old('content') }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('blogs.index') }}" class="btn btn-default mr-2">Cancel</a>
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
    <script src="{{ _asset('assets-admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}">
    </script>
@endsection

@section('scripts')
    <script>
        let dateTimePickerObject = {
            icons: datetimepickerIcons,
            format: 'L',
        };

        $('#date').datetimepicker(dateTimePickerObject);

         $('#content').summernote({
            toolbar: summernoteToolbar,
            placeholder: 'Detail Content Here...',
            height: 300,
        });

        $("#blogs-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                title: {
                    required: true,
                    maxlength: 190
                },
                blog_image: {
                    required: true,
                },
                author: {
                    required: true,
                },
                date: {
                    required: true,
                },
                category: {
                    required: true,
                },
                short_summary: {
                    required: true,
                    minlength: 10,
                },
                content: {
                    required: true,
                }
            }
        });

    </script>
@endsection
