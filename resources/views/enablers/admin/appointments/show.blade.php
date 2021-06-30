@extends('enablers.admin.layouts.admin')

@section('page-title','| Appointment Details')

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
        <h1>Appointment Details</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('appointments.index') }}">Appointment List</a></li>
            <li class="breadcrumb-item active">Appointment Details</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                <!-- Enrolled User Info-->
                <div class="card h-100">
                    <div class="card-header">
                        <h4>Appointment Info</h4>
                    </div>
                    <div class="card-body info-wrap">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="ml-0 pl-0">
                                    <li> <label>Name: </label> {{ $appointment->full_name }}</li>
                                    <li> <label>Email: </label> {{ $appointment->email }}</li>
                                    <li> <label>Mobile: </label> {{ $appointment->phone }}</li>
                                    <li> <label>Office: </label> {{ $appointment->office }}</li>
                                    <li> <label>Appointment Time: </label> {{ $appointment->appointment_time }}</li>
                                    <li> <label>Appointment Date: </label> {{ date('D d M, Y',strtotime($appointment->appointment_date)) }}</li>
                                    <li> <label>Visit Pupose: </label> {{ $appointment->purpose_visit }}</li>
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
