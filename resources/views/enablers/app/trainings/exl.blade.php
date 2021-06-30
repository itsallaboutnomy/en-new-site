@extends('enablers.app.layouts.app')

@section('page-title',' | '.ucwords($training->title))

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
                            <h3 class="md-heading">INTRODUCING PRACTICAL</h3>
                            <h1 class="h-primary text-org">SESSION OF LAUNCH ON AMAZON</h1>
                            <img class="py-5" src="{{ _asset('assets-app/img/exp-icon.jpg') }}">
                            <p class="info-rap mb-4">Enablers Express Launch (EXL) is the step towards the future of eCommerce training. Enablers has launched practical sessions via Zoom for anyone who wants to participate in the practical Live Launch and for those who wants to explore practical aspects of their knowledge.</p>
                            <p class="info-rap">The EXL is specially designed to offer extensive practical and hands-on experience for students who have gone through theoretical parts of EVS training.</p>
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
                            <a href="{{ route('app.enrollment.create') }}?enroll_for=training&slug={{ $training->slug }}" class="orange-btn">Apply Now</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Ready Wrapper -->

    <!-- Start What Wrapper -->
    <section class="tr-what-wrapper grey-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="what-content">
                            <h4 class="md-heading text-org pb-4">What is Enablers Express Launch (EXL)</h4>
                            <p class="info-rap">With hundred of thousands students already a part of Enabling Video Series (EVS), Enablers aims to add at least 5 Lac students more to this program by the end of the year 2023. However, what the team has observed is many students are complaining about the lack of practical insights. Apart from those that were able to successfully launch their products, some failed. Considering the fact, Enablers is now stepping up more than before for helping Enablers’ students. Enablers Express Launch (EXL) is the new initiative that has been introduced by Enablers to show the experience of Live Launch.</p>
                            <i class="d-block py-4"><strong>This EXL is designed ‘by Enablers’ and ‘Enablers will be bearing all of its expenses.” EXL which will be from account opening until Launching to Live one product.</strong></i>
                            <p class="info-rap mb-4">Students will be given some tasks during this launch which will be their hands on practice of actual task which are needed to complete in order to launch one product.</p>
                            <p class="info-rap mb-4">From what the students have learned, mentors for one Launch will test it by giving tasks and assignments for the students to prove their knowledge.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End What Wrapper -->

    <!-- Start Join Wrapper -->
    <section class="tr-join-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="join-content">
                            <h2 class="md-heading text-org">Who can join EXL?</h2>
                            <p class="info-rap mb-5"> This live launch is just for students who are trained and have enough knowledge of Amazon Private Label.</p>
                        </div>
                        <div class="join-content-1 mb-5">
                            <h2 class="md-heading text-org">How can you join?</h2>
                            <strong class="d-block py-4">The Enablers Xpress Launch will contemplate groups that will comprise of no more than 50 students. This is to ensure proper exposure without cramming the sessions. Students will have to go through a screening interview.</strong> <strong class="d-block py-4">The interviewers from the Enablers’ team will decide whether or not the student has grasped theoretical knowledge or not.</strong><strong class="d-block py-4"> Moreover, completing the Private Label FBA video course is also a mandatory requirement for this course in EVS.</strong> <strong class="d-block py-4">A group of 50 students will be assigned a mentor that will lead the launch. From practical knowledge to tasks, including product hunting, etc. will be assigned to the students.</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Join Wrapper -->

    <!-- Start expect Wrapper -->
    <section class="tr-expect-wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="expect-content">
                            <h3 class="md-heading text-org mb-4">What can you expect?</h3>
                            <p class="info-rap mb-4">This EXL is a golden opportunity for two entities:</p>
                            <p class="info-rap mb-5">1. For people/ students that already have launched their products successfully and want to work with Enablers as mentors.</p>
                            <p class="info-rap mb-5">2. Students that have gained theoretical knowledge and want to engage in real live practical sessions.</p>
                            <p class="info-rap mb-5">The EXL practical training sessions via zoom, including product hunting, product launching, etc. Mentors will be selected from Enablers or from a pool of students/people that want to join the program as mentors and become a part of the largest growing eCommerce organization in the country.</p>
                            <hr>
                            <div class="dics-content mb-4">
                                <h3 class="md-heading text-org pt-4">Disclaimer</h3>
                                <strong class="d-block py-4">Before enrolling in the course, the students should be aware of the following terms and conditions:</strong>
                                <ul class="pl-4">
                                    <li>Only 1 product will be launched during the training session of 3 months.</li>
                                    <li>Mentors or Enablers will not be responsible for failure in case of launching the product as that is just to show demonstration.</li>
                                    <li>No revisions will be made after 3 months</li>
                                    <li>Students will have to sign a consent form that will approve of the conditions imposed for this course.</li>
                                    <li>Enablers holds the right to close the launch at any time.</li>
                                    <li>There is no support against this EXL – this is just practical sessions against one launch on Amazon.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End expect Wrapper -->

    <!-- Start build Wrapper -->
    <section class="tr-build-wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ready-content text-center">
                            <h2 class="md-heading text-white text-uppercase mb-5">ENABLERS IS READY TO HELP YOU TO GET PRACTICAL EXPERIENCE!</h2>
                            @if($training->is_registration_open)
                                <a href="{{ route('app.enrollment.create') }}?enroll_for=training&slug={{ $training->slug }}" class="orange-btn">Apply Now</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End build Wrapper -->
@endsection

@section('scripts')
@endsection
