@extends('enablers.admin.layouts.admin')

@section('page-title','| Appointments Requests')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/daterangepicker/daterangepicker.css') }}">

@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Appointments Requests</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Appointments Requests</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered" id="appointmentTable">
                            <caption style="caption-side: top;">
                                <label>Date Filter:</label>
                                <input type="text" name="date_range" class="form-control float-right" id="reservation"  placeholder="Select date range" value="">
                            </caption>
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Office City</th>
                                <th>Appointment Date</th>
                                <th>Purpose of Visiting</th>
                                <th>Appointment Time</th>
                                <th>Created Date</th>
{{--                                <th>Action</th>--}}
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

    <script src="{{ _asset('assets-admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            $('#appointmentTable').DataTable({
                processing: true,
                serverSide: true,
                iDisplayLength: 25,
                aLengthMenu: [[25, 50, 75, 100], [25, 50, 75, 100]],
                ajax: "{{ route('appointments.data') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'full_name', name: 'full_name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone', orderable: false},
                    {data: 'office', name: 'office'},
                    {data: 'appointment_date', name: 'appointment_date'},
                    {data: 'purpose_visit', name: 'purpose_visit'},
                    {data: 'appointment_time', name: 'appointment_time'},
                    {data: 'created_at', name: 'created_at'},
                    // {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        $('#reservation').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD',
            },
            autoUpdateInput: false,
            maxDate: moment(),
        }).on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
            usersTable.draw();
        }).on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            usersTable.draw();
        });
    </script>
@endsection
