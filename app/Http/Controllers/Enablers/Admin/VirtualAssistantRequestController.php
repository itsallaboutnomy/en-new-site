<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\VirtualAssistantRequest;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class VirtualAssistantRequestController extends Controller
{
    protected $virtualAssistantRequest, $viewPrefix, $routePrefix;

    public function __construct(VirtualAssistantRequest $virtualAssistantRequest)
    {
        $this->virtualAssistantRequest = $virtualAssistantRequest;

        $this->viewPrefix = 'enablers.admin.virtual-assistant-requests.';
        $this->routePrefix = 'va-request.';
    }

    public function index() {
        return view($this->viewPrefix.'index');
    }

    public function vaRequestData()
    {
        $virtualAssistantRequest = $this->virtualAssistantRequest
            ->orderBy('id','desc');

        return Datatables::of($virtualAssistantRequest)
            ->addColumn('created_at', function ($model) {
                return date('d M, Y g:i A',strtotime($model->created_at)) ;
            })
            ->addColumn('action', function ($model) {
                return '<a href="'.route($this->routePrefix.'show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })
            ->make(true);
    }

    public function updateStatus($id)
    {
        $virtualAssistantRequest = $this->virtualAssistantRequest->find($id);

        $virtualAssistantRequest->is_enabled = !(bool)$virtualAssistantRequest->is_enabled;
        $virtualAssistantRequest->save();

        return redirect()->back()->with('success','Virtual assistant request status updated successfully');
    }

    public function show(Request $request,$id)
    {
        $virtualAssistantRequest = $this->virtualAssistantRequest->find($id);

        if(!$virtualAssistantRequest){
            abort(404);
        }
        return view($this->viewPrefix.'show',compact('virtualAssistantRequest'));
    }
}
