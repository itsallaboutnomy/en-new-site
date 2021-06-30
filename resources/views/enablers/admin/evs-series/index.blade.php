@extends('enablers.admin.layouts.admin')

@section('page-title','| EVS Categories')

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
        .title,.category {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 150px;
        }
    </style>
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>EVS Categories List</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">EVS Categories List</li>
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
                        <h3 class="card-title">EVS Categories Table</h3>
                        <div class="card-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('evs-series.create') }}"><i class="fas fa-plus-circle"></i> Add New EVS Category</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th class="text-center">Order Number</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($series as $category)
                                <tr>
                                    <td class="text-center">{{ $category->order_number }}</td>

                                    <td class="title">{{ $category->title }}</td>
                                    <td class="category">{{ $category->category ? $category->category->title : '' }}</td>
                                    <td class="text-center">
                                        <strong class="{{ $category->is_enabled ? 'text-success' : 'text-danger' }}">
                                            {{ $category->is_enabled ? 'Enabled' : 'Disabled' }}
                                        </strong>
                                    </td>
                                    <td class="text-center">{{ date('d M, Y g:i A',strtotime($category->created_at)) }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-{{ $category->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $category->is_enabled ? 'Disable' : 'Enable' }}','{{ $category->id }}');">
                                            <i class="far {{ $category->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $category->is_enabled ? 'Disable' : 'Enable' }}
                                        </a>
                                        <form id="category-status-{{ $category->id }}" action="{{ route('evs-series.update-status',$category->id) }}" method="POST" style="display: none;">@csrf</form>

                                        <a class="btn btn-xs btn-info" href="{{ route('evs-series.edit',$category->id) }}"><i class="far fa-eye"></i> Edit</a>

                                        <a class="btn btn-xs btn-danger"  href="javascript:void(0);"  onclick="removeRecord('{{ $category->id }}');"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <form id="category-delete-{{ $category->id }}" action="{{ route('evs-series.destroy',$category->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
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
                        $('#category-status-'+id).submit();
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
                        $('#category-delete-'+id).submit();
                    }
                })
        }
    </script>
@endsection
