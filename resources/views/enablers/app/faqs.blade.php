@extends('enablers.app.layouts.app')

@section('page-title'," | FAQ's")

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
                            <h1 class="text-white h-primary text-uppercase">FAQ's</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->

    <!-- Start FAQ Heading Wrapper  -->
    <section class="fq-heading-wrapper padd mt-5">
        <div class="content padd mb-0 mb-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="fq-heading-content">
                            <h2 class="md-heading text-capitalize">frequently asked questions </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQ Heading Wrapper  -->
    <!-- Start FAQ list Wrapper -->
    <section class="fq-list-wrapper grey-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    @foreach($faqs as $faq)
                        <div class="col-lg-12">
                        <div id="accordion" class="mb-4">
                            <div class="card px-4 py-3 mb-4">
                                <div class="fqs-heading-rap" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapseOne">
                                            {{$faq->title}}
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse{{ $faq->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body border-top px-4 py-3 mt-2">
                                        <p class="info-rap">{{ $faq->content }}</p>
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
    <!-- End FAQ list Wrapper -->


@endsection

@section('scripts')
@endsection
