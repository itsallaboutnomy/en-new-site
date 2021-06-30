@extends('enablers.admin.layouts.admin')

@section('page-title','| VA Request Details')

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
        <h1>VA Request Details</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('va-request.index') }}"> VA Request List</a></li>
            <li class="breadcrumb-item active"> VA Request Details</li>
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
                                    <li> <label>Name: </label> {{ $virtualAssistantRequest->name }}</li>
                                    <li> <label>Email Address: </label> {{ $virtualAssistantRequest->email }}</li>
                                    <li> <label>City: </label> {{ $virtualAssistantRequest->city }}</li>
                                    <li> <label>Contact Number: </label> {{ $virtualAssistantRequest->contact_number }}</li>
                                    <li> <label>Experience as a VA (Duration): </label> {{ $virtualAssistantRequest->va_experience }}</li>
                                    <li> <label>Speciality (Expert In): </label> {{ $virtualAssistantRequest->speciality }}</li>
                                    <li> <label>Product Hunting: </label> {{ $virtualAssistantRequest->product_hunting }}</li>
                                    <li> <label>Listing Creation: </label> {{ $virtualAssistantRequest->listing_creation }}</li>
                                    <li> <label>Bulk Listing: </label> {{ $virtualAssistantRequest->bulk_listing }}</li>
                                    <li> <label>PPC: </label> {{ $virtualAssistantRequest->ppc }}</li>
                                    <li> <label>Short Description: </label> {{ $virtualAssistantRequest->short_summary }}</li>
                                    <li> <label>Listing Copywriting: </label> {{ $virtualAssistantRequest->listing_copy_writing }}</li>


                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="ml-0 pl-0">
                                    <li class="justify-content-end">
                                        <a class="btn btn-sm btn-{{ $virtualAssistantRequest->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $virtualAssistantRequest->is_enabled ? 'Disapproved' : 'Approved' }}','{{ $virtualAssistantRequest->id }}');">
                                            <i class="far {{ $virtualAssistantRequest->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $virtualAssistantRequest->is_enabled ? 'Disapproved' : 'Approved' }}
                                        </a>
                                        <form id="va-request-status-{{ $virtualAssistantRequest->id }}" action="{{ route('va-request.update-status',$virtualAssistantRequest->id) }}" method="POST" style="display: none;">@csrf</form>

                                    </li>
                                    <li> <label>Approved Status: </label>
                                        <strong class="{{ $virtualAssistantRequest->is_enabled ? 'text-success' : 'text-danger' }}">
                                            {{ $virtualAssistantRequest->is_enabled ? 'Approved' : 'Disapproved' }}
                                        </strong>
                                    </li>
                                    <li> <label>Created Date: </label> {{ date('D d M, Y',strtotime($virtualAssistantRequest->created_at)) }}</li>
                                    <li> <label>Keyword Research: </label> {{ $virtualAssistantRequest->keyword_research }}</li>
                                    <li> <label>FBA Shipment Creation: </label> {{ $virtualAssistantRequest->fba_shipment_creation }}</li>
                                    <li> <label>Product Launch: </label> {{ $virtualAssistantRequest->product_launch }}</li>
                                    <li> <label>Images Designing: </label> {{ $virtualAssistantRequest->images_designing }}</li>
                                    <li> <label>A+ Content Manager: </label> {{ $virtualAssistantRequest->a_plus_content_manager }}</li>
                                    <li> <label>Promotions Creation: </label> {{ $virtualAssistantRequest->promotions_creation }}</li>
                                    <li> <label>FBM Orders Management: </label> {{ $virtualAssistantRequest->fbm_orders_management }}</li>
                                    <li> <label>Availbility: </label> {{ $virtualAssistantRequest->availability }}</li>
                                    <li> <label>Comments: </label> {{ $virtualAssistantRequest->comments }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
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
                        $('#va-request-status-'+id).submit();
                    }
                })
        }
    </script>
@endsection
