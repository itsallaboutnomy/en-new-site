@extends('enablers.app.layouts.app')

@section('page-title',' | Success Stories')

@section('styles')
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="p-inner" class="ss-banner-wrapper pr-4 pr-lg-5">
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
                        <div class="ss-left-content main-headings">
                            <span class="d-block sub-title text-white">WE Make</span>
                            <h1 class="text-white h-primary text-uppercase">thousands of SUCCESS STORIES</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->
    <!--  Start MOTIVATION wrapper -->
    <section class="ss-motivation-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ss-motivation-heading py-5">
                            <h2 class="md-heading text">YOUR DETERMINATION IS THE MOTIVATION FOR OTHERS</h2>
                            <p class="f-20">Read how people like you changed their life by simply following our motto “There is no Plan B.” Learn to build your own Amazon business, launching, optimizing, and listing and get inspired by the success stories and experiences of others.</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ss-listen-wrapper">
                            <div class="ss-img-box">
                                <img src="{{ _asset('assets-app/img/Enablers-story-colage.png') }}">
                                <div class="ss-head-content text-center">
                                    <h3 class="md-heading text-white">LISTEN FROM , WHO NEVER GAVE UP </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 my-5">
                        <div class="ss-btns">
                            <div class="row">
                                <div class="col-lg-5 ml-auto">
                                    <a href="https://www.youtube.com/channel/UCmKr9PW2edzkzMpbju_9Jzw" class="orange-btn d-block mb-5 mb-lg-0" target="_blank"><i class="fab fa-youtube pr-4"></i>Watch success stories on YouTube</a>
                                </div>
                                <div class="col-lg-5 mr-auto">
                                    <a href="https://www.facebook.com/EnablersTeam" class="blue-btn d-block" target="_blank"><i class="fab fa-facebook-f pr-4"></i> Read stories on Facebook</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End MOTIVATION wrapper -->
@endsection

@section('scripts')
@endsection
