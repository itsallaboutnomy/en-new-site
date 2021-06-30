<?php

namespace App\Models\Enablers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'office_id',
        'appointment_date',
        'purpose_visit',
        'appointment_time'
    ];

    public function setAppointmentDateAttribute($value)
    {
        if($value){
            $this->attributes['appointment_date'] = date('Y-m-d',strtotime($value));
        } else {
            $this->attributes['appointment_date'] = NULL;
        }
    }

    public function office(){
        return $this->belongsTo(Office::class);
    }
}
