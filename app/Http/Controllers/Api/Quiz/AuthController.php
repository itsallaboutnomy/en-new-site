<?php

namespace App\Http\Controllers\Api\Quiz;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'father_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'cnic' => 'required|unique:users,cnic',
            'password' => 'required|string|min:6',
            'phone'  => 'required',
            'city'  => 'required',
            'country'  => 'required',
        ]);

        if($validator->fails()){
            return $this->errorResponse("Couldn't create a new user",403,['errors' => $validator->messages()]);
        }

        $data = $request->all();
        $data['type'] = 'quiz-student';
        $data['password_str'] = $request->password;
        $data['password'] = Hash::make($request->password);

        $user = $this->user->create($data);

        $user->assignRole(['Student']);

        return $this->successResponse($data, 'User registered successfully');
    }

    public function login(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);

        if(!Auth::attempt($attributes)){
            return $this->errorResponse('Credentials not match', 401);
        }

        $data = [
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ];

        return $this->successResponse($data,'User logged in successfully');
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return $this->successResponse(null,'User logged out successfully');
    }
}
