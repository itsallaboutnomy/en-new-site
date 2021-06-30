@extends('enablers.admin.layouts.admin')

@section('page-title','| Franchise Applications')

@section('styles')
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ _asset('assets-admin/plugins/daterangepicker/daterangepicker.css') }}">
    <style>
        .franchise-info ul {
            list-style-type: none;
        }
        .franchise-info li {
            border-bottom: 0.1rem solid #ccc;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 0.4rem 0;
        }
        .dropdown-toggle::after {
            display: none;
        }
    </style>
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>Franchise Applications Table</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"> Franchise Applications Table</li>
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
                                <th>Name</th>
                                <th>CNIC</th>
                                <th>Email</th>
                                <th>Shareholder</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Status</th>
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
    <!-- Modal -->
    <div class="modal fade" id="franchise-application-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body" id="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h4 style="display: inline;">Applicant Info</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card-body franchise-info">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="mb-0 ml-0 pl-0" id="applicant_info"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card h-100">
                                <div class="card-header"><h4>Contact Info</h4></div>
                                <div class="card-body franchise-info">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="mb-0 ml-0 pl-0" id="contact_info"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script src="{{ _asset('assets-admin/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ _asset('assets-admin/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script>
        var recordId = null;
        var usersTable = $('#enrollmentsTable').DataTable({
            processing: true,
            serverSide: true,
            iDisplayLength: 25,
            aLengthMenu: [[25, 50, 75, 100], [25, 50, 75, 100]],
            ajax: {
                url: "{{ route('franchise-applications.data') }}",
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name',orderable: true, searchable: true, visible: true},
                {data: 'cnic', name: 'cnic', orderable: false},
                {data: 'email', name: 'email'},
                {data: 'shareholder', name: 'shareholder',orderable: false, searchable: false},
                {data: 'phone', name: 'phone', orderable: false},
                {data: 'city', name: 'city', searchable: false},
                {data: 'admin_status', name: 'admin_status', searchable: false},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
        });

        function updateStatus(statusRequired,url){
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
                    $.ajax({
                        url: url,
                        type: "POST",
                        data:{
                            _token : "{{ csrf_token() }}",
                            status : statusRequired
                        },
                        success: function (data) {
                            usersTable.draw();
                        }
                    });
                }
            });
        }

        $('body')
        .on('click', '.update-status-approve',function() {
            updateStatus('Approve',$(this).data('url'));
        })
        .on('click', '.update-status-reject',function() {
            updateStatus('Reject',$(this).data('url'));
        })
        .on('click', '.delete-record',function() {
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
                        var url =  $(this).data('url');

                        $.ajax({
                            url: url,
                            type: "POST",
                            data:{_token : "{{ csrf_token() }}"},
                            success: function (result) {
                                usersTable.draw();
                            }
                        });
                    }
                });
        })
        .on('click', '.show-details',function() {
            var id = $(this).data('id');
            var url =  "franchise-applications" +'/' + id +'/show';

            if(recordId !== id){
                recordId = id;
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (data) {
                        $('#applicant_info').empty().append(data.applicant_info);
                        $('#contact_info').empty().append(data.contact_info);
                        $('#franchise-application-details').modal('show');
                    }
                });
            }
            else {
                $('#franchise-application-details').modal('show');
            }
        });
    </script>
@endsection
