<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'course_id',
        'title', 'type',
        'text_answer', 'correct_option',
        'required_time',  'total_marks' ,
        'options_count', 'option_a', 'option_b', 'option_c', 'option_d', 'option_e'
    ];

    public function course(){
        return $this->belongsTo(Course::class , 'course_id');
    }

    public function attempts(){
        return $this->hasMany(QuestionAttempt::class);
    }
}
