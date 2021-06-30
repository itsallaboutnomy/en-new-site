@extends('enablers.app.layouts.app')

@section('page-title',' | Payment-Proof')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}">
    <style>
        .invalid-feedback {
            font-size: 15px;
        }
        .info-wrap li {
            border-bottom: 0.1rem solid #ccc;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 0.4rem 0;
            margin-bottom: 0.5rem;
        }
        .info-wrap li:last-child {
            border-bottom: 0;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .info-wrap li label {
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    <!--  Start Banner Wrapper -->
    <section id="p-inner" class="fr-banner-wrapper pr-4 pr-lg-5">
        <div id="inner-content" class="content">
            <div class="container-fuild">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 animate__animated animate__animated animate__fadeInLeft">
                        <div class="fr-left-content main-headings">
                            <span class="d-block sub-title text-white">WE Make</span>
                            <h1 class="text-white h-primary text-uppercase">Ready to participate?</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->

    <!--  Start Form wrapper -->
    <section class="fr-forms-wrapper padd mt-5">
        <div class="content">
            <div class="container">
                <div class="enrollment-info-card-wrapper" style="margin: 0 0 40px 0;font-size: 1.7rem;">
                    <div class="row">
                    <div class="{{$enrollment->enroll_for_title == 'Book' ? 'col-lg-12 mb-4': 'col-lg-6 mb-4'  }}">
                        <div class="card h-100">
                            <div class="card-header"><h5>{{$enrollment->enroll_for_title != 'Book' ? 'User Info': 'Book Order Info'}}</h5></div>
                            <div class="card-body info-wrap">
                                <ul class="ml-0 pl-0">
                                    <li><label>Name:</label> {{ $enrollment->user->name }}</li>
                                    <li><label>Father Name:</label> {{ $enrollment->user->father_name }}</li>
                                    <li><label>CNIC or Passport Number:</label> {{ $enrollment->user->cnic }}</li>
                                    <li><label>Email:</label> {{ $enrollment->user->email }}</li>
                                    <li><label>Phone:</label> {{ $enrollment->user->phone }}</li>
                                    <li><label>Country:</label> {{ $enrollment->user->country }}</li>
                                    <li><label>City:</label> {{ $enrollment->user->city }}</li>
                                    @if($enrollment->enroll_for_title === 'Book')
                                        <li> <label>Payment : </label> {{ ucfirst($enrollment->payment_type) }} {{ $enrollment->transaction_type ? '/'.ucfirst($enrollment->transaction_type) : ''}}</li>
                                        <li> <label>Total Payable Price: </label> PKR {{ $enrollment->payable_price }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                        @if($enrollment->enroll_for_title != 'Book')
                             <div class="col-lg-6 mb-4">
                                  <div class="card h-100">
                                      <div class="card-header"><h5>Enrollment Info</h5></div>
                                         <div class="card-body info-wrap">
                                             <ul class="ml-0 pl-0">
                                    @if($enrollment->enroll_for_title == 'Book')
                                        <li><label>Order For:</label> {{$enrollment->enroll_for_title }}</li>
                                    @else
                                    <li><label>Enrolled For:</label> {{ $enrollment->training->key == 'EVS' ? 'EVS' : $enrollment->enroll_for_title }}</li>
                                    @endif
                                    @if($enrollment->enroll_for == 'training' || $enrollment->enroll_for == 'trainer')
                                        <li><label>Training Name:</label> {{ $enrollment->training->title }}</li>
                                        @if($enrollment->enroll_for == 'trainer')
                                            <li> <label>Trainer Name: </label> {{ $enrollment->trainer->name }}</li>
                                            <li> <label>Mentorship Type: </label> {{ $enrollment->counts ? 'Hourly' : 'Full' }}</li>
                                            @if($enrollment->counts)
                                                <li> <label>Enrolled for Hours: </label> {{ $enrollment->counts }}</li>
                                            @endif
                                        @endif
                                        @if($enrollment->enroll_for != 'trainer' && $enrollment->training->key != 'EVS')
                                            <li><label>Batch Name:</label> {{ $enrollment->trainingBatch->name }}</li>
                                        @endif
                                    @elseif($enrollment->enroll_for == 'seminar')
                                    <li><label>Seminar Name:</label> {{ $enrollment->event->title }}</li>
                                    <li> <label>Event Date: </label> {{ date('d D M Y',strtotime($enrollment->event->starting_at)) }}</li>
                                    <li> <label>No of Seats: </label> {{ $enrollment->counts }}</li>
                                    <li> <label>Price per seats: </label>  {{ $enrollment->event->currency }} {{ number_format($enrollment->event->charging_fee,2) }}</li>
                                    @endif
                                    <li> <label>Payment : </label> {{ ucfirst($enrollment->payment_type) }} {{ $enrollment->transaction_type ? '/'.ucfirst($enrollment->transaction_type) : ''}}</li>
                                    <li> <label>Total Payable Price: </label> PKR {{ $enrollment->payable_price }}</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                        @endif
                </div>
            </div>

                <div class="col-lg-12">
                    <h3 class="text-capitalize">Kindly fill below form for payment proof</h3>
                    <form method="POST" action="{{ route('app.enrollment.storePaymentProof',$enrollment->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="enroll_for" value="{{ $enrollment->enroll_for }}">
                        <div class="row my-5">
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label for="transaction_amount" class="label">Transaction Amount</label>
                                    <input type="number" name="transaction_amount" id="transaction_amount" class="form-control @if($errors->has('transaction_amount')) is-invalid @endif"  value="{{ old('transaction_amount') ? old('transaction_amount') : $enrollment->payable_price }}" placeholder="Transaction Amount">
                                    @if($errors->has('transaction_amount'))
                                        <span class="invalid-feedback" role="alert"><label>{{ $errors->first('transaction_amount') }}</label></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label for="transaction_date" class="label">Transaction Date</label>
                                    <input type="text" name="transaction_date" id="transaction_date" class="form-control @if($errors->has('transaction_date')) is-invalid @endif"  value="{{ old('transaction_date') }}" placeholder="Transaction Date">
                                    @if($errors->has('transaction_date'))
                                        <span class="invalid-feedback" role="alert"><label>{{ $errors->first('transaction_date') }}</label></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label for="payment_receipt" class="label">Attach Payment Receipt</label>
                                    <input type="file" name="payment_receipt" id="payment_receipt" class="form-control @if($errors->has('payment_receipt')) is-invalid @endif">
                                    @if($errors->has('payment_receipt'))
                                        <span class="invalid-feedback" role="alert"><label>{{ $errors->first('payment_receipt') }}</label></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label for="cnic_front_image" class="label">CNIC or Passport Front</label>
                                    <input type="file" name="cnic_front_image" id="cnic_front_image" class="form-control @if($errors->has('cnic_front_image')) is-invalid @endif">
                                    @if($errors->has('cnic_front_image'))
                                        <span class="invalid-feedback" role="alert"><label>{{ $errors->first('cnic_front_image') }}</label></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label for="cnic_back_image" class="label">CNIC or Passport Back:</label>
                                    <input type="file" name="cnic_back_image" id="cnic_back_image" class="form-control @if($errors->has('cnic_back_image')) is-invalid @endif">
                                    @if($errors->has('cnic_back_image'))
                                        <span class="invalid-feedback" role="alert"><label>{{ $errors->first('cnic_back_image') }}</label></span>
                                    @endif
                                </div>
                            </div>

                            @if($enrollment->enroll_for === 'training')
                                @if($enrollment->transaction_type === 'international' or $enrollment->training->key === 'EVS')
                                    <input type="hidden" name="training_mode" value="online">
                                @elseif($enrollment->training->key != 'EVS')
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="training_mode" class="label">Training Mode</label>
                                            <select name="training_mode" id="training_mode" class="form-control @if($errors->has('training_mode')) is-invalid @endif">
                                                <option value="online" {{ old('cnic_back_image') === 'online' ? 'select' : '' }}>Online</option>
                                                <option value="face-to-face" {{ old('cnic_back_image') === 'face-to-face' ? 'select' : '' }}>Face To Face</option>
                                            </select>
                                            @if($errors->has('training_mode'))
                                                <span class="invalid-feedback" role="alert"><label>{{ $errors->first('training_mode') }}</label></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-4" id="training_city_field" style="display: none;">
                                        <div class="form-group">
                                            <label for="training_city_id" class="label">Prefer City Training</label>
                                            <select name="training_city_id" id="training_city_id" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($enrollment->training->cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                            @endif

                            <div class="col-lg-12 text-center">
                                <button type="submit" class="blue-btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--  End Form wrapper -->
@endsection

@section('scripts')
    <script src="{{ _asset('assets-admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $('#transaction_date').datetimepicker({
            icons: datetimepickerIcons,
            format: 'DD-MMMM-YYYY',
            maxDate: moment(),
        });

        $(document).ready(function()
        {
            $("#training_mode").change(function()
            {
                if($(this).val() === "face-to-face")
                {
                    $("#training_city_field").show();
                } else {
                    $("#training_city_field").hide();
                }
            });
        });
    </script>
@endsection
