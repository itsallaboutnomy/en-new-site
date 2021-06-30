@extends('enablers.admin.layouts.admin')

@section('page-title','| Cities')

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
        <h1>Cities List</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Cities List</li>
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
                        <h3 class="card-title">Cities Table</h3>
                        <div class="card-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('cities.create') }}"><i class="fas fa-plus-circle"></i> Add New City</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th class="text-center">Name</th>
                                {{--                                <th class="text-center">Admin Status</th>--}}
                                <th class="text-center">status</th>
                                <th class="text-center">Created By</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($cities as $city)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $city->name }}</td>
                                    <td class="text-center">
                                        <strong class="{{ $city->is_enabled ? 'text-success' : 'text-danger' }}">
                                            {{ $city->is_enabled ? 'Enabled' : 'Disabled' }}
                                        </strong>
                                    </td>
                                    <td class="text-center">{{ $city->creator->name }}</td>
                                    <td class="text-center">{{ date('d M, Y g:i A',strtotime($city->created_at)) }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-{{ $city->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $city->is_enabled ? 'Disable' : 'Enable' }}','{{ $city->id }}');">
                                            <i class="far {{ $city->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $city->is_enabled ? 'Disable' : 'Enable' }}
                                        </a>
                                        <form id="city-status-{{ $city->id }}" action="{{ route('cities.update-status',$city->id) }}" method="POST" style="display: none;">@csrf</form>

                                        <a class="btn btn-xs btn-info" href="{{ route('cities.edit',$city->id) }}"><i class="far fa-eye"></i> Edit</a>

                                        <a class="btn btn-xs btn-danger"  href="javascript:void(0);"  onclick="removeRecord('{{ $city->id }}');"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <form id="city-delete-{{ $city->id }}" action="{{ route('cities.destroy',$city->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
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
                        $('#city-status-'+id).submit();
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
                        $('#city-delete-'+id).submit();
                        $('#city-delete-'+id).submit();
                    }
                })
        }
    </script>
@endsection
