<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Http\Requests\Enablers\Admin\UserRequest;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    protected $user, $imagesDirectoryPath, $viewPrefix, $route;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->imagesDirectoryPath = $user::$imagesDirectoryPath;

        $this->viewPrefix = 'enablers.admin.users.';
        $this->route = 'users.';
    }

    public function index(Request $request)
    {
        $users = $this->user->notHavingRoles(['Examiner','Student'])->adminGenerated()->orderBy('id','DESC')->paginate(15);

        return view($this->viewPrefix.'index',compact('users'))->with('i', ($request->input('page', 1) - 1) * 15);
    }

    public function students(Request $request)
    {
        $users = $this->user->orderBy('id','DESC')->paginate(15);

        return view($this->viewPrefix.'index',compact('users'))->with('i', ($request->input('page', 1) - 1) * 15);
    }

    public function create()
    {
        $roles = Role::all();

        return view($this->viewPrefix.'create',compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $imagePath = $request->file('profile_image')->store($this->imagesDirectoryPath);

        $data = $request->all();
        $data['type'] = User::$userType['adminGenerated'];
        $data['profile_image_path'] = $imagePath;

        $user = $this->user->create($data);

        $user->is_enabled =  true;
        $user->created_by =  auth()->user()->id;
        $user->password = \Hash::make($data['password']);
        $user->save();

        $roles[] = $request->input('role');
        $user->assignRole($roles);

        return redirect()->route($this->route.'index')->with('success','User created successfully');
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        if(!$user){
           abort(404);
        }

        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->first()->name;

        return view($this->viewPrefix.'edit',compact('user','roles','userRole'));
    }

    public function update(UserRequest $request, $id)
    {
        $data = $request->all();

        if(!empty($data['password'])){
            $data['password'] = \Hash::make($data['password']);
        }else{
            $data = Arr::except($data,array('password'));
        }

        $user = $this->user->find($id);
        if(!$user){
            abort(404);
        }

        if($request->hasFile('profile_image'))
        {
            $data['profile_image_path'] = $request->file('profile_image')->store($this->imagesDirectoryPath);
            \File::delete($user->profile_Image_path);
        }

        $user->update($data);

        \DB::table('model_has_roles')->where('model_id',$id)->delete();

        $roles[] = $request->input('role');
        $user->assignRole($roles);

        return redirect()->route($this->route.'index')->with('success','User update successfully');
    }

    public function updateStatus($id)
    {
        $user = $this->user->find($id);

        $user->is_enabled = !(bool)$user->is_enabled;
        $user->save();

        return redirect()->route($this->route.'index')->with('success','User status updated successfully');
    }

    public function destroy($id)
    {
        $user = $this->user->find($id);

        if(!$user){
            return redirect()->back()->with('error','User not found');
        }

        \File::delete($user->profile_Image_path);
        $user->delete();

        return redirect()->route($this->route.'index')->with('success','User deleted successfully');
    }
}
