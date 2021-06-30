<?php

namespace App\Http\Controllers\QuizCertification;

use Illuminate\Http\Request;
use App\Models\Quiz\Question;
use App\Models\Quiz\Option;
use App\Models\Quiz\Answer;

class QuestionController extends Controller
{
    // create question
    public function createQuestion(Request $request)
    {
        $response = [
            'status' => false,
            'message' => '',
            'data' => null
        ];

        $data = $this->validation($request);

        $question = Question::create($request->all());

        $response['status'] = true;
        $response['message'] = 'question created successfully';
        $response['data'] = $question;
        return response()->json($response);
    }

    // show all questions
    public function showQuestion()
    {
            $questions = Question::where('course_id' , request('course_id'))->get();

            return response(['questions' => $questions]);
    }

    // update question
    public function updateQuestion(Request $request,$id)
    {
        $response = [
            'status' => false,
            'message' => '',
            'data' => null
        ];

        $question = Question::find($id);

        if(!$question){
            $response['message']= 'question not found!';
            return response()->json($response);
        }

        $this->validation($request);

        if($question->type != $request->type){

            $response['message']= 'question type mismatch';

            return response()->json($response);
        }

        $question->update($request->all());

        $response['status'] = true;
        $response['message'] = 'Question updated successfully';
        $response['data'] = $question;

        return response()->json($response);



    }

    // delete question
    public function deleteQuestion($id)
    {
            $question = Question::findOrFail($id);

            $question->delete();

            return response(['Question Deleted Successfully']);
    }

    public function validation(Request $request)
    {
        $rules = [
            'course_id' => 'required',
            'title' => 'required',
            'type'  => 'required',
            'text_answer'  => 'required_if:type,text',
            'correct_option'  => 'required_if:type,mcq',
            'options_count'  =>   'required_if:type,mcq&integer&min:2&max:5',
            'required_time'  => 'required|numeric|min:20',
            'total_marks' => 'required',

            'option_a'  => 'required_if:type,mcq',
            'option_b'  => 'required_if:type,mcq',
        ];

        if($request->options_count){
            if($request->options_count == 3 ) {
                $rules['option_c'] = 'required_if:type,mcq';
            }
            else if($request->options_count == 4 ) {
                $rules['option_c'] = 'required_if:type,mcq';
                $rules['option_d'] = 'required_if:type,mcq';
            }
            else if($request->options_count == 5 ) {
                $rules['option_c'] = 'required_if:type,mcq';
                $rules['option_d'] = 'required_if:type,mcq';
                $rules['option_e'] = 'required_if:type,mcq';
            }
        }

        return $this->validate($request , $rules);

    }
}
