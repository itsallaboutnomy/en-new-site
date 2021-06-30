<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\Api\Quiz\AuthController;
use App\Http\Controllers\QuizCertification\UserController;
use App\Http\Controllers\QuizCertification\QuizController;
use App\Http\Controllers\QuizCertification\DataController;
use App\Http\Controllers\QuizCertification\CourseController;
use App\Http\Controllers\QuizCertification\StudentController;
use App\Http\Controllers\QuizCertification\QuestionController;
use App\Http\Controllers\QuizCertification\ExaminerController;
use App\Http\Controllers\QuizCertification\QuestionAttemptsController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('password/email', 'api\ForgotPasswordController@sendResetLinkEmail');

Route::post('password/reset', [
    'as' => 'password.update',
    'uses' => 'api\ResetPasswordController@reset'
]);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::post('user','api\LoginController@user');

    Route::post('create-examiner',[UserController::class,'createExaminer']);
    Route::get('examiners',[UserController::class, 'showExaminers']);
    Route::post('update-examiner',[UserController::class, 'updateExaminer']);
    Route::post('delete-examiner',[UserController::class, 'deleteExaminer']);

    Route::post('create-course',[CourseController::class, 'createCourse']);
    Route::get('courses',[CourseController::class, 'showCourses']);
    Route::get('trainings',[CourseController::class, 'getTrainings']);

    Route::post('update-course',[CourseController::class, 'updateCourse']);
    Route::post('delete-course',[CourseController::class, 'deleteCourse']);

    Route::post('assign-course',[UserController::class, 'assignCourse']);
    Route::get('enrollments' , [UserController::class, 'getEnrollments']);
    Route::get('examiners-list' , [DataController::class, 'index']);
    Route::get('quizzes' , [QuizController::class, 'getQuizzesList']);
    Route::get('quiz-detail/{quiz_id}' , [QuizController::class, 'getQuizDetail']);
    Route::get('show-examiner-courses',[ExaminerController::class, 'index']);

    Route::post('examiner/create-quiz', [QuizController::class, 'store']);
    Route::get('examiner/quizzes/{course_id}', [QuizController::class, 'index']);
    Route::post('examiner/update-quiz/{id}', [QuizController::class, 'update']);
    Route::post('examiner/delete-quiz/{id}', [QuizController::class, 'destroy']);
    Route::post('examiner/update-quiz-status/{id}', [QuizController::class, 'updateQuizStatus']);
    Route::post('examiner/create-question', [QuestionController::class,'createQuestion']);
    Route::post('examiner/show-questions', [QuestionController::class, 'showQuestion']);
    Route::post('examiner/update-question/{id}', [QuestionController::class, 'updateQuestion']);
    Route::post('examiner/delete-question/{id}', [QuestionController::class, 'deleteQuestion']);
    Route::get('examiner/attempted-quiz-students/{id}', [ExaminerController::class, 'getAttemptedQuizStudents']);
    Route::post('examiner/student-attempted-questions', [ExaminerController::class, 'getStudentAttemptedQuestion']);
    Route::post('examiner/mark-attempted-question/{id}', [ExaminerController::class, 'markAttemptedQuestion']);
    Route::post('examiner/student-quiz-result', [ExaminerController::class, 'StudentQuizResult']);
    Route::get('examiner/checked-quiz-students-list/{id}', [ExaminerController::class, 'getAllCheckedQuizStudentsList']);
    Route::post('examiner/student-checked-quiz-detail', [ExaminerController::class, 'studentCheckedQuizDetail']);

    Route::get('dashboard', [StudentController::class,'dashboard']);
    Route::post('courses/{id}/enroll', [StudentController::class,'enroll']);
    Route::get('enroll/courses', [StudentController::class,'enrollCourses']);
    Route::post('course/{id}/payment-proof', [StudentController::class,'paymentProof']);
    Route::post('course/{id}/prepare-exam',[StudentController::class,'prepareExam']);
    Route::post('course/{id}/start-exam',[StudentController::class,'startExam']);
    Route::post('course/{id}/submit-exam',[QuestionAttemptsController::class,'submitExam']);

    Route::get('students/{student_user_id}/courses', [StudentController::class,'courses']);
    Route::get('students/{student_user_id}/exam-results', [StudentController::class,'takeAnExam']);
    Route::get('students/{student_user_id}/certifications', [StudentController::class,'takeAnExam']);

    Route::get('course/{id}/exams', [ExaminerController::class,'getAttemptedQuizStudents']);
    Route::post('course/{id}/publish', [CourseController::class,'publishCourse']);
});
