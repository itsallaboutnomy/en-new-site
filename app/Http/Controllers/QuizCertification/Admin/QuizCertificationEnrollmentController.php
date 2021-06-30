<?php

namespace App\Http\Controllers\QuizCertification\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz\QuizCertificationEnrollment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;


class QuizCertificationEnrollmentController extends Controller
{
    protected $quizEnrollment, $viewPrefix, $routePrefix;

    public function __construct(QuizCertificationEnrollment $quizEnrollment)
    {
        $this->quizEnrollment = $quizEnrollment;
        $this->viewPrefix = 'quiz-certification.admin.enrollments.';
        $this->routePrefix = 'quiz-enrollments.';
    }
    public function index(){

        return view($this->viewPrefix.'index');
    }
    public function quizEnrollmentData(){
        $quizEnrollment = $this->quizEnrollment
            ->with(['user'])
            ->orderBy('id','desc');

        return Datatables::of($quizEnrollment)
            ->addColumn('name', function($model) {
                return $model->user->name;
            }) ->addColumn('email', function($model) {
                return $model->user->email;
            })
            ->addColumn('cnic', function($model) {
                return $model->user->cnic;
            })
            ->addColumn('created_at' ,function ($model){
                return date('d Y M g:i A',strtotime($model->created_at));
            })
            ->addColumn('payment_status', function ($model){
                if($model->payment_status =='pending')return'<strong class="text-blue">Pending</strong>';
                if($model->payment_status ==='approved') return'<strong class="text-success">Approved</strong>';
                if($model->payment_status ==='rejected') return'<strong class="text-danger">Rejected</strong>';
            })
            ->addColumn('action', function ($model) {
                return '<a href="'.route('quiz-enrollments.show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })
            ->rawColumns(['payment_status','action'])
            ->make(true);
    }
    public function show($id){

        $quizEnrollment = $this->quizEnrollment->with(['user'])->find($id);

        if(!$quizEnrollment){
            abort(404);
        }
        $quizEnrollment->paymentProofs = $quizEnrollment->paymentProofs()->paginate(15);
        return view($this->viewPrefix.'show',compact('quizEnrollment'));
    }
    public function updateStatus(Request $request ,$id)
    {
        $request->validate([
            'status' => ['required', Rule::in(['approved', 'rejected'])],
        ]);

        $quizEnrollment = $this->quizEnrollment->find($id);

        if (!$quizEnrollment) {
            abort(404);
        }

        $quizEnrollment->payment_status = $request->status;
        $quizEnrollment->save();

        return redirect()->back()->with('success', 'Qiz enrollment Status Update Successfully');
    }

    public function delete($id){
        $quizEnrollment = $this->quizEnrollment->find($id);

        if(!$quizEnrollment){
            return redirect()->back()->with('error','Qiz Enrolment not found');
        }
        $quizEnrollment->delete();

        return redirect()->route($this->routePrefix.'index')->with('success','Qiz enrolment deleted successfully');

    }
}
