@extends('enablers.app.layouts.app')

@section('page-title',' | Trainings')

@section('styles')
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="p-inner" class="t-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-12 animate__animated animate__animated animate__fadeInLeft">
                        <div class="training-left-content main-headings">
                            <span class="d-block sub-title text-white">We PROVIDE</span>
                            <h1 class="text-white h-primary">ECOMMERCE TRAINING COURSES IN PAKISTAN</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->

    <!-- Start Trainings Wrapper -->
    <section class="t-trainings-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <div class="t-trainings-heading py-5">
                            <h3 class="md-heading">Ecommerce Training Courses That Work</h3>
                            <p class="mb-0">Step out of your comfort zone because Enablers has brought the perfect learning experience for your entrepreneurial growth.</p>
                        </div>
                    </div>
                    @foreach($trainings as $training)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 mb-4 animate__animated animate__zoomIn">
                            <div class="card t-trainings-block h-100 height-auto">
                                <div class="t-date-wrap">
                                    @if(!$training->is_registration_open)
                                    <span class="t-date-title d-block">Status </span>
                                    <span class="t-dates d-block">Registration Closed</span>
                                    @else
                                        @if($training->key == 'O2O')
                                        <span class="t-date-title d-block">Please Select </span>
                                        <span class="t-dates d-block">Mentor for 1:1</span>
                                        @elseif($training->key == 'EVS')
                                        <span class="t-date-title d-block">Please Select </span>
                                        <span class="t-dates d-block">Free or Paid</span>
                                        @else
                                            <span class="t-date-title d-block">starting from</span>
                                            @if($training->starting_at)
                                            <span class="t-dates d-block">{{ date('F d, Y',strtotime($training->starting_at)) }}</span>
                                            @else
                                            <span class="t-dates d-block">Not Available Yet</span>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                                <div class="t-inner-content">
                                    <h4 class="text-uppercase">{{ $training->title }}</h4>
                                    <p>{{ $training->short_summary }}</p>
                                </div>
                                <div class="t-call-action">
                                    <a href="{{ route('app.trainings.show',$training->slug) }}" class="black-btn d-block">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Trainings Wrapper -->
@endsection

@section('scripts')
@endsection
