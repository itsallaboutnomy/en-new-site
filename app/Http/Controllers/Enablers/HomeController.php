<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\Product;
use App\Models\Enablers\Objective;
use App\Models\Enablers\Milestone;
use App\Models\Enablers\SliderImage;
use App\Models\Enablers\Achievement;
use App\Models\Enablers\Collaboration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $viewPrefix, $routePrefix;

    public function __construct()
    {
        $this->viewPrefix = 'enablers.app.';
    }

    public function index()
    {
        $sliderImages = SliderImage::enabled()->orderBy('order_number','ASC')->get();
        $achievements = Achievement::enabled()->orderBy('order_number','ASC')->get();
        $objectives = Objective::enabled()->orderBy('order_number','ASC')->get();
        $milestones = Milestone::enabled()->orderBy('order_number','ASC')->get();
        $collaborations = Collaboration::enabled()->orderBy('order_number','ASC')->get();
        $products = Product::enabled()->orderBy('order_number','ASC')->get();

        return view($this->viewPrefix.'welcome',compact('sliderImages','objectives','achievements','milestones','collaborations','products'));
    }

    public function guestVisitor() {
        return view($this->viewPrefix.'guest-visitor');
    }

    public function termsConditions() {
        return view($this->viewPrefix.'terms-and-conditions');
    }

    public function privacyPolicy() {
        return view($this->viewPrefix.'privacy-policy');
    }

    public function confirmVisitor(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);

        if($request->password == 'secretEnablers'){
            $ip = $request->ip();
            $request->session()->put('guest-'.str_replace('.','',$ip),$ip);

            return redirect()->route('app.welcome');
        }

        return redirect()->back()->with('status','In-Valid Password');
    }
}
