@extends('enablers.admin.layouts.admin')

@section('page-title','| Services - Edit')

@section('styles')
    <style>
        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: .3s ease;
            background-color: red;
        }
        .overlay:hover {
            opacity: 1;
            background-color: rgb(99 99 99 / 70%);
        }
        .image-remove-icon {
            color: red;
            font-size: 70px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }
        .cancel-adding-image {
            position: absolute;
            margin-top: 7px;
            right: 20px;
        }
    </style>
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit Service</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services List</a></li>
            <li class="breadcrumb-item active">Edit Service</li>
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
                        <h3 class="card-title">Editing Service</h3>
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
                    <form id="services-form" class="form-horizontal" action="{{ route('services.update',$service->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row required">
                                <label for="service_image" class="col-sm-2 col-form-label">Add Service Image </label>
                                <div class="col-sm-3 mr-auto" id="displaying-service-image">
                                    <div class="img-thumbnail">
                                        <img src="{{ _asset($service->service_image_path) }}" class="product-image">
                                        <div class="overlay">
                                            <a href="javascript:void(0)" class="image-remove-icon" title="User Profile"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10" id="adding-service-image" style="display: none">
                                    <a id="cancel-adding-service-image" class="btn btn-xs btn-danger cancel-adding-image"> <i class="fas fa-times"></i> Cancel</a>
                                    <input type="file" name="service_image" id="service_image" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="name" class="col-sm-2 col-form-label">Service Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Service Name" value="{{ old('name') ? old('name') : $service->name }}"/>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="url" class="col-sm-2 col-form-label">Add URL</label>
                                <div class="col-sm-10">
                                    <input type="text" name="url" id="url" class="form-control" placeholder="Service url" value="{{ old('url') ? old('url') : $service->url }}"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="category" class="col-sm-2 col-form-label">Add Category</label>
                                <div class="col-sm-10">
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select Category</option>
                                    <option value="UK Physical Address" {{ $service->category ==  'UK Physical Address' ? 'selected' : '' }}>UK Physical Address</option>
                                    <option value="UK/US Company Formation" {{ $service->category ==  'UK Physical Address' ? 'selected' : '' }}>UK/US Company Formation</option>
                                    <option value="Amazon Account" {{ $service->category ==  'Amazon Account' ? 'selected' : '' }}>Amazon Account</option>
                                    <option value="Product Photography" {{ $service->category ==  'Product Photography' ? 'selected' : '' }}>Product Photography</option>
                                    <option value="Amazon Tools" {{ $service->category ==  'Amazon Tools' ? 'selected' : '' }}>Amazon Tools</option>
                                    <option value="VPS 2GB" {{ $service->category ==  'VPS 2GB' ? 'selected' : '' }}>VPS 2GB</option>
                                    <option value="3 PL Services" {{ $service->category ==  '3 PL Services' ? 'selected' : '' }}>3 PL Services</option>
                                    <option value="VAT/Accountant" {{ $service->category ==  'VAT/Accountant' ? 'selected' : '' }}>VAT/Accountant</option>
                                    <option value="Reinstate Services" {{ $service->category ==  'Reinstate Services' ? 'selected' : '' }}>Reinstate Services</option>
                                    <option value="PPC Expert" {{ $service->category ==  'PPC Expert' ? 'selected' : '' }}>PPC Expert</option>
                                    <option value="Listing Optimization" {{ $service->category ==  'Listing Optimization' ? 'selected' : '' }}>Listing Optimization</option>
                                    <option value="Images" {{ $service->category ==  'Images' ? 'selected' : '' }}>Images</option>
                                    <option value="PayPal" {{ $service->category ==  'PayPal' ? 'selected' : '' }}>PayPal</option>
                                    <option value="Product Research" {{ $service->category ==  'Product Research' ? 'selected' : '' }}>Product Research</option>
                                    <option value="Patent Check" {{ $service->category ==  'Patent Check' ? 'selected' : '' }}>Patent Check</option>
                                    <option value="Trademark" {{ $service->category ==  'Trademark' ? 'selected' : '' }}>Trademark</option>
                                    <option value="Supplier Hunting" {{ $service->category ==  'Supplier Hunting' ? 'selected' : '' }}>Supplier Hunting</option>
                                    <option value="Inspections" {{ $service->category ==  'Inspections' ? 'selected' : '' }}>Inspections</option>
                                    <option value="Sample Consolidation" {{ $service->category ==  'Sample Consolidation' ? 'selected' : '' }}>Sample Consolidation</option>
                                    <option value="Certifications &amp; Lab Test" {{ $service->category ==  'Certifications &amp; Lab Test' ? 'selected' : '' }}>Certifications &amp; Lab Test</option>
                                    <option value="Listing Copywriters" {{ $service->category ==  'Listing Copywriters' ? 'selected' : '' }}>Listing Copywriters</option>
                                    <option value="Domain Registration" {{ $service->category ==  'Domain Registration' ? 'selected' : '' }}>Domain Registration</option>
                                    <option value="Virtual Bank Accounts" {{ $service->category ==  'Virtual Bank Accounts' ? 'selected' : '' }}>Virtual Bank Accounts</option>
                                    <option value="Content Writers" {{ $service->category ==  'Content Writers' ? 'selected' : '' }}>Content Writers</option>
                                    <option value="Freight Forwarding" {{ $service->category ==  'Freight Forwarding' ? 'selected' : '' }}>Freight Forwarding</option>
                                    <option value="Website Development" {{ $service->category ==  'Website Development' ? 'selected' : '' }}>Website Development</option>
                                    <option value="Chatbot Experts" {{ $service->category ==  'Chatbot Experts' ? 'selected' : '' }}>Chatbot Experts</option>
                                    <option value="Influence Marketing" {{ $service->category ==  'Influence Marketing' ? 'selected' : '' }}>Influence Marketing</option>
                                    <option value="FB Ads Experts" {{ $service->category ==  'FB Ads Experts' ? 'selected' : '' }}>FB Ads Experts</option>
                                    <option value="Amazon Store Designing" {{ $service->category ==  'Amazon Store Designing' ? 'selected' : '' }}>Amazon Store Designing</option>
                                    <option value="Enhance Brand Content" {{ $service->category ==  'Enhance Brand Content' ? 'selected' : '' }}>Enhance Brand Content</option>
                                    <option value="Affiliate Link Promotion" {{ $service->category ==  'Affiliate Link Promotion' ? 'selected' : '' }}>Affiliate Link Promotion</option>
                                    <option value="UK/US Physical Sim" {{ $service->category ==  'UK/US Physical Sim' ? 'selected' : '' }}>UK/US Physical Sim</option>
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
@endsection

@section('scripts')
    <script>

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

        //Start Web image section script
        $('#displaying-service-image').click(function (){
            $(this).hide();
            $('#adding-service-image').show();
        });
        $('#cancel-adding-service-image').click(function (){
            $('#displaying-service-image').show();
            $('#adding-service-image').hide();
            $("#service_image").val('');
        })


    </script>
@endsection
