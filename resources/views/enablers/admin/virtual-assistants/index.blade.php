@extends('enablers.admin.layouts.admin')

@section('page-title','| Virtual Assistants')

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
        <h1>Virtual Assistant List</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Virtual Assistant List</li>
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
                        <h3 class="card-title">Virtual Assistant Table</h3>
                        <div class="card-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('virtual-assistants.create') }}"><i class="fas fa-plus-circle"></i> Add Virtual Assistant</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Experience Level</th>
{{--                                <th class="text-center">skills</th>--}}

                                <th class="text-center">Status</th>
                                {{--                                <th class="text-center">Admin Status</th>--}}
                                <th class="text-center">Created By</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($virtualAssistants as $virtualAssistant)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $virtualAssistant->name }}</td>
                                    <td class="text-center">{{ ucwords($virtualAssistant->experience_level) }}</td>
{{--                                    <td class="text-center">{{ $virtualAssistant->experience_level }}</td>--}}

                                    <td class="text-center">
                                        <strong class="{{ $virtualAssistant->is_enabled ? 'text-success' : 'text-danger' }}">
                                            {{ $virtualAssistant->is_enabled ? 'Enabled' : 'Disabled' }}
                                        </strong>
                                    </td>
                                    {{--                                    <td class="text-center">--}}
                                    {{--                                        <span class="badge {{ $event->admin_status == 'Pending' ? $event->admin_status == 'Approved' ? 'bg-success' : 'bg-warning' : 'bg-danger' }}">--}}
                                    {{--                                            {{ $event->admin_status }}--}}
                                    {{--                                        </span>--}}
                                    {{--                                    </td>--}}
                                    <td class="text-center">{{ $virtualAssistant->creator->name }}</td>
                                    <td class="text-center">{{ date('d M, Y g:i A',strtotime($virtualAssistant->created_at)) }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-{{ $virtualAssistant->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $virtualAssistant->is_enabled ? 'Disable' : 'Enable' }}','{{ $virtualAssistant->id }}');">
                                            <i class="far {{ $virtualAssistant->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $virtualAssistant->is_enabled ? 'Disable' : 'Enable' }}
                                        </a>
                                        <form id="virtual-assistant-status-{{ $virtualAssistant->id }}" action="{{ route('virtual-assistants.update-status',$virtualAssistant->id) }}" method="POST" style="display: none;">@csrf</form>

                                        <a class="btn btn-xs btn-info" href="{{ route('virtual-assistants.edit',$virtualAssistant->id) }}"><i class="far fa-eye"></i> Edit</a>

                                        <a class="btn btn-xs btn-danger"  href="javascript:void(0);"  onclick="removeRecord('{{ $virtualAssistant->id }}');"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <form id="virtual-assistant-delete-{{ $virtualAssistant->id }}" action="{{ route('virtual-assistants.destroy',$virtualAssistant->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
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
                        $('#virtual-assistant-status-'+id).submit();
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
                        $('#virtual-assistant-delete-'+id).submit();
                    }
                })
        }
    </script>
@endsection
