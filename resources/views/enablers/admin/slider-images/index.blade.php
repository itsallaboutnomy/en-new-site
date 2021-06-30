@extends('enablers.admin.layouts.admin')

@section('page-title','| Slider Images')

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
        <h1>Slider Images List</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Slider Images List</li>
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
                        <h3 class="card-title">Slider Images Table</h3>
                        <div class="card-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('slider-images.create') }}"><i class="fas fa-plus-circle"></i> Add New Slider Image</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Order No.</th>
                                <th>Mobile Image</th>
                                <th>Web Image</th>
                                <th>Alt Name</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Created By</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($sliderImages as $image)
                                <tr>
                                    <td>{{ $image->order_number }}</td>
                                    <td class="">
                                        <div class="product-image-thumb">
                                            <img src="{{ _asset($image->mobile_image_path) }}" alt="Attachment Image">
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="product-image-thumb">
                                            <img src="{{ _asset($image->web_image_path) }}" alt="Attachment Image">
                                        </div>
                                    </td>
                                    <td>{{ $image->image_alt_name }}</td>
                                    <td class="text-center">
                                        <strong class="{{ $image->is_enabled ? 'text-success' : 'text-danger' }}">
                                            {{ $image->is_enabled ? 'Enabled' : 'Disabled' }}
                                        </strong>
                                    </td>
                                    <td class="text-center">{{ $image->creator->name }}</td>
                                    <td class="text-center">{{ date('d M, Y g:i A',strtotime($image->created_at)) }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-{{ $image->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $image->is_enabled ? 'Disable' : 'Enable' }}','{{ $image->id }}');">
                                            <i class="far {{ $image->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $image->is_enabled ? 'Disable' : 'Enable' }}
                                        </a>
                                        <form id="slider-image-status-{{ $image->id }}" action="{{ route('slider-images.update-status',$image->id) }}" method="POST" style="display: none;">@csrf</form>

                                        <a class="btn btn-xs btn-info" href="{{ route('slider-images.edit',$image->id) }}"><i class="far fa-eye"></i> Edit</a>

                                        <a class="btn btn-xs btn-danger"  href="javascript:void(0);" onclick="removeRecord('{{ $image->id }}');"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <form id="slider-image-delete-{{ $image->id }}" action="{{ route('slider-images.destroy',$image->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
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
                    $('#slider-image-status-'+id).submit();
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
                    $('#slider-image-delete-'+id).submit();
                }
            })
        }
    </script>
@endsection
