@extends('enablers.admin.layouts.admin')

@section('page-title','| Trainers - Add New')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Add New Trainer</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('trainers.index') }}">Trainers List</a></li>
            <li class="breadcrumb-item active">Add New Trainer</li>
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
                        <h3 class="card-title">Adding Trainer</h3>
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
                    <form id="trainers-form" class="form-horizontal" action="{{ route('trainers.store') }}" method="POSt" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row required">
                                <label for="order_number" class="col-sm-2 col-form-label">Order Number</label>
                                <div class="col-sm-10">
                                    <input type="number" name="order_number" id="order_number" class="form-control" placeholder="Order Number" value="{{ old('order_number') }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="name" class="col-sm-2 col-form-label">Add Trainer Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name') }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="designation" class="col-sm-2 col-form-label">Add Designation</label>
                                <div class="col-sm-10">
                                    <input type="text" name="designation" id="designation" class="form-control" placeholder="Designation" value="{{ old('designation') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mentorship_fee" class="col-sm-2 col-form-label">Add Mentorship Fee</label>
                                <div class="col-sm-10">
                                    <input type="number" name="mentorship_fee" id="mentorship_fee" class="form-control" placeholder="Mentorship Fee" value="{{ old('mentorship_fee') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mentorship_fee_currency" class="col-sm-2 col-form-label">Choose Mentorship Fee Currency</label>
                                <div class="col-sm-10">
                                    <select name="mentorship_fee_currency" id="mentorship_fee_currency" class="form-control">
                                        <option value="PKR" {{ old('mentorship_fee_currency') ==  'PKR' ? 'selected' : '' }}>PKR</option>
                                        <option value="USD" {{ old('mentorship_fee_currency') ==  'USD' ? 'selected' : '' }}>USD</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="is_mentorship_enabled" class="col-sm-2 col-form-label">Is Available For Mentorship</label>
                                <div class="col-sm-10">
                                    <select name="is_mentorship_enabled" id="is_mentorship_enabled" class="form-control">
                                        <option value="0" {{ old('is_mentorship_enabled') ==  '0' ? 'selected' : '' }}>NO</option>
                                        <option value="1" {{ old('is_mentorship_enabled') ==  '1' ? 'selected' : '' }}>YES</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="per_hour_fee" class="col-sm-2 col-form-label">Add Per Hour Fee</label>
                                <div class="col-sm-10">
                                    <input type="number" name="per_hour_fee" id="per_hour_fee" class="form-control" placeholder="Per Hour Fee" value="{{ old('per_hour_fee') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="per_hour_fee_currency" class="col-sm-2 col-form-label">Choose Per Hour Fee Currency</label>
                                <div class="col-sm-10">
                                    <select name="per_hour_fee_currency" id="per_hour_fee_currency" class="form-control">
                                        <option value="PKR" {{ old('per_hour_fee_currency') ==  'PKR' ? 'selected' : '' }}>PKR</option>
                                        <option value="USD" {{ old('per_hour_fee_currency') ==  'USD' ? 'selected' : '' }}>USD</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="is_per_hour_enabled" class="col-sm-2 col-form-label">Is Available For Per Hour</label>
                                <div class="col-sm-10">
                                    <select name="is_per_hour_enabled" id="is_per_hour_enabled" class="form-control">
                                        <option value="0" {{ old('is_per_hour_enabled') ==  '0' ? 'selected' : '' }}>NO</option>
                                        <option value="1" {{ old('is_per_hour_enabled') ==  '1' ? 'selected' : '' }}>YES</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="profile_image" class="col-sm-2 col-form-label">Add Trainer Profile Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="profile_image" id="profile_image" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="summary" class="col-sm-2 col-form-label">Detail Description</label>
                                <div class="col-sm-10">
                                    <textarea name="summary" id="summary" class="form-control" rows="5">{{ old('summary') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="summary" class="col-sm-2 col-form-label">Detail Summary</label>
                                <div class="col-sm-10">
                                    <textarea name="summary" id="summary" class="form-control" placeholder="Detail Description Here...">{{ old('summary') }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('trainers.index') }}" class="btn btn-default mr-2">Cancel</a>
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
    <script src="{{ _asset('assets-admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endsection

@section('scripts')
    <script>
        $('#summary').summernote({
            toolbar: summernoteToolbar,
            placeholder: 'Detail Description Here...',
            height: 300,
        });

        $("#trainers-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                order_number: {
                    required: true,
                    min: 1,
                    max: 30
                },
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 60
                },
                designation: {
                    required: true,
                    minlength: 3,
                    maxlength: 60
                },
                mentorship_fee: {
                    required: false,
                    min: 10,
                    max: 100000
                },
                per_hour_fee: {
                    required: false,
                    min: 10,
                    max: 100000
                },
                profile_image: {
                    required: true,
                },
                summary: {
                    maxlength: 500
                }
            }
        });
        $('#profile_image').change(function (){
            let inputElement = document.getElementById("profile_image");
            CheckImageDimension(inputElement);
        });
    </script>
@endsection
