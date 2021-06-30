@extends('enablers.admin.layouts.admin')

@section('page-title', '|'. $supportRequest->request_type)

@section('styles')
    <style>
        .info-wrap li {
            border-bottom: 0.1rem solid #ccc;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 0.4rem 0;
            margin-bottom: 0.5rem;
        }
        .dropdown-toggle::after {
            display: none;

        }
    </style>
@endsection
@section('content-header')
    <div class="col-sm-6">
        <h1>{{ $supportRequest->request_type }} details</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('va-request.index') }}"> Support Request List</a></li>
            <li class="breadcrumb-item active"> {{ $supportRequest->request_type }} details</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                <!-- Enrolled User Info-->
                <div class="card h-100">
                    <div class="card-header">
                        <h4>{{ $supportRequest->request_type }} info</h4>
                    </div>
                    <div class="card-body info-wrap">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="ml-0 pl-0">
                                    <li> <label>Name: </label> {{ $supportRequest->name }}</li>
                                    <li> <label>Email Address: </label> {{ $supportRequest->email }}</li>
                                    <li> <label>Request for: </label> {{ $supportRequest->request_for ?  $supportRequest->request_for: 'N/A'  }}</li>
                                    <li> <label>Training: </label> {{ $supportRequest->training ? $supportRequest->training->title :'N/A' }}</li>
                                    <li> <label>No.Of Classes: </label> {{ $supportRequest->no_of_classes ? $supportRequest->no_of_classes : 'N/A' }}</li>
                                    <li> <label>Event: </label> {{ $supportRequest->event ? $supportRequest->event->title : 'N/A' }}</li>

                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="ml-0 pl-0">

                                    <li> <label>Date: </label> {{ date('D d M, Y',strtotime($supportRequest->date)) }}</li>
                                    <li> <label>Contact Number: </label> {{ $supportRequest->phone }}</li>
                                    <li> <label>Trainer: </label> {{ $supportRequest->trainer ? $supportRequest->trainer->name : 'N/A' }}</li>
                                    <li> <label>Batch: </label> {{ $supportRequest->batch ?  $supportRequest->batch->name :'N/A'  }}</li>
                                    <li> <label>Fee: </label> {{ $supportRequest->fee ? $supportRequest->fee : 'N/A'  }}</li>
                                    <li> <label>Description: </label> {{ $supportRequest->description }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
