<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\Trainer;
use App\Models\Enablers\Training;
use App\Models\Enablers\EvsSeries;
use App\Models\Enablers\TrainingBatch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TrainingsController extends Controller
{
    protected $training, $viewPrefix;

    public function __construct(Training $training)
    {
        $this->training = $training;
        $this->viewPrefix = 'enablers.app.trainings.';
    }

    public function index()
    {
        $trainings = $this->training
                          ->enabled()
                          ->orderBy('order_number','ASC')
                          ->orderBy('starting_at','ASC')
                          ->get();

        return view($this->viewPrefix.'index',compact('trainings'));
    }

    public function show($slug)
    {
        $training = $this->training->whereSlug($slug)->enabled()->first();

        if(!$training){
            abort(404);
        }

        $trainers = [];
        $series = [];

        if($training->key === 'O2O'){
            $trainers = Trainer::enabled()->orderBy('order_number','ASC')->get();
            $viewPage = 'one-to-one-training';
        }
        elseif ($training->key === 'EXL'){
            $viewPage = 'exl';
        }
        elseif ($training->key === 'EVS'){
            $viewPage = 'evs';
            $series = EvsSeries::enabled()->where('parent_id',NULL)->orderBy('order_number','ASC')->take(6)->get();
        } else {
            $viewPage = $training->slug;
        }

        $viewPage = $this->viewPrefix.$viewPage;
        return view($viewPage,compact('training','trainers','series'));
    }

    public  function trainingBatches(Request $request,$id)
    {
        $batches = TrainingBatch::select('id','name')->where('training_id',$id)->get();

        return response()->json($batches);
    }

    public function updateSlugs(){
        foreach (EvsSeries::all() as $item){
            $item->slug = Str::slug($item->title, '-');
            $item->save();
        }

        return 'Done';
    }

    public function showCategories($slug)
    {
        $category = null;
        $categories = [];

        if($slug == 'categories'){
            $categories = EvsSeries::enabled()->where('parent_id',NULL)->orderBy('order_number','ASC')->get();

            return view($this->viewPrefix.'evs-videos',compact('categories'));
        } else {
            $category = EvsSeries::with('videos')->whereSlug($slug)->enabled()->first();

            if(!$category){
                abort(404);
            }
        }

        return view($this->viewPrefix.'evs-videos',compact('category','categories'));
    }

}
