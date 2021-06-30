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

    <!-- Start Intro Wrapper -->
    <section class="tr-intro-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tr-intro-content text-center">
                            <h3 class="md-heading">INTRODUCING A</h3>
                            <h1 class="h-primary text-org">ONE YEAR SPECIALIZATION IN ECOMMERCE</h1>
                            <img src="{{ _asset('assets-app/img/special-demand-icon.png') }}">
                            <p class="info-rap mb-4">Due to the increased interest in this field of study, we believe that e-commerce should be defined as an individual academic field rather than merging it in general commerce technology. All in all, we’re certain that our introduced e-commerce degree programs can both be technically and business-oriented.</p>
                            <p class="info-rap mb-4">Ecommerce has become the stream that has become popular among our people. It’s challenging but quite scoring. Hence, we intend to provide platform for the youth who want to get the knack for it because sky is the limit.</p>
                            <p class="info-rap">Due to the success and growth of interest in the e-commerce business, we decided to parallel this trend and create first ever new learning e commerce opportunities for students in Pakistan. To meet industry demands, we are initiating e-commerce postgraduate program to look at a wide distribution of e-commerce in our higher education system.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Intro Wrapper -->

    <!-- Start special Wrapper -->
    <section class="tr-special-become-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tr-special-become-content text-center py-5">
                            <h2 class="sp-become-hd text-uppercase text-white my-5">Become an ecommerce specialist</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End special Wrapper -->

    <!-- Start introduce Wrapper -->
    <section class="tr-special-introduce-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="special-introduce-content">
                            <p class="info-rap">Main goal to introduce this specialized degree program is to offer opportunities to students in Pakistan to become a master of electronic commerce. The career prospects of people who learn e commerce remain high and we’re optimistic about the education of the youth in this particular industry.</p>
                            <p class="info-rap">We hope our experiences and approaches become useful and serve as a stepping ground for others in future focusing on e-commerce systems engineering.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End introduce Wrapper -->

    <!-- Start Training Module Wrapper -->
    <section class="tr-module-wrapper grey-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tr-module-heading">
                            <h3 class="md-heading">WHAT WILL BE COVERED IN Specialization in eCommerce</h3>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ol class="tr-module-listed my-5 pl-0">
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">BUSINESS MANAGEMENT, MINDSET, PROJECT MANAGEMENT</h4>
                                <ul class="tr-module-inner">
                                    <li>Business Motivation</li>
                                    <li>Stronger Leadership Skills</li>
                                    <li>Professional Success</li>
                                    <li>Finding Great Opportunities in a Changing and Challenging Environment</li>
                                    <li>Project Management &amp; Accountancy</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">INTRODUCTION TO ECOMMERCE</h4>
                                <p class="info-rap">It starts with an understanding of the various technological options available and the choice of the software to be used as a technological platform. Particular attention will be devoted to the evaluation of different Open Source solutions. In this phase we will also discuss layout, usability and optimization of the User Experience. In this phase the participants will already be able to put their own website and commerce online.</p>
                                <ul class="tr-module-inner">
                                    <li>Introduction to eCommerce</li>
                                    <li>Objectives of eCommerce</li>
                                    <li>Features of eCommerce</li>
                                    <li>Types of eCommerce</li>
                                    <li>Basics of B2C and B2B Channels</li>
                                    <li>Business applications of eCommerce</li>
                                    <li>Essentials and Procedure of eCommerce</li>
                                    <li>Major difference between Pakistan &amp; International eCommerce</li>
                                    <li>Infrastructure, Security &amp; Technology</li>
                                    <li>Introduction to eCommerce – Assessment</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">ECOMMERCE PRODUCT HUNTING IN LOCAL & INTERNATIONAL ECOMMERCE MARKETS</h4>
                                <ul class="tr-module-inner">
                                    <li>Product Hunting Tools of International eCommerce Market like Amazon</li>
                                    <ul class="tr-inner-view">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Jungle Scout</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Helium 10</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Merchant Words</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Viral Launch</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Google Trends</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Egrow</li>
                                    </ul>
                                    <li>Tools for Product Hunting for Local Pakistani Markets.</li>
                                    <li>eCommerce Product Hunting Tools Assessments</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">SETTING UP YOUR ONLINE SHOP ON DARAZ</h4>
                                <strong class="d-block py-4">DARAZ INTRODUCTION ACCOUNT OPENING</strong>
                                <ul class="tr-module-inner">
                                    <li>Daraz potential and business models (FBD, FBM)</li>
                                    <li>How to create Daraz account</li>
                                    <li>Get your Daraz seller center account set up and ready to go</li>
                                </ul>
                                <strong class="d-block py-4">FINDING THE PROFITABLE PRODUCT</strong>
                                <ul class="tr-module-inner">
                                    <li>What your product needs to have in order to beat the competition – Enablers criteria</li>
                                    <li>Which categories to choose for maximum result and those to avoid for your products</li>
                                    <li>The perfect product selection system – complete overview of the entire product selection system</li>
                                    <li>Stretching the enablers criteria – A product you are passionate about but does not quite match all the criteria</li>
                                </ul>
                                <strong class="d-block py-4">EVALUATING SUPPLIERS AND SAMPLES</strong>
                                <ul class="tr-module-inner">
                                    <li>Understanding Daraz’s fees – how to understand exactly how much will it cost you to sell on Daraz</li>
                                    <li>Product tuning – how to make your product stand out amongst the rest</li>
                                    <li>Simple product sourcing – how to source your products</li>
                                    <li>Creating a professional online presence – how to create a professional online presence to make you look like a pro from the start</li>
                                    <li>Calculating the true cost of a product – how to ensure that the product you choose will make you a profit after all costs are taken into account</li>
                                    <li>Getting samples for your top opportunity – how to order samples for your top product opportunity</li>
                                </ul>
                                <strong class="d-block py-4">ORDERING YOUR INVENTORY AND CREATING YOUR STORE</strong>
                                <ul class="tr-module-inner">
                                    <li>Choosing the best supplier and getting the highest profit margin – how to choose the best supplier</li>
                                    <li>Getting ready for your first inventory order – what you need to place on your first inventory order</li>
                                    <li>Quick start product listing – creating a quick product listing is needed before you can ship your inventory</li>
                                    <li>Designing your product packaging – the easiest ways to get the best product packaging</li>
                                    <li>The power of package inserts – how to start building a customer list from day 1</li>
                                    <li>How much inventory should you order? – how to determine the right amount of inventory to order for your first order</li>
                                    <li>All “secrets” of placing your first inventory order</li>
                                </ul>
                                <strong class="d-block py-4">THE FLAWLESS PRODUCT PAGE/STORE</strong>
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
                                <strong class="d-block py-4">THE PERFECT PRODUCT LAUNCH ON DARAZ</strong>
                                <ul class="tr-module-inner">
                                    <li>Daraz launch process</li>
                                    <li>Planning for success – key preparation steps for a successful product launch</li>
                                    <li>Tracking the data to inform decisions – what numbers matter the most for a successful launch</li>
                                    <li>Introduction to Daraz sponsored product advertising – why it’s an important piece of your brand strategy</li>
                                    <li>Optimizing price against rank and sales – how and when to optimize your price and increase profit</li>
                                    <li>Sustaining rank profitably – how to hold onto your spot when achieve top ranking on Daraz</li>
                                </ul>
                                <strong class="d-block py-4">DEALS MANAGEMENT</strong>
                                <ul class="tr-module-inner">
                                    <li>How to be eligible to enroll in Flash Sales</li>
                                    <li>How to enroll in Deals on Occasions</li>
                                    <li>How to enroll and take benefit of 11.11 sale</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">BECOME A VIRTUAL ASSISTANT</h4>
                                <strong class="d-block py-4">AMAZON ACCOUNT MANAGEMENT AS A VIRTUAL ASSISTANT</strong>
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
                                <strong class="d-block py-4">AMAZON WHOLESALE FBA</strong>
                                <ul class="tr-module-inner">
                                    <li>Product Hunting</li>
                                    <li>Product Sourcing</li>
                                    <li>How to communicate with the suppliers</li>
                                    <li>Listing and Order Management</li>
                                </ul>
                                <strong class="d-block py-4">EBAY ACCOUNT MANAGEMENT AS A VIRTUAL ASSISTANT</strong>
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
                                <strong class="d-block py-4">DARAZ SELLER ACCOUNT SIGNUP – SELLING &amp; MANAGING AS VIRTUAL ASSISTANT</strong>
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
                                <strong class="d-block py-4">FIVERR ACCOUNT SIGNUP/MANAGEMENT AS VIRTUAL ASSISTANT</strong>
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
                                <strong class="d-block py-4">FREELANCER.COM – RECRUITMENT</strong>
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
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">BECOME A LISTING PROMOTER</h4>
                                <strong class="d-block py-4">INTRODUCTION TO AMAZON PRODUCT LISTING PROMOTER TRAINING</strong>
                                <ul class="tr-module-inner">
                                    <li>How it Works </li>
                                    <li>What is the benefit in it for seller, buyer and YOU.</li>
                                </ul>
                                <strong class="d-block py-4">HUNTING DOWN BUYERS AND SELLERS</strong>
                                <ul class="tr-module-inner">
                                    <li>How to find Sellers (Local &amp; International)</li>
                                    <li>(Enablers product launches and Enablers BC existing sellers will also utilize LP’s services)</li>
                                    <li>How to find buyers</li>
                                    <li>How to verify International Sellers</li>
                                    <li>How to verify buyer.</li>
                                    <li>Commissions</li>
                                    <li>Signing NDA for Enablers BC products</li>
                                    <li>How to access shared files with seller products which require feedback.</li>
                                </ul>
                                <strong class="d-block py-4">SOCIAL MEDIA MARKETING</strong>
                                <ul class="tr-module-inner">
                                    <li>Using Facebook Messenger to Build a Subscriber List.</li>
                                    <li>Setting up Many Chat for Success</li>
                                    <li>Important Many Chat Features.</li>
                                    <li>Building a Subscriber List Ahead of Time.</li>
                                    <li>How to use fb ads and Many Chat to hunt buyers.</li>
                                    <li>How the many chat subscribers list can help you offering services of posting Questions/Feedbacks/upvoting etc.</li>
                                    <li>How to Build up your Buyer and Seller Database</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">BUILDING YOUR OWN EBAY BUSINESS</h4>
                                <strong class="d-block py-4">SETTING UP AN EBAY SELLER ACCOUNT FROM PAKISTAN AND CRUCIAL ACCOUNT SETTINGS.</strong>
                                <ul class="tr-module-inner">
                                    <li>You learn which eBay marketplace to start with, exactly how to get set up to selling on eBay.</li>
                                    <li>Opening Personal and Business account while being in Pakistan.</li>
                                    <li>How to get business PayPal in USA and UK.</li>
                                    <li>11 Crucial account setting and PayPal integration.</li>
                                    <li>Understanding eBay Seller Hub, FEES and Profit Calculation. Calculating PayPal Fees.</li>
                                    <li>Strategies to avoid account suspension. Available Solutions if suspended.</li>
                                </ul>
                                <strong class="d-block py-4">LET’S GET YOU SELLING ON EBAY – PRODUCT HUNTING, PROFIT CALCULATION AND SHIPPING SETTINGS. (LIVE DEMO)</strong>
                                <ul class="tr-module-inner">
                                    <li>Product Hunting Manually and Search profitable product thru different softwares. (Live Demo)</li>
                                    <li>How to “SPY” on top eBay sellers to uncover their top-selling products (live demo)</li>
                                    <li>Products to be AVOIDED.</li>
                                    <li>Keyword research while hunting a product</li>
                                    <li>How to determine which product should be sold from wholesale or retail stores. (live demo).</li>
                                    <li>Selling Own Brand</li>
                                    <li>How to calculate shipping for Own Brand selling and Dropshipping to determine profits.</li>
                                    <li>Live Demo to select products on different online stores.</li>
                                </ul>
                                <strong class="d-block py-4">HOW TO LIST AN ITEM ON EBAY SELLER ACCOUNT– PERFECT LISTING STRATEGIES.</strong>
                                <ul class="tr-module-inner">
                                    <li>How to list items on eBay Seller Account (live demo)</li>
                                    <li>What are the elements of a perfect eBay listing?</li>
                                    <li>How to determine whether to list an item in eBay’s Auction Format or in eBay’s Fixed – Price Format (get this wrong and you will lose money).</li>
                                    <li>5 Crucial moments to consider during listing. (Live detailed DEMO)</li>
                                    <li>Important hacks of Listing.</li>
                                    <li>How to subscribe and build your storefront of eBay.</li>
                                    <li>How to list for Online Arbitrage and Dropshipping thru Management Tools.</li>
                                    <li>Listing promotions and increasing sales.</li>
                                    <li>All about packing and shipping your eBay items</li>
                                    <li>Step-by-step demonstration of how to use eBay shipping to print postage from home (live demo)</li>
                                    <li>Calculating Handling time and Shipping time while Dropshipping from Whole Seller or Online Arbitrage (Live Demo)</li>
                                    <li>How to get free supplies from USPS and use of other websites for cheap shipping options.</li>
                                    <li>When and which company to use for shipping. Selecting Best Option for cost effective shipping.</li>
                                    <li>Advanced strategies and HACKS for more efficient eBay listing in this eBay Boot Camp Complete Training Course</li>
                                </ul>
                                <strong class="d-block py-4">DROPSHIPPING AND ONLINE ARBITRAGE ON EBAY AND SHOPIFY.</strong>
                                <ul class="tr-module-inner">
                                    <li>Understanding Dropshipping on eBay.</li>
                                    <li>Product selection and profit calculations. LIVE DEMO</li>
                                    <li>How to find and communicate with WHOLE SELLERS.</li>
                                    <li>Documents required to get wholesale accounts.</li>
                                    <li>Understanding ONLINE Arbitrage</li>
                                    <li>Pros and Cons of Online Arbitrage.</li>
                                    <li>Understanding VERO. (Verified Rights Owner Program)</li>
                                    <li>Understanding SHOPIFY STORE</li>
                                    <li>How to build SHOPIFY Dropshipping STORE and Listing thru OBERLO.</li>
                                    <li>How to use Ali Express and Alidropship Plugin for own dropshipping website.</li>
                                    <li>Pros and Cons of Shopify and Own Store</li>
                                    <li>BONUS – Selling on <a href="www.bonanza.com">www.bonanza.com</a> with eBay integration.</li>
                                </ul>
                                <strong class="d-block py-4">HOW TO HANDLE CASES OPENED BY CLIENTS ON EBAY AND PAYPAL. BECOME A TRUSTED SELLER.</strong>
                                <ul class="tr-module-inner">
                                    <li>Understanding reasons of Case Opening by Client.</li>
                                    <li>How to handle cases on eBay and PayPal.</li>
                                    <li>Effective communication skills.</li>
                                    <li>How to determine False Claims and Scams.</li>
                                    <li>How to Avoid Negative Feedback and How to remove them.</li>
                                    <li>How to become a trusted seller.</li>
                                    <li>Newbie eBay sellers make these critical errors all the time – this means incredible opportunities for YOU</li>
                                    <li>And much, much more.</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">BUILDING YOUR OWN BRAND ON AMAZON</h4>
                                <strong class="d-block py-4">INTRODUCTION ACCOUNT OPENING</strong>
                                <ul class="tr-module-inner">
                                    <li>Amazon Potential and Business Models</li>
                                    <li>In Enablers Boot Camp, Decide which Amazon marketplace is the best one for you to sell in</li>
                                    <li>How to Create Amazon Account in UK, Europe, USA</li>
                                    <li>Get your Amazon Seller Central account set up and ready to go</li>
                                    <li>Enablers Seller Dashboard – How it Works</li>
                                </ul>
                                <strong class="d-block py-4">FINDING THE PERFECT PRODUCT</strong>
                                <ul class="tr-module-inner">
                                    <li>Dominate Your Competition By Building A Real Brand – Why Building A Brand Is Crucial To Your Ongoing Success</li>
                                    <li>The 7 Elements Of A Red Hot Profitable Product Opportunity – What Your Product Needs To Have In Order To Beat The Competition – Enablers Product Selection Criteria.</li>
                                    <li>Which Categories To Choose For Maximum Result And Those To Avoid For Your Products</li>
                                    <li>What Products To Avoid For Your First Profitable Product – Due To Excess Competition, Patents, Or Other Legal Issues</li>
                                    <li>The Perfect Product Selection System – Complete Overview Of The Entire Product Selection System</li>
                                    <li>What The Enablers Criteria Are And Why They Are So Important To Your Success</li>
                                    <li>What Tools Should You Use To Achieve The Fastest And Most Profitable Results</li>
                                    <li>Proving Product Viability With Competing Products – How To Make Sure Your Hot Product Opportunities Are Viable And Not One Off Products Whose Sales Can’t Be Replicated</li>
                                    <li>Speeding Up The Product Selection Process – Tips And Tricks For Speeding Up The Entire Process</li>
                                    <li>Stretching The Enablers Criteria – Found A Product You Are Passionate About But Does Not Quite Match All The Criteria? This Lesson Shows You Your Options</li>
                                    <li>Alternative Search Method – Using A Different Tool For A Different Way Of Searching For Your Profitable Product</li>
                                    <li>Patent Search – How To Perform An Initial Patent Search To Check If Any Of Your Product Opportunities Should Be Avoided</li>
                                </ul>
                                <strong class="d-block py-4">EVALUATING SUPPLIERSAND SAMPLES</strong>
                                <ul class="tr-module-inner">
                                    <li>Understanding Amazon’s Fees – How To Understand Exactly How Much It Costs To Sell On Amazon</li>
                                    <li>Product Tuning – How To Make Your Product Stand Out Amongst The Rest</li>
                                    <li>Simple Product Sourcing – How To Source Your Products From Anywhere In The World</li>
                                    <li>Creating A Professional Online Presence – How To Create A Professional Online Presence To Make You Look Like A Pro From The Start</li>
                                    <li>Finding And Contacting Suppliers With Our Proven Templates – How To Communicate With Potential Suppliers Using Our Professionally-Written Templates</li>
                                    <li>Calculating The True Cost Of A Product – How To Ensure That The Product You Choose Will Make You A Profit After All Costs Are Taken Into Account</li>
                                    <li>Calculating Final Profit Numbers For Your Focused Opportunity List – How To Use The True Cost To Determine Your Final Profit Potential For Each Product</li>
                                    <li>Getting Samples For Your Top Opportunity – How To Order Samples For Your Top Product Opportunity</li>
                                </ul>
                                <strong class="d-block py-4">ORDERING YOUR INVENTORY AND CREATING YOUR BRAND</strong>
                                <ul class="tr-module-inner">
                                    <li>The Samples Have Arrived! Now What? – What To Look For Once Your Samples Have Arrived</li>
                                    <li>Choosing The Best Supplier And Getting The Highest Profit Margin – How To Choose The Best Supplier Using Our Own Criteria Which Will Also Help You Get The Best Prices</li>
                                    <li>Getting Ready For Your First Inventory Order – What You Need To Place On Your First Inventory Order</li>
                                    <li>The Enablers Brand Name Creation Process – Your Brand Is Critical And Choosing Your Brand Name Is Too</li>
                                    <li>Creating Your Powerful Brand Logo – How To Get Your Brand Logo Created Simply And Fast</li>
                                    <li>Purchasing Your UPC – A UPC Is Required By Amazon To Add A Product. This Lesson Shows You Your Options</li>
                                    <li>Quick Start Product Listing – Creating A Quick Product Listing Is Needed Before You Can Ship Your Inventory</li>
                                    <li>Designing Your Product Packaging – The Easiest Ways To Get The Best Product Packaging</li>
                                    <li>The Power Of Package Inserts – How To Start Building A Customer List From Day 1</li>
                                    <li>How Much Inventory Should You Order? – How To Determine The Right Amount Of Inventory To Order For Your First Order</li>
                                    <li>Shipping By Air Or By Sea – The Pros And Cons Of Shipping By Sea Or By Air</li>
                                    <li>The “Secrets” Of Placing Your First Inventory Order</li>
                                    <li>What Happens After You Order Your Inventory – Important Steps To Take While Waiting For Your Inventory To Arrive</li>
                                </ul>
                                <strong class="d-block py-4">BUILDING YOURBRAND ASSETS</strong>
                                <ul class="tr-module-inner">
                                    <li>Building a Foundation for Success – The Most Important Steps To Take To Build Your Brand Online and Maximize Sales</li>
                                    <li>Creating Your Domain Email Account</li>
                                    <li>Creating Your Brand Website – The Easiest and Fastest Way To Get Your Website Setup</li>
                                    <li>Creating Your Brand Facebook Page – Creating a Facebook Page to Power Your Product Launch</li>
                                    <li>Using Facebook Messenger to Build a Subscriber List – The Most Impactful Way to Build a Raving Fan Base For Your Brand</li>
                                    <li>Setting up Manychat For Success – How to Provide a Professional Brand Experience</li>
                                    <li>Important ManyChat Features – One of the Most Important Tools in Your Toolbox</li>
                                    <li>Building a Subscriber List For Launch – The Best Way To Future Proof Your Brand and Maximize Success in Your Product Launch</li>
                                    <li>Using Facebook Ads to Get Subscribers – Introducing Your Brand to Your Target Customer</li>
                                    <li>Get More Reviews On Autopilot With ManyChat – More Reviews = Higher Conversion Rate = More Sales</li>
                                    <li>Adding Content to Facebook and Instagram page – Constantly Growing Your Audience and Providing Social Proof</li>
                                    <li>Registering Your Brand Name Across All Social Media Sites – Setting Up for Scale and Long Term</li>
                                </ul>
                                <strong class="d-block py-4">THE PERFECT PRODUCT PAGE</strong>
                                <ul class="tr-module-inner">
                                    <li>How To Craft The Perfect Amazon Listing To Crush Your Competitors</li>
                                    <li>Strategic Keyword Research For Top Amazon Rankings – How To Find The Best Possible Keywords To Target For Your Product To Get Maximum Traffic And Sales</li>
                                    <li>How To Craft The Best Title To Gain Traffic And Conversion</li>
                                    <li>Bullet Points That Sell – The Secrets Of Creating The Best Possible Bullet Points Using Benefits And Features Of Your Product</li>
                                    <li>How To Create A Compelling Product Description That Steals Sales From Your Competitors</li>
                                    <li>Product Images That Attract And Convert – Along With The Title, Your Product Images Are The Most Important Element Of Your Listing. Here’s How To Get Them Right</li>
                                    <li>Product Pricing For Profit – How To Choose The Right Price To Get Both Traffic And Sales, But Still Have A Significant Profit Margin</li>
                                    <li>Creating Your Complete Listing – How To Add All The Elements To Optimize Your Listing</li>
                                    <li>How To Craft The Perfect Customer Emails For Engagement And Reviews</li>
                                    <li>Taking Advantage Of Downtime – Maximizing The Time You Have While Waiting For Your Inventory</li>
                                </ul>
                                <strong class="d-block py-4">THE PERFECT PRODUCT LAUNCH – ENABLERS BLITZ RANK</strong>
                                <ul class="tr-module-inner">
                                    <li>The Amazon Launch Process – Understanding The Objective</li>
                                    <li>Planning for Success – Key Preparation Steps for a Successful Product Launch</li>
                                    <li>Tracking the Data to Inform Decisions – What Numbers Matter the Most For a Successful Launch</li>
                                    <li>Introduction to Amazon Sponsored Product Advertising – Why It’s An Important Piece of Your Brand Strategy</li>
                                    <li>Structuring Campaigns for Success – The Most Effective and Cost Efficient Way To Structure Your Ad Campaigns on Amazon</li>
                                    <li>Getting Your Initial Reviews – How To Get Your Initial Product Reviews</li>
                                    <li>Creating Promotional Coupon Codes</li>
                                    <li>Distribute Coupon Codes to Subscriber List – Simple Approach to Distributing Promotional Codes During Launch</li>
                                    <li>Optimizing Price Against Rank and Sales – How and When to Optimize Your Price and Increase Profit</li>
                                    <li>Sustaining Rank Profitably – How To Hold Onto Your Spot When Achieve Ranking on Amazon</li>
                                    <li>Running Out of Inventory and Reordering – The Most Effective Way to Maximize Sales and Minimize Loss of Rank when Running Out Of Stock</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">BUILDING YOUR WHOLESALE BUSINESS ON AMAZON</h4>
                                <strong class="d-block py-4">INTRODUCTION TO AMAZON FBA WHOLESALE</strong>
                                <ul class="tr-module-inner">
                                    <li>Amazon Overview</li>
                                    <li>Buyer/Seller Overview</li>
                                    <li>Amazon Business Models</li>
                                    <li>Why Wholesale?</li>
                                    <li>Required Credentials for Wholesale FBA</li>
                                    <li>Understanding Tax System USA/UK</li>
                                </ul>
                                <strong class="d-block py-4">ACCOUNT REGISTRATION</strong>
                                <ul class="tr-module-inner">
                                    <li>Registering Company &amp; Tax Id’s</li>
                                    <li>Seller Account Registration</li>
                                </ul>
                                <strong class="d-block py-4">AMAZON BUYER VIEW</strong>
                                <ul class="tr-module-inner">
                                    <li>Understanding Amazon Search Page Filters &amp; Categories</li>
                                    <li>Understand Product Pages (Metoo – Asin – UPC/EAN – BuyBox – BSR – Keyword Ranking – Brand Store)</li>
                                    <li>Understanding of Models &amp; Hacks (For knowledge purpose)</li>
                                    <li>Dead Listings</li>
                                    <li>P to P Model for Dead Listings</li>
                                    <li>Learn about Wholesale FBA/FBM Hacks (For knowledge purpose)</li>
                                </ul>
                                <strong class="d-block py-4">SOFTWARE &amp; RESEARCHING METHODS FOR AMAZON FBA WHOLESALE</strong>
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
                                    <li>Setting Up Website &amp; Contacting Wholesalers</li>
                                    <li>Setting UP Accounts with Wholesalers/Distributors/Suppliers</li>
                                    <li>Wholesale Central</li>
                                    <li>Feed Scanning</li>
                                </ul>
                                <strong class="d-block py-4">AMAZON FBA WHOLESALE SHIPMENTS &amp; CALCULATIONS</strong>
                                <ul class="tr-module-inner">
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
                                <strong class="d-block py-4">ADDITIONAL GUIDELINES</strong>
                                <ul class="tr-module-inner">
                                    <li>Virtual Assistants and Automating your Business</li>
                                    <li>Accounting &amp; TaxJar</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">BUILDING YOUR DROPSHIPPING BUSINESS ON AMAZON</h4>
                                <strong class="d-block py-4">INTRODUCTION TO DROP SHIPPING BUSINESS</strong>
                                <ul class="tr-module-inner">
                                    <li>Amazon Buyer/Seller Overview</li>
                                    <li>Understanding FBM/FBA &amp; Dropshipping</li>
                                    <li>Understanding Me-too – Feedbacks – Ranking</li>
                                </ul>
                                <strong class="d-block py-4">SET UP AMAZON ACCOUNT &amp; IMPORTANT ACCOUNT SETTINGS</strong>
                                <ul class="tr-module-inner">
                                    <li>Introduction / Your First Steps Towards Financial Freedom!</li>
                                    <li>Creating Your Amazon Seller’s Pro Account</li>
                                    <li>Crucial account settings for dropshipping.</li>
                                    <li>Setting Up Your Shipping and Return Settings</li>
                                    <li>Understanding Seller Central Dashboard and understanding Account health while dropshipping.</li>
                                </ul>
                                <strong class="d-block py-4">LEGAL &amp; TAX INFO, DOCUMENTS AND ADDITIONAL INFO</strong>
                                <ul class="tr-module-inner">
                                    <li>Forming an LLC for Your Business while being in Pakistan.</li>
                                    <li>Importance of ITIN and How to get it.</li>
                                    <li>Importance of company accounts and Credit Cards in dropshipping business.</li>
                                    <li>Getting Your Resell Certificates, Sales and Use Tax Certificates.</li>
                                    <li>Setting your Amazon Tax Settings.</li>
                                    <li>Understanding Tax Exemptions from Stores or wholesalers.</li>
                                </ul>
                                <strong class="d-block py-4">UNDERSTAND SOURCING FIRST</strong>
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
                                <strong class="d-block py-4">PRODUCT RESEARCH, ADDING INVENTORY, PROCESSING RETURNS AND CUSTOMER SERVICE</strong>
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
                                <strong class="d-block py-4">LAYING THE FOUNDATION &amp; GROUND WORK</strong>
                                <ul class="tr-module-inner">
                                    <li>Plugins/Extensions Setup &amp; Installation</li>
                                    <li>Hacks to Earn Cashback and Which Ones to Sign Up Too.</li>
                                    <li>Different ways and Hacks to Earn Cashback.</li>
                                    <li>Different ways and Hacks to Earn Cashback.</li>
                                    <li>Selection of suppliers and understanding which supplier will be best for your dropshipping business.</li>
                                    <li>Understanding return and dispute resolution with these suppliers.</li>
                                </ul>
                                <strong class="d-block py-4">HACKS OF SCALING YOUR DROPSHIPPING BUSINESS IN A SAFE WAY.</strong>
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

    <!-- Start Entrance Wrapper -->
    <section class="tr-specail-entrance-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tr-specail-entrance-content">
                            <h3 class="text-org">Eligibility Criteria For 1-Year Specialization:</h3>
                            <strong class="d-block py-5">To get Admitted, one must satisfy the General Entrance Requirements and hold:</strong>
                            <ul class="tr-module-inner">
                                <li>Intermediate (HSC) or above (Preferably Bachelors; Ideally in Computer Science, Information Technology); or</li>
                                <li>Have obtained a good alternate qualification with substantial IT professional experience acceptable to the College or University level</li>
                                <li>Sufficient command over English language</li>
                                <li>Basic eCommerce Knowledge</li>
                                <li>Final Interview Test Clearance via Zoom or Face to Face</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Entrance Wrapper -->

    <!-- Start build Wrapper -->
    <section class="tr-build-wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ready-content text-center">
                            <h2 class="md-heading text-white text-uppercase mb-5">ENABLERS IS READY TO HELP YOU TO GET PRACTICAL EXPERIENCE!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End build Wrapper -->

@endsection

@section('scripts')
@endsection
