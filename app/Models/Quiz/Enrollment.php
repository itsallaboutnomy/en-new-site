<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    public  function training(){

        return $this->belongsTo(Training::class,'training_id');
    }

    public function student(){

        return $this->belongsTo(Student::class,'user_id');
    }


}
