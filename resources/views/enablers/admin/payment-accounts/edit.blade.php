@extends('enablers.admin.layouts.admin')

@section('page-title','| Payment Accounts - Edit')

@section('styles')
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit Payment Account</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('payment-accounts.index') }}">Payment Accounts List</a></li>
            <li class="breadcrumb-item active">Edit Payment Account</li>
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
                        <h3 class="card-title">Editing Event</h3>
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
                    <form id="payment-accounts-form" class="form-horizontal" action="{{ route('payment-accounts.update',$paymentAccount->id) }}" method="POSt" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group row required">
                                <label for="type" class="col-sm-2 col-form-label">Event Type</label>
                                <div class="col-sm-10">
                                    <select name="type" id="type" class="form-control">
                                        <option value="cash" {{ $paymentAccount->type ==  'cash' ? 'selected' : '' }}>Cash</option>
                                        <option value="local" {{ $paymentAccount->type ==  'local' ? 'selected' : '' }}>Local</option>
                                        <option value="international" {{ $paymentAccount->type ==  'international' ? 'selected' : '' }}>International</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="bank_name" class="col-sm-2 col-form-label">Add Bank Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Bank Name" value="{{ old('bank_name') ? old('bank_name') : $paymentAccount->bank_name }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="account_title" class="col-sm-2 col-form-label">Add Account Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="account_title" id="account_title" class="form-control" placeholder="Account Title" value="{{ old('account_title') ? old('account_title') : $paymentAccount->account_title }}"/>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="account_number" class="col-sm-2 col-form-label">Add Account Number</label>
                                <div class="col-sm-10">
                                    <input type="text" name="account_number" id="account_number" class="form-control" placeholder="Account Number" value="{{ old('account_number') ? old('account_number') : $paymentAccount->account_number }}"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="iban" class="col-sm-2 col-form-label">Add Add IBAN</label>
                                <div class="col-sm-10">
                                    <input type="text" name="iban" id="iban" class="form-control" placeholder="IBAN" value="{{ old('iban') ? old('iban') : $paymentAccount->iban }}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('payment-accounts.index') }}" class="btn btn-default mr-2">Cancel</a>
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
    <script src="{{ _asset('assets-admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endsection

@section('scripts')
    <script>
        $("#payment-accounts-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                type: {
                    required: true,
                },
                bank_name: {
                    required: true,
                    maxlength: 60
                },
                account_title: {
                    required: false,
                    maxlength: 60
                },
                account_number: {
                    required: true,
                    maxlength: 30,
                },
                iban: {
                    required: false,
                    maxlength: 30
                },
            }
        });
    </script>
@endsection
