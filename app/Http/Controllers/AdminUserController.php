<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RolePermission;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    //direct user list
    public function userList() {
        $userList = User::with('role')->get();
        $permissionIDs = RolePermission::where('role_id', Auth::user()->role->id)->pluck('permission_id')->toArray();
        return view('admin.userManagement.userList',compact('userList','permissionIDs'));
    }

    //direct add user page
    public function addUserPage() {
        $roles = Role::get();
        return view('admin.userManagement.userCrud.addUser',compact('roles'));
    }

    //create new user
    public function addUser(Request $request) {
        // dd($request->toArray());
        $this->userValidationCheck($request);
        $data = $this->requestUserData($request);
        $data['password'] = Hash::make($data['password']);
        // dd($data);
        User::create($data);
        return redirect()->route('admin#userList')->with(['userCreated' => 'New User Created Successfully!']);
    }

    //add user validation check
    private function userValidationCheck($request) {
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$request->id,
            'userName' => 'required',
            'phone' => 'required',
            'password' => 'required|min:6',
            'confirmPassword' => 'required|min:6|same:password',
            'gender' => 'required',
            'roleId' => 'required',
        ])->validate();
    }

    //view user page
    public function ViewUserPage($id) {
        $user = User::with('role')->where('id',$id)->first();
        return view('admin.userManagement.userCrud.view',compact('user'));
    }

    //direct edit user page
    public function eidtUserPage($id) {
        $userList = User::with('role')->where('id',$id)->first();
        $roles = Role::get();
        return view('admin.userManagement.userCrud.edit',compact('userList','roles'));
    }

    //edit user
    public function eidtUser(Request $request) {
        $this->editUserValidationCheck($request);
        $data = $this->getUserDataUpdate($request);
        User::where('id',$request->id)->update($data);
        return redirect()->route('admin#userList')->with(['userUpdated' => 'User Updated Successfully!']);
    }

    //user edit validation check
    private function editUserValidationCheck($request) {
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'userName' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'roleId' => 'required',
        ])->validate();
    }

    //get user data for update
    private function getUserDataUpdate($request) {
        return [
            'name' => $request->name,
            'user_name' => $request->userName,
            'phone' => $request->phone,
            'email' => $request->email,
            'gender' => $request->gender,
            'role_id' => $request->roleId
        ];
    }

    //delete user
    public function deleteUser($id) {
        User::where('id',$id)->delete();
        return redirect()->route('admin#userList')->with(['userDeleted' => 'User was deleted successfully!']);
    }



    //request user data
    private function requestUserData($request) {
        return [
            'name' => $request->name,
            'user_name' => $request->userName,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password,
            'gender' => $request->gender,
            'role_id' => $request->roleId
        ];
    }
}
