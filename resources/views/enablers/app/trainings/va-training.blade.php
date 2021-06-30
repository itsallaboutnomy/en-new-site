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
                            <h2 class="md-heading"> AFTER MUCH DEMAND INTRODUCING A DETAILED VIRTUAL ASSISTANT TRAINING COURSE</h2>
                            <p class="info-rap"><strong>Virtual Assistant Training Course</strong> is designed to provide you with a road-map to become successful virtual assistant and start working as a full time VA. Instead of wasting time trying to figure this all out on your own, it’s smart to join the course.</p>
                            <p class="info-rap">In this course you will learn important principles and practical step-by-step techniques for providing <strong>Virtual Assistant Services</strong> and getting started in a career as a professional virtual assistant. This course is for individuals that are serious about landing the high paying, quality virtual assistant positions and successfully launching a virtual assistance business.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0 order-1 order-lg-2">
                        <div class="st-much-image text-center">
                            <img src="{{ _asset('assets-app/img/Enablers-after-much-icon.png') }}">
                        </div>
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
                            <h3 class="md-heading text-white mb-4">BECOME AMAZON PPC PRO – We’RE READY TO HELP YOU!</h3>
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
                            <h3 class="md-heading">Virtual Assistance Course Module Breakdown</h3>
                            <p class="info-rap">Now…here’s something <strong class="text-uppercase">SUPER EXCITING</strong> that we have to share with you…</p>
                            <p class="info-rap">This is a complete overview of the actions you will take while building your business with the Enablers.</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ol class="tr-module-listed my-5 pl-0">
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">AMAZON ACCOUNT MANAGEMENT AS A VIRTUAL ASSISTANT</h4>
                                <ul class="tr-module-inner">
                                    <li>Amazon introduction</li>
                                    <li>Creating New Product Listing (Single/Variation)</li>
                                    <li>Metoo Listing</li>
                                    <li>Product Error Fixing (Suppressed Listing – Quality Alert etc)</li>
                                    <li>Stock Checking</li>
                                    <li>Order Management (FBM)</li>
                                    <li>Creating PPC &amp; Optimisation</li>
                                    <li>Creating (Coupons – Deals – Promotions)</li>
                                    <li>Product hunting &amp; Ranking + Launching Product + Reviews Building</li>
                                    <li>Handling A-to-Z complaint / Charge Back Claims / Returns / Refunds</li>
                                    <li>How to approach Amazon support (Conversation with support)</li>
                                    <li>Managing FBA Shipments</li>
                                    <li>Creating FBA Shipments</li>
                                    <li>Checking Payments (Statements – Transaction Reports etc)</li>
                                    <li>Checking Account Health</li>
                                    <li>Customer Service (Communication Skill – Answering queries )</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">AMAZON FBA</h4>
                                <ul class="tr-module-inner">
                                    <li>Product Hunting</li>
                                    <li>Product Sourcing</li>
                                    <li>How to communicate with the suppliers</li>
                                    <li>Listing and Order Management</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">EBAY ACCOUNT MANAGEMENT AS A VIRTUAL ASSISTANT</h4>
                                <ul class="tr-module-inner">
                                    <li>Ebay introduction</li>
                                    <li>Account Sign up</li>
                                    <li>Subscriptions</li>
                                    <li>Paypal Linking</li>
                                    <li>Product listing (Single/Variation)</li>
                                    <li>Product Error Fixing</li>
                                    <li>Order Management</li>
                                    <li>Creating Promotion</li>
                                    <li>Contacting Support (Conversation to fix any problem)</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">DARAZ SELLER ACCOUNT SIGNUP – SELLING & MANAGING AS VIRTUAL ASSISTANT</h4>
                                <ul class="tr-module-inner">
                                    <li>Daraz Introduction</li>
                                    <li>Seller Account Registration</li>
                                    <li>Product Researching</li>
                                    <li>Content Writing</li>
                                    <li>Keyword Researching</li>
                                    <li>Managing Orders</li>
                                    <li>Listing Product (Single/Variation)</li>
                                    <li>Item Ranking</li>
                                    <li>Brand Searching</li>
                                    <li>How to contact support</li>
                                    <li>Review Building</li>
                                    <li>Customer Service (Communication Skill – Answering queries )</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">FIVERR ACCOUNT SIGNUP/MANAGEMENT AS VIRTUAL ASSISTANT</h4>
                                <ul class="tr-module-inner">
                                    <li>Fiverr Introduction</li>
                                    <li>Account Registration</li>
                                    <li>Creating Profile</li>
                                    <li>Hunting Gigs</li>
                                    <li>Creating Gigs</li>
                                    <li>Understanding Content Writing &amp; Re-Writing</li>
                                    <li>Keyword Researching</li>
                                    <li>Gig Ranking</li>
                                    <li>Review Building</li>
                                    <li>Order Management</li>
                                    <li>Contacting Support (Conversation to fix any problem)</li>
                                    <li>Customer Service (Communication Skill – Answering queries )</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">FREELANCER.COM – RECRUITMENT</h4>
                                <ul class="tr-module-inner">
                                    <li>Freelancer.com Introduction</li>
                                    <li>Account Registration</li>
                                    <li>Payoneer Account Registration</li>
                                    <li>Membership Subscriptions</li>
                                    <li>Becoming Professional Profile</li>
                                    <li>Review Building</li>
                                    <li>Understanding Milestones</li>
                                    <li>Browsing Projects</li>
                                    <li>Bidding / Proposal Submissions</li>
                                    <li>Conversation Ethics</li>
                                    <li>Understanding Payment Withdraw Options</li>
                                    <li>Understanding &amp; Handling Disputes</li>
                                    <li>Contacting Support</li>
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

@endsection

@section('scripts')
@endsection
