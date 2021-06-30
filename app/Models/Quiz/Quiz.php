<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Quiz extends Model
{
    protected  $fillable = ['examiner_user_id','course_id','title','total_marks','passing_marks',
        'total_time', 'total_questions','summary'
    ];

    protected  $guarded= ['is_active'];

    public function course() {
        return $this->belongsTo(Course::class);
    }
    public function examiner(){
        return $this->belongsTo(User::class, 'examiner_user_id');
    }

    public function questions(){
        return $this->hasMany(Question::class,'quid_id');
    }

    public function attempts(){
        return $this->hasMany(QuestionAttempt::class ,'quid_id');
    }

    public function results(){
    }
}
