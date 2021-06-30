<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    protected $event;

    public function __construct(Event $event) {
        $this->event = $event;
    }

    public function index()
    {
        $events = $this->event->enabled()->orderBy('order_number','ASC')->get();

        return view('enablers.app.events',compact('events'));
    }
    public function upcoming(Request $request)
    {
        $query = strtoupper(trim($request->get('query')));

        $events = $this->event->enabled()->upComingEvents();

        if($query){
            $events = $events->where('title','LIKE', "%{$query}%");
        }

        $events = $events->orderBy('order_number','ASC')->paginate(15);

        return view('enablers.app.upcoming-events',compact('events'));
    }


}
