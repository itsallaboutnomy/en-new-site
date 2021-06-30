<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    public function  enrollment(){

        return $this->hasMany(Enrollment::class);
    }




}
