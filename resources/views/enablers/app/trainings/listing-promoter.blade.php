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

    <!--  Start Much Wrapper -->
    <section class="st-much-wrapper padd mt-5">
        <div class="content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8  order-2 order-lg-1">
                        <div class="st-much-content">
                            <h2 class="md-heading">Get your Product Listing Promoted on the first page of Amazon</h2>
                            <p class="info-rap">Our <strong>Amazon Product Listing Promoter Training Course</strong> is a need for all sellers. Here we are providing you with the opportunity to progress in your sales.</p>
                            <p class="info-rap">Many people get their listings suspended. Moreover, seller winning products sometimes get leaked by reviewers which then end up selling on Fiverr by some bad people as the winning product.</p>
                            <p class="info-rap">All the orders will be organic with Search and Buy through this training. This course will teach you to be skilled at a flawless approach that will automatically take care of your money every month.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0 order-1 order-lg-2">
                        <div class="st-much-image text-center">
                            <img src="{{ _asset('assets-app/img/Enablers-after-much-icon.png') }}">
                        </div>
                    </div>
                    <div class="col-12 order-3 my-5">
                        <p class="info-rap">Hence, we have thought about it how we can get this secure for everyone to learn how to gain reviews as we all know that reviews are key to success! We came up with <strong>Amazon Product Listing Promoter training course,</strong> which allows you to setup end to end and gain reviews by just spending $1, and then potentially, you can charge $10 per review from your customer. Seeing the potential of <a href="#"> learning Many Chat</a> will help you get the review for your product and also potentially offering your services to others.</p>
                        <p class="info-rap">All the orders will be organic with Search and Buy through this training. This course will teach you to be skilled at a flawless approach that will automatically take care of your money every month.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End Much Wrapper -->
    <!-- Start Become Wrapper -->
    <section class="st-become-wrapper blue-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="st-become-content text-center">
                            <h3 class="md-heading text-white mb-4">Join today and start your journey to Listing Promoter!</h3>
                            @if($training->is_registration_open)
                                <a href="{{ route('app.enrollment.create') }}?enroll_for=training&slug={{ $training->slug }}" class="black-btn">LET’S GET STARTED</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Become Wrapper -->
    <!-- Start Training Module Wrapper -->
    <section class="tr-module-wrapper grey-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tr-module-heading">
                            <h3 class="md-heading">Amazon Product Listing Promoter Training Module Breakdown</h3>
                            <p class="info-rap">Now…here’s something <strong class="text-uppercase">SUPER EXCITING</strong> that we have to share with you…</p>
                            <p class="info-rap">This is a complete overview of the actions you will take while building your business with the Enablers.</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ol class="tr-module-listed my-5 pl-0">
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">INTRODUCTION TO AMAZON & DARAZ PRODUCT LISTING PROMOTER TRAINING</h4>
                                <ul class="tr-module-inner">
                                    <li>How it Works.</li>
                                    <li>What is the benefit in it for seller, buyer and Listing Promoter.</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">HUNTING DOWN BUYERS AND SELLERS</h4>
                                <ul class="tr-module-inner">
                                    <li>How to use Social Media for Listing Promotion.</li>
                                    <li>How to find buyers.</li>
                                    <li>How to verify buyer.</li>
                                    <li>How to find Sellers (Local &amp; International)</li>
                                    <li>How to verify International Sellers</li>
                                    <li>How to Fix Commissions With Client.</li>
                                    <li>How to use Google Sheets for Listing Promotion.</li>
                                    <li>(Enablers product launches and Enablers BC existing sellers will also utilize LP’s services)</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">SOCIAL MEDIA MARKETING</h4>
                                <ul class="tr-module-inner">
                                    <li>Using Facebook Messenger to Build a Subscriber List</li>
                                    <li>Building a Subscriber List Ahead of Time.</li>
                                    <li>How to use Instagram for Listing Promotion.</li>
                                    <li>How the Facebook Subscriber List can help you offering services of posting Questions/Feedbacks/upvoting etc.</li>
                                    <li>How to Build up your Buyer and Seller Database.</li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Training Module Wrapper -->
    <!-- Start Become Wrapper -->
    <section class="st-become-wrapper blue-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="st-become-content text-center">
                            <h3 class="md-heading text-white mb-4">READY TO TAKE THE FIRST STEP TO A SUCCESSFUL CAREER? ENROLL NOW!</h3>
                            @if($training->is_registration_open)
                                <a href="{{ route('app.enrollment.create') }}?enroll_for=training&slug={{ $training->slug }}" class="black-btn">RESERVE YOUR SEAT NOW!</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Become Wrapper -->
    <!-- Start Faqs Wrapper -->
    <section class="tr-faqs-wrapper grey-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5 class="md-heading text-org my-5">FREQUENTLY ASKED QUESTIONS</h5>
                    </div>
                    <div class="col-12 mb-5">
                        <div id="accordion" class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#collapse1" data-toggle="collapse">Please see what If I need more help after my classes are finished?</a></h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse" aria-expanded="false">
                                    <div class="panel-body">We will continue to help you in our Whatsapp group &amp; Secret Facebook group where you will be added in once you join this programme.</div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#collapse2" data-toggle="collapse">Do I have to sign up right now or can I wait ?</a></h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse" aria-expanded="false">
                                    <div class="panel-body">Doors are open for a very limited time. You need to grab your spot now to secure your training. If you wait, you’ll miss out on the opportunity to change your life forever.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Faqs Wrapper -->
@endsection

@section('scripts')
@endsection
