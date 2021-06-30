@extends('enablers.app.layouts.app')

@section('page-title',' | EVS Videos')

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

    <!--  Start EVS Included Wrapper -->
    <section class="evs-included-wrapper padd">
        <div class="content padd mb-5">
            <div class="container">
                <div class="row my-5">
                    <div class="col-lg-8 mx-auto">
                        <div class="evs-inc-heading text-center">
                            @if(isset($category))
                            <h2 class="md-heading">{{ $category->title }}</h2>
                            <p class="info-rap mb-5">{{ $category->short_summary }}</p>
                            <a href="{{ route('app.trainings.showCategories','categories') }}" class="blue-btn d-block">Back to All Categories</a>
                            @else
                            <h2 class="md-heading">EVS Categories</h2>
                            <p class="info-rap mb-0">Here is summary...</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content grey-bg padd">
            <div class="container">
                <div class="row">
                    @if(isset($category))
                        @forelse($category->videos as $video)
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
                                <div class="evs-inc-blocks white-bg h-100 height-auto  p-5">
                                    <h4 class="evs-inc-title text-uppercase mb-0">{{ $video->title }}</h4>
                                    <p class="info-rap mb-0 py-5">{{ $video->short_summary }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                                <div class="evs-inc-blocks white-bg h-100 height-auto  p-5">
                                    <h4 class="evs-inc-title text-uppercase mb-0 text-center">Coming Soon ...</h4>
                                </div>
                            </div>
                        @endforelse
                    @else
                        @foreach($categories as $category)
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
                                <div class="evs-inc-blocks white-bg h-100 height-auto  p-5">
                                    <h4 class="evs-inc-title text-uppercase mb-0">{{ $category->title }}</h4>
                                    <p class="info-rap mb-0 py-5">{{ $category->short_summary }}</p>
                                    <a href="{{ route('app.trainings.showCategories',$category->slug) }}" class="blue-btn d-block">Read More</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--  End EVS Included Wrapper -->

@endsection

@section('scripts')
@endsection
