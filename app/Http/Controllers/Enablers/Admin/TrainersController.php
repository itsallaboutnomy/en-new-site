<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Trainer;
use App\Http\Requests\Enablers\Admin\TrainerRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainersController extends Controller
{
    protected $trainer, $imagesDirectoryPath, $viewPrefix, $route;

    public function __construct(Trainer $trainer)
    {
        $this->trainer = $trainer;
        $this->imagesDirectoryPath = $trainer::$imagesDirectoryPath;

        $this->viewPrefix = 'enablers.admin.trainers.';
        $this->route = 'trainers.';
    }

    public function index()
    {
        $trainers = $this->trainer->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('trainers'));
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(TrainerRequest $request)
    {
        $imagePath = $request->file('profile_image')->store($this->imagesDirectoryPath);

        $data = $request->all();
        $data['profile_image_path'] = $imagePath;

        $this->trainer->create($data);

        return redirect()->route($this->route.'index')->with('success','New Trainer added successfully');
    }

    public function show($id)
    {
        $trainer = $this->trainer->find($id);

        if(!$trainer){
            return redirect()->back()->with('error','Trainer not found');
        }

        return view($this->viewPrefix.'show',compact($trainer));
    }

    public function edit($id)
    {
        $trainer = $this->trainer->find($id);

        if(!$trainer){
            return redirect()->back()->with('error','Trainer not found');
        }

        return view($this->viewPrefix.'edit',compact('trainer'));
    }

    public function update(TrainerRequest $request, $id)
    {
        $trainer = $this->trainer->find($id);

        if(!$trainer){
            return redirect()->back()->with('error','Trainer not found');
        }

        $data = $request->all();

        if($request->hasFile('profile_image'))
        {
            $data['profile_image_path'] = $request->file('profile_image')->store($this->imagesDirectoryPath);
            \File::delete($trainer->profile_Image_path);
        }

        $trainer->update($data);

        return redirect()->route($this->route.'index')->with('success','Trainer update successfully');
    }

    public function updateStatus($id)
    {
        $trainer = $this->trainer->find($id);

        $trainer->is_enabled = !(bool)$trainer->is_enabled;
        $trainer->save();

        return redirect()->route($this->route.'index')->with('success','Trainer status updated successfully');
    }

    public function destroy($id)
    {
        $trainer = $this->trainer->find($id);

        if(!$trainer){
            return redirect()->back()->with('error','Trainer not found');
        }

        \File::delete($trainer->profile_Image_path);
        $trainer->delete();

        return redirect()->route($this->route.'index')->with('success','Trainer deleted successfully');
    }
}
