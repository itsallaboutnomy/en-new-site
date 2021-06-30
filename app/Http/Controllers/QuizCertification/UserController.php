<?php

namespace App\Http\Controllers\QuizCertification;

use App\Models\Quiz\Enrollment;
use App\Models\Quiz\Question;
use App\Models\Quiz\QuestionAttempt;
use App\Models\Quiz;
use App\Models\Quiz\QuizCertificationEnrollment;
use App\Models\Quiz\Student;
use App\Models\Quiz\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginMail;
use App\Models\Quiz\Course;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //create new examiners
    public function createExaminer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:60',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|max:15',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        if(!$user){
            return response()->json('failed! cant create examiner');
        }

        $password = $this->genratePassword();
        $user->password = Hash::make($password);
        $user->password_str = $password;
//        $user->role = 'Examiner';

        $user->save();

        $mail_data = ([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password_str,
//            'role' => $user->role
        ]);

//        Mail::to($user->email)->send(new LoginMail($mail_data));

        $data = $user->only(['id','name','email','phone','role','created_at']);
        $data['created_at'] = date('d M, Y  g:i a',strtotime($data['created_at']));

        return response()->json($data);
    }

    //show all examiners
    public function showExaminers()
    {
        $examiners = User::with('roles')
        ->whereHas('roles', function ($query) {
            $query->where('name', '=', 'examiner');
        });

        return datatables()->of($examiners)
            ->removeColumn('password_s_t_r')
            ->removeColumn('password')
            ->make(true);
    }

    //assign course to exminer
    public function assignCourse(Request $request){

            $course = Course::with('examiners')->findorFail(request('course_id'));
            if(!empty($course->examiners->toArray())){
                return;
            }
            $course->examiners()->syncWithoutDetaching([
                request('user_id')
            ]);
            $examiner = User::where('id', request('user_id'))->first();
            $examiner_role = DB::table('roles')->where('name', 'examiner')->first();
            $examiner->roles()->attach([
                $examiner_role->id
            ]);

            return response('course assigned successfully');

    }

    public function updateExaminer(Request $request){

        $user = User::findOrFail(request('id'));
        $data= $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',

        ]);

        // $user->name = $data['name'];
        // $user->phone = $data['phone'];
        $user->update($data);
        return response('Examiner data updated successfully');

    }

    public function deleteExaminer(){
        $user = User::findOrFail(request('id'));
        $user->delete();
        return response('Examiner deleted successfully');

    }

    private function genratePassword()
    {
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        return substr($random, 0, 10);
    }

    public function getCourses(){

        $courses = Course::get();

        return response(['courses' => $courses]);
    }

    public function getEnrollments()
    {
        $quizCetificationEnrollment = QuizCertificationEnrollment::get();


        $students = array();
        foreach ($quizCetificationEnrollment as $key => $value){
        $enrollment = Enrollment::with('student')->where('id', $value['enrollment_id'])->first()->toArray();
            $enroll = $enrollment['student'];
            $enroll['unique_code'] = $enrollment['unique_code'];
            $enroll['created_at'] = $enrollment['created_at'];
            $students[] = $enroll;
        }

        return datatables()->of($students)->make(true);
    }


}
