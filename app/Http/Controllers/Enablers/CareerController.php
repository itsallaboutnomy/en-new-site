<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\Career;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerController extends Controller
{
    protected $career, $viewPrefix;

    public function __construct(Career $career)
    {
        $this->career = $career;
        $this->viewPrefix = 'enablers.app.career.';
    }

    public function index(){

        $careers = $this->career->enabled()->get();

        return view($this->viewPrefix.'index' ,compact('careers'));
    }
}
