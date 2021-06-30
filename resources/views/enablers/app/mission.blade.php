@extends('enablers.app.layouts.app')

@section('page-title',' | Our Mission')

@section('styles')
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="p-inner" class="ac-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 animate__animated animate__animated animate__fadeInLeft">
                        <div class="ac-left-content main-headings">
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

    <!-- Start Achieved Wrapper -->
    <section class="ac-achieved-wrapper padd mt-5">
        <div class="content mt-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 mb-4">
                        <div class="ac-achieved-left-content">
                            <h2 class="md-heading">we achieved</h2>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="ac-achieved-right-content border-left pl-5">
                            <h4 class="md-heading">Enablers is Leading Pakistan Towards
                                eCommerce Revolution.
                            </h4>
                            <p class="f-20">Our success and expertise in the retail Amazon marketplace allows us to enable people who want to start their own business. We strive to deliver nothing but the best and make certain our students are not only satisfied, but successful in the Amazon marketplace.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Achieved Wrapper -->

    <!-- Start Awards Wrapper -->
    <section class="ac-awards-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-6 order-2 order-md-1 mb-5 mb-md-0">
                        <div class="ac-award-content-block black-bg h-100 height-auto p-5">
                            <h5 class="md-heading text-white">Won the Award of Best eCommerce Company of the year 2020 </h5>
                            <p class="f-20 text-white">Enablers is aiming to mitigate traditional ‘rat race’ mindset in the country by boosting entrepreneurial ventures, enabling the people, especially the youth, to establish eCommerce businesses. Under the leadership of its CEO Saqib Azhar, Enablers aims to strengthen the eCommerce industry in the country, creating opportunities for passive income.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-md-2">
                        <div class="ac-award-icon-block d-flex align-items-center justify-content-center h-100 height-auto grey-bg p-5">
                            <img src="{{ _asset('assets-app/img/Enablers-best-ecomrece-award.png') }}">
                        </div>
                    </div>
                    <div class="col-lg-6 order-3 order-md-3">
                        <div class="ac-award-icon-block d-flex align-items-center justify-content-center h-100 height-auto grey-bg p-5">
                            <img src="{{ _asset('assets-app/img/Enablers-fasting-growing-awards.png') }}">
                        </div>
                    </div>
                    <div class="col-lg-6 order-4 order-md-4">
                        <div class="ac-award-content-block blue-bg h-100 height-auto p-5">
                            <h5 class="md-heading text-white">Won the Award of Best eCommerce Company of the year 2020 </h5>
                            <p class="f-20 text-white">Enablers is aiming to mitigate traditional ‘rat race’ mindset in the country by boosting entrepreneurial ventures, enabling the people, especially the youth, to establish eCommerce businesses. Under the leadership of its CEO Saqib Azhar, Enablers aims to strengthen the eCommerce industry in the country, creating opportunities for passive income.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Awards Wrapper -->

    <!--  Start AC offer Wrapper -->
    <section class="ac-offer-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row no-gutters">
                    @foreach($milestones as $milestone)
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="ac-millions-box hover-content">
                                <button data-hover="{{ $milestone->sub_title }}">
                                    <div class="ac-billion-title">
                                        <h5 class="text-center">{{ $milestone->title }}</h5>
                                    </div>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card ac-awards-box h-100 height-auto">
                            <h6 class="ac-awards-title">Selected by</h6>
                            <div class="ac-awards-icon">
                                <img class="w-25 p-3" src="{{ _asset('assets-app/img/Enablers-undp-icon.png ') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card ac-awards-box h-100 height-auto">
                            <h6 class="ac-awards-title">Selected by</h6>
                            <div class="ac-awards-icon">
                                <img class="w-50" src="{{ _asset('assets-app/img/Enablers-payoneer-icon.png') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card ac-awards-box h-100 height-auto">
                            <h6 class="ac-awards-title">Selected by</h6>
                            <div class="ac-awards-icon">
                                <img class="w-50" src="{{ _asset('assets-app/img/Enablers-collaboration-icon.png')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card ac-awards-box h-100 height-auto">
                            <h6 class="ac-awards-title">Selected by</h6>
                            <div class="ac-awards-icon">
                                <img class="w-50" src="{{ _asset('assets-app/img/Enablers-Board -icon.png')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End AC offer Wrapper -->

    <!-- Start Recognition Wrapper -->
    <section class="ac-recognition-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <div class="ac-recognition-block h-100 height-auto blue-bg">
                            <div class="d-flex align-items-center pb-5">
                                <h4 class="md-heading ac-recognition-title text-white mb-0">INTERNATIONAL RECOGNITION</h4>
                                <img class="ac-recognition-icon" src="{{ _asset('assets-app/img/Enablers-interranationnal-recognition-icon.png')}}">
                            </div>
                            <p class="ac-recognition-details f-20 text-white">Enablers has been internationally recognized by various international platforms, including Helium10, Jungle Scout, Viral Launch, etc. CEO Saqib Azhar was invited as a guest by the hosts of these platforms to speak on the latest trends in eCommerce and workability on Amazon.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ac-recognition-block h-100 height-auto grey-bg">
                            <div class="d-flex align-items-center pb-5">
                                <h4 class="md-heading ac-recognition-title mb-0">PAKISTAN ECOMMERCE ASSOCIATION </h4>
                                <img class="ac-recognition-icon" src="{{ _asset('assets-app/img/Enablers-pakistan-ecommerce-association-icon.png')}}">
                            </div>
                            <p class="ac-recognition-details f-20">Enablers is the first to take the initiative of establishing an eCommerce regulatory known as the ‘Pakistan eCommerce Association.’ With the collaboration of the Lahore Chamber of Commerce, an association will be established that will monitor the flow of eCommerce stores working in the country.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Recognition Wrapper -->

    <!-- Start Mou Wrapper -->
    <section class="ac-collaboration-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ac-colt-heading">
                            <h4 class="md-heading mb-0 text-capitalize">Signed MOU</h4>
                            <p class="info-rap mb-0">Enablers is the first to take the initiative of establishing an eCommerce regulatory known as the ‘Pakistan eCommerce Association.’ With the collaboration of the Lahore Chamber of Commerce, an association will be established that will monitor the flow of eCommerce stores working in the country.</p>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters mt-5 px-3">
                    @foreach($collaborations as $collaboration)
                        <div class="col-lg-2 col-4">
                            <div class="colbt-block">
                                <img src="{{ _asset($collaboration->logo_path) }}">
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-lg-6 mx-auto mt-5 text-center">
                        <a href="{{ route('app.collaborations') }}" class="blue-btn">Find out More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Mou Wrapper -->

    <!--   Start Alliance Wrapper -->
    <section class="ac-alliance-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ac-alliance-heading mb-5">
                            <h4 class="md-heading mb-0">Working WITH THE GOVT. OF PAKISTAN</h4>
                            <p class="info-rap mb-0">Enablers is the first to take the initiative of establishing an eCommerce regulatory known as the ‘Pakistan eCommerce Association.’ With the collaboration of the Lahore Chamber of Commerce, an association will be established that will monitor the flow of eCommerce stores working in the country.</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="owl-carousel ac-alliance-slider black-bg px-0 px-md-5">
                            <div class="item px-0 px-md-5">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <picture>
                                            <source media="(min-width:767px)" srcset="{{ _asset('assets-app/img/Achievements-alliance-slider.png') }}">
                                            <img class="w-100" src="{{ _asset('assets-app/img/Achievements-alliance-slider.png') }}">
                                        </picture>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="ac-alliance-slide-content p-4 p-md-0">
                                            <h4 class="md-heading text-white mb-0 mb-md-5">PRESIDENT OF PAKISTAN</h4>
                                            <p class="info-rap text-white mb-0">With the support of the President of Pakistan, Enablers has taken the initiative of establishing the ‘Pakistan eCommerce Association.’ This association will act as a regulating body, monitoring the workability of eCommerce stores in the country’s market. </p>
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
    <!--   End Alliance Wrapper -->
@endsection

@section('scripts')
@endsection
