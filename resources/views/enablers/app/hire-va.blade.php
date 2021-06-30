@extends('enablers.app.layouts.app')

@section('page-title',' | Hire A VA')

@section('styles')
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="p-inner" class="hr-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 animate__animated animate__animated animate__fadeInLeft">
                        <div class="support-left-content main-headings">
                            <span class="d-block sub-title text-white">We Help Busy Professionals Get More Done.</span>
                            <h1 class="text-white h-primary text-uppercase">Task Management for work and life</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->

    <!-- Start Hire simplest wrapper -->
    <section class="hr-simplest-wrapper padd mt-5">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 animate__animated animate__zoomIn">
                        <div class="hr-simp-box text-center">
                            <img src="{{ _asset('assets-app/img/Enablers-select-services-icon.png') }}">
                            <span class="d-block">SELECT SERVICES</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 animate__animated animate__zoomIn">
                        <div class="hr-simp-box text-center">
                            <img src="{{ _asset('assets-app/img/Enbalers-delegate-tasks-icon.png') }}">
                            <span class="d-block">DELEGATE TASKS</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 animate__animated animate__zoomIn">
                        <div class="hr-simp-box text-center hr-simp-bdr">
                            <img src="{{ _asset('assets-app/img/Enbalers-accomplish-more-icon.png') }}">
                            <span class="d-block">ACCOMPLISH MORE</span>
                        </div>
                    </div>
                    <div class="col-lg-12 my-5">
                        <p class="info-rap text-danger border p-4"><b>Disclaimer:</b> We attempt to provide you this platform to make connections and ease you any inconvenience of finding expert VAs. However, Enablers do not take any responsibility for your interactions with the following personnel. You are solely responsible for your interactions with them and Enablers takes no liability for any harm resulting from your interactions with them. We reserve the right but have no obligation to monitor these connections.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hire simplest wrapper -->

    <!--   Start Hire Block Wrapper -->
    <section class="hr-block-wrapper padd grey-bg">
        <div class="content">
            <div class="container">
                <form id="hire-va-form" class="form-horizontal" action="{{ route('app.hire-va') }}" method="GET">
                    <div class="row my-5">
                        <div class="col-lg-5 mb-5">
                            <div class="hr-skills-rap input-group align-items-center">
                                <label class="d-block d-lg-inline-block" for="experience">Experience:</label>
                                <select name="experience" id="experience" class="form-control">
                                    <option value="">All</option>
                                    <option value="beginner"  {{ request()->get('experience') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                    <option value="intermediate" {{ request()->get('experience') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                    <option value="master" {{ request()->get('experience') == 'master' ? 'selected' : '' }}>Master</option>
                                    <option value="expert" {{ request()->get('experience') == 'expert' ? 'selected' : '' }}>Expert</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-5">
                            <div class="hr-services-rap input-group align-items-center pr-0 pr-md-5">
                                <label for="skill">Skill:</label>
                                <select name="skill" id="skill" class="form-control">
                                    <option value="">All</option>
                                    @foreach($skills as $skill)
                                        <option value="{{ $skill->id }}" {{ request()->get('skill') == $skill->id ? 'selected' : '' }}>{{ $skill->name }}</option>
                                    @endforeach
                                    {{--                                    <option value="Amazon Account Manager">Amazon Account Manager</option>--}}
                                    {{--                                    <option value="Product Launch Rank">Product Launch Rank</option>--}}
                                    {{--                                    <option value="A+ Content Manager">A+ Content Manager</option>--}}
                                    {{--                                    <option value="PPC Manager">PPC Manager</option>--}}
                                    {{--                                    <option value="Listing Creation Optimization">Listing Creation Optimization</option>--}}
                                    {{--                                    <option value="Dropshipping Assistant">Dropshipping Assistant</option>--}}
                                    {{--                                    <option value="StoreFront Designer">StoreFront Designer</option>--}}
                                    {{--                                    <option value="Product Hunting">Product Hunting</option>--}}
                                    {{--                                    <option value="Reviews Builder">Reviews Builder</option>--}}
                                    {{--                                    <option value="Image Designing ">Image Designing </option>--}}
                                    {{--                                    <option value="Product Hunting">Product Hunting</option>--}}
                                    {{--                                    <option value="Wholesale FBA Manager">Wholesale FBA Manager</option>--}}
                                    {{--                                    <option value="Dead Listings Hunter">Dead Listings Hunter</option>--}}
                                    {{--                                    <option value="Shopify Manager">Shopify Manager</option>--}}
                                    {{--                                    <option value="EBay Account Manager">EBay Account Manager</option>--}}
                                    {{--                                    <option value="FBM Orders Management">FBM Orders Management</option>--}}
                                    {{--                                    <option value="Product Photography">Product Photography</option>--}}
                                    {{--                                    <option value="Product Research">Product Research</option>--}}
                                    {{--                                    <option value="Keywords Research">Keywords Research</option>--}}
                                    {{--                                    <option value="Social Media Marketing">Social Media Marketing</option>--}}
                                    {{--                                    <option value="Product Sourcing">Product Sourcing</option>--}}
                                    {{--                                    <option value="Website Development">Website Development</option>--}}
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-info" style="width: 100%;height: 45px;font-size: 23px;background-color: #f05c2f;">Filter</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row padd">
                    @foreach($assistants as $assistant)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card skil-ser-box py-5 px-4 h-100 height-auto">
                                <div class="skil-sec row">
                                    <div class="col-4 hr-va-icon mb-4">
                                        <img class="rounded-circle" src="{{ _asset($assistant->img_path) }}">
                                    </div>
                                    <div class="col-8 hr-va-content mb-4">
                                        <h3 class="hr-va-name">{{ $assistant->name }}</h3>
                                        <span class="hr-va-designation">Virtual Assistant</span>
                                        <div class="hr-va-level clearfix">
                                    <span class="hr-va-level-text hr-va-ex">
                                    <img width="18px" class="mr-2" src="{{ _asset('assets-app/img/Enbalers-va-expert-icon.png') }}" alt="">{{ ucfirst($assistant->experience_level) }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 hr-skills-prov py-4">
                                        <span class="hr-va-approved"><img src="{{ _asset('assets-app/img/Enbalers-va-approved-icon.png') }}"> APPROVED BY ENABLERS</span>
                                    </div>
                                    <div class="col-12 hr-va-tags border-top pt-4 pb-5 mb-5">
                                        <label>Skills:</label>
                                        <div class="hr-va-tag-list pb-5 mb-5">
                                            @foreach($assistant->skills as $skill)
                                                <span class="tag-item">{{ $skill->name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="hr-va-social text-right">
                                    <span>
                                    @if($assistant->facebook_link)
                                         <a class="pr-3" href="{{ $assistant->facebook_link }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-square"></i></a>
                                    @endif
                                    @if($assistant->linkedin_link)
                                         <a href="{{ $assistant->linkedin_link }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin"></i></a>
                                    @endif
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="d-flex justify-content-end" style="font-size: 18px; margin-right: 63px;">
                {{$assistants->withQueryString()->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </section>
    <!--   End Hire Block Wrapper -->

    <!--  Start Contact Wrapper -->
    <section class="hr-va-contact-wrapper blue-bg padd">
        <div class="content mb-0 mb-md-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h6 class="md-heading text-white pb-4">Hire Top Virtual Assistants</h6>
                        <p class="info-rap text-white pb-0 mb-0">Please Contact Us:</p>
                        <strong class="info-rap text-white">
                            <a href="tel:+9242 - 111 123 111" class="text-white d-block pb-4">+9242 - 111 123 111 </a>
                            <a href="mailto:info@enablers.org" class="text-white">info@enablers.org</a>
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Wrapper -->

    <!-- Start VA Become Wrapper -->
    <section class="hr-va-become-wrapper padd">
        <div class="content padd">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hr-va-become-content text-center">
                            <h3 class="md-heading mb-5">BECOME A VIRTUAL ASSISTANT WE ARE READY TO HELP YOU!</h3>
                            <a href="{{ route('app.va-request.create') }}" class="blue-btn mb-0 mb-lg-4">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End VA Become Wrapper -->
@endsection

@section('scripts')
    <script>

    </script>
@endsection
