@extends('enablers.admin.layouts.admin')

@section('page-title','| Evs User')

@section('styles')
    <style>
        .info-wrap li {
            border-bottom: 0.1rem solid #ccc;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 0.4rem 0;
            margin-bottom: 0.5rem;
        }
        .dropdown-toggle::after {
            display: none;

        }
    </style>
@endsection
@section('content-header')
    <div class="col-sm-6">
        <h1>Franchise Application Details</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('franchise-applications.index') }}">Franchise Applications</a></li>
            <li class="breadcrumb-item active">Franchise Application Details</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                <!-- Enrolled User Info-->
                <div class="card h-100">
                    <div class="card-body info-wrap">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="ml-0 pl-0">
                                    <li> <label>Created At: </label> {{ date('D d M, Y',strtotime($franchiseApplication->created_at)) }}</li>
                                    <li> <label>Name: </label> {{ $franchiseApplication->first_name. ' '.$franchiseApplication->last_name }}</li>
                                    <li> <label>Father Name: </label> {{ $franchiseApplication->father_name }}</li>
                                    <li> <label>Email: </label> {{ $franchiseApplication->email }}</li>
                                    <li> <label>City: </label> {{ $franchiseApplication->city }}</li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="ml-0 pl-0">
                                    <li class="justify-content-end">
                                        @if($franchiseApplication->admin_status == 'disapproved')
                                            <a class="btn btn-sm btn-success" href="javascript:void(0);" onclick="updateStatus('Approve','{{ $franchiseApplication->id }}');">Approved</a>
                                            <form id="evs-user-status-{{ $franchiseApplication->id }}-approve" action="{{ route('franchise-applications.update-status',$franchiseApplication->id) }}?status=approve" method="POST" style="display: none;">@csrf</form>

                                        @elseif($franchiseApplication->admin_status == 'approved')
                                            <a class="btn btn-sm btn-danger ml-3" href="javascript:void(0);" onclick="updateStatus('Disapprove','{{ $franchiseApplication->id }}');">Disapproved</a>
                                            <form id="evs-user-status-{{ $franchiseApplication->id }}-disapprove" action="{{ route('franchise-applications.update-status',$franchiseApplication->id) }}?status=disapprove" method="POST" style="display: none;">@csrf</form>

                                        @elseif($franchiseApplication->admin_status == 'pending')
                                            <a class="btn btn-sm btn-success" href="javascript:void(0);" onclick="updateStatus('Approve','{{ $franchiseApplication->id }}');">Approved</a>
                                            <form id="evs-user-status-{{ $franchiseApplication->id }}-approve" action="{{ route('franchise-applications.update-status',$franchiseApplication->id) }}?status=approve" method="POST" style="display: none;">@csrf</form>

                                            <a class="btn btn-sm btn-danger ml-3" href="javascript:void(0);" onclick="updateStatus('Disapprove','{{ $franchiseApplication->id }}');">Disapproved</a>
                                            <form id="evs-user-status-{{ $franchiseApplication->id }}-disapprove" action="{{ route('franchise-applications.update-status',$franchiseApplication->id) }}?status=disapprove" method="POST" style="display: none;">@csrf</form>
                                        @endif

                                    </li>
                                    <li> <label>User Status: </label>
                                        @if($franchiseApplication->admin_status ==='pending')
                                            <strong class="text-blue">Pending</strong>
                                        @elseif($franchiseApplication->admin_status ==='approved')
                                            <strong class="text-success">Approved</strong>
                                        @else
                                            <strong class="text-danger">Rejected</strong>
                                        @endif
                                    </li>
                                    <li> <label>CNIC or Passport : </label> {{ $franchiseApplication->cnic }}</li>
                                    <li> <label>Country: </label> {{ $franchiseApplication->country }}</li>
                                    <li> <label>Mobile: </label> {{ $franchiseApplication->phone }}</li>
                                    <li> <label>Address: </label> {{ $franchiseApplication->address }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('plugins')

@endsection

@section('scripts')
    <script>
        function updateStatus(statusRequired, id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to "+statusRequired+" this user!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, '+statusRequired+' it!'
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        $('#evs-user-status-'+id+'-'+statusRequired.toLowerCase()).submit();
                    }
                })
        }
    </script>
@endsection
