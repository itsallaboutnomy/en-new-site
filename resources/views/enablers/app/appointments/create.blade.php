@extends('enablers.app.layouts.app')

@section('page-title',' | Appointment ')

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
                            <h1 class="text-white h-primary text-uppercase">ENABLERS APPOINTMENT</h1>
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

                <form id="appointment-form" method="POST" action="{{ route('app.appointment.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row my-5">
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="full_name" class="label">Name</label>
                                <input type="text" name="full_name" id="full_name" class="form-control @error('full_name') is-invalid @enderror" value="{{ old('full_name') }}" placeholder="Enter your full name">
                                @error('full_name')
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

                        <div class="col-lg-6 mb-4"  id="training-row">
                            <div class="form-group required">
                                <label for="office_id" class="label">Office for Booking Appointment</label>
                                <select name="office_id" id="office_id" class="form-control @error('office_id') is-invalid @enderror">
                                    <option value="">Select Office</option>
                                    @foreach($offices as $office)
                                        <option value="{{ $office->id }}" {{ old('office_id') == $office->id ? 'selected' : '' }}>{{ $office->title }}</option>
                                    @endforeach
                                </select>
                                @error('office_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4"  id="training-start-date-row">
                            <div class="form-group required">
                                <label for="appointment_date" class="label">Date of Appointment:</label>
                                <input type="text" name="appointment_date" id="appointment_date" class="form-control @error('appointment_date') is-invalid @enderror" placeholder="Appointment Date" value="{{ old('appointment_date') }}" />
                                @error('appointment_date')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="purpose_visit" class="label">Purpose for Visiting</label>
                                <input type="text" name="purpose_visit" id="purpose_visit" class="form-control @error('purpose_visit') is-invalid @enderror" value="{{ old('purpose_visit') }}" placeholder="Enter your purpose of visiting">
                                @error('purpose_visit')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="appointment_time" class="label">Time of Appointment</label>

                                <select name="appointment_time" id="appointment_time" class="form-control @error('appointment_time') is-invalid @enderror">
                                    <option value="">Select Time</option>
                                    <option value="2:00PM - 3:00PM" {{ old('appointment_time') == '2:00PM - 3:00PM' ? 'selected' : '' }}>2:00PM - 3:00PM</option>
                                    <option value="3:00PM - 5:00PM" {{ old('appointment_time') == '3:00PM - 5:00PM' ? 'selected' : '' }}>3:00PM - 5:00PM</option>
                                </select>
                                @error('appointment_time')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center">

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
        $('#phone').inputmask({"mask": "9999-9999999"});

        $('#appointment_date').datetimepicker({
            icons: datetimepickerIcons,
            format: 'L',
        });

        $("#appointment-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                full_name: {
                    required: true,
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
                office_id: {
                    required: true,
                },
                appointment_date: {
                    required: true,
                },
                purpose_visit: {
                    required: true,
                    maxlength: 190
                },
                appointment_time: {
                    required: true,

                }
            }
        });

    </script>
@endsection
