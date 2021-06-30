<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Enrollment;

use App\Models\User;
use App\Models\Enablers\Training;
use App\Models\Enablers\PaymentProof;
use App\Models\Enablers\PaymentAccount;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EnrollmentsController extends Controller
{
    protected $emisConn, $enrollment, $viewPrefix, $routePrefix;

    public function __construct(Enrollment $enrollment)
    {
        $this->enrollment = $enrollment;
        $this->viewPrefix = 'enablers.admin.enrollments.';
        $this->routePrefix = 'enrollments.';
        $this->emisConn = DB::connection('emis');
    }

    public function indexTrainings(){
        return view($this->viewPrefix.'index-trainings');
    }

    public function indexSeminars(){
        return view($this->viewPrefix.'index-seminars');
    }

    public function indexBookOrder(){
        return view($this->viewPrefix.'index-book-orders');
    }


    public function trainingEnrollmentsData(Request $request)
    {
        $enrollments = $this->enrollment
                            ->with(['user','training'])
                            ->where('training_id','!=' ,NULL)
                            ->orderBy('id','desc');

        return Datatables::of($enrollments)
            ->editColumn('payable_price',function ($model){
                return 'Rs. '.$model->payable_price;
            })
            ->editColumn('payment_type',function ($model){
                return ucfirst($model->payment_type);
            })
            ->editColumn('transaction_type',function ($model){
                return ucfirst($model->transaction_type);
            })
            ->editColumn('is_paid',function ($model){
                return $model->is_paid ? 'Yes' : 'No';
            })
            ->editColumn('approve_status',function ($model){
                return ucwords($model->approve_status);
            })
            ->editColumn('created_at',function ($model){
                return date('d M Y g:i A',strtotime($model->created_at));
            })

            ->addColumn('payment_status', function($model) {
                return $model->transaction_type ? ucwords($model->payment_type.' / '.$model->transaction_type) : ucwords($model->payment_type);
            })
            ->addColumn('email', function($model) {
                return $model->user->email;
            })
            ->addColumn('cnic', function($model) {
                return $model->user->cnic;
            })
            ->addColumn('action', function ($model) {
                return '<a href="'.route('enrollments.show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })

            ->make(true);
    }

    public function seminarsEnrollmentsData(Request $request)
    {
        $enrollments = $this->enrollment
                            ->with(['user','event'])
                            ->where('event_id','!=' ,NULL)
                            ->orderBy('id','desc');

        return Datatables::of($enrollments)
            ->editColumn('payable_price',function ($model){
                return 'Rs. '.$model->payable_price;
            })
            ->editColumn('is_paid',function ($model){
                return $model->is_paid ? 'Yes' : 'No';
            })
            ->editColumn('approve_status',function ($model){
                return ucwords($model->approve_status);
            })
            ->editColumn('created_at',function ($model){
                return date('d M Y g:i A',strtotime($model->created_at));
            })

            ->addColumn('event', function($model) {
                return $model->event->title;
            })
            ->addColumn('email', function($model) {
                return $model->user->email;
            })
            ->addColumn('cnic', function($model) {
                return $model->user->cnic;
            })
            ->addColumn('action', function ($model) {
                return '<a href="'.route('enrollments.show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })

            ->make(true);
    }

    public function bookOrdersData(Request $request)
    {
        $enrollments = $this->enrollment
            ->with(['user','training'])
            ->where('enroll_for','=' ,'book')
            ->orderBy('id','desc');

        return Datatables::of($enrollments)
            ->editColumn('payable_price',function ($model){
                return 'Rs. '.$model->payable_price;
            })
            ->editColumn('payment_type',function ($model){
                return ucfirst($model->payment_type);
            })
            ->editColumn('transaction_type',function ($model){
                return ucfirst($model->transaction_type);
            })
            ->editColumn('is_paid',function ($model){
                return $model->is_paid ? 'Yes' : 'No';
            })
            ->editColumn('approve_status',function ($model){
                return ucwords($model->approve_status);
            })
            ->editColumn('created_at',function ($model){
                return date('d M Y g:i A',strtotime($model->created_at));
            })

            ->addColumn('payment_status', function($model) {
                return $model->transaction_type ? ucwords($model->payment_type.' / '.$model->transaction_type) : ucwords($model->payment_type);
            })
            ->addColumn('email', function($model) {
                return $model->user->email;
            })
            ->addColumn('cnic', function($model) {
                return $model->user->cnic;
            })
            ->addColumn('action', function ($model) {
                return '<a href="'.route('enrollments.show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })

            ->make(true);
    }

    public function show(Request $request,$id)
    {
        $enrollment = $this->enrollment->with(['user','event','training','trainingBatch','trainingCity','trainer'])->find($id);

        if(!$enrollment){
            abort(404);
        }

        $enrollment->paymentProofs = $enrollment->paymentProofs()->paginate(15);

        return view($this->viewPrefix.'show',compact('enrollment'));
    }

    public function updatePaymentStatus(Request $request,$id)
    {
        $request->validate([
            'status' => ['required', Rule::in(['approved','rejected'])],
        ]);

        $enrollment = $this->enrollment->find($id);

        if(!$enrollment){
            abort(404);
        }

        $enrollment->approve_status = $request->status;
        $enrollment->save();

        return redirect()->back()->with('success','Enrollment Status Update Successfully');
    }

    public function destroy($id)
    {
        $enrollment = $this->enrollment->find($id);

        if(!$enrollment){
            return redirect()->back()->with('error','Enrolment not found');
        }

        foreach($enrollment->paymentProofs as $proof)
        {
            \File::delete($proof->payment_receipt_path);
            \File::delete($proof->cnic_front_image_path);
            \File::delete($proof->cnic_back_image_path);
            $proof->delete();
        }
        $enrollment->delete();

        return redirect()->route($this->routePrefix.'trainings.index')->with('success','Enrolment deleted successfully');
    }

    public function importEMISEnrollments()
    {
        User::where('type' ,'!=',User::$userType['adminGenerated'])->delete();

        Enrollment::getQuery()->delete();
        PaymentProof::getQuery()->delete();

        $enrollments = $this->emisConn
                            ->table('enrollments')
                            ->where('payment_status' ,'paid')
                            ->get();

        $defaultPaymentAccount = PaymentAccount::where('id',3)->first();

        foreach ($enrollments as $index => $emisEnrollment)
        {
            echo '<br>'.$index;

            $result = $this->importEMISUser($emisEnrollment->user_id,$emisEnrollment->unique_code);
            $emisUser = $result[0];
            $user = $result[1];

            if($emisUser && $user){
                $emisTraining = $this->emisConn->table('trainings')->whereId($emisEnrollment->training_id)->first();
                $training = Training::where('key',$emisTraining->key)->first();

                $paymentAccount = PaymentAccount::where('id',$emisEnrollment->payment_channel_id)->first();

                $approveStatus = [
                    'unpaid' => 'pending',
                    'approved' => 'approved',
                    'not approved' => 'rejected',
                ];;

                $existed = $this->enrollment->where('unique_code',$emisEnrollment->unique_code)->first();
                if(!$existed){
                    $enrollment = $this->enrollment->create([
                        'enroll_for' => 'training',
                        'mode' => $emisEnrollment->training_mode ? strtolower($emisEnrollment->training_mode) : 'online',

                        'user_id' => $user->id,
                        'training_id' => $training->id,
                        'training_batch_id' => $emisEnrollment->batch_id,
                        'training_city_id' => $emisEnrollment->training_city_id,

                        'counts' => $emisEnrollment->hours,
                        'unique_code' => $emisEnrollment->unique_code,

                        'transaction_type' => $paymentAccount ? $paymentAccount->type : $defaultPaymentAccount->type,
                        'payable_price' => $emisEnrollment->payable_price,
                        'payment_type' => $emisEnrollment->enrollment_type,
                        'payment_account_id' => $paymentAccount ? $paymentAccount->id : $defaultPaymentAccount->id,

                        'is_paid' => true,
                        'approve_status' => $emisEnrollment->approval_status ? $approveStatus[$emisEnrollment->approval_status] : 'pending',

                        'heard_from' => $emisUser->heard,
                        'comments' => $emisEnrollment->comments,
                        'occupation' => $emisEnrollment->occupation,
                        'challan_url' => $emisEnrollment->challan_url,
                    ]);

                    $paymentProofs = $this->emisConn->table('training_payments')->whereId($emisEnrollment->id)->get();
                    foreach ($paymentProofs as $proof)
                    {
                        $enrollment->paymentProofs()->create([
                            'paid_price' => $proof->payment,
                            'payment_date' => $proof->payment_date,

                            'payment_receipt_path' => $proof->payment_receipt_path,
                            'cnic_front_image_path' => $proof->cnic_front,
                            'cnic_back_image_path' => $proof->cnic_back
                        ]);
                    }
                }
            }
        }
    }

    private function importEMISUser($emisUserId,$emisUniqueCode)
    {
        $user = null;
        $emisUser = $this->emisConn->table('users')->whereId($emisUserId)->first();
        if($emisUser) {
            if(!$emisUser->cnic) {
                $emisUser->cnic = 'T-'.time();
            }

            $user = User::where('cnic',$emisUser->cnic)->first();
            if(!$user) {
                $user = User::create([
                    'type' => explode('-',$emisUniqueCode)[0] == 'EVS' ? User::$userType['evsVisitor'] : User::$userType['trainingStudent'],
                    'name' =>  Str::limit($emisUser->name,60,''),
                    'father_name' => Str::limit($emisUser->father_name,60,''),
                    'email' => Str::limit($emisUser->email,60,''),
                    'cnic' => Str::limit($emisUser->cnic,20,''),
                    'phone' => Str::limit($emisUser->phone,20,''),
                    'city' => Str::limit($emisUser->city,100,''),
                    'country' => Str::limit($emisUser->country,100,'')
                ]);
            }

        }

        return [$emisUser,$user];
    }
}
