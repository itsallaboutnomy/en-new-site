@extends('enablers.admin.layouts.admin')

@section('page-title','| FAQs- Edit')

@section('styles')

@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit FAQs</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('faqs.index') }}">FAQs List</a></li>
            <li class="breadcrumb-item active">Edit FAQs</li>
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
                        <h3 class="card-title">Editing FAQs</h3>
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
                    <form id="faqs-form" class="form-horizontal" action="{{ route('faqs.update',$faq->id) }}" method="POSt" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group row required">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <textarea name="title" id="title" class="form-control" rows="5" placeholder="Add Title Here...">{{ old('title') ? old('title') : $faq->title }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="content" class="col-sm-2 col-form-label">Content</label>
                                <div class="col-sm-10">
                                    <textarea name="content" id="content" class="form-control" rows="5" placeholder="Add Content Here...">{{ old('content') ? old('content') : $faq->content }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('faqs.index') }}" class="btn btn-default mr-2">Cancel</a>
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
        $("#faqs-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                title: {
                    required: true,
                },
                content: {
                    required: true,
                }
            }});
    </script>
@endsection
