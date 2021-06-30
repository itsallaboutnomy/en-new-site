<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'users';

    public function course(){
        return $this->belongsTo(Course::class, 'training_id');
    }

    public function enrollment(){

        return $this->hasOne(Enrollment::class,'user_id');
    }

    public function questionAttempt(){
        return $this->hasMany(QuestionAttempt::class,'student_id');
    }

    public function result(){
        return $this->hasOne(QuizResult::class);
    }
}
