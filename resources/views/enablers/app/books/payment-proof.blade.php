@extends('enablers.app.layouts.app')

@section('page-title',' | Payment Proof')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}">
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
                            <h1 class="text-white h-primary text-uppercase">PAYMENT PROOF</h1>
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
{{--                <div class="row">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="fr-heading">--}}
{{--                            <ul style="font-size: 25px;font-weight: 700;">--}}
{{--                                <li style="margin: 0 0 15px 0;">--}}
{{--                                    For Pakistan: Rs. 3500 with free shipping all over Pakistan--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    International: $35 (International Shipping Fee excluded)--}}
{{--                                </li>--}}
{{--                            </ul>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <form method="POST" action="{{ route('app.books.store-payment-proof') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row my-5">
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="transaction_amount" class="label">Transaction Amount</label>
                                <input type="text" name="transaction_amount" id="transaction_amount" class="form-control @error('transaction_amount') is-invalid @enderror" value="{{ old('transaction_amount') }}">
                                @error('transaction_amount')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="date" class="label">Transaction Date</label>
                                <input type="text" name="date" id="date" class="form-control @error('date') is-invalid @enderror" placeholder="Transaction Date" value="{{ old('date') }}" />
                                @error('date')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="payment_receipt" class="label">Attach Payment Receipt:</label>
                                <input type="file" name="payment_receipt" id="payment_receipt" class="form-control @error('payment_receipt') is-invalid @enderror"  accept=".jpg, .jpeg, .png"/>
                                @error('payment_receipt')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="cnic_front" class="label">CNIC or Passport Front</label>
                                <input type="file" name="cnic_front" id="cnic_front" class="form-control @error('cnic_front') is-invalid @enderror"  accept=".jpg, .jpeg, .png"/>
                                @error('cnic_front')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="cnic_back" class="label">CNIC or Passport Back</label>
                                <input type="file" name="cnic_back" id="cnic_back" class="form-control @error('cnic_back') is-invalid @enderror"  accept=".jpg, .jpeg, .png"/>
                                @error('cnic_back')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mx-auto mt-5">
                            <div class="submit-rap text-center">
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
    <script src="{{ _asset('assets-admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>

    <script>
        let dateTimePickerObject = {
            icons: datetimepickerIcons,
            format: 'L',
        };
        $('#date').datetimepicker(dateTimePickerObject);
    </script>
@endsection
