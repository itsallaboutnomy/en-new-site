@extends('enablers.app.layouts.app')

@section('page-title',' | Book Order')

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
                            <h1 class="text-white h-primary text-uppercase">Order your Book, Now!</h1>
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
                            <ul style="font-size: 25px;font-weight: 700;">
                                <li style="margin: 0 0 15px 0;">
                                    For Pakistan: Rs. 3500 with free shipping all over Pakistan
                                </li>
                                <li>
                                    International: $35 (International Shipping Fee excluded)
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('app.books.store-payment') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row my-5">
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="name" class="label">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter your full name">
                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="phone" class="label">Mobile Number</label>
                                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Enter your contact number">
                                @error('phone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="cnic" class="label">CNIC</label>
                                <input type="text" name="cnic" id="cnic" class="form-control @error('cnic') is-invalid @enderror" value="{{ old('cnic') }}" placeholder="Enter your CNIC">
                                @error('cnic')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="email" class="label">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter your email address">
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="street_address" class="label">Street Address</label>
                                <input type="text" name="street_address" id="street_address" class="form-control @error('street_address') is-invalid @enderror" value="{{ old('street_address') }}" placeholder="Enter your street address">
                                @error('street_address')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="city" class="label">City</label>
                                <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" placeholder="Enter your city">
                                @error('city')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="country " class="label">Country </label>
                                <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror" value="{{ old('country') }}" placeholder="Enter your country">
                                @error('country')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="deliver_to" class="label">Deliver To</label>
                                <select name="deliver_to" id="deliver_to" class="form-control">
                                    <option value="">Select</option>
                                    <option value="pakistan" {{ old('deliver_to') === 'pakistan' ? 'selected' : '' }}>Pakistan</option>
                                    <option value="international" {{ old('deliver_to') === 'international' ? 'selected' : '' }}>International</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="payment_type" class="label">Payment Type</label>
                                <select name="payment_type" id="payment_type" class="form-control">
                                    <option value="">Select Payment Type</option>
                                    <option value="cash" {{ old('payment_type') === 'cash' ? 'selected' : '' }}>Cash Deposit</option>
                                    <option value="online" {{ old('payment_type') === 'online' ? 'selected' : '' }}>Online/Internet Bank Transfer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4" style="{{ old('payment_type') === 'online' ? '' : 'display: none;' }}" id="transaction-type-row">
                            <div class="form-group">
                                <label for="transaction_type" class="label">Transaction Type</label>
                                <select name="transaction_type" id="transaction_type" class="form-control">
                                    <option value="">Select Transaction Type</option>
                                    <option value="local" {{ old('transaction_type') === 'cash' ? 'selected' : '' }}>Local Bank Transfer</option>
                                    <option value="international" {{ old('transaction_type') === 'online' ? 'selected' : '' }}>International Bank Transfer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div class="form-group">
                                <label for="description" class="label">Delivery Instructions (Optional)</label>
                                <textarea name="description" id="short_summary" class="form-control" rows="6" placeholder="Any special instructions regarding book delivery?" minlength="5" maxlength="190">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-6 mx-auto mt-5">
                            <div class="submit-rap text-center">
                                <a href="{{ route('app.books.create-payment-proof') }}" class="blue-btn" >Already Paid</a>
                                <button type="submit" class="blue-btn">Submit</button>
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

        $("#payment_type").change(function() {
            if($(this).val() === "cash")
            {
                $("#transaction-type-row").hide();
                $("#transaction_type").val('');
            }
            else
            {
                $("#transaction-type-row").show();
            }

        });
    </script>
@endsection
