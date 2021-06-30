<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Objective;
use App\Http\Requests\Enablers\Admin\ObjectiveRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ObjectivesController extends Controller
{
    protected $objective, $imagesDirectoryPath, $viewPrefix, $route;

    public function __construct(Objective $objective)
    {
        $this->objective = $objective;
        $this->imagesDirectoryPath = $objective::$imagesDirectoryPath;

        $this->viewPrefix = 'enablers.admin.objectives.';
        $this->route = 'objectives.';
    }

    public function index()
    {
        $objectives = $this->objective->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('objectives'));
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(ObjectiveRequest $request)
    {
        $logoPath = $request->file('logo')->store($this->imagesDirectoryPath);

        $data = $request->all();
        $data['logo_path'] = $logoPath;

        $this->objective->create($data);

        return redirect()->route($this->route.'index')->with('success','New objective added successfully');
    }

    public function show($id)
    {
        $objective = $this->objective->find($id);

        if(!$objective){
            return redirect()->back()->with('error','Objective not found');
        }

        return view($this->viewPrefix.'show',compact($objective));
    }

    public function edit($id)
    {
        $objective = $this->objective->find($id);

        if(!$objective){
            return redirect()->back()->with('error','Objective not found');
        }

        return view($this->viewPrefix.'edit',compact('objective'));
    }

    public function update(ObjectiveRequest $request, $id)
    {
        $objective = $this->objective->find($id);

        if(!$objective){
            return redirect()->back()->with('error','Objective not found');
        }

        $data = $request->all();

        if($request->hasFile('logo'))
        {
            $data['logo_path'] = $request->file('logo')->store($this->imagesDirectoryPath);
            \File::delete($objective->logo_path);
        }

        $objective->update($data);

        return redirect()->route($this->route.'index')->with('success','Objective update successfully');
    }

    public function updateStatus($id)
    {
        $objective = $this->objective->find($id);

        $objective->is_enabled = !(bool)$objective->is_enabled;
        $objective->save();

        return redirect()->route($this->route.'index')->with('success','Objective status updated successfully');
    }

    public function destroy($id)
    {
        $objective = $this->objective->find($id);

        if(!$objective){
            return redirect()->back()->with('error','Objective not found');
        }

        \File::delete($objective->logo_path);
        $objective->delete();

        return redirect()->route($this->route.'index')->with('success','Objective deleted successfully');
    }
}
