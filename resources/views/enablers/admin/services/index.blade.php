@extends('enablers.admin.layouts.admin')

@section('page-title','| Services')

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
        <h1>Services List</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Services List</li>
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
                        <h3 class="card-title">Services Table</h3>
                        <div class="card-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('services.create') }}"><i class="fas fa-plus-circle"></i> Add New Service</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">URL</th>
                                <th class="text-center">Category</th>

                                <th class="text-center">Status</th>
{{--                                <th class="text-center">Admin Status</th>--}}
                                <th class="text-center">Created By</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="product-image-thumbs">
                                        <div class="product-image-thumb">
                                            <img src="{{ _asset($service->service_image_path) }}" alt="Attachment Image">
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $service->name }}</td>
                                    <td class="text-center">{{ $service->url }}</td>
                                    <td class="text-center">{{ $service->category }}</td>

                                    <td class="text-center">
                                        <strong class="{{ $service->is_enabled ? 'text-success' : 'text-danger' }}">
                                            {{ $service->is_enabled ? 'Enabled' : 'Disabled' }}
                                        </strong>
                                    </td>
                                    <td class="text-center">{{ $service->creator->name }}</td>
                                    <td class="text-center">{{ date('d M, Y g:i A',strtotime($service->created_at)) }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-{{ $service->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $service->is_enabled ? 'Disable' : 'Enable' }}','{{ $service->id }}');">
                                            <i class="far {{ $service->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $service->is_enabled ? 'Disable' : 'Enable' }}
                                        </a>
                                        <form id="service-status-{{ $service->id }}" action="{{ route('services.update-status',$service->id) }}" method="POST" style="display: none;">@csrf</form>

                                        <a class="btn btn-xs btn-info" href="{{ route('services.edit',$service->id) }}"><i class="far fa-eye"></i> Edit</a>

                                        <a class="btn btn-xs btn-danger"  href="javascript:void(0);"  onclick="removeRecord('{{ $service->id }}');"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <form id="service-delete-{{ $service->id }}" action="{{ route('services.destroy',$service->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
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
                        $('#service-status-'+id).submit();
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
                        $('#service-delete-'+id).submit();
                    }
                })
        }
    </script>
@endsection
