<?php

namespace App\Http\Controllers\QuizCertification;

use App\Models\Quiz\Course;
use App\Models\Quiz\Student;
use App\Models\Quiz\Question;
use App\Models\Quiz\QuizResult;
use App\Models\Quiz\QuestionAttempt;
use App\Models\Quiz\QuizCertificationEnrollment;
use App\Models\Quiz;
use App\Services\StudentCourseEnrollment;
use App\Services\EnrollForCourseService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;


class StudentController extends Controller
{
    /**
     * @var StudentCourseEnrollment
     */
    private $studentCourseEnrollment;
    /**
     * @var EnrollForCourseService
     */
    private $enrollForCourseService;

    public function __construct(EnrollForCourseService $enrollForCourseService, StudentCourseEnrollment $studentCourseEnrollment)
    {
        $this->studentCourseEnrollment = $studentCourseEnrollment;
        $this->enrollForCourseService = $enrollForCourseService;
    }

    public function enroll(int $course_id)
    {

            $course = Course::findOrFail($course_id);
            $enrollmentResult = $this->enrollForCourseService->enroll($course);

            return response()->json(
                [
                    'data' => $enrollmentResult
                ], 200);
    }
    public function enrollCourses(){

        $user = auth()->user();
//        $enrollCourses = QuizCertificationEnrollment::where('student_user_id' ,$user->id)->distinct('course_id')->get();
        $enrollCourses = DB::table('quiz_certification_enrollments as qce')
            ->join('courses','qce.course_id','=', 'courses.id')
            ->select('courses.id as course_id','courses.name as course_name','qce.payment_status')
            ->where('student_user_id' ,$user->id)
            ->get();

        return response()->json(
            [
                'data' => $enrollCourses
            ], 200);

    }

    public function courses(Request $request, $student_user_id)
    {
        $all_courses = Course::whereStatus('Published')->get();

        foreach ($all_courses as $course ) {

            $course->quiz_enrollment = $this->studentCourseEnrollment->get($course->id, intval($student_user_id));

        }
        $questionsData = $this->studentCourseEnrollment->getTotalQuizTime();

        return response()->json([
            'courses' => $all_courses,
            'questions' => $questionsData,
        ], 200);
    }

    public function prepareExam(Request $request, int $course_id)
    {
        $response = [
            'status' => false,
            'message' => '',
            'data' => null
        ];

        $student_user_id = auth()->user()->id;
        $enrollment = $this->studentCourseEnrollment->get($course_id, $student_user_id);
        // get request token and match from quiz_certification_enrollment table

        if (!$enrollment) {
            $response['message'] = 'You are not enrolled for any exam.';
            return response()->json($response);
        }
        if(!empty($enrollment) && Arr::get($enrollment, 'enrollment_status') !== QuizCertificationEnrollment::ENROLLMENT_STATUS_ENROLLED) {
            $response['message'] = 'Enrollment not valid.';
            $response['data'] = $enrollment;
            return response()->json($response);
        }

        $course = Course::findOrFail($course_id);
        // prepare quiz

        $questions = Question::where('course_id', $course_id)
            ->inRandomOrder()
            ->limit($course->total_questions)
            ->get(['id', 'course_id', 'title', 'type', 'required_time', 'total_marks', 'options_count', 'option_a', 'option_b', 'option_c', 'option_d', 'option_e']);

        $total_marks = 0;
        $total_time = 0;
        foreach ($questions as $question) {
            $total_marks+=$question->total_marks;
            $total_time+=$question->required_time;
        }

        $passing_marks = intval(($total_marks) * ($course->passing_marks_percentage / 100));
        $course->passing_marks = $passing_marks;
        $course->total_marks = $total_marks;
        $course->total_time = $total_time;

        QuizCertificationEnrollment::where('id', Arr::get($enrollment, 'enrollment_id'))
            ->update([
                'exam_prepared_at' => Carbon::now(),
                'total_exam_time' => $total_time
            ]);

        $response['status'] = true;
        $response['message'] = 'Quiz Questions';
        $response['data'] = [
            'questions'    =>  $questions,
            'course' =>   $course,
            'student_user_id'  => $student_user_id
        ];

        return response()->json($response);
    }

    public function startExam(int $course_id)
    {
//        $student_user_id = auth()->user()->id;
        $student_user_id = 1;
        $enrollment = $this->studentCourseEnrollment->get($course_id, $student_user_id);
        // get request token and match from quiz_certification_enrollment table

        if(!$enrollment || Arr::get($enrollment, 'enrollment_status') !== QuizCertificationEnrollment::ENROLLMENT_STATUS_ENROLLED) {
            $response['message'] = 'Exam not valid.';
            $response['status'] = false;
            return response()->json($response);
        }

        QuizCertificationEnrollment::where(
            [
                'id' => Arr::get($enrollment, 'id')
           ]
        )->update(
            [
                'attempted_at' => Carbon::now()
            ]
        );
        return response()->json([
            'message' => 'status updated successfully.',
            'status' => true
        ], 200);
    }

    public function paymentProof(Request $request,$quizEnrollmentId){

        $paymentProof = $this->enrollForCourseService->paymentProof($request,$quizEnrollmentId);
        return response()->json(
            [
                'data' => $paymentProof,
            ], 200);
    }

    public function dashboard(){

        $user = auth()->user();
        $_totalCourses = Course::with('questions')->get();
        $courses = [];
        if($_totalCourses){
            foreach ($_totalCourses as $course) {
                $totalMarks = [];
                foreach ($course->questions as $question) {
                    $totalMarks[]=$question->total_marks;
                }
                $courses[$course->id] = [
                    'total_questions' => array_sum($totalMarks),
                ];
            }
        }
        $enrollCourses = QuizCertificationEnrollment::where('student_user_id' ,$user->id)->distinct('course_id')->count();
        $compiledResults = QuizResult::where('student_user_id' , $user->id)->count();
        $report = QuizResult::with('course')->where('student_user_id' , $user->id)->get();

        return response()->json([
            'total_courses' => count($courses),
            'enroll_courses' => $enrollCourses,
            'detail_courses' => $courses,
            'compiled_results' => $compiledResults,
            'report' => $report,
        ]);
    }
}


