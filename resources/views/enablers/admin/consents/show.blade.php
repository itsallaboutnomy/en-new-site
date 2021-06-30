@extends('enablers.admin.layouts.admin')

@section('page-title','| Consent')

@section('styles')
    <style>
        .info-wrap li {
            border-bottom: 0.1rem solid #ccc;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 0.4rem 0;
            margin-bottom: 0.5rem;
        }
        .dropdown-toggle::after {
            display: none;

        }
    </style>
@endsection
@section('content-header')
    <div class="col-sm-6">
        <h1>{{$consent->consentTerms->consent_for}}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('evs-users.index') }}">Consent</a></li>
            <li class="breadcrumb-item active">{{$consent->consentTerms->consent_for}}</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                <!-- Enrolled User Info-->
                <div class="card h-100">
                    <div class="card-body info-wrap">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="ml-0 pl-0">
                                    <li> <label>Created At: </label> {{ date('D d M, Y',strtotime($consent->created_at)) }}</li>
                                    <li> <label>Name: </label> {{ $consent->name }}</li>
                                    <li> <label>Email: </label> {{ $consent->email }}</li>
                                    <li> <label>Trainer: </label> {{ $consent->training ? $consent->training->title : 'N/A'}}</li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="ml-0 pl-0">
                                    <li class="justify-content-end">
                                        <a class="btn btn-sm btn-{{ $consent->is_approved ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $consent->is_approved ? 'Disapproved' : 'Approved' }}','{{ $consent->id }}');">
                                            <i class="far {{ $consent->is_approved ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $consent->is_approved ? 'Disapproved' : 'Approved' }}
                                        </a>
                                        <form id="consent-status-{{ $consent->id }}" action="{{ route('consents.update-status',$consent->id) }}" method="POST" style="display: none;">@csrf</form>

                                    </li>
                                    <li> <label>Approved Status: </label>
                                        <strong class="{{ $consent->is_approved ? 'text-success' : 'text-danger' }}">
                                            {{ $consent->is_approved ? 'Approved' : 'Disapproved' }}
                                        </strong>
                                    </li>
                                    <li> <label>Mobile: </label> {{ $consent->phone }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Payment Proofs-->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <label>Signature</label>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <img  src="{{ _asset($consent->signature_image_path) }}" style="width: 60%">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugins')
    <script src="{{ _asset('assets-app/plugins/ezoom/ezoom.js') }}"></script>
@endsection
@section('scripts')

    <script>
        ezoom.onInit($('img'), {
            // options here
        });

        function updateStatus(statusRequired, id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to "+statusRequired+" this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, '+statusRequired+' it!'
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        $('#consent-status-'+id).submit();
                    }
                })
        }
    </script>
@endsection
