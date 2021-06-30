<?php

namespace App\Models\Enablers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consent extends Model
{
    use HasFactory;

    public static $imagesDirectoryPath = 'public/uploads/consent-images/';
    public static $pdfConsentDirectoryPath = 'public/consent-pdfs/';

    protected $fillable = ['consent_terms_id', 'name', 'email', 'phone', 'training_id', 'signature_image_path'];

    public static $type = [
        'exl-consent' =>'EXL Consent',
        'student-consent' => 'Student Consent',
        'one-year-consent' => 'One Year Specialization Consent',
        'fba-wholesale-consent' => 'FBA Wholesale Consent',
        'listing-promoter-consent' =>'Listing Promoter Consent',
    ];

    public function setSignatureImagePathAttribute($value){
        $this->attributes['signature_image_path'] = str_replace('public/','storage/',$value);
    }

    public function consentTerms(){
        return $this->belongsTo(ConsentTerm::class, 'consent_terms_id');
    }

    public function training(){
        return $this->belongsTo(Training::class, 'training_id');
    }
}


