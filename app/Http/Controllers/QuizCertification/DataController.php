<?php

namespace App\Http\Controllers\QuizCertification;

use App\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){

        $examiners = User::with('roles')
            ->whereHas('roles', function ($query) {
                $query->where('name', '=', 'trainer');
            })
            ->get();
        return response()->json(['examiners' => $examiners]);
    }
}
