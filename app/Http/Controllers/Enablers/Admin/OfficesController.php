<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Office;
use App\Http\Requests\Enablers\Admin\OfficeRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfficesController extends Controller
{
    protected $office, $imagesDirectoryPath, $viewPrefix, $route;

    public function __construct(Office $office)
    {
        $this->office = $office;
        $this->imagesDirectoryPath = $office::$imagesDirectoryPath;

        $this->viewPrefix = 'enablers.admin.offices.';
        $this->route = 'offices.';
    }

    public function index()
    {
        $offices = $this->office->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('offices'));
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(OfficeRequest $request)
    {
        $request->validated();

        $imagePath = $request->file('image')->store($this->imagesDirectoryPath);

        $data = $request->all();
        $data['image_path'] = $imagePath;

        $this->office->create($data);

        return redirect()->route($this->route.'index')->with('success','New Office added successfully');
    }

    public function show($id)
    {
        $office = $this->office->find($id);

        if(!$office){
            return redirect()->back()->with('error','Office not found');
        }

        return view($this->viewPrefix.'show',compact($office));
    }

    public function edit($id)
    {
        $office = $this->office->find($id);

        if(!$office){
            return redirect()->back()->with('error','Office not found');
        }

        return view($this->viewPrefix.'edit',compact('office'));
    }

    public function update(OfficeRequest $request, $id)
    {
        $office = $this->office->find($id);

        if(!$office){
            return redirect()->back()->with('error','Office not found');
        }

        $data = $request->all();

        if($request->is_head_office and $office->is_head_office != 1)
        {
            $headOffice = Office::where('is_head_office', true)->first();
            if($headOffice){
                return redirect()->back()->with('headOfficeChosen','Head Office already has been chosen!');
            } else {
                $office->is_head_office = true;
                $office->save();
            }
        }

        if($office->is_head_office == 1 and !$request->is_head_office){
            $office->is_head_office = false;
            $office->save();
        }

        if($request->hasFile('image'))
        {
            $data['image_path'] = $request->file('image')->store($this->imagesDirectoryPath);
            \File::delete($office->image_path);
        }

        $office->update($data);

        return redirect()->route($this->route.'index')->with('success','Office update successfully');
    }

    public function updateStatus($id)
    {
        $office = $this->office->find($id);

        $office->is_enabled = !(bool)$office->is_enabled;
        $office->save();

        return redirect()->route($this->route.'index')->with('success','Office status updated successfully');
    }

    public function destroy($id)
    {
        $office = $this->office->find($id);

        if(!$office){
            return redirect()->back()->with('error','Office not found');
        }

        \File::delete($office->image_path);
        $office->delete();

        return redirect()->route($this->route.'index')->with('success','Office deleted successfully');
    }
}
