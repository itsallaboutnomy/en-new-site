@extends('enablers.admin.layouts.admin')

@section('page-title','| Training Batches - Edit')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit Training Batch</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('training-batches.index') }}">Training Batches List</a></li>
            <li class="breadcrumb-item active">Edit Training Batch</li>
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
                        <h3 class="card-title">Editing Training Batch</h3>
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
                    <form id="training-batches-form" class="form-horizontal" action="{{ route('training-batches.update',$trainingBatch->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group row required">
                                <label for="training_id" class="col-sm-2 col-form-label">Trainings</label>
                                <div class="col-sm-10">
                                    <select name="training_id" id="training_id" class="form-control"  data-placeholder="Select a training" style="width: 100%;">
                                        @foreach($trainings as $training)
                                            <option value="{{ $training->id }}" {{ $trainingBatch->training_id == $training->id ? 'selected' : '' }}>
                                                {{ $training->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="name" class="col-sm-2 col-form-label">Training Batch Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ? old('name') : $trainingBatch->name }}" placeholder="Training Batch Name" minlength="3" maxlength="100">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('training-batches.index') }}" class="btn btn-default mr-2">Cancel</a>
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
        $("#training-batches").validate({
            errorClass: 'error is-invalid',
            rules: {
                name: {
                    required: true,
                    minlength:3,
                    maxlength: 100
                },
            }
        });

    </script>
@endsection
