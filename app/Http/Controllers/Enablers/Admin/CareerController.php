<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Career;
use App\Http\Requests\Enablers\Admin\CareerRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerController extends Controller
{
    protected $career, $viewPrefix, $route;

    public function __construct(Career $career)
    {
        $this->career = $career;

        $this->viewPrefix = 'enablers.admin.careers.';
        $this->route = 'careers.';
    }

    public function index()
    {
        $careers = $this->career->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('careers'));
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(CareerRequest $request)
    {
        $this->career->create($request->all());

        return redirect()->route($this->route.'index')->with('success','New career added successfully');
    }

    public function show($id)
    {
        $career = $this->career->find($id);

        if(!$career){
            return redirect()->back()->with('error','Career not found');
        }

        return view($this->viewPrefix.'show',compact('career'));
    }

    public function edit($id)
    {
        $career = $this->career->find($id);

        if(!$career){
            return redirect()->back()->with('error','Career not found');
        }

        return view($this->viewPrefix.'edit',compact('career'));
    }

    public function update(careerRequest $request, $id)
    {
        $career = $this->career->find($id);

        if(!$career){
            return redirect()->back()->with('error','Career not found');
        }

        $career->update($request->all());

        return redirect()->route($this->route.'index')->with('success','Career update successfully');
    }

    public function updateStatus($id)
    {
        $career = $this->career->find($id);

        $career->is_enabled = !(bool)$career->is_enabled;
        $career->save();

        return redirect()->route($this->route.'index')->with('success','Career status updated successfully');
    }

    public function destroy($id)
    {
        $career = $this->career->find($id);

        if(!$career){
            return redirect()->back()->with('error','Career not found');
        }
        $career->delete();

        return redirect()->route($this->route.'index')->with('success','Career deleted successfully');
    }
}
