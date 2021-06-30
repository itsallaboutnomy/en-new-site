<?php

namespace App\Http\Controllers\Enablers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        return view('enablers.admin.home');
    }
}
