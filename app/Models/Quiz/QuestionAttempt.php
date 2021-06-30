<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class QuestionAttempt extends Model
{
    protected $fillable = [
        'quiz_id', 'question_id', 'student_id', 'text_answer', 'chosen_option','is_attempt'
    ];

//    protected $guarded = [ 'is_examiner_checked','obtained_marks'];

    public function question(){
        return $this->belongsTo(Question::class,'question_id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function quiz(){
        return $this->belongsTo(Quiz::class,'quiz_id');
    }
}
