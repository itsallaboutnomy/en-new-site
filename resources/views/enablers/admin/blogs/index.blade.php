@extends('enablers.admin.layouts.admin')

@section('page-title','| Blogs')

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
        .title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
        }
    </style>
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Blogs List</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Blogs List</li>
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
                        <h3 class="card-title">Blogs Table</h3>
                        <div class="card-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('blogs.create') }}"><i class="fas fa-plus-circle"></i> Add New Blog</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Blog Image</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Created By</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($blogs as $blog)
                                <tr>
                                    <td class="product-image-thumbs">
                                        <div class="product-image-thumb">
                                            <img src="{{ _asset($blog->blog_image) }}" alt="blog Logo">
                                        </div>
                                    </td>
                                    <td class="title">{{ $blog->title }}</td>
                                    <td>{{ $blog->author }}</td>
                                    <td>{{ ucfirst($blog->category) }}</td>
                                    <td class="text-center">
                                        <strong class="{{ $blog->is_enabled ? 'text-success' : 'text-danger' }}">
                                            {{ $blog->is_enabled ? 'Enabled' : 'Disabled' }}
                                        </strong>
                                    </td>
                                    <td class="text-center">{{ $blog->creator->name }}</td>
                                    <td class="text-center">{{ date('d M, Y g:i A',strtotime($blog->date)) }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-{{ $blog->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $blog->is_enabled ? 'Disable' : 'Enable' }}','{{ $blog->id }}');">
                                            <i class="far {{ $blog->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $blog->is_enabled ? 'Disable' : 'Enable' }}
                                        </a>
                                        <form id="blog-status-{{ $blog->id }}" action="{{ route('blogs.update-status',$blog->id) }}" method="POST" style="display: none;">@csrf</form>

                                        <a class="btn btn-xs btn-info" href="{{ route('blogs.edit',$blog->id) }}"><i class="far fa-eye"></i> Edit</a>

                                        <a class="btn btn-xs btn-danger"  href="javascript:void(0);"  onclick="removeRecord('{{ $blog->id }}');"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <form id="blog-delete-{{ $blog->id }}" action="{{ route('blogs.destroy',$blog->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
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
                        $('#blog-status-'+id).submit();
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
                        $('#blog-delete-'+id).submit();
                    }
                })
        }
    </script>
@endsection
