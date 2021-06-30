<?php

namespace App\Http\Controllers\Enablers;

use App\Mail\ConsentMail;
use App\Models\Enablers\Consent;
use App\Models\Enablers\Training;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Enablers\ConsentTerm;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Enablers\ConsentRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ConsentController extends Controller
{
    protected $consent, $consentTypes, $imagesDirectoryPath, $viewPrefix, $routePrefix;

    public function __construct(Consent $consent)
    {
        $this->consent = $consent;
        $this->consentTypes = $consent::$type;
        $this->imagesDirectoryPath = $consent::$imagesDirectoryPath;
        $this->viewPrefix = 'enablers.app.consents.';
        $this->routePrefix = 'app.consents.';
    }

    public function  index(){

    }

    public function create($slug)
    {

        if(!isset($this->consentTypes[$slug])){
            abort(404);
        }

        $trainings = [];

        if($slug === 'student-consent'){
            $trainings = Training::enabled()->get();
        }

        $consent = ConsentTerm::enabled()->whereConsentFor($this->consentTypes[$slug])->first();
        if(empty($consent)){
            abort(404);
        }
        $consent->terms = explode(';',str_replace("\r\n",'',$consent->terms));



        return view($this->viewPrefix.'create-consent', compact('trainings','consent','slug'));
    }

    public function store(ConsentRequest $request,$slug)
    {
        $consent = ConsentTerm::enabled()->whereConsentFor($this->consentTypes[$slug])->first();

        if(!$consent){
            abort(404);
        }

        $data = $request->all();
        $data['consent_terms_id'] = $consent->id;

        if($request->hasFile('signature_image_path')) {
            $attachment = $request->file('signature_image_path')->store($this->imagesDirectoryPath.$slug.'/');
            $data['signature_image_path'] = $attachment;
        }

        $consent = $this->consent->create($data);

        $consentTerms = ConsentTerm::enabled()->whereConsentFor($this->consentTypes[$slug])->first();
        if(empty($consentTerms)){
            abort(404);
        }

        $terms = explode(';',str_replace("\r\n",'',$consentTerms->terms));

        $consent->consent_pdf_path = $this->getPathTrainingChallanPDF($consent,$terms, $slug);
        $consent->save();

        Mail::to($consent->email)->send(new ConsentMail($consent,$request->type));

        return redirect()->route($this->routePrefix.'consent-success')->with('success','Consent Added Successfully');
    }

    public function consentSuccess() {
        return view($this->viewPrefix.'consent-success');
    }

    private  function getPathTrainingChallanPDF($consent,$terms, $slug )
    {
        $pdf = PDF::loadView($this->viewPrefix.'consent-pdf', compact('consent', 'terms','slug'));
        $pdf->setPaper('A4', 'portrait');

        $fileName = time().'-'.str_replace(' ','-',ucwords(trim($consent->name))).'-'.$consent->type.'.pdf';
        $filePath = Consent::$pdfConsentDirectoryPath.$fileName;

        Storage::put($filePath, $pdf->output());

        return str_replace('public/','storage/',$filePath);
    }
}
