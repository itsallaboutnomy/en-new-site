@extends('enablers.admin.layouts.admin')

@section('page-title','| Payment Accounts')

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
        <h1>Payment Accounts List</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Payment Accounts List</li>
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
                        <h3 class="card-title">Payment Accounts Table</h3>
                        <div class="card-tools">
                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('payment-accounts.create') }}"><i class="fas fa-plus-circle"></i> Add Payment Accounts</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Bank Name</th>
                                <th class="text-center">Account Title</th>
                                <th class="text-center">Account No</th>
                                <th class="text-center">IBAN</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Created By</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($paymentAccounts as $paymentAccount)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ ucwords($paymentAccount->type) }}</td>
                                    <td class="text-center">{{ ucwords($paymentAccount->bank_name) }}</td>
                                    <td class="text-center">{{ $paymentAccount->account_title  }}</td>
                                    <td class="text-center">{{ $paymentAccount->account_number }}</td>
                                    <td class="text-center">{{ $paymentAccount->iban }}</td>
                                    <td class="text-center">
                                        <strong class="{{ $paymentAccount->is_enabled ? 'text-success' : 'text-danger' }}">
                                            {{ $paymentAccount->is_enabled ? 'Enabled' : 'Disabled' }}
                                        </strong>
                                    </td>
                                    <td class="text-center">{{ $paymentAccount->creator->name }}</td>
                                    <td class="text-center">{{ date('d M, Y g:i A',strtotime($paymentAccount->created_at)) }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-{{ $paymentAccount->is_enabled ? 'warning' : 'success' }}" href="javascript:void(0);" onclick="updateStatus('{{ $paymentAccount->is_enabled ? 'Disable' : 'Enable' }}','{{ $paymentAccount->id }}');">
                                            <i class="far {{ $paymentAccount->is_enabled ? 'fa-window-close' : 'fa-check-square' }}"></i> {{ $paymentAccount->is_enabled ? 'Disable' : 'Enable' }}
                                        </a>
                                        <form id="payment-account-status-{{ $paymentAccount->id }}" action="{{ route('payment-accounts.update-status',$paymentAccount->id) }}" method="POST" style="display: none;">@csrf</form>

                                        <a class="btn btn-xs btn-info" href="{{ route('payment-accounts.edit',$paymentAccount->id) }}"><i class="far fa-eye"></i> Edit</a>

                                        <a class="btn btn-xs btn-danger"  href="javascript:void(0);"  onclick="removeRecord('{{ $paymentAccount->id }}');"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <form id="payment-account-delete-{{ $paymentAccount->id }}" action="{{ route('payment-accounts.destroy',$paymentAccount->id) }}" method="POST" style="display: none;">@csrf @method('DELETE')</form>
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
                        $('#payment-account-status-'+id).submit();
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
                        $('#payment-account-delete-'+id).submit();
                    }
                })
        }
    </script>
@endsection
