@extends('enablers.admin.layouts.admin')

@section('page-title','| Vistual Assistant - Add New')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Add New Virtual Assistant</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('virtual-assistants.index') }}">Virtual Assistants List</a></li>
            <li class="breadcrumb-item active">Add New Virtual Assistant</li>
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
                        <h3 class="card-title">Adding Virtual Assistant</h3>
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
                    <form id="virtual-assistants-form" class="form-horizontal" action="{{ route('virtual-assistants.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row required">
                                <label for="name" class="col-sm-2 col-form-label">Virtual Assistant Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name') }}" minlength="3" maxlength="30"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="experience_level" class="col-sm-2 col-form-label">Experience Level</label>
                                <div class="col-sm-10">
                                    <select name="experience_level" id="experience_level" class="form-control">
                                        <option value="beginner">Beginner</option>
                                        <option value="intermediate">Intermediate</option>
                                        <option value="expert">Expert</option>
                                        <option value="master">Master</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="skills" class="col-sm-2 col-form-label">Add VA Skill</label>
                                <div class="col-sm-10">
                                        <select name="skills[]" id="skills" class="form-control select2" multiple="multiple"  data-placeholder="Select Skills" style="width: 100%;">
                                            @foreach($skills as $skill)
                                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="facebook_link" class="col-sm-2 col-form-label">Faceboook Link</label>
                                <div class="col-sm-10">
                                    <input type="text" name="facebook_link" id="facebook_link" class="form-control" placeholder="Faceboook Link" value="{{ old('facebook_link') }}" minlength="3" maxlength="190"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="linkedin_link" class="col-sm-2 col-form-label">Linkedin Link</label>
                                <div class="col-sm-10">
                                    <input type="text" name="linkedin_link" id="linkedin_link" class="form-control" placeholder="Linkedin Link" value="{{ old('linkedin_link') }}" minlength="3" maxlength="190"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Add Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('virtual-assistants.index') }}" class="btn btn-default mr-2">Cancel</a>
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
    <script src="{{ _asset('assets-admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endsection
@section('scripts')
    <script>

        $("#virtual-assistants-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                name: {
                    required: true,
                    maxlength: 60
                },
                experience_level: {
                    required: true,
                },
                'skills[]': {
                    required: true,
                },
                facebook_link: {
                    maxlength: 190
                },
                linkedin_link: {
                    maxlength: 190,
                },
                image: {
                    required: true,
                }

            }
        });
        $('#image').change(function (){
            let inputElement = document.getElementById("image");
            CheckImageDimension(inputElement);
        });
        $(function () {
            //Initialize Select2 Elements
            $('#skills').select2({
                theme: 'bootstrap4',
            })

        })

    </script>
@endsection
