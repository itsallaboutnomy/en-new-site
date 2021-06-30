@extends('enablers.app.layouts.app')

@section('page-title',' | 404')

@section('styles')
@endsection

@section('content')
    <section class="a-leading-wrapper padd mt-5">
        <div class="content mt-0">
            <div class="container text-center">
                <h1 style="font-size: 15rem;color: #f05c2f;"> Oops!</h1>
                <h2 class="md-heading text-uppercase"> This page could not be found!</h2>
                <p class="error-text">We are sorry. But the page you are looking for is not available.</p>
                <a class="blue-btn mt-10" href="{{ route('app.welcome') }}">Back To Homepage</a>
            </div>
        </div>
    </section>
@endsection
