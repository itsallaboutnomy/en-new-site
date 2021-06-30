@extends('enablers.admin.layouts.admin')

@section('page-title','| Events - Edit')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit Event</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events List</a></li>
            <li class="breadcrumb-item active">Edit Event</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box start-->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Editing Event</h3>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- form start -->
                    <form id="events-form" class="form-horizontal" action="{{ route('events.update',$event->id) }}" method="POSt" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row required">
                                <label for="order_number" class="col-sm-2 col-form-label">Order Number</label>
                                <div class="col-sm-10">
                                    <input type="number" name="order_number" id="order_number" class="form-control" value="{{ old('order_number') ? old('order_number') : $event->order_number }}" placeholder="Order Number">
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="type" class="col-sm-2 col-form-label">Event Type</label>
                                <div class="col-sm-10">
                                    <select name="type" id="type" class="form-control">
                                        <option value="seminar" {{ $event->type ==  'seminar' ? 'selected' : '' }}>Seminar</option>
                                        <option value="upcoming" {{ $event->type ==  'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="starting_at" class="col-sm-2 col-form-label">Starting At</label>
                                <div class="col-sm-10">
                                    <input type="text" name="starting_at" id="starting_at" class="form-control" placeholder="Start Date" value="@if(old('starting_at')) {{ old('starting_at') }} @elseif($event->starting_at) {{ date('m/d/Y',strtotime($event->starting_at)) }} @endif" />
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="title" class="col-sm-2 col-form-label">Add Event Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Event Title" value="{{ old('title') ? old('title') : $event->title }}"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="key" class="col-sm-2 col-form-label">Add Event Key</label>
                                <div class="col-sm-10">
                                    <input type="text" name="key" id="key" class="form-control text-uppercase" placeholder="Event Key" value="{{ old('key') ? old('key') : $event->key }}"/>
                                </div>
                            </div>
                            <div class="form-group row required" style="{{ $event->type ==  'upcoming' ? '' : 'display:none' }};" id="topic-row">
                                <label for="topic" class="col-sm-2 col-form-label">Add Event Topic</label>
                                <div class="col-sm-10">
                                    <input type="text" name="topic" id="topic" class="form-control" placeholder="Event Topic" value="{{ old('topic') ? old('topic') : $event->topic }}"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="location" class="col-sm-2 col-form-label">Add Event Location</label>
                                <div class="col-sm-10">
                                    <input type="text" name="location" id="location" class="form-control" placeholder="Event Location" value="{{ old('location') ? old('location') : $event->location }}"/>
                                </div>
                            </div>

                            <div class="form-group row required" style="{{ $event->type ==  'seminar' ? '' : 'display:none' }};" id="venue-row">
                                <label for="venue" class="col-sm-2 col-form-label">Add Event Venue</label>
                                <div class="col-sm-10">
                                    <input type="text" name="venue" id="venue" class="form-control" placeholder="Event Venue" value="{{ old('venue') ? old('venue') : $event->venue }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="charging_fee" class="col-sm-2 col-form-label">Add Event Fee</label>
                                <div class="col-sm-10">
                                    <input type="number" name="charging_fee" id="charging_fee" class="form-control" placeholder="Event Fee" value="{{ old('charging_fee') ? old('charging_fee') : $event->charging_fee }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="currency" class="col-sm-2 col-form-label">Choose Fee Currency</label>
                                <div class="col-sm-10">
                                    <select name="currency" id="currency" class="form-control">
                                        <option value="PKR" {{ $event->currency ==  'PKR' ? 'selected' : '' }}>PKR</option>
                                        <option value="USD" {{ $event->currency ==  'USD' ? 'selected' : '' }}>USD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row required" style="{{ $event->type ==  'upcoming' ? '' : 'display:none' }};" id="host-name-row">
                                <label for="host_name" class="col-sm-2 col-form-label">Add Host Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="host_name" id="host_name" class="form-control" placeholder="Host Name" value="{{ old('host_name') ? old('host_name') : $event->host_name }}"/>
                                </div>
                            </div>

                            <div class="form-group row required" style="{{ $event->type ==  'upcoming' ? '' : 'display:none' }};" id="host-designation-row">
                                <label for="host_designation" class="col-sm-2 col-form-label">Add Host Designation</label>
                                <div class="col-sm-10">
                                    <input type="text" name="host_designation" id="host_designation" class="form-control" placeholder="Host Designation" value="{{ old('host_designation') ? old('host_designation') : $event->host_designation }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="short_summary" class="col-sm-2 col-form-label">Short Summary</label>
                                <div class="col-sm-10">
                                    <textarea name="short_summary" id="short_summary" class="form-control" rows="3" placeholder="Short Description Here..." minlength="5" maxlength="190">{{ old('short_summary') ? old('short_summary') : $event->short_summary }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('events.index') }}" class="btn btn-default mr-2">Cancel</a>
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- form end -->
                </div>
                <!-- Default box end-->
            </div>
        </div>
    </div>
@endsection

@section('plugins')
    <script src="{{ _asset('assets-admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endsection

@section('scripts')
    <script>
        let dateTimePickerObject = {
            icons: datetimepickerIcons,
            format: 'L',
        };

        $('#starting_at').datetimepicker(dateTimePickerObject);

        $("#events-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                order_number: {
                    required: true,
                    min: 1,
                    max: 20
                },
                type: {
                    required: true,
                },
                starting_at: {
                    required: false,
                },
                title: {
                    required: true,
                    maxlength: 60
                },
                key: {
                    required: true,
                    minlength: 3,
                    maxlength: 3
                },
                topic: {
                    required: function(element) {
                        return $('#type').val() === '{{ \App\Models\Enablers\Event::$type['upcomingEvent'] }}';
                    },
                    maxlength: 30,
                },
                location: {
                    required: true,
                    maxlength: 60
                },
                venue: {
                    required: function(element) {
                        return $('#type').val() === '{{ \App\Models\Enablers\Event::$type['seminar'] }}';                    },
                    maxlength: 150
                },
                charging_fee: {
                    required: true,
                    min: 0,
                    max: 1000000
                },
                currency: {
                    required: true,
                },
                host_name: {
                    required: function(element) {
                        return $('#type').val() === '{{ \App\Models\Enablers\Event::$type['upcomingEvent'] }}';
                    },
                    maxlength: 30,
                },
                host_designation: {
                    required: function(element) {
                        return $('#type').val() === '{{ \App\Models\Enablers\Event::$type['upcomingEvent'] }}';
                    },
                    maxlength: 30
                },
                short_summary: {
                    maxlength: 190
                }
            }
        });

        $(document).ready(function()
        {
            $("#type").change(function()
            {
                if($(this).val() == "seminar")
                {
                    $("#venue-row").show();

                    $("#topic-row").hide();
                    $("#topic").val('');

                    $("#host-name-row").hide();
                    $("#host-name").val('');

                    $("#host-designation-row").hide();
                    $("#host-designation").val('');
                }
                else
                {
                    $("#venue-row").hide();
                    $("#venue").val('');

                    $("#topic-row").show();
                    $("#host-name-row").show();
                    $("#host-designation-row").show();
                }
            });
        });
    </script>
@endsection
