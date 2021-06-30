<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\FranchiseApplication;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class FranchiseApplicationController extends Controller
{
    protected $franchiseApplication, $viewPrefix, $routePrefix;

    public function __construct(FranchiseApplication $franchiseApplication)
    {
        $this->franchiseApplication = $franchiseApplication;
        $this->viewPrefix = 'enablers.admin.franchise-applications.';
        $this->routePrefix = 'franchise-applications.';
    }

    public function index()
    {
        return view($this->viewPrefix.'index');
    }

    public function franchiseApplicationData(Request $request)
    {
        $franchiseApplication = $this->franchiseApplication->get();

        return Datatables::of($franchiseApplication)
            ->addColumn('created_at', function ($model) {
                return date('d M, Y g:i A',strtotime($model->created_at)) ;
            })
            ->addColumn('name', function ($model) {
                return $model->first_name. ' '.  $model->last_name;
            })
            ->addColumn('admin_status', function ($model){
                if($model->admin_status =='pending')return'<strong class="text-blue">Pending</strong>';
                if($model->admin_status ==='approved') return'<strong class="text-success">Approved</strong>';
                if($model->admin_status ==='rejected') return'<strong class="text-danger">Rejected</strong>';
            })
            ->addColumn('action', function ($model)
            {
                $action = '<div class="dropdown no-arrow">
                            <a class="dropdown-toggle p-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                <a class="dropdown-item show-details" href="javascript:void(0);" data-id="' . $model->id . '"><i class="far fa-eye"></i> View</a>';

                if($model->admin_status ==='rejected') {
                    $action .= '<a class="dropdown-item update-status-approve" href="javascript:void(0);" data-url="' . route($this->routePrefix.'update-status',$model->id) . '"><i class="fas fa-check"></i> Approve </a>';
                }
                if($model->admin_status ==='approved') {
                    $action .= '<a class="dropdown-item update-status-reject" href="javascript:void(0);" data-url="' . route($this->routePrefix.'update-status',$model->id) . '"><i class="fas fa-times"></i> Reject </a>';
                }
                if($model->admin_status ==='pending') {
                    $action .=
                        '<a class="dropdown-item update-status-approve" href="javascript:void(0);" data-url="' . route($this->routePrefix.'update-status',$model->id) . '"><i class="fas fa-check"></i> Approve </a>'.
                         '<a class="dropdown-item update-status-reject" href="javascript:void(0);" data-url="' . route($this->routePrefix.'update-status',$model->id) . '"><i class="fas fa-times"></i> Reject </a>';
                }

                $action .= '<a class="dropdown-item delete-record" href="javascript:void(0);" data-url="' . route($this->routePrefix.'delete',$model->id) . '"><i class="fas fa-trash-alt"></i> Delete </a></div></div>';

                return $action;
            })
            ->rawColumns(['admin_status','action'])
            ->make(true);
    }

    public function show($id)
    {
        $application = $this->franchiseApplication->find($id);

        if(!$application){
            return response()->json(null,404);
        }

        $statusClass = 'text-blue';
        if($application->admin_status ==='approved'){
            $statusClass = 'text-success';
        }
        elseif ($application->admin_status ==='disapproved'){
            $statusClass = 'text-danger';
        }

        $data['applicant_info'] =
            '<li><label>Status: </label> <strong class="'.$statusClass.'">'. ucwords($application->admin_status).'</strong></li>'.
            '<li><label>Partnership: </label> '. $application->shareholder.'%</li>'.
            '<li><label>First Name: </label> '. ucfirst($application->first_name).'</li>'.
            '<li><label>Last Name: </label> '. ucfirst($application->last_name).'</li>'.
            '<li><label>Father Name: </label> '. ucwords($application->father_name).'</li>'.
            '<li><label>CNIC/Passport: </label> '. $application->cnic.'</li>'.
            '<li style="border: none;margin-bottom: -20px;"><label>Created At: </label> '. $application->created_at.'</li>';

        $data['contact_info'] =
            '<li><label>Email: </label> '. $application->email.'</li>'.
            '<li><label>Mobile: </label> '. $application->phone.'</li>'.
            '<li><label>Country: </label> '. ucwords($application->country).'</li>'.
            '<li><label>City: </label> '. ucwords($application->city).'</li>'.
            '<li style="border: none;margin-bottom: -20px;"><label>Address: </label> '. ucwords($application->address).'</li>';

        return response()->json($data);
    }

    public function updateStatus(Request $request ,$id)
    {
        $franchiseApplication = $this->franchiseApplication->find($id);

        $statusArray = ['approve'=>'approved','reject'=>'rejected'];

        if(isset($statusArray[strtolower($request->status)]))
        {
            $franchiseApplication->admin_status = $statusArray[strtolower($request->status)];
            $franchiseApplication->save();
        }

        return redirect()->back()->with('success','Franchise application status updated successfully');
    }

    public function delete($id){
        $franchiseApplication = $this->franchiseApplication->find($id);

        if(!$franchiseApplication){
            return response()->json(['error' => 'Franchise application not found']);
        }
        $franchiseApplication->delete();

        return response()->json(['success' => 'Franchise application deleted successfully']);

    }
}
