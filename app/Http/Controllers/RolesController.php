<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Roles;
use App\Models\Student;
use Illuminate\Http\Request;

class RolesController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        $roles = Roles::orderBy('id', 'asc')->paginate(10);
        return view('roles.index', ['roles' => $roles,'permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create',['permissions' => $permissions]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'permissions' => 'required',
        ]);
        $role = Roles::create($data);
        $role->permissions()->attach($request->permissions);

        return redirect(route('role'))->with('create', 'Created');
    }

    public function update(Request $request, Roles $role)
    {
        $role->name = $request->name;
        $role->permissions()->sync($request->permissions);
        $role->save();
        return redirect()->route('role')->with('update', 'Updated');
    }

    public function destroy(Request $request, Roles $roles)
    {
        $id = $request->id;
        $destroy = Roles::findOrFail($id);
        $destroy->delete();
        return redirect(route('role'))->with('delete', 'deleted');
    }
    public function active(Request $request, Roles $roles)
    {
        $roles
            ->where('id', $request->id)
            ->update(['is_active' => $request->active]);
        return redirect('/roles')->with('update', 'Updated');
    }
}
