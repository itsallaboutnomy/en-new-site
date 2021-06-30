@extends('enablers.admin.layouts.admin')

@section('page-title','| Enrollment Details')

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
        <h1>{{$enrollment->enroll_for == 'book' ? 'Book Order Details:':'Enrollments Details:'}}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            @if($enrollment->enroll_for != 'book')
            <li class="breadcrumb-item"><a href="{{ route('enrollments.trainings.index') }}">Training Enrollments</a></li>
            <li class="breadcrumb-item"><a href="{{ route('enrollments.seminars.index') }}">Seminars Enrollments</a></li>
            <li class="breadcrumb-item active">Enrollments Details</li>
            @else
                <li class="breadcrumb-item"><a href="{{ route('enrollments.book-orders.index') }}">Book Orders</a></li>
                <li class="breadcrumb-item active">Book Order Details</li>
            @endif
        </ol>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if($enrollment->enroll_for != 'book')
             <div class="col-lg-12">
                <ul class="list-inline text-right">
                    <li class="list-inline-item">
                        <a href="javascript:void(0);" class="btn btn-success" onclick="updateStatus('Approved','{{ $enrollment->id }}');">Approve Enrollment</a>
                        <form id="enrollment-approved-{{ $enrollment->id }}" action="{{ route('enrollments.update-status',$enrollment->id) }}" method="POST" style="display: none;">
                            @csrf <input type="hidden" name='status' value="approved">
                        </form>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="updateStatus('Rejected','{{ $enrollment->id }}');">Reject Enrollment</a>
                        <form id="enrollment-rejected-{{ $enrollment->id }}" action="{{ route('enrollments.update-status',$enrollment->id) }}" method="POST" style="display: none;">
                            @csrf <input type="hidden" name='status' value="rejected">
                        </form>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-danger"  href="javascript:void(0);"  onclick="removeRecord('{{ $enrollment->id }}');"><i class="fas fa-trash-alt"></i> Delete Enrollment</a>
                        <form id="enrollment-deleted-{{ $enrollment->id }}" action="{{ route('enrollments.delete',$enrollment->id) }}" method="POST" style="display: none;">@csrf</form>
                    </li>
                </ul>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                <!-- Enrolled User Info-->
                <div class="card h-100">
                    <div class="card-header">
                        <h4>Enrolled User Info</h4>
                    </div>
                    <div class="card-body info-wrap">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="ml-0 pl-0">
                                    <li> <label>Name: </label> {{ $enrollment->user->name }}</li>
                                    <li> <label>Father Name: </label> {{ $enrollment->user->father_name }}</li>
                                    <li> <label>CNIC or Passport : </label> {{ $enrollment->user->cnic }}</li>
                                    <li> <label>Email: </label> {{ $enrollment->user->email }}</li>
                                    <li> <label>Mobile: </label> {{ $enrollment->user->phone }}</li>
                                    <li> <label>Country: </label> {{ $enrollment->user->country }}</li>
                                    <li> <label>City: </label> {{ $enrollment->user->city }}</li>
                                    <li> <label>Heard From: </label> {{ $enrollment->heard_from }}</li>
                                    <li> <label>Created At: </label> {{ date('D d M, Y',strtotime($enrollment->user->created_at)) }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                <!-- Enrollment Info-->
                <div class="card h-100">
                    <div class="card-header">
                        <h4> {{$enrollment->enroll_for == 'book' ? 'Order Info:':'Enrollment Info'}} </h4>
                    </div>
                    <div class="card-body info-wrap">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="ml-0 pl-0">
                                    <li ><label> {{$enrollment->enroll_for == 'book' ? 'Status:':'Enrollment Status:'}} </label>
                                        <strong class="@if($enrollment->approve_status === 'approved') text-success @elseif($enrollment->approve_status === 'pending') text-primary @else text-danger @endif">
                                            {{ ucwords($enrollment->approve_status) }}
                                        </strong>
                                    </li>
                                    @if($enrollment->enroll_for == 'book')
                                        <li><label>Order For:</label> {{$enrollment->enroll_for_title }}</li>
                                    @else
                                        <li><label>Enrolled For:</label> {{ $enrollment->training->key == 'EVS' ? 'EVS' : $enrollment->enroll_for }}</li>
                                    @endif

                                    <li> <label>Unique Code: </label> {{ $enrollment->unique_code }}</li>
                                    @if($enrollment->enroll_for == 'training' || $enrollment->enroll_for == 'trainer')
                                        <li> <label>Training Name: </label> {{ $enrollment->training->title }}</li>
                                        @if($enrollment->enroll_for == 'trainer')
                                            <li> <label>Trainer Name: </label> {{ $enrollment->trainer->name }}</li>
                                            <li> <label>Mentorship Type: </label> {{ $enrollment->counts ? 'Full Classes' : 'Hourly' }}</li>
                                            @if($enrollment->counts)
                                                <li> <label>Enrolled for Hours: </label> {{ $enrollment->counts }}</li>
                                            @endif
                                        @endif

                                        @if($enrollment->enroll_for != 'trainer' and $enrollment->training->key !== 'EVS')
                                            <li><label>Batch Name:</label> {{ $enrollment->trainingBatch->name }}</li>
                                        @endif
                                        <li> <label>Training Mode: </label> {{ ucfirst($enrollment->mode) }}</li>
                                        <li> <label>Training City: </label> {{ $enrollment->trainingCity ? $enrollment->trainingCity->name : 'N/A' }} </li>
                                    @elseif($enrollment->enroll_for == 'seminar')
                                        <li> <label>Seminar Name: </label> {{ $enrollment->event->title }}</li>
                                        <li> <label>Event Date: </label> {{ date('d D M Y',strtotime($enrollment->event->starting_at)) }}</li>
                                        <li> <label>No of Seats: </label> {{ $enrollment->counts }}</li>
                                    @endif
                                    <li> <label>Payment : </label> {{ ucfirst($enrollment->payment_type) }} {{ $enrollment->transaction_type ? '/'.ucfirst($enrollment->transaction_type) : ''}}</li>
                                    <li> <label>Payable Price: </label> Rs. {{ $enrollment->payable_price }}</li>
                                    <li> <label>Created At: </label> {{ date('D d M, Y g:i A',strtotime($enrollment->created_at)) }}</li>
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
                        <h4> Payment Proof</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-hover text-nowrap">
                                        <thead class="border-top-0">
                                        <tr class="border-top-0">
                                            <th class="border-top-0 border-bottom-0">No.</th>
                                            <th class="text-center border-top-0 border-bottom-0">User Entered Price</th>
                                            <th class="text-center border-top-0 border-bottom-0">Payment Date</th>
                                            <th class="text-center border-top-0 border-bottom-0">Submitted Date</th>
                                            <th class="text-center border-top-0 border-bottom-0">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($enrollment->paymentProofs as $proof)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-center">Rs. {{ $proof->paid_price }}</td>
                                                <td class="text-center">{{ date('d M, Y',strtotime($proof->payment_date)) }}</td>
                                                <td class="text-center">{{ date('d M, Y g:i A',strtotime($proof->created_at)) }}</td>

                                                <td class="text-center">
                                                    <div class="dropdown no-arrow">
                                                        <a class="dropdown-toggle p-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cnicFront{{ $proof->id }}"> CNIC Front</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cnicBack{{ $proof->id }}"> CNIC Back</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#paymentReceipt{{ $proof->id }}"> Payment Receipt</a>
                                                        </div>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="cnicFront{{ $proof->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">CNIC Front Image</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img src="{{ _asset($proof->cnic_front_image_path) }}" alt="CNIC Front Image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="cnicBack{{ $proof->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">CNIC Back Image</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img src="{{_asset($proof->cnic_back_image_path) }}" alt="CNIC Front Image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="paymentReceipt{{ $proof->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">Payment Receipt Image</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img src="{{ _asset($proof->payment_receipt_path) }}" alt="CNIC Front Image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No Records Found</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{ $enrollment->paymentProofs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
     function updateStatus(statusRequired, id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to "+statusRequired+" enrollment!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, '+statusRequired+' it!'
            })
            .then((result) => {
                if (result.isConfirmed) {
                    if(statusRequired.toLowerCase() == 'approved'){
                    $('#enrollment-approved-'+id).submit();
                    }
                    else{

                        $('#enrollment-rejected-'+id).submit();

                    }
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
                        $('#enrollment-deleted-'+id).submit();
                    }
                })
        }
</script>
@endsection
