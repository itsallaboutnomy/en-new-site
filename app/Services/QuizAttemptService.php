<?php


namespace App\Services;


use Illuminate\Support\Facades\DB;

class QuizAttemptService
{
    public function isQuizAttempted(int $quiz_id)
    {
        $attempt = DB::table('question_attempts')
            ->where('quiz_id', $quiz_id)
            ->first();
        if(!empty($attempt)) {
            return true;
        }
        return false;
    }

}
