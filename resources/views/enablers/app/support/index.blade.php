@extends('enablers.app.layouts.app')

@section('page-title',' | Contact Support')

@section('styles')
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="p-inner" class="s-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 animate__animated animate__animated animate__fadeInLeft">
                        <div class="support-left-content main-headings">
                            <span class="d-block sub-title text-white">Support Centre</span>
                            <h1 class="text-white h-primary text-uppercase">How can we help you today?</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->

    <!--   Start Search Wrapper -->
    <section class="s-search-wrapper padd">
        <div class="content padd mt-5 mt-lg-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="s-search-content text-center">
                            <h2 class="md-heading">Support</h2>
                            <p>Please use the options below to get help with your Enablers support</p>
                        </div>
                    </div>
                </div>
                @if (\Session::has('success'))
                    <div class="alert alert-success" style="font-size: 20px;margin-top: 10px;">
                        {!! \Session::get('success') !!}
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!--   End Search Wrapper -->

    <!--  Start Support Wrapper-->
    <section class="s-support-wrapper grey-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <a href="{{ route('app.support.refundRequest.create')}}" class="s-support-link d-block h-100 height-auto">
                            <div class="card support-block text-center h-100 height-auto">
                                <div class="s-support-icon">
                                    <img src="{{ _asset('assets-app/img/Enablers-Refund-Request-icon.png') }}">
                                </div>
                                <div class="s-support-content">
                                    <h3>Refund Request</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <a href="{{ route('app.support.paymentRelatedConcern.create')}}" class="s-support-link d-block h-100 height-auto">
                            <div class="card support-block text-center h-100 height-auto">
                                <div class="s-support-icon">
                                    <img src="{{ _asset('assets-app/img/Enablers-Payment-Related-icon.png') }}">
                                </div>
                                <div class="s-support-content">
                                    <h3>Payment Related Concern</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <a href="{{ route('app.support.evsConcern.create')}}" class="s-support-link d-block h-100 height-auto">
                            <div class="card support-block text-center h-100 height-auto">
                                <div class="s-support-icon">
                                    <img src="{{ _asset('assets-app/img/Enablers-EVS-Concern-icon.png') }}">
                                </div>
                                <div class="s-support-content">
                                    <h3>EVS Concern</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <a href="{{ route('app.support.trainingRelatedConcern.create')}}" class="s-support-link d-block h-100 height-auto">
                            <div class="card support-block text-center h-100 height-auto">
                                <div class="s-support-icon">
                                    <img src="{{ _asset('assets-app/img/Enablers-Training-Related-icon.png') }}">
                                </div>
                                <div class="s-support-content">
                                    <h3>Training Related Concern</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <a href="{{ route('app.support.changeOfTrainingRequest.create')}}" class="s-support-link d-block h-100 height-auto">
                            <div class="card support-block text-center h-100 height-auto">
                                <div class="s-support-icon">
                                    <img src="{{ _asset('assets-app/img/Enablers-training-Request-icon.png') }}">
                                </div>
                                <div class="s-support-content">
                                    <h3>Change of Training Request</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <a href="{{ route('app.support.changeOfMentorRequest.create')}}" class="s-support-link d-block h-100 height-auto">
                            <div class="card support-block text-center h-100 height-auto">
                                <div class="s-support-icon">
                                    <img src="{{ _asset('assets-app/img/Enablers-Mentor-Request-icon.png') }}">
                                </div>
                                <div class="s-support-content">
                                    <h3>Change of Mentor Request</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <a href="{{ route('app.support.generalComplaint.create')}}" class="s-support-link d-block h-100 height-auto">
                            <div class="card support-block text-center h-100 height-auto">
                                <div class="s-support-icon">
                                    <img src="{{ _asset('assets-app/img/Enablers-General-Complaint-icon.png') }}">
                                </div>
                                <div class="s-support-content">
                                    <h3>General Complaint</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <a href="{{ route('app.support.suggestions.create')}}" class="s-support-link d-block h-100 height-auto">
                            <div class="card support-block text-center h-100 height-auto">
                                <div class="s-support-icon">
                                    <img src="{{ _asset('assets-app/img/Enablers-Suggestions-icon.png') }}">
                                </div>
                                <div class="s-support-content">
                                    <h3>Suggestions</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <a href="{{ route('app.support.epasConcern.create')}}" class="s-support-link d-block h-100 height-auto">
                            <div class="card support-block text-center h-100 height-auto">
                                <div class="s-support-icon">
                                    <img src="https://www.enablers.org/wp-content/uploads/2021/04/epas-1.png">
                                </div>
                                <div class="s-support-content">
                                    <h3>EPAS CONCERN</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End Support Wrapper -->
@endsection

@section('scripts')
@endsection
