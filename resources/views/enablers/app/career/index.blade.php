@extends('enablers.app.layouts.app')

@section('page-title',' | Career')

@section('styles')
@endsection

@section('content')
    <!--Start Banner Wrapper-->
    <section id="p-inner" class="cal-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 animate__animated animate__animated animate__fadeInLeft">
                        <div class="cal-left-content main-headings">
                            <h1 class="text-white h-primary text-uppercase">"unity not just ability"
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--End Banner Wrapper-->

    <!--Start Join Heading Wrapper-->
    <section class="join-heading-wrapper padd my-5">
        <div class="content my-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 mb-4">
                        <div class="join-heading-left-content">
                            <h2 class="md-heading pb-4">JOIN OUR TEAM TO REACH THE STARS</h2>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="join-heading-right-content border-left pl-lg-5 pl-0">
                            <p class="info-rap">We believe in the bold and the bright, the straight talking and the forward thinking, the curious and the fun. People with personality and passion. Those who want to make a real change for our clients and our business.</p>
                            <p class="info-rap mb-0">If you’re driven by big ideas and move at a fast pace, you’ll fit in well at Enablers Performance.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Join Heading Wrapper-->

    <!--Start Jobs wrapper-->
    <section class="jobs-wrapper padd grey-bg">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="jobs-heading text-center">
                            <h3 class="md-heading">{{ $careers->count() ? 'Available Jobs' : 'No Jobs Available right Now' }}</h3>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="jobs-tabs-content">
                            <div class="row">
                                @foreach($careers as $career)
                                    <div class="col-12">
                                        <div class="job-content-wrap p-3 p-lg-5">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="job-details">
                                                        <h4 class="jobs-title">{{ $career->title }}</h4>
                                                        <span class="job-des d-block">{{ $career->sub_title }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="job-location py-4 py-lg-0">
                                                        <span><i class="fas fa-map-marker-alt pr-3"></i> {{ $career->location }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="job-apply-link">
                                                        <a href="{{ $career->link }}" class="blue-btn">Apply Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Jobs wrapper-->
@endsection

@section('scripts')
@endsection
