<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Consent;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class ConsentController extends Controller
{
    protected $consent, $viewPrefix, $routePrefix;

    public function __construct(Consent $consent)
    {
        $this->consent = $consent;

        $this->viewPrefix = 'enablers.admin.consents.';
        $this->routePrefix = 'consents.';
    }
    public function  index(){

        $consents = $this->consent->get();
        return view($this->viewPrefix.'index',compact('consents'));
    }

    public function indexStudentConsent() {
        return view($this->viewPrefix.'index-student-consent');
    }public function indexExlConsent() {
        return view($this->viewPrefix.'index-exl-consent');
    }public function indexFbaWholeSaleConsent() {
        return view($this->viewPrefix.'index-fba-wholesale-consent');
    }public function indexListingPromoterConsent() {
        return view($this->viewPrefix.'index-listing-promoter-consent');
    }public function indexOneYearConsent() {
        return view($this->viewPrefix.'index-one-year-consent');
    }

    public function studentConsentData(){

        $consent = $this->consent
            ->with(['consentTerms','training'])

            ->whereHas('consentTerms' , function($query){
                $query->where('consent_for',Consent::$type['student-consent']);
            })
            ->orderBy('id','desc');

        return Datatables::of($consent)
            ->addColumn('training_name', function($model) {
                return $model->training ? $model->training->title : 'N/A';
            })
            ->addColumn('is_approved', function ($model) {

                if($model->is_approved == 1){
                    return '<strong class="text-success">Approved</strong>';
                }
                return '<strong class="text-danger">Disapproved</strong>';

            })
            ->addColumn('action', function ($model) {
                return '<a href="'.route($this->routePrefix.'show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })
            ->rawColumns(['is_approved', 'action'])
            ->make(true);
    }
    public function ExlConsentData(){

        $consent = $this->consent
            ->with(['consentTerms'])
            ->whereHas('consentTerms' , function($query){
                $query->where('consent_for',Consent::$type['exl-consent']);
            })
            ->orderBy('id','desc');

        return Datatables::of($consent)
            ->addColumn('is_approved', function ($model) {

                if($model->is_approved == 1){
                    return '<strong class="text-success">Approved</strong>';
                }
                return '<strong class="text-danger">Disapproved</strong>';

            })
            ->addColumn('action', function ($model) {
                return '<a href="'.route($this->routePrefix.'show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })
            ->rawColumns(['is_approved', 'action'])
            ->make(true);
    }

    public function OneYearConsentData(){

        $consent = $this->consent
            ->with(['consentTerms'])
            ->whereHas('consentTerms' , function($query){
                $query->where('consent_for',Consent::$type['one-year-consent']);
            })

            ->orderBy('id','desc');

        return Datatables::of($consent)
            ->addColumn('action', function ($model) {
                return '<a href="'.route($this->routePrefix.'show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })
            ->addColumn('is_approved', function ($model) {

                if($model->is_approved == 1){
                    return '<strong class="text-success">Approved</strong>';
                }
                return '<strong class="text-danger">Disapproved</strong>';

            })
            ->rawColumns(['is_approved', 'action'])
            ->make(true);
    }
    public function ListingPromoterConsentData(){

        $consent = $this->consent
            ->with(['consentTerms'])
            ->whereHas('consentTerms' , function($query){
                $query->where('consent_for',Consent::$type['listing-promoter-consent']);
            })
            ->orderBy('id','desc');

        return Datatables::of($consent)
            ->addColumn('action', function ($model) {
                return '<a href="'.route($this->routePrefix.'show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })
            ->addColumn('is_approved', function ($model) {

                if($model->is_approved == 1){
                    return '<strong class="text-success">Approved</strong>';
                }
                return '<strong class="text-danger">Disapproved</strong>';

            })
            ->rawColumns(['is_approved', 'action'])
            ->make(true);
    }

    public function FbaWholeSaleConsentData(){

        $consent = $this->consent
            ->with(['consentTerms'])
            ->whereHas('consentTerms' , function($query){
                $query->where('consent_for',Consent::$type['fba-wholesale-consent']);
            })
            ->orderBy('id','desc');

        return Datatables::of($consent)
            ->addColumn('action', function ($model) {
                return '<a href="'.route($this->routePrefix.'show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })
            ->addColumn('is_approved', function ($model) {

                if($model->is_approved == 1){
                    return '<strong class="text-success">Approved</strong>';
                }
                return '<strong class="text-danger">Disapproved</strong>';

            })
            ->rawColumns(['is_approved', 'action'])
            ->make(true);
    }

    public function updateStatus($id)
    {
        $consent = $this->consent->find($id);

        $consent->is_approved = !(bool)$consent->is_approved;
        $consent->save();

        return redirect()->back()->with('success','Consent status updated successfully');
    }

    public function show(Request $request,$id)
    {
        $consent = $this->consent->find($id);

        if(!$consent){
            abort(404);
        }
        return view($this->viewPrefix.'show',compact('consent'));
    }
}
