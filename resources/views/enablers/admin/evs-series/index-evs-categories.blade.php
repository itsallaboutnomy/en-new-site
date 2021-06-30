@extends('enablers.admin.layouts.admin')

@section('page-title','| EVS Categories')

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
        .dropdown-toggle::after {
            display: none;
        }
    </style>
@endsection

@section('content-header')
    <div class="col-sm-6">
        <h1>EVS Categories Table</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">EVS Categories Table</li>
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
                        <table class="table table-bordered" id="evs-categories-table">
                            <caption style="caption-side: top;">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <select name="category" id='category' class="form-control">
                                            <option value="">Select category</option>
                                            @foreach($series as $category)
                                                <option value={{$category->id}}>{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </caption>
                            <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Title</th>
                                    <th>Category</th>
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

        var evsCategoriesTable = $('#evs-categories-table').DataTable({
            processing: true,
            serverSide: true,
            iDisplayLength: 25,
            aLengthMenu: [[25, 50, 75, 100], [25, 50, 75, 100]],
            ajax: {
                url: "{{ route('evs-categories.data') }}",
                data: function (d) {
                    d.category = $('#category').val()
                }
            },
            columns: [
                {data: 'order_number', name: 'order_number',orderable: true, searchable: true, visible: true},
                {data: 'title', name: 'title'},
                {data: 'category', name: 'category', searchable: false},
                {data: 'status', name: 'status',  searchable: false},
                {data: 'created_at', name: 'created_at',  searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        $('#category').change(function(){
            evsCategoriesTable.draw();
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
                            evsCategoriesTable.draw();
                            swal.fire("Good job!", "Status Updated Successfully!", "success")
                        }
                    });
                }
            });
        }

        $('body')
            .on('click', '.update-status-enabled',function() {
                updateStatus('Enabled',$(this).data('url'));
            })
            .on('click', '.update-status-disabled',function() {
                updateStatus('Disabled',$(this).data('url'));
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
                                    evsCategoriesTable.draw();
                                    swal.fire("Good job!", "Category deleted successfully!", "success")
                                }
                            });
                        }
                    });
            })
    </script>
@endsection
