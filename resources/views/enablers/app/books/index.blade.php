@extends('enablers.app.layouts.app')

@section('page-title',' | Books')

@section('styles')
@endsection

@section('content')
    <section class="bk-banner-wrapper  position-relative">
        <div class="bg-bar d-none d-lg-block"></div>
        <div class="container-fuild">
            <div class="row no-gutters align-items-center">
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 animate__animated animate__animated animate__fadeInLeft order-2 order-lg-1 px-5">
                    <div class="bk-left-content px-0 px-md-4 mx-0 mx-md-5 py-4 py-md-0">
                        <h1 class="h-primary">Enablers Publications</h1>
                        <p class="mb-0 py-3">These books give a complete understanding who are in search to make a passive income from International eCommerce. It opened people’s eyes to the possibilities for making an Extra income via eCommerce such as Amazon, eBay etc. It contains every minute detail about the booming eCommerce Market. The eCommerce Market needs the business-minded people with precise knowledge that you can get to either build your own business or offer services</p>
                        <a href="{{ route('app.enrollment.create') }}?enroll_for=book&slug=book" class="blue-btn mt-3">Order Now</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 order-1 order-lg-2">
                    <div class="bk-right-image pr-0 pr-lg-5 text-right">
                        <img src="{{ _asset('assets-app/img/Enablers-book-banner.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End Banner Wrapper -->
    <!--    Start Convenience Wrapper -->
    <section class="bk-convenience-wrapper padd">
        <div class="content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="bk-con-left-content">
                            <div class="bk-convenience-blue blue-bg">
                                <h4 class="md-heading text-white text-capitalize font-weight-light">Read at your convenience</h4>
                                <p class="text-white mb-0">Are you tired of failures? Can’t seem to find good in things? Are you looking to develop a positive attitude towards life by harnessing the power of positive thinking? Then this book is a beacon of hope for you. Addressing everyday problems and offering insights on dealing with them, this book brings an extensive overview of how to develop a positive mindset and becoming happier while progressing forward in life.</p>
                            </div>
                            <div class="bk-con-left-content-01">
                                <h6>What you’ll find in this book:</h6>
                                <ul class="bk-con-list">
                                    <li>Nurturing a positive attitude towards life</li>
                                    <li>Learning to believe in your abilities to gain confidence</li>
                                    <li>Getting rid of negative thoughts</li>
                                    <li>Making realistic goals and measuring your success</li>
                                    <li>Learning how to be grateful and empathetic</li>
                                    <li>Developing relations and gaining trust</li>
                                    <li>Managing anger, faith, and positive mindset</li>
                                </ul>
                                <span class="bk-links"><strong class="bk-price">Rs. 3500</strong>
                                    <a  href="{{ route('app.enrollment.create') }}?enroll_for=book&slug=book" class="blue-btn">Order Now</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="bk-con-right-content">
                            <img src="{{ _asset('assets-app/img/Enablers-convenience-image.png')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    End Convenience Wrapper -->
    <!--    Start Convenience-1 Wrapper -->
    <section class="bk-convenience-wrapper-01 padd">
        <div class="content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 order-2 order-md-1">
                        <div class="bk-con-left-content">
                            <img src="{{ _asset('assets-app/img/Enablers-convenience-image-2.png')}}">
                        </div>
                    </div>
                    <div class="col-lg-7 order-1 order-md-2">
                        <div class="bk-con-right-content">
                            <div class="bk-convenience-org orange-bg">
                                <h4 class="md-heading text-white text-capitalize font-weight-light">Read at your convenience</h4>
                                <p class="text-white mb-0">Are you tired of failures? Can’t seem to find good in things? Are you looking to develop a positive attitude towards life by harnessing the power of positive thinking? Then this book is a beacon of hope for you. Addressing everyday problems and offering insights on dealing with them, this book brings an extensive overview of how to develop a positive mindset and becoming happier while progressing forward in life.</p>
                            </div>
                            <div class="bk-con-right-content-02">
                                <h6>What you’ll find in this book:</h6>
                                <ul class="bk-con-list">
                                    <li>Nurturing a positive attitude towards life</li>
                                    <li>Learning to believe in your abilities to gain confidence</li>
                                    <li>Getting rid of negative thoughts</li>
                                    <li>Making realistic goals and measuring your success</li>
                                    <li>Learning how to be grateful and empathetic</li>
                                    <li>Developing relations and gaining trust</li>
                                    <li>Managing anger, faith, and positive mindset</li>
                                </ul>
                                <span class="bk-links"><strong class="bk-price">Rs. 3500</strong> <a  href="{{ route('app.enrollment.create') }}?enroll_for=book&slug=book" class="blue-btn">Order Now</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    End Convenience Wrapper -->
    <!--   Start Author wrapper -->
    <section class="bk-author-wrapper">
        <div class="content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="bk-author-left-content mb-5 mb-lg-0">
                            <img src="{{ _asset('assets-app/img/Enablers-author-saqib-azhar.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="bk-author-right-content">
                            <h4 class="md-heading text-capitalize font-weight-light">About the Author</h4>
                            <p class="py-3">A British Nationality holder Pakistani having years of experience in Technology, Digital Marketing, and selling physical products in International eCommerce Channels. Saqib Azhar has been selected by the United Nations (UNDP) as one of their Authorized Person to train the youth of Pakistan under the sponsorship of the United Nations. He is CEO and Co-Founder of Enablers, who has worked as a Consultant for companies in the UK, the Middle East, Pakistan, and many other parts of the world. Being a successful Amazon Seller and Entrepreneur, he has helped hundreds of people in building their own eCommerce business.</p>
                            <img class="img-responsive" src="https://www.enablers.org/wp-content/uploads/2020/03/Saqib-Azhar-Signature-150x51.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--   End Author wrapper -->
@endsection

@section('scripts')
@endsection
