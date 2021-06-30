<?php

namespace App\Http\Controllers\QuizCertification;

use App\Models\Quiz\Quiz;
use App\Models\Quiz\QuestionAttempt;

use App\Services\QuizAttemptService;
use App\Services\QuizUpdateValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\QuizResult;

class QuizController extends Controller
{
    /**
     * @var QuizUpdateValidator
     */
    private $quizUpdateValidator;

    public function __construct(QuizUpdateValidator $quizUpdateValidator)
    {
        $this->quizUpdateValidator = $quizUpdateValidator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $response = [
          'status' => false,
          'message'  => '',
           'data' => null
        ];

        $quiz = Quiz::where('examiner_user_id' ,auth()->user()->id)
            ->where('course_id' ,$id)
            ->get();

        if(!$quiz){
            return  response()->json('quiz not found');
        }

        $response['status'] = true;
        $response['message'] ='List of course quizzes';
        $response['data'] = $quiz;

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = [
            'status' => false,
            'message' => '',
            'data' => null
        ];
        $validator = Validator::make($request->all(),[
            'examiner_id' => 'required',
            'course_id' => 'required',
            'title' => 'required',
            'total_marks' => 'required',
            'passing_marks' => 'required',
            'total_time' => 'required',
            'total_questions' => 'required',


        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $quiz = Quiz::create([
            'examiner_user_id' => $request->examiner_id,
            'course_id' => $request->course_id,

            'title' => $request->title,

            'total_marks' => $request->total_marks,
            'passing_marks' => $request->passing_marks,
            'total_time' => $request->total_time,
            'total_questions' => $request->total_questions,
            'summary' => $request->summary,
        ]);

        if(!$quiz){
            $response['message'] ='failed! cant create quiz';
            return response()->json($response);
        }

        $response['status'] = true;
        $response['message'] = 'Quiz created successfully';
        $response['data'] = $quiz;

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response = [
            'status' => false,
            'message' => '',
            'data' => null
        ];
        $validator = Validator::make($request->all(),[
            'examiner_id' => 'required',
            'course_id' => 'required',
            'title' => 'required',
            'total_marks' => 'required',
            'passing_marks' => 'required',
            'total_time' => 'required',
            'total_questions' => 'required',
            'is_active' => 'required',


        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $quiz = Quiz::find($id);

        if(!$quiz){
            $response['message'] ='Quiz not found';
            return response()->json($response);
        }
        $modifiedFields = $this->quizUpdateValidator->getCriticalFieldsModified($request, $quiz);
        if(!empty($modifiedFields))
        {
            $response['message'] ='Cannot update following fields in a quiz that is already attempted: ' . implode(',', $modifiedFields);
            return response()->json($response);
        }

        $quiz->update([
            'examiner_user_id' => $request->examiner_id,
            'course_id' => $request->course_id,

            'title' => $request->title,

            'total_marks' => $request->total_marks,
            'passing_marks' => $request->passing_marks,
            'total_time' => $request->total_time,
            'total_questions' => $request->total_questions,
            'summary' => $request->summary,
        ]);

        $quiz->is_active = $request->is_active;
        $quiz->save();


        $response['status'] = true;
        $response['message'] = 'Quiz updated successfully';
        $response['data'] = $quiz;

        return response()->json($response);

    }

    public function updateQuizStatus($id)
    {
        $response = [
            'status' => false,
            'message' => '',
            'data' => null
        ];

        $quiz = Quiz::find($id);

        if(!$quiz){
            $response['message'] ='quiz not found';
            return response()->json($response);
        }
        DB::table('quizzes')
            ->where([
                'course_id' => $quiz->course_id
            ])
            ->update([
                'is_active' => 0
            ]);
        $response['message'] = 'Status '.($quiz->is_active ? "Disabled" : "Enabled").' updated successfully';
        $quiz->is_active = !(bool)$quiz->is_active;
        $quiz->save();

        $response['status'] = true;

        return response()->json($response);
    }

    public function getQuizzesList()
    {
        $quizzes = Quiz::with('course','examiner')->get();

        $response = [
            'status' => true,
            'message' => 'quizzes list',
            'data' => $quizzes
        ];

        return datatables()->of($quizzes)
            ->addColumn('course_name', function(Quiz $quiz) {
                return  $quiz->course->name;
            })
            ->addColumn('examiner_name', function(Quiz $quiz) {
                return  $quiz->examiner->name;
            })->removeColumn('course')
            ->removeColumn('examiner')
            ->make(true);
    }


    public function getQuizDetail(Request $request , $id)
    {
        $response = [
            'status' => false,
            'message' => '',
            'data' => null
        ];

        $totalStudent  = QuizResult::where('quiz_id', $id)->get()->count();
        $pass  = QuizResult::where('quiz_id', $id)->where('is_passed' , true)->get()->count();
        $fail  = QuizResult::where('quiz_id', $id)->where('is_passed' , false)->get()->count();



        $response['status'] = true;
        $response['data']  = [
            'total_student' => $totalStudent,
            'pass_count' => $pass,
            'fail_count' => $fail,
        ];

        return response()->json($response);
    }
}
