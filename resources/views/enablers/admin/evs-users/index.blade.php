@extends('enablers.admin.layouts.admin')

@section('page-title','| Enrollments')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/daterangepicker/daterangepicker.css') }}">
    <style>
        #enrollmentsTable_length{
            display: inline-block;
        }
        .dt-buttons.btn-group.flex-wrap {
            display: inline-block;
            margin-left: 15px;
            float: right;
        }
        #enrollmentsTable_filter {
            display: inline-block;
            float: right;
        }
    </style>
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>EVS Users Table</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">EVS Users Table</li>
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
                            <caption style="caption-side: top;">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <input type="text" name="date_range" class="form-control" id="reservation" placeholder="Select Date Range" autocomplete="off">
                                    </div>
                                    <div class="col-lg-2">
                                        <select id='status' class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="evs-visitor">Pending</option>
                                            <option value="evs-user">Approved</option>
                                            <option value="evs-rejected">Rejected</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name Search" autocomplete="off">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" name="email" class="form-control" id="email" placeholder="Email Search" autocomplete="off">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" name="cnic" class="form-control" id="cnic" placeholder="CNIC Search" autocomplete="off">
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="submit" id="filter" class="btn btn-primary">Filter</button>
                                        <button type="submit" id="clear" class="btn btn-primary ml-2">Clear</button>
                                    </div>
                                </div>
                            </caption>
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>CNIC</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>city</th>
                                <th>Status</th>
                                <th>Password</th>
                                <th>Created Date</th>
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

    <script src="{{ _asset('assets-admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script>

        var usersTable = $('#enrollmentsTable').DataTable({
            bFilter: false,
            processing: true,
            serverSide: true,
            iDisplayLength: 25,
            aLengthMenu: [[25, 50, 75, 100], [25, 50, 75, 100]],
            ajax: {
                url: "{{ route('evs-users.data') }}",
                data: function (d) {
                    d.status = $('#status').val(),
                    d.date_range = $('input[name=date_range]').val();
                    d.name  = $('input[name=name]').val();
                    d.email = $('input[name=email]').val();
                    d.cnic = $('input[name=cnic]').val();
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name',orderable: true, searchable: true, visible: true},
                {data: 'cnic', name: 'cnic', orderable: false},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone', orderable: false},
                {data: 'city', name: 'city', searchable: false},
                {data: 'status', name: 'status'},
                {data: 'password_str', name: 'password_str'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            dom: 'lBfrtip',
            buttons: [
                {
                    extend: 'csv',
                    text: window.csvButtonTrans,
                    exportOptions: {
                        columns: [1,3,4,7,8,6],
                        format: {
                            header: function (data, columnIdx) {
                                if(columnIdx === 1) return  columnIdx === 1 ? "fullname" : data;
                                if(columnIdx === 3) return  columnIdx === 3 ? "your-email" : data;
                                if(columnIdx === 4) return  columnIdx === 4 ? "phone-number" : data;
                                if(columnIdx === 7) return  columnIdx === 7 ? "password" : data;
                                if(columnIdx === 8) return  columnIdx === 8 ? "submit_time" : data;
                                if(columnIdx === 6) return  columnIdx === 6 ? "approval_status" : data;
                            },
                        }
                    },
                },

            ],
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
        });

        $('#filter').click(function(){
            usersTable.draw();
        });

        $('#clear').click(function(){
            $('#status').val(''),
           $('input[name=date_range]').val('');
           $('input[name=name]').val('');
           $('input[name=email]').val('');
           $('input[name=cnic]').val('');
            usersTable.draw();
        });
        $('#reservation').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD',
            },
            autoUpdateInput: false,
            maxDate: moment(),
        }).on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
            // usersTable.draw();
        }).on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            // usersTable.draw();
        });

    </script>
@endsection
