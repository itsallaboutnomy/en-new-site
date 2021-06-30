@extends('enablers.app.layouts.app')

@section('page-title',' | About Us')

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
                            <h1 class="text-white h-primary text-uppercase">VA Interview Form</h1>
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
                                Please fill the form below to get featured on Enablers Hire a VA Page
                            </h6>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('app.va-request.store') }}">
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
                                <label for="city" class="label">City</label>
                                <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" placeholder="Enter your city">
                                @error('city')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="contact_number" class="label">Contact Number</label>
                                <input type="text" name="contact_number" id="contact_number" class="form-control @error('contact_number') is-invalid @enderror" value="{{ old('contact_number') }}" placeholder="Enter your Contact Number">
                                @error('contact_number')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="va_experience" class="label">Experience as a VA (Duration)</label>
                                <input type="text" name="va_experience" id="va_experience" class="form-control  @error('va_experience') is-invalid @enderror" value="{{ old('va_experience') }}" placeholder="Enter your Experience">
                                @error('va_experience')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="speciality" class="label">Speciality (Expert In)</label>
                                <input type="text" name="speciality" id="speciality" class="form-control  @error('speciality') is-invalid @enderror" value="{{ old('speciality') }}" placeholder="Enter your Speciality">
                                @error('speciality')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="product_hunting" class="label">Product Hunting</label>
                                <select name="product_hunting" id="product_hunting" class="form-control  @error('product_hunting') is-invalid @enderror">
                                    <option value="">Select</option>
                                    <option value="Good" {{ old('product_hunting') == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Normal" {{ old('product_hunting') == 'Normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="Low" {{ old('product_hunting') == 'Low' ? 'selected' : '' }}>Low</option>
                                </select>
                                @error('product_hunting')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="listing_creation" class="label">Listing Creation</label>
                                <select name="listing_creation" id="listing_creation" class="form-control  @error('listing_creation') is-invalid @enderror">
                                    <option value="">Select</option>
                                    <option value="Good" {{ old('listing_creation') == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Normal" {{ old('listing_creation') == 'Normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="Low" {{ old('listing_creation') == 'Low' ? 'selected' : '' }}>Low</option>

                                </select>
                                @error('listing_creation')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="bulk_listing" class="label">Bulk Listing</label>
                                <select name="bulk_listing" id="bulk_listing" class="form-control  @error('bulk_listing') is-invalid @enderror">
                                <option value="">Select</option>
                                    <option value="Good" {{ old('bulk_listing') == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Normal" {{ old('bulk_listing') == 'Normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="Low" {{ old('bulk_listing') == 'Low' ? 'selected' : '' }}>Low</option>
                                </select>
                                @error('bulk_listing')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="ppc" class="label">PPC</label>
                                <select name="ppc" id="ppc" class="form-control  @error('ppc') is-invalid @enderror">
                                <option value="">Select</option>
                                    <option value="Good" {{ old('ppc') == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Normal" {{ old('ppc') == 'Normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="Low" {{ old('ppc') == 'Low' ? 'selected' : '' }}>Low</option>
                                </select>
                                @error('ppc')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="listing_copy_writing" class="label">Listing Copywriting</label>
                                <select name="listing_copy_writing" id="listing_copy_writing" class="form-control  @error('listing_copy_writing') is-invalid @enderror">
                                <option value="">Select</option>
                                    <option value="Good" {{ old('listing_copy_writing') == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Normal" {{ old('listing_copy_writing') == 'Normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="Low" {{ old('listing_copy_writing') == 'Low' ? 'selected' : '' }}>Low</option>
                                </select>
                                @error('listing_copy_writing')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="keyword_research" class="label">Keyword Research</label>
                                <select name="keyword_research" id="keyword_research" class="form-control  @error('keyword_research') is-invalid @enderror">
                                <option value="">Select</option>
                                    <option value="Good" {{ old('keyword_research') == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Normal" {{ old('keyword_research') == 'Normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="Low" {{ old('keyword_research') == 'Low' ? 'selected' : '' }}>Low</option>
                                </select>
                                @error('keyword_research')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="fba_shipment_creation" class="label">FBA Shipment Creation</label>
                                <select name="fba_shipment_creation" id="fba_shipment_creation" class="form-control  @error('fba_shipment_creation') is-invalid @enderror">
                                <option value="">Select</option>
                                    <option value="Good" {{ old('fba_shipment_creation') == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Normal" {{ old('fba_shipment_creation') == 'Normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="Low" {{ old('fba_shipment_creation') == 'Low' ? 'selected' : '' }}>Low</option>
                                </select>
                                @error('fba_shipment_creation')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="product_launch" class="label">Product Launch</label>
                                <select name="product_launch" id="product_launch" class="form-control  @error('product_launch') is-invalid @enderror">
                                <option value="">Select</option>
                                    <option value="Good" {{ old('product_launch') == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Normal" {{ old('product_launch') == 'Normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="Low" {{ old('product_launch') == 'Low' ? 'selected' : '' }}>Low</option>
                                </select>
                                @error('product_launch')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="images_designing" class="label">Images Designing</label>
                                <select name="images_designing" id="images_designing" class="form-control  @error('images_designing') is-invalid @enderror">
                                <option value="">Select</option>
                                    <option value="Good" {{ old('images_designing') == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Normal" {{ old('images_designing') == 'Normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="Low" {{ old('images_designing') == 'Low' ? 'selected' : '' }}>Low</option>
                                </select>
                                @error('images_designing')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="a_plus_content_manager" class="label">A+ Content Manager</label>
                                <select name="a_plus_content_manager" id="a_plus_content_manager" class="form-control  @error('a_plus_content_manager') is-invalid @enderror">
                                <option value="">Select</option>
                                    <option value="Good" {{ old('a_plus_content_manager') == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Normal" {{ old('a_plus_content_manager') == 'Normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="Low" {{ old('a_plus_content_manager') == 'Low' ? 'selected' : '' }}>Low</option>
                                </select>
                                @error('images_designing')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="promotions_creation" class="label">Promotions Creation</label>
                                <select name="promotions_creation" id="promotions_creation" class="form-control  @error('promotions_creation') is-invalid @enderror">
                                <option value="">Select</option>
                                    <option value="Good" {{ old('promotions_creation') == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Normal" {{ old('promotions_creation') == 'Normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="Low" {{ old('promotions_creation') == 'Low' ? 'selected' : '' }}>Low</option>
                                </select>
                                @error('promotions_creation')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="fbm_orders_management" class="label">FBM Orders Management</label>
                                <select name="fbm_orders_management" id="fbm_orders_management" class="form-control  @error('fbm_orders_management') is-invalid @enderror">
                                <option value="">Select</option>
                                    <option value="Good" {{ old('fbm_orders_management') == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Normal" {{ old('fbm_orders_management') == 'Normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="Low" {{ old('fbm_orders_management') == 'Low' ? 'selected' : '' }}>Low</option>
                                </select>
                                @error('fbm_orders_management')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div class="form-group required">
                                <label for="availability" class="label">Availbility</label>
                                <select name="availability" id="availability" class="form-control  @error('availability') is-invalid @enderror">
                                    <option value="">Select</option>
                                    <option value="4 Hours" {{ old('availability') == '4 Hours' ? 'selected' : '' }}>4 Hours</option>
                                    <option value="8 Hours" {{ old('availability') == '8 Hours' ? 'selected' : '' }}>4 Hours</option>
                                    <option value="as required" {{ old('availability') == 'as required' ? 'selected' : '' }}>as required</option>
                                </select>
                                @error('availability')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="short_summary" class="label">Short Description About Experience</label>
                                <textarea name="short_summary" id="short_summary" class="form-control  @error('short_summary') is-invalid @enderror" rows="6" placeholder="Short Description Here..." maxlength="190">{{ old('short_summary') }}</textarea>
                                @error('short_summary')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="comments" class="label">Comments (if any)</label>
                                <textarea name="comments" id="comments" class="form-control" rows="6" placeholder="Short Description Here..." maxlength="190">{{ old('comments') }}</textarea>
                                @error('comments')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center">
                                <div class="mr-5">
                                    <a href="{{ route('app.hire-va') }}" class="blue-outline-btn d-block">Cancel</a>
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
$('#contact_number').inputmask({"mask": "9999-9999999"});
</script>
@endsection
