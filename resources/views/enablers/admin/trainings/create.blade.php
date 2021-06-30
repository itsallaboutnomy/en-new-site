@extends('enablers.admin.layouts.admin')

@section('page-title','| Trainings - Add New')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Add New Training</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('trainings.index') }}">Trainings List</a></li>
            <li class="breadcrumb-item active">Add New Training</li>
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
                        <h3 class="card-title">Adding Training</h3>
                    </div>
                    <!-- form start -->
                    <form id="trainings-form" class="form-horizontal" action="{{ route('trainings.store') }}" method="POSt" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row required">
                                <label for="order_number" class="col-sm-2 col-form-label">Order Number</label>
                                <div class="col-sm-10">
                                    <input type="number" name="order_number" id="order_number" class="form-control" placeholder="Training Order Number" value="{{ old('order_number') }}"/>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="starting_at" class="col-sm-2 col-form-label">Starting At</label>
                                <div class="col-sm-10">
                                    <input type="text" name="starting_at" id="starting_at" class="form-control" placeholder="Start Date" value="{{ old('starting_at') }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ending_at" class="col-sm-2 col-form-label">Ending At</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ending_at" id="ending_at" class="form-control" placeholder="End Date" value="{{ old('ending_at') }}" />
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="title" class="col-sm-2 col-form-label">Add Training Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Training Title" value="{{ old('title') }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="slug" class="col-sm-2 col-form-label">Add Training Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" name="slug" id="slug" class="form-control" placeholder="Training Slug" value="{{ old('slug') }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="key" class="col-sm-2 col-form-label">Add Training Key</label>
                                <div class="col-sm-10">
                                    <input type="text" name="key" id="key" class="form-control" placeholder="Training Key" value="{{ old('key') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="charging_fee" class="col-sm-2 col-form-label">Add Training Fee</label>
                                <div class="col-sm-10">
                                    <input type="number" name="charging_fee" id="charging_fee" class="form-control" placeholder="Training Fee" value="{{ old('charging_fee') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="currency" class="col-sm-2 col-form-label">Choose Fee Currency</label>
                                <div class="col-sm-10">
                                    <select name="currency" id="currency" class="form-control">
                                        <option value="PKR">PKR</option>
                                        <option value="USD">USD</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="cities" class="col-sm-2 col-form-label">Choose Cities</label>
                                <div class="col-sm-10">
                                    <select name="cities[]" id="cities" class="form-control" multiple="multiple" data-placeholder="Select Cities" style="width: 100%;">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="short_summary" class="col-sm-2 col-form-label">Short Summary</label>
                                <div class="col-sm-10">
                                    <textarea name="short_summary" id="short_summary" class="form-control" rows="3" placeholder="Short Description Here...">{{ old('short_summary') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="training_benefits" class="col-sm-2 col-form-label">Training Benefits</label>
                                <div class="col-sm-10">
                                    <textarea name="training_benefits" id="training_benefits" class="form-control" rows="4">{{ old('training_benefits') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="summary" class="col-sm-2 col-form-label">Detail Content</label>
                                <div class="col-sm-10">
                                    <textarea name="summary" id="summary" class="form-control" rows="4">{{ old('summary') }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('trainings.index') }}" class="btn btn-default mr-2">Cancel</a>
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
    <script src="{{ _asset('assets-admin/plugins/select2/js/select2.full.min.js') }}"></script>
@endsection

@section('scripts')
    <script>
        let dateTimePickerObject = {
            icons: datetimepickerIcons,
            format: 'L',
        };

        $('#cities').select2({
            theme: 'bootstrap4',
        });

        $('#starting_at').datetimepicker(dateTimePickerObject);
        $('#ending_at').datetimepicker(dateTimePickerObject);

        $('#training_benefits').summernote({
            toolbar: summernoteToolbar,
            placeholder: 'Training Benefits Here',
            height: 300,
        });

        $('#summary').summernote({
            toolbar: summernoteToolbar,
            placeholder: 'Training Content Here',
            height: 300,
        });

        $("#trainings-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                order_number: {
                    required: true,
                    min: 1,
                    max: 20
                },
                starting_at: {
                    required: false,
                },
                ending_at: {
                    required: false,
                },
                title: {
                    required: true,
                    maxlength: 100
                },
                slug: {
                    required: true,
                    maxlength: 100
                },
                key: {
                    required: true,
                    minlength: 3,
                    maxlength: 3
                },
                charging_fee: {
                    required: false,
                    min: 10,
                    max: 1000000
                },
                currency: {
                    required: true
                },
                'cities[]': {
                    required: true
                },
                short_summary: {
                    required: true,
                    maxlength: 190
                }
            }
        });
    </script>
@endsection
