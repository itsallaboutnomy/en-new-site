@extends('enablers.app.layouts.app')

@section('page-title',' | '.ucwords($training->title))

@section('styles')
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="evs-p-inner" class="evs-banner-wrapper pr-4 pr-lg-5">
        <div id="evs-inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 animate__animated animate__animated animate__fadeInLeft">
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->

    <!-- Start EVS Thousands -->
    <section class="evs-thousands-wrapper padd mt-0 mt-lg-5">
        <div class="content mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="evs-thousands-left-content">
                            <h2 class="md-heading pb-4">Bridging The Gap Between Clients And Service Providers</h2>
                            @if($training->is_registration_open)
                                <a href="{{ route('app.enrollment.create') }}?enroll_for=training&slug={{ $training->slug }}&is_free=0" class="blue-btn">Apply Now</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="evs-thousands-right-content border-left pl-5">
                            <p class="f-20">The Enablers Services Directory brings a fantastic opportunity for service providers to access a better pool of clients. Bring your brand to light through Enablers Services Directory that will list your brand, offer optimization services and improve its digital presence. All you need to do is to register your brand with Enablers Services Directory and leave the rest to us. Our team will work on your brand and will list it effectively in our directory.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End  EVS Thousands Wrapper -->

    <!--   Start EVS Videos -->
    <section class="evs-videos-wrapper blue-bg padd">
        <div class="content pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="evs-vidoes-heading text-center">
                            <h3 class="md-heading text-white">
                                Why Enabling Video Series
                            </h3>
                            <p class="info-rap text-white">
                                Prepared is me marianne pleasure likewise debating. Wonder an unable except better stairs do
                                ye admire. His secure called esteem praise.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="evs-videos-blocks white-bg h-100 height-auto  p-4">
                            <div class="evs-vd-icon">
                                <img src="{{ _asset('assets-app/img/Enablers-Technical-Skills-icon.png') }}">
                            </div>
                            <h3 class="evs-vd-title">Technical Skills</h3>
                            <p class="info-rap pt-3">Access 100+ skills that are most sort after and will ensure financial freedom.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="evs-videos-blocks white-bg h-100 height-auto  p-4">
                            <div class="evs-vd-icon">
                                <img src="{{ _asset('assets-app/img/Enablers-Learn-icon.png') }}">
                            </div>
                            <h3 class="evs-vd-title">Learn From Experts</h3>
                            <p class="info-rap pt-3">Access 100+ skills that are most sort after and will ensure financial freedom.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="evs-videos-blocks white-bg h-100 height-auto  p-4">
                            <div class="evs-vd-icon">
                                <img src="{{ _asset('assets-app/img/Enablers-Streams-icon.png') }}">
                            </div>
                            <h3 class="evs-vd-title">200+ Income Streams</h3>
                            <p class="info-rap pt-3">Access 100+ skills that are most sort after and will ensure financial freedom.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="evs-videos-blocks white-bg h-100 height-auto  p-4">
                            <div class="evs-vd-icon">
                                <img src="{{ _asset('assets-app/img/Enablers-around-icon.png') }}">
                            </div>
                            <h3 class="evs-vd-title">Free Access around the Globe</h3>
                            <p class="info-rap pt-3">Access 100+ skills that are most sort after and will ensure financial freedom.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End EVS Videos Wrapper -->

    <!--    Start EVS Apply Wrapper -->
    <section class="evs-apply-wrapper position-relative">
        <div class="evs-apply-bg"></div>
        <div class="content padd">
            <div class="container">
                <div class="row">
                    <div class="col-12 py-5">
                        <div class="evs-apply-heading text-center mb-0 mb-lg-5">
                            <h4 class="md-heading text-white">How to apply</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 ml-auto mb-4">
                        <div class="evs-apply-blocks blue-bg h-100 height-auto ">
                            <div class="evs-opt px-5">
                                <span class="evs-opt-head text-uppercase text-white">Option1</span>
                                <span class="evs-opt-bg-free text-uppercase text-white">Free</span>
                            </div>
                            <div class="evs-apply-con p-5">
                                <p class="info-rap text-white py-5">People who have salary 30k less than can apply free by submitting required appropriate documents </p>
                                @if($training->is_registration_open)
                                    <a href="{{ route('app.enrollment.create') }}?enroll_for=training&slug={{ $training->slug }}&is_free=1" class="black-btn">Apply Now</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mr-auto mb-4">
                        <div class="evs-apply-blocks blue-bg h-100 height-auto ">
                            <div class="evs-opt px-5">
                                <span class="evs-opt-head text-uppercase text-white">Option2</span>
                                <span class="evs-opt-bg-paid text-uppercase text-white">paid</span>
                            </div>
                            <div class="evs-apply-con p-5">
                                <p class="info-rap text-white py-5">People who have salary more than 30k and want to purchase this will have to pay $160</p>
                                @if($training->is_registration_open)
                                    <a href="{{ route('app.enrollment.create') }}?enroll_for=training&slug={{ $training->slug }}&is_free=0" class="black-btn">Apply Now</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    End EVS Apply Wrapper -->

    <!--  Start EVS Included Wrapper -->
    <section class="evs-included-wrapper padd">
        <div class="container">
            <div class="row my-5">
                <div class="col-lg-8 mx-auto">
                    <div class="evs-inc-heading text-center">
                        <h5 class="md-heading">WHAT IS INCLUDED IN THE
                            ENABLING VIDEO SERIES (EVS) V3.0
                        </h5>
                        <p class="info-rap mb-0">Prepared is me marianne pleasure likewise debating. Wonder an unable except better stairs do
                            ye admire. His secure called esteem praise.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content grey-bg padd">
            <div class="container">
                <div class="row ">
                @foreach($series as $category)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
                        <div class="evs-inc-blocks white-bg h-100 height-auto  p-5">
                            <h4 class="evs-inc-title text-uppercase mb-0">{{ $category->title }}</h4>
                            <p class="info-rap mb-0 py-5">{{ $category->short_summary }}</p>
                            <a href="{{ route('app.trainings.showCategories',$category->slug) }}" class="blue-btn d-block">Read More</a>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-6 mx-auto text-center my-5">
                        <a href="{{ route('app.trainings.showCategories','categories') }}" class="blue-btn">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End EVS Included Wrapper -->

    <!--  Start EVS Enabling Wrapper -->
    <section class="evs-enabling-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6 mb-4">
                        <div class="evs-enabling-left-content">
                            <img src="{{ _asset('assets-app/img/Enbaling-left-image.png') }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="evs-enabling-right-content">
                            <h4 class="md-heading mb-4">Enabling video series</h4>
                            <p class="info-rap">EVS continues to update and so we will be adding more knowledgeable stuff time to time where it allows people to start their OWN eCommerce Business or offer their service to generate income. EVS tends to be an initiative to greatly accelerate learning endeavors and to empower our fellows.</p>
                            <p class="info-rap mb-4">Enablers believe that talent is equally distributed and if provided with enough support and mentorship can transcend not only our country but the whole world to new levels unforeseen before.</p>
                            @if($training->is_registration_open)
                                <a href="{{ route('app.enrollment.create') }}?enroll_for=training&slug={{ $training->slug }}&is_free=0" class="blue-btn">Apply Now</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End EVS Enabling Wrapper -->

    <!--  Start EVS Poverty Wrapper -->
    <section class="evs-poverty-wrapper padd grey-bg">
        <div class="content pt-lg-0 pt-5">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="evs-poverty-heading">
                            <h5 class="md-heading mb-4">enablers aim to reduce poverty level in Pakistan</h5>
                            <p class="info-rap">The underprivileged class is prevalent in our society and poses a real threat to the development and uplifting of our economy and country as a whole. Enablers believe that talent is equally distributed and if provided with enough support and mentorship can transcend not only our country but the whole world to new levels unforeseen before.</p>
                            <p class="info-rap mb-4">Any of the following conditions needs to be in accordance to get access to Enabling Video Services program</p>
                            @if($training->is_registration_open)
                                <a href="{{ route('app.enrollment.create') }}?enroll_for=training&slug={{ $training->slug }}&is_free=1" class="blue-btn">Apply Now</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End EVS Poverty Wrapper -->
@endsection

@section('scripts')
@endsection
