@extends('enablers.app.layouts.app')

@section('page-title',' | Blogs')

@section('styles')
@endsection

@section('content')
    <!--Start Banner Wrapper-->
    <section id="p-inner" class="cal-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 animate__animated animate__animated animate__fadeInLeft">
                        <div class="cal-left-content main-headings">
                            <h1 class="text-white h-primary text-uppercase">Blogs
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--End Banner Wrapper-->
    <!--Start Jobs wrapper-->
    <section class="bl-blog-wapper padd mt-5">
        <div class="content mt-5">
            <div class="container">
                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-lg-4 mb-4">
                        <div class="card blog-wrapper h-100 height-auto">
                            <img class="card-img-top" src="{{ _asset($blog->blog_image) }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <ul class="pl-0 ml-0">
                                    <li class="meta-author">
                                        <i class="fas fa-user"></i>
                                        <a href="https://www.enablers.org/author/enablers/" title="Posts by Enablers">{{ $blog->author }}</a>
                                    </li>
                                    <li class="meta-date">
                                        <i class="far fa-clock"></i>{{ date('d/m/Y',strtotime($blog->date)) }}
                                    </li>
                                    <li class="meta-cat">
                                        <i class="far fa-folder"></i>
                                        <a href="https://www.enablers.org/category/uncategorized/" rel="category tag">{{ $blog->category }}</a>
                                    </li>
                                </ul>
                                <div class="text ellipsis">
                                 <p class="info-rap mb-0 py-4">{{ \Illuminate\Support\Str::limit($blog->short_summary,135,'...') }}</p>
                                </div>
                                <a href="{{ route('app.blogs.detail' ,$blog->slug)}}" class="blue-btn d-block mb-3">Continue Reading</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--End Jobs wrapper-->
@endsection

@section('scripts')
@endsection
