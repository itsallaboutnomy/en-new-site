@extends('enablers.admin.layouts.admin')

@section('page-title','| Skills')

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
        <h1>Skills List</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Skills List</li>
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
                        <h3 class="card-title">Skill Table</h3>
                        <div class="card-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('skills.create') }}"><i class="fas fa-plus-circle"></i> Add New Skill</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Created By</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($skills as $skill)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $skill->name }}</td>
                                    <td class="text-center">
                                        <strong class="{{ $skill->is_enabled ? 'text-success' : 'text-danger' }}">
                                            {{ $skill->is_enabled ? 'Enabled' : 'Disabled' }}
                                        </strong>
                                    </td>
                                    <td class="text-center">{{ $skill->creator->name }}</td>
                                    <td class="text-center">{{ date('d M, Y g:i A',strtotime($skill->created_at)) }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-{{ $skill->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $skill->is_enabled ? 'Disable' : 'Enable' }}','{{ $skill->id }}');">
                                            <i class="far {{ $skill->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $skill->is_enabled ? 'Disable' : 'Enable' }}
                                        </a>
                                        <form id="skill-status-{{ $skill->id }}" action="{{ route('skills.update-status',$skill->id) }}" method="POST" style="display: none;">@csrf</form>

                                        <a class="btn btn-xs btn-info" href="{{ route('skills.edit',$skill->id) }}"><i class="far fa-eye"></i> Edit</a>

                                        <a class="btn btn-xs btn-danger"  href="javascript:void(0);"  onclick="removeRecord('{{ $skill->id }}');"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <form id="skill-delete-{{ $skill->id }}" action="{{ route('skills.destroy',$skill->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
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
                        $('#skill-status-'+id).submit();
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
                        $('#skill-delete-'+id).submit();
                    }
                })
        }
    </script>
@endsection
