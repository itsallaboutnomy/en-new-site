<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\Milestone;
use App\Models\Enablers\Collaboration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index()
    {
        $collaborations = Collaboration::enabled()->orderBy('order_number','ASC')->get();
        $milestones = Milestone::enabled()->orderBy('order_number','ASC')->get();

        return view('enablers.app.about-us', compact('collaborations','milestones'));
    }
}
