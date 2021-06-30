<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Course;
use App\Models\Student;

class QuizResult extends Model
{
    protected $fillable =['quiz_id','course_id','quiz_enrollment_id','attempt_id', 'student_user_id' , 'obtained_marks','attempt_count', 'is_passed'];

    public function quiz(){

        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
    public function student(){

        return $this->belongsTo(Student::class, 'student_id');
    }
    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
}
