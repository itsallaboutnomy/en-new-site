<?php

namespace App\Http\Controllers\QuizCertification;

use App\Models\Quiz\Course;
use App\Models\Quiz;
use App\Models\Quiz\QuizCertificationEnrollment;
use App\Models\Quiz\QuizResult;
use Illuminate\Http\Request;
use  Codedge\Fpdf\Fpdf\Fpdf;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $user = auth()->user();
//        $totalCourses = Course::count();
//        $enrollCourses = QuizCertificationEnrollment::where('student_user_id' ,$user->id)->distinct('course_id')->count();
//        $compiledResults = QuizResult::where('student_user_id' , $user->id)->count();
//        $report = QuizResult::with('course')->where('student_user_id' , $user->id)->get();
//
//
//        return response()->json([
//            'total_courses' => $totalCourses,
//            'enroll_courses' => $enrollCourses,
//            'compiled_results' => $compiledResults,
//            'compiled_results' => $compiledResults,
//            'report' => $report,
//        ]);
    }

}
