<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Skill;
use App\Models\Enablers\VirtualAssistant;
use App\Http\Requests\Enablers\Admin\VirtualAssistantRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class
VirtualAssistantController extends Controller
{
    protected $virtualAssistant, $viewPrefix, $route, $imagesDirectoryPath;

    public function __construct(VirtualAssistant $virtualAssistant)
    {
        $this->virtualAssistant = $virtualAssistant;
        $this->imagesDirectoryPath = $virtualAssistant::$imagesDirectoryPath;

        $this->viewPrefix = 'enablers.admin.virtual-assistants.';
        $this->route = 'virtual-assistants.';
    }

    public function index()
    {
        $virtualAssistants = $this->virtualAssistant->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('virtualAssistants'));
    }

    public function create()
    {
        $skills = Skill::enabled()->get();
        return view($this->viewPrefix.'create' ,compact('skills'));
    }

    public function store(VirtualAssistantRequest $request)
    {
        $imagePath = $request->file('image')->store(VirtualAssistant::$imagesDirectoryPath);

        $data = $request->all();
        $data['img_path'] = $imagePath;
        $virtualAssistant = $this->virtualAssistant->create($data);

        $virtualAssistant->skills()->attach($request->skills,[
            'created_by' => auth()->user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route($this->route.'index')->with('success','New virtual assistant added successfully');
    }

    public function show($id)
    {
        $virtualAssistant = $this->virtualAssistant->find($id);

        if(!$virtualAssistant){
            return redirect()->back()->with('error','Virtual assistant not found');
        }

        return view($this->viewPrefix.'show',compact($virtualAssistant));
    }

    public function edit($id)
    {
        $virtualAssistant = $this->virtualAssistant->find($id);

        $vaSkillIds = $virtualAssistant->skills()->pluck('skill_id');

        $skills = Skill::enabled()->get();

        if(!$virtualAssistant){
            return redirect()->back()->with('error','Virtual assistant  not found');
        }

        return view($this->viewPrefix.'edit',compact('virtualAssistant','skills','vaSkillIds'));
    }

    public function update(VirtualAssistantRequest $request, $id)
    {
        $virtualAssistant = $this->virtualAssistant->find($id);

        if(!$virtualAssistant){
            return redirect()->back()->with('error','Virtual assistant not found');
        }

        $data = $request->all();
        if($request->hasFile('image'))
        {
            $data['img_path'] = $request->file('image')->store($this->imagesDirectoryPath);
            \File::delete($virtualAssistant->img_path);
        }
        $virtualAssistant->update($data);

        $skills = [];
        foreach ($request->skills as $skill){
            $skills[$skill] = [
                'created_by' => auth()->user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        $virtualAssistant->skills()->sync($skills);

        return redirect()->route($this->route.'index')->with('success','Virtual assistant  update successfully');
    }

    public function updateStatus($id)
    {
        $virtualAssistant = $this->virtualAssistant->find($id);

        $virtualAssistant->is_enabled = !(bool)$virtualAssistant->is_enabled;
        $virtualAssistant->save();

        return redirect()->route($this->route.'index')->with('success','Virtual assistant status updated successfully');
    }

    public function destroy($id)
    {
        $virtualAssistant = $this->virtualAssistant->find($id);

        if(!$virtualAssistant){
            return redirect()->back()->with('error','Virtual assistant not found');
        }

        $virtualAssistant->delete();

        return redirect()->route($this->route.'index')->with('success','Virtual assistant deleted successfully');
    }
}
