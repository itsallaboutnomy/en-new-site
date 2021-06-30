<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Event;
use App\Http\Requests\Enablers\Admin\EventRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    protected $event, $viewPrefix, $route;

    public function __construct(Event $event)
    {
        $this->event = $event;

        $this->viewPrefix = 'enablers.admin.events.';
        $this->route = 'events.';
    }

    public function index()
    {
        $events = $this->event->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('events'));
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(EventRequest $request)
    {
        $this->event->create($request->all());

        return redirect()->route($this->route.'index')->with('success','New event added successfully');
    }

    public function show($id)
    {
        $event = $this->event->find($id);

        if(!$event){
            return redirect()->back()->with('error','Event not found');
        }

        return view($this->viewPrefix.'show',compact('event'));
    }

    public function edit($id)
    {
        $event = $this->event->find($id);

        if(!$event){
            return redirect()->back()->with('error','Event not found');
        }

        return view($this->viewPrefix.'edit',compact('event'));
    }

    public function update(EventRequest $request, $id)
    {
        $event = $this->event->find($id);

        if(!$event){
            return redirect()->back()->with('error','Event not found');
        }

        $event->update($request->all());

        return redirect()->route($this->route.'index')->with('success','Event update successfully');
    }

    public function updateStatus($id)
    {
        $event = $this->event->find($id);

        $event->is_enabled = !(bool)$event->is_enabled;
        $event->save();

        return redirect()->route($this->route.'index')->with('success','Event status updated successfully');
    }

    public function destroy($id)
    {
        $event = $this->event->find($id);

        if(!$event){
            return redirect()->back()->with('error','Event not found');
        }

        $event->delete();

        return redirect()->route($this->route.'index')->with('success','Event deleted successfully');
    }
}
