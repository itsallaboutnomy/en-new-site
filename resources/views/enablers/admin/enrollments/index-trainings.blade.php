@extends('enablers.admin.layouts.admin')

@section('page-title','| Enrollments')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Trainings Enrollments Table</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Trainings Enrollments Table</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box start-->
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered" id="enrollmentsTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Unique Code</th>
                                    <th>CNIC</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th>Payment Type</th>
                                    <th>Proof Submitted</th>
                                    <th>Approve Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- Default box end-->
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
            $('#enrollmentsTable').DataTable({
                processing: true,
                serverSide: true,
                iDisplayLength: 25,
                aLengthMenu: [[25, 50, 75, 100], [25, 50, 75, 100]],
                ajax: "{{ route('enrollments.trainings.data') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'unique_code', name: 'unique_code'},
                    {data: 'cnic', name: 'user.cnic', orderable: false},
                    {data: 'email', name: 'user.email'},
                    {data: 'payable_price', name: 'payable_price', searchable: false},
                    {data: 'payment_status', name: 'payment_status'},
                    {data: 'is_paid', name: 'is_paid', searchable: false},
                    {data: 'approve_status', name: 'approve_status', searchable: false},
                    {data: 'created_at', name: 'created_at', searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection
