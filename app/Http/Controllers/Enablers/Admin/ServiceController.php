<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Service;
use App\Http\Requests\Enablers\Admin\ServiceRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    protected $service, $imagesDirectoryPath, $viewPrefix, $route;

    public function __construct(Service $service)
    {
        $this->service = $service;
        $this->imagesDirectoryPath = $service::$imagesDirectoryPath;

        $this->viewPrefix = 'enablers.admin.services.';
        $this->route = 'services.';
    }

    public function index()
    {
        $services = $this->service->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('services'));
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(ServiceRequest $request)
    {
        $serviceImagePath = $request->file('service_image')->store($this->imagesDirectoryPath);

        $data = $request->all();
        $data['service_image_path'] = $serviceImagePath;

        $this->service->create($data);

        return redirect()->route($this->route.'index')->with('success','New Service  added successfully');
    }

    public function show($id)
    {
        $service = $this->service->find($id);

        if(!$service){
            return redirect()->back()->with('error','Service not found');
        }

        return view($this->viewPrefix.'show',compact('service'));
    }

    public function edit($id)
    {
        $service = $this->service->find($id);

        if(!$service){
            return redirect()->back()->with('error','Service not found');
        }

        return view($this->viewPrefix.'edit',compact('service'));
    }

    public function update(ServiceRequest $request, $id)
    {
        $service = $this->service->find($id);

        if(!$service){
            return redirect()->back()->with('error','Service not found');
        }

        $data = $request->all();

        if($request->hasFile('service_image'))
        {
            $data['service_image_path'] = $request->file('service_image')->store($this->imagesDirectoryPath);
            \File::delete($service->service_image_path);
        }

        $service->update($data);

        return redirect()->route($this->route.'index')->with('success','Service updated successfully');
    }

    public function updateStatus($id)
    {
        $service = $this->service->find($id);

        if(!$service){
            return redirect()->back()->with('error','Service not found');
        }

        $service->is_enabled = !(bool)$service->is_enabled;
        $service->save();

        return redirect()->route($this->route.'index')->with('success','Service status updated successfully');
    }

    public function destroy($id)
    {
        $service = $this->service->find($id);

        if(!$service){
            return redirect()->back()->with('error','Service not found');
        }

        \File::delete($service->service_image_path);
        $service->delete();

        return redirect()->route($this->route.'index')->with('success','Service deleted successfully');
    }
}
