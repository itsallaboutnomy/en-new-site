@extends('enablers.app.layouts.app')

@section('page-title',' | Franchise Application')

@section('styles')
    <style>
        .invalid-feedback {
            font-size: 15px;
        }
        input[type=radio] {
            width: 25px;
            height: 25px;
        }
    </style>
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="p-inner" class="fr-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 animate__animated animate__animated animate__fadeInLeft">
                        <div class="fr-left-content main-headings">
                            <span class="d-block sub-title text-white">WE Make</span>
                            <h1 class="text-white h-primary text-uppercase">Ready to participate?</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->

    <!--  Start Form wrapper -->
    <section class="fr-forms-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="fr-heading">
                            <h2 class="md-heading text-capitalize">Applicant Details:</h2>
                        </div>
                    </div>
                </div>
                <form id="franchise-applications-form" method="POST" action="{{ route('app.franchise.application.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- When EVS enrollment-->
                    <div class="row my-5">
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="first_name" class="label">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control @if($errors->has('first_name')) is-invalid @endif"  value="{{ old('first_name') }}" placeholder="Enter your first name">
                                @if($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('first_name') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="last_name" class="label">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control @if($errors->has('last_name')) is-invalid @endif"  value="{{ old('last_name') }}" placeholder="Enter your last name">
                                @if($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('last_name') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="father_name" class="label">Father Name</label>
                                <input type="text" name="father_name" id="father_name" class="form-control @if($errors->has('father_name')) is-invalid @endif" value="{{ old('father_name') }}" placeholder="Enter your father name">
                                @if($errors->has('father_name'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('father_name') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="shareholder" class="label">Shareholder</label>
                                <select name="shareholder" id="shareholder" class="form-control  @error('shareholder') is-invalid @enderror">
                                    <option value="20" {{ old('shareholder') == '20' ? 'selected' : '' }}>20%</option>
                                    <option value="50" {{ old('shareholder') == '50' ? 'selected' : '' }}>50%</option>
                                </select>
                                @error('shareholder')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div class="form-group required">
                                <label for="address" class="label">Physical Address (Residential)</label>
                                <input type="text" name="address" id="address" class="form-control @if($errors->has('address')) is-invalid @endif" value="{{ old('address') }}" placeholder="Enter your physical address">
                                @if($errors->has('address'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('address') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div class="fr-heading">
                                <h2 class="md-heading text-capitalize">Contact Details:</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="whatsapp_number" class="label">WhatsApp Number
                                </label>
                                <input type="text" name="phone" id="phone" class="form-control @if($errors->has('phone')) is-invalid @endif" value="{{ old('phone') }}"
                                       placeholder="Enter your whatsApp number">
                                @if($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('phone') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="email" class="label">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email') }}" placeholder="Enter your email address">
                                @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="cnic" class="label">CNIC or Passport</label>
                                <input type="text" name="cnic" id="cnic" class="form-control @if($errors->has('cnic')) is-invalid @endif" value="{{ old('cnic') }}" placeholder="Enter your CNIC or Passport Number">
                                @if($errors->has('cnic'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('cnic') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="city" class="label">City</label>
                                <input type="text" name="city" id="city" class="form-control @if($errors->has('city')) is-invalid @endif" value="{{ old('city') }}" placeholder="Enter your city">
                                @if($errors->has('city'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('city') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                                <div class="form-group required">
                                    <label for="country" class="label">Country</label>
                                    <input type="text" name="country" id="country" class="form-control @if($errors->has('country')) is-invalid @endif" value="{{ old('country') }}" placeholder="Enter your Country">
                                    @if($errors->has('country'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('country') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center flex-column flex-md-row">
                                <div class="al-paid-rap mb-4">
                                    <a href="{{ route('app.franchise.index') }}" class="blue-outline-btn d-block"> Cancel </a>
                                </div>
                                <div class="text-right mb-4">
                                    <button type="submit" class="blue-btn w-100 ml-2">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--  End Form wrapper -->
@endsection

@section('scripts')
    <script src="{{ _asset('assets-admin/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script>
        $('#cnic').inputmask({"mask": "99999-9999999-9"});
        $('#phone').inputmask({"mask": "9999-9999999"});

        $("#franchise-applications-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                father_name: {
                    required: true,
                },
                shareholder: {
                    required: true,
                },
                address: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                email: {
                    required: true,
                },
                cnic: {
                    required: true,
                },
                city: {
                    required: true,
                },
                country: {
                    required: true,
                },
            }
        });

    </script>
@endsection
