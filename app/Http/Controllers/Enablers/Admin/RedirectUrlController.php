<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\RedirectUrl;
use App\Http\Requests\Enablers\Admin\RedirectUrlRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RedirectUrlController extends Controller
{
    protected $redirectUrl, $viewPrefix, $route;

    public function __construct(RedirectUrl $redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;

        $this->viewPrefix = 'enablers.admin.redirect-urls.';
        $this->route = 'redirect-urls.';
    }

    public function index()
    {
        $redirectUrls = $this->redirectUrl->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('redirectUrls'));
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(RedirectUrlRequest $request)
    {
        $this->redirectUrl->create($request->all());

        return redirect()->route($this->route.'index')->with('success','New redirect url added successfully');
    }

    public function show($id)
    {
        $redirectUrl = $this->redirectUrl->find($id);

        if(!$redirectUrl){
            return redirect()->back()->with('error','Redirect url not found');
        }

        return view($this->viewPrefix.'show',compact('redirectUrl'));
    }

    public function edit($id)
    {
        $redirectUrl = $this->redirectUrl->find($id);

        if(!$redirectUrl){
            return redirect()->back()->with('error','Redirect url not found');
        }

        return view($this->viewPrefix.'edit',compact('redirectUrl'));
    }

    public function update(RedirectUrlRequest $request, $id)
    {
        $redirectUrl = $this->redirectUrl->find($id);

        if(!$redirectUrl){
            return redirect()->back()->with('error','Redirect url not found');
        }

        $redirectUrl->update($request->all());

        return redirect()->route($this->route.'index')->with('success','Redirect url update successfully');
    }

    public function updateStatus($id)
    {
        $redirectUrl = $this->redirectUrl->find($id);

        $redirectUrl->is_enabled = !(bool)$redirectUrl->is_enabled;
        $redirectUrl->save();

        return redirect()->route($this->route.'index')->with('success','Redirect url status updated successfully');
    }

    public function destroy($id)
    {
        $redirectUrl = $this->redirectUrl->find($id);

        if(!$redirectUrl){
            return redirect()->back()->with('error','Redirect url not found');
        }

        $redirectUrl->delete();

        return redirect()->route($this->route.'index')->with('success','Redirect url deleted successfully');
    }
}
