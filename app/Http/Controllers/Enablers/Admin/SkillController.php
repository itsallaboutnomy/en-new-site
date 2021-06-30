<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Skill;
use App\Http\Requests\Enablers\Admin\SkillRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    protected $skill, $viewPrefix, $route;

    public function __construct(Skill $skill)
    {
        $this->skill = $skill;

        $this->viewPrefix = 'enablers.admin.skills.';
        $this->route = 'skills.';
    }

    public function index()
    {
        $skills = $this->skill->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('skills'));
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(SkillRequest $request)
    {
        $this->skill->create($request->all());

        return redirect()->route($this->route.'index')->with('success','New skill added successfully');
    }

    public function show($id)
    {
        $skill = $this->skill->find($id);

        if(!$skill){
            return redirect()->back()->with('error','Skill not found');
        }

        return view($this->viewPrefix.'show',compact($skill));
    }

    public function edit($id)
    {
        $skill = $this->skill->find($id);

        if(!$skill){
            return redirect()->back()->with('error','Skill not found');
        }

        return view($this->viewPrefix.'edit',compact('skill'));
    }

    public function update(SkillRequest $request, $id)
    {
        $skill = $this->skill->find($id);

        if(!$skill){
            return redirect()->back()->with('error','Skill not found');
        }

        $skill->update($request->all());

        return redirect()->route($this->route.'index')->with('success','Skill update successfully');
    }

    public function updateStatus($id)
    {
        $skill = $this->skill->find($id);

        $skill->is_enabled = !(bool)$skill->is_enabled;
        $skill->save();

        return redirect()->route($this->route.'index')->with('success','Skill assistant status updated successfully');
    }

    public function destroy($id)
    {
        $skill = $this->skill->find($id);

        if(!$skill){
            return redirect()->back()->with('error','Skill not found');
        }

        $skill->delete();

        return redirect()->route($this->route.'index')->with('success','Skill deleted successfully');
    }
}
