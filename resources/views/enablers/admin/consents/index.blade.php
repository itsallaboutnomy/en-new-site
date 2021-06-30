@extends('enablers.admin.layouts.admin')

@section('page-title','| User Consents')

@section('styles')
    <style>
        .table td{
            vertical-align: middle;
        }
        .product-image-thumbs {
            margin-top: 0;
        }
        .product-image-thumb {
            margin-right: inherit;
            padding: .2rem;
            max-width: 4rem;
        }
        .modal-body{

        }
    </style>
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>User Generated Consents</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">User Generated Consents List</li>
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
                        <h3 class="card-title">User Generated Consents Table </h3>
                        <div class="card-tools">
                            {{--                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('events.create') }}"><i class="fas fa-plus-circle"></i> Add New Event</a>--}}
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>name</th>
                                <th class="text-center">Consent</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Training</th>
                                <th class="text-center">Approved Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($consents as $consent)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td >{{ $consent->name }}</td>
                                    <td class="text-center">{{ $consent->consentTerms->consent_for }}</td>
                                    <td class="text-center">{{ $consent->phone }}</td>
                                    <td class="text-center">{{ $consent->training? $consent->training->title: '---'  }}</td>
                                    <td class="text-center">
                                        <strong class="{{ $consent->is_approved ? 'text-success' : 'text-danger' }}">
                                            {{ $consent->is_approved ? 'Approved' : 'Disapproved' }}
                                        </strong>
                                    </td>

                                    <td class="text-center">
                                        <a class="btn btn-xs btn-{{ $consent->is_approved ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $consent->is_approved ? 'Disapproved' : 'Approved' }}','{{ $consent->id }}');">
                                            <i class="far {{$consent->is_approved ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $consent->is_approved ? 'Disapproved' : 'Approved' }}
                                        </a>
                                        <form id="consent-status-{{ $consent->id }}" action="{{ route('consents.update-status',$consent->id) }}" method="POST" style="display: none;">@csrf</form>

                                        <a class="btn btn-xs btn-info" data-toggle="modal" data-target="#consent-{{ $consent->id }}"><i class="far fa-eye"></i> View Signature</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="consent-{{ $consent->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Digital Signature</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img style="width: 100%" src="{{ _asset($consent->signature_image_path) }}" alt="Attachment Image">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No Records found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Default box end-->
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
                        $('#consent-status-'+id).submit();
                    }
                })
        }
        function removeRecord(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        $('#event-delete-'+id).submit();
                    }
                })
        }
    </script>
@endsection
