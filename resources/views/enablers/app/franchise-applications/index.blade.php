@extends('enablers.app.layouts.app')

@section('page-title',' | Franchise')

@section('styles')
@endsection

@section('content')
    <!--Start Banner Wrapper-->
    <section id="p-inner" class="scl-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-12 animate__animated animate__animated animate__fadeInLeft">
                        <div class="cal-left-content main-headings">
                            <h1 class="text-white h-primary text-uppercase">enablers school/college franchise
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--End Banner Wrapper-->

    <!--Start School Icons Wrapper-->
    <section class="scl-icons-wrapper padd">
        <div class="content mt-5">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 animate__animated animate__zoomIn">
                        <div class="scl-icons-block text-center h-100 height-auto">
                            <div class="scl-icon">
                                <img src="{{ _asset('assets-app/img/Enablers-vocational-icon.png' ) }}">
                            </div>
                            <h6 class="mb-0 text-uppercase">Vocational Orientation</h6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 animate__animated animate__zoomIn">
                        <div class="scl-icons-block text-center h-100 height-auto">
                            <div class="scl-icon">
                                <img src="{{ _asset('assets-app/img/Enablers-supplementary-icon.png' ) }}">
                            </div>
                            <h6 class="mb-0 text-uppercase">Supplementary Education</h6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 animate__animated animate__zoomIn">
                        <div class="scl-icons-block text-center h-100 height-auto">
                            <div class="scl-icon">
                                <img src="{{ _asset('assets-app/img/Enablers-subject-icon.png' ) }}">
                            </div>
                            <h6 class="mb-0 text-uppercase">Support with Core Subjects</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End School Icons Wrapper-->

    <!--Start School Overarching Wrapper-->
    <section class="scl-overarching-wrapper padd">
        <div class="content">
            <div class="container blue-bg">
                <div class="row no-gutters  align-items-center">
                    <div class="col-lg-7">
                        <div class="scl-overarching-left-content py-5 px-3 px-md-5">
                            <h3 class="md-heading text-white mb-0 pb-4">Overarching Vision</h3>
                            <p class="info-rap text-white mb-5">To promote an innovative and creative educational experience for the student enablement with potential learning strategies giving them a solid foundation to build on.</p>
                            <h3 class="md-heading text-white mb-0 pb-4">Mission Statement</h3>
                            <p class="info-rap text-white mb-0">Our mission is to pursue higher standards of education to empower the students with top-notch, superlative, comprehensive and high-level knowledge by providing them a supportive, inclusive and stimulating educational environment which will enable them to surpass and transcend in all fields as independent long-life learners. We aim to ensure that our students embrace learning, based on a broad and balanced curriculum.</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="scl-overarching-right-content">
                            <img src="{{ _asset('assets-app/img/Enablers-overarching-image.png' ) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End School Overarching Wrapper-->

    <!-- Start School Qualities Wrapper -->
    <section class="scl-qualities-wrapper padd">
        <div class="contnet">
            <div class="container">
                <div class="row align-items-center mb-0 mb-lg-5">
                    <div class="col-lg-4">
                        <div class="scl-qualities-left-content">
                            <h4 class="md-heading py-5 mb-0">QUALITIES WE LOOK FOR IN OUR FRANCHISEE</h4>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="scl-qualities-right-content border-left pl-0 pl-md-5">
                            <ol>
                                <li>An educated citizen who comprehends the significance of quality education.</li>
                                <li>Retired/Serving principals, Professors, Academics, Civil or Military Officers and seasoned professionals with a vision for educational excellence.</li>
                                <li>Expatriates who are interested in establishing their own business in Pakistan.</li>
                                <li>Existing institutes/ tuition centers operative at large scale interested in converting their campuses into Enablers Educational Institution.</li>
                                <li>Property owners who are interested in utilizing their property for a profitable business.</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center my-0 my-lg-5 padd">
                    <div class="col-lg-4">
                        <div class="scl-qualities-left-content">
                            <h4 class="md-heading py-5 mb-0">ADVANTAGES OF BEING ENABLERS FRANCHISEE</h4>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="scl-qualities-right-content border-left pl-0 pl-md-5">
                            <ol>
                                <li>Higher rate of success than independent startups with an affordable investment plan, lower financial risk and feasibility assistance.</li>
                                <li>Effective systems and controls facilitated by manuals and Standardized Operational Procedures (SOP).</li>
                                <li>Backing of a strong corporate entity with a reputable background in the education sector.</li>
                                <li>Access to modern-day pedagogical strategies and ongoing research and development.</li>
                                <li>Enhanced social status as an educational entrepreneur.</li>
                                <li>Opportunity to expand your institution due to ever-increasing demand for good schools and colleges.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start School Qualities Wrapper -->

    <!-- Start School Franchise Wrapper -->
    <section class="scl-franchise-wrapper padd grey-bg">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="scl-franchise-heading text-center">
                            <h4 class="md-heading">Franchise Options</h4>
                        </div>
                    </div>
                    <div class="col-12 mt-0 mt-md-5">
                        <ol class="scl-franchise-list mt-5">
                            <li><h4 class="franchise-title">Joint Venture Model</h4>
                                <div class="row mt-5 mb-5">
                                    <div class="col-lg-5 mb-4 mr-auto">
                                        <div class="card franchise-block blue-bg h-100 height-auto p-5">
                                            <h5 class="franchise-block-tile text-white text-center">Option # 1 </h5>
                                            <p class="info-rap text-white py-5">Enablers will contribute 20% of the total amount with the Franchisee in the operational cost. Similarly, Enablers will be 20% shareholder in total generated revenue other than Royalty. </p>
                                            <a href="{{route('app.franchise.application.create')}}" class="black-btn">apply now</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 mb-4 mr-auto">
                                        <div class="card franchise-block blue-bg h-100 height-auto p-5">
                                            <h5 class="franchise-block-tile text-white text-center">Option # 2 </h5>
                                            <p class="info-rap text-white py-5">Enablers will contribute 50% of the total amount with the Franchisee in the operational cost (with the administration rights) and 50% shareholder in the revenue other than Royalty.</p>
                                            <a href="{{route('app.franchise.application.create')}}" class="black-btn">apply now</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><h4 class="franchise-title">Franchisee Model:</h4>
                                <div class="row mt-5 mb-5">
                                    <div class="col-12">
                                        <div class="card scl-fr-model white-bg border-0 py-5 px-5">
                                            <p class="info-rap">Administration rights will be given to the franchisee and Enablers will take the royalty on Gross Revenue (Depending upon the number of students). </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><h4 class="franchise-title">Franchisee Model:</h4>
                                <div class="row mt-5 mb-5">
                                    <div class="col-12">
                                        <div class="card scl-fr-model white-bg border-0 py-5 px-5">
                                            <p class="info-rap">Master Franchisor will hand over the control of franchising operations in a specific city or a specific region. </p>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start School Franchise Wrapper -->
    <section class="scl-colage-wrapper">
        <div class="content">
            <div class="scl-img">
                <img class="w-100" src="{{ _asset('assets-app/img/Enbalers-school-colages-image.png') }}">
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
