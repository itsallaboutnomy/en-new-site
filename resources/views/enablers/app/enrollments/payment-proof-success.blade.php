@extends('enablers.app.layouts.app')

@section('page-title',' | Payment Proof Confirmation')

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
        .success-icon {
            color: #388e3c;
        }
        .success-icon i{
            font-size: 15rem;
        }
    </style>
@endsection

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12" style="margin: 15px 0 50px 0;">
                <div class="success-icon mb-5"><i class="far fa-check-circle"></i></div>

                <p class="heading">Payment Proof Submitted Successfully</p>

                <p class="mt-5">After Verifying Your Provided Payment Proof</p>

                <p class="title mt-3 mb-5">You will get a confirmatory email within 1 working day.</p>

                <p>To stay updated with latest Enablers News, Like and Follow our
                    <a href="https://www.facebook.com/EnablersTeam" target="_blank" rel="noopener noreferrer"> Facebook page </a>
                    also join our
                    <a href="https://www.enablers.org/action/" target="_blank" rel="noopener noreferrer"> Facebook Group </a>
                    for latest updates
                </p>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
