<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\Office;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfficesController extends Controller
{
    public function index()
    {
        $headOffice = Office::where('is_head_office', true)->first();
        $offices = Office::enabled()->notHeadOffice()->orderBy('order_number','ASC')->get();

        return view('enablers.app.offices',compact('headOffice','offices'));
    }

}
