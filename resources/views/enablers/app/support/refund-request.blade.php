@extends('enablers.app.layouts.app')

@section('page-title',' | Refund Request')

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
                            <h1 class="text-white h-primary text-uppercase">REFUND REQUEST</h1>
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
                <form  id="refund-request-form" method="POST" action="{{ route('app.support.refundRequest.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="request_type" id="request_type" value="refund-request">
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
                                    <option value="not_applicable" {{ old('request_for') === 'not_applicable' ? 'selected' : '' }}>Not Applicable</option>
                                    <option value="training" {{ old('request_for') === 'training' ? 'selected' : '' }}>Trainings</option>
                                    <option value="seminar" {{ old('request_for') === 'seminar' ? 'selected' : '' }}>Seminar</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4" style="{{ old('request_for') === 'seminar' ? '' : 'display: none;' }}" id="seminar-row">
                            <div class="form-group required">
                                <label for="event_id" class="label">Seminar</label>
                                <select name="event_id" id="event_id" class="form-control  @error('event_id') is-invalid @enderror">
                                    <option value="">Select Seminar</option>
                                    @foreach($seminars  as $seminar )
                                        <option value="{{ $seminar->id }}">{{ $seminar->title }}</option>
                                    @endforeach
                                </select>
                                @error('event_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4" style="{{ old('request_for') === 'training' ? '' : 'display: none;' }}" id="training-row">
                            <div class="form-group required">
                                <label for="training_id" class="label">Training Name</label>
                                <select name="training_id" id="training_id" class="form-control @error('training_id') is-invalid @enderror">
                                    <option value="">Select Training</option>
                                    @foreach($trainings as $training)
                                        <option value="{{ $training->id }}" data-url="{{ route('app.trainings.batches',$training->id) }}">{{ $training->title }}</option>
                                    @endforeach
                                </select>
                                @error('training_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4" style="{{ old('request_for') === 'training' ? '' : 'display: none;' }}" id="training-batch-row">
                            <div class="form-group required">
                                <label for="batch_id" class="label">Training Batch</label>
                                <select name="batch_id" id="batch_id" class="form-control  @error('batch_id') is-invalid @enderror">
                                    <option value="">Select Training Batch</option>
                                </select>
                                @error('batch_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4" style="{{ old('request_for') === 'training' ? '' : 'display: none;' }}" id="training-start-date-row">
                            <div class="form-group required">
                                <label for="date" class="label">Training Start Date</label>
                                <input type="text" name="date" id="date" class="form-control @error('date') is-invalid @enderror" placeholder="Start Date" value="{{ old('date') }}" />
                                @error('date')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4" style="{{ old('request_for') === 'training' ? '' : 'display: none;' }}" id="training-fee-row">
                            <div class="form-group required">
                                <label for="fee" class="label">Training Fee</label>
                                <input type="number" name="fee" id="fee" class="form-control  @error('fee') is-invalid @enderror" value="{{ old('fee') }}" placeholder="Enter your Fee">
                                @error('fee')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="reason" class="label">Reason</label>
                                <input type="text" name="reason" id="reason" class="form-control  @error('reason') is-invalid @enderror" value="{{ old('reason') }}" placeholder="Enter your Reason">
                                @error('reason')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4" style="{{ old('request_for') === 'training' ? '' : 'display: none;' }}" id="no_of_classes-row">
                            <div class="form-group required">
                                <label for="no_of_classes" class="label">
                                    How Many Classes Student Take?
                                </label>
                                <input type="text" name="no_of_classes" id="no_of_classes" class="form-control  @error('no_of_classes') is-invalid @enderror" value="{{ old('no_of_classes') }}" placeholder="Enter your Classes">
                                @error('no_of_classes')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="attachment" class="label">Bank Account Details</label>
                                <input type="file" name="attachment" id="attachment" class="form-control @error('attachment') is-invalid @enderror"  accept=".jpg, .jpeg, .png"/>
                                @error('attachment')
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
        $("#refund-request-form").validate({
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
                },
                event_id: {
                    required: true,
                },
                training_id: {
                    required: true,
                },
                batch_id: {
                    required: true,
                },
                fee: {
                    required: true,
                },
                date: {
                    required: true,
                },
                reason: {
                    required: true,
                    maxlength: 100
                },
                attachment: {
                    required: true,
                    maxlength: 100
                },
                no_of_classes: {
                    required: true,
                    maxlength: 100
                },

            }
        });
        $('#phone').inputmask({"mask": "9999-9999999"});
        $('#date').datetimepicker(dateTimePickerObject);

        $("#request_for").change(function() {
            if($(this).val() === "training")
            {
                $("#seminar-row").hide();
                $("#event_id").val('');


                $("#training-row").show();
                $("#training-fee-row").show();
                $("#training-batch-row").show();
                $("#training-start-date-row").show();
                $("#no_of_classes-row").show();


            }
            else if($(this).val() === "seminar")
            {
                $("#seminar-row").show();

                $("#training-row").hide();
                $("#training-fee-row").hide();
                $("#training-batch-row").hide();
                $("#training-start-date-row").hide();
                $("#no_of_classes-row").hide();

                $("#training_id").val('');
                $("#fee").val('');
                $("#batch").val('');
                $("#date").val('');
                $("#no_of_classes").val('');
            }
            else
            {
                $("#seminar-row").hide();
                $("#training-row").hide();
                $("#training-fee-row").hide();
                $("#training-batch-row").hide();
                $("#training-start-date-row").hide();
                $("#no_of_classes-row").hide();

                $("#event_id").val('');
                $("#training_id").val('');
                $("#fee").val('');
                $("#batch").val('');
                $("#date").val('');
                $("#no_of_classes").val('');
            }
        });

        $('#training_id').change(function(e) {
            var trainingId = $(this).val();
            var url = $(this).find(':selected').data('url');

            if(trainingId){
                $.ajax({
                    type: "GET",
                    url: url,
                    success:function(data)
                    {
                        $('#batch_id').empty().append('<option value="">Select Training Batch</option>');
                        $.each(data, function (i, item) {
                            $('#batch_id').append($('<option>', {
                                value: item.id,
                                text : item.name
                            }));
                        });
                    },
                })
            }
        });
    </script>
@endsection
