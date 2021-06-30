@extends('enablers.admin.layouts.admin')

@section('page-title','| Services - Add New')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Add New Service</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services List</a></li>
            <li class="breadcrumb-item active">Add New Service</li>
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
                        <h3 class="card-title">Adding Service</h3>
                    </div>
                    <!-- form start -->
                    <form id="services-form" class="form-horizontal" action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row required">
                                <label for="service_image" class="col-sm-2 col-form-label">Service Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="service_image" id="service_image" class="form-control" accept=".jpg, .jpeg, .png"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="name" class="col-sm-2 col-form-label">Service Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Service Name" value="{{ old('name') }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="url" class="col-sm-2 col-form-label">Add URL</label>
                                <div class="col-sm-10">
                                    <input type="text" name="url" id="url" class="form-control" placeholder="Service url" value="{{ old('url') }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="category" class="col-sm-2 col-form-label">Choose Category</label>
                                <div class="col-sm-10">
                                    <select name="category" id="category" class="form-control" data-placeholder="Select Category" style="width: 100%;">
                                        <option value="3 PL Services">3 PL Services</option>
                                        <option value="Amazon Account">Amazon Account</option>
                                        <option value="Affiliate Link Promotion">Affiliate Link Promotion</option>
                                        <option value="Amazon Store Designing">Amazon Store Designing</option>
                                        <option value="Amazon Tools">Amazon Tools</option>
                                        <option value="Company formation in USA">Company formation in USA</option>
                                        <option value="Company formation in UK">Company formation in UK</option>
                                        <option value="Chatbot Experts">Chatbot Experts</option>
                                        <option value="Certifications Lab Test">Certifications Lab Test</option>
                                        <option value="Content Writers">Content Writers</option>
                                        <option value="Domain Registration">Domain Registration</option>
                                        <option value="Enhance Brand Content">Enhance Brand Content</option>
                                        <option value="FB Ads Experts">FB Ads Experts</option>
                                        <option value="Freight Forwarding">Freight Forwarding</option>
                                        <option value="Images">Images</option>
                                        <option value="Influence Marketing">Influence Marketing</option>
                                        <option value="Inspections">Inspections</option>
                                        <option value="Listing Copywriters">Listing Copywriters</option>
                                        <option value="Listing Optimization">Listing Optimization</option>
                                        <option value="Pay Pal">Pay Pal</option>
                                        <option value="PPC Expert">PPC Expert</option>
                                        <option value="Patent Check">Patent Check</option>
                                        <option value="Product Photography">Product Photography</option>
                                        <option value="Product Research">Product Research</option>
                                        <option value="Reinstate Services">Reinstate Services</option>
                                        <option value="Sample Consolidation">Sample Consolidation</option>
                                        <option value="Supplier Hunting">Supplier Hunting</option>
                                        <option value="Trademark">Trademark</option>
                                        <option value="UK/US Physical Sim">UK/US Physical Sim</option>
                                        <option value="VPS 2GB">VPS 2GB</option>
                                        <option value="Virtual Bank Accounts">Virtual Bank Accounts</option>
                                        <option value="UK Physical Address">UK Physical Address</option>
                                        <option value="UK/US Company Formation">UK/US Company Formation</option>
                                        <option value="VAT/Accountant">VAT/Accountant</option>
                                        <option value="Website Development">Website Development</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('services.index') }}" class="btn btn-default mr-2">Cancel</a>
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
    <script src="{{ _asset('assets-admin/plugins/select2/js/select2.full.min.js') }}"></script>
@endsection

@section('scripts')
    <script>

        $('#category').select2({
            theme: 'bootstrap4'
        });

        $("#services-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                service_image: {
                    required: true,
                },
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 60
                },
                url: {
                    required: true,
                    minlength: 2,
                    maxlength: 150
                },
                category: {
                    required: true,
                }
            }
        });

        $('#service_image').change(function (){
            let inputElement = document.getElementById("service_image");
            CheckImageDimension(inputElement);
        });
    </script>
@endsection
