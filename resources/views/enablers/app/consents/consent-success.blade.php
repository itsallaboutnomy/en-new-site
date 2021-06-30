@extends('enablers.app.layouts.app')

@section('page-title',' | Consent Confirmation')

@section('styles')
    <style>
        .anchor {
            color: #f05c2f;
        }
        .anchor:hover {
            color: #1976d2;
            text-decoration: underline;
        }
    </style>
@endsection

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12" style="margin: 15px 0 50px 0;">
                <h1 style="color: #388e3c;font-size: 150px;margin-bottom: 20px;"><i class="far fa-check-circle"></i></h1>

                <h2 style="font-size: 3.5rem;margin-bottom: 30px;color: #f05c2f;">Consent Submitted Successfully</h2>

                <h2 style="font-size: 3rem;margin-bottom: 30px;">After Verifying Your Provided Consent <br> You will get a confirmatory email within 1 working day.</h2>

                <p style="font-size: 2rem;">To stay updated with latest Enablers News, Like and Follow our <a href="https://www.facebook.com/EnablersTeam" target="_blank" rel="noopener noreferrer"> Facebook page </a>
                    also join our <a href="https://www.enablers.org/action/" target="_blank" rel="noopener noreferrer"> Facebook Group </a> for latest updates</p>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
