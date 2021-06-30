<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\City;
use App\Models\Enablers\Training;
use App\Models\Enablers\TrainingCity;
use App\Models\Enablers\PaymentAccount;
use App\Http\Requests\Enablers\Admin\TrainingRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainingsController extends Controller
{
    protected $training, $viewPrefix, $route;

    public function __construct(Training $training)
    {
        $this->training = $training;

        $this->viewPrefix = 'enablers.admin.trainings.';
        $this->route = 'trainings.';
    }

    public function index()
    {
        $trainings = $this->training->with('creator')->orderBy('order_number')->get();

        return view($this->viewPrefix.'index',compact('trainings'));
    }

    public function create()
    {
        $cities = City::enabled()->get();
        $paymentAccounts = PaymentAccount::enabled()->get();
        return view($this->viewPrefix.'create',compact('cities','paymentAccounts'));
    }

    public function store(TrainingRequest $request)
    {
        $training = $this->training->create($request->all());

        $training->cities()->attach($request->cities);

        return redirect()->route($this->route.'index')->with('success','New training added successfully');
    }

    public function show($id)
    {
        $training = $this->training->find($id);

        if(!$training){
            return redirect()->back()->with('error','Training not found');
        }

        return view($this->viewPrefix.'show',compact($training));
    }

    public function edit($id)
    {
        $training = $this->training->find($id);

        if(!$training){
            return redirect()->back()->with('error','Training not found');
        }

        $cities = City::enabled()->get();
        $trainingCityIds  = $training->cities()->get()->pluck('id');

        return view($this->viewPrefix.'edit',compact('training','cities' ,'trainingCityIds'));
    }

    public function update(TrainingRequest $request, $id)
    {
        //return $request->all();
        $training = $this->training->find($id);

        if(!$training){
            return redirect()->back()->with('error','Training not found');
        }

        $training->is_registration_open = false;
        if($request->is_registration_open and $training->is_registration_open != 1) {
            $training->is_registration_open = true;
        }
        $training->save();
        $training->update($request->all());

        $training->cities()->sync($request->cities);

        return redirect()->route($this->route.'index')->with('success','Training update successfully');
    }

    public function updateStatus($id)
    {
        $training = $this->training->find($id);

        $training->is_enabled = !(bool)$training->is_enabled;
        $training->save();

        return redirect()->route($this->route.'index')->with('success','Training status updated successfully');
    }

    public function destroy($id)
    {
        $training = $this->training->find($id);

        if(!$training){
            return redirect()->back()->with('error','Training not found');
        }

        $training->delete();

        return redirect()->route($this->route.'index')->with('success','Training deleted successfully');
    }
}
