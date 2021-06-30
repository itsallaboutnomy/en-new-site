@extends('enablers.admin.layouts.admin')

@section('page-title','| Consent Terms - Edit')

@section('styles')

@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit Consent Terms</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('consent-terms.index') }}">Consent Terms List</a></li>
            <li class="breadcrumb-item active">Edit Consent Terms</li>
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
                        <h3 class="card-title">Editing Consent Terms</h3>
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
                    <form id="consent-terms-form" class="form-horizontal" action="{{ route('consent-terms.update',$consentTerm->id) }}" method="POSt" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="consent_for" class="col-sm-2 col-form-label">Consent For</label>
                                <div class="col-sm-10">
                                    <select name="consent_for" id="consent_for" class="form-control">
                                        <option value="Student Consent" {{ $consentTerm->consent_for ==  'Student Consent' ? 'selected' : '' }}>Student Consent</option>
                                        <option value="FBA Wholesale Consent" {{ $consentTerm->consent_for ==  'FBA Wholesale Consent' ? 'selected' : '' }}>FBA Wholesale Consent</option>
                                        <option value="One Year Specialization Consent" {{ $consentTerm->consent_for ==  'One Year Specialization Consent' ? 'selected' : '' }}>One Year Specialization Consent</option>
                                        <option value="Listing Promoter Consent" {{ $consentTerm->consent_for ==  'Listing Promoter Consent' ? 'selected' : '' }}>Listing Promoter Consent</option>
                                        <option value="EXL Consent" {{ $consentTerm->consent_for ==  'EXL Consent' ? 'selected' : '' }}>EXL Consent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="terms" class="col-sm-2 col-form-label">Terms</label>
                                <div class="col-sm-10">
                                    <textarea name="terms" id="terms" class="form-control" rows="20" placeholder="Add Consent Term Here...">{{ old('terms') ? old('terms') : $consentTerm->terms }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 ml-auto text-right pt-4">
                                    <a href="{{ route('consent-terms.index') }}" class="btn btn-default mr-2">Cancel</a>
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
        $("#consent-terms-form").validate({
            errorClass: 'error is-invalid',
            rules: {
                consent_for: {
                    required: true,
                },
                terms: {
                    required: true,
                }
            }});
    </script>
@endsection
