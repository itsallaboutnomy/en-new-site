@extends('enablers.admin.layouts.admin')

@section('page-title','| Offices - Add New')

@section('styles')
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Add New Office</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('offices.index') }}">Offices List</a></li>
            <li class="breadcrumb-item active">Add New Office</li>
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
                        <h3 class="card-title">Adding Office</h3>
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
                    <form id="offices-form" class="form-horizontal" action="{{ route('offices.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row required">
                                <label for="order_number" class="col-sm-2 col-form-label">Offices Order Number</label>
                                <div class="col-sm-10">
                                    <input type="number" name="order_number" id="order_number" class="form-control" placeholder="Office Order Number" value="{{ old('order_number') }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="title" class="col-sm-2 col-form-label">Add Office Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" id="title" class="form-control text-uppercase" placeholder="Name: Lahore" value="{{ old('title') }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="city" class="col-sm-2 col-form-label">Add Office City</label>
                                <div class="col-sm-10">
                                    <input type="text" name="city" id="city" class="form-control text-uppercase" placeholder="City: Lahore" value="{{ old('city') }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="address" class="col-sm-2 col-form-label">Add Office Address</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Address: Office# 501, Al-Hafeez Heights Gulberg, Lahore" value="{{ old('address') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="timings" class="col-sm-2 col-form-label">Add Office Timings</label>
                                <div class="col-sm-10">
                                    <input type="text" name="timings" id="timings" class="form-control" placeholder="Timings: 9:00AM - 04:00PM" value="{{ old('timings') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="working_days" class="col-sm-2 col-form-label">Add Office Working Days</label>
                                <div class="col-sm-10">
                                    <input type="text" name="working_days" id="working_days" class="form-control" placeholder="Working Days: Mon-Sat" value="{{ old('working_days') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone required" class="col-sm-2 col-form-label">Add Office Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone : +92-42-111-123-11" value="{{ old('phone') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-sm-2 col-form-label">Add Office Mobile</label>
                                <div class="col-sm-10">
                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile : +92-300-1234567" minlength="11" maxlength="20" value="{{ old('mobile') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fax" class="col-sm-2 col-form-label">Add Office Fax</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fax" id="fax" class="form-control" placeholder="Fax : +92-42-111-123-11" minlength="8" maxlength="20" value="{{ old('fax') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="map_link" class="col-sm-2 col-form-label">Add Office Google Map Address</label>
                                <div class="col-sm-10">
                                    <input type="text" name="map_link" id="map_link" class="form-control" placeholder="Google Map Address Link" value="{{ old('address') }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="image" class="col-sm-2 col-form-label">Add Office Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="short_summary" class="col-sm-2 col-form-label">Short Summary</label>
                                <div class="col-sm-10">
                                    <textarea name="short_summary" id="short_summary" class="form-control" rows="3" placeholder="Short Description Here...">{{ old('short_summary') }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('offices.index') }}" class="btn btn-default mr-2">Cancel</a>
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
        $("#offices-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                order_number: {
                    required: true,
                    min: 1,
                    max: 30
                },
                title: {
                    required: true,
                    maxlength: 60
                },
                city: {
                    required: true,
                    maxlength: 60
                },
                address: {
                    required: true,
                    maxlength: 190
                },
                timings: {
                    required: false,
                    maxlength: 20
                },
                working_days: {
                    required: false,
                    maxlength: 20
                },
                phone: {
                    required: false,
                    minLength: 8,
                    maxlength: 20
                },
                mobile: {
                    required: false,
                },
                fax: {
                    required: false,
                },
                image: {
                    required: true,
                },
                map_link: {
                    required: false,
                    maxlength: 190
                },
                short_summary: {
                    required: false,
                    maxlength: 500
                }
            }
        });
        $('#image').change(function (){
            let inputElement = document.getElementById("image");
            CheckImageDimension(inputElement);
        });
    </script>
@endsection
