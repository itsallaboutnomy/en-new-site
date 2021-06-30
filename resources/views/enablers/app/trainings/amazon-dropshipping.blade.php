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
                            <h2 class="md-heading">START PROFITABLE DROPSHIPPING BUSINESS ON AMAZON WHILE LIVING IN PAKISTAN!</h2>
                            <p class="info-rap">This course will cover everything you need to know to start an Amazon<strong>dropshipping business in Pakistan.</strong></p>
                            <p class="info-rap">Want to understand dropshipping in detail? The courses will help you find better products based on the list of niches.</p>
                            <p class="info-rap">The knowledge in this course can be applied for Dropshipping and discovering better niches for selling. Quite beneficial to e-commerce business owners and after completion, of course, you will be able to handle your own or someone other’s accounts.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0 order-1 order-lg-2">
                        <div class="st-much-image text-center">
                            <img src="{{ _asset('assets-app/img/Enablers-after-much-icon.png') }}">
                        </div>
                    </div>
                    <div class="col-12 py-5 order-3">
                        <p class="info-rap">
                            We know the strategies that are currently working today, and we are teaching the secrets and share this hidden knowledge with you so that you can develop your own business model. All we really need from you is to be committed and put the effort and time into this business. It won’t be easy but worth it, therefore if you are ready, let us hold you by the hand and help develop a descent income-generating dropshipping business in Pakistan.
                        </p>
                        <h4 class="md-heading">WHO IS THIS COURSE FOR? </h4>
                        <p class="info-rap">The Complete Amazon dropshipping course is aimed for beginners & will help more experienced dropshipping business owners.</p>
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
                            <h3 class="md-heading text-white mb-4">Join today and start your first Dropshipping with Amazon!</h3>
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
                            <h3 class="md-heading">Dropshipping Course Module Breakdown</h3>
                            <p class="info-rap">Now…here’s something <strong class="text-uppercase">SUPER EXCITING</strong> that we have to share with you…</p>
                            <p class="info-rap">This is a complete overview of the actions you will take while building your dropshipping business with the Enablers.</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ol class="tr-module-listed my-5 pl-0">
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">INTRODUCTION TO DROP SHIPPING BUSINESS</h4>
                                <ul class="tr-module-inner">
                                    <li>Amazon Buyer/Seller Overview</li>
                                    <li>Understanding FBM/FBA &amp; Dropshipping</li>
                                    <li>Understanding Me-too – Feedbacks – Ranking</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">SET UP AMAZON ACCOUNT & IMPORTANT ACCOUNT SETTINGS</h4>
                                <ul class="tr-module-inner">
                                    <li>Introduction / Your First Steps Towards Financial Freedom!</li>
                                    <li>Creating Your Amazon Seller’s Pro Account</li>
                                    <li>Crucial account settings for dropshipping.</li>
                                    <li>Setting Up Your Shipping and Return Settings</li>
                                    <li>Understanding Seller Central Dashboard and understanding Account health while dropshipping.</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">LEGAL & TAX INFO, DOCUMENTS AND ADDITIONAL INFO</h4>
                                <ul class="tr-module-inner">
                                    <li>Forming an LLC for Your Business while being in Pakistan.</li>
                                    <li>Importance of ITIN and How to get it.</li>
                                    <li>Importance of company accounts and Credit Cards in dropshipping business.</li>
                                    <li>Getting Your Resell Certificates, Sales and Use Tax Certificates.</li>
                                    <li>Setting your Amazon Tax Settings.</li>
                                    <li>Understanding Tax Exemptions from Stores or wholesalers.</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">UNDERSTAND SOURCING FIRST</h4>
                                <ul class="tr-module-inner">
                                    <li>Wal-Mart to Amazon</li>
                                    <li>Overstock to Amazon</li>
                                    <li>Costco to Amazon</li>
                                    <li>Sam’s Club to Amazon</li>
                                    <li>Retail Arbitrage</li>
                                    <li>Online retail Arbitrage</li>
                                    <li>eBay items to Amazon</li>
                                    <li>Dropshipping from wholesalers or warehouses.</li>
                                    <li>Learn Tools (Helium10 – Jungle Scout – Google Trends).</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">PRODUCT RESEARCH, ADDING INVENTORY, PROCESSING RETURNS AND CUSTOMER SERVICE</h4>
                                <ul class="tr-module-inner">
                                    <li>Techniques of Product Hunting – How to Find Profitable Items for dropshipping</li>
                                    <li>Understanding FEES and Profit Calculation.</li>
                                    <li>Adding Items to Your Inventory.</li>
                                    <li>HACKS to win BUYBOX.</li>
                                    <li>Competition Analysis and Manage Inventory and Pricing</li>
                                    <li>How to Manage Orders and Handling time.</li>
                                    <li>How to Process Orders through Your Supplier</li>
                                    <li>Confirming &amp; Tracking Orders/Shipments</li>
                                    <li>Sales &amp; Inventory Spreadsheet – Tools for Business</li>
                                    <li>E-Mail Scripts for Customer Service Inquiries</li>
                                    <li>Hacks to Handle Cancellation Requests</li>
                                    <li>Hacks to Handle/Process Returns</li>
                                    <li>Hacks to reduce customer complaints and handling communication with buyer.</li>
                                    <li>Hacks to keep your account Metrics as good to avoid suspension.</li>
                                    <li>How to deal with Invoices and Amazon requirements.</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">LAYING THE FOUNDATION & GROUND WORK</h4>
                                <ul class="tr-module-inner">
                                    <li>Plugins/Extensions Setup &amp; Installation</li>
                                    <li>Hacks to Earn Cashback and Which Ones to Sign Up Too.</li>
                                    <li>Different ways and Hacks to Earn Cashback.</li>
                                    <li>Different ways and Hacks to Earn Cashback.</li>
                                    <li>Selection of suppliers and understanding which supplier will be best for your dropshipping business.</li>
                                    <li>Understanding return and dispute resolution with these suppliers.</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">HACKS OF SCALING YOUR DROPSHIPPING BUSINESS IN A SAFE WAY.</h4>
                                <ul class="tr-module-inner">
                                    <li>Understanding scaling your dropshipping business in a proper way to avoid issue with Amazon.</li>
                                    <li>Hacks to list more profitable products in a proper way to stay under Radar.</li>
                                    <li>Products and actions to AVOID in dropshipping business.</li>
                                    <li>Outsourcing – Hiring a VA to Automate your Tasks</li>
                                    <li>Outsourcing Tools – Inventory Management and Repricer Tools</li>
                                    <li>Book keeping and records of your business for analysis and taxation purpose.</li>
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
