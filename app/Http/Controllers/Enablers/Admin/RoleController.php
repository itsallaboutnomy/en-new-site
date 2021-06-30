<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Http\Requests\Enablers\Admin\RoleRequest;
use App\Models\Enablers\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RoleController extends Controller
{
    protected $role, $viewPrefix, $route;

    public function __construct(Role $role)
    {
        $this->role = $role;

        $this->viewPrefix = 'enablers.admin.roles.';
        $this->route = 'roles.';
    }

    public function index()
    {
        $roles = $this->role->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('roles'));
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(RoleRequest $request)
    {
        $this->role->create($request->all());

        return redirect()->route($this->route.'index')->with('success','New role added successfully');
    }

    public function show($id)
    {
        $role = $this->role->find($id);

        if(!$role){
            return redirect()->back()->with('error','Role not found');
        }

        return view($this->viewPrefix.'show',compact('role'));
    }

    public function edit($id)
    {
        $role = $this->role->find($id);

        if(!$role){
            return redirect()->back()->with('error','role not found');
        }

        return view($this->viewPrefix.'edit',compact('role'));
    }

    public function update(RoleRequest $request, $id)
    {
        $role = $this->role->find($id);

        if(!$role){
            return redirect()->back()->with('error','Role not found');
        }

        $role->update($request->all());

        return redirect()->route($this->route.'index')->with('success','Role updated successfully');
    }

    public function destroy($id)
    {
        $role = $this->role->find($id);

        if(!$role){
            return redirect()->back()->with('error','Role not found');
        }

        $role->delete();
        return redirect()->route($this->route.'index')->with('success','Role deleted successfully');
    }
}
