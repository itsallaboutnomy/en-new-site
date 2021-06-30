<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\VirtualAssistantRequest;
use App\Http\Requests\Enablers\VirtualAssistantRequest as VARequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VirtualAssistantRequestController extends Controller
{
    protected $virtualAssistantRequest, $viewPrefix;

    public function __construct(VirtualAssistantRequest $virtualAssistantRequest)
    {
        $this->virtualAssistantRequest = $virtualAssistantRequest;
        $this->viewPrefix = 'enablers.app.virtual-assistant-requests.';
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(VARequest $request)
    {
        $this->virtualAssistantRequest->create($request->all());

        return redirect()->back()->with('success','New VA Request added successfully');
    }
}
