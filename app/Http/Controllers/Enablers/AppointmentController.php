<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\Office;
use App\Models\Enablers\Appointment;
use App\Http\Requests\Enablers\AppointmentRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{

    protected $Appointment, $viewPrefix, $routePrefix;

    public function __construct(Appointment $Appointment)
    {
        $this->Appointment = $Appointment;
        $this->viewPrefix = 'enablers.app.appointments.';
        $this->routePrefix = 'app.appointment.';
    }

    public function create()
    {
        $offices = Office::enabled()->get();

        return view($this->viewPrefix.'create',compact('offices'));
    }

    public function store(AppointmentRequest $request)
    {
        $this->Appointment->create($request->all());

        return redirect()->route($this->routePrefix.'submitted');
    }
    public function success() {
        return view($this->viewPrefix.'appointment-success');
    }
}
