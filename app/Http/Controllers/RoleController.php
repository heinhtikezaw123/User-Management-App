<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Feature;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\RolePermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    //direct role list page
    public function roleList() {
        $roleList = Role::orderBy('id','asc')->get();
        $permissionIDs = RolePermission::where('role_id', Auth::user()->role->id)->pluck('permission_id')->toArray();
        return view('admin.userManagement.role',compact('roleList','permissionIDs'));
    }

    //direct add role page
    public function addRolePage() {
        $feature = Feature::with('permissions')->get();
        return view('admin.userManagement.roleCrud.addRole',compact('feature'));
    }

    // add new role with permission
    public function addRole(Request $request) {
        $this->createRoleValidation($request);
        $data = $this->getRoleName($request);
        $role = Role::create($data);

        //get the IDs of the selected permissions
        $permissionIds = $request->permissions;

        //attach the permissions to the new role
        $role->permissions()->attach($permissionIds);

        return redirect()->route('admin#roleList')->with(['SuccessRole' => 'New role created successfully!']);
    }

    //direct edit role page
    public function editRolePage($id) {
        $feature = Feature::with('permissions')->get();
        $role = Role::where('id', $id)->with('permissions')->first();
        $selected_permissions = $role->permissions->pluck('id')->toArray();
        // dd($selected_permissions);
        return view('admin.userManagement.roleCrud.edit', compact('feature', 'role', 'selected_permissions'));
    }

    //update role
    public function editRole(Request $request) {
        $role = Role::where('id', $request->id)->firstOrFail();
        $role->name = $request->roleName;
        $role->save();

        $permissionIds = $request->permissions;
        $role->permissions()->sync($permissionIds);
        return redirect()->route('admin#roleList')->with(['updateRole' => 'Successfully Updated!']);
    }

    //update role validation check
    private function updateRoleValidation($request) {
        Validator::make($request->all(),[
            'roleName' => 'required|unique:roles,name,'.$request->id,
            'permissions' => 'required|array|min:1',
            'permissions.*' => 'integer|exists:permissions,id'
        ])->validate();
    }

    //delete role
    public function deleteRole($id) {
        Role::where('id',$id)->delete();
        RolePermission::where('role_id',$id)->delete();
        return redirect()->route('admin#roleList')->with(['roleDeleted' => 'Successfully Deleted']);
    }


    //create role validation check
    private function createRoleValidation($request) {
        Validator::make($request->all(),[
            'roleName' => 'required|unique:roles,name,',
            'permissions' => 'required|array|min:1',
            'permissions.*' => 'integer|exists:permissions,id'
        ])->validate();
    }

    //get role name
    private function getRoleName($request) {
        return [
            'name' => $request->roleName,
        ];
    }

}
