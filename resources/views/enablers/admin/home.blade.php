@extends('enablers.admin.layouts.admin')

@section('content-header')
<div class="col-sm-6">
    <h1>Dashboard</h1>
</div>
<div class="col-sm-6">
{{--    <ol class="breadcrumb float-sm-right">--}}
{{--        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--        <li class="breadcrumb-item"><a href="#">Layout</a></li>--}}
{{--        <li class="breadcrumb-item active">Fixed Layout</li>--}}
{{--    </ol>--}}
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>
                </div>
                <div class="card-body">
                    Start creating your amazing application!
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
