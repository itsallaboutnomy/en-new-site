<?php

namespace App\Http\Controllers\QuizCertification;

use App\Models\Quiz\Course;
use App\Models\Quiz\Enrollment;
use App\Models\Quiz\Question;
use App\Models\Quiz\QuizCertificationEnrollment;
use App\Models\Quiz\Student;
use App\Models\Quiz\QuestionAttempt;
use App\Models\Quiz\Quiz;
use App\Models\Quiz\QuizResult;
use App\Models\Quiz\SolvedQuiz;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\CertificateMail;
use PDF;
use function GuzzleHttp\Promise\all;

class ExaminerController extends Controller
{
    // examiner course detail
    public function index()
    {

        $user = User::find(auth()->user()->id);

//            $examinerCourses = $user->course()->get();

        $examinerCourses = Course::join('user_course', 'user_course.course_id', '=', 'courses.id')
            ->where( 'user_course.user_id', '=', $user->id)
            ->select('courses.*')
            ->get();


        $courses = array();
        foreach ($examinerCourses as $key => $value) {

            $course = [];

            $course['name'] = $value['name'];
            $course['id'] = $value['id'];
            $course['total_questions'] = $value['total_questions'];
            $course['status'] = $value['status'];
            $course['created_at'] = empty($value['created_at']) ? '' :  $value['created_at']->toDateTimeString();
            $courses[$key] = $course;
        }
        // dd($courses);

        return response(['courses' => $courses]);
    }

    public function getAttemptedQuizStudents(Request $request , $id)
    {
        $enrollmentQuizQuestionAttempts = QuestionAttempt::select('student_user_id','attempt_id')
            ->distinct()
            ->where('is_examiner_checked', false)
            ->where('course_id', $id)
            ->get();
//        dd($enrollmentQuizQuestionAttempts->pluck('student_user_id'));
        $responseEnrollment = array();
        foreach ($enrollmentQuizQuestionAttempts as $question_attempt)
        {
            $enrollment = DB::table('quiz_certification_enrollments as qce')
                ->leftJoin('users','qce.student_user_id' ,'=', 'users.id')
                ->leftJoin('courses','qce.course_id' ,'=', 'courses.id')
                ->select('qce.id as quiz_enrollment_id','qce.unique_code','qce.attempted_at','courses.id as course_id ','qce.student_user_id as student_id','users.name','users.email','courses.name as course_name')
                ->where('qce.student_user_id', $question_attempt['student_user_id'])
                ->first();
            $enrollment->attempt_id = $question_attempt['attempt_id'];
//            $enrollment = QuizCertificationEnrollment::with('user')->where('student_user_id', $question_attempt['student_user_id'])->first();

            $responseEnrollment[] = $enrollment;
        }
        return datatables()->of($responseEnrollment)
            ->removeColumn('password_str')
            ->make(true);
    }

    public function getStudentAttemptedQuestion(Request $request)
    {
        $response = [
            'status' => false,
            'message' => '',
            'data' => null
        ];
        $attemptQuestion= QuestionAttempt::with('question')
            ->where('attempt_id', $request->attempt_id)
            ->get();
        if(!$attemptQuestion){

            $response['message'] = 'No attempt quiz found ';
        }

        $response['status'] =  true;
        $response['message'] = 'all attempted question ';
        $response['data'] = $attemptQuestion ;
        return response()->json($response);

    }

    public function markAttemptedQuestion(Request $request,$id)
    {
        $response = [
            'status' => false,
            'message' => '',
            'data' => null
        ];
        $attemptQuestion = QuestionAttempt::where('id', $id)->first();
        if(!$attemptQuestion){
            $response['message'] = 'attempted question not found';
        }

        $attemptQuestion->obtained_marks = $request->obtained_marks;
        $attemptQuestion->save();

        $response['status'] = true;
        $response['message'] = 'Obtained marks added successfully';

        return response()->json($response);
    }

    public function StudentQuizResult(Request $request)
    {
        $data = $this->validate($request, [
            'student_id' => 'required',
            'attempt_id' => 'required',
            'course_id'  => 'required',
            'quiz_enrollment_id'  => 'required'
        ]);

        $obtainMarks = QuestionAttempt::where('student_user_id', $request->student_id)
        ->where('attempt_id', $request->attempt_id)->get()->sum('obtained_marks');

        $course = Course::find($request->course_id);
        $passingMarksPercentage = $course->passing_marks_percentage;
        $totalMarks= Question::where('course_id',$request->course_id)->get()->sum('total_marks');

        $passingMarks= ($totalMarks/100)*$passingMarksPercentage;
        if($obtainMarks  >= $passingMarks){
            $quiz_status = 'PASS';
        }
        else{
            $quiz_status = 'FAIL';
        }

        $updateICheckedStatus = QuestionAttempt::where('student_user_id', $request->student_id)
            ->where('attempt_id',  $request->attempt_id)
            ->update([
                'is_examiner_checked' => true,
            ]);

        $result = QuizResult::create([
            'quiz_enrollment_id' => $request->quiz_enrollment_id,
            'course_id' => $request->course_id,
            'attempt_id' => $request->attempt_id,
            'student_user_id' => $request->student_id,
            'obtained_marks' => $obtainMarks,
            'is_passed' => $quiz_status == 'PASS'? true: false,
        ]);

        $studentData = QuizCertificationEnrollment::with('course','user')
            ->where('id' ,$request->quiz_enrollment_id)
            ->first();
        if(!$studentData){

            return response('Enrollment does not exist');
        }
        $this->sendMail($studentData ,$quiz_status);
        return response(['Certificate Mail send successfully']);

    }

    public function getAllCheckedQuizStudentsList(Request $request ,$id)
    {

        $enrollmentQuizAttempts = QuestionAttempt::select('student_user_id','attempt_id')
            ->distinct()
            ->where('is_examiner_checked', true)
            ->get();

//        dd($enrollmentQuizAttempts->toArray());
        $course = Course::find($id);
        $passingMarksPercentage = $course->passing_marks_percentage;
        $totalMarks= Question::where('course_id',$id)->get()->sum('total_marks');

        $passingMarks= ($totalMarks/100)*$passingMarksPercentage;

        $enrollments = DB::table('quiz_results as qr')
            ->join('quiz_certification_enrollments as qce' ,'qr.quiz_enrollment_id' ,'=', 'qce.id')
            ->join('users','qce.student_user_id' ,'=', 'users.id')
            ->leftJoin('courses','qce.course_id' ,'=', 'courses.id')
            ->select('qce.unique_code','qce.attempted_at',
                'qce.student_user_id as student_id','users.name','users.email',
                'qr.obtained_marks','qr.is_passed','qr.attempt_id','courses.name as course_name'
            )
            ->where('qr.course_id',$id)
            ->get();
        foreach ($enrollments as &$enrollment){

            $enrollment->total_marks = $totalMarks;
            $enrollment->passing_marks = $passingMarks;
        }
        return datatables()->of($enrollments)
            ->make(true);

    }

    public function  studentCheckedQuizDetail(Request $request){

        $response = [
            'status' => false,
            'message' => '',
            'data' => null
        ];

        $attemptQuestion= QuestionAttempt::with('question')->where('student_user_id', $request->student_id)
            ->where('attempt_id', $request->attempt_id)
            ->get();

        if(!$attemptQuestion){

            $response['message'] = 'attempted question not found';
        }

        $response['status'] =  true;
        $response['message'] = 'all checked  question ';
        $response['data'] = $attemptQuestion ;
        return response()->json($response);

    }

    private function sendMail($studentData,$status)
    {
        $certificateData = array();

        $result['status'] = $status;
        $result['name'] = $studentData->user->name;
        $result['email'] = $studentData->user->email;
        $result['course'] =  $studentData->course->name;
        $result['created_at'] = Carbon::now()->toDateTimeString();

        $certificateData[] = $result;
        Mail::to($studentData->user->email)->send(new CertificateMail($certificateData));
    }

}
