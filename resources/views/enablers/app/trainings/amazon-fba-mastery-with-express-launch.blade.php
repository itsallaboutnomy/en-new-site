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

    <!-- Start Intro Wrapper -->
    <section class="tr-intro-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tr-intro-content text-center">
                            <h1 class="h-primary text-org">INTRODUCING TO AMAZON FBA MASTERY WITH EXPRESS LAUNCH</h1>
                            <img src="{{ _asset('assets-app/img/exp-icon.jpg') }}">
                            <p class="info-rap mb-4">This Training Will Enable The Pass Outs To Become Master Of With Amazon FBA Which Will Then Allow Them To Offer Their Services.</p>
                            <p class="info-rap">This Program Is Termed As Amazon FBA Mastery With Practical Approach With Enablers Express Launch</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Intro Wrapper -->

    <!-- Start Ready Wrapper -->
    <section class="tr-ready-wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ready-content text-center">
                            <h2 class="md-heading text-white text-uppercase mb-5">Are you ready to get paractice for product launch?</h2>
                            @if($training->is_registration_open)
                                <a href="{{ route('app.enrollment.create') }}?enroll_for=training&slug={{ $training->slug }}" class="blue-btn">Apply Now</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Ready Wrapper -->

    <!-- Start What Wrapper -->
    <section class="tr-what-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="what-content">
                            <h4 class="md-heading text-org pb-4">ON SUCCESSFUL COMPLETION OF THIS COURSE THE TRAINEE SHOULD BE ABLE TO:</h4>
                            <p class="info-rap">1. Manage Amazon Accounts</p>
                            <p class="info-rap">2. Understand the use of different data research tools for product research and product Sourcing on Amazon.</p>
                            <p class="info-rap">3. Order fulfilment tasks starting from inventory replenishment to shipping FBM orders</p>
                            <p class="info-rap">4. Providing customer service for Amazon customers on <strong>KNOWLEDGE PROFICIENCY DETAILS</strong></p>
                            <p class="info-rap">5. Be able to Launch products for their potential Clients.</p>
                            <hr class="my-5">
                            <h4 class="md-heading text-org pb-4">ON SUCCESSFUL COMPLETION OF THIS TRAINING, THE TRAINEE SHOULD BE ABLE TO:</h4>
                            <p class="info-rap">1. Manage complete Amazon A to Z business.</p>
                            <p class="info-rap">2. Understand the concept of product hunting, Product sourcing, product launching and Product ranking.</p>
                            <p class="info-rap">3. Have the knowledge of latest techniques related to Amazon business.</p>
                            <p class="info-rap">4.&nbsp; Client’s behalf and handling returns, Refunds and removing negative feedback.</p>
                            <p class="info-rap">5. Management of Amazon listing from inception to optimization.</p>
                            <p class="info-rap">6. Advertisement campaign management for Amazon (PPC).</p>
                            <p class="info-rap">7. Product launch and ranking competency for Amazon with focus on Enablers Blitz Rank (EBR)</p>
                            <p class="info-rap">8. Techniques using Facebook Ads in conjunction with Many Chat.</p>
                            <p class="info-rap">9. Book keeping and financial record handling for Amazon business.</p>
                            <p class="info-rap">10. Working on Upwork and Fiverr as Amazon Virtual Assistant.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End What Wrapper -->

    <!-- Start Training Module Wrapper -->
    <section class="tr-module-wrapper grey-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="tr-module-listed my-5 pl-0">
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">INTRODUCTION TO E-COMMERCE MARKETS</h4>
                                <ul class="tr-module-inner">
                                    <li>Concept of E-commerce</li>
                                    <li>Difference of E-commerce platforms</li>
                                    <li>Business cycle of E-commerce</li>
                                    <li>Benefits of E-commerce market VS traditional market</li>
                                    <li>Retail Arbitrage, Online Arbitrage &amp; Drop shipping</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">INTRODUCTION TO AMAZON</h4>
                                <strong class="d-block py-4">1. Introduction</strong>
                                <ul class="tr-module-inner">
                                    <li>Objective of working as an Amazon VA</li>
                                    <li>What is Amazon</li>
                                    <li>Why we choose Amazon VA</li>
                                </ul>
                                <strong class="d-block py-4">2. Amazon business models</strong>
                                <ul class="tr-module-inner">
                                    <li>Amazon FBM vs FBA</li>
                                    <li>Amazon FBA wholesale</li>
                                    <li>Amazon Drop shipping</li>
                                    <li>Advantage and Disadvantage of each model</li>
                                </ul>
                                <strong class="d-block py-4">3. Amazon seller central walk-through</strong>
                                <ul class="tr-module-inner">
                                    <li>Getting familiar with Amazon seller central</li>
                                    <li>Understand the seller central dashboard</li>
                                    <li>Do’s and don’ts of using seller central as a VA</li>
                                </ul>
                                <strong class="d-block py-4">4. Amazon user ID handling</strong>
                                <ul class="tr-module-inner">
                                    <li>Understanding reasons of ID suspension</li>
                                    <li>How to avoid ID suspensions</li>
                                    <li>Different kind of ID suspensions</li>
                                    <li>Resolving ID suspension by using appeals</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">AMAZON PRODUCT RESEARCH TOOLS</h4>
                                <strong class="d-block py-4">1. Introduction to product research tools</strong>
                                <ul class="tr-module-inner">
                                    <li>Understanding Jungle scout</li>
                                    <li>Understanding merchant words</li>
                                    <li>Understanding Helium 10</li>
                                    <li>Understanding Viral launch</li>
                                </ul>
                                <strong class="d-block py-4">2. Category analysis</strong>
                                <ul class="tr-module-inner">
                                    <li>Understanding gated categories</li>
                                    <li>Main category and sub-category</li>
                                    <li>How to get a category un gated</li>
                                </ul>
                                <strong class="d-block py-4">3. Keyword research</strong>
                                <ul class="tr-module-inner">
                                    <li>How to analyse primary keywords</li>
                                    <li>How to analyse secondary keywords</li>
                                    <li>What are golden keywords</li>
                                    <li>How to get keywords for a product</li>
                                </ul>
                                <strong class="d-block py-4">4. Product research techniques</strong>
                                <ul class="tr-module-inner">
                                    <li>Understanding what sells on Amazon</li>
                                    <li>Using Ali baba to find products</li>
                                    <li>Using coupons website to find products</li>
                                    <li>Using minus string method to find products</li>
                                    <li>Using spying on seller method to find products</li>
                                    <li>Using social media websites to find products</li>
                                    <li>Tips and tricks to find products</li>
                                    <li>Choosing a competitor in a targeted niche</li>
                                </ul>
                                <strong class="d-block py-4">5. Basic parent search</strong>
                                <ul class="tr-module-inner">
                                    <li>How to search for a patent using google</li>
                                    <li>What to do in case of a patent infringement</li>
                                    <li>How to read a patent report</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">SOURCING AND LOGISTICS</h4>
                                <strong class="d-block py-4">1. Finding &amp; contact suppliers</strong>
                                <ul class="tr-module-inner">
                                    <li>How to find suppliers on Ali baba</li>
                                    <li>How to find suppliers by using other websites</li>
                                    <li>How to contact suppliers by using appropriate methods</li>
                                    <li>Understanding supplier selection criteria</li>
                                    <li>Understanding shipping methods and icon terms</li>
                                    <li>Contacting freight forwarders for shipment</li>
                                    <li>How to negotiate with the suppliers</li>
                                    <li>Understanding Amazon logistics</li>
                                    <li>How to place an order with the supplier on Ali baba</li>
                                    <li>Do’s and don’ts</li>
                                    <li>How to do inventory planning</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">LISTING CREATION</h4>
                                <strong class="d-block py-4">1. All about amazon listing</strong>
                                <ul class="tr-module-inner">
                                    <li>Understanding Amazon listings</li>
                                    <li>Pre-requisites of an Amazon listing</li>
                                    <li>How to create listing on Amazon</li>
                                    <li>Understanding title, bullet points and product descriptions</li>
                                    <li>Understanding backend search terms for a list</li>
                                    <li>Retouching images for Amazon listing</li>
                                    <li>Listing optimization using different tools</li>
                                    <li>Winning the buy box on Amazon</li>
                                    <li>Understanding dummy listing</li>
                                    <li>Understanding EBC/ A+ content</li>
                                    <li>How to add variations</li>
                                    <li>How to merge listings and ASINS</li>
                                    <li>Understanding FBA and FBM offers on the list</li>
                                    <li>Do’s and don’ts</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">ORDER MANAGEMENT AND CUSTOMER SUPPORT</h4>
                                <strong class="d-block py-4">1. ORDER MANAGEMENT AND CUSTOMER SUPPORT</strong>
                                <ul class="tr-module-inner">
                                    <li>How to fulfil FBM orders</li>
                                    <li>How to handle returns and refunds</li>
                                </ul>
                                <strong class="d-block py-4">2. Shipment Plan</strong>
                                <ul class="tr-module-inner">
                                    <li>Checklist before creating a shipment plan</li>
                                    <li>How to create shipment plan</li>
                                    <li>Understanding SPD and LTL for shipments</li>
                                    <li>Understanding Amazon shipment limitations</li>
                                    <li>Understanding Amazon shipment limitations</li>
                                </ul>
                                <strong class="d-block py-4">3. Customer Support</strong>
                                <ul class="tr-module-inner">
                                    <li>How to handle customer questions</li>
                                    <li>Proper way of communicating with customers</li>
                                    <li>Do’s and don’ts of customer support</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">AMAZON CASES AND REPORT HANDLING</h4>
                                <strong class="d-block py-4">1. Amazon cases</strong>
                                <ul class="tr-module-inner">
                                    <li>Understanding the process of Amazon cases</li>
                                    <li>How to open Amazon cases for your problems</li>
                                    <li>Amazon cases tips and tricks</li>
                                    <li>Amazon cases do’s and don’ts</li>
                                </ul>
                                <strong class="d-block py-4">2. Negative reviews and negative feedback removal</strong>
                                <ul class="tr-module-inner">
                                    <li>How to get negative review removed</li>
                                    <li>How to get negative feedback removed</li>
                                </ul>
                                <strong class="d-block py-4">3. Handling A-Z guarantee claims</strong>
                                <ul class="tr-module-inner">
                                    <li>Understanding A-Z guarantee claims</li>
                                    <li>How to tackle A-Z claims</li>
                                </ul>
                                <strong class="d-block py-4">4. Amazon reports handling</strong>
                                <ul class="tr-module-inner">
                                    <li>Understanding different business reports</li>
                                    <li>Understanding different inventory reports</li>
                                    <li>Understanding different advertisement reports</li>
                                    <li>Understanding other reports on seller central</li>
                                </ul>
                                <strong class="d-block py-4">5. Amazon trademark brand registry</strong>
                                <ul class="tr-module-inner">
                                    <li>Why we need a trademark on Amazon</li>
                                    <li>Understanding brand registry and its benefits</li>
                                    <li>How to do brand registry</li>
                                    <li>Understanding Amazon IP accelerator program</li>
                                    <li>Understanding different inventory reports</li>
                                    <li>Understanding different advertising reports</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">ADVERTISING ON AMAZON</h4>
                                <strong class="d-block py-4">1. Amazon PPC</strong>
                                <ul class="tr-module-inner">
                                    <li>What is Amazon PPC?</li>
                                    <li>Understanding type of advertising campaigns</li>
                                    <li>How to create advertising campaigns</li>
                                    <li>How to calculate ACOS</li>
                                    <li>How to optimize the PPC campaign</li>
                                    <li>Do’s and don’ts of PPC campaign</li>
                                </ul>
                                <strong class="d-block py-4">2. Lightning deals</strong>
                                <ul class="tr-module-inner">
                                    <li>What is lightning deal?</li>
                                    <li>How to get lightning deal?</li>
                                    <li>Do’s and don’ts of lightning deal</li>
                                </ul>
                                <strong class="d-block py-4">3. Digital coupon</strong>
                                <ul class="tr-module-inner">
                                    <li>What is digital coupon?</li>
                                    <li>How to make digital coupon?</li>
                                    <li>Do’s and don’ts of digital coupon</li>
                                    <li>What is early reviewer program?</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">PRODUCT LAUNCH AND RANK ON AMAZON</h4>
                                <strong class="d-block py-4">1. Launching and ranking</strong>
                                <ul class="tr-module-inner">
                                    <li>What is launch?</li>
                                    <li>What is ranking?</li>
                                    <li>Different methods of L&amp;R</li>
                                    <li>Understanding Enablers Blitz Rank</li>
                                    <li>Understanding Manychat</li>
                                    <li>Understanding Facebook’s ads</li>
                                </ul>
                                <strong class="d-block py-4">2. Facebook, Manychat &amp; Pixelfy</strong>
                                <ul class="tr-module-inner">
                                    <li>What is Facebook ad?</li>
                                    <li>How to manage Facebook ad budget</li>
                                    <li>Understanding target audience</li>
                                    <li>How to create a Facebook ad?</li>
                                    <li>What is Manychat?</li>
                                    <li>How to create and manage Manychat flow?</li>
                                    <li>Where to get existing MC flows?</li>
                                    <li>Different type of Pixelfy URLs</li>
                                    <li>Understanding and Implementation of SABO</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">BOOKKEEPING AND RECORD HANDLING</h4>
                                <strong class="d-block py-4">1. How to make financial reports and submit reports
                                </strong>
                                <ul class="tr-module-inner">
                                    <li>How to do profit and loss for Amazon business</li>
                                    <li>How to make cashflow statements for Amazon</li>
                                    <li>How to submit daily reports to clients</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">WORKING AS A SERVICE PROVIDERS ON UPWORK AND OTHER PLATFORMS</h4>
                                <strong class="d-block py-4">1. Upwork</strong>
                                <ul class="tr-module-inner">
                                    <li>What is Upwork and why we choose it?</li>
                                    <li>How to create Upwork account?</li>
                                    <li>How to get clients on Upwork?</li>
                                    <li>How to communicate with a foreign client?</li>
                                    <li>What to charge the client?</li>
                                    <li>Understanding complete A-Z process</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">BUSINESS ETHICS FOR AMAZON BUSINESS</h4>
                                <strong class="d-block py-4">1. Business ethics</strong>
                                <ul class="tr-module-inner">
                                    <li>Understanding business ethics</li>
                                    <li>Taking a loss to give a value to your client</li>
                                    <li>keeping everything of your client business</li>
                                    <li>Honouring the agreement even at loss</li>
                                    <li>Do’s and don’ts of business ethics as a VA</li>
                                </ul>
                            </li>
                            <li class="tr-module-wrap mb-5">
                                <h4 class="tr-module-title">FBA WHOLESALE (FOR AMAZON)</h4>
                                <ul class="tr-module-inner">
                                    <li>Introduction to Amazon FBA wholesale</li>
                                    <li>Account registration</li>
                                    <li>Amazon buyer review</li>
                                    <li>Software and researching methods for Amazon FBA wholesale</li>
                                    <li>Amazon FBA wholesale shipments and calculations</li>
                                    <li>Additional guidelines</li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Training Module Wrapper -->

    <!-- Start What Wrapper -->
    <section class="tr-what-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="what-content">
                            <h4 class="md-heading text-org pb-4">AMAZON FBA MASTERY INCLUDES ENABLERS EXPRESS LAUNCH</h4>
                            <p class="info-rap mb-5"><strong>Enablers Express Launch (EXL)</strong> Is The Step Towards The Future Of ECommerce Training. Enablers Has Launched Practical Sessions Via Zoom For Anyone Who Wants To Participate In The Practical Live Launch And For Those Who Wants To Explore Practical Aspects Of Their Knowledge.</p>
                            <h4 class="md-heading text-org pb-4">WHAT IS ENABLERS EXPRESS LAUNCH (EXL)</h4>
                            <p class="info-rap mb-5">With Hundred Of Thousands Students Already A Part Of Enabling Video Series (EVS), Enablers Aims To Add At Least 5 Lac Students More To This Program By The End Of The Year 2023. However, What The Team Has Observed Is Many Students Are Complaining About The Lack Of Practical Insights. Apart From Those That Were Able To Successfully Launch Their Products, Some Failed. Considering The Fact, Enablers Is Now Stepping Up More Than Before For Helping Enablers’ Students. Enablers Express Launch (EXL) Is The New Initiative That Has Been Introduced By Enablers To Show The Experience Of Live Launch.</p>
                            <strong class="d-block mb-5">This EXL Is Designed ‘By Enablers’ And ‘Enablers Will Be Bearing All Of Its Expenses.” EXL Which Will Be From Account Opening Until Launching To Live One Product.</strong>
                            <p class="info-rap mb-5">Students Will Be Given Some Tasks During This Launch Which Will Be Their Hands On Practice Of Actual Task Which Are Needed To Complete In Order To Launch One Product.</p>
                            <p class="info-rap">From What The Students Have Learned, Mentors For One Launch Will Test It By Giving Tasks And Assignments For The Students To Prove Their Knowledge.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End What Wrapper -->
@endsection

@section('scripts')
@endsection
