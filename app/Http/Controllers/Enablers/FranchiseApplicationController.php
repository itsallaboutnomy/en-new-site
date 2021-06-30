<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\FranchiseApplication;
use App\Http\Requests\Enablers\FranchiseApplicationRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FranchiseApplicationController extends Controller
{
    protected $franchiseApplication, $viewPrefix, $routePrefix;

    public function __construct(FranchiseApplication $franchiseApplication)
    {
        $this->franchiseApplication = $franchiseApplication;
        $this->viewPrefix = 'enablers.app.franchise-applications.';
        $this->routePrefix = 'app.franchise.';
    }

    public function index() {
        return view($this->viewPrefix.'index');
    }

    public function create() {
        return view($this->viewPrefix.'create');
    }

    public function store(FranchiseApplicationRequest $request)
    {
        $this->franchiseApplication->create($request->all());

        return redirect()->route($this->routePrefix.'application.submitted');
    }

    public function success() {
        return view($this->viewPrefix.'application-success');
    }
}
