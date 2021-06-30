@extends('enablers.app.layouts.app')

@section('page-title',' | Events')

@section('styles')
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="p-inner" class="e-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-10 animate__animated animate__animated animate__fadeInLeft">
                        <div class="events-left-content main-headings">
                            <span class="d-block sub-title text-white">WE provide</span>
                            <h1 class="text-white h-primary text-uppercase">SEMINARS ON BUILD AN E-COMMERCE BUSINESS ON AMAZON</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->

    <!--   Start Upcoming Wrapper -->
    <section class="e-upcoming-wrapper padd">
        <div class="content padd mt-5 mt-lg-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="e-heading-rap text-center">
                            <h2 class="md-heading text-uppercase">UPCOMING ENABLERS SEMINARS</h2>
                            <div class="e-cost-content">
                                <h3 class="md-heading mb-4 mb-lg-0">PARTICIPATION COST:</h3>
                                <span>1000 PKR</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--   End Upcoming Wrapper -->

    <!--    Start Events Wrapper -->
    <section class="e-events-wrapper padd">
        <div class="content">
            <div class="container">
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-auto-hide" role="alert" style="font-size: 20px; font-weight: 700;">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="row align-items-center">
                    @foreach($events as $event)
                    <div class="col-lg-12 animate__animated animate__zoomIn">
                        <div class="card e-events-block mb-5">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-md-3 col-sm-3">
                                    <div class="e-events-date mb-4 mb-lg-0">
                                        @if($event->starting_at)
                                        <h3 class="mb-0 text-uppercase">{{ date('d',strtotime($event->starting_at)) }}
                                            <span class="d-block">{{ date('M, Y',strtotime($event->starting_at)) }}</span>
                                        </h3>
                                        @else
                                        <h3 class="mb-0 text-uppercase"> TBD</h3>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-9 col-sm-9">
                                    <div class="e-event-details mb-4 mb-lg-0">
                                        <h4 class="e-event-city">{{ $event->title }}</h4>
                                        <div class="e-venue">
                                            <h5 class="e-venue-h mb-0">Venue:</h5>
                                            <p class="text-uppercase mb-0">{{ $event->venue }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="e-events-enroll text-left text-lg-right">
                                        <a href="{{ route('app.enrollment.create') }}?enroll_for=seminar&slug={{ $event->slug }}" class="blue-btn">Apply now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--    End Events Wrapper -->

    <!-- Start Bluid Wrapper -->
    <section class="e-bluid-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="e-bluid-left-content mb-5">
                            <img src="{{ _asset('assets-app/img/enablers-amazon-fba-successful-business-pakistan.png') }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="e-bluid-right-content">
                            <h4 class="md-heading">BUILD A SUCCESSFUL AMAZON BUSINESS FROM PAKISTAN</h4>
                            <p class="info-rap">Amazon is one of the largest E-Commerce stores across the globe. With a huge number of sellers are already selling various commodities on this platform, it can be a difficult feat to boost your sales and get an edge over the rest of the sellers.</p>
                            <p> However, with the premium services of Enablers, your Amazon account will be up and running with your products in no time. Our experienced trainers will handle A to Z.</p>
                            <p>Now You Can Have The Exact System Thousands Have Used To Build A Million Dollar Business, Achieve Their Dreams Live Free From The 9 To 5 Rat Race!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Bluid Wrapper -->

    <!-- Start blue  wrapper -->
    <section class="e-blue blue-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h3 class="md-heading text-white mb-4">BUILD YOUR ECOMMERCE BUSINESS ON AMAZON</h3>
                            <a href="#" class="trans-btn mb-0 mb-lg-4"> YES! RESERVE MY SEAT NOW </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End blue  wrapper -->

    <!--  Start Opportunity Wrapper -->
    <section class="e-opportunity-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-6 order-2 order-md-1">
                        <div class="e-opportunity-left-content mb-5">
                            <strong class="d-block mb-4">BUT TIME IS RUNNING OUT …!</strong>
                            <h4 class="md-heading">THE OPPORTUNITY</h4>
                            <p class="info-rap mb-4"> Here is why you should consider leveraging the power of Amazon…</p>
                            <strong class="info-rap d-block mb-4"> 197 Million monthly website visitors, over 100 Million prime members and $1 of every $2 spent online in the USA is spent on Amazon </strong>
                            <p class="info-rap mb-4">That’s a huge pool of shoppers who can potentially see your product and buy from you!</p>
                            <p class="info-rap"> And if you think “<strong>Well, it’s already late, right?</strong>”, think again. </p>
                        </div>
                    </div>
                    <div class="col-sm-6 order-1 order-md-2">
                        <div class="e-opportunity-right-content text-center mb-5">
                            <img class="w-75 mx-auto" src="{{ _asset('assets-app/img/enablers-amazon-fba-business-opportunity.png') }}">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center padd">
                    <div class="col-sm-6">
                        <div class="e-opportunity-left-content text-center mb-5">
                            <img class="w-75 mx-auto" src="{{ _asset('assets-app/img/enablers-amazon-growth-oppotunity.png') }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="e-opportunity-right-content mb-5">
                            <p class="info-rap mb-4"><strong>In 2023 – 3 years from now</strong> – consumers will buy an additional <strong>$1+ trillion</strong> worth of products on Amazon every year. <strong>This means there are literally billions of dollars up for grabs for people just like you…</strong></p>
                            <p class="info-rap mb-4">Bottom line is, the Amazon pie keeps getting bigger…and handing you on a silver tablet the perfect opportunity to start a profitable, high-growth business.</p>
                            <p class="info-rap mb-4">Flying drones, local stores, massive warehouses, and rapid international growth are just a few parts of Amazon’s relentless progress. </p>
                            <p class="info-rap">Fortunately for you, the opportunity to build a real, long-term, profitable business leveraging the massive resources of Amazon has never been better than it is right now in 2020. It’s easier and faster to build a great business on Amazon than at any time in history.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End Opportunity Wrapper -->

    <!--  Start Advantage Wrapper -->
    <section class="e-advantage-wrapper padd blue-bg">
        <div class="content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 order-2 order-md-1">
                        <div class="e-advantage-left-content  mb-5">
                            <h4 class="md-heading text-white">FACE TO FACE SEMINAR, IMPROVED TO TAKE ADVANTAGE OF THE BIGGEST NETWORKING OPPORTUNITIES WITH ENABLERS TEAM</h4>
                            <p class="info-rap text-white py-4">Join today to start your own of Amazon FBA Business from Pakistan</p>
                            <a class="orange-btn" href="https://www.enablers.org/enrollment/">ENROLL NOW </a>
                        </div>
                    </div>
                    <div class="col-lg-7 order-1 order-md-2">
                        <div class="e-advantage-right-content text-center mb-5">
                            <img src="{{ _asset('assets-app/img/enablers-amazon-face-to-face-teachings-saqib-azhar.jpg') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="e-advantage-bottom-content">
                            <p class="info-rap text-white mb-4">We’ve spent re-working, refining, tweaking, and upgrading best practice to make it better than ever. The brand new, never-before-seen – How to make money with Amazon is the best version yet, we guarantee it (see below).</p>
                            <p class="info-rap text-white mb-4">Even if you’ve never sold on Amazon before, we can, and will, teach you:</p>
                            <ul class="pl-4">
                                <li class="info-rap text-white">How to find red hot product opportunities on Amazon</li>
                                <li class="info-rap text-white">How to find high-quality suppliers for any product from anywhere in the world</li>
                                <li class="info-rap text-white">The simple process to creating your own brand for any product you sell</li>
                                <li class="info-rap text-white">The secret to crafting the perfect Amazon product page</li>
                                <li class="info-rap text-white">Our new system for launching products to the top of Amazon and beating out big name brands in less than a week</li>
                                <li class="info-rap text-white">How to nearly automate the entire logistics of this business using Amazon’s own resources</li>
                                <li class="info-rap text-white">How and when to scale this business by growing your brand with additional products</li>
                            </ul>
                            <p class="info-rap text-white">Everything in the brand new program is completely new and contains what’s working right now on Amazon.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End Advantage Wrapper -->

    <!-- Start black  wrapper -->
    <section class="e-blue black-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h3 class="md-heading text-white mb-4">BUILD YOUR ECOMMERCE BUSINESS ON AMAZON</h3>
                            <a href="#" class="trans-btn mb-0 mb-lg-4"> YES! RESERVE MY SEAT NOW </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End black wrapper -->

    <!-- Start Components Wrapper -->
    <section class="e-components-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="e-components-content">
                            <h3 class="md-heading text-capitalize text-org mb-4">The 5 Components of Enablers Seminar</h3>
                            <ul class="pl-5 my-5">
                                <li class="info-rap"><strong>Become a Virtual Assistant</strong></li>
                                <li class="info-rap"><strong>Drop Shipping on Amazon</strong></li>
                                <li class="info-rap"><strong>Amazon FBA Wholesale</strong></li>
                                <li class="info-rap"><strong>Building your OWN Brand on Amazon</strong></li>
                                <li class="info-rap"><strong>Become a Listing Promoter</strong></li>
                            </ul>
                            <p class="info-rap mb-5">Each one of these components is designed to help you build your business faster. We are here to make sure you and your business are successful with Enablers. Each one of these components is critical to the process of building your business.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Components Wrapper -->

    <!-- Start triumph Wrapper -->
    <section class="e-triumph-wrapper padd" style="background: url('{{ _asset("assets-app/img/enablers-amazon-one-day-seminar.jpg") }}') no-repeat; background-size: cover;" >
        <div class="content padd">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="e-triumph-content">
                            <h4 class="md-heading text-white pb-3 col-lg-4">ONE DAY OF SEMINAR 1000 DAYS OF TRIUMPH</h4>
                            <a class="blue-btn mb-0 mb-md-5" href="https://www.enablers.org/enrollment/">YES! RESERVE MY SEAT NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End triumph Wrapper -->

    <!-- Start Seminars Module -->
    <section class="e-module-wrapper grey-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="e-module-heading">
                            <strong class="info-rap d-block">The 1-day of seminar and life time support from enablers has taught people from all around the Pakistan, most with little to NO prior business experience, how to build a THRIVING business.</strong>
                            <p class="infp-rap">Now…here’s something <strong>SUPER EXCITING</strong> that we have to share with you…</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ol class="e-module-listed my-5 pl-0">
                            <li class="e-module-wrap mb-5">
                                <strong class="info-rap">You learn which Amazon marketplace to start with, exactly how to get setup to sell on Amazon, the 7 elements of a HOT opportunity, products to absolutely AVOID, the Perfect Product Selection System, the FULL Product Selection Criteria, creating your HOT product opportunity list, and how to narrow your opportunity list down to the absolute BEST products.</strong>
                            </li>
                            <li class="e-module-wrap mb-5">
                                <p class="info-rap">You discover how much you make from every sale on Amazon, all about PRODUCT TUNING, the guaranteed way to make easier sales, the 3-Step Simple Sourcing System, finding and contacting suppliers like a pro, and getting samples for your top product opportunity</p>
                            </li>
                            <li class="e-module-wrap mb-5">
                                <strong class="info-rap">You learn what to do once your samples arrive, how to choose the BEST supplier AND get the HIGHEST profit margins, the Amazing Brand Name Creation Process, the Rapid Amazon Listing Setup Method, Automatic List-Building with Package Inserts, shipping by sea and air, and placing your first inventory order.</strong>
                            </li>
                            <li class="e-module-wrap mb-5">
                                <p class="info-rap">You discover the exact steps to take to prepare for massive launch success, creating your global brand image with a brand website, setting up your automatic list-building funnel.</p>
                            </li>
                            <li class="e-module-wrap mb-5">
                                <strong class="info-rap">We show you how to create an irresistible Amazon product page with the Perfect Product Page system including strategic keyword research, creating a traffic-grabbing product title, crafting bullet points that SELL, closing the sale with a compelling product description, and bringing your product to life with high-quality product images. You also learn how to strategically PRICE your product for maximum sales and profit, AND how to get automatic Amazon product reviews with the perfect email autoresponder series.</strong>
                            </li>
                            <li class="e-module-wrap mb-5">
                                <p class="info-rap">It’s time to LAUNCH your product to the top of Amazon with the brand-new, advanced LAUNCH AND RANK system! You learn how to get your first product reviews no matter where you live in the world and how to use Amazon coupons, Amazon advertising, and a few other powerful traffic platforms to skyrocket your product up in the Amazon rankings.</p>
                            </li>
                            <li class="e-module-wrap mb-5">
                                <strong class="info-rap">You take your sales to the NEXT LEVEL with the advanced marketing system and powerful traffic tools. You learn how to advertise on Amazon like an expert, how to produce sales with a little-known secret advertising system only a fraction of Amazon Sellers know about, how to setup your Raving Fan Customer Service System, and how to measure and scale your business profits.</strong>
                            </li>
                            <li class="e-module-wrap mb-5">
                                <p class="info-rap">You learn how to dramatically SCALE your business the right way. We show you how to leverage the brand you’ve built and customers you’ve acquired to double, triple, and even quadruple your business multiple times per year by strategically adding additional products to your brand. You can EASILY multiply the success of your business by doing this the RIGHT way and you learn everything in the last module of the web class!</p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Seminars Module -->

    <!-- Start blue  wrapper -->
    <section class="e-blue blue-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h3 class="md-heading text-white mb-4">BUILD YOUR ECOMMERCE BUSINESS ON AMAZON</h3>
                            <a href="#" class="trans-btn mb-0 mb-lg-4"> YES! RESERVE MY SEAT NOW </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End blue  wrapper -->

    <!-- Start says  wrapper -->
    <section class="e-says-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h3 class="md-heading mb-5">OUR STUDENT’S SAYS</h3>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card st-review grey-bg p-5 mb-5">
                            <div class="row align-items-center">
                                <div class="col-lg-2 mb-4 mb-lg-0">
                                    <div class="st-re-icon text-center">
                                        <img src="{{ _asset('assets-app/img/enablers-student-umar-sarwar-review.jpg') }}">
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="st-re-content">
                                        <p class="info-rap">Yes, the complete session was very good for those specially who want to join <strong>Amazon and want to increase there selling & business Highly recommended </strong> </p>
                                        <strong class="d-block text-org">Umar Sarwar</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card grey-bg st-review p-5">
                            <div class="row align-items-center">
                                <div class="col-lg-2 mb-4 mb-lg-0">
                                    <div class="st-re-icon text-center">
                                        <img src="{{ _asset('assets-app/img/enablers-student-khalil-rehman-review.jpg') }}">
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="st-re-content">
                                        <p class="info-rap">Professional attitude lead to success that we learned of Institute of Enablers specially Sir Saqib and his team. <strong>Highly appreciated the way he present the whole process</strong></p>
                                        <strong class="d-block text-org">Khalil Rehman</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="e-says-left-content py-5">
                            <img src="{{ _asset('assets-app/img/enablers-amazon-mentor-program.png') }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="e-says-right-content py-5">
                            <h5 class="text-org">THE MENTOR PROGRAM</h5>
                            <p class="info-rap">Our only goal with Enablers is to make sure you build a successful business. To make sure this happens, we’ve brought on some of our very successful  Amazon Sellers to help you start and grow your new business.</p>
                            <strong class="info-rap d-block py-3">On average, the Mentors have sold over $1 MILLION on Amazon EACH in their own businesses.</strong>
                            <p class="info-rap">These incredible people not only have built very successful businesses themselves, but also absolutely LOVE to help people just like you. It’s their form of giving back to the community that’s done so much for them.</p>
                            <p class="info-rap">
                                Anytime you have a question or need help along the journey of building your business with Enablers, the Mentors are there to help. They’re active in the community every single day and are waiting and ready to help you continually move forward with your business.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End says  wrapper -->

    <!-- Start black  wrapper -->
    <section class="e-blue black-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h3 class="md-heading text-white mb-4">BOOK YOUR SEAT TODAY FOR SEMINAR</h3>
                            <a href="#" class="trans-btn mb-0 mb-lg-4">  YES! LET’S DO IT  </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End black wrapper -->

    <!-- Start says-01  wrapper -->
    <section class="e-says-wrapper-01 padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h3 class="md-heading mb-5">OUR STUDENT’S SAYS</h3>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card st-review grey-bg p-5 mb-5">
                            <div class="row align-items-center">
                                <div class="col-lg-2 mb-4 mb-lg-0">
                                    <div class="st-re-icon text-center">
                                        <img src="{{ _asset('assets-app/img/enablers-student-nabeel-ashraf-review.jpg') }}">
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="st-re-content">
                                        <p class="info-rap">Yes, the complete session was very good for those specially who want to join<strong>Amazon and want to increase there selling & business Highly recommended </strong> </p>
                                        <strong class="d-block text-org">Umar Sarwar </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card grey-bg st-review p-5">
                            <div class="row align-items-center">
                                <div class="col-lg-2 mb-4 mb-lg-0">
                                    <div class="st-re-icon text-center">
                                        <img src="{{ _asset('assets-app/img/enablers-student-naveed-arif-review.jpg') }}">
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="st-re-content">
                                        <p class="info-rap">Very informative for entrepreneurs who want to start their own business.<strong>Good trainers with professional skills are there to help you out to get you achieve your goals</strong></p>
                                        <strong class="d-block text-org">Naveed Arif</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End says-01  wrapper -->

    <!-- Start Momemts Wrapper -->
    <section class="e-moments-wrapper padd">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="e-moments-heading text-center mb-5">
                            <h4 class="md-heading">MOMENTS TO BE REMEMBERED</h4>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <img src="{{ _asset('assets-app/img/enablers-amazon-fba-seminar.jpg') }}">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <img src="{{ _asset('assets-app/img/enablers-amazon-training-seminar.jpg') }}">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <img src="{{ _asset('assets-app/img/enabler-amazon-fba-seminar-saqib-azhar.jpg') }}">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <img src="{{ _asset('assets-app/img/enablers-amazon-fba-training-seminar-faisal-azhar.jpg') }}">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <img src="{{ _asset('assets-app/img/enablers-amazon-training-workshop.jpg') }}">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <img src="{{ _asset('assets-app/img/enablers-amazon-fba-coaching-seminar.jpg') }}">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <img src="{{ _asset('assets-app/img/enablers-amazon-bootcamp-saqib-azhar-1.jpg') }}">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <img src="{{ _asset('assets-app/img/enablers-amazon-seminar-faisal-azhar.jpg') }}">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <img src="{{ _asset('assets-app/img/enablers-amazon-training-seminar-saqib-azhar.jpg') }}">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <img src="{{ _asset('assets-app/img/enablers-amazon-fba-session.jpg') }}">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <img src="{{ _asset('assets-app/img/u8-1.jpg') }}">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <img src="{{ _asset('assets-app/img/enablers-amazon-training-session-saqib-azhar.jpg') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Momemts Wrapper -->
@endsection

@section('scripts')
@endsection
