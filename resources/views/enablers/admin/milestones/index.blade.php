@extends('enablers.admin.layouts.admin')

@section('page-title','| Milestones')

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
    </style>
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Milestones List</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Milestones List</li>
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
                        <h3 class="card-title">Milestones Table</h3>
                        <div class="card-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('milestones.create') }}"><i class="fas fa-plus-circle"></i> Add New Milestone</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Logo</th>
                                <th class="text-center">Order Number</th>
                                <th>Title</th>
                                <th class="text-center">Status</th>
{{--                                <th class="text-center">Admin Status</th>--}}
                                <th class="text-center">Created By</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($milestones as $milestone)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="product-image-thumbs">
                                        <div class="product-image-thumb">
                                            <img src="{{ _asset($milestone->logo_path) }}" alt="Milestone Logo">
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $milestone->order_number }}</td>
                                    <td>{{ $milestone->title }}</td>
                                    <td class="text-center">
                                        <strong class="{{ $milestone->is_enabled ? 'text-success' : 'text-danger' }}">
                                            {{ $milestone->is_enabled ? 'Enabled' : 'Disabled' }}
                                        </strong>
                                    </td>
{{--                                    <td class="text-center">--}}
{{--                                        <span class="badge {{ $milestone->admin_status == 'Pending' ? $milestone->admin_status == 'Approved' ? 'bg-success' : 'bg-warning' : 'bg-danger' }}">--}}
{{--                                            {{ $milestone->admin_status }}--}}
{{--                                        </span>--}}
{{--                                    </td>--}}
                                    <td class="text-center">{{ $milestone->creator->name }}</td>
                                    <td class="text-center">{{ date('d M, Y g:i A',strtotime($milestone->created_at)) }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-{{ $milestone->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $milestone->is_enabled ? 'Disable' : 'Enable' }}','{{ $milestone->id }}');">
                                            <i class="far {{ $milestone->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $milestone->is_enabled ? 'Disable' : 'Enable' }}
                                        </a>
                                        <form id="milestone-status-{{ $milestone->id }}" action="{{ route('milestones.update-status',$milestone->id) }}" method="POST" style="display: none;">@csrf</form>

                                        <a class="btn btn-xs btn-info" href="{{ route('milestones.edit',$milestone->id) }}"><i class="far fa-eye"></i> Edit</a>

                                        <a class="btn btn-xs btn-danger"  href="javascript:void(0);"  onclick="removeRecord('{{ $milestone->id }}');"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <form id="milestone-delete-{{ $milestone->id }}" action="{{ route('milestones.destroy',$milestone->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
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
                        $('#milestone-status-'+id).submit();
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
                        $('#milestone-delete-'+id).submit();
                    }
                })
        }
    </script>
@endsection
