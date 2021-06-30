@extends('enablers.app.layouts.app')

@section('page-title',' | EPAS CONCERN')

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
                            <h1 class="text-white h-primary text-uppercase">EPAS CONCERN</h1>
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
                <form id="epas-concern-form" method="POST" action="{{ route('app.support.epasConcern.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="request_type" id="request_type" value="epas-concern">
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
                                <label for="trainer_id" class="label">Trainer Name</label>
                                <select name="trainer_id" id="trainer_id" class="form-control @error('trainer_id') is-invalid @enderror">
                                    <option value="">Select Trainer</option>
                                    @foreach($trainers as $trainer)
                                        <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                                    @endforeach
                                </select>
                                @error('trainer_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
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

                        <div class="col-lg-6 mb-4">
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
    <script src="{{ _asset('assets-admin/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>


    <script>
        $('#phone').inputmask({"mask": "9999-9999999"});
        $("#epas-concern-form").validate({
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
                trainer_id: {
                    required: true,
                },
                training_id: {
                    required: true,
                },
                batch_id: {
                    required: true,
                },


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