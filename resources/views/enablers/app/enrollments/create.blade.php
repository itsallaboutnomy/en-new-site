@extends('enablers.app.layouts.app')

@section('page-title',' | '.($data ? $data->enrollment_type_name : 'Eoor').' Enrollment')

@section('styles')
    <style>
        .invalid-feedback {
            font-size: 15px;
        }
        input[type=radio] {
            width: 25px;
            height: 25px;
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
                            @if(isset($data) and $data->slug == 'book')
                                <h1 class="text-white h-primary text-uppercase">Change Your Life By Discovering Intuitive Insights From The Best</h1>
                            @else
                                <h1 class="text-white h-primary text-uppercase">Ready to participate?</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-bar"></div>
    </section>
    <!--  End Banner Wrapper -->

    <!--  Start Form wrapper -->
    <section class="fr-forms-wrapper padd">
        <div class="content">
            <div class="container">
                @if($data)

                @if($data->slug == 'enabling-video-series')
                <div class="row my-5">
                    <div class="col-lg-12">
                        <div style="font-size: 30px;">
                            <div class="form-check mb-5">
                                <input class="form-check-input" type="radio" name="is_free" id="radio-1" value="0" {{ $data->is_free == 0 ? 'checked' : '' }}
                                onclick="location.href = '{{ route('app.enrollment.create') }}?enroll_for=training&slug={{ $data->slug }}&is_free=0'">
                                <label class="form-check-label ml-5" for="radio-1">
                                    Paid (160$ - My Salary is MORE than Rs. 30k)
                                </label>
                            </div>
                            <div class="form-check mb-5">
                                <input class="form-check-input" type="radio" name="is_free" id="radio-2" value="0" {{ $data->is_free == 1 ? 'checked' : '' }}
                                onclick="location.href = '{{ route('app.enrollment.create') }}?enroll_for=training&slug={{ $data->slug }}&is_free=1'">
                                <label class="form-check-label ml-5" for="radio-2">
                                    Free (My Salary is LESS than Rs. 30k )
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if($data->slug == 'book')
                    <div class="row my-5">
                        <div class="col-lg-12">
                            <ul style="margin-left:-22px;font-size: 20px; line-height: 45px; font-weight: bold; list-style-image: url('{{ _asset("assets-app/img/orange-dot.png") }}');">
                                <li>For Pakistan: Rs. 3500 with free shipping all over Pakistan</li>
                                <li>International: $35 (International Shipping Fee excluded)</li>
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="fr-heading">
                            @if($data->enroll_for === 'book')
                                <h2 class="md-heading text-capitalize">Book Order Form</h2>
                            @else
                                <h2 class="md-heading text-capitalize">Kindly Fill Form to Enroll</h2>
                            @endif
                        </div>
                    </div>
                </div>

                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert" style="font-size: 15px; font-weight: 700;">
                        {{ session()->get('error') }}
                    </div>
                @endif
{{--
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
--}}

                <form method="POST" action="{{ route('app.enrollment.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- When EVS enrollment-->
                    <input type="hidden" name="is_free" value="{{ $data->is_free == 1 ? 'YES' : 'NO' }}">

                    @if($data->enroll_for === 'training' && $data->slug == 'enabling-video-series' && $data->is_free == 1)
                        <input type="hidden" name="payment_type" value="free">
                    @endif

                    <div class="row my-5">
                        <div class="col-lg-12 mb-4">
                            <div class="form-group required">
                                <label for="enroll_for" class="label">Enrollment For {{ $data->enrollment_type_name }}</label>
                                <select name="enroll_for" id="enroll_for" class="form-control @if($errors->has('enroll_for')) is-invalid @endif" readonly>
                                    <option value="{{ $data->enroll_for }}:{{ $data->slug }}">{{ $data->enrollment_value }}</option>
                                </select>
                                @if($errors->has('enroll_for'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('enroll_for') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="name" class="label">Name</label>
                                <input type="text" name="name" id="name" class="form-control @if($errors->has('name')) is-invalid @endif"  value="{{ old('name') }}" placeholder="Enter your full name">
                                @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="father_name" class="label">Father Name</label>
                                <input type="text" name="father_name" id="father_name" class="form-control @if($errors->has('father_name')) is-invalid @endif" value="{{ old('father_name') }}" placeholder="Enter your father name">
                                @if($errors->has('father_name'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('father_name') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="cnic_passport" class="label">CNIC @if($data->enroll_for === 'training')or Passport @endif</label>
                                <select name="cnic_passport" id="cnic_passport" class="form-control">
                                    <option value="cnic" {{ old('cnic_passport') === 'cnic' ? 'selected' : '' }}>CNIC</option>
                                    <option value="passport" {{ old('cnic_passport') === 'passport' ? 'selected' : '' }}>Passport</option>
                                </select>
                                @if($errors->has('cnic_passport'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('cnic_passport') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="cnic" class="label" id="cnic_lable">CNIC</label>
                                <input type="text" name="cnic" id="cnic_field" class="form-control @if($errors->has('cnic')) is-invalid @endif" value="{{ old('cnic') }}" placeholder="Enter your CNIC">
                                @if($errors->has('cnic'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('cnic') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="email" class="label">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email') }}" placeholder="Enter your email address">
                                @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="whatsapp_number" class="label">
                                    @if($data->enroll_for === 'training' || $data->enroll_for === 'trainer')Phone/WhatsApp Number
                                    @else Phone Number
                                    @endif
                                </label>
                                <input type="text" name="phone" id="whatsapp_number" class="form-control @if($errors->has('phone')) is-invalid @endif" value="{{ old('phone') }}"
                                       placeholder="Enter your @if($data->enroll_for === 'training')whatsApp @elseif($data->enroll_for === 'seminar')phone @endif">
                                @if($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('phone') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        @if($data->slug == 'enabling-video-series' && $data->is_free == 1)
                            <div class="col-lg-6 mb-4">
                                <div class="form-group required">
                                    <label for="country" class="label">Country</label>
                                    <input type="text" name="country" id="country" class="form-control @if($errors->has('country'))  is-invalid @endif" readonly value="Pakistan">
                                    @if($errors->has('country'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('country') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="col-lg-6 mb-4">
                                <div class="form-group required">
                                    <label for="country" class="label">Country</label>
                                    <input type="text" name="country" id="country" class="form-control @if($errors->has('country')) is-invalid @endif" value="{{ old('country') }}" placeholder="Enter your Country">
                                    @if($errors->has('country'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('country') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="city" class="label">City</label>
                                <input type="text" name="city" id="city" class="form-control @if($errors->has('city')) is-invalid @endif" value="{{ old('city') }}" placeholder="Enter your city">
                                @if($errors->has('city'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('city') }}</strong></span>
                                @endif
                            </div>
                        </div>



                        @if($data->enroll_for === 'seminar')
                            <div class="col-lg-6 mb-4">
                                <div class="form-group required">
                                    <label for="number_of_seats" class="label">Number of Seats</label>
                                    <input type="number" name="number_of_seats" id="number_of_seats" class="form-control @if($errors->has('number_of_seats')) is-invalid @endif" value="{{ old('number_of_seats') }}" placeholder="Enter Required Number of Seats">
                                    @if($errors->has('number_of_seats'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('number_of_seats') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if($data->enroll_for === 'trainer' and $data->mentorship === 'hourly')
                            <div class="col-lg-6 mb-4">
                                <div class="form-group required">
                                    <label for="hired_for_hours" class="label">How Many Hours for Enrolment</label>
                                    <input type="number" name="hired_for_hours" id="hired_for_hours" class="form-control @if($errors->has('hired_for_hours')) is-invalid @endif" value="{{ old('hired_for_hours') }}" placeholder="Enter Number of Hours">
                                    @if($errors->has('hired_for_hours'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('hired_for_hours') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if(($data->enroll_for === 'training' && $data->is_free == 0) || $data->enroll_for === 'trainer' || $data->enroll_for === 'book')
                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="payment_type" class="label">Payment Type</label>
                                <select name="payment_type" id="payment_type" class="form-control">
                                    @if($data->enroll_for != 'book')
                                    <option value="cash">Cash Deposit</option>
                                    @endif
                                    <option value="online">Online/Internet Bank Transfer</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4" style="{{ $data->enroll_for === 'book' ?: 'display: none;' }}" id="transactionTypeField">
                            <div class="form-group required">
                                <label for="transaction_type" class="label">Transaction Type</label>
                                <select name="transaction_type" id="transaction_type" class="form-control">
                                    <option value="local">Local Bank Transfer</option>
                                    <option value="international">International Bank Transfer</option>
                                </select>
                            </div>
                        </div>
                        @endif

                        <div class="col-lg-6 mb-4">
                            <div class="form-group required">
                                <label for="heard_from" class="label">Where from you heard about Enablers </label>
                                <select name="heard_from" id="heard_from" class="form-control @error('heard_from') is-invalid @enderror">
                                    <option value="">Select</option>
                                    <option value="Social Media" {{ old('heard_from') == 'Social Media' ? 'selected' : '' }}>Social Media</option>
                                    <option value="Printing Media" {{ old('heard_from') == 'Printing Media' ? 'selected' : '' }}>Printing Media</option>
                                    <option value="Electronic Media" {{ old('heard_from') == 'Electronic Media' ? 'selected' : '' }}>Electronic Media</option>
                                    <option value="Friends Family" {{ old('heard_from') == 'Friends Family' ? 'selected' : '' }}> Friends/Family</option>
                                    <option value="Colleagues" {{ old('heard_from') == 'Colleagues' ? 'selected' : '' }}>Colleagues</option>
                                </select>
                                @error('heard_from')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        @if(($data->enroll_for === 'training' && $data->slug != 'enabling-video-series') || $data->enroll_for === 'trainer')
                        <div class="col-lg-12 mb-4">
                            <div class="form_terms rounded p-3 p-lg-5">
                                <h3 class="text-uppercase">Terms and Conditions</h3>
                                <h4 class="terms-sub-title">Refund Process:</h4>
                                <ul>
                                    <li>Refund can be made in the following categories:</li>
                                    <li class="sub">100% refund before the 1st class. (Induction is referred to as Class 1)</li>
                                    <li class="sub">After 1st class, there will be no refund.</li>
                                    <li>Refund shall be processed in 7 working days.</li>
                                </ul>
                                <h4 class="terms-sub-title">Updated Rules for Student Transfer:</h4>
                                <ul>
                                    <li>Transfer from one group to another or from one training to another will only be entertained before the 2nd class.</li>
                                    <li>No transfer will be done after 2nd class. (Induction session is referred to as Class 1).</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-5">
                            <div class="custom-control required custom-checkbox">
                                <input type="checkbox" class="custom-control-input @if($errors->has('is_agreed')) is-invalid @endif" name="is_agreed" id="checked">
                                <label class="custom-control-label" for="checked">Check this custom checkbox<span class="text-danger">*</span></label>
                                @if($errors->has('is_agreed'))
                                    <span class="invalid-feedback" role="alert" style="margin: 10px 0 0 21px;"><strong>{{ $errors->first('is_agreed') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        @endif

                        @if($data->enroll_for === 'training' && $data->slug == 'enabling-video-series' && $data->is_free == 1)
                            <div class="col-lg-6 mb-4">
                                <div class="form-group required">
                                    <label for="facebook_profile_link" class="label">Facebook Profile Link</label>
                                    <input type="text" name="facebook_profile_link" id="facebook_profile_link" class="form-control @if($errors->has('facebook_profile_link')) is-invalid @endif" value="{{ old('facebook_profile_link') }}" maxlength="190" placeholder="Enter Facebook Link">
                                    @if($errors->has('facebook_profile_link'))
                                        <span class="invalid-feedback" role="alert"><label>{{ $errors->first('facebook_profile_link') }}</label></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <div class="form-group required">
                                    <label for="cnic_front_image" class="label">CNIC or Passport Front (Image Max Size 1MB)</label>
                                    <input type="file" name="cnic_front_image" id="cnic_front_image" class="form-control @if($errors->has('cnic_front_image')) is-invalid @endif">
                                    @if($errors->has('cnic_front_image'))
                                        <span class="invalid-feedback" role="alert"><label>{{ $errors->first('cnic_front_image') }}</label></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <div class="form-group required">
                                    <label for="cnic_back_image" class="label">CNIC or Passport Back (Image Max Size 1MB)</label>
                                    <input type="file" name="cnic_back_image" id="cnic_back_image" class="form-control @if($errors->has('cnic_back_image')) is-invalid @endif">
                                    @if($errors->has('cnic_back_image'))
                                        <span class="invalid-feedback" role="alert"><label>{{ $errors->first('cnic_back_image') }}</label></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <div class="form-group required">
                                    <label for="utility_bill_image" class="label">Utility Bill Copy (Image Max Size 1MB)</label>
                                    <input type="file" name="utility_bill_image" id="utility_bill_image" class="form-control @if($errors->has('utility_bill_image')) is-invalid @endif">
                                    @if($errors->has('utility_bill_image'))
                                        <span class="invalid-feedback" role="alert"><label>{{ $errors->first('utility_bill_image') }}</label></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <div class="form-group required">
                                    <label for="income_proof_image" class="label">Salary Slip/Contract Letter/Bank Statement/Student ID Card (Image Max Size 1MB)</label>
                                    <input type="file" name="income_proof_image" id="income_proof_image" class="form-control @if($errors->has('income_proof_image')) is-invalid @endif">
                                    @if($errors->has('income_proof_image'))
                                        <span class="invalid-feedback" role="alert"><label>{{ $errors->first('income_proof_image') }}</label></span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if($data->enroll_for === 'seminar')
                            <div class="col-lg-12 mb-4">
                                <div class="form-group">
                                    <label for="comments" class="label">Comments / Queries</label>
                                    <textarea name="comments" id="comments" class="form-control" rows="7" placeholder="Anything to say...">{{ old('comments') }}</textarea>
                                </div>
                            </div>
                        @endif

                        <div class="col-lg-12">
                            <div class="d-flex {{$data->is_free != 1 ? 'justify-content-between' :' justify-content-center'}} flex-column flex-md-row">
                                @if($data->is_free != 1)
                                 <div class="al-paid-rap mb-4">
                                    <a href="{{ route('app.enrollment.verify') }}" class="blue-outline-btn d-block"> Already Paid </a>
                                  </div>
                                @endif
                                <div class="text-right mb-4">
                                    <button type="submit" class="blue-btn w-100">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @else
                <div class="row my-5">
                    <div class="col-lg-8 mx-auto">
                        <div class="evs-error-heading text-center ">
                            <h2 class="md-heading mb-5">"Oop!" Something went wrong go back and try again</h2>
                            <a href="{{ route('app.trainings.index') }}" class="blue-btn">Go Back On Trainings</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!--  End Form wrapper -->
@endsection

@section('scripts')
    <script src="{{ _asset('assets-admin/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script>
        $('#cnic_field').inputmask({"mask": "99999-9999999-9"});
        $('#whatsapp_number').inputmask({"mask": "9999-9999999"});

        $('#payment_type').change(function (){
            if($(this).val() === 'online'){
                $('#transactionTypeField').show();
            } else {
                $('#transactionTypeField').hide();
            }
        });
        $('#cnic_passport').change(function (){
            $('#cnic_field').val('')
            if($(this).val() === 'cnic'){

                $('#cnic_lable').text('CNIC');
                $('#cnic_field').inputmask({"mask": "99999-9999999-9"});
                $('#cnic_field').attr("placeholder", "Enter Your CNIC")

            } else {
                $('#cnic_lable').text('Passport');
                $('#cnic_field').inputmask({"mask": ""});
                $('#cnic_field').attr({
                    "placeholder": "Enter Your Passport",
                })


            }
        });
    </script>
@endsection
