@extends('enablers.app.layouts.app')

@section('page-title',' | Service Requests')

@section('styles')
<style>
        .invalid-feedback {
            font-size: 15px;
        }
    </style>
@endsection

@section('content')
    <!-- Start Banner Wrapper -->
    <section id="p-inner" class="fr-banner-wrapper pr-4 pr-lg-5">
        <div class="header__moore animate__animated animate__animated animate__rotateInDownLeft d-none d-lg-block">
            <a href="">
                <button class="header__moore__btn">
                    <span class="header__moore__text p-event-none text-uppercase">more</span>
                    <span class="bar-wrapper bar-wrapper--down p-event-none">
<span class="bar-whitespace p-event-none">
<span class="bar-line bar-line-down p-event-none"></span>
</span>
</span>
                </button>
            </a>
        </div>
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 animate__animated animate__animated animate__fadeInLeft">
                        <div class="fr-left-content main-headings">
                            <h1 class="text-white h-primary text-uppercase">SERVICES DIRECTORY</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!-- End Banner Wrapper -->

    <!-- Start Form wrapper -->
    <section class="fr-forms-wrapper padd mt-5">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="fr-heading">
                            <h6 class="">
                                Kindly fill the form below to be register yourself
                            </h6>
                        </div>
                    </div>
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
                <form method="POST" action="{{ route('app.services-enrolment.store') }}">
                    @csrf
                    <div class="row my-5">
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="name" class="label">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter your full name">
                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="email" class="label">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter your email address">
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="phone" class="label">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Enter your phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="cnic" class="label">CNIC</label>
                                <input type="text" name="cnic" id="cnic" class="form-control @error('cnic') is-invalid @enderror" value="{{ old('cnic') }}" placeholder="Enter your Contact Number">
                                @error('cnic')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="service" class="label">Select Your Service</label>
                                <select name="service" id="service" class="form-control  @error('service') is-invalid @enderror">
                                    <option value="">Select</option>
                                    <option value="UK Physical Address" {{ old('service') == 'UK Physical Address' ? 'selected' : '' }}>UK Physical Address</option>
                                    <option value="UK/US Company Formation" {{ old('service') == 'UK/US Company Formation' ? 'selected' : '' }}>UK/US Company Formation</option>
                                    <option value="Amazon Account" {{ old('service') == 'Amazon Account' ? 'selected' : '' }}>Amazon Account</option>
                                    <option value="Product Photography" {{ old('service') == 'Product Photography' ? 'selected' : '' }}>Product Photography</option>
                                    <option value="Amazon Tools" {{ old('service') == 'Amazon Tools' ? 'selected' : '' }}>Amazon Tools</option>
                                    <option value="VPS 2GB" {{ old('service') == 'VPS 2GB' ? 'selected' : '' }}>VPS 2GB</option>
                                    <option value="3 PL Services" {{ old('service') == '3 PL Services' ? 'selected' : '' }}>3 PL Services</option>
                                    <option value="VAT/Accountant" {{ old('service') == 'VAT/Accountant' ? 'selected' : '' }}>VAT/Accountant</option>
                                    <option value="Reinstate Services" {{ old('service') == 'Reinstate Services' ? 'selected' : '' }}>Reinstate Services</option>
                                    <option value="PPC Expert" {{ old('service') == 'PPC Expert' ? 'selected' : '' }}>PPC Expert</option>
                                    <option value="Listing Optimization" {{ old('service') == 'Listing Optimization' ? 'selected' : '' }}>Listing Optimization</option>
                                    <option value="Images" {{ old('service') == 'Images' ? 'selected' : '' }}>Images</option>
                                    <option value="Pay Pal" {{ old('service') == 'Pay Pal' ? 'selected' : '' }}>Pay Pal</option>
                                    <option value="Product Research" {{ old('service') == 'Product Research' ? 'selected' : '' }}>Product Research</option>
                                    <option value="Patent Check" {{ old('service') == 'Patent Check' ? 'selected' : '' }}>Patent Check</option>
                                    <option value="Trademark" {{ old('service') == 'Trademark' ? 'selected' : '' }}>Trademark</option>
                                    <option value="Supplier Hunting" {{ old('service') == 'Supplier Hunting' ? 'selected' : '' }}>Supplier Hunting</option>
                                    <option value="Inspections" {{ old('service') == 'Inspections' ? 'selected' : '' }}>Inspections</option>
                                    <option value="Sample Consolidation" {{ old('service') == 'Sample Consolidation' ? 'selected' : '' }}>Sample Consolidation</option>
                                    <option value="Certifications and Lab Test" {{ old('service') == 'Certifications and Lab Test' ? 'selected' : '' }}>Certifications &amp; Lab Test</option>
                                    <option value="Listing Copywriters" {{ old('service') == 'Listing Copywriters' ? 'selected' : '' }}>Listing Copywriters</option>
                                    <option value="Domain Registration" {{ old('service') == 'Domain Registration' ? 'selected' : '' }}>Domain Registration</option>
                                    <option value="Virtual Bank Accounts" {{ old('service') == 'Virtual Bank Accounts' ? 'selected' : '' }}>Virtual Bank Accounts</option>
                                    <option value="Content Writers" {{ old('service') == 'Content Writers' ? 'selected' : '' }}>Content Writers</option>
                                    <option value="Freight Forwarding" {{ old('service') == 'Freight Forwarding' ? 'selected' : '' }}>Freight Forwarding</option>
                                    <option value="Website Development" {{ old('service') == 'Website Development' ? 'selected' : '' }}>Website Development</option>
                                    <option value="Chatbot Experts" {{ old('service') == 'Chatbot Experts' ? 'selected' : '' }}>Chatbot Experts</option>
                                    <option value="Influence Marketing" {{ old('service') == 'Influence Marketing' ? 'selected' : '' }}>Influence Marketing</option>
                                    <option value="FB Ads Experts" {{ old('service') == 'FB Ads Experts' ? 'selected' : '' }}>FB Ads Experts</option>
                                    <option value="Amazon Store Designing" {{ old('service') == 'Amazon Store Designing' ? 'selected' : '' }}>Amazon Store Designing</option>
                                    <option value="Enhance Brand Content" {{ old('service') == 'Enhance Brand Content' ? 'selected' : '' }}>Enhance Brand Content</option>
                                    <option value="Affiliate Link Promotion" {{ old('service') == 'Affiliate Link Promotion' ? 'selected' : '' }}>Affiliate Link Promotion</option>
                                    <option value="UK/US Physical Sim" {{ old('service') == 'UK/US Physical Sim' ? 'selected' : '' }}>UK/US Physical Sim</option>
                                </select>
                                @error('service')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="employees" class="label">Number of Employees</label>
                                <input type="text" name="employees" id="employees" class="form-control @error('employees') is-invalid @enderror" value="{{ old('employees') }}" placeholder="Enter your Contact Number">
                                @error('employees')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="office_address" class="label">Office Address</label>
                                <input type="text" name="office_address" id="office_address" class="form-control @error('office_address') is-invalid @enderror" value="{{ old('office_address') }}" placeholder="Enter your office address">
                                @error('office_address')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="city" class="label">City</label>
                                <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" placeholder="Enter your Contact Number">
                                @error('city')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="country" class="label">Country</label>
                                <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror" value="{{ old('country') }}" placeholder="Enter your Contact Number">
                                @error('country')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div class="form-group required">
                                <label for="message" class="label">Describe Your Services & Interests</label>
                                <textarea name="message" id="message" class="form-control" rows="6" placeholder="Type your message Here..." maxlength="190">{{ old('message') }}</textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center">
                                <div class="mr-5">
                                    <a href="{{ route('app.services') }}" class="blue-outline-btn d-block">Cancel</a>
                                </div>
                                <div>
                                    <button type="submit" class="blue-btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- End Form wrapper -->
@endsection

@section('scripts')
<script src="{{ _asset('assets-admin/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script>
$('#phone').inputmask({"mask": "9999-9999999"});
</script>
@endsection
