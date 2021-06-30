@extends('enablers.app.layouts.app')

@section('page-title',' | About Us')

@section('styles')
    <style>
        .award-icon img {
            width: 20rem;
        }
    </style>
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="p-inner" class="a-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-12 animate__animated animate__animated animate__fadeInLeft">
                        <div class="about-left-content main-headings">
                            <span class="d-block sub-title text-white">We Are</span>
                            <h1 class="text-white h-primary text-uppercase">Pakistan's Largest <span class="d-block">Ecommerce</span>network</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->

    <!--  Start Leading Wrapper -->
    <section class="a-leading-wrapper padd mt-5">
        <div class="content mt-0 mt-lg-5">
            <div class="container"`>
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="leading-left-content">
                            <h2 class="md-heading mb-0"> Who We are</h2>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="leading-right-contnet pl-0 pl-lg-5">
                            <h3 class="md-heading text-capitalize">Enablers is leading Pakistan towards an eCommerce revolution</h3>
                            <p>Our success and expertise in the retail Amazon marketplace allow us to enable people who want to start their own business. We deliver top-of-the-line training to our students, enabling them to become successful entrepreneurs and launch an ever-growing business in eCommerce markets.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End Leading Wrapper -->

    <!-- Start Awards Wrapper -->
    <section class="a-awards-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <div class="card border awards-left-content h-100 height-auto">
                            <div class="row align-items-center">
                                <div class="col-lg-6 order-lg-1 order-2">
                                    <div class="award-content">
                                        <p class="mb-0">Won the Award of Best eCommerce Company of the year 2020 </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 order-lg-2 order-1">
                                    <div class="award-icon">
                                        <img src="{{ _asset('assets-app/img/Enablers-best-ecommerce-award-icon.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card border awards-left-content h-100 height-auto">
                            <div class="row align-items-center">
                                <div class="col-lg-6 order-lg-1 order-2">
                                    <div class="award-content">
                                        <p class="mb-0">Won the Award Fastest Growing Brand of the year 2020</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 order-lg-2 order-1">
                                    <div class="award-icon">
                                        <img src="{{ _asset('assets-app/img/Enablers-fasting-growing-icon.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Awards Wrapper -->

    <!-- Start Collaboration Wrapper -->
    <section class="a-collaboration-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mou-heading">
                            <p class="info-rap mb-0">Signed MOU</p>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters mt-5 px-3">
                    @foreach($collaborations as $collaboration)
                    <div class="col-lg-2 col-4">
                        <div class="colbt-block border-0">
                            <img src="{{ _asset($collaboration->logo_path) }}">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Collaboration Wrapper -->

    <!--  Start Vision Wrapper -->
    <section class="a-vision-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-7">
                        <div class="card border-0 justify-content-center a-vision-left-content h-100 height-auto">
                            <h2 class="md-heading text-white mb-0 pb-4">Our Vision</h2>
                            <p class="info-rap text-white">Enablers is aiming to mitigate the traditional ‘rat race’ mindset in the country by boosting entrepreneurial ventures, enabling the people, especially the youth, to establish eCommerce businesses. Under the leadership of its CEO Saqib Azhar, Enablers aims to strengthen the eCommerce industry in the country, creating opportunities for passive income.</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="a-vision-right-content">
                            <img src="{{ _asset('assets-app/img/Enablers-vision-image.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End Vision Wrapper -->

    <!--  Start Our Mission Wrapper -->
    <section class="a-mission-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 order-lg-1 order-2">
                        <div class="a-mission-blocks">
                            <div class="row no-gutters align-items-center">
                                @foreach($milestones as $milestone)
                                <div class="col-lg-6 order-1 order-lg-1">
                                    <div class="a-mission-block {{ $loop->iteration == 2 || $loop->iteration == 3 ? 'mission-bg' : '' }} {{ $loop->iteration == 2 || $loop->iteration == 4 ? 'mission-2-bg' : '' }}">
                                        <div class="row">
                                            <div class="a-mission-icon col-3">
                                                <img src="{{ _asset($milestone->logo_path) }}">
                                            </div>
                                            <div class="a-mission-content col-9">
                                                <h3>{{ $milestone->title }}</h3>
                                                <p class="mb-0 pt-2">{{ $milestone->sub_title }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 order-lg-2 order-1">
                        <div class="a-mission-right-content pl-0 py-4 pl-lg-5">
                            <h2 class="md-heading">Our MISSION</h2>
                            <p>To boost entrepreneurship in the country, paving the pathway towards a digitally innovated Pakistan and helping it to become one of the largest eCommerce hubs in the World. </p>
                            <p>To boost entrepreneurship in the country, paving the pathway towards a digitally innovated Pakistan and helping it to become one of the largest eCommerce hubs in the World. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End Our Mission Wrapper -->

    <!-- Start Pathfinders Wrapper -->
    <section class="a-pathfinders-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pathfinders-heading pb-5">
                            <h2 class="md-heading mb-0 pb-3">OUR PATHFINDERS</h2>
                            <p class="info-rap mb-0">We’re a team of passionate, dedicated people who have one overreaching goal – Your Success is Our Success</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="a-pathfinders-img ">
                            <img src="{{ _asset('assets-app/img/Enabler-Pathfinders-image-01.png') }}">
                            <div class="a-pathfinders-contnet">
                                <h3 class="text-uppercase mb-0 text-white">SAQIB AZHAR</h3>
                                <span class="d-block text-white">CEO CO-FOUNDER</span>
                                <a href="{{ route('app.trainers.show-saqib') }}" class="black-btn">Find out more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="a-pathfinders-img mb-0">
                            <img src="{{ _asset('assets-app/img/Enabler-Pathfinders-image-02.png') }}">
                            <div class="a-pathfinders-contnet">
                                <h3 class="text-uppercase mb-0 text-white">FAISAL AZHAR</h3>
                                <span class="d-block text-white">CEO & CO-FOUNDER</span>
                                <a href="{{ route('app.trainers.show-faisal') }}" class="black-btn">Find out more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End Pathfinders Wrapper -->

    <!--   Start Every Wrapper -->
    <section class="a-every-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="a-every-left-content">
                            <h3 class="md-heading pb-4">A Step Ahead Of Others, Always</h3>
                            <p class="info-rap pb-3">We take pride in offering carefully consulted solutions while adapting the innovations to come up with professional progressive strategies. Our organization goes beyond the ordinary to provide compelling solutions, resulting in entrepreneurial growth for those working with us.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="a-every-right-content">
                            <h5 class="text-white">Everything we do is focused on 3 key goals</h5>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2 a-goal-icon">
                                            <span>01</span>
                                        </div>
                                        <div class="col-10 a-goal-content">
                                            <strong>Improve People’s Lives Through Digital</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2 a-goal-icon">
                                            <span>02</span>
                                        </div>
                                        <div class="col-10 a-goal-content">
                                            <strong>Drive Commercial Results, Fast</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2 a-goal-icon">
                                            <span>03</span>
                                        </div>
                                        <div class="col-10 a-goal-content">
                                            <strong>Make An Impact On The World</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End Every Wrapper -->

    <!--  Start Team Slider Wrapper -->
    <section class="a-team-slider-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="owl-carousel a-team-slide">
                            <div class="a-team-img item">
                                <img src="{{ _asset('assets-app/img/Enablers-about-team-picture-03.png') }}">
                            </div>
                            <div class="a-team-img item">
                                <img src="{{ _asset('assets-app/img/Enablers-about-team-picture-02.png') }}">
                            </div>
                            <div class="a-team-img item">
                                <img src="{{ _asset('assets-app/img/Enablers-about-team-picture-06.png') }}">
                            </div>
                            <div class="a-team-img item">
                                <img src="{{ _asset('assets-app/img/Enablers-about-team-picture-06.png') }}">
                            </div>
                            <div class="a-team-img item">
                                <img src="{{ _asset('assets-app/img/Enablers-about-team-picture-04.png') }}">
                            </div>
                            <div class="a-team-img item">
                                <img src="{{ _asset('assets-app/img/Enablers-about-team-picture-05.png') }}">
                            </div>
                            <div class="a-team-img item">
                                <img src="{{ _asset('assets-app/img/Enablers-about-team-picture-06.png') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End Team Slider Wrapper -->

    <!--    Start Office Wrapper -->
    <section class="a-offices-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="a-offices-heading py-5">
                            <h4 class="md-heading text-center">we have largest offices chain</h4>
                        </div>
                        <div class="a-offices-chart">
                            <img src="{{ _asset('assets-app/img/Enablers-offices-map.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    End Office Wrapper -->

    <!-- Start Values wrapper -->
    <section class="a-values-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6">
                        <div class="a-values-left-content h-100 height-auto">
                            <h3 class="text-white md-heading pb-4">Our VALUES</h3>
                            <p class="text-white">We specialize in enhancing skills on an individual level. We help you to achieve an exemplary vision with opportunities for gaining numerous skills. Our innovative workability makes us different from the rest because we aim for excellence that would last decades.</p>
                            <hr class="border text-white my-5">
                            <p class="text-white">At Enablers, we aim to become:</p>
                            <ul class="a-values-list pl-0 mb-0">
                                <li>The premier source for the country’s development in the eCommerce industry</li>
                                <li>To play an important part in the development of our youth socially, intellectually, and professionally</li>
                                <li>To create a dedicated and diligent community of entrepreneurs that will work on international markets</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="a-values-right-content h-100 height-auto">
                            <div class="row no-gutters">
                                <div class="col-lg-6 order-4 order-lg-1">
                                    <div class="a-values-block">
                                        <div class="a-values-icon">
                                            <img src="{{ _asset('assets-app/img/Enablers-innvation-icon.png') }}">
                                            <h4>INNOVATION</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 order-1 order-lg-2">
                                    <div class="a-values-block a-values-bg">
                                        <div class="a-values-icon">
                                            <img src="{{ _asset('assets-app/img/Enablers-accountbility-icon.png') }}">
                                            <h4>ACCOUNTABILITY</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 order-3 order-lg-3">
                                    <div class="a-values-block a-values-bg">
                                        <div class="a-values-icon">
                                            <img src="{{ _asset('assets-app/img/Enablers-transparency-icon.png') }}">
                                            <h4>TRANSPARENCY & INTEGRITY</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 order-2 order-lg-4">
                                    <div class="a-values-block">
                                        <div class="a-values-icon">
                                            <img src="{{ _asset('assets-app/img/Enablers-excellence-icon.png') }}">
                                            <h4>EXCELLENCE</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Values wrapper -->

    <!-- Start Journey wrapper -->
    <section class="a-journey-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6">
                        <div class="a-journey-left-content">
                            <h3 class="md-heading text-white">THE JOURNEY</h3>
                            <p class="text-white">Enablers is one of the leading platforms in Pakistan providing the most advanced and powerful training about building the economy of Pakistan and fulfilling the dreams of hundreds of entrepreneurs.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="a-journey-right-content">
                            <img src="{{ _asset('assets-app/img/Enablers-journey-image.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Journey wrapper -->

    <!-- Start Community Wrapper -->
    <section class="a-communtiy-wrapper padd grey-bg">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="a-communtiy-content pb-5">
                            <h4 class="md-heading mb-4">COMMUNITY IMPACT</h4>
                            <p class="mb-4">Millions of people have benefitted from the establishment of Enablers and 200+ courses compiled in EVS. With unemployment rates sky high, Enablers introduced an easy and free-to-use alternative to learn about eCommerce and establish oneself as a successful freelancer. Hundreds of thousands of students are now a part of EVS and millions have already begun their journey as successful eCommerce businessmen and virtual assistants. A new generation is under training that is making efforts day and night to make Pakistan one of the biggest hubs of eCommerce in the world.</p>
                            <p class="mb-4">Team Enablers is working consistently to teach people with specialized courses and expert mentorship, which has helped many to frame a luxurious income-earning lifestyle for themselves. The efforts of CEO Saqib Azhar and Enablers have been recognized countrywide.</p>
                            <p class="mb-4">Government institutions, the cabinet of the President of Pakistan, PHEC, and many more have acknowledged the efforts and are willing to cooperate with Enablers in their goals. Thousands of success stories are proof of how spectacularly Enablers is enabling Pakistan towards an eCommerce revolution.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Community Wrapper -->
@endsection

@section('scripts')
@endsection
