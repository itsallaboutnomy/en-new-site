@extends('enablers.app.layouts.app')

@section('page-title',' | '.$training->title)

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
                            <h2 class="md-heading">Become Amazon Best Seller by Selling Profitable Wholesale Products on Amazon FBA!</h2>
                            <p class="info-rap">Want to sell on Amazon without private labeling or creating your own listings? FBA platform by Amazon is simply the most effective way to sell physical products online. Finding and selling Wholesale products and selling to buyers with the products they want and need. <strong>Amazon FBA Wholesale Boot Camp</strong> is a step-by-step roadmap to search, source, ship and sell those great products and reap the profits.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0 order-1 order-lg-2">
                        <div class="st-much-image text-center">
                            <img src="{{ _asset('assets-app/img/Enablers-after-much-icon.png') }}">
                        </div>
                    </div>
                    <div class="col-12 order-3 my-5">
                        <p class="info-rap">Selling Wholesale products is the only <strong>Amazon Fba Wholesale</strong> model with the ability to offer replenish-able inventory in easy to ship, case-packed quantities while avoiding all the pitfalls of importing from overseas. Folks just like you are running successful, scalable wholesale businesses from their garages and from their warehouses. Wholesale sellers don’t need to be marketing wizards or search engine gurus, they just need the tenacity of a bloodhound to sniff out great products. This course will equip you to do just that.</p>
                        <p class="info-rap">You will learn everything you need to know on how to start and run a successful <strong>Amazon FBA Wholesale Business from Pakistan</strong> and abroad.</p>
                        <p class="info-rap">You will learn how to become <strong>Amazon Best Seller</strong> use all the essential tools to calculate profits and find the very best suppliers. Moreover, this course also includes all the best practices that will set you apart from other sellers.</p>
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
                            <h3 class="md-heading text-white mb-4">Join today and start your first FBA wholesale with Amazon!</h3>
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
    <!-- Start Training Module Wrapper -->
    <section class="tr-module-wrapper grey-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tr-module-heading">
                            <h3 class="md-heading">Amazon FBA Wholesale Boot Camp Module Breakdown</h3>
                            <p class="info-rap">Now…here’s something <strong class="text-uppercase">SUPER EXCITING</strong> that we have to share with you…</p>
                            <p class="info-rap">This is a complete overview of the actions you will take while building your business with the Enablers to <strong>become Amazon Best Seller</strong></p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ol class="tr-module-listed my-5 pl-0">
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">INTRODUCTION TO AMAZON FBA WHOLESALE</h4>
                                <ul class="tr-module-inner">
                                    <li>Amazon Overview</li>
                                    <li>Buyer/Seller Overview</li>
                                    <li>Amazon Business Models</li>
                                    <li>Why Wholesale?</li>
                                    <li>Required Credentials for Wholesale FBA</li>
                                    <li>Understanding Tax System USA/UK</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">ACCOUNT REGISTRATION</h4>
                                <ul class="tr-module-inner">
                                    <li>Registering Company &amp; Tax Id’s</li>
                                    <li>Seller Account Registration</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">AMAZON BUYER VIEW</h4>
                                <ul class="tr-module-inner">
                                    <li>Understanding Amazon Search Page Filters &amp; Categories</li>
                                    <li>Understand Product Pages (Metoo – Asin – UPC/EAN – BuyBox – BSR – Keyword Ranking – Brand Store)</li>
                                    <li>Understanding of Models &amp; Hacks (For knowledge purpose)</li>
                                    <li>Learn about Wholesale FBA/FBM Hacks (For knowledge purpose)</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">SOFTWARE & RESEARCHING METHODS FOR AMAZON FBA WHOLESALE</h4>
                                <ul class="tr-module-inner">
                                    <li>Tools &amp; Software</li>
                                    <li>Recommended Categories and Products</li>
                                    <li>Product Research Methods</li>
                                    <li>Ideas for Product Hunting</li>
                                    <li>Reverse Sourcing Keepa</li>
                                    <li>Reverse Sourcing Helium10</li>
                                    <li>Reverse Sourcing with Jungle Scout Chrome</li>
                                    <li>How to Know if a Product is Worth Buying</li>
                                    <li>Searching Wholesalers</li>
                                    <li>Setting Up Website Contacting Wholesalers</li>
                                    <li>Setting UP Accounts with Wholesalers/Distributors/Suppliers</li>
                                    <li>Wholesale Central</li>
                                    <li>Feed Scanning</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">AMAZON FBA WHOLESALE SHIPMENTS & CALCULATIONS</h4>
                                <ul class="tr-module-inner">
                                    <li>Calculating Profit</li>
                                    <li>Storage Fees</li>
                                    <li>Prep Center &amp; Services</li>
                                    <li>Ordering with suppliers</li>
                                    <li>FBA Shipments</li>
                                    <li>Adding Products to Your Inventory</li>
                                    <li>Create a Shipment</li>
                                    <li>Managing Stock</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">ADDITIONAL GUIDELINES</h4>
                                <ul class="tr-module-inner">
                                    <li>Virtual Assistants and Automating your Business</li>
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
                                    <div class="panel-body">We will continue to help you in our Whatsapp group Secret Facebook group where you will be added in once you join this programme.</div>
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
