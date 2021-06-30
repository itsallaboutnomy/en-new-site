@extends('enablers.app.layouts.app')

@section('page-title',' | Franchise Application Confirmation')

@section('styles')
    <style>
        .heading {
            font-weight: 700;
            font-size: 3.1rem;
            line-height: 1.2;
        }
        .title {
            color: #f05c2f !important;
        }
        .title:hover {
            color: #1976d2;
            text-decoration: underline;
        }
        .success-icon {
            color: #388e3c;
        }
        .success-icon i{
            font-size: 15rem;
        }
    </style>
@endsection

@section('content')
    <div class="container" align="center">
        <div class="row">
            <div class="col-sm-12">
                <div class="success-icon mb-5"><i class="far fa-check-circle"></i></div>
                <p class="heading">You have Successfully Submitted Your Appointment!</p>

                <p class="mt-5">To stay updated with latest Enablers News, Like and Follow our
                    <a href="https://www.facebook.com/EnablersTeam" target="_blank" rel="noopener noreferrer"> Facebook page </a>
                    also join our
                    <a href="https://www.enablers.org/action/" target="_blank" rel="noopener noreferrer"> Facebook Group </a>
                    for latest updates
                </p>

                <p class="note mt-5">Note: If you have any query you can raise the concern through
                    <br> <span href="{{ route('app.support.index') }}" class="title font-weight-bold">Support Tab</span>
                </p>
            </div>
            <div class="col-sm-1 hidden-xs"></div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
