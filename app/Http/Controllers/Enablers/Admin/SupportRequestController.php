<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\SupportRequest;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class SupportRequestController extends Controller
{
    protected $supportRequest, $viewPrefix, $routePrefix;

    public function __construct(SupportRequest $supportRequest)
    {
        $this->supportRequest = $supportRequest;

        $this->viewPrefix = 'enablers.admin.supports-requests.';
        $this->routePrefix = 'support-requests.';
    }

    public function indexRefund() {
        return view($this->viewPrefix.'index-refund');
    }public function indexPaymentRelatedConcern() {
        return view($this->viewPrefix.'index-payment-concern');
    }public function indexEVSConcern() {
        return view($this->viewPrefix.'index-evs-concern');
    }public function indexTrainingRelatedConcern() {
        return view($this->viewPrefix.'index-training-concern');
    }public function indexChangeOfTrainingRequest() {
        return view($this->viewPrefix.'index-change-training');
    }public function indexChangeOfMentorRequest() {
        return view($this->viewPrefix.'index-change-mentor');
    }public function indexGeneralComplaint() {
        return view($this->viewPrefix.'index-general-complaint');
    }public function indexSuggestions() {
        return view($this->viewPrefix.'index-suggestions');
    }public function indexEpasConcern() {
        return view($this->viewPrefix.'index-epas-concern');
    }

    public function refundRequestsData()
    {
        $supportRequest = $this->supportRequest->with(['training','event'])->refundRequests()->orderBy('id','desc');

        return Datatables::of($supportRequest)
            ->addColumn('request_for', function($model) {
                return ucfirst($model->request_for);

            }) ->addColumn('training_name', function($model) {
                return $model->training ? $model->training->title : 'N/A';
            })
            ->addColumn('seminar', function($model) {
                return $model->event ? $model->event->title : 'N/A';
            })
            ->addColumn('action', function ($model) {
                return '<a href="'.route($this->routePrefix.'show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })

            ->make(true);
    }
    public function paymentRelatedConcernData(){

       $supportRequest = $this->supportRequest->with(['training'])->paymentRequests()->orderBy('id','desc');

        return Datatables::of($supportRequest)
            ->addColumn('training_name', function($model) {
                return $model->training ? $model->training->title : 'N/A';
            })
            ->addColumn('action', function ($model) {
                return '<a href="'.route($this->routePrefix.'show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })

            ->make(true);
    }
    public function evsConcernData(){

        $supportRequest = $this->supportRequest->evsConcernRequests()->orderBy('id','desc');

        return Datatables::of($supportRequest)
            ->addColumn('request_for', function($model) {
                return ucfirst($model->request_for);

            })
            ->addColumn('action', function ($model) {
                return '<a href="'.route($this->routePrefix.'show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })

            ->make(true);
    }
    public function trainingRelatedConcernData(){
        $supportRequest = $this->supportRequest->with(['training'])->trainingRelatedConcernRequests()->orderBy('id','desc');

        return Datatables::of($supportRequest)
            ->addColumn('training_name', function($model) {
                return $model->training ? $model->training->title : 'N/A';
            })
            ->addColumn('action', function ($model) {
                return '<a href="'.route($this->routePrefix.'show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })

            ->make(true);
    }
    public function changeOfTrainingRequestData(){

        $supportRequest = $this->supportRequest->with(['training','batch'])->changeOfTrainingRequests()->orderBy('id','desc');

        return Datatables::of($supportRequest)
            ->addColumn('training_name', function($model) {
                return $model->training ? $model->training->title : 'N/A';
            })
            ->addColumn('batch_name', function($model) {
                return $model->batch ? $model->batch->name : 'N/A';
            })
            ->addColumn('action', function ($model) {
                return '<a href="'.route($this->routePrefix.'show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })

            ->make(true);
    }
    public function changeOfMentorRequestData(){
        $supportRequest = $this->supportRequest->with(['trainer','training','batch'])->changeOfMentorRequests()->orderBy('id','desc');

        return Datatables::of($supportRequest)
            ->addColumn('trainer_name', function($model) {
                return $model->trainer ? ucfirst($model->trainer->name) : 'N/A';
            })->addColumn('training_name', function($model) {
                return $model->training ? $model->training->title : 'N/A';
            })
            ->addColumn('batch_name', function($model) {
                return $model->batch ? $model->batch->name : 'N/A';
            })
            ->addColumn('action', function ($model) {
                return '<a href="'.route($this->routePrefix.'show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })
            ->make(true);
    }
    public function generalComplaintData(){
        $supportRequest = $this->supportRequest->with(['batch'])->generalComplaintRequests()->orderBy('id','desc');

        return Datatables::of($supportRequest)
            ->addColumn('batch_name', function($model) {
                return $model->batch ? $model->batch->name : 'N/A';
            })
            ->addColumn('action', function ($model) {
                return '<a href="'.route($this->routePrefix.'show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })

            ->make(true);
    }
    public function suggestionsData(){
        $supportRequest = $this->supportRequest->suggestionRequests()->orderBy('id','desc');

        return Datatables::of($supportRequest)
            ->addColumn('action', function ($model) {
                return '<a href="'.route($this->routePrefix.'show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })
            ->make(true);
    }
    public function epasConcernData(){
        $supportRequest = $this->supportRequest->with(['trainer','training','batch'])->epasConcernRequests()->orderBy('id','desc');

        return Datatables::of($supportRequest)
            ->addColumn('trainer_name', function($model) {
                return $model->trainer ? ucfirst($model->trainer->name) : 'N/A';
            })->addColumn('training_name', function($model) {
                return $model->training ? $model->training->title : 'N/A';
            })
            ->addColumn('batch_name', function($model) {
                return $model->batch ? $model->batch->name : 'N/A';
            })
            ->addColumn('action', function ($model) {
                return '<a href="'.route($this->routePrefix.'show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })
            ->make(true);
    }
    public function show(Request $request,$id)
    {
        $supportRequest = $this->supportRequest->find($id);

        if(!$supportRequest){
            abort(404);
        }
        return view($this->viewPrefix.'show',compact('supportRequest'));
    }

}
