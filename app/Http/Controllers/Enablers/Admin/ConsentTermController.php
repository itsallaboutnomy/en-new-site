<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\ConsentTerm;
use App\Http\Requests\Enablers\Admin\ConsentTermRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsentTermController extends Controller
{
    protected $consentTerm, $viewPrefix, $route;

    public function __construct(ConsentTerm $consentTerm)
    {
        $this->consentTerm = $consentTerm;

        $this->viewPrefix = 'enablers.admin.consent-terms.';
        $this->route = 'consent-terms.';
    }

    public function index()
    {
        $consentTerms = $this->consentTerm->get();

        return view($this->viewPrefix.'index',compact('consentTerms'));
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(ConsentTermRequest $request)
    {
        $this->consentTerm->create($request->all());

        return redirect()->route($this->route.'index')->with('success','New consent term added successfully');
    }

    public function show($id)
    {
        $consentTerm = $this->consentTerm->find($id);

        if(!$consentTerm){
            return redirect()->back()->with('error','Consent term not found');
        }

        return view($this->viewPrefix.'show',compact('consentTerm'));
    }

    public function edit($id)
    {
        $consentTerm = $this->consentTerm->find($id);

        if(!$consentTerm){
            return redirect()->back()->with('error','Consent term not found');
        }

        return view($this->viewPrefix.'edit',compact('consentTerm'));
    }

    public function update(ConsentTermRequest $request, $id)
    {
        $consentTerm = $this->consentTerm->find($id);

        if(!$consentTerm){
            return redirect()->back()->with('error','Consent term not found');
        }

        $consentTerm->update($request->all());

        return redirect()->route($this->route.'index')->with('success','Consent term update successfully');
    }

    public function updateStatus($id)
    {
        $consentTerm = $this->consentTerm->find($id);

        $consentTerm->is_enabled = !(bool)$consentTerm->is_enabled;
        $consentTerm->save();

        return redirect()->route($this->route.'index')->with('success','Consent term status updated successfully');
    }

    public function destroy($id)
    {
        $consentTerm = $this->consentTerm->find($id);

        if(!$consentTerm){
            return redirect()->back()->with('error','Consent term not found');
        }

        $consentTerm->delete();

        return redirect()->route($this->route.'index')->with('success','Consent term deleted successfully');
    }
}
