@extends('enablers.admin.layouts.admin')

@section('page-title','| Careers')

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
        <h1>Careers List</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Careers List</li>
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
                        <h3 class="card-title">Careers Table</h3>
                        <div class="card-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('careers.create') }}"><i class="fas fa-plus-circle"></i> Add New Career</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th class="text-center">Location</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Created By</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($careers as $career)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $career->title }}</td>
                                    <td>{{ $career->sub_title }}</td>
                                    <td class="text-center">{{ $career->location  }}</td>
                                    <td class="text-center">
                                        <strong class="{{ $career->is_enabled ? 'text-success' : 'text-danger' }}">
                                            {{ $career->is_enabled ? 'Enabled' : 'Disabled' }}
                                        </strong>
                                    </td>
                                    <td class="text-center">{{ $career->creator->name }}</td>
                                    <td class="text-center">{{ date('d M, Y g:i A',strtotime($career->created_at)) }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-{{ $career->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $career->is_enabled ? 'Disable' : 'Enable' }}','{{ $career->id }}');">
                                            <i class="far {{ $career->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $career->is_enabled ? 'Disable' : 'Enable' }}
                                        </a>
                                        <form id="career-status-{{ $career->id }}" action="{{ route('careers.update-status',$career->id) }}" method="POST" style="display: none;">@csrf</form>

                                        <a class="btn btn-xs btn-info" href="{{ route('careers.edit',$career->id) }}"><i class="far fa-eye"></i> Edit</a>

                                        <a class="btn btn-xs btn-danger"  href="javascript:void(0);"  onclick="removeRecord('{{ $career->id }}');"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <form id="career-delete-{{ $career->id }}" action="{{ route('careers.destroy',$career->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
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
                        $('#career-status-'+id).submit();
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
                        $('#career-delete-'+id).submit();
                    }
                })
        }
    </script>
@endsection
