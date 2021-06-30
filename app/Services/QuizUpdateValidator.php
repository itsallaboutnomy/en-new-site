<?php


namespace App\Services;


use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizUpdateValidator
{
    public function getCriticalFieldsModified(Request $request, Quiz $quiz)
    {
        $attempted = DB::table('question_attempts')
            ->where('quiz_id', $quiz->id)
            ->first();
        if(empty($attempted)) {
            return [];
        }
        $criticalFields = [
            'total_marks',
            'passing_marks',
            'total_time',
            'total_questions'
        ];
        $newData = $request->all();
        $fieldsModified = [];
        foreach ($criticalFields as $field) {
            if($newData[$field] != $quiz->$field) {
                $fieldsModified[] = $field;
            }
        }
        return $fieldsModified;
    }

}
