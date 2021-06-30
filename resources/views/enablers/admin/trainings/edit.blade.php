@extends('enablers.admin.layouts.admin')

@section('page-title','| Trainings - Edit')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit Training</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('trainings.index') }}">Trainings List</a></li>
            <li class="breadcrumb-item active">Edit Training</li>
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
                        <h3 class="card-title">Editing Training</h3>
                    </div>
                    <!-- form start -->
                    <form id="trainings-form" class="form-horizontal" action="{{ route('trainings.update',$training->id) }}" method="POSt" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row required">
                                <label for="order_number" class="col-sm-2 col-form-label">Order Number</label>
                                <div class="col-sm-10">
                                    <input type="number" name="order_number" id="order_number" class="form-control" value="{{ old('order_number') ? old('order_number') : $training->order_number }}" placeholder="Order Number" />
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="order_number" class="col-sm-2 col-form-label">Training Registration</label>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" name="is_registration_open" id="is_registration_open" class="custom-control-input" {{ $training->is_registration_open ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_registration_open"> On/Off Training Registration Process</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="starting_at" class="col-sm-2 col-form-label">Starting At</label>
                                <div class="col-sm-10">
                                    <input type="text" name="starting_at" id="starting_at" class="form-control" placeholder="Start Date" value="@if(old('starting_at')) {{ old('starting_at') }} @elseif($training->starting_at) {{ date('m/d/Y',strtotime($training->starting_at)) }} @endif" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ending_at" class="col-sm-2 col-form-label">Ending At</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ending_at" id="ending_at" class="form-control" placeholder="End Date" value="@if(old('ending_at')) {{ old('ending_at') }} @elseif($training->ending_at) {{ date('m/d/Y',strtotime($training->ending_at)) }} @endif" />
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="title" class="col-sm-2 col-form-label">Add Training Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Training Title" value="{{ old('title') ? old('title') : $training->title }}" />
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="slug" class="col-sm-2 col-form-label">Add Training Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" name="slug" id="slug" class="form-control" placeholder="Training Slug" value="{{  old('slug') ? old('slug') : $training->slug }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="key" class="col-sm-2 col-form-label">Add Training Key</label>
                                <div class="col-sm-10">
                                    <input type="text" name="key" id="key" class="form-control" placeholder="Training Key" value="{{ old('key') ? old('key') : $training->key }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="charging_fee" class="col-sm-2 col-form-label">Add Training Fee</label>
                                <div class="col-sm-10">
                                    <input type="number" name="charging_fee" id="charging_fee" class="form-control" placeholder="Training Fee" value="{{ old('charging_fee') ? old('charging_fee') : $training->charging_fee }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="currency" class="col-sm-2 col-form-label">Choose Fee Currency</label>
                                <div class="col-sm-10">
                                    <select name="currency" id="currency" class="form-control">
                                        <option value="PKR" {{ $training->currency ==  'PKR' ? 'selected' : '' }}>PKR</option>
                                        <option value="USD" {{ $training->currency ==  'USD' ? 'selected' : '' }}>USD</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="cities" class="col-sm-2 col-form-label">Choose Cities</label>
                                <div class="col-sm-10">
                                    <select name="cities[]" id="cities" class="form-control" multiple="multiple" data-placeholder="Select Cities">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="short_summary" class="col-sm-2 col-form-label">Short Summary</label>
                                <div class="col-sm-10">
                                    <textarea name="short_summary" id="short_summary" class="form-control" rows="3" placeholder="Short Description Here...">{{ old('short_summary') ? old('short_summary') : $training->short_summary }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="training_benefits" class="col-sm-2 col-form-label">Training Benefits</label>
                                <div class="col-sm-10">
                                    <textarea name="training_benefits" id="training_benefits" class="form-control" rows="4">{{ old('training_benefits') ? old('training_benefits') : $training->training_benefits }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="summary" class="col-sm-2 col-form-label">Detail Content</label>
                                <div class="col-sm-10">
                                    <textarea name="summary" id="summary" class="form-control" rows="4">{{ old('summary') ? old('summary') : $training->summary }}</textarea>
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

        $('#starting_at').datetimepicker(dateTimePickerObject);
        $('#ending_at').datetimepicker(dateTimePickerObject);

        $('#training_benefits').summernote({
            toolbar: summernoteToolbar,
            placeholder: 'Training Benefits Here',
            height: 300,
        });

        $('#summary').summernote({
            toolbar: summernoteToolbar,
            placeholder: 'Training Summary Here',
            height: 300,
        });

        $('#key_features').summernote({
            toolbar: summernoteToolbar,
            placeholder: 'Training Key Features Here',
            height: 300,
        });

        $('#module_breakdown').summernote({
            toolbar: summernoteToolbar,
            placeholder: 'Training Module Breakdown Here',
            height: 300,
        });

        $('#cities').select2({
            theme: 'bootstrap4',
        }).val({{ $trainingCityIds }}).trigger('change');

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
                    minlength: 3,
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
                cities: {
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
