<?php

namespace App\Http\Controllers\QuizCertification;

use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Quiz\Course;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    // craetre new course
    public function createCourse(Request $request){

        $data= $this->validate($request, [
            'name' => 'required',
            'key' => 'required|alpha|size:3',
            'price_dollar' => 'required|numeric',
            'total_questions' => 'required',
            'passing_marks_percentage' => 'required',
            'price_pkr' => 'required|numeric',
            'examiner_id' => 'required|numeric'
            ]);

        $examiner_user_id = $data['examiner_id'];

        unset($data['examiner_id']);

        $course = Course::create($data);

//        $this->user->assignExaminerRole($examiner_user_id);

//        $course->examiners()->sync([
//            $examiner_user_id
//        ]);
        return response()->json(['course' => $course], 200);
    }

    // show all courses
    public function showCourses(){
//        $allCourses= Course::with('examiners', 'training');
        $allCourses= Course::get();
        return datatables()->of($allCourses)
            ->addColumn('user_name', function($row) {
              if($row->examiners->isEmpty()) {
                  return '';
              }
              return array_reduce($row->examiners->toArray(), function ($accum, $value) {
                  return trim($accum . ', ' . $value['name'], ', ');
              });
            })
            ->addColumn('training_name', function ($row) {
                if(empty($row->training)) {
                    return '';
                }
                return $row->training->name;
            })
            ->make(true);
    }

    public function getTrainings() {
        $trainings = DB::table('trainings')->get();
        return response()->json([
            'message' => 'trainings',
            'data' => $trainings
        ]);
    }
   // update course
    public function updateCourse(Request $request){

        $course = Course::findOrFail(request('id'));
        $data= $this->validate($request, [
            'name' => 'required',
            'total_questions' => 'required',
            'passing_marks_percentage' => 'required',
            'price_dollar' => 'required|numeric',
            'price_pkr' => 'required|numeric',
            'examiner_id' => 'required|numeric'
            ]);
        $examiner_user_id = $data['examiner_id'];

        unset($data['examiner_id']);

        $course->update($data);

        $this->user->assignExaminerRole($examiner_user_id);

        $course->examiners()->sync([
            $examiner_user_id
        ]);


            return response('Course updated successfully');

    }
   // delete course
    public function deleteCourse(){

        $course = Course::findOrFail(request('id'));
        $course->delete();
        return response('Course deleted successfully');

    }

    public function publishCourse($id){
        $request = request();
        $course = Course::findOrFail($id);
        $status = ucfirst(request('status'));
        $data= $this->validate($request, [
            'status' => 'required',
            Rule::in(['Pending','Published','Unpublished']),

        ]);

        if(!$course)
            abort(404);
        $course->status = $status;
        $course->save();
        return response('Course '.$status.' successfully');

    }
}
