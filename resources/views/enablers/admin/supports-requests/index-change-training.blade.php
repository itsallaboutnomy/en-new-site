@extends('enablers.admin.layouts.admin')

@section('page-title','| Change of Training Requests')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Change of Training Requests</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Change of Training Requests</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered" id="change-training-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Training</th>
                                <th>batch</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Fee</th>
                                <th>No.of Classes</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ _asset('assets-admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            $('#change-training-table').DataTable({
                processing: true,
                serverSide: true,
                iDisplayLength: 25,
                aLengthMenu: [[25, 50, 75, 100], [25, 50, 75, 100]],
                ajax: "{{ route('support-requests.change-training.data') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'training_name', name: 'training_name', searchable: false, orderable: false},
                    {data: 'batch_name', name: 'batch_name', searchable: false, orderable: false},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone', orderable: false},
                    {data: 'fee', name: 'fee', orderable: false},
                    {data: 'no_of_classes', name: 'no_of_classes', orderable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection
