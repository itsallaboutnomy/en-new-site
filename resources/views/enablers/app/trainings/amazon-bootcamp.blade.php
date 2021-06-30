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
                            <p class="info-rap">Amazon is one of the largest E-Commerce stores across the globe. With a huge number of sellers already selling various commodities on this platform, it can be a difficult feat to boost your sales and get an edge over the rest of the sellers. However, with the premium services of Enablers, your Amazon account will be up and running with your products in no time. Our experienced trainers will handle A to Z.</p>
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
                                <a href="{{ route('app.enrollment.create') }}?enroll_for=training&slug={{ $training->slug }}" class="black-btn">YES, I NEED PRO TRAINING</a>
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
                            <h4 class="md-heading text-capitalize">EVEN IF YOU’VE NEVER SOLD ON AMAZON BEFORE, WE CAN, AND WILL, TEACH YOU IN DETAIL:</h4>
                            <ul class="st-teach-listed">
                                <li>How to setup an Amazon account in US and Europe</li>
                                <li><strong>Product Discovery, Selection &amp; Category Approval.</strong></li>
                                <li>Keyword Research Analysis and Implementation.</li>
                                <li><strong>Competitor Analysis and pricing points.</strong></li>
                                <li>Winning the buy box.</li>
                                <li><strong>How to find high-quality suppliers for any product from anywhere in the world</strong></li>
                                <li>The simple process to creating your own brand for any product you sell</li>
                                <li><strong>The secret to crafting the perfect Amazon product page</strong></li>
                                <li>Review Management Process and Configuration with relevant tools.</li>
                                <li><strong>Management of % returns and pricing strategies</strong></li>
                                <li>Detail training about Product Launch Strategy</li>
                                <li><strong>Implement Best practice for Product Titles, Description, Keywords, Images, Enhanced Brand Content</strong></li>
                                <li>How to bring products on Page ONE for selected high traffic keywords</li>
                                <li><strong>Our new system for launching products to the top of Amazon and beating out big name brands in less than a week</strong></li>
                                <li>Labeling &amp; Shipment Management</li>
                                <li><strong>How to Make Website from Shopify and Link to Amazon Account for Orders</strong></li>
                                <li>Reporting to See overall Progress</li>
                                <li><strong>Social Media Marketing (Facebook, Twitter, You Tube, Brand Awareness)</strong></li>
                                <li>How to nearly automate the entire logistics of this business using Amazon’s own resources</li>
                                <li><strong>Paid Marketing (Facebook Ads, Amazon Sponsored Ads)</strong></li>
                                <li>How and when to scale this business by growing your brand with additional product</li>
                            </ul>
                            <p class="info-rap">Everything in the brand new program is completely new and contains what’s working right now on Amazon.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Teach Wrapper -->
    <!-- Start Reviews Wrapper -->
    <section class="st-review-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="card st-review grey-bg p-5">
                    <div class="row align-items-center">
                        <div class="col-lg-2 mb-4 mb-lg-0">
                            <div class="st-re-icon text-center">
                                <img src="{{ _asset('assets-app/img/nauman-aslam.png') }}">
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="st-re-content">
                                <p class="info-rap">Both Trainers are remarkable and top notch guys, the way they delineate all the process of FBA was really impressive. Kudos to the efforts of the <strong>enablers who opened the new future avenues of doing business abroad.. <span class="text-org">Nauman Aslam</span></strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card st-review grey-bg p-5 mt-5">
                    <div class="row align-items-center">
                        <div class="col-lg-2 mb-4 mb-lg-0">
                            <div class="st-re-icon text-center">
                                <img src="{{ _asset('assets-app/img/huzzi-malik.png') }}">
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="st-re-content">
                                <p class="info-rap">A chance to change our life.. A chance to build a business. A chance to realise what we are. a chance for ordinary to become extraordinary. <strong>An Epic Day Spend with Enablers.. <span class="text-org">Huzzi Malik</span></strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Reviews Wrapper -->
    <!-- Start Become Wrapper -->
    <section class="st-become-wrapper blue-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="st-become-content text-center">
                            <h3 class="md-heading text-white mb-4">BUILD YOUR BUSINESS TODAY – WE’RE READY TO HELP YOU!</h3>
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
                    <div class="col-lg-12">
                        <ol class="tr-module-listed my-5 pl-0">
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">INTRODUCTION ACCOUNT OPENING</h4>
                                <ul class="tr-module-inner">
                                    <li>Amazon Potential and Business Models</li>
                                    <li>In Enablers Boot Camp, Decide which Amazon marketplace is the best one for you to sell in</li>
                                    <li>How to Create Amazon Account in UK, Europe, USA</li>
                                    <li>Get your Amazon Seller Central account set up and ready to go</li>
                                    <li>Enablers Seller Dashboard – How it Works</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">FINDING THE PERFECT PRODUCT</h4>
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
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">EVALUATING SUPPLIERSAND SAMPLES</h4>
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
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">ORDERING YOUR INVENTORY AND CREATING YOUR BRAND</h4>
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
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">BUILDING YOURBRAND ASSETS</h4>
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
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">THE PERFECT PRODUCT PAGE</h4>
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
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">THE PERFECT PRODUCT LAUNCH – ENABLERS BLITZ RANK</h4>
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
    <!-- Start Components Wrapper -->
    <section class="tr-components-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tr-components-content">
                            <p class="info-rap mb-5"><strong>Enablers Boot Camp Never Ends</strong> – we are dealing with $1 Trillion Company (i.e. Amazon) so we change and adopt things as we progress. If you are starting this journey then you would need a similar mindset of people who can be around you and continue to give you latest techniques as you progress further.</p>
                            <p class="info-rap">What we do is to give you 3 months fast track training which then allow you to start the business and then as you progress further you continue to take sessions and continue to get engaged with Enablers Mentors / Trainers and your other same mindset fellows who are into this similar journey. <strong>It’s all Face to Face and Online Sessions</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Components Wrapper -->
    <!-- Start Moments Wrapper -->
    <section class="tr-moments-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tr-moments-heading text-center mb-5">
                            <h4 class="md-heading">MOMENTS TO BE REMEMBERED</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fuild">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-6 mb-4"><img src="./img/u25-1.jpg" alt=""></div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4"><img src="./img/u26-1.jpg" alt=""></div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4"><img src="./img/u27-1.jpg" alt=""></div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4"><img src="./img/u31-1.jpg" alt=""></div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4"><img src="./img/u32.jpg" alt=""></div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4"><img src="./img/u33-1.jpg" alt=""></div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4"><img src="./img/u11-1.jpg" alt=""></div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4"><img src="./img/u29-1.jpg" alt=""></div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4"><img src="./img/u30-1.jpg" alt=""></div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4"><img src="./img/u34-2.jpg" alt=""></div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4"><img src="./img/u35-1.jpg" alt=""></div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4"><img src="./img/u36-1.jpg" alt=""></div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('scripts')
@endsection
