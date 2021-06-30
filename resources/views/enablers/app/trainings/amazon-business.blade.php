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
                            <h2 class="md-heading">AFTER MUCH DEMAND, INTRODUCING A DETAILED & ADVANCED LEVEL COURSE OF BUILDING AMAZON BUSINESS FROM PAKISTAN.</h2>
                            <p class="info-rap">Build your Amazon FBA business and start <strong>selling on Amazon Gulf UAE market</strong> today!</p>
                            <p class="info-rap">Amazon is one of the largest E-Commerce stores across the globe. With a huge number of sellers already selling various commodities on this platform, it can be a difficult feat to boost your sales and get an edge over the rest of the sellers. However, with the premium services of Enablers, your Amazon account will be up and running with your products in no time. Our experienced trainers will handle A to Z.s</p>
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
                            <h3 class="md-heading text-white mb-4">WANT TO BECOME A PRO SELLER ON AMAZON ?</h3>
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
                            <h3 class="md-heading">Module Breakdown</h3>
                            <p class="info-rap">Now…here’s something <strong class="text-uppercase">SUPER EXCITING</strong> that we have to share with you…</p>
                            <p class="info-rap">This is a complete overview of the actions you will take while building your business with the Enablers.</p>
                        </div>
                    </div>
                    <!--    AMAZON PRIVATE LABEL BOOT CAMP -->
                    <div class="col-lg-12">
                        <ol class="tr-module-listed my-5 pl-0">
                            <h4 class="tr-module-title text-org">AMAZON PRIVATE LABEL BOOT CAMP</h4>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li><strong>Decide which Amazon marketplace is the best one for you to sell in</strong></li>
                                    <li>Get your Amazon Seller Central account set up and ready to go</li>
                                    <li><strong>Create a list of hot product opportunities</strong></li>
                                    <li>Narrow down the list</li>
                                    <li><strong>Choose the perfect product(s) to sell</strong></li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li>“Product tune,” and set your product apart from all the others on Amazon</li>
                                    <li><strong>Find the best suppliers who can make your product from anywhere in the world</strong></li>
                                    <li>Get the suppliers to send you the samples you need to make the best possible product choice</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li>Use the brand to create eye-catching packaging</li>
                                    <li><strong>Place your very first inventory order with the best supplier</strong></li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li>During this module, you will build out all of your brand assets, including a brand website, and all of the same social media profiles that are used by the biggest brands in the world.</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li><strong>Build a perfect product page that looks even better than the best-selling online brands</strong></li>
                                    <li>Discover the eight critical areas that are absolutely vital to getting the most sales possible</li>
                                    <li><strong>Master each of these eight areas</strong></li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li>In this module, you are finally ready to start selling your product to the world, and you will start to make everything come together, once your products have arrived at Amazon.</li>
                                    <li><strong>You will walk through the Launch and Rank formula that will help your products shoot up inside of Amazon’s search rankings, resulting in increased visibility and sales.</strong></li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li>Use multiple advanced marketing techniques (that most sellers don’t know about) to get your products in front of even more hungry Amazon buyers</li>
                                    <li><strong>Create a performance checklist to use every day, to ensure that your business is operating at peak efficiency</strong></li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li>Take your business to the next level in order to scale it rapidly, efficiently, and profitably</li>
                                    <li><strong>Use time-tested strategies for making double, triple, or even 10x your business sales in just a short amount of time</strong></li>
                                    <li>Build a team that will run your business for you on autopilot, giving you the ultimate freedom to do whatever it is that you have always wanted</li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                    <!-- AMAZON FBA WHOLESALE -->
                    <div class="col-lg-12">
                        <ol class="tr-module-listed my-5 pl-0">
                            <h4 class="tr-module-title text-org">AMAZON FBA WHOLESALE</h4>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li><strong>Introduction to Amazon FBA Wholesale</strong></li>
                                    <li>Why Wholesale?</li>
                                    <li>Required Credentials for Wholesale FBA</li>
                                    <li>Understanding Tax System USA/UK</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li><strong>Amazon Buyer View</strong></li>
                                    <li>Understanding Amazon Search Page Filters &amp; Categories</li>
                                    <li>Understand Product Pages (Metoo – Asin – UPC/EAN – BuyBox – BSR – Keyword Ranking – Brand Store)</li>
                                    <li>Understanding of Models &amp; Hacks (For knowledge purpose)</li>
                                    <li>Dead Listings</li>
                                    <li>P to P Model for Dead Listings</li>
                                    <li>Learn about Wholesale FBA/FBM Hacks (For knowledge purpose)</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li><strong>Software &amp; Researching Methods for Amazon FBA Wholesale</strong></li>
                                    <li>Tools &amp; Software</li>
                                    <li>Recommended Categories and Products</li>
                                    <li>Product Research Methods</li>
                                    <li>Ideas for Product Hunting</li>
                                    <li>Reverse Sourcing Keepa</li>
                                    <li>Reverse Sourcing Helium10</li>
                                    <li>Reverse Sourcing with Jungle Scout Chrome</li>
                                    <li>How to Know if a Product is Worth Buying</li>
                                    <li>Searching Wholesalers</li>
                                    <li>Setting Up Website &amp; Contacting Wholesalers</li>
                                    <li>Setting UP Accounts with Wholesalers/Distributors/Suppliers</li>
                                    <li>Wholesale Central</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li><strong>Amazon FBA Wholesale Shipments &amp; Calculations</strong></li>
                                    <li>Calculating Profit</li>
                                    <li>Storage Fees</li>
                                    <li>Prep Center &amp; Services</li>
                                    <li>Ordering with suppliers</li>
                                    <li>FBA Shipments</li>
                                    <li>Adding Products to Your Inventory</li>
                                    <li>Create a Shipment</li>
                                    <li>Managing Stock</li>
                                    <li>ASD Trade Shows</li>
                                    <li>Trade Associations</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li><strong>Additional Guidelines</strong></li>
                                    <li>Virtual Assistants and Automating your Business</li>
                                    <li>Accounting &amp; TaxJar</li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                    <!--  AMAZON FBA DROPSHIPPING -->
                    <div class="col-lg-12">
                        <ol class="tr-module-listed my-5 pl-0">
                            <h4 class="tr-module-title text-org">AMAZON FBA DROPSHIPPING</h4>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li><strong>Introduction to Drop Shipping Business</strong></li>
                                    <li>Understanding FBM/FBA &amp; Dropshipping</li>
                                    <li>Crucial account settings for dropshipping</li>
                                    <li>Setting Up Your Shipping and Return Settings</li>
                                    <li>Understanding Seller Central Dashboard and understanding Account health while dropshipping</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li><strong>Legal &amp; tax info, documents and additional info</strong></li>
                                    <li>Forming an LLC for Your Business while being in Pakistan.</li>
                                    <li>Importance of ITIN and How to get it.</li>
                                    <li>Importance of company accounts and Credit Cards in dropshipping busi s</li>
                                    <li>.nesGetting Your Resell Certificates, Sales and Use Tax Certificates.</li>
                                    <li>Setting your Amazon Tax Settings.</li>
                                    <li>Understanding Tax Exemptions from Stores or wholesalers.</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li><strong>Understand Sourcing First</strong></li>
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
                                <ul class="tr-module-inner">
                                    <li><strong>Product Research, Adding Inventory, Processing Returns and Customer Service</strong></li>
                                    <li>Techniques of Product Hunting – How to Find Profitable Items for dropshipping</li>
                                    <li>Understanding FEES and Profit Calculation</li>
                                    <li>Adding Items to Your Inventory.</li>
                                    <li>HACKS to win BUYBOX</li>
                                    <li>Competition Analysis and Manage Inventory and Pricing</li>
                                    <li>How to Manage Orders and Handling time.</li>
                                    <li>How to Process Orders through Your Supplier</li>
                                    <li>Confirming &amp; Tracking Orders/Shipments</li>
                                    <li>Confirming &amp; Tracking Orders/Shipments</li>
                                    <li>E-Mail Scripts for Customer Service Inquiries</li>
                                    <li>Hacks to Handle Cancellation Requests</li>
                                    <li>Hacks to Handle/Process Returns</li>
                                    <li>Hacks to reduce customer complaints and handling communication with buyer.</li>
                                    <li>Hacks to keep your account Metrics as good to avoid suspension.</li>
                                    <li>How to deal with Invoices and Amazon requirements</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li><strong>Laying the Foundation &amp; Ground Work</strong></li>
                                    <li>Plugins/Extensions Setup &amp; Installation</li>
                                    <li>Hacks to Earn Cashback and Which Ones to Sign Up Too.</li>
                                    <li>Different ways and Hacks to Earn Cashback.</li>
                                    <li>Different ways and Hacks to Earn Cashback.</li>
                                    <li>Selection of suppliers and understanding which supplier will be best for your dropshipping business.</li>
                                    <li>Understanding return and dispute resolution with these suppliers.</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <ul class="tr-module-inner">
                                    <li><strong>Hacks of Scaling your dropshipping business in a safe way.</strong></li>
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
@endsection

@section('scripts')
@endsection
