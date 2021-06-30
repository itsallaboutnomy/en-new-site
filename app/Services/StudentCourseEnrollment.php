<?php


namespace App\Services;

use App\Models\Quiz\Course;

use App\Models\Quiz\Question;
use App\Models\Quiz\QuizCertificationEnrollment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;


class StudentCourseEnrollment
{
    public function get(int $course_id, int $student_user_id)
    {
        $_enrollment = QuizCertificationEnrollment::where(['course_id' => $course_id, 'student_user_id' => $student_user_id])->with('quizresult')->first();
        if($_enrollment)
            $enrollment = $_enrollment->toArray();
//        dd($enrollment);
//        DB::connection()->enableQueryLog();

//        $enrollment = DB::table('quiz_certification_enrollments as qce')
//            ->leftJoin('quiz_results as qr', function ($join) {
//                $join->on('qr.course_id', '=', 'qce.course_id');
//                $join->where('qr.student_user_id', '=', 'qce.student_user_id');
//            })
//
//            ->where([
//                'qce.student_user_id' => $student_user_id,
//                'qce.course_id' => $course_id
//            ])
//            ->orderBy('qce.created_at', 'desc')
//            ->select('qce.course_id as course_id', 'qce.id as enrollment_id','qce.payment_status', 'qr.is_passed as result_status', 'qce.student_user_id' , 'qce.attempted_at')
//            ->groupBy('qce.payment_status', 'qr.is_passed', 'qce.student_user_id',  'qce.id', 'qce.attempted_at')
//            ->first();
////        $queries = DB::getQueryLog();
////        dd($queries);
//        return ($enrollment);
        if (empty($enrollment)) {
            Log::info('1 course id : ' . $course_id . ' has no enrollment');
            return null;
        }

//        $enrollment->quiz_total_time = $this->_getTotalQuizTime(Arr::get($enrollment,'course_id'));
        $enrollment = Arr::add($enrollment, 'quiz_total_time', $this->_getTotalQuizTime(Arr::get($enrollment, 'course_id')));
        if (empty(Arr::get($enrollment, 'attempted_at'))) {
            Log::info('2 course id : ' . $course_id . ' has not been attempted');
            return Arr::add($enrollment, 'enrollment_status', $this->getStatusForNonAttemptedExam($_enrollment));

        }
        Log::info('3 course id : ' . $course_id . ' has been attempted');
//        $enrollment->enrollment_status = $this->getStatusForPreviouslyAttempted($enrollment);
        return Arr::add($enrollment, 'enrollment_status', $this->getStatusForPreviouslyAttempted($_enrollment));

    }

    private function _getTotalQuizTime($courseId)
    {
        return $questions = Question::whereCourseId($courseId)->get()->sum('required_time');
    }

    public function getTotalQuizTime()
    {
        $courses = Course::with('questions')->get();
        $data = [];
        foreach ($courses as $course) {
            $data[] = [
                'id' => $course->id,
                'name' => $course->name,
                'total_questions' => $course->questions->count(),
                'total_questions_time' => $course->questions->sum('required_time'),
            ];

        }
        return $data;
    }

        private function getStatusForNonAttemptedExam($enrollment)
    {
        if($enrollment->payment_status == QuizCertificationEnrollment::PAYMENT_STATUS_PENDING) {
            return QuizCertificationEnrollment::ENROLLMENT_STATUS_PENDING;
        }
        if($enrollment->payment_status ==  QuizCertificationEnrollment::PAYMENT_STATUS_PENDING_APPROVAL) {
            return QuizCertificationEnrollment::ENROLLMENT_STATUS_PENDING_APPROVAL;
        }
        if($enrollment->payment_status ==  QuizCertificationEnrollment::PAYMENT_STATUS_APPROVED) {
            return QuizCertificationEnrollment::ENROLLMENT_STATUS_ENROLLED;
        }
        if($enrollment->payment_status ==  QuizCertificationEnrollment::PAYMENT_STATUS_REJECTED) {
            return QuizCertificationEnrollment::PAYMENT_STATUS_REJECTED;
        }
        throw new \Exception('Invalid Payment Status', 400);
    }
    private function getStatusForPreviouslyAttempted($enrollment)
    {
        if(empty($enrollment->quizresult)) {
            return 'pending result';
        }
        if($enrollment->quizresult->is_passed) {
            Log::info('4 course id : ' . $enrollment->quizresult . ' has been attempted');

            return 'passed';
        }
        if(!$enrollment->quizresult->is_passed) {
            Log::info('4 course id : ' . $enrollment->quizresult . ' has been attempted');

            return 'failed';
        }
    }

}
