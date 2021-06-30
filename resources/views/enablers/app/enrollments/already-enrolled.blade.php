@extends('enablers.app.layouts.app')

@section('page-title',' | Verify Enrollment')

@section('styles')
    <style>
        .invalid-feedback {
            font-size: 15px;
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
    <section class="fr-forms-wrapper padd mt-5">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="fr-heading">
                            <h2 class="md-heading text-capitalize">Check For Enrollment</h2>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('app.enrollment.confirm') }}">
                    @csrf
                    <div class="row my-5">
                        <div class="col-lg-12 mb-4">
                            <div class="form-group">
                                <label for="registration_number" class="label">Enter Your Registration Number</label>
                                <input type="text" name="registration_number" id="registration_number" class="form-control text-uppercase @if($errors->has('registration_number') || session()->has('error')) is-invalid @endif"  value="{{ old('registration_number') }}" placeholder="Registration Number">
                                @if($errors->has('registration_number'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('registration_number') }}</strong></span>
                                @endif
                                @if (session()->has('error'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ session()->get('error') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="blue-btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--  End Form wrapper -->
@endsection

@section('scripts')
@endsection
