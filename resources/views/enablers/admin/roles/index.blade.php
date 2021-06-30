@extends('enablers.admin.layouts.admin')

@section('page-title','| Roles')

@section('styles')
    <style>
        .table td{
            vertical-align: middle;
        }
    </style>
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Roles List</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Roles List</li>
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
                        <h3 class="card-title">Roles Table</h3>
                        <div class="card-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('roles.create') }}"><i class="fas fa-plus-circle"></i> Add New Role</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $role->name }}</td>
                                    <td class="text-center">{{ date('d M, Y g:i A',strtotime($role->created_at)) }}</td>
                                    <td class="text-center">
{{--                                        <a class="btn btn-xs btn-{{ $role->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $role->is_enabled ? 'Disable' : 'Enable' }}','{{ $role->id }}');">--}}
{{--                                            <i class="far {{ $role->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $role->is_enabled ? 'Disable' : 'Enable' }}--}}
{{--                                        </a>--}}
{{--                                        <form id="city-status-{{ $role->id }}" action="{{ route('cities.update-status',$role->id) }}" method="POST" style="display: none;">@csrf</form>--}}

                                        <a class="btn btn-xs btn-info" href="{{ route('roles.edit',$role->id) }}"><i class="far fa-eye"></i> Edit</a>

                                        <a class="btn btn-xs btn-danger"  href="javascript:void(0);"  onclick="removeRecord('{{ $role->id }}');"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <form id="role-delete-{{ $role->id }}" action="{{ route('roles.destroy',$role->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
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
                        $('#role-delete-'+id).submit();
                    }
                })
        }
    </script>
@endsection
