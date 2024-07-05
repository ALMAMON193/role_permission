<?php

namespace App\Http\Controllers\Web\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index(){
        $data['roles'] = Role::all();
        return view('backend.layout.role-permissions.role.index',$data);
    }
    public function create(){
        return view('backend.layout.role-permissions.role.create');

    }

    public function store(Request $request){
      $request->validate([
          'name' => [
              'required',
              'string',
              'max:255',
              'unique:roles,name'
          ],

        ]);
        Role::create([
            'name' => $request->name
        ]);

        return redirect()->route('role.index')->with('status','role created successfully');

    }
    public function edit($id){
        $data['roles'] = Role::findOrFail($id);
        return view('backend.layout.role-permissions.role.edit',$data);
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:roles,name,'.$id
            ],

          ]);
          $roles = Role::findOrFail($id);
          $roles->update([
            'name' => $request->name
        ]);

        return redirect()->route('role.index')->with('status','Role updated successfully');

    }
    public function destroy($id){

        $roles = Role::findOrFail($id);
        $roles->delete();
        return redirect()->back()->with('status','Role deleted successfully');

    }

    //give permission to role
    public function addPermissionToRole($roleId){
        $role = Role::findOrFail($roleId);
        $permissions = Permission::all();
        $rolePermission = DB::table('role_has_permissions')->where('role_id',$roleId)->pluck('permission_id')->all();
        return view('backend.layout.role-permissions.role.add_permission', compact('role', 'permissions' ,'rolePermission'));
    }
    public function givePermissionToRole(Request $request, $roleId){

        $request->validate([
            'permission' => 'required|array',
        ]);
        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('status','Permission added successfully');
    }


}
