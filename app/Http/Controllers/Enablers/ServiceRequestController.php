<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\ServicesRequests;
use App\Http\Requests\Enablers\ServicesDirectoryRequests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceRequestController extends Controller
{

    protected $services;

    public function __construct(ServicesRequests $services)
    {
        $this->services = $services;
    }

    public function create()
    {
        return view('enablers.app.servicerequests');
    }

    public function store(ServicesDirectoryRequests $request)
    {
        $this->services->create($request->all());

        return redirect()->back()->with('success','Service added successfully');
    }
}
