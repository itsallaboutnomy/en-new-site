<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\EvsSeries;
use App\Http\Requests\Enablers\Admin\EVSSeriesRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class EVSSeriesController extends Controller
{
    protected $evsSeries, $service, $imagesDirectoryPath, $viewPrefix, $routePrefix;

    public function __construct(EvsSeries $series)
    {
        $this->evsSeries = $series;
        $this->imagesDirectoryPath = $series::$imagesDirectoryPath;
        $this->viewPrefix = 'enablers.admin.evs-series.';
        $this->routePrefix = 'evs-series.';
    }

    public function index(Request $request)
    {
        $series = $this->evsSeries->enabled()->where('parent_id',NULL)->orderBy('order_number','ASC')->get();

        return view($this->viewPrefix.'index-evs-categories',compact('series'));
    }

    public function evsCategoryData(Request $request){
        $series = $this->evsSeries->with('category')->orderBy('id','DESC');

        return Datatables::of($series)
            ->addColumn('created_at', function ($model) {
                return date('d M, Y g:i A',strtotime($model->created_at)) ;
            })
            ->addColumn('category', function ($model) {
                return $model->category ? $model->category->title : '' ;
            })
            ->addColumn('status', function ($model) {
                if($model->is_enabled == 1){
                    return'<strong class="text-success">Enabled</strong>';
                }
                else{
                    return'<strong class="text-danger">Disabled</strong>';
                }
            })
            ->addColumn('action', function ($model) {

                  $action = '<div class="dropdown no-arrow">
                            <a class="dropdown-toggle p-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                <a class="dropdown-item update-status-approve" href="'.route($this->routePrefix.'edit',$model->id).'"><i class="fas fa-eye"></i> Edit </a>';

                  if($model->is_enabled === 0 ) {
                           $action .= '<a class="dropdown-item update-status-enabled" href="javascript:void(0);" data-url="' . route($this->routePrefix.'update-status',$model->id) . '"><i class="fas fa-check"></i> Enable </a>';}
                else if($model->is_enabled === 1) {
                    $action .= '<a class="dropdown-item update-status-disabled" href="javascript:void(0);" data-url="' . route($this->routePrefix.'update-status',$model->id) . '"><i class="fas fa-times"></i> Disable </a>';
                }
                $action .= '<a class="dropdown-item delete-record" href="javascript:void(0);" data-url="' . route($this->routePrefix.'delete',$model->id) . '"><i class="fas fa-trash-alt"></i> Delete </a></div></div>';

                return $action;

                  return $action;
            })
            ->filter(function ($query) use ($request) {
                if($request->get('category')){
                    $query->where('parent_id','=',$request->get('category'));
                }
            })
            ->rawColumns(['status', 'action'])
            ->make(true);

    }

    public function create() {
        $series = $this->evsSeries->where('parent_id',NULL)->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'create',compact('series'));
    }

    public function store(EVSSeriesRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image_path')){

            $data['image_path'] = $request->file('image_path')->store($this->imagesDirectoryPath);
        }
        $this->evsSeries->create($data);

        return redirect()->route($this->route.'index')->with('success','New EVS Category added successfully');
    }

    public function show($id)
    {
        $service = $this->evsSeries->find($id);

        if(!$service){
            return redirect()->back()->with('error','Category not found');
        }

        return view($this->viewPrefix.'show',compact('service'));
    }

    public function edit($id)
    {
        $category = $this->evsSeries->find($id);

        if(!$category){
            return redirect()->back()->with('error','Category not found');
        }
        $series = $this->evsSeries->where('parent_id',NULL)->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'edit',compact('category', 'series'));
    }

    public function update(Request $request, $id)
    {
        $service = $this->evsSeries->find($id);

        if(!$service){
            return redirect()->back()->with('error','Category not found');
        }

        $data = $request->all();

        if($request->hasFile('image_path'))
        {
            $data['image_path'] = $request->file('image_path')->store($this->imagesDirectoryPath);
            \File::delete($service->service_image_path);
        }

        $service->update($data);

        return redirect()->route($this->route.'index')->with('success','Category updated successfully');
    }

    public function updateStatus($id)
    {
        $service = $this->evsSeries->find($id);

        if(!$service){
            return redirect()->back()->with('error','Category not found');
        }

        $service->is_enabled = !(bool)$service->is_enabled;
        $service->save();

        return response()->json(['success'=> 'Category status updated successfully']);
    }

    public function destroy($id)
    {
        $service = $this->evsSeries->find($id);

        if(!$service){
            return redirect()->back()->with('error','Category not found');
        }

        \File::delete($service->service_image_path);
        $service->delete();

        return response()->json(['success' =>'Category deleted successfully']);
    }
}
