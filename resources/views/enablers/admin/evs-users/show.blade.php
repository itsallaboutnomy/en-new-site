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
        <h1>Evs User Details</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('evs-users.index') }}">Evs Users</a></li>
            <li class="breadcrumb-item active">Evs User Details</li>
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
                                    <li> <label>Created At: </label> {{ date('D d M, Y',strtotime($evsUser->created_at)) }}</li>
                                    <li> <label>Name: </label> {{ $evsUser->name }}</li>
                                    <li> <label>Father Name: </label> {{ $evsUser->father_name }}</li>
                                    <li> <label>Email: </label> {{ $evsUser->email }}</li>
                                    <li> <label>City: </label> {{ $evsUser->city }}</li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="ml-0 pl-0">
                                    <li class="justify-content-end">
                                        @if($evsUser->type == \App\Models\User::$userType['evsRejected'])
                                        <a class="btn btn-sm btn-success" href="javascript:void(0);" onclick="updateStatus('Approve','{{ $evsUser->id }}');">Approved</a>
                                        <form id="evs-user-status-{{ $evsUser->id }}-approve" action="{{ route('evs-users.update-status',$evsUser->id) }}?status=approve" method="POST" style="display: none;">@csrf</form>

                                        @elseif($evsUser->type == \App\Models\User::$userType['evsUser'])
                                        <a class="btn btn-sm btn-danger ml-3" href="javascript:void(0);" onclick="updateStatus('Disapprove','{{ $evsUser->id }}');">Disapproved</a>
                                        <form id="evs-user-status-{{ $evsUser->id }}-disapprove" action="{{ route('evs-users.update-status',$evsUser->id) }}?status=disapprove" method="POST" style="display: none;">@csrf</form>

                                        @elseif($evsUser->type == \App\Models\User::$userType['evsVisitor'])
                                            <a class="btn btn-sm btn-success" href="javascript:void(0);" onclick="updateStatus('Approve','{{ $evsUser->id }}');">Approved</a>
                                            <form id="evs-user-status-{{ $evsUser->id }}-approve" action="{{ route('evs-users.update-status',$evsUser->id) }}?status=approve" method="POST" style="display: none;">@csrf</form>

                                            <a class="btn btn-sm btn-danger ml-3" href="javascript:void(0);" onclick="updateStatus('Disapprove','{{ $evsUser->id }}');">Disapproved</a>
                                            <form id="evs-user-status-{{ $evsUser->id }}-disapprove" action="{{ route('evs-users.update-status',$evsUser->id) }}?status=disapprove" method="POST" style="display: none;">@csrf</form>
                                        @endif

                                        <a href="" class="btn-sm pb-2 btn-info ml-3"  data-toggle="modal" data-target="#changepassword"> Change Password</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <section class="fr-forms-wrapper mt-2">
                                                            <div class="content">
                                                                <div class="container">
                                                                    <form  id="change-password-form" method="POST" action="{{ route('evs-users.change-password', $evsUser->id) }}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="row my-2">
                                                                            <div class="col-lg-12 mb-2">
                                                                                <div class="form-group required">
                                                                                    <label for="password" class="label">Password</label>
                                                                                    <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Enter New Password">
                                                                                    @error('password')
                                                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12 mb-2">
                                                                                <div class="form-group required">
                                                                                    <label for="password_confirmation" class="label">Confirm Password</label>
                                                                                    <input type="text" name="password_confirmation" id="password_confirmation" class="form-control @error('name') is-invalid @enderror" value="{{ old('password_confirmation') }}" placeholder="Enter Confirm Password">
                                                                                    @error('password_confirmation')
                                                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <button type="submit" class="btn btn-primary">Change Password</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                    <li> <label>User Status: </label>
                                            @if($evsUser->type ==='evs-visitor')
                                               <strong class="text-blue">Pending</strong>
                                            @elseif($evsUser->type ==='evs-user')
                                               <strong class="text-success">Approved</strong>
                                            @else
                                               <strong class="text-danger">Rejected</strong>
                                            @endif
                                    </li>
                                    <li> <label>CNIC or Passport : </label> {{ $evsUser->cnic }}</li>
                                    <li> <label>Country: </label> {{ $evsUser->country }}</li>
                                    <li> <label>Mobile: </label> {{ $evsUser->phone }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Payment Proofs-->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Images</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label>CNIC or Passport front</label>
                                        <img src="{{ _asset($evsUser->cnic_front_image_path) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label>CNIC or Passport back</label>
                                        <img src="{{ _asset($evsUser->cnic_back_image_path) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label>Utility bill Image</label>
                                        <img src="{{ _asset($evsUser->utility_bill_image_path) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label>Income poof Image</label>
                                        <img src="{{ _asset($evsUser->income_proof_image_path) }}">
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
@section('plugins')
    <script src="{{ _asset('assets-app/plugins/ezoom/ezoom.js') }}"></script>
@endsection

@section('scripts')
    <script>
        ezoom.onInit($('img'), {
            // options here
        });
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
