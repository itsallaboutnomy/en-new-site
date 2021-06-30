<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\Faq;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{
    protected $faq;

    public function __construct(Faq $faq)
    {
        $this->faq = $faq;
    }

    public function index(){

        $faqs = $this->faq->enabled()->get();

        return view('enablers.app.faqs',compact('faqs'));
    }
}
