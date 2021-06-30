@extends('enablers.admin.layouts.admin')

@section('page-title','| Trainings')

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
        <h1>Trainings List</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Trainings List</li>
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
                        <h3 class="card-title">Trainings Table</h3>
                        <div class="card-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('trainings.create') }}"><i class="fas fa-plus-circle"></i> Add New Training</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th class="text-center">Order Number</th>
                                <th class="text-center">Key</th>
                                <th>Title</th>
                                <th class="text-center">Starting At</th>
                                <th class="text-center">Charging Fee</th>
                                <th class="text-center">Status</th>
{{--                                <th class="text-center">Admin Status</th>--}}
                                <th class="text-center">Created By</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($trainings as $training)
                                <tr>
                                    <td class="text-center">{{ $training->order_number }}</td>
                                    <td class="text-center">{{ $training->key  }}</td>
                                    <td>{{ $training->title }}</td>
                                    <td class="text-center">{{ $training->starting_at ? date('d M, Y',strtotime($training->starting_at)) : 'Not Provided' }}</td>
                                    <td class="text-center">{{ $training->currency }} {{ number_format($training->charging_fee) }}</td>
                                    <td class="text-center">
                                        <strong class="{{ $training->is_enabled ? 'text-success' : 'text-danger' }}">
                                            {{ $training->is_enabled ? 'Enabled' : 'Disabled' }}
                                        </strong>
                                    </td>
{{--                                    <td class="text-center">--}}
{{--                                        <span class="badge {{ $training->admin_status == 'Pending' ? $training->admin_status == 'Approved' ? 'bg-success' : 'bg-warning' : 'bg-danger' }}">--}}
{{--                                            {{ $training->admin_status }}--}}
{{--                                        </span>--}}
{{--                                    </td>--}}
                                    <td class="text-center">{{ $training->creator->name }}</td>
                                    <td class="text-center">{{ date('d M, Y g:i A',strtotime($training->created_at)) }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-{{ $training->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $training->is_enabled ? 'Disable' : 'Enable' }}','{{ $training->id }}');">
                                            <i class="far {{ $training->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $training->is_enabled ? 'Disable' : 'Enable' }}
                                        </a>
                                        <form id="training-status-{{ $training->id }}" action="{{ route('trainings.update-status',$training->id) }}" method="POST" style="display: none;">@csrf</form>

                                        <a class="btn btn-xs btn-info" href="{{ route('trainings.edit',$training->id) }}"><i class="far fa-eye"></i> Edit</a>

                                        <a class="btn btn-xs btn-danger"  href="javascript:void(0);"  onclick="removeRecord('{{ $training->id }}');"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <form id="training-delete-{{ $training->id }}" action="{{ route('trainings.destroy',$training->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No Records found</td>
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
                        $('#training-status-'+id).submit();
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
                        $('#training-delete-'+id).submit();
                    }
                })
        }
    </script>
@endsection
