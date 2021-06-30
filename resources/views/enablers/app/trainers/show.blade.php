@extends('enablers.app.layouts.app')

@section('page-title',' | Trainer '.$trainer->slug)

@section('styles')
@endsection

@section('content')
<!--   Start Trainer Details Wrapper -->
<section class="tr-details-inner-wrapper padd mt-5">
    <div class="content mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tr-left-in-details">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <div class="tr-in-icon rounded-circle mb-5 mb-lg-0">
                                    <img src="{{ _asset($trainer->profile_image_path) }}" class="rounded-circle">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="tr-in-con mb-5 mb-lg-0">
                                    <h2 class="tr-in-name md-heading text-uppercase">{{ $trainer->name }}</h2>
                                    <h5 class="tr-in-designation text-uppercase font-weight-light">{{ $trainer->designation }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tr-in-link">
                        @if($trainer->is_mentorship_enabled)
                        <a href="{{ route('app.enrollment.create') }}?enroll_for=trainer&slug={{ $trainer->slug }}&mentorship=full" class="blue-btn d-block mb-5">
                            {{ $trainer->mentorship_fee_currency == 'USD' ? '$' : 'PKR' }}{{ $trainer->mentorship_fee }} mentorship</a>
                        @endif
                        @if($trainer->is_per_hour_enabled)
                        <a href="{{ route('app.enrollment.create') }}?enroll_for=trainer&slug={{ $trainer->slug }}&mentorship=hourly" class="blue-btn d-block mb-5">
                            {{ $trainer->per_hour_fee_currency == 'USD' ? '$' : 'PKR' }}{{ $trainer->per_hour_fee }} Hourly Basis</a>
                        @endif
                        <a href="{{ route('app.trainings.show','amazon-1-1-coaching') }}" class="blue-outline-btn d-block mb-5">Find Another mentor</a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tr-content-detials mt-0 mt-lg-5">
                        {!! $trainer->summary !!}
                    </div>
                </div>
                @if($trainer->is_per_hour_enabled)
                <div class="col-lg-6 mx-auto text-center mt-5">
                    <a href="{{ route('app.enrollment.create') }}?enroll_for=trainer&slug={{ $trainer->slug }}&mentorship=full" class="blue-btn">Apply Now</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!--   Start Trainer Details Wrapper -->
@endsection

@section('scripts')
@endsection
