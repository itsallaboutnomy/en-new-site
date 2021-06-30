@extends('enablers.admin.layouts.admin')

@section('page-title','| Achievements')

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
        <h1>Achievements List</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Achievements List</li>
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
                        <h3 class="card-title">Achievements Table</h3>
                        <div class="card-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('achievements.create') }}"><i class="fas fa-plus-circle"></i> Add New Achievement</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Logo</th>
                                <th class="text-center">Order Number</th>
                                <th>Title</th>
                                <th class="text-center">Status</th>
{{--                                <th class="text-center">Admin Status</th>--}}
                                <th class="text-center">Created By</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($achievements as $achievement)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="product-image-thumbs">
                                        <div class="product-image-thumb">
                                            <img src="{{ _asset($achievement->logo_path) }}" alt="Achievement Logo">
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $achievement->order_number }}</td>
                                    <td>{{ $achievement->title }}</td>
                                    <td class="text-center">
                                        <strong class="{{ $achievement->is_enabled ? 'text-success' : 'text-danger' }}">
                                            {{ $achievement->is_enabled ? 'Enabled' : 'Disabled' }}
                                        </strong>
                                    </td>
{{--                                    <td class="text-center">--}}
{{--                                        <span class="badge {{ $achievement->admin_status == 'Pending' ? $achievement->admin_status == 'Approved' ? 'bg-success' : 'bg-warning' : 'bg-danger' }}">--}}
{{--                                            {{ $achievement->admin_status }}--}}
{{--                                        </span>--}}
{{--                                    </td>--}}
                                    <td class="text-center">{{ $achievement->creator->name }}</td>
                                    <td class="text-center">{{ date('d M, Y g:i A',strtotime($achievement->created_at)) }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-{{ $achievement->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $achievement->is_enabled ? 'Disable' : 'Enable' }}','{{ $achievement->id }}');">
                                            <i class="far {{ $achievement->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $achievement->is_enabled ? 'Disable' : 'Enable' }}
                                        </a>
                                        <form id="achievement-status-{{ $achievement->id }}" action="{{ route('achievements.update-status',$achievement->id) }}" method="POST" style="display: none;">@csrf</form>

                                        <a class="btn btn-xs btn-info" href="{{ route('achievements.edit',$achievement->id) }}"><i class="far fa-eye"></i> Edit</a>

                                        <a class="btn btn-xs btn-danger"  href="javascript:void(0);"  onclick="removeRecord('{{ $achievement->id }}');"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <form id="achievement-delete-{{ $achievement->id }}" action="{{ route('achievements.destroy',$achievement->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
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
                    $('#achievement-status-'+id).submit();
                }
            });
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
                    $('#achievement-delete-'+id).submit();
                }
            });
        }
    </script>
@endsection
