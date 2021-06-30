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
    <!-- Start In Wrapper -->
    <section class="tr-in-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="info-rap">Learn how to sell on eBay and build a giant eBay business with this complete A – Z eBay Boot Camp Course, beginner to advanced course</p>
                        <h4 class="md-heading text-org py-3">WHAT WILL I LEARN IN EBAY BOOT CAMP TRAINING?</h4>
                        <ul class="pl-4">
                            <li class="pb-4">Easily sell your household items on <strong>eBay seller account</strong> and then graduate to having a full-blown <strong>eBay business</strong>!</li>
                            <li class="pb-4"><strong>Learn how to do eBay business from Pakistan the RIGHT way for maximum sales, profit and income.</strong></li>
                            <li>Discover tones of inside tips, tricks and strategies that will help you be super-successful on eBay.</li>
                            <li class="pb-4"><strong>Learn little-known eBay “hacks” from a proven instructor who has helped people learn how to sell on eBay – </strong></li>
                        </ul>
                        <h4 class="md-heading text-org py-3">REQUIREMENTS</h4>
                        <ul class="pl-4">
                            <li class="pb-4">Access to a computer with an internet connection.</li>
                            <li class="pb-4"><strong>A willingness to learn through step-by-step demonstrations and then put that learning into action to achieve success.</strong></li>
                            <li class="pb-4">An understanding that you are learning from on eBay “master” who can guide you to success fast!</li>
                        </ul>
                        <h4 class="md-heading text-org py-3">EBAY BOOT CAMP COURSE DETAILS</h4>
                        <p class="info-rap">This training is designed to take you from absolute eBay beginner and turn you into an eBay Boot Camp superstar, by walking you, step-by-step, through several modules.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End In Wrapper -->
    <!-- Start Become Wrapper -->
    <section class="st-become-wrapper blue-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="st-become-content text-center">
                            <h3 class="md-heading text-white mb-4">BUILD YOUR BUSINESS TODAY – WE’RE READY TO HELP YOU!</h3>
                            @if($training->is_registration_open)
                                <a href="{{ route('app.enrollment.create') }}?enroll_for=training&slug={{ $training->slug }}" class="black-btn">YES I AM READY TO START</a>
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
                            <h3 class="md-heading">Selling on Amazon Gulf UAE Market Module Breakdown</h3>
                            <p class="info-rap">Now…here’s something <strong class="text-uppercase">SUPER EXCITING</strong> that we have to share with you…</p>
                            <p class="info-rap">This is a complete overview of the actions you will take while building your business with the Enablers.</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ol class="tr-module-listed my-5 pl-0">
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">AMAZON OVERVIEW – GULF UAE MARKET</h4>
                                <ul class="tr-module-inner">
                                    <li>Buyer/Seller Overview &amp; Account openning</li>
                                    <li>Understand NLC – Metoo – Feedbacks – Ranking</li>
                                    <li>Buy Box</li>
                                    <li>Creating New Products (Single/Variations)</li>
                                    <li>Understanding Keywords</li>
                                    <li>Amazon Seller Account Registration</li>
                                    <li>Amazon Seller Account Management</li>
                                    <li>Understand SABO</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">PRODUCT HUNTING ON AMAZON GULF UAE</h4>
                                <ul class="tr-module-inner">
                                    <li>Product Hunting in Amazon Gulf UAE Market</li>
                                    <li>Product Ranking</li>
                                    <li>Market Research</li>
                                    <li>Product Sourcing</li>
                                    <li>Orders Handling</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">SOCIAL MEDIA MARKETING FOR AMAZON GULF MARKET</h4>
                                <ul class="tr-module-inner">
                                    <li>Conversation Ethics</li>
                                    <li>Facebook</li>
                                    <li>Facebook Ads Intro</li>
                                    <li>Ads Manager</li>
                                    <li>Different type of Ads</li>
                                    <li>How Optimization Works</li>
                                    <li>Optimization Intro</li>
                                    <li>Targeting</li>
                                    <li>Scaling</li>
                                    <li>Ad Manager</li>
                                    <li>What’s a Good Ad</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">GULF AMAZON – SOUQ:</h4>
                                <ul class="tr-module-inner">
                                    <li>Facebook Dropshipping Training</li>
                                    <li>SouQ Seller Account Opening </li>
                                    <li>Product Hunting for Souq</li>
                                    <li>Product Sourcing For SouQ</li>
                                    <li>SouQ Seller Order’s Management &amp; Account Management</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">AMADDITIONAL INFORMATION</h4>
                                <ul class="tr-module-inner">
                                    <li>Breakdown of Metrics</li>
                                    <li>Placement</li>
                                    <li>Power Editor</li>
                                    <li>Engagement Campaign</li>
                                    <li>Manual Bidding Vs Automatic</li>
                                    <li>Split Testing</li>
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
                                    <div class="panel-body">We will continue to help you in our Whatsapp group & Secret Facebook group where you will be added in once you join this programme.</div>
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
