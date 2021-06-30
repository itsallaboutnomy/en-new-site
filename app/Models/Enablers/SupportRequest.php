<?php

namespace App\Models\Enablers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportRequest extends Model
{
    use HasFactory;

    public static $imagesDirectoryPath = 'public/uploads/support-request-images/';

    protected $fillable = [
        'request_type',
        'name',
        'email',
        'phone',
        'request_for',
        'trainer_id',
        'training_id',
        'batch_id',
        'event_id',
        'date',
        'reason',
        'no_of_classes',
        'fee',
        'attachment',
        'description',
    ];

    public static $requestType = [
        'refund-request' => 'refund-request',
        'payment-related-concern' => 'payment-related-concern',
        'evs-concern' => 'evs-concern',
        'training-related-concern' => 'training-related-concern',

        'change-of-training-request' => 'change-of-training-request',
        'change-of-mentor-request' => 'change-of-mentor-request',
        'general-complaint' => 'general-complaint',
        'suggestions' => 'suggestions',
        'epas-concern' => 'epas-concern',
    ];


    public function setAttachmentAttribute($value){
        $this->attributes['attachment'] = str_replace('public/','storage/',$value);
    }

    public function setDateAttribute($value)
    {
        if($value){
            $this->attributes['date'] = date('Y-m-d',strtotime($value));
        } else {
            $this->attributes['date'] = NULL;
        }
    }

    public  function scopeRefundRequests($query){
        return $query->whereRequestType(self::$requestType['refund-request']);
    }
    public  function scopePaymentRequests($query){
        return $query->whereRequestType(self::$requestType['payment-related-concern']);
    }
    public  function scopeEvsConcernRequests($query){
        return $query->whereRequestType(self::$requestType['evs-concern']);
    }
    public  function scopeTrainingRelatedConcernRequests($query){
        return $query->whereRequestType(self::$requestType['training-related-concern']);
    }public  function scopeChangeOfTrainingRequests($query){
        return $query->whereRequestType(self::$requestType['change-of-training-request']);
    }public  function scopeChangeOfMentorRequests($query){
        return $query->whereRequestType(self::$requestType['change-of-mentor-request']);
    }public  function scopeGeneralComplaintRequests($query){
        return $query->whereRequestType(self::$requestType['general-complaint']);
    }public  function scopeSuggestionRequests($query){
        return $query->whereRequestType(self::$requestType['suggestions']);
    }public  function scopeEpasConcernRequests($query){
        return $query->whereRequestType(self::$requestType['epas-concern']);
    }

    public  function trainer(){
        return $this->belongsTo(Trainer::class,'trainer_id');
    }
    public  function training(){
        return $this->belongsTo(Training::class,'training_id');
    }
    public  function batch(){
        return $this->belongsTo(TrainingBatch::class,'batch_id');
    }
    public  function event(){
        return $this->belongsTo(Event::class,'event_id');
    }

}
