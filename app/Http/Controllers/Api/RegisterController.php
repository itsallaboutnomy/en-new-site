<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;

class RegisterController extends Controller
{
    protected $user;

    public function __construct(User $user){

        $this->user = $user;
    }
    public function register(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'father_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'cnic' => 'required|unique:users,cnic',
            'phone'  => 'required',
            'city'  => 'required',
            'country'  => 'required',
         ]);

        if($validator->fails()){
            return response()->json([
                'data' => null,
                'message' => 'Could not create a new user',
                'errors' =>$validator->messages(),
                'status' => false
            ]);
        }

        $data = $request->all();
        $data['type'] = 'quiz-student';
        $data['password_str'] = $request->password;
        $data['password'] = Hash::make($request->password);
        $user = $this->user->create($data);
        $user->assignRole(['Student']);
        unset($user->password_str);

        return response()->json([
            'data'=> null,
            'message' => 'user registered successfully',
            'status' => true
        ]);
    }
}
