@extends('enablers.admin.layouts.admin')

@section('page-title','| Virtual Assistants - Edit')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <style>

        .image-remove-icon {
            color: red;
            font-size: 100px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }
        #cancel-add-image {
            position: absolute;
            margin-top: 7px;
            right: 20px;
        }
    </style>
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit Virtual Assistant</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('virtual-assistants.index') }}">Virtual Assistants List</a></li>
            <li class="breadcrumb-item active">Edit Virtual Assistants</li>
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
                        <h3 class="card-title">Editing Virtual Assistant</h3>
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
                    <form id="virtual-assistants-form" class="form-horizontal" action="{{ route('virtual-assistants.update',$virtualAssistant->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group row required">
                                <label for="name" class="col-sm-2 col-form-label">Virtual Assistant Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ? old('name') : $virtualAssistant->name }}" placeholder="Name" minlength="3" maxlength="30">
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="experience_level" class="col-sm-2 col-form-label">Experience Level</label>
                                <div class="col-sm-10">
                                    <select name="experience_level" id="experience_level" class="form-control">
                                        <option value="beginner" {{ $virtualAssistant->experience_level ==  'beginner' ? 'selected' : '' }}>Beginner</option>
                                        <option value="intermediate" {{ $virtualAssistant->experience_level ==  'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                        <option value="expert" {{ $virtualAssistant->experience_level ==  'expert' ? 'selected' : '' }}>Expert</option>
                                        <option value="master" {{ $virtualAssistant->experience_level ==  'master' ? 'selected' : '' }}>Master</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="va_skill" class="col-sm-2 col-form-label">Add VA Skill</label>
                                <div class="col-sm-10">
                                    <select name="skills[]" id="skills" class="form-control" multiple="multiple" data-placeholder="Select Skills">
                                        @foreach($skills as $skill)
                                            <option value="{{ $skill->id }}">
                                                {{ $skill->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="facebook_link" class="col-sm-2 col-form-label">Faceboook Link</label>
                                <div class="col-sm-10">
                                    <input type="text" name="facebook_link" id="facebook_link" class="form-control" placeholder="Faceboook Link" value="{{ old('facebook_link') ? old('facebook_link') : $virtualAssistant->facebook_link }}" minlength="3" maxlength="190"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="linkedin_link" class="col-sm-2 col-form-label">Linkedin Link</label>
                                <div class="col-sm-10">
                                    <input type="text" name="linkedin_link" id="linkedin_link" class="form-control" placeholder="Faceboook Link" value="{{ old('linkedin_link') ? old('linkedin_link') : $virtualAssistant->linkedin_link }}" minlength="3" maxlength="190"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Add Image</label>

                                <div class="col-sm-3" id="display-image" style="{{ !\File::exists($virtualAssistant->img_path) ? 'display: none' : '' }}">
                                    <div class="img-thumbnail">
                                        <img src="{{ _asset($virtualAssistant->img_path) }}" class="product-image">
                                        <div class="overlay">
                                            <a href="javascript:void(0)" class="image-remove-icon" title="User Profile"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10" id="add-image" style="{{ !\File::exists($virtualAssistant->img_path) ? '' : 'display: none' }}">
                                    <a id="cancel-add-image" class="btn btn-xs btn-danger" style="{{ !\File::exists($virtualAssistant->img_path) ? 'display: none' : '' }}"> <i class="fas fa-times"></i> Cancel</a>
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
    <script src="{{ _asset('assets-admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endsection

@section('scripts')
    <script>
        $(function () {
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
                    'skills[]':{
                        required:true
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
            $('#web_image').change(function (){
            let inputElement = document.getElementById("image");
            CheckImageDimension(inputElement);
        });
        $('#display-image').click(function (){
            $(this).hide();
            $('#add-image').show();
        });
        $('#cancel-add-image').click(function (){
            $('#display-image').show();
            $('#add-image').hide();
            $("#image").val('');
        });
            $('#skills').select2({
                theme: 'bootstrap4',
            }).val({{ $vaSkillIds }}).trigger('change');
        });
    </script>
@endsection
