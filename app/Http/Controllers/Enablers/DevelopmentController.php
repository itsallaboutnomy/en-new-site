<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DevelopmentController extends Controller
{
    public function index()
    {
        $product = Product::enabled()->orderBy('order_number','ASC')->get();

        return view('enablers.app.developments',compact('product'));
    }
}
