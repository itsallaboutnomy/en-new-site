<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $services = $this->service->enabled()->get()->groupBy('category');

        return view('enablers.app.services.index',compact('services'));
    }
}
