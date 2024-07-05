<?php

namespace App\Http\Controllers\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function index(){
        $data['permissions'] = Permission::all();
        return view('backend.layout.role-permissions.permission.index',$data);
    }
    public function create(){
        return view('backend.layout.role-permissions.permission.create');

    }

    public function store(Request $request){
      $request->validate([
          'name' => [
              'required',
              'string',
              'max:255',
              'unique:permissions,name'
          ],

        ]);
        Permission::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('
        status','Permission created successfully');

    }
    public function edit($id){
        $data['permissions'] = Permission::findOrFail($id);
        return view('backend.layout.role-permissions.permission.edit',$data);
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:permissions,name,'.$id
            ],

          ]);
          $permissions = Permission::findOrFail($id);
          $permissions->update([
            'name' => $request->name
        ]);

        return redirect()->route('permission.index')->with('status','Permission updated successfully');

    }
    public function destroy($id){

        $permissions = Permission::findOrFail($id);
        $permissions->delete();
        return redirect()->back()->with('status','Permission deleted successfully');

    }
}
