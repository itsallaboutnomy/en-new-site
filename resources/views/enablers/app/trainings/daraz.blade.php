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
                            <h2 class="md-heading">AFTER MUCH REQUEST, WE’RE INTRODUCING OUR THOROUGH TRAINING COURSE ON SETTING UP YOUR BUSINESS ON DARAZ.</h2>
                            <p class="info-rap">As the world keeps progressing into digital reliance, it is no doubt that online businesses are the future of Pakistan. Do you want to become a part of Pakistan’s biggest online shopping website and expand your business online to make the most with Daraz! With Daraz’s acquisition by one of the e-commerce giants of the world, Alibaba Group; our trainers will let you experience how it’s like to work with the globally leading online commerce technology and logistics making it easy to expand your business from the comfort of your home, all within Pakistan.</p>
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
                            <h3 class="md-heading text-white mb-4">BECOME A PART OF THE DIGITAL ECONOMY IN PAKISTAN THROUGH DARAZ</h3>
                            @if($training->is_registration_open)
                                <a href="{{ route('app.enrollment.create') }}?enroll_for=training&slug={{ $training->slug }}" class="black-btn"> LET’S GET STARTED</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Become Wrapper -->
    <!-- Start Teach Wrapper -->
    <section class="st-teach-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="st-teach-content">
                            <h4 class="md-heading text-capitalize">You might have come across Daraz to buy but have no idea how to sell on it and build your business? No Problem! We will make you understand every minute detail.</h4>
                            <ul class="st-teach-listed">
                                <li>Daraz Introduction</li>
                                <li>Seller Account Registration</li>
                                <li>Product Research</li>
                                <li>Listing your product (Single/Variation)</li>
                                <li>Product Approval</li>
                                <li>Keyword Research</li>
                                <li>Product Ranking</li>
                                <li>Social Media Marketing (Facebook, YouTube, Brand Awareness) </li>
                                <li>Paid Marketing (Campaign Managements, Ads; Discounts and a lot more)</li>
                                <li>How to use Daraz seller central in order to start selling and receiving orders</li>
                                <li>Manage Orders</li>
                                <li>How to contact support</li>
                                <li>Review Building</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Teach Wrapper -->

    <!-- Start Training Module Wrapper -->
    <section class="tr-module-wrapper grey-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tr-module-heading">
                            <h3 class="md-heading">Module Breakdown</h3>
                            <p class="info-rap">Below is a brief overview of the actions you will take while building your Daraz business in Pakistan with Enablers.</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ol class="tr-module-listed my-5 pl-0">
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">DARAZ INTRODUCTION ACCOUNT OPENING</h4>
                                <ul class="tr-module-inner">
                                    <li>Daraz potential and business models (FBD, FBM)</li>
                                    <li>How to create Daraz account</li>
                                    <li>Get your Daraz seller center account set up and ready to go</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">FINDING THE PROFITABLE PRODUCT</h4>
                                <ul class="tr-module-inner">
                                    <li>What your product needs to have in order to beat the competition – Enablers criteria</li>
                                    <li>Which categories to choose for maximum result and those to avoid for your products</li>
                                    <li>The perfect product selection system – complete overview of the entire product selection system</li>
                                    <li>Stretching the enablers criteria – A product you are passionate about but does not quite match all the criteria</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">EVALUATING SUPPLIERS AND SAMPLES</h4>
                                <ul class="tr-module-inner">
                                    <li>Understanding Daraz’s fees – how to understand exactly how much will it cost you to sell on Daraz</li>
                                    <li>Product tuning – how to make your product stand out amongst the rest</li>
                                    <li>Simple product sourcing – how to source your products</li>
                                    <li>Creating a professional online presence – how to create a professional online presence to make you look like a pro from the start</li>
                                    <li>Calculating the true cost of a product – how to ensure that the product you choose will make you a profit after all costs are taken into account</li>
                                    <li>Getting samples for your top opportunity – how to order samples for your top product opportunity</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">ORDERING YOUR INVENTORY AND CREATING YOUR STORE</h4>
                                <ul class="tr-module-inner">
                                    <li>Choosing the best supplier and getting the highest profit margin – how to choose the best supplier </li>
                                    <li>Getting ready for your first inventory order – what you need to place on your first inventory order</li>
                                    <li>Quick start product listing – creating a quick product listing is needed before you can ship your inventory</li>
                                    <li>Designing your product packaging – the easiest ways to get the best product packaging</li>
                                    <li>The power of package inserts – how to start building a customer list from day 1</li>
                                    <li>How much inventory should you order? – how to determine the right amount of inventory to order for your first order</li>
                                    <li>All “secrets” of placing your first inventory order</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">THE FLAWLESS PRODUCT PAGE/STORE</h4>
                                <ul class="tr-module-inner">
                                    <li>How to craft the perfect product listing to crush your competitors</li>
                                    <li>Strategic keyword research for top rankings – how to find the best possible keywords to target for your product to get maximum traffic and sales</li>
                                    <li>How to craft the best title to gain traffic and conversion</li>
                                    <li>How to create a compelling product description that steals sales from your competitors</li>
                                    <li>Product images that attract and convert – along with the title, your product images are the most important element of your listing</li>
                                    <li>Product pricing for profit – how to choose the right price to get both traffic and sales, but still have a significant profit margin</li>
                                    <li>Creating your complete listing – how to add all the elements to optimize your listing</li>
                                    <li>How to craft the perfect customer emails for engagement and reviews</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">THE PERFECT PRODUCT LAUNCH ON DARAZ</h4>
                                <ul class="tr-module-inner">
                                    <li>Daraz launch process</li>
                                    <li>Planning for success – key preparation steps for a successful product launch</li>
                                    <li>Tracking the data to inform decisions – what numbers matter the most for a successful launch</li>
                                    <li>Introduction to Daraz sponsored product advertising – why it’s an important piece of your brand strategy</li>
                                    <li>Optimizing price against rank and sales – how and when to optimize your price and increase profit</li>
                                    <li>Sustaining rank profitably – how to hold onto your spot when achieve top ranking on Daraz</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">DEALS MANAGEMENT</h4>
                                <ul class="tr-module-inner">
                                    <li>How to be eligible to enroll in Flash Sales</li>
                                    <li>How to enroll in Deals on Occasions</li>
                                    <li>How to enroll and take benefit of 11.11 sale</li>
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
                            <h3 class="md-heading text-white mb-4">BUILD YOUR BUSINESS TODAY – WE’RE READY TO HELP YOU!</h3>
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
                                    <h4 class="panel-title"><a href="#collapse1" data-toggle="collapse">What if I need more help after two months?</a></h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse" aria-expanded="false">
                                    <div class="panel-body">We will continue to help you in our Secret Facebook group where you will be added in once you join this programme.</div>
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
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#collapse3" data-toggle="collapse">What if I need to attend any of the on-going class later on to clear my concepts ?</a></h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse" aria-expanded="false">
                                    <div class="panel-body">Note: Enablers will NOT allow you to join any class after 6 Months if you didn’t take any action.</div>
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
