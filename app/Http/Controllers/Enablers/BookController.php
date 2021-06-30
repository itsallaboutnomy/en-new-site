<?php

namespace App\Http\Controllers\Enablers;

use App\Models\User;
use App\Http\Requests\Enablers\Book\BookPaymentRequest;
use App\Http\Requests\Enablers\Book\BookPaymentProofRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    protected $user, $viewPrefix;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->viewPrefix = 'enablers.app.books.';
    }
    public function index(){
        return view($this->viewPrefix.'index');
    }

    public function create(){
    }

    public function createPayment(){
        return view($this->viewPrefix.'payment');
    }

    public function createPaymentProof(){
        return view($this->viewPrefix.'payment-proof');
    }

    public function store(Request $request){
    }

    public function storePayment(BookPaymentRequest $request)
    {
        $request->validated();

        $user = $this->user->where('cnic',$request->cnic)->first();
        if(!$user){
            $this->user->create($request->all());
        }
    }
    public function storePaymentProof(BookPaymentProofRequest $request)
    {
        $request->validated();

        $this->user->create($request->all());
    }
}
