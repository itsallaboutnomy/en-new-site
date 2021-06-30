@extends('enablers.app.layouts.app')

@section('page-title',' | Developments')

@section('styles')
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="p-inner" class="a-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-12 animate__animated animate__animated animate__fadeInLeft">
                        <div class="about-left-content main-headings">
                            <h1 class="text-white h-primary text-uppercase">We Pursue Excellence To Lay Foundations For Youth Empowerment</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->

    <!--  Stat Our Development wrapper -->
    <section class="dev-our-wrapper padd mt-5">
        <div class="content padd">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dev-heading">
                            <h2 class="md-heading">OUR DEVELOPMENTS</h2>
                            <p class="f-20">Established in 2018, Enablers has continuously been working to make Pakistan a growing eCommerce hub, enabling the youth to build an entrepreneurial mindset</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--   End Our Development wrapper -->

    <!--  Start Developmaent blocks Wrapper -->
    <section class="dev-blocks-wrapper grey-bg padd">
        <div class="content">
            <div class="container">
                <div class="row">
                    @foreach($product as $development)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 mb-5">
                            <div class="card dev-block-content text-center h-100 height-auto">
                                <div class="card-header blue-bg px-3 py-5">
                                    <h4 class="dev-title text-white">{{ $development->title  }}</h4>
                                    <div class="dev-logo">
                                        <img class="w-50" src={{ _asset($development->logo_path)  }}>
                                    </div>
                                </div>
                                <div class="card-body dev-description px-3 py-5">
                                    <p class="f-20 mb-0"> {{ $development->short_summary }} </p>
                                </div>
                                <div class="dev-link pb-5">
                                    <a href="{{ $development->redirect_url }}" class="blue-btn" target="_blank">Find Out More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--  End Developmaent blocks Wrapper -->
@endsection

@section('scripts')
@endsection
