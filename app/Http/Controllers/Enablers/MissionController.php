<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\Milestone;
use App\Models\Enablers\Collaboration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MissionController extends Controller
{
    public function index()
    {
        $milestones = Milestone::enabled()->orderBy('order_number','ASC')->get();
        $collaborations = Collaboration::enabled()->orderBy('order_number','ASC')->get();

        return view('enablers.app.mission', compact('milestones','collaborations'));
    }
}
