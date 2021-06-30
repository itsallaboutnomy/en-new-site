@extends('enablers.admin.layouts.admin')

@section('page-title','| Redirect Urls - Edit')

@section('styles')
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit Redirect Url</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('redirect-urls.index') }}">Redirect Urls List</a></li>
            <li class="breadcrumb-item active">Edit Redirect Url</li>
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
                        <h3 class="card-title">Editing Redirect Url</h3>
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
                    <form id="redirect-urls-form" class="form-horizontal" action="{{ route('redirect-urls.update',$redirectUrl->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group row required">
                                <label for="url_name" class="col-sm-2 col-form-label">Url Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="url_name" id="url_name" class="form-control" placeholder="Url Name"  value="{{ old('url_name') ? old('url_name') : $redirectUrl->url_name }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="redirect_from" class="col-sm-2 col-form-label">Redirect From</label>
                                <div class="col-sm-10">
                                    <input type="text" name="redirect_from" id="redirect_from" class="form-control" placeholder="Redirect From" value="{{ old('redirect_from') ? old('redirect_from') : $redirectUrl->redirect_from }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="redirect_to" class="col-sm-2 col-form-label">Redirect To</label>
                                <div class="col-sm-10">
                                    <input type="text" name="redirect_to" id="redirect_to" class="form-control" placeholder="Career Location" value="{{ old('redirect_to') ? old('redirect_to') : $redirectUrl->redirect_to }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" id="description" class="form-control" rows="3" placeholder="Short Description Here...">{{ old('description') ? old('description') : $redirectUrl->description }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('redirect-urls.index') }}" class="btn btn-default mr-2">Cancel</a>
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
        $("#redirect-urls-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                url_name: {
                    required: true,
                    maxlength: 60
                },
                redirect_from: {
                    required: true,
                    maxlength: 190
                },
                redirect_to: {
                    required: true,
                    maxlength: 190
                },
                description: {
                    required: true,
                    maxlength: 190
                },
            }
        });
    </script>
@endsection
