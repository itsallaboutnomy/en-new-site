<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Achievement;
use App\Http\Requests\Enablers\Admin\AchievementRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AchievementsController extends Controller
{
    protected $achievement, $imagesDirectoryPath, $viewPrefix, $route;

    public function __construct(Achievement $achievement)
    {
        $this->achievement = $achievement;
        $this->imagesDirectoryPath = $achievement::$imagesDirectoryPath;

        $this->viewPrefix = 'enablers.admin.achievements.';
        $this->route = 'achievements.';
    }

    public function index()
    {
        $achievements = $this->achievement->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('achievements'));
    }

    public function create() {
        return view($this->viewPrefix.'create');
    }

    public function store(AchievementRequest $request)
    {
        $logoPath = $request->file('logo')->store($this->imagesDirectoryPath);

        $data = $request->all();
        $data['logo_path'] = $logoPath;

        $this->achievement->create($data);

        return redirect()->route($this->route.'index')->with('success','New Achievement added successfully');
    }

    public function show($id)
    {
        $achievement = $this->achievement->find($id);

        if(!$achievement){
            return redirect()->back()->with('error','Achievement not found');
        }

        return view($this->viewPrefix.'show',compact($achievement));
    }

    public function edit($id)
    {
        $achievement = $this->achievement->find($id);

        if(!$achievement){
            return redirect()->back()->with('error','Achievement not found');
        }

        return view($this->viewPrefix.'edit',compact('achievement'));
    }

    public function update(AchievementRequest $request, $id)
    {
        $achievement = $this->achievement->find($id);

        if(!$achievement){
            return redirect()->back()->with('error','Achievement found');
        }

        $data = $request->all();

        if($request->hasFile('logo'))
        {
            $data['logo_path'] = $request->file('logo')->store($this->imagesDirectoryPath);
            \File::delete($achievement->logo_path);
        }

        $achievement->update($data);

        return redirect()->route($this->route.'index')->with('success','Achievement update successfully');
    }

    public function updateStatus($id)
    {
        $achievement = $this->achievement->find($id);

        $achievement->is_enabled = !(bool)$achievement->is_enabled;
        $achievement->save();

        return redirect()->route($this->route.'index')->with('success','Achievement status updated successfully');
    }

    public function destroy($id)
    {
        $achievement = $this->achievement->find($id);

        if(!$achievement){
            return redirect()->back()->with('error','Achievement not found');
        }

        \File::delete($achievement->logo_path);
        $achievement->delete();

        return redirect()->route($this->route.'index')->with('success','Achievement deleted successfully');
    }
}
