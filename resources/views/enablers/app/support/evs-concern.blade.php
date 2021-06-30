@extends('enablers.app.layouts.app')

@section('page-title',' | EVS Concern')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}">
    <style>
        .invalid-feedback {
            font-size: 15px;
        }
    </style>
@endsection

@section('content')
    <!-- Start Banner Wrapper -->
    <section id="p-inner" class="fr-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 animate__animated animate__animated animate__fadeInLeft">
                        <div class="fr-left-content main-headings">
                            <h1 class="text-white h-primary text-uppercase">EVS CONCERN</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!-- End Banner Wrapper -->

    <!-- Start Form wrapper -->
    <section class="fr-forms-wrapper padd mt-5">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="fr-heading">
                            <h6 class="">
                                Please fill up the below form to submit your complaint
                            </h6>
                        </div>
                    </div>
                </div>
                <form id="evs-concern-form" method="POST" action="{{ route('app.support.evsConcern.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="request_type" id="request_type" value="evs-concern">
                    <div class="row my-5">
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="name" class="label">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter your full name">
                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="email" class="label">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter your email address">
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="phone" class="label">Contact Number</label>
                                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Enter your Contact Number">
                                @error('phone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="request_for" class="label">Request For</label>
                                <select name="request_for" id="request_for" class="form-control">
                                    <option value="free" {{ old('request_for') === 'free' ? 'selected' : '' }}>Free</option>
                                    <option value="paid" {{ old('request_for') === 'paid' ? 'selected' : '' }}>Paid</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4"  id="training-start-date-row">
                            <div class="form-group required">
                                <label for="date" class="label">Date of Apply</label>
                                <input type="text" name="date" id="date" class="form-control @error('date') is-invalid @enderror" placeholder="Start Date" value="{{ old('date') }}" />
                                @error('date')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div class="form-group">
                                <label for="description" class="label">Description Box</label>
                                <textarea name="description" id="short_summary" class="form-control" rows="6" placeholder="Enter Your Description" minlength="5" maxlength="190">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center">
                                <div class="mr-5">
                                    <a href="{{ route('app.support.index') }}" class="blue-outline-btn d-block">Cancel</a>
                                </div>
                                <div>
                                    <button type="submit" class="blue-btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- End Form wrapper -->
@endsection

@section('scripts')
    <script src="{{ _asset('assets-admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>


    <script>
        let dateTimePickerObject = {
            icons: datetimepickerIcons,
            format: 'L',
        };
        $('#phone').inputmask({"mask": "9999-9999999"});
        $('#date').datetimepicker(dateTimePickerObject);
        $("#evs-concern-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 60
                },
                email: {
                    required: true,
                    maxlength: 60
                },
                phone: {
                    required: true,
                    maxlength: 15
                },
                request_for: {
                    required: true,
                    maxlength: 15
                },
                date: {
                    required: true,
                },

            }
        });

    </script>
@endsection
