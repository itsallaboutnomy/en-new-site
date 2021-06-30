<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Appointment;
use Yajra\DataTables\DataTables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    protected $appointment, $viewPrefix, $routePrefix;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
        $this->viewPrefix = 'enablers.admin.appointments.';
        $this->routePrefix = 'appointments.';
    }

    public function index()
    {
        return view($this->viewPrefix.'index');
    }

    public function appointmentData(Request $request){

        $appointment = $this->appointment
            ->orderBy('id','desc');

        return Datatables::of($appointment)
            ->addColumn('created_at', function ($model) {
                return date('d M, Y g:i A',strtotime($model->created_at)) ;
            })

            ->addColumn('office', function($model) {
                return $model->office->title;
            })

            ->filter(function ($query) use ($request) {
                if ($request->has('date_range') && ! is_null($request->get('date_range'))) {

                    $from = explode(' - ',$request->get('date_range'))[0];
                    $to = explode(' - ',$request->get('date_range'))[1];

                    return $query->whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to);
                }
            })

            ->make(true);
    }

    public function show(Request $request,$id)
    {
        $appointment = $this->appointment->find($id);

        if(!$appointment){
            abort(404);
        }
        return view($this->viewPrefix.'show',compact('appointment'));
    }
}
