@extends('enablers.app.layouts.app')

@section('page-title',' | Services')

@section('styles')
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="p-inner" class="sev-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-12 animate__animated animate__animated animate__fadeInLeft">
                        <div class="ser-left-content main-headings">
                            <h1 class="text-white h-primary text-uppercase">Enablers Services Directory</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->

    <!-- Start Does Wrapper -->
    <section class="ser-does-wrapper padd mt-5">
        <div class="content pb-0 pb-md-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="ser-does-heading">
                        <h3 class="md-heading">How Does It Work?</h3>
                        <p class="f-20">Joining Enablers Services Directory is simple. All you need to do is to register your brand with Enablers Services Directory, provide us with relevant details regarding your service domain and our team will list your business on our directory in no time.</p>
                    </div>
                    </div>
                </div>
                <div class="row pt-5 mt-md-5 mt-0">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-5 mb-md-0 animate__animated animate__zoomIn">
                    <div class="ser-does-blocks  text-center">
                        <div class="ser-does-icon">
                            <img src="{{ _asset('assets-app/img/Enablers-register-business-icon.png') }}">
                        </div>
                        <h5 class="ser-does-title">register business</h5>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-5 mb-md-0 animate__animated animate__zoomIn">
                    <div class="ser-does-blocks text-center">
                        <div class="ser-does-icon">
                            <img src="{{ _asset('assets-app/img/Enablers-client-communication-icon.png') }}">
                        </div>
                        <h5 class="ser-does-title">client communication</h5>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-5 mb-md-0 animate__animated animate__zoomIn">
                    <div class="ser-does-blocks ser-border text-center">
                        <div class="ser-does-icon">
                            <img src="{{ _asset('assets-app/img/Enablers-get-hired-icon.png') }}">
                        </div>
                        <h5 class="ser-does-title">get hired</h5>
                    </div>
                    </div>
                    <div class="col-lg-12">
                    <div class="ser-dose-btn text-center py-5 mt-0 mt-md-5">
                        <a href="{{ route('app.services-enrolment.create') }}" class="blue-btn">get membership</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Does Wrapper -->

    <!-- Start Companies Wrapper  -->
    <section class="ser-companies-wrapper padd grey-bg">
        <div class="content">
            <div class="container">
                <div class="row">
                    <!--Accordion wrapper-->
                    <div class="col-12">
                    <div class="accordion md-accordion" role="tablist" aria-multiselectable="true">
                        @foreach ($services as $category=>$items)
                        <div class="card ser-com-cta my-5" role="tab" id="headingOne1">
                            <div class="row align-items-start">
                                <div class="col-10">
                                <div class="ser-cta-details">
                                    <a data-toggle="collapse" href="#collapse{{ $loop->iteration }}" aria-expanded="true"
                                        aria-controls="collapse{{ $loop->iteration }}">
                                        <h5 class="ser-com-title text-uppercase">{{ $category }}</h5>
                                    </a>
                                    <span class="ser-com-ver d-block">{{ count($items) }} Verified Companies Available </span>
                                </div>
                                </div>
                                <div class="col-2 text-right">
                                <a class="togel-btn" data-toggle="collapse" href="#collapse{{ $loop->iteration }}" aria-expanded="true"
                                    aria-controls="collapse{{ $loop->iteration }}">
                                <i class="fas fa-angle-down rotate-icon"></i>
                                </a>
                                </div>
                            </div>
                        </div>
                        <div id="collapse{{ $loop->iteration }}" class="collapse" role="tabpanel" aria-labelledby="headingOne1">
                            <div class="card ser-formation">
                                <div class="card ser-com-content mb-5">
                                <div class="row">
                                    @foreach ($items as $item)
                                    <div class="col-lg-4">
                                        <div class="ser-com-logos h-50" style="overflow-y: hidden;">
                                            <img src="{{ _asset($item->service_image_path) }}">
                                        </div>
                                        <div class="ser-com-details">
                                            <div class="p-grid">
                                            <a href="{{ $item->url }}" target="_blank" class="blue-btn my-4 d-inline-block"> Find More</a>
                                            <span class="s-ver d-block"><i class="fas fa-check"></i>Verified by Enablers</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </div>
                    <!-- Accordion wrapper -->
                </div>
                <div class="row">
                    <div class="col-12">
                    <div class="card ser-dis">
                        <h4 class="ser-dis-title">Disclaimer</h4>
                        <p class="ser-dis-desc">Please read the following clauses before proceeding with businesses listed here:</p>
                        <ul class="ser-dis-listed">
                            <li>Enablers Services Directory is listing services providers only. Once in agreement with the company, clients are solely responsible for their proceedings.</li>
                            <li>Enablers services Directory is working for marketing purposes only, promoting the businesses listed on our platform.</li>
                            <li>All businesses listed here are registered users. Enablers Services Directory is only responsible for listing and promoting such brands.</li>
                            <li>Enablers Services Directory will feature reviews posted by users on each brand. Please refer to our guidelines for posting reviews.</li>
                            <li>Enablers Services Directory will feature reviews posted by users on each brand. Please refer to our guidelines for posting reviews.</li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Companies Wrapper  -->
@endsection

@section('scripts')
@endsection
