@extends('enablers.admin.layouts.admin')

@section('page-title','| Redirect Urls')

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

        .redirect-to, .redirect-from {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
        }
    </style>
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Redirect Urls List</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Redirect Urls List</li>
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
                        <h3 class="card-title">Redirect Urls Table</h3>
                        <div class="card-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('redirect-urls.create') }}"><i class="fas fa-plus-circle"></i> Add Redirect Url</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Url Name</th>
                                <th>Redirect From</th>
                                <th>Redirect to</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Created By</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($redirectUrls as $redirectUrl)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $redirectUrl->url_name }}</td>
                                    <td class="redirect-from">{{ $redirectUrl->redirect_from }}</td>
                                    <td class="redirect-to">{{ $redirectUrl->redirect_to  }}</td>
                                    <td class="text-center">
                                        <strong class="{{ $redirectUrl->is_enabled ? 'text-success' : 'text-danger' }}">
                                            {{ $redirectUrl->is_enabled ? 'Enabled' : 'Disabled' }}
                                        </strong>
                                    </td>
                                    <td class="text-center">{{ $redirectUrl->creator->name }}</td>
                                    <td class="text-center">{{ date('d M, Y g:i A',strtotime($redirectUrl->created_at)) }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-{{ $redirectUrl->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $redirectUrl->is_enabled ? 'Disable' : 'Enable' }}','{{ $redirectUrl->id }}');">
                                            <i class="far {{ $redirectUrl->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $redirectUrl->is_enabled ? 'Disable' : 'Enable' }}
                                        </a>
                                        <form id="redirect-url-status-{{ $redirectUrl->id }}" action="{{ route('redirect-urls.update-status',$redirectUrl->id) }}" method="POST" style="display: none;">@csrf</form>

                                        <a class="btn btn-xs btn-info" href="{{ route('redirect-urls.edit',$redirectUrl->id) }}"><i class="far fa-eye"></i> Edit</a>

                                        <a class="btn btn-xs btn-danger"  href="javascript:void(0);"  onclick="removeRecord('{{ $redirectUrl->id }}');"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <form id="redirect-url-delete-{{ $redirectUrl->id }}" action="{{ route('redirect-urls.destroy',$redirectUrl->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
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
                        $('#redirect-url-status-'+id).submit();
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
                        $('#redirect-url-delete-'+id).submit();
                    }
                })
        }
    </script>
@endsection
