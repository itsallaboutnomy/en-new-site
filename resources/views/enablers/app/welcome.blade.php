@extends('enablers.app.layouts.app')

@section('page-title',' | Welcome')

@section('styles')
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section class="main-slider">
        <div class="header__moore animate__animated animate__animated animate__rotateInDownLeft d-none d-md-block">
            <a href="#largest">
                <button class="header__moore__btn">
                    <span class="header__moore__text p-event-none text-uppercase">more</span>
                    <span class="bar-wrapper bar-wrapper--down p-event-none">
                        <span class="bar-whitespace p-event-none">
                            <span class="bar-line bar-line-down p-event-none"></span>
                        </span>
                    </span>
                </button>
            </a>
        </div>
        <div class="bg-bar"></div>
        <div class="container-fuild">
            <div class="row no-gutters">
                <div class="col-xl-5 col-lg-5 col-md-5 d-none d-lg-block pl-5 animate__animated animate__animated animate__fadeInLeft ">
                    <div class="card slider-left-content border-0 px-4 ml-5 align-items-start justify-content-center h-100 height-auto">
                        <h1 class="h-primary">Pakistan’s largest  eCommerce Network</h1>
                        <p class="my-4">Enablers is directing the people of Pakistan towards business growth, working on the biggest markets of the world, and becoming successful entrepreneurs.</p>
                        <div style="margin: 0 auto;">
                            <img src="{{ _asset('assets-app/img/Enablers-awards-slider.png') }}" class="mt-5">
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-12 col-12">
                    <div class="h-slides pr-4 pr-lg-5">
                        <div class="owl-carousel home-slides hidden-xs">
                            @foreach($sliderImages as $image)
                                <div class="item">
                                    <a href="#"  rel="noopener noreferrer">
                                        <picture>
                                            <source media="(min-width:767px)" srcset="{{ _asset($image->web_image_path) }}" alt="{{ $image->image_alt_name }}">
                                            <img src="{{ _asset($image->mobile_image_path) }}" alt="{{ $image->image_alt_name }}" style="width:100%;">
                                        </picture>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End Banner Wrapper -->

    <!--  Start Largest Wrapper -->
    <section id="largest" class="largest-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 my-0 my-lg-5">
                        <h2 class="md-heading text-uppercase text-center my-5">Pakistan's largest Ecommerce network</h2>
                    </div>
                    @foreach($achievements as $achievement)
                        <div class="col-lg-3 col-md-6 col-12 mb-5">
                            <a href="">
                                <div class="largest-block card h-100 height-auto align-items-center border-0">
                                    <div class="l-icon">
                                        <img src="{{ _asset($achievement->logo_path) }}">
                                    </div>
                                    <h3 class="l-heading">{{ $achievement->title }}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <hr class="my-0 my-lg-4">
            </div>
        </div>
    </section>
    <!--  End Largest Wrapper -->

    <!-- Start Counters Wrapper -->
    <section class="counter-wrapper">
        <div class="content">
            <div class="container">
                <div class="row no-gutters">
                    @foreach($objectives as $objective)
                        <div class="col-lg-3 col-6">
                            <div class="counter-block" style="{{ $loop->last ? 'border-right: none;' : '' }}">
                                <div class="row">
                                    <div class="counter-icon col-3">
                                        <img src="{{ _asset($objective->logo_path) }}">
                                    </div>
                                    <div class="counter-details col-9">
                                        <h5>{{ $objective->title }}</h5>
                                        <span>{{ $objective->sub_title }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Counters Wrapper -->

    <!-- Start Our Mission Wrapper -->
    <section class="mission-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <picture>
                            <source media="(min-width:992px)" srcset="{{ _asset('assets-app/img/Enablers-our-mission-bg.png') }}">
                            <img src="{{ _asset('assets-app/img/Enablers-our-mission-bg-2.jpg') }}">
                        </picture>
                    </div>
                </div>
                <div class="row no-gutters align-items-center mission-contents">
                    <div class="col-lg-6">
                        <div class="mission-block">
                            <h2 class="md-heading text-white mb-0">Our Mission</h2>
                            <p class="info-rap text-white py-4">Enablers is dedicated to enabling Pakistan as one of the largest eCommerce hubs in the world. Our team has exclusively devoted to helping the people of this country become entrepreneurs and work on international platforms. We aim to create 2 million employment opportunities.</p>
                            <a href="{{ route('app.mission')  }}" class="blue-btn">Find Out More</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mission-icon-contents">
                            <div class="row">
                                @foreach($milestones as $milestone)
                                    <div class="col-lg-6 col-6">
                                        <div class="mission-rap mb-4 pb-4">
                                            <div class="row">
                                                <div class="mission-icon col-3">
                                                    <img src="{{ _asset($milestone->logo_path) }}">
                                                </div>
                                                <div class="mission-content col-9">
                                                    <h5 class="mb-0">{{ $milestone->title }}</h5>
                                                    <p>{{ $milestone->sub_title }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Mission Wrapper -->

    <!-- Start Offer Wrapper -->
    <section class="offer-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="offreing-heading pb-4">
                            <h2 class="md-heading mb-0">WHAT WE OFFER</h2>
                            <p class="info-rap mb-0">We’re a team of passionate, dedicated people who have one overreaching goal – Your Success is Our Success</p>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6 col-12">
                        <div class="card offering-block blue-bg h-100 height-auto">
                            <div class="offering-icon">
                                <img src="{{ _asset('assets-app/img/Enablers-training-icon.png') }}">
                            </div>
                            <div class="offering-content">
                                <h3 class="text-uppercase mb-0">TRAINING PROGRAMS </h3>
                                <p class="info-rap text-white">Learn from the market’s best to gain exclusive insights on how to begin your Amazon eCommerce business. Enablers caters to students’ needs equally, training the youth for a future that would sustain the economy of the country. </p>
                                <p class="info-rap text-white">We aim to enable youth towards an entrepreneurial mindset, creating business minds instead of jobholders. Our crown jewel, Enabling Video Series, serves as foundation for numerous freelancing options that one can use to generate several income streams. </p>
                                <a href="{{ route('app.trainings.index') }}" class="black-btn">Find out more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card offering-block orange-bg h-100 height-auto">
                            <div class="offering-icon">
                                <img src="{{ _asset('assets-app/img/Enablers-services-icon.png') }}">
                            </div>
                            <div class="offering-content">
                                <h3 class="text-uppercase mb-0">World class services</h3>
                                <p class="info-rap text-white">We aim to facilitate everyone that needs world-class eCommerce services. From concept to accomplishment, we collaborate transparently with investors and clients alike. We ensure to offer steadfast solutions with proactive approaches that would boost eCommerce productivity for our clients.</p>
                                <p class="info-rap text-white">It is our mission to enable a business mindset and we empower businesses to take the leap of faith while enabling themselves to compete with the biggest brands internationally without fear or hurdles.</p>
                                <a href="{{ route('app.services') }}" class="black-btn">Find out more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Offer Wrapper -->

    <!-- Start CAREER Wrapper -->
    <section class="career-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="career-heading pb-4">
                            <h2 class="md-heading mb-0">Removing Barriers In Ecommerce Success </h2>
                            <p class="info-rap mb-0">We’re striving to create an entrepreneurial ecosystem that would encompass excellence and brilliance </p>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6 col-12">
                        <div class="career-block h-100 height-auto">
                            <a href="{{ route('app.trainers.show-saqib') }}">
                                <img src="{{ _asset('assets-app/img/Enablers-CEO.png') }}">
                                <div class="career-content">
                                    <h3 class="text-uppercase mb-0">SAQIB AZHAR</h3>
                                    <span>CEO & CO-FOUNDER</span>
                                    <a href="{{ route('app.trainers.show-saqib') }}" class="black-btn">Find out more</a>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="career-block h-100 height-auto">
                            <a href="{{ route('app.trainers.show-faisal') }}">
                                <img src="{{ _asset('assets-app/img/Enablers-CEO-CO-founder.png') }}">
                                <div class="career-content">
                                    <h3 class="text-uppercase mb-0">Faisal Azhar</h3>
                                    <span>CEO & CO-FOUNDER</span>
                                    <a href="{{ route('app.trainers.show-faisal') }}" class="black-btn">Find out more</a>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End CAREER Wrapper -->

    <!-- Start Collaboration Wrapper -->
    <section class="collaboration-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="colt-heading">
                            <h2 class="md-heading mb-0">Collaborated with </h2>
                            <p class="info-rap mb-0">We take pride in collaborating with numerous government and private organizations in our venture to create Pakistan as an eCommerce hub.</p>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters mt-5 px-3">
                    @foreach($collaborations as $collaboration)
                        <div class="col-lg-2 col-3">
                            <div class="colbt-block">
                                <img src="{{ _asset($collaboration->logo_path) }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto mt-5 text-center">
                    <a href="{{ route('app.collaborations')  }}" class="blue-btn">Find out More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Collaboration Wrapper -->

    <!-- Start Developments Wrapper -->
    <section class="development-wrapper padd clearfix">
        <div class="container">
            <div class="bg-rap mb-4">
                <div class="img-industries">
                    @foreach($products as $product)
                        <img src="{{ _asset($product->banner_path) }}" class="img-fluid" data-object-fit="" alt="retail-large" style="opacity: 0;">
                    @endforeach
                </div>
                <div class="row no-gutters">
                    <div class="col-12 col-lg-4">
                        <div class="industry-box first d-flex align-items-center">
                            <div class="top-sec-g">
                                <h2 class="main-heading-g text-white">our DEVELOPMENTS</h2>
                                <p>Established in 2018, Enablers has continuously been working to make Pakistan a growing eCommerce hub, enabling the youth to build an entrepreneurial mindset</p>
                                <a href="{{ route('app.developments')  }}" class="trans-btn">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                    @foreach($products as $product)
                        <div class="col-12 col-lg-4">
                            <div class="industry-box d-flex justify-content-center align-items-center">
                                <a href="{{ $product->redirect_url }}" class="industry-link" target="_blank"></a>
                                <div class="inner">
                                    <h2 class="industry-name">{{ $product->title }}</h2>
                                    <p>{{ $product->short_summary }}</p>
                                    <img class="d-none d-lg-inline-block" src="{{ _asset($product->logo_path) }}">
                                    <i class="fas fa-chevron-down d-block d-lg-none"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Developments Wrapper -->

    <!-- Start Media group Wrapper -->
    <section class="media-group-wrapper position-relative grey-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="media-heading py-5">
                            <h2 class="md-heading mb-0">AS Seen On</h2>
                            <p class="info-rap mb-0">to help brands grow in the hyperconnected age</p>
                        </div>
                        <div class="media-images text-center">
                            <picture>
                                <source media="(min-width:767px)" srcset="{{ _asset('assets-app/img/Enablers-media-group.jpg') }}">
                                <img src="{{ _asset('assets-app/img/Enablers-media-group-mobile.jpg') }}"  style="width:100%;">
                            </picture>
                        </div>
                    </div>
                    <div class="col-lg-6 mx-auto text-center my-5">
                        <a href="{{ route('app.press') }}" class="blue-btn">View All</a>
                    </div>
                </div>
            </div>
            <div class="footer-top-btn clearfix d-none d-lg-block">
                <a href="#header">
                    <button class="footer-top-button">
                  <span class="bar-wrapper bar-wrapper-up p-event-none">
                  <span class="bar-whitespace p-event-none">
                  <span class="bar-line bar-line--up p-event-none"></span>
                  </span>
                  </span>
                        <span class="footer-top-text p-event-none text-uppercase">top</span>
                    </button>
                </a>
            </div>
        </div>
    </section>
    <!-- End Media group Wrapper -->
@endsection

@section('scripts')
@endsection
