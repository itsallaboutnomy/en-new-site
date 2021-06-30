<?php

namespace App\Models\Quiz;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;




class Course extends Model
{

    protected $guarded =[];

    public function examiners()
    {
        return $this->belongsToMany(User::class, 'user_course');
    }

    public function training() {
        return $this->belongsTo(Training::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function enrollment(){
        return $this->hasOne(Student::class);
    }
}
