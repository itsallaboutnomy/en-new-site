@extends('enablers.app.layouts.app')

@section('page-title',' | '.ucwords($training->title))

@section('styles')
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="trainings-inner" class="st-banner-wrapper pr-4 pr-lg-5">
        <div id="trainings-inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-4 pl-5 my-5 my-lg-0 animate__animated animate__animated animate__fadeInLeft">
                        <div class="st-left-content main-headings pl-0 pr-5 text-center">
                            <h1 class="h-primary text-uppercase mb-0">{{ $training->title }}</h1>
                            @if(!$training->is_registration_open)
                                <h5 class="st-start-date md-heading border-bottom">Registration Closed</h5>
                            @else
                                <span class="st-start-title d-block border-top">Starting From</span>
                                @if($training->starting_at)
                                    <h5 class="st-start-date md-heading border-bottom">{{ date('d',strtotime($training->starting_at)) }} {{ date('M, Y',strtotime($training->starting_at)) }} </h5>
                                @else
                                    <h5 class="st-start-date md-heading border-bottom">Not Available Yet </h5>
                                @endif
                            @endif
                            <span class="tr-price-wrap d-block my-5">Only: <strong>{{ $training->currency }}. {{ number_format($training->charging_fee) }} </strong></span>
                            @if($training->is_registration_open)
                                <a href="{{ route('app.enrollment.create') }}?enroll_for=training&slug={{ $training->slug }}" class="blue-btn">Apply Now</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-12">
                        <div class="st-benifit-contents ">
                            <div class="st-benifit-wrap py-5">
                                <h3 class="text-white text-capitalize md-heading py-5 mb-0">Training Benefits:</h3>
                                <div class="st-list-bt">{!! $training->training_benefits !!}</div>
                            </div>
                        </div>
                        <div class="bg-bar"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End Banner Wrapper -->

    <!--  Start summary -->
    {!! $training->summary !!}
    <!--  End summary -->

@endsection

@section('scripts')
@endsection
