<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Collaboration;
use App\Http\Requests\Enablers\Admin\CollaborationRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollaborationsController extends Controller
{
    protected $collaboration, $imagesDirectoryPath, $viewPrefix, $route;

    public function __construct(Collaboration $collaboration)
    {
        $this->collaboration = $collaboration;
        $this->imagesDirectoryPath = $collaboration::$imagesDirectoryPath;

        $this->viewPrefix = 'enablers.admin.collaborations.';
        $this->route = 'collaborations.';
    }

    public function index()
    {
        $collaborations = $this->collaboration->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('collaborations'));
    }

    public function create() {
        return view($this->viewPrefix.'create');
    }

    public function store(CollaborationRequest $request)
    {
        $logoPath = $request->file('logo')->store($this->imagesDirectoryPath);

        $data = $request->all();
        $data['logo_path'] = $logoPath;

        $this->collaboration->create($data);

        return redirect()->route($this->route.'index')->with('success','New collaboration added successfully');
    }

    public function show($id)
    {
        $collaboration = $this->collaboration->find($id);

        if(!$collaboration){
            return redirect()->back()->with('error','collaboration not found');
        }

        return view($this->viewPrefix.'show',compact($collaboration));
    }

    public function edit($id)
    {
        $collaboration = $this->collaboration->find($id);

        if(!$collaboration){
            return redirect()->back()->with('error','collaboration not found');
        }

        return view($this->viewPrefix.'edit',compact('collaboration'));
    }

    public function update(CollaborationRequest $request, $id)
    {
        $collaboration = $this->collaboration->find($id);

        if(!$collaboration){
            return redirect()->back()->with('error','collaboration found');
        }

        $data = $request->all();

        if($request->hasFile('logo'))
        {
            $data['logo_path'] = $request->file('logo')->store($this->imagesDirectoryPath);
            \File::delete($collaboration->logo_path);
        }

        $collaboration->update($data);

        return redirect()->route($this->route.'index')->with('success','collaboration update successfully');
    }

    public function updateStatus($id)
    {
        $collaboration = $this->collaboration->find($id);

        $collaboration->is_enabled = !(bool)$collaboration->is_enabled;
        $collaboration->save();

        return redirect()->route($this->route.'index')->with('success','collaboration status updated successfully');
    }

    public function destroy($id)
    {
        $collaboration = $this->collaboration->find($id);

        if(!$collaboration){
            return redirect()->back()->with('error','collaboration not found');
        }

        \File::delete($collaboration->logo_path);
        $collaboration->delete();

        return redirect()->route($this->route.'index')->with('success','collaboration deleted successfully');
    }
}
