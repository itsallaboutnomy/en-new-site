@extends('enablers.app.layouts.app')

@section('page-title',' | '.$training->title)

@section('styles')
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="p-inner" class="one-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 animate__animated animate__animated animate__fadeInLeft">
                        <div class="support-left-content main-headings">
                            <h1 class="text-white h-primary text-uppercase">{{ $training->title }}</h1>
                            <h3 class="text-white text-uppercase border-bottom font-weight-light d-inline-block">GREAT MENTORS MAKE GREAT STUDENTS</h3>
                            <h2 class="text-white text-uppercase font-weight-light">EXCELL YOUR CAREER GROWTH</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->

    <!-- Start One Benifit Wrapper -->
    <section class="one-benifit-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="one-benifit-heading py-5 my-lg-5 my-0 mt-5">
                            <h2 class="md-heading">benefits of this amazing training</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="one-benifit-block text-center">
                            <div class="one-benifit-icon">
                                <img src="{{ _asset('assets-app/img/benifit-icon.png') }}">
                            </div>
                            <div class="one-benifit-details">
                                <h5>Private Access to Enablers Community</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="one-benifit-block text-center">
                            <div class="one-benifit-icon">
                                <img src="{{ _asset('assets-app/img/benefits-icon.png') }}">
                            </div>
                            <div class="one-benifit-details">
                                <h5>Access to all Learning material</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="one-benifit-block text-center">
                            <div class="one-benifit-icon">
                                <img src="{{ _asset('assets-app/img/benifit-icon.png') }}">
                            </div>
                            <div class="one-benifit-details">
                                <h5>Private Access to Enablers Community</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="one-benifit-block text-center">
                            <div class="one-benifit-icon">
                                <img src="{{ _asset('assets-app/img/benifit-icon.png') }}">
                            </div>
                            <div class="one-benifit-details">
                                <h5>Private Access to Enablers Community</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 pt-5">
                    <div class="one-get-heading padd">
                        <h4 class="md-heading">WHAT YOU GET</h4>
                        <p class="f-20 mb-0">Other than our exclusive mentorship and guidelines on Amazon Marketplace, we help you build the whole business model and guide you to manage and run it successfully too.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End One Benifit Wrapper -->

    <!-- Start Program Wrapper -->
    <section class="one-program-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="one-pro-heading">
                            <h3 class="md-heading text-white pb-3">ENABLERS AMAZON 1:1 TRAINING PROGRAM NEVER ENDS</h3>
                            <p class="text-white f-20">we are dealing with $1 Trillion Company (i.e. Amazon) so we change and adopt things as we progress. If you are starting this journey then you would need a similar mindset of people who can be around you and continue to give you latest techniques as you progress further.</p>
                            <p class="text-white f-20">What we do is to give you 2 months fast track training which then allows you to start the business and then as you progress further you continue to take sessions and continue to get engaged with Enablers Mentors / Trainers and your other same mindset fellows who are into this similar journey.</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6 ml-auto">
                        <div class="one-pro-block text-center">
                            <div class="one-pro-icon">
                                <img src="{{ _asset('assets-app/img/Enbalers-online-training-icon.png') }}">
                            </div>
                            <h6 class="text-white text-uppercase">online</h6>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6 mr-auto">
                        <div class="one-pro-block text-center">
                            <div class="one-pro-icon">
                                <img src="{{ _asset('assets-app/img/Enbalers-face-to-face-training-icon.png') }}">
                            </div>
                            <h6 class="text-white text-uppercase">face to face</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Program Wrapper -->

    <!--  Start One Trainers Wrapper -->
    <section class="one-trainers-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="one-trainers-details py-5 mb-5">
                            <p class="f-20">Great mentors procreate and shape brilliant students who, in the long run become ensuing leaders in their respective professions. In past times, learners had to cross mammoth distances in order to get knowledge or expertise, however, thanks to present day’s technology and innovative approaches that we now have online 1:1 coaching program through which you can attend lectures by geniuses in their fields or can also join Face to Face if you would like in our Offices.</p>
                        </div>
                    </div>
                    @foreach($trainers as $trainer)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card one-tr-block">
                            <img class="card-img-top" src="{{ _asset($trainer->profile_image_path) }}">
                            <div class="card-body">
                                <h5 class="one-tr-city-name">{{ $trainer->name }}</h5>
                                <span class="d-block one-tr-designation">{{ $trainer->designation }}</span>
                                @if($trainer->slug == 'saqib-azhar')
                                    <a href="{{ route('app.trainers.show-saqib') }}" class="blue-btn">Apply Now</a>
                                @elseif($trainer->slug == 'faisal-azhar')
                                    <a href="{{ route('app.trainers.show-faisal') }}" class="blue-btn">Apply Now</a>
                                @else
                                    <a href="{{ route('app.trainers.show', $trainer->slug) }}" class="blue-btn">Apply Now</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="one-tr-bottom padd mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="one-tr-bottom-details">
                                <p class="f-20">It is implicit that classroom learning is undoubtedly an effective approach in any field of learning, hence, know that one to one coaching is even a step further. Enablers Amazon 1:1 Coaching Program is one of the excellent designed training course, which enables you toward the path of real success. Personal direct access to the mentor in any learning environment is quite a source of pride, privilege and an honor, which ultimately has the tendency to speed up your progress by leaps and bounds.</p>
                                <p class="f-20">Enablers knows this phenomenon at best, and hence offers Amazon direct 1-1 coaching sessions with the expert trainers in E-commerce, online trade and Amazon business. Made one to one coaching more special and common the globe over, our one-on-one sessions provide extensive approaches and techniques to provide effective learning.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="one-tr-bottom-01 padd">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="one-tr-left-content">
                                <h3 class="md-heading">AMAZON ONE TO ONE COACHING</h3>
                                <h4 class="pt-3">– WHAT WE OFFER</h4>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="one-tr-right-content border-left pl-5">
                                <p class="f-20">Our Amazon One to One coaching is a special mentorship program where we offer exclusive training and to individuals rather than a group of class. These sessions are conducted either in our offices or over Zoom / Skype etc with our expert Mentors. In these exclusive mentorship sessions, you will learn everything about the Amazon marketplace, how you can build your own business from scratch, and how to turn it into a successful revenue source.</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="one-tr-note pt-lg-5 pt-0">
                                <strong class="d-block">Please note:  Prior to training, you will be choosing one workstream to go with (PL or Wholesale or Dropshiping)</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End One Trainers Wrapper -->

    <!-- Start Training Module Wrapper -->
    <section class="tr-module-wrapper grey-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mr-auto">
                        <div class="tr-module-heading">
                            <h3 class="md-heading">WHAT WILL BE COVERED IN CASE OF
                                AMAZON PRIVATE LABEL TRAINING:
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ol class="tr-module-listed my-5 pl-0">
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">INTRODUCTION ACCOUNT OPENING</h4>
                                <ul class="tr-module-inner">
                                    <li>Amazon Potential and Business Models</li>
                                    <li>In 1:1 Coaching Program, Decide which Amazon marketplace is the best one for you to sell in</li>
                                    <li>How to Create Amazon Account in UK, Europe, USA</li>
                                    <li>Get your Amazon Seller Central account set up and ready to go</li>
                                    <li>Enablers Seller Dashboard – How it Works</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">FINDING THE PERFECT PRODUCT</h4>
                                <ul class="tr-module-inner">
                                    <li>Dominate Your Competition By Building A Real Brand - Why Building A Brand Is Crucial To Your Ongoing Success</li>
                                    <li>The 7 Elements Of A Red Hot Profitable Product Opportunity - What Your Product Needs To Have In Order To Beat The Competition – Enablers Product Selection Criteria.</li>
                                    <li>Which Categories To Choose For Maximum Result And Those To Avoid For Your Products</li>
                                    <li>What Products To Avoid For Your First Profitable Product - Due To Excess Competition, Patents, Or Other Legal Issues</li>
                                    <li>The Perfect Product Selection System - Complete Overview Of The Entire Product Selection System</li>
                                    <li>What The Enablers Criteria Are And Why They Are So Important To Your Success</li>
                                    <li>What Tools Should You Use To Achieve The Fastest And Most Profitable Results</li>
                                    <li>Proving Product Viability With Competing Products - How To Make Sure Your Hot Product Opportunities Are Viable And Not One Off Products Whose Sales Can't Be Replicated</li>
                                    <li>Speeding Up The Product Selection Process - Tips And Tricks For Speeding Up The Entire Process</li>
                                    <li>Stretching The Enablers Criteria - Found A Product You Are Passionate About But Does Not Quite Match All The Criteria? This Lesson Shows You What You Can And Can't Modify</li>
                                    <li>Alternative Search Method - Using A Different Tool For A Different Way Of Searching For Your Profitable Product</li>
                                    <li>Patent Search - How To Perform An Initial Patent Search To Check If Any Of Your Product Opportunities Should Be Avoided</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">EVALUATING SUPPLIERSAND SAMPLES</h4>
                                <ul class="tr-module-inner">
                                    <li>Understanding Amazon's Fees - How To Understand Exactly How Much It Costs To Sell On Amazon</li>
                                    <li>Product Tuning - How To Make Your Product Stand Out Amongst The Rest</li>
                                    <li>Simple Product Sourcing - How To Source Your Products From Anywhere In The World</li>
                                    <li>Creating A Professional Online Presence - How To Create A Professional Online Presence To Make You Look Like A Pro From The Start</li>
                                    <li>Finding And Contacting Suppliers With Our Proven Templates - How To Communicate With Potential Suppliers Using Our Professionally-Written Templates</li>
                                    <li>Calculating The True Cost Of A Product - How To Ensure That The Product You Choose Will Make You A Profit After All Costs Are Taken Into Account</li>
                                    <li>Calculating Final Profit Numbers For Your Focused Opportunity List - How To Use The True Cost To Determine Your Final Profit Potential For Each Product</li>
                                    <li>Getting Samples For Your Top Opportunity - How To Order Samples For Your Top Product Opportunity</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">ORDERING YOUR INVENTORY AND CREATING YOUR BRAND</h4>
                                <ul class="tr-module-inner">
                                    <li>The Samples Have Arrived! Now What? - What To Look For Once Your Samples Have Arrived</li>
                                    <li>Choosing The Best Supplier And Getting The Highest Profit Margin - How To Choose The Best Supplier Using Our Own Criteria Which Will Also Help You Get The Best Prices</li>
                                    <li>Getting Ready For Your First Inventory Order - What You Need To Place On Your First Inventory Order</li>
                                    <li>The Enablers Brand Name Creation Process - Your Brand Is Critical And Choosing Your Brand Name Is Too</li>
                                    <li>Creating Your Powerful Brand Logo - How To Get Your Brand Logo Created Simply And Fast</li>
                                    <li>Purchasing Your UPC - A UPC Is Required By Amazon To Add A Product. This Lesson Shows You Your Options</li>
                                    <li>Quick Start Product Listing - Creating A Quick Product Listing Is Needed Before You Can Ship Your Inventory</li>
                                    <li>Designing Your Product Packaging - The Easiest Ways To Get The Best Product Packaging</li>
                                    <li>The Power Of Package Inserts - How To Start Building A Customer List From Day 1</li>
                                    <li>How Much Inventory Should You Order? - How To Determine The Right Amount Of Inventory To Order For Your First Order</li>
                                    <li>Shipping By Air Or By Sea - The Pros And Cons Of Shipping By Sea Or By Air</li>
                                    <li>The "Secrets" Of Placing Your First Inventory Order</li>
                                    <li>What Happens After You Order Your Inventory - Important Steps To Take While Waiting For Your Inventory To Arrive</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">BUILDING YOURBRAND ASSETS</h4>
                                <ul class="tr-module-inner">
                                    <li>Building a Foundation for Success - The Most Important Steps To Take To Build Your Brand Online and Maximize Sales</li>
                                    <li>Creating Your Domain Email Account</li>
                                    <li>Creating Your Brand Website - The Easiest and Fastest Way To Get Your Website Setup</li>
                                    <li>Creating Your Brand Facebook Page - Creating a Facebook Page to Power Your Product Launch</li>
                                    <li>Using Facebook Messenger to Build a Subscriber List - The Most Impactful Way to Build a Raving Fan Base For Your Brand</li>
                                    <li>Setting up Manychat For Success - How to Provide a Professional Brand Experience</li>
                                    <li>Important ManyChat Features - One of the Most Important Tools in Your Toolbox</li>
                                    <li>Building a Subscriber List For Launch - The Best Way To Future Proof Your Brand and Maximize Success in Your Product Launch</li>
                                    <li>Using Facebook Ads to Get Subscribers - Introducing Your Brand to Your Target Customer</li>
                                    <li>Get More Reviews On Autopilot With ManyChat - More Reviews = Higher Conversion Rate = More Sales</li>
                                    <li>Adding Content to Facebook and Instagram page - Constantly Growing Your Audience and Providing Social Proof</li>
                                    <li>Registering Your Brand Name Across All Social Media Sites - Setting Up for Scale and Long Term</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">THE PERFECT PRODUCT PAGE</h4>
                                <ul class="tr-module-inner">
                                    <li>How To Craft The Perfect Amazon Listing To Crush Your Competitors</li>
                                    <li>Strategic Keyword Research For Top Amazon Rankings - How To Find The Best Possible Keywords To Target For Your Product To Get Maximum Traffic And Sales</li>
                                    <li>How To Craft The Best Title To Gain Traffic And Conversion</li>
                                    <li>Bullet Points That Sell - The Secrets Of Creating The Best Possible Bullet Points Using Benefits And Features Of Your Product</li>
                                    <li>How To Create A Compelling Product Description That Steals Sales From Your Competitors</li>
                                    <li>Product Images That Attract And Convert - Along With The Title, Your Product Images Are The Most Important Element Of Your Listing. Here's How To Get Them Right</li>
                                    <li>Product Pricing For Profit - How To Choose The Right Price To Get Both Traffic And Sales, But Still Have A Significant Profit Margin</li>
                                    <li>Creating Your Complete Listing - How To Add All The Elements To Optimize Your Listing</li>
                                    <li>How To Craft The Perfect Customer Emails For Engagement And Reviews</li>
                                    <li>Taking Advantage Of Downtime - Maximizing The Time You Have While Waiting For Your Inventory</li>

                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">THE PERFECT PRODUCT LAUNCH – ENABLERS BLITZ RANK</h4>
                                <ul class="tr-module-inner">
                                    <li>The Amazon Launch Process - Understanding The Objective</li>
                                    <li>Planning for Success - Key Preparation Steps for a Successful Product Launch</li>
                                    <li>Tracking the Data to Inform Decisions - What Numbers Matter the Most For a Successful Launch</li>
                                    <li>Introduction to Amazon Sponsored Product Advertising - Why It's An Important Piece of Your Brand Strategy</li>
                                    <li>Structuring Campaigns for Success - The Most Effective and Cost Efficient Way To Structure Your Ad Campaigns on Amazon</li>
                                    <li>Using Samurai Seller - Take the Pain Out of Amazon Ads</li>
                                    <li>Getting Your Initial Reviews - How To Get Your Initial Product Reviews</li>
                                    <li>Creating Promotional Coupon Codes</li>
                                    <li>Distribute Coupon Codes to Subscriber List - Simple Approach to Distributing Promotional Codes During Launch</li>
                                    <li>Optimizing Price Against Rank and Sales - How and When to Optimize Your Price and Increase Profit</li>
                                    <li>Sustaining Rank Profitably - How To Hold Onto Your Spot When Achieve Ranking on Amazon</li>
                                    <li>Running Out of Inventory and Reordering - The Most Effective Way to Maximize Sales and Minimize Loss of Rank when Running Out Of Stock</li>

                                </ul>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Training Module Wrapper -->

    <!-- Start Build Wrapper -->
    <section class="one-build-wrapper py-5">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="one-build-content text-center">
                            <h3 class="md-heading text-white mb-0">BUILD YOUR BUSINESS TODAY – WE’RE READY TO HELP YOU!</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Build Wrapper -->
@endsection

@section('scripts')
@endsection
