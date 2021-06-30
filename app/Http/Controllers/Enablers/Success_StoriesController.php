<?php

namespace App\Http\Controllers\Enablers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Success_StoriesController extends Controller
{
    public function index() {
        return view('enablers.app.success-stories');
    }

}
