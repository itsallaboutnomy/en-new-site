<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\City;
use App\Http\Requests\Enablers\Admin\CityRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    protected $city, $viewPrefix, $route;

    public function __construct(City $city)
    {
        $this->city = $city;

        $this->viewPrefix = 'enablers.admin.cities.';
        $this->route = 'cities.';
    }

    public function index()
    {
        $cities = $this->city->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('cities'));
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(CityRequest $request)
    {
        $this->city->create($request->all());

        return redirect()->route($this->route.'index')->with('success','New city added successfully');
    }

    public function show($id)
    {
        $city = $this->city->find($id);

        if(!$city){
            return redirect()->back()->with('error','City not found');
        }

        return view($this->viewPrefix.'show',compact('city'));
    }

    public function edit($id)
    {
        $city = $this->city->find($id);

        if(!$city){
            return redirect()->back()->with('error','City not found');
        }

        return view($this->viewPrefix.'edit',compact('city'));
    }

    public function update(CityRequest $request, $id)
    {
        $city = $this->city->find($id);

        if(!$city){
            return redirect()->back()->with('error','City not found');
        }

        $city->update($request->all());

        return redirect()->route($this->route.'index')->with('success','City update successfully');
    }

    public function updateStatus($id)
    {
        $city = $this->city->find($id);

        $city->is_enabled = !(bool)$city->is_enabled;
        $city->save();

        return redirect()->route($this->route.'index')->with('success','City status updated successfully');
    }

    public function destroy($id)
    {
        $city = $this->city->find($id);

        if(!$city){
            return redirect()->back()->with('error','City not found');
        }

        $city->delete();

        return redirect()->route($this->route.'index')->with('success','City deleted successfully');
    }
}
