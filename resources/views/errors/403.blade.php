@extends('enablers.admin.layouts.admin')

@section('page-title',' | 403')

@section('content')
    <section class="a-leading-wrapper padd mt-5">
        <div class="content mt-0">
            <div class="container text-center">
                <div style="margin-top: 100px;">
                    <img src="{{ _asset('assets-admin/img/oops-img.png') }}">
                </div>
                <h1 class="mb-15">You don't have access to this page.</h1>
                <div style="margin-top: 20px;margin-bottom: 30px;">
                    <img src="{{ _asset('assets-admin/img/403-emoji.png') }}">
                </div>
                <a class="btn btn-xl btn-primary mt-10" href="{{ route('home') }}">Back To Admin Dashboard</a>
            </div>
        </div>
    </section>
@endsection
