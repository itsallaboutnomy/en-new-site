<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Training;
use App\Models\Enablers\TrainingBatch;
use App\Http\Requests\Enablers\Admin\TrainingBatchRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainingBatchController extends Controller
{
    protected $trainingBatch, $viewPrefix, $route;

    public function __construct(TrainingBatch $trainingBatch)
    {
        $this->trainingBatch = $trainingBatch;

        $this->viewPrefix = 'enablers.admin.training-batches.';
        $this->route = 'training-batches.';
    }

    public function index()
    {
        $trainingBatches = $this->trainingBatch->with('creator','training')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('trainingBatches'));
    }

    public function create()
    {
        $trainings = Training::enabled()->get();
        return view($this->viewPrefix.'create' ,compact('trainings'));
    }

    public function store(TrainingBatchRequest $request)
    {
        $this->trainingBatch->create($request->all());

        return redirect()->route($this->route.'index')->with('success','New training batch added successfully');
    }

    public function show($id)
    {
        $trainingBatch = $this->trainingBatch->find($id);

        if(!$trainingBatch){
            return redirect()->back()->with('error','Training batch not found');
        }

        return view($this->viewPrefix.'show',compact($trainingBatch));
    }

    public function edit($id)
    {
        $trainingBatch = $this->trainingBatch->find($id);

        $trainings = Training::enabled()->get();

        if(!$trainingBatch){
            return redirect()->back()->with('error','Training batch not found');
        }

        return view($this->viewPrefix.'edit',compact('trainingBatch','trainings'));
    }

    public function update(TrainingBatchRequest $request, $id)
    {
        $trainingBatch = $this->trainingBatch->find($id);

        if(!$trainingBatch){
            return redirect()->back()->with('error','Training batch not found');
        }

        $trainingBatch->update($request->all());

        return redirect()->route($this->route.'index')->with('success','Training batch update successfully');
    }

    public function destroy($id)
    {
        $trainingBatch = $this->trainingBatch->find($id);

        if(!$trainingBatch){
            return redirect()->back()->with('error','Training not found');
        }

        $trainingBatch->delete();

        return redirect()->route($this->route.'index')->with('success','Training batch deleted successfully');
    }
}
