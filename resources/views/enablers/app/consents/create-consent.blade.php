@extends('enablers.app.layouts.app')

@section('page-title',' | '. \App\Models\Consent::$type[$slug])

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
        <div class="header__moore animate__animated animate__animated animate__rotateInDownLeft d-none d-lg-block">
            <a href="">
                <button class="header__moore__btn">
                    <span class="header__moore__text p-event-none text-uppercase">more</span>
                    <span class="bar-wrapper bar-wrapper--down p-event-none">
                    <span class="bar-whitespace p-event-none">
                    <span class="bar-line bar-line-down p-event-none"></span>
                    </span>
                    </span>
                </button>
            </a>
        </div>
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 animate__animated animate__animated animate__fadeInLeft">
                        <div class="fr-left-content main-headings">
                            <h1 class="text-white h-primary text-uppercase">{{ \App\Models\Consent::$type[$slug] }}</h1>
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
                                Kindly fill the form below to show your consent.
                            </h6>
                        </div>
                    </div>
                </div>
{{--
                @if ($errors->any())
                    <div class="alert alert-danger" style="font-size: large;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
--}}
                <form id="exl-consent-form" method="POST" action="{{ route('app.consents.store',$slug) }}" enctype="multipart/form-data">
                    @csrf
                    <input name="slug" type="hidden" value="exl-consent">
                    <div class="row my-5">
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="type" class="label">Consent Type</label>
                                <input type="text" name="type" id="type" class="form-control @error('slug') is-invalid @enderror" value="{{ \App\Models\Consent::$type[$slug] }}" readonly placeholder="Consent Type">
                                @error('slug')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

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
                        @if($slug == 'student-consent')
                            <div class="col-lg-6 mb-4">
                                <div class="form-group required">
                                    <label for="training_id" class="label">Training</label>
                                    <select name="training_id" id="training_id" class="form-control @error('training_id') is-invalid @enderror">
                                        <option value="">Select Training</option>
                                        @foreach($trainings as $training)
                                            <option value="{{ $training->id}}">{{ $training->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('training_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="signature_image_path" class="label">Digital Signature</label>
                                <input type="file" name="signature_image_path" id="signature_image_path" class="form-control @error('signature_image_path') is-invalid @enderror"  accept=".jpg, .jpeg, .png"/>
                                @error('signature_image_path')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12 mb-4">
                            <div class="form-group">
                                @error('terms')
                                <div class="is-invalid">
                                    <strong class="invalid-feedback" style="display: block;">{{ $message }}</strong></span>
                                </div>
                                @enderror
                            </div>
                        </div>
                        @foreach ($consent->terms as $term)
                            <div class="col-lg-12 mb-4">
                                <div class="form-group">
                                    <label class="label">
                                        <input type="checkbox" name="terms[]" value={{ $consent->id }}>
                                        <span class="ml-3"> {{ $term }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-12">
                            <input type="hidden" name="termsCount" value="{{ count($consent->terms) }}">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="blue-btn">Submit</button>
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
        $("#exl-consent-form").validate({
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
                signature_image_path: {
                    required: true,
                },

            }
        });

    </script>
@endsection
