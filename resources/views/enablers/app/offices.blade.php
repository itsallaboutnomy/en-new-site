@extends('enablers.app.layouts.app')

@section('page-title',' | Offices')

@section('styles')
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="p-inner" class="s-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 animate__animated animate__animated animate__fadeInLeft">
                        <div class="support-left-content main-headings">
                            <span class="d-block sub-title text-white">Offices</span>
                            <h1 class="text-white h-primary text-uppercase">Embark on a journey
                                never undertaken before!
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->

    <!-- Start Talk Wrapper -->
    <section class="o-talk-wrapper padd">
        <div class="content padd">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="o-talk-heading py-5">
                            <h2 class="md-heading">TALK TO US!</h2>
                            <p>We’re here to help and answer any question you might have.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-md-4">
                        <div class="o-info-wrap">
                            <h6>Contact</h6>
                            <a class="ph-conact" href="tel:+9242 111 123 11">+9242 111 123 11</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-md-4">
                        <div class="o-info-wrap">
                            <i class="fas fa-headphones-alt"></i>
                            <h6>SUPPORT</h6>
                            <a href="{{ route('app.support.index') }}" class="blue-btn">CONTACT SUPPORT</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-md-4">
                        <div class="o-info-wrap">
                            <i class="far fa-clock"></i>
                            <h6>office timing</h6>
                            <p>9:00 AM to 06:00 PM (Mon-Fri)</p>
                            <p>9:00 AM to 01:00 PM (Saturday)</p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-12 mx-lg-auto mb-md-4">
                        <div class="o-socail-wrap">
                            <ul class="pl-0 o-socail-list">
                                <li><a href="https://www.facebook.com/EnablersTeam" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.instagram.com/enablers.official/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCmKr9PW2edzkzMpbju_9Jzw" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/enablers-pakistan/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="https://twitter.com/enablers_" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                            <h5 class="text-center text-uppercase">be social</h5>
                            <p class="text-center">Get in touch with us on social media</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Talk Wrapper -->

    <!-- Start Offices Wrapper -->
    <section class="o-offices-wrapper grey-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="o-offices-heading text-center pb-5 mb-lg-5 mb-0">
                            <h2 class="text-uppercase mb-0">OUR OFFICES</h2>
                        </div>
                    </div>
                </div>
                @isset($headOffice)
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-5">
                        <div class="o-main-office-image">
                            <img src="{{ _asset($headOffice->image_path) }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-5">
                        <div class="o-main-office-content pl-0 pl-lg-5">
                            <h4 class="md-heading text-uppercase pb-0 mb-0">HEAD OFFICE</h4>
                            <span class="o-main-city text-uppercase d-block">{{ $headOffice->title }}</span>
                            <address class="o-main-address d-block">{{ $headOffice->address }}</address>
                            <a href="tel:{{ $headOffice->phone }}" class="o-main-contact d-block">{{ $headOffice->phone }}</a>
                            @if($headOffice->map_link)
                            <a href="{{ $headOffice->map_link }}" target="_blank" class="blue-btn">View map</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endisset
                <div class="row">
                    @foreach($offices as $office)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card o-offices-block">
                            <img class="card-img-top" src="{{ _asset($office->image_path) }}">
                            <div class="card-body text-center">
                                <h5 class="o-city-name">{{ $office->title }}</h5>
                                <address class="o-address">{{ $office->address }}</address>
                            </div>
                            <div class="card-footer text-center">
                                @if($office->timings) <span class="o-time d-block">{{ $office->timings }}</span> @endif
                                @if($office->working_days) <span class="o-time d-block">{{ $office->working_days }}</span> @endif
                                <strong class="o-contact">
                                    @if($office->phone) {{ $office->phone }} @endif
                                    @if($office->mobile) | {{ $office->mobile }} @endif
                                    @if($office->fax)<br> | {{ $office->fax }} @endif
                                </strong>
                                <a href="{{ $office->map_link ?: "#"  }}" target="_blank" class="blue-btn d-block mx-3">View Map</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Offices Wrapper -->
@endsection

@section('scripts')
@endsection
