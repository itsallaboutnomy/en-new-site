<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Faq;
use App\Http\Requests\Enablers\Admin\FAQRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{
    protected $faq, $viewPrefix, $route;

    public function __construct(Faq $faq)
    {
        $this->faq = $faq;

        $this->viewPrefix = 'enablers.admin.faqs.';
        $this->route = 'faqs.';
    }

    public function index()
    {
        $faqs = $this->faq->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('faqs'));
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(FAQRequest $request)
    {
        Faq::create($request->all());

        return redirect()->route($this->route.'index')->with('success','New faq added successfully');
    }

    public function show($id)
    {
        $faq = $this->faq->find($id);

        if(!$faq){
            return redirect()->back()->with('error','FAQ not found');
        }

        return view($this->viewPrefix.'show',compact('faq'));
    }

    public function edit($id)
    {
        $faq = $this->faq->find($id);

        if(!$faq){
            return redirect()->back()->with('error','FAQ not found');
        }

        return view($this->viewPrefix.'edit',compact('faq'));
    }

    public function update(FAQRequest $request, $id)
    {
        $faq = $this->faq->find($id);

        if(!$faq){
            return redirect()->back()->with('error','FAQ not found');
        }

        $faq->update($request->all());

        return redirect()->route($this->route.'index')->with('success','FAQ update successfully');
    }

    public function updateStatus($id)
    {
        $faq = $this->faq->find($id);

        $faq->is_enabled = !(bool)$faq->is_enabled;
        $faq->save();

        return redirect()->route($this->route.'index')->with('success','FAQ status updated successfully');
    }

    public function destroy($id)
    {
        $faq = $this->faq->find($id);

        if(!$faq){
            return redirect()->back()->with('error','FAQ not found');
        }

        $faq->delete();

        return redirect()->route($this->route.'index')->with('success','FAQ deleted successfully');
    }
}
