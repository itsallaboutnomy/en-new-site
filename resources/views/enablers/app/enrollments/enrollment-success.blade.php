@extends('enablers.app.layouts.app')

@section('page-title',' | Enrollment Confirmation')

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

                @if($enrollmentFor == 'EVS')
                    <p class="heading">Thank you for submitting an application for Free Access Option to</p>

                    <p class="heading title">Enabling Video Series (EVS)</p>

                    <p class="mt-5">
                        After reviewing all of your provided relevant documents which are being verified,
                        Our Team will be in coordination for providing smooth access process with Login and Password of Enabling Video Series (EVS).
                    </p>

                    <p class="note mt-5">Note: If you do not find the email in your inbox, check your spam or junk folder or you can raise the concern through
                        <br> <span href="{{ route('app.support.index') }}" class="title font-weight-bold">Support Tab</span>
                    </p>
                @elseif($enrollmentFor == 'book')
                    <p class="heading">You Have Successfully Submitted Your Bok Order!</p>


                    <p class="mt-5 mb-5">Your Order Number is: <span class="title font-weight-bold">{{ $uniqueCode }}</span></p>

                    <p class="note mt-5">Note: If you do not find the email in your inbox, check your spam or junk folder or you can raise the concern through
                        <br> <span href="{{ route('app.support.index') }}" class="title font-weight-bold">Support Tab</span>
                    </p>
                @else
                    <p class="heading">Thank you for signing up on Enablers Training Program</p>

                    <p class="heading title">{{ $enrollmentFor }}</p>

                    <p class="mt-5">Bank Account Details has been sent to your registered email address. Please follow the instructions.</p>

                    <p class="mt-5 mb-5">Your Registration Number is: <span class="title font-weight-bold">{{ $uniqueCode }}</span></p>

                    @if($enrollmentChallanUrl)
                    <a href="{{ $enrollmentChallanUrl }}" download="" class="title font-weight-bold">Click Here To Download Your Fee Voucher</a>
                    @endif

                    <p class="note mt-5">Note: If you do not find the email in your inbox, check your spam or junk folder or you can raise the concern through
                        <br> <span href="{{ route('app.support.index') }}" class="title font-weight-bold">Support Tab</span>
                    </p>
                @endif
            </div>
            <div class="col-sm-1 hidden-xs"></div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
