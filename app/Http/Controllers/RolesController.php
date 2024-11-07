<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        $roles = Roles::orderBy('id', 'asc')->paginate(10);
        return view('roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $data = [
          'name' => $request->name,
          'is_active' => 1,
        ];

        Roles::create($data);

        return redirect(route('role'))->with('create', 'Created');
    }

    public function update(Request $request, Roles $role)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $role->name = $request->name;
        $role->save();

        return redirect(route('role'))->with('update', 'Updated');
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
