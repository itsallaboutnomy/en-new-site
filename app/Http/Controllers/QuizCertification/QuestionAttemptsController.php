<?php

namespace App\Http\Controllers\QuizCertification;

use App\Models\Quiz\Answer;
use App\Models\Quiz\Option;
use App\Models\Quiz\Question;
use App\Models\Quiz\QuestionAttempt;
use App\Models\Quiz\QuizCertificationEnrollment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuestionAttemptsController extends Controller
{
    public function submitExam(Request $request, int $course_id)
    {
        $response = [
            'status' => false,
            'message' => '',
            'data' => null
        ];

        $rules = [
            'quiz' => 'array',
            'quiz.*.type' => 'required',
            'quiz.*.question_id' => 'required',
            'quiz.*.is_attempt' => 'required',
            'quiz.*.chosen_option' => 'required_if:quiz.*.type,mcqs & quiz.*.is_attempt,true',
            'quiz.*.text_answer' => 'required_if:quiz.*.type,text & quiz.*.is_attempt,true'
        ];

        $this->validate($request, $rules);

        $quizData = $request->quiz;
        $student_user_id = auth()->user()->id;

        $examAttempt = QuizCertificationEnrollment::where([
            'course_id' => $course_id,
            'student_user_id' => $student_user_id
        ])->whereNotNull('attempted_at')->first();

//        $submit_by = Carbon::parse($examAttempt->attempted_at)->addSeconds($examAttempt->total_exam_time);
//
//        if(Carbon::now()->diffInSeconds($submit_by) > 20) {
//            return response()->json([
//                'status' => false,
//                'message' => 'your exam has been expired'
//            ]);
//        }
        $attemptId = uniqid();
        foreach ($quizData as $data) {

            $attemptQuestion = new QuestionAttempt;
            $attemptQuestion->is_attempt = $data['is_attempt'];
            $attemptQuestion->student_user_id = $student_user_id;
            $attemptQuestion->course_id = $course_id;
            $attemptQuestion->attempt_id = $attemptId;
            $attemptQuestion->question_id = $data['question_id'];

            if ($data['type'] == 'mcq') {
                $attemptQuestion->chosen_option = $data['chosen_option'];
                $question = Question::find($data['question_id']);
                if ($question->correct_option == $data['chosen_option']) {

                    $attemptQuestion->obtained_marks = $question->total_marks;
                } else if ($question->correct_option != $data['chosen_option']) {

                    $attemptQuestion->obtained_marks = 0;

                }

            } else if ($data['type'] == 'text') {

                $attemptQuestion->text_answer = $data['text_answer'];
            }

            $attemptQuestion->save();
        }

        $response['status'] = true;
        $response['message'] = 'Quiz submitted successfully';
        return response()->json($response);

    }

}
