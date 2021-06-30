@extends('enablers.admin.layouts.admin')

@section('page-title','| Events')

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
        <h1>Events List</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Events List</li>
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
                        <h3 class="card-title">Events Table</h3>
                        <div class="card-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('events.create') }}"><i class="fas fa-plus-circle"></i> Add New Event</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th class="text-center">Order Number</th>
                                <th class="text-center">Type</th>
                                <th>Title</th>
                                <th class="text-center">Key</th>
                                <th class="text-center">Location</th>
                                <th class="text-center">Starting Date</th>
                                <th class="text-center">Status</th>
{{--                                <th class="text-center">Admin Status</th>--}}
                                <th class="text-center">Created By</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($events as $event)
                                <tr>
                                    <td class="text-center">{{ $event->order_number }}</td>
                                    <td class="text-center">{{ ucfirst($event->type) }}</td>
                                    <td>{{ $event->title  }}</td>
                                    <td class="text-center">{{ $event->key  }}</td>
                                    <td class="text-center">{{ $event->location }}</td>
                                    <td class="text-center">{{ $event->starting_at ? date('d M, Y',strtotime($event->starting_at)) : 'TBD' }}</td>
                                    <td class="text-center">
                                        <strong class="{{ $event->is_enabled ? 'text-success' : 'text-danger' }}">
                                            {{ $event->is_enabled ? 'Enabled' : 'Disabled' }}
                                        </strong>
                                    </td>
{{--                                    <td class="text-center">--}}
{{--                                        <span class="badge {{ $event->admin_status == 'Pending' ? $event->admin_status == 'Approved' ? 'bg-success' : 'bg-warning' : 'bg-danger' }}">--}}
{{--                                            {{ $event->admin_status }}--}}
{{--                                        </span>--}}
{{--                                    </td>--}}
                                    <td class="text-center">{{ $event->creator->name }}</td>
                                    <td class="text-center">{{ date('d M, Y g:i A',strtotime($event->created_at)) }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-{{ $event->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $event->is_enabled ? 'Disable' : 'Enable' }}','{{ $event->id }}');">
                                            <i class="far {{ $event->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $event->is_enabled ? 'Disable' : 'Enable' }}
                                        </a>
                                        <form id="event-status-{{ $event->id }}" action="{{ route('events.update-status',$event->id) }}" method="POST" style="display: none;">@csrf</form>

                                        <a class="btn btn-xs btn-info" href="{{ route('events.edit',$event->id) }}"><i class="far fa-eye"></i> Edit</a>

                                        <a class="btn btn-xs btn-danger"  href="javascript:void(0);"  onclick="removeRecord('{{ $event->id }}');"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <form id="event-delete-{{ $event->id }}" action="{{ route('events.destroy',$event->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
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
                        $('#event-status-'+id).submit();
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
