@extends('enablers.admin.layouts.admin')

@section('page-title','| Blogs - Edit')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}">
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
        <h1>Edit Blog</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Blogs List</a></li>
            <li class="breadcrumb-item active">Edit Blog</li>
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
                        <h3 class="card-title">Editing Blog</h3>
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
                    <form id="blogs-form" class="form-horizontal" action="{{ route('blogs.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group row required">
                                <label for="blog_image" class="col-sm-2 col-form-label">Blog Image</label>
                                <div class="col-sm-3 mr-auto" id="displaying-web-image">
                                    <div class="img-thumbnail">
                                        <img src="{{ _asset($blog->blog_image) }}" class="product-image">
                                        <div class="overlay">
                                            <a href="javascript:void(0)" class="image-remove-icon" title="User Profile"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10" id="adding-blog-image" style="display: none">
                                    <a id="cancel-adding-blog-image" class="btn btn-xs btn-danger cancel-adding-image"> <i class="fas fa-times"></i> Cancel</a>
                                    <input type="file" name="blog_image" id="blog_image" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="alt_name" class="col-sm-2 col-form-label">Add Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? old('title') : $blog->title }}" placeholder="Blog Title"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="slug" class="col-sm-2 col-form-label">Add Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" name="slug" id="slug" class="form-control" placeholder="Title Slug" value="{{ old('slug') ? old('slug') : $blog->slug }}"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="author" class="col-sm-2 col-form-label">Author</label>
                                <div class="col-sm-10">
                                    <input type="text" name="author" id="author" class="form-control" value="{{ old('author') ? old('author') : $blog->author }}" placeholder="Blog Author"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="date" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="text" name="date" id="date" class="form-control" placeholder="Date" value="@if(old('date')) {{ old('date') }} @elseif($blog->date) {{ date('m/d/Y',strtotime($blog->date)) }} @endif" />
                                </div>
                            </div>
                           <div class="form-group row required">
                                <label for="category" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <input type="text" name="category" id="category" class="form-control" value="{{ old('category') ? old('category') : $blog->category }}" placeholder="Blog Category"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="short_summary" class="col-sm-2 col-form-label">Short Summary</label>
                                <div class="col-sm-10">
                                    <textarea name="short_summary" id="short_summary" class="form-control" rows="3" placeholder="Short Summary Here...">{{ old('short_summary') ? old('short_summary') : $blog->short_summary }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-sm-2 col-form-label">Detail Content</label>
                                <div class="col-sm-10">
                                    <textarea name="content" id="content" class="form-control" rows="10" placeholder="Detail content Here...">{{ old('content') ? old('content') : $blog->content }}</textarea>
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
    <script src="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
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
                },
                content: {
                    required: true,
                }
            }
        });


        //Start Web image section script
        $('#displaying-web-image').click(function (){
            $(this).hide();
            $('#adding-blog-image').show();
        });
        $('#cancel-adding-blog-image').click(function (){
            $('#displaying-web-image').show();
            $('#adding-blog-image').hide();
            $("#blog_image").val('');
        });
        //End Web image section script
    </script>
@endsection
