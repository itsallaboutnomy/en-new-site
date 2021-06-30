@extends('enablers.app.layouts.app')

@section('page-title'," | Upcoming Events")

@section('styles')
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="p-inner" class="e-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 animate__animated animate__animated animate__fadeInLeft">
                        <div class="support-left-content main-headings">
                            <span class="d-block sub-title text-white">Upcoming Events</span>
                            <h1 class="text-white h-primary text-uppercase">What's happening at enablers</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->

    <section class="up-search-wrapper padd">
        <div class="content padd mt-5 mt-lg-0">
            <div class="container mb-5">
                <div class="row mb-5">
                    <div class="col-lg-7 mx-auto">
                        <div class="s-search-content text-center">
                            <h2 class="md-heading">Upcoming Events</h2>
                            <div class="s-search-wrap shadow mt-5">
                                <form id="events-form" class="form-horizontal" action="{{ route('app.upcoming-events') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="query" id="search_events" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    Start Up Events Wrapper -->
    <section class="up-evn-wrapper grey-bg padd">
        <div class="content">
            <div class="container">
                <div class="row align-items-center">
                    @foreach($events as $event)
                    <div class="col-lg-12 animate__animated animate__zoomIn">
                        <div class="card up-evn-block mb-5">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-md-3 col-sm-3 mb-4 mb-md-0">
                                    <div class="e-events-date up-evn-date">
                                        @if($event->starting_at == null)
                                            <h3 class="mb-0 text-uppercase">TBD</h3>
                                        @else
                                            <h3 class="mb-0 text-uppercase">{{ date('d', strtotime($event->starting_at)) }}
                                                <span class="d-block">{{ date('M  Y', strtotime($event->starting_at)) }}</span>
                                            </h3>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-9 col-sm-9 mb-4 mb-md-0">
                                    <h4 class="up-evn-title text-uppercase">{{  $event->title }}</h4>
                                    <strong class="tp-head">Topic: </strong>
                                    <span class="tp-name"> {{ $event->topic }}</span>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-3 mb-4 mb-md-0">
                                    <div class="up-events-time-mode">
                                        <strong class="up-evn-time d-block">{{ date('g:i A', strtotime($event->starting_at)) }}</strong>
                                        <span class="up-evn-mode d-block">{{ ucfirst($event->location) }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-9">
                                    <div class="up-evn-publisher">
                                        <span class="up-publisher-name">{{ $event->host_name }} </span>
                                        <span class="up-publisher-designation">({{ $event->host_designation }})</span>
                                    </div>
                                    <div class="up-evn-enroll text-left text-lg-right pt-4">
                                        <a href="#" class="d-inline-block d-md-block blue-btn" data-toggle="modal" data-target="#event-{{$event->id}}">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="modal fade" id="event-{{$event->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{  $event->title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <span>Date: {{ date('d M  Y', strtotime($event->starting_at)) }}</span>
                                            <span class="float-right">Time: {{ date('g:i A', strtotime($event->starting_at)) }}</span>
                                        </p>
                                        <p>Topic: {{ $event->topic }}</p>
                                        <p>Location: {{  ucfirst($event->location)}}</p>
                                        <p>Host: {{ ucfirst($event->host_name) }}</p>
                                        <p>Summary: {{ ucfirst($event->short_summary) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-end" style="font-size: 18px; margin-right: 63px;">
                {{$events->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </section>
    <!--    End Up Events Wrapper -->


@endsection

@section('scripts')
@endsection
