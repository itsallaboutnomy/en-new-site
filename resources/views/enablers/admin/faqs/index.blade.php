@extends('enablers.admin.layouts.admin')

@section('page-title','| FAQs')

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
        .faq-title, .faq-content {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
        }
    </style>
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>FAQs List</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">FAQs List</li>
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
                        <h3 class="card-title">FAQs Table</h3>
                        <div class="card-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('faqs.create') }}"><i class="fas fa-plus-circle"></i> Add New FAQs</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th class="text-center">status</th>
                                <th class="text-center">Created By</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($faqs as $faq)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="faq-title">{{ $faq->title }}</td>
                                    <td class="faq-content">{{ $faq->content }}</td>
                                    <td class="text-center">
                                        <strong class="{{ $faq->is_enabled ? 'text-success' : 'text-danger' }}">
                                            {{ $faq->is_enabled ? 'Enabled' : 'Disabled' }}
                                        </strong>
                                    </td>
                                    <td class="text-center">{{ $faq->creator->name }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-{{ $faq->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $faq->is_enabled ? 'Disable' : 'Enable' }}','{{ $faq->id }}');">
                                            <i class="far {{ $faq->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $faq->is_enabled ? 'Disable' : 'Enable' }}
                                        </a>
                                        <form id="faq-status-{{ $faq->id }}" action="{{ route('faqs.update-status',$faq->id) }}" method="POST" style="display: none;">@csrf</form>

                                        <a class="btn btn-xs btn-info" href="{{ route('faqs.edit',$faq->id) }}"><i class="far fa-eye"></i> Edit</a>

                                        <a class="btn btn-xs btn-danger"  href="javascript:void(0);"  onclick="removeRecord('{{ $faq->id }}');"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <form id="faq-delete-{{ $faq->id }}" action="{{ route('faqs.destroy',$faq->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
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
                        $('#faq-status-'+id).submit();
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
                        $('#faq-delete-'+id).submit();
                        $('#faq-delete-'+id).submit();
                    }
                })
        }
    </script>
@endsection
