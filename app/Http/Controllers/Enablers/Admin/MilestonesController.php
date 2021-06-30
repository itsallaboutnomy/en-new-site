<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Milestone;
use App\Http\Requests\Enablers\Admin\MilestoneRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MilestonesController extends Controller
{
    protected $milestone, $imagesDirectoryPath, $viewPrefix, $route;

    public function __construct(Milestone $milestone)
    {
        $this->milestone = $milestone;
        $this->imagesDirectoryPath = $milestone::$imagesDirectoryPath;

        $this->viewPrefix = 'enablers.admin.milestones.';
        $this->route = 'milestones.';
    }

    public function index()
    {
        $milestones = $this->milestone->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('milestones'));
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(MilestoneRequest $request)
    {
        $logoPath = $request->file('logo')->store($this->imagesDirectoryPath);

        $data = $request->all();
        $data['logo_path'] = $logoPath;

        $this->milestone->create($data);

        return redirect()->route($this->route.'index')->with('success','New milestone added successfully');
    }

    public function show($id)
    {
        $milestone = $this->milestone->find($id);

        if(!$milestone){
            return redirect()->back()->with('error','milestone not found');
        }

        return view($this->viewPrefix.'show',compact($milestone));
    }

    public function edit($id)
    {
        $milestone = $this->milestone->find($id);

        if(!$milestone){
            return redirect()->back()->with('error','milestone not found');
        }

        return view($this->viewPrefix.'edit',compact('milestone'));
    }

    public function update(MilestoneRequest $request, $id)
    {
        $milestone = $this->milestone->find($id);

        if(!$milestone){
            return redirect()->back()->with('error','milestone found');
        }

        $data = $request->all();

        if($request->hasFile('logo'))
        {
            $data['logo_path'] = $request->file('logo')->store($this->imagesDirectoryPath);
            \File::delete($milestone->logo_path);
        }

        $milestone->update($data);

        return redirect()->route($this->route.'index')->with('success','milestone update successfully');
    }

    public function updateStatus($id)
    {
        $milestone = $this->milestone->find($id);

        $milestone->is_enabled = !(bool)$milestone->is_enabled;
        $milestone->save();

        return redirect()->route($this->route.'index')->with('success','milestone status updated successfully');
    }

    public function destroy($id)
    {
        $milestone = $this->milestone->find($id);

        if(!$milestone){
            return redirect()->back()->with('error','milestone not found');
        }

        \File::delete($milestone->logo_path);
        $milestone->delete();

        return redirect()->route($this->route.'index')->with('success','milestone deleted successfully');
    }
}
