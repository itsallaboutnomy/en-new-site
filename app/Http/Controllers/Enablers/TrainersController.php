<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\Trainer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainersController extends Controller
{
    protected $trainer, $viewPrefix;

    public function __construct(Trainer $trainer)
    {
        $this->trainer = $trainer;
        $this->viewPrefix = 'enablers.app.trainers.';
    }

    public function show($slug)
    {
        $trainer = $this->trainer->whereSlug($slug)->whereNotIn('slug',['saqib-azhar','faisal-azhar'])->enabled()->first();

        if(!$trainer){
            abort(404);
        }

        return view($this->viewPrefix.'show',compact('trainer'));
    }

    public function showSaqibAzhar() {
        return view($this->viewPrefix.'saqib-azhar');
    }

    public function showFaisalAzhar() {
        return view($this->viewPrefix.'faisal-azhar');
    }
}
