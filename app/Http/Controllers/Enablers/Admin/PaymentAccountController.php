<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\PaymentAccount;
use App\Http\Requests\Enablers\Admin\PaymentAccountRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentAccountController extends Controller
{
    protected $paymentAccount, $viewPrefix, $route;

    public function __construct(PaymentAccount $paymentAccount)
    {
        $this->paymentAccount = $paymentAccount;

        $this->viewPrefix = 'enablers.admin.payment-accounts.';
        $this->route = 'payment-accounts.';
    }

    public function index()
    {
        $paymentAccounts = $this->paymentAccount->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('paymentAccounts'));
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(PaymentAccountRequest $request)
    {
        $this->paymentAccount->create($request->all());

        return redirect()->route($this->route.'index')->with('success','New payment account added successfully');
    }

    public function show($id)
    {
        $paymentAccount = $this->paymentAccount->find($id);

        if(!$paymentAccount){
            return redirect()->back()->with('error','Payment account not found');
        }

        return view($this->viewPrefix.'show',compact('paymentAccount'));
    }

    public function edit($id)
    {
        $paymentAccount = $this->paymentAccount->find($id);

        if(!$paymentAccount){
            return redirect()->back()->with('error','Payment account not found');
        }

        return view($this->viewPrefix.'edit',compact('paymentAccount'));
    }

    public function update(PaymentAccountRequest $request, $id)
    {
        $paymentAccount = $this->paymentAccount->find($id);

        if(!$paymentAccount){
            return redirect()->back()->with('error','Payment account not found');
        }

        $paymentAccount->update($request->all());

        return redirect()->route($this->route.'index')->with('success','Payment account successfully');
    }

    public function updateStatus($id)
    {
        $paymentAccount = $this->paymentAccount->find($id);

        $paymentAccount->is_enabled = !(bool)$paymentAccount->is_enabled;
        $paymentAccount->save();

        return redirect()->route($this->route.'index')->with('success','Payment account status updated successfully');
    }

    public function destroy($id)
    {
        $paymentAccount = $this->paymentAccount->find($id);

        if(!$paymentAccount){
            return redirect()->back()->with('error','Payment account not found');
        }

        $paymentAccount->delete();

        return redirect()->route($this->route.'index')->with('success','Payment account deleted successfully');
    }
}
