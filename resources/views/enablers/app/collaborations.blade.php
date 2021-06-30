@extends('enablers.app.layouts.app')

@section('page-title',' | Collaborations')

@section('styles')
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="p-inner" class="m-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 animate__animated animate__animated animate__fadeInLeft">
                        <div class="mou-left-content main-headings">
                            <h1 class="text-white h-primary text-uppercase">Collaborating With Our Partners In Our Journey To Make Pakistan An Ecommerce Hub
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->

    <!-- Start Mou Heading Wrapper  -->
    <section class="m-heading-wrapper padd mt-5">
        <div class="content padd mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="m-heading-content">
                            <h2 class="md-heading text-capitalize">Our Success Comes From The Support Of Our Partners That Have Joined Us In Our Venture For Boosting Ecommerce Growth In The Nation</h2>
                            <p class="f-20">We appreciate the efforts of our partners that have given their support for our cause to develop eCommerce performance in Pakistan. Every helping hand for our goal is a step towards a better future of the country for which Enablers is working endlessly.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Mou Heading Wrapper  -->

    <!-- Start Mou list Wrapper -->
    <section class="m-list-wrapper grey-bg padd">
        <div class="content">
            <div class="container">
                @foreach($collaborations as $collaboration)
                <div class="card mou-inner p-5 mb-5 border-0">
                    <div class="row align-items-center">
                        <div class="col-lg-3 mb-5 mb-lg-0">
                            <div class="m-mou-icon text-center">
                                <img src="{{ _asset($collaboration->logo_path) }}">
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="m-mou-details text-center text-lg-left">
                                <h4 class="mou-title">{{ $collaboration->title }}</h4>
                                <p class="mou-desc">{{ $collaboration->summary }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Mou list Wrapper -->

    <!-- Mou End Section Wrapper -->
    <section class="mou-end-wrapper">
        <div class="content">
            <img src="{{ _asset('assets-app/img/Enablers-want-mou-bg.png') }}" class="w-100 b-clr">
            <div class="container padd">
                <div class="row mb-0 mb-lg-5">
                    <div class="col-lg-12 mb-0 mb-lg-5">
                        <div class="m-end-content text-center my-5">
                            <h4 class="md-heading text-white">Do you want to sign MOU with enablers?</h4>
                            <a href="{{ route('app.support.index') }}" class="trans-btn mt-5"> Get In Touch</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Mou End Section Wrapper -->
@endsection

@section('scripts')
@endsection
